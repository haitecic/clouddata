<body><!-- onmouseover="user_behavior_log('body', null)"-->
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>

<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">			
			<nav role="navigation" class="navbar navbar-default" style="background-color:#505559">
				<div class="col-xs-12 col-sm-3 col-md-2">
					<div id="logo" class="col-xs-10 col-sm-11 col-md-12" style="padding-left:5px;padding-right:0px">
						<a id="logo_icon" class="navbar_logo" href="<?php echo site_url().'project_list'?>" style="padding-right:0px;font-family: Adobe 繁黑體 Std;" onclick="user_behavior_log(this.id, null)">專案管理系統</a>
					</div>
					<div class="col-xs-2 col-sm-1">
						<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-10">
					<div id="navbarCollapse" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li id="search" style="margin-top:10px;" class="search_bar">
								<input id="search_bar" type="text" placeholder="輸入搜尋項目" name="search_bar" value="<?php 
									if(isset($search) && !empty($search))
									{
										echo $search;
									}
									?>"/>
									<input id="search_bar_hidden" type="hidden" value="<?php 
									if(isset($search) && !empty($search))
									{
										echo $search;
									}
									?>"/>
								<i class="fa fa-search" onclick="start_search()"></i>
							</li>
							<!--<li><a href="#">專案資料</a></li>
							<li><a href="#">News</a></li>-->
						</ul>						
						<ul class="nav navbar-nav navbar-right">
							<li style="margin-top:15px;padding-left:12px;"><div style="color:#ffffff;margin-right:10px">使用者：<?php echo $username;?></div></li>
							<li style="margin-top:15px;padding-left:12px;"><div id="logout" onclick="user_behavior_log(this.id, null)"><?php echo anchor("login", "登出",'style="color:#ffffff;"');?></div></li>
						</ul>						
					</div>
				</div>
			</nav>
			<?php
			$attributes = array('id' => 'project_search_form', 'name'=>'project_search_form');
			//echo form_open('project_list', $attributes);
			?>
			<!--<div id="top-panel" class="col-xs-12 col-sm-9 col-md-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4" style="margin-top:10px;">
						<div id="search">
							<input id="search_bar" style="/*width:400px*/" type="text" placeholder="輸入搜尋項目" name="search_bar" value="<?php 
							if(isset($search) && !empty($search))
							{
								echo $search;
							}
							?>"/>
							<input id="search_bar_hidden" type="hidden" value="<?php 
							if(isset($search) && !empty($search))
							{
								echo $search;
							}
							?>"/>
							<i class="fa fa-search" onclick="start_search()"></i>
						</div>
					</div>-->
					<!--<div style="text-align:right;margin-right:23px;" ><span style="color:#ffffff">使用者：<?php echo $username;?></span><span id="logout" onclick="user_behavior_log(this.id, null)"><?php echo anchor("login", "登出",'style="margin-left:15px;color:#ffffff;"');?></span></div>-->
					<!--<div style="text-align:right;margin-right:23px;" ><div style="color:#ffffff">使用者：<?php echo $username;?></div><div id="logout" onclick="user_behavior_log(this.id, null)"><?php echo anchor("login", "登出",'style="margin-left:15px;color:#ffffff;"');?></div></div>
					<input id="user_id" type="hidden" value="<?php echo $user_id?>"/>-->
				<!--</div>				
			</div>-->
			<!--</form>-->
		</div>
		<!--<div style="text-align:right;color:#ffffff;float:left;magin-left:100px" >使用者：<?php echo $username;?></div>-->
		<!--<div style="text-align:right;margin-right:10px" ><span style="color:#ffffff">使用者：<?php echo $username;?></span><span><?php echo anchor("login", "登出",'style="margin-left:15px;color:#ffffff;"');?></span></div>-->
	</div>	
	<input id="user_id" type="hidden" value="<?php echo $user_id?>"/>
	<input id="server_ip_address" type="hidden" value="<?php echo $_SERVER['SERVER_ADDR'];?>"></input>
</header>

