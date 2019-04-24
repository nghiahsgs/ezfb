
<?php
include("config.php");

$tbName='dbtinnhan';


$idchat=$_POST['idchat'];
$nameChat=$_POST['nameChat'];
$uidChat=$_POST['uidChat'];
$Snippet=$_POST['Snippet'];
$updated_time=$_POST['updated_time'];
$link_read=$_POST['link_read'];
$ndungChat=$_POST['ndungChat'];
$note=$_POST['note'];
$member=$_POST['member'];

$message_count=$_POST['message_count'];
$ndungChatUnread=$_POST['ndungChatUnread'];

$sql = "INSERT INTO ".$tbName." (`id`, `idchat`, `nameChat`, `uidChat`, `Snippet`, `updated_time`, `link_read`, `ndungChat`, `note`,`message_count`,`ndungChatUnread`,`member`) VALUES ('', '".$idchat."', '".$nameChat."', '".$uidChat."', '".$Snippet."', '".$updated_time."', '".$link_read."', '".$ndungChat."','".$note."','".$message_count."','".$ndungChatUnread."','".$member."')";

echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Add okay r";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();