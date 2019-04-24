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



$username = $_POST['username'];
$token = $_POST['token'];
$chedo = $_POST['chedo'];
$tocdo = $_POST['tocdo'];
$name= $_POST['name'];
$loaiCamXuc= $_POST['loaiCamXuc'];

$ndungCmt= $_POST['ndungCmt'];
$linkAnhCmt= $_POST['linkAnhCmt'];




$timeAdd=time();


$sql = "INSERT INTO `tbthatimclone`(`id`, `username`, `token`, `name`, `typeLove`, `speed`, `totalLove`, `timeAdd`, `timeLastLove`, `timeNextLove`, `status`,`loaiCamXuc`,`ndungCmt`,`linkAnhCmt`) VALUES ('','".$username."','".$token."','".$name."','".$chedo."','".$tocdo."','0','".$timeAdd."','0','0','live','".$loaiCamXuc."','".$ndungCmt."','".$linkAnhCmt."')";


//echo $sql;

if ($conn->query($sql) === TRUE) {
   // echo "Add okay r";
    echo '1';


} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
    echo '0';
}





$conn->close();



?>


<?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>