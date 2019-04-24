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
  
<div class="form-group">
</div>
   <b>* Token nick:<label type="submit" id="btnGetTokenPage" class="btn btn-success">Get all bài viết</label>
   </b><br>
     <input class="form-control" id="tokenChinh" placeholder="" /><br>
    <b>* Access Token:<label type="submit" id="btnXoa" class="btn btn-success">Xóa trắng</label>
    </b><br>
      <textarea class="form-control" id="listIdPost" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>
     <b>Thời gian nghỉ giữa 2 lần xóa(s)</b><br>
     <input class="form-control" id="timesleep" placeholder="" value="50" /><br>
 <button type="submit" id="btnLogin" class="btn btn-success">Submit</button>
<button type="button" class="btn btn-danger" style="float: right;">Số bài đã xóa thất bại <span class="badge lbFail">0</span></button>
 <button type="button" class="btn btn-success" style="float: right;">Số bài đã xóa thành công <span class="badge lbSuccess">0</span></button>
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
$('#btnXoa').click(function() {
    var listUid = $('#listUid').val();
    var Things = listUid.split("\n");
    var kq = "";
    for (var i = 0; i <= Things.length - 1; i++) {
        if (Things[i] != "") {
            kq += Things[i] + "\n";
        }
    }
    //console.log(kq);
    $('#listUid').val(kq);
})
$('#btnGetTokenPage').click(function() {
    //alert("nghiahsgs");
    //   toastr.error('Tài khoản này chưa tồn tại'); 
    var tokenChinh = $('#tokenChinh').val();
    if (tokenChinh == '') {
        toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
    } else {
        $.get("https://graph.facebook.com/me/feed?fields=id&limit=1000&access_token=" + tokenChinh, function(data) {
                for (var i = 0; i <= data['data'].length - 1; i++) {
                    var idPost = data['data'][i]['id'];
                    console.log(idPost);
                   
                    $("#listIdPost").append(idPost+"\n");
                }
            })
            .fail(function() {})
    }
});
$('#btnLogin').click(function() {
    
    var listIdPost = $('#listIdPost').val();
     var tokenChinh = $('#tokenChinh').val();
      var timesleep = $('#timesleep').val();
     
    if (listIdPost == ''||tokenChinh == ''||timesleep == '') {
        toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
    } else {
        var Things = listIdPost.split("\n");
        document.querySelector(".lbTotal").innerText = Things.length;
        for (var i = 0; i <= Things.length - 1; i++) {

            var idPost = Things[i];
            HamDeletePost(tokenChinh, idPost,i,timesleep);
        }
    }
});

function HamDeletePost(token, idPost,i,timesleep) {
  setTimeout(function() {
   let url='https://graph.facebook.com/'+idPost+'?method=delete&access_token='+token;

    $.get(url,
            function(data) {
                console.log(data);
                if (JSON.stringify(data).includes("true")) {
                    document.querySelector(".lbSuccess").innerText = parseInt(document.querySelector(".lbSuccess").innerText) + 1;
                } else {
                    document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
                }
            })
        .fail(function() {
            console.log("ko delete dc");
            document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
        })
        }, i * (parseInt(timesleep)) * 1000);
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