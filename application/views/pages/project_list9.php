<div id="main" class="container-fluid" style="background-color:#FBFBF0;font-color:#635F5F;font-family: Adobe 繁黑體 Std"><!--8E8D93-->
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="margin-top:15px">
				<div class="box-header">
					<div class="box-name">
						<i class="fa fa-linux"></i>
						<span>專案資料表</span>
					</div>
					<div class="box-icons">
						<a class="collapse-link" onclick="collapse">
							<i class="fa fa-chevron-up"></i>
						</a>
					</div>
					<div class="no-move"></div>				
				</div>
				<div class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;font-family:新細明體" >
					<div id="column_adjustment_btn" class="btn btn-primary qq-upload-button" style="width: auto;text-align:right;float:left;margin-left:10px;font-size:16pt;;border-color:#5181A6;background-color:#5181A6"><!--border-color:#C3DEB7;background-color:#C3DEB7;color:#821EC7 96BBDE-->
						<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>調整瀏覽項目</div>
					</div>
					<table id="project_list_tbl" class="display" cellspacing="0" width="99%" style="margin-left:7px;margin-right:11px;border:1px #cccccc solid">
						<thead>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Start date</th>
								<th>Salary</th>
								<th>Salary</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Start date</th>
								<th>Salary</th>
								<th>Salary</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="column_choose_form" title="瀏覽項目" style="postion:relative;z-index:1000">
	<!--<form action="project/adjust_item" method="post" onsubmit="return validate()">-->
		<?php 
		//$title_array陣列存放select調整欄位選單的名稱
		$title_array = array('0' => '欄位', '1' => '欄位一', '2' => '欄位二', '3' => '欄位三', '4' => '欄位四', '5' => '欄位五', '6' => '欄位六');
		$titlename_array = array('0' => 'first', '1' => 'second', '2' => 'third', '3' => 'fourth', '4' => 'fifth', '5' => 'sixth', '6' => 'seventh');
		//$item_array存放列表上有顯示的欄位
		$item_array = array('0' => 'first_item', '1' => 'second_item', '2' => 'third_item', '3' => 'fourth_item', '4' => 'fifth_item', '5' => 'sixth_item', '6' => 'seventh_item');
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
		<select id="col_<?php echo $i;?>" name="<?php echo $titlename_array[$i];?>">
			<option value="null" <?php if($all_item[$i] == "null"){ echo " selected";} ?>>無</option>
			<option value="year" <?php if($all_item[$i] == "year"){ echo " selected";} ?>>年分</option>
			<option value="km_id" <?php if($all_item[$i] == "km_id"){ echo " selected";} ?> >KM文件編號</option>
			<option value="idea_id" <?php if($all_item[$i] == "idea_id"){ echo " selected";} ?> >創意提案編號</option>
			<option value="idea_name" <?php if($all_item[$i] == "idea_name"){ echo " selected";} ?> >創意提案名稱</option>
			<option value="idea_source" <?php if($all_item[$i] == "idea_source"){ echo " selected";} ?> >創意提案來源</option>
			<option value="scenario_d" <?php if($all_item[$i] == "scenario_d"){ echo " selected";} ?> >情境說明</option>
			<option value="function_d" <?php if($all_item[$i] == "function_d"){ echo " selected";} ?> >功能構想</option>
			<option value="distinction_d" <?php if($all_item[$i] == "distinction_d"){ echo " selected";} ?> >差異化</option>
			<option value="value_d" <?php if($all_item[$i] == "value_d"){ echo " selected";} ?> >價值性</option>
			<option value="feasibility_d" <?php if($all_item[$i] == "feasibility_d"){ echo " selected";} ?> >可行性</option>
			<option value="market_survey" <?php if($all_item[$i] == "market_survey"){ echo " selected";} ?> >市場搜尋</option>
			<option value="km_survey" <?php if($all_item[$i] == "km_survey"){ echo " selected";} ?> >KM平台搜尋</option>
			<option value="dep_item" <?php if($all_item[$i] == "dep_item"){ echo " selected";} ?> >研發項目確認</option>
			<option value="idea_description" <?php if($all_item[$i] == "idea_description"){ echo " selected";} ?> >提案說明</option>
			<option value="inner_or_outer" <?php if($all_item[$i] == "inner_or_outer"){ echo " selected";} ?> >提案類別</option>
			<option value="stage" <?php if($all_item[$i] == "stage"){ echo " selected";} ?> >階段狀態</option>
			<option value="stage_detail" <?php if($all_item[$i] == "stage_detail"){ echo " selected";} ?> >階段細項狀態</option>
			<option value="progress_description" <?php if($all_item[$i] == "progress_description"){ echo " selected";} ?> >進度說明</option>
			<option value="proposed_unit" <?php if($all_item[$i] == "proposed_unit"){ echo " selected";} ?> >提案單位</option>
			<option value="proposer" <?php if($all_item[$i] == "proposer"){ echo " selected";} ?> >提案人</option>
			<option value="proposed_date" <?php if($all_item[$i] == "proposed_date"){ echo " selected";} ?> >提案日期</option>
			<option value="valid_project" <?php if($all_item[$i] == "valid_project"){ echo " selected";} ?> >有效提案</option>
			<option value="established_date" <?php if($all_item[$i] == "established_date"){ echo " selected";} ?> >立案日期</option>
			<option value="joint_unit" <?php if($all_item[$i] == "joint_unit"){ echo " selected";} ?> >協辦單位</option>
			<option value="joint_person" <?php if($all_item[$i] == "joint_person"){ echo " selected";} ?> >協辦窗口</option>
			<option value="co_worker" <?php if($all_item[$i] == "co_worker"){ echo " selected";} ?> >承作廠商</option>
			<option value="idea_examination" <?php if($all_item[$i] == "idea_examination"){ echo " selected";} ?> >提案審核進度</option>
			<option value="Idea" <?php if($all_item[$i] == "Idea"){ echo " selected";} ?> >Idea</option>
			<option value="Requirement" <?php if($all_item[$i] == "Requirement"){ echo " selected";} ?> >Requirement</option>
			<option value="Feasibility" <?php if($all_item[$i] == "Feasibility"){ echo " selected";} ?> >Feasibility</option>
			<option value="Prototype" <?php if($all_item[$i] == "Prototype"){ echo " selected";} ?> >Prototype</option>
			<option value="note" <?php if($all_item[$i] == "note"){ echo " selected";} ?> >備註</option>
			<option value="adoption" <?php if($all_item[$i] == "adoption"){ echo " selected";} ?> >導入車型</option>
			<option value="applied_patent" <?php if($all_item[$i] == "applied_patent"){ echo " selected";} ?> >專利申請</option>
			<option value="resurrection_application_qualified" <?php if($all_item[$i] == "resurrection_application_qualified"){ echo " selected";} ?> >具敗部復活申請資格</option>
			<option value="resurrection_applied" <?php if($all_item[$i] == "resurrection_applied"){ echo " selected";} ?> >申請敗部復活</option>
			<option value="PM_in_charge" <?php if($all_item[$i] == "PM_in_charge"){ echo " selected";} ?> >創意中心窗口</option>
			<option value="closed_case" <?php if($all_item[$i] == "closed_case"){ echo " selected";} ?> >結案</option>
		</select>
		<br/>
		<?php
		}
		?>
		<br/>
	<input type="button"  value="確定" onclick="adjust_display_column()">
</div>
<script>
$(document).ready(function() {
	var start_record = 0;
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('col_' + i).value;
	}
	load_project_list(start_record, order_column, order_method, display_columns);
} );

/**
調整瀏覽項目dialog
*/			
$(function() {
	$("#column_choose_form").dialog({
		autoOpen : false,
		show : {
			effect : "blind",
			duration : 500
		},
		hide : {
			effect : "blind",
			duration : 500
		}						
	});
	$("#column_adjustment_btn").click(function() {		
		$("#column_choose_form").dialog("open");
	});
});	
</script>
</body>
</html>

