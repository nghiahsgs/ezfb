<?php
require_once '../config.php';
function addNewUser($username,$password,$note) {
	global $conn;
	
    $sql="INSERT INTO `tbuser`(`username`, `password`, `note`) VALUES ('$username', '$password', '$note')";


    //echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}

function addAcc($name,$idAds,$threshold,$balance,$currency,$account_status,$locale,$soFriend,$soGroup,$soPage,$token,$username,$tokenFull) {
	global $conn;
	
    $sql="INSERT INTO `tbacc`(`idAds`, `name`, `currency`, `threshold`, `account_status`, `token`, `username`, `balance`, `locale`, `soFriend`, `soGroup`, `soPage`,`accfull`) VALUES ('$idAds', '$name', '$currency', '$threshold', '$account_status', '$token', '$username', '$balance', '$locale', '$soFriend', '$soGroup', '$soPage','$tokenFull')";
//echo $sql;

    //echo $sql;
	$result = mysqli_query($conn, $sql);


	if ($result)
		return 1;
	return 0;
}

function getlistAcc($username) {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbacc` WHERE `username`='".$username."'");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function getlistUser() {
	global $conn;
	$return = array();
	$result = mysqli_query($conn, "SELECT * FROM `tbuser` WHERE 1");
	//echo mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$return[] = $row;
		}
		return $return;
	}
	return 0;
}
function xoaAcc($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbacc WHERE id = '$id'");

	if ($result)
		return 1;
	return 0;
}

function xoaUser($id) {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbuser WHERE id = '$id'");

	if ($result)
		return 1;
	return 0;
}
function xoaAllAcc() {
	global $conn;
	$result = mysqli_query($conn, "DELETE FROM tbacc WHERE 1");

	if ($result)
		return 1;
	return 0;
}

function getUserbyName($username) {
	global $conn;
	$sql="SELECT * FROM tbuser WHERE username = '$username' LIMIT 1";
	//echo $sql;
	$result = mysqli_query($conn, $sql);
	 
	$row    = mysqli_fetch_assoc($result);
	return $row;
}
function checkUser($username) {
	global $conn;
	$result = mysqli_query($conn, "SELECT id FROM tbuser WHERE username = '$username'");
	if (mysqli_num_rows($result) > 0)
		return 1;
	return 0;
}

//========================



?>