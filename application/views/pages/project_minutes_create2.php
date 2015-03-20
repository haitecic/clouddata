<!--會議記錄管理內容-->
<script>
function show_file_upload_field(field_name)
{
	document.getElementById(field_name).style.display = "inline";
}
</script>
<div class="content_bg" style="padding-left:30px;padding-right:30px;padding-top:15px;line-height:26px">
<?php echo form_open_multipart('project_minutes_create/'.$project_basic_info['project_id']);?>
	<div class="rect_02"></div>
		<div class="main_title_02" style="padding-left:15px;">會議記錄</div>
		<div class="main_line_02"></div>
		<br/>
	<div>
		<div style="float:left;font-size:14pt" >會議日期：<input name="meeting_date"></input></div>
		<div style="font-size:14pt">&nbsp;會議地點：<input name="meeting_location"></input></div>
		<div style="padding-top:10px;font-size:14pt">參與人員：<input size="70%" name="attendee"></input></div>
	</div>
	<br/>
	
	<textarea contenteditable="true" id="minutes" name="minutes"></textarea>  <!--會議記錄ckediter-->
	<br/>
	<label style="font-size:12pt">附加檔案：</label>
	<div id="fieldSpace" style="font-size:12pt"><div id="div_0" style="padding-bottom:10px"><input style="float:left;font-size:12pt" type="file" name="file_0" size="20"/><input id="0" name="button_0" style="font-size:12pt" type="button" onclick="delField()" value="刪除"></div></div>
	<?php echo form_input(array('id' =>'file_count', 'name' => 'file_count', 'type'=>'hidden', 'value'=> 1));  //記錄上傳的檔案數?>
	<input type="button" style="font-size:12pt" onclick="addField()" value="上傳更多檔案"></input>	 
	<?php	
	$person = $username;  
	echo form_hidden('status', $project_basic_info['status']);
	echo form_hidden('phase', $project_basic_info['phase']);
	echo form_hidden('person', $person);
	echo form_hidden('pm', $project_basic_info['pm']);
	echo form_hidden('project_id', $project_basic_info['project_id']);
	$j=0;
	echo form_hidden('org_count', count($relative_organizations));  //儲存合作組織數量
	foreach($relative_organizations as $organization)
	{
		echo form_hidden('org_name_'.$j, $organization['org_name']);
		echo form_hidden('dep_name_'.$j, $organization['dep_name']);
		echo form_hidden('unit_class_'.$j, $organization['unit_class']);
		echo form_hidden('pm_'.$j, $organization['pm']);
		echo form_hidden('phone_firm_'.$j, $organization['phone_firm']);
		echo form_hidden('phone_mobile_'.$j, $organization['phone_mobile']);
		echo form_hidden('memo_'.$j, $organization['memo']);
		echo form_hidden('level_class_'.$j, $organization['level_class']);
		echo form_hidden('function_id_'.$j, $organization['function_id']);
		$j++;	
	}
	?>
	<br/>	
	<div style="text-align:center;padding-bottom:5px"><input type="submit" value="送出確認" style="font-size:13pt"/></div>
	</form>	
</div>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'minutes', {
	} );
	editor.setData('<table style="border-color:#AEA9B1;line-height:30px; font-size:13pt" border="1" cellpadding="1" cellspacing="1" width="100%"><tbody><tr><td style="width:25%;text-align:center"><span style="font-size:14pt">討論議題</span></td><td style="width:25%;text-align:center"><span style="font-size:14pt">會議結論</span></td><td style="width:10%;text-align:center;"><span style="font-size:14pt">擔當</span></td><td style="width:10%;text-align:center;"><span style="font-size:14pt">完成時間</span></td><td style="width:20%;text-align: center"><span style="font-size:14pt">備註</span></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr></tbody></table>');
	</script>
	<script>
	var countMin = 1;
	var countMax = 10;  //最大上傳數量
	var commonName = "file_";		
	function addField() 
	{					
		var file_count = document.getElementById("file_count").value;		
		file_count = parseInt(file_count);  //強制轉型為數字型別
		var node_count = document.getElementById("fieldSpace").childNodes.length;  //取得上傳檔案的數量
		if(node_count == countMax)
			alert("最多可以上傳"+countMax+"個檔案");
		else
		{	
			var new_div = document.createElement("div");
			new_div.id = "div_"+file_count;			
			new_div.style.cssText="padding-bottom:10px";			
			var file_input = document.createElement('input');	
			file_input.type = 'file';
			file_input.name = 'file_' + file_count;	
			file_input.style.float = "left";	
			var button_input = document.createElement('input');
			button_input.id = file_count;
			button_input.type = 'button';
			button_input.name = 'button_' + file_count;	
			button_input.value = '刪除';
			button_input.onclick = delField;
			new_div.appendChild(file_input);
			new_div.appendChild(button_input);
			document.getElementById('fieldSpace').appendChild(new_div);
			document.getElementById("file_count").value = file_count + 1;
		}
	} 
	
	function delField()
	{ 
		var file_count = document.getElementById("file_count").value;		
		file_count = parseInt(file_count);  //強制轉型為數字型別
		var object_id = event.currentTarget.id;  //取得觸發事件的id(觸發onclick的button ID)
		var delete_object = document.getElementById("div_"+object_id);  //要刪除的檔案上傳欄位物件
		delete_object.parentNode.removeChild(delete_object);
	} 
</script>