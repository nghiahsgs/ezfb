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
              <div class="panel-heading"> 
                <!-- <center><i class="fa fa-retweet"></i> Thông báo </center> -->
</div>
           <div class="panel-body">
            
               <div class="table-responsive">
                <center> 
               
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title"><i class="fa fa-heart"></i>Cài đặt auto thả tim )<i class="fa fa-heart"></i> </h5>
                </div>

                 <div class="panel-body">
                                        
                        <input type="hidden" id="username" value="<?php echo $_SESSION['username'] ?>">

                        <div class="form-group">
                            <label><b>Nhập token fb (Lấy token <a href="http://nghiahsgs.com/getToken/">tại đây</a>)</b></label>
                            <input type="text" name="token" id="token" placeholder="Nhập token full quyền" class="form-control" required="">

                           
                        </div>


                         <div class="form-group">
                            <label><b>Nhập Tên (ghi chú để bạn nhớ)</b></label>
                            <input type="text"  id="nameToken" placeholder="Nhập tên" class="form-control" required="">

                        </div>

                        <div class="form-group">
                            <label><b>Chế độ</b></label>
                            <select name="chedo" id="chedo" class="form-control">
                                
                                <option value="friend">Bạn bè </option>
                                <option value="newpost">Bài mới</option>
                            </select>
                          
                          
                        </div>

                        <div class="form-group">
                            <label><b>Loại cảm xúc ( chọn None nếu bạn ko muốn like hay love )</b></label>
                            <select name="loaiCamXuc" id="loaiCamXuc" class="form-control">
                                
                                <option value="LIKE">LIKE</option>
                                <option value="LOVE">LOVE</option>
                                <option value="NONE">NONE</option>

                            </select>
                            
                        </div>

                       <!--   <div class="form-group">
                            <label><b>Nội dung comment ( để trống nếu bạn không dùng chức năng này ) </b></label>
                           

                            <input type="text"  id="ndungCmt" placeholder="" class="form-control" required="" value="">

                        </div> -->

                         <!-- <div class="form-group">
                            <label><b>Link ảnh muốn comment ( để trống nếu bạn không dùng chức năng này ) <a href="https://imgur.com/">(Lấy tại đây)</a> </b></label>
                           
                            <input type="text"  id="linkAnhCmt" placeholder="" class="form-control" required="" value="">

                        </div> -->


                         <div class="form-group">
                            <label><b>Tốc độ thả (Phút) (Nên để lớn hơn 10p 1 lần)</b></label>
                             <input type="number" min="5" max="15" name="tocdo" id="tocdo" value="10" class="form-control" required="">
                        </div>

                         <div class="text-center">
                            <button id='btnLogin' type="submit" class="btn btn-primary">Thêm Token</button>
                        </div>
                    </div>


           
                </center>
             
   
            
            </div>
    </div>
</div>
      
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
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


   <script type="text/javascript">
    var _0x7b2b=["\x76\x61\x6C","\x23\x75\x73\x65\x72\x6E\x61\x6D\x65","\x6C\x6F\x67","\x23\x74\x6F\x6B\x65\x6E","\x23\x63\x68\x65\x64\x6F","\x23\x74\x6F\x63\x64\x6F","\x23\x6E\x61\x6D\x65\x54\x6F\x6B\x65\x6E","\x23\x6C\x6F\x61\x69\x43\x61\x6D\x58\x75\x63","\x23\x6E\x64\x75\x6E\x67\x43\x6D\x74","\x23\x6C\x69\x6E\x6B\x41\x6E\x68\x43\x6D\x74","","\x56\x75\x69\x20\x4C\xF2\x6E\x67\x20\x4E\x68\u1EAD\x70\x20\u0110\u1EA7\x79\x20\u0110\u1EE7\x20\x54\x68\xF4\x6E\x67\x20\x54\x69\x6E","\x65\x72\x72\x6F\x72","\x78\x75\x4C\x79\x43\x61\x69\x44\x61\x74\x54\x69\x6D\x2E\x70\x68\x70","\x31","\x69\x6E\x63\x6C\x75\x64\x65\x73","\x41\x64\x64\x20\x74\x6F\x6B\x65\x6E\x20\x76\xE0\x6F\x20\x68\u1EC7\x20\x74\x68\u1ED1\x6E\x67\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x73\x75\x63\x63\x65\x73\x73","\u0110\xE3\x20\x63\xF3\x20\x6C\u1ED7\x69\x20\x78\u1EA3\x79\x20\x72\x61","\x70\x6F\x73\x74","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x4C\x6F\x67\x69\x6E"];$(_0x7b2b[21])[_0x7b2b[20]](function(){var _0x8416x1=$(_0x7b2b[1])[_0x7b2b[0]]();console[_0x7b2b[2]](_0x8416x1);var _0x8416x2=$(_0x7b2b[3])[_0x7b2b[0]]();var _0x8416x3=$(_0x7b2b[4])[_0x7b2b[0]]();var _0x8416x4=$(_0x7b2b[5])[_0x7b2b[0]]();var _0x8416x5=$(_0x7b2b[6])[_0x7b2b[0]]();var _0x8416x6=$(_0x7b2b[7])[_0x7b2b[0]]();var _0x8416x7=$(_0x7b2b[8])[_0x7b2b[0]]();var _0x8416x8=$(_0x7b2b[9])[_0x7b2b[0]]();if(_0x8416x1= _0x7b2b[10]|| _0x8416x2== _0x7b2b[10]|| _0x8416x3== _0x7b2b[10]|| _0x8416x4== _0x7b2b[10]|| _0x8416x5== _0x7b2b[10]|| _0x8416x6== _0x7b2b[10]){toastr[_0x7b2b[12]](_0x7b2b[11])}else {$[_0x7b2b[19]](_0x7b2b[13],{username:$(_0x7b2b[1])[_0x7b2b[0]](),token:_0x8416x2,chedo:_0x8416x3,tocdo:_0x8416x4,name:_0x8416x5,loaiCamXuc:_0x8416x6,ndungCmt:_0x8416x7,linkAnhCmt:_0x8416x8},function(_0x8416x9,_0x8416xa){console[_0x7b2b[2]](_0x8416x9);if(_0x8416x9[_0x7b2b[15]](_0x7b2b[14])){toastr[_0x7b2b[17]](_0x7b2b[16]);$(_0x7b2b[3])[_0x7b2b[0]](_0x7b2b[10]);$(_0x7b2b[6])[_0x7b2b[0]](_0x7b2b[10]);$(_0x7b2b[8])[_0x7b2b[0]](_0x7b2b[10])}else {toastr[_0x7b2b[12]](_0x7b2b[18])}})}})

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


