<?php
require_once 'module_function.php';
if($_REQUEST){
	$return = array('error' => 0);
	$t = $_REQUEST['t'];

	if($t === 'add-new-user') {
           
           $username = $_REQUEST['username'];
           $password = $_REQUEST['password'];
         $typemember = $_REQUEST['typemember'];
         $uutien = $_REQUEST['uutien'];

          
             if (addNewUser($username,$password,$typemember,$uutien)) {
              $return['error'] = 0;
        $return['msg'] = 'Thành Công!';
        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Fail !';
        die(json_encode($return));
      }
        
    
  }

if($t === 'xoa-user') {
           
         
           $id = $_REQUEST['id'];
          
             
               
             if (xoaUser($id)) {
              $return['error'] = 0;
        $return['msg'] = 'Thành Công!';
        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Fail !';
        die(json_encode($return));
      }
        
    
  }

	if($t === 'get-list-user') {
           
           
               $data=getlistUser();
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
  
  if($t === 'load-config-fb') {
           
           
               $data=loadConfigFb();
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
  if($t === 'save-chat-mau') {
           
               $listCauChatMau = $_POST['listCauChatMau'];

               $data=saveChatmau($listCauChatMau);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
  if($t === 'save-info-fb') {
           
               $CookieCuaNick = $_POST['CookieCuaNick'];
               $idcuapage = $_POST['idcuapage'];

               $data=saveInfoFb($CookieCuaNick,$idcuapage);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
	if($t === 'sign-in') {
		$username = $_POST['username'];
		$password = $_POST['password'];

		
		if (!checkUser($username)) {
			$return['error'] = 1;
			$return['msg']   = 'Người Dùng Không Tồn Tại';
			die(json_encode($return));
		} else {
			$user = getUserbyName($username);

			//echo $user['password'];
			
			if ($user['password'] === $password) {
				//setSession($user, $config_site['admin']);


				$return['msg'] = 'Đăng Nhập Thành Công. Vui Lòng Chờ Chuyển Hướng';
				$_SESSION['login']=$username;

			

				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Mật Khẩu Bạn Nhập Không Đúng Cho Người Dùng Này';
				die(json_encode($return));
			}
		}
	}
if($t === 'get-list-nguoi-chat') {
		 
		  $username = $_POST['username'];
               $data=getListNguoiChat($username);
              
                
               
              $return = array('data' => $data);
             // print_r($return);
				die(json_encode($return));
				
		
	}
	if($t === 'load-detail-tin-nhan') {
		

		       $idchat = $_POST['idchat'];
               $data=loadDetailTinNhan($idchat);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'load-snippet') {
		

		       $idchat = $_POST['idchat'];
               $data=getSnippet($idchat);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	
	if($t === 'create-note-chat') {
		

		       $idchat = $_POST['idchat'];
		       $note = $_POST['note'];

               $data=updatenotechat($idchat,$note);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'create-note-chat') {
		

		       $idchat = $_POST['idchat'];
		       $note = $_POST['note'];

               $data=updatenotechat($idchat,$note);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'send-message') {
		

		       $idchat = $_POST['idchat'];
		       $ndungSend = $_POST['ndungSend'];

               $data=btnSendChat($idchat,$ndungSend);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'update-tin-nhan-da-doc') {
		

		       $idchat = $_POST['idchat'];
		       $ndungChat = $_POST['ndungChat'];

               $data=updateTinNhanDaDoc($idchat,$ndungChat);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'update-tin-nhan-chua-doc') {
		

		       $idchat = $_POST['idchat'];
		       $ndungChatUnread = $_POST['ndungChatUnread'];

               $data=updateTinNhanChuaDoc($idchat,$ndungChat);

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}

	//============================
if($t === 'get-lua-chon-nhom-nick') {
	
               $data=getlistNhomNick();
              

              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'get-lua-chon-nick') {
	
                $data=getalllistNick();
             
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'get-lua-chon-group') {
	
                $data=getlistAllGroup();
             
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'get-lua-chon-nhom-group') {
	
                $data=getlistNhomGroup();
             
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'get-list-log') {
		
               $data=getlistlog();

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}



	if($t === 'get-list-nhom-nick') {
		
               $data=getlistNhomNick();

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
	if($t === 'get-list-nhom-group') {
		
               $data=getlistNhomGroup();

                
               
              $return = array('data' => $data);
				die(json_encode($return));
				
		
	}
if($t === 'get-list-cong-viec') {
		       
		       $nhomCongViec = $_REQUEST['nhomCongViec'];

		      // echo $nhomNick;
               $data=getlistCongViec($nhomCongViec);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

				die(json_encode($return));
				
		
	}
	if($t === 'get-list-nick') {
		       
		       $nhomNick = $_REQUEST['nhomNick'];

		      // echo $nhomNick;
               $data=getlistNick($nhomNick);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

				die(json_encode($return));
				
		
	}
	if($t === 'get-list-group') {
		       
		       $nhomGroup = $_REQUEST['nhomGroup'];

		      // echo $nhomNick;
               $data=getlistGroup($nhomGroup);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

				die(json_encode($return));
				
		
	}
   if($t === 'add-group-to-list') {
		       
		       $nhomGroup = $_REQUEST['nhomGroup'];
		       //echo $nhomGroup;
		       $uid = $_REQUEST['uid'];
//echo $uid;
               
             if (addGrTolistNick($nhomGroup,$uid)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'add-cong-viec-to-list') {
		       
		       $ndung = $_REQUEST['ndung'];
		       $nick = $_REQUEST['nick'];

		       $group = $_REQUEST['group'];
		       $nhomNick = $_REQUEST['nhomNick'];
               $nhomGroup = $_REQUEST['nhomGroup'];
               $nhomCongViec = $_REQUEST['nhomCongViec'];

               $TimeSleep2Uid = $_REQUEST['TimeSleep2Uid'];
               $TimeSleep2UidGr = $_REQUEST['TimeSleep2UidGr'];
		      
             if (addCongViecTolistNick($ndung,$nick,$group,$nhomNick,$nhomGroup,$nhomCongViec,$TimeSleep2Uid,$TimeSleep2UidGr)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'add-nick-to-list') {
		       
		       $token = $_REQUEST['token'];
		       $nhomNick = $_REQUEST['nhomNick'];

		       $uid = $_REQUEST['uid'];
		       $nickName = $_REQUEST['nickName'];

		       //echo $nickName;
		       $nickName=vn_to_str($nickName);
		       //echo $nickName;
               //$data=addTolistNick($token,$nhomNick);

             
               
             if (addTolistNick($token,$nhomNick,$uid,$nickName)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'tao-nhom-cong-viec') {
		       
		       
		       $nameNewCongViec = $_REQUEST['nameNewCongViec'];
//echo $nameNhomNick;
		     
               
             if (createNhomCongViec($nameNewCongViec)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'tao-nhom-nick') {
		       
		       
		       $nameNhomNick = $_REQUEST['nameNhomNick'];
//echo $nameNhomNick;
		     
               
             if (createNhomNick($nameNhomNick)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'tao-nhom-group') {
		       
		       
		       $nameNhomGroup = $_REQUEST['nameNhomGroup'];
//echo $nameNhomNick;
		     
               
             if (createNhomGroup($nameNhomGroup)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'update-status-cong-viec') {
		       
		       
		       $nhomCongViec = $_REQUEST['nhomCongViec'];

		       $id = $_REQUEST['id'];

		       $status=$_REQUEST['status'];
		      
             
               
             if (updateStatusCongViec($nhomCongViec,$id,$status)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'xoa-all-cong-viec-in-nhom-cong-viec') {
		       
		       
		       $nhomCongViec = $_REQUEST['nhomCongViec'];
             //echo $nhomGroup;
		      
             
               
             if (xoaAllCongViecInNhomCongViec($nhomCongViec)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}

	if($t === 'xoa-all-group-in-nhom-group') {
		       
		       
		       $nhomGroup = $_REQUEST['nhomGroup'];
             //echo $nhomGroup;
		      
             
               
             if (xoaAllGroupInNhomGroup($nhomGroup)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}

	if($t === 'xoa-all-nick-in-nhom-nick') {
		       
		       
		       $nhomNick = $_REQUEST['nhomNick'];

		      
             
               
             if (xoaAllNickInNhomNick($nhomNick)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}

	if($t === 'xoa-nhom-nick') {
		       
		       
		       $nhomNick = $_REQUEST['nhomNick'];

		      
             
               
             if (xoaNhomNick($nhomNick)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'xoa-nhom-cong-viec') {
		       
		       
		       $nhomCongViec = $_REQUEST['nhomCongViec'];

		      
             
               
             if (xoaNhomCongViec($nhomCongViec)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}

	if($t === 'xoa-nhom-group') {
		       
		       
		       $nhomGroup = $_REQUEST['nhomGroup'];

		      
             
               
             if (xoaNhomGroup($nhomGroup)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'xoa-cong-viec-to-list') {
		       
		       
		       $nhomCongViec = $_REQUEST['nhomCongViec'];

		       $id = $_REQUEST['id'];
		      
             
               
             if (xoacongviecToList($nhomCongViec,$id)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'xoa-fb-to-list') {
		       
		       
		       $nhomNick = $_REQUEST['nhomNick'];

		       $uid = $_REQUEST['uid'];
		      
             
               
             if (xoaFbToList($nhomNick,$uid)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
	if($t === 'xoa-fb-gr-to-list') {
		       
		       
		       $nhomGroup = $_REQUEST['nhomGroup'];

		       $uid = $_REQUEST['uid'];
		      
             
               
             if (xoaFbGrToList($nhomGroup,$uid)) {
             	$return['error'] = 0;
				$return['msg'] = 'Thành Công!';
				die(json_encode($return));
			} else {
				$return['error'] = 1;
				$return['msg']   = 'Fail !';
				die(json_encode($return));
			}
				
		
	}
}
?>