
<?php
include("config.php");

$tbName='dbguitinnhan';

$idchat=$_POST['idchat'];
$ndungSend=$_POST['ndungSend'];


$message_count=$_POST['message_count'];
$ndungChatUnread=$_POST['ndungChatUnread'];

$sql = "INSERT INTO ".$tbName." (`id`, `idchat`, `ndungSend`) VALUES ('', '".$idchat."', '".$ndungSend."')";

echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Add okay r";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();