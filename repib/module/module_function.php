<?php
require_once '../config/config_server.php';
function addNewUser($username,$password,$typemember,$uutien) {
	global $conn;
	
    $sql="INSERT INTO `dbmember`(`username`, `password`, `typemember`,`uutien`) VALUES ('$username', '$password', '$typemember', '$uutien')";

    //echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}

function xoaUser($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM dbmember WHERE id = '$id'");

	if ($result)
		return 1;
	return 0;
}
function getlistUser() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `dbmember` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}

function loadConfigFb() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `dbconfigfb` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function btnSendChat($idchat,$ndungSend) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO `dbguitinnhan`(`id`, `idchat`, `ndungSend`) VALUES ('','$idchat','$ndungSend')");


	if ($result)
		return 1;
	return 0;
}


function updateTinNhanDaDoc($idchat,$ndungChat) {
	global $conn;
	$sql="UPDATE `dbtinnhan` SET ndungChat = '$ndungChat' WHERE idchat = '$idchat'";
	//echo $sql;
	$result = mysqli_query($conn, $sql);

	

	if ($result)
		return 1;
	return 0;
}
function saveChatmau($listCauChatMau) {
	global $conn;
	$name='sample';

	$sql="UPDATE `dbconfigfb` SET value = '$listCauChatMau' WHERE name = '$name'";
	//echo $sql;
	$result = mysqli_query($conn, $sql);

	if ($result)
		return 1;
	return 0;
}
function saveInfoFb($CookieCuaNick,$idcuapage) {
	global $conn;
	

	$sql="UPDATE `dbconfigfb` SET value = '$CookieCuaNick' WHERE name = 'cookie'";
	//echo $sql."<br>";
	$result1 = mysqli_query($conn, $sql);

	$sql="UPDATE `dbconfigfb` SET value = '$idcuapage' WHERE name = 'idpage'";
   //echo $sql."<br>";
	$result2 = mysqli_query($conn, $sql);

	if ($result1&&$result2)
		return 1;
	return 0;
}
function updateTinNhanChuaDoc($idchat,$ndungChat) {
	global $conn;
	$sql="UPDATE `dbtinnhan` SET ndungChatUnread = '$ndungChatUnread' WHERE idchat = '$idchat'";
	///echo $sql;
	$result = mysqli_query($conn, $sql);

	

	if ($result)
		return 1;
	return 0;
}

function updatenotechat($idchat,$note) {
	global $conn;
	$sql="UPDATE dbtinnhan SET note = '$note' WHERE idchat = '$idchat'";
	///echo $sql;
	$result = mysqli_query($conn, $sql);

	

	if ($result)
		return 1;
	return 0;
}
function checkUser($username) {
	global $conn;
	$result = mysqli_query($conn, "SELECT id FROM dbmember WHERE username = '$username'");
	if (mysqli_num_rows($result) > 0)
		return 1;
	return 0;
}
function getUserbyName($username) {
	global $conn;
	$sql="SELECT * FROM dbmember WHERE username = '$username' LIMIT 1";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	 
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function loadDetailTinNhan($idchat) {
	global $conn;
	$sql="SELECT * FROM dbtinnhan WHERE idchat = '$idchat' LIMIT 1";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	 
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function getListNguoiChat($username) {
	global $conn;
	$return = array();
	if($username=='admin'){
         $sql="SELECT * FROM `dbtinnhan` WHERE 1";
	}else{
         $sql="SELECT * FROM `dbtinnhan` WHERE `member`='$username'";
	}
	
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getSnippet($idchat) {
	global $conn;
	$sql="SELECT `Snippet` FROM dbtinnhan WHERE idchat = '$idchat' LIMIT 1";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	 
	$row    = mysqli_fetch_assoc($result);
	return $row;
}

//===================================================


function updateStatusCongViec($nhomCongViec,$id,$status) {
	global $conn;
	$sql="UPDATE tbcongviec SET status = '$status' WHERE id = '$id' AND nhomCongViec = '$nhomCongViec'";
	///echo $sql;
	$result = mysqli_query($conn, $sql);

	

	if ($result)
		return 1;
	return 0;
}

function createNhomCongViec($nameNewCongViec) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO tbnhomcongviec (nhomCongViec) VALUES ('$nameNewCongViec')");


	if ($result)
		return 1;
	return 0;
}

function createNhomGroup($nameNhomGroup) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO tbnhomgroup (nhomGroup) VALUES ('$nameNhomGroup')");

	if ($result)
		return 1;
	return 0;
}
function createNhomNick($nameNhomNick) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO tbnhomnick (nhomNick) VALUES ('$nameNhomNick')");

	if ($result)
		return 1;
	return 0;
}


