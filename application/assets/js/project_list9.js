var column_mapping = {idea_id:"提案編號", year:"年度", idea_name:"提案名稱", idea_source:"提案來源", scenario_d:"情境說明", function_d:"功能構想", distinction_d:"差異化", value_d:"價值性", feasibility_d:"可行性", stage:"階段狀態", progress_description:"進度說明", proposed_unit:"提案單位", proposer:"提案人", established_date:"立案日期", idea_examination:"提案審核履歷", Idea:"I階段文件檢核", Requirement:"R階段文件檢核", Feasibility:"F階段文件檢核", Prototype:"P階段文件檢核", note:"備註", adoption:"導入車型/先期式樣", applied_patent:"專利申請/取得", resurrection_application_qualified:"具備敗部復活申請資格", resurrection_applied:"敗部復活申請", PM_in_charge:"創意中心窗口", closed_case:"結案"};
var news_column_mapping = {title:"標題", category:"類別", link:"連結", description:"內容摘要", pub_date:"發布日期"};
var manager_opinion_column_mapping = {topic:"討論議題", content:"內容", content:"內容", in_charge:"主辦(承辦)", time:"時間", people:"與會人員"};
var project_list_tbl;
function load_project_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
	project_list_tbl = $('#project_list_tbl').dataTable( {	
		"displayStart": start_record,
		"pageLength": page_length,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		//"aaSorting": [ order_column, order_method ],
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/project_table",
			"data":{			 	
				"Data":sendData
			},
			"async":false,
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(0);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
			{ "name": 0, "orderable": false },
            { "name": 1 },
            { "name": 2 },
            { "name": 3 },
            { "name": 4 },
            { "name": 5 },
            { "name": 6 },
			{ "name": 7 }
        ],
		"oLanguage":{
			"sProcessing":"資料載入中...",
            "sLengthMenu":"顯示筆數: _MENU_ ",
            "sZeroRecords":"找不到符合的結果",
            "sInfo":"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered":"(從 _MAX_ 項結果過濾)",
            "sSearch":"查詢:",
            "oPaginate":{
				"sFirst":"第一頁",
                "sPrevious":"上一頁",
                "sNext":"下一頁",
                "sLast":"最後一頁"}
        }
    } );
	if(is_load == true)	
	{
		var j;
		for(j=0;j<7;j++)
		{
			if((document.getElementById('col_' + j) == null) || (document.getElementById('col_' + j).value == "null"))
			{
				project_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			}
			else if(document.getElementById('col_' + j).value != "null")
			{
				project_list_tbl.fnSetColumnVis( j+1, true, false );			
			}
		}
	}
}

/*var news_list_tbl;
function load_news_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns)
{			
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],	"column3":display_columns[3]};
    news_list_tbl = $('#news_list_tbl').dataTable( {	
		"displayStart": start_record,
		"pageLength": page_length,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/news_table",
			"data":{			 	
				"Data":sendData
			},
			"async":false,
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#news").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0, "orderable": false},
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 }
        ],
		"oLanguage":{
			"sProcessing":"資料載入中...",
            "sLengthMenu":"顯示筆數: _MENU_ ",
            "sZeroRecords":"找不到符合的結果",
            "sInfo":"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered":"(從 _MAX_ 項結果過濾)",
            "sSearch":"查詢:",
            "oPaginate":{
				"sFirst":"第一頁",
                "sPrevious":"上一頁",
                "sNext":"下一頁",
                "sLast":"最後一頁"}
        }
    } );
	if(is_load == true)	
	{
		var j;
		for(j=0;j<4;j++)
		{
			if((document.getElementById('news_col_' + j) == null) || (document.getElementById('news_col_' + j).value == "null"))
			{
				news_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			}
			else if(document.getElementById('news_col_' + j).value != "null")
			{				
				news_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility			
			}			
		}
	}
}*/

