<!--Start Container-->
<div id="main" class="container-fluid" style="background-color:#FBFBF0">
	<div class="row">
		<div class="col-xs-12 col-sm-12" style="background-color:#ffffff; height:30px;background-color:#FBFBF0;"></div>
		<div style="padding-left:24px"><span style="font-size:21pt;">專案資料</span><span style="font-size:14pt">( <span style="color:red">*</span> 為必填欄位 )</span></div>
		<br/>
		<?php
//        for ($i=0;$i<count($project_img) ;$i++)
//		    {
//			echo "<img src='" . site_url() . "application/assets/data_img/" . $project_img[$i]['name'] . "' >";
//			echo "<br>";
//			
//			}
        		
		?>
		<!--<img src="<?php echo site_url()?>application/assets/data_img/<?php echo $project_img['name']?>" >-->
		<!--<div class="btn btn-primary qq-upload-button" style="border-color:#6483E4;background-color:#6483E4;width: auto;text-align:right;float:left;margin-left:50px;margin-top:-40px;margin-bottom:10px;"><!--;right:575-->
			<!--<div id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i> 資料送出</div>-->
			<!--<div id="list_project_button" onclick="list_project()" style="font-family: Adobe 繁黑體 Std; font-size:16px;"><i></i>專案列表</div>-->
		<!--</div>-->
		<?php
		echo validation_errors();
		$attributes = array('class' => 'form-horizontal', 'role'=>'form', 'id' => 'project_create_form', 'name'=>'project_create_form');
		echo form_open('project_edit/'. $project_basic_info['id'], $attributes);
		        for ($i=0;$i<count($project_img) ;$i++)
		    {
			echo "<label class='col-sm-1  col-sm-offset-1 control-label'><img src='" . site_url() . "application/assets/data_img/" . $project_img[$i]['name'] . "' ></label>";
			echo "<div class='col-xs-12 col-sm-12' style='height:5px; '></div>";
			echo "<div style='float:left;margin-left:130px; font-size:17px;'>" . $project_img[$i]['description'] . "</div>";
			echo "<div class='col-xs-12 col-sm-12' style='height:5px; '></div>";
			}
		?>	
			
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>專案主題</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['idea_name'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="project_name" name="project_name" placeholder="" data-toggle="tooltip" data-placement="bottom" title="專案主題" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>情境說明</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['scenario_d'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>功能構想</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['function_d'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>差異化</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['distinction_d'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>價值性</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['value_d'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>可行性</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['feasibility_d'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>			
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案編號</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['idea_id']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" placeholder="創意提案編號" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>km文件編號</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['km_id']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" placeholder="創意提案編號" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>市場搜尋</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['market_survey']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>km平台搜尋</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['km_survey']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control"  data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>研發項目確認</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['dep_item']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案年份</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['year'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_year_border_display(this)" onblur="change_year_border_display_onblur(this,event)" class="form-control" id="year" name="year" placeholder="請輸入西元年(例如:2015)" data-toggle="tooltip" data-placement="bottom" title="提案年份" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案單位</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['proposed_unit'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="haitec_unit" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="華創單位" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個單位請以分號(;)區隔">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案人</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['proposer'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="proposer" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="提案人" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個提案人請以分號(;)區隔">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案來源</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['idea_source'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="idea_source" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="提案來源" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案說明</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['idea_description'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="idea_source" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="提案說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案類別</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['inner_or_outer'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="idea_source" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="提案類別" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>階段狀態</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['stage'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="stage" name="stage" data-toggle="tooltip" data-placement="bottom" title="階段狀態" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>階段細項狀態</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['stage_detail'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="stage_detail" name="stage_detail" data-toggle="tooltip" data-placement="bottom" title="階段細項狀態" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>進度說明</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['progress_description'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="progress_description" name="progress_description" data-toggle="tooltip" data-placement="bottom" title="進度說明" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案日期</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['proposed_date'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="proposed_date" name="proposed_date" data-toggle="tooltip" data-placement="bottom" title="提案日期" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>有效提案</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['valid_project'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="valid_project" name="valid_project" data-toggle="tooltip" data-placement="bottom" title="有效提案" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>立案日期</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['established_date'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="established_date" name="established_date" data-toggle="tooltip" data-placement="bottom" title="立案日期" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>協辦單位</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['joint_unit'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="joint_unit" name="joint_unit" data-toggle="tooltip" data-placement="bottom" title="協辦單位" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>協辦窗口</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['joint_person'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="joint_person" name="joint_person" data-toggle="tooltip" data-placement="bottom" title="協辦窗口" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>承作廠商</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['co_worker'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="co_worker" name="co_worker" data-toggle="tooltip" data-placement="bottom" title="承作廠商" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案審核進度</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['idea_examination'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="idea_examination" name="idea_examination" data-toggle="tooltip" data-placement="bottom" title="提案審核進度" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>Idea</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['Idea'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="idea" name="idea" data-toggle="tooltip" data-placement="bottom" title="idea" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>Requirement</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['Requirement'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="Requirement" name="Requirement" data-toggle="tooltip" data-placement="bottom" title="idea" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>Feasibility</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['Feasibility'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="Feasibility" name="Feasibility" data-toggle="tooltip" data-placement="bottom" title="Feasibility" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>Prototype</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['Prototype'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="Prototype" name="Prototype" data-toggle="tooltip" data-placement="bottom" title="Prototype" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>備註</label>
			<div class="col-sm-10">
				<input readonly type="text" value="<?php echo $project_basic_info['note'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="note" name="note" data-toggle="tooltip" data-placement="bottom" title="備註" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>導入車型</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['adoption'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="adoption" name="adoption" data-toggle="tooltip" data-placement="bottom" title="導入車型" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>專利申請</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['applied_patent'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="applied_patent" name="applied_patent" data-toggle="tooltip" data-placement="bottom" title="專利申請" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>具備敗部復活申請資格</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['resurrection_application_qualified'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="resurrection_application_qualified" name="resurrection_application_qualified" data-toggle="tooltip" data-placement="bottom" title="具備敗部復活申請資格" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>敗部復活申請與否</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['resurrection_applied'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="resurrection_applied" name="resurrection_applied" data-toggle="tooltip" data-placement="bottom" title="敗部復活申請與否" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>創意中心窗口</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['PM_in_charge'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="PM_in_charge" name="PM_in_charge" data-toggle="tooltip" data-placement="bottom" title="創意中心窗口" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<div class="col-xs-12 col-sm-12" style="height:5px; "></div>
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>結案</label>
			<div class="col-sm-4">
				<input readonly type="text" value="<?php echo $project_basic_info['closed_case'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="closed_case" name="closed_case" data-toggle="tooltip" data-placement="bottom" title="結案" style="font-size:17px; font-family:微軟正黑體;">  
			</div>
			<!--<div class="form-group">	
				<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>專案主題</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['idea_name'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="project_name" name="project_name" placeholder="" data-toggle="tooltip" data-placement="bottom" title="專案主題" style="font-size:17px; font-family:微軟正黑體;">  
				</div>					
				<label class="col-sm-1  control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案編號</label>
				<div class="col-sm-2">
					<input type="text" value="<?php echo $project_basic_info['idea_id']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" placeholder="創意提案編號" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
				</div>
				<label class="col-sm-1  control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案年份</label>
				<div class="col-sm-2">
					<input type="text" value="<?php echo $project_basic_info['year'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_year_border_display(this)" onblur="change_year_border_display_onblur(this,event)" class="form-control" id="year" name="year" placeholder="請輸入西元年(例如:2015)" data-toggle="tooltip" data-placement="bottom" title="專案年份" style="width:85px;font-size:17px; font-family:微軟正黑體;">  
				</div>
			</div>			
			<div class="col-xs-12 col-sm-12" style="height:3px; "></div>--><!--background-color:#ffffff; -->
			<!--<div class="form-group">	
				<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案單位</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['proposed_unit'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="haitec_unit" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="華創單位" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個單位請以分號(;)區隔">  
				</div>
				<label class="col-sm-1  control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>提案人</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['proposer'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="haitec_unit" name="haitec_unit" data-toggle="tooltip" data-placement="bottom" title="華創單位" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個單位請以分號(;)區隔">  
				</div>	
			</div>
			<div class="col-xs-12 col-sm-12" style="height:3px; "></div>-->
			<!--<div class="form-group">	
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>創意中心負責人</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['PM_in_charge'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="PM_in_charge" name="PM_in_charge" data-toggle="tooltip" data-placement="bottom" title="創意中心負責人" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個負責人請以分號(;)區隔">  
				</div>
				<label class="col-sm-2  control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="margin-left:-25px;color:red;font-size:13pt">* </span>提案類別</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['inner_or_outer'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="inner_or_outer" name="inner_or_outer" data-toggle="tooltip" data-placement="bottom" title="提案類別" style="font-size:17px; font-family:微軟正黑體;" placeholder="內部提案or外部提案">  
				</div>
			</div>
			<div class="col-xs-12 col-sm-12" style="height:3px; "></div>-->
			<!--<div class="form-group">	
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>階段狀態</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['PM_in_charge'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="PM_in_charge" name="PM_in_charge" data-toggle="tooltip" data-placement="bottom" title="創意中心負責人" style="font-size:17px; font-family:微軟正黑體;" placeholder="多個負責人請以分號(;)區隔">  
				</div>
				<label class="col-sm-1  control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>階段細項狀態</label>
				<div class="col-sm-4">
					<input type="text" value="<?php echo $project_basic_info['inner_or_outer'];?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" class="form-control" id="inner_or_outer" name="inner_or_outer" data-toggle="tooltip" data-placement="bottom" title="提案類別" style="font-size:17px; font-family:微軟正黑體;" placeholder="內部提案or外部提案">  
				</div>
			</div>
			<div class="col-xs-12 col-sm-12" style="height:3px; "></div>-->
			<!--<div class="row form-group">	
				<label class="col-sm-2 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>納入車型評估</label>
				<div class="col-sm-3">
					<div class="radio-inline">
						<label>
							<input type="radio" value="1" name="car_model_estimate" <?php //if($project_basic_info['car_model_estimate'] == 1){echo " checked";}?>>是
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input type="radio" value="2" name="car_model_estimate"	<?php //if($project_basic_info['car_model_estimate'] == 2){echo " checked";}?>>否
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
				</div>	
				<label class="col-sm-2   control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>完成試作供覽</label>
				<div class="col-sm-4">
					<div class="radio-inline">
						<label>
							<input type="radio" value="1" name="exhibition" <?php //if($project_basic_info['exhibition'] == 1){echo " checked";}?>>是
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input  type="radio" value="2" name="exhibition" <?php //if($project_basic_info['exhibition'] == 2){echo " checked";}?>>否
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
				</div>	
			</div>
			-->
			<!--<div class="row form-group">	
				<label class="col-sm-2   control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>狀態</label>
				<div class="col-sm-4">
					<div class="radio-inline">
						<label>
							<input type="radio" name="status" value="1" <?php //if($project_basic_info['status'] == 1){echo " checked";}?>>執行中
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
					<div class="radio-inline">
						<label>
							<input  type="radio" name="status" value="2" <?php //if($project_basic_info['status'] == 2){echo " checked";}?>>結案
							<i class="fa fa-circle-o"></i>
						</label>
					</div>
				</div>	
			</div>-->			
			<div class="form-group">	
				<!--<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt">* </span>關鍵字</label>
				<div class="col-sm-2">
					<input type="text" value="<?php //echo $project_basic_info['keyword']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="keyword" name="keyword" class="form-control" placeholder="關鍵字請以分號(;)區隔" data-toggle="tooltip" data-placement="bottom" title="專案主題" style="width:900px;font-size:17px; font-family:微軟正黑體;">  
				</div>	-->			
			</div>			
			
		<!--</form>-->	

		<!--<div class="col-xs-12 col-sm-12" style="background-color:#ffffff; height:20px;"></div>-->

		<!--Start Content-->
		<!--<div id="content" class="col-xs-12 col-sm-12">-->
			<!--<div id="about">
				<div class="about-inner">
					<h4 class="page-header">Open-source admin theme for you</h4>
					<p>DevOOPS team</p>
					<p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
					<p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
					<p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
					<p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
				</div>
			</div>-->
			<!--<div class="preloader">
				<img src="<?php echo $img_location?>/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>			-->
			<!--<div id="ajax-content"></div>--> <!-- 載入重要資料!!! -->
			<input id="file_input" style="display:none" onchange="browse_upload()" type="file" name="my_file[]" multiple>
			<div style="margin-left:15px" id="dragandrophandler">Drag & Drop Files Here(or <a href="#" id="browse_file" onclick="browse_file()">Browse</a> Files.)</div>
			<div id="file_list" class="statusbar" style="width:1300px;margin-left:15px;padding-bottom:10px">
				<span class="filename" style="text-align:center;width:500px">檔案名稱</span>
				<span class="filesize" style="padding-left:30px;width:150px;">檔案大小</span>
				<span align="center" style="padding-left:75px;width:200px;">上傳進度</span>
				<span align="center" style="padding-left:200px;text-align:center;width:100px;">上傳時間</span>
			</div>
			<?php	
			$i=0;			
			foreach($project_attachfile as $file)
			{
			?>
				<div id="origin_file_<?php echo $i;?>" class="statusbar" style="width:1300px;margin-left:15px;">
					<div class="filename" style="width:500px"><?php echo $file['file_name'];?></div>
					<div class="filesize" style="padding-left:30px;width:150px"><?php
						$size = filesize('application/assets/project_attachment/'.$project_basic_info['id'].'/'.$file['instance_file_name']);
						$sizeKB = $size/1024;
						if($sizeKB > 1024)
						{
							$sizeMB = $sizeKB/1024;
							$sizeStr = number_format($sizeMB, 2)." MB";
						}
						else
						{
							$sizeStr = number_format($sizeKB, 2)." KB";
						}
						echo $sizeStr;
						?>
					</div>
					<div class="progressBar" style="margin-left:10px;width:200px;background-color:#0BA1B5"><div style="padding-left:160px;text-align:right">100%</div></div>
					<span style="margin-left:75px;width:100px"><?php echo $file['create_time'];?></span>
					<div id="file_<?php echo $i;?>" style="margin-left:100px" class="abort" onclick="delete_file(<?php echo $i;?>)" style='margin-left:50px'>Delete</div>
					<input type="hidden" id="file_id_<?php echo $i;?>" name="file_id" value="<?php echo $file['instance_file_name'];?>"/>
				</div>
			<?php
				$i++;
			}
			?>
			<div id="status1"></div>
			<input type="hidden" id="file_count" name="file_count" value="0"></input> <!--計算上傳的檔案數量-->
			<input type="hidden" id="file_number" name="file_number" value="0"></input> <!--計算上傳的檔案編號-->
			<input type="hidden" id="file_success_upload_count" name="file_success_upload_count" value="0"></input> <!--計算上傳成功的檔案數量-->
			<input type="hidden" id="delete_file_count" name="delete_file_count" value="0"></input> <!--原本上傳之檔案被刪除的數量-->
			<input type="hidden" id="upload_file_dir" name="upload_file_dir"></input> <!--伺服器暫存使用者上傳檔案的資料夾-->
			<div class="btn btn-primary qq-upload-button" style="width: auto;align:center"><!--;right:575-->
				<!--<div id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i> 資料送出</div>-->
				<div type="submit" id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i>資料送出</div>
			</div>			
		</form>
		</div>	
		<br/>
		<!--End Content-->
	</div>
</div>
<script>
/*
var has_sent = false;  //紀錄是否曾經送出表單過
function change_border_display(object)
{
	if(object.value != "")
	{
		object.style.borderColor = "#CCCCCC";
	}
	else if(object.value == "")
	{
		if(has_sent == true)
		{
			object.style.borderColor = "red";
		}
	}
}
function change_border_display_onfocus(object)
{
	object.style.borderColor = "#CCCCCC";
}
function change_border_display_onblur(object)
{
	if(has_sent == true && object.value == "")
	{
		object.style.borderColor = "red";
	}
}
function change_year_border_display_onblur(object, event)
{
	var year = object.value;
	if(year != "")
	{
		object.style.borderColor = "#CCCCCC";
		var text = /^[0-9]+$/;	
		if ((!text.test(year)) || year.length != 4) 
		{
			alert("「專案年份」欄位格式輸入錯誤!須輸入有效西元年(如:2015)");
			document.getElementById("year").style.borderColor = "red";
			return ;
		}	
		var current_year = new Date().getFullYear();
		if((year < 2005) || (year > current_year))
		{
			alert("「專案年份」須介於2005年至"+current_year+"年");
			document.getElementById("year").style.borderColor = "red";
			return ;
		}		
	}
	else if(year == "")
	{
		if(has_sent == true)
		{
			object.style.borderColor = "red";
		}
	}
}*/

//If the files are dropped outside the div, file is opened in the browser window. To avoid that we can prevent ‘drop’ event on document.
$(document).ready(function()
{		
	var upload_file_dir = Date.now();
	document.getElementById("upload_file_dir").value = upload_file_dir;
	var obj = $("#dragandrophandler");
	var file_list = $("#file_list");	
	$("#sub_button").click(function () {  //按下資料送出的處理函數
		/*
		Validation Field
		Validate Item：(1)各欄位的值不為空且不能只是空白或其他特殊字元，(2)年份值合理，(3)有夾帶檔案
		*/
		/*
		var pass_validation = true;
		var validation_message = "表單未送出，原因如下：\n";		
		var project_name =  document.getElementById("project_name").value;
		var year = document.getElementById("year").value;
		var haitec_unit = document.getElementById("haitec_unit").value;
		var outer_unit = document.getElementById("outer_unit").value;
		var pm = document.getElementById("pm").value;				
		var keyword = document.getElementById("keyword").value;
		var idea_id = document.getElementById("idea_id").value;
		//將輸入框恢復至本來的顏色
		document.getElementById("project_name").style.borderColor = "#CCCCCC";
		document.getElementById("year").style.borderColor = "#CCCCCC";
		document.getElementById("haitec_unit").style.borderColor = "#CCCCCC";
		document.getElementById("outer_unit").style.borderColor = "#CCCCCC";
		document.getElementById("pm").style.borderColor = "#CCCCCC";
		document.getElementById("keyword").style.borderColor = "#CCCCCC";
		document.getElementById("idea_id").style.borderColor = "#CCCCCC";
		//以陣列取代
		if(project_name == "" || project_name == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「專案主題」未填寫\n";
			document.getElementById("project_name").style.borderColor = "red";  //標記未填寫之輸入欄位
		}
		var text = /^[0-9]+$/;
		var current_year = new Date().getFullYear();
		if(year == "" || year == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「專案年份」未填寫\n";
			document.getElementById("year").style.borderColor = "red";
		}
		else if((!text.test(year)) || year.length != 4)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「專案年份」欄位格式輸入錯誤!須輸入有效西元年(如:2015)\n";
			document.getElementById("year").style.borderColor = "red";
		}
		else if((year < 2005) || (year > current_year))
		{
			pass_validation = false;
			validation_message = validation_message+"● 「專案年份」須介於2005年至"+current_year+"年\n";
			document.getElementById("year").style.borderColor = "red";
		}
		if(haitec_unit == "" || haitec_unit == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「華創單位」未填寫\n";
			document.getElementById("haitec_unit").style.borderColor = "red";
		}
		if(outer_unit == "" || outer_unit == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「外部單位」未填寫\n";
			document.getElementById("outer_unit").style.borderColor = "red";
		}
		if(pm == "" || pm == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「創意中心負責人」未填寫\n";
			document.getElementById("pm").style.borderColor = "red";
		}
		if(keyword == "" || keyword == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「關鍵子」未填寫\n";
			document.getElementById("keyword").style.borderColor = "red";
		}
		if(idea_id == "" || idea_id == null)
		{
			pass_validation = false;
			validation_message = validation_message+"● 「提案編號」未填寫\n";
			document.getElementById("idea_id").style.borderColor = "red";
		}
		//判斷是否有上傳檔案
		if(document.getElementById("file_count").value == 0 && document.getElementById("delete_file_count").value == <?php echo count($project_attachfile) ?>)
		{
			pass_validation = false;
			validation_message = validation_message+"● 未上傳任何附加檔案\n";
			document.getElementById("dragandrophandler").style.borderColor = "red";
		}	
		else
		{
			var k;
			for(k=0;k < document.getElementById("file_number").value;k++)
			{				
				var myElem = document.getElementById('is_send_'+ k);				
				if (myElem == null)
				{								
					continue;
				}
				else  //當有此元素存在
				{  					
					if(document.getElementById('is_send_'+ k).innerHTML == "false")
					{						
						pass_validation = false;
						validation_message = validation_message+"● 附加檔案未上傳完成，請等待上傳完成後，再將資料送出。\n";
						break;
					}
				}
			}			
		}		
		has_sent = true;  //標記曾試圖送出表單，但未通過欄位驗證		
		if(pass_validation == false)
		{
			alert(validation_message);			
		}		
		else if(pass_validation == true)
		{	*/		
			document.getElementById("project_create_form").submit();			
		/*}*/
    });
	/**
	使用者點選瀏覽檔案「Browse」按鈕上傳檔案
	*/	
	var browse_file = $("#browse_file");
	var file_input = $("#file_input");	
	browse_file.on('click', function (e)  //設定當拖曳檔案進來時,對應的處理函數
	{
		e.stopPropagation();
		e.preventDefault();
		$("#file_input").trigger('click');		
	}); 
	
	file_input.on('change', function (e)  //設定當拖曳檔案進來時,對應的處理函數
	{
		// fileInput is an HTML input element: <input type="file" id="myfileinput" multiple>
		var fileInput = document.getElementById("file_input");
		// files is a FileList object (similar to NodeList)
		var files = fileInput.files;
		handleFileUpload(files, file_list, upload_file_dir);		
	});
	
	obj.on('dragenter', function (e)  //設定當拖曳檔案進來時,對應的處理函數
	{
		e.stopPropagation();
		e.preventDefault();
		$(this).css('border', '2px solid #0B85A1');
	});  
	obj.on('dragover', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});
	
	obj.on('drop', function (e) 
	{
 
		$(this).css('border', '2px dotted #0B85A1');
		e.preventDefault();
		var files = e.originalEvent.dataTransfer.files;  //取得drop的檔案		
		//We need to send dropped files to Server
		//handleFileUpload(files, obj, upload_file_dir);
		handleFileUpload(files, file_list, upload_file_dir);		
	});
	$(document).on('dragenter', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});
	$(document).on('dragover', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
		obj.css('border', '2px dotted #0B85A1');
	});
	$(document).on('drop', function (e) 
	{
		e.stopPropagation();
		e.preventDefault();
	});		
});
var delete_file_id = 0;  //記錄刪除的檔案數量
function delete_file(id)
{
	//在表單中記錄要刪除的檔案編號
	var input_file = document.createElement("input");
	input_file.setAttribute("type", "hidden");
	input_file.setAttribute("id", "delete_file_"+delete_file_id);
	input_file.setAttribute("name", "delete_file_"+delete_file_id);
	input_file.setAttribute("value", document.getElementById("file_id_"+id).value);
	//append to form element that you want .
	document.getElementById("project_create_form").appendChild(input_file);	
	delete_file_id++;
	document.getElementById("origin_file_"+id).style.display = "none";	
	document.getElementById("delete_file_count").value = parseInt(document.getElementById("delete_file_count").value) + 1;	
}

//1.Read the file contents using HTML5 FormData() when the files are dropped.
var fd = new FormData('project_create_form');
//var status_arr = []; 
function handleFileUpload(files, obj, upload_file_dir)  //第一個參數為拖曳的檔案; 第二個參數為拖曳檔案放置的方框區塊物件
{
	for (var i = 0; i < files.length; i++)  //處理使用者一次拖曳的一個或多個檔案
	{
        fd.append('file', files[i]);
		fd.append('upload_file_dir', upload_file_dir);
		//在表單中記錄上傳的檔案名稱
		var input_file = document.createElement("input");
		input_file.setAttribute("type", "hidden");
		input_file.setAttribute("id", "upload_file_"+rowCount);
		input_file.setAttribute("name", "upload_file_"+rowCount);
		input_file.setAttribute("value", files[i].name);
		//append to form element that you want .
		document.getElementById("project_create_form").appendChild(input_file);	
		//alert(document.getElementById("upload_file_"+rowCount).value+' '+rowCount);		
		var status = new createStatusbar(obj);  //Using this we can set progress.
        status.setFileInfo(files[i].name, files[i].size, files[i].type);
		//status_arr.push(status);
        sendFileToServer(fd, status);
	}
}
//2.Using this we can set progress.
var rowCount=0;
function createStatusbar(obj)
{
	var file_count = document.getElementById("file_count").value;
	document.getElementById("file_count").value = parseInt(file_count)+1;
	var file_number = document.getElementById("file_number").value;
	document.getElementById("file_number").value = parseInt(file_number)+1;
    rowCount++;
	//判斷為偶數列或奇數列, 並給予對應的呈現樣式
    var row = "odd";
    if(rowCount % 2 == 0) row = "even";
   // this.statusbar = $("<div class='statusbar "+row+"' style='width:1000px;margin-left:15px'></div>");  //先產生一個狀態列(row)
	/*將檔案資訊呈現所需的空間依依加進狀態列中(由左至右依序為：檔案名稱、檔案大小、檔案進度條、「abort」按鈕)*/
    /*this.filename = $("<div class='filename' style='width:400px'></div>").appendTo(this.statusbar);
    this.size = $("<div class='filesize' style='width:200px'></div>").appendTo(this.statusbar);
    this.progressBar = $("<div class='progressBar' style='margin-left:12px;width:200px'><div></div></div>").appendTo(this.statusbar);
    this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:55px'>Delete</div>").appendTo(this.statusbar);
	this.is_send = $("<div id='is_send_"+(rowCount-1)+"' style='display:none'>false</div>").appendTo(this.statusbar);
	//this.is_send = $("<input type='hidden' id='is_send_"+(rowCount-1)+"' value='false'></input>").appendTo(this.statusbar);
    //this.file_number = $("<input type='hidden' name='file_number' value='"+(rowCount-1)+"'></input>").appendTo(this.statusbar);
	this.file_number = $("<div style='display:none'>"+(rowCount-1)+"</div>").appendTo(this.statusbar);*/
	this.statusbar = $("<div class='statusbar "+row+"' style='width:1300px;margin-left:15px'></div>");  //先產生一個狀態列(row)
	/*將檔案資訊呈現所需的空間依依加進狀態列中(由左至右依序為：檔案名稱、檔案大小、檔案進度條、「abort」按鈕)*/
    this.filename = $("<div class='filename' style='width:500px'></div>").appendTo(this.statusbar);
    this.size = $("<div class='filesize' style='margin-left:45px;width:128px'></div>").appendTo(this.statusbar);
    this.progressBar = $("<div class='progressBar' style='width:200px'><div></div></div>").appendTo(this.statusbar);
    this.create_time = $("<span style='padding-left:80px;width:150px'></span>").appendTo(this.statusbar);
	this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:102px'>Delete</div>").appendTo(this.statusbar);
	this.is_send = $("<div id='is_send_"+(rowCount-1)+"' style='display:none'>false</div>").appendTo(this.statusbar);
	this.file_number = $("<div style='display:none'>"+(rowCount-1)+"</div>").appendTo(this.statusbar);
	obj.after(this.statusbar);
	
	//在status區塊中顯示上傳檔案的檔名和大小
    this.setFileInfo = function(name, size, type)
    {
        var sizeStr = "";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
 
        this.filename.html(name);  //指定filename區塊的呈現內容
        this.size.html(sizeStr);  //指定size區塊的呈現內容
    }
    this.setProgress = function(progress)
    {       
        var progressBarWidth = progress * this.progressBar.width() / 100;  
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        /*if(parseInt(progress) >= 100)  //After the file uploaded successfully, the abort button would be disappeared 
        {
            this.abort.hide();
        }*/		
		if(parseInt(progress) == 100)
		{				
			this.is_send.html("true");  //標示此檔案已上傳完成
			var a = (new Date(new Date())).toUTCString();
			var date = new Date(Date.parse(a));
			var formatted = formatDate(date);
			this.create_time.html(formatted);
			//document.getElementById("file_success_upload_count").value = parseInt(document.getElementById("file_success_upload_count").value)+1;
		}	
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;		
		//alert(this.file_number.html());
        this.abort.click(function()
        {		
			var is_send = document.getElementById("is_send_"+this.id).innerHTML;			
			jqxhr.abort();			
			sb.hide();	
			var element = document.getElementById("is_send_"+this.id);
			element.parentNode.removeChild(element);
			var delete_file = document.getElementById( "upload_file_"+this.id );  //要被刪除的檔案
			delete_file.parentNode.removeChild( delete_file );	
			document.getElementById("file_count").value = parseInt(document.getElementById("file_count").value)-1;  //檔案數減一
			if(has_sent == true && document.getElementById("file_count").value == 0)
			{
				document.getElementById("dragandrophandler").style.borderColor = "red";
			}
			//document.getElementById("file_success_upload_count").value = parseInt(document.getElementById("file_success_upload_count").value)-1;
		});
    }
}
//3.Send FormData() to Server using jQuery AJAX API
function sendFileToServer(formData, status)
{	
	//var uploadURL = "http://10.204.96.250/project_manager/project_file_upload";
	//var uploadURL = "http://10.204.96.233/project_manager/project_file_upload";
	var uploadURL = "http://localhost/project_management/project_file_upload";
	//var uploadURL = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_manager/project_file_upload";
    var extraData ={};	//Extra Data.
    var jqXHR=$.ajax({  //Perform an asynchronous HTTP (Ajax) request.
        xhr: function() {
			var xhrobj = $.ajaxSettings.xhr();
			if (xhrobj.upload) 
			{
				xhrobj.upload.addEventListener('progress', function(event) {
					var percent = 0;
					var position = event.loaded || event.position;
					var total = event.total;
					if (event.lengthComputable) {
						percent = Math.ceil(position / total * 100);
					}					
					//Set progress					
					status.setProgress(percent);	
					
				}, false);
			}
			return xhrobj;
		},
		url: uploadURL,  //A string containing the URL to which the request is sent. 
		type: "POST",
		contentType:false,
		processData: false,  //processed and transformed the data ,which you set in the data option below, will be transform into a query string. Here set false to prevent the default behavior acting.
        cache: false,
        data: formData,  //Data to be sent to the server.
        success: function(data){  //A function to be called if the request succeeds.
			
		   //status.setProgress(100);
            //$("#status1").append("File upload Done<br>"); 						
        }
    });
    status.setAbort(jqXHR);
}

function list_project()
{	
	location.href = 'project_list';	
}

//Formats d to MM/dd/yyyy HH:mm:ss format
function formatDate(d){
  function addZero(n){
     return n < 10 ? '0' + n : '' + n;
  }

    return d.getFullYear()+"-"+ addZero(d.getMonth()+1) + "-" + addZero(d.getDate()) + " " + 
           addZero(d.getHours()) + ":" + addZero(d.getMinutes()) + ":" + addZero(d.getMinutes());
}
</script>
