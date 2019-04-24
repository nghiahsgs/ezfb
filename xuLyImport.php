 <?php 
include('config.php');
session_start();

if(empty($_SESSION['username'])){
  session_destroy();
  //echo "dkm";
  //header('http://localhost/buffLikeRealTime/Like24hNghiahsgs/index.php');

  header('Location: http://ezfb.top/index.php');
  die();
}


//echo "đây là trang chủ ae ạ";


//require("config.php");
//echo $_SESSION['username'];

$ketnoi=$conn;
$dem = mysqli_num_rows(mysqli_query($ketnoi,"SELECT * FROM `tbuser` WHERE `username` ='".mysqli_real_escape_string($ketnoi,$_SESSION['username'])."'"));

//check co phai acc that ko hay la hacker
if($dem == 1){

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
$group=$_POST['group'];
$status=$_POST['status'];


$tbName='tblistNick';
$sql = "INSERT INTO `".$tbName."`(`id`, `username`, `token`, `name`, `uid`, `birthday`, `soPage`, `soFriend`, `soFriendRq`, `soGroup`,`group`,`status`) VALUES ('','".$username."','".$token."','".$name."','".$uid."','".$birthday."','".$soPage."','".$soFriend."','".$soFriendRq."','".$soGroup."','".$group."','".$status."')";

//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "0";
}

$conn->close();
}
?>


<?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


