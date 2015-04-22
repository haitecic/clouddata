function load_project_list(start_record, order_column, order_method, display_columns)
{
	var sendData = {"column0":display_columns[0],"column1":display_columns[1],"column2":display_columns[2],
		"column3":display_columns[3],"column4":display_columns[4],"column5":display_columns[5],"column6":display_columns[6]};
    $('#project_list_tbl').dataTable( {	
		"searching": false,	  //global search bar
		"sorting": false,
		"order": [ order_column, order_method ],  //ordered column and method
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "data/getTable4",
			"data":{			 	
				"Data":sendData
			},
			"type":'GET'
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
}
