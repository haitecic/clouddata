<?php
class Project extends MY_Controller{
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('file');
		$this->load->library('parser');  //在view中使用樣板引擎
		$this->load->library('form_validation');  //載入表單驗證程式庫
		$this->load->library('typography');	
		$this->load->helper('html');  		
		$this->load->model('project_model');  //載入已定義的模型與資料庫做連接	
		$this->load->model('account_management_model');  //載入已定義的模型與資料庫做連接		
		$this->load->database();
		//$this->output->cache(180);
		//取消快取	
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');  
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	/**
	search_form_index():在首頁進行搜尋
	*/
	public function search_form_index()
	{
		if(!$this->session->userdata('username'))  //尚未登入
		{	
			$search_bar = $this->input->post('index_search_bar');
			$this->session->set_userdata('search_bar', $search_bar);  //記錄搜尋內容至session中
			header('Location:login');
		}
		else  //已登入
		{
			$search_bar = $this->input->post('index_search_bar');
			$this->session->set_userdata('search_bar', $search_bar);
			header('Location:project_list');
		}
	}
	
	/**
	list_all_projects():專案(提案)、News、高階意見資料呈現
	*/
	public function list_all_projects($search_bar=null)  //瀏覽所有專案資料 $page = 0, $search_bar=null,$message=''
	{			
		if(!$this->session->userdata('username'))  //判斷使用者是否由login頁面登入
		{	
			redirect('login');
		}	
		$data = $this->resource_path;		
		$data['title'] = '專案管理';
		$user_id = $this->session->userdata('user_id');
		$data['user_id'] = $user_id;
		$data['username'] = $this->session->userdata('username');
		$search = $this->session->userdata('search_bar');
		$data['search'] = $search;
		$data['project_start_record'] = $this->session->userdata('project_start_record');  //從第幾筆資料開始呈現(瀏覽的分頁)
		$data['project_display_length'] = $this->session->userdata('project_display_length');  //一頁顯示筆數
		$data['project_order_column'] = $this->session->userdata('project_order_column');  //排序欄位
		$data['project_order_method'] = $this->session->userdata('project_order_method');  //排序方式
		$data['news_start_record'] = $this->session->userdata('news_start_record');
		$data['news_display_length'] = $this->session->userdata('news_display_length');
		$data['news_order_column'] = $this->session->userdata('news_order_column');
		$data['news_order_method'] = $this->session->userdata('news_order_method');
		$data['external_tech_start_record'] = $this->session->userdata('external_tech_start_record');
		$data['external_tech_display_length'] = $this->session->userdata('external_tech_display_length');
		$data['external_tech_order_column'] = $this->session->userdata('external_tech_order_column');
		$data['external_tech_order_method'] = $this->session->userdata('external_tech_order_method');
		$data['manager_opinion_start_record'] = $this->session->userdata('manager_opinion_start_record');
		$data['manager_opinion_display_length'] = $this->session->userdata('manager_opinion_display_length');
		$data['manager_opinion_order_column'] = $this->session->userdata('manager_opinion_order_column');
		$data['manager_opinion_order_method'] = $this->session->userdata('manager_opinion_order_method');
		
		$project_column_setting = $this->account_management_model->get_column_setting($user_id, 1);  //取得使用者在專案資料的欄位設定值
		$data['project_column_setting'] = $project_column_setting;
		$news_column_setting = $this->account_management_model->get_column_setting($user_id, 2);
		$data['news_column_setting'] = $news_column_setting;
		$external_tech_column_setting = $this->account_management_model->get_column_setting($user_id, 3);
		$data['external_tech_column_setting'] = $external_tech_column_setting;
		$manager_opinion_column_setting = $this->account_management_model->get_column_setting($user_id, 4);
		$data['manager_opinion_column_setting'] = $manager_opinion_column_setting;
		$project_list = $this->project_model->get_specific_projects_data($search_bar);  //取得搜尋條件設定的專案資料
		$data['project_list'] = $project_list;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/project_list', $data);
		$this->load->view('templates/footer',$data);
	}
	
