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
    <h5>Buff Like bằng Access Token (Ưu tiên cho page)</h5>
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
   <b>* Token cầm page:<label type="submit" id="btnGetTokenPage" class="btn btn-success">Get all token page</label>
   </b><br>
     <input class="form-control" id="tokenChinh" placeholder="" /><br>
    <b>* Access Token:<label type="submit" id="btnXoa" class="btn btn-success">Xóa trắng</label>
    </b><br>
      <textarea class="form-control" id="listToken" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>
     <b>* Id bình luận or id cmt của page:</b><br>
     <input class="form-control" id="idPost" placeholder="" /><br>
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
$("#sel1Nick").change(function() {
    //  alert( "Handler for .change() called." );
    $('#tokenChinh').val($('#sel1Nick').val());
});
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
        $.get("https://graph.facebook.com/me/accounts?limit=1000&access_token=" + tokenChinh, function(data) {
                for (var i = 0; i <= data['data'].length - 1; i++) {
                    var tokenPage = data['data'][i]['access_token'];
                    console.log(tokenPage);
                    var namePage = data['data'][i]['name'];
                    console.log(namePage);
                    $("#listToken").append(tokenPage + "|" + namePage + "\n");
                }
            })
            .fail(function() {})
    }
});
$('#btnLogin').click(function() {
    //alert("nghiahsgs");
    //   toastr.error('Tài khoản này chưa tồn tại'); 
    var idPost = $('#idPost').val();
    var listToken = $('#listToken').val();
    if (idPost == '' || listToken == '') {
        toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
    } else {
        var Things = listToken.split("\n");
        document.querySelector(".lbTotal").innerText = Things.length;
        //console.log((parseInt(time2Fr)));
        for (var i = 0; i <= Things.length - 1; i++) {
            var line = Things[i];
            token = line.split("|")[0];
            console.log(token);
            name = line.split("|")[1];
            console.log(name);
            //HamJoinGr(uidFr,token,i);
            //HamJoinGr(uidFr,token,i,uidMe,time2Fr);
            HamLikePost(token, idPost);
        }
    }
});

function HamLikePost(token, idPost) {
    $.get("https://graph.facebook.com/" + idPost + "/likes?method=post&access_token=" + token,
            function(data) {
                console.log(data);
                if (JSON.stringify(data).includes("true")) {
                    document.querySelector(".lbSuccess").innerText = parseInt(document.querySelector(".lbSuccess").innerText) + 1;
                } else {
                    document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
                }
            })
        .fail(function() {
            console.log("ko like dc");
            document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
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