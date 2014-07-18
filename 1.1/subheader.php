<?php
session_start();
require_once "maincore.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Easily store, manage and share files with anyone">
	<meta name="keywords" content="Easily store, manage, share, files, anyone">
	<meta name="author" content="PadsanSystem">
	<link rel="shortcut icon" href="favicon.png">
	<title>سیستم مدیریت اطلاعات</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/sticky-footer-navbar.min.css" rel="stylesheet">
	<link href="css/ui-lightness/jquery-ui.css" rel="stylesheet"/>
	<link href="css/style.min.css" rel="stylesheet">
	<link href="css/fonts.min.css" rel="stylesheet">
	<script src="includes/javascripts/fileinput.js"></script>
	<script src="includes/javascripts/inputmask.js"></script>
</head>
<body>
<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav pull-left">
				<?php
				if($userdata['user_id']!=NULL){
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> سلام , <?php echo $userdata['user_name']; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="insert.php"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;درج اطلاعات</a></li>
						<li><a href="filemanager.php"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;درج دسته ای اطلاعات</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo BASEDIR."index.php?logout=yes"; ?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;خروج از سیستم</a></li>
					</ul>
				</li>
				<?php
				}else{
				?>
				<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> ورود به سیستم</a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> درباره ی ما</a></li>
				<?php
				}
				?>
				
			</ul>
			<ul class="nav navbar-nav pull-right">
				<?php
				if($userdata['user_id']!=NULL){
				?>
				<li><a href="search.php"><span class="glyphicon glyphicon-book"></span> جستجوی اطلاعات</a></li>
				<?php
				}
				?>
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> خانه</a></li>
			</ul>
		</div>
	</div>
</div>