<?php

/************************************/
/************************************/
require_once 'head.php';


?>
  <div class="content-wrapper" style="margin-left:0px">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header text-center">
          <i class="fa fa-table"></i> Danh sách list user <a data-fancybox data-animation-duration="700" data-src="#addNew" href="javascript:;" class="btn btn-primary">New</a>
<div style="display: none;" id="addNew" class="animated-modal">

                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input type="text"  id="username" class="form-control">
                        </div>
                         <div class="form-group">
                            <label><b>Pass</b></label>
                             <input type="text"  id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><b>Type Member</b></label>
                            <!-- <input type="text"  id="typemember"  class="form-control"> -->
                            <select id="typemember" class="form-control">
                              <option value="admin">admin</option>
                              <option value="member">member</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label><b>Ưu Tiên</b></label>
                            <input type="text"  id="uutien"  class="form-control">
                        </div>

                         <div class="text-center">
                           <button  onclick="addNewUser()" class="btn btn-primary">Submit</button>
                        </div>

</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Username</th>
                  <th>Password</th>
                   <th>Loại thành viên</th>
                   <th>Mức độ ưu tiên</th>
                   <th>Xóa</th>
                  
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <!-- <th>token</th> -->
                   <th>id</th>
                  <th>Username</th>
                  <th>Password</th>
                   <th>Loại thành viên</th>
                   <th>Mức độ ưu tiên</th>
                   <th>Xóa</th>
                </tr>
              </tfoot>
              <tbody id="listUserWeb">

                </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- end card -->
  <h4 class="text-center">Câu chat mẫu (mỗi câu 1 dòng) (ko có ký tự đặc biệt "*" hoặc "'")</h4>
   <textarea class="form-control" rows="5" id="listCauChatMau"></textarea>
   <button type="button" class="btn btn-primary" onclick="saveChatmau()">Save</button>
  <!-- end card -->
   <!-- end card -->
  <h4 class="text-center">Info fb (mỗi lần chỉnh thông tin bên dưới cần liên hệ admin nghiahsgs)</h4>
   <label>Cookie của nick</label>
   <textarea class="form-control" rows="5" id="CookieCuaNick"></textarea>
   <label>id của page</label>
   <textarea class="form-control" rows="5" id="idcuapage"></textarea>
   <button type="button" class="btn btn-primary" onclick="saveInfofb()">Save</button>
  <!-- end card -->
</div>
</div>

<script type="text/javascript">
$(document).ready(function function_name(argument) {
  // body...
  loadUser();
  loadConfigFb();
})

function saveChatmau() {
   let listCauChatMau=$('#listCauChatMau').val();
   $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'save-chat-mau',
               listCauChatMau:listCauChatMau
           },
           success: (data) => {
                      if (data.error) {
                        toastr.error('Thất bại');
                    } else {
                       
                        toastr.success('Thành công');
                       
                    }
              
           }
       })
}
function saveInfofb() {
   let CookieCuaNick=$('#CookieCuaNick').val();
   let idcuapage=$('#idcuapage').val();
   $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'save-info-fb',
               CookieCuaNick:CookieCuaNick,
               idcuapage:idcuapage
           },
           success: (data) => {
                      if (data.error) {
                        toastr.error('Thất bại');
                    } else {
                       
                        toastr.success('Thành công');
                       
                    }
              
           }
       })
}


function loadConfigFb() {
    
 // $(".dataTables_empty").remove();
       $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'load-config-fb'
           },
           success: (data) => {
//               console.log(data);
               let sample = data["data"][0]['value'];
               let cookie = data["data"][1]['value'];
               let idpage = data["data"][2]['value'];
                
              document.querySelector("#listCauChatMau").innerText=sample;
              document.querySelector("#CookieCuaNick").innerText=cookie;
              document.querySelector("#idcuapage").innerText=idpage;
           }
       })
   }
function addNewUser() {
   let username=$('#username').val();
   let password=$('#password').val();
   let typemember=$('#typemember').val();
   let uutien=$('#uutien').val();


   let note=$('#note').val();
   $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'add-new-user',
               username:username,
               password:password,
               typemember:typemember,
               uutien:uutien

           },
           success: (data) => {
           if (data.error == '1') {
                   //alert(data.msg);
                   toastr.error(data.msg);
                   // location.reload()
               } else {
                   //alert(data.msg);
                   toastr.success(data.msg);
                   location.reload()
                   
               }
           }
       })
}
function loadUser() {
    
 // $(".dataTables_empty").remove();
       $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'get-list-user'
           },
           success: (data) => {
//               console.log(data);
               for (var i = 0; i <= data["data"].length - 1; i++) {
                   let id = data["data"][i]['id'];
                   let username = data["data"][i]['username'];
                   let password = data["data"][i]['password'];
                   let typemember = data["data"][i]['typemember'];
                   let uutien = data["data"][i]['uutien'];

                 

                   let col = '<tr>';
                   col += '<td>' + id + '</td>';
                    col += '<td>' + username + '</td>';
                    col += '<td>' + password + '</td>';

                 col += '<td>' + typemember + '</td>';
                col += '<td>' + uutien + '</td>'; 
                  

                   col += '<td>' + '<a data-fancybox data-animation-duration="700" data-src="#xoafb' + i + '" href="javascript:;" class="btn btn-primary">Xóa</a>';
                   col += '<div style="display: none;" id="xoafb' + i + '" class="animated-modal">';
                   col += "<p>Bạn có muốn xóa ???</p>"
                   col += '<button type="button" class="btn btn-warning"';
                   col += 'onclick="' + "xoaAcc('" + id + "')" + '">';
                   col += 'Yes</button>';
                   col += '</div>';
                   col += '</td>';
                    col += '</tr>';

                   $('#listUserWeb').append(col);
               }
               // add nick to cong viec
           }
       })
   }
   function xoaAcc(id) {
       $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'xoa-user',
               id: id
           },
           success: (data) => {
               // console.log(data);
               if (data.error == '1') {
                   //alert(data.msg);
                   toastr.error(data.msg);
                   location.reload()
               } else {
                   //alert(data.msg);
                   toastr.success(data.msg);
                   location.reload();
               }
           }
       })
   }
   </script>