function xoaFbGrToList($nhomGroup,$uid) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbgroup WHERE nhomGroup = '$nhomGroup' AND uid = '$uid'");
	if ($result)
		return 1;
	return 0;
}
function xoaNhomCongViec($nhomCongViec) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbnhomcongviec WHERE nhomCongViec = '$nhomCongViec'");

	if ($result)
		return 1;
	return 0;
}

function xoaNhomGroup($nhomGroup) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbnhomgroup WHERE nhomGroup = '$nhomGroup'");

	if ($result)
		return 1;
	return 0;
}
function xoaAllCongViecInNhomCongViec($nhomCongViec) {
	global $conn;
	$sql="DELETE FROM tbcongviec WHERE nhomCongViec = '$nhomCongViec'";

	//echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}

function xoaAllGroupInNhomGroup($nhomGroup) {
	global $conn;
	$sql="DELETE FROM tbgroup WHERE nhomGroup = '$nhomGroup'";
	//echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}

function xoaAllNickInNhomNick($nhomNick) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbnick WHERE nhomNick = '$nhomNick'");


	if ($result)
		return 1;
	return 0;
}

function xoaNhomNick($nhomNick) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbnhomnick WHERE nhomNick = '$nhomNick'");


	if ($result)
		return 1;
	return 0;
}

function xoacongviecToList($nhomCongViec,$id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbcongviec WHERE nhomCongViec = '$nhomCongViec' AND id = '$id'");


	if ($result)
		return 1;
	return 0;
}
function xoaFbToList($nhomNick,$uid) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbnick WHERE nhomNick = '$nhomNick' AND uid = '$uid'");
	if ($result)
		return 1;
	return 0;
}

function vn_to_str ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','_',$str);
 
return $str;
 
}
function addGrTolistNick($nhomGroup,$uid) {
	global $conn;
	$sql="INSERT INTO tbgroup (uid, nhomGroup) VALUES ('$uid', '$nhomGroup')";
	//echo $sql;
	$result = mysqli_query($conn,$sql) ;
	
	if ($result)
		return 1;
	return 0;
}
function addCongViecTolistNick($ndung,$nick,$group,$nhomNick,$nhomGroup,$nhomCongViec,$TimeSleep2Uid,$TimeSleep2UidGr) {
	global $conn;
	$status='stop';
    $timeSleep2Uid=$TimeSleep2Uid;
    $timeSleep2UidGr=$TimeSleep2UidGr;

    $sql="INSERT INTO `tbcongviec`(`nick`, `nhomNick`, `group`, `nhomGroup`, `nhomCongViec`, `timeSleep2Uid`, `timeSleep2UidGr`, `status`, `ndung`) VALUES ('$nick', '$nhomNick', '$group', '$nhomGroup', '$nhomCongViec', '$timeSleep2Uid','$timeSleep2UidGr','$status', '$ndung')";
    //echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}
function addTolistNick($token,$nhomNick,$uid,$nickName) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO tbnick (uid, token, nhomNick, nickName) VALUES ('$uid', '$token', '$nhomNick', '$nickName')");
	if ($result)
		return 1;
	return 0;
}
function getlistNhomGroup() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbnhomgroup` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistlog() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tblog` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}

