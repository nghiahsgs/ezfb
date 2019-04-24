<?php 
session_start();
include('config.php');
if ($_POST && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){

$username = $_POST['username'];
$name = $_POST['name'];
$uid = $_POST['uid'];
$birthday = $_POST['birthday'];
$soFriend = $_POST['soFriend'];
$soFriendRq = $_POST['soFriendRq'];
$soGroup = $_POST['soGroup'];
$soPage = $_POST['soPage'];
$token = $_POST['token'];
$status = $_POST['status'];


$tbName='tblistNick';
$sql="UPDATE `".$tbName."` SET `name`='".$name."',`birthday`='".$birthday."',`soPage`='".$soPage."',`soFriend`='".$soFriend."',`soFriendRq`='".$soFriendRq."',`status`='".$status."',`soGroup`='".$soGroup."' WHERE `token`='".$token."' AND `username`='".$username."'";

echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0";
}

$conn->close();

}
?>
