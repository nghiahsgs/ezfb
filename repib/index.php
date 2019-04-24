<?php
require_once 'config/config_server.php';
if (!$_SESSION['login']) {
	session_destroy();
	header("Location: sign-in.php");
}
/************************************/
/************************************/
require_once 'head.php';

?>
<?php
if ($_GET['act']) {
	
	
	// if ($_GET['act'] == 'list-nhom-nick') {
	// 	require_once 'view/view_list-nhom-nick.php';
	// }
	// if ($_GET['act'] == 'list-nhom-group') {
	// 	require_once 'view/view_list-nhom-group.php';
	// }
	// if ($_GET['act'] == 'list-cong-viec') {
	// 	require_once 'view/view_list-cong-viec.php';
	// }
	

} else {
	require_once 'view/view_home.php';
}
?>
<?php
// require_once 'footer.php';
?>