<style>
.title
{
	text-align:left;
	padding:7px;
}
.data
{
	text-align:left;
	padding:7px;
}
</style>
<br/>
<div class="content_bg" style="padding-left:25px;padding-right:30px;padding-top:20px;line-height:28px;height:700px">
	<div class="rect_02"></div>
	<div class="main_title_02" style="padding-left:15px;">專案新增</div>
	<div class="main_line_02"></div><br/>
	<!--<img src="<?php //echo $img_location.'/arrow.png';?>"></img>
	<label style="font-size:14pt">請輸入以下專案資料</label>-->
	<?php
	echo form_open('project_create');
	?>
	<table style="width:80%;font-size:14pt;margin-top:12px;margin-left:7px">	
		<tr>
			<td class="title">專案名稱</td>
			<td class="data"><input size="45" type="text" name="project_name" value="<?php echo set_value('project_name'); ?>">
			<?php
			echo form_error('project_name');
			?>
			</td>
		</tr>
		<tr>
			<td class="title">負責人</td>
			<td class="data">
			<select name="pm" style="width:200">				
				<option value="林純如" <?php echo set_select('pm','林純如');?>>林純如</option>
				<option value="邱卓群" <?php echo set_select('pm','邱卓群');?>>邱卓群</option>
				<option value="陳勇全" <?php echo set_select('pm','陳勇全');?>>陳勇全</option>
				<option value="陳健發" <?php echo set_select('pm','陳健發');?>>陳健發</option>				
			</select>
			</td>
		</tr>
		<tr>
			<td class="title">合作類型</td>
			<td class="data">
				<select name="unit_class" style="width:200">	
					<option value="2" <?php echo set_select('unit_class','1',true);?>>外部組織-廠商</option>
					<option value="3" <?php echo set_select('unit_class','2');?>>外部組織-學校</option>						
					<option value="4" <?php echo set_select('unit_class','3');?>>外部組織-法人</option>	
					<option value="1" <?php echo set_select('unit_class','4');?>>內部部門</option>
				</select>				
			</td>
		<tr>
			<td class="title">組織名稱</td>
			<td class="data">	
				<input size="25" type="text" name="org_name" placeholder="" value="<?php echo set_value('org_name'); ?>">
				<?php
				echo form_error('org_name');
				?>
			</td>
		</tr>	
		<tr>
			<td class="title">單位名稱</td>
			<td class="data">
				<input size="25" type="text" name="dep_name" placeholder="" value="<?php echo set_value('dep_name'); ?>">
				<?php
				echo form_error('dep_name');
				?>
			</td>
		</tr>
		<tr>
			<td class="title">聯絡人姓名</td>
			<td class="data">
				<input size="25" type="text" name="outer_pm" placeholder="" value="<?php echo set_value('dep_name'); ?>">
				<?php
				echo form_error('outer_pm');
				?>
			</td>
		</tr>
		<tr>
			<td class="title">聯絡人電話(公司)</td>
			<td class="data">
				<input size="25" type="text" name="phone_firm" placeholder="02-5590-0520#1167" value="<?php echo set_value('phone_firm'); ?>">
				<?php
				echo form_error('phone_firm');
				?>
			</td>
		</tr>
		<tr>
			<td class="title">聯絡人電話(手機)</td>
			<td class="data">
				<input size="25" type="text" name="phone_mobile" placeholder="0963-585-397" value="<?php echo set_value('phone_mobile'); ?>">
				<?php
				echo form_error('phone_mobile');
				?>
			</td>
		</tr>
		<tr>
			<td class="title" >專案狀態</td>
			<td class="data">
			<input type="radio" name="status" value="1" <?php echo set_radio('status', '1',true); ?>/>執行中&nbsp;
			<input type="radio" name="status" value="0" <?php echo set_radio('status', '0'); ?>/>結案
			</td>
		</tr>
		<tr>
			<td class="title" >執行階段</td>
			<td class="data">
			<select name="phase" style="width:200">				
				<!--<option value="0">創意提案</option>-->
				<option value="1" <?php echo set_select('phase','1', true);?>>創意提案</option>
				<option value="2" <?php echo set_select('phase','2');?>>需求定義</option>
				<option value="3" <?php echo set_select('phase','3');?>>可行性評估</option>
				<option value="4" <?php echo set_select('phase','4');?>>試作件製作</option>
			</select>
			</td>
		</tr>
		</table>
		<br/>
		<div style="text-align:center"><input type="submit" value="確認送出" style="font-size:14pt"/></div>
	</form>	
</div>