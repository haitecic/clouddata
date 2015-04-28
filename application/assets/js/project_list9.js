var column_mapping = {idea_id:"創意提案編號", year:"年分", km_id:"KM文件編號", idea_name:"創意提案名稱", idea_source:"創意提案來源", scenario_d:"情境說明", function_d:"功能構想", distinction_d:"差異化", value_d:"價值性", feasibility_d:"可行性", market_survey:"市場搜尋", km_survey:"KM平台搜尋", dep_item:"研發項目確認", idea_description:"提案說明", inner_or_outer:"提案類別", stage:"階段狀態", stage_detail:"階段細項狀態", progress_description:"進度說明", proposed_unit:"提案單位", proposer:"提案人", proposed_date:"提案日期", valid_project:"有效提案", established_date:"立案日期", joint_unit:"協辦單位", joint_person:"協辦窗口", co_worker:"承作廠商", idea_examination:"提案審核進度", Idea:"Idea", Requirement:"Requirement", Feasibility:"Feasibility", Prototype:"Prototype", note:"備註", adoption:"導入車型", applied_patent:"專利申請", resurrection_application_qualified:"具敗部復活申請資格", resurrection_applied:"申請敗部復活", PM_in_charge:"創意中心窗口", closed_case:"結案"};
var project_list_tbl;
function load_project_list(start_record, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    project_list_tbl = $('#project_list_tbl').dataTable( {	
		"displayStart": start_record,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/getTable4",
			"data":{			 	
				"Data":sendData
			},
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(0);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
			{ "data": 6 }
        ]
    } );
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('col_' + i).value == "null")
		{
			project_list_tbl.fnSetColumnVis( i, false, false );  //設定欄位的 visibility
		}
		else if(document.getElementById('col_' + i).value != "null")
		{
			project_list_tbl.fnSetColumnVis( i, true, false );  //設定欄位的 visibility
		}
	}
}

var news_list_tbl;
function load_news_list(start_record, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    news_list_tbl = $('#news_list_tbl').dataTable( {	
		"displayStart": start_record,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/getTable4",
			"data":{			 	
				"Data":sendData
			},
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#news").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
			{ "data": 6 }
        ]
    } );
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('news_col_' + i).value == "null")
		{
			news_list_tbl.fnSetColumnVis( i, false, false );  //設定欄位的 visibility
		}
		else if(document.getElementById('news_col_' + i).value != "null")
		{
			news_list_tbl.fnSetColumnVis( i, true, false );  //設定欄位的 visibility
		}
	}
}

var external_tech_list_tbl;
function load_external_tech_list(start_record, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    external_tech_list_tbl = $('#external_tech_list_tbl').dataTable( {	
		"displayStart": start_record,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/getTable4",
			"data":{			 	
				"Data":sendData
			},
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#external_tech").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
			{ "data": 6 }
        ]
    } );
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('external_tech_col_' + i).value == "null")
		{
			external_tech_list_tbl.fnSetColumnVis( i, false, false );  //設定欄位的 visibility
		}
		else if(document.getElementById('external_tech_col_' + i).value != "null")
		{
			external_tech_list_tbl.fnSetColumnVis( i, true, false );  //設定欄位的 visibility
		}
	}
}

var manager_opinion_list_tbl;
function load_manager_opinion_list(start_record, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    manager_opinion_list_tbl = $('#manager_opinion_list_tbl').dataTable( {	
		"displayStart": start_record,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/getTable4",
			"data":{			 	
				"Data":sendData
			},
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#manager_opinion").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
			{ "data": 6 }
        ]
    } );
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('manager_opinion_col_' + i).value == "null")
		{
			manager_opinion_list_tbl.fnSetColumnVis( i, false, false );  //設定欄位的 visibility
		}
		else if(document.getElementById('manager_opinion_col_' + i).value != "null")
		{
			manager_opinion_list_tbl.fnSetColumnVis( i, true, false );  //設定欄位的 visibility
		}
	}
}

function adjust_project_display_column()
{
	var start_record = project_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('col_' + i).value;
	}
	project_list_tbl.fnDestroy();
	load_project_list(start_record, order_column, order_method, search_str, display_columns);
	var j;	
	for(j=0;j<7;j++)  //設定表格head名稱
	{
		if(document.getElementById('project_list_head' + j) != null)
		{
			document.getElementById('project_list_head' + j).innerHTML = column_mapping[document.getElementById('col_' + j).value];
			document.getElementById('project_list_foot' + j).innerHTML = column_mapping[document.getElementById('col_' + j).value];
		}
	}
	$("#project_column_choose_menu").dialog("close");
}

function adjust_news_display_column()
{
	var start_record = news_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('news_col_' + i).value;
	}
	news_list_tbl.fnDestroy();
	load_news_list(start_record, order_column, order_method, search_str, display_columns);
	var j;	
	for(j=0;j<7;j++)  //設定表格head名稱
	{
		if(document.getElementById('news_list_head' + j) != null)
		{
			document.getElementById('news_list_head' + j).innerHTML = column_mapping[document.getElementById('news_col_' + j).value];
			document.getElementById('news_list_foot' + j).innerHTML = column_mapping[document.getElementById('news_col_' + j).value];
		}
	}
	$("#news_column_choose_menu").dialog("close");
}

function adjust_external_tech_display_column()
{
	var start_record = external_tech_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('external_tech_col_' + i).value;
	}
	external_tech_list_tbl.fnDestroy();
	load_external_tech_list(start_record, order_column, order_method, search_str, display_columns);
	var j;	
	for(j=0;j<7;j++)  //設定表格head名稱
	{
		if(document.getElementById('external_tech_list_head' + j) != null)
		{
			document.getElementById('external_tech_list_head' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_' + j).value];
			document.getElementById('external_tech_list_foot' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_' + j).value];
		}
	}
	$("#external_tech_column_choose_menu").dialog("close");
}

function adjust_manager_opinion_display_column()
{
	var start_record = manager_opinion_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('manager_opinion_col_' + i).value;
	}
	manager_opinion_list_tbl.fnDestroy();
	load_manager_opinion_list(start_record, order_column, order_method, search_str, display_columns);
	var j;	
	for(j=0;j<7;j++)  //設定表格head名稱
	{
		if(document.getElementById('manager_opinion_list_head' + j) != null)
		{
			document.getElementById('manager_opinion_list_head' + j).innerHTML = column_mapping[document.getElementById('manager_opinion_col_' + j).value];
			document.getElementById('manager_opinion_list_foot' + j).innerHTML = column_mapping[document.getElementById('manager_opinion_col_' + j).value];
		}
	}
	$("#manager_opinion_column_choose_menu").dialog("close");
}

function project_collapse()
{
	var project_list_content = document.getElementById("project_list_content");
	if(project_list_content.style.display == "block")
	{
		project_list_content.style.display = "none";
	}
	else
	{
		project_list_content.style.display = "block";
	}
	$("#project_column_choose_menu").dialog("close");
}

function news_collapse()
{
	var news_list_content = document.getElementById("news_list_content");
	if(news_list_content.style.display == "block")
	{
		news_list_content.style.display = "none";
	}
	else
	{
		news_list_content.style.display = "block";
	}
	$("#news_column_choose_menu").dialog("close");
}

function external_tech_collapse()
{
	var external_tech_list_content = document.getElementById("external_tech_list_content");
	if(external_tech_list_content.style.display == "block")
	{
		external_tech_list_content.style.display = "none";
	}
	else
	{
		external_tech_list_content.style.display = "block";
	}
	$("#external_tech_column_choose_menu").dialog("close");
}

function manager_opinion_collapse()
{
	var manager_opinion_list_content = document.getElementById("manager_opinion_list_content");
	if(manager_opinion_list_content.style.display == "block")
	{
		manager_opinion_list_content.style.display = "none";
	}
	else
	{
		manager_opinion_list_content.style.display = "block";
	}
	$("#manager_opinion_column_choose_menu").dialog("close");
}