function getlistNhomNick() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbnhomnick` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistGroup($nhomGroup) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbgroup` WHERE  `nhomGroup`='".$nhomGroup."'");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistAllGroup() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbgroup` WHERE  1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistCongViec($nhomCongViec) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbcongviec` WHERE  `nhomCongViec`='".$nhomCongViec."'");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistNick($nhomNick) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbnick` WHERE  `nhomNick`='".$nhomNick."'");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getalllistNick($nhomNick) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbnick` WHERE  1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}


// Thêm Mới Các Gói VIP
function check_package($name) {
	global $conn;
	$result = mysqli_query($conn, "SELECT id FROM package_vip WHERE name = '$name'");
	if (mysqli_num_rows($result) > 0)
		return 1;
	return 0;
}
function add_package($name, $vnd, $limitLike, $limitPost) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO package_vip (name, price, limit_like, limit_post) VALUES ('$name', '$vnd', '$limitLike', $limitPost)");
	if ($result)
		return 1;
	return 0;
}
function get_package() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM package_vip");
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function get_package_vip_bot() {
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM package_vip_bot WHERE id = 1");
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function update_package_vip_like($id, $name, $vnd, $limitLike, $limitPost) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE package_vip SET name = '$name', price = '$vnd', limit_like = '$limitLike', limit_post ='$limitPost' WHERE id = '$id'");
	if ($result)
		return 1;
	return 0;
}
function delete_package($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM package_vip WHERE id = '$id'");
	if ($result)
		return 1;
	return 0;
}
function get_name_package() {
	global $conn;
	$result = mysqli_query($conn, "SELECT name FROM package_vip");
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function getPackage($name_package) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM package_vip WHERE name = '$name_package' LIMIT 1");
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function insert_vip($fbid, $name, $name_buy, $name_package, $limit_time, $time_buy, $speed, $camxuc) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO vip_like (fbid, name, name_buy, name_package, limit_time, time_buy, speed, action, camxuc) VALUES ('$fbid', '$name', '$name_buy', '$name_package', '$limit_time', '$time_buy', '$speed', 'checked', '$camxuc')");
	if ($result)
		return 1;
	return 0;
}

function getUser($id) {
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM member WHERE id = '$id' LIMIT 1");
	$row    = mysqli_fetch_assoc($result);
	return $row;
}

function updateVNDUser($newVND, $_c = 0, $id = 0) {
	if ($id == 0) {
		$id = $_SESSION['id'];
	}
	if ($_c == 0) {
		$_SESSION['vnd'] = $newVND;
	}
	global $conn;
	$result = mysqli_query($conn, "UPDATE member SET vnd = ".$newVND." WHERE id = '" . $id . "'");
	if ($result) {
		return 1;
	}
	return 0;
}
function updateVNDDaily($newVND, $_c = 0, $id = 0) {
	if ($id == 0) {
		$id = $_SESSION['id'];
	}
	if ($_c == 0) {
		$_SESSION['vnd'] = $newVND;
	}
	global $conn;
	$result = mysqli_query($conn, "UPDATE member SET vnd = '$newVND' WHERE id = '" . $id . "'");
	if ($result) {
		return 1;
	}
	return 0;
}
function updatePassUser($newPass) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE member SET pass = '$newPass' WHERE id = '" . $_SESSION['id'] . "'");
	if ($result)
		return 1;
	return 0;
}

