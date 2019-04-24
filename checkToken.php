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
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Check Token </center>
</div>
           <div class="panel-body">
           <div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
  <div class="panel-heading">
<!-- <h3 class="panel-title"></h3> -->
  </div>
  <div class="panel-body">
<textarea id="listToken" class="form-control" rows="7" placeholder="Vui Lòng Nhập Token Vào Đây...!!!" style="text-align: center;"></textarea>
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12 text-center">
<button type="button" class="btn btn-primary" id="submit">SUBMIT</button>
<!-- <button type="button" class="btn btn-info" id="filter">FILTER</button> -->
</div>
</div>
<hr>
<div class="row">
<div class="col-sm-6 text-center">
<button class="btn btn-primary" type="button">
  LIVE ACCOUNT <span class="badge live">0</span>
</button>
<!-- <button class="btn btn-success" id="import" type="button">IMPORT</button> -->
<textarea id="liveaccount" class="form-control" rows="7" style="border-color: #285e8e; margin-top: 10px; text-align: center;"></textarea>
</div>
<div class="col-sm-6 text-center">
<button class="btn btn-danger" type="button">
  DIE ACCOUNT <span class="badge die">0</span>
</button>
<textarea id="dieaccount" class="form-control" rows="7" style="border-color: #ac2925; margin-top: 10px; text-align: center;"></textarea>
</div>
</div>
<hr>

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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
var LiveToken = new Array();
var LiveLocale = new Array();
var ArrayFilter = new Array();

var total = 0, checking = 0;
var liveaccount = 0, dieaccount = 0;
$(document).ready(function() {
$("#log").hide();
$("#submit").click(function() {
var listToken = $("#listToken").val().trim();

total = 0, checking = 0, liveaccount = 0, dieaccount = 0;
LiveToken = new Array();
ArrayFilter = new Array();

$("#liveaccount, #dieaccount").text("");
$("#result").text("");
$("#import").removeAttr('disabled');

if (listToken == "") {
alert("Please input list token!");
} else {
var tbody = "";
var arrAccount = listToken.split(/\n/);
total = arrAccount.length;
$("#checking").text(total);
var stt = 0;
jQuery.each(arrAccount, function(i, token) {
stt += 1;
tbody += "<tr>";
tbody += "<td class='text-center' style='font-weight: bold;'>" + stt + "</td>";
tbody += "<td>" + token.substring(0,50) + " .......</td>";
tbody += "<td class='location-" + token + "'></td>";
tbody += "<td class='locale-" + token + "'></td>";
tbody += "<td class='text-center' style='font-weight: bold; color: red'><img class='status-" + token + "' src='https://fc02.deviantart.net/fs71/i/2012/221/6/6/pixel_art_loading_icon_1_gif_by_qubodup-d5afav9.gif'></td>";
tbody += "</tr>";
checkToken(token);
});
$("#result").append(tbody);
$("#log").show();
}
})

$('#locale').keyup(function() {
var locale = $(this).val().trim();
if (locale == '') {
ArrayFilter = LiveToken.filter(function (el) {
return (el.locale != '');
});
} else {
ArrayFilter = LiveToken.filter(function (el) {
return (el.locale == locale);
});
}
LoadFilter(ArrayFilter);
})

$('#import').click(function() {
$(this).attr('disabled', 'disabled');
if (ArrayFilter.length == 0) {
ArrayFilter = LiveToken;
}
$.ajax({
url: "",
type: "POST",
data: "listtoken=" + JSON.stringify(ArrayFilter),
success: function (data) {
$('#import').append(' <span class="badge live">'+data+'</span>');
$('#import').removeAttr('disabled');
},
error: function (XMLHttpRequest, textStatus, errorThrown) {
alert("Error! Contact Admin.");
}
});
})

$('#filter').click(function() {
console.log(sortObject(CountUnique(LiveLocale)));
var radio_html = sortObject(CountUnique(LiveLocale));
$.each(radio_html, function(i, eval) {
$('.denmodo').append('<input type="radio" name="g_filter" title='+eval.key.replace(/"/g, '')+'> '+eval.key.replace(/"/g, '')+'('+eval.value+') ');
})
})
})

$(document).on('change', 'input[name=g_filter]:radio', function() {
var locale = $(this).attr('title');
if (locale == '') {
ArrayFilter = LiveToken.filter(function (el) {
return (el.locale != '');
});
} else if (locale == '!vn' ) {
ArrayFilter = LiveToken.filter(function (el) {
return (el.locale != 'vi_VN');
});
} else {
ArrayFilter = LiveToken.filter(function (el) {
return (el.locale == locale);
});
}

LoadFilter(ArrayFilter);
})

function checkToken(token){
$.get('https://graph.facebook.com/v2.3/me?access_token='+token+'&format=json&method=get', 
function(data) {
liveaccount++;
$('.live').text(liveaccount);
$('#liveaccount').append(token + '\n');
$('.status-' + token).attr('src', 'http://upload.wikimedia.org/wikipedia/commons/5/50/Yes_Check_Circle.svg');
$(".locale-" + token).text(data.locale);
if (data.location) {
$(".location-" + token).text(data.location.name);
var l_token1 = new TokenLive(token, data.location.name, data.locale);
} else {
var l_token1 = new TokenLive(token, '', data.locale);
}
LiveToken.push(l_token1);
LiveLocale.push(data.locale);
})
.fail(function() {
dieaccount++;
$('.die').text(dieaccount);
$('#dieaccount').append(token + '\n');
$('.status-'+token).attr('src', 'https://cdn4.iconfinder.com/data/icons/spirit20/system-delete-alt-02.png');
})
}

function LoadFilter(arrayFilter) {
var stt = 0, tbody = '';
$('#liveaccount').text('');
jQuery.each(arrayFilter, function(i, val) {
stt += 1;
tbody += "<tr>";
tbody += "<td class='text-center' style='font-weight: bold;'>" + stt + "</td>";
tbody += "<td>" + val.token.substring(0,50) + " .......</td>";
tbody += "<td class='location-" + val.token + "'>"+val.location+"</td>";
tbody += "<td class='locale-" + val.token + "'>"+val.locale+"</td>";
tbody += "<td class='text-center' style='font-weight: bold; color: red'><img class='status-" + val.token + "' src='https://upload.wikimedia.org/wikipedia/commons/5/50/Yes_Check_Circle.svg'></td>";
tbody += "</tr>";
$('#liveaccount').append(val.token + '\n');
});
$("#result").text("");
$("#result").append(tbody);
$('.live').text(arrayFilter.length);
}

function TokenLive(token, location, locale) {
this.token = token;
this.location = location;
this.locale = locale;
}

function sortObject(obj) {
var arr = [];
for (var prop in obj) {
if (obj.hasOwnProperty(prop)) {
arr.push({
'key': prop,
'value': obj[prop]
});
}
}
arr.sort(function(a, b) { return b.value - a.value; });
return arr;
}

function CountUnique(array) {
var counter = {}
array.forEach(function(obj) {
var key = JSON.stringify(obj)
counter[key] = (counter[key] || 0) + 1
})
return counter;
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


