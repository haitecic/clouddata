<html>
	<head>
		<title><?php echo '『'.$subject.'』專案會議';?></title>
		<script src="<?php echo $js_location;?>/jquery-2.1.1.min.js"></script>
		<script>
		$( document ).ready(function() {
			alert("驗證成功!");
		});
		</script>
	</head>
	<body style="padding-left:70px;padding-right:70px;padding-top:10px">
	<!-- Begin page content -->
	
	<div style="font-size:14pt;line-height:35px">
		<div style="line-height:15px"><h3><?php echo '『'.$subject.'』專案會議';?></h3></div>
		<hr>
		<div style="float:left">會議日期：<?php if(!empty($record['meeting_date'])){ echo $record['meeting_date'];} else{ echo "--";} ?></div>
		<div style="clear:left">會議地點：<?php if(!empty($record['meeting_location'])){ echo $record['meeting_location'];} else{  echo"--";} ?></div>
		<div>參與人員：<?php if(!empty($record['attendee'])){ echo $record['attendee'];} else{  echo"--";} ?></div>
	</div>	
	<div style="font-size:14pt;padding-top:15px">會議內容：</div>
	<div width="100%" style="padding-top:5px"><?php if(!empty($record['minutes'])){ echo $record['minutes'];} else{ echo "--";} ?></div>
	<br/>		
	<div style="font-size:14pt;line-height:35px">	
	夾帶檔案：<br/>	
	<?php
	$i = 1;
	if(!empty($attach_file))
	{
		foreach($attach_file as $file)
		{
			echo $i.'. <a href="'.site_url().'/uploads/'.$file['instance_file_name'].'">'.$file['file_name'].'</a><br/>';
			$i++;
		}
	}
	else
	{
		echo "無";
	}
	?>
	</div>
	</body>
</html>