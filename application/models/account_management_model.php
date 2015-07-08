<?php
class Account_management_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();  //載入資料庫程式庫
	}	
	
	/**
	get_login_account()：Check the login account is available. (validate using ldap)
	*/	
	public function get_login_account()
	{
		//取得使用者帳密
		$account = $this->input->post('account');		
		$user_login_data = array('account' => $account);
		$query = $this->db->select('id, account, name')->from('login_account')->where($user_login_data)->get();
		return $query->row_array();
	}
	
	/**
	get_column_setting()：取得使用者欄位設定
	*/
	public function get_column_setting($user_id, $class)
	{
		$where_clause = array('user_id' => $user_id, 'class' => $class);
		$query = $this->db->select('*')->from('user_column_setting')->where($where_clause)->get();
		return $query->row_array();
	}
	
	/**
	get_column_setting_ajax()：取得使用者欄位設定
	*/
	public function get_column_setting_ajax($user_id)
	{
		$where_clause = array('user_id' => $user_id);
		$query = $this->db->select('*')->from('user_column_setting')->where($where_clause)->get();
		$result = $query->result_array();
		$json_data = '{"data":[';
		$j=0;
		foreach($result as $index=>$value)
		{
			$json_data .= '{"table_class":"'.$value['class'].'",';			
			for($i=0; $i<7; $i++)
			{
				$json_data .= '"column'.$i.'":"'.$value['column'.($i+1)].'"';
				if($i < 6)
				{
					$json_data .= ',';
				}
			}
			$json_data .= '}';
			if($j < 3)
			{
				$json_data .= ',';
			}
			$j++;
		}		
		$json_data .= ']}';
		return $json_data;
	}
	
	/**
	set_project_column_setting()：設定使用者專案欄位
	*/
	public function set_project_column_setting($user_id, $class, $columns)
	{
		$data = array('column1'=>$columns['column0'],
			'column2'=>$columns['column1'],
			'column3'=>$columns['column2'],
			'column4'=>$columns['column3'],
			'column5'=>$columns['column4'],
			'column6'=>$columns['column5'],
			'column7'=>$columns['column6']);
		$this->db->where('user_id', $user_id);		
		$this->db->where('class', $class);		
		return $this->db->update('user_column_setting', $data);
	}	
	
	/**
	set_news_column_setting()：設定使用者news欄位
	*/
	public function set_news_column_setting($user_id, $class, $columns)
	{
		$data = array('column1'=>$columns['column0'],
			'column2'=>$columns['column1'],
			'column3'=>$columns['column2'],
			'column4'=>$columns['column3'],);
		$this->db->where('user_id', $user_id);		
		$this->db->where('class', $class);		
		return $this->db->update('user_column_setting', $data);
	}
	
	/**
	set_external_tech_column_setting()：設定使用者external tech欄位
	*/
	public function set_external_tech_column_setting($user_id, $class, $columns)
	{
		$data = array('column1'=>$columns['column0'],
			'column2'=>$columns['column1'],
			'column3'=>$columns['column2'],
			'column4'=>$columns['column3'],
			'column5'=>$columns['column4'],
			'column6'=>$columns['column5'],
			'column7'=>$columns['column6']);
		$this->db->where('user_id', $user_id);		
		$this->db->where('class', $class);		
		return $this->db->update('user_column_setting', $data);
	}
	
	/**
	set_manager_opinion_column_setting()：設定使用者manager opinion欄位
	*/
	public function set_manager_opinion_column_setting($user_id, $class, $columns)
	{
		$data = array('column1'=>$columns['column0'],
			'column2'=>$columns['column1'],
			'column3'=>$columns['column2'],
			'column4'=>$columns['column3'],
			'column5'=>$columns['column4'],);
		$this->db->where('user_id', $user_id);		
		$this->db->where('class', $class);		
		return $this->db->update('user_column_setting', $data);
	}

	/**
	set_user_basic_info()：紀錄使用者基本資料
	*/
	public function set_user_basic_info($account, $name)
	{
		$new_record = array('account'=>$account,
			'name'=>$name);			
		$this->db->insert('login_account', $new_record);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	/**
	set_user_personal_setting()：紀錄使用者個人化設定
	*/
	public function set_user_personal_setting($user_id)
	{
		$new_record = array(
			array('user_id'=>$user_id, 'class'=>1, 'column1'=>'idea_name', 'column2'=>'year', 'column3'=>'idea_id', 'column4'=>'proposed_unit', 'column5'=>'proposer', 'column6'=>'established_date', 'column7'=>'progress_description', 'sort_column'=>1, 'sort_method'=>'asc'),
			array('user_id'=>$user_id, 'class'=>2, 'column1'=>'title', 'column2'=>'category', 'column3'=>'description', 'column4'=>'pub_date', 'sort_column'=>1, 'sort_method'=>'asc'),
			array('user_id'=>$user_id, 'class'=>3, 'column1'=>'idea_name', 'column2'=>'year', 'column3'=>'idea_id', 'column4'=>'proposed_unit', 'column5'=>'proposer', 'column6'=>'established_date', 'column7'=>'progress_description', 'sort_column'=>1, 'sort_method'=>'asc'),
			array('user_id'=>$user_id, 'class'=>4, 'column1'=>'topic', 'column2'=>'content', 'column3'=>'in_charge', 'column4'=>'time', 'column5'=>'people','sort_column'=>1, 'sort_method'=>'asc')
		);		
		for($i=0; $i<count($new_record); $i++)
		{
			$this->db->insert('user_column_setting', $new_record[$i]);
		}
		return ;
	}
	
	/**
	set_user_behavior()：紀錄使用者行為
	*/
	public function set_user_behavior($user_id, $page, $cursorX, $cursorY, $trigger_element_id, $search_keyword, $file)
	{
		$new_record = array('user_id'=>$user_id,
			'page'=>$page,
			'pageX'=>$cursorX,
			'pageY'=>$cursorY,
			'trigger_element_id'=>$trigger_element_id,
			'search_keyword'=>$search_keyword,
			'file' => $file);			
		$this->db->insert('user_behavior_log', $new_record);
		return ;
	}
	
	/**
	get_login_account()：Check the login account is available. (validating by DB)
	*/	
	/*public function get_login_account()
	{
		//取得使用者帳密
		$account = $this->input->post('account');
		$password = $this->input->post('passwd');
		$user_login_data = array('account' => $account, 'password' => $password);
		$query = $this->db->select('id, account, surname, given_names')->from('login_account')->where($user_login_data)->get();
		return $query->row_array();
	}*/
}