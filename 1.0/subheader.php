<?php
/* Management Information System (MIS)
 * Design & Development By PadsanSystem
 * Website : www.padsansystem.com
 * Email : info@padsansystem.com
 * Tel : 026-32545700
 * Fax : 026-32545701
 */
session_start();
require_once "maincore.php";
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>نرم افزار مدیریت اطلاعات</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="templates/default/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Uploadchi</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="terms.php"><span class="glyphicon glyphicon-book"></span> Terms</a></li>
				<li><a href="statistics.php"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
				<li><a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
				<li><a href="contactus.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
				if($userdata['user_id']!=NULL){
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Hi, <?php echo "<b>".$userdata['user_username']."</b>"; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="edit_profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Edit Profile</a></li>
						<li><a href="filemanager.php"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;File Manager</a></li>
						<li><a href="user_statistics.php"><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;View Statistics</a></li>
						<li><a href="user_statistics.php"><span class="glyphicon glyphicon-gift"></span>&nbsp;&nbsp;Buy Premium</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo BASEDIR."index.php?logout=yes"; ?>"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></li>
					</ul>
				</li>
				<?php
				}else{
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
						<li><a href="register.php"><span class="glyphicon glyphicon-plus"></span> Register</a></li>
					</ul>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
</div>