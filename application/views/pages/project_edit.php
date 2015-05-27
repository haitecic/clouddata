<!--Start Container-->
<div id="main" class="container-fluid" style="background-color:#FBFBF0">
	<div class="row">
		<div class="col-xs-12 col-sm-12" style="background-color:#ffffff; height:30px;background-color:#FBFBF0;"></div>
		<div style="padding-left:24px"><span style="font-size:21pt;font-family:微軟正黑體"><?php echo $project_basic_info['idea_name'];?></span></div>
		<br/>		
		<!--<img src="<?php echo site_url()?>application/assets/data_img/<?php echo $project_img['name']?>" >-->
		<!--<div class="btn btn-primary qq-upload-button" style="border-color:#6483E4;background-color:#6483E4;width: auto;text-align:right;float:left;margin-left:50px;margin-top:-40px;margin-bottom:10px;"><!--;right:575-->
			<!--<div id="sub_button" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i> 資料送出</div>-->
			<!--<div id="list_project_button" onclick="list_project()" style="font-family: Adobe 繁黑體 Std; font-size:16px;"><i></i>專案列表</div>-->
		<!--</div>-->		
		<?php
		/*當專案被鎖住，顯示提示訊息*/
		if($project_basic_info['is_blocked'] == 1 && $project_basic_info['current_user'] != $username)
		{
			echo "<div style='text-align:center;font-size:12pt;color:blue;font-weight:normal;font-family: 新細明體'>使用者 ".$project_basic_info['current_user']." 正在編輯此專案</div><br/>";
		}		
		echo validation_errors();
		$attributes = array('class' => 'form-horizontal', 'role'=>'form', 'id' => 'project_create_form', 'name'=>'project_create_form');
		echo form_open('project_edit/'. $project_basic_info['id'], $attributes);
		?>
		<div class="form-group">
		<?php
		for ($i=0;$i<count($project_img) ;$i++)
		{
			//echo "<label class='col-sm-1 col-sm-offset-1 control-label'><img src='" . site_url() . "application/assets/data_img/" . $project_img[$i]['name'] . "' ></label>";
			?>
			<div class="col-sm-3 col-sm-offset-1">
				<img class="thumbnail" src="<?php echo site_url()."application/assets/data_img/".$project_img[$i]['name'];?>" alt="示意圖1">
			</div>
			<?php
			//echo "<label class='col-sm-1 col-sm-offset-1 control-label'><img src='" . site_url() . "application/assets/data_img/" . $project_img[$i]['name'] . "' ></label>";
			//echo "<div class='col-xs-12 col-sm-12' style='height:5px; '></div>";
			//echo "<div style='float:left;margin-left:130px; font-size:17px;'>" . $project_img[$i]['description'] . "</div>";
			//echo "<div class='col-xs-12 col-sm-12' style='height:5px; '></div>";
		}
		?>
		</div>
		<!--<div class="form-group">
			<label class="col-sm-1  col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><span style="color:red;font-size:13pt"></span>提案編號</label>
			<div class="col-sm-4">-->
				<input readonly type="hidden" value="<?php echo $project_basic_info['idea_id']?>" onfocus="change_border_display_onfocus(this)" onchange="change_border_display(this)" onblur="change_border_display_onblur(this)" id="idea_id" name="idea_id" class="form-control" placeholder="創意提案編號" data-toggle="tooltip" data-placement="bottom" title="創意提案編號" style="font-size:17px; font-family:微軟正黑體;">  
			<!--</div>
		</div>-->
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">情境說明</label>
			<div class="col-sm-10">
				<p class="form-control-static" style="font-size:12pt;font-family:微軟正黑體"><?php echo $project_basic_info['scenario_d'];?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">功能構想</label>
			<div class="col-sm-10">
				<p class="form-control-static" style="font-size:12pt;font-family:微軟正黑體"><?php echo $project_basic_info['function_d'];?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">差異化</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $project_basic_info['distinction_d'];?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">價值性</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $project_basic_info['value_d'];?></p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">可行性</label>
			<div class="col-sm-10">
				<p class="form-control-static"><?php echo $project_basic_info['feasibility_d'];?></p>
			</div>
		</div>
		<div style="margin-left:15px;width:98%;height:1px;background-color:#cccccc;text-align:center;">
			<span style="font-family: Adobe 繁黑體 Std;font-size:17px;background-color: #FBFBF0; position: relative; top: -0.5em;cursor:pointer" onclick="show_project_detail()">
				&nbsp;<img id="project_detail_icon" src="<?php echo $img_location;?>/sort-asc.png"></img>詳細資料&nbsp;
			</span>
		</div>
		<br/>
		<div id="project_detail" style="display:none;margin-left:15px;width:98%">
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">年度</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['year'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">提案編號</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['idea_id'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">提案來源</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['idea_source'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">階段狀態</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['stage'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">進度說明</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['progress_description'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">I階段文件檢核</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php if($project_basic_info['Idea'] != null){echo "審核通過";} else {echo "無";}?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">R階段文件檢核</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php if($project_basic_info['Requirement'] != null){echo "審核通過";} else {echo "無";}?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">F階段文件檢核</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php if($project_basic_info['Feasibility'] != null){echo "審核通過";} else {echo "無";}?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">P階段文件檢核</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php if($project_basic_info['Prototype'] != null){echo "審核通過";} else {echo "無";}?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">提案單位</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['proposed_unit'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">提案人</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['proposer'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">創意中心窗口</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['PM_in_charge'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">提案審核履歷</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['idea_examination'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">敗部復活申請</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['resurrection_application_qualified'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">具備敗部復活申請資格</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['resurrection_applied'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">立案日期</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['established_date'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">導入車型/先期式樣</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['adoption'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">專利申請/取得</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['applied_patent'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">結案</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['closed_case'];?></p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 col-sm-offset-1 control-label" style="font-family: Adobe 繁黑體 Std; font-size:17px;">備註</label>
				<div class="col-sm-10">
					<p class="form-control-static"><?php echo $project_basic_info['note'];?></p>
				</div>
			</div>
		</div>					

			<?php
			//if(count($project_attachfile) != 0)  //當有附加檔案才呈現 
			//{
			?>
			<br>

<?php
$i=0;
foreach($project_filecategory as $cate)
{
?>
			<div style="font-family: Adobe 繁黑體 Std;font-size:17px;background-color: #FBFBF0; position: relative; top: -0.5em;cursor:pointer" onclick="show_file_detail('<?php echo "file_detail" . $i;?>','<?php echo "file_detail_icon" . $i;?>', '<?php echo $cate['dir'];?>', '<?php echo "filelist" . $i;?>')">
				&nbsp;<img id="file_detail_icon<?php echo $i;?>" src="<?php echo $img_location;?>/sort-asc.png"></img><?php echo $cate['dir'];?>&nbsp;
			</div>
			<div id="file_detail<?php echo $i;?>" style="display:none;margin-left:15px;width:98%">
		<?php
		/*
		$file_dir=array();
		$dir_layer=array();
		$num_layer=0;
		foreach($project_attachfile as $file)
			{
			$layer=explode('/', $file['dir']);			
			$id_dir=array('id' => $file['id'],
			              'number_lay'=> count($layer),
			              'dir' => $layer);
			if(count($layer)>$num_layer) $num_layer=count($layer);
			for($x=0; $x<count($layer); $x++)
			   {
			   if($layer[$x]!=null)
					{
					if(empty($dir_layer[$x])) 
						{
						$dir_layer[$x]=array();
						array_push($dir_layer[$x], $layer[$x]);
						}
					else
						{
						$q=0;
						foreach($dir_layer[$x] as $dirname)
								{
								if($dirname!=$layer[$x]) $q=$q+1;
								}
						if($q==count($dir_layer[$x])) array_push($dir_layer[$x], $layer[$x]);
						}
					}
			   }
			array_push($file_dir, $id_dir);
			}*/			
		?>
				<div id="file_list" class="statusbar" style="width:98%;margin-left:15px;padding-bottom:10px">
					<span class="filename" style="text-align:center;width:500px">檔案名稱</span>
					<span class="filesize" style="padding-left:30px;width:150px;">檔案大小</span>
					<span align="center" style="padding-left:75px;width:200px;">上傳進度</span>
					<span align="center" style="padding-left:200px;text-align:center;width:100px;">上傳時間</span>
				</div>
				<div id="filelist<?php echo $i;?>">我想要開車</div>
				<br>
			</div>
			<?php
$i=$i+1;
}
			?>
			<input id="file_input" style="display:none" onchange="browse_upload()" type="file" name="my_file[]" multiple>
			<div style="margin-left:15px;font-family:微軟正黑體;<?php if($project_basic_info['is_blocked'] == 1 && $project_basic_info['is_blocked'] != $username){echo "display:none";}?>" id="dragandrophandler">請拖曳檔案到此(<a href="#" id="browse_file" onclick="browse_file()">瀏覽</a>檔案)</div>
				<div id="file_list" class="statusbar" style="width:98%;margin-left:15px;padding-bottom:10px">
					<span class="filename" style="text-align:center;width:500px">檔案名稱</span>
					<span class="filesize" style="padding-left:30px;width:150px;">檔案大小</span>
					<span align="center" style="padding-left:75px;width:200px;">上傳進度</span>
					<span align="center" style="padding-left:200px;text-align:center;width:100px;">上傳時間</span>
				</div>			
			<div id="status1"></div>
			<input type="hidden" id="file_count" name="file_count" value="0"></input> <!--計算上傳的檔案數量-->
			<input type="hidden" id="file_number" name="file_number" value="0"></input> <!--計算上傳的檔案編號-->
			<input type="hidden" id="file_success_upload_count" name="file_success_upload_count" value="0"></input> <!--計算上傳成功的檔案數量-->
			<input type="hidden" id="delete_file_count" name="delete_file_count" value="0"></input> <!--原本上傳之檔案被刪除的數量-->
			<input type="hidden" id="upload_file_dir" name="upload_file_dir"></input> <!--伺服器暫存使用者上傳檔案的資料夾-->
			<input type="hidden" id="current_user" name="current_user" value="<?php echo $project_basic_info['current_user'];?>"></input> <!--目前正在編輯的使用者-->
			<input type="hidden" id="login_user" name="login_user" value="<?php echo $username;?>"></input> <!--使用者(自己)-->
			<div class="btn btn-primary qq-upload-button" style="width: auto;align:center;<?php if($project_basic_info['is_blocked'] == 1 && $project_basic_info['current_user'] != $username) { echo "display:none";}?>">
				<div type="submit" id="submit_btn" style="font-family: Adobe 繁黑體 Std; font-size:17px;"><i class="fa fa-check-circle-o"></i>確認送出</div>
			</div>	
		</form>		
		<!--End Content-->
	</div>
	<br/>	
	<!--檔案預覽-->
	<div id="preview_pdf" class="preview_pdf">
	<object id="pdf_obj" data="" type="application/pdf" width="95%" height="95%">
		<p>Alternative text - include a link <a href="#">to the PDF!</a></p>
	</object>
	</div>
	<div id="background_mask" class="background_mask" onclick="close_file_preview(this.id)"></div>
</div>
<script>
/**
開啟pdf檔案預覽功能
*/
function preview_file(file_path, trigger_element_id)
{	
	document.getElementById("pdf_obj").data = file_path;	
	document.getElementById("background_mask").style.display = "block";
	document.getElementById("preview_pdf").style.display = "block";
	user_behavior_log(trigger_element_id, file_path);
}
/**
關閉pdf檔案預覽功能
*/
function close_file_preview(clicked_element_id)
{
	document.getElementById("preview_pdf").style.display="none";
	document.getElementById("background_mask").style.display="none";
	user_behavior_log(clicked_element_id, null);
}
function show_file_detail(file_detail_id, file_detail_icon_id, dir, list_id)
{
	user_behavior_log(file_detail_icon_id);
	var file_detail = document.getElementById(file_detail_id);
	if(file_detail.style.display == "block")
	{
		$("#" + file_detail_id).slideUp(500);	
		document.getElementById(file_detail_icon_id).src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-asc.png";
	}
	else if(file_detail.style.display == "none")
	{		
		$("#" + file_detail_id).slideDown(500);
		file_detail.style.display = "block";
		document.getElementById(file_detail_icon_id).src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-desc.png";
	}
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project/file_category_detail";
	$.ajax({
		url:request_url,
		data:{
			dir_name:dir
		},
		type:"POST",
		dataType:"json",
		async:false,
		success:function(str)
		{
		//alert(str);
		var n;
		var files_string='';
		
		for(n=0; n<str.number; n++)
			{
			var preview_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' +'/project_management/application/assets/project_attachment/' + '<?php echo $project_basic_info['id'];?>' + '_convert/' + str.list[n].convert_to_pdf;
		    var download_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' + '/project_management/application/assets/project_attachment/'+ '<?php echo $project_basic_info['id'];?>' + '/' + str.list[n].instance_file_name;
			if(str.list[n].instance_file_name.split(".")[1]=='pdf')
			{
			var preview_file_path='http://' + '<?php echo $_SERVER['SERVER_ADDR'];?>' +'/project_management/application/assets/project_attachment/' + '<?php echo $project_basic_info['id'];?>' + '/' + str.list[n].convert_to_pdf;;
			}
			files_string = files_string + 
					'<div id="origin_file_' + n + '" class="statusbar" style="width:98%;margin-left:15px;">'+
					'<div class="file_preview"><img id="preview_file_icon_' + str.list[n].id + '" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/preview.png" alt="preview" onclick="preview_file(' + "'" + preview_file_path + "'" +', this.id)"></img></div>' +
					'<div class="file_download"><a href="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/project_attachment/<?php echo $project_basic_info['id']?>/' + str.list[n].instance_file_name + '" download="' + str.list[n].instance_file_name + '"><img id="download_file_icon_'+ str.list[n].id +'" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/download.png" alt="download" onclick="user_behavior_log(this.id, ' + "'" + download_file_path + "'" + ')"></img></a></div>' +
					'<div class="filename">' + str.list[n].file_name + '</div>'+
					'<div class="filesize" style="padding-left:30px;width:150px"></div>' +
					'<div class="progressBar" style="margin-left:10px;width:200px;background-color:#0BA1B5"><div style="padding-left:160px;text-align:right">100%</div></div>'+
					'<span style="margin-left:75px;width:100px">' + str.list[n].create_time + '</span>'+
					'</div>';
			}
				document.getElementById(list_id).innerHTML=files_string;
		}
		});
}
function show_project_detail()
{
	user_behavior_log('project_detail_icon');
	var project_detail = document.getElementById("project_detail");
	if(project_detail.style.display == "block")
	{
		$("#project_detail").slideUp(500);	
		document.getElementById("project_detail_icon").src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-asc.png";
	}
	else if(project_detail.style.display == "none")
	{		
		$("#project_detail").slideDown(500);
		project_detail.style.display = "block";
		document.getElementById("project_detail_icon").src="http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/application/assets/img/sort-desc.png";
	}
	
}
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

/*browse pdf file*/
/*$(".login_pic").click(function(){ //點擊登入按鈕時
    $(".login_pannel").fadeIn(300);
    $(".login_pannel").css("display","block");
    $(".background_mask").css("display","block");
});*/

//If the files are dropped outside the div, file is opened in the browser window. To avoid that we can prevent ‘drop’ event on document.
$(document).ready(function()
{		
	function project_set_unblocked()
	{
		//var txt;
		//var r = confirm("Press a button!");
		//if (r == true) {
		//	txt = "You pressed OK!";
		//} else {
		//	txt = "You pressed Cancel!";
		//}		
		var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_set_unblocked";
		$.ajax({
			url:request_url,  
			data:{			 //The data to send(will be converted to a query string)
				id:<?php echo $project_basic_info['id'];?>
			},
			type:"POST",		 //Whether this is a POST or GET request
			dataType:"text", //回傳的資料型態
			//Code to run if the request succeeds. The response is passed to the function
			success:function(str){
				//alert(str);	
//  str.title				
			},
			async:false,
			//Code to run if the request fails; the raw request and status codes are passed to the function
			error:function(xhr, status, errorThrown){
				//alert("Sorry, there was a problem!");
				console.log("Error: " + errorThrown);
				console.log("Status: " + status);
				console.dir( xhr );
			},
			complete:function( xhr, status ){
				//alert("確定要跳出編輯頁面嗎?");
			}
		});					
	}	
	
	$(window).on('beforeunload', function(){		
		var current_user = document.getElementById("current_user").value;
		var login_user = document.getElementById("login_user").value;
		if(current_user == login_user || current_user == "")  /*唯有當自己跳出編輯頁面，才解鎖*/
		{
			project_set_unblocked();		  
		}			
	});
	
	var upload_file_dir = Date.now();
	document.getElementById("upload_file_dir").value = upload_file_dir;
	var obj = $("#dragandrophandler");
	var file_list = $("#file_list");		
	/*$( window ).unload(function() {
		project_set_unblocked();
	});*/
	$("#submit_btn").click(function () {  //按下資料送出的處理函數sub_button
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
		user_behavior_log(this.id, null)	  //temp commemt	
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
		user_behavior_log(this.id, null);  //temp comment
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
		user_behavior_log(this.id, null);	  //temp_comment	
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
	this.statusbar = $("<div class='statusbar "+row+"' style='width:98%;margin-left:15px'></div>");  //先產生一個狀態列(row)
	/*將檔案資訊呈現所需的空間依依加進狀態列中(由左至右依序為：檔案名稱、檔案大小、檔案進度條、「abort」按鈕)*/
	this.filename = $("<div class='filename' style='margin-left:100px;width:422px'></div>").appendTo(this.statusbar);
    this.size = $("<div class='filesize' style='margin-left:45px;width:128px'></div>").appendTo(this.statusbar);
    this.progressBar = $("<div class='progressBar' style='width:200px'><div></div></div>").appendTo(this.statusbar);
    this.create_time = $("<span style='padding-left:80px;width:150px'></span>").appendTo(this.statusbar);
	/*this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:102px'>Delete</div>").appendTo(this.statusbar);*/
	this.abort = $("<div id='"+(rowCount-1)+"' class='abort' style='margin-left:50px;'>Delete</div>").appendTo(this.statusbar);
	this.is_send = $("<div id='is_send_"+(rowCount-1)+"' style='display:none'>false</div>").appendTo(this.statusbar);
	this.file_number = $("<div style='display:none'>"+(rowCount-1)+"</div>").appendTo(this.statusbar);
	obj.after(this.statusbar);	
	/*
	<div class="file_preview"><img id="preview_file_icon_<?php echo $file['id'];?>" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/preview.png" alt="preview" onclick="preview_file('<?php echo $preview_file_path;?>', this.id)"></img></div>
					<div class="file_download"><a href="http://127.0.0.1/project_management/application/assets/project_attachment/<?php echo $project_basic_info['id']?>/<?php echo $file['instance_file_name']?>" download="<?php echo $file['file_name']?>"><img id="download_file_icon_<?php echo $file['id']?>" style="width:26px;height:24px;cursor:pointer" src="<?php echo $img_location;?>/download.png" alt="download" onclick="user_behavior_log(this.id, '<?php echo $download_file_path;?>')"></img></a></div>
					<div class="filename"><?php echo $file['file_name'];?></div>
					<div class="filesize" style="padding-left:30px;width:150px">
					</div>
					<div class="progressBar" style="margin-left:10px;width:200px;background-color:#0BA1B5"><div style="padding-left:160px;text-align:right">100%</div></div>
					<span style="margin-left:75px;width:100px"><?php echo $file['create_time'];?></span>
					<div id="file_<?php echo $i;?>" class="abort" onclick="delete_file(<?php echo $i;?>)" style="<?php echo "display:none";//if($project_basic_info['is_blocked'] == 1 && $project_basic_info['current_user'] != $username) { echo "display:none";}?>">Delete</div>
	*/
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
	//var uploadURL = "http://localhost/project_management/project_file_upload";
	var uploadURL = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/project_file_upload";
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
			//alert("hello");
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
