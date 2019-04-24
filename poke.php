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
    <h5>Chọc cả thế giới</h5>
  </div>
  

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

    
   
   <b>Token nick:</b>
     <input class="form-control" id="tokenChinh" placeholder="" /><br>
    
    <label type="submit" id="btnGetAllBanBe" class="btn btn-success">Get all bạn bè</label> <br>

    <b>* List bạn bè:<label type="submit" id="btnXoa" class="btn btn-success">Xóa trắng</label>
    </b><br>
      <textarea class="form-control" id="listUid" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>

      <b>* Khoảng cách giữa 2 lần gửi yêu cầu (Giây):</b><br>
    <input class="form-control" id="time2Fr" value="50" /><br>

    

 <button type="submit" id="btnLogin" class="btn btn-success">Chọc</button>

<button type="button" class="btn btn-danger" style="float: right;">Số bạn đã chọc thất bại <span class="badge lbFail">0</span></button>
 <button type="button" class="btn btn-success" style="float: right;">Số bạn đã chọc thành công <span class="badge lbSuccess">0</span></button>
 <button type="button" class="btn btn-default" style="float: right;">Tổng số bạn <span class="badge lbTotal">0</span></button>
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
var _0x3236=["\x76\x61\x6C","\x23\x73\x65\x6C\x31\x4E\x69\x63\x6B","\x23\x74\x6F\x6B\x65\x6E\x43\x68\x69\x6E\x68","\x63\x68\x61\x6E\x67\x65","\x23\x6C\x69\x73\x74\x55\x69\x64","\x0A","\x73\x70\x6C\x69\x74","","\x6C\x65\x6E\x67\x74\x68","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x58\x6F\x61","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x66\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x66\x72\x69\x65\x6E\x64\x73\x3F\x6C\x69\x6D\x69\x74\x3D\x35\x30\x30\x30\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x64\x61\x74\x61","\x69\x64","\x6C\x6F\x67","\x61\x70\x70\x65\x6E\x64","\x67\x65\x74","\x23\x62\x74\x6E\x47\x65\x74\x41\x6C\x6C\x42\x61\x6E\x42\x65","\x23\x74\x69\x6D\x65\x32\x46\x72","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x6B\x6F\x20\x6C\x69\x6B\x65\x20\x64\x63","\x2E\x6C\x62\x46\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F","\x2F\x70\x6F\x6B\x65\x73\x3F\x6D\x65\x74\x68\x6F\x64\x3D\x70\x6F\x73\x74\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x74\x72\x75\x65","\x69\x6E\x63\x6C\x75\x64\x65\x73","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x2E\x6C\x62\x53\x75\x63\x63\x65\x73\x73"];$(_0x3236[1])[_0x3236[3]](function(){$(_0x3236[2])[_0x3236[0]]($(_0x3236[1])[_0x3236[0]]())});$(_0x3236[10])[_0x3236[9]](function(){var _0x4c9cx1=$(_0x3236[4])[_0x3236[0]]();var _0x4c9cx2=_0x4c9cx1[_0x3236[6]](_0x3236[5]);var _0x4c9cx3=_0x3236[7];for(var _0x4c9cx4=0;_0x4c9cx4<= _0x4c9cx2[_0x3236[8]]- 1;_0x4c9cx4++){if(_0x4c9cx2[_0x4c9cx4]!= _0x3236[7]){_0x4c9cx3+= _0x4c9cx2[_0x4c9cx4]+ _0x3236[5]}};$(_0x3236[4])[_0x3236[0]](_0x4c9cx3)});$(_0x3236[20])[_0x3236[9]](function(){var _0x4c9cx5=$(_0x3236[2])[_0x3236[0]]();if(_0x4c9cx5== _0x3236[7]){toastr[_0x3236[12]](_0x3236[11])}else {$[_0x3236[19]](_0x3236[14]+ _0x4c9cx5,function(_0x4c9cx6){for(var _0x4c9cx4=0;_0x4c9cx4<= _0x4c9cx6[_0x3236[15]][_0x3236[8]]- 1;_0x4c9cx4++){var _0x4c9cx7=_0x4c9cx6[_0x3236[15]][_0x4c9cx4][_0x3236[16]];console[_0x3236[17]](_0x4c9cx7);$(_0x3236[4])[_0x3236[18]](_0x4c9cx7+ _0x3236[5])}})[_0x3236[13]](function(){})}});$(_0x3236[25])[_0x3236[9]](function(){var _0x4c9cx8=$(_0x3236[4])[_0x3236[0]]();var _0x4c9cx5=$(_0x3236[2])[_0x3236[0]]();var _0x4c9cx9=$(_0x3236[21])[_0x3236[0]]();if(_0x4c9cx5== _0x3236[7]|| _0x4c9cx8== _0x3236[7]|| _0x4c9cx9== _0x3236[7]){toastr[_0x3236[12]](_0x3236[11])}else {var _0x4c9cx2=_0x4c9cx8[_0x3236[6]](_0x3236[5]);document[_0x3236[24]](_0x3236[23])[_0x3236[22]]= _0x4c9cx2[_0x3236[8]];for(var _0x4c9cx4=0;_0x4c9cx4<= _0x4c9cx2[_0x3236[8]]- 1;_0x4c9cx4++){var _0x4c9cxa=_0x4c9cx2[_0x4c9cx4];console[_0x3236[17]](_0x4c9cxa);HamChoc(_0x4c9cx5,_0x4c9cxa,_0x4c9cx4,_0x4c9cx9)}}});function HamChoc(_0x4c9cx5,_0x4c9cxa,_0x4c9cx4,_0x4c9cx9){setTimeout(function(){$[_0x3236[19]](_0x3236[28]+ _0x4c9cxa+ _0x3236[29]+ _0x4c9cx5,function(_0x4c9cx6){console[_0x3236[17]](_0x4c9cx6);if(JSON[_0x3236[32]](_0x4c9cx6)[_0x3236[31]](_0x3236[30])){document[_0x3236[24]](_0x3236[33])[_0x3236[22]]= parseInt(document[_0x3236[24]](_0x3236[33])[_0x3236[22]])+ 1}else {document[_0x3236[24]](_0x3236[27])[_0x3236[22]]= parseInt(document[_0x3236[24]](_0x3236[27])[_0x3236[22]])+ 1}})[_0x3236[13]](function(){console[_0x3236[17]](_0x3236[26]);document[_0x3236[24]](_0x3236[27])[_0x3236[22]]= parseInt(document[_0x3236[24]](_0x3236[27])[_0x3236[22]])+ 1})},_0x4c9cx4* (parseInt(_0x4c9cx9))* 1000)}
  </script>


</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


