<?php 
//insertCvUpTopXuLyXongStt.php
 ?>
<?php 
include('config.php');


$username = $_GET['username'];
$token = $_GET['token'];
$ndungCmt = $_GET['ndungCmt'];
$idPost = $_GET['idPost'];
$timeThucHien = $_GET['timeThucHien'];



$tbName='tbuptopcongviec';

$sql = "DELETE FROM `".$tbName."` WHERE `token`='".$token."' AND `idPost`='".$idPost."' AND `timeThucHien`='".$timeThucHien."'";
echo $sql;
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}
