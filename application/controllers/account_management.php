<?php
class Account_management extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');  //載入Form輔助函數
		$this->load->helper('url');
		$this->load->library('form_validation');  //載入表單驗證程式庫		
		$this->load->model('account_management_model');  //載入已定義的模型與資料庫做連接		
		$this->load->library('../controllers/project');  //載入另一個Controller
	}
	
	/**
	register method：This method is used to check if the user account data is valid and then write into database.
	*/
	public function register()
	{	
		$data['title'] = 'Login';
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('register_account', '註冊帳號', 'trim|xss_clean|required|is_unique[login_account.account]|valid_email');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('register_passwd', '密碼', 'trim|required|matches[confirm_passwd]|md5');
		$this->form_validation->set_rules('confirm_passwd', '再次確認密碼', 'trim|required');
		$this->form_validation->set_rules('identity', '身分', 'trim|required');
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單第一次執行或表單驗證不通過
		{
			$this->load->view('templates/login_header', $data);
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footer');
			/*$this->load->view('templates/header', $data);
			$this->load->view('pages/register');
			$this->load->view('templates/footer');*/
		}
		else  //當表單驗證通過
		{
			$this->news_model->set_news();  //呼叫模型中定義的方法set_news()來新增新聞資料
			$this->load->view('pages/success');
		}
	}	
	
	/**
	login method：This method is used to handle the validation process of user login.
	*/
	public function user_login()
	{		
		if($this->session->userdata('username'))
		{
			$this->session->unset_userdata('username');
		}
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  //給予js位址資訊到要呈現之頁面
		$data['img_location'] = site_url("/application/assets/img");  //給予img位址資訊到要呈現之頁面
		$data['plugins_location'] = site_url("/application/assets/plugins");  //給予img位址資訊到要呈現之頁面
		$data['title'] = 'Login';
		//$this->form_validation->set_error_delimiters('<label style="color:#6600FF">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('account', '帳號', 'trim|xss_clean');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('passwd', '密碼', 'trim|md5');			
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  //給予js位址資訊到要呈現之頁面
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
				$username = $result['surname'].$result['given_names'];
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('first_item', 'year');
				$this->session->set_userdata('second_item', 'idea_name');
				$this->session->set_userdata('third_item', 'proposed_unit');
				$this->session->set_userdata('fourth_item', 'proposer');
				$this->session->set_userdata('fifth_item', 'proposed_date');
				$this->session->set_userdata('sixth_item', 'PM_in_charge');
				$this->session->set_userdata('seventh_item', 'closed_case');
				header('Location:project_list');
				//$this->project->list_all_projects();				
				/*
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pages/project_list', $data);
				$this->load->view('templates/footer');*/
				//儲存使用者帳號至Session中
				//登入基本資料輸入頁面
				//$this->load->view('pages/formsuccess',$data);
				//$this->load->view('templates/header', $data);
				//$this->load->view('pages/register', $data);
				//$this->load->view('pages/login', $data);
				//$this->load->view('templates/footer');
			}
		}
	}
	/**
	使用者登出網站
	*/
	public function user_logout()
	{		
		$this->session->unset_userdata('username');  //刪除使用者存放於session中的登入資料
		header('Location:login');
		//$this->user_login();
	}
	
	public function reg_account_check()
	{
		$account = $this->input->post('account', true);
		$result = $this->account_management_model->get_account($account);
		if(!empty($result))   //帳號密碼輸入錯誤
		{
			echo "該帳號已被註冊!";
		}
	}
	
	public function reg_passwd_check()
	{
		$passwd = $this->input->post('passwd', true);
		$conf_passwd = $this->input->post('conf_passwd', true);
		$result = $this->account_management_model->get_account($account);
		if(!empty($result))   //帳號密碼輸入錯誤
		{
			echo "該帳號已被註冊!";
		}
	}
	
	
	/*public function login_info_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}*/
	
}