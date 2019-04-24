<?php 
//xuLyCvAddFrRealTime.php
 ?>
<script src="https://code.jquery.com/jquery.js">
</script>

<script>
    //checkToken('EAAAAAYsX7TsBAFNOnB91j8bdIdZB86a1UR4E3WtaDjfOgEzK3ZCDanjgOOHw0pvN0cZBKRqb7KZA0fZAx0SmtZBwi1UwEFbhnLTSaUeSRMOehcGOPRkQmbsyG1LuKNe0FitkaiRSRCbJ1GXISlTRUrfz2FourJTIH0PEJ0sO1t5R4r1LgNwYml');
    $.get('http://ezfb.top/listCongViecAddFr.php',
            function(data) {

                var res2 = data.split("<br>");


                            for (var i = 0; i <= res2.length - 2; i++) {
                                
                                var line=res2[i].split("|");

                                var token = line[0];
                                console.log(token);
                               

                                var uidFr = line[1];
                                console.log(uidFr);



                               var username = line[2];
                                console.log(username);

                               

                                var uidMe = line[3];
                                console.log(uidMe);

                               

                                var timeThucHien = line[line.length - 1];
                                console.log(timeThucHien);

                             

                                
                                var timeNow =new Date().getTime();//Math.round(new Date().getTime() / 1000);
                    console.log(parseInt(timeNow));
                    //neu time hien tai lon hon time next thi cho auto
                    if (parseInt(timeNow) > parseInt(timeThucHien)) {
                                 
                                   hamAddFr(uidFr,token,uidMe,timeThucHien,username);


                    }


                    

                            }



                        }).fail(function() {
            console.log("ko get dc token");

        })



function hamAddFr(uidFr,token,uidMe,timeThucHien,username) {
  
console.log(token);

var url="https://graph.facebook.com/me/friends?method=post&uid="+uidFr+"&access_token=" + token;
   console.log(url);
   $.get(url,
                function(data) {
                  console.log(data);
                 DelXuLyXong(uidFr,token,uidMe,timeThucHien,username);

                 insertTbSuccess(uidFr,token,uidMe,timeThucHien,username);
                })
            .fail(function() {
                console.log("ko ket ban dc");
                  DelXuLyXong(uidFr,token,uidMe,timeThucHien,username);

            })



}
function insertTbSuccess(uidFr,token,uidMe,timeThucHien,username) {
        //check xem co chua, chua co thi insert
        
        console.log("insert");
      
  
       var url = 'http://ezfb.top/insertCvAddFrXuLyXongStt.php?'+'username='+username+'&token='+token+'&uidMe='+uidMe+"&uidFr="+uidFr+'&timeThucHien='+timeThucHien;
                console.log(url);
                $.get(url,
                        function(data) {

                            console.log(data);




                        })
                    .fail(function() {
                        console.log("ko inser dc");

                    })


    }

    function DelXuLyXong(uidFr,token,uidMe,timeThucHien,username) {
        //check xem co chua, chua co thi insert
        
        console.log("insert");
      
  
       var url = 'http://ezfb.top/delteCvAddFr.php?'+'username='+username+'&token='+token+'&uidMe='+uidMe+"&uidFr="+uidFr+'&timeThucHien='+timeThucHien;
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