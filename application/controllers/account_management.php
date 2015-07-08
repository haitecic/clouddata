<?php
class Account_management extends MY_Controller{//CI_Controller{
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');  //載入表單驗證程式庫		
		$this->load->model('account_management_model');  //載入已定義的模型與資料庫做連接		
		$this->load->library('../controllers/project');  //載入另一個Controller
		$this->load->database();		
	}
	
	//首頁
	public function index()
    {			
		$data = $this->resource_path;
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$this->load->view('templates/index_header', $data);
		$this->load->view('pages/index', $data);
		$this->load->view('templates/index_footer', $data);
    }		
	
	public function user_login()
	{	
		if($this->session->userdata('username'))  //登入後返回至登入畫面
		{
			$this->session->unset_userdata('username');
			header('Location:index');
		}
		$data = $this->resource_path;		
		$data['title'] = 'Login';		
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('account', '帳號', 'trim|xss_clean');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('passwd', '密碼', 'trim|xss_clean');		
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //表單驗證不通過
		{
			$this->load->view('templates/login_header', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/login_footer');
		}
		else  //表單驗證通過
		{
			$login_success = false;
			$account = $this->input->post('account');
			$passwd = $this->input->post('passwd');
			if(!empty($account) && !empty($passwd))  //判斷使用者是否有輸入帳號密碼
			{
				//ldap驗證登入帳密
				$ad_server = '10.202.112.2';
				$port = '389';  
				$conn_account      = '陳健發';
				$conn_password     = 'AZSXDCFV';
				$ldap_tree    = "CN=$conn_account,OU=BCDXX,OU=IA_User,DC=IA,DC=COM,DC=TW"; 
				$search_tree    = "DC=IA,DC=COM,DC=TW";
				$ldap_conn = ldap_connect($ad_server, $port) or die("Failed to connect the AD server !");
				ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
				ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
				if($ldap_conn) 
				{				
					$ldap_bind = @ldap_bind($ldap_conn, $ldap_tree, $conn_password);
					if ($ldap_bind) 
					{							
						$result = ldap_search($ldap_conn, $search_tree, "(sn=$account)");
						$user_ldap_data = ldap_get_entries($ldap_conn, $result);
						$user_ldap_name = $user_ldap_data[0]["distinguishedname"][0];  //取得使用者ldap的名稱
						ldap_close($ldap_conn);
						$ldap_conn = ldap_connect($ad_server, $port) or die("Failed to connect to the LDAP server.");
						ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
						ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
						if($ldap_conn) 
						{								
							$ldapbind = @ldap_bind($ldap_conn, $user_ldap_name, $passwd);
							if($ldapbind)
							{
								$result = ldap_search($ldap_conn, $search_tree, "(sn=$account)");
								$user_ldap_data = ldap_get_entries($ldap_conn, $result);
								$username = $user_ldap_data[0]["name"][0];
								$result = $this->account_management_model->get_login_account();					
								if(empty($result))   //帳號不存在於資料表中
								{
									$user_id = $this->account_management_model->set_user_basic_info($account, $name);
									$this->account_management_model->set_user_personal_setting($user_id);						
								}
								else
								{
									$user_id = $result['id'];						
								}			
								ldap_close($ldap_conn);												
								$this->session->set_userdata('user_id', $user_id);  //儲存使用者資料至session
								$this->session->set_userdata('username', $username);											
								$this->session->set_userdata('project_start_record', 0);  //從第幾筆資料開始呈現(瀏覽的分頁)
								$this->session->set_userdata('project_display_length', 10);  //一頁顯示筆數
								$this->session->set_userdata('project_order_column', 1);  //排序欄位
								$this->session->set_userdata('project_order_method', "asc");  //排序方式
								$this->session->set_userdata('news_start_record', 0);
								$this->session->set_userdata('news_display_length', 10);
								$this->session->set_userdata('news_order_column', 1);
								$this->session->set_userdata('news_order_method', "asc");
								$this->session->set_userdata('external_tech_start_record', 0);
								$this->session->set_userdata('external_tech_display_length', 10);
								$this->session->set_userdata('external_tech_order_column', 1);
								$this->session->set_userdata('external_tech_order_method', "asc");
								$this->session->set_userdata('manager_opinion_start_record', 0);
								$this->session->set_userdata('manager_opinion_display_length', 10);
								$this->session->set_userdata('manager_opinion_order_column', 1);
								$this->session->set_userdata('manager_opinion_order_method', "asc");								
								$login_success = true;								
							}
						}					
					}
				}
			}			
			if($login_success)
			{
				header('Location:project_list');
			}
			else
			{
				$data['error_message'] = "帳號密碼輸入錯誤!";
				$this->load->view('templates/login_header', $data);
				$this->load->view('pages/login', $data);
				$this->load->view('templates/login_footer');
			}
		}
	}	
	
	//登出網站	
	public function user_logout()
	{		
		$this->session->unset_userdata('username');  //刪除使用者存放於session中的登入資料
		$this->session->unset_userdata('search_bar');  //紀錄使用者搜尋內容
		$this->session->unset_userdata('project_start_record');  //從第幾筆資料開始呈現(瀏覽的分頁)
		//$this->session->unset_userdata('project_display_length');  //一頁顯示筆數
		//$this->session->unset_userdata('project_order_column');  //排序欄位
		//$this->session->unset_userdata('project_order_method');  //排序方式
		$this->session->unset_userdata('news_start_record');
		//$this->session->unset_userdata('news_display_length');
		//$this->session->unset_userdata('news_order_column');
		//$this->session->unset_userdata('news_order_method');
		$this->session->unset_userdata('external_tech_start_record');
		//$this->session->unset_userdata('external_tech_display_length');
		//$this->session->unset_userdata('external_tech_order_column');
		//$this->session->unset_userdata('external_tech_order_method');
		$this->session->unset_userdata('manager_opinion_start_record');
		//$this->session->unset_userdata('manager_opinion_display_length');
		//$this->session->unset_userdata('manager_opinion_order_column');
		//$this->session->unset_userdata('manager_opinion_order_method');
		header('Location:login');		
	}
		
	//user_behavior_log():使用者行為紀錄		
	public function user_behavior_log()
	{			
		$user_id = $this->input->post('user_id');
		$page = $this->input->post('page');
		$cursorX = $this->input->post('cursorX');
		$cursorY = $this->input->post('cursorY');
		$trigger_element_id = $this->input->post('trigger_element_id');
		$search_keyword = $this->input->post('search_keyword');
		$this->session->set_userdata('search_bar', $search_keyword);  //紀錄使用者搜尋內容		
		$file = $this->input->post('file');		
		$this->account_management_model->set_user_behavior($user_id, $page, $cursorX, $cursorY, $trigger_element_id, $search_keyword, $file);
	}	
	
	//user_column_setting():使用者欄位設定	
	public function user_column_setting()
	{
		$user_id = $this->input->post('user_id');
		$json_data = $this->account_management_model->get_column_setting_ajax($user_id);
		echo $json_data;
	}
	
	public function set_start_record()
	{		
		$start_record = $this->input->post('start_record');
		$this->session->set_userdata('project_start_record', $start_record);
		$this->session->set_userdata('news_start_record', $start_record);
		$this->session->set_userdata('external_tech_start_record', $start_record);
		$this->session->set_userdata('manager_opinion_start_record', $start_record);
	}	
	
	
	/**
	登入網站(Validating by DB)
	*/
	/*public function user_login()
	{	
		if($this->session->userdata('username'))  //登入後返回至登入畫面
		{
			$this->session->unset_userdata('username');
			header('Location:index');
		}
		$data = $this->resource_path;		
		$data['title'] = 'Login';
		//$this->form_validation->set_error_delimiters('<label style="color:#6600FF">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('account', '帳號', 'trim|xss_clean');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('passwd', '密碼', 'trim|md5');	
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/login_header', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/login_footer');
		}
		else  //當表單驗證通過
		{
			$result = $this->account_management_model->get_login_account();
			if(empty($result))   //帳號密碼輸入錯誤
			{
				//輸出錯誤訊息
				$data['error_message'] = "帳號密碼輸入錯誤!";
				//返回登入頁面,並告知錯誤訊息
				$this->load->view('templates/login_header', $data);
				$this->load->view('pages/login', $data);
				$this->load->view('templates/login_footer');
			}
			else   //帳號密碼輸入正確
			{
				//儲存至Session中
				$user_id = $result['id'];
				$username = $result['surname'].$result['given_names'];
				$this->session->set_userdata('user_id', $user_id);
				$this->session->set_userdata('username', $username);
				//project_list初始設定				
				$this->session->set_userdata('project_start_record', 0);  //從第幾筆資料開始呈現(瀏覽的分頁)
				$this->session->set_userdata('project_display_length', 10);  //一頁顯示筆數
				$this->session->set_userdata('project_order_column', 1);  //排序欄位
				$this->session->set_userdata('project_order_method', "asc");  //排序方式
				$this->session->set_userdata('news_start_record', 0);
				$this->session->set_userdata('news_display_length', 10);
				$this->session->set_userdata('news_order_column', 1);
				$this->session->set_userdata('news_order_method', "asc");
				$this->session->set_userdata('external_tech_start_record', 0);
				$this->session->set_userdata('external_tech_display_length', 10);
				$this->session->set_userdata('external_tech_order_column', 1);
				$this->session->set_userdata('external_tech_order_method', "asc");
				$this->session->set_userdata('manager_opinion_start_record', 0);
				$this->session->set_userdata('manager_opinion_display_length', 10);
				$this->session->set_userdata('manager_opinion_order_column', 1);
				$this->session->set_userdata('manager_opinion_order_method', "asc");
				header('Location:project_list');				
			}
		}
	}*/
}