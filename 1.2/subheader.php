<?php
/* Management Information System (MIS)
 * Design & Development By AtfaGroup
 * Website : www.atfagroup.com
 * Email : info@atfagroup.com
 * Tel : 026-32545700
 * Fax : 026-32545701
 */
session_start();
require_once("maincore.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>نرم افزار مدیریت اطلاعات</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="templates/default/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="templates/default/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="templates/default/css/fonts.min.css" type="text/css">
		<link rel="stylesheet" href="templates/default/css/style.min.css" type="text/css">
		<script src="includes/jquery.js"></script>
		<script src="includes/bootstrap.min.js"></script>
		<script src="includes/bootstrap-inputmask.min.js"></script>
	</head>
	<body>
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<ul class="nav pull-right">
				<li><a href="insert_multi.php">درج دسته ای اطلاعات</a></li>
				<li class="divider-vertical"></li>
				<li><a href="insert.php">درج اطلاعات</a></li>
				<li class="divider-vertical"></li>
				<li><a href="index.php">جستجوی اطلاعات</a></li>
				<li class="active"><a href="index.php">دفترخانه شماره 203 کرج</a></li>
			</ul>
			<ul class="nav pull-left">
				<li><a href="insert_multi.php">ورود به سیستم</a></li>
			</ul>
		</div>
	</div>
	<div class="container">