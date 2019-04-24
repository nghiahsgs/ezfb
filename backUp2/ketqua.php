<?php 
//echo "nghiahsgs";
$uid=$_GET['uid'];
$ndungFile=file_get_contents($uid.'.txt');
echo $ndungFile;
?>