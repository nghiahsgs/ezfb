<?php
require_once 'config.php';
if (!$_SESSION['username']) {
  session_destroy();
  header("Location: index.php");
}
/************************************/
/************************************/
require_once 'head.php';
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
          Quản lý acc
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
 -->
 
   <p>Xin Chào <b><?php  echo $_SESSION['username']?> </b> 
    <input type="hidden" id="username" value="<?php  echo $_SESSION['username']?>">
     <a href="out.php" style="background: white;margin-left: 5px;">Logout</a>
    <!--  <h2>web đang update</h2> -->
   </p>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> LIST TOKEN (Cho Full Định Dạng Cũng Check Được)</div>
        <div class="card-body">
          <!-- <div class="container"> -->
          <label for="comment">Đầu vào:</label>
          <label type="submit" id="btnCheck" class="btn btn-success">Check</label>
          <label type="submit" id="btnSave" class="btn btn-info">Save</label>
          <label type="submit" id="btnLoc" class="btn btn-primary">Lọc trùng</label>
          <span class="label label-primary">Tổng: <b id="alltoken">0</b></span>
          <span class="label label-success">Còn Lại: <b id="sodl">0</b></span>
          <label type="submit" id="btnDeleteAll" class="btn btn-warning">Xóa All</label>

          <textarea class="form-control" rows="5" id="listToken"></textarea>
         

         <div class="row">
            <div class="col-sm-6 text-center">
                <button class="btn btn-primary" type="button">
                    CHECK SUCCESS <span class="badge live">0</span>
                </button>
               
                <textarea id="liveaccount" class="form-control" rows="7" style="border-color: #285e8e; margin-top: 10px; text-align: center;"></textarea>


            </div>
            <div class="col-sm-6 text-center">
                <button class="btn btn-danger" type="button">
                    CHECK FAIL <span class="badge die">0</span>
                </button>
                <textarea id="dieaccount" class="form-control" rows="7" style="border-color: #ac2925; margin-top: 10px; text-align: center;"></textarea>
            </div>
        </div>

         

          <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th onclick="sortTableNumber(0)">#</th>
                  <th onclick="sortTable(1)">Tên TKQC</th>
                  <th onclick="sortTable(2)">ID TKQC</th>
                  <th onclick="sortTableNumber(3)">Ngưỡng</th>
                  <th onclick="sortTableNumber(4)">Đã Tiêu</th>
                  <th onclick="sortTable(5)">Tiền tệ</th>
                  <th onclick="sortTable(6)">Trạng thái</th>
                  <th onclick="sortTable(7)">Locale</th>
                  <th onclick="sortTableNumber(8)">Friends</th>
                  <th onclick="sortTableNumber(9)">Groups</th>
                  <th onclick="sortTableNumber(10)">Fanpage</th>
                  <th onclick="sortTable(11)">Token</th>
                  <th onclick="sortTable(12)">Full</th>
                  <th>Xóa</th>
      </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                 <th>#</th>
                  <th>Tên TKQC</th>
                  <th>ID TKQC</th>
                  <th>Ngưỡng</th>
                  <th>Đã Tiêu</th>
                  <th>Tiền tệ</th>
                  <th>Trạng thái</th>
                  <th>Locale</th>
                  <th>Friends</th>
                  <th>Groups</th>
                  <th>Fanpage</th>
                  <th>Token</th>
                  <th>Xóa</th>
                </tr>
              </tfoot> -->
              <tbody id="listTokenShow">
              </tbody>
            </table>
          </div>
            <!-- <table id="example" class="display" width="100%"></table>
 -->

        </div>
       <!--  <div class="card-footer small text-muted">Updated yesterday by nghiahsgs </div> -->
        <label type="submit" id="btnExport" class="btn btn-success">Xuất</label>
        <textarea class="form-control" rows="5" id="listKetQua"></textarea>
        <p>Tách token <a href="http://nghiahsgs.com/tachToken.php">tại đây</a></p>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
    <footer class="sticky-footer" style="width: 100%;">
      <div class="container">
        <div class="text-center">
          <small>Nghiahsgs</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
   
  </div>
</body>
<script type="text/javascript">
 function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function sortTableNumber(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc";
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (Number(x.innerHTML.toLowerCase()) > Number(y.innerHTML.toLowerCase())) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (Number(x.innerHTML.toLowerCase()) < Number(y.innerHTML.toLowerCase())) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}


