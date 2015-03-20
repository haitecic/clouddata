	
	<!--顯示資料新增成功訊息-->
	
    <!-- Begin page content -->
    <div class="container">
		<div class="page-header">
			<h2>產學研專案管理</h2>
			<br/><br/>
			<?php 
			echo form_open('project_list');
			echo form_hidden('flag', true);
			?>
			<div style="font-size:12pt;float:left"><input name="search_bar" placeholder="請輸入搜尋條件" <?php if(isset($search) != null) echo 'value="'.$search.'"';?>></input>
				<input type="submit" value="搜尋">&nbsp;&nbsp;
				<input style="font-size:18pt" type="checkbox" name="firm" value="1" <?php if($firm_checked == 1){echo "checked";}?>>廠商&nbsp; 
				<input style="font-size:18pt" type="checkbox" name="school" value="2" <?php if($school_checked == 2){echo "checked";}?>>學校&nbsp;
				<input style="font-size:18pt" type="checkbox" name="institute" value="3" <?php if($institute_checked  == 3){echo "checked";}?>>法人&nbsp;
			</div>	
					
			
			<div style="width:100%; text-align:right;"><?php echo anchor('project_create/', "+新增專案", 'style="font-size:14pt"');?></div>
			</form>	
		</div>
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
		<p class="lead">
		<table width="100%">
			<tr style="width:100%;font-size:14pt;color:#808080;background-color:#E6EED5;border-bottom-color:#EDEDED;height:50px;line-height:25px">
				<td style="width:52%;padding-left:270px;font-size:14pt;color:black">專案名稱</td>
				<td align="center" style="width:20%;font-size:14pt;color:black">專案進度</td>
				<td align="center" style="width:20%;font-size:14pt;color:black;margin-left:-15px;">負責人</td>
				<td align="center" style="width:35%;font-size:14pt;color:black;">更新時間</td>
			</tr>
			
			<?php
			$i =0;
			foreach($project_list as $project)
			{
				if($i%2==0)
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px">
				<td style="width:52%;padding-left:10px">
				<?php 
				//echo anchor('project_detail/'.$project['project_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');
				echo anchor('project_record/'.$project['last_record_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');
				?>
				<br/><!--3855AE-->
				<span style="font-size:12pt;color:#253C92"><?php echo $project['institute'];?></span><!--color:#808080-->
				</td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['status'].' ('.$project['phase'] .')';?></td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['pm']?></td>
				<td align="center" style="width:35%;font-size:13pt;color:black;"><?php echo $project['update_datetime']?></td>
				</tr>
			<?php
				}
				else
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px;background-color:#FAF5F5"><!--F0F0F0-->
				<td style="width:52%;padding-left:10px;">
				<?php 
				//echo anchor('project_detail/'.$project['project_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');
				echo anchor('project_record/'.$project['last_record_id'], $project['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');
				?><br/><!--#253C92 3855AE-->
				<span style="font-size:12pt;color:#253C92"><?php echo $project['institute'];?></span>
				</td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['status'].' ('.$project['phase'] .')';?></td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project['pm']?></td>
				<td align="center" style="width:35%;font-size:13pt;color:black;"><?php echo $project['update_datetime']?></td>
				</tr>
			<?php
				}
				$i++;
			}
			?>
			
			<?php
			
			/*for($i=0;$i<count($project_list);$i++)
			{
				if($i%2==0)
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px">
				<td style="width:52%;padding-left:10px">
				<?php echo anchor('project/project_detail/'. $project_list[$i]['class'] .'/'.$project_list[$i]['project_id'].'/'.' ', $project_list[$i]['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');?><br/><!--3855AE-->
				<?php echo anchor('institute/manage/'. $project_list[$i]['collaborate_id'], $project_list[$i]['institute'], 'title="單位名稱" style="font-size:12pt;color:#253C92"');?><!--color:#808080-->
				</td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project_list[$i]['status'].' ('.$project_list[$i]['phase'] .')';?></td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project_list[$i]['pm']?></td>
				<td align="center" style="width:35%;font-size:13pt;color:black;"><?php echo $project_list[$i]['update_datetime']?></td>
				</tr>
			<?php
				}
				else
				{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px;background-color:#FAF5F5"><!--F0F0F0-->
				<td style="width:52%;padding-left:10px;">
				<?php echo anchor('project/project_detail/'. $project_list[$i]['class'] .'/'.$project_list[$i]['project_id'].'/'.' ', $project_list[$i]['project_name'], 'title="" style="text-decoration:none;font-weight:300;font-size:14pt;color:black"');?><br/><!--#253C92 3855AE-->
				<?php echo anchor('institute/manage/'. $project_list[$i]['collaborate_id'], $project_list[$i]['institute'], 'title="單位名稱" style="font-size:12pt;color:#253C92"');?><!--color:#808080-->
				</td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project_list[$i]['status'].' ('.$project_list[$i]['phase'] .')';?></td>
				<td align="center" style="width:20%;font-size:13pt;vertical-align:middle;color:black"><?php echo $project_list[$i]['pm']?></td>
				<td align="center" style="width:35%;font-size:13pt;color:black;"><?php echo $project_list[$i]['update_datetime']?></td>
				</tr>
			<?php
				}
			}*/
			/*foreach($project_list as $project)
			{
			?>
				<tr style="width:100%;font-size:14pt;color:#808080;height:70px;line-height:25px">
				<td width="65%">
				<?php echo anchor('project/project_detail/'. $project['class'] .'/'.$project['project_id'].'/'.' ', $project['project_name'], 'title="" style="text-decoration:none;font-weight:bold;font-size:14pt;color:#253C92"');?><br/><!--3855AE-->
				<?php echo anchor('institute/manage/'. $project['collaborate_id'], $project['institute'], 'title="單位名稱" style="font-size:12pt;color:#808080"');?><!---->
				</td>
				<td width="30%" style="font-size:13pt;padding-bottom:25px"><?php echo $project['status'].' ('.$project['phase'] .')';?></td>
				<td width="30%" style="font-size:13pt;padding-bottom:25px"><?php echo "&nbsp;".$project['pm']?></td>
				</tr>
			<?php
			}*/
			?>
		</table>
		<?php
		
		
		/**/		
		//顯示所有專案列表
		
		/*foreach($project_list as $project)
		{
			echo '<p style="font-size:14pt;color:#808080">';
			echo anchor('project/project_detail/'. $project['class'] .'/'.$project['project_id'].'/'.' ', $project['project_name'], 'title=""').'&nbsp;&nbsp;';
			echo $project['status'].'('.$project['phase'] .')'.'&nbsp;&nbsp;&nbsp;&nbsp;'.$project['pm'].'<br/>';
			echo anchor('institute/manage/'. $project['collaborate_id'], $project['institute'], 'title="單位名稱" style="font-size:12pt;color:#808080"').'<br/>';
			echo '</p>';
		}*/		
		?>	
		
		<div style="text-align:center;font-size:14pt">
		<?php 
		for($i=0; $i<$page_number; $i++)
		{		
			echo anchor("project_list/".$i.'/'.$search.'?search='.$search.'&firm_checked='.$firm_checked.'&school_checked='.$school_checked.'&institute_checked='.$institute_checked.'&get_flag=true', ($i+1), 'style="text-decoration:underline"').'&nbsp;&nbsp;';
		}
		if(empty($search)) //未設搜尋條件的情況
		{
			if($show_data_count>1)
			{
			?>
				<div>總共<?php echo $total_data_count?>筆專案資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽<?php echo ($start_record+1);?>~<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 1)
			{
			?>
				<div>總共<?php echo $total_data_count?>筆專案資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽第<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 0)	
			{		
			?>
				<div>無任何相符合的專案資料。</div>
			<?php
			}
		}
		else  //有設搜尋條件的情況
		{
			if($show_data_count > 1)
			{
			?>
				<div>搜尋：<?php echo $search;?>，結果總共<?php echo $total_data_count?>筆資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽<?php echo ($start_record+1);?>~<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			else if($show_data_count == 1)
			{
			?>
				<div>搜尋：<?php echo $search;?>，結果總共<?php echo $total_data_count?>筆資料，目前顯示第<?php echo ($page+1);?>頁(瀏覽第<?php echo $start_record+$show_data_count;?>筆資料)</div>
			<?php
			}
			
			else if($show_data_count == 0)
			{
			?>
				<div>搜尋：<?php echo $search;?>，未有任何相符合的資料。</div>
			<?php
			}
		}
		?>
		<p></p>
    </div>
	</div>