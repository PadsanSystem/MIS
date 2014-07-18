<?php
require_once "subheader.php";

if(!iMEMBER){
	if(isset($_POST['submit'])){
		login($username=$_POST['username'], $password=$_POST['password'], $remember=$_POST['remember']);
	}
	?>
	<!-- Begin page content -->
	<div class="container col-lg-offset-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading"><span class="glyphicon glyphicon-user"></span> ورود به سیستم</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" method="post" action="login.php">
					<div class="form-group">
						<label for="username" class="col-lg-12 control-label">نام کاربری</label>
						<br><br>
						<div class="col-lg-12">
							<input id="username" name="username" type="text" class="form-control" placeholder="Enter your username">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-lg-12 control-label">رمز عبور</label>
						<br><br>
						<div class="col-lg-12">
							<input id="password" name="password" type="password" class="form-control" placeholder="Enter your password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<div class="checkbox">
								<label>
									مرا به خاطر بسپار
								</label>
								<input name="remember" type="checkbox" value="1">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-7">
							<button name="submit" type="submit" class="btn btn-primary">ورود به سیستم</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
}else{
	redirect(BASEDIR."index.php");
}
require_once BASEDIR."footer.php";
?>