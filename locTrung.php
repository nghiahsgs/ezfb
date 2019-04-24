<?php 
include('head.php');
 ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
          <!-- <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>   -->
          <div class="panel">
              <div class="panel-heading"> <center><i class="fa fa-retweet"></i> Lọc trùng </center>
</div>
           <div class="panel-body">
           <div class="col-md-12">
                        <div class="form-group">
                            <label>* Nhập Vào Token:</label>
                            <textarea type="text" name="" id="token" rows="6" class="form-control" placeholder="Mỗi Token 1 Dòng"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>* Đã Lọc:</label>
                            <textarea type="text" name="" id="daloc" rows="6" class="form-control" placeholder="List Token "></textarea>
                        </div>
                        <div class="form-group">
                            <span class="label label-primary">Tổng: <b id="alltoken">0</b></span>
                            <span class="label label-success">Còn Lại: <b id="sodl">0</b></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group button-action">
                            <button type="button" class="btn btn-success" onclick="loctrung();">Lọc trùng</button>
                        </div>
                         <div class="form-group button-action">
                            <button type="button" class="btn btn-success" onclick="xuattrung();">Xuất id trùng</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>* List bị trùng:</label>
                            <textarea type="text" name="" id="tokenTrung" rows="6" class="form-control" placeholder="Mỗi Token 1 Dòng"></textarea>
                        </div>
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

<script type="text/javascript">
       function xuattrung(argument) {
           var tokenTrcKhiLoc = $('#token').val();

           var mangTokenDaLoc = $('#daloc').val().split("\n");
           for (var i = 0; i <= mangTokenDaLoc.length - 1; i++) {
               
              
            tokenTrcKhiLoc = tokenTrcKhiLoc.replace(mangTokenDaLoc[i], "");
           }
           
           $('#tokenTrung').val(tokenTrcKhiLoc);
       }
        function loctrung() {
            var itoken = $('#token').val().split("\n")
            $('#alltoken').html(itoken.length);
            var text = document.getElementById('token').value.replace(/\r/g, '');
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
            document.getElementById('daloc').value = textoutarr.join('\n');
            var sodl = $('#daloc').val().split("\n")
            $('#sodl').html(sodl.length);
            document.getElementById('removed_output').value = cachearr.join('\n');

        }
    </script>
</html>