	/**
	取得圖表所需資料
	*/
	public function get_chart_data()
	{
		$user_id = $this->input->post('user_id');
		$search_keyword = $this->input->post('search_keyword');
		$json_data = $this->project_model->get_chart_data_ajax($user_id, $search_keyword);
		echo $json_data;
	}
	
	public function project_file($project_id, $search_bar="")  //瀏覽所有專案資料
	{
		$data = $this->resource_path;
		$file_list = $this->project_model->get_project_files($project_id);  //取得搜尋條件設定的專案資料
		$data['file_list'] = $file_list;		
		$output = '';
		for($i=0; $i < count($file_list); $i++)
		{
			if (!empty($search_bar))  //判斷搜尋欄是否有值，若有值則對file_content進行比對 
			{
				$search_bar=urldecode($search_bar);
				$search_words = explode(' ', $search_bar);
				$relative =true;
				foreach($search_words as $s)
				{
					$relative = $relative && preg_match("/$s/i", $file_list[$i]['file_content']);
				}
				if ($relative)
				{
					$output .= '<div style="margin-bottom:18px">';
					$output .= '<b><a download="'.$file_list[$i]['file_name'].'" href="'.site_url().'/application/assets/project_attachment/'.$project_id.'/'.$file_list[$i]['instance_file_name'].'">'.$file_list[$i]['file_name'].'</a></b>'; 			
					$output .= '</div>'; 
				}
				else
				{
					$output .= '<div style="margin-bottom:18px">';
					$output .= '<a download="'.$file_list[$i]['file_name'].'" href="'.site_url().'/application/assets/project_attachment/'.$project_id.'/'.$file_list[$i]['instance_file_name'].'">'.$file_list[$i]['file_name'].'</a>'; 			
					$output .= '</div>'; 
				} 
			}
			else
			{
				$output .= '<div style="margin-bottom:18px">';
				$output .= '<a download="'.$file_list[$i]['file_name'].'" href="'.site_url().'/application/assets/project_attachment/'.$project_id.'/'.$file_list[$i]['instance_file_name'].'">'.$file_list[$i]['file_name'].'</a>'; 			
				$output .= '</div>'; 
			}
			if(($i+1) != count($file_list)) // 判斷是否為最後一個元素
			{
				$output .= '<div style="width:100%;height:1px;background-color:#CCCCCC"></div><br/>';
			}
		}
		if(count($file_list) > 0)  //當使用者有上傳檔案
		{
			echo $output;
		}
		else
		{
			echo "目前尚無任何檔案";
		}		
	}
		
	/**
	create_project_data：建立專案資料
	*/
	public function create_project_data()
	{	
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data = $this->resource_path;
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');		
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('project_name', '專案名稱', 'trim|max_length[100]|required|xss_clean');
		$this->form_validation->set_rules('year', '專案年份', 'trim|xss_clean|required|max_length[4]');		
		$this->form_validation->set_rules('haitec_unit', '華創單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('outer_unit', '外部單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('pm', '創意中心負責人', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('keyword', '關鍵字', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('idea_id', '創意提案編號', 'trim|xss_clean|required');  //|max_length[7]
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/project_info', $data);
			$this->load->view('templates/footer',$data);
		}
		else  //當表單驗證通過
		{
			$this->project_model->create_project_info();  //新增專案紀錄
			$message = "create";  			
			redirect('project_list');			
		}
	}
	
	/**
	project_file_upload：專案檔案上傳
	*/
	public function project_file_upload()
	{
		if(isset($_POST['upload_file_dir']) && !empty($_POST['upload_file_dir']))
		{
			$output_dir = './uploads/'.$_POST['upload_file_dir'];
			if(!file_exists($output_dir))
			{
				mkdir($output_dir);
			}
		}

		if(isset($_FILES["file"]))
		{			
			//Filter the file types, if you want.
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Error: " . $_FILES["file"]["error"] . "";
			}
			else
			{
				$temp_file_name = $_REQUEST['temp_file_name'];
				//move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.'/'. iconv("UTF-8","BIG5", $_FILES["file"]["name"]));
				move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.'/'. $temp_file_name);
				//echo "Uploaded File :".$_FILES["file"]["name"];
			}
		}
	}
	
