<div class="content container-fluid bootstrap snippets">
    <!--   <div class="row text-center"> -->
        <h2 style="font-family: cursive;font-weight: bold;">Quản lý inbox fanpage</h2>
      <p>Xin Chào <b><?php  echo $_SESSION['login']?> </b>
        <input type="hidden" id="username" value="<?php  echo $_SESSION['login']?>">
      <a href="logout.php" style="background: white;margin-left: 5px;">Logout</a>

      <div class="row row-broken">
        <div class="col-md-3">
          <div class="col-inside-lg decor-default chat chatNghiahsgs" style="overflow: hidden; outline: none;" tabindex="5000">
            <div class="chat-users">
              <h6>Khách hàng</h6>
                <!-- <div class="user" onclick="loadDetailTinNhan('nghiahsgs')">
                    <div class="avatar">
                   
                      <img src="https://graph.facebook.com/100028868341650/picture?width=30&amp;height=30">
                    <div class="status off"></div>
                    </div>
                    <div class="name">nghiahsgs</div>
                    <div class="mood">User mood</div>
                </div> -->
                
              
                
                
            </div>
          </div>
        </div>
       <!--  end col 3 -->
        <div class="col-md-6 chat chatNghiahsgsRight" style="overflow: hidden; outline: none;" tabindex="5001">
          <div class="col-inside-lg decor-default">
            <div class="chat-body">
              <h6>
                  <!-- <button type="button" class="btn btn-primary">Load more...</button> -->
              </h6>
              
             <!--  <div class="answer right">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                  <div class="status off"></div>
                </div>
                <div class="name">Alexander Herthic</div>
                <div class="text">
                  It is a long established fact that a reader will be. Thanks Mate!
                </div>
                <div class="time">5 min ago</div>
              </div> -->
              <div class="answer-add form-group">
                <!-- <input type="text" class="form-control" id="usr" style="width: 90%"> -->
                <!-- <span class="answer-btn answer-btn-1"></span>
                <span class="answer-btn answer-btn-2"></span> -->
              </div>
              
            </div>
          </div>
        </div>
        <!-- end col 9 -->
        <div class="col-md-3">
               <h6>Link Read</h6>
              <input type="text" class="form-control" id="link_read">
              <h6>Uid</h6>
              <input type="text" class="form-control" id="uidChat">
               <h6>Ghi chú</h6>
              <textarea class="form-control" rows="5" id="noteChat"></textarea>
              <button type="button" class="btn btn-primary" onclick="btnNoteChat()">NOTE</button>
        </div>
      </div>
      <!-- end row -->
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-9">
               <input type="text" class="form-control" id="ndungSend" style="width: 90%;float: left">
               <select class="form-control" id="ndungSendSample" style="width: 90%;float: left" onchange="updateNdungSend()">
                   <!-- <option>Xin chào</option>
                   <option>Xin chào 2</option>
                   <option>Xin chào 3</option>
                   <option>Xin chào 4</option> -->
               </select>
               <button type="button" class="btn btn-primary" style="width: 10%" onclick="btnSendChat()">SEND</button>
           </div>
       </div>

    </div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
    $(".chat").niceScroll();
})
</script>
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'p3plcpnl0537'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script></html>