<script>
function start_search()
{
	document.getElementById("navbarCollapse").className = 'navbar-collapse collapse';  //在螢幕較小之畫面,使用者搜尋後,選單要被收摺
	var navbar_collapse = document.getElementById("navbarCollapse");
	navbar_collapse.setAttribute("aria-expanded", false);
	document.getElementById("loading").style.display = "block";
	document.getElementById("search_bar_hidden").value = document.getElementById("search_bar").value;
	user_behavior_log('search_bar', null);
	var is_load = true;
	//project block setting
	var project_start_record = 0;
	var project_display_length = project_list_tbl.fnPagingInfo().iLength;
	var project_order = project_list_tbl.fnSettings().aaSorting;
	if(typeof(project_order[0][0]) == "undefined")
	{
		project_order_column = project_order[0];
	}
	else
	{
		project_order_column = project_order[0][0];
	}
	if(typeof(project_order[0][1]) == "undefined")
	{
		project_order_method = project_order[1];
	}
	else
	{
		project_order_method = project_order[0][1];
	}
	//news block setting
	var news_start_record = 0;	
	var news_display_length = news_list_tbl.fnPagingInfo().iLength;
	var news_order = news_list_tbl.fnSettings().aaSorting;	
	if(typeof(news_order[0][0]) == "undefined")
	{
		news_order_column = news_order[0];
	}
	else
	{
		news_order_column = news_order[0][0];
	}	
	if(typeof(news_order[0][1]) == "undefined")
	{
		news_order_method = news_order[1];
	}
	else
	{
		news_order_method = news_order[0][1];
	}
	
	//external_tech block setting
	var external_tech_start_record = 0;
	var external_tech_display_length = external_tech_list_tbl.fnPagingInfo().iLength;
	var external_tech_order = external_tech_list_tbl.fnSettings().aaSorting;
	if(typeof(external_tech_order[0][0]) == "undefined")
	{
		external_tech_order_column = external_tech_order[0];
	}
	else
	{
		external_tech_order_column = external_tech_order[0][0];
	}
	if(typeof(external_tech_order[0][1]) == "undefined")
	{
		external_tech_order_method = external_tech_order[1];
	}
	else
	{
		external_tech_order_method = external_tech_order[0][1];
	}	
	//manager_opinion block setting
	var manager_opinion_start_record = 0;
	var manager_opinion_display_length = manager_opinion_list_tbl.fnPagingInfo().iLength;
	var manager_opinion_order = manager_opinion_list_tbl.fnSettings().aaSorting;
	if(typeof(manager_opinion_order[0][0]) == "undefined")
	{
		manager_opinion_order_column = manager_opinion_order[0];
	}
	else
	{
		manager_opinion_order_column = manager_opinion_order[0][0];
	}
	if(typeof(manager_opinion_order[0][1]) == "undefined")
	{
		manager_opinion_order_method = manager_opinion_order[1];
	}
	else
	{
		manager_opinion_order_method = manager_opinion_order[0][1];
	}
	var project_display_columns = [];
	var news_display_columns = [];
	var external_tech_display_columns = [];
	var manager_opinion_display_columns = [];	
	var search_str = document.getElementById("search_bar_hidden").value;	
	var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/user_column_setting";
	var user_id = document.getElementById('user_id').value;
	$.ajax({
		url: request_url,
		data:{
			"user_id": user_id
		},
		type:"POST",
		dataType:"json",
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
		},
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		}
	});
	project_list_tbl.fnDestroy();
	manager_opinion_list_tbl.fnDestroy();
	news_list_tbl.fnDestroy();
	external_tech_list_tbl.fnDestroy();
	load_news_list(is_load, news_start_record, news_display_length, news_order_column, news_order_method, search_str, news_display_columns);
	load_external_tech_list(is_load, external_tech_start_record, external_tech_display_length, external_tech_order_column, external_tech_order_method, search_str, external_tech_display_columns);
	load_manager_opinion_list(is_load, manager_opinion_start_record, manager_opinion_display_length, manager_opinion_order_column, manager_opinion_order_method, search_str, manager_opinion_display_columns);
	load_project_list(is_load, project_start_record, project_display_length, project_order_column, project_order_method, search_str, project_display_columns);	
	$("#loading").fadeOut(1500);
	set_project_datatables_element();
	set_news_datatables_element();
}

