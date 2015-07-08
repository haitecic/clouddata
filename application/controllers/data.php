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
        $obj = $_GET['Data'];
		$columns = array();		
		$this->account_management_model->set_project_column_setting($this->session->userdata('user_id'), 1, $obj);//$user_id, $class, obj
		array_push($columns, 'id');
		for($i=0; $i<7;$i++)
		{
			array_push($columns, $obj['column'.$i]);		
		}
        // DB table to use
        $DB_table = 'project_all';		
		$start_record = $this->input->get_post('start', true);
        $display_length = $this->input->get_post('length', true);  //get the data table show length
        $order = $this->input->get_post('order', true);  //取得排序的欄位編號,編號由0開始,欄位由左至右算
		$order_column = $order['0']['column'];
		$order_method = $order['0']['dir'];
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
	}
	
	public function news_table()
    {	
        $obj = $_GET['Data'];
		$columns = array();		
		//$this->account_management_model->set_news_column_setting(1, 2, $obj);
		$this->account_management_model->set_news_column_setting($this->session->userdata('user_id'), 2, $obj);
		array_push($columns, 'id');
		for($i=0; $i<4;$i++)
		{
			array_push($columns, $obj['column'.$i]);
		}
        $DB_table = 'news'; 
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
		$this->account_management_model->set_external_tech_column_setting($this->session->userdata('user_id'), 3, $obj);
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
		$this->account_management_model->set_manager_opinion_column_setting($this->session->userdata('user_id'), 4, $obj);
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