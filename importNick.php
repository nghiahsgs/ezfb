
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php
$servername = "localhost";
$username = "u380514009_nghia";
$password = "261997";
$dbname = "u380514009_ezfb";

$tbName='tblistNick';
?>

<!-- hóng sumit update-->
<?php 
  
   if (isset($_POST['submitUpdate'])){
     //echo $_POST['dateTimeAdd'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failedvv: " . $conn->connect_error);
} 

// $sql = "UPDATE `".$tbname."` SET `id`='".$_POST['id']."', `toolName`='".$_POST['toolName']."', `user`='".$_POST['user']."', `active`='".$_POST['active']."'";


$sql="UPDATE `".$tbName."` SET `token`='".$_POST['token']."',`group`='".$_POST['group']."'  WHERE id=".$_POST['id'];

//echo $sql;
//echo "<hr>".$sql;
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
//header('Location: http://ezfb.top/');
//header("Location: login.php");
unset($_POST);
?>

<script> window.location = "http://ezfb.top/importNick.php"; </script>
<?php

   }
 ?>
<!-- end hóng submit -->


<!-- hóng sumit delete-->
<?php 
  
   if (isset($_POST['submitDelete'])){
     //echo $_POST['dateTimeAdd'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failedvv: " . $conn->connect_error);
} 

// $sql = "UPDATE `".$tbname."` SET `id`='".$_POST['id']."', `toolName`='".$_POST['toolName']."', `user`='".$_POST['user']."', `active`='".$_POST['active']."'";


$sql="DELETE FROM `".$tbName."` WHERE id=".$_POST['id'];

//echo $sql;
//echo "<hr>".$sql;
if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
  //  echo "Error updating record: " . $conn->error;
}

$conn->close();
//header('Location: http://ezfb.top/listnickthatim.php');
//header('Location: http://khachhangqrcode.nghiahsgs.com/admin/index.php');
unset($_POST);

?>
<script> window.location = "http://ezfb.top/importNick.php"; </script>
<?php
   }
 ?>

<!-- end hóng submit -->


 <?php 
include('config.php');
session_start();

if(empty($_SESSION['username'])){
  session_destroy();
  //echo "dkm";
  //header('http://localhost/buffLikeRealTime/Like24hNghiahsgs/index.php');

  header('Location: http://ezfb.top');
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


<?php 
echo "<input type='hidden' id='username' name='username' value='".$_SESSION['username']."'>";
 ?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Import nick (click vào nút backup đợi khoảng 30s r quay lại là back up thành công )</div>
        <div class="card-body">

            
    </b><br>
    <b>* Group Name (Tên để nhóm các nick lại ):</b><br>
    <input class="form-control" id="group" placeholder="" /><br>
    
     <textarea class="form-control" id="listToken" placeholder="Mỗi token cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>

<label type="submit" id="btnCheck" class="btn btn-success">Import</label>
<label type="submit" id="btnCheckLive" class="btn btn-success">Update các acc</label>

      <div class="table-responsive">
            <table class="table table-bordered tableListNick" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  
                  <th>Id</th>
                   <th>Name</th>
                  <th>UID</th>
                  <th>Birthday</th>
                 
                  <th>Fr Count</th>
                 <th>Fr rq</th>
                 <th>Group Joined</th>
                 <th>Page number</th>
                 <th>Back Up</th>
                 <th>Xem Back Up</th>
                 <th>Group</th>
                  
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>Id</th>
                   <th>Name</th>
                  <th>UID</th>
                  <th>Birthday</th>
                 
                  <th>Fr Count</th>
                 <th>Fr rq</th>
                 <th>Group Joined</th>
                 <th>Page number</th>
                 <th>Back Up</th>
                 <th>Xem Back Up</th>
                  <th>Group</th>
                 
                  
                </tr>
              </tfoot>
              <tbody>
               
<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$tbName='tblistNick';

$sql = "SELECT `id`, `username`, `token`, `name`, `uid`, `birthday`, `soPage`, `soFriend`, `soFriendRq`, `soGroup`, `status`, `group` FROM `".$tbName."` WHERE `username`='".$_SESSION['username']."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo "<tr>";
        // echo "<td>".$row["token"]."</td>";



 if($row["status"]=='die'){
            //echo "<td style='color:red;font-weight: bold;'>".$row["status"]."</td>";
            echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-danger">'.$row["id"].'</a></td>';
          }else{
            echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-primary">'.$row["id"].'</a></td>';
          }


echo '<div style="display: none;" id="'.$row["id"].'" class="animated-modal">
 <form method="POST" action="http://ezfb.top/importNick.php">


                        
                        <div class="form-group">
                        <input type="hidden" name="id"  class="form-control"  value="'.$row["id"].'">

                        Tên group  <br>  
                            <input type="text" name="group" id="group"  class="form-control"  value="'.$row["group"].'">
                     
                     Token  <br>
                            <input type="text" name="token" id="token" placeholder="Nhập token full quyền" class="form-control"  value="'.$row["token"].'">

                           
                        </div>


                         

                         <div class="text-center">
                           <button  type="submit" name="submitUpdate" class="btn btn-primary">Submit</button>
         <button  type="submit" name="submitDelete" class="btn btn-warning">Xóa</button>
                        </div>

 
</form>
</div>';





        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["uid"]."</td>";
        echo "<td>".$row["birthday"]."</td>";
         echo "<td>".$row["soFriend"]."</td>";
           echo "<td>".$row["soFriendRq"]."</td>";
           echo "<td>".$row["soGroup"]."</td>";
        echo "<td>".$row["soPage"]."</td>";
       
      
        
      
     echo "<td><a href='/backUp/autoBackUp.php?token=".$row["token"]."'>Back Up</a></td>";
    
    $ndungFile=file_get_contents('backUp/'.$row["uid"].'.txt');
   // echo   $ndungFile;
if($ndungFile!=""){
  echo "<td><a href='/backUp/ketqua.php?uid=".$row["uid"]."'>Đã Back Up</a></td>";
}else{
   echo "<td>Chưa có</td>";
}
     





 echo "<td>".$row["group"]."</td>";


        //intval($row["timeAdd"])


        
       
         echo "</tr>";


    }
} else {
   // echo "0 results";
}
$conn->close();
?>
             
                
              </tbody>
            </table>
          </div>



        </div>
        
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- /.content-wrapper-->
    <?php  include('footer.php'); ?> 

   <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>

  </div>
