<?php

class Project extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('form');  //載入Form輔助函數
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->library('parser');  //在view中使用樣板引擎
		$this->load->library('form_validation');  //載入表單驗證程式庫
		$this->load->library('typography');	
		$this->load->library('file_conversion');  //載入擷取檔案純文字內容的程式庫
		//$this->load->library('file_conversion');  //載入擷取檔案純文字內容的程式庫
		$this->load->helper('html');  		
		$this->load->model('project_model');  //載入已定義的模型與資料庫做連接		
		//$this->output->cache(180);
		//取消快取	
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');  
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	/**
	list_all_projects：瀏覽所有專案資料(舊)
	*/
	/*public function list_all_projects($page = 0, $search = null, $message='')  //瀏覽所有專案資料
	{			
		if(!$this->session->userdata('username'))  //判斷使用者是否由login頁面登入
		{	
			redirect('login');
		}		
		$data['title'] = '首頁';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['message'] = $message;
		$flag = $this->input->post('flag');
		$get_flag = $this->input->get('get_flag');
		//取得使用者設定的查詢條件
		if($flag != true)  //使用者已經查詢過,只是切換專案瀏覽分頁
		{
			$search_bar =$this->input->get('search');
			$search_firm = $this->input->get('firm_checked');
			$search_school = $this->input->get('school_checked');
			$search_institute = $this->input->get('institute_checked');
			if($get_flag != true)
			{
				$search_bar = null;
				$search_firm = 1;
				$search_school = 2;
				$search_institute = 3; 
			}
		}
		else  //使用者重新設定條件按下查詢
		{
			$search_bar = $this->input->post('search_bar');
			$search_firm = $this->input->post('firm');
			$search_school = $this->input->post('school');
			$search_institute = $this->input->post('institute');
		}
		
		$search_item = array('search_bar'=>$search_bar, 'search_firm'=>$search_firm, 'search_school'=>$search_school, 'search_institute'=>$search_institute);
		$data['search'] = $search_bar;
		$total_data_count = $this->project_model->get_all_projects_count($search_item);  //取得符合篩選條件的專案數量
		$data['total_data_count'] = $total_data_count;
		//傳遞資料筆數
		$data_show_count = 10;  //設定一頁呈現的資料筆數
		$data['data_show_count'] = $data_show_count;
		$data['page'] = $page;
		if($data_show_count != 0)
			$data['page_number'] = ceil($total_data_count/$data_show_count);  //無條件進位
		else
			$data['page_number'] = 0;  //至少顯示一頁
		$data['project_list'] = $this->project_model->get_specific_projects_data($data_show_count * $page, $data_show_count, $search_item);  //取得特定選擇頁數所需呈現的專案資料
		$data['firm_checked'] = $search_firm;
		$data['school_checked'] = $search_school;
		$data['institute_checked'] = $search_institute;
		$data['start_record'] = $data_show_count * $page;
		$data['show_data_count'] = count($data['project_list']);  //計算取得法人資料總筆數
		$this->load->view('templates/header_new', $data);		
		$this->load->view('templates/navbar2', $data);
		$this->load->view('pages/project_list2', $data);
		$this->load->view('templates/footer_new');
	}*/
	
	/**
	list_all_projects：瀏覽所有專案資料(新)
	*/
	/*public function list_all_projects($page = 0, $search = null, $message='')  //瀏覽所有專案資料
	{			
		if(!$this->session->userdata('username'))  //判斷使用者是否由login頁面登入
		{	
			redirect('login');
		}		
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['message'] = $message;
		$flag = $this->input->post('flag');
		$get_flag = $this->input->get('get_flag');
		//取得使用者設定的查詢條件
		if($flag != true)  //使用者已經查詢過,只是切換專案瀏覽分頁
		{
			$search_bar =$this->input->get('search');
			$search_firm = $this->input->get('firm_checked');
			$search_school = $this->input->get('school_checked');
			$search_institute = $this->input->get('institute_checked');
			if($get_flag != true)
			{
				$search_bar = null;
				$search_firm = 1;
				$search_school = 2;
				$search_institute = 3; 
			}
		}
		else  //使用者重新設定條件按下查詢
		{
			$search_bar = $this->input->post('search_bar');
			$search_firm = $this->input->post('firm');
			$search_school = $this->input->post('school');
			$search_institute = $this->input->post('institute');
		}
		
		$search_item = array('search_bar'=>$search_bar, 'search_firm'=>$search_firm, 'search_school'=>$search_school, 'search_institute'=>$search_institute);
		$data['search'] = $search_bar;
		$total_data_count = $this->project_model->get_all_projects_count($search_item);  //取得符合篩選條件的專案數量
		$data['total_data_count'] = $total_data_count;
		//傳遞資料筆數
		$data_show_count = 10;  //設定一頁呈現的資料筆數
		$data['data_show_count'] = $data_show_count;
		$data['page'] = $page;
		if($data_show_count != 0)
			$data['page_number'] = ceil($total_data_count/$data_show_count);  //無條件進位
		else
			$data['page_number'] = 0;  //至少顯示一頁
		$data['project_list'] = $this->project_model->get_specific_projects_data($data_show_count * $page, $data_show_count, $search_item);  //取得特定選擇頁數所需呈現的專案資料
		$data['firm_checked'] = $search_firm;
		$data['school_checked'] = $search_school;
		$data['institute_checked'] = $search_institute;
		$data['start_record'] = $data_show_count * $page;
		$data['show_data_count'] = count($data['project_list']);  //計算取得法人資料總筆數
		$this->load->view('templates/header_new', $data);		
		$this->load->view('templates/navbar2', $data);
		$this->load->view('pages/project_list2', $data);
		$this->load->view('templates/footer_new');
	}*/
	//調整預覽項目
	public function adjust_item()
	{
		if(!$this->session->userdata('username'))  //判斷使用者是否由login頁面登入
		{	
			redirect('login');
		}
		$this->session->set_userdata('first_item', "idea_name");
		$this->session->set_userdata('second_item', $this->input->post('second'));
		$this->session->set_userdata('third_item', $this->input->post('third'));
		$this->session->set_userdata('fourth_item', $this->input->post('fourth'));
		$this->session->set_userdata('fifth_item', $this->input->post('fifth'));
		$this->session->set_userdata('sixth_item', $this->input->post('sixth'));
		$this->session->set_userdata('seventh_item', $this->input->post('seventh'));
		$search=$this->input->post('searchbar');
		//redirect(project_list/100/$search");
		redirect("project_list");
	}
	
	public function list_all_projects($page = 0, $search_bar=null,$message='')  //瀏覽所有專案資料
	{			
		if(!$this->session->userdata('username'))  //判斷使用者是否由login頁面登入
		{	
			redirect('login');
		}		
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");
		$data['plugins_location'] = site_url("/application/assets/plugins");
		$data['message'] = $message;
		if($search_bar==null) $search_bar = $this->input->post('search_bar');
		$data['search'] = $search_bar;
		$project_list = $this->project_model->get_specific_projects_data($search_bar);  //取得搜尋條件設定的專案資料
		$data['project_list'] = $project_list;
		//相關句子搜尋
		
		if($search_bar != null)
		{
			$search_word = explode(' ', $search_bar);
			$key_sentence = array();  //存放關鍵句子
			foreach($project_list as $project)
			{
				$temp = array();
				$temp_score = array();
				$all_content = "";
				foreach($project as $index => $content)
				{
					$all_content = $all_content.$content.',';					
				}
				$all_content = str_replace('。','.',$all_content);
				$all_content = str_replace('，',',',$all_content);
				$all_content = str_replace('；',';',$all_content);
				$temp = preg_split("/[?!,-.;]+/",$all_content);
				foreach($temp as $index=>$sentence)
				{
					$score = 0;
					for($j=0;$j<count($search_word);$j++)
					{
						if(strpos($sentence, $search_word[$j]) !== false)
						{
							$score = $score + 1;
						}
					}
					array_push($temp_score, (int)$score);					
				}				
				//$value = max($temp_score);
				//$maxs = array_keys($temp_score, max($temp_score));
				//echo "<br/><br/><br/>".(int)$maxs;
				$first_score = 0;
				//array_push($key_sentence, $temp[(int)$maxs]);
				$sen = 0;
				foreach($temp as $index=>$sentence)
				{		
					if($temp_score[$index] > $first_score)  //$first_score
					{
						$sen = $sentence;
						//array_push($key_sentence, $sentence);
						$first_score = $temp_score[$index];
						//break;						
					}					
				}	
				array_push($key_sentence, $sen);				
				//echo $sentence.'<br/>';
				//break;				
			}
			//$str = 'Fry me a Beaver. Fry me a Beaver! Fry me a Beaver? Fry me Beaver no. 4?! Fry me many Beavers... End';
			//$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $str);
			//$content_segment = array();
			$data['key_sentence'] = $key_sentence;				
			$column = array();
			$k=0;
			foreach($project_list as $project)
			{			
				foreach($project as $index => $content)
				{					
					if(strpos($content, $key_sentence[$k]) !== false)
					{											
						array_push($column, $index);
						break;
					}
				}
				$k++;
			}
			$data['column'] = $column;
		}
		
		//$data['number_file'] = $this->project_model->get_number_file();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/project_list3', $data);
		$this->load->view('templates/footer',$data);
	}
	//全形半形轉換
	function nf_to_wf($strs)
	{  
		$nft = array(
			"(", ")", "[", "]", "{", "}", ".", ",", ";", ":",
			"-", "?", "!", "@", "#", "$", "%", "&", "|", "\\",
			"/", "+", "=", "*", "~", "`", "'", "\"", "<", ">",
			"^", "_",
			"0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
			"a", "b", "c", "d", "e", "f", "g", "h", "i", "j",
			"k", "l", "m", "n", "o", "p", "q", "r", "s", "t",
			"u", "v", "w", "x", "y", "z",
			"A", "B", "C", "D", "E", "F", "G", "H", "I", "J",
			"K", "L", "M", "N", "O", "P", "Q", "R", "S", "T",
			"U", "V", "W", "X", "Y", "Z",
			" "
		);
		$wft = array(
			"（", "）", "〔", "〕", "｛", "｝", "﹒", "，", "；", "：",
			"－", "？", "！", "＠", "＃", "＄", "％", "＆", "｜", "＼",
			"／", "＋", "＝", "＊", "～", "、", "、", "＂", "＜", "＞",
			"︿", "＿",
			"０", "１", "２", "３", "４", "５", "６", "７", "８", "９",
			"ａ", "ｂ", "ｃ", "ｄ", "ｅ", "ｆ", "ｇ", "ｈ", "ｉ", "ｊ",
			"ｋ", "ｌ", "ｍ", "ｎ", "ｏ", "ｐ", "ｑ", "ｒ", "ｓ", "ｔ",
			"ｕ", "ｖ", "ｗ", "ｘ", "ｙ", "ｚ",
			"Ａ", "Ｂ", "Ｃ", "Ｄ", "Ｅ", "Ｆ", "Ｇ", "Ｈ", "Ｉ", "Ｊ",
			"Ｋ", "Ｌ", "Ｍ", "Ｎ", "Ｏ", "Ｐ", "Ｑ", "Ｒ", "Ｓ", "Ｔ",
			"Ｕ", "Ｖ", "Ｗ", "Ｘ", "Ｙ", "Ｚ",
			"　"
		);
		// 轉半形
		$strtmp = str_replace($wft, $nft, $strs);
		return $strtmp;
	}
	
	public function project_file($project_id, $search_bar="")  //瀏覽所有專案資料
	{

		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");
		$data['plugins_location'] = site_url("/application/assets/plugins");
		//$data['message'] = $message;
		//$search_bar = $this->input->post('search_bar');
		//$data['search'] = $search_bar;
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
	create_project_data：建立專案資料(舊)
	*/
	/*public function create_project_data()
	{	
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");
		$data['plugins_location'] = site_url("/application/assets/plugins");  //給予img位址資訊到要呈現之頁面
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('project_name', '專案名稱', 'trim|max_length[30]|required|xss_clean');
		$this->form_validation->set_rules('pm', '負責人', 'trim|xss_clean');
		$this->form_validation->set_rules('unit_class', '合作類型', 'trim|xss_clean');
		$this->form_validation->set_rules('org_name', '組織名稱', 'trim|xss_clean|required|max_length[30]');
		$this->form_validation->set_rules('dep_name', '單位名稱', 'trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('outer_pm', '聯絡人姓名', 'trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('phone_firm', '聯絡人電話(公司)', 'trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('phone_mobile', '聯絡人電話(手機)', 'trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('status', '專案狀態', 'trim|xss_clean');
		$this->form_validation->set_rules('phase', '執行階段', 'trim|xss_clean');
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{		
			$this->load->view('templates/header_new', $data);
			$this->load->view('pages/project_info', $data);
			$this->load->view('templates/footer_new',$data);
		}
		else  //當表單驗證通過
		{
			$this->project_model->create_project();  //新增專案紀錄
			$message = "create";  
			redirect('project_list/0/null/'.$message);
			//$this->list_all_projects(0, null, $message);  //回瀏覽專案頁面
		}
	}*/
	/**
	create_project_data：建立專案資料(新20150210)
	*/
	public function create_project_data()
	{	
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");
		$data['plugins_location'] = site_url("/application/assets/plugins");
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
			//redirect('project_list/0/null/'.$message);
			redirect('project_list');
			//redirect('project_list');
			//redirect("http://localhost/file_manager/file_manager2/project_create_success.php");
			//$this->list_all_projects(0, null, $message);  //回瀏覽專案頁面
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
				move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.'/'. iconv("UTF-8","BIG5", $_FILES["file"]["name"]));
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
	
	/**
	edit_project_data：編輯專案資料(新20150317)
	*/
	public function edit_project_data($project_id)
	{	
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$username = $this->session->userdata('username');
		$data['username'] = $username;
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");
		$data['plugins_location'] = site_url("/application/assets/plugins");
		/*從資料庫撈資料*/		
		$data['project_basic_info'] = $this->project_model->get_specific_project_info($project_id);  //取得專案基本資料
		$data['project_attachfile'] = $this->project_model->get_specific_project_attachfile($project_id);  //取得專案夾帶檔案
		$data['project_img']        = $this->project_model->get_img_name($data['project_basic_info']['km_id']);
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		/*$this->form_validation->set_rules('project_name', '專案名稱', 'trim|max_length[100]|required|xss_clean');
		$this->form_validation->set_rules('year', '專案年份', 'trim|xss_clean|required|max_length[4]');		
		$this->form_validation->set_rules('haitec_unit', '華創單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('outer_unit', '外部單位', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('pm', '創意中心負責人', 'trim|xss_clean|required|max_length[100]');
		$this->form_validation->set_rules('keyword', '關鍵字', 'trim|xss_clean|required|max_length[100]');*/
		$this->form_validation->set_rules('idea_id', '創意提案編號', 'trim|xss_clean|required');  //|max_length[7]
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
	
	/**
	list_project_detail：列出特定專案的內容(時間軸與最後一筆紀錄)
	*/
	public function list_project_detail($project_id, $message='')
	{
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}		
		$data['title'] = "專案管理";
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
		$data['project_location'] = site_url("/application/assets/project");
		$data['message'] = $message;		
		$specific_project_basic_info = $this->project_model->get_specific_project_data($project_id);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;
		$data['subject'] = $specific_project_basic_info['project_name'];
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($project_id);  //取得專案所有紀錄資料
		$data['project_records'] = $specific_project_all_record;
		$record = $this->project_model->get_specific_project_last_record($project_id);  //取得專案最新一筆紀錄資料
		$data['record'] = $record;
		//判斷專案是否有既有的紀錄
		if(!empty($record))
		{
			$data['last_record'] = $record['id'];
			$specific_record_all_function = $this->project_model->get_specific_project_record_function_structure($record['id']);  //取得專案紀錄的功能架構
			$data['all_functions'] = $specific_record_all_function;
		}		
		else
		{
			$data['last_record'] = 0;
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/project_timebar', $data);		
		$this->load->view('pages/project_last_record', $data);
		//$this->load->view('pages/project_record_detail', $data);			
		$this->load->view('templates/footer');
	}
	
	/**
	list_project_minutes_detail：列出專案會議記錄內容
	*/
	public function list_project_minutes_detail($record_id, $message='')
	{
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = "專案管理";
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
		$data['project_location'] = site_url("/application/assets/project");
		$data['message'] = $message;
		$record = $this->project_model->get_specific_project_specific_record($record_id);  //取得使用者選擇的一筆版本紀錄資料
		$data['record'] = $record;
		$attach_file = $this->project_model->get_specific_project_record_attach_file($record_id);
		$data['attach_file'] = $attach_file;
		$specific_project_basic_info = $this->project_model->get_specific_project_data($record['project_id']);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;
		$data['subject'] = $specific_project_basic_info['project_name'];		
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($record['project_id']);  //取得專案所有紀錄資料
		$data['project_records'] = $specific_project_all_record;
		$specific_record_all_function = $this->project_model->get_specific_project_record_function_structure($record['id']);  //取得紀錄對應的功能架構資料
		$data['all_functions'] = $specific_record_all_function;
		$specific_project_record_organization = $this->project_model->get_specific_project_record_organization($record['id']);  //取得紀錄對應的組織資料
		$data['relative_organizations'] = $specific_project_record_organization;
		$last_record = $this->project_model->get_specific_project_last_record($record['project_id']);  //取得專案最新一筆紀錄資料
		$data['last_record'] = $last_record['id'];
		/*$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/project_timebar', $data);
		$this->load->view('pages/project_timebar', $data);		
		$this->load->view('pages/project_minutes_detail', $data);
		$this->load->view('templates/footer');*/
		
		$this->load->view('templates/header_new', $data);		
		$this->load->view('templates/navbar2', $data);		
		$this->load->view('pages/project_timebar2', $data);
		$this->load->view('pages/project_minutes_detail2', $data);
		$this->load->view('templates/footer_new');
	}
	
	/**
	list_project_minutes_for_mail：列出會議記錄內容給由mail連結點進入的使用者觀看
	*/
	public function list_project_minutes_for_mail($record_id)
	{
		$data['title'] = "專案管理";
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");		
		$data['project_location'] = site_url("/application/assets/project");
		//$library_location = site_url("/application/assets/library");
		//$data['library_location'] = $library_location;
		$record = $this->project_model->get_specific_project_specific_record($record_id);  //取得使用者選擇的一筆版本紀錄資料
		$data['record'] = $record;
		$attach_file = $this->project_model->get_specific_project_record_attach_file($record_id);
		$data['attach_file'] = $attach_file;
		$specific_project_basic_info = $this->project_model->get_specific_project_data($record['project_id']);  //取得專案基本資料  
		$data['subject'] = $specific_project_basic_info['project_name'];		
		require_once("/../assets/library/recaptchalib.php");
		$privatekey = "6LcWcOwSAAAAAA4D7p2dxk4FtxBsjBjCJHXs-ZQv"; //此處填入 private_key
		$recaptcha_challenge_field = $this->input->post('recaptcha_challenge_field');
		$recaptcha_response_field = $this->input->post('recaptcha_response_field');
		if(!empty($recaptcha_challenge_field) && !empty($recaptcha_response_field))
		{
			$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
			if(!$resp->is_valid)//驗証代碼失敗
			{  		
				$data['message'] = "驗證碼輸入錯誤!請重新輸入";
				$this->load->view('pages/captcha_check', $data);
			}
			else//驗証代碼成功
			{  
				$this->load->view('pages/project_minutes_for_mail', $data);
			}
		}
		else
		{
			$data['message'] = "查看會議記錄，請先輸入驗證碼";
			$this->load->view('pages/captcha_check', $data);
		}		
		
	}
	
	/**
	list_project_record_detail：列出特定記錄的內容(時間軸與特定的版本紀錄)
	*/
	public function list_project_record_detail($record_id, $message='')
	{
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = "專案管理";
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
		$data['project_location'] = site_url("/application/assets/project");
		$data['message'] = $message;
		$record = $this->project_model->get_specific_project_specific_record($record_id);  //取得使用者選擇的一筆版本紀錄資料
		$data['record'] = $record;
		$specific_project_basic_info = $this->project_model->get_specific_project_data($record['project_id']);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;
		$data['subject'] = $specific_project_basic_info['project_name'];		
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($record['project_id']);  //取得專案所有紀錄資料
		$data['project_records'] = $specific_project_all_record;
		$specific_record_all_function = $this->project_model->get_specific_project_record_function_structure($record['id']);  //取得紀錄對應的功能架構資料
		$data['all_functions'] = $specific_record_all_function;
		$specific_project_record_organization = $this->project_model->get_specific_project_record_organization($record['id']);  //取得紀錄對應的組織資料
		$data['relative_organizations'] = $specific_project_record_organization;
		$last_record = $this->project_model->get_specific_project_last_record($record['project_id']);  //取得專案最新一筆紀錄資料
		$data['last_record'] = $last_record['id'];
		$attach_file = $this->project_model->get_specific_project_record_attach_file($record_id);
		$data['attach_file'] = $attach_file;
		$this->load->view('templates/header_new', $data);		
		$this->load->view('templates/navbar2', $data);		
		$this->load->view('pages/project_timebar2', $data);		
		//$this->load->view('pages/project_record_detail2', $data);
		//$this->load->view('pages/side_navbar', $data);	
		if($record['class'] == 1)
		{
			//$this->load->view('pages/side_navbar', $data);
			//$this->load->view('pages/aaa', $data);
			$this->load->view('pages/project_record_detail2', $data);		
		}
		else if($record['class'] == 2)
		{
			$this->load->view('pages/project_minutes_detail2', $data);	
		}
		$this->load->view('templates/footer_new');
	}
	
	/**
	create_project_minutes_data：建立專案會議紀錄資料
	參數一：project_id 專案編號
	*/
	public function create_project_minutes_data($project_id)
	{		
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$specific_project_basic_info = $this->project_model->get_specific_project_data($project_id);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;  
		$data['subject'] = $specific_project_basic_info['project_name'];
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($project_id);  //取得專案所有紀錄資料
		$data['project_records'] = $specific_project_all_record;
		$last_record = $this->project_model->get_specific_project_last_record($project_id);
		$data['record'] = $last_record;
		$specific_project_record_organization = $this->project_model->get_specific_project_record_organization($last_record['id']);  //取得紀錄對應的組織資料
		$data['relative_organizations'] = $specific_project_record_organization;
		//欄位驗證
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		//撰寫表單驗證通過與不通過的對應處理方式
		$this->form_validation->set_rules('meeting_date', '會議日期', 'trim|required|xss_clean');
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header_new', $data);		
			$this->load->view('templates/navbar2', $data);		
			$this->load->view('pages/project_timebar2', $data);
			$this->load->view('pages/project_minutes_create2', $data);
			$this->load->view('templates/footer_new');
		}
		else  //當表單驗證通過
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|ppt|pptx|pdf|doc|docx|xls|xlsx';
			//$config['max_width']    = '2048';
			//$config['max_height']   = '2048';
			$config['max_size']	= '5000';
			$config['xss_clean'] = FALSE;  //上傳pdf檔需如此設定
			$this->load->library('upload', $config);
			$file_count = $this->input->post('file_count');  //取得檔案上傳的數量
			//判斷使用者夾帶檔案有無錯誤，完全無誤才可成功上傳所有檔案與資料
			$insert_record_id = $this->project_model->create_specific_minutes_record();  //新增會議記錄資料
			
			if($insert_record_id == -1)	//上傳檔案有問題(未上傳檔案除外)，回新增會議記錄頁面	
			{
				$error = array('error' => $this->upload->display_errors());
				/*$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pages/project_timebar', $data);
				$this->load->view('pages/project_minutes_create', $data);		
				$this->load->view('templates/footer');*/
				$this->load->view('templates/header_new', $data);		
				$this->load->view('templates/navbar2', $data);		
				$this->load->view('pages/project_timebar2', $data);
				$this->load->view('pages/project_minutes_create2', $data);
				$this->load->view('templates/footer_new');
			}
			else
			{
				$message = "create";
				redirect('project_record/'.$insert_record_id.'/'.$message);
			}			
		}
	}
	
	/**
	update_project_minutes_data：編輯專案會議紀錄資料
	參數一：record_id 編號
	*/
	public function update_project_minutes_data($record_id)
	{		
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$record = $this->project_model->get_specific_project_specific_record($record_id);  //取得使用者選擇的一筆版本紀錄資料
		$data['record'] = $record;
		$specific_project_basic_info = $this->project_model->get_specific_project_data($record['project_id']);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;  
		$data['subject'] = $specific_project_basic_info['project_name'];
		$attach_file = $this->project_model->get_specific_project_record_attach_file($record_id);
		$data['attach_file'] = $attach_file;
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($record['project_id']);  //取得專案所有紀錄資料
		$data['project_records'] = $specific_project_all_record;
		$attach_file = $this->project_model->get_specific_project_record_attach_file($record_id);
		$data['attach_file'] = $attach_file;
		$specific_project_record_organization = $this->project_model->get_specific_project_record_organization($record_id);  //取得紀錄對應的組織資料
		$data['relative_organizations'] = $specific_project_record_organization;
		
		//欄位驗證
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		//撰寫表單驗證通過與不通過的對應處理方式
		$this->form_validation->set_rules('meeting_date', '會議日期', 'trim|required|xss_clean');
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			/*$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/project_timebar', $data);
			$this->load->view('pages/project_minutes_edit', $data);		
			$this->load->view('templates/footer');*/
			$this->load->view('templates/header_new', $data);		
			$this->load->view('templates/navbar2', $data);		
			$this->load->view('pages/project_timebar2', $data);
			$this->load->view('pages/project_minutes_edit2', $data);
			$this->load->view('templates/footer_new');
		}
		else  //當表單驗證通過
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|ppt|pptx|pdf|doc|docx|xls|xlsx';
			$config['max_size']	= '5000';
			$config['xss_clean'] = FALSE;  //上傳pdf檔需如此設定
			$this->load->library('upload', $config);
			$file_count = $this->input->post('file_count');  //取得檔案上傳的數量
			//判斷使用者夾帶檔案有無錯誤，完全無誤才可成功上傳所有檔案與資料
			$update_record_id = $this->project_model->update_specific_minutes_record($record_id);  //新增會議記錄資料
			if($update_record_id == -1)	//上傳檔案有問題(未上傳檔案除外)，回新增會議記錄頁面	
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('templates/header_new', $data);		
				$this->load->view('templates/navbar2', $data);		
				$this->load->view('pages/project_timebar2', $data);
				$this->load->view('pages/project_minutes_edit2', $data);
				$this->load->view('templates/footer_new');
				/*$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pages/project_timebar', $data);
				$this->load->view('pages/project_minutes_edit', $data);		
				$this->load->view('templates/footer');*/				
			}
			else
			{
				$message = "edit";
				redirect('project_minutes/'.$update_record_id.'/'.$message);
			}
			//$update_record_id = $this->project_model->update_specific_minutes_record($record_id);  //編輯會議記錄資料
			//$message = "edit";
			//redirect('project_minutes/'.$update_record_id.'/'.$message);
		}
	}
	
	/**
	create_record_data：建立專案進行階段資料
	參數一：project_id 專案編號
	*/
	public function create_project_record_data($project_id)
	{		
		if(!$this->session->userdata('username'))
		{	
			redirect('login');
		}
		$data['title'] = '專案管理';
		$data['username'] = $this->session->userdata('username');
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$specific_project_basic_info = $this->project_model->get_specific_project_data($project_id);  //取得專案基本資料  
		$data['project_basic_info']	= $specific_project_basic_info;  
		$data['subject'] = $specific_project_basic_info['project_name'];
		$specific_project_all_record = $this->project_model->get_specific_project_all_record($project_id);  //取得專案所有紀錄資料
		if(count($specific_project_all_record) > 0)
		{
			$data['project_records'] = $specific_project_all_record;
			//$last_record = $this->project_model->get_specific_project_last_record($project_id);
			$last_record = $this->project_model->get_last_project_record($project_id);
			$data['record'] = $last_record;
			$data['last_record'] = $last_record['id'];	
			$specific_record_all_function = $this->project_model->get_specific_project_record_function_structure($last_record['id']);  //取得專案紀錄的功能架構資料
			$data['all_functions'] = $specific_record_all_function;
			$i=0;
			$specific_record_all_picture = array();
			while($i < count($specific_record_all_function))
			{
			$specific_record_all_picture_part = $this->project_model->get_specific_project_record_function_structure_picture($specific_record_all_function[$i]['id']);
			array_push($specific_record_all_picture, $specific_record_all_picture_part);
			$i=$i+1;
			}
			$data['all_pictures']=$specific_record_all_picture;
			$specific_project_record_organization = $this->project_model->get_specific_project_record_organization($last_record['id']);  //取得紀錄對應的組織資料
			$data['relative_organizations'] = $specific_project_record_organization;
		}
		else
		{
			$data['last_record'] = 0;
		}
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('senario', '情境', 'trim|max_length[150]|xss_clean');
		$this->form_validation->set_rules('distinction_market', '差異化(市場)', 'trim|max_length[150]|xss_clean');
		$this->form_validation->set_rules('distinction_km', '差異化(KM)', 'trim|max_length[150]|xss_clean');
		$this->form_validation->set_rules('value', '價值性', 'trim|max_length[150]|xss_clean');
		$this->form_validation->set_rules('feasibility', '初步可行性', 'trim|max_length[150]|xss_clean');
		$this->form_validation->set_rules('feature_introduction', '功能說明', 'trim|max_length[200]|xss_clean');
		/*
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email|xss_clean');
		*/
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			/*$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/project_timebar', $data);
			$this->load->view('pages/project_record_create', $data);		
			$this->load->view('templates/footer');*/
			
			$this->load->view('templates/header_new', $data);		
			$this->load->view('templates/navbar2', $data);		
			$this->load->view('pages/project_timebar2', $data);
			/*$this->load->view('pages/side_navbar', $data);*/
			$this->load->view('pages/project_record_create2', $data);
			$this->load->view('templates/footer_new');
		}
		else  //當表單驗證通過
		{
			$insert_record_id = $this->project_model->create_specific_project_record();  //新增版本紀錄資料
			$message = "edit";
			redirect('project_record/'.$insert_record_id.'/'.$message);
			//$this->list_project_detail($project_id, $message);  //回瀏覽專案頁面
		}
	}
	
	/**
	list_all_institute：以表格呈現法人資料
	*/
	public function list_all_institute($message = '')  //瀏覽所有法人資料
	{
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  //給予js位址資訊到要呈現之頁面
		$data['img_location'] = site_url("/application/assets/img");  //給予img位址資訊到要呈現之頁面
		$data['project_location'] = site_url("/application/assets/project");
		$data['title'] = "法人資源管理";
		$data['message'] = $message;
		$search_rule = $this->input->post('search_institute', true);  //取得搜尋條件
		if($search_rule == null)  //當沒有讀取到POST所傳遞的search_rule資料，則表示使用者第一次點選此連結或沒有設定搜尋項目
		{
			$search_rule = null;  //則設定使用者要瀏覽第一頁
		}
		else
		{
			$data['search_rule'] = $search_rule;
		}
		$all_project = $this->institute_model->get_all_institute_basic_info($search_rule);  //取得所有法人基本資料
		$total_data_count = count($all_project);  //計算取得法人資料總筆數		
		$data['total_data_count'] = $total_data_count;
		//傳遞資料筆數
		$data_show_count = 5;  //設定一頁呈現的資料筆數
		$data['data_show_count'] = $data_show_count;
		$page = $this->input->get('page', true);  //取得由get方法傳送使用者點選的頁面連結(亦即使用者要看的分頁)
		$data['page'] = $page;
		if($page == null)  //當沒有讀取到GET所傳遞的page資料，則表示使用者第一次點選此連結
		{
			$page = 0;  //則設定使用者要瀏覽第一頁
		}
		if($data_show_count != 0)
			$data['page_number'] = ceil($total_data_count/$data_show_count);  //無條件進位
		else
			$data['page_number'] = 0;  //至少顯示一頁
		$data['project_list'] = $this->institute_model->get_specific_institute_basic_info($data_show_count * $page, $data_show_count, $search_rule);  //取得特定選擇頁數使用者所需要呈現的法人資料
		$data['start_record'] = $data_show_count * $page;
		$data['show_data_count'] = count($data['project_list']);  //計算取得法人資料總筆數
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		//$this->load->view('pages/institute_list', $data);
		$this->load->view('pages/project_process_detail', $data);		
		$this->load->view('templates/footer');
	}
	
	/**
	create_institute：新增法人資料
	*/
	public function create_institute()  //建立法人資料
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('institute', '單位名稱', 'trim|required|max_length[25]|xss_clean');
		$this->form_validation->set_rules('department', '單位部門', 'trim|max_length[20]|xss_clean');
		$this->form_validation->set_rules('address', '地址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', '網址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('memo', '備註', 'trim|xss_clean');
		$this->form_validation->set_rules('contact_name', '聯絡人姓名', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_sex', '聯絡人性別', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_phone', '聯絡人電話', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('contact_address', '聯絡人地址', 'trim|required|xss_clean');
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/institute_create', $data);
			$this->load->view('templates/footer');
		}
		else  //當表單驗證通過
		{
			$this->institute_model->create_institute();  //呼叫模型中定義的方法set_institute()來新增法人資料
			//判斷使用者是否還要繼續新增資料
			$message = "法人：". $this->input->post('institute').' '.$this->input->post('department')." 資料新增成功!";  //產生新增成功訊息
			$data['message'] = $message;
			if($this->input->post('is_finish'))    //要繼續新增
			{
				$this->load->view('templates/header', $data);
				$this->load->view('templates/navbar', $data);
				$this->load->view('pages/institute_create', $data);
				$this->load->view('templates/footer');
			}
			else   //不繼續新增
			{
				$this->list_all_institute($message);  //回瀏覽專案頁面
			}
		}
	}
	
	/**
	edit_institute：編輯法人資料
	*/
	public function edit_institute($institute_id)  //編輯法人資料 $institute_id
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";		
		$data['institute_data'] = $this->institute_model->get_one_specific_institute_basic_info($institute_id);
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('institute', '單位名稱', 'trim|required|max_length[25]|xss_clean');
		$this->form_validation->set_rules('department', '單位部門', 'trim|max_length[20]|xss_clean');
		$this->form_validation->set_rules('address', '地址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', '網址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('memo', '備註', 'trim|xss_clean');
		$this->form_validation->set_rules('contact_name', '聯絡人姓名', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_sex', '聯絡人性別', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_phone', '聯絡人電話', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('contact_address', '聯絡人地址', 'trim|required|xss_clean');
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/institute_edit', $data);
			$this->load->view('templates/footer');
		}
		else  //當表單驗證通過  
		{
			$this->institute_model->update_institute($institute_id);
			$message = "法人：". $this->input->post('institute').' '.$this->input->post('department')." 資料修改成功!";  //產生修改成功訊息
			$this->list_all_institute($message);  //回瀏覽專案頁面
		}
	}
	
	/**
	delete_institute：刪除法人資料
	*/
	public function delete_institute($institute_id)  //編輯法人資料 $institute_id
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";		
		$data['institute_data'] = $this->institute_model->get_one_specific_institute_basic_info($institute_id);
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->input->post('delete') == "yes")  //當執行刪除動作
		{
			$this->institute_model->delete_institute($institute_id);
			$message = "法人：". $this->input->post('institute').' '.$this->input->post('department')." 資料已經刪除!";  //產生修改成功訊息
			$this->list_all_institute($message);  //回瀏覽專案頁面
		}
		else  
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/institute_delete', $data);
			$this->load->view('templates/footer');
		}
	}
	
	/**
	manage_institute：管理法人資料-列出法人所有基本資料與管理功能選單
	*/
	public function manage_institute($institute_id, $message = '')  //管理法人資料
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";
		$data['message'] = $message;
		$data['institute_data'] = $this->institute_model->get_one_specific_institute_basic_info($institute_id);
		//撰寫表單驗證通過與不通過的對應處理方式
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/institute_manage', $data);
		$this->load->view('templates/footer');
	}
	
	/**
	manage_edit_institute：特定法人管理功能下進行基本資料編輯
	*/
	public function manage_edit_institute($institute_id)
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";		
		$data['institute_data'] = $this->institute_model->get_one_specific_institute_basic_info($institute_id);
		$this->form_validation->set_error_delimiters('<label style="margin-left:5px;color:red;font-weight:100">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('institute', '單位名稱', 'trim|required|max_length[25]|xss_clean');
		$this->form_validation->set_rules('department', '單位部門', 'trim|max_length[20]|xss_clean');
		$this->form_validation->set_rules('address', '地址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('website', '網址', 'trim|required|xss_clean');
		$this->form_validation->set_rules('memo', '備註', 'trim|xss_clean');
		$this->form_validation->set_rules('contact_name', '聯絡人姓名', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_sex', '聯絡人性別', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_phone', '聯絡人電話', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('contact_address', '聯絡人地址', 'trim|required|xss_clean');
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('pages/institute_manage_edit', $data);
			$this->load->view('templates/footer');
		}
		else  //當表單驗證通過  
		{
			$this->institute_model->update_institute($institute_id);
			$message = "法人：". $this->input->post('institute').' '.$this->input->post('department')." 資料修改成功!";  //產生修改成功訊息
			$this->manage_institute($institute_id, $message);  //回瀏覽專案頁面
		}
	}
	
	/**
	manage_list_institute_project：管理法人專案計畫資料
	*/
	public function manage_list_institute_project($institute_id, $message = '')  //管理法人資料
	{		
		$data['css_location'] = site_url("/application/assets/css");  //給予css位址資訊到要呈現之頁面
		$data['js_location'] = site_url("/application/assets/js");  
		$data['img_location'] = site_url("/application/assets/img");
        $data['project_location'] = site_url("/application/assets/project");		
		$data['title'] = "法人資源管理";
		$data['message'] = $message;
		$data['institute_data'] = $this->institute_model->get_one_specific_institute_basic_info($institute_id);
		$search_rule = $this->input->post('search_institute_project', true);  //取得搜尋條件
		if($search_rule == null)  //當沒有讀取到POST所傳遞的search_rule資料，則表示使用者第一次點選此連結或沒有設定搜尋項目
		{
			$search_rule = null;  //則設定使用者要瀏覽第一頁
		}
		else
		{
			$data['search_rule'] = $search_rule;
		}
		$all_project = $this->institute_model->get_all_institute_project($institute_id ,$search_rule);  //取得特定法人的所有專案資料
		$total_data_count = count($all_project);  //計算取得法人資料總筆數		
		$data['total_data_count'] = $total_data_count;
		//傳遞資料筆數
		$data_show_count = 5;  //設定一頁呈現的資料筆數
		$data['data_show_count'] = $data_show_count;
		$page = $this->input->get('page', true);  //取得由get方法傳送使用者點選的頁面連結(亦即使用者要看的分頁)
		$data['page'] = $page;
		if($page == null)  //當沒有讀取到GET所傳遞的page資料，則表示使用者第一次點選此連結
		{
			$page = 0;  //則設定使用者要瀏覽第一頁
		}
		if($data_show_count != 0)
			$data['page_number'] = ceil($total_data_count/$data_show_count);  //無條件進位
		else
			$data['page_number'] = 0;  //至少顯示一頁
		$data['project_list'] = $this->institute_model->get_specific_institute_project($institute_id, $data_show_count * $page, $data_show_count, $search_rule);  //取得特定選擇頁數使用者所需要呈現的法人資料
		$data['start_record'] = $data_show_count * $page;
		$data['show_data_count'] = count($data['project_list']);  //計算取得法人資料總筆數
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pages/institute_manage_project_list', $data);
		$this->load->view('templates/footer');
	}
	
	/*public function view_register_page()  //註冊學校資料
	{
		$data['title'] = "法人註冊";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
	}*/
	
	/**
	register method：用以註冊法人資料，資料來源為create.php頁面
	*/
	/*public function register()
	{		
		$data['title'] = '法人註冊';
		$this->form_validation->set_error_delimiters('<label style="color:#6600FF">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('account', '帳號', 'trim|required|min_length[4]|max_length[15]|is_unique[institute.account]|xss_clean');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('password', '密碼', 'trim|required|min_length[4]|max_length[10]|matches[conf_password]');		
		$this->form_validation->set_rules('conf_password', '密碼確認', 'trim|required');
		$this->form_validation->set_rules('institute', '單位名稱', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('department', '單位部門', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('address', '地址', 'trim|required');
		$this->form_validation->set_rules('website', '網址', 'trim|required');
		$this->form_validation->set_rules('introduction', '單位部門簡介', 'trim|required');
		$this->form_validation->set_rules('contact_name', '聯絡人姓名', 'trim|required');
		$this->form_validation->set_rules('contact_phone', '聯絡人電話', 'trim|required');
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email');
		$this->form_validation->set_rules('contact_address', '聯絡人地址', 'trim|required');
		$this->form_validation->set_rules('register_name', '註冊者姓名', 'trim|required');
		$this->form_validation->set_rules('register_phone', '註冊者電話', 'trim|required');
		$this->form_validation->set_rules('register_email', '註冊者電子郵件', 'trim|required|valid_email');
		$this->form_validation->set_rules('register_address', '註冊者地址', 'trim|required');
		$this->form_validation->set_rules('agree_contract', '合約條款', 'trim|required');
		
		$data['css_location'] = site_url("/application/assets/css");
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register');
			//$this->load->view('pages/login',$data);
			$this->load->view('templates/footer');
		}
		else  //當表單驗證通過
		{
			$this->institute_model->set_institute();  //呼叫模型中定義的方法set_institute()來新增新聞資料
			$this->load->view('pages/formsuccess');
		}
	}*/
	
	/**
	institute_basic_info_management：用以註冊法人資料，資料來源為create.php頁面
	*/
	/*public function register()
	{		
		$data['title'] = '法人註冊';
		$this->form_validation->set_error_delimiters('<label style="color:#6600FF">','</label>');  //錯誤訊息顯示的樣式
		//設定表單欄位資料的驗證規則
		$this->form_validation->set_rules('account', '帳號', 'trim|required|min_length[4]|max_length[15]|is_unique[institute.account]|xss_clean');  //參數一：欄位名稱、參數二：錯誤訊息顯示時欄位所要表示的名稱、參數三：欄位的驗證條件(註：required表示欄位必須要有輸入)
		$this->form_validation->set_rules('password', '密碼', 'trim|required|min_length[4]|max_length[10]|matches[conf_password]');		
		$this->form_validation->set_rules('conf_password', '密碼確認', 'trim|required');
		$this->form_validation->set_rules('institute', '單位名稱', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('department', '單位部門', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('address', '地址', 'trim|required');
		$this->form_validation->set_rules('website', '網址', 'trim|required');
		$this->form_validation->set_rules('introduction', '單位部門簡介', 'trim|required');
		$this->form_validation->set_rules('contact_name', '聯絡人姓名', 'trim|required');
		$this->form_validation->set_rules('contact_phone', '聯絡人電話', 'trim|required');
		$this->form_validation->set_rules('contact_email', '聯絡人電子郵件', 'trim|required|valid_email');
		$this->form_validation->set_rules('contact_address', '聯絡人地址', 'trim|required');
		$this->form_validation->set_rules('register_name', '註冊者姓名', 'trim|required');
		$this->form_validation->set_rules('register_phone', '註冊者電話', 'trim|required');
		$this->form_validation->set_rules('register_email', '註冊者電子郵件', 'trim|required|valid_email');
		$this->form_validation->set_rules('register_address', '註冊者地址', 'trim|required');
		$this->form_validation->set_rules('agree_contract', '合約條款', 'trim|required');
		
		$data['css_location'] = site_url("/application/assets/css");
		//撰寫表單驗證通過與不通過的對應處理方式
		if($this->form_validation->run() === FALSE)  //當表單驗證不通過
		{
			$this->load->view('templates/header', $data);
			$this->load->view('pages/register');
			//$this->load->view('pages/login',$data);
			$this->load->view('templates/footer');
		}
		else  //當表單驗證通過
		{
			$this->institute_model->set_institute();  //呼叫模型中定義的方法set_institute()來新增新聞資料
			$this->load->view('pages/formsuccess');
		}
	}*/
}
