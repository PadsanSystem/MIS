<?php
/*
|-----------------------------------|
|	PadsanSystem					|
|-----------------------------------|
|	Management Information System	|
|-----------------------------------|
|	Web   : www.PadsanSystem.com	|
|	Email : Info@PadsanSystem.com	|
|	Tel   : +98 - 26 325 45 700		|
|	Fax   : +98 - 26 325 45 701		|
|-----------------------------------|
*/
require_once "subheader.php";
require_once INCLUDES."file_hosting.php";

?>
<div class="container">
	<ul class="nav nav-tabs" id="myTab" style="border-bottom:0">
	  <li class="active"><a href="#upload_file" data-toggle="tab">Local Upload</a></li>
	  <!--<li><a href="#download_link" data-toggle="tab">Download From Links</a></li>-->
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="upload_file">
			<div class="panel panel-success" style="border-top-left-radius:0">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="upload.php" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-lg-8 col-lg-offset-2 text-center">
								<div class="fileinput fileinput-new input-group" data-provides="fileinput">
								  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
								  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Browse</span><span class="fileinput-exists">Change</span><input type="file" name="file_hosting"></span>
								</div>
								<br>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-4 col-lg-offset-4 text-center">
								<button id="send_file" name="send_file" type="submit button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-cloud-upload"></span> Upload Files</button>
							</div>
						</div>
					</form>
					<!--
					<div class="row">
						<div class="col-lg-4">
							<div class="thumbnail">
								<h3 class="text-center">Basic</h3>
								<img src="images/pro.png" alt="Buy Basic" class="img-responsive img-rounded">
								<div class="caption text-center">
									<br>
									<h2><span class="text-danger">25$</span></h2>
									<p><a href="#" class="btn-lg btn-block btn-primary" role="button">Buy Now</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="thumbnail">
								<h3 class="text-center">Pro</h3>
								<img src="images/pro.png" alt="Buy Pro" class="img-responsive img-rounded">
								<div class="caption text-center">
									<br>
									<h2><span class="text-danger">25$</span></h2>
									<p><a href="#" class="btn-lg btn-block btn-primary" role="button">Buy Now</a></p>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="thumbnail">
								<h3 class="text-center">Basic</h3>
								<img src="images/business.png" alt="Buy Business" class="img-responsive img-rounded">
								<div class="caption text-center">
									<br>
									<h2><span class="text-danger">25$</span></h2>
									<p><a href="#" class="btn-lg btn-block btn-primary" role="button">Buy Now</a><p>
								</div>
								<ul>
									<li> 1 TB Space</li>
								</ul>
							</div>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
		<!--
		<div class="tab-pane" id="download_link">
			<div class="panel panel-success" style="border-top-left-radius:0">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="index.php">
						<div class="form-group">
							<div class="col-lg-12">
								<input id="link_hosting" name="link_hosting" type="file">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-3">
								<button id="send_link" name="send_link" type="submit" class="btn btn-danger">Upload Files</button>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-heading" style="border-top-left-radius:0; border-top-right-radius:0"><span class="glyphicon glyphicon-cloud-download"> DownloadFromLinks</span></div>
			</div>
		</div>
		-->
	</div>
	<script>
	  $(function () {
		$('#myTab a:last').tab('show')
	  })
	</script>
</div>
<?php
require_once BASEDIR."footer.php";
?>