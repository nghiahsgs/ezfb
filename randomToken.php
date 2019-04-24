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
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Lấy random </center>
</div>
           <div class="panel-body">
           <div class="col-md-12">
                        <div class="form-group">
                            <label>* Nhập Vào Token:</label>
                            <textarea type="text" name="" id="token" rows="6" class="form-control" placeholder="Mỗi Token 1 Dòng"></textarea>
                        </div>
                    </div>
             
             <div class="col-md-12">
                        <label>* Số lượng muốn lấy:</label>
                        <div class="form-group">
                            <!-- <span class="label label-primary">Tổng: <b id="alltoken">0</b></span> -->
                           <input type="text" class="form-control" id="soLuong">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label>* Đã Lọc Random:</label>
                            <textarea type="text" name="" id="daloc" rows="6" class="form-control" placeholder="List Token "></textarea>
                        </div>
                        <div class="form-group">
                            <span class="label label-primary">Tổng: <b id="alltoken">0</b></span>
                            <span class="label label-success">Lấy được: <b id="sodl">0</b></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group button-action">
                            <button type="button" class="btn btn-success" onclick="loctrung();">Tiến Hành</button>
                        </div>
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
        function loctrung() {
            var itoken = $('#token').val().split("\n")
            $('#alltoken').html(itoken.length);
            
            var soLuong=$('#soLuong').val();
            
            $('#sodl').html(soLuong);
           
            for (var i = 0; i < soLuong; i++) {
              
             var index=Math.floor(Math.random()*(itoken.length - 1))
            $("#daloc").append(itoken[index]+"\n");

            }
            

            // document.getElementById('daloc').value = textoutarr.join('\n');
            // var sodl = $('#daloc').val().split("\n")
            // $('#sodl').html(sodl.length);
            // document.getElementById('removed_output').value = cachearr.join('\n');

        }
    </script>
</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