var news_list_tbl;
function load_news_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3]};
    news_list_tbl = $('#news_list_tbl').dataTable( {	
		"displayStart": start_record,
		"pageLength": page_length,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/news_table",
			"data":{			 	
				"Data":sendData
			},
			"async":false,
			"type":"GET",
			"complete": function(){
				//$("body").scrollTop(($("#manager_opinion").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0, "orderable": false},
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 }
        ],
		"oLanguage":{
			"sProcessing":"資料載入中...",
            "sLengthMenu":"顯示筆數: _MENU_ ",
            "sZeroRecords":"找不到符合的結果",
            "sInfo":"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered":"(從 _MAX_ 項結果過濾)",
            "sSearch":"查詢:",
            "oPaginate":{
				"sFirst":"第一頁",
                "sPrevious":"上一頁",
                "sNext":"下一頁",
                "sLast":"最後一頁"}
        }
    });
	if(is_load == true)	
	{
		var j;
		for(j=0;j<4;j++)
		{
			if((document.getElementById('news_col_' + j) == null) || (document.getElementById('news_col_' + j).value == "null"))
			{
				news_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			}
			else if(document.getElementById('news_col_' + j).value != "null")
			{
				news_list_tbl.fnSetColumnVis( j+1, true, false );			
			}
		}
	}
}

var external_tech_list_tbl;
function load_external_tech_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns)
{	
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    external_tech_list_tbl = $('#external_tech_list_tbl').dataTable( {	
		"displayStart": start_record,
		"pageLength": page_length,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/external_tech_table",
			"data":{			 	
				"Data":sendData
			},
			"async":false,
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#external_tech").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
			{ "data": 0, "orderable": false},
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
            { "data": 6 },
			{ "data": 7 }
        ],
		"oLanguage":{
			"sProcessing":"資料載入中...",
            "sLengthMenu":"顯示筆數: _MENU_ ",
            "sZeroRecords":"找不到符合的結果",
            "sInfo":"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered":"(從 _MAX_ 項結果過濾)",
            "sSearch":"查詢:",
            "oPaginate":{
				"sFirst":"第一頁",
                "sPrevious":"上一頁",
                "sNext":"下一頁",
                "sLast":"最後一頁"}
        }
    } );
	if(is_load == true)	
	{
		var j;
		for(j=0;j<7;j++)
		{
			if((document.getElementById('external_tech_col_' + j) == null) || (document.getElementById('external_tech_col_' + j).value == "null"))
			{
				external_tech_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			}
			else if(document.getElementById('external_tech_col_' + j).value != "null")
			{
				external_tech_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility			
			}
		}
	}
}

var manager_opinion_list_tbl;
function load_manager_opinion_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns)
{		
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4]};
    manager_opinion_list_tbl = $('#manager_opinion_list_tbl').dataTable( {	
		"displayStart": start_record,
		"pageLength": page_length,
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"oSearch":{"sSearch":search_str},  //initial search string value
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/manager_opinion_table",
			"data":{			 	
				"Data":sendData
			},
			"async":false,
			"type":"GET",
			"complete": function(){
				$("body").scrollTop(($("#manager_opinion").offset().top)-50);  //由該分頁的第一筆紀錄開始瀏覽
			}
		}, 
		"columns": [
            { "data": 0, "orderable": false},
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 }
        ],
		"oLanguage":{
			"sProcessing":"資料載入中...",
            "sLengthMenu":"顯示筆數: _MENU_ ",
            "sZeroRecords":"找不到符合的結果",
            "sInfo":"顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "sInfoEmpty":"顯示第 0 至 0 項結果，共 0 項",
            "sInfoFiltered":"(從 _MAX_ 項結果過濾)",
            "sSearch":"查詢:",
            "oPaginate":{
				"sFirst":"第一頁",
                "sPrevious":"上一頁",
                "sNext":"下一頁",
                "sLast":"最後一頁"}
        }
    });
	if(is_load == true)	
	{
		var j;
		for(j=0;j<5;j++)
		{
			if((document.getElementById('manager_opinion_col_' + j) == null) || (document.getElementById('manager_opinion_col_' + j).value == "null"))
			{
				manager_opinion_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			}
			else if(document.getElementById('manager_opinion_col_' + j).value != "null")
			{
				manager_opinion_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility			
			}
		}
	}
}

