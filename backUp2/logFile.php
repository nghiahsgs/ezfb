<?php 
//backUp2/logFile.php
 ?>
 <?php 
$uidMe=$_GET['uidMe'];
//echo $uidMe."<br>";


$ndung=$_GET['ndung'];
$ndung=base64_decode($ndung);
preg_match('/http:\/\/graph.facebook.com\/(.*?)\/picture/', $ndung, $matches);
$uidInsert=$matches[1];


$fileName=$uidMe.'.txt';
//echo $fileName."<br>";;
//neu file chua co thi tao
file_put_contents($fileName,'', FILE_APPEND);
$ndungFile=file_get_contents($fileName);

//check co hay ko
if (strpos($ndungFile, $uidInsert) !== false) {
    //echo 'true';
    //co roi thi thoi || update
}else{
	  echo 'add new';
	//chua co thi them moi
	file_put_contents($fileName, $ndung, FILE_APPEND);

}



  ?>