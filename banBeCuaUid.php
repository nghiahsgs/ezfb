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
    <h5>Quét bạn bè của uid</h5>
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
      
      
echo "<option value='".$row["token"]."'>".$row["name"]."</option>";

}}
?>
  </select>
</div>
<b>* Access Token:</b><br>
    <input class="form-control" id="token" placeholder="" /><br>

    
    
    <b>* List Uid cần quét:<label type="submit" id="btnXoa1" class="btn btn-success">Xóa trắng</label>
    </b><br>
      <textarea class="form-control" id="listUID" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


    <b>* Kết quả:<label type="submit" id="btnXoa2" class="btn btn-success">Xóa trắng</label>
    </b><br>
      <textarea class="form-control" id="listKq" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


 <button type="submit" id="btnLogin" class="btn btn-success">Submit</button>

<button type="button" class="btn btn-primary" style="float: right;">Số uid quét thành công <span class="badge lbSuccess">0</span></button>
 
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
$( "#sel1Nick" ).change(function() {
//  alert( "Handler for .change() called." );
  
   $('#token').val($('#sel1Nick').val());

});

   $('#btnXoa1').click(function(){

var listUID = $('#listUID').val();
var Things=listUID.split("\n");
var kq="";
for (var i = 0; i <= Things.length - 1; i++) {
  if(Things[i]!=""){
     kq+=Things[i]+"\n";
  }
}
//console.log(kq);
$('#listUID').val(kq);

  })

    $('#btnXoa2').click(function(){

var listKq = $('#listKq').val();
var Things=listKq.split("\n");
var kq="";
for (var i = 0; i <= Things.length - 1; i++) {
  if(Things[i]!=""){
     kq+=Things[i]+"\n";
  }
}
//console.log(kq);
$('#listKq').val(kq);

  })



  
    $('#btnLogin').click(function(){
      //alert("nghiahsgs");
   //   toastr.error('Tài khoản này chưa tồn tại'); 


var listUID = $('#listUID').val();
var tokenChinh= $('#token').val();


 
if (listUID == '') {
          toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
        }else{

var Things=listUID.split("\n");
for (var i = 0; i <= Things.length - 1; i++) {
  
  var uidCanQuet=Things[i];
  console.log(uidCanQuet);

HamGetFr(uidCanQuet,tokenChinh);
}


          



        }
        
      });

function HamGetFr(uidCanQuet,tokenChinh) {
  
   $.get("https://graph.facebook.com/"+uidCanQuet+"/friends?limit=5000&access_token="+tokenChinh,
                function(data) {
                  // console.log(data);
                  // if(JSON.stringify(data).includes("true")){
                  //    document.querySelector(".lbSuccess").innerText=parseInt(document.querySelector(".lbSuccess").innerText)+1;
                  // }else{
                  //    document.querySelector(".lbFail").innerText=parseInt(document.querySelector(".lbFail").innerText)+1;
                  // }
                  for (var i = data['data'].length - 1; i >= 0; i--) {
                    var id=data['data'][i]['id']
                   //   console.log(id);
                     $("#listKq").append(id+"\n");
                       document.querySelector(".lbSuccess").innerText=parseInt(document.querySelector(".lbSuccess").innerText)+1;
                       
                  }
                })
            .fail(function() {
                console.log("ko like dc");
                 

            })


}
  </script>


</html>


 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


