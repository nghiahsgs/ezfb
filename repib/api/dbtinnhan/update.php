<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
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


$message_count=$_POST['message_count'];
$ndungChatUnread=$_POST['ndungChatUnread'];

$sql = "UPDATE `".$tbName."` SET `idchat`='".$idchat."',`nameChat`='".$nameChat."',`uidChat`='".$uidChat."',`Snippet`='".$Snippet."',`updated_time`='".$updated_time."',`link_read`='".$link_read."',`ndungChat`='".$ndungChat."',`note`='".$note."',`message_count`='".$message_count."',`ndungChatUnread`='".$ndungChatUnread."' WHERE `idchat`='".$idchat."'";

//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>