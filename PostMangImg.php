<?php 

$token = $_GET['token'];
$mangAnh = $_GET['mangAnh'];

//echo $token;
//echo $mangAnh;
$mangAnh=explode("_",$mangAnh);

$kq="";
foreach ($mangAnh as $key => $value) {
   // echo $value;
    # code...
$urlImage=$value;

$url = "https://graph.facebook.com/"."me"."/photos?method=post&url=".$urlImage."&published=false&access_token=".$token;
//echo $url;
$data=GetHtml($url);
//echo $data;


$data=str_replace("{","",$data);
$data=str_replace("}","",$data);
 $data=str_replace('"',"",$data);
 $data=str_replace(":","",$data);
 $data=str_replace("id","",$data);
$data=str_replace(" ","",$data);

$kq.=$data."_";
}

$kq=str_replace(" ","",$kq);
echo $kq;



function GetHtml($url) 
    {
        $cookies = 'cookie.txt';
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
        curl_setopt($ch,CURLOPT_FRESH_CONNECT,true);
        curl_setopt($ch,CURLOPT_TCP_NODELAY,true);;     
        curl_setopt($ch,CURLOPT_REFERER,$url);          
        curl_setopt($ch,CURLOPT_TIMEOUT,15);         
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36");
        curl_setopt($ch,CURLOPT_COOKIEFILE,$cookies);
        curl_setopt($ch,CURLOPT_COOKIEJAR,$cookies); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $body = curl_exec($ch);
        curl_close($ch);
        
        return $body;
}

 ?>
