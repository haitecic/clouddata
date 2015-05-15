<?php 
$column_mapping = array("null"=>"不顯示","idea_id"=>"提案編號", "year"=>"年度", "idea_name"=>"提案名稱", "idea_source"=>"提案來源", "scenario_d"=>"情境說明", "function_d"=>"功能構想", "distinction_d"=>"差異化", "value_d"=>"價值性", "feasibility_d"=>"可行性", "stage"=>"階段狀態", "progress_description"=>"進度說明", "proposed_unit"=>"提案單位", "proposer"=>"提案人", "established_date"=>"立案日期",  "idea_examination"=>"提案審核履歷", "Idea"=>"I階段文件檢核", "Requirement"=>"R階段文件檢核", "Feasibility"=>"F階段文件檢核", "Prototype"=>"P階段文件檢核", "note"=>"備註", "adoption"=>"導入車型/先期式樣", "applied_patent"=>"專利申請/取得", "resurrection_application_qualified"=>"具備敗部復活申請資格", "resurrection_applied"=>"敗部復活申請", "PM_in_charge"=>"創意中心窗口", "closed_case"=>"結案");?>
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
			<div id="project_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block">
				<!--<div id="column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1155px;top:-10px;z-index:50;width: auto;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>調整瀏覽項目</div>
				</div>-->
				<!--border-color:#C3DEB7;background-color:#C3DEB7;color:#821EC7 96BBDE-->
				<div id="column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="project_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">
					<thead>
						<tr>
							<th id="project_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="project_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="pro_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_first_item')];?></span><select id="pro_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="project_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(1)" onmouseout="pro_hide_select_box(1)"><?php //if($this->session->userdata('second_item') != "null"){?><span id="pro_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_second_item')];?></span><span><select id="pro_col_select_box_1" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_second_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php// }?><span class="sortMask"></span><!--<span id="hide_column_icon_1" onclick="insert_column(1)" class="insert_column"></span>--></th>
							<th id="project_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(2)" onmouseout="pro_hide_select_box(2)"><?php //if($this->session->userdata('third_item') != "null"){?><span id="pro_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_third_item')];?></span><span><select id="pro_col_select_box_2" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_third_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php //}?><span class="sortMask"></span><!--<span id="hide_column_icon_2" class="insert_column"></span>--></th>
							<th id="project_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(3)" onmouseout="pro_hide_select_box(3)"><?php //if($this->session->userdata('forth_item') != "null"){?><span id="pro_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_fourth_item')];?></span><span><select id="pro_col_select_box_3" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_fourth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php// }?><span class="sortMask"></span><!--<span id="hide_column_icon_3" style="display:none" class="insert_column"></span>--></th>
							<th id="project_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="pro_show_select_box(4)" onmouseout="pro_hide_select_box(4)"><?php //if($this->session->userdata('fifth_item') != "null"){?><span id="pro_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_fifth_item')];?></span><span><select id="pro_col_select_box_4" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_fifth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php //}?><span class="sortMask"></span><!--<span id="hide_column_icon_4" style="display:none" class="insert_column"></span>--></th>
							<th id="project_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="pro_show_select_box(5)" onmouseout="pro_hide_select_box(5)"><?php //if($this->session->userdata('sixth_item') != "null"){?><span id="pro_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_sixth_item')];?></span><span><select id="pro_col_select_box_5" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_sixth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php //}?><span class="sortMask"></span><!--<span id="hide_column_icon_5" style="display:none" class="insert_column"></span>--></th>
							<th id="project_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="pro_show_select_box(6)" onmouseout="pro_hide_select_box(6)"><?php //if($this->session->userdata('seventh_item') != "null"){?><span id="pro_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('project_seventh_item')];?></span><span><select id="pro_col_select_box_6" onchange="adjust_project_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('project_seventh_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><?php //}?><span class="sortMask"></span><!--<span id="hide_column_icon_6" style="display:none" class="insert_column"></span>--></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th id="project_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="project_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_first_item')];?></th>
							<th id="project_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_second_item')];?></th>
							<th id="project_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_third_item')];?></th>
							<th id="project_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_fourth_item')];?></th>
							<th id="project_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_fifth_item')];?></th>
							<th id="project_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_sixth_item')];?></th>
							<th id="project_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('project_seventh_item')];?></th>
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
					<!--<i class="fa fa-linux"></i>-->
					<span>News</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="news_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="news_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block">
				<div id="news_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="news_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="news_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="news_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="news_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_first_item')];?></span><select id="news_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="news_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(1)" onmouseout="news_hide_select_box(1)"><span id="news_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_second_item')];?></span><span><select id="news_col_select_box_1" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_second_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(2)" onmouseout="news_hide_select_box(2)"><span id="news_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_third_item')];?></span><span><select id="news_col_select_box_2" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_third_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(3)" onmouseout="news_hide_select_box(3)"><span id="news_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_fourth_item')];?></span><span><select id="news_col_select_box_3" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_fourth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="news_show_select_box(4)" onmouseout="news_hide_select_box(4)"><span id="news_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_fifth_item')];?></span><span><select id="news_col_select_box_4" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_fifth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="news_show_select_box(5)" onmouseout="news_hide_select_box(5)"><span id="news_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_sixth_item')];?></span><span><select id="news_col_select_box_5" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_sixth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="news_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="news_show_select_box(6)" onmouseout="news_hide_select_box(6)"><span id="news_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('news_seventh_item')];?></span><span><select id="news_col_select_box_6" onchange="adjust_news_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('news_seventh_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th id="news_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="news_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_first_item')];?></th>
							<th id="news_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_second_item')];?></th>
							<th id="news_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_third_item')];?></th>
							<th id="news_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_fourth_item')];?></th>
							<th id="news_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_fifth_item')];?></th>
							<th id="news_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_sixth_item')];?></th>
							<th id="news_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('news_seventh_item')];?></th>
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
					<!--<i class="fa fa-linux"></i>-->
					<span>產學研技術</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="external_tech_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="external_tech_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block">
				<div id="external_tech_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="external_tech_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="external_tech_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="external_tech_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="external_tech_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_first_item')];?></span><select id="external_tech_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="external_tech_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(1)" onmouseout="external_tech_hide_select_box(1)"><span id="external_tech_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_second_item')];?></span><span><select id="external_tech_col_select_box_1" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_second_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(2)" onmouseout="external_tech_hide_select_box(2)"><span id="external_tech_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_third_item')];?></span><span><select id="external_tech_col_select_box_2" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_third_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(3)" onmouseout="external_tech_hide_select_box(3)"><span id="external_tech_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_fourth_item')];?></span><span><select id="external_tech_col_select_box_3" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_fourth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="external_tech_show_select_box(4)" onmouseout="external_tech_hide_select_box(4)"><span id="external_tech_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_fifth_item')];?></span><span><select id="external_tech_col_select_box_4" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_fifth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="external_tech_show_select_box(5)" onmouseout="external_tech_hide_select_box(5)"><span id="external_tech_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_sixth_item')];?></span><span><select id="external_tech_col_select_box_5" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_sixth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="external_tech_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="external_tech_show_select_box(6)" onmouseout="external_tech_hide_select_box(6)"><span id="external_tech_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('external_tech_seventh_item')];?></span><span><select id="external_tech_col_select_box_6" onchange="adjust_external_tech_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('external_tech_seventh_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>									
					<tfoot>
						<tr>
							<th id="external_tech_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="external_tech_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_first_item')];?></th>
							<th id="external_tech_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_second_item')];?></th>
							<th id="external_tech_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_third_item')];?></th>
							<th id="external_tech_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_fourth_item')];?></th>
							<th id="external_tech_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_fifth_item')];?></th>
							<th id="external_tech_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_sixth_item')];?></th>
							<th id="external_tech_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('external_tech_seventh_item')];?></th>
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
					<!--<i class="fa fa-linux"></i>-->
					<span>高階意見</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link" style="padding-top:13px;width:40px;height:40px" onclick="manager_opinion_collapse()">
						<i class="fa fa-chevron-up"></i>
					</a>
				</div>
				<div class="no-move"></div>				
			</div>
			<div id="manager_opinion_list_content" class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體;margin-bottom:10px;display:block">
				<div id="manager_opinion_column_adjustment_btn" class="btn btn-primary qq-upload-button" style="position:absolute;left:1200px;top:-6px;z-index:50;width: auto;height:38px;font-size:16pt;border-color:#5181A6;background-color:#5181A6">
					<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>欄位設定</div>
				</div>
				<table id="manager_opinion_list_tbl" class="display table table-bordered table-striped table-heading table-datatable" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid;margin-bottom:10px;table-layout:fixed;word-break:break-all;word-wrap:break-word">	
					<thead>
						<tr>
							<th id="manager_opinion_list_head" style="text-align:center;font-weight:normal;width:4%;word-wrap:break-word"></th>
							<th id="manager_opinion_list_head0" style="text-align:center;font-weight:normal;width:18%;word-wrap:break-word"><span id="manager_opinion_col_plain_text_0" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_first_item')];?></span><select id="manager_opinion_col_select_box_0" style="display:none"><option value="idea_name" selected></option></select><span class="sortMask"></span><!--<span id="hide_column_icon_0" class="insert_column"></span>--></th>
							<th id="manager_opinion_list_head1" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(1)" onmouseout="manager_opinion_hide_select_box(1)"><span id="manager_opinion_col_plain_text_1" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_second_item')];?></span><span><select id="manager_opinion_col_select_box_1" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_second_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head2" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(2)" onmouseout="manager_opinion_hide_select_box(2)"><span id="manager_opinion_col_plain_text_2" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_third_item')];?></span><span><select id="manager_opinion_col_select_box_2" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_third_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head3" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(3)" onmouseout="manager_opinion_hide_select_box(3)"><span id="manager_opinion_col_plain_text_3" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_fourth_item')];?></span><span><select id="manager_opinion_col_select_box_3" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_fourth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head4" style="text-align:center;font-weight:normal;width:13%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(4)" onmouseout="manager_opinion_hide_select_box(4)"><span id="manager_opinion_col_plain_text_4" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_fifth_item')];?></span><span><select id="manager_opinion_col_select_box_4" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_fifth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head5" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(5)" onmouseout="manager_opinion_hide_select_box(5)"><span id="manager_opinion_col_plain_text_5" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_sixth_item')];?></span><span><select id="manager_opinion_col_select_box_5" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_sixth_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
							<th id="manager_opinion_list_head6" style="text-align:center;font-weight:normal;width:12%;word-wrap:break-word" onmouseover="manager_opinion_show_select_box(6)" onmouseout="manager_opinion_hide_select_box(6)"><span id="manager_opinion_col_plain_text_6" style="margin:0px auto -21px;"><?php echo $column_mapping[$this->session->userdata('manager_opinion_seventh_item')];?></span><span><select id="manager_opinion_col_select_box_6" onchange="adjust_manager_opinion_display_column_by_column()" style="border:#BEBBBB 1px solid;border-radius: 5px;background-color:#FBFBF0;margin:0px auto -21px;display:none"><?php foreach($column_mapping as $index=>$value){ if($this->session->userdata('manager_opinion_seventh_item') == $index){echo '<option value="'.$index.'" selected>'.$value.'</option>';} else{echo '<option value="'.$index.'">'.$value.'</option>';}}?></select></span><span class="sortMask"></span></th>
						</tr>
					</thead>				
					<tfoot>
						<tr>
							<th id="manager_opinion_list_foot" style="text-align:center;font-weight:normal"></th>
							<th id="manager_opinion_list_foot0" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_first_item')];?></th>
							<th id="manager_opinion_list_foot1" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_second_item')];?></th>
							<th id="manager_opinion_list_foot2" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_third_item')];?></th>
							<th id="manager_opinion_list_foot3" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_fourth_item')];?></th>
							<th id="manager_opinion_list_foot4" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_fifth_item')];?></th>
							<th id="manager_opinion_list_foot5" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_sixth_item')];?></th>
							<th id="manager_opinion_list_foot6" style="text-align:center;font-weight:normal"><?php echo $column_mapping[$this->session->userdata('manager_opinion_seventh_item')];?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<br/>
