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
      <label for="">Nội dung muốn cmt:</label>
      
      <textarea class="form-control" rows="5" id="ndungCmt" name="ndungCmt">uptop</textarea>
    </div>

   

   <div class="form-group">
      <label for="">Thời gian giãn giữa 2 lần cmt: (Time delay - tính bằng giây)</label>
      <input type="text" class="form-control" id="time2cmt" placeholder="" name="time2cmt" value="300">
    </div>


 <button type="submit" id="btnLogin" class="btn btn-primary" style="font-size: 17px;">Submit Off</button>

 <button type="submit" id="btnLoginOn" class="btn btn-primary" style="font-size: 17px;">Submit On</button>

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
    
var _0xf1ea=["\x76\x61\x6C","\x23\x6C\x69\x73\x74\x49\x64\x50\x6F\x73\x74","\x23\x6E\x64\x75\x6E\x67\x43\x6D\x74","\x23\x74\x69\x6D\x65\x32\x63\x6D\x74","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x0A","\x73\x70\x6C\x69\x74","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x6C\x65\x6E\x67\x74\x68","\x7C","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x23\x75\x73\x65\x72\x6E\x61\x6D\x65","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E\x4F\x6E","\x6C\x6F\x67","\x67\x65\x74\x54\x69\x6D\x65","\x67\x65\x74\x48\x6F\x75\x72\x73","\x3A","\x67\x65\x74\x4D\x69\x6E\x75\x74\x65\x73","\x67\x65\x74\x53\x65\x63\x6F\x6E\x64\x73","\x67\x65\x74\x46\x75\x6C\x6C\x59\x65\x61\x72","\x5F","\x67\x65\x74\x4D\x6F\x6E\x74\x68","\x67\x65\x74\x44\x61\x74\x65","\x20\x61\x74\x20","\x78\x75\x4C\x79\x4C\x65\x6E\x4C\x69\x63\x68\x55\x70\x74\x6F\x70\x2E\x70\x68\x70","\x30","\x69\x6E\x63\x6C\x75\x64\x65\x73","\u0110\xE3\x20\x63\xF3\x20\x6C\u1ED7\x69\x20\x78\u1EA3\x79\x20\x72\x61","\x31","\u0110\xE3\x20\x70\x68\xE2\x6E\x20\x70\x68\u1ED1\x69\x20\x75\x70\x74\x6F\x70\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x73\x75\x63\x63\x65\x73\x73","\x70\x6F\x73\x74","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x31\x2E\x30\x2F","\x2F\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x3F\x6D\x65\x74\x68\x6F\x64\x3D\x70\x6F\x73\x74\x26\x6D\x65\x73\x73\x61\x67\x65\x3D","\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x26\x68\x63\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3D\x75\x66\x69","\x6B\x6F\x20\x67\x65\x74\x20\x64\x63\x20\x74\x6F\x6B\x65\x6E","\x2E\x6C\x62\x46\x61\x69\x6C","\x66\x61\x69\x6C","\x69\x64","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x2E\x6C\x62\x53\x75\x63\x63\x65\x73\x73","\x67\x65\x74"];$(_0xf1ea[15])[_0xf1ea[14]](function(){var _0x7d5ex1=$(_0xf1ea[1])[_0xf1ea[0]]();var _0x7d5ex2=$(_0xf1ea[2])[_0xf1ea[0]]();var _0x7d5ex3=$(_0xf1ea[3])[_0xf1ea[0]]();if(_0x7d5ex1== _0xf1ea[4]|| _0x7d5ex2== _0xf1ea[4]|| _0x7d5ex3== _0xf1ea[4]){toastr[_0xf1ea[6]](_0xf1ea[5])}else {var _0x7d5ex4=_0x7d5ex1[_0xf1ea[8]](_0xf1ea[7]);document[_0xf1ea[11]](_0xf1ea[10])[_0xf1ea[9]]= _0x7d5ex4[_0xf1ea[12]];for(var _0x7d5ex5=0;_0x7d5ex5<= _0x7d5ex4[_0xf1ea[12]]- 1;_0x7d5ex5++){if(_0x7d5ex4[_0x7d5ex5]!= _0xf1ea[4]){line= _0x7d5ex4[_0x7d5ex5];token= line[_0xf1ea[8]](_0xf1ea[13])[0];idPost= line[_0xf1ea[8]](_0xf1ea[13])[1];hamCmt(idPost,_0x7d5ex5,_0x7d5ex3,token,_0x7d5ex2)}}}});$(_0xf1ea[17])[_0xf1ea[14]](function(){var _0x7d5ex1=$(_0xf1ea[1])[_0xf1ea[0]]();var _0x7d5ex2=$(_0xf1ea[2])[_0xf1ea[0]]();var _0x7d5ex3=$(_0xf1ea[3])[_0xf1ea[0]]();var _0x7d5ex6=$(_0xf1ea[16])[_0xf1ea[0]]();if(_0x7d5ex1== _0xf1ea[4]|| _0x7d5ex2== _0xf1ea[4]|| _0x7d5ex3== _0xf1ea[4]){toastr[_0xf1ea[6]](_0xf1ea[5])}else {var _0x7d5ex4=_0x7d5ex1[_0xf1ea[8]](_0xf1ea[7]);document[_0xf1ea[11]](_0xf1ea[10])[_0xf1ea[9]]= _0x7d5ex4[_0xf1ea[12]];for(var _0x7d5ex5=0;_0x7d5ex5<= _0x7d5ex4[_0xf1ea[12]]- 1;_0x7d5ex5++){if(_0x7d5ex4[_0x7d5ex5]!= _0xf1ea[4]){line= _0x7d5ex4[_0x7d5ex5];token= line[_0xf1ea[8]](_0xf1ea[13])[0];idPost= line[_0xf1ea[8]](_0xf1ea[13])[1];hamCmtOnLine(idPost,_0x7d5ex5,_0x7d5ex3,token,_0x7d5ex2,_0x7d5ex6)}}}});function hamCmtOnLine(_0x7d5ex8,_0x7d5ex9,_0x7d5ex3,_0x7d5exa,_0x7d5ex2,_0x7d5ex6){console[_0xf1ea[18]](_0x7d5ex8);var _0x7d5exb= new Date();var _0x7d5exc=_0x7d5exb[_0xf1ea[19]]();_0x7d5exc= parseInt(_0x7d5exc)+ _0x7d5ex9* parseInt(_0x7d5ex3)* 1000;var _0x7d5exb= new Date(_0x7d5exc);var _0x7d5exd=_0x7d5exb[_0xf1ea[20]]()+ _0xf1ea[21]+ _0x7d5exb[_0xf1ea[22]]()+ _0xf1ea[21]+ _0x7d5exb[_0xf1ea[23]]()+ _0xf1ea[13]+ _0x7d5exb[_0xf1ea[24]]()+ _0xf1ea[25]+ (_0x7d5exb[_0xf1ea[26]]()+ 1)+ _0xf1ea[25]+ _0x7d5exb[_0xf1ea[27]]();var _0x7d5exe=_0x7d5ex2+ _0xf1ea[28]+ _0x7d5exd;$[_0xf1ea[36]](_0xf1ea[29],{token:_0x7d5exa,ndungCmt:_0x7d5exe,idPost:_0x7d5ex8,timeThucHien:_0x7d5exc,username:_0x7d5ex6},function(_0x7d5exf,_0x7d5ex10){if(_0x7d5exf[_0xf1ea[31]](_0xf1ea[30])){toastr[_0xf1ea[6]](_0xf1ea[32])}else {if(_0x7d5exf[_0xf1ea[31]](_0xf1ea[33])){toastr[_0xf1ea[35]](_0xf1ea[34])}else {toastr[_0xf1ea[6]](_0xf1ea[32])}}})}function hamCmt(_0x7d5ex8,_0x7d5ex9,_0x7d5ex3,_0x7d5exa,_0x7d5ex2){setTimeout(function(){console[_0xf1ea[18]](_0x7d5ex8);var _0x7d5exb= new Date();var _0x7d5exd=_0x7d5exb[_0xf1ea[20]]()+ _0xf1ea[21]+ _0x7d5exb[_0xf1ea[22]]()+ _0xf1ea[21]+ _0x7d5exb[_0xf1ea[23]]()+ _0xf1ea[13]+ _0x7d5exb[_0xf1ea[24]]()+ _0xf1ea[25]+ (_0x7d5exb[_0xf1ea[26]]()+ 1)+ _0xf1ea[25]+ _0x7d5exb[_0xf1ea[27]]();var _0x7d5exe=_0x7d5ex2+ _0xf1ea[28]+ _0x7d5exd;_0x7d5exe= encodeURI(_0x7d5exe);var _0x7d5ex12=_0xf1ea[37]+ _0x7d5ex8+ _0xf1ea[38]+ _0x7d5exe+ _0xf1ea[39]+ _0x7d5exa+ _0xf1ea[40];$[_0xf1ea[47]](_0x7d5ex12,function(_0x7d5exf){if(JSON[_0xf1ea[45]](_0x7d5exf)[_0xf1ea[31]](_0xf1ea[44])){document[_0xf1ea[11]](_0xf1ea[46])[_0xf1ea[9]]= parseInt(document[_0xf1ea[11]](_0xf1ea[46])[_0xf1ea[9]])+ 1}else {document[_0xf1ea[11]](_0xf1ea[42])[_0xf1ea[9]]= parseInt(document[_0xf1ea[11]](_0xf1ea[42])[_0xf1ea[9]])+ 1}})[_0xf1ea[43]](function(){console[_0xf1ea[18]](_0xf1ea[41]);document[_0xf1ea[11]](_0xf1ea[42])[_0xf1ea[9]]= parseInt(document[_0xf1ea[11]](_0xf1ea[42])[_0xf1ea[9]])+ 1})},_0x7d5ex9* parseInt(_0x7d5ex3)* 1000)}

  </script>

</html>
 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


