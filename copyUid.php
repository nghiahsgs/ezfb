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
    <h5>Chọn uid</h5>
  </div>
 

<div class="form-group">
  <label for="sel1">Chọn tệp:</label>
  <input type="hidden" id="username" value="<?php echo $_SESSION['username'];?>">
  <select class="form-control" id="sel1FileName">
    

               <option value=''>Select</option>

 <?php
 
//Get a list of file paths using the glob function.
$fileList = glob('copyUid/*');
 
//Loop through the array that glob returned.
foreach($fileList as $filename){
   //Simply print them out onto the screen.
  // echo $filename, '<br>'; 

   $filenameXXX=explode("/",$filename)[count(explode("/",$filename))-1];

$userNameFile=explode("_",$filenameXXX)[0];

if($userNameFile==$_SESSION['username']){
    echo "<option value='".$filenameXXX."'>".$filenameXXX."</option>";
}
if($userNameFile=='public'){
    echo "<option value='".$filenameXXX."'>".$filenameXXX."</option>";
}
  

}
?>


  </select>
</div>

<button type="submit" id="btnGet" class="btn btn-success">Get</button> 
<button type="submit" id="btnXoa" class="btn btn-success">Xóa</button> 
<button type="submit" id="btnCopy" class="btn btn-success">Copy</button> 

<br>
   
    <b>* List Uid 
    </b><br>
    
     <textarea class="form-control" id="listUid" placeholder="Mỗi ID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>
 
<b>* Tên file muốn lưu </b>
 <div class="form-group">
  <input type="text" class="form-control" id="fileNameTaoTep">