</body>


<script type="text/javascript">
var _0x9153=["\x23\x74\x6F\x6B\x65\x6E","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72\x41\x6C\x6C","\x76\x61\x6C","\x23\x75\x73\x65\x72\x6E\x61\x6D\x65","\x6C\x65\x6E\x67\x74\x68","\x76\x61\x6C\x75\x65","\x6C\x6F\x67","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x74\x64","\x74\x72","\x74\x62\x6F\x64\x79","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x72\x65\x6D\x6F\x76\x65","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x43\x68\x65\x63\x6B\x4C\x69\x76\x65","\x75\x70\x64\x61\x74\x65\x49\x6D\x70\x6F\x72\x74\x2E\x70\x68\x70","\x64\x69\x65","\x31","\x69\x6E\x63\x6C\x75\x64\x65\x73","\x69\x6D\x70\x6F\x72\x74\x20\x73\x75\x63\x63\x65\x73\x73","\x73\x75\x63\x63\x65\x73\x73","\u0110\xE3\x20\x63\xF3\x20\x6C\u1ED7\x69\x20\x78\u1EA3\x79\x20\x72\x61","\x65\x72\x72\x6F\x72","\x70\x6F\x73\x74","\x66\x61\x69\x6C","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x61\x63\x63\x6F\x75\x6E\x74\x73\x3F\x6C\x69\x6D\x69\x74\x3D\x31\x30\x30\x30\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x64\x61\x74\x61","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x33\x2E\x30\x2F\x6D\x65\x2F\x66\x72\x69\x65\x6E\x64\x73\x3F\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x74\x6F\x74\x61\x6C\x5F\x63\x6F\x75\x6E\x74","\x73\x75\x6D\x6D\x61\x72\x79","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x66\x72\x69\x65\x6E\x64\x72\x65\x71\x75\x65\x73\x74\x73\x3F\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x2F\x67\x72\x6F\x75\x70\x73\x3F\x6C\x69\x6D\x69\x74\x3D\x31\x30\x30\x30\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x67\x72\x61\x70\x68\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x6D\x65\x3F\x66\x69\x65\x6C\x64\x73\x3D\x69\x64\x2C\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x6E\x61\x6D\x65\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D","\x69\x64","\x62\x69\x72\x74\x68\x64\x61\x79","\x6E\x61\x6D\x65","\x3C\x74\x72\x3E","\x3C\x74\x64\x3E\x3C\x2F\x74\x64\x3E","\x3C\x74\x64\x3E","\x3C\x2F\x74\x64\x3E","\x3C\x74\x64\x3E\x3C\x61\x20\x68\x72\x65\x66\x3D\x22\x2F\x62\x61\x63\x6B\x55\x70\x2F\x61\x75\x74\x6F\x42\x61\x63\x6B\x55\x70\x2E\x70\x68\x70\x3F\x74\x6F\x6B\x65\x6E\x3D","\x22\x3E\x42\x61\x63\x6B\x20\x55\x70\x3C\x2F\x61\x3E\x3C\x2F\x74\x64\x3E","\x3C\x74\x64\x3E\x3C\x61\x20\x68\x72\x65\x66\x3D\x22\x2F\x62\x61\x63\x6B\x55\x70\x2F\x6B\x65\x74\x71\x75\x61\x2E\x70\x68\x70\x3F\x75\x69\x64\x3D","\x22\x3E\x58\x65\x6D\x20\x62\x61\x63\x6B\x20\x75\x70\x3C\x2F\x61\x3E\x3C\x2F\x74\x64\x3E","\x3C\x2F\x74\x72\x3E","\x61\x70\x70\x65\x6E\x64","\x2E\x74\x61\x62\x6C\x65\x4C\x69\x73\x74\x4E\x69\x63\x6B\x20\x74\x62\x6F\x64\x79","\x6C\x69\x76\x65","\x67\x65\x74","\x23\x6C\x69\x73\x74\x54\x6F\x6B\x65\x6E","\x23\x67\x72\x6F\x75\x70","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x0A","\x73\x70\x6C\x69\x74","\x23\x62\x74\x6E\x43\x68\x65\x63\x6B","\x78\x75\x4C\x79\x49\x6D\x70\x6F\x72\x74\x2E\x70\x68\x70"];$(_0x9153[14])[_0x9153[13]](function(){var _0x7fc2x1=document[_0x9153[1]](_0x9153[0]);var _0x7fc2x2=$(_0x9153[3])[_0x9153[2]]();for(var _0x7fc2x3=0;_0x7fc2x3<= _0x7fc2x1[_0x9153[4]]- 1;_0x7fc2x3++){var _0x7fc2x4=_0x7fc2x1[_0x7fc2x3][_0x9153[5]];console[_0x9153[6]](_0x7fc2x4);var _0x7fc2x5=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[1][_0x9153[7]];var _0x7fc2x6=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[3][_0x9153[7]];var _0x7fc2x7=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[4][_0x9153[7]];var _0x7fc2x8=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[5][_0x9153[7]];var _0x7fc2x9=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[6][_0x9153[7]];var _0x7fc2xa=document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[1]](_0x9153[8])[7][_0x9153[7]];document[_0x9153[11]](_0x9153[10])[_0x9153[1]](_0x9153[9])[0][_0x9153[12]]();hamUpdateInfo(_0x7fc2x4,_0x7fc2x2,_0x7fc2x5,_0x7fc2x6,_0x7fc2x7,_0x7fc2x8,_0x7fc2x9,_0x7fc2xa)}});function hamUpdateInfo(_0x7fc2x4,_0x7fc2x2,_0x7fc2x5,_0x7fc2x6,_0x7fc2x7,_0x7fc2x8,_0x7fc2x9,_0x7fc2xa){$[_0x9153[48]](_0x9153[25]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2xa=_0x7fc2xc[_0x9153[26]][_0x9153[4]];console[_0x9153[6]](_0x7fc2xa);$[_0x9153[48]](_0x9153[27]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x7=_0x7fc2xc[_0x9153[29]][_0x9153[28]];console[_0x9153[6]](_0x7fc2x7);$[_0x9153[48]](_0x9153[30]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x8=_0x7fc2xc[_0x9153[29]][_0x9153[28]];console[_0x9153[6]](_0x7fc2x8);$[_0x9153[48]](_0x9153[31]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x9=_0x7fc2xc[_0x9153[26]][_0x9153[4]];console[_0x9153[6]](_0x7fc2x9);$[_0x9153[48]](_0x9153[32]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2xe=_0x7fc2xc[_0x9153[33]];console[_0x9153[6]](_0x7fc2xe);var _0x7fc2x6=_0x7fc2xc[_0x9153[34]];console[_0x9153[6]](_0x7fc2x6);var _0x7fc2x5=_0x7fc2xc[_0x9153[35]];console[_0x9153[6]](_0x7fc2x5);var _0x7fc2xf=_0x9153[36];_0x7fc2xf+= _0x9153[37];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x5+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2xe+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x6+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x7+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x8+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x9+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2xa+ _0x9153[39];_0x7fc2xf+= _0x9153[40]+ _0x7fc2x4+ _0x9153[41];_0x7fc2xf+= _0x9153[42]+ _0x7fc2xe+ _0x9153[43];_0x7fc2xf+= _0x9153[44];console[_0x9153[6]](_0x7fc2xf);$(_0x9153[46])[_0x9153[45]](_0x7fc2xf);$[_0x9153[23]](_0x9153[15],{username:_0x7fc2x2,name:_0x7fc2x5,uid:_0x7fc2xe,birthday:_0x7fc2x6,soFriend:_0x7fc2x7,soFriendRq:_0x7fc2x8,soGroup:_0x7fc2x9,soPage:_0x7fc2xa,token:_0x7fc2x4,status:_0x9153[47]},function(_0x7fc2xc,_0x7fc2xd){console[_0x9153[6]](_0x7fc2xc);if(_0x7fc2xc[_0x9153[18]](_0x9153[17])){toastr[_0x9153[20]](_0x9153[19])}else {toastr[_0x9153[22]](_0x9153[21])}})})})})})})[_0x9153[24]](function(){$[_0x9153[23]](_0x9153[15],{username:_0x7fc2x2,name:_0x7fc2x5,birthday:_0x7fc2x6,soFriend:_0x7fc2x7,soFriendRq:_0x7fc2x8,soGroup:_0x7fc2x9,soPage:_0x7fc2xa,token:_0x7fc2x4,status:_0x9153[16]},function(_0x7fc2xc,_0x7fc2xd){console[_0x9153[6]](_0x7fc2xc);if(_0x7fc2xc[_0x9153[18]](_0x9153[17])){toastr[_0x9153[20]](_0x9153[19])}else {toastr[_0x9153[22]](_0x9153[21])}})})}$(_0x9153[55])[_0x9153[13]](function(){var _0x7fc2x10=$(_0x9153[49])[_0x9153[2]]();var _0x7fc2x2=$(_0x9153[3])[_0x9153[2]]();var _0x7fc2x11=$(_0x9153[50])[_0x9153[2]]();if(_0x7fc2x10== _0x9153[51]){toastr[_0x9153[22]](_0x9153[52])}else {console[_0x9153[6]](_0x7fc2x10);var _0x7fc2x12=_0x7fc2x10[_0x9153[54]](_0x9153[53]);for(var _0x7fc2x3=0;_0x7fc2x3<= _0x7fc2x12[_0x9153[4]]- 1;_0x7fc2x3++){var _0x7fc2x4=_0x7fc2x12[_0x7fc2x3];console[_0x9153[6]](_0x7fc2x4);console[_0x9153[6]](_0x7fc2x2);hamCheckInfo(_0x7fc2x4,_0x7fc2x2,_0x7fc2x11)}}});function hamCheckInfo(_0x7fc2x4,_0x7fc2x2,_0x7fc2x11){$[_0x9153[48]](_0x9153[25]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2xa=_0x7fc2xc[_0x9153[26]][_0x9153[4]];console[_0x9153[6]](_0x7fc2xa);$[_0x9153[48]](_0x9153[27]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x7=_0x7fc2xc[_0x9153[29]][_0x9153[28]];console[_0x9153[6]](_0x7fc2x7);$[_0x9153[48]](_0x9153[30]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x8=_0x7fc2xc[_0x9153[29]][_0x9153[28]];console[_0x9153[6]](_0x7fc2x8);$[_0x9153[48]](_0x9153[31]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2x9=_0x7fc2xc[_0x9153[26]][_0x9153[4]];console[_0x9153[6]](_0x7fc2x9);$[_0x9153[48]](_0x9153[32]+ _0x7fc2x4,function(_0x7fc2xc){var _0x7fc2xe=_0x7fc2xc[_0x9153[33]];console[_0x9153[6]](_0x7fc2xe);var _0x7fc2x6=_0x7fc2xc[_0x9153[34]];console[_0x9153[6]](_0x7fc2x6);var _0x7fc2x5=_0x7fc2xc[_0x9153[35]];console[_0x9153[6]](_0x7fc2x5);var _0x7fc2xf=_0x9153[36];_0x7fc2xf+= _0x9153[37];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x5+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2xe+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x6+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x7+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x8+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x9+ _0x9153[39];_0x7fc2xf+= _0x9153[38]+ _0x7fc2xa+ _0x9153[39];_0x7fc2xf+= _0x9153[40]+ _0x7fc2x4+ _0x9153[41];_0x7fc2xf+= _0x9153[42]+ _0x7fc2xe+ _0x9153[43];_0x7fc2xf+= _0x9153[38]+ _0x7fc2x11+ _0x9153[39];_0x7fc2xf+= _0x9153[44];console[_0x9153[6]](_0x7fc2xf);$(_0x9153[46])[_0x9153[45]](_0x7fc2xf);$[_0x9153[23]](_0x9153[56],{username:_0x7fc2x2,name:_0x7fc2x5,uid:_0x7fc2xe,birthday:_0x7fc2x6,soFriend:_0x7fc2x7,soFriendRq:_0x7fc2x8,soGroup:_0x7fc2x9,soPage:_0x7fc2xa,token:_0x7fc2x4,group:_0x7fc2x11,status:_0x9153[47]},function(_0x7fc2xc,_0x7fc2xd){if(_0x7fc2xc[_0x9153[18]](_0x9153[17])){toastr[_0x9153[20]](_0x9153[19])}else {toastr[_0x9153[22]](_0x9153[21])}})})})})})})}
</script>

</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>

