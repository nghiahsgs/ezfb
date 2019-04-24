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

$ketnoi=$conn;
$dem = mysqli_num_rows(mysqli_query($ketnoi,"SELECT * FROM `tbuser` WHERE `username` ='".mysqli_real_escape_string($ketnoi,$_SESSION['username'])."'"));

//check co phai acc that ko hay la hacker
if($dem == 1){
include('head.php');
?>
<meta charset="UTF-8">
    <title>Imgur-Upload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css_upload/style.css" rel="stylesheet" media="screen">
    <link href="./css_upload/mobile-style.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="./favicon.png">
 

  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
          <!-- <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>   -->
          <div class="panel">
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Lên lịch đăng bài (user + page)</center>
</div>
           <div class="panel-body">
            
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

      <label for="">Token: (get token <a href="http://nghiahsgs.com/getToken/">here</a>)</label>
        
        
        <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username']; ?>">
        <input type="text" class="form-control" name="token"  id="token" placeholder="Enter token">
 
         
         <b><label for="sel1">Loại tài khoản</label></b>
  <select class="form-control" id="sel1TypeNick">
    
               <option value='user'>user</option>
               <option value='page'>page</option>
         </select>
    
    
      <div class="form-group">
    <label for="exampleFormControlSelect1">Nơi đăng bài</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Tường nhà</option>
      
    </select>
  </div>


     


    <div class="form-group">
      <label for="">Nội dung bài đăng:</label>
      
      <!-- <textarea class="form-control" rows="5" id="ndungBaiViet" name="ndungBaiViet">Bạn có thể spin content theo cách sau {nội dung 1|nội dung 2}</textarea> -->
      <textarea class="form-control" rows="5" id="ndungBaiViet" name="ndungBaiViet"></textarea>
    </div>

    <div class="form-group">
      <label for="">Link ảnh đính kèm:</label>
      <input type="text" class="form-control" id="linkAnh" name="linkAnh" value="" placeholder="link ảnh 1_link ảnh 2">
     <!-- 
     <textarea class="form-control"  id="linkAnh" placeholder="" name="linkAnh"></textarea> -->
    </div>

  

    <div class="form-group">
      <label for="">Thời gian đăng bài</label>
   <!--    <input type="text" class="form-control" id="time2Fr" placeholder="" name="time2Fr" value="6"> -->
   <p>Date: <input type="text" id="datepicker" placeholder="MM//DD//YY"></p>
   Hour: <input type="text" id="timepicker" placeholder="HH:MM">

   <!-- <button id="setTimeButton">Set current time</button> -->
 <!-- <p><input id="basicExample" type="text" class="time" /></p> -->
      <!-- <input type="text" class="form-control" id="timeThucHien" value="2014/03/15 05:06"> -->
    </div>

 <button type="submit" id="submit" class="btn btn-primary">Submit</button>

<!-- <label>Upload file ở đây</label>
 --><div class="dropzone">
        <div class="info"></div>
    </div>
    <script type="text/javascript" src="./js_upload/imgur.js"></script>
    <script type="text/javascript" src="./js_upload/upload.js"></script>
               
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

  
 <script type="text/javascript">
  $( "#sel1Nick" ).change(function() {
//  alert( "Handler for .change() called." );
  
   $('#token').val($('#sel1Nick').val());

});


    $('#submit').click(function(){
      //alert("nghiahsgs");
      var token = $('#token').val();
      console.log(token);
       var ndungBaiViet = $('#ndungBaiViet').val();
       console.log(ndungBaiViet);
      var linkAnh = $('#linkAnh').val();
console.log(linkAnh);
      var datepicker = $('#datepicker').val();
      console.log(datepicker);
      var timepicker = $('#timepicker').val();
      console.log(timepicker);
       var username=$('#username').val();
 console.log(username);
        var type=$('#sel1TypeNick').val();
console.log(type);

        if (token == '' || ndungBaiViet == ''|| datepicker == ''|| timepicker == '') {
          toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
          
        }else{
          // $('#login').prop('disabled', true)
               // http://localhost/buffLikeRealTime/Like24hNghiahsgs/xuLyLogin.php
        

        $.post('xuLyLenLichStt.php', {
          token: token,
          ndungBaiViet: ndungBaiViet,
          linkAnh: linkAnh,
          datepicker:datepicker,
          timepicker:timepicker,
          username:username,
          type:type

         
          
        }, function(data, status) {
         
//         toastr.success('abc');

           if (data.includes('0')) {
             //toastr.success('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!'); 
             toastr.error('Đã có lỗi xảy ra'); 
          //   alert('Tài khoản này chưa tồn tại'); 
           }else  if (data.includes('1')){
             toastr.success('Đã phân phối uid thành công');  
             //alert('Sai mật khẩu');

             $('#token').val("");
             $('#ndungBaiViet').val("");
             $('#linkAnh').val("");
             $('#datepicker').val("");
             $('#timepicker').val("");

              
           
           }else{
            //alert('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!');

             toastr.error('Đã có lỗi xảy ra');  
           }
          
        });
        }
        
      });

  </script>

</body>

</html>
 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