</div>

 <label type="submit" id="btnTaoTep" class="btn btn-success">Tạo tệp</label>
 


    
 
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
  var _0xcd8e=["\x76\x61\x6C","\x23\x6C\x69\x73\x74\x55\x69\x64","\x6C\x6F\x67","\x23\x66\x69\x6C\x65\x4E\x61\x6D\x65\x54\x61\x6F\x54\x65\x70","\x23\x75\x73\x65\x72\x6E\x61\x6D\x65","\x63\x6F\x70\x79\x55\x69\x64","\x2F","\x5F","\x74\x61\x6F\x74\x65\x70\x55\x69\x64\x2E\x70\x68\x70","\x54\u1EA1\x6F\x20\x74\u1EC7\x70\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x73\x75\x63\x63\x65\x73\x73","\x70\x6F\x73\x74","\x63\x6C\x69\x63\x6B","\x23\x62\x74\x6E\x54\x61\x6F\x54\x65\x70","\x0A","\x73\x70\x6C\x69\x74","","\x6C\x65\x6E\x67\x74\x68","\x23\x62\x74\x6E\x58\x6F\x61","\x23\x73\x65\x6C\x31\x46\x69\x6C\x65\x4E\x61\x6D\x65","\x78\x75\x4C\x79\x43\x6F\x70\x79\x55\x69\x64\x2E\x70\x68\x70","\x47\x65\x74\x20\x75\x69\x64\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x23\x62\x74\x6E\x47\x65\x74","\u0110\xE3\x20\x63\x6F\x70\x79\x20\x75\x69\x64\x20\x74\x68\xE0\x6E\x68\x20\x63\xF4\x6E\x67","\x23\x62\x74\x6E\x43\x6F\x70\x79","\x74\x65\x78\x74\x61\x72\x65\x61","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x70\x6F\x73\x69\x74\x69\x6F\x6E","\x73\x74\x79\x6C\x65","\x66\x69\x78\x65\x64","\x74\x6F\x70","\x6C\x65\x66\x74","\x77\x69\x64\x74\x68","\x32\x65\x6D","\x68\x65\x69\x67\x68\x74","\x70\x61\x64\x64\x69\x6E\x67","\x62\x6F\x72\x64\x65\x72","\x6E\x6F\x6E\x65","\x6F\x75\x74\x6C\x69\x6E\x65","\x62\x6F\x78\x53\x68\x61\x64\x6F\x77","\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64","\x74\x72\x61\x6E\x73\x70\x61\x72\x65\x6E\x74","\x76\x61\x6C\x75\x65","\x61\x70\x70\x65\x6E\x64\x43\x68\x69\x6C\x64","\x62\x6F\x64\x79","\x66\x6F\x63\x75\x73","\x73\x65\x6C\x65\x63\x74","\x63\x6F\x70\x79","\x65\x78\x65\x63\x43\x6F\x6D\x6D\x61\x6E\x64","\x73\x75\x63\x63\x65\x73\x73\x66\x75\x6C","\x75\x6E\x73\x75\x63\x63\x65\x73\x73\x66\x75\x6C","\x43\x6F\x70\x79\x69\x6E\x67\x20\x74\x65\x78\x74\x20\x63\x6F\x6D\x6D\x61\x6E\x64\x20\x77\x61\x73\x20","\x4F\x6F\x70\x73\x2C\x20\x75\x6E\x61\x62\x6C\x65\x20\x74\x6F\x20\x63\x6F\x70\x79","\x72\x65\x6D\x6F\x76\x65\x43\x68\x69\x6C\x64"];$(_0xcd8e[13])[_0xcd8e[12]](function(){var _0xe957x1=$(_0xcd8e[1])[_0xcd8e[0]]();console[_0xcd8e[2]](_0xe957x1);var _0xe957x2=$(_0xcd8e[3])[_0xcd8e[0]]();console[_0xcd8e[2]](_0xe957x2);var _0xe957x3=$(_0xcd8e[4])[_0xcd8e[0]]();console[_0xcd8e[2]](_0xe957x3);fileName= _0xcd8e[5]+ _0xcd8e[6]+ _0xe957x3+ _0xcd8e[7]+ _0xe957x2;console[_0xcd8e[2]](fileName);$[_0xcd8e[11]](_0xcd8e[8],{fileName:fileName,listUid:_0xe957x1},function(_0xe957x4,_0xe957x5){console[_0xcd8e[2]](_0xe957x4);$(_0xcd8e[1])[_0xcd8e[0]](_0xe957x4);toastr[_0xcd8e[10]](_0xcd8e[9])})});$(_0xcd8e[18])[_0xcd8e[12]](function(){var _0xe957x1=$(_0xcd8e[1])[_0xcd8e[0]]();var _0xe957x6=_0xe957x1[_0xcd8e[15]](_0xcd8e[14]);var _0xe957x7=_0xcd8e[16];for(var _0xe957x8=0;_0xe957x8<= _0xe957x6[_0xcd8e[17]]- 1;_0xe957x8++){if(_0xe957x6[_0xe957x8]!= _0xcd8e[16]){_0xe957x7+= _0xe957x6[_0xe957x8]+ _0xcd8e[14]}};$(_0xcd8e[1])[_0xcd8e[0]](_0xe957x7)});$(_0xcd8e[22])[_0xcd8e[12]](function function_name(_0xe957xa){var _0xe957xb=$(_0xcd8e[19])[_0xcd8e[0]]();console[_0xcd8e[2]](_0xe957xb);_0xe957xb= _0xcd8e[5]+ _0xcd8e[6]+ _0xe957xb;console[_0xcd8e[2]](_0xe957xb);$[_0xcd8e[11]](_0xcd8e[20],{fileName:_0xe957xb},function(_0xe957x4,_0xe957x5){console[_0xcd8e[2]](_0xe957x4);$(_0xcd8e[1])[_0xcd8e[0]](_0xe957x4);toastr[_0xcd8e[10]](_0xcd8e[21])})});$(_0xcd8e[24])[_0xcd8e[12]](function function_name(_0xe957xa){copyTextToClipboard($(_0xcd8e[1])[_0xcd8e[0]]());toastr[_0xcd8e[10]](_0xcd8e[23])});function copyTextToClipboard(_0xe957xd){var _0xe957xe=document[_0xcd8e[26]](_0xcd8e[25]);_0xe957xe[_0xcd8e[28]][_0xcd8e[27]]= _0xcd8e[29];_0xe957xe[_0xcd8e[28]][_0xcd8e[30]]= 0;_0xe957xe[_0xcd8e[28]][_0xcd8e[31]]= 0;_0xe957xe[_0xcd8e[28]][_0xcd8e[32]]= _0xcd8e[33];_0xe957xe[_0xcd8e[28]][_0xcd8e[34]]= _0xcd8e[33];_0xe957xe[_0xcd8e[28]][_0xcd8e[35]]= 0;_0xe957xe[_0xcd8e[28]][_0xcd8e[36]]= _0xcd8e[37];_0xe957xe[_0xcd8e[28]][_0xcd8e[38]]= _0xcd8e[37];_0xe957xe[_0xcd8e[28]][_0xcd8e[39]]= _0xcd8e[37];_0xe957xe[_0xcd8e[28]][_0xcd8e[40]]= _0xcd8e[41];_0xe957xe[_0xcd8e[42]]= _0xe957xd;document[_0xcd8e[44]][_0xcd8e[43]](_0xe957xe);_0xe957xe[_0xcd8e[45]]();_0xe957xe[_0xcd8e[46]]();try{var _0xe957xf=document[_0xcd8e[48]](_0xcd8e[47]);var _0xe957x10=_0xe957xf?_0xcd8e[49]:_0xcd8e[50];console[_0xcd8e[2]](_0xcd8e[51]+ _0xe957x10)}catch(err){console[_0xcd8e[2]](_0xcd8e[52])};document[_0xcd8e[44]][_0xcd8e[53]](_0xe957xe)}

  </script>


</html>

 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


