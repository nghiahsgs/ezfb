<?php 
session_start();
include('config.php');
if ($_POST && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){

$fileName = $_POST['fileName'];
$listUid=$_POST['listUid'];
echo $listUid;
echo $fileName;
$file = fopen($fileName,"w");
echo fwrite($file,$listUid);
fclose($file);

}
?>