function adjust_project_display_column_by_menu()
{
	var is_load = false;
	var start_record = project_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = project_list_tbl.fnPagingInfo().iLength;
	var order = project_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('col_' + i).value;
	}	
	project_list_tbl.fnDestroy();
	load_project_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<7;j++)  //設定表格head名稱
	{			
		if(document.getElementById('col_' + j).value != "null")
		{  			
			project_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
			document.getElementById('pro_col_plain_text_' + j).innerHTML = column_mapping[document.getElementById('col_' + j).value];
			document.getElementById('pro_col_select_box_' + j).value = document.getElementById('col_' + j).value;
			document.getElementById('project_list_foot' + j).innerHTML = column_mapping[document.getElementById('col_' + j).value];
			document.getElementById("pro_col_select_box_" + j).style.display="none";		
			document.getElementById("pro_col_plain_text_" + j).style.display="block";
		}
		else if(document.getElementById('col_' + j).value == "null")
		{								
			document.getElementById('pro_col_plain_text_' + j).innerHTML = "不顯示";
			document.getElementById('pro_col_select_box_' + j).value = "null";
			document.getElementById('project_list_foot' + j).innerHTML = "不顯示";
			project_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
		}
	}
	$("#project_column_choose_menu").dialog("close");	
}

function adjust_news_display_column_by_menu()
{
	var is_load = false;
	var start_record = news_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = news_list_tbl.fnPagingInfo().iLength;
	var order = news_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}	
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<4;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('news_col_' + i).value;
	}	
	news_list_tbl.fnDestroy();
	load_news_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<4;j++)  //設定表格head名稱
	{	
		if(document.getElementById('news_col_' + j).value != "null")
		{  			
			news_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
			document.getElementById('news_col_plain_text_' + j).innerHTML = news_column_mapping[document.getElementById('news_col_' + j).value];
			document.getElementById('news_col_select_box_' + j).value = document.getElementById('news_col_' + j).value;
			document.getElementById('news_list_foot' + j).innerHTML = news_column_mapping[document.getElementById('news_col_' + j).value];
			document.getElementById("news_col_select_box_" + j).style.display="none";		
			document.getElementById("news_col_plain_text_" + j).style.display="block";
		}
		else if(document.getElementById('news_col_' + j).value == "null")
		{						
			document.getElementById('news_col_plain_text_' + j).innerHTML = "不顯示";
			document.getElementById('news_col_select_box_' + j).value = "null";
			document.getElementById('news_list_foot' + j).innerHTML = "不顯示";
			news_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
		}
	}
	$("#news_column_choose_menu").dialog("close");	
}

