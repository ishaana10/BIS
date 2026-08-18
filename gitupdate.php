<?php
header("Content-type: text/html; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

require_once ('core/nuchoosesetup.php');
require_once ('core/nucommon.php');
require_once ('core/nudata.php');
require_once ('nuconfig.php');

// Security check: Only allow globeadmin users
if (empty($_SESSION['nubuilder_session_data']['isGlobeadmin'])) {
    echo "<h3>Access Denied</h3><p>This page is strictly restricted to globeadmin administrators.</p>";
    exit;
}

require_once ('gitupdate.htm');
?>
