<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php
include("config.php");


$tbName='tbthatimclone';


$status=$_GET['status'];
$username=$_GET['username'];
$token=$_GET['token'];


$sql = "UPDATE `".$tbName."` SET `status`='".$status."' WHERE `token`='".$token."' and `username`='".$username."'";
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>