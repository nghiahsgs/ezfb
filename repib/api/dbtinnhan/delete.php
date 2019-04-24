
<?php
include("config.php");

 $tbName='dbtinnhan';

$idchat=$_GET['idchat'];

$sql = "DELETE FROM `".$tbName."` WHERE `idchat`='".$idchat."'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>