function creatUser($fullname, $user, $pass, $email, $vnd = 0) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO member (fullname, user, pass, email, vnd) VALUES ('$fullname', '$user', '$pass', '$email', $vnd)");
	if ($result)
		return 1;
	return 0;
}
function setSession($userA, $admin) {
	$_SESSION['login']    = 1;
	$_SESSION['fullname'] = $userA['fullname'];
	$_SESSION['id']       = $userA['id'];
	$_SESSION['username'] = $userA['user'];
	$_SESSION['email']    = $userA['email'];
	$_SESSION['vnd']      = $userA['vnd'];
	$_SESSION['chucvu'] = $userA['chucvu'];
	if ($userA['chucvu'] == 'admin') {
		$_SESSION['admin'] = 1;
	}
}
function get_vip_like($name_buy) {
	global $conn;
	$return = array();
	if ($name_buy == 'admin') {
		$result = mysqli_query($conn, "SELECT * FROM vip_like");
	} else {
		$result = mysqli_query($conn, "SELECT * FROM vip_like WHERE name_buy = '$name_buy'");
	}
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function get_member() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM member");
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function get_vip_cmt($name_buy) {
	global $conn;
	$return = array();
	if ($name_buy == 'admin') {
		$result = mysqli_query($conn, "SELECT * FROM vip_cmt");
	} else {
		$result = mysqli_query($conn, "SELECT * FROM vip_cmt WHERE name_buy = '$name_buy'");
	}
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function get_vip_lstream($name_buy) {
	global $conn;
	$return = array();
	if ($name_buy == 'admin') {
		$result = mysqli_query($conn, "SELECT * FROM vip_lstream");
	} else {
		$result = mysqli_query($conn, "SELECT * FROM vip_lstream WHERE name_buy = '$name_buy'");
	}
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function get_vip_bot($name_buy) {
	global $conn;
	$return = array();
	if ($name_buy == 'admin') {
		$result = mysqli_query($conn, "SELECT * FROM vip_bot");
	} else {
		$result = mysqli_query($conn, "SELECT * FROM vip_bot WHERE name_buy = '$name_buy'");
	}
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function action_vip_like($checked, $value) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE vip_like SET action = '$checked' WHERE id = '$value'");
	if ($result)
		return 1;
	return 0;
}
function action_vip_cmt($checked, $value) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE vip_cmt SET action = '$checked' WHERE id = '$value'");
	if ($result)
		return 1;
	return 0;
}
function action_vip_lstream($checked, $value) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE vip_lstream SET action = '$checked' WHERE id = '$value'");
	if ($result)
		return 1;
	return 0;
}
function action_member($checked, $value) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE member SET block = '$checked' WHERE id = '$value'");
	if ($result)
		return 1;
	return 0;
}
function action_vip_bot($checked, $value) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE vip_bot SET action = '$checked' WHERE id = '$value'");
	if ($result)
		return 1;
	return 0;
}
function insert_vip_bot_cookie($id, $name, $name_buy, $reaction, $access, $limit_time, $fb_dtsg) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO vip_bot (fbid, fbname, name_buy, type_react, type_access, access_token, access_cookie, limit_time, time_buy, action, fb_dtsg) VALUES ('$id', '$name', '$name_buy', '$reaction', 'ACCESS_COOKIE', 'NULL', '$access', '$limit_time', '" . time() . "', 'checked', '$fb_dtsg')");
	if ($result)
		return 1;
	return 0;
}
function insert_vip_bot_token($id, $name, $name_buy, $reaction, $access, $limit_time) {
	global $conn;
	$result = mysqli_query($conn, "INSERT INTO vip_bot (fbid, fbname, name_buy, type_react, type_access, access_token, access_cookie, limit_time, time_buy, action) VALUES ('$id', '$name', '$name_buy', '$reaction', 'ACCESS_TOKEN','$access', 'NULL',  '$limit_time', '" . time() . "', 'checked')");
	if ($result)
		return 1;
	return 0;
}
function update_vip_bot($id, $access, $type_access, $type_react, $fb_dtsg = '') {
	global $conn;
	if ($type_access === 'TOKEN') {
		$result = mysqli_query($conn, "UPDATE vip_bot SET type_react = '$type_react', access_token = '$access', type_access = 'ACCESS_TOKEN' WHERE id = '$id'");
	}
	if ($type_access === 'COOKIE') {
		$result = mysqli_query($conn, "UPDATE vip_bot SET type_react = '$type_react', type_access = 'ACCESS_COOKIE', access_cookie = '$access', fb_dtsg = '$fb_dtsg' WHERE id = '$id'");
	}
	if ($result)
		return 1;
	return 0;
}
function edit_package_vip_bot($name, $vnd) {
	global $conn;
	$result = mysqli_query($conn, "UPDATE package_vip_bot SET name = '$name', vnd = '$vnd'");
	if ($result)
		return 1;
	return 0;
}
function create_gift($vnd) {
	global $conn;
	$gift   = generateRandomString();
	$result = mysqli_query($conn, "INSERT INTO gift_code (gift, vnd, `time`) VALUES ('$gift', '$vnd', '" . time() . "')");
	if ($result)
		return $gift;
	return 0;
}
function get_gift_code() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM gift_code");
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
}
function insert_vip_cmt($fbid, $name, $name_buy, $name_package, $limit_time, $time_buy, $speed, $cmt) {
	global $conn;

	$sql="INSERT INTO `vip_cmt`(`fbid`, `name`, `name_buy`, `name_package`, `limit_time`, `time_buy`, `speed`, `action`, `cmt`) VALUES ('".$fbid."', '".$name."', '".$name_buy."', '".$name_package."', '".$limit_time."', '".$time_buy."', '".$speed."', 'checked', '".$cmt."')";
	//echo $sql."<br>";
	$result = mysqli_query($conn, $sql);
	if ($result)
		return 1;
	return 0;
}
function insert_vip_lstream($fbid, $name, $name_buy, $name_package, $limit_time, $time_buy) {
	global $conn;

	$sql="INSERT INTO `vip_lstream`(`fbid`, `name`, `name_buy`, `name_package`, `limit_time`, `time_buy`,  `action`) VALUES ('".$fbid."', '".$name."', '".$name_buy."', '".$name_package."', '".$limit_time."', '".$time_buy."', 'checked')";
	//echo $sql."<br>";
	$result = mysqli_query($conn, $sql);
	if ($result)
		return 1;
	return 0;
}
function gift($gift) {
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM gift_code WHERE gift = '$gift' LIMIT 1");
	if (mysqli_num_rows($result) > 0) {
		$gift    = mysqli_fetch_assoc($result);
		$getUser = getUser($_SESSION['id']);
		updateVNDUser($getUser['vnd'] + $gift['vnd']);
		$del_gift = mysqli_query($conn, "DELETE FROM gift_code WHERE id = '" . $gift['id'] . "'");
		return $gift['vnd'];
	}
	return 0;
}
function addMultiToken($arrToken, $arrID) {
	global $conn;
	$sql = array();
	for ($i = 0; $i < count($arrToken); $i++) {
		$sql[] = '(' . ($arrID[$i]) . ', "' . $arrToken[$i] . '")';
	}
	$insert = mysqli_query($conn, 'INSERT INTO access_token (fbid, access_token) VALUES ' . implode(',', $sql));
	if ($insert)
		return 1;
	return 0;
}
function generateRandomString($length = 10) {
	$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString     = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return strtoupper($randomString);
}
function isAdmin() {
	if ($_SESSION['admin'] == 1)
		return 1;
	return 0;
}
function isDaily() {
	global $conn;
	
	if ($_SESSION['chucvu'] == 'daily')
		return 1;
	return 0;
}
function getTokenToServer($type) {
	global $conn;
	$token  = array();
	$result = mysqli_query($conn, "SELECT * FROM access_token");
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$token[] = $row[$type];
		}
	}
	return $token;
}
function delMultiToken($tokendie) {
	global $conn;
	foreach ($tokendie as $key => $value) {
		mysqli_query($conn, "DELETE FROM access_token WHERE access_token = '$value'");
	}
	return 1;
}
function updateVipLikeByAdmin($id, $fbid, $name, $package, $speed, $camxuc) {
	global $conn;
	$update = mysqli_query($conn, "UPDATE vip_like SET fbid = '$fbid', name = '$name', name_package = '$package', speed = '$speed', camxuc = '$camxuc' WHERE id = '$id'");
	if ($update) {
		return 1;
	}
	return 0;
}
function updateMember($id, $fullname, $user, $email, $vnd) {
	global $conn;
	$update = mysqli_query($conn, "UPDATE member SET fullname = '$fullname', user = '$user', chucvu = '$email', vnd = '$vnd' WHERE id = '$id'");
	if ($update) {
		return 1;
	}
	return 0;
}
function updateVipLikeByUser($id, $fbid, $name, $speed, $camxuc) {
	global $conn;
	$update = mysqli_query($conn, "UPDATE vip_like SET fbid = '$fbid', name = '$name', speed = '$speed', camxuc = '$camxuc' WHERE id = '$id'");
	if ($update) {
		return 1;
	}
	return 0;
}
function updateVipCmt($id, $cmt, $fbid, $name) {
	global $conn;
	$update = mysqli_query($conn, "UPDATE vip_cmt SET cmt = '$cmt', fbid = '$fbid', name = '$name' WHERE id = '$id'");
	if ($update) {
		return 1;
	}
	return 0;
}
function updateVipCmtByAdmin($id, $fbid, $name, $package, $cmt, $speed) {
	global $conn;
	$update = mysqli_query($conn, "UPDATE vip_cmt SET fbid = '$fbid', name = '$name', speed = '$speed', name_package = '$package', cmt = '$cmt' WHERE id = '$id'");
	if ($update) {
		return 1;
	}
	return 0;
}
function delete_vip($id, $type) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM $type WHERE id = '$id'");
	if ($result)
		return 1;
	return 0;
}
function getTokenBySL($sl) {
	global $conn;
	$token  = array();
	$result = mysqli_query($conn, "SELECT access_token FROM access_token ORDER BY RAND() LIMIT $sl");
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$token[] = $row['access_token'];
		}
	}
	return $token;
}
function _p($t) {
	$t = addslashes($t);
	$t = stripslashes($t);
	return $t;
}
function _i($t) {
	global $conn;
	return mysql_real_escape_string($conn, $t);
}
function _c($url) {
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json'
	));
	return curl_exec($ch);
}
function _saveNotify($txt) {
	$file = @fopen('notify.txt', 'a+');
	@fwrite($file, $txt);
	@fclose($file);
}
function _saveCard($txt) {
	$file = @fopen('card.log.txt', 'a+');
	@fwrite($file, $txt . "\n");
	@fclose($file);
}
function _saveVip($txt) {
	$file = @fopen('buyvip.log.txt', 'a+');
	@fwrite($file, $txt . "\n");
	@fclose($file);
}
function _saveVipUser($txt) {
	$file = @fopen('../lichsu/'.$_SESSION['username'].'.log.txt', 'a+');
	@fwrite($file, $txt . "\n");
	@fclose($file);
}
function _saveCardUser($txt) {
	$file = @fopen('../lichsunap/'.$_SESSION['username'].'.log.txt', 'a+');
	@fwrite($file, $txt . "\n");
	@fclose($file);
}
function _saveExUser($txt) {
$file = @fopen('../lichsunap/'.$_POST['user'].'.log.txt', 'a+');
	@fwrite($file, $txt . "\n");
	@fclose($file);
}
function __c($url, $cookie) {
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$head[] = "Connection: keep-alive";
	$head[] = "Keep-Alive: 300";
	$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$head[] = "Accept-Language: en-us,en;q=0.5";
	curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
	curl_setopt($ch, CURLOPT_ENCODING, '');
	curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Expect:'
	));
	$page = curl_exec($ch);
	curl_close($ch);
	return $page;
}
function _checkToken($token){
	$url = 'https://graph.fb.me/me/?access_token='.$token;
	$json = json_decode(file_get_contents($url));
	if ($json->id) return 1;
	return 0;
}
function _me($token){
	$url = 'https://graph.fb.me/me/?access_token='.$token;
	$json = json_decode(file_get_contents($url));
	if ($json->id) return $json;
	return 0;
}
?>