function adjust_external_tech_display_column_by_menu()
{
	var is_load = false;
	var start_record = external_tech_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = external_tech_list_tbl.fnPagingInfo().iLength;
	var order = external_tech_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('external_tech_col_' + i).value;
	}	
	external_tech_list_tbl.fnDestroy();
	load_external_tech_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<7;j++)  //設定表格head名稱
	{	
		if(document.getElementById('external_tech_col_' + j).value != "null")
		{  			
			external_tech_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
			document.getElementById('external_tech_col_plain_text_' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_' + j).value];
			document.getElementById('external_tech_col_select_box_' + j).value = document.getElementById('external_tech_col_' + j).value;
			document.getElementById('external_tech_list_foot' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_' + j).value];
			document.getElementById("external_tech_col_select_box_" + j).style.display="none";		
			document.getElementById("external_tech_col_plain_text_" + j).style.display="block";
		}
		else if(document.getElementById('external_tech_col_' + j).value == "null")
		{			
			document.getElementById('external_tech_col_plain_text_' + j).innerHTML = "不顯示";
			document.getElementById('external_tech_col_select_box_' + j).value = "null";
			document.getElementById('external_tech_list_foot' + j).innerHTML = "不顯示";
			external_tech_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
		}
	}
	$("#external_tech_column_choose_menu").dialog("close");	
}

function adjust_manager_opinion_display_column_by_menu()
{
	var is_load = false;
	var start_record = manager_opinion_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = manager_opinion_list_tbl.fnPagingInfo().iLength;
	var order = manager_opinion_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;	
	for(i=0;i<5;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('manager_opinion_col_' + i).value;
	}	
	manager_opinion_list_tbl.fnDestroy();
	load_manager_opinion_list(is_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<5;j++)  //設定表格head名稱
	{	
		if(document.getElementById('manager_opinion_col_' + j).value != "null")
		{  			
			manager_opinion_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
			document.getElementById('manager_opinion_col_plain_text_' + j).innerHTML = manager_opinion_column_mapping[document.getElementById('manager_opinion_col_' + j).value];
			document.getElementById('manager_opinion_col_select_box_' + j).value = document.getElementById('manager_opinion_col_' + j).value;
			document.getElementById('manager_opinion_list_foot' + j).innerHTML = manager_opinion_column_mapping[document.getElementById('manager_opinion_col_' + j).value];
			document.getElementById("manager_opinion_col_select_box_" + j).style.display="none";		
			document.getElementById("manager_opinion_col_plain_text_" + j).style.display="block";
		}
		else if(document.getElementById('manager_opinion_col_' + j).value == "null")
		{					
			document.getElementById('manager_opinion_col_plain_text_' + j).innerHTML = "不顯示";
			document.getElementById('manager_opinion_col_select_box_' + j).value = "null";
			document.getElementById('manager_opinion_list_foot' + j).innerHTML = "不顯示";
			manager_opinion_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
		}
	}
	$("#manager_opinion_column_choose_menu").dialog("close");	
}

function adjust_project_display_column_by_column()
{
	var first_load =false;
	var start_record = project_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = project_list_tbl.fnPagingInfo().iLength;
	var order = project_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}	
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('project_list_head' + i) != null)
		{	
			display_columns[display_columns.length] = document.getElementById('pro_col_select_box_' + i).value;	
		}
		else
		{
			display_columns[display_columns.length] = "null";
		}			
	}		
	project_list_tbl.fnDestroy();	
	load_project_list(first_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<7;j++)
	{	
		if(document.getElementById('pro_col_select_box_' + j).value == "null")
		{
			project_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			document.getElementById('col_' + j).value = "null";			
		}
		else if(document.getElementById('pro_col_select_box_' + j).value != "null")
		{				
			document.getElementById('pro_col_plain_text_' + j).innerHTML = column_mapping[document.getElementById('pro_col_select_box_' + j).value];//+ '<div class="sortMask"></div>';
			document.getElementById('project_list_foot' + j).innerHTML = column_mapping[document.getElementById('pro_col_select_box_' + j).value];
			document.getElementById('col_' + j).value = document.getElementById('pro_col_select_box_' + j).value;
			project_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
		}		
	}	
}

