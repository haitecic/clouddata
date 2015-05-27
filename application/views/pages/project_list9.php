<?php 
$column_mapping = array("null"=>"不顯示","idea_id"=>"提案編號", "year"=>"年度", "idea_name"=>"提案名稱", "idea_source"=>"提案來源", "scenario_d"=>"情境說明", "function_d"=>"功能構想", "distinction_d"=>"差異化", "value_d"=>"價值性", "feasibility_d"=>"可行性", "stage"=>"階段狀態", "progress_description"=>"進度說明", "proposed_unit"=>"提案單位", "proposer"=>"提案人", "established_date"=>"立案日期",  "idea_examination"=>"提案審核履歷", "Idea"=>"I階段文件檢核", "Requirement"=>"R階段文件檢核", "Feasibility"=>"F階段文件檢核", "Prototype"=>"P階段文件檢核", "note"=>"備註", "adoption"=>"導入車型/先期式樣", "applied_patent"=>"專利申請/取得", "resurrection_application_qualified"=>"具備敗部復活申請資格", "resurrection_applied"=>"敗部復活申請", "PM_in_charge"=>"創意中心窗口", "closed_case"=>"結案");
$news_column_mapping = array("null"=>"不顯示", "title"=>"標題", "category"=>"類別", "description"=>"內容摘要", "pub_date"=>"發布日期");
$manager_opinion_column_mapping = array("null"=>"不顯示", "topic"=>"討論議題", "content"=>"內容", "in_charge"=>"主辦(承辦)", "time"=>"時間", "people"=>"與會人員");
?>
<div id="main" class="container-fluid" style="background-color:#FBFBF0;font-color:#635F5F;font-family: Adobe 繁黑體 Std;"><!--8E8D93-->
	<div class="row">
		<div class="col-xs-12" style="margin-top:10px;border:1px #ccc solid;margin-left:8px;margin-right:8px;width:99%">
			<div class="box-header" style="margin-left:-15px;margin-right:-15px;padding-top:7px;height:40px;font-size:14pt">
				<div class="box-name" style="color:#3A5D91">
					<!--<i class="fa fa-linux"></i>-->
					<span>專案資料</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="project_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="project_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:none"><!---->
				<!--<div id="column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1155px;top:-10px;z-index:50;width: auto;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>調整瀏覽項目</div>
				</div>-->
				<!--border-color:#C3DEB7;background-color:#C3DEB7;color:#821EC7 96BBDE-->
				<div id="column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="project_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;text-align:justify;/*text-justify:auto;word-wrap:break-word*/">
					<thead>
						<tr>
							<th id="project_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="project_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="pro_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column1']];?></span><select id="pro_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="project_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(1)" onmouseout="pro_hide_select_box(1)"><span id="pro_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column2']];?></span><span><select id="pro_col_select_box_1" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column2'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="project_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(2)" onmouseout="pro_hide_select_box(2)"><span id="pro_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column3']];?></span><span><select id="pro_col_select_box_2" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column3'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="project_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(3)" onmouseout="pro_hide_select_box(3)"><span id="pro_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column4']];?></span><span><select id="pro_col_select_box_3" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column4'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="project_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(4)" onmouseout="pro_hide_select_box(4)"><span id="pro_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column5']];?></span><span><select id="pro_col_select_box_4" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column5'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="project_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="pro_show_select_box(5)" onmouseout="pro_hide_select_box(5)"><span id="pro_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column6']];?></span><span><select id="pro_col_select_box_5" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column6'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="project_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="pro_show_select_box(6)" onmouseout="pro_hide_select_box(6)"><span id="pro_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$project_column_setting['column7']];?></span><span><select id="pro_col_select_box_6" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($project_column_setting['column7'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th id="project_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="project_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column1']];?></th>
							<th id="project_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column2']];?></th>
							<th id="project_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column3']];?></th>
							<th id="project_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column4']];?></th>
							<th id="project_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column5']];?></th>
							<th id="project_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column6']];?></th>
							<th id="project_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$project_column_setting['column7']];?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>		
	</div>	
	<div id="news" class="row">
		<div class="col-xs-12" style="margin-top:10px;border:1px #ccc solid;margin-left:8px;margin-right:8px;width:99%">
			<div class="box-header" style="margin-left:-15px;margin-right:-15px;padding-top:7px;height:40px;font-size:14pt">
				<div class="box-name" style="color:#3A5D91">
					<span>News</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="news_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="news_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block;display:none">
				<div id="news_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="news_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="news_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="news_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="news_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $news_column_mapping[$news_column_setting['column1']];?></span><select id="news_col_select_box_0" style="display:none"><option value="title" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="news_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(1)" onmouseout="news_hide_select_box(1)"><span id="news_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $news_column_mapping[$news_column_setting['column2']];?></span><span><select id="news_col_select_box_1" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column2'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(2)" onmouseout="news_hide_select_box(2)"><span id="news_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $news_column_mapping[$news_column_setting['column3']];?></span><span><select id="news_col_select_box_2" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column3'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(3)" onmouseout="news_hide_select_box(3)"><span id="news_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $news_column_mapping[$news_column_setting['column4']];?></span><span><select id="news_col_select_box_3" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column4'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<!--<th id="news_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(4)" onmouseout="news_hide_select_box(4)"><span id="news_col_plain_text_4" style="margin:0px auto -21px;"><?php //echo $news_column_mapping[$news_column_setting['column5']];?></span><span><select id="news_col_select_box_4" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php //foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column5'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="news_show_select_box(5)" onmouseout="news_hide_select_box(5)"><span id="news_col_plain_text_5" style="margin:0px auto -21px;"><?php// echo $news_column_mapping[$news_column_setting['column6']];?></span><span><select id="news_col_select_box_5" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php //foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column6'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="news_show_select_box(6)" onmouseout="news_hide_select_box(6)"><span id="news_col_plain_text_6" style="margin:0px auto -21px;"><?php// echo $news_column_mapping[$news_column_setting['column7']];?></span><span><select id="news_col_select_box_6" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php //foreach($news_column_mapping as $index=>$value){ if($news_column_setting['column7'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>-->
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th id="news_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="news_list_foot0" style="text-align:center;font-weight:normal"><?php echo $news_column_mapping[$news_column_setting['column1']];?></th>
							<th id="news_list_foot1" style="text-align:center;font-weight:normal"><?php echo $news_column_mapping[$news_column_setting['column2']];?></th>
							<th id="news_list_foot2" style="text-align:center;font-weight:normal"><?php echo $news_column_mapping[$news_column_setting['column3']];?></th>
							<th id="news_list_foot3" style="text-align:center;font-weight:normal"><?php echo $news_column_mapping[$news_column_setting['column4']];?></th>
							<!--<th id="news_list_foot4" style="text-align:center;font-weight:normal"><?php //echo $news_column_mapping[$news_column_setting['column5']];?></th>
							<th id="news_list_foot5" style="text-align:center;font-weight:normal"><?php //echo $news_column_mapping[$news_column_setting['column6']];?></th>
							<th id="news_list_foot6" style="text-align:center;font-weight:normal"><?php //echo $news_column_mapping[$news_column_setting['column7']];?></th>-->
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<div id="external_tech" class="row">
		<div class="col-xs-12" style="margin-top:10px;border:1px #ccc solid;margin-left:8px;margin-right:8px;width:99%">
			<div class="box-header" style="margin-left:-15px;margin-right:-15px;padding-top:7px;height:40px;font-size:14pt">
				<div class="box-name" style="color:#3A5D91">
					<span>產學研技術</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="external_tech_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="external_tech_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block;display:none">
				<div id="external_tech_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="external_tech_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="external_tech_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="external_tech_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="external_tech_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column1']];?></span><select id="external_tech_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="external_tech_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(1)" onmouseout="external_tech_hide_select_box(1)"><span id="external_tech_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column2']];?></span><span><select id="external_tech_col_select_box_1" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column2'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(2)" onmouseout="external_tech_hide_select_box(2)"><span id="external_tech_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column3']];?></span><span><select id="external_tech_col_select_box_2" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column3'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(3)" onmouseout="external_tech_hide_select_box(3)"><span id="external_tech_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column4']];?></span><span><select id="external_tech_col_select_box_3" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column4'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(4)" onmouseout="external_tech_hide_select_box(4)"><span id="external_tech_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column5']];?></span><span><select id="external_tech_col_select_box_4" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column5'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="external_tech_show_select_box(5)" onmouseout="external_tech_hide_select_box(5)"><span id="external_tech_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column6']];?></span><span><select id="external_tech_col_select_box_5" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column6'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="external_tech_show_select_box(6)" onmouseout="external_tech_hide_select_box(6)"><span id="external_tech_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$external_tech_column_setting['column7']];?></span><span><select id="external_tech_col_select_box_6" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($external_tech_column_setting['column7'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>									
					<tfoot>
						<tr>
							<th id="external_tech_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="external_tech_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column1']];?></th>
							<th id="external_tech_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column2']];?></th>
							<th id="external_tech_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column3']];?></th>
							<th id="external_tech_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column4']];?></th>
							<th id="external_tech_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column5']];?></th>
							<th id="external_tech_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column6']];?></th>
							<th id="external_tech_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$external_tech_column_setting['column7']];?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<div id="manager_opinion" class="row">
		<div class="col-xs-12" style="margin-top:10px;border:1px #ccc solid;margin-left:8px;margin-right:8px;width:99%">
			<div class="box-header" style="margin-left:-15px;margin-right:-15px;padding-top:7px;height:40px;font-size:14pt">
				<div class="box-name" style="color:#3A5D91">
					<span>高階意見</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="manager_opinion_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="manager_opinion_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block;display:none">
				<div id="manager_opinion_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="manager_opinion_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="manager_opinion_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="manager_opinion_list_head0" style="text-align:center;font-weight:normal;width:15%;word-wrap:break-word"><span id="manager_opinion_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column1']];?></span><select id="manager_opinion_col_select_box_0" style="display:none"><option value="topic" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="manager_opinion_list_head1" style="text-align:center;font-weight:normal;width:43%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(1)" onmouseout="manager_opinion_hide_select_box(1)"><span id="manager_opinion_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column2']];?></span><span><select id="manager_opinion_col_select_box_1" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($manager_opinion_column_mapping as $index=>$value){ if($manager_opinion_column_setting['column1'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(2)" onmouseout="manager_opinion_hide_select_box(2)"><span id="manager_opinion_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column3']];?></span><span><select id="manager_opinion_col_select_box_2" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($manager_opinion_column_mapping as $index=>$value){ if($manager_opinion_column_setting['column2'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head3" style="text-align:center;font-weight:normal;width:10%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(3)" onmouseout="manager_opinion_hide_select_box(3)"><span id="manager_opinion_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column4']];?></span><span><select id="manager_opinion_col_select_box_3" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($manager_opinion_column_mapping as $index=>$value){ if($manager_opinion_column_setting['column3'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head4" style="text-align:center;font-weight:normal;width:15%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(4)" onmouseout="manager_opinion_hide_select_box(4)"><span id="manager_opinion_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column5']];?></span><span><select id="manager_opinion_col_select_box_4" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($manager_opinion_column_mapping as $index=>$value){ if($manager_opinion_column_setting['column4'] == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>				
					<tfoot>
						<tr>
							<th id="manager_opinion_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="manager_opinion_list_foot0" style="text-align:center;font-weight:normal"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column1']];?></th>
							<th id="manager_opinion_list_foot1" style="text-align:center;font-weight:normal"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column2']];?></th>
							<th id="manager_opinion_list_foot2" style="text-align:center;font-weight:normal"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column3']];?></th>
							<th id="manager_opinion_list_foot3" style="text-align:center;font-weight:normal"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column4']];?></th>
							<th id="manager_opinion_list_foot4" style="text-align:center;font-weight:normal"><?php echo $manager_opinion_column_mapping[$manager_opinion_column_setting['column5']];?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<br/>	
</div>
<div id="loading" class="loading" style="background-repeat: no-repeat; position:absolute;left:47%;top:45%;width:50%;height:200px;z-index:2000000"></div>
<div id="project_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100;display:none">
	<div style="text-align:center">
		<?php 		
		$title = array('1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六'); //$title存放select選單的名稱
		?>
		<select id="col_0" name="first" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{
		?>		
			<label for="col_<?php echo $i;?>"><?php echo $title[$i];?></label>
		<?php	
			$column = $project_column_setting['column'.($i+1)];  //資料庫的第一個欄位編號由1開始
		?>		
		<select id="col_<?php echo $i;?>" style="margin-bottom:10px">
			<option value="null" <?php if($column == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="year" <?php if($column == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($column == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($column == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($column == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($column == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($column == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($column == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($column == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($column == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($column == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($column == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($column == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($column == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($column == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($column == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($column == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($column == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($column == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($column == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($column == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($column == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($column == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($column == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($column == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($column == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($column == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_project_display_column_by_menu()">
	</div>	
</div>
<div id="news_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100;display:none"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<div style="text-align:center">
		<?php 		
		$title = array('1' => '欄位一', '2' => '欄位二', '3' => '欄位三'); //$title存放select選單的名稱
		?>
		<select id="news_col_0" style="display:none">
			<option value="title" selected></option>
		</select>
		<?php
		for ($i=1; $i < 4; $i++)
		{
		?>		
			<label for="news_col_<?php echo $i;?>"><?php echo $title[$i];?></label>
		<?php	
			$column = $news_column_setting['column'.($i+1)];  //資料庫的第一個欄位編號由1開始
		?>		
		<select id="news_col_<?php echo $i;?>" style="margin-bottom:10px;min-width:180px">
			<option value="null" <?php if($column == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="title" <?php if($column == "title"){ echo " selected";} ?>>標題</option>
			<option value="category" <?php if($column == "category"){ echo " selected";} ?> >類別</option>
			<option value="description" <?php if($column == "description"){ echo " selected";} ?> >內容摘要</option>
			<option value="pub_date" <?php if($column == "pub_date"){ echo " selected";} ?> >發布日期</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_news_display_column_by_menu()">
	</div>
</div>
<div id="external_tech_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100;display:none"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<div style="text-align:center">
		<?php 		
		$title = array('1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六'); //$title存放select選單的名稱
		?>
		<select id="external_tech_col_0" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{
		?>		
			<label for="external_tech_col_<?php echo $i;?>"><?php echo $title[$i];?></label>
		<?php	
			$column = $external_tech_column_setting['column'.($i+1)];  //資料庫的第一個欄位編號由1開始
		?>
		<select id="external_tech_col_<?php echo $i;?>" style="margin-bottom:10px;min-width:180px">
			<option value="null" <?php if($column == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="year" <?php if($column == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($column == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($column == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($column == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($column == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($column == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($column == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($column == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($column == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($column == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($column == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($column == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($column == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($column == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($column == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($column == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($column == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($column == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($column == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($column == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($column == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($column == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($column == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($column == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($column == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($column == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_external_tech_display_column_by_menu()">
	</div>
</div>
<div id="manager_opinion_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100;display:none"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<div style="text-align:center">
		<?php 		
		$title = array('1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四'); //$title存放select選單的名稱
		?>
		<select id="manager_opinion_col_0" style="display:none">
			<option value="topic" selected></option>
		</select>
		<?php
		for ($i=1; $i<=4; $i++)
		{
		?>		
			<label for="manager_opinion_col_<?php echo $i;?>"><?php echo $title[$i];?></label>
		<?php	
			$column = $manager_opinion_column_setting['column'.($i+1)];  //資料庫的第一個欄位編號由1開始
		?>
		<select id="manager_opinion_col_<?php echo $i;?>" style="margin-bottom:10px;min-width:180px">
			<option value="null" <?php if($column == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="content" <?php if($column == "content"){ echo " selected";} ?>>內容</option>
			<option value="in_charge" <?php if($column == "in_charge"){ echo " selected";} ?> >主擔(承辦)</option>
			<option value="time" <?php if($column == "time"){ echo " selected";} ?> >時間</option>
			<option value="people" <?php if($column == "people"){ echo " selected";} ?> >與會人員</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_manager_opinion_display_column_by_menu()">		
	</div>	
</div>
<span id="width_tmp" style="display:none"></span>
<!--PDF檔案預覽區塊-->
<div id="preview_pdf" class="preview_pdf">
	<object id="pdf_obj" data="" type="application/pdf" width="95%" height="95%">
		<p>Alternative text - include a link <a href="http://127.0.0.1/project_management/application/assets/project_attachment/<?php echo $project_basic_info['id']?>/<?php echo $file['instance_file_name']?>">to the PDF!</a></p>
	</object>
</div>
<div id="background_mask" class="background_mask" onclick="close_view_file(this.id)"></div>
<!--<div id="loading_background_mask" class="loading_background_mask"></div>-->

<script>
$(document).ready(function() {		
	$('th select').width(function(){ //設定各select box的初始寬度, 依據選擇的option
		$("#width_tmp").html($("option:selected", this).text());
		$(this).width($("#width_tmp").width()+38);
	});	
	var is_load = true;
	//var start_record = 0;var order_column = 1;var order_method = "asc";
	var project_start_record = "<?php echo $project_start_record;?>";
	var project_display_length = "<?php echo $project_display_length;?>";
	var project_order_column = "<?php echo $project_order_column;?>";
	var project_order_method = "<?php echo $project_order_method;?>";	
	var news_start_record = "<?php echo $news_start_record;?>";
	var news_display_length = "<?php echo $news_display_length;?>";
	var news_order_column = "<?php echo $news_order_column;?>";
	var news_order_method = "<?php echo $news_order_method;?>";	
	var external_tech_start_record = "<?php echo $external_tech_start_record;?>";
	var external_tech_display_length = "<?php echo $external_tech_display_length;?>";
	var external_tech_order_column = "<?php echo $external_tech_order_column;?>";
	var external_tech_order_method = "<?php echo $external_tech_order_method;?>";	
	var manager_opinion_start_record = "<?php echo $manager_opinion_start_record;?>";
	var manager_opinion_display_length = "<?php echo $manager_opinion_display_length;?>";
	var manager_opinion_order_column = "<?php echo $manager_opinion_order_column;?>";
	var manager_opinion_order_method = "<?php echo $manager_opinion_order_method;?>";	
	var project_display_columns = [];
	var news_display_columns = [];
	var external_tech_display_columns = [];
	var manager_opinion_display_columns = [];	
	var search_str = "<?php echo $search;?>";	
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/user_column_setting";
	var user_id = document.getElementById('user_id').value;
	$.ajax({
		url: request_url,  //The URL for the request
		data:{			 //The data to send(will be converted to a query string)
			"user_id": user_id
		},
		type:"POST",		 //Whether this is a POST or GET request(以POST或GET型態送出data屬性設定的資料)
		dataType:"json", //The type of data we expect back 回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		async:false,   //設定同步(false)與非同步請求(true)
		success:function(json){ 
			var i;
			for(i=0;i<4;i++)
			{
				switch(json.data[i].table_class)
				{
					case "1":
						project_display_columns = [json.data[i].column0, json.data[i].column1, json.data[i].column2, json.data[i].column3, json.data[i].column4, json.data[i].column5, json.data[i].column6];
						break;
					case "2":
						news_display_columns = [json.data[i].column0, json.data[i].column1, json.data[i].column2, json.data[i].column3];
						break;
					case "3":
						external_tech_display_columns = [json.data[i].column0, json.data[i].column1, json.data[i].column2, json.data[i].column3, json.data[i].column4, json.data[i].column5, json.data[i].column6];
						break;
					case "4":
						manager_opinion_display_columns = [json.data[i].column0, json.data[i].column1, json.data[i].column2, json.data[i].column3, json.data[i].column4];
						break;
				}
			}
			for(i=0;i<7;i++)
			{
				document.getElementById('pro_col_select_box_'+i).value = project_display_columns[i];
				document.getElementById('col_'+i).value = project_display_columns[i];
			}
			for(i=0;i<4;i++)
			{
				document.getElementById('news_col_select_box_'+i).value = news_display_columns[i];
				document.getElementById('news_col_'+i).value = news_display_columns[i];
			}
			for(i=0;i<7;i++)
			{
				document.getElementById('external_tech_col_select_box_'+i).value = external_tech_display_columns[i];
				document.getElementById('external_tech_col_'+i).value = external_tech_display_columns[i];
			}
			for(i=0;i<5;i++)
			{
				document.getElementById('manager_opinion_col_select_box_'+i).value = manager_opinion_display_columns[i];
				document.getElementById('manager_opinion_col_'+i).value = manager_opinion_display_columns[i];
			}
			/*project_display_columns = [json.column0, json.column1, json.column2, json.column3, json.column4, json.column5, json.column6];
			var i;
			for(i=0;i<7;i++)
			{
				document.getElementById('pro_col_select_box_'+i).value = project_display_columns[i];
				document.getElementById('col_'+i).value = project_display_columns[i];
			}*/
			//var jsonString = JSON.stringify(json);  //將json物件轉成字串
			//$("<h1>").text(json.title).appendTo("body");
			//$("<div class=\"content\">").html(json.html).appendTo("body");
		},
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		}
	});
	/*var i=0;
	for(i=0;i<project_display_columns.length;i++)
	{
		alert(project_display_columns[i]);
	}*/
	/*for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('pro_col_select_box_' + i) == null || document.getElementById('pro_col_select_box_' + i).value == "null")
		{			
			project_display_columns[project_display_columns.length] = "null";
		}
		else if(document.getElementById('pro_col_select_box_' + i).value != null)
		{			
			project_display_columns[project_display_columns.length] = document.getElementById('pro_col_select_box_' + i).value;
		}		
		if(document.getElementById('news_col_select_box_' + i) == null || document.getElementById('news_col_select_box_' + i).value == "null")
		{			
			news_display_columns[news_display_columns.length] = "null";
		}
		else if(document.getElementById('news_col_select_box_' + i).value != null)
		{
			news_display_columns[news_display_columns.length] = document.getElementById('news_col_select_box_' + i).value;
		}
		if(document.getElementById('external_tech_col_select_box_' + i) == null || document.getElementById('external_tech_col_select_box_' + i).value == "null")
		{
			external_tech_display_columns[external_tech_display_columns.length] = "null";
		}
		else if(document.getElementById('external_tech_col_select_box_' + i).value != null)
		{
			external_tech_display_columns[external_tech_display_columns.length] = document.getElementById('external_tech_col_select_box_' + i).value;
		}		
	}
	for(i=0;i<5;i++)
	{
		if(document.getElementById('manager_opinion_col_select_box_' + i) == null || document.getElementById('manager_opinion_col_select_box_' + i).value == "null")
		{
			manager_opinion_display_columns[manager_opinion_display_columns.length] = "null";
		}
		else if(document.getElementById('manager_opinion_col_select_box_' + i).value != null)
		{
			manager_opinion_display_columns[manager_opinion_display_columns.length] = document.getElementById('manager_opinion_col_select_box_' + i).value;
		}
	}*/	
	load_news_list(is_load, news_start_record, news_display_length, news_order_column, news_order_method, search_str, news_display_columns);
	load_external_tech_list(is_load, external_tech_start_record, external_tech_display_length, external_tech_order_column, external_tech_order_method, search_str, external_tech_display_columns);
	load_manager_opinion_list(is_load, manager_opinion_start_record, manager_opinion_display_length, manager_opinion_order_column, manager_opinion_order_method, search_str, manager_opinion_display_columns);
	load_project_list(is_load, project_start_record, project_display_length, project_order_column, project_order_method, search_str, project_display_columns);	
	//document.getElementById("loading").style.display = "none";
	$("#project_list_content").fadeIn(300);
	$("#news_list_content").fadeIn(300);
	$("#external_tech_list_content").fadeIn(300);
	$("#manager_opinion_list_content").fadeIn(300);
	//document.getElementById("project_list_content").style.display="block";
	//document.getElementById("news_list_content").style.display="block";
	//document.getElementById("external_tech_list_content").style.display="block";
	//document.getElementById("manager_opinion_list_content").style.display="block";
	$("#loading").fadeOut(2000);	
});
	


function news_show_select_box(value)
{
	$('#news_col_select_box_'+value).mouseover(function(){  //change
		$("#width_tmp").html($('#news_col_select_box_'+value+' option:selected').text());
		$(this).width($("#width_tmp").width()+38); // 35 : the size of the down arrow of the select box 
	});
	document.getElementById("news_col_select_box_"+value).style.display="block";		
	document.getElementById("news_col_plain_text_"+value).style.display="none";
}

function external_tech_show_select_box(value)
{
	$('#external_tech_col_select_box_'+value).mouseover(function(){  //change
		$("#width_tmp").html($('#external_tech_col_select_box_'+value+' option:selected').text());
		$(this).width($("#width_tmp").width()+38); // 35 : the size of the down arrow of the select box 
	});
	document.getElementById("external_tech_col_select_box_"+value).style.display="block";		
	document.getElementById("external_tech_col_plain_text_"+value).style.display="none";
}

function manager_opinion_show_select_box(value)
{
	$('#manager_opinion_col_select_box_'+value).mouseover(function(){  //change
		$("#width_tmp").html($('#manager_opinion_col_select_box_'+value+' option:selected').text());
		$(this).width($("#width_tmp").width()+38); // 35 : the size of the down arrow of the select box 
	});
	document.getElementById("manager_opinion_col_select_box_"+value).style.display="block";		
	document.getElementById("manager_opinion_col_plain_text_"+value).style.display="none";
}

function pro_hide_select_box(value)
{
	document.getElementById("pro_col_select_box_"+value).style.display="none";
	document.getElementById("pro_col_plain_text_"+value).style.display="block";
}

function news_hide_select_box(value)
{
	document.getElementById("news_col_select_box_"+value).style.display="none";
	document.getElementById("news_col_plain_text_"+value).style.display="block";
}

function external_tech_hide_select_box(value)
{
	document.getElementById("external_tech_col_select_box_"+value).style.display="none";
	document.getElementById("external_tech_col_plain_text_"+value).style.display="block";
}

function manager_opinion_hide_select_box(value)
{
	document.getElementById("manager_opinion_col_select_box_"+value).style.display="none";
	document.getElementById("manager_opinion_col_plain_text_"+value).style.display="block";
}

$('#project_list_tbl').on('mouseover', 'tbody tr', function(){
	var row_index = $(this).index();
	var project_id = document.getElementById("row_project_hidden_"+row_index).value;
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_check_is_blocked";
	var block_status;
	$.ajax({
		url:request_url,  
		data:{			 //The data to send(will be converted to a query string)
			id:project_id
		},
		type:"POST",		 //Whether this is a POST or GET request
		dataType:"text", //回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		success:function(str){
			block_status = $.trim(str);
			if(block_status == "block")
			{	
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/lock3.png";
			}
			else if(block_status == "unblock")
			{
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/edit3.png";
			}
		},
		async:true,
		//Code to run if the request fails; the raw request and status codes are passed to the function
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});
});

/*$('#news_list_tbl').on('mouseover', 'tbody tr', function(){
    //alert('You clicked row '+ ($(this).index()) );
	var row_index = $(this).index();
	var project_id = document.getElementById("row_project_hidden_"+row_index).value;
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_check_is_blocked";
	var block_status;
	$.ajax({
		url:request_url,  
		data:{			 //The data to send(will be converted to a query string)
			id:project_id
		},
		type:"POST",		 //Whether this is a POST or GET request
		dataType:"text", //回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		success:function(str){
			block_status = $.trim(str);
			if(block_status == "block")
			{	
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/lock3.png";
			}
			else if(block_status == "unblock")
			{
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/edit3.png";
			}
		},
		async:true,
		//Code to run if the request fails; the raw request and status codes are passed to the function
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});
});*/

$('#external_tech_list_tbl').on('mouseover', 'tbody tr', function(){
    //alert('You clicked row '+ ($(this).index()) );
	var row_index = $(this).index();
	var project_id = document.getElementById("row_project_hidden_"+row_index).value;
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_check_is_blocked";
	var block_status;
	$.ajax({
		url:request_url,  
		data:{			 //The data to send(will be converted to a query string)
			id:project_id
		},
		type:"POST",		 //Whether this is a POST or GET request
		dataType:"text", //回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		success:function(str){
			block_status = $.trim(str);
			if(block_status == "block")
			{	
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/lock3.png";
			}
			else if(block_status == "unblock")
			{
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/edit3.png";
			}
		},
		async:true,
		//Code to run if the request fails; the raw request and status codes are passed to the function
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});
});

/*$('#manager_opinion_list_tbl').on('mouseover', 'tbody tr', function(){
    //alert('You clicked row '+ ($(this).index()) );
	var row_index = $(this).index();
	var project_id = document.getElementById("row_project_hidden_"+row_index).value;
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_check_is_blocked";
	var block_status;
	$.ajax({
		url:request_url,  
		data:{			 //The data to send(will be converted to a query string)
			id:project_id
		},
		type:"POST",		 //Whether this is a POST or GET request
		dataType:"text", //回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		success:function(str){
			block_status = $.trim(str);
			if(block_status == "block")
			{	
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/lock3.png";
			}
			else if(block_status == "unblock")
			{
				document.getElementById("row_project_img_"+row_index).src = "<?php echo $img_location?>/edit3.png";
			}
		},
		async:true,
		//Code to run if the request fails; the raw request and status codes are passed to the function
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});
});*/

/*datatables header點擊div class為sort的區域才排序*/
$('th').on("click.DT", function (e) {
    if (!$(e.target).hasClass('sortMask')) {
        e.stopImmediatePropagation();
    }
});
$('th').on("click", function (e) {
    if (!$(e.target).hasClass('sortMask')) {
        e.stopImmediatePropagation();
    }
});
	
/*調整瀏覽項目dialog*/			
$(function() {
	$("#project_column_choose_menu").dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 300
		},
		position: { 
			my: "center top", 
			at: "center top", 
			of: "#project_list_tbl" },
		hide : {
			effect : "blind",
			duration : 300
		}						
	});
	$("#column_adjustment_btn").click(function() {	
		$("#project_column_choose_menu").dialog("open");
	});
});	

$(function() {
	$("#news_column_choose_menu").dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 300
		},
		position: { 
			my: "center top", 
			at: "center top", 
			of: "#news_list_tbl" },
		hide : {
			effect : "blind",
			duration : 300
		}						
	});
	$("#news_column_adjustment_btn").click(function() {		
		$("#news_column_choose_menu").dialog("open");
	});
});

$(function() {
	$("#external_tech_column_choose_menu").dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 300
		},
		position: { 
			my: "center top", 
			at: "center top", 
			of: "#external_tech_list_tbl" },
		hide : {
			effect : "blind",
			duration : 300
		}						
	});
	$("#external_tech_column_adjustment_btn").click(function() {		
		$("#external_tech_column_choose_menu").dialog("open");
	});
});

$(function() {
	$("#manager_opinion_column_choose_menu").dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 300
		},
		position: { 
			my: "center top", 
			at: "center top", 
			of: "#manager_opinion_list_tbl" },
		hide : {
			effect : "blind",
			duration : 300
		}						
	});
	$("#manager_opinion_column_adjustment_btn").click(function() {		
		$("#manager_opinion_column_choose_menu").dialog("open");
	});
});
</script>
</body>
</html>

