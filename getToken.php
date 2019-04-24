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
include('head.php');
?>


  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
          <!-- <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>   -->
          <div class="panel">
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Get Token </center>
</div>
           <div class="panel-body">
            
               <!-- <form action=""> -->
          <div class="form-group">
            <label for="exampleInputEmail1">User Name FB</label>
            <input class="form-control" id="loginEmail" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password FB</label>
            <input class="form-control" id="loginPassword" type="password" placeholder="Password">
          </div>

           
          
          <!-- <a class="btn btn-primary btn-block" href="index.html">Login</a> -->
          <button id="btnLogin" class="btn btn-primary btn-block">Get Token</button>
        <!-- </form> -->

        <div class="form-group">
           
            
          <!--  <textarea class="form-control"  id="tokenResult" type="password" placeholder="Token của bạn"></textarea>
          </div> -->
        <iframe src="https://www.w3schools.com" class="form-control">
         <p>Your browser does not support iframes.</p>
         </iframe>
        
      </div>
    </div>
</div>
      
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
     <?php include('footer.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>

  </body>

    
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
        $.post('api.php', {
          username: username,
          password: password
        }, function(data, status) {
          //alert(status);
          console.log(data);
         // alert(data);

      document.querySelector('iframe').src=data;
           

          
        });
        }
        
      });

  </script>
</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


