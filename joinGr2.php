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
    <h5>AUTO Join Group bằng Access Token</h5>
  </div>
 
 
   

     <label for="">Token | Id Gr</label>
     
    <textarea class="form-control" id="listTokenIdGr" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


   



    <b>* Khoảng cách giữa 2 lần gửi yêu cầu (Giây):</b><br>
    <input class="form-control" id="time2Fr" value="50" /><br>

    
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

 

    $('#btnLogin').click(function(){

  var listIdPost = $('#listTokenIdGr').val();
if (listIdPost == '') {
    toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
} else {

     var time2Fr = $('#time2Fr').val();
      var Things = listIdPost.split("\n");
    document.querySelector(".lbTotal").innerText = Things.length;
    //var kq="";
    for (var i = 0; i <= Things.length - 1; i++) {
        if (Things[i] != "") {
            //   kq+=Things[i]+"\n";
            line = Things[i];
            token = line.split("|")[0];
            idGr = line.split("|")[1];

HamPreJoinGr(idGr,token,i,time2Fr)




        }
    }
}


 







          



        
        
      });



function HamPreJoinGr(idGr,token,i,time2Fr) {

console.log(token);
$.get('https://graph.facebook.com/me?access_token=' + token,
                function(data) {
var uidMe=data['id'];
console.log(uidMe);

HamJoinGr(idGr,token,i,uidMe,time2Fr);
}).fail(function() { console.log("token sai"); })

}
function HamJoinGr(idGr,token,i,uidMe,time2Fr) {
  
  console.log(i*(parseInt(time2Fr))*1000);
  setTimeout(function(){ 
   
   $.get("https://graph.facebook.com/"+idGr+"/members/"+uidMe+"?method=post&access_token="+token,
                function(data) {
                  console.log(data);
                  if(JSON.stringify(data).includes("true")){
                     document.querySelector(".lbSuccess").innerText=parseInt(document.querySelector(".lbSuccess").innerText)+1;
                  }else{
                     document.querySelector(".lbFail").innerText=parseInt(document.querySelector(".lbFail").innerText)+1;
                  }
                })
            .fail(function() {
                console.log("ko ket ban dc");
                 document.querySelector(".lbFail").innerText=parseInt(document.querySelector(".lbFail").innerText)+1;

            })


}, i*(parseInt(time2Fr))*1000);

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


