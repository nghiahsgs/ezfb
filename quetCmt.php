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
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Spam cmt </center>
</div>
           <div class="panel-body">
            
    <div class="form-group">
      
      
  <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username'];?>">
      <label for="">Token | Id Post</label>
     
    <textarea class="form-control" id="listIdPost" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


    <div class="form-group">
      <label for="">CMT quét được</label>
      
      <textarea class="form-control" rows="5" id="ndungCmt" name="ndungCmt"></textarea>
    </div>

   


 <button type="submit" id="btnLogin" class="btn btn-primary" style="font-size: 17px;">Submit</button>

<button type="button" class="btn btn-default" style="float: right;font-size: 17px;">Tổng số bài <span class="badge lbTotal">0</span></button>


               
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
    
var _0x82ae=["\x76\x61\x6C","\x23\x6C\x69\x73\x74\x49\x64\x50\x6F\x73\x74","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x0A","\x73\x70\x6C\x69\x74","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x6C\x65\x6E\x67\x74\x68","\x7C","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x6C\x6F\x67","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F","\x2F\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x3F\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x6B\x6F\x20\x67\x65\x74\x20\x64\x63\x20\x74\x6F\x6B\x65\x6E","\x66\x61\x69\x6C","\x64\x61\x74\x61","\x6D\x65\x73\x73\x61\x67\x65","\x61\x70\x70\x65\x6E\x64","\x23\x6E\x64\x75\x6E\x67\x43\x6D\x74","\x67\x65\x74"];$(_0x82ae[13])[_0x82ae[12]](function(){var _0xa143x1=$(_0x82ae[1])[_0x82ae[0]]();if(_0xa143x1== _0x82ae[2]){toastr[_0x82ae[4]](_0x82ae[3])}else {var _0xa143x2=_0xa143x1[_0x82ae[6]](_0x82ae[5]);document[_0x82ae[9]](_0x82ae[8])[_0x82ae[7]]= _0xa143x2[_0x82ae[10]];for(var _0xa143x3=0;_0xa143x3<= _0xa143x2[_0x82ae[10]]- 1;_0xa143x3++){if(_0xa143x2[_0xa143x3]!= _0x82ae[2]){line= _0xa143x2[_0xa143x3];token= line[_0x82ae[6]](_0x82ae[11])[0];idPost= line[_0x82ae[6]](_0x82ae[11])[1];hamQuetCmt(token,idPost)}}}});function hamQuetCmt(_0xa143x5,_0xa143x6){console[_0x82ae[14]](_0xa143x6);var _0xa143x7=_0x82ae[15]+ _0xa143x6+ _0x82ae[16]+ _0xa143x5;$[_0x82ae[23]](_0xa143x7,function(_0xa143x8){for(var _0xa143x3=0;_0xa143x3<= _0xa143x8[_0x82ae[19]][_0x82ae[10]]- 1;_0xa143x3++){$(_0x82ae[22])[_0x82ae[21]](_0xa143x8[_0x82ae[19]][_0xa143x3][_0x82ae[20]]+ _0x82ae[5])}})[_0x82ae[18]](function(){console[_0x82ae[14]](_0x82ae[17])})}
  </script>

</html>
 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


