<!--註:相關檔案js/devoops.js中的TestTable2-->
<!--Start Container-->
<div id="main" class="container-fluid" style="font-color:#635F5F;font-family: Adobe 繁黑體 Std"><!--8E8D93-->
	<div class="row">
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-12">
			<div id="about">
				<div class="about-inner">
					<h4 class="page-header">Open-source admin theme for you</h4>
					<p>DevOOPS team</p>
					<p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
					<p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
					<p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
					<p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
				</div>
			</div>
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<!--start<div id="ajax-content"></div>-->
			<div class="col-xs-12 col-sm-12"></div><!-- style="background-color:#ffffff; height:10px; -->
			<!--資料表-->
	<div class="row">
		<div class="col-xs-12">
			<div class="box" style="border:0px">
				<!--<div class="box-header">
					<div class="box-name">
						<i class="fa fa-linux"></i>
						<span>專案資料表</span>
					</div>
					<div class="box-icons">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a class="expand-link">
							<i class="fa fa-expand"></i>
						</a>
						<a class="close-link">
							<i class="fa fa-times"></i>
						</a>
					</div>
					<div class="no-move"></div>				
				</div>
				-->
				<div style="float:left;margin-left:15px;font-size:22pt;margin-top:20px;font-family:新細明體"><!--;right:575-->
					專案資料
				</div>				
				<div class="btn btn-primary qq-upload-button" style="width: auto;text-align:right;float:left;margin-left:50px;"><!--;right:575-->
					<!--<div id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i> 資料送出</div>-->
					<div id="create_project_button" onclick="create_project()" style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>+ 新增專案</div>
				</div>
			    <div id="opener" class="btn btn-primary qq-upload-button" style="width: auto;text-align:right;float:left;margin-left:10px;">
			    <div style="font-family: Adobe 繁黑體 Std; font-size:16px"><i></i>調整瀏覽項目</div>
				</div>				
                	<div id="hidden_window" title="瀏覽項目">
		        <form action="project/adjust_item" method=post>
		        <input id="adjust_searchbar" type="hidden" name="searchbar">
				<h4 class="page-header">欄位列表</h4>
