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
      
      

      <label for="">Token: (get token <a href="http://nghiahsgs.com/getToken/">here</a>)</label>
      <input type="text" class="form-control" id="token" placeholder="Enter token" name="token" value="">
    </div>
    <div class="form-group">
      <label for="pwd">Id Group:</label>
      <input type="text" class="form-control" id="uidNanNhan" placeholder="Enter id" name="uidNanNhan" value="">
    </div>

    <div class="form-group">
      <label for="pwd">Số bài muốn get:</label>
      <input type="text" class="form-control" id="numberPost" placeholder="10" name="" value="">
    </div>

     
     <label type="submit" id="btnGetAllPostId" class="btn btn-success">Get all id post</label>
    <textarea class="form-control" id="listIdPost" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


    <div class="form-group">
      <label for="">Nội dung muốn cmt:</label>
      
      <textarea class="form-control" rows="5" id="ndungCmt" name="ndungCmt">Chào bạn, bên mình chuyên cung cấp các dịch vụ tăng tương tác cho facebook cá nhân, có thể bạn sẽ quan tâm, cảm ơn bạn =))</textarea>
    </div>

    <div class="form-group">
      <label for="">Link ảnh muốn cmt:</label>
      <input type="text" class="form-control" id="linkAnh" placeholder="" name="linkAnh" value="">
    </div>

   <div class="form-group">
      <label for="">Thời gian giãn giữa 2 lần cmt: (Time delay - tính bằng giây)</label>
      <input type="text" class="form-control" id="time2cmt" placeholder="" name="time2cmt" value="60">
    </div>


 <button type="submit" id="btnLogin" class="btn btn-primary" style="font-size: 17px;">Submit</button>