$(document).ready(function function_name(argument) {
    // body...
    //                 var dataSet = [];
    //      $('#example').DataTable( {
    //     data: dataSet,
    //      "autoWidth": false,
    //       "scrollX": true,
    //     columns: [
    //         { title: "#" },
    //         { title: "Tên TKQC" },
    //         { title: "ID TKQC" },
    //         { title: "Ngưỡng" },
    //         { title: "Đã Tiêu" },
    //         { title: "Tiền tệ" },
    //         { title: "Trạng thái" },
    //         { title: "Locale" },
    //         { title: "Friends" },
    //         { title: "Groups" },
    //         { title: "Fanpage" },
    //         { title: "Token" },
    //         { title: "Xóa" }

    //     ]
    // } );

    loadListAcc();


})

function loadListAcc() {
    let username = $('#username').val();
    $(".dataTables_empty").remove();
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'get-list-acc',
            username: username
        },
        success: (data) => {

            var dataSet = [];
            //               ////console.log(data);
            for (var i = 0; i <= data["data"].length - 1; i++) {
                let id = data["data"][i]['id'];
                let name = data["data"][i]['name'];
                let idAds = data["data"][i]['idAds'];
                let threshold = data["data"][i]['threshold'];
                let balance = data["data"][i]['balance'];
                let currency = data["data"][i]['currency'];
                let account_status = data["data"][i]['account_status'];
                let locale = data["data"][i]['locale'];
                let soFriend = data["data"][i]['soFriend'];
                let soGroup = data["data"][i]['soGroup'];
                let soPage = data["data"][i]['soPage'];
                let token = data["data"][i]['token'];
                let accfull = data["data"][i]['accfull'];

                let col = '<tr>';
                col += '<td>' + (i + 1) + '</td>';
                col += '<td>' + name + '</td>';
                col += '<td>' + idAds + '</td>';
                col += '<td>' + threshold + '</td>';
                col += '<td>' + balance + '</td>';
                col += '<td>' + currency + '</td>';
                col += '<td>' + account_status + '</td>';
                col += '<td>' + locale + '</td>';
                col += '<td>' + soFriend + '</td>';
                col += '<td>' + soGroup + '</td>';
                col += '<td>' + soPage + '</td>';
                col += '<td><input type="text" value="' + token + '"></td>';
                col += '<td><input type="text" value="' + accfull + '"></td>';

                col += '<td>' + '<a data-fancybox data-animation-duration="700" data-src="#xoafb' + i + '" href="javascript:;" class="btn btn-primary">Xóa</a>';
                col += '<div style="display: none;" id="xoafb' + i + '" class="animated-modal">';
                col += "<p>Bạn có muốn xóa ???</p>"
                col += '<button type="button" class="btn btn-warning"';
                col += 'onclick="' + "xoaAcc('" + id + "')" + '">';
                col += 'Yes</button>';
                col += '</div>';
                col += '</td>';
                col += '</tr>';
                $('#listTokenShow').append(col);
            }
        }
    })
}
$('#btnCheck').click(function() {
    //xoa chu empty
    $(".dataTables_empty").remove();
    // tao cac row trc
    var listToken = $('#listToken').val();
    var Things = listToken.split("\n");
    var kq = "";
    for (var i = 0; i <= Things.length - 1; i++) {
        if (Things[i] != "") {
            let tokenFull = Things[i];
            
           
            var tokenNho = tokenFull.match(/(EAA|CAA)\w+/g);
            if (tokenNho) {
                tokenNho = tokenNho[0];

                let row = '<tr class="' + tokenNho + '">';
                row += '</tr>';
                // ////console.log(row);
                $('#listTokenShow').append(row);

            }


            
        }
    }
    //chen ndung vao row
    var listToken = $('#listToken').val();
    var Things = listToken.split("\n");
    var kq = "";
    for (var i = 0; i <= Things.length - 1; i++) {
        if (Things[i] != "") {
            //////console.log(Things[i]);
            let token = Things[i];
            hamCheckInfo(token, i);
        }
    }
})

