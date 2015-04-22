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
		$this->load->database();
	}
	
	public function index()
    {
		$this->load->view('index');
    }
	
	public function getTable()
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        //$aColumns = array('id', 'first_name', 'last_name');
        $aColumns = array('id', 'idea_name', 'km_id', 'idea_source', 'idea_description', 'scenario_d', 'function_d', 'value_d');

        // DB table to use
        $sTable = 'project_all';
        //
    
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);
    
        // Paging
        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($this->db->escape_str($iDisplayLength), $this->db->escape_str($iDisplayStart));
        }
        
        // Ordering
        if(isset($iSortCol_0))
        {
            for($i=0; $i<intval($iSortingCols); $i++)
            {
                $iSortCol = $this->input->get_post('iSortCol_'.$i, true);
                $bSortable = $this->input->get_post('bSortable_'.intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_'.$i, true);
    
                if($bSortable == 'true')
                {
                    $this->db->order_by($aColumns[intval($this->db->escape_str($iSortCol))], $this->db->escape_str($sSortDir));
                }
            }
        }
        
        /* 
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if(isset($sSearch) && !empty($sSearch))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                if(isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($sSearch));
                }
            }
        }
        
        // Select Data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $rResult = $this->db->get($sTable);
    
        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;
    
        // Total data set length
        $iTotal = $this->db->count_all($sTable);
    
        // Output
        $output = array(
            'sEcho' => intval($sEcho),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }
    
            $output['aaData'][] = $row;
        }
    
        echo json_encode($output);
    }
	
	public function getTable3()
    {
		echo '{ "draw": 1, "recordsTotal": 57, "recordsFiltered": 57, "data": [ { "name": "Tiger Nixon", "position": "System Architect", "salary": "$320,800", "start_date": "2011/04/25", "office": "Edinburgh", "extn": "5421" }, { "name": "Garrett Winters", "position": "Accountant", "salary": "$170,750", "start_date": "2011/07/25", "office": "Tokyo", "extn": "8422" }, { "name": "Ashton Cox", "position": "Junior Technical Author", "salary": "$86,000", "start_date": "2009/01/12", "office": "San Francisco", "extn": "1562" }, { "name": "Cedric Kelly", "position": "Senior Javascript Developer", "salary": "$433,060", "start_date": "2012/03/29", "office": "Edinburgh", "extn": "6224" }, { "name": "Airi Satou", "position": "Accountant", "salary": "$162,700", "start_date": "2008/11/28", "office": "Tokyo", "extn": "5407" }, { "name": "Brielle Williamson", "position": "Integration Specialist", "salary": "$372,000", "start_date": "2012/12/02", "office": "New York", "extn": "4804" }, { "name": "Herrod Chandler", "position": "Sales Assistant", "salary": "$137,500", "start_date": "2012/08/06", "office": "San Francisco", "extn": "9608" }, { "name": "Rhona Davidson", "position": "Integration Specialist", "salary": "$327,900", "start_date": "2010/10/14", "office": "Tokyo", "extn": "6200" }, { "name": "Colleen Hurst", "position": "Javascript Developer", "salary": "$205,500", "start_date": "2009/09/15", "office": "San Francisco", "extn": "2360" }, { "name": "Sonya Frost", "position": "Software Engineer", "salary": "$103,600", "start_date": "2008/12/13", "office": "Edinburgh", "extn": "1667" } ] }';
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
				$this->session->set_userdata('first_item', 'idea_name');
				$this->session->set_userdata('second_item', 'year');
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