$("#search_bar").keypress(function(event){   	
	document.getElementById("navbarCollapse").className = 'navbar-collapse collapse';  //在螢幕較小之畫面,使用者搜尋後,選單要被收摺
	var navbar_collapse = document.getElementById("navbarCollapse");
	navbar_collapse.setAttribute("aria-expanded", false);
	document.getElementById("search_bar_hidden").value = document.getElementById("search_bar").value; 	
    if (event.keyCode == 13) 
	{		
		document.getElementById("loading").style.display = "block";
		user_behavior_log('search_bar', null);
		var is_load = true;
		//project block setting
		var project_start_record = 0;
		var project_display_length = project_list_tbl.fnPagingInfo().iLength;
		var project_order = project_list_tbl.fnSettings().aaSorting;
		if(typeof(project_order[0][0]) == "undefined")
		{
			project_order_column = project_order[0];
		}
		else
		{
			project_order_column = project_order[0][0];
		}
		if(typeof(project_order[0][1]) == "undefined")
		{
			project_order_method = project_order[1];
		}
		else
		{
			project_order_method = project_order[0][1];
		}
		//news block setting
		var news_start_record = 0;	
		var news_display_length = news_list_tbl.fnPagingInfo().iLength;
		var news_order = news_list_tbl.fnSettings().aaSorting;	
		if(typeof(news_order[0][0]) == "undefined")
		{
			news_order_column = news_order[0];
		}
		else
		{
			news_order_column = news_order[0][0];
		}	
		if(typeof(news_order[0][1]) == "undefined")
		{
			news_order_method = news_order[1];
		}
		else
		{
			news_order_method = news_order[0][1];
		}
		//external_tech block setting
		var external_tech_start_record = 0;
		var external_tech_display_length = external_tech_list_tbl.fnPagingInfo().iLength;
		var external_tech_order = external_tech_list_tbl.fnSettings().aaSorting;
		if(typeof(external_tech_order[0][0]) == "undefined")
		{
			external_tech_order_column = external_tech_order[0];
		}
		else
		{
			external_tech_order_column = external_tech_order[0][0];
		}
		if(typeof(external_tech_order[0][1]) == "undefined")
		{
			external_tech_order_method = external_tech_order[1];
		}
		else
		{
			external_tech_order_method = external_tech_order[0][1];
		}	
		//manager_opinion block setting
		var manager_opinion_start_record = 0;
		var manager_opinion_display_length = manager_opinion_list_tbl.fnPagingInfo().iLength;
		var manager_opinion_order = manager_opinion_list_tbl.fnSettings().aaSorting;
		if(typeof(manager_opinion_order[0][0]) == "undefined")
		{
			manager_opinion_order_column = manager_opinion_order[0];
		}
		else
		{
			manager_opinion_order_column = manager_opinion_order[0][0];
		}
		if(typeof(manager_opinion_order[0][1]) == "undefined")
		{
			manager_opinion_order_method = manager_opinion_order[1];
		}
		else
		{
			manager_opinion_order_method = manager_opinion_order[0][1];
		}
		var project_display_columns = [];
		var news_display_columns = [];
		var external_tech_display_columns = [];
		var manager_opinion_display_columns = [];	
		var search_str = document.getElementById("search_bar_hidden").value;	
		var request_url = "http://<?php echo $_SERVER['SERVER_ADDR'];?>/project_management/user_column_setting";
		var user_id = document.getElementById('user_id').value;
		$.ajax({
			url: request_url,
			data:{
				"user_id": user_id
			},
			type:"POST",
			dataType:"json",
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
			},
			error:function(xhr, status, errorThrown){
				//alert("Sorry, there was a problem!");
				console.log("Error: " + errorThrown);
				console.log("Status: " + status);
				console.dir( xhr );
			}
		});
		project_list_tbl.fnDestroy();
		manager_opinion_list_tbl.fnDestroy();
		news_list_tbl.fnDestroy();
		external_tech_list_tbl.fnDestroy();
		load_news_list(is_load, news_start_record, news_display_length, news_order_column, news_order_method, search_str, news_display_columns);
		load_external_tech_list(is_load, external_tech_start_record, external_tech_display_length, external_tech_order_column, external_tech_order_method, search_str, external_tech_display_columns);
		load_manager_opinion_list(is_load, manager_opinion_start_record, manager_opinion_display_length, manager_opinion_order_column, manager_opinion_order_method, search_str, manager_opinion_display_columns);
		load_project_list(is_load, project_start_record, project_display_length, project_order_column, project_order_method, search_str, project_display_columns);
		$("#loading").fadeOut(1500);
		set_project_datatables_element();
		set_news_datatables_element();
	}
});
</script>
<!--End Header-->