<!--註:相關檔案js/devoops.js中的TestTable2-->
<!--Start Container-->
<div id="main" class="container-fluid" style="font-color:#635F5F;font-family: Adobe 繁黑體 Std"><!--8E8D93-->
	<!--Start Content-->
	<div id="content" class="col-xs-12 col-sm-12">		
		<!--資料表-->
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<div class="box-name">
							<i class="fa fa-linux"></i>
							<span>專案資料表</span>
						</div>
						<div class="box-icons">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
						</div>
						<div class="no-move"></div>				
					</div>	
					<div class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;" >
						<div class="btn btn-primary qq-upload-button" style="width: auto;text-align:right;float:left;margin-left:50px;"><!--;right:575-->
							<!--<div id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i> 資料送出</div>-->
							<div id="create_project_button" onclick="create_project()" style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>+ 新增專案</div>
						</div>
						<div id="opener" class="btn btn-primary qq-upload-button" style="width: auto;text-align:right;float:left;margin-left:10px;">
							<div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>調整瀏覽項目</div>
						</div>				
						<div id="hidden_window" title="瀏覽項目">
							<form action="project/adjust_item" method="post" onsubmit="return validate()">
								<input id="adjust_searchbar" type="hidden" name="searchbar">				
								<h4 class="page-header">欄位列表</h4>
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
								<input type="button"  value="確定" onclick="convey()">
							</form>		
						</div>
						<table class="display table table-bordered table-striped table-heading table-datatable" style="width:99%;margin-left:6px;margin-right:6px;border:#BBBBBB 1px solid;font-family:微軟正黑體;margin-top:-50px" id="datatable-2">
							<thead>								
								<?php
								$all_item[0]=$this->session->userdata('first_item');
								$all_item[1]=$this->session->userdata('second_item');
								$all_item[2]=$this->session->userdata('third_item');
								$all_item[3]=$this->session->userdata('fourth_item');
								$all_item[4]=$this->session->userdata('fifth_item');
								$all_item[5]=$this->session->userdata('sixth_item');
								$all_item[6]=$this->session->userdata('seventh_item');
								for($i=0; $i<=6; $i++)
								{
									switch($all_item[$i])
									{
										case "year":
											$all_item[$i]="年份";
											break;
										case "idea_id":
											$all_item[$i]='編號';
											break;
										case "km_id":
											$all_item[$i]='km文件編號';
											break;
										case "idea_name":
											$all_item[$i]='創意提案名稱';
											break;
										case "idea_source":
											$all_item[$i]='創意提案來源';
											break;
										case "scenario_d":
											$all_item[$i]='情境說明';
											break;
										case "function_d":
											$all_item[$i]='功能架構';
											break;
										case "distinction_d":
											$all_item[$i]='差異化';
											break;
										case "value_d":
											$all_item[$i]='價值性';
											break;
										case "feasibility_d":
											$all_item[$i]='可行性';
											break;
										case "market_survey":
											$all_item[$i]='市場搜尋';
											break;
										case "km_survey":
											$all_item[$i]='km平台搜尋';
											break;
										case "dep_item":
											$all_item[$i]='研發項目確認';
											break;										
											case "idea_description":
											$all_item[$i]='提案說明';
											break;	
										case "inner_or_outer":
											$all_item[$i]='提案類別';
											break;
										case "stage":
											$all_item[$i]='階段狀態';
											break;
										case "stage_detail":
											$all_item[$i]='階段細項狀態';
											break;
										case "progress_description":
											$all_item[$i]='進度說明';
											break;
										case "proposed_unit":
											$all_item[$i]='提案單位';
											break;
										case "proposer":
											$all_item[$i]='提案人';
											break;
										case "proposed_date":
											$all_item[$i]='提案日期';
											break;
										case "valid_project":
											$all_item[$i]='有效提案';
											break;
										case "established_date":
											$all_item[$i]='立案日期';
											break;
										case "joint_unit":
											$all_item[$i]='協辦單位';
											break;		
										case "joint_person":
											$all_item[$i]='協辦窗口';
											break;
										case "co_worker":
											$all_item[$i]='承作廠商';
											break;
										case "idea_examination":
											$all_item[$i]='提案審核進度';
											break;
										case "Idea":
											$all_item[$i]='IDC';
											break;
										case "Requirement":
											$all_item[$i]='RSD';
											break;
										case "Feasibility":
											$all_item[$i]='FSC';
											break;
										case "Prototype":
											$all_item[$i]='PMA';
											break;	
										case "note":
											$all_item[$i]='備註';
											break;	
										case "adoption":
											$all_item[$i]='導入車型';
											break;			
										case "applied_patent":
											$all_item[$i]='專利申請';
											break;	
										case "resurrection_application_qualified":
											$all_item[$i]='具敗部復活申請資格';
											break;
										case "resurrection_applied":
											$all_item[$i]='申請敗部復活';
											break;	
										case "PM_in_charge":
											$all_item[$i]='創意中心窗口';
											break;
										case "closed_case":
											$all_item[$i]='結案';
											break;							
										default:
											break;
									}
								}	
								?>
								<tr>
									<th id="a" style="border:#D2D2D2 1px solid;width:20px;background:#FBFBF0"></th>
									<?php
									if($this->session->userdata('first_item') != "null")
									{
									?>
										<th style="min-width:250px;border:#D2D2D2 1px solid;">創意提案名稱</th>
									<?php
									}
									if($this->session->userdata('second_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[1] ?></th>
									<?php
									}
									if($this->session->userdata('third_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[2] ?></th>
									<?php
									}
									if($this->session->userdata('fourth_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[3] ?></th>
									<?php
									}
									if($this->session->userdata('fifth_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[4] ?></th>
									<?php
									}
									if($this->session->userdata('sixth_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[5] ?></th>
									<?php
									}
									if($this->session->userdata('seventh_item') != "null")
									{
									?>
										<th style="border:#D2D2D2 1px solid;"><?php echo $all_item[6] ?></th>
									<?php
									}
									?>
								</tr>
								<tr>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_project_name" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_project_name" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_year" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_haitec_unit" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_outer_unit" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_pm" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_car_model_estimate" value="filter..." class="search_init" /></label></th>
									<th style="border:#D2D2D2 1px solid;"><label><input type="text" name="search_exhibition" value="filter..." class="search_init" /></label></th>
								</tr>
							</thead>								
						</table>					
					<!--<div style="新細明體">
						<table id="example" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>First_name</th>
									<th>Last name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Start date</th>
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
								</tr>
							</tfoot>
						</table>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>	
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
	<link rel="stylesheet" href="<?php echo $css_location.'/jquery_ui.css'; ?>">
	<div id="dialog" style="width:500px" title="Dialog Title"></div>
	
<script type="text/javascript">
var oTable;  //table物件
function validate()
{
	var i=1;
	var is_all_null_value = true;
	for(i=1;i<=6;i++)
	{
		if(document.getElementById("col_"+i).value != "null")
		{
			is_all_null_value = false;
			break;
		}
	}
	if(is_all_null_value == true)
	{
		alert("至少需選擇一個欄位項目");
		return false;
	}
	else
	{
		return true;
	}
}

function edit(project_id)
{
	//document.getElementById("link_"+id).click();
	location.href="project_edit/"+project_id;
}
//調整瀏覽的欄位項目
function convey(){
	document.getElementById("adjust_searchbar").value=document.getElementById("search_bar").value;
	var i;
	var col_arr = [];
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		col_arr[col_arr.length] = document.getElementById('col_' + i).value;
	}	
	var table = $('#datatable-2').DataTable();
	//var start_record = oTable.fnPagingInfo().iPage;  //取得之前使用者瀏覽的分頁頁數
	var start_record = oTable.fnPagingInfo().iStart;
	table.destroy();  //DataTables provides a destroy() method to destroy an old table, so you would be able to initialise a new one in its place. 
	LoadDataTablesScripts(reloadTable(col_arr, start_record));
}

/**
reloadTable
arr:the column to be displayed.
start_record:the start record of the new page
*/

function reloadTable(arr, start_record)
{	
	var postData = {"column1":arr[0],"column2":arr[1],"column3":arr[2],"column4":arr[3],
					"column5":arr[4],"column6":arr[5],"column7":arr[6],"column8":arr[6]};
	var URLs='http://127.0.0.1/project_management/datatable_server_processing.php';
	oTable = $('#datatable-2').dataTable( {
		aaSorting: [[ 0, "asc" ]],
		serverSide: true,
		bSortCellsTop: true,	//若thead中有2個列，設定排序按鈕要放置在哪個列		
		bFilter: false, 
		displayStart: start_record,
		bInfo: false,
		ajax:{
			url: URLs,
			data:{			 //The data to send(will be converted to a query string)
				myData:postData
			},
			type:'POST',
			async:false
			/*success:function(json){ 				
				//var jsonString = JSON.stringify(json);  //將json物件轉成字串
				//document.write(jsonString);
				//$("<h1>").text(json.title).appendTo("body");
				//$("<div class=\"content\">").html(json.html).appendTo("body");
			}	*/		
		}
	});	
	/*var header_inputs = $("#datatable-2 thead input");  //destroy後, 再reload input會抓不到
	header_inputs.on('keyup', function(){
		// Filter on the column (the index) of this element 
		oTable.fnFilter( this.value, header_inputs.index(this) );
	})	
	.on('focus', function(){
		if ( this.className == "search_init" ){
			this.className = "";
			this.value = "";
		}
	})
	.on('blur', function (i) {
		if ( this.value == "" ){
			this.className = "search_init";
			this.value = asInitVals[header_inputs.index(this)];
		}
	});	
	header_inputs.each( function (i) {
		asInitVals[i] = this.value;
	});
	//$(".dataTables_length select").addClass("select2-offscreen");
	//BTable.fnPageChange(2,true);*/
}

function TestTable2(){
	var col_arr = [];
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		col_arr[col_arr.length] = document.getElementById('col_' + i).value;
	}	
	var postData = {"column1":col_arr[0],"column2":col_arr[1],"column3":col_arr[2],"column4":col_arr[3],
					"column5":col_arr[4],"column6":col_arr[5],"column7":col_arr[6],"column8":col_arr[6]};
	
	var asInitVals = [];
	var URLs='http://127.0.0.1/project_management/datatable_server_processing.php';
	//var URLs='http://127.0.0.1/project_management/project/data_processing';
	oTable = $('#datatable-2').dataTable( {
		aaSorting: [[ 0, "asc" ]],
		serverSide: true,
		bSortCellsTop: true,	//若thead中有2個列，設定排序按鈕要放置在哪個列	
		ajax:{
			url: URLs,
			type:'POST',
			data:{			 //The data to send(will be converted to a query string)
				myData:postData
			}
		}
	});
	var header_inputs = $("#datatable-2 thead input");
	header_inputs.on('keyup', function(){
		// Filter on the column (the index) of this element 
		oTable.fnFilter( this.value, header_inputs.index(this) );
	})
	.on('focus', function(){
		if ( this.className == "search_init" ){
			this.className = "";
			this.value = "";
		}
	})
	.on('blur', function (i) {
		if ( this.value == "" ){
			this.className = "search_init";
			this.value = asInitVals[header_inputs.index(this)];
		}
	});
	header_inputs.each( function (i) {
		asInitVals[i] = this.value;
	});
}

function AllTables(){
	//TestTable1();
	//load_table();
	TestTable2();
	//TestTable3();
	LoadSelect2Script(MakeSelect2);
	$('#datatable-2_filter').hide();
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {	
	// Load Datatables and run plugin on tables 	
	LoadDataTablesScripts(AllTables);

	// Add Drag-n-Drop feature
	//WinMove();  //移動表格視窗	
	//當搜尋框有內容，則反白搜尋框的文字
	var search = "<?php echo $search?>";
	if(search != "")
	{
		searchPrompt(search, false);
	}
});

function check_is_blocked(row_id)
{
	var project_id = document.getElementById("row_project_"+row_id).value;
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
				document.getElementById("row_img_"+row_id).src = "<?php echo $img_location?>/read6.png";
				}
			else if(block_status == "unblock")
			{
				document.getElementById("row_img_"+row_id).src = "<?php echo $img_location?>/edit3.png";
			}
		},
		async:true,
		//Code to run if the request fails; the raw request and status codes are passed to the function
		error:function(xhr, status, errorThrown){
			alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});
	//alert(document.getElementById("row_project_"+row_id).value);
}
function browse_file(project_id)
{
	var searchbar=document.getElementById("search_bar").value;
	//var URLs="http://localhost/project_management/project_file/"+project_id+"/"+searchbar;
	var URLs="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_file/"+project_id+"/"+searchbar;
	$.ajax({
        url: URLs,
        //data: $('#sentToBack').serialize(),
        type:"POST",
        dataType:'text',
        success: function(msg){
				$( "#dialog" ).dialog({ 
					autoOpen: true /*, 
					buttons: {
						關閉視窗: function () {
							$(this).dialog("close");
						}
					},*/
					/*open: function() {
						$(this).closest(".ui-dialog").find(".ui-dialog-titlebar-close").removeClass("ui-dialog-titlebar-close")
						.html("<span class='ui-button-icon-primary ui-icon ui-icon-closethick' style='margin-left:-7px;padding-left:15px;width:50px'></span>");
					}*/
				});
				//$( "#dialog" ).dialog( "open" );
				
				$( "#dialog").html(msg);
				$("span.ui-dialog-title").text('附加檔案');
			},
        error:function(xhr, ajaxOptions, thrownError){ 
            alert(xhr.status); 
            alert(thrownError); 
        }
    });
}
</script>
		<!--end-->
		</div>
		<!--End Content-->
	</div>
