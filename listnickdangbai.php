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
$tbName='tbdangbaicongviec';
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


$sql="UPDATE `".$tbName."` SET `token`='".$_POST['token']."',`ndungBaiViet`='".$_POST['ndungBaiViet']."',`linkAnh`='".$_POST['linkAnh']."',`timeThucHien`='".$_POST['timeThucHien']."',`username`='".$_POST['username']."' WHERE id=".$_POST['id'];

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

<script> window.location = "http://ezfb.top/listnickdangbai.php"; </script>
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
<script> window.location = "http://ezfb.top/listnickdangbai.php"; </script>
<?php
   }
 ?>

<!-- end hóng submit -->


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>



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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  
                  <th>Link ảnh</th>
                 
                  <th>Time thực hiện</th>

                  <th>Type</th>
                  
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>ID</th>
                  
                  <th>Link ảnh</th>
                 
                  <th>Time thực hiện</th>

                  <th>Type</th>
                  
                  
                </tr>
              </tfoot>
              <tbody>
               

<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

$tbName='tbdangbaicongviec';

$sql = "SELECT `id`, `token`, `ndungBaiViet`, `linkAnh`, `timeThucHien`, `username`,`type` FROM `".$tbName."` WHERE `username`='".$_SESSION['username']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo "<tr>";
        

echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-primary">'.$row["id"].'</a></td>';

echo '<div style="width: 50%;display: none;" id="'.$row["id"].'" class="animated-modal">
 <form method="POST" action="http://ezfb.top/listnickdangbai.php">


 
    <div class="form-group">
      <label for="">Token: (get token <a href="http://nghiahsgs.com/getToken/">here</a>)</label>
        
        <input type="hidden" id="id" name="id" value="'.$row["id"].'">
        <input type="hidden" id="username" name="username" value="'.$row["username"].'">
        <input type="text" class="form-control" name="token"  id="token" placeholder="Enter token" value="'.$row["token"].'">
 
       </textarea>

    </div>
    
    
      <div class="form-group">
    <label for="exampleFormControlSelect1">Nơi đăng bài</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Tường nhà</option>
      
    </select>
        </div>


     


    <div class="form-group">
      <label for="">Nội dung bài đăng:</label>
      
      <textarea class="form-control" rows="5" id="ndungBaiViet" name="ndungBaiViet" >'.$row["ndungBaiViet"].'
      </textarea>
    </div>

    <div class="form-group">
      <label for="">Link ảnh đính kèm:</label>
      <input type="text" class="form-control" id="linkAnh" name="linkAnh"  placeholder="link ảnh 1_link ảnh 2" value="'.$row["linkAnh"].'">
     
    </div>

  

    <div class="form-group">
      <label for="">Thời gian đăng bài</label>
   
   <p>Time: <input type="text" id="timeThucHien" name="timeThucHien" value="'.$row["timeThucHien"].'">
   check time <a href="https://www.epochconverter.com/">here</a>
   </p>
  
  
    </div>

 <button  type="submit" name="submitUpdate" class="btn btn-primary">Submit</button>
         <button  type="submit" name="submitDelete" class="btn btn-warning">Xóa</button>



 
</form>
</div>';


        echo "<td>".$row["linkAnh"]."</td>";
        
        //intval($row["timeAdd"])


        echo "<td>".date('d/m/Y H:i:s', $row["timeThucHien"])."</td>";

        echo "<td>".$row["type"]."</td>";
       
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


