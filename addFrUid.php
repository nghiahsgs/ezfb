<?php 
//addFrUid.php
 ?>
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
                        <h5>AUTO Add Friends bằng Access Token</h5>
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
                    <b>* Access Token:</b><br>
                    <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username'];?>">
                   <!--  <input class="form-control" id="token" placeholder="" /><br> -->
                    <textarea class="form-control" id="token" placeholder="Mỗi Token cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>


                    <b>* List Uid 
                        <label type="submit" id="btnXoa" class="btn btn-success">Xóa trắng</label>
                        <label type="submit" id="btnXoaSlash" class="btn btn-success">Xóa |</label>
                    </b><br>
                    <textarea class="form-control" id="listUid" placeholder="Mỗi UID cách nhau bởi dấu xuống dòng ..." rows="6"></textarea><br>
                    <b>* Khoảng cách giữa 2 lần gửi yêu cầu (Giây):</b><br>
                    <input class="form-control" id="time2Fr" value="50" /><br>
                    <!-- <button type="submit" id="btnLogin" class="btn btn-success">Submit</button> -->
                    <button type="submit" id="btnLogin" class="btn btn-primary" style="font-size: 17px;">Submit Off</button>
                    <button type="submit" id="btnLoginOn" class="btn btn-primary" style="font-size: 17px;">Submit On</button>
                    <button type="button" class="btn btn-danger" style="float: right;">Uid add fr thất bại <span class="badge lbFail">0</span></button>
                    <button type="button" class="btn btn-success" style="float: right;">Uid add fr thành công <span class="badge lbSuccess">0</span></button>
                    <button type="button" class="btn btn-default" style="float: right;">Tổng số Uid <span class="badge lbTotal">0</span></button>
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
    $('#btnLoginOn').click(function() {
        var token = $('#token').val();
        var listUid = $('#listUid').val();
        var time2Fr = $('#time2Fr').val();
        var username = $('#username').val();
        $.get("https://graph.facebook.com/me/?access_token=" + token,
                function(data) {
                    // console.log(data);
                    // console.log(data['id']);
                    var uidMe = data['id'];
                    console.log(uidMe);
                    if (token == '' || listUid == '' || time2Fr == '') {
                        toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
                    } else {
                        var Things = listUid.split("\n");
                        document.querySelector(".lbTotal").innerText = Things.length;
                        //var kq="";
                        for (var i = 0; i <= Things.length - 1; i++) {
                            if (Things[i] != "") {
                                //   kq+=Things[i]+"\n";
                                uidFr = Things[i];
                                hamAddFrOnLine(uidFr, i, time2Fr, token, username, uidMe);
                            }
                        }
                    }
                })
            .fail(function() {
                console.log("token chet");
            })
    });

    function hamAddFrOnLine(uidFr, j, time2cmt, token, username, uidMe) {
        // body...
        console.log(uidFr);
        var d = new Date();
        var timeThucHien = d.getTime();
        timeThucHien = parseInt(timeThucHien) + j * parseInt(time2cmt) * 1000;
        // var d = new Date(timeThucHien);
        // var fullTime= d.getHours()+":"+d.getMinutes()+":"+d.getSeconds()+"|"+d.getFullYear()+"_"+(d.getMonth()+1)+"_"+d.getDate();
        // var msg=ndungCmt+" at "+fullTime;
        $.post('xuLyLenLichAddFr.php', {
            token: token,
            uidFr: uidFr,
            uidMe: uidMe,
            timeThucHien: timeThucHien,
            username: username
        }, function(data, status) {
            //         toastr.success('abc');
            if (data.includes('0')) {
                //toastr.success('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!'); 
                toastr.error('Đã có lỗi xảy ra');
                //   alert('Tài khoản này chưa tồn tại'); 
            } else if (data.includes('1')) {
                toastr.success('Đã phân phối add fr thành công');
                //alert('Sai mật khẩu');
            } else {
                //alert('Đăng nhập thành công, hệ thống sẽ chuyển sang sau 2s...!');
                toastr.error('Đã có lỗi xảy ra');
            }
        });
    }
    $("#sel1Nick").change(function() {
        //  alert( "Handler for .change() called." );
        $('#token').val($('#sel1Nick').val());
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
     $('#btnXoaSlash').click(function() {
        var listUid = $('#listUid').val();
        var Things = listUid.split("\n");
        var kq = "";
        for (var i = 0; i <= Things.length - 1; i++) {
            if (Things[i] != "|") {
                kq += Things[i] + "\n";
            }
        }
        //console.log(kq);
        $('#listUid').val(kq);
    })
    $('#btnLogin').click(function() {
        //alert("nghiahsgs");
        //   toastr.error('Tài khoản này chưa tồn tại'); 
        var token = $('#token').val();
        var listUid = $('#listUid').val();
        var time2Fr = $('#time2Fr').val();
        if (token == '' || listUid == '') {
            toastr.error('Vui Lòng Nhập Đầy Đủ Thông Tin');
        } else {
            
            var ThingsToken = token.split("\n");
            var Things = listUid.split("\n");
            document.querySelector(".lbTotal").innerText = Things.length*ThingsToken.length;
            
            for (var j = 0; j <= ThingsToken.length - 1; j++) {

                token=ThingsToken[j];
                for (var i = 0; i <= Things.length - 1; i++) {
                var uidFr = Things[i];
                console.log(uidFr);//console.log(token);
                HamKetBan(uidFr, token, i+j*Things.length, time2Fr);
            }
            }
           
        }
    });

    function HamKetBan(uidFr, token, i, time2Fr) {
        setTimeout(function() {
            $.get("https://graph.facebook.com/me/friends?method=post&uid=" + uidFr + "&access_token=" + token,
                    function(data) {
                        console.log(data);
                        if (JSON.stringify(data).includes("true")) {
                            document.querySelector(".lbSuccess").innerText = parseInt(document.querySelector(".lbSuccess").innerText) + 1;
                        } else {
                            document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
                        }
                    })
                .fail(function() {
                    console.log("ko ket ban dc");
                    document.querySelector(".lbFail").innerText = parseInt(document.querySelector(".lbFail").innerText) + 1;
                })
        }, i * (parseInt(time2Fr)) * 1000);
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