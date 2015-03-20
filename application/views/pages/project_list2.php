<!--會議記錄管理內容-->
<div class="content_bg" style="padding-left:30px;padding-right:30px;padding-top:15px;line-height:26px;height:1000px">
	<div class="container">
		<div class="rect_02"></div>
		<div class="main_title_02" style="padding-left:15px;">專案資料</div>
		<div class="main_line_02"></div>
		<?php 
		echo form_open('project_list');
		echo form_hidden('flag', true);
		?>
		<div width="100%">
		<div style="width:92%;float:left;margin-top:20px;">
			<input style="width:50%;height:40px;border-radius:3px;border:1px solid #ff9000" name="search_bar" placeholder="請輸入搜尋條件" <?php if(isset($search) != null) echo 'value="'.$search.'"';?>></input>
			<input style="margin-left:10px;width:80px;height:40px;border-radius:3px;border: 1px solid #989898;" type="submit" value="搜尋">&nbsp;&nbsp;
			<input style="font-size:18pt" type="checkbox" name="firm" value="1" <?php if($firm_checked == 1){echo "checked";}?>>廠商&nbsp; 
			<input style="font-size:18pt" type="checkbox" name="school" value="2" <?php if($school_checked == 2){echo "checked";}?>>學校&nbsp;
			<input style="font-size:18pt" type="checkbox" name="institute" value="3" <?php if($institute_checked  == 3){echo "checked";}?>>法人&nbsp;
		</div>
		<div style="margin-top:25px;float:left;text-align:right"><?php echo anchor('project_create/', "+新增專案", 'style="font-size:14pt"');?></div>
		</div>
		</form>	
		<br/><br/>
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
		<br/>
		<p class="lead">
		<table width="100%">
			<tr style="width:100%;font-size:14pt;background-color:#6dc7ff;color:#292929;border-bottom-color:#EDEDED;height:50px;line-height:25px">
				<td style="width:40%;padding-left:200px;font-size:14pt;color:black">專案名稱</td>
				<td align="center" style="width:10%;font-size:14pt;color:black">專案進度</td>
				<td align="center" style="width:10%;font-size:14pt;color:black;margin-left:-15px;">負責人</td>
				<td align="center" style="width:10%;font-size:14pt;color:black;">更新時間</td>
			</tr>
			
			<?php
			$i =0;
			foreach($project_list as $project)
			{
				if($i%2==0)
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px">
				<td style="width:50%;padding-left:15px">
				<img src="<?php echo $img_location.'/arrow.png';?>"></img>
				<?php 
				//echo anchor('project_detail/'.$project['project_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');
				echo anchor('project_record/'.$project['last_record_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:#253C92"');
				?>
				<br/><!--3855AE-->
				<div style="margin-top:5px;margin-left:20px;font-size:12pt;color:gray"><?php echo $project['institute'];?></div><!--color:#808080-->
				</td>
				<td align="center" style="width:23%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['status'].' ('.$project['phase'] .')';?></td>
				<td align="center" style="width:15%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['pm']?></td>
				<td align="center" style="width:52%;font-size:13pt;color:black;"><?php echo $project['update_datetime']?></td>
				</tr>
			<?php
				}
				else
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px;background-color:#E4E4E4"><!--F0F0F0-->
				<td style="width:50%;padding-left:15px;">
				<img src="<?php echo $img_location.'/arrow.png';?>"></img>
				<?php				
				echo anchor('project_record/'.$project['last_record_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:#253C92;"');
				?><br/><!--#253C92 3855AE-->
				<div style="margin-top:5px;margin-left:20px;font-size:12pt;color:gray"><?php echo $project['institute'];?></div>
				</td>
				<td align="center" style="width:23%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['status'].' ('.$project['phase'] .')';?></td>
				<td align="center" style="width:15%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['pm']?></td>
				<td align="center" style="width:52%;font-size:13pt;color:black;"><?php echo $project['update_datetime']?></td>
				</tr>
			<?php
				}
				$i++;
			}
			?>
		</table>
		<br/>
		<div style="text-align:center;font-size:14pt">
		<?php		
		for($i=0; $i<$page_number; $i++)
		{
			echo anchor("project_list/".$i.'/'.$search.'?search='.$search.'&firm_checked='.$firm_checked.'&school_checked='.$school_checked.'&institute_checked='.$institute_checked.'&get_flag=true', ($i+1), 'style="padding-left:5px;padding-right:5px;padding-top:1px;padding-bottom:1px;text-decoration:none;width:50px;height:22px;line-height:22px;border:1px solid #c8c8c8;color:#0074be;"').'&nbsp;&nbsp;';
		}
		if(empty($search)) //未設搜尋條件的情況
		{
			if($show_data_count>1)
			{
			?>
				<div style="margin-top:10px;">總共<?php echo $total_data_count?>筆專案資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽<?php echo ($start_record+1);?>~<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 1)
			{
			?>
				<div style="margin-top:10px;">總共<?php echo $total_data_count?>筆專案資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽第<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 0)	
			{		
			?>
				<div style="margin-top:10px;">無任何相符合的專案資料。</div>
			<?php
			}
		}
		else  //有設搜尋條件的情況
		{
			if($show_data_count > 1)
			{
			?>
				<div style="margin-top:10px;">搜尋：<?php echo $search;?>，結果總共<?php echo $total_data_count?>筆資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽<?php echo ($start_record+1);?>~<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 1)
			{
			?>
				<div style="margin-top:10px;">搜尋：<?php echo $search;?>，結果總共<?php echo $total_data_count?>筆資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽第<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			
			else if($show_data_count == 0)
			{
			?>
				<div style="margin-top:10px;">搜尋：<?php echo $search;?>，未有任何相符合的資料。</div>
			<?php
			}
		}
		?>
		<p></p>
	</div>
	</div>
</div>