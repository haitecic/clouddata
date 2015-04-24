var project_list_tbl;
function load_project_list(start_record, order_column, order_method, display_columns)
{
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    project_list_tbl = $('#project_list_tbl').dataTable( {	
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
		"displayStart": start_record,
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
			project_list_tbl.fnSetColumnVis( i, false );  //設定欄位的 visibility
		}
	}
}

function collapse()
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
	$("#column_choose_menu").dialog("close");
}

function adjust_display_column()
{
	var start_record = project_list_tbl.fnPagingInfo().iStart;  //取得目前分頁開始之第一筆紀錄
	var order_column = 0;
	var order_method = "asc";
	var display_columns = [];
	var i;	
	for(i=0;i<7;i++)  //將所有欄位項目放入陣列中
	{
		display_columns[display_columns.length] = document.getElementById('col_' + i).value;
	}
	table = $('#project_list_tbl').dataTable();
	table.fnDestroy();
	load_project_list(start_record, order_column, order_method, display_columns);
	$("#column_choose_menu").dialog("close");
}