function adjust_news_display_column_by_column()
{
	var first_load =false;
	var start_record = news_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = news_list_tbl.fnPagingInfo().iLength;
	var order = news_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;
	for(i=0;i<4;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('news_list_head' + i) != null)
		{	
			display_columns[display_columns.length] = document.getElementById('news_col_select_box_' + i).value;	
		}
		else
		{
			display_columns[display_columns.length] = "null";
		}
	}	
	news_list_tbl.fnDestroy();
	load_news_list(first_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<4;j++)
	{
		if(document.getElementById('news_col_select_box_' + j).value == "null")
		{
			news_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			document.getElementById('news_col_' + j).value = "null";
		}
		else if(document.getElementById('news_col_select_box_' + j).value != "null")
		{				
			document.getElementById('news_col_plain_text_' + j).innerHTML = news_column_mapping[document.getElementById('news_col_select_box_' + j).value];
			document.getElementById('news_list_foot' + j).innerHTML = news_column_mapping[document.getElementById('news_col_select_box_' + j).value];
			document.getElementById('news_col_' + j).value = document.getElementById('news_col_select_box_' + j).value;
			news_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
		}
	}
}

function adjust_external_tech_display_column_by_column()
{
	var first_load =false;
	var start_record = external_tech_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = external_tech_list_tbl.fnPagingInfo().iLength;
	var order = external_tech_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('external_tech_list_head' + i) != null)
		{	
			display_columns[display_columns.length] = document.getElementById('external_tech_col_select_box_' + i).value;	
		}
		else
		{
			display_columns[display_columns.length] = "null";
		}
	}	
	external_tech_list_tbl.fnDestroy();
	load_external_tech_list(first_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<7;j++)
	{
		if(document.getElementById('external_tech_col_select_box_' + j).value == "null")
		{
			external_tech_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			document.getElementById('external_tech_col_' + j).value = "null";
		}
		else if(document.getElementById('external_tech_col_select_box_' + j).value != "null")
		{			
			document.getElementById('external_tech_col_plain_text_' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_select_box_' + j).value];
			document.getElementById('external_tech_list_foot' + j).innerHTML = column_mapping[document.getElementById('external_tech_col_select_box_' + j).value];
			document.getElementById('external_tech_col_' + j).value = document.getElementById('external_tech_col_select_box_' + j).value;
			external_tech_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
		}
	}
}

