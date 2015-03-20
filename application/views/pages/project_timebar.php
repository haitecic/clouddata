    <!-- Begin page content -->
	<style type="text/css">	
	a.node:hover, a.node:active {/*font-size: 110%;*/}
	</style>
	<div class="container">
		<div class="page-header" style="margin-top:-15">
			<br/>
			<h2><?php echo anchor('project_detail/'.$project_basic_info['project_id'], $subject, 'style="text-decoration:none;color:black"');?></h2><!--標題區域-->
		</div>
		<div style="min-height:50px;padding-top:10px;border:#AEA9B1 1px solid;font-size:14pt"><!--background-color:#E6EED5"-->
		<div style="float:left;font-size:14pt;">&nbsp;&nbsp;專案紀錄：&nbsp;&nbsp;&nbsp;</div>
		<div style="float:left">  
		
		<?php 				
		if(!empty($project_records))  //產生節點
		{					
			foreach($project_records as $project_record)
			{
				?>
				<div style="float:left; width:200px;">
				<?php
				echo "&nbsp;";
				if(!empty($record) && $record['id'] == $project_record['id'])
				{
					if($project_record['class'] == 1)
					{
						echo anchor('project_record/'. $project_record['id'], '● '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' ('.$project_record['phase'].')', 'style="color:#E60D15;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
					else if($project_record['class'] == 2)
					{
						echo anchor('project_minutes/'. $project_record['id'], '○ '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' (會議)', 'style="color:#E60D15;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
				}
				else
				{
					if($project_record['class'] == 1)
					{
						echo anchor('project_record/'. $project_record['id'], '● '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' ('.$project_record['phase'].')', 'style="color:#000000;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
					else if($project_record['class'] == 2)
					{
						echo anchor('project_minutes/'. $project_record['id'], '○ '.date('Y-m-d' ,strtotime($project_record['create_datetime'])).' (會議)', 'style="color:#000000;text-decoration: none;" class="node" title="'. $project_record['create_datetime'].'"');
					}
				}
				?>
				</div>
			<?php
			}
		}
		else
		{
			echo "目前尚無任何專案紀錄。";
		}
		?>
		</div>
		<div style="text-align:right;padding-right:5px">
		<?php
		echo anchor('project_minutes_create/'. $project_basic_info['project_id'], '+會議記錄', 'title="編輯會議記錄" style="text-align:right;color:#344FA6"').'<br/>';
		echo anchor('project_record_create/'. $project_basic_info['project_id'], '+專案記錄', 'title="編輯專案記錄" style="text-align:right;color:#344FA6"');
		?>
		</div>
		</div>
		<br/>