<button type="button" class="btn btn-danger" style="float: right;font-size: 17px;">Số bài đã comment thất bại <span class="badge lbFail">0</span></button>
 <button type="button" class="btn btn-primary" style="float: right;font-size: 17px;">Số bài đã comment thành công <span class="badge lbSuccess">0</span></button>
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
    var _0x9551=["\x76\x61\x6C","\x23\x74\x6F\x6B\x65\x6E","\x23\x75\x69\x64\x4E\x61\x6E\x4E\x68\x61\x6E","\x23\x6E\x75\x6D\x62\x65\x72\x50\x6F\x73\x74","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x66\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F","\x2F\x66\x65\x65\x64\x3F\x6C\x69\x6D\x69\x74\x3D","\x26\x66\x69\x65\x6C\x64\x73\x3D\x69\x64\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x6C\x65\x6E\x67\x74\x68","\x64\x61\x74\x61","\x69\x64","\x6C\x6F\x67","\x0A","\x61\x70\x70\x65\x6E\x64","\x23\x6C\x69\x73\x74\x49\x64\x50\x6F\x73\x74","\x67\x65\x74","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x47\x65\x74\x41\x6C\x6C\x50\x6F\x73\x74\x49\x64","\x23\x6E\x64\x75\x6E\x67\x43\x6D\x74","\x23\x6C\x69\x6E\x6B\x41\x6E\x68","\x23\x74\x69\x6D\x65\x32\x63\x6D\x74","\x73\x70\x6C\x69\x74","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x31\x2E\x30\x2F","\x2F\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x3F\x6D\x65\x74\x68\x6F\x64\x3D\x70\x6F\x73\x74\x26\x6D\x65\x73\x73\x61\x67\x65\x3D","\x26\x61\x74\x74\x61\x63\x68\x6D\x65\x6E\x74\x5F\x75\x72\x6C\x3D","\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x26\x68\x63\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3D\x75\x66\x69","\x6B\x6F\x20\x67\x65\x74\x20\x64\x63\x20\x74\x6F\x6B\x65\x6E","\x2E\x6C\x62\x46\x61\x69\x6C","\x69\x6E\x63\x6C\x75\x64\x65\x73","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x2E\x6C\x62\x53\x75\x63\x63\x65\x73\x73"];$(_0x9551[20])[_0x9551[19]](function(){var _0xcaa6x1=$(_0x9551[1])[_0x9551[0]]();var _0xcaa6x2=$(_0x9551[2])[_0x9551[0]]();var _0xcaa6x3=$(_0x9551[3])[_0x9551[0]]();if(_0xcaa6x1== _0x9551[4]|| _0xcaa6x2== _0x9551[4]){toastr[_0x9551[6]](_0x9551[5])}else {$[_0x9551[18]](_0x9551[8]+ _0xcaa6x2+ _0x9551[9]+ _0xcaa6x3+ _0x9551[10]+ _0xcaa6x1,function(_0xcaa6x4){for(var _0xcaa6x5=0;_0xcaa6x5<= _0xcaa6x4[_0x9551[12]][_0x9551[11]]- 1;_0xcaa6x5++){var _0xcaa6x6=_0xcaa6x4[_0x9551[12]][_0xcaa6x5][_0x9551[13]];console[_0x9551[14]](_0xcaa6x6);$(_0x9551[17])[_0x9551[16]](_0xcaa6x6+ _0x9551[15])}})[_0x9551[7]](function(){})}});$(_0x9551[28])[_0x9551[19]](function(){var _0xcaa6x1=$(_0x9551[1])[_0x9551[0]]();var _0xcaa6x7=$(_0x9551[17])[_0x9551[0]]();var _0xcaa6x8=$(_0x9551[21])[_0x9551[0]]();var _0xcaa6x9=$(_0x9551[22])[_0x9551[0]]();var _0xcaa6xa=$(_0x9551[23])[_0x9551[0]]();if(_0xcaa6x1== _0x9551[4]|| _0xcaa6x7== _0x9551[4]|| _0xcaa6xa== _0x9551[4]){toastr[_0x9551[6]](_0x9551[5])}else {var _0xcaa6xb=_0xcaa6x7[_0x9551[24]](_0x9551[15]);document[_0x9551[27]](_0x9551[26])[_0x9551[25]]= _0xcaa6xb[_0x9551[11]];for(var _0xcaa6x5=0;_0xcaa6x5<= _0xcaa6xb[_0x9551[11]]- 1;_0xcaa6x5++){if(_0xcaa6xb[_0xcaa6x5]!= _0x9551[4]){idPost= _0xcaa6xb[_0xcaa6x5];hamCmt(idPost,_0xcaa6x5,_0xcaa6xa,_0xcaa6x1,_0xcaa6x9,_0xcaa6x8)}}}});function hamCmt(_0xcaa6xd,_0xcaa6xe,_0xcaa6xa,_0xcaa6x1,_0xcaa6x9,_0xcaa6x8){setTimeout(function(){console[_0x9551[14]](_0xcaa6xd);var _0xcaa6xf=_0xcaa6x8;_0xcaa6xf= encodeURI(_0xcaa6xf);var _0xcaa6x10=_0x9551[29]+ _0xcaa6xd+ _0x9551[30]+ _0xcaa6xf+ _0x9551[31]+ _0xcaa6x9+ _0x9551[32]+ _0xcaa6x1+ _0x9551[33];$[_0x9551[18]](_0xcaa6x10,function(_0xcaa6x4){console[_0x9551[14]](_0xcaa6x4);if(JSON[_0x9551[37]](_0xcaa6x4)[_0x9551[36]](_0x9551[13])){document[_0x9551[27]](_0x9551[38])[_0x9551[25]]= parseInt(document[_0x9551[27]](_0x9551[38])[_0x9551[25]])+ 1}else {document[_0x9551[27]](_0x9551[35])[_0x9551[25]]= parseInt(document[_0x9551[27]](_0x9551[35])[_0x9551[25]])+ 1}})[_0x9551[7]](function(){console[_0x9551[14]](_0x9551[34]);document[_0x9551[27]](_0x9551[35])[_0x9551[25]]= parseInt(document[_0x9551[27]](_0x9551[35])[_0x9551[25]])+ 1})},_0xcaa6xe* parseInt(_0xcaa6xa)* 1000)}

  </script>

</html>
 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


