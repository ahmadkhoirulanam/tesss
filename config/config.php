<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'sijitu_db');
define('DB_USER', 'root');
define('DB_PASS', '');

//Google Auth
define('SITE_KEY', '6Ld4q20dAAAAAEP-IaSzck8J-aUAJFNQEydK0uAa');
define('SECRET_KEY', '6Ld4q20dAAAAAFtd8TtIdu5j_lBE3xPmH0CG2vmA');

//Koneksi PDO and mysqlli
try{
	$db=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);	
	date_default_timezone_set("Asia/Jakarta"); 
}catch(PDOException $e){
	echo "Koneksi Database gagal -> ".$e->getMessage();
	exit;
}
$dbli=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Time Zone
	date_default_timezone_set("Asia/Jakarta");
	
//URL Definition
	if(!empty($_GET['p'])){$p=filter($_GET['p']);}else{$p="";}
	if(!empty($_GET['id'])){$id=filter($_GET['id']);}else{$id="";}
	if(!empty($_GET['prm'])){$prm=filter($_GET['prm']); }else{$prm="";}
	if(!empty($_GET['prm2'])){$prm2=filter($_GET['prm2']);}else{$prm2="";}
	if(!empty($_GET['tab'])){$tab=filter($_GET['tab']);}else{$tab="";}
	if(!empty($_GET['act'])){$act=filter($_GET['act']);}else{$act="";}
	if(!empty($_GET['link'])){$link=filter($_GET['link']);}else{$link="";}
	if(!empty($_GET['sukses'])){$sukses=filter($_GET['sukses']);}else{$sukses="";}
	if(!empty($_GET['error'])){$error=filter($_GET['error']);}else{$error="";}
	
	$url=$_SERVER["REQUEST_URI"];

//BaseUrl
function baseurl($link=''){
	//$baseurl="http://localhost/simekar/";
	$baseurl="http://localhost/form-upgris/";
	
	if(!empty($link)){
		$url=$baseurl.$link;
	}else{
		$url=$baseurl;
	}
	return $url;
}
?>
