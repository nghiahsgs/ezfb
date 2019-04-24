
<?php
include("config.php");

 $tbName='tbclone';

$idPost=$_GET['username'];
$idPost=$_GET['token'];

$sql = "DELETE FROM `".$tbName."` WHERE `token`='".$token."' and `username`='".$username."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>