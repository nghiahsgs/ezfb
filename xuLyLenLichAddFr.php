
<?php 
//xuLyLenLichAddFr.php
 ?>
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

include('config.php');





$token = $_POST['token'];
$uidFr = $_POST['uidFr'];
$uidMe = $_POST['uidMe'];
$timeThucHien = $_POST['timeThucHien'];
$username = $_POST['username'];



//echo $timeThucHien;
$tbName='tbaddfrcongviec';



$sql = "INSERT INTO `".$tbName."` (`id`, `uidFr`, `uidMe`, `token`, `timeThucHien`, `username`) 
VALUES ('', '".$uidFr."', '".$uidMe."', '".$token."','".$timeThucHien."', '".$username."')";
//echo $sql."<br>";
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    echo '1';
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}


 
?>

<?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>