$('#btnLoc').click(function() {
    //xoa chu empty
    $(".dataTables_empty").remove();

    var listToken = $('#listToken').val();
    var Things = listToken.split("\n");
    var kq = "";
    for (var i = 0; i <= Things.length - 1; i++) {
        if (Things[i] != "") {
            //////console.log(Things[i]);
            let token = Things[i];
            hamCheckInfo(token, i);
        }
    }

    //code copy
    var itoken = $('#listToken').val().split("\n")
    $('#alltoken').html(itoken.length);
    var text = document.getElementById('listToken').value.replace(/\r/g, '');
    var textinarr = text.split('\n');
    var len = textinarr.length;
    var textoutarr = new Array();
    var textoutarrcnt = 0;
    var cachearr = new Array();
    var cachecnt = 0;
    var hash = {};
    var xkey = '';
    var hkey = '';
    for (var x = 0; x < len; x++) {
        xkey = textinarr[x];
        hkey = ' ' + xkey;
        if (hash[hkey] == null && xkey != '') {
            hash[hkey] = x + 1;
            textoutarr[textoutarrcnt] = xkey;
            textoutarrcnt++;
        } else {
            if (xkey == '')
                cachearr[cachecnt] = '( ' + (x + 1) + ' empty ): ';
            else
                cachearr[cachecnt] = '( ' + (x + 1) + ' dupe of ' + hash[hkey] + ' ): ' + xkey;
            cachecnt++;
        }
    }
    //console.log(textoutarr.join('\n'));
    document.getElementById('listToken').value = textoutarr.join('\n');
    var sodl = $('#listToken').val().split("\n")
    $('#sodl').html(sodl.length);
    // document.getElementById('removed_output').value = cachearr.join('\n');

})

function xoaAcc(id) {
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'xoa-acc',
            id: id
        },
        success: (data) => {
            // ////console.log(data);
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
$('#btnSave').click(function() {
    //xoa chu empty
    //tao cac row trc
    //tao cac row trc
    var listToken = $('#listToken').val();
    var mangToken = listToken.split("\n");
    for (var i = 0; i <= mangToken.length - 1; i++) {
        if (mangToken[i] != "") {
            let tokenXXX = mangToken[i];
            let tokenFull=tokenXXX;

            var tokenNho = tokenXXX.match(/(EAA|CAA)\w+/g);
            if (tokenNho) {
                tokenXXX = tokenNho[0];



                let MangRow = $('.' + tokenXXX);
                     console.log(MangRow.length);
                for (var j = 0; j <= MangRow.length - 1; j++) {
                    let row = MangRow[j];
                     console.log(row);
                     try{
                         let name = row.querySelectorAll("td")[1].innerText;
                    let id = row.querySelectorAll("td")[2].innerText;
                    let threshold = row.querySelectorAll("td")[3].innerText;
                    let balance = row.querySelectorAll("td")[4].innerText;
                    let currency = row.querySelectorAll("td")[5].innerText;
                    let account_status = row.querySelectorAll("td")[6].innerText;
                    let locale = row.querySelectorAll("td")[7].innerText;
                    let soFriend = row.querySelectorAll("td")[8].innerText;
                    let soGroup = row.querySelectorAll("td")[9].innerText;
                    let soPage = row.querySelectorAll("td")[10].innerText;
                    let token = row.querySelectorAll("td")[11].querySelector("input").value;
                    // ////console.log(id);
                    // ////console.log(name);
                    // ////console.log(currency);
                    // ////console.log(threshold);
                    // ////console.log(account_status);
                    addToDb(name, id, threshold, balance, currency, account_status, locale, soFriend, soGroup, soPage, token,i,j,tokenFull);
                    // ////console.log(row);
                    // $('#listTokenShow').append(row);
                     }
                     catch(err) {
    
}
                   
                }
            }
        }
    }
    // var Things = $('#listTokenShow tr');
    // for (var i = 1; i <= Things.length - 1; i++) {
    //     if (Things[i] != "") {
    //          let row = Things[i];
    //          ////console.log(row);
    //          let id=row.querySelectorAll("td")[1].innerText;
    //          let name=row.querySelectorAll("td")[2].innerText;
    //          let currency=row.querySelectorAll("td")[3].innerText;
    //          let threshold=row.querySelectorAll("td")[4].innerText;
    //          let account_status=row.querySelectorAll("td")[5].innerText;
    //           let token=row.querySelectorAll("td")[6].querySelector("input").value;
    //          // ////console.log(id);
    //          // ////console.log(name);
    //          // ////console.log(currency);
    //          // ////console.log(threshold);
    //          // ////console.log(account_status);
    //        addToDb(id,name,currency,threshold,account_status,token);
    //         // ////console.log(row);
    //        // $('#listTokenShow').append(row);
    //     }
    // }
})
$('#btnExport').click(function() {

    var mangAcc = $('#listTokenShow tr');

    var kq = "";
    for (var i = 0; i <= mangAcc.length - 1; i++) {
        if (mangAcc[i] != "") {
            //  //console.log(mangAcc[i]);
            let row = mangAcc[i];


            // let name = row.querySelectorAll("td")[1].innerText;
            // let id = row.querySelectorAll("td")[2].innerText;
            // let threshold = row.querySelectorAll("td")[3].innerText;
            // let balance = row.querySelectorAll("td")[4].innerText;
            // let currency = row.querySelectorAll("td")[5].innerText;
            // let account_status = row.querySelectorAll("td")[6].innerText;
            // let locale = row.querySelectorAll("td")[7].innerText;
            // let soFriend = row.querySelectorAll("td")[8].innerText;
            // let soGroup = row.querySelectorAll("td")[9].innerText;
            // let soPage = row.querySelectorAll("td")[10].innerText;
            // let token = row.querySelectorAll("td")[11].querySelector("input").value;
            let accfull = row.querySelectorAll("td")[12].querySelector("input").value;


            
            // kq += name + "|" + id + "|" + threshold + "|" + balance + "|" + currency + "|" + account_status + "|" + locale + "|" + soFriend + "|" + soGroup + "|" + soPage + "|" + token +"|"+accfull+ "\n";

            kq+=accfull+ "\n";

        }
    }
    ////console.log(kq);
    $('#listKetQua').val(kq);

})
$('#btnDeleteAll').click(function(argument) {
    DeleteAllAcc();
})

function DeleteAllAcc() {
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'delete-all-acc'
        },
        success: (data) => {
            // ////console.log(data);
            if (data.error == '1') {
                //alert(data.msg);
                toastr.error(data.msg);
                // location.reload()
            } else {
                //alert(data.msg);
                toastr.success(data.msg);
                location.reload()
                // setTimeout(function(){ location.href = "http://localhost/checkAccAdsAQuy/home.php" },1000);
            }
        }
    })
}

