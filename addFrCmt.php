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
    <h5>AUTO Add Friends bằng Access Token</h5>
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


    <b>* Access Token:</b><br>
    <input class="form-control" id="token" placeholder="" /><br>
       
       <b>* Nội dung muốn cmt:</b><br>
    <input class="form-control" id="ndungCmt" placeholder="" / value="Kết bạn làm quen nhé cậu =))"><br>

    <b>* List Uid <label type="submit" id="btnXoa" class="btn btn-success">Xóa trắng</label>
    </b><br>
    
     <textarea class="form-control" id="listUid" placeholder="Mỗi UID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>



    <b>* Khoảng cách giữa 2 lần gửi yêu cầu (Giây):</b><br>
    <input class="form-control" id="timeDelay" value="50" /><br>



 <button type="submit" id="btnLogin" class="btn btn-success">Submit</button>

<button type="button" class="btn btn-danger" style="float: right;">Số bài đã comment thất bại <span class="badge lbFail">0</span></button>
 <button type="button" class="btn btn-success" style="float: right;">Số bài đã comment thành công <span class="badge lbSuccess">0</span></button>
 <button type="button" class="btn btn-default" style="float: right;">Tổng số bài <span class="badge lbTotal">0</span></button>


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
  var _0xe8fd=["\x76\x61\x6C","\x23\x73\x65\x6C\x31\x4E\x69\x63\x6B","\x23\x74\x6F\x6B\x65\x6E","\x63\x68\x61\x6E\x67\x65","\x23\x6C\x69\x73\x74\x55\x69\x64","\x0A","\x73\x70\x6C\x69\x74","","\x6C\x65\x6E\x67\x74\x68","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x58\x6F\x61","\x23\x6E\x64\x75\x6E\x67\x43\x6D\x74","\x23\x74\x69\x6D\x65\x44\x65\x6C\x61\x79","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x2E\x6C\x62\x54\x6F\x74\x61\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x6C\x6F\x67","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E","\x6B\x6F\x20\x6B\x65\x74\x20\x62\x61\x6E\x20\x64\x63","\x2E\x6C\x62\x46\x61\x69\x6C","\x66\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F","\x2F\x66\x65\x65\x64\x3F\x66\x69\x65\x6C\x64\x73\x3D\x70\x72\x69\x76\x61\x63\x79\x2C\x69\x64\x2C\x6C\x69\x6B\x65\x73\x26\x6C\x69\x6D\x69\x74\x3D\x31\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x69\x64","\x64\x61\x74\x61","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x31\x2E\x30\x2F","\x2F\x63\x6F\x6D\x6D\x65\x6E\x74\x73\x3F\x6D\x65\x73\x73\x61\x67\x65\x3D","\x26\x6D\x65\x74\x68\x6F\x64\x3D\x70\x6F\x73\x74\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x26\x68\x63\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3D\x75\x66\x69","\x69\x6E\x63\x6C\x75\x64\x65\x73","\x73\x74\x72\x69\x6E\x67\x69\x66\x79","\x2E\x6C\x62\x53\x75\x63\x63\x65\x73\x73","\x67\x65\x74"];$(_0xe8fd[1])[_0xe8fd[3]](function(){$(_0xe8fd[2])[_0xe8fd[0]]($(_0xe8fd[1])[_0xe8fd[0]]())});$(_0xe8fd[10])[_0xe8fd[9]](function(){var _0xd1dcx1=$(_0xe8fd[4])[_0xe8fd[0]]();var _0xd1dcx2=_0xd1dcx1[_0xe8fd[6]](_0xe8fd[5]);var _0xd1dcx3=_0xe8fd[7];for(var _0xd1dcx4=0;_0xd1dcx4<= _0xd1dcx2[_0xe8fd[8]]- 1;_0xd1dcx4++){if(_0xd1dcx2[_0xd1dcx4]!= _0xe8fd[7]){_0xd1dcx3+= _0xd1dcx2[_0xd1dcx4]+ _0xe8fd[5]}};$(_0xe8fd[4])[_0xe8fd[0]](_0xd1dcx3)});$(_0xe8fd[19])[_0xe8fd[9]](function(){var _0xd1dcx5=$(_0xe8fd[2])[_0xe8fd[0]]();var _0xd1dcx6=$(_0xe8fd[11])[_0xe8fd[0]]();var _0xd1dcx1=$(_0xe8fd[4])[_0xe8fd[0]]();var _0xd1dcx7=$(_0xe8fd[12])[_0xe8fd[0]]();if(_0xd1dcx5== _0xe8fd[7]|| _0xd1dcx6== _0xe8fd[7]|| _0xd1dcx1== _0xe8fd[7]|| _0xd1dcx7== _0xe8fd[7]){toastr[_0xe8fd[14]](_0xe8fd[13])}else {var _0xd1dcx2=_0xd1dcx1[_0xe8fd[6]](_0xe8fd[5]);document[_0xe8fd[17]](_0xe8fd[16])[_0xe8fd[15]]= _0xd1dcx2[_0xe8fd[8]];for(var _0xd1dcx4=0;_0xd1dcx4<= _0xd1dcx2[_0xe8fd[8]]- 1;_0xd1dcx4++){var _0xd1dcx8=_0xd1dcx2[_0xd1dcx4];console[_0xe8fd[18]](_0xd1dcx8);HamGetNewPostAndCmt(_0xd1dcx8,_0xd1dcx5,_0xd1dcx4,_0xd1dcx7,_0xd1dcx6)}}});function HamGetNewPostAndCmt(_0xd1dcx8,_0xd1dcx5,_0xd1dcx4,_0xd1dcxa,_0xd1dcx6){setTimeout(function(){$[_0xe8fd[34]](_0xe8fd[23]+ _0xd1dcx8+ _0xe8fd[24]+ _0xd1dcx5,function(_0xd1dcxb){var _0xd1dcxc=_0xd1dcxb[_0xe8fd[26]][0][_0xe8fd[25]];var _0xd1dcxd=_0xe8fd[27]+ _0xd1dcxc+ _0xe8fd[28]+ _0xd1dcx6+ _0xe8fd[29]+ _0xd1dcx5+ _0xe8fd[30];_0xd1dcxd= encodeURI(_0xd1dcxd);$[_0xe8fd[34]](_0xd1dcxd,function(_0xd1dcxb){if(JSON[_0xe8fd[32]](_0xd1dcxb)[_0xe8fd[31]](_0xe8fd[25])){document[_0xe8fd[17]](_0xe8fd[33])[_0xe8fd[15]]= parseInt(document[_0xe8fd[17]](_0xe8fd[33])[_0xe8fd[15]])+ 1}else {document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]]= parseInt(document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]])+ 1}})[_0xe8fd[22]](function(){document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]]= parseInt(document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]])+ 1})})[_0xe8fd[22]](function(){console[_0xe8fd[18]](_0xe8fd[20]);document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]]= parseInt(document[_0xe8fd[17]](_0xe8fd[21])[_0xe8fd[15]])+ 1})},_0xd1dcx4* (parseInt(_0xd1dcxa))* 1000)}


  </script>



</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