</div>
<script>

/*$('document').ready(function() {	
    $('#datatable-2_filter').hide();
	$("#datatable-2_filter").prop('disabled', false);
	alert("hello");
});*/

function create_project()
{	
	//location.href = 'http://localhost/project_manager/project_create';
	location.href = 'project_create';
}

/*
 * This is the function that actually highlights a text string by
 * adding HTML tags before and after all occurrences of the search
 * term. You can pass your own tags if you'd like, or if the
 * highlightStartTag or highlightEndTag parameters are omitted or
 * are empty strings then the default <font> tags will be used.
 */
function doHighlight(bodyText, searchTerm, highlightStartTag, highlightEndTag) 
{
	// the highlightStartTag and highlightEndTag parameters are optional
	if ((!highlightStartTag) || (!highlightEndTag)) {
		highlightStartTag = "<font style='background-color:yellow;'>";
		highlightEndTag = "</font>";
	}
	
	// find all occurences of the search term in the given text,
	// and add some "highlight" tags to them (we're not using a
	// regular expression search, because we want to filter out
	// matches that occur within HTML tags and script blocks, so
	// we have to do a little extra validation)
	var newText = "";
	var i = -1;
	var lcSearchTerm = searchTerm.toLowerCase();
	var lcBodyText = bodyText.toLowerCase();
		
	while (bodyText.length > 0) 
	{
		i = lcBodyText.indexOf(lcSearchTerm, i+1);
		if (i < 0) 
		{
			newText += bodyText;
			bodyText = "";
		} 
		else 
		{
			// skip anything inside an HTML tag
			if (bodyText.lastIndexOf(">", i) >= bodyText.lastIndexOf("<", i)) 
			{
				// skip anything inside a <script> block
				if (lcBodyText.lastIndexOf("/script>", i) >= lcBodyText.lastIndexOf("<script", i)) 
				{
					newText += bodyText.substring(0, i) + highlightStartTag + bodyText.substr(i, searchTerm.length) + highlightEndTag;
					bodyText = bodyText.substr(i + searchTerm.length);
					lcBodyText = bodyText.toLowerCase();
					i = -1;
				}
			}
		}
	}
	
	return newText;
}