<script type="text/javascript">

    function updateNdungSend() {
        let ndungSendSample=$('#ndungSendSample').val();
        console.log(ndungSendSample);
        $('#ndungSend').val(ndungSendSample);

    }
     function loadndungSendSample() {
         $.ajax({
           url: 'module/module_post.php',
           type: 'POST',
           dataType: 'JSON',
           data: {
               t: 'load-config-fb'
           },
           success: (data) => {
//               console.log(data);
               let ndungSendSample = data["data"][0]['value'];
               
             //  console.log(ndungSendSample);
               var Things = ndungSendSample.split("\n");
               let ListOption="";
               for (var i = 0; i <= Things.length - 1; i++) {

                   ListOption+="<option>"+Things[i]+"</option>";
               }

              $('#ndungSendSample').append(ListOption);
           }
       })

    }
 $(document).ready(function(argument) {
    loadndungSendSample();
    
    //console.log("nghiahsgs");
    // body...
    let username=$("#username").val();
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'get-list-nguoi-chat',
            username:username

        },
        success: (data) => {
        	choNguoiChatMoi(data["data"].length - 1,username);
            //console.log(data);
            //for (var i = data["data"].length - 1; i>=0 ; i--) {
            for (var i = 0; i<=data["data"].length - 1 ; i++) {
                let idchat = data["data"][i]['idchat'];
                let link_read = data["data"][i]['link_read'];
                let nameChat = data["data"][i]['nameChat'];
                let ndungChatUnread = data["data"][i]['ndungChatUnread'];
                //let note = data["data"][i]['note'];
                let uidChat = data["data"][i]['uidChat'];
                let updated_time = data["data"][i]['updated_time'];
                let Snippet = data["data"][i]['Snippet'];
                
                let user = '<div class="user" ';
                user += 'onclick="' + "loadDetailTinNhan('" + idchat + "',"+i+")" + '">';
                user += '<div class="avatar">';
                user += '<img src="https://graph.facebook.com/' + uidChat + '/picture?width=30&amp;height=30">';
                user += '<div class="status off"></div>';
                user += '</div>';
                user += '<div class="name">' + nameChat + '</div>';
                if (ndungChatUnread) {
                    user += '<div class="mood" style="font-weight: bold;">' + Snippet + '</div>';
                } else {
                    user += '<div class="mood">' + Snippet + '</div>';
                }
                //  user+='<div class="mood">'+Snippet+'</div>';
                user += '</div>';
                $('.chat-users').append(user);
               
                // if (i === 0) {

                //     loadDetailTinNhan(idchat);
                // }
              
                giaAjaxRealTime(idchat,i);
            }

            $('.chatNghiahsgs').scrollTop($('.chatNghiahsgs')[0].scrollHeight - $('.chatNghiahsgs')[0].clientHeight);
        }
    })
})

function choNguoiChatMoi(soLuongNguoiChatCu,username) {
setInterval(function(){
   $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'get-list-nguoi-chat',
            username:username

        },
        success: (data) => {
        	//console.log(soLuongNguoiChatCu);
        	//console.log(data["data"].length - 1);
            if(parseInt(soLuongNguoiChatCu)<parseInt(data["data"].length - 1)){
            	//alert("new msg, reaload");
            	//console.log("tin nhan moi");
              var audio = new Audio('audio_file.mp3');
                audio.play();
                location.reload();
            }
        }
    })

}, 3000);
}
 function giaAjaxRealTime(idchat,i) {
 setInterval(function(){
   getSnippet(idchat,i);
}, 3000);
 }

 function getSnippet(idchat,i) {
     $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'load-snippet',
            idchat: idchat
        },
        success: (data) => {
            //console.log('getSnippet:');
           // console.log(data);
           // console.log(data['data']);
            
            //console.log(data['data']['Snippet']);

            let SnippetHienThi=document.querySelectorAll(".mood")[i].innerText;
            //console.log(SnippetHienThi);
            if(data['data']['Snippet']!==SnippetHienThi){
              //console.log("khac nhau => update");
              document.querySelectorAll(".mood")[i].style.fontWeight='bold';
              document.querySelectorAll(".mood")[i].innerText=data['data']['Snippet'];
              console.log("tin nhan moi");
              var audio = new Audio('audio_file.mp3');
                audio.play();
            }else{
              //console.log("giong nhau");
            }
            
         }
    })
 }
