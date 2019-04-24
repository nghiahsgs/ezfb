
<?php
session_start();
error_reporting(1);
date_default_timezone_set('Asia/Ho_Chi_Minh');

$config_db = array(
	'db_host' => 'localhost',
	'db_user' => 'u380514009_ads',
	'db_name' => 'u380514009_ads',
	'db_pass' => '261997'
);
$conn = mysqli_connect($config_db['db_host'], $config_db['db_user'], $config_db['db_pass'], $config_db['db_name']);
//mysqli_set_charset($conn,"utf8");
?>