/*
 * This is sort of a wrapper function to the doHighlight function.
 * It takes the searchText that you pass, optionally splits it into
 * separate words, and transforms the text on the current web page.
 * Only the "searchText" parameter is required; all other parameters
 * are optional and can be omitted.
 */
function highlightSearchTerms(searchText, treatAsPhrase, warnOnFailure, highlightStartTag, highlightEndTag)
{
	// if the treatAsPhrase parameter is true, then we should search for 
	// the entire phrase that was entered; otherwise, we will split the
	// search string so that each word is searched for and highlighted
	// individually
	if (treatAsPhrase) 
	{
		searchArray = [searchText];
	} 
	else 
	{
		searchArray = searchText.split(" ");
	}
	
	if (!document.body || typeof(document.body.innerHTML) == "undefined") 
	{
		if (warnOnFailure) 
		{
			alert("Sorry, for some reason the text of this page is unavailable. Searching will not work.");
		}
		return false;
	}
	
	var bodyText = document.body.innerHTML;
	for (var i = 0; i < searchArray.length; i++) 
	{
		bodyText = doHighlight(bodyText, searchArray[i], highlightStartTag, highlightEndTag);
	}
	document.body.innerHTML = bodyText;
	return true;
}


/*
 * This displays a dialog box that allows a user to enter their own
 * search terms to highlight on the page, and then passes the search
 * text or phrase to the highlightSearchTerms function. All parameters
 * are optional.
 */
