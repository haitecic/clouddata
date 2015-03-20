<!--會議記錄管理內容-->
<script>
function show_file_upload_field(field_name)
{
	document.getElementById(field_name).style.display = "inline";
}
</script>
<div class="content_bg" style="padding-left:30px;padding-right:30px;padding-top:15px;line-height:26px">
<?php echo form_open_multipart('project_minutes_edit/'.$record['id']);?>
	<div>
		<div style="float:left;font-size:14pt" >會議日期：<input name="meeting_date" value="<?php echo $record['meeting_date'];?>"></input></div>
		<div style="font-size:14pt" >會議地點：<input name="meeting_location" value="<?php echo $record['meeting_location'];?>"></input></div>
		<div style="padding-top:10px;font-size:14pt">參與人員：<input size="70%" name="attendee" value="<?php echo $record['attendee'];?>"></input></div>
	</div>	
	<br/>
	<textarea contenteditable="true" id="minutes" name="minutes"></textarea>  <!--會議記錄ckediter-->
	<br/>
	<label style="font-size:12pt">附加檔案：</label>
	<?php $i=0;?>
	<div id="fieldSpace" style="font-size:12pt">
	<?php foreach($attach_file as $file)
	{
	?>
		<div style="width:100%;padding-bottom:10px" id="div_<?php echo $i;?>"><a href="<?php echo site_url().'/uploads/'.$file['instance_file_name'];?>"><?php echo $file['file_name'];?></a><input style="margin-left:10%" id="<?php echo $i;?>" name="button_<?php echo $i;?>" style="font-size:12pt" type="button" onclick="delField()" value="刪除"></div>
	<?php 	
		echo form_input(array('id' =>'file_id_'.$i, 'name' => 'file_id_'.$i, 'file_id_'.$i, 'type'=>'hidden', 'value'=>$file['instance_file_name']));  //記錄上傳的檔案數
		$i++;	
	} ?>		 
	</div>		
	<input type="button" style="font-size:12pt" onclick="addField()" value="上傳更多檔案"></input>
	<div id="hidden_field">
	<?php
	echo form_input(array('id' =>'file_count', 'name' => 'file_count', 'type'=>'hidden', 'value'=>count($attach_file)));  //記錄上傳的檔案數量
	echo form_input(array('id' =>'original_file_count', 'name' => 'original_file_count', 'type'=>'hidden', 'value'=>count($attach_file)));  //記錄上傳的檔案數量
	echo form_input(array('id' =>'delete_file_count', 'name' => 'delete_file_count', 'type'=>'hidden', 'value'=>0));  //記錄刪除的檔案數量
	$person = $username;  
	echo form_hidden('status', $project_basic_info['status']);
	echo form_hidden('phase', $project_basic_info['phase']);
	echo form_hidden('person', $person);
	echo form_hidden('pm', $project_basic_info['pm']);
	echo form_hidden('project_id', $project_basic_info['project_id']);
	echo form_input(array('type'=>'hidden', 'id' =>'minutes1', 'value'=>$record['minutes']));
	?> 
	</div>
	<br/>
	<div style="text-align:center;padding-bottom:5px"><input type="submit" value="送出確認" style="font-size:13pt"/></div>
	<br/>
	</form>
</div>
<script type="text/javascript">
	var editor = CKEDITOR.replace( 'minutes', {
	} );
	editor.setData(document.getElementById("minutes1").value);
</script>
<script>
	var countMin = 1;
	var countMax = 10;  //最大上傳數量
	var commonName = "file_";		
	function addField() 
	{					
		var file_count = document.getElementById("file_count").value;		
		file_count = parseInt(file_count);  //強制轉型為數字型別
		var node_count = 0;//document.getElementById("fieldSpace").childNodes.length;  //取得上傳檔案的數量
		var nodelist = document.getElementById("fieldSpace").childNodes;
		for (i = 0; i < nodelist.length; i++) {  //計算節點數量
			if(nodelist[i].nodeName == "DIV")
			{
				node_count++;
			}
		}
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
		/*判斷節點內容*/
		/*var nodelist = document.getElementById("fieldSpace").childNodes;
		var txt = "";
		var i;
		for (i = 0; i < nodelist.length; i++) {
			txt = txt + nodelist[i].nodeName + "<br>";
		}
		document.write(txt);*/
		var file_count = document.getElementById("file_count").value;		
		file_count = parseInt(file_count);  //強制轉型為數字型別
		var object_id = event.currentTarget.id;  //取得觸發事件的id(觸發onclick的button ID)
		var delete_object = document.getElementById("div_"+object_id);  //要刪除的檔案上傳欄位物件
		delete_object.parentNode.removeChild(delete_object);
		var ori_file_count = document.getElementById("original_file_count").value;  //取得原始檔案數量
		if(object_id < ori_file_count)  //當要刪除的物件編號小於原始檔案上傳數量，表示刪除的檔案為先前已上傳的檔案
		{
			//新增hidden並記錄要刪除之檔案在資料庫的id 記錄於file_id_編號 這個hidden中
			//更新要刪除的記錄數量,記在上面的hidden中
			var hidden_input = document.createElement('input');			
			hidden_input.id = 'delete_file_' + document.getElementById("delete_file_count").value;
			hidden_input.type = 'hidden';			
			hidden_input.name = 'delete_file_' + document.getElementById("delete_file_count").value;	
			hidden_input.value = document.getElementById("file_id_"+object_id).value;			
			document.getElementById('hidden_field').appendChild(hidden_input);
			document.getElementById("delete_file_count").value = parseInt(document.getElementById("delete_file_count").value) + 1;
		}
	} 
</script>