<?php $title_array = array('0' => '第一欄', 
				                           '1' => '第二欄', 
										   '2' => '第三欄', 
										   '3' => '第四欄', 
										   '4' => '第五欄', 
										   '5' => '第六欄', 
										   '6' => '第七欄');
					$titlename_array = array('0' => 'first', 
				                           '1' => 'second', 
										   '2' => 'third', 
										   '3' => 'fourth', 
										   '4' => 'fifth', 
										   '5' => 'sixth', 
										   '6' => 'seventh');
					$item_array = array('0' => 'first_item', 
				                           '1' => 'second_item', 
										   '2' => 'third_item', 
										   '3' => 'fourth_item', 
										   '4' => 'fifth_item', 
										   '5' => 'sixth_item', 
										   '6' => 'seventh_item');
					for ($i=0; $i<=6; $i++)
					{										   
                    echo  $title_array[$i] . "<select id='mySelect' name='" .$titlename_array[$i]. "'>";
					$all_item[$i]=$this->session->userdata($item_array[$i]);
					if('year'==$all_item[$i]) echo "<option value='year' SELECTED>年分</option>";
					else echo "<option value='year' >年分</option>";
					if('km_id'==$all_item[$i]) echo "<option value='km_id' SELECTED>km文件編號</option>";
					else echo "<option value='km_id' >km文件編號</option>";
					if('idea_id'==$all_item[$i]) echo "<option value='idea_id' SELECTED>創意提案編號</option>";
					else echo "<option value='idea_id' >創意提案編號</option>";
					if('idea_name'==$all_item[$i]) echo "<option value='idea_name' SELECTED>創意提案名稱</option>";
					else echo "<option value='idea_name' >創意提案名稱</option>";
					if('idea_source'==$all_item[$i]) echo "<option value='idea_source' SELECTED>創意提案來源</option>";
					else echo "<option value='idea_source' >創意提案來源</option>";
					if('scenario_d'==$all_item[$i]) echo "<option value='scenario_d' SELECTED>情境說明</option>";
					else echo "<option value='scenario_d' >情境說明</option>";
					if('function_d'==$all_item[$i]) echo "<option value='function_d' SELECTED>功能構想</option>";
					else echo "<option value='function_d' >功能構想</option>";
					if('distinction_d'==$all_item[$i]) echo "<option value='distinction_d' SELECTED>差異化</option>";
					else echo "<option value='distinction_d' >差異化</option>";
					if('value_d'==$all_item[$i]) echo "<option value='value_d' SELECTED>價值性</option>";
					else echo "<option value='value_d' >價值性</option>";
					if('feasibility_d'==$all_item[$i]) echo "<option value='feasibility_d' SELECTED>可行性</option>";
					else echo "<option value='feasibility_d' >可行性</option>";
					if('market_survey'==$all_item[$i]) echo "<option value='market_survey' SELECTED>市場搜尋</option>";
					else echo "<option value='market_survey' >市場搜尋</option>";
					if('km_survey'==$all_item[$i]) echo "<option value='km_survey' SELECTED>km平台搜尋</option>";
					else echo "<option value='km_survey' >km平台搜尋</option>";
					if('dep_item'==$all_item[$i]) echo "<option value='dep_item' SELECTED>研發項目確認</option>";
					else echo "<option value='dep_item' >研發項目確認</option>";
					if('idea_description'==$all_item[$i]) echo "<option value='idea_description' SELECTED>提案說明</option>";
					else echo "<option value='idea_description' >提案說明</option>";
					if('inner_or_outer'==$all_item[$i]) echo "<option value='inner_or_outer' SELECTED>提案類別</option>";
					else echo "<option value='inner_or_outer' >提案類別</option>";
					if('stage'==$all_item[$i]) echo "<option value='stage' SELECTED>階段狀態</option>";
					else echo "<option value='stage' >階段狀態</option>";
					if('stage_detail'==$all_item[$i]) echo "<option value='stage_detail' SELECTED>階段細項狀態</option>";
					else echo "<option value='stage_detail' >階段細項狀態</option>";
					if('progress_description'==$all_item[$i]) echo "<option value='progress_description' SELECTED>進度說明</option>";
					else echo "<option value='progress_description' >進度說明</option>";
					if('proposed_unit'==$all_item[$i]) echo "<option value='proposed_unit' SELECTED>提案單位</option>";
					else echo "<option value='proposed_unit' >提案單位</option>";
					if('proposer'==$all_item[$i]) echo "<option value='proposer' SELECTED>提案人</option>";
					else echo "<option value='proposer' >提案人</option>";
					if('proposed_date'==$all_item[$i]) echo "<option value='proposed_date' SELECTED>提案日期</option>";
					else echo "<option value='proposed_date' >提案日期</option>";
					if('valid_project'==$all_item[$i]) echo "<option value='valid_project' SELECTED>有效提案</option>";
					else echo "<option value='valid_project' >有效提案</option>";
					if('established_date'==$all_item[$i]) echo "<option value='established_date' SELECTED>立案日期</option>";
					else echo "<option value='established_date' >立案日期</option>";
					if('joint_unit'==$all_item[$i]) echo "<option value='joint_unit' SELECTED>協辦單位</option>";
					else "<option value='joint_unit' >協辦單位</option>";
					if('joint_person'==$all_item[$i]) echo "<option value='joint_person' SELECTED>協辦窗口</option>";
					else echo "<option value='joint_person' >協辦窗口</option>";
					if('co_worker'==$all_item[$i]) echo "<option value='co_worker' SELECTED>承作廠商</option>";
					else echo "<option value='co_worker' >承作廠商</option>";
					if('idea_examination'==$all_item[$i]) echo "<option value='idea_examination' SELECTED>提案審核進度</option>";
					else echo "<option value='idea_examination'>提案審核進度</option>";
					 if('Idea'==$all_item[$i]) echo "<option value='Idea' SELECTED>Idea</option>";
					 else echo "<option value='Idea'>Idea</option>";
					if('Requirement'==$all_item[$i]) echo "<option value='Requirement' SELECTED>Requirement</option>";
					else echo "<option value='Requirement' >Requirement</option>";
					if('Feasibility'==$all_item[$i]) echo "<option value='Feasibility' SELECTED>Feasibility</option>";
					else echo "<option value='Feasibility' >Feasibility</option>";
					if('Prototype'==$all_item[$i]) echo "<option value='Prototype' SELECTED>Prototype</option>";
					else echo "<option value='Prototype' >Prototype</option>";
					if('note'==$all_item[$i]) echo "<option value='note' SELECTED>備註</option>";
					else echo "<option value='note' >備註</option>";
					if('adoption'==$all_item[$i]) echo "<option value='adoption' SELECTED>導入車型</option>";
					else echo "<option value='adoption' >導入車型</option>";
					if('applied_patent'==$all_item[$i]) echo "<option value='applied_patent' SELECTED>專利申請</option>";
					else echo "<option value='applied_patent' >專利申請</option>";
					if('resurrection_application_qualified'==$all_item[$i]) echo "<option value='resurrection_application_qualified SELECTED>具敗部復活申請資格</option>";
					else echo "<option value='resurrection_application_qualified >具敗部復活申請資格</option>";
					if('resurrection_applied'==$all_item[$i]) echo"<option value='resurrection_applied' SELECTED>申請敗部復活</option>";
					else echo "<option value='resurrection_applied' >申請敗部復活</option>";
					if('PM_in_charge'==$all_item[$i]) echo "<option value='PM_in_charge' SELECTED>創意中心窗口</option>";
					else echo "<option value='PM_in_charge' >創意中心窗口</option>";
					if('closed_case'==$all_item[$i]) echo "<option value='closed_case' SELECTED>結案</option>";
					else echo "<option value='closed_case' >結案</option>";
					echo "</select>";
					echo "<br>";
					}
					?>
                    					

        <input type=submit  value="確定" onclick="convey()">
		</form>		
		</div>

				<div class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;" >
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" style="border:#BBBBBB 1px solid;font-family:微軟正黑體" id="datatable-2">
						<thead style="border:#BBBBBB 1px solid;">
							<!---->
							<?php
							$all_item[0]=$this->session->userdata('first_item');
							$all_item[1]=$this->session->userdata('second_item');
							$all_item[2]=$this->session->userdata('third_item');
							$all_item[3]=$this->session->userdata('fourth_item');
							$all_item[4]=$this->session->userdata('fifth_item');
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
								<td id="a" style="width:20px;border:#BBBBBB 1px solid;background:#FBFBF0"></td>
							    <td style="border:#BBBBBB 1px solid;"><?php echo $all_item[0] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[1] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[2] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[3] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[4] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[5] ?></td>
								<td style="border:#BBBBBB 1px solid;"><?php echo $all_item[6] ?></td>
							</tr>
							<!--<tr>
								<th style="border:#BBBBBB 1px solid;"><label></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_project_name" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_year" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_haitec_unit" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_outer_unit" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_pm" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_car_model_estimate" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_exhibition" value="Filter..." class="search_init" /></label></th>
							</tr>-->
						</thead>
						<tbody>	
							<?php
							$i=0;
							foreach($project_list as $project_data)
							{	
							?>		
							<tr id="<?php echo "row_".$i?>" onmouseover="check_is_blocked(<?php echo $i;?>)">
							<?php								
								if($project_data['is_blocked']==1)
								{
									echo '<td style="text-align:center"><input id="row_img_'.$i.'" style="width:30px;height:24px" type="image" src="'.$img_location.'/read6.png" alt="edit" name="Test" id="Test" onclick="edit('.$project_data['id'].');"/></td>';
								}
								else if($project_data['is_blocked']==2)
								{
									echo '<td style="text-align:center"><input id="row_img_'.$i.'" style="width:35px;height:25px" type="image" src="'.$img_location.'/edit3.png" alt="edit" name="Test" id="Test" onclick="edit('.$project_data['id'].');"/></td>';
								}
								echo '<td>'.$project_data[$this->session->userdata('first_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('second_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('third_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('fourth_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('fifth_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('sixth_item')].'</td>';
								echo '<td>'.$project_data[$this->session->userdata('seventh_item')].'</td>';
//								echo '<td><a onclick="browse_file('. $project_data['id'].')">檔案數：'.$project_data['file_number'].'</a></td>';
								/*foreach($number_file as $a)
								{
									if ($a['project_id']==$project_data['id'])
									{
										echo '<td><a onclick="browse_file('. $project_data['id'].')">檔案數：'.$a['file_number'].'</a></td>';
									}  
								}*/
								?>
								<input type="hidden" id="row_project_<?php echo $i;?>" value="<?php echo $project_data['id']?>"/>
								<?php
								echo '</tr>';
								$i++;
							}
							?>
							<!--<tr>
								<td>專案主題1</td>
								<td>2009</td>
								<td>創意中心</td>
								<td>鴻海集團</td>
								<td>陳健發</td>
								<td>是</td>
								<td>是</td>
								<td>是</td>
							</tr>-->
						</tbody>
						<!--<tfoot>
							<tr>
								<th>Rate</th>
								<th>Distro</th>
								<th>Votes</th>
								<th>Homepage</th>
								<th>Version</th>
								<th>Version</th>
							</tr>
						</tfoot>-->
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
	<link rel="stylesheet" href="<?php echo $css_location.'/jquery_ui.css'; ?>">
	<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
	<!--<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>-->
	<div id="dialog" style="width:500px" title="Dialog Title"></div>
<script type="text/javascript">
function edit(project_id)
{
	//document.getElementById("link_"+id).click();
	location.href="project_edit/"+project_id;
}
// Run Datables plugin and create 3 variants of settings
function convey(){
document.getElementById("adjust_searchbar").value=document.getElementById("search_bar").value;
}


function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
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
<!---->


 

  

