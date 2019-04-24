<head>
  
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>


<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
 <?php 
include('config.php');

$tbName='tbuser';
?>


<!-- hóng sumit-->
<?php 
  
   if (isset($_POST['submit'])){
     //echo $_POST['dateTimeAdd'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failedvv: " . $conn->connect_error);
} 


$sql="INSERT INTO `".$tbName."`(`id`, `username`, `pass`, `note`) VALUES ('','".$_POST['username']."','".$_POST['pass']."','".$_POST['note']."')";


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

<script> window.location=window.location.href; </script>
<?php

   }
 ?>
<!-- end hóng submit -->


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


$sql="UPDATE `".$tbName."` SET `username`='".$_POST['username']."',`pass`='".$_POST['pass']."',`note`='".$_POST['note']."' WHERE id=".$_POST['id'];

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

<script> window.location=window.location.href; </script>
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
<script> window.location=window.location.href; </script>
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
        <div class="card-header text-center">
          <i class="fa fa-table"></i> Danh sách list user <a data-fancybox data-animation-duration="700" data-src="#addNew" href="javascript:;" class="btn btn-primary">New</a>

<div style="display: none;" id="addNew" class="animated-modal">
 <form method="POST" action="tbUser.php">



                        <div class="form-group">
                       

                            <label><b>Username</b></label>
                            <input type="text" name="username" id="username" class="form-control">

                           
                        </div>

                         <div class="form-group">
                      
                            <label><b>Pass</b></label>
                           
                             <input type="text" name="pass" id="pass" class="form-control">

                        </div>

                        <div class="form-group">
                       

                            <label><b>Note</b></label>
                            <input type="text" name="note" id="note"  class="form-control">

                           
                        </div>


                         <div class="text-center">
                           <button  type="submit" name="submit" class="btn btn-primary">Submit</button>
        
                        </div>

 
</form>
</div>



        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>id</th>
                  <th>username</th>
                  <th>password</th>
                   <th>note</th>
                
                  <!-- <th>token</th> -->
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <!-- <th>token</th> -->
                   <th>id</th>
                  <th>username</th>
                  <th>password</th>
                   <th>note</th>
                  
                </tr>
              </tfoot>
              <tbody>
               

<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');


$sql = "SELECT `id`, `username`, `pass`, `note` FROM "."`".$tbName."` WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo "<tr>";
        // echo "<td>".$row["token"]."</td>";

echo '<td><a data-fancybox data-animation-duration="700" data-src="#'.$row["id"].'" href="javascript:;" class="btn btn-primary">'.$row["id"].'</a></td>';

echo '<div style="display: none;" id="'.$row["id"].'" class="animated-modal">
 <form method="POST" action="http://ezfb.top/tbUser.php">



                        <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="'.$row["id"].'">

                            <label><b>Username</b></label>
                            <input type="text" name="username" id="username" class="form-control"  value="'.$row["username"].'">

                           
                        </div>

                         <div class="form-group">
                      
                            <label><b>Pass</b></label>
                            <input type="text" name="pass" id="pass" class="form-control"  value="'.$row["pass"].'">

                           
                        </div>

                        <div class="form-group">
                       

                            <label><b>Note</b></label>
                            <input type="text" name="note" id="note"  class="form-control"  value="'.$row["note"].'">

                           
                        </div>


                         <div class="text-center">
                           <button  type="submit" name="submitUpdate" class="btn btn-primary">Submit</button>
         <button  type="submit" name="submitDelete" class="btn btn-warning">Xóa</button>
                        </div>

 
</form>
</div>';





         echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["pass"]."</td>";

          echo "<td>".$row["note"]."</td>";
         
       

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
