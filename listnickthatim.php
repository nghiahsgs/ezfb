
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
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

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php

$servername = "localhost";
$username = "u380514009_nghia";
$password = "261997";
$dbname = "u380514009_ezfb";
$tbName='tbthatimclone';
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

$sql="UPDATE `".$tbName."` SET `token`='".$_POST['token']."',`name`='".$_POST['name']."',`typeLove`='".$_POST['typeLove']."',`speed`='".$_POST['speed']."',`loaiCamXuc`='".$_POST['loaiCamXuc']."',`ndungCmt`='".$_POST['ndungCmt']."',`linkAnhCmt`='".$_POST['linkAnhCmt']."' WHERE id=".$_POST['id'];

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

<script> window.location = "http://ezfb.top/listnickthatim.php"; </script>
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
<script> window.location = "http://ezfb.top/listnickthatim.php"; </script>
<?php
   }
 ?>

<!-- end hóng submit -->


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách list nick</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>Tên</th>
                  <th>Chế độ</th>
                  <th>Tốc độ</th>
                 <th>Đã love</th>
                 <th>Time add</th>
                 <th>Like cuối</th>
                  <th>Chờ like</th>
                  <th>Status</th>
                  <!-- <th>token</th> -->
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <!-- <th>token</th> -->
                  <th>Tên</th>
                  <th>Chế độ</th>
                  <th>Tốc độ</th>
                 <th>Đã love</th>
                 <th>Time add</th>
                 <th>Like cuối</th>
                  <th>Chờ like</th>
                  <th>Status</th>
                  
                </tr>
              </tfoot>
              <tbody>
               

<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$tbName='tbthatimclone';

$sql = "SELECT `id`, `username`, `token`, `name`, `typeLove`, `speed`, `totalLove`, `timeAdd`, `timeLastLove`, `timeNextLove`, `status`, `loaiCamXuc`, `ndungCmt`,`linkAnhCmt` FROM "."`".$tbName."` WHERE `username`='".$_SESSION['username']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo "<tr>";
        // echo "<td>".$row["token"]."</td>";

echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-primary">'.$row["name"].'</a></td>';

echo '<div style="display: none;" id="'.$row["id"].'" class="animated-modal">
 <form method="POST" action="http://ezfb.top/listnickthatim.php">



                        <div class="form-group">
                        <input type="hidden" name="id"  class="form-control"  value="'.$row["id"].'">

                            <label><b>Nhập token fb (Lấy token <a href="http://nghiahsgs.com/getToken/">tại đây</a>)</b></label>
                            <input type="text" name="token" id="token" placeholder="Nhập token full quyền" class="form-control"  value="'.$row["token"].'">

                           
                        </div>


                         <div class="form-group">
                            <label><b>Nhập Tên (ghi chú để bạn nhớ)</b></label>
                            <input type="text" name="name" id="nameToken" placeholder="Nhập tên" class="form-control"  value="'.$row["name"].'">

                        </div>

                        <div class="form-group">
                            <label><b>Chế độ</b></label>
                            <select name="typeLove" id="chedo" class="form-control" value="'.$row["typeLove"].'">
                                
                                <option value="friend">Bạn bè </option>
                                <option value="newpost">Bài mới</option>
                            </select>
                          
                          
                        </div>

                        <div class="form-group">
                            <label><b>Loại cảm xúc</b></label>
                            <select name="loaiCamXuc" id="loaiCamXuc" class="form-control" value="'.$row["loaiCamXuc"].'">
                                
                                <option value="LIKE">LIKE</option>
                                <option value="LOVE">LOVE</option>

                            </select>
                            
                        </div>

                         <div class="form-group">
                            <label><b>Nội dung comment ( để trống nếu bạn không dùng chức năng này ) </b></label>
                           

                            <input type="text" name="ndungCmt" id="ndungCmt" placeholder="" class="form-control"  value="'.$row["ndungCmt"].'">

                        </div>

                        <div class="form-group">
                            <label><b>Link ảnh muốn comment  ( để trống nếu bạn không dùng chức năng này ) </b></label>
                           

                            <input type="text" name="linkAnhCmt" id="linkAnhCmt" placeholder="" class="form-control"  value="'.$row["linkAnhCmt"].'">

                        </div>


                         <div class="form-group">
                            <label><b>Tốc độ thả (Phút) (Nên để lớn hơn 5p 1 lần)</b></label>
                             <input type="number" min="5" max="15" name="speed" id="tocdo" class="form-control"  value="'.$row["speed"].'">
                        </div>

                         <div class="text-center">
                           <button  type="submit" name="submitUpdate" class="btn btn-primary">Submit</button>
         <button  type="submit" name="submitDelete" class="btn btn-warning">Xóa</button>
                        </div>

 
</form>
</div>';





         echo "<td>".$row["typeLove"]."</td>";
        echo "<td>".$row["speed"]."</td>";

          echo "<td>".$row["totalLove"]."</td>";
          echo "<td>".date('d/m/Y H:i:s', $row["timeAdd"])."</td>";
echo "<td>".date('d/m/Y H:i:s', $row["timeLastLove"])."</td>";
echo "<td>".date('d/m/Y H:i:s', $row["timeNextLove"])."</td>";
          

          if($row["status"]=='die'){
            echo "<td style='color:red;font-weight: bold;'>".$row["status"]."</td>";
          }else{
            echo "<td style='color:green;font-weight: bold;'>".$row["status"]."</td>";
          }
        
       

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