function adjust_manager_opinion_display_column_by_column()
{
	var first_load =false;
	var start_record = manager_opinion_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var page_length = manager_opinion_list_tbl.fnPagingInfo().iLength;
	var order = manager_opinion_list_tbl.fnSettings().aaSorting;
	if(typeof(order[0][0]) == "undefined")
	{
		order_column = order[0];
	}
	else
	{
		order_column = order[0][0];
	}
	if(typeof(order[0][1]) == "undefined")
	{
		order_method = order[1];
	}
	else
	{
		order_method = order[0][1];
	}
	var display_columns = [];
	var search_str = document.getElementById("search_bar").value;
	var i;
	for(i=0;i<5;i++)  //將所有欄位項目放入陣列中
	{
		if(document.getElementById('manager_opinion_list_head' + i) != null)
		{	
			display_columns[display_columns.length] = document.getElementById('manager_opinion_col_select_box_' + i).value;	
		}
		else
		{
			display_columns[display_columns.length] = "null";
		}
	}	
	manager_opinion_list_tbl.fnDestroy();
	load_manager_opinion_list(first_load, start_record, page_length, order_column, order_method, search_str, display_columns);
	var j;
	for(j=0;j<5;j++)
	{
		if(document.getElementById('manager_opinion_col_select_box_' + j).value == "null")
		{
			manager_opinion_list_tbl.fnSetColumnVis( j+1, false, false );  //設定欄位的 visibility
			document.getElementById('manager_opinion_col_' + j).value = "null";
		}
		else if(document.getElementById('manager_opinion_col_select_box_' + j).value != "null")
		{						
			document.getElementById('manager_opinion_col_plain_text_' + j).innerHTML = manager_opinion_column_mapping[document.getElementById('manager_opinion_col_select_box_' + j).value];
			document.getElementById('manager_opinion_list_foot' + j).innerHTML = manager_opinion_column_mapping[document.getElementById('manager_opinion_col_select_box_' + j).value];
			document.getElementById('manager_opinion_col_' + j).value = document.getElementById('manager_opinion_col_select_box_' + j).value;
			manager_opinion_list_tbl.fnSetColumnVis( j+1, true, false );  //設定欄位的 visibility
		}
	}
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

function edit_project(project_id)
{
	user_behavior_log('row_project_img_'+project_id);
	location.href="project_edit/"+project_id;
}

function link_to_reference(link)
{
	window.open(link);
}

function show_more_content(row)
{	
	if(row.style.whiteSpace == "normal")
	{			
		row.style.whiteSpace = "nowrap";
	}
	else if(row.style.whiteSpace == "nowrap")
	{
		row.style.whiteSpace = "normal";
	}
}

/**
圖表瀏覽功能
*/
function view_chart()
{
	var server_ip_address = document.getElementById("server_ip_address").value;
	var request_url = 'http://'+server_ip_address+'/project_management/get_chart_data';	
	var id = document.getElementById("user_id").value;	
	var search_bar = document.getElementById("search_bar_hidden").value;
	$.ajax({
		url:request_url,  
		data:{
			user_id: id,
			search_keyword: search_bar,
		},
		type:"POST",
		dataType:"json",		
		success:function(json_data){
			//產生(1)圖例項目(2)資料值(開始)
			var legend_count = json_data.year_count;  //圖例項目數量
			var legend = [];  //圖例項目
			var series = [];  //資料值
			for(var i=0;i<legend_count;i++)//legend_count
			{
				legend.push(json_data.year[i].year);
				var data_set = {name:json_data.year[i].year, stack:'sum', type:'bar', itemStyle:{ normal:{label:{show:true, textStyle:{fontSize:'20px',color:'black',align:'right'}, position:'insideRight'}}}, data:json_data.data[i]};
				series.push(data_set);
			}	
			//產生(1)圖例項目(2)資料值(結束)
			//產生資料類別項目開始
			var category_count = json_data.unit_count;  //資料類別數量
			var xaxis = [];  //資料類別項目
			for(var i=0;i<category_count;i++)
			{
				xaxis.push(json_data.unit[i].proposed_unit);
			}			
			//產生資料類別項目結束
			var chart = echarts.init(document.getElementById('view_chart'));
			chart.setOption({
				title : {  //圖表標題
					text: '各部門提案數報表'
				},
				tooltip : {  //滑鼠移到bar上面所要呈現的資訊
					trigger: 'axis',
					axisPointer : {		  
						type : 'shadow'   //滑鼠移到的bar的呈現方式,參數值包含shadow(bar後面呈現陰影),line(直線貫穿整個bar)
					}
				},
				legend: {  //圖例
					selected: {  //預設隱藏的類別
						'2011' : false,
						'2012' : false,
						'2013' : false,
						'2015' : false
					},
					data:legend
				},
				toolbox: {
					show : true,  //顯示(true)或隱藏(false)工具箱
					feature : {  
						mark : {show: true},
						dataView : {show: true, readOnly: false},
						magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
						restore : {show: true},
						saveAsImage : {show: true}
					}
				},
				calculable : true,  //是否讓使用者可以拖曳資料重新計算圖表
				yAxis : [
					{
						type : 'category',
						data : xaxis,
						show : true
					}
				],
				xAxis : [
					{
						type : 'value'/*,
						splitArea : {show : true} */ //Y軸row上有顏色區分標示
					}
				],
				series : series
			});
			document.getElementById("view_chart_block").style.display="block";
			document.getElementById("view_chart_background_mask").style.display="block";
		},
		async:false,
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});    
}
function close_view_chart(trigger_element_id)
{
	document.getElementById("view_chart_block").style.display="none";
	document.getElementById("view_chart_background_mask").style.display="none";
}

/**
圖表瀏覽功能highchart
*/
function view_chart2()
{
	var server_ip_address = document.getElementById("server_ip_address").value;
	var request_url = 'http://'+server_ip_address+'/project_management/get_chart_data';	
	var id = document.getElementById("user_id").value;	
	var search_bar = document.getElementById("search_bar_hidden").value;
	$.ajax({
		url:request_url,  
		data:{
			user_id: id,
			search_keyword: search_bar,
		},
		type:"POST",
		dataType:"json",		
		success:function(json_data){
			//產生(1)圖例項目(2)資料值(開始)
			var legend_count = json_data.year_count;  //圖例項目數量
			var legend = [];  //圖例項目
			var myseries = [];  //資料值			
			for(var i=0;i<legend_count;i++)//legend_count
			{
				legend.push(json_data.year[i].year);
				for (j=0; j<json_data.data[i].length; ++j) {
					json_data.data[i][j] = parseInt(json_data.data[i][j]);
				}
				var data_set = {name:json_data.year[i].year, data:json_data.data[i]};
				myseries.push(data_set);
			}	
			//產生(1)圖例項目(2)資料值(結束)
			//產生資料類別項目開始
			var category_count = json_data.unit_count;  //資料類別數量
			var xaxis = [];  //資料類別項目
			for(var i=0;i<category_count;i++)
			{
				xaxis.push(json_data.unit[i].proposed_unit);
			}	
			//alert(parseInt(myseries[0].data[1]));
			
			console.log(myseries[0].name+':'+myseries[0].data);
			console.log(myseries[1].name+':'+myseries[1].data);
			console.log(myseries[2].name+':'+myseries[2].data);
			console.log(myseries[3].name+':'+myseries[3].data);
			console.log(myseries[4].name+':'+myseries[4].data);
			var options = {  
				chart: {
					renderTo: 'view_chart2',
					type: 'bar'
				},
				title: {
					text: '年度部門提案數'
				},
				xAxis: {
					categories: xaxis					
				},
				yAxis: {
					title: {
						text: '提案數'
					}
				},
				series:myseries					
			};	
			
			/*自訂圖表樣式*/
			Highcharts.theme = {
				colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', 
						'#FF9655', '#FFF263', '#6AF9C4'],
				chart: {
					backgroundColor: {
						linearGradient: [0, 0, 500, 500],
						stops: [
							[0, 'rgb(255, 255, 255)'],
							[1, 'rgb(240, 240, 255)']
						]
					},
				},
				title: {
					style: {
						color: '#000',
						font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
					}
				},
				subtitle: {
					style: {
						color: '#666666',
						font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
					}
				},
			
				legend: {
					itemStyle: {
						font: '9pt Trebuchet MS, Verdana, sans-serif',
						color: 'black'
					},
					itemHoverStyle:{
						color: 'gray'
					}   
				}
			};
			//Highcharts.setOptions(Highcharts.theme);  // Apply the theme
			var chart1 = new Highcharts.Chart(options);			
			document.getElementById("view_chart_block2").style.display="block";
			document.getElementById("view_chart_background_mask2").style.display="block";
		},
		async:false,
		error:function(xhr, status, errorThrown){
			//alert("Sorry, there was a problem!");
			console.log("Error: " + errorThrown);
			console.log("Status: " + status);
			console.dir( xhr );
		},
		complete:function( xhr, status ){
		}
	});    
}
function close_view_chart2(trigger_element_id)
{
	document.getElementById("view_chart_block2").style.display="none";
	document.getElementById("view_chart_background_mask2").style.display="none";
}
/**
開啟pdf檔案預覽功能
*/
function view_file(preview_file, trigger_element_id)
{
	//var file_path = 'http://127.0.0.1/project_management/application/assets/vp_meeting/'+preview_file+'.pdf';
	//var server_ip_address = document.getElementById("server_ip_address").value;
	//var file_path = "http://10.202.120.190/project_management/user_behavior_log";
	var server_ip_address = document.getElementById("server_ip_address").value;
	var file_path = 'http://'+server_ip_address+'/project_management/application/assets/vp_meeting/'+preview_file+'.pdf';
	document.getElementById("pdf_obj").data = file_path;
	document.getElementById("preview_pdf").style.display="block";
	document.getElementById("background_mask").style.display="block";
	//user_behavior_log(trigger_element_id, file_path);	
}
function close_view_file(trigger_element_id)
{
	document.getElementById("preview_pdf").style.display="none";
	document.getElementById("background_mask").style.display="none";
	//user_behavior_log(trigger_element_id, null);
}

