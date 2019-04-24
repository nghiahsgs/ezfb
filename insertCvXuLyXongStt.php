<?php 
include('config.php');


$token = $_GET['token'];
$ndungBaiViet = $_GET['ndungBaiViet'];
$linkAnh=$_GET['linkAnh'];
$timeThucHien=$_GET['timeThucHien'];
$username=$_GET['username'];



$timeadd=time();

//$ndungBaiViet=urlencode($ndungBaiViet);

$tbName='tbdangbaicongviecxong';

$sql = "INSERT INTO ".$tbName." (`id`, `token`, `ndungBaiViet`, `linkAnh`, `timeThucHien`, `timeadd`,`username`)
VALUES ('', '".$token."', '".$ndungBaiViet."', '".$linkAnh."', '".$timeThucHien."', '".$timeadd."', '".$username."')";
//echo $sql;
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}



$tbName='tbdangbaicongviec';

$sql = "DELETE FROM `tbdangbaicongviec` WHERE `token`='".$token."' AND `username`='".$username."'  AND `timeThucHien`='".$timeThucHien."'";
echo $sql;
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}
