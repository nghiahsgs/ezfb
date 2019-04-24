<?php 
//frRequest.php
 ?>
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
         
<div class="page_tools ibox float-e-margins">
  <div class="ibox-title">
    <h5>Lời mời kết bạn</h5>
  </div>
  <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username'];?>">

<div class="form-group">
  <label for="sel1">Select nick:</label>
  <select class="form-control" id="sel1Nick">
    
               <option value=''>Select</option>
<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$tbName='tblistNick';

$sql = "SELECT `id`, `username`, `token`, `name`, `uid`, `birthday`, `soPage`, `soFriend`, `soFriendRq`, `soGroup` FROM `".$tbName."` WHERE `username`='".$_SESSION['username']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       // echo "<tr>";
        // echo "<td>".$row["token"]."</td>";

//echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-primary">'.$row["id"].'</a></td>';

echo "<option value='".$row["token"]."'>".$row["name"]."</option>";

}}
?>
  </select>
</div>


    <b>* Access Token:</b><br>
    <input class="form-control" id="token" placeholder="" />

    <button type="submit" id="btnGetFrRq" class="btn btn-success">Get Uid</button> <br>
    
    
     <textarea class="form-control" id="listUid" placeholder="Mỗi UID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>



    <b>* Khoảng cách giữa 2 lần gửi yêu cầu (Giây):</b><br>
    <input class="form-control" id="time2Fr" value="50" /><br>

    
 

 <button type="submit" id="btnLogin" class="btn btn-primary" style="font-size: 17px;">Submit Off</button>

 <button type="submit" id="btnLoginOn" class="btn btn-primary" style="font-size: 17px;">Submit On</button>

