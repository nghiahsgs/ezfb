 <?php 
include('config.php');
session_start();
if(empty($_SESSION['username'])){
  session_destroy();
  //echo "dkm";
  //header('http://localhost/buffLikeRealTime/Like24hNghiahsgs/index.php');
  header('location: http://yamoto.vn/index.php');
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
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Thông báo </center>
</div>
           <div class="panel-body">
               <div class="table-responsive">
                <center> 
                  <!--   <iframe src="https://www.facebook.com/plugins/post.php?href=https://www.facebook.com/photo.php?fbid=1446854338755918&width=500" width="500" height="421" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media">
                    </iframe> -->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ETfpuxFA1BE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </center>
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
</html>
 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>