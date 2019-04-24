<?php 
//insertCvAddFrXuLyXongStt.php
 ?>
<?php 
include('config.php');



$uidFr = $_GET['uidFr'];
$token = $_GET['token'];
$uidMe = $_GET['uidMe'];
$timeThucHien = $_GET['timeThucHien'];
$username = $_GET['username'];



$tbName='tbaddfrcongviecxong';


$sql ="INSERT INTO `".$tbName."`(`id`, `uidFr`, `uidMe`, `token`, `timeThucHien`, `username`) VALUES ('','".$uidFr."','".$uidMe."','".$token."','".$timeThucHien."','".$username."')";

echo $sql;
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}

