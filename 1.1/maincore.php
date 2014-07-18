<?php
/*
|--------------------------------|
|		Padsan System CMS		 |
|--------------------------------|
|		General Version			 |
|--------------------------------|
|Web   : www.PadsanCMS.com		 |
|Email : Support@PadsanCMS.com	 |
|Tel   : +98 - 261 2533135		 |
|Fax   : +98 - 261 2533136		 |
|--------------------------------|
*/
require_once "subheader.php";

// Get php version
$phpver = phpversion();

// If register_globals is turned off, extract super globals (php 4.2.0+)
if (ini_get('register_globals') != 1) {
	if ((isset($_POST) == true) && (is_array($_POST) == true)) extract($_POST, EXTR_OVERWRITE);
	if ((isset($_GET) == true) && (is_array($_GET) == true)) extract($_GET, EXTR_OVERWRITE);
}

// Prevent any possible XSS attacks via $_GET.
if (stripget($_GET)) {
	die("Prevented a XSS attack through a GET variable!");
}

// Start Output Buffering
ob_start("ob_gzhandler");

// Locate config.php and set the basedir path
$folder_level = "";
while(!file_exists($folder_level."config.php")){
	$folder_level .= "../";
}

require_once $folder_level."config.php";
define("BASEDIR", $folder_level);

// Establish mySQL database connection
$link = dbconnect($db_host, $db_user, $db_pass, $db_name);

// Sanitise $_SERVER globals
$PHP_SELF = cleanurl($_SERVER['PHP_SELF']);
$QUERY_STRING = isset($_SERVER['QUERY_STRING']) ? cleanurl($_SERVER['QUERY_STRING']) : "";
$REQUEST_URI = isset($_SERVER['REQUEST_URI']) ? cleanurl($_SERVER['REQUEST_URI']) : "";

// Set defines
define("IMAGES", BASEDIR."images/");
define("AVATARS", IMAGES."avatars/");
define("IMAGES_ADVERTISING", BASEDIR."images/advertising/");
define("IMAGES_TYPES", BASEDIR."images/types/");
define("INCLUDES", BASEDIR."includes/");
define("CLASSES", INCLUDES."classes/");
define("JAVASCRIPTS", INCLUDES."javascripts/");
define("CSS", BASEDIR."css/");

