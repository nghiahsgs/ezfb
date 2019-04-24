<?php 
include('config.php');
//include('config.php');
session_start();

if(isset($_SESSION['username'])){
  header('location: http://ezfb.top/adsAQuy/home.php');
  die();
}

require_once 'head.php';
 ?>


<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập hệ thống</div>
      <div class="card-body">
        <!-- <form action=""> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input class="form-control" id="loginEmail" type="email" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input class="form-control" id="loginPassword" type="password" placeholder="Password">
          </div>
        
          <button id="btnLogin" class="btn btn-primary btn-block">Login</button>
        <!-- </form> -->
       
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
 var username = $('#loginEmail').val();
      var password = $('#loginPassword').val();

$.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'sign-in',
               username: username,
               password: password
           },
           success: (data) => {
               // console.log(data);
               if (data.error == '1') {
                   //alert(data.msg);
                   toastr.error(data.msg);
                   // location.reload()
               } else {
                   //alert(data.msg);
                   toastr.success(data.msg);
                   //location.reload()
                   setTimeout(function(){ location.href = "http://ezfb.top/adsAQuy/home.php" },1000);
               }
           }
       })



        
      });

  </script>
</body>

</html>
