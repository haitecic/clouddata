﻿<!DOCTYPE html>
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
    <title><?php echo $title ?></title>
	<!--load jQuery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--load bootstrap-->
	<link href="<?php echo $plugin_path;?>/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	<!--load datatable-->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.6/api/fnPagingInfo.js"></script>
	<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.css"></link>
	<!--load self-defined js-->
	<script type="text/javascript" src="<?php echo $js_location?>/project_list9.js"></script>
	<!--load self-defined css-->
	<link href="<?php echo $css_location;?>/style_v2.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/justified-gallery/justifiedGallery.css" rel="stylesheet">
	
	<link href="<?php echo $plugins_location;?>/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href="<?php echo $plugins_location;?>/fancybox/jquery.fancybox.css" rel="stylesheet">
	<!--load jQuery ui-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!--<script src="<?php echo $js_location;?>/devoops.js"></script>-->
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