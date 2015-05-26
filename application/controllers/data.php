<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
		$this->load->model('project_model');  //載入已定義的模型與資料庫做連接
		$this->load->model('account_management_model');  //載入已定義的模型與資料庫做連接
    }
    
	public function project_table()
    {	
		//Array of database columns which should be read and sent back to DataTables. Use a space where
        //you want to insert a non-database field (for example a counter or static image)
        //
        $obj = $_GET['Data'];
		$columns = array();
		//將列表所要的欄位記錄在session中
		//$this->session->set_userdata('project_first_item', $obj['column0']);
		//$this->session->set_userdata('project_second_item', $obj['column1']);
		//$this->session->set_userdata('project_third_item', $obj['column2']);
		//$this->session->set_userdata('project_fourth_item', $obj['column3']);
		//$this->session->set_userdata('project_fifth_item', $obj['column4']);
		//$this->session->set_userdata('project_sixth_item', $obj['column5']);
		//$this->session->set_userdata('project_seventh_item', $obj['column6']);
		$this->account_management_model->set_project_column_setting(1, 1, $obj);//$user_id, $class, obj
		array_push($columns, 'id');
		for($i=0; $i<7;$i++)
		{
		//	if($obj['column'.$i] != "null")
		//	{
				array_push($columns, $obj['column'.$i]);
		//	}
		}
		//$columns = array($obj['column0'], $obj['column1'], $obj['column2'], $obj['column3'], $obj['column4'], $obj['column5'], $obj['column6']);
        // DB table to use
        $DB_table = 'project_all';        
		
        //$iDisplayStart = $this->input->get_post('iDisplayStart', true);
        //$iDisplayLength = $this->input->get_post('iDisplayLength', true);
        //$iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        //$iSortingCols = $this->input->get_post('iSortingCols', true);  //Number of columns to sort on
        //$sSearch = $this->input->get_post('sSearch', true);
        //$sEcho = $this->input->get_post('sEcho', true);
		
		$start_record = $this->input->get_post('start', true);
        $display_length = $this->input->get_post('length', true);  //get the data table show length
        $order = $this->input->get_post('order', true);  //取得排序的欄位編號,編號由0開始,欄位由左至右算
		$order_column = $order['0']['column'];
		$order_method = $order['0']['dir'];
		//$iSortingCols = $this->input->get_post('iSortingCols', true);
        $global_search = $this->input->get_post('search', true);  //取得datatable中global search bar的值
		$search = $global_search['value'];
        $draw = $this->input->get_post('draw', true);  //第幾次操作datatable
		//將表單設定記錄在session中
		$this->session->set_userdata('project_start_record', $start_record);  
		$this->session->set_userdata('project_display_length', $display_length);
		$this->session->set_userdata('project_order_column', $order_column);
		$this->session->set_userdata('project_order_method', $order_method);		
		
		$parameter = array('draw'=>$draw,'start_record'=>$start_record, 'display_length'=>$display_length, 'order_column'=>$order_column, 'order_method'=>$order_method, 'search'=>$search);		
		
		$json_data = $this->project_model->get_project_datatable_record($parameter, $DB_table, $columns);
		echo $json_data;
		//echo '{"draw": 1, "recordsTotal": 3, "recordsFiltered": 3, "data": {["0":"Tiger Nixon", "1":"System Architect", "2":"$320,800", "3":"2011/04/25", "4":"Edinburgh", "5":"5421", "6":"5421" ], ["0":"Tiger Nixon", "1":"System Architect", "2":"$320,800", "3":"2011/04/25", "4":"Edinburgh", "5":"5421", "6":"5421" ], ["0":"Tiger Nixon", "1":"System Architect", "2":"$320,800", "3":"2011/04/25", "4":"Edinburgh", "5":"5421", "6":"5421" ]}}';
		
		/*
		// Ordering
        if(isset($order_column))
        {
			$this->db->order_by($columns[intval($this->db->escape_str($order_column))], $this->db->escape_str($order_method));
            //for($i=0; $i<intval($iSortingCols); $i++)
            //{
            //    $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
            //    $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
            //    $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
            //
            //    if($bSortable == 'true')
            //    {
            //        $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
            //    }
            //}
        }
        
        //
        //Filtering
        //NOTE this does not match the built-in DataTables filtering which does it
        //word by word on any field. It's possible to do here, but concerned about efficiency
        //on very large tables, and MySQL's regex functionality is very limited
        //
        if(isset($search) && !empty($search))
        {
            for($i=0; $i<count($columns); $i++)
            {
                //$bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                //if(isset($bSearchable) && $bSearchable == 'true')
                //{
                    $this->db->or_like($columns[$i], $this->db->escape_like_str($search));
                //}
            }
        }
        $this->db->limit($display_length, $start_record);
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $columns)), false);
        $rResult = $this->db->get($DB_table);
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($DB_table);
    
        // Output
        //$output = array(
        //    'sEcho' => intval($sEcho),
        //    'iTotalRecords' => $iTotal,
        //    'iTotalDisplayRecords' => $iFilteredTotal,
        //    'aaData' => array()
        //);
		
		$output = array(
            'draw' => intval($draw),
            'recordsTotal' => intval($iTotal),
            'recordsFiltered' => intval($iFilteredTotal),
            'data' => array()
        );
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($columns as $col)
            {
                $row[$col] = $aRow[$col];
            }
    
            $output['data'][] = $row;
        }		
		
        echo json_encode($output);
		*/
		//echo '{ "draw": 2, "recordsTotal": 57, "recordsFiltered": 57, "data": [ { "name": "Tiger Nixon", "position": "System Architect", "salary": "$320,800", "start_date": "2011/04/25", "office": "Edinburgh", "extn": "5421" }, { "name": "Garrett Winters", "position": "Accountant", "salary": "$170,750", "start_date": "2011/07/25", "office": "Tokyo", "extn": "8422" }, { "name": "Ashton Cox", "position": "Junior Technical Author", "salary": "$86,000", "start_date": "2009/01/12", "office": "San Francisco", "extn": "1562" }, { "name": "Cedric Kelly", "position": "Senior Javascript Developer", "salary": "$433,060", "start_date": "2012/03/29", "office": "Edinburgh", "extn": "6224" }, { "name": "Airi Satou", "position": "Accountant", "salary": "$162,700", "start_date": "2008/11/28", "office": "Tokyo", "extn": "5407" }, { "name": "Brielle Williamson", "position": "Integration Specialist", "salary": "$372,000", "start_date": "2012/12/02", "office": "New York", "extn": "4804" }, { "name": "Herrod Chandler", "position": "Sales Assistant", "salary": "$137,500", "start_date": "2012/08/06", "office": "San Francisco", "extn": "9608" }, { "name": "Rhona Davidson", "position": "Integration Specialist", "salary": "$327,900", "start_date": "2010/10/14", "office": "Tokyo", "extn": "6200" }, { "name": "Colleen Hurst", "position": "Javascript Developer", "salary": "$205,500", "start_date": "2009/09/15", "office": "San Francisco", "extn": "2360" }, { "name": "Sonya Frost", "position": "Software Engineer", "salary": "$103,600", "start_date": "2008/12/13", "office": "Edinburgh", "extn": "1667" } ] }';
		//echo '{"draw":1,"recordsTotal":1188,"recordsFiltered":1188,"data":[{"1":"6671","2":"MPV I-Key Case\u9ad8\u8cea\u611f","salary":"33784","start_date":"\u5be6\u969b\u4f7f\u7528\u7d93\u9a57","office":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002","extn":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002"},{"name":"6671","position":"MPV I-Key Case\u9ad8\u8cea\u611f","salary":"33784","start_date":"\u5be6\u969b\u4f7f\u7528\u7d93\u9a57","office":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002","extn":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002"},{"name":"6671","position":"MPV I-Key Case\u9ad8\u8cea\u611f","salary":"33784","start_date":"\u5be6\u969b\u4f7f\u7528\u7d93\u9a57","office":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002","extn":"\u85c9\u7531\u5bcc\u58eb\u5eb7\u5728\u4ee3\u5de5I-Phone case\u7684\u6210\u529f\u7d93\u9a57\uff0c\u8acb\u5176\u70ba\u7d0d\u667a\u5091\u4e4bI-Key case\u63d0\u51fa\u65b0\u9020\u578b\u53cacase\u7684\u88fd\u4f5c\uff0c\u4ee5\u63d0\u5347\u73fe\u6709I-Key\u4e4b\u8cea\u611f\u3002"}]}';
	}
	public function news_table()
    {	
        $obj = $_GET['Data'];
		$columns = array();
		//將列表所要的欄位記錄在session中
		//$this->session->set_userdata('news_second_item', $obj['column1']);
		//$this->session->set_userdata('news_third_item', $obj['column2']);
		//$this->session->set_userdata('news_fourth_item', $obj['column3']);
		//$this->session->set_userdata('news_fifth_item', $obj['column4']);
		//$this->session->set_userdata('news_sixth_item', $obj['column5']);
		//$this->session->set_userdata('news_seventh_item', $obj['column6']);
		$this->account_management_model->set_news_column_setting(1, 2, $obj);
		array_push($columns, 'id');
		for($i=0; $i<7;$i++)
		{
			array_push($columns, $obj['column'.$i]);
		}
        $DB_table = 'project_all'; 
		$start_record = $this->input->get_post('start', true);
        $display_length = $this->input->get_post('length', true);  //get the data table show length
        $order = $this->input->get_post('order', true);  //取得排序的欄位編號,編號由0開始,欄位由左至右算
		$order_column = $order['0']['column'];
		$order_method = $order['0']['dir'];
        $global_search = $this->input->get_post('search', true);  //取得datatable中global search bar的值
		$search = $global_search['value'];
        $draw = $this->input->get_post('draw', true);  //第幾次操作datatable
		$this->session->set_userdata('news_start_record', $start_record);  
		$this->session->set_userdata('news_display_length', $display_length);
		$this->session->set_userdata('news_order_column', $order_column);
		$this->session->set_userdata('news_order_method', $order_method);		
		$parameter = array('draw'=>$draw,'start_record'=>$start_record, 'display_length'=>$display_length, 'order_column'=>$order_column, 'order_method'=>$order_method, 'search'=>$search);		
		$json_data = $this->project_model->get_news_datatable_record($parameter, $DB_table, $columns);
		echo $json_data;
	}	
	
	public function external_tech_table()
    {	
        $obj = $_GET['Data'];
		$columns = array();
		//將列表所要的欄位記錄在session中
		//$this->session->set_userdata('external_tech_first_item', $obj['column0']);
		//$this->session->set_userdata('external_tech_second_item', $obj['column1']);
		//$this->session->set_userdata('external_tech_third_item', $obj['column2']);
		//$this->session->set_userdata('external_tech_fourth_item', $obj['column3']);
		//$this->session->set_userdata('external_tech_fifth_item', $obj['column4']);
		//$this->session->set_userdata('external_tech_sixth_item', $obj['column5']);
		//$this->session->set_userdata('external_tech_seventh_item', $obj['column6']);
		$this->account_management_model->set_external_tech_column_setting(1, 3, $obj);
		array_push($columns, 'id');
		for($i=0; $i<7;$i++)
		{
			array_push($columns, $obj['column'.$i]);
		}
        $DB_table = 'project_all'; 
		$start_record = $this->input->get_post('start', true);
        $display_length = $this->input->get_post('length', true);  //get the data table show length
        $order = $this->input->get_post('order', true);  //取得排序的欄位編號,編號由0開始,欄位由左至右算
		$order_column = $order['0']['column'];
		$order_method = $order['0']['dir'];
        $global_search = $this->input->get_post('search', true);  //取得datatable中global search bar的值
		$search = $global_search['value'];
        $draw = $this->input->get_post('draw', true);  //第幾次操作datatable		
		$parameter = array('draw'=>$draw,'start_record'=>$start_record, 'display_length'=>$display_length, 'order_column'=>$order_column, 'order_method'=>$order_method, 'search'=>$search);		
		$this->session->set_userdata('external_tech_start_record', $start_record);  
		$this->session->set_userdata('external_tech_display_length', $display_length);
		$this->session->set_userdata('external_tech_order_column', $order_column);
		$this->session->set_userdata('external_tech_order_method', $order_method);
		$json_data = $this->project_model->get_external_tech_datatable_record($parameter, $DB_table, $columns);
		echo $json_data;
	}
	
	public function manager_opinion_table()
    {	
        $obj = $_GET['Data'];
		$columns = array();
		//將列表所要的欄位記錄在session中
		//$this->session->set_userdata('manager_opinion_first_item', $obj['column0']);
		//$this->session->set_userdata('manager_opinion_second_item', $obj['column1']);
		//$this->session->set_userdata('manager_opinion_third_item', $obj['column2']);
		//$this->session->set_userdata('manager_opinion_fourth_item', $obj['column3']);
		//$this->session->set_userdata('manager_opinion_fifth_item', $obj['column4']);
		$this->account_management_model->set_manager_opinion_column_setting(1, 4, $obj);
		array_push($columns, 'id');
		for($i=0; $i<5;$i++)
		{
			array_push($columns, $obj['column'.$i]);
		}
        $DB_table = 'vp_meeting'; 
		$start_record = $this->input->get_post('start', true);
        $display_length = $this->input->get_post('length', true);  //get the data table show length
        $order = $this->input->get_post('order', true);  //取得排序的欄位編號,編號由0開始,欄位由左至右算
		$order_column = $order['0']['column'];
		$order_method = $order['0']['dir'];
        $global_search = $this->input->get_post('search', true);  //取得datatable中global search bar的值
		$search = $global_search['value'];
        $draw = $this->input->get_post('draw', true);  //第幾次操作datatable
		$this->session->set_userdata('manager_opinion_start_record', $start_record);  
		$this->session->set_userdata('manager_opinion_display_length', $display_length);
		$this->session->set_userdata('manager_opinion_order_column', $order_column);
		$this->session->set_userdata('manager_opinion_order_method', $order_method);		
		$parameter = array('draw'=>$draw,'start_record'=>$start_record, 'display_length'=>$display_length, 'order_column'=>$order_column, 'order_method'=>$order_method, 'search'=>$search);		
		$json_data = $this->project_model->get_manager_opinion_datatable_record($parameter, $DB_table, $columns);
		echo $json_data;
	}		
}
?>