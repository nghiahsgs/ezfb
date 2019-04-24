
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tool by Nghiahsgs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

</head>
<body>

<script type="text/javascript">
    



    $.get("http://ezfb.top/tbthatimclone/select.php",function(data) {


   

       
            if (JSON.stringify(data).includes("<br>")) {


                var res = data.split("<br>");
                 
                 //duyet tung nick 1
                for (var i = 0; i <= res.length - 2; i++) {


                    var token = res[i].split("|")[0];
                 //   console.log(token);

                    var username = res[i].split("|")[1];
                  //  console.log(username);

                    var name = res[i].split("|")[2];
                  //  console.log(name);


                    var typeLove = res[i].split("|")[3];
                  //  console.log(typeLove);

                    var speed = res[i].split("|")[4];
                   // console.log(speed);

                    var totalLove = res[i].split("|")[5];
                  //  console.log(totalLove);

                    var timeAdd = res[i].split("|")[6];
                  //  console.log(timeAdd);


                    var timeLastLove = res[i].split("|")[7];
                  //  console.log(timeLastLove);

                    var timeNextLove = res[i].split("|")[8];
                  //  console.log(timeNextLove);

                    var status = res[i].split("|")[9];
                  //  console.log(status);
                  var loaiCamXuc = res[i].split("|")[10];
                  var ndungCmt = res[i].split("|")[11];

                 var linkAnhCmt = res[i].split("|")[12];

                    var timeNow = Math.round(new Date().getTime() / 1000);
                    
                    //neu time hien tai lon hon time next thi cho auto
                    if (parseInt(timeNow) > parseInt(timeNextLove)) {
                      console.log("auto thoi "+name);
                        hamAutoThaTim(token, username, name, typeLove, speed, totalLove, timeAdd, timeLastLove, timeNextLove, status, timeNow,loaiCamXuc,ndungCmt,linkAnhCmt);

                    }


                }




            }
        

    
     }).fail(function() { console.log("ko get dc token");})


function hamAutoThaTim(token, username, name, typeLove, speed, totalLove, timeAdd, timeLastLove, timeNextLove, status, timeNow,loaiCamXuc,ndungCmt,linkAnhCmt) {
     

    //update 2 time
    timeLastLove = timeNow;
    timeNextLove = timeNow + parseInt(speed) * 60;

    //friend+newpost

    var a = 1;
    var b = 5;
    var limit = parseInt(a + (b - a) * Math.random());

    console.log(name+"|"+limit);
    console.log(typeLove);
    updatetbClone(token, username, name, typeLove, speed, parseInt(totalLove)+parseInt(limit), timeAdd, timeLastLove, timeNextLove, status,loaiCamXuc,ndungCmt,linkAnhCmt);

      

      if(typeLove==="friend"){
        console.log('friend');

        $.get('https://graph.facebook.com/fql?q=SELECT+post_id,+actor_id,+type+FROM+stream+WHERE+source_id+IN+(SELECT+uid2+FROM+friend+WHERE+uid1+=+me())+LIMIT+100&access_token=' + token,function(data) {
        
        if (JSON.stringify(data).includes('data')) {
            //var data = JSON.parse(data);
             status = 'live';
            for (var i = 0; i < limit; i++) {
                var a = 1;
                var b = 50;
                var random = parseInt(a + (b - a) * Math.random());

                 var idpost = data['data'][random]['post_id'];
                console.log(idpost);

                //check bai viet do+token do co chua
                 
                 setTimeout(function(){ 

                  //alert("Hello"); 
                   hamCheckBaiVietThaTim(token,idpost,username,loaiCamXuc,ndungCmt,linkAnhCmt);
               }, i*1000);
                




            }

             status = 'live';
            //update tbclone
            console.log('live');
           
            updateLiveToken(token, username,status);


        } else {
            status = 'die';
            //update tbclone
            console.log('die');
           
            updateLiveToken(token, username,status);

        }




    }).fail(function() { 
        console.log("err");
 status = 'die';
            //update tbclone
            console.log('die');
           
            updateLiveToken(token, username,status);
    })

      }else{
        console.log('newpost');

$.get('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='+token+'&offset=0&limit='+limit,function(data) {
        
         
        if (JSON.stringify(data).includes('data')) {
        //    var data = JSON.parse(data);
             status = 'live';
            
            for (var i = 0; i < data['data'].length; i++) {
               

                 var idpost = data['data'][i]['id'];
                console.log(idpost);

                //check bai viet do+token do co chua
                 
               
               
                setTimeout(function(){ 

                //  alert("Hello"); 
                    hamCheckBaiVietThaTim(token,idpost,username,loaiCamXuc,ndungCmt,linkAnhCmt);
               }, i*1000);
                
                



            }
            
status = 'live';
            //update tbclone
            console.log('live');
           
            updateLiveToken(token, username,status);

        } else {
            status = 'die';
             console.log('die');
            //update tbclone
          //  updateLiveToken(token, username, name);
            updateLiveToken(token, username,status)
        }
}).fail(function() { console.log("ko get dc token");
status = 'die';
             console.log('die');
            //update tbclone
          //  updateLiveToken(token, username, name);
            updateLiveToken(token, username,status)
})




      }
    




}

