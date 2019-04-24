<!DOCTYPE html>
<html lang="en">
<head>
  <title>Get info token</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Get các thông tin cơ bản của token</h2>
  <p>Cho nick dưới dạng: uid|name|token|friend_count|friend_request</p>
  <form>
    <div class="form-group">
      <label for="comment">Cho list token vào đây:</label>
      <textarea class="form-control" rows="5" id="ndungListToken"></textarea>
 
<button type="button" onclick="getInfoToken()" class="btn btn-primary">Get info</button>

    </div>
  </form>
 <div class="ketqua">
 </div>
</div>
</body>
<script type="text/javascript">
function getInfoToken() {
   //tao lien cac text arrea
   
         let NdungAppend='<form>';
         NdungAppend+='<div class="form-group">';
         NdungAppend+='<label for="comment">Kết quả get info</label>';
         NdungAppend+='<textarea class="form-control" rows="5" id="ketquathu"></textarea>';
         NdungAppend+='</div>';
         NdungAppend+='</form>';

         $('.ketqua').append(NdungAppend);
     


    let ndungListToken=$('#ndungListToken').val();
    var res = ndungListToken.split('\n');
     for (var i = 0; i <= res.length - 1; i++) {
        let token=res[i];
        //console.log(token);
        hamCheckInfo(token);
     }
   // document.getElementById("demo").innerHTML = res;
}
function hamCheckInfo(token) {
        // body...
       
                $.get("https://graph.facebook.com/v3.0/me/friends?access_token=" + token,
                    function(data) {
                        var soFriend = data["summary"]["total_count"];
                        console.log(soFriend);
                        $.get("https://graph.facebook.com/me/friendrequests?access_token=" + token,
                            function(data) {
                                var soFriendRq = data["summary"]["total_count"];
                                console.log(soFriendRq);
                                
                                        $.get("https://graph.facebook.com/me?fields=id,birthday,name&access_token=" + token,
                                            function(data) {
                                                var id = data["id"];
                                                
                                               
                                              
                                                var name = data["name"];
                                              
                                                var row = id+"|"+name+"|"+token+"|"+soFriend+"|"+soFriendRq;
                                                
                                                console.log(row);
                                                 $('#ketquathu').append(row+'\n');

                                            })
                                   
                            })
                    })
            
    }


</script>
</html>