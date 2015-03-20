<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<!--<link rel="icon" href="<?php //echo $img_location;?>/haitec_logo.jpg">-->
    <title><?php echo $title ?></title>
	<link href="<?php echo $plugins_location;?>/bootstrap/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href="<?php echo $plugins_location;?>/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/fullcalendar/fullcalendar.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/xcharts/xcharts.min.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/select2/select2.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/justified-gallery/justifiedGallery.css" rel="stylesheet">
	<link href="<?php echo $css_location;?>/style_v2.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/chartist/chartist.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	
	<!--彈出視窗js-->
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<!--<script type="text/javascript">
			$(function() {
				$("#dialog").dialog({
					autoOpen : false,
					show : {
						effect : "blind",
						duration : 500
					},
					hide : {
						effect : "blind",
						duration : 500
					}
				});
				$("#opener").click(function() {
					$("#dialog").dialog("open");
				});
			});
		</script>-->
	<!---->
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
	<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
	<!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
	<style>
	#dragandrophandler
	{
		border:2px dotted #0B85A1;
		width:1320px;
		height:150px;
		color:#92AAB0;
		text-align:center;
		vertical-align:middle;
		padding:10px 10px 10 10px;
		margin-top:15px;
		font-size:200%;
	}
	.progressBar 
	{
		width: 200px;
		height: 22px;
		border: 1px solid #ddd;
		border-radius: 5px; 
		overflow: hidden;
		display:inline-block;
		margin:0px 10px 5px 5px;
		vertical-align:top;
	}
 
	.progressBar div 
	{
		height: 100%;
		color: #fff;
		text-align: right;
		line-height: 22px; /* same as #progressBar height if we want text middle aligned */
		width: 0;
		background-color: #0ba1b5; border-radius: 3px; 
	}
	.statusbar
	{
		border-top:1px solid #A9CCD1;
		min-height:25px;
		width:700px;
		padding:10px 10px 0px 10px;
		vertical-align:top;
	}
	.statusbar:nth-child(odd)
	{
		background:#EBEFF0;
	}
	.filename
	{
		display:inline-block;
		vertical-align:top;
		width:250px;
	}
	.filesize
	{
		display:inline-block;
		vertical-align:top;
		color:#30693D;
		width:100px;
		margin-left:10px;
		margin-right:5px;
	}
	.abort
	{
		background-color:#A8352F;
		-moz-border-radius:4px;
		-webkit-border-radius:4px;
		border-radius:4px;display:inline-block;
		color:#fff;
		font-family:arial;font-size:11px;font-weight:normal;
		padding:4px 15px;
		cursor:pointer;
		vertical-align:top
    }
</style>
</head>