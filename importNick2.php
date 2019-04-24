<?php 
$grId=$_GET['grId'];
?>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
﻿ <?php
include('config.php');
session_start();
if (empty($_SESSION['username'])) {
    session_destroy();
    //echo "dkm";
    //header('http://localhost/buffLikeRealTime/Like24hNghiahsgs/index.php');
    header('Location: http://ezfb.top');
    die();
}
//require("config.php");
//echo $_SESSION['username'];
$ketnoi = $conn;
$dem    = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM `tbuser` WHERE `username` ='" . mysqli_real_escape_string($ketnoi, $_SESSION['username']) . "'"));
//check co phai acc that ko hay la hacker
if ($dem == 1) {
    include('head.php');
?>
<?php
    echo "<input type='hidden' id='username' name='username' value='" . $_SESSION['username'] . "'>";
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>
</style>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <!-- <i class="fa fa-table"> -->Back Up Nick<!-- </i>  -->
        </div>
        <div class="card-body">
          <!-- <p>Các nhóm nick hiện tại</p> -->
<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $tbName = 'tblistNick2';
    $sql    = "SELECT `group`,`grId` FROM `" . $tbName . "` WHERE `username`='".$_SESSION['username']."'";
    //echo $sql;
    $result = $conn->query($sql);
    $grName="";
    $a=array();


    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if($row["grId"]==$grId){

              $grName=$row["group"];
              // echo ;
              $row='<a href=http://ezfb.top/importNick2.php?grId=' . $row["grId"] . ' class="btn btn-primary">' . $row["group"] . '</a>';
               
               $dem=0;
               foreach ($a as $value) {
                   $dem++;
                }
               // echo $dem.'<br>';
               $dem2=0;
                foreach ($a as $value) {
                   if($value!=$row){
                      $dem2++;
                   }
                }
               // echo $dem2.'<br>';
if($dem2==$dem){
array_push($a,$row);

}
               
            
            }else{
            //  echo "kkk";
             //  echo '<a href=http://ezfb.top/importNick2.php?grId=' . $row["grId"] . ' class="btn btn-default">' . $row["group"] . '</a>';
              $row='<a href=http://ezfb.top/importNick2.php?grId=' . $row["grId"] . ' class="btn btn-default">' . $row["group"] . '</a>';
              $dem=0;
               foreach ($a as $value) {
                   $dem++;
                }
               // echo $dem.'<br>';
               $dem2=0;
                foreach ($a as $value) {
                   if($value!=$row){
                      $dem2++;
                   }
                }
            //    echo $dem2.'<br>';
if($dem2==$dem){
array_push($a,$row);
  
}
            }
           

        }
    } else {
        // echo "0 results";
    }
    foreach ($a as $value) {
                   //$dem++;
                   echo $value;
                }
     echo '<a href=http://ezfb.top/importNick2.php class="btn btn-warning">' . '+NEW' . '</a>';
    //$conn->close();
?>
   </b><br>

   <?php 
      if($grId==""){
        $grId=rand(10,10000000);

        echo "<b>* Tạo mới nhóm nick</b><br>";
        echo '<input class="form-control" id="group" placeholder="" /><br>';
      }else{
        echo '<input style="display: none;" class="form-control" id="group" placeholder="" / value="">';


      }

    ?>
    



     <textarea class="form-control" id="listToken" placeholder="Mỗi token cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>
<label type="submit" id="btnCheck" class="btn btn-success">Import</label>
<label type="submit" id="btnBackUpAll" class="btn btn-success">BackUp All</label>
<label type="submit" id="btnSaveAll" class="btn btn-success">Save All</label>
<!-- <label type="submit" id="btnDeleteAll" class="btn btn-success">Delete All</label> -->
      <div class="table-responsive">
            <table class="table table-bordered tableListNick" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  <th>Id</th>
                   <th>Name</th>
                  <th>UID</th>
                  <th>Birthday</th>
                  <th>Fr Count</th>
                 <th>Fr rq</th>
                 <th>Group Joined</th>
                 <th>Page number</th>
                 <th>Back Up</th>
                 <th>Xem Back Up</th>
                 <th>Group</th>
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>Id</th>
                   <th>Name</th>
                  <th>UID</th>
                  <th>Birthday</th>
                  <th>Fr Count</th>
                 <th>Fr rq</th>
                 <th>Group Joined</th>
                 <th>Page number</th>
                 <th>Back Up</th>
                 <th>Xem Back Up</th>
                  <th>Group</th>
                </tr>
              </tfoot>
              <tbody>
    <?php


