<?php 
include('config.php');
//include('config.php');
session_start();

if(isset($_SESSION['username'])){
  header('location: http://ezfb.top/home.php');
  die();
}


 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tool Fb Ez</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/1.css">

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập hệ thống Tool Fb Ez</div>
      <div class="card-body">
        <!-- <form action=""> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input class="form-control" id="loginEmail" type="text"  placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input class="form-control" id="loginPassword" type="password" placeholder="Password">
          </div>
        
          <button id="btnLogin" class="btn btn-primary btn-block">Login</button>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


  
    
    <script type="text/javascript">
    $('#btnLogin').click(function(){
      //alert("nghiahsgs");
      var username = $('#loginEmail').val();
      var password = $('#loginPassword').val();
        if (username == '' || password == '') {
          toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
          //alert("ndasn");
          //toarst.error("Vui Lòng Nhập Đầy Đủ Thông Tin");
          //alert("ndasn");
          //return false;
        }else{
          // $('#login').prop('disabled', true)
        $.post('xuLyLogin.php', {
          username: username,
          password: password
        }, function(data, status) {
          //alert(status);
          console.log(data);
         // alert(data);

        //  $a = 'How are you?';
// alert($data.includes('0'));
console.log(data.includes('0'));

           if (data.includes('0')) {
             //toastr.success('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!'); 
             toastr.error('Tài khoản này chưa tồn tại'); 
          //   alert('Tài khoản này chưa tồn tại'); 
           }else  if (data.includes('1')){
             toastr.error('Sai mật khẩu');  
             alert('Sai mật khẩu');
            }else  if (data.includes('2')){
             toastr.success('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 1...!');  
           //  alert('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!');

             setTimeout(function(){ location.href = "http://ezfb.top/home.php" },1000);
           }else{
            //alert('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!');

             toastr.error('Đã có lỗi xảy ra');  
           }
          
        });
        }
        
      });

  </script>
</body>

</html>
