<?php
/* Management Information System (MIS)
 * Design & Development By PadsanSystem
 * Website : www.padsansystem.com
 * Email : info@padsansystem.com
 * Tel : 026-32545700
 * Fax : 026-32545701
 */

// If register_globals is turned off, extract super globals (php 4.2.0+)
if (ini_get('register_globals') != 1) {
	if ((isset($_POST) == true) && (is_array($_POST) == true)) extract($_POST, EXTR_OVERWRITE);
	if ((isset($_GET) == true) && (is_array($_GET) == true)) extract($_GET, EXTR_OVERWRITE);
}

// Locate config.php and set the basedir path
$folder_level = "";
while (!file_exists($folder_level."config.php")) { $folder_level .= "../"; }
require_once($folder_level."config.php");
define("BASEDIR", $folder_level);
define("INCLUDES", BASEDIR."includes/");
define("UPLOADS", BASEDIR."uploads/");
define("IMAGES", BASEDIR."images/");
define("TEMPLATES", BASEDIR."templates/default/");
define("TEMPLATES_CSS", TEMPLATES."css/");
define("TEMPLATES_FONTS", TEMPLATES."fonts/");
define("TEMPLATES_IMAGES", TEMPLATES."images/");

$link = dbconnect($server_host, $server_username, $server_password, $server_database);

// Connect Database
function dbconnect($db_host, $db_user, $db_pass, $db_name) {
	$db_connect = @mysql_connect($db_host, $db_user, $db_pass);
	$db_select = @mysql_select_db($db_name);
	if (!$db_connect) {
		die("<div style='font-family:tahoma;font-size:11px;text-align:center;'><b>Could not connect to database</b><br>".mysql_errno()." : ".mysql_error()."</div>");
	} elseif (!$db_select) {
		die("<div style='font-family:tahoma;font-size:11px;text-align:center;'><b>Could not Seletc Database</b><br>".mysql_errno()." : ".mysql_error()."</div>");
	}
	@mysql_query("SET NAMES utf8", $db_connect);
	@mysql_query( "SET CHARACTER SET utf8", $db_connect );
}

// Get Query
function dbquery($query) {
	$result = @mysql_query($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

// Get count of rows results
function dbrows($query) {
	$result = @mysql_num_rows($query);
	return $result;
}

// Get array of results
function dbarray($query) {
	$result = @mysql_fetch_array($query);
	if (!$result) {
		echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

// Search in DB
function search($number="", $date="", $p1="", $p2=""){
	// Check String
	$number=$number;
	$date=$date;
	$p1=$p1;
	$p2=$p2;
	
	if($p1!=""){
		$a="p1='".$_POST['p1']."'";
		return $result=dbquery("SELECT * FROM documents WHERE $a");
	}else{
		$a="";
	}
	
	if($p1!=""){
		$b="p2='".$_POST['p2']."'";
		return $result=dbquery("SELECT * FROM documents WHERE $b");
	}else{
		$b="";
	}
	
	if($date!=""){
		$c="date='$date'";
		return $result=dbquery("SELECT * FROM documents WHERE $c");
	}else{
		$c="";
	}
	
	if($number!=""){
		$d="number='".$number."'";
		return $result=dbquery("SELECT * FROM documents WHERE $d");
	}else{
		$d="";
	}
}
?>