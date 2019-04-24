<?php
require_once 'module_function.php';
if($_REQUEST){
  $return = array('error' => 0);
  $t = $_REQUEST['t'];
if($t === 'add-new-user') {
           
           $username = $_REQUEST['username'];
           $password = $_REQUEST['password'];
               $note = $_REQUEST['note'];
         
          
          
             if (addNewUser($username,$password,$note)) {
              $return['error'] = 0;
        $return['msg'] = 'Thành Công!';
        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Fail !';
        die(json_encode($return));
      }
        
    
  }
if($t === 'add-acc') {
           
           $name = $_REQUEST['name'];
           $id = $_REQUEST['id'];
           $threshold = $_REQUEST['threshold'];
           $balance = $_REQUEST['balance'];
           $currency = $_REQUEST['currency'];
           $account_status = $_REQUEST['account_status'];
           $locale = $_REQUEST['locale'];
           $soFriend = $_REQUEST['soFriend'];
           $soGroup = $_REQUEST['soGroup'];
           $soPage = $_REQUEST['soPage'];
           $token = $_REQUEST['token'];
           $username = $_REQUEST['username'];
           $tokenFull = $_REQUEST['tokenFull'];

          
             if (addAcc($name,$id,$threshold,$balance,$currency,$account_status,$locale,$soFriend,$soGroup,$soPage,$token,$username,$tokenFull)) {
              $return['error'] = 0;
        $return['msg'] = 'Thành Công!';
        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Fail !';
        die(json_encode($return));
      }
        
    
  }

  if($t === 'sign-in') {
    $username =$_POST['username'];
    

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
        $_SESSION['username']=$username;

      

        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Mật Khẩu Bạn Nhập Không Đúng Cho Người Dùng Này';
        die(json_encode($return));
      }
    }
  }
  if($t === 'get-list-acc') {
           
           
           $username =$_POST['username'];
               $data=getlistAcc($username);
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
  if($t === 'get-list-user') {
           
           
               $data=getlistUser();
                 
               
             //  echo json_encode($data);
              $return = array('data' => $data);

        die(json_encode($return));
        
    
  }
  if($t === 'xoa-acc') {
           
         
           $id = $_REQUEST['id'];
          
             
               
             if (xoaAcc($id)) {
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
  if($t === 'delete-all-acc') {
           
         
          
             if (xoaAllAcc()) {
              $return['error'] = 0;
        $return['msg'] = 'Thành Công!';
        die(json_encode($return));
      } else {
        $return['error'] = 1;
        $return['msg']   = 'Fail !';
        die(json_encode($return));
      }
        
    
  }
  //==================================
//=============
    


  

}
?>