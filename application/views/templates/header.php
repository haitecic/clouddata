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
    <title><?php echo $title ?></title>
	<!--load jQuery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<!--load bootstrap-->
	<link href="<?php echo $template_location;?>/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	<!--load datatable-->
	<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.css"></link>
	<!--load self-defined css-->
	<link href="<?php echo $css_location;?>/project.css" rel="stylesheet">
	
	<!--<link href="<?php echo $plugins_location;?>/justified-gallery/justifiedGallery.css" rel="stylesheet">
	<link href="<?php echo $plugins_location;?>/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href="<?php echo $plugins_location;?>/fancybox/jquery.fancybox.css" rel="stylesheet">-->
	<!--load specific text -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!--load jQuery ui-->	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">		
	<!--preview file-->
	<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.3/fotorama.css" rel="stylesheet">		
</head>