date_default_timezone_set('Asia/Ho_Chi_Minh');
$tbName = 'tblistNick2';
$sql    = "SELECT `id`, `username`, `token`, `name`, `uid`, `birthday`, `soPage`, `soFriend`, `soFriendRq`, `soGroup`, `status`, `group` FROM `" . $tbName . "` WHERE `username`='" . $_SESSION['username'] . "' AND `grId`='".$grId."'";

//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        // echo "<td>".$row["token"]."</td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["uid"] . "</td>";
        echo "<td>" . $row["birthday"] . "</td>";
        echo "<td>" . $row["soFriend"] . "</td>";
        echo "<td>" . $row["soFriendRq"] . "</td>";
        echo "<td>" . $row["soGroup"] . "</td>";
        echo "<td>" . $row["soPage"] . "</td>";
        // echo "<td><a href='/backUp2/autoBackUp.php?token=" . $row["token"] . "'>Back Up</a></td>";
        echo '<td><a id="aBackUp" target="_blank" rel="noopener noreferrer" href="/backUp2/autoBackUp.php?token='.$row["token"].'">Back Up</a></td>';
        
          $ndungFile = file_get_contents('backUp2/' . $row["uid"] . '.txt');
        // echo   'ndungFile:'.$ndungFile;
        if ($ndungFile != "") {
            echo "<td><a href='/backUp2/ketqua.php?uid=" . $row["uid"] . "'>Đã Back Up</a></td>";
        } else {
            echo "<td>Chưa có</td>";
        }

        echo "<td>" . $row["group"] . "</td>";
        echo "<td style='display: none;'>" . $row["token"] . "</td>";

        //intval($row["timeAdd"])
        echo "</tr>";
    }
} else {
     //echo "0 results";
}
$conn->close();
?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php
    include('footer.php');
?> 
   <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>