</div>
<div id="project_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<!--<form action="project/adjust_item" method="post" onsubmit="return validate()">-->
		<div style="text-align:center">
		<?php 
		//$title_array陣列存放select調整欄位選單的名稱
		$title_array = array('0' => '欄位', '1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六');
		$titlename_array = array('0' => 'first', '1' => 'second', '2' => 'third', '3' => 'fourth', '4' => 'fifth', '5' => 'sixth', '6' => 'seventh');
		//$item_array存放列表上有顯示的欄位
		$item_array = array('0' => 'project_first_item', '1' => 'project_second_item', '2' => 'project_third_item', '3' => 'project_fourth_item', '4' => 'project_fifth_item', '5' => 'project_sixth_item', '6' => 'project_seventh_item');
		//印出六個欄位選單
		?>
		<select id="col_0" name="first" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{					
			echo $title_array[$i];
			$all_item[$i]=$this->session->userdata($item_array[$i]);  //取得該欄位目前顯示的欄位名稱
		?>		
		<select id="col_<?php echo $i;?>" name="<?php echo $titlename_array[$i];?>" style="margin-bottom:10px">
			<option value="null" <?php if($all_item[$i] == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="year" <?php if($all_item[$i] == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($all_item[$i] == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($all_item[$i] == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($all_item[$i] == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($all_item[$i] == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($all_item[$i] == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($all_item[$i] == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($all_item[$i] == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($all_item[$i] == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($all_item[$i] == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($all_item[$i] == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($all_item[$i] == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($all_item[$i] == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($all_item[$i] == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($all_item[$i] == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($all_item[$i] == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($all_item[$i] == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($all_item[$i] == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($all_item[$i] == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($all_item[$i] == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($all_item[$i] == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($all_item[$i] == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($all_item[$i] == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($all_item[$i] == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($all_item[$i] == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($all_item[$i] == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_project_display_column_by_menu()">
	</div>
	<!--</form>-->
</div>
<div id="news_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<!--<form action="project/adjust_item" method="post" onsubmit="return validate()">-->
		<div style="text-align:center">
		<?php 
		//$title_array陣列存放select調整欄位選單的名稱
		$title_array = array('0' => '欄位', '1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六');
		$titlename_array = array('0' => 'first', '1' => 'second', '2' => 'third', '3' => 'fourth', '4' => 'fifth', '5' => 'sixth', '6' => 'seventh');
		//$item_array存放列表上有顯示的欄位
		$item_array = array('0' => 'news_first_item', '1' => 'news_second_item', '2' => 'news_third_item', '3' => 'news_fourth_item', '4' => 'news_fifth_item', '5' => 'news_sixth_item', '6' => 'news_seventh_item');
		//印出六個欄位選單
		?>
		<select id="news_col_0" name="first" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{					
			echo $title_array[$i];
			$all_item[$i]=$this->session->userdata($item_array[$i]);  //取得該欄位目前顯示的欄位名稱
		?>
		<select id="news_col_<?php echo $i;?>" name="<?php echo $titlename_array[$i];?>" style="margin-bottom:10px">
			<option value="null" <?php if($all_item[$i] == "null"){ echo " selected";} ?>>不顯示</option>
			<option value="year" <?php if($all_item[$i] == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($all_item[$i] == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($all_item[$i] == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($all_item[$i] == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($all_item[$i] == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($all_item[$i] == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($all_item[$i] == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($all_item[$i] == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($all_item[$i] == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($all_item[$i] == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($all_item[$i] == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($all_item[$i] == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($all_item[$i] == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($all_item[$i] == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($all_item[$i] == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($all_item[$i] == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($all_item[$i] == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($all_item[$i] == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($all_item[$i] == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($all_item[$i] == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($all_item[$i] == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($all_item[$i] == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($all_item[$i] == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($all_item[$i] == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($all_item[$i] == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($all_item[$i] == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_news_display_column_by_menu()">
	</div>
	<!--</form>-->
</div>
<div id="external_tech_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<!--<form action="project/adjust_item" method="post" onsubmit="return validate()">-->
		<div style="text-align:center">
		<?php 
		//$title_array陣列存放select調整欄位選單的名稱
		$title_array = array('0' => '欄位', '1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六');
		$titlename_array = array('0' => 'first', '1' => 'second', '2' => 'third', '3' => 'fourth', '4' => 'fifth', '5' => 'sixth', '6' => 'seventh');
		//$item_array存放列表上有顯示的欄位
		$item_array = array('0' => 'external_tech_first_item', '1' => 'external_tech_second_item', '2' => 'external_tech_third_item', '3' => 'external_tech_fourth_item', '4' => 'external_tech_fifth_item', '5' => 'external_tech_sixth_item', '6' => 'external_tech_seventh_item');
		//印出六個欄位選單
		?>
		<select id="external_tech_col_0" name="first" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{					
			echo $title_array[$i];
			$all_item[$i]=$this->session->userdata($item_array[$i]);  //取得該欄位目前顯示的欄位名稱
		?>
		<select id="external_tech_col_<?php echo $i;?>" name="<?php echo $titlename_array[$i];?>" style="margin-bottom:10px">
			<option value="null" <?php if($all_item[$i] == "null"){ echo " selected";} ?>>無</option>
			<option value="year" <?php if($all_item[$i] == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($all_item[$i] == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($all_item[$i] == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($all_item[$i] == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($all_item[$i] == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($all_item[$i] == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($all_item[$i] == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($all_item[$i] == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($all_item[$i] == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($all_item[$i] == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($all_item[$i] == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($all_item[$i] == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($all_item[$i] == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($all_item[$i] == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($all_item[$i] == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($all_item[$i] == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($all_item[$i] == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($all_item[$i] == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($all_item[$i] == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($all_item[$i] == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($all_item[$i] == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($all_item[$i] == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($all_item[$i] == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($all_item[$i] == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($all_item[$i] == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($all_item[$i] == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_external_tech_display_column_by_menu()">
	</div>
	<!--</form>-->
</div>
<div id="manager_opinion_column_choose_menu" title="欄位設定" style="position:relative;left:0px;top:0px;z-index:100"><!--style="position:absolute;left:0px;top:0px;z-index:100"-->
	<!--<form action="project/adjust_item" method="post" onsubmit="return validate()">-->
		<div style="text-align:center">
		<?php 
		//$title_array陣列存放select調整欄位選單的名稱
		$title_array = array('0' => '欄位', '1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六');
		$titlename_array = array('0' => 'first', '1' => 'second', '2' => 'third', '3' => 'fourth', '4' => 'fifth', '5' => 'sixth', '6' => 'seventh');
		//$item_array存放列表上有顯示的欄位
		$item_array = array('0' => 'manager_opinion_first_item', '1' => 'manager_opinion_second_item', '2' => 'manager_opinion_third_item', '3' => 'manager_opinion_fourth_item', '4' => 'manager_opinion_fifth_item', '5' => 'manager_opinion_sixth_item', '6' => 'manager_opinion_seventh_item');
		//印出六個欄位選單
		?>
		<select id="manager_opinion_col_0" name="first" style="display:none">
			<option value="idea_name" selected></option>
		</select>
		<?php
		for ($i=1; $i<=6; $i++)
		{					
			echo $title_array[$i];
			$all_item[$i]=$this->session->userdata($item_array[$i]);  //取得該欄位目前顯示的欄位名稱
		?>
		<select id="manager_opinion_col_<?php echo $i;?>" name="<?php echo $titlename_array[$i];?>" style="margin-bottom:10px">
			<option value="null" <?php if($all_item[$i] == "null"){ echo " selected";} ?>>無</option>
			<option value="year" <?php if($all_item[$i] == "year"){ echo " selected";} ?>>年度</option>
			<option value="idea_id" <?php if($all_item[$i] == "idea_id"){ echo " selected";} ?> >提案編號</option>
			<option value="idea_name" <?php if($all_item[$i] == "idea_name"){ echo " selected";} ?> >提案名稱</option>
			<option value="idea_source" <?php if($all_item[$i] == "idea_source"){ echo " selected";} ?> >提案來源</option>
			<option value="scenario_d" <?php if($all_item[$i] == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($all_item[$i] == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($all_item[$i] == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($all_item[$i] == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($all_item[$i] == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="stage" <?php if($all_item[$i] == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="progress_description" <?php if($all_item[$i] == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($all_item[$i] == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($all_item[$i] == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="established_date" <?php if($all_item[$i] == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="idea_examination" <?php if($all_item[$i] == "idea_examination"){ echo " selected";} ?> >提案審核履歷</option>
			<option value="Idea" <?php if($all_item[$i] == "Idea"){ echo " selected";} ?> >I階段文件檢核</option>
			<option value="Requirement" <?php if($all_item[$i] == "Requirement"){ echo " selected";} ?> >R階段文件檢核</option>
			<option value="Feasibility" <?php if($all_item[$i] == "Feasibility"){ echo " selected";} ?> >F階段文件檢核</option>
			<option value="Prototype" <?php if($all_item[$i] == "Prototype"){ echo " selected";} ?> >P階段文件檢核</option>
			<option value="note" <?php if($all_item[$i] == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($all_item[$i] == "adoption"){ echo " selected";} ?> >導入車型/先期式樣</option>
			<option value="applied_patent" <?php if($all_item[$i] == "applied_patent"){ echo " selected";} ?> >專利申請/取得</option>
			<option value="resurrection_application_qualified" <?php if($all_item[$i] == "resurrection_application_qualified"){ echo " selected";} ?> >具備敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($all_item[$i] == "resurrection_applied"){ echo " selected";} ?> >敗部復活申請</option>
			<option value="PM_in_charge" <?php if($all_item[$i] == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($all_item[$i] == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<input type="button" value="確定" onclick="adjust_manager_opinion_display_column_by_menu()">
	</div>
	<!--</form>-->
</div>
<span id="width_tmp" style="display:none"></span>
<script>
$(document).ready(function() {		
	$('th select').width(function(){ //設定各select box的初始寬度, 依據選擇的option
		$("#width_tmp").html($("option:selected", this).text());
		$(this).width($("#width_tmp").width()+38);
	});	
	var is_load = true;
	var start_record = 0;
	var order_column = 1;
	var order_method = "asc";
	var project_display_columns = [];
	var news_display_columns = [];
	var external_tech_display_columns = [];
	var manager_opinion_display_columns = [];
	var search_str = "<?php echo $search;?>";
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		//alert(document.getElementById('pro_col_select_box_' + i).value);
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
		if(document.getElementById('manager_opinion_col_select_box_' + i) == null || document.getElementById('manager_opinion_col_select_box_' + i).value == "null")
		{
			manager_opinion_display_columns[manager_opinion_display_columns.length] = "null";
		}
		else if(document.getElementById('manager_opinion_col_select_box_' + i).value != null)
		{
			manager_opinion_display_columns[manager_opinion_display_columns.length] = document.getElementById('manager_opinion_col_select_box_' + i).value;
		}
	}
	load_news_list(is_load, start_record, order_column, order_method, search_str, news_display_columns);
	load_external_tech_list(is_load, start_record, order_column, order_method, search_str, external_tech_display_columns);
	load_manager_opinion_list(is_load, start_record, order_column, order_method, search_str, manager_opinion_display_columns);
	load_project_list(is_load, start_record, order_column, order_method, search_str, project_display_columns);	
});
	
function pro_show_select_box(value)
{
	$('#pro_col_select_box_'+value).mouseover(function(){  //change
		$("#width_tmp").html($('#pro_col_select_box_'+value+' option:selected').text());
		$(this).width($("#width_tmp").width()+38); // 35 : the size of the down arrow of the select box 
	});
	document.getElementById("pro_col_select_box_"+value).style.display="block";		
	document.getElementById("pro_col_plain_text_"+value).style.display="none";
}

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

$('#news_list_tbl').on('mouseover', 'tbody tr', function(){
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

$('#manager_opinion_list_tbl').on('mouseover', 'tbody tr', function(){
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

