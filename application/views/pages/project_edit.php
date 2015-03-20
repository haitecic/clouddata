    <!-- Begin page content -->
	<style type="text/css">
	.table_decoration_header{
		font-size:14pt;
		padding:5px; 
		text-align:center;	
		background-color:#E6EED5;;
	}
	.table_decoration_row2{
		font-size:14pt;
		padding:5px; 	
		background-color:#FFFFFF;		
	}
	.table_decoration_row1{
		font-size:14pt;
		padding:5px; 	
		background-color:#F2F2F2;		
	}
	.input_title
	{
		font-size:14pt;
		width:15%;	
		background-color:#F0F0F0;	
		border-color:#0000FF;
		
	}
	.input_title_per
	{
		padding-top:5px;
		padding-bottom:5px;
		font-size:14pt;
		padding-left:10px;
		border-bottom-width:1px;
		border-bottom-color:#AEA9B1;	
		border-bottom-style:solid;		
		border-right-width:1px;
		border-right-color:#AEA9B1;	
		border-right-style:solid;	
	}
	
	.input_area
	{
		padding-left:13px;
		font-size:11pt;
		width:100%;	
		border-bottom-width:1px;
		border-bottom-color:#A9A9A9;
		border-bottom-style:solid;
		padding-bottom:5px;
	}
	.input
	{
		vertical-align:bottom;
		margin-left:5px;
		margin-top:5px;
		margin-bottom:0px;
		font-size:14pt;		
	}
	.form_title
	{
		border-bottom-width:1px;
		border-bottom-color:#A9A9A9;
		border-bottom-style:solid;
		background-color:#E6EED5;
		font-weight:bold;
		font-size:14pt;
		padding-top:5px;
		padding-bottom:5px;
		padding-left:12px
	}
	
	.table_title
	{
		padding-top:5px;
		padding-bottom:5px;
		font-size:14pt;
		padding-left:10px;
		/*width:18%;*/
	}
	.title
	{
		padding-top:5px;
		height:45px;
		padding-bottom:5px;
		padding-left:10px;
		font-size:14pt;		
		width:17%;
		border-bottom-width:1px;
		border-bottom-color:#AEA9B1;
		border-bottom-style:solid;		
		border-right-width:1px;
		border-right-color:#AEA9B1;
		border-right-style:solid;	
		background-color:#F0F0F0;
	}
	.second_column_title
	{
		width:10%;
		border-bottom-width:1px;
		border-bottom-color:#AEA9B1;
		border-bottom-style:solid;	
		border-right-width:1px;
		border-right-color:#AEA9B1;	
		border-right-style:solid;
		background-color:#F0F0F0;
		font-size:13pt;
	}
	.data
	{
		padding-top:5px;
		padding-bottom:5px;
		padding-left:5px;
		font-size:14pt;
		margin-right:10px;		
		border-bottom-width:1px;
		border-bottom-color:#AEA9B1;
		border-bottom-style:solid;		
		border-right-width:1px;
		border-right-color:#AEA9B1;	
		border-right-style:solid;
		/*width:80%;*/
	}
	.hint
	{
		color:red;
		font-size:12pt;
		padding-top:7px;
	}
	</style>
	<div class="container">
		<div class="page-header">
			<h2>專案編輯</h2>
		</div>
		<p class="lead">
	<?php 
	echo form_open('project/project_edit/'.$project_basic_info['id']); //呈現網頁form表單的tag?>
	<table style="width:100%; border:#AEA9B1 1px solid;">		
		<tr class="form_title">
			<td colspan="2" class="table_title" style="height:40px">專案基本資料</td>
			<td></td>
		</tr>
		<tr>
			<td class="title">專案名稱</td>
			<td class="data"><input type="text" name="project_name" size="40" placeholder="請輸入專案名稱" value="<?php echo $project_basic_info['project_name']; ?>">
			<?php
			echo form_error('project_name');
			?>
			</td>			
		</tr>
		<tr>
			<td class="title">管理者</td>
			<td class="data">
			<select name="pm">
				<option value="林純如" <?php if($project_basic_info['pm'] == "林純如") echo " selected"; ?>>林純如</option>
				<option value="邱卓群" <?php if($project_basic_info['pm'] == "邱卓群") echo " selected"; ?>>邱卓群</option>	
				<option value="陳勇全" <?php if($project_basic_info['pm'] == "陳勇全") echo " selected"; ?>>陳勇全</option>
				<option value="陳健發" <?php if($project_basic_info['pm'] == "陳健發") echo " selected"; ?>>陳健發</option>				
			</select>
			</td>
		</tr>
		<tr>
			<td class="title">合作對象</td>
			<td class="data">
				<select name="collaborate_id">
				<?php 
				foreach($collaborate_objects as $collaborate_object)
				{
				?>
					<option value="<?php echo $collaborate_object['id'];?>" <?php if($collaborate_object['id'] == $project_basic_info['collaborate_id']) echo " selected";?>><?php echo $collaborate_object['institute'];?></option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>	
		<tr>
			<td class="title" >專案狀態</td>
			<td class="data">
			<input type="radio" name="status" value="1" <?php if($project_basic_info['status'] == 1) echo " checked";?> />執行中&nbsp;
			<input type="radio" name="status" value="0" <?php if($project_basic_info['status'] == 0) echo " checked";?>/>結案
			</td>
		</tr>
		<tr>
			<td class="title" >執行階段</td>
			<td class="data">
			<select name="phase" >				
				<!--<option value="0">創意提案</option>-->
				<option value="1" <?php if($project_basic_info['phase'] == 1) echo " selected";?>>創意提案</option>
				<option value="2" <?php if($project_basic_info['phase'] == 2) echo " selected";?>>需求定義</option>
				<option value="3" <?php if($project_basic_info['phase'] == 3) echo " selected";?>>可行性評估</option>
				<option value="4" <?php if($project_basic_info['phase'] == 4) echo " selected";?>>試作件製作</option>
			</select>
			</td>
		</tr>
		</table>
		<?php echo form_hidden('project_id', $project_basic_info['id']);?>
	<div style="text-align:center;border-left:#AEA9B1 1px solid;border-right:#AEA9B1 1px solid;border-bottom:#AEA9B1 1px solid;padding-top:5px;padding-bottom:5px"><input type="submit" value="確認送出" style="font-size:14pt"/></div>
	</form>
	<p class="lead">
	</p>		
</div>