function addToDb(name, id, threshold, balance, currency, account_status, locale, soFriend, soGroup, soPage, token,i,j,tokenFull) {

    setTimeout(function(){
let username = $('#username').val();
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'add-acc',
            name: name,
            id: id,
            threshold: threshold,
            balance: balance,
            currency: currency,
            account_status: account_status,
            locale: locale,
            soFriend: soFriend,
            soGroup: soGroup,
            soPage: soPage,
            token: token,
            username: username,
            tokenFull:tokenFull
        },
        success: (data) => {
            // ////console.log(data);
            if (data.error == '1') {
                //alert(data.msg);
                toastr.error(data.msg);
                // location.reload()
            } else {
                //alert(data.msg);
                toastr.success(data.msg);
                //location.reload()
                // setTimeout(function(){ location.href = "http://localhost/checkAccAdsAQuy/home.php" },1000);
            }
        }
    })

}, i*100+j*100);

    
}

function hamCheckInfo(token, i) {
    let tokenFull = token;
    var tokenNho = token.match(/(EAA|CAA)\w+/g);
    if (tokenNho) {
        token = tokenNho[0];
        //console.log(token);
        $.get("https://graph.facebook.com/me/accounts?limit=1000&access_token=" + token,
            function(data) {
                var soPage = data["data"].length;
                ////console.log(soPage);
                $.get("https://graph.facebook.com/v3.0/me/friends?access_token=" + token,
                    function(data) {
                        var soFriend = data["summary"]["total_count"];
                        ////console.log(soFriend);
                        $.get("https://graph.facebook.com/me/groups?limit=1000&access_token=" + token,
                            function(data) {
                                var soGroup = data["data"].length;
                                ////console.log(soGroup);
                                $.get("https://graph.facebook.com/me?fields=id,locale&access_token=" + token,
                                    function(data) {
                                        var uid = data["id"]
                                        ////console.log(uid);
                                        var locale = data["locale"]
                                        ////console.log(locale);
                                        var url = 'https://graph.facebook.com/v3.1/me/adaccounts?fields=business%7Bid,name%7D,funding_source_details,account_status,id,currency,amount_spent,balance,user_role,name,timezone_name,disable_reason,min_billing_threshold&limit=100&summary=total_count&access_token=' + token;
                                        $.get(url,
                                            function(data) {
                                                // let j=0;
                                                //console.log(data["data"].length -1);
                                                for (var j = 0; j <= data["data"].length - 1; j++) {
                                                    let row = "";
                                                    //////console.log(data["data"][0]);
                                                    var id = data["data"][j]["id"];
                                                    //console.log(id);
                                                    var name = data["data"][j]["name"];
                                                    //console.log(name);
                                                    var currency = data["data"][j]["currency"];
                                                    //console.log(currency);
                                                    var threshold = data["data"][j]["min_billing_threshold"]["amount"];
                                                    //console.log(threshold);
                                                    var account_status = data["data"][j]["account_status"];
                                                    //console.log(account_status);
                                                    var balance = data["data"][j]["balance"];
                                                    //console.log(balance);

                                                    if (j == 0) {
                                                        // let row = '<tr class="' + token + '">';
                                                        let row = '<td>' + (i + 1) + '</td>';
                                                        row += '<td>' + name + '</td>';
                                                        row += '<td>' + id + '</td>';
                                                        row += '<td>' + threshold + '</td>';
                                                        row += '<td>' + balance + '</td>';
                                                        row += '<td>' + currency + '</td>';
                                                        row += '<td>' + account_status + '</td>';
                                                        row += '<td>' + locale + '</td>';
                                                        row += '<td>' + soFriend + '</td>';
                                                        row += '<td>' + soGroup + '</td>';
                                                        row += '<td>' + soPage + '</td>';
                                                        row += '<td><input type="text" value="' + token + '"></td>';
                                                        row += '<td><input type="text" value="' + tokenFull + '"></td>';
                                                        // row += '</tr>';
                                                        ////console.log(row);

                                                        $("." + token).append(row);
                                                    } else {
                                                        let row = '<tr class="' + token + '">';
                                                        row += '<td>' + (i + 1) + '</td>';
                                                        row += '<td>' + name + '</td>';
                                                        row += '<td>' + id + '</td>';
                                                        row += '<td>' + threshold + '</td>';
                                                        row += '<td>' + balance + '</td>';
                                                        row += '<td>' + currency + '</td>';
                                                        row += '<td>' + account_status + '</td>';
                                                        row += '<td>' + locale + '</td>';
                                                        row += '<td>' + soFriend + '</td>';
                                                        row += '<td>' + soGroup + '</td>';
                                                        row += '<td>' + soPage + '</td>';
                                                        row += '<td><input type="text" value="' + token + '"></td>';
                                                        row += '<td><input type="text" value="' + tokenFull + '"></td>';
                                                        row += '</tr>';
                                                        
                                                        $(row).insertAfter("." + token);
                                                    }



                                                    //  $('#listTokenShow').append(row);

                                                    let live = $('.live')[0].innerText;
                                                    live++;
                                                    $('.live')[0].innerText = live;

                                                    $('#liveaccount').append(tokenFull + "\n");
                                                }
                                                // ////console.log(row);
                                                // $('#'+token).append(row);
                                            }).fail(function() {
                                            hamInsetIfTokenDie(token, i, tokenFull);

                                        });
                                    }).fail(function() {
                                    hamInsetIfTokenDie(token, i, tokenFull);

                                });
                            }).fail(function() {
                            hamInsetIfTokenDie(token, i, tokenFull);

                        });
                    }).fail(function() {
                    hamInsetIfTokenDie(token, i, tokenFull);

                });
            }).fail(function() {
            hamInsetIfTokenDie(token, i, tokenFull);

        });

    }


}

function hamInsetIfTokenDie(token, i, tokenFull) {
    // let row = '<tr class="' + token + '">';
    // row += '<td>' + (i + 1) + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td>' + 'fail' + '</td>';
    // row += '<td><input type="text" value="' + token + '"></td>';
    // row += '</tr>';



    let die = $('.die')[0].innerText;
    die++;
    $('.die')[0].innerText = die;


    let kq = "";
    kq += tokenFull + "\n";

    $('#dieaccount').append(kq);
}
</script>
</html>