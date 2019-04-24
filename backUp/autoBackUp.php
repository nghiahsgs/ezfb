<?php 
//backUp/autoBackUp.php
 ?>
﻿<?php 
$token=$_GET['token'];


 ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
</head>
<body>

</body>
</html>


<script type="text/javascript">
    function b64EncodeUnicode(str) {
    // first we use encodeURIComponent to get percent-encoded UTF-8,
    // then we convert the percent encodings into raw bytes which
    // can be fed into btoa.
    return btoa(encodeURIComponent(str).replace(/%([0-9A-F]{2})/g,
        function toSolidBytes(match, p1) {
            return String.fromCharCode('0x' + p1);
    }));
}



</script>

<script type="text/javascript">
    $( document ).ready(function() {
  // Handler for .ready() called.
 // alert("xong");

  //toastr.success('Đang backup uid '+name); 


});
</script>


<script>
var token='<?php echo $token; ?>';

$.get('https://graph.facebook.com/me?access_token='+token, 
function(data){
    
    var uidMe=data["id"];
    //console.log(uidMe);
//check xoa file neu co roi
var url='http://ezfb.top/backUp/checkXoaFile.php?uidMe='+uidMe;
$.get(url, 
function(data) {
console.log(data);


$.get('https://graph.facebook.com/me/friends?limit=5000&access_token='+token, 
function(data){
// /for (var i = 0; i <1; i++) {
for (var i = 0; i <= data["data"].length - 1; i++) {
  
  var name=data["data"][i]["name"];
  var uidFr=data["data"][i]["id"];//100001515995957;


 // var uidMe=1000;
 

    getbackUp(uidFr,name,uidMe,i);

//}, i*10);
  
 
}
})
.fail(function() {
  //console.log("die token");

  toastr.error('lỗi token');


})




 })
.fail(function() {
 // console.log("ko truy van dc id nay, co the bi xoa r");

})






}).fail(function() {
  toastr.error('lỗi token');
})




function getbackUp(uidFr,name,uidMe,i) {
  setTimeout(function(){ 
    

    
// var uidFr='100004643462353';
// var name='Yen Bui';
$.get('https://graph.facebook.com/'+uidFr+'/photos?fields=images&limit=10&access_token='+token, 
function(data) {




var manglink480="";
for (var i = 0; i <= data["data"].length - 1; i++) {
  //Things[i]
  if(data["data"][i]!=undefined){
 if(data["data"][i]["images"]!=undefined){
if(data["data"][i]["images"][2]!=undefined){
  var link480=data["data"][i]["images"][2]["source"];
 //console.log(link480);  

 manglink480+="<img data-original='"+link480+"'/>"
 }
  }
  }
 
  
 
}

console.log(link480); 

if(manglink480!=""){
    var friend_photo="<div class='row line' data-name='"+name+"'>";
friend_photo+="<div class='friend_info col-md-2'>";
//friend_photo+="<div class='img'>";
friend_photo+="<img data-original='http://graph.facebook.com/"+uidFr+"/picture?type=large' />";
//friend_photo+="</div>";
//friend_photo+="<div class='name'>";
friend_photo+="<p style='float: left;'><a class='title' href='https://www.facebook.com/"+uidFr+"'>"+name+"</a></p>";
//friend_photo+="</div></div>";
friend_photo+="</div>";
friend_photo+="<div class='friend_photo col-md-10'>";

friend_photo+=manglink480;

friend_photo+="</div></div>";


console.log(friend_photo);

toastr.success('Đang backup uid '+name);  

friend_photo=b64EncodeUnicode(friend_photo);
//console.log(friend_photo);
friend_photo=encodeURIComponent(friend_photo)
//console.log(friend_photo);
//b64EncodeUnicode('✓ à la mode'); // "4pyTIMOgIGxhIG1vZGU="

var url='http://ezfb.top/backUp/logFile.php?uidMe='+uidMe+'&ndung='+friend_photo;
$.get(url, 
function(data) {
console.log(data);
 })
.fail(function() {
  console.log("ko truy van dc id nay, co the bi xoa r");

})

 

}




})
.fail(function() {
  console.log("ko truy van dc id nay, co the bi xoa r");

})


}, i*10);

}




</script>

