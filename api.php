<?php 
//session_start();

if ($_POST && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
if(empty($_POST['username']) || empty($_POST['password'])){
exit();
}


$user = $_POST['username'];
$pass = $_POST['password'];
$secretkey = "62f8ce9f74b12f84c123cc23437a4a32";



	$postdata = array(
		"api_key" => "882a8490361da98702bf97a021ddc14d",
		"email" => $user,
		"format" => "JSON",
		"locale" => "vi_vn",
		"method" => "auth.login",
		"password" => $pass,
		"return_ssl_resources" => "0",
		"v" => "1.0"
	);
	
	$postdata['sig'] = tao_sig($postdata);
	
	//print_r($postdata);
	http_build_query($postdata);

	$url='https://api.facebook.com/restserver.php?method=post&api_key='.$postdata['api_key'].'&email='.$postdata['email'].'&format='.$postdata['format'].'&locale='.$postdata['locale'].'&method='.$postdata['method'].'&password='.$postdata['password'].'&return_ssl_resources='.$postdata['return_ssl_resources'].'&v='.$postdata['v'].'&sig='.$postdata['sig'];
	
     //$data= getpage2($url);

echo $url;


// 		if (strpos($data, 'error') !== false) {
//     echo 'error';
// }else{
// $data = json_decode($data);
	
// 	$token = $data->access_token;

// 	echo $token;
// }




}
?>


<?php 

function tao_sig($postdata){
	global $secretkey;
	$textsig = "";
	foreach($postdata as $key => $value){
		$textsig .= "$key=$value";
	}
	$textsig .= $secretkey;
	$textsig = md5($textsig);
	
	return $textsig;
}



	function getpage($url, $postdata='')
{
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0');

	if($postdata != "")
	{
		curl_setopt($c, CURLOPT_POST, 1);
		curl_setopt($c, CURLOPT_POSTFIELDS, $postdata);
	}
	
	$page = curl_exec($c);


	curl_close($c);
	return $page;
}


	function getpage2($url)
{
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $url);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0');

	
	
	$page = curl_exec($c);


	curl_close($c);
	return $page;
}


 ?>