	/**
	project_check_is_blocked():檢查專案的最新狀態
	*/
	public function project_check_is_blocked()
	{	
		$project_id = $this->input->post('id');  //取得被block住的專案編號
		$is_blocked = $this->project_model->get_project_is_blocked($project_id);  //更改專案狀態(註記為unblock)
		echo $is_blocked;
	}
	
	/**
	project_set_unblocked():設定專案狀態為unblocked
	*/
	public function project_set_unblocked()
	{	
		$project_id = $this->input->post('id');  //取得被block住的專案編號
		$this->project_model->set_project_unblocked($project_id);  //更改專案狀態(註記為unblock)
		echo "success";
	}	
	
	public function file_category_detail()
	{
		$dir=$this->input->post('dir_name');
		$project_id = $this->input->post('id');
		$result=$this->project_model->get_file_category_detail($dir, $project_id);
		echo json_encode($result, JSON_NUMERIC_CHECK);
	}
	
	/**
	edit_project_data：編輯專案資料
	*/
	public function edit_project_data($project_id)
	{	
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data = $this->resource_path;
		$data['title'] = '專案管理';
		$data['user_id'] = $this->session->userdata('user_id');
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$search = $this->session->userdata('search_bar');
		$data['search'] = $search;
		/*從資料庫撈資料*/		
		$project_basic_info = $this->project_model->get_specific_project_info($project_id);  //取得專案基本資料
		$data['project_basic_info'] = $project_basic_info;
		$checked_user = $this->project_model->get_project_checked_user($project_basic_info['checked_user']); 
		$data['checked_user'] = $checked_user;
		$data['project_attachfile'] = $this->project_model->get_specific_project_attachfile($project_id);  //取得專案夾帶檔案
		$data['project_file_category'] = $this->project_model->get_category_project_attachfile($project_id);
		$data['project_img']        = $this->project_model->get_img_name($data['project_basic_info']['km_id']);
		//$data['preview_img']        = $this->project_model->get_preview_img($project_id);
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		/*$this->form_validation->set_rules('project_name', '專案名稱', 'trim|max_length[100]|required|xss_clean');
		$this->form_validation->set_rules('year', '專案年份', 'trim|xss_clean|required|max_length[4]');		
		$this->form_validation->set_rules('haitec_unit', '華創單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('outer_unit', '外部單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('pm', '創意中心負責人', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('keyword', '關鍵字', 'trim|xss_clean|required|max_length[100]');*/ 
		$this->form_validation->set_rules('idea_id', '創意提案編號', 'trim|xss_clean|required'); //|max_length[7]
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{		
			if($data['project_basic_info']["is_blocked"] == 2)
			{
				$this->project_model->set_project_blocked($project_id, $username);  //更改專案狀態(註記為block)
			}			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/project_edit', $data);
			$this->load->view('templates/footer',$data);
		}
		else  //當表單驗證通過
		{
			$this->project_model->edit_project_info($project_id);  //編輯專案紀錄
			$message = "edit";  
			redirect('project_list');
		}	
	}
	
	public function check_project_data()
	{
		$project_id = $this->input->post('project_id');
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('username');
		$checked_time = date('Y-m-d H:i:s');
		$this->project_model->set_project_data_checked($project_id, $user_id, $checked_time);
		$message = "已確認(由 $user_name 於 $checked_time 確認)";
		echo $message;
	}	
}
