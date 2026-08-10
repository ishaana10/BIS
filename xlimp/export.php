<?php  
//echo "<div class='alert alert-danger'>ERROR: No files Selected..</div>";
 //export.php  
 //sleep(1);
 //require('db_config.php');
 require('../nuconfig.php');
 require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

function nuID(){
	
	global $DBUser;
	$i	= uniqid();
	$s	= md5($i);

	while($i == uniqid()){}

	$prefix = $DBUser == 'nudev' ? 'nu' : '';
	return $prefix.uniqid().$s[0].$s[1];

}



 if(! isset($_FILES['excel_file']) || $_FILES['excel_file']['error'] == UPLOAD_ERR_NO_FILE){
		
		
echo "<div class='alert alert-danger'>ERROR: No files Selected..</div>";

 }else{
 if(!empty($_FILES["excel_file"]))  
 {  
      	
	
$allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
  //$mimes = ['application/vnd.ms-excel'/*,'text/xls','text/xlsx'*/,'application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["excel_file"]["type"],$allowedFileType)){

    $uploadFilePath = 'uploads/'.basename($_FILES['excel_file']['name']);
    move_uploaded_file($_FILES['excel_file']['tmp_name'], $uploadFilePath);

    $Reader = new SpreadsheetReader($uploadFilePath);

    $totalSheet = count($Reader->sheets());

    //echo "You have total ".$totalSheet." sheets".
echo "<div class='alert alert-success'>
                            You have total ".$totalSheet." sheets
                        </div>";
    $html="<table border='1'>";
    $html.="<tr><th>Title</th><th>Description</th><th>A1</th><th>A2</th></tr>";

    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        $contnum = isset($Row[0]) ? $Row[0] : '';
        $agent = isset($Row[1]) ? $Row[1] : '';
		$pol = isset($Row[2]) ? $Row[2] : '';
		$status = isset($Row[3]) ? $Row[3] : '';
		$stowlocation = isset($Row[4]) ? $Row[4] : '';
		$idf = $_COOKIE["test"]; 
		$id = nuID();
        $html.="<td>".$title."</td>";
        $html.="<td>".$description."</td>";
		$html.="<td>".$test1."</td>";
		$html.="<td>".$test2."</td>";
		$html.="<td>".$test3."</td>";
		
		
        $html.="</tr>";
			$mysqli = new mysqli($nuConfigDBHost, $nuConfigDBUser, $nuConfigDBPassword, $nuConfigDBName);
        $query = "insert into brdn_empty(brdn_empty_id,brdngn_id,em_con_num,em_agent,em_pol,em_status,stowlocation) values('".$id."','".$idf."','".$contnum."','".$agent."','".$pol."','".$status."','".$stowlocation."')";

        $mysqli->query($query);
       }
    }
    $html.="</table>";
    
    //echo "<br />Data Inserted in dababase";
	echo "<div class='alert alert-success'>
                            Data Inserted in dababase
                        </div>";
						//echo $html;
						
						

    $captchaFolder  = 'uploads/';
 
// Filetypes to check (you can also use *.*)
$fileTypes      = '*.xlsx';
 
// Find all files of the given file type
foreach (glob($captchaFolder . $fileTypes) as $Filename) {
     
        unlink($Filename);
   
 
}
 
}
  }else{  
           echo "<div class='alert alert-danger'>ERROR: Sorry, File type is not allowed. Only Excel file.</div>";
	die();
      }  
	   
 } 

 
 //}

 ?>  