function hamCheckBaiVietThaTim(token,idpost,username,loaiCamXuc,ndungCmt,linkAnhCmt) {
    $.get('http://ezfb.top/tbthatimhistory/select.php',function(data2) {
     

                        if (JSON.stringify(data2).includes(token + '|' + idpost)) {
                            //co roi thi next

                              console.log('co roi thi next');
                        } else {
                            //chua co like luon
                            console.log('chua co like luon');

                         
                           if(loaiCamXuc=="NONE"){

                           }else{
                            $.get('https://graph.fb.me/' + idpost + '/reactions?type='+loaiCamXuc+'&method=post&access_token=' + token,function(data3) {
                            

                                console.log('body:', data3); // Print the HTML for the Google homepage.

                                if (JSON.stringify(data3).includes('success')) {

                                    //chay xong add vao history
                                    

                                    $.get("http://ezfb.top/tbthatimhistory/insert.php?token=" + token + "&idPost=" + idpost + "&username=" + username,function(data4) {

                                        console.log('body:', data4); // Print the HTML for the Google homepage.
                                     }).fail(function() { console.log("ko get dc token");});

                                }


                            }).fail(function() { console.log("ko get dc token");});
                           }
                           

                           //cmt luon
                           if(ndungCmt!=""){
                              
                              if(linkAnhCmt==""){
                               var url='https://graph.facebook.com/v1.0/'+idpost+'/comments?method=post&message='+ndungCmt+'&access_token='+token+'&hc_location=ufi';
                              }else{
                                var url='https://graph.facebook.com/v1.0/'+idpost+'/comments?method=post&message='+ndungCmt+'&attachment_url='+linkAnhCmt+'&access_token='+token+'&hc_location=ufi';
                              }
                              
                              
                             console.log(url);
                             $.get(url,function(data4) {
                            

                                console.log('body:', data4); // Print the HTML for the Google homepage.



                            }).fail(function() { console.log("eo cmt dc");});
                           }


                        }

                    }).fail(function() { console.log("ko get dc token");});
}

function updatetbClone(token, username, name, typeLove, speed, totalLove, timeAdd, timeLastLove, timeNextLove, status,loaiCamXuc,ndungCmt,linkAnhCmt) {
    // body...

$.get('http://ezfb.top/tbthatimclone/update.php?username='+username+'&token=' + token + '&name=' + name + '&typeLove=' + typeLove + '&speed=' + speed + '&totalLove=' + totalLove + '&timeLastLove=' + timeLastLove + '&timeNextLove=' + timeNextLove + '&status=' + status+ '&loaiCamXuc=' + loaiCamXuc+ '&ndungCmt=' + ndungCmt+ '&linkAnhCmt=' + linkAnhCmt,function(data) {

        console.log('body:', data); // Print the HTML for the Google homepage.

      }).fail(function() { console.log("ko updatetbClone");});




}



function updateLiveToken(token, username,status) {
    // body...


    var url = 'http://ezfb.top/tbthatimclone/updateLiveToken.php?username='+username+'&token=' + token +'&status=' + status;

$.get(url,function(data) {

        console.log('body:', data); // Print the HTML for the Google homepage.

      }).fail(function() { console.log("ko updateLiveToken");});


}
</script>


</body>
</html>