/**
使用者行為紀錄-滑鼠游標取得
*/
var global_element;
function user_behavior_log(element_id, browse_file)
{		
	var clientX = event.clientX;
	var clientY = event.clientY;	
	if(event.pageX)
	{
		var pageX = event.pageX;
		var pageY = event.pageY;
	}
	else
	{
		pageX = event.clientX + document.body.scrollLeft;
		pageY = event.clientY + document.body.scrollTop;
	}	
	var server_ip_address = document.getElementById("server_ip_address").value;
	var request_url = 'http://'+server_ip_address+'/project_management/user_behavior_log';
	if(element_id == "body")
	{
		global_element = null;
	}
	else
	{
		global_element = element_id;		
	}	
	var id = document.getElementById("user_id").value;	
	var search_bar = document.getElementById("search_bar_hidden").value;
	$.ajax({
		url:request_url,  
		data:{			 //The data to send(will be converted to a query string)
			user_id: id,
			page: location.pathname.replace('/project_management/',''),
			cursorX: pageX,
			cursorY: pageY,
			trigger_element_id: global_element,
			search_keyword: search_bar,
			file: browse_file
		},
		type:"POST",		 //Whether this is a POST or GET request
		dataType:"text", //回傳的資料型態
		//Code to run if the request succeeds. The response is passed to the function
		success:function(str){
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
		}
	});
}

