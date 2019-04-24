<?php

/************************************/
/************************************/
require_once 'head.php';
?>
  <div class="content-wrapper">
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
                            <label><b>Note</b></label>
                            <input type="text"  id="note"  class="form-control">
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
                  <th>username</th>
                  <th>password</th>
                   <th>note</th>
                  <th>xóa</th>
                </tr>
              </thead>
              <tfoot>
                 <tr>
                  <!-- <th>token</th> -->
                   <th>id</th>
                  <th>username</th>
                  <th>password</th>
                   <th>note</th>
                   <th>xóa</th>
                </tr>
              </tfoot>
              <tbody id="listUserWeb">

                </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function function_name(argument) {
  // body...
  loadUser();
})
function addNewUser() {
   let username=$('#username').val();
   let password=$('#password').val();
   let note=$('#note').val();
   $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'add-new-user',
               username:username,
               password:password,
               note:note

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
                   let note = data["data"][i]['note'];
                  
                   let col = '<tr>';
                   col += '<td>' + id + '</td>';
                    col += '<td>' + username + '</td>';
                    col += '<td>' + password + '</td>';

col += '<td>' + note + '</td>';

                  

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