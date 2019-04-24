<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");


$tbName='tbthatimclone';


$username=$_GET['username'];
$token=$_GET['token'];
$name=$_GET['name'];
$typeLove=$_GET['typeLove'];
$speed=$_GET['speed'];
$totalLove=$_GET['totalLove'];
$timeAdd=time();
$timeLastLove=$_GET['timeLastLove'];
$timeNextLove=$_GET['timeNextLove'];
$status=$_GET['status'];

$loaiCamXuc=$_GET['loaiCamXuc'];
$ndungCmt=$_GET['ndungCmt'];
$linkAnhCmt=$_GET['linkAnhCmt'];




$sql = "UPDATE `".$tbName."` SET `name`='".$name."',`typeLove`='".$typeLove."',`speed`='".$speed."',`totalLove`='".$totalLove."',`timeAdd`='".$timeAdd."',`timeLastLove`='".$timeLastLove."',`timeNextLove`='".$timeNextLove."',`status`='".$status."',`loaiCamXuc`='".$loaiCamXuc."',`ndungCmt`='".$ndungCmt."',`linkAnhCmt`='".$linkAnhCmt."' WHERE `token`='".$token."' and `username`='".$username."'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>