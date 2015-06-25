<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>登入</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="../css/style_v2.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.text-right a:hover{
				text-decoration: underline;
				color: #ffffff;
			}

			.container-fluid{
/*				background-image:url(../img/background.png); 
				width:100%; 
				height:645px; 
				background-repeat:no-repeat;*/
			}			
		</style>


	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<?php
			echo form_open('login');
			?>
			<div class="box" style="margin-top:120px;">			
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header" style="font-family: Adobe 繁黑體 Std;">專案管理系統</h3>
					</div>
					<div class="form-group">
						<label class="control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">帳號</label>
						<input type="text" class="form-control" name="account" />
					</div>
					<div class="form-group">
						<label class="control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">密碼</label>
						<input type="password" class="form-control" name="passwd" />
					</div>
					<div class="text-center">
						<!--<a href="http://localhost/file_manager/file_manager2/application/views/pages/project_info.php"  class="btn btn-primary" style="font-family: Adobe 繁黑體 Std; font-size:17px; ">登入</a>-->
						<button type="submit" class="btn btn-primary" style="font-family: Adobe 繁黑體 Std; font-size:17px; ">登入</button>
					</div>
				</div>			
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
