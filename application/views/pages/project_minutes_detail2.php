<!--會議記錄管理內容-->
<div class="content_bg" style="padding-left:30px;padding-right:30px;padding-top:15px;line-height:26px">
<!--顯示資料新增成功訊息-->
<?php 
if(!empty($message))
{
	switch($message)
	{
		case "create":
			$message = "資料新增成功!";
			break;
		case "edit":
			$message = "資料編輯成功!";
			break;
	}		
?>
	<div style="width:100%; text-align:center; color:blue; font-size:14pt"><?php echo $message;?></div>
<?php
}
?>
<?php echo form_open('project_minutes_edit/'.$record['id']); //呈現網頁form表單的tag?>
	<div class="rect_02"></div>
	<div class="main_title_02" style="padding-left:10px;">會議記錄</div>
    <div class="main_line_02"></div>
	<br/>
	<div>
		<div style="float:left;font-size:14pt" >會議日期：<?php if(!empty($record['meeting_date'])){ echo $record['meeting_date'];} else{ echo "--";} ?></div>
		<div style="float:left;padding-left:10%;font-size:14pt">會議地點：<?php if(!empty($record['meeting_location'])){ echo $record['meeting_location'];} else{  echo"--";} ?></div>
		<div style="text-align:right;font-size:14pt"><a href="mailto:?subject=<?php echo $project_basic_info['project_name'].' 專案會議記錄';?>&body=會議記錄內容請參閱此連結：<?php echo site_url('project_minutes_mail').'/'.$record['id'];?>">寄送電子郵件</a></div>
		<div style="padding-top:10px;font-size:14pt">參與人員：<?php if(!empty($record['attendee'])){ echo $record['attendee'];} else{  echo"--";} ?></div>
	</div>	
	<br/>
	<div width="100%"><?php if(!empty($record['minutes'])){ echo $record['minutes'];} else{ echo "--";} ?></div>
	<br/>		
	<div style="font-size:14pt">	
	夾帶檔案：<br/>	
	<?php
	$i = 1;
	if(!empty($attach_file))
	{
		foreach($attach_file as $file)
		{
			echo $i.'. <a style="font-size:13pt" href="'.site_url().'/uploads/'.$file['instance_file_name'].'">'.$file['file_name'].'</a><br/>';
			$i++;
		}
	}
	else
	{
		echo "無";
	}
	?>
	</div>
	<br/>	
	<div style="text-align:center;padding-bottom:5px"><input type="submit" value="編輯資料" style="font-size:13pt"/></div>
</form>
</div>