function searchPrompt(defaultText, treatAsPhrase, textColor, bgColor)
{
	// This function prompts the user for any words that should
	// be highlighted on this web page
	if (!defaultText) {
		defaultText = "";
	}
	
	// we can optionally use our own highlight tag values
	if ((!textColor) || (!bgColor)) 
	{
		highlightStartTag = "";
		highlightEndTag = "";
	} 
	else 
	{
		highlightStartTag = "<font style='color:" + textColor + "; background-color:" + bgColor + ";'>";
		highlightEndTag = "</font>";
	}
	
	/*searchText = prompt(promptText, defaultText);
	
	if (!searchText)  {
		alert("No search terms were entered. Exiting function.");
		return false;
	}*/
	
	return highlightSearchTerms(defaultText, treatAsPhrase, true, highlightStartTag, highlightEndTag);
}


/*
 * This function takes a referer/referrer string and parses it
 * to determine if it contains any search terms. If it does, the
 * search terms are passed to the highlightSearchTerms function
 * so they can be highlighted on the current page.
 */
function highlightGoogleSearchTerms(referrer)
{
	// This function has only been very lightly tested against
	// typical Google search URLs. If you wanted the Google search
	// terms to be automatically highlighted on a page, you could
	// call the function in the onload event of your <body> tag, 
	// like this:
	//   <body onload='highlightGoogleSearchTerms(document.referrer);'>
	
	//var referrer = document.referrer;
	if (!referrer) {
	return false;
	}
	
	var queryPrefix = "q=";
	var startPos = referrer.toLowerCase().indexOf(queryPrefix);
	if ((startPos < 0) || (startPos + queryPrefix.length == referrer.length)) {
	return false;
	}
	
	var endPos = referrer.indexOf("&", startPos);
	if (endPos < 0) {
	endPos = referrer.length;
	}
	
	var queryString = referrer.substring(startPos + queryPrefix.length, endPos);
	// fix the space characters
	queryString = queryString.replace(/%20/gi, " ");
	queryString = queryString.replace(/\+/gi, " ");
	// remove the quotes (if you're really creative, you could search for the
	// terms within the quotes as phrases, and everything else as single terms)
	queryString = queryString.replace(/%22/gi, "");
	queryString = queryString.replace(/\"/gi, "");
	
	return highlightSearchTerms(queryString, false);
}


/*
 * This function is just an easy way to test the highlightGoogleSearchTerms
 * function.
 */
function testHighlightGoogleSearchTerms()
{
	var referrerString = "http://www.google.com/search?q=javascript%20highlight&start=0";
	referrerString = prompt("Test the following referrer string:", referrerString);
	return highlightGoogleSearchTerms(referrerString);
}

</script>
<!--彈出視窗-->
		<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
		<script type="text/javascript">			
			$(function() {
				$("#hidden_window").dialog({
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
				$("#opener").click(function() {
					$("#hidden_window").dialog("open");
				});
			});			
		</script>





 

  