function btnNoteChat() {
    let idchat = $('#uidChat').val();
    let note = $('#noteChat').val();
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'create-note-chat',
            idchat: idchat,
            note: note
        },
        success: (data) => {
            console.log(data);
            if (data.error) {
                toastr.error("Thất bại");
            } else {
                toastr.success("Thành công");
                // setTimeout(function(){
                //     location.reload()
                // },1000);
            }
        }
    })
}
function btnSendChat() {
    let idchat = $('#uidChat').val();
    let ndungSend = $('#ndungSend').val();
    $('#ndungSend').val("");
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'send-message',
            idchat: idchat,
            ndungSend: ndungSend
        },
        success: (data) => {
            console.log(data);
            if (data.error) {
              // toastr.error("Thất bại");
            } else {
               // toastr.success("Thành công");
                // setTimeout(function(){
                //     location.reload()
                // },1000);
                //Hieu ung them tin nhan vua chat
                insertTinNhanBody('', '', ndungSend, 'right', 'i', '');
            }
        }
    })
}
function loadDetailTinNhan(idchat,i) {
    
    document.querySelectorAll(".mood")[i].style.fontWeight='';
    $(".answer.left").remove();
    $(".answer.right").remove();
  
    $.ajax({
        url: 'module/module_post.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            t: 'load-detail-tin-nhan',
            idchat: idchat
        },
        success: (data) => {
            console.log(data);
            let idchat = data["data"]['idchat'];
            let link_read = data["data"]['link_read'];
            let nameChat = data["data"]['nameChat'];let nameChatHienThi = nameChat;
            let ndungChat = data["data"]['ndungChat'];
            let ndungChatUnread = data["data"]['ndungChatUnread'];
            console.log("ndungChatUnread:" + ndungChatUnread);
            let note = data["data"]['note'];
            let uidChat = data["data"]['uidChat'];
            let updated_time = data["data"]['updated_time'];
            
            //console.log(ndungChat);

              $("#link_read").val(link_read);
    $("#uidChat").val(idchat);
    $("#noteChat").val(note);


            var res = "";
            if (ndungChatUnread) {
                // console.log("1515");
                //res = (ndungChat + '<br>' + ndungChatUnread).split("<br>");
                res = ndungChat.split("<br>");
            } else {
                //console.log("1414");
                res = ndungChat.split("<br>");
            }
            for (var j = res.length - 1; j >=0 ; j--) {
                let line = res[j];
                //  console.log(line);
                var res2 = line.split(":");
                nameChat = res2[0];
                ndungNgan = res2[1];
                if (nameChat.includes('U')) {
                    leftOrRight = "left";
                } else {
                    leftOrRight = "right";
                }
                // console.log(nameChat);
                // console.log(leftOrRight);
                insertTinNhanBody(uidChat, nameChat, ndungNgan, leftOrRight, nameChat, nameChatHienThi)
            }
            //  //xoa tin nhan da doc, gop no vao tin nhan da doc
            //console.log("update-tin-nhan-da-doc");
            //  console.log(ndungChat+'<br>'+ndungChatUnread);
            
            if (ndungChatUnread) {
                // console.log("xoa va update");
                // $.ajax({
                //     url: 'module/module_post.php',
                //     type: 'POST',
                //     dataType: 'JSON',
                //     data: {
                //         t: 'update-tin-nhan-da-doc',
                //         idchat: idchat,
                //         ndungChat: ndungChat + '<br>' + ndungChatUnread
                //     },
                //     success: (data) => {
                //         console.log(data);
                //     }
                // })
                //console.log("xoa da doc");
                $.ajax({
                    url: 'module/module_post.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        t: 'update-tin-nhan-chua-doc',
                        idchat: idchat,
                        ndungChatUnread: ''
                    },
                    success: (data) => {
                        console.log(data);
                    }
                })
            }
            $('.chatNghiahsgsRight').scrollTop($('.chatNghiahsgsRight')[0].scrollHeight - $('.chatNghiahsgsRight')[0].clientHeight);

        }
    })
}

function insertTinNhanBody(uidChat, nameChat, ndungNgan, leftOrRight, IOrU, nameChatHienThi) {
    let tinNhanLeft;
    if (leftOrRight === 'left') {
        tinNhanLeft = '<div class="answer left">';
    } else {
        tinNhanLeft = '<div class="answer right">';
    }
    tinNhanLeft += '<div class="avatar">';
    if (IOrU.includes('U')) {
        tinNhanLeft += '<img src="https://graph.facebook.com/' + uidChat + '/picture?width=30&amp;height=30">';
    } else {
        tinNhanLeft += '<img src="https://bootdey.com/img/Content/avatar/avatar1.png">';
        //tinNhanLeft+='https://bootdey.com/img/Content/avatar/avatar1.png';
    }
    tinNhanLeft += '<div class="status online"></div>';
    tinNhanLeft += '</div>';
    if (IOrU.includes('U')) {
        tinNhanLeft += '<div class="name">' + nameChatHienThi + '</div>';
    } else {
        tinNhanLeft += '<div class="name">Me</div>';
    }
    tinNhanLeft += '<div class="text">';
    tinNhanLeft += ndungNgan;
    tinNhanLeft += '</div>';
    tinNhanLeft += '<div class="time"></div>';
    tinNhanLeft += '</div>';
    //  $('.chat-body').append(tinNhanLeft);
    $(tinNhanLeft).insertBefore(".answer-add");
}
</script>