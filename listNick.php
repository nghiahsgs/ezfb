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
      <!-- Breadcrumbs-->
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Quét info cơ bản của nick</div>
        <div class="card-body">


           <b>* List Token 
            <label type="submit" id="btnCheck" class="btn btn-success">Check</label>
    </b><br>
    
     <textarea class="form-control" id="listToken" placeholder="Mỗi token cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>

          <div class="table-responsive">
            <table class="table table-bordered tableListNick" id="dataTable" width="100%" cellspacing="0" >
              <thead>
                <tr>
                  
                   <th>Name</th>
                  <th>UID</th>
                  <th>Ngày sinh</th>
                 
                  <th>Số lượng bạn bè</th>
                 <th>Lời mời kết bạn</th>
                 <th>Số nhóm đã tham gia</th>
                 <th>Số page</th>
                
                 
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <th>Name</th>
                  <th>UID</th>
                  <th>Ngày sinh</th>
                 
                  <th>Số lượng bạn bè</th>
                 <th>Lời mời kết bạn</th>
                 <th>Số nhóm đang tham gia</th>
                 <th>Số page</th>
                 
                </tr>
              </tfoot>
              <tbody>
               <tr>
                  
                
                </tr>
                
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
    if (listToken == '') {
        toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
    } else {
        console.log(listToken);
        //console.log(listUid.split("\n"));
        var Things = listToken.split("\n");
        for (var i = 0; i <= Things.length - 1; i++) {
            var token = Things[i];
            console.log(token);
            hamCheckInfo(token);
        }
    }

    function hamCheckInfo(token) {
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
                                                row += "<td>" + name + "</td>";
                                                row += "<td>" + id + "</td>";
                                                row += "<td>" + birthday + "</td>";
                                                row += "<td>" + soFriend + "</td>";
                                                row += "<td>" + soFriendRq + "</td>";
                                                row += "<td>" + soGroup + "</td>";
                                                row += "<td>" + soPage + "</td>";
                                                row += "</tr>";
                                                console.log(row);
                                                $(".tableListNick tbody").append(row);
                                            })
                                    })
                            })
                    })
            })
    }
});
</script>

</html>



 <?php 
//echo "hello ".$_SESSION['username'];
}else{
//echo "hack cc";
  echo "Đã có lỗi xảy ra, liên hệ admin fb.com/nghiahsgs";
}
  ?>


