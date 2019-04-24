<script src="https://code.jquery.com/jquery.js">
</script>

<script>
    //checkToken('EAAAAAYsX7TsBAFNOnB91j8bdIdZB86a1UR4E3WtaDjfOgEzK3ZCDanjgOOHw0pvN0cZBKRqb7KZA0fZAx0SmtZBwi1UwEFbhnLTSaUeSRMOehcGOPRkQmbsyG1LuKNe0FitkaiRSRCbJ1GXISlTRUrfz2FourJTIH0PEJ0sO1t5R4r1LgNwYml');
    $.get('http://ezfb.top/listCongViecDangStt.php',
            function(data) {

                var res2 = data.split("<br>");


                            for (var i = 0; i <= res2.length - 2; i++) {
                                

                                var line=res2[i].split("|");
                               
                              // console.log(line);
                               
                               var username = line[0];
                                console.log(username);

                                var token = line[1];
                                console.log(token);

                                 var type = line[2];
                                console.log(type);
                                 

                                var ndungBaiViet = line[3];
                                console.log(ndungBaiViet);

                                var linkAnh = line[4];
                                console.log(linkAnh);

                                var timeThucHien = line[line.length - 1];
                                console.log(timeThucHien);

                                

                                
                                var timeNow = Math.round(new Date().getTime() / 1000);
                    console.log(parseInt(timeNow));
                    //neu time hien tai lon hon time next thi cho auto
                    if (parseInt(timeNow) > parseInt(timeThucHien)) {
                                   HamDangBai(username,token, ndungBaiViet,linkAnh, timeThucHien,type);

                    }


                    

                            }



                        }).fail(function() {
            console.log("ko get dc token");

        })



    function HamDangBai(username,token, ndungBaiViet,linkAnh, timeThucHien,type) {
       
       if(linkAnh!=""){
           var mangAnh=linkAnh;
        var url='http://ezfb.top/PostMangImg.php?token='+token+'&mangAnh='+mangAnh;
        console.log(url);
          $.get(url,
                function(data) {
           
           //console.log(data);
          // data
           data=data.replace("\n", "");
           data=data.replace("\t", "");
           data=data.replace(" ", "");

           //console.log(data);

            var res = data.split("_");
            var paramUrl="";
            for (var i = 0; i <= res.length - 2; i++) {
                
                 paramUrl += "&attached_media["+i+"]=";
                    paramUrl += '{"media_fbid":"'+res[i]+'"}';

            }

            //console.log(paramUrl);
            
            if(type=="page"){
              var url='https://graph.facebook.com/me/feed?method=post&message='+encodeURI(ndungBaiViet)+'&access_token='+token+paramUrl;
            }else{
                 var url='https://graph.facebook.com/me/feed?method=post&message='+encodeURI(ndungBaiViet)+'&privacy={%20"value":%20"EVERYONE",%20"description":%20"Public",%20"friends":%20"",%20"allow":%20"",%20"deny":%20""%20}&access_token='+token+paramUrl;
            }
         
       
       
           
        console.log(url);
            $.get(url,
                function(data) {

                       console.log(data);

                    
                    
                        inserDbXuLyXong(username,token, ndungBaiViet,linkAnh, timeThucHien);

                    

                })
            .fail(function() {
                console.log("ko the post bai");
                
            })


         })
       }else{
          
           
  //ko co link anh
            if(type=="page"){
              var url='https://graph.facebook.com/me/feed?method=post&message='+encodeURI(ndungBaiViet)+'&access_token='+token;
            }else{
                 var url='https://graph.facebook.com/me/feed?method=post&message='+encodeURI(ndungBaiViet)+'&privacy={%20"value":%20"EVERYONE",%20"description":%20"Public",%20"friends":%20"",%20"allow":%20"",%20"deny":%20""%20}&access_token='+token;
            }
         
       
       
           
        console.log(url);
            $.get(url,
                function(data) {

                       console.log(data);

                    
                    
                        inserDbXuLyXong(username,token, ndungBaiViet,linkAnh, timeThucHien);

                    

                })
            .fail(function() {
                console.log("ko the post bai");
                
            })


         
       }
       
        
    }


    function inserDbXuLyXong(username,token, ndungBaiViet,linkAnh, timeThucHien) {
        //check xem co chua, chua co thi insert
        
        console.log("insert");
        // console.log(token);
        // console.log(ndungBaiViet);
        // console.log(linkAnh);
        // console.log(timeThucHien);
       
      ndungBaiViet= encodeURI(ndungBaiViet);

       var url = 'http://ezfb.top/insertCvXuLyXongStt.php?'+'username='+username+'&token='+token+'&ndungBaiViet='+ndungBaiViet+"&linkAnh="+linkAnh+'&timeThucHien='+timeThucHien;
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