<script type="text/javascript">
  $('#btnCheck').click(function() {
     var listToken = $('#listToken').val();
     var username = $('#username').val();
     var group = $('#group').val();
     if (listToken == '') {
         toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
     } else {
         console.log(listToken);
         //console.log(listUid.split("\n"));
         var Things = listToken.split("\n");
         for (var i = 0; i <= Things.length - 1; i++) {
             var token = Things[i];
             console.log(token);
             console.log(username);
             hamCheckInfo(token, username, group);
         }
     }
 });
  $('#btnBackUpAll').click(function() {
     var eles=document.querySelectorAll("#aBackUp");
  for (var i = 0; i <= eles.length - 1; i++) {
       eles[i].click();
  }
 });
   $('#btnSaveAll').click(function() {
     var eles=document.querySelectorAll(".tableListNick tbody tr");

  for (var i = 0; i <= eles.length - 1; i++) {
      
      if(eles[i].querySelectorAll('td').length>10){

        var id=eles[i].querySelectorAll('td')[0].innerText;
      var name=eles[i].querySelectorAll('td')[1].innerText;
      var uid=eles[i].querySelectorAll('td')[2].innerText;
      var birthday=eles[i].querySelectorAll('td')[3].innerText;
      var soFriend=eles[i].querySelectorAll('td')[4].innerText;
      var soFriendRq=eles[i].querySelectorAll('td')[5].innerText;
      var soGroup=eles[i].querySelectorAll('td')[6].innerText;
      var soPage=eles[i].querySelectorAll('td')[7].innerText;

      
      var grId=<?php echo '"'.$grId.'"' ?>
      
      var token=eles[i].querySelectorAll('td')[11].innerText;
      
      var username=<?php echo '"'.$_SESSION['username'].'"'; ?>;
    
     if(document.querySelector('#group').value==""){
                                              var group=<?php echo '"'.$grName.'"' ?>
                                            }else{
                                                var group=document.querySelector('#group').value;

                                            }


    // console.log(id);
    // console.log(name);
    // console.log(uid);
    // console.log(birthday);
    // console.log(soFriend);
    // console.log(soFriendRq);
    // console.log(soGroup);
    // console.log(soPage);
    // console.log(grId);
    // console.log(token);console.log(username);
    
    if(id===""){
       insertDb(name,uid,birthday,soFriend,soFriendRq,soGroup,soPage,grId,username,token,group);
    }

      }
      
    
    


  }
 });

   function insertDb(name,uid,birthday,soFriend,soFriendRq,soGroup,soPage,grId,username,token,group) {
    
  $.post("insertimportNick2.php", 
    {name: name,uid: uid,birthday: birthday,soFriend: soFriend,soFriendRq: soFriendRq,soGroup: soGroup,soPage: soPage,grId: grId,username: username,token: token,group: group}, 
    function(data){
       console.log(data);
       if (data.includes('1')) {
             toastr.success('Lưu thành công'); 
            
          //   alert('Tài khoản này chưa tồn tại'); 
      }else{
             toastr.error('Lưu thất bại'); 
    }

    });

   }
 function hamCheckInfo(token, username, group) {
     // body...
     $.get("https://graph.facebook.com/me/accounts?limit=1000&access_token=" + token,
         function(data) {
             var soPage = data["data"].length;
             console.log(soPage);
             $.get("https://graph.facebook.com/v3.0/me/friends?access_token=" + token,
                 function(data) {
                     var soFriend = data["summary"]["total_count"];
                     console.log(soFriend);
                     $.get("https://graph.facebook.com/me/friendrequests?access_token=" + token,
                         function(data) {
                             var soFriendRq = data["summary"]["total_count"];
                             console.log(soFriendRq);
                             $.get("https://graph.facebook.com/me/groups?limit=1000&access_token=" + token,
                                 function(data) {
                                     var soGroup = data["data"].length;
                                     console.log(soGroup);
                                     $.get("https://graph.facebook.com/me?fields=id,birthday,name&access_token=" + token,
                                         function(data) {
                                             var id = data["id"]
                                             console.log(id);
                                             var birthday = data["birthday"]
                                             console.log(birthday);
                                             var name = data["name"]
                                             console.log(name);
                                             var row = "<tr>";
                                             row += "<td></td>";
                                             row += "<td>" + name + "</td>";
                                             row += "<td>" + id + "</td>";
                                             row += "<td>" + birthday + "</td>";
                                             row += "<td>" + soFriend + "</td>";
                                             row += "<td>" + soFriendRq + "</td>";
                                             row += "<td>" + soGroup + "</td>";
                                             row += "<td>" + soPage + "</td>";
row += '<td><a id="aBackUp" target="_blank" rel="noopener noreferrer" href="/backUp2/autoBackUp.php?token=' + token + '">Back Up</a></td>';
                                             // row += '<td><a id="aBackUp" href="/backUp2/autoBackUp.php?token=' + token + '">Back Up</a></td>';
                                             // row += '<td><a target="_blank" rel="noopener noreferrer" href="/backUp2/ketqua.php?uid=' + id + '">Xem back up</a></td>';
                                            row += '<td>Chưa có</td>';

                                             
                                             if(document.querySelector('#group').value===""){
                                              row += "<td>" + <?php echo '"'.$grName.'"' ?> + "</td>";
                                            }else{
                                               row += "<td>" + document.querySelector('#group').value + "</td>";
                                            }
                                             
                                             row += "<td style='display: none;'>" + token+ "</td>";
                                             row += "</tr>";
                                             console.log(row);
                                             $(".tableListNick tbody").append(row);
//                                              $.get("http://ezfb.top/backUp2/autoBackUp.php?token="+token
//                          function(data) {
// console.log("back up");
//                           console.log(data);
//                          })
                                         })
                                 })
                         })
                 })
         })
 }
</script>
</html>
 <?php
    //echo "hello ".$_SESSION['username'];
} else {
    //echo "hack cc";
    echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
?>