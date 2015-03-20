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
				<div class="box-content no-padding table-responsive" style="clear:left;width:100%;border:0px;" >
					<table class="table table-bordered table-striped table-hover table-heading table-datatable" style="border:#BBBBBB 1px solid;font-family:微軟正黑體" id="datatable-2">
						<thead style="border:#BBBBBB 1px solid;">
							<!--<tr>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_project_name" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_year" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_haitec_unit" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_outer_unit" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_pm" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_car_model_estimate" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_exhibition" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"><label><input type="text" name="search_status" value="Filter..." class="search_init" /></label></th>
								<th style="border:#BBBBBB 1px solid;"></th>
							</tr>-->
							<tr>
								<td id="a" style="width:20px;border:#BBBBBB 1px solid;background:#FBFBF0"></td>
								<td style="border:#BBBBBB 1px solid;">專案主題</td>
								<td style="border:#BBBBBB 1px solid;">專案年份</td>
								<td style="border:#BBBBBB 1px solid;">華創單位</td>
								<td style="border:#BBBBBB 1px solid;">外部單位</td>
								<td style="border:#BBBBBB 1px solid;">創意中心負責人</td>
								<td style="border:#BBBBBB 1px solid;">納入車型評估</td>
								<td style="border:#BBBBBB 1px solid;">完成試作供覽</td>
								<td style="border:#BBBBBB 1px solid;">狀態</td>
								<td style="width:70px;border:#BBBBBB 1px solid;background:#FBFBF0">附加檔案</td>
							</tr>
						</thead>
						<tbody>							
							<?php
							foreach($project_list as $project_data)
							{
								
								echo '<tr>';								
								echo '<td style="text-align:center"><input style="width:35px;height:25px" type="image" src="'.$img_location.'/edit.png" alt="edit" name="Test" id="Test" onclick="edit('.$project_data['id'].');"/></td>';
								//echo '<a id="link_'.$project_data['id'].'" href="project_edit/'.$project_data['id'].'"></td>'; 
								echo '<td>'.$project_data['name'].'</td>';
								echo '<td>'.$project_data['year'].'</td>';
								echo '<td>'.$project_data['haitec_unit'].'</td>';
								echo '<td>'.$project_data['outer_unit'].'</td>';
								echo '<td>'.$project_data['pm'].'</td>';
								echo '<td>'.$project_data['car_model_estimate'].'</td>';
								echo '<td>'.$project_data['exhibition'].'</td>';
								echo '<td>'.$project_data['status'].'</td>';
//								echo '<td><a onclick="browse_file('. $project_data['id'].')">檔案數：'.$project_data['file_number'].'</a></td>';
								foreach($number_file as $a)
								{
									if ($a['project_id']==$project_data['id'])
									{
										echo '<td><a onclick="browse_file('. $project_data['id'].')">檔案數：'.$a['file_number'].'</a></td>';
									}  
								}
								echo '</tr>';
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
// Run Datables plugin and create 3 variants of settings
function edit(project_id)
{
	//document.getElementById("link_"+id).click();
	location.href="project_edit/"+project_id;
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

function browse_file(project_id)
{
	var searchbar=document.getElementById("search_bar").value;
	var URLs="http://localhost/project_manager/project_file/"+project_id+"/"+searchbar;
	//var URLs="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_manager/project_file/"+project_id+"/"+searchbar;
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


 

  

