
<?php
include("config.php");

 $tbName='dbguitinnhan';

$idchat=$_POST['idchat'];
$ndungSend=$_POST['ndungSend'];

$sql = "DELETE FROM `".$tbName."` WHERE `idchat`='".$idchat."' AND `ndungSend`='".$ndungSend."' ";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>