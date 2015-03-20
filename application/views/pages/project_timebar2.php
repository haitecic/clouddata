<!--時間軸-->
<style type="text/css">	
	a.node:hover, a.node:active {/*font-size: 110%;*/}
</style>

<br/>
<!--<div class="timeline_icon"></div>-->	
	<div class="timeline_bg">	
		<div style="width:88%;float:left;font-size:18pt;margin-top:5px;margin-bottom:3px;margin-left:10px"><?php echo $subject;?><?php //echo anchor('project_detail/'.$project_basic_info['project_id'], $subject, 'style="text-decoration:none;color:black"');?></div><!--專案標題-->	
		<div style="float:left">
		<input class="timeline_btn" type="button" value="新增"></input>
			<ul class="timeline_menu">
				<li class="menu_01"><?php echo anchor('project_record_create/'. $project_basic_info['project_id'], '專案記錄', 'title="編輯專案記錄"');?></li>
				
				<li class="menu_01"><?php echo anchor('project_minutes_create/'. $project_basic_info['project_id'], '會議記錄', 'title="新增會議記錄"')?></li>
			</ul>
		</div>		
		<div style="clear:left;font-size:14pt;margin-top:5px;margin-bottom:3px;line-height:25px;font-size:14pt;margin-left:11px;">
		<label style="margin-bottom:50px">專案紀錄</label><br/>		
		<?php 
		$i = 1;
		if(!empty($project_records))  //產生節點
		{					
			foreach($project_records as $project_record)
			{			
				echo "&nbsp;";
				if(!empty($record) && $record['id'] == $project_record['id'])
				{					
					if($project_record['class'] == 1)
					{
						echo anchor('project_record/'. $project_record['id'], '● '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' ('.$project_record['phase'].')', 'style="font-size:13pt;color:#E60D15;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
					else if($project_record['class'] == 2)
					{
						echo anchor('project_minutes/'. $project_record['id'], '○ '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' (會議)', 'style="font-size:13pt;color:#E60D15;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
				}
				else
				{
					if($project_record['class'] == 1)
					{
						echo anchor('project_record/'. $project_record['id'], '● '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' ('.$project_record['phase'].')', 'style="font-size:13pt;color:#000000;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
					else if($project_record['class'] == 2)
					{
						echo anchor('project_minutes/'. $project_record['id'], '○ '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' (會議)', 'style="font-size:13pt;color:#000000;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
				}
				//讓節點8個排在一行
				if($i%7 == 0)
				{
					echo '<br/>';
				}
				$i++;
				?>
			<?php
			}						
		}
		else
		{
			echo "目前尚無任何專案紀錄。";
		}
		?>
		</div>		
	</div>