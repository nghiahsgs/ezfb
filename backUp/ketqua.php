<?php 
$uid=$_GET['uid'];
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="1.css">


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
                 <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js'></script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
        <div class='filter'>
                        Filter: <textarea id='txtKw' style='width:300px;vertical-align: top;' name='' placeholder='Copy tất cả 6 tên để tìm cùng lúc'></textarea>
                        
                        <button onclick="filter(document.getElementById('txtKw').value)" style='margin-right:30px;height: 34px;'>Search</button>


                        
                        
       </div> </div> </div>
<div class="ndungBackUp">
    
    <?php


$ndungFile=file_get_contents($uid.'.txt');
echo   $ndungFile;



    ?>

</div>
<!-- end ndung back up -->

</div>
<!-- end container -->

</body>
<script type="text/javascript">
    function filter(keyw) {
                        var arrkw= keyw.split('\n');
                        for (var i = 0; i < document.getElementsByClassName('line').length ; i++) {
                            var el = document.getElementsByClassName('line')[i];
                            var name= el.getAttribute('data-name');
                            var exist=false;
                            for(var j=0;j<arrkw.length;j++){
                                if(arrkw[j]!='')
                                {
                                    console.log(removeVi(name) +'='+removeVi(arrkw[j]));
                                    if (name==''||removeVi(name).indexOf(removeVi(arrkw[j])) > -1) {
                                        exist=true;
                                        if(arrkw.length>2 && removeVi(name)!=removeVi(arrkw[j]))
                                        {exist=false;}
                                    }
                                }
                            }
                            if(keyw==''){exist=true;}
                            if (exist) {
                                el.style.display = 'block';
                            } else {
                                el.style.display = 'none';
                            }
                        }
                        $(window).scroll();
                    }
                    function removeVi(str){
                        str=str+'';
                        if(str==null || str==''){return ''};
                        str= str.toLowerCase();
                        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,'a');
                        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,'e');
                        str= str.replace(/ì|í|ị|ỉ|ĩ/g,'i');
                        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,'o');
                        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,'u');
                        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,'y');
                        str= str.replace(/đ/g,'d');
                        str= str.replace(/!|@('@')|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\'|\&|\#|\[|\]|~/g,'-');
                        str= str.replace(/-+-/g,'-');
                        str= str.replace(/^\-+|\-+$/g,'');
                        str= str.replace(/'/g,'');
                        return  str;
                    }

</script>


    <script type="text/javascript">
        $(function() {
            $("img").lazyload({
                effect : "fadeIn"
            });
        });
    </script>
</html>




