<?php 
//insertimportNick2.php
 ?>
<?php 
include('config.php');



$name = $_POST['name'];
$uid = $_POST['uid'];
$birthday = $_POST['birthday'];
$soFriend = $_POST['soFriend'];
$soFriendRq = $_POST['soFriendRq'];
$soGroup = $_POST['soGroup'];
$soPage = $_POST['soPage'];
$grId = $_POST['grId'];

$token= $_POST['token'];
$username= $_POST['username'];
$group= $_POST['group'];


$tbName='tblistNick2';

$sql ="INSERT INTO `".$tbName."`(`id`,`username`, `token`, `name`, `uid`, `birthday`, `soPage`, `soFriend`, `soFriendRq`, `soGroup`, `status`, `group`, `grId`) VALUES ('','".$username."','".$token."','".$name."','".$uid."','".$birthday."','".$soPage."','".$soFriend."','".$soFriendRq."','".$soGroup."','".$status."','".$group."','".$grId."')";

//echo $sql;
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}