<button type="button" class="btn btn-danger" style="float: right;">Thất bại <span class="badge lbFail">0</span></button>
 <button type="button" class="btn btn-success" style="float: right;">Thành công <span class="badge lbSuccess">0</span></button>
 <button type="button" class="btn btn-default" style="float: right;">Tổng số <span class="badge lbTotal">0</span></button>
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
  var _0x4b6f=["\x76\x61\x6C","\x23\x74\x6F\x6B\x65\x6E","\x23\x6C\x69\x73\x74\x55\x69\x64","\x23\x74\x69\x6D\x65\x32\x46\x72","\x23\x75\x73\x65\x72\x6E\x61\x6D\x65","\x74\x6F\x6B\x65\x6E\x20\x63\x68\x65\x74","\x6C\x6F\x67","\x66\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x3F\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x69\x64","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x0A","\x73\x70\x6C\x69\x74","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x6C\x65\x6E\x67\x74\x68","\x67\x65\x74","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E\x4F\x6E","\x67\x65\x74\x54\x69\x6D\x65","\x78\x75\x4C\x79\x4C\x65\x6E\x4C\x69\x63\x68\x41\x64\x64\x46\x72\x2E\x70\x68\x70","\x30","\x69\x6E\x63\x6C\x75\x64\x65\x73","\u0110\xE3\x20\x63\xF3\x20\x6C\u1ED7\x69\x20\x78\u1EA3\x79\x20\x72\x61","\x31","\u0110\xE3\x20\x70\x68\xE2\x6E\x20\x70\x68\u1ED1\x69\x20\x61\x64\x64\x20\x66\x72\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x73\x75\x63\x63\x65\x73\x73","\x70\x6F\x73\x74","\x23\x73\x65\x6C\x31\x4E\x69\x63\x6B","\x63\x68\x61\x6E\x67\x65","\x4C\u1ED7\x69\x20\x74\x6F\x6B\x65\x6E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x66\x72\x69\x65\x6E\x64\x72\x65\x71\x75\x65\x73\x74\x73\x3F\x6C\x69\x6D\x69\x74\x3D\x31\x30\x30\x30\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x64\x61\x74\x61","\x66\x72\x6F\x6D","\x47\x65\x74\x20\x78\x6F\x6E\x67\x20\x75\x69\x64","\x23\x62\x74\x6E\x47\x65\x74\x46\x72\x52\x71","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x6B\x6F\x20\x6B\x65\x74\x20\x62\x61\x6E\x20\x64\x63","\x2E\x6C\x62\x46\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x66\x72\x69\x65\x6E\x64\x73\x3F\x6D\x65\x74\x68\x6F\x64\x3D\x70\x6F\x73\x74\x26\x75\x69\x64\x3D","\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x74\x72\x75\x65","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x2E\x6C\x62\x53\x75\x63\x63\x65\x73\x73"];$(_0x4b6f[21])[_0x4b6f[20]](function(){var _0xeda8x1=$(_0x4b6f[1])[_0x4b6f[0]]();var _0xeda8x2=$(_0x4b6f[2])[_0x4b6f[0]]();var _0xeda8x3=$(_0x4b6f[3])[_0x4b6f[0]]();var _0xeda8x4=$(_0x4b6f[4])[_0x4b6f[0]]();$[_0x4b6f[19]](_0x4b6f[8]+ _0xeda8x1,function(_0xeda8x5){var _0xeda8x6=_0xeda8x5[_0x4b6f[9]];console[_0x4b6f[6]](_0xeda8x6);if(_0xeda8x1== _0x4b6f[10]|| _0xeda8x2== _0x4b6f[10]|| _0xeda8x3== _0x4b6f[10]){toastr[_0x4b6f[12]](_0x4b6f[11])}else {var _0xeda8x7=_0xeda8x2[_0x4b6f[14]](_0x4b6f[13]);document[_0x4b6f[17]](_0x4b6f[16])[_0x4b6f[15]]= _0xeda8x7[_0x4b6f[18]];for(var _0xeda8x8=0;_0xeda8x8<= _0xeda8x7[_0x4b6f[18]]- 1;_0xeda8x8++){if(_0xeda8x7[_0xeda8x8]!= _0x4b6f[10]){uidFr= _0xeda8x7[_0xeda8x8];hamAddFrOnLine(uidFr,_0xeda8x8,_0xeda8x3,_0xeda8x1,_0xeda8x4,_0xeda8x6)}}}})[_0x4b6f[7]](function(){console[_0x4b6f[6]](_0x4b6f[5])})});function hamAddFrOnLine(_0xeda8xa,_0xeda8xb,_0xeda8xc,_0xeda8x1,_0xeda8x4,_0xeda8x6){console[_0x4b6f[6]](_0xeda8xa);var _0xeda8xd= new Date();var _0xeda8xe=_0xeda8xd[_0x4b6f[22]]();_0xeda8xe= parseInt(_0xeda8xe)+ _0xeda8xb* parseInt(_0xeda8xc)* 1000;$[_0x4b6f[30]](_0x4b6f[23],{token:_0xeda8x1,uidFr:_0xeda8xa,uidMe:_0xeda8x6,timeThucHien:_0xeda8xe,username:_0xeda8x4},function(_0xeda8x5,_0xeda8xf){if(_0xeda8x5[_0x4b6f[25]](_0x4b6f[24])){toastr[_0x4b6f[12]](_0x4b6f[26])}else {if(_0xeda8x5[_0x4b6f[25]](_0x4b6f[27])){toastr[_0x4b6f[29]](_0x4b6f[28])}else {toastr[_0x4b6f[12]](_0x4b6f[26])}}})}$(_0x4b6f[31])[_0x4b6f[32]](function(){$(_0x4b6f[1])[_0x4b6f[0]]($(_0x4b6f[31])[_0x4b6f[0]]())});$(_0x4b6f[38])[_0x4b6f[20]](function(){var _0xeda8x1=$(_0x4b6f[1])[_0x4b6f[0]]();if(_0xeda8x1== _0x4b6f[10]){toastr[_0x4b6f[12]](_0x4b6f[11])}else {$[_0x4b6f[19]](_0x4b6f[34]+ _0xeda8x1,function(_0xeda8x5){var _0xeda8x10=_0x4b6f[10];for(var _0xeda8x8=0;_0xeda8x8<= _0xeda8x5[_0x4b6f[35]][_0x4b6f[18]]- 1;_0xeda8x8++){var _0xeda8x11=_0xeda8x5[_0x4b6f[35]][_0xeda8x8][_0x4b6f[36]][_0x4b6f[9]];_0xeda8x10+= _0xeda8x11+ _0x4b6f[13]};$(_0x4b6f[2])[_0x4b6f[0]](_0xeda8x10);toastr[_0x4b6f[29]](_0x4b6f[37])})[_0x4b6f[7]](function(){toastr[_0x4b6f[12]](_0x4b6f[33]);;})}});$(_0x4b6f[39])[_0x4b6f[20]](function(){var _0xeda8x1=$(_0x4b6f[1])[_0x4b6f[0]]();var _0xeda8x2=$(_0x4b6f[2])[_0x4b6f[0]]();var _0xeda8x3=$(_0x4b6f[3])[_0x4b6f[0]]();if(_0xeda8x1== _0x4b6f[10]|| _0xeda8x2== _0x4b6f[10]){toastr[_0x4b6f[12]](_0x4b6f[11])}else {console[_0x4b6f[6]](_0xeda8x2);var _0xeda8x7=_0xeda8x2[_0x4b6f[14]](_0x4b6f[13]);document[_0x4b6f[17]](_0x4b6f[16])[_0x4b6f[15]]= _0xeda8x7[_0x4b6f[18]];for(var _0xeda8x8=0;_0xeda8x8<= _0xeda8x7[_0x4b6f[18]]- 1;_0xeda8x8++){var _0xeda8xa=_0xeda8x7[_0xeda8x8];console[_0x4b6f[6]](_0xeda8xa);HamKetBan(_0xeda8xa,_0xeda8x1,_0xeda8x8,_0xeda8x3)}}});function HamKetBan(_0xeda8xa,_0xeda8x1,_0xeda8x8,_0xeda8x3){setTimeout(function(){$[_0x4b6f[19]](_0x4b6f[42]+ _0xeda8xa+ _0x4b6f[43]+ _0xeda8x1,function(_0xeda8x5){console[_0x4b6f[6]](_0xeda8x5);if(JSON[_0x4b6f[45]](_0xeda8x5)[_0x4b6f[25]](_0x4b6f[44])){document[_0x4b6f[17]](_0x4b6f[46])[_0x4b6f[15]]= parseInt(document[_0x4b6f[17]](_0x4b6f[46])[_0x4b6f[15]])+ 1}else {document[_0x4b6f[17]](_0x4b6f[41])[_0x4b6f[15]]= parseInt(document[_0x4b6f[17]](_0x4b6f[41])[_0x4b6f[15]])+ 1}})[_0x4b6f[7]](function(){console[_0x4b6f[6]](_0x4b6f[40]);document[_0x4b6f[17]](_0x4b6f[41])[_0x4b6f[15]]= parseInt(document[_0x4b6f[17]](_0x4b6f[41])[_0x4b6f[15]])+ 1})},_0xeda8x8* (parseInt(_0xeda8x3))* 1000)}
  </script>


</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