// MySQL database functions
function dbquery($query) {
	$result = @mysql_query($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbcount($field, $table, $conditions="") {
	$cond = ($conditions ? " WHERE ".$conditions : "");
	$result = @mysql_query("SELECT Count".$field." FROM ".DB_PREFIX.$table.$cond);
	if(!$result){
		echo mysql_error();
		return false;
	}else{
		$rows=mysql_result($result, 0);
		return $rows;
	}
}

function dbresult($query, $row) {
	$result=@mysql_result($query, $row);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

function dbrows($query){
	$result=@mysql_num_rows($query);
	return $result;
}

function dbarray($query) {
	$result=@mysql_fetch_assoc($query);
	if(!$result){
		echo mysql_error();
		return false;
	}else{
		return $result;
	}
}

function secure_itext($text){
	// SQL Injection
	$text=addslashes($text);
	$text=mysql_real_escape_string($text);
	// Strip Input Function, prevents HTML in unwanted places$text=htmlspecialchars($text);
	$text=htmlspecialchars($text);
	$text = html_entity_decode($text, ENT_QUOTES, "utf-8");
	// Censorwords
	$text=censorwords($text);
	// Trim text
	$text=trim($text);
	// Return text
	return $text;
}

function secure_itextarea($text){
	return $text;
}

function dbconnect($db_host, $db_user, $db_pass, $db_name) {
	$db_connect = @mysql_connect($db_host, $db_user, $db_pass);
	$db_select = @mysql_select_db($db_name);
	if (!$db_connect) {
		die("<div style='font-family:tahoma;font-size:11px;text-align:center;'><b>قادر به ارتباط با بانک اطلاعاتی نمی باشید</b><br>".mysql_errno()." : ".mysql_error()."</div>");
	} elseif (!$db_select) {
		die("<div style='font-family:tahoma;font-size:11px;text-align:center;'><b>قادر به انتخاب بانک اطلاعاتی نمی باشید</b><br>".mysql_errno()." : ".mysql_error()."</div>");
	}
	@mysql_query("SET NAMES utf8", $db_connect);
    @mysql_query("SET CHARACTER SET utf8", $db_connect);
}

// Redirect browser using header or script function
function redirect($location, $type="header"){
	if ($type=="header"){
		header("Location: ".str_replace("&amp;", "&", $location));
	}else{
		echo "<script type='text/javascript'>document.location.href='".str_replace("&amp;", "&", $location)."'</script>\n";
	}
}

// Validate numeric input
function isnum($value) {
	return (preg_match("/^[0-9]+$/", $value));
}

// Strip Input Function, prevents HTML in unwanted places
function stripinput($text) {
	if (!is_array($text)) {
		$text = stripslash(trim($text));
		$text = preg_replace("/(&amp;)+(?=\#([0-9]{2,3});)/i", "&", $text);
		$search = array("&", "\"", "'", "\\", '\"', "\'", "<", ">", "&nbsp;");
		$replace = array("&amp;", "&quot;", "&#39;", "&#92;", "&quot;", "&#39;", "&lt;", "&gt;", " ");
		$text = str_replace($search, $replace, $text);
	} else {
		foreach ($text as $key => $value) {
			$text[$key] = stripinput($value);
		}
	}
	return $text;
}

// Strip Slash Function, only stripslashes if magic_quotes_gpc is on
function stripslash($text) {
	if (QUOTES_GPC) { $text = stripslashes($text); }
	return $text;
}

// Get file types
function get_type($url){
	// Explode name
	$get_explode=explode(".", $url);
	$get_explode_count=count($get_explode);
	$type=$get_explode[$get_explode_count-1];
	$type=strtolower($type);
	
	return $type;
}

function login($username, $password, $remember=0){
	$username=secure_itext($username);
	$password=secure_itext(md5(md5($password)));
	$result=dbquery("SELECT * FROM ".DB_PREFIX."notary WHERE username='$username' AND password='$password' AND status='Enable' LIMIT 1");
	if(dbrows($result)!=0){
		$data=dbarray($result);
		$expired=time()+86400;
		if($remember==1){
			setcookie("user_id", $data['id'], $expired);
			setcookie("user_name", $data['name'], $expired);
			setcookie("user_username", $data['username'], $expired);
			setcookie("user_password", $data['password'], $expired);
		}else{
			$_SESSION['user_id']=$data['id'];
			$_SESSION['user_name']=$data['name'];
			$_SESSION['user_username']=$data['username'];
			$_SESSION['user_password']=$data['password'];
		}
		redirect($PHP_SELF);
	}else{
		redirect($PHP_SELF);
	}
}

if(isset($logout) && $logout=="yes"){
	session_destroy();
	unset($userdata);
	setcookie("user_id", $data['user_id'], -100);
	setcookie("user_username", $data['user_username'], -100);
	setcookie("user_password", $data['user_password'], -100);
	redirect($PHP_SELF);
}

if(!iMEMBER){
	$userdata['user_id']='NULL';
}

if(isset($_COOKIE)){
	foreach ($_COOKIE as $value) {
		$userdata = $_COOKIE;
	}
}

if(isset($_SESSION)){
	foreach ($_SESSION as $value) {
		$userdata = $_SESSION;
	}
}

function censorwords($text){
	return $text;
}

// Translate bytes into kb, mb, gb or tb by CrappoMan
function parsebytesize($size, $digits=2, $dir=false) {
	$kb=1024; $mb=1024*$kb; $gb=1024*$mb; $tb=1024*$gb;
	if (($size==0)&&($dir)) { return "Empty"; }
	elseif ($size<$kb) { return $size." Byte"; }
	elseif ($size<$mb) { return round($size/$kb,$digits)." KB"; }
	elseif ($size<$gb) { return round($size/$mb,$digits)." MB"; }
	elseif ($size<$tb) { return round($size/$gb,$digits)." GB"; }
	else { return round($size/$tb,$digits)." TB"; }
}

// Clean URL Function, prevents entities in server globals
function cleanurl($url) {
	$bad_entities = array("&", "\"", "'", '\"', "\'", "<", ">", "(", ")", "*");
	$safe_entities = array("&amp;", "", "", "", "", "", "", "", "", "");
	$url = str_replace($bad_entities, $safe_entities, $url);
	$url=stripslashes($url);
	return $url;
}

// Prevent any possible XSS attacks via $_GET.
function stripget($check_url) {
	$return = false;
	if (is_array($check_url)) {
		foreach ($check_url as $value) {
			if (stripget($value) == true) {
				return true;
			}
		}
	} else {
		$check_url = str_replace(array("\"", "\'"), array("", ""), urldecode($check_url));
		if (preg_match("/<[^<>]+>/i", $check_url)) {
			return true;
		}
	}
	return $return;
}

// Scan image files for malicious code
function verify_image($file) {
	$txt = file_get_contents($file);
	$image_safe = true;
	if (preg_match('#<?php#i', $txt)) { $image_safe = false; } //edit
	elseif (preg_match('#&(quot|lt|gt|nbsp|<?php);#i', $txt)) { $image_safe = false; }
	elseif (preg_match("#&\#x([0-9a-f]+);#i", $txt)) { $image_safe = false; }
	elseif (preg_match('#&\#([0-9]+);#i', $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\`\'\"]*)script:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\`\'\"]*)javascript:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#([a-z]*)=([\'\"]*)vbscript:#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*expression\([^>]*>#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#(<[^>]+)style=([\`\'\"]*).*behaviour\([^>]*>#iU", $txt)) { $image_safe = false; }
	elseif (preg_match("#</*(applet|link|style|script|iframe|frame|frameset)[^>]*>#i", $txt)) { $image_safe = false; }
	return $image_safe;
}

function random_text($type){
	if($type=="number"){
		$text=time();
		$text+=rand(10, 100);
		$text+=rand(100, 1000);
		$text+=rand(1000, 10000);
		$text+=rand(10000, 100000);
		$text+=rand(100000, 1000000);
		$text+=rand(1000000, 10000000);
		$text+=rand(10000000, 100000000);
		$text+=rand(100000000, 1000000000);
		$text+=rand(1000000000, 10000000000);
	}else if($type=="text"){
	
	}else if($type=="mixed"){
		
	}
	
	return $text;
}

// Function to get the client ip address
function get_ip(){
    $ipaddress='';
	if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	else if(getenv('HTTP_FORWARDED'))
		$ipaddress = getenv('HTTP_FORWARDED');
	else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	else
		$ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

define("iMEMBER", $userdata['user_id'] >= 1 ? 1 : 0);
?>