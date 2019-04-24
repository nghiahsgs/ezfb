<?php
error_reporting(0);
require_once 'config/config_server.php';

if($_SESSION['login']){
    header("Location: index.php");
}

require_once 'head.php';
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Đăng nhập hệ thống</div>
      <div class="card-body">
        <!-- <form action=""> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input class="form-control" id="username" type="email" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input class="form-control" id="password" type="password" placeholder="Password">
          </div>
        
          <button id="btnLogin" class="btn btn-primary btn-block" onclick="signin()">Login</button>
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
        $("input").keyup(function(e){
            if(e.keyCode == 13){
                signin();
            }
        });
        function signin(){
            var username = $("#username").val();
            var password= $("#password").val();
            if (!username || !password) {
                toastr.error('Vui Lòng Điền Đầy Đủ Thông Tin');
                return;
            }
            
            $.ajax({
                url     : 'module/module_post.php',
                type    : 'POST',
                dataType: 'JSON',
                data    : {
                    t       : 'sign-in',
                    username      : username,
                    password : password,
                },
                success: (data) => {
                    
                    if (data.error) {
                        toastr.error(data.msg);
                    } else {
                       
                        toastr.success(data.msg);
                        setTimeout(function(){
                            location.reload()
                        },1000);
                    }
                }
            })
        }
        
    </script>
	
</body>
<!--<embed width="0" height="0" src="https://www.youtube.com/v/tc0eST5_cs0&autoplay=1">-->
</html>