function pro_show_select_box(value)
{
	$('#pro_col_select_box_'+value).mouseover(function(){  //change
		$("#width_tmp").html($('#pro_col_select_box_'+value+' option:selected').text());
		$(this).width($("#width_tmp").width()+38); // 35 : the size of the down arrow of the select box 
	});
	document.getElementById("pro_col_select_box_"+value).style.display="block";		
	document.getElementById("pro_col_plain_text_"+value).style.display="none";
}
//project_edit
function check_project_data(id)
{
	var is_checked = document.getElementById('is_checked').value;
	if(is_checked == 2)  //尚未確認時
	{
		var be_checked;
		be_checked = confirm("專案資料確認後，將無法修改專案資料(和附加檔案)，您確定要完成確認動作嗎?");
		if (be_checked == true) 
		{
			var server_ip_address = document.getElementById("server_ip_address").value;
			var request_url = 'http://'+server_ip_address+'/project_management/check_project_data';
			$.ajax({
				url:request_url,  
				data:{
					project_id: id
				},
				type:"POST",
				dataType:"text",
				success:function(message){
					document.getElementById('check_hint_message').style.color = "blue";
					document.getElementById('check_hint_message').style.cursor = "default";
					document.getElementById('check_box').style.cursor = "default";					
					//隱藏拖曳檔案區塊			
					document.getElementById('dragandrophandler').style.display = "none";					
					document.getElementById('file_list').style.display = "none";
					//隱藏「確認送出」按鈕		
					document.getElementById('submit_btn_block').style.display = "none";
					document.getElementById('check_box').checked = true;
					document.getElementById('check_hint_message').innerHTML = message;	
					document.getElementById('is_checked').value = 1;
				},
				async:false,
				error:function(xhr, status, errorThrown){
					console.log("Error: " + errorThrown);
					console.log("Status: " + status);
					console.dir( xhr );
				},
				complete:function( xhr, status ){
				}
			});
		} 
		else 
		{
			document.getElementById('check_box').checked = false;
		}	
	}
	else if(is_checked == 1)
	{
		return false;
	}
}