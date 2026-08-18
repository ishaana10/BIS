<?php
header("Content-Type: application/json; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

require_once('nuchoosesetup.php');
require_once('nucommon.php');
require_once('nudata.php');
require_once('nusystemupdatelibs.php');
require_once('nusystemupdate.php');
require_once('nusetuplibs.php');
require_once('nuform.php');
require_once('../nuconfig.php');

// Security check: Only allow globeadmin users
if (empty($_SESSION['nubuilder_session_data']['isGlobeadmin'])) {
    echo json_encode([
        'success' => false,
        'error' => 'Access denied. Strictly restricted to globeadmin users.'
    ]);
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : 'git_status';

function nuGetGitConfigValue($key, $default = '') {
    $s = "SELECT cfg_value FROM zzzzsys_config WHERE zzzzsys_config_id = ?";
    $r = nuRunQueryNoDebug($s, [$key]);
    if ($r && db_num_rows($r) > 0) {
        $obj = db_fetch_object($r);
        return $obj->cfg_value;
    }
    return $default;
}

function nuSetGitConfigValue($key, $value, $description = '') {
    $s = "SELECT zzzzsys_config_id FROM zzzzsys_config WHERE zzzzsys_config_id = ?";
    $r = nuRunQueryNoDebug($s, [$key]);
    if ($r && db_num_rows($r) > 0) {
        $u = "UPDATE zzzzsys_config SET cfg_value = ? WHERE zzzzsys_config_id = ?";
        nuRunQueryNoDebug($u, [$value, $key]);
    } else {
        $i = "INSERT INTO zzzzsys_config (zzzzsys_config_id, zzzzsys_setup_id, cfg_category, cfg_setting, cfg_value, cfg_description, cfg_type, cfg_effective) VALUES (?, '1', 'Git', ?, ?, ?, 1, '1')";
        nuRunQueryNoDebug($i, [$key, $key, $value, $description]);
    }
}

function nuGetGitSettings() {
    $defaultDir = realpath(__DIR__ . '/..') ?: dirname(__DIR__);
    return [
        'git_path'       => nuGetGitConfigValue('git_path', 'git'),
        'git_repo_dir'   => nuGetGitConfigValue('git_repo_dir', $defaultDir),
        'update_branch'  => nuGetGitConfigValue('update_branch', 'main'),
        'git_remote_url' => nuGetGitConfigValue('git_remote_url', '')
    ];
}

function isGitRepoRobust($gitPath, $gitRepoDir) {
    if (!is_dir($gitRepoDir)) return false;
    $gitEscaped = escapeshellarg($gitPath);
    $dirEscaped = escapeshellarg($gitRepoDir);
    $cmd = "{$gitEscaped} -C {$dirEscaped} -c safe.directory=* rev-parse --is-inside-work-tree 2>&1";
    $output = shell_exec($cmd);
    return trim((string)$output) === 'true';
}

if ($action === 'git_status') {
    try {
        $settings = nuGetGitSettings();
        $git_path = $settings['git_path'];
        $git_repo_dir = $settings['git_repo_dir'];
        $selectedBranch = $settings['update_branch'];
        $git_remote_url = $settings['git_remote_url'];

        $gitCmdPrefix = escapeshellarg($git_path) . " -C " . escapeshellarg($git_repo_dir) . " -c safe.directory=* ";
        $is_git_repo = isGitRepoRobust($git_path, $git_repo_dir);

        $status = '';
        $branch = '';
        $remoteBranches = [];
        $remoteUrl = $git_remote_url;

        if ($is_git_repo) {
            $status = (string)shell_exec($gitCmdPrefix . 'status 2>&1');
            $branch = (string)shell_exec($gitCmdPrefix . 'rev-parse --abbrev-ref HEAD 2>&1');
            $branchesOutput = (string)shell_exec($gitCmdPrefix . "branch -a 2>&1");
            if ($branchesOutput && strpos($branchesOutput, 'fatal:') === false) {
                $lines = explode("\n", $branchesOutput);
                foreach ($lines as $line) {
                    $line = trim($line, "* \t\r\n");
                    if (!$line) continue;
                    if (strpos($line, 'remotes/origin/HEAD') !== false) continue;
                    if (strpos($line, 'remotes/origin/') === 0) {
                        $b = substr($line, 15);
                    } elseif (strpos($line, 'origin/') === 0) {
                        $b = substr($line, 7);
                    } else {
                        $b = $line;
                    }
                    if ($b && !preg_match('/[\s:]/', $b) && !in_array($b, $remoteBranches)) {
                        $remoteBranches[] = $b;
                    }
                }
            }
            $remoteUrlCheck = (string)shell_exec($gitCmdPrefix . "config --get remote.origin.url 2>&1");
            if ($remoteUrlCheck && stripos($remoteUrlCheck, 'fatal:') === false) {
                $remoteUrl = trim($remoteUrlCheck);
            }
        } else {
            $status = "fatal: not a git repository (or any of the parent directories): .git";
            $branch = "None";
        }

        if (empty($remoteBranches)) {
            $remoteBranches = [$selectedBranch];
        }

        $success = $is_git_repo && (stripos($status, 'fatal:') === false);

        echo json_encode([
            'success'          => $success,
            'status'           => trim($status),
            'branch'           => trim($branch),
            'selected_branch'  => $selectedBranch,
            'remote_branches'   => $remoteBranches,
            'git_path'         => $git_path,
            'git_repo_dir'     => $git_repo_dir,
            'git_remote_url'   => $remoteUrl
        ]);
    } catch (Throwable $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;

} elseif ($action === 'save_git_settings') {
    $raw  = file_get_contents('php://input');
    $body = json_decode($raw ?: '{}', true);
    if (empty($body)) {
        $body = $_POST;
    }

    $gitPath      = trim((string)($body['git_path'] ?? 'git'));
    $gitRepoDir   = trim((string)($body['git_repo_dir'] ?? ''));
    $updateBranch = trim((string)($body['update_branch'] ?? 'main'));
    $repoUrl      = trim((string)($body['git_remote_url'] ?? $body['repo_url'] ?? ''));

    if (!$gitPath) $gitPath = 'git';

    if (preg_match('/\s+/', $gitPath) || stripos($gitPath, 'clone') !== false || stripos($gitPath, 'http') !== false) {
        echo json_encode([
            'success' => false,
            'error'   => "Invalid Git Executable Path: Please enter ONLY 'git' or absolute binary path (e.g. '/usr/bin/git')."
        ]);
        exit;
    }

    if (!$gitRepoDir) {
        $gitRepoDir = realpath(__DIR__ . '/..') ?: dirname(__DIR__);
    }

    try {
        nuSetGitConfigValue('git_path', $gitPath, 'Git Binary Path');
        nuSetGitConfigValue('git_repo_dir', $gitRepoDir, 'Git Repository Directory');
        nuSetGitConfigValue('update_branch', $updateBranch, 'Git Target Update Branch');
        if ($repoUrl !== '') {
            nuSetGitConfigValue('git_remote_url', $repoUrl, 'Git Remote Repository URL');
        }

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;

} elseif ($action === 'test_git_settings') {
    $raw  = file_get_contents('php://input');
    $body = json_decode($raw ?: '{}', true);
    if (empty($body)) $body = $_POST;

    $gitPath    = trim((string)($body['git_path'] ?? 'git'));
    $gitRepoDir = trim((string)($body['git_repo_dir'] ?? ''));

    if (!$gitPath) {
        echo json_encode(['success' => false, 'error' => 'Git Executable Path cannot be empty.']);
        exit;
    }
    if (!$gitRepoDir) {
        echo json_encode(['success' => false, 'error' => 'Git Repository Root Directory cannot be empty.']);
        exit;
    }
    if (!is_dir($gitRepoDir)) {
        echo json_encode(['success' => false, 'error' => "Directory '{$gitRepoDir}' does not exist or is not accessible."]);
        exit;
    }

    $gitEscaped = escapeshellarg($gitPath);
    $versionOutput = (string)shell_exec("{$gitEscaped} --version 2>&1");
    if (!$versionOutput || stripos($versionOutput, 'version') === false) {
        echo json_encode([
            'success' => false,
            'error'   => "Failed to run Git with path '{$gitPath}'. Details: " . trim($versionOutput)
        ]);
        exit;
    }

    $is_git_repo = isGitRepoRobust($gitPath, $gitRepoDir);
    if (!$is_git_repo) {
        echo json_encode([
            'success'    => false,
            'git_missing'=> true,
            'error'      => "Git is working on your server (version: " . trim($versionOutput) . ")!\n\nHowever, this directory is not tracked by Git yet. Configure remote repository details below to initialize."
        ]);
        exit;
    }

    $gitCmdPrefix = $gitEscaped . " -C " . escapeshellarg($gitRepoDir) . " -c safe.directory=* ";
    $statusOutput = (string)shell_exec($gitCmdPrefix . 'status 2>&1');
    if (stripos($statusOutput, 'fatal:') !== false) {
        echo json_encode([
            'success' => false,
            'error'   => "Git executable is working, but repository check failed: " . trim($statusOutput)
        ]);
        exit;
    }

    echo json_encode([
        'success' => true,
        'message' => "Connection successful!\nGit version: " . trim($versionOutput) . "\nRepository status: OK"
    ]);
    exit;

} elseif ($action === 'git_init') {
    $raw  = file_get_contents('php://input');
    $body = json_decode($raw ?: '{}', true);
    if (empty($body)) $body = $_POST;

    $gitPath    = trim((string)($body['git_path'] ?? 'git'));
    $gitRepoDir = trim((string)($body['git_repo_dir'] ?? ''));
    $repoUrl    = trim((string)($body['repo_url'] ?? $body['git_remote_url'] ?? ''));
    $branch     = trim((string)($body['branch'] ?? 'main'));

    if (!$gitPath) $gitPath = 'git';
    if (!$gitRepoDir) $gitRepoDir = realpath(__DIR__ . '/..') ?: dirname(__DIR__);
    if (!$repoUrl) {
        echo json_encode(['success' => false, 'error' => 'Repository URL cannot be empty.']);
        exit;
    }

    if (!is_dir($gitRepoDir)) {
        echo json_encode(['success' => false, 'error' => "Directory '{$gitRepoDir}' does not exist or is not accessible."]);
        exit;
    }

    $gitEscaped = escapeshellarg($gitPath);
    $gitCmdPrefix = $gitEscaped . " -C " . escapeshellarg($gitRepoDir) . " -c safe.directory=* ";
    $output = "Starting Git repository initialization...\n";

    if (!isGitRepoRobust($gitPath, $gitRepoDir)) {
        $res = (string)shell_exec($gitCmdPrefix . "init 2>&1");
        $output .= "git init:\n" . trim($res) . "\n\n";
        if (stripos($res, 'fatal:') !== false || stripos($res, 'error:') !== false) {
            echo json_encode(['success' => false, 'error' => "Git init failed:\n" . trim($res)]);
            exit;
        }
    }

    nuSetGitConfigValue('git_path', $gitPath, 'Git Binary Path');
    nuSetGitConfigValue('git_repo_dir', $gitRepoDir, 'Git Repository Directory');
    nuSetGitConfigValue('update_branch', $branch, 'Git Target Update Branch');
    nuSetGitConfigValue('git_remote_url', $repoUrl, 'Git Remote Repository URL');

    $remoteCheck = (string)shell_exec($gitCmdPrefix . "remote 2>&1");
    if (stripos($remoteCheck, 'origin') !== false) {
        $res = (string)shell_exec($gitCmdPrefix . "remote set-url origin " . escapeshellarg($repoUrl) . " 2>&1");
        $output .= "git remote set-url origin:\n" . trim($res) . "\n\n";
    } else {
        $res = (string)shell_exec($gitCmdPrefix . "remote add origin " . escapeshellarg($repoUrl) . " 2>&1");
        $output .= "git remote add origin:\n" . trim($res) . "\n\n";
    }

    $res = (string)shell_exec($gitCmdPrefix . "fetch origin 2>&1");
    $output .= "git fetch:\n" . trim($res) . "\n\n";
    if (stripos($res, 'fatal:') !== false || stripos($res, 'error:') !== false) {
        echo json_encode(['success' => false, 'error' => "Git fetch failed:\n" . trim($res)]);
        exit;
    }

    $branchEscaped = escapeshellarg($branch);
    $res = (string)shell_exec($gitCmdPrefix . "checkout -f -B {$branchEscaped} origin/{$branchEscaped} 2>&1");
    $output .= "git checkout:\n" . trim($res) . "\n\n";

    $res = (string)shell_exec($gitCmdPrefix . "reset --hard origin/{$branchEscaped} 2>&1");
    $output .= "git reset --hard:\n" . trim($res) . "\n\n";

    echo json_encode([
        'success' => true,
        'output'  => $output
    ]);
    exit;

} elseif ($action === 'git_pull') {
    $raw  = file_get_contents('php://input');
    $body = json_decode($raw ?: '{}', true);
    if (empty($body)) $body = $_POST;

    $settings = nuGetGitSettings();
    $gitPath    = trim((string)($body['git_path'] ?? $settings['git_path']));
    $gitRepoDir = trim((string)($body['git_repo_dir'] ?? $settings['git_repo_dir']));
    $branch     = trim((string)($body['branch'] ?? $settings['update_branch']));

    if (!$gitPath) $gitPath = 'git';
    if (!$gitRepoDir) $gitRepoDir = realpath(__DIR__ . '/..') ?: dirname(__DIR__);
    if (!$branch) $branch = 'main';

    if (!isGitRepoRobust($gitPath, $gitRepoDir)) {
        echo json_encode(['success' => false, 'error' => "Repository is not initialized at '{$gitRepoDir}'."]);
        exit;
    }

    $gitEscaped   = escapeshellarg($gitPath);
    $gitCmdPrefix = $gitEscaped . " -C " . escapeshellarg($gitRepoDir) . " -c safe.directory=* ";
    $branchEscaped= escapeshellarg($branch);

    $log = "Executing Git Pull update from branch '{$branch}'...\n";

    $resFetch = (string)shell_exec($gitCmdPrefix . "fetch origin {$branchEscaped} 2>&1");
    $log .= "Fetch origin:\n" . trim($resFetch) . "\n\n";

    $resReset = (string)shell_exec($gitCmdPrefix . "reset --hard origin/{$branchEscaped} 2>&1");
    $log .= "Hard reset to origin:\n" . trim($resReset) . "\n\n";

    if (stripos($resReset, 'fatal:') !== false || stripos($resReset, 'error:') !== false) {
        echo json_encode(['success' => false, 'error' => "Git pull/reset failed:\n" . $log]);
        exit;
    }

    // Capture output of database update
    ob_start();
    try {
        nuRunUpdate(null, $nuConfigDBGlobeadminUsername ?? 'globeadmin', $nuConfigDBGlobeadminPassword ?? '');
        $dbUpdateOutput = ob_get_clean();
        $log .= "\nDatabase Update Execution Output:\n" . strip_tags($dbUpdateOutput) . "\n";
    } catch (Throwable $e) {
        ob_end_clean();
        $log .= "\nDatabase Update Exception: " . $e->getMessage() . "\n";
    }

    echo json_encode([
        'success' => true,
        'message' => "Git Pull and Database Update successfully completed!",
        'log'     => $log
    ]);
    exit;

} elseif ($action === 'git_log') {
    try {
        $settings = nuGetGitSettings();
        $git_path = $settings['git_path'];
        $git_repo_dir = $settings['git_repo_dir'];

        if (!isGitRepoRobust($git_path, $git_repo_dir)) {
            echo json_encode(['success' => false, 'error' => 'Not a git repository.']);
            exit;
        }

        $gitCmdPrefix = escapeshellarg($git_path) . " -C " . escapeshellarg($git_repo_dir) . " -c safe.directory=* ";
        $logOutput = (string)shell_exec($gitCmdPrefix . "log -n 30 --pretty=format:'%h|%an|%ar|%s' 2>&1");

        $commits = [];
        if ($logOutput && stripos($logOutput, 'fatal:') === false) {
            $lines = explode("\n", $logOutput);
            foreach ($lines as $line) {
                if (trim($line) === '') continue;
                $parts = explode('|', $line, 4);
                if (count($parts) === 4) {
                    $commits[] = [
                        'hash'    => $parts[0],
                        'author'  => $parts[1],
                        'date'    => $parts[2],
                        'message' => $parts[3]
                    ];
                }
            }
        }

        echo json_encode(['success' => true, 'commits' => $commits]);
    } catch (Throwable $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action specified.']);
    exit;
}
