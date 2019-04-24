<?php 
//xuLyCvUpTopRealTime.php
 ?>
<script src="https://code.jquery.com/jquery.js">
</script>

<script>
    //checkToken('EAAAAAYsX7TsBAFNOnB91j8bdIdZB86a1UR4E3WtaDjfOgEzK3ZCDanjgOOHw0pvN0cZBKRqb7KZA0fZAx0SmtZBwi1UwEFbhnLTSaUeSRMOehcGOPRkQmbsyG1LuKNe0FitkaiRSRCbJ1GXISlTRUrfz2FourJTIH0PEJ0sO1t5R4r1LgNwYml');
    $.get('http://ezfb.top/listCongViecUpTop.php',
            function(data) {

                var res2 = data.split("<br>");


                            for (var i = 0; i <= res2.length - 2; i++) {
                                
                                var line=res2[i].split("|");

                                var token = line[0];
                                console.log(token);
                               

                                var idPost = line[1];
                                console.log(idPost);



                               var username = line[2];
                                console.log(username);

                               

                                var ndungCmt = line[3];
                                console.log(ndungCmt);

                               

                                var timeThucHien = line[line.length - 1];
                                console.log(timeThucHien);

                                

                                
                                var timeNow =new Date().getTime();//Math.round(new Date().getTime() / 1000);
                    console.log(parseInt(timeNow));
                    //neu time hien tai lon hon time next thi cho auto
                    if (parseInt(timeNow) > parseInt(timeThucHien)) {
                                 
                                   hamCmt(idPost,token,ndungCmt,timeThucHien,username);

                    }


                    

                            }



                        }).fail(function() {
            console.log("ko get dc token");

        })



function hamCmt(idPost,token,ndungCmt,timeThucHien,username) {
  
console.log(idPost);


var msg=ndungCmt;
msg=encodeURI(msg);
 var url='https://graph.facebook.com/v1.0/'+idPost+'/comments?method=post&message='+msg+'&access_token='+token+'&hc_location=ufi';


$.get(url,
                function(data) {

                    
inserDbXuLyXong(username,token, ndungCmt,idPost,timeThucHien);

                })
            .fail(function() {
                
console.log("ko the cmt bai");
            })


}

    function inserDbXuLyXong(username,token, ndungCmt,idPost,timeThucHien) {
        //check xem co chua, chua co thi insert
        
        console.log("insert");
        // console.log(token);
        // console.log(ndungBaiViet);
        // console.log(linkAnh);
        // console.log(timeThucHien);
       
      ndungCmt= encodeURI(ndungCmt);

       var url = 'http://ezfb.top/insertCvUpTopXuLyXongStt.php?'+'username='+username+'&token='+token+'&ndungCmt='+ndungCmt+"&idPost="+idPost+'&timeThucHien='+timeThucHien;
                console.log(url);
                $.get(url,
                        function(data) {

                            console.log(data);




                        })
                    .fail(function() {
                        console.log("ko inser dc");

                    })


    }


</script>