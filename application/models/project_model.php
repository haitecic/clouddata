<?php
class Project_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();  //載入資料庫程式庫	
		date_default_timezone_set('Asia/Taipei');  //設定時區
	}
	
	/**
	get_all_projects_count()：取得符合搜尋條件的專案數量
	*/	
	public function get_all_projects_count($search_item) 
	{		
		$search_content = $search_item['search_bar'];
		$search_firm = $search_item['search_firm'];
		$search_school = $search_item['search_school'];
		$search_institute = $search_item['search_institute'];
		$arr = array($search_firm, $search_school, $search_institute);			
		$rule1 = "";
		if(!empty($search_content) && isset($search_content))
		{				
			$search_word = explode(' ', $search_content);
			for($i=0;$i<count($search_word);$i++)
			{
				$rule1 = $rule1."(`org_name` LIKE '%".$search_word[$i]."%' OR `project_name` LIKE '%".$search_word[$i]."%' OR project.`pm` LIKE '%".$search_word[$i]."%')";
				if(($i+1) != count($search_word))
				{
					$rule1 = $rule1." AND ";
				}
			}				
		}
		else
		{
			$rule1 = "(`org_name` LIKE '%%' OR `project_name` LIKE '%%' OR project.`pm` LIKE '%%')";
		}
		$query_string = "SELECT data_by_order.* FROM ( SELECT `project`.`id` as project_id, `project_name`, `project`.`pm`, `project`.`status`, `project`.`phase`, `organization`.`id` as collaborate_id, `org_name` as institute, `unit_class` as class, `project`.`update_datetime`, record.`id` as last_record_id FROM `project` JOIN `project_history_record` as record on `record`.`project_id` = `project`.`id` JOIN `organization` on organization.`record_id` = `record`.`id` WHERE `unit_class` in ('1', '2', '3') AND `level_class` = 1 AND (".$rule1.") ORDER BY record.`id` DESC) AS data_by_order GROUP BY data_by_order.`project_id` order by `last_record_id` desc";
		$query = $this->db->query($query_string);	
		$result= $query->num_rows();		
		return $result;
	}
	
	/**
	get_number_file()：取得檔案數量
	*/	
	public function get_number_file()
	{
		$query_string = "SELECT project_id, count(`id`) as file_number FROM `project_attachment` GROUP BY `project_id`";
		$query = $this->db->query($query_string);	
		$result = $query->result_array();
        return $result;		
	}
	
	/**
	get_specific_projects_data()：取得特定專案資料(新)
	*/
	public function get_specific_projects_data($search_bar)
	{
		$search_content = $search_bar;		
		//分析搜尋框輸入的內容
		$rule1 = "";
		if(!empty($search_content) && isset($search_content))
		{				
			$search_word = explode(' ', $search_content);
			for($i=0;$i<count($search_word);$i++)
			{
                $rule1 = $rule1."(`year` LIKE '%".$search_word[$i]."%' OR 
				`km_id` LIKE '%".$search_word[$i]."%' OR
				`idea_id` LIKE '%".$search_word[$i]."%' OR 
				`idea_name` LIKE '%".$search_word[$i]."%' OR 
     			`idea_source` LIKE '%".$search_word[$i]."%' OR 
				`idea_description` LIKE '%".$search_word[$i]."%' OR
				`scenario_d` LIKE '%".$search_word[$i]."%' OR
				`function_d` LIKE '%".$search_word[$i]."%' OR
				`distinction_d` LIKE '%".$search_word[$i]."%' OR
				`value_d` LIKE '%".$search_word[$i]."%' OR
				`feasibility_d` LIKE '%".$search_word[$i]."%' OR
				`market_survey` LIKE '%".$search_word[$i]."%' OR
				`km_survey` LIKE '%".$search_word[$i]."%' OR
				`dep_item` LIKE '%".$search_word[$i]."%' OR
				`inner_or_outer` LIKE '%".$search_word[$i]."%' OR
				`stage` LIKE '%".$search_word[$i]."%' OR
				`stage_detail` LIKE '%".$search_word[$i]."%' OR
				`progress_description` LIKE '%".$search_word[$i]."%' OR
				`proposed_unit` LIKE '%".$search_word[$i]."%' OR
				`proposer` LIKE '%".$search_word[$i]."%' OR
				`proposed_date` LIKE BINARY'%".$search_word[$i]."%' OR
				`valid_project` LIKE '%".$search_word[$i]."%' OR
				`established_date` LIKE BINARY'%".$search_word[$i]."%' OR
				`joint_unit` LIKE '%".$search_word[$i]."%' OR
				`joint_person` LIKE '%".$search_word[$i]."%' OR
				`co_worker` LIKE '%".$search_word[$i]."%' OR
				`idea_examination` LIKE '%".$search_word[$i]."%' OR
				`Idea` LIKE '%".$search_word[$i]."%' OR
				`Requirement` LIKE '%".$search_word[$i]."%' OR
				`Feasibility` LIKE '%".$search_word[$i]."%' OR
				`Prototype` LIKE '%".$search_word[$i]."%' OR
				`note` LIKE '%".$search_word[$i]."%' OR
				`adoption` LIKE '%".$search_word[$i]."%' OR
				`applied_patent` LIKE '%".$search_word[$i]."%' OR
				`resurrection_application_qualified` LIKE '%".$search_word[$i]."%' OR
				`resurrection_applied` LIKE '%".$search_word[$i]."%' OR
				`PM_in_charge` LIKE '%".$search_word[$i]."%' OR 
				`closed_case` LIKE '%".$search_word[$i]."%')";
				if(($i+1) != count($search_word))
				{
					$rule1 = $rule1." AND ";
				}
			}				
		}
		else
		{
			$rule1 = "`year` LIKE '%%' ";
		}
	    //載入session項目
		$col_name_list = array("idea_name", 
							$this->session->userdata('second_item'),
							$this->session->userdata('third_item'),
							$this->session->userdata('fourth_item'),
							$this->session->userdata('fifth_item'),
							$this->session->userdata('sixth_item'),
							$this->session->userdata('seventh_item'));
		$item = "`id`, `is_blocked`, `current_user`";
		for($i=0;$i<count($col_name_list);$i++)
		{
			if($col_name_list[$i] != "null")
			{
				$item = $item . ',`' . $col_name_list[$i] . '`';
			}
		}
		//讀取資料		
		$query_string = "SELECT * FROM `project_all` WHERE ".$rule1;
		$query = $this->db->query($query_string);	
		$result = $query->result_array();		
		return $result;
	}
	
	public function get_project_files($project_id)
	{
		$query_string = "SELECT project.name, project_attachment.id, project_attachment.file_content ,project_attachment.project_id, project_attachment.file_name, project_attachment.instance_file_name FROM `project_basic_info` as `project` LEFT OUTER JOIN `project_attachment` on  `project`.`id` = `project_id` WHERE project.id=". $project_id;
		$query = $this->db->query($query_string);	
		$result = $query->result_array();			
		return $result;		
	}
	
	/**
	set_project_blocked():設定專案鎖住中
	*/
	public function set_project_blocked($project_id, $username)
	{
		$data = array('is_blocked'=>1,
			'current_user'=>$username);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
	}
	
	/**
	set_project_unblocked():設定專案鎖住中
	*/
	public function set_project_unblocked($project_id)
	{
		$data = array('is_blocked'=>2,
			'current_user'=>null);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
	}		
		
	/**
	get_img_name($km_id)：取得圖片名稱與數量
	*/
	public function get_img_name($km_id)
    {		
		$str="select name, description from project_img where `km_id`='$km_id'";
		$query = $this->db->query($str);	
		$result = $query->result_array();
		return $result;			 	
	}	
	
	/**
	get_specific_project_info($project_id)：取得特定專案資料
	$project_id：專案編號
	*/	
	public function get_specific_project_info($project_id) 
	{
		$this->db->select('*');
		$this->db->from('project_all');	
		$this->db->where('id', $project_id);
		$query = $this->db->get();	
		$result = $query->row_array();	
		return $result;			 
	}	
	
	/**
	get_specific_project_attachfile($project_id)：取得特定專案的附加檔案資料
	$project_id：專案編號
	*/	
	public function get_specific_project_attachfile($project_id) 
	{
		$this->db->select('*');
		$this->db->from('project_attachment');		
		$this->db->where('project_attachment.project_id', $project_id);
		$this->db->order_by("dir", "desc"); 
		$query = $this->db->get();	
		$result = $query->result_array();	
		return $result;			 
	}
	
	/**
	取得資料分類
	*/
	public function get_category_project_attachfile($project_id) 
	{
		$this->db->select('*');
		$this->db->from('project_attachment');		
		$this->db->where('project_attachment.project_id', $project_id);
		$this->db->order_by("dir", "Asc"); 
		$this->db->group_by('dir'); 
		$query = $this->db->get();	
		$result = $query->result_array();	
		return $result;			 
	}
	
	/**
	get_file_category_detail():ajax抓取資料分類
	*/
	public function get_file_category_detail($dir, $project_id)
	{
		$rule="(`dir` LIKE '%" . $dir . "%')";
		if($dir==null) $query_string = "SELECT * FROM `project_attachment` WHERE `project_id`=$project_id ORDER BY file_name ASC";
		else $query_string = "SELECT * FROM `project_attachment` WHERE (`project_id`=$project_id) AND ".$rule ." ORDER BY file_name ASC";
		$query = $this->db->query($query_string);			
		$result = $query->result_array();
		$number=count($result);		
		$file=array();
		$file['number']=$number;
		$file['list']=$result;
		return $file;
	}
	
	/**
	get_project_is_blocked($project_id)：取得特定專案是否被鎖住
	$project_id：專案編號
	*/	
	public function get_project_is_blocked($project_id) 
	{
		$this->db->select('is_blocked');
		$this->db->from('project_all');	
		$this->db->where('id', $project_id);
		$query = $this->db->get();	
		$result = $query->row_array();	
		if($result['is_blocked'] == 1)
		{
			return "block";
		}
		else if($result['is_blocked'] == 2) 
		{
			return "unblock";
		}	 
	}	
	
	/**
	get_chart_data_ajax():取得圖表呈現資料
	*/
	public function get_chart_data_ajax($user_id, $search_keyword)
	{		
		$query_string = "SELECT `year` FROM `project_all` group by `year` ASC";
		$query = $this->db->query($query_string);
		$year_count= $query->num_rows();
		$years = $query->result_array();
		$query_string = "SELECT `proposed_unit` FROM `project_all` group by `proposed_unit` ASC";
		$query = $this->db->query($query_string);
		$unit_count= $query->num_rows();
		$units = $query->result_array();		
		$output = array(
            'year_count' => $year_count,
			'unit_count' => $unit_count,
			'year' => $years,
            'unit' => $units,            
            'data' => array()
        );
		$i = 0;
		foreach($years as $year)
		{
			$temp_array = array();  //暫存各部門提案數量
			//取得每年各部門的提案數量
			$search_content = $search_keyword;		
			//分析搜尋框輸入的內容
			$rule = "";
			if(!empty($search_content) && isset($search_content))
			{				
				$search_word = explode(' ', $search_content);
				for($i=0;$i<count($search_word);$i++)
				{
					$rule = $rule."(`km_id` LIKE '%".$search_word[$i]."%' OR
					`idea_id` LIKE '%".$search_word[$i]."%' OR 
					`idea_name` LIKE '%".$search_word[$i]."%' OR 
					`idea_source` LIKE '%".$search_word[$i]."%' OR 
					`idea_description` LIKE '%".$search_word[$i]."%' OR
					`scenario_d` LIKE '%".$search_word[$i]."%' OR
					`function_d` LIKE '%".$search_word[$i]."%' OR
					`distinction_d` LIKE '%".$search_word[$i]."%' OR
					`value_d` LIKE '%".$search_word[$i]."%' OR
					`feasibility_d` LIKE '%".$search_word[$i]."%' OR
					`market_survey` LIKE '%".$search_word[$i]."%' OR
					`km_survey` LIKE '%".$search_word[$i]."%' OR
					`dep_item` LIKE '%".$search_word[$i]."%' OR
					`inner_or_outer` LIKE '%".$search_word[$i]."%' OR
					`stage` LIKE '%".$search_word[$i]."%' OR
					`stage_detail` LIKE '%".$search_word[$i]."%' OR
					`progress_description` LIKE '%".$search_word[$i]."%' OR
					`proposed_unit` LIKE '%".$search_word[$i]."%' OR
					`proposer` LIKE '%".$search_word[$i]."%' OR
					`proposed_date` LIKE BINARY'%".$search_word[$i]."%' OR
					`valid_project` LIKE '%".$search_word[$i]."%' OR
					`established_date` LIKE BINARY'%".$search_word[$i]."%' OR
					`joint_unit` LIKE '%".$search_word[$i]."%' OR
					`joint_person` LIKE '%".$search_word[$i]."%' OR
					`co_worker` LIKE '%".$search_word[$i]."%' OR
					`idea_examination` LIKE '%".$search_word[$i]."%' OR
					`Idea` LIKE '%".$search_word[$i]."%' OR
					`Requirement` LIKE '%".$search_word[$i]."%' OR
					`Feasibility` LIKE '%".$search_word[$i]."%' OR
					`Prototype` LIKE '%".$search_word[$i]."%' OR
					`note` LIKE '%".$search_word[$i]."%' OR
					`adoption` LIKE '%".$search_word[$i]."%' OR
					`applied_patent` LIKE '%".$search_word[$i]."%' OR
					`resurrection_application_qualified` LIKE '%".$search_word[$i]."%' OR
					`resurrection_applied` LIKE '%".$search_word[$i]."%' OR
					`PM_in_charge` LIKE '%".$search_word[$i]."%' OR 
					`closed_case` LIKE '%".$search_word[$i]."%')";
					if(($i+1) != count($search_word))
					{
						$rule = $rule." AND ";
					}
				}
				$rule = $rule." AND `year` = ". $year['year'];				
			}
			else
			{
				$rule = "`year`= ".$year['year'];
			}
			$query_string = "SELECT `proposed_unit`, count(*) as `proposed_count` FROM `project_all` where ".$rule." group by `proposed_unit` ASC";
			$query = $this->db->query($query_string);
			$unit_year = $query->result_array();
			foreach($units as $unit)
			{
				$data_index = -1;
				foreach($unit_year as $index=>$value)
				{
					if($unit['proposed_unit'] == $value['proposed_unit'])
					{
						$data_index = $index;
						break;
					}
				}
				if($data_index != -1)  //判斷是否存在此部門,若存在,取得其陣列的index值
				{
					array_push($temp_array, $unit_year[$data_index]['proposed_count']);
				} 
				else  //此部門於該年度無提案
				{					
					array_push($temp_array, 0);
				}
				/*
				//php是5.5版本才可使用array_column函數
				if ($index = array_search($unit, array_column($unit_year, 'proposed_unit')) !== false)  //判斷是否存在此部門,若存在取得其陣列的index值
				{
					array_push($temp_array, $unit_year[$index]['proposed_count']);
				} 
				*/
			}
			$output['data'][] = $temp_array;
			$i++;
		}		
		return json_encode($output);
	}
	
	/**
	edit_project_info()：編輯專案資料
	*/
	public function edit_project_info($project_id)
	{		
		//搬移檔案至指定資料夾
		$ori_file_dir = 'uploads/'.$this->input->post('upload_file_dir').'/';  //原始上傳目錄
		$new_file_dir = 'application/assets/project_attachment/'.$project_id.'/';//新上傳目錄
		$file_number = $this->input->post('file_number');  //檔案數量
		for($i=0;$i<$file_number;$i++)
		{		
			$file = $this->input->post('upload_file_'.$i);
			if(!empty($file))
			{
				$ori_file_name = $this->input->post('upload_file_'.$i);	
				$instance_file_name = $this->input->post('instance_file_name_'.$i);					
				$ext = end(explode('.', $ori_file_name));					
				$file_completename = $project_id.'_'.time().$i;//檔案名，不含附檔名
				$folder = $this->input->post('folder_'.$i);
				rename($ori_file_dir . $instance_file_name, $new_file_dir . $instance_file_name);
				//Get the content of the upload file
				$file_content = "";								
				//新增檔案至資料庫
				$project_file = array('project_id'=>$project_id,
				'file_name'=>$ori_file_name,				
				'instance_file_name'=>$instance_file_name,
				'dir'=>$folder,
				'file_content'=>$file_content);
				$this->db->insert('project_attachment', $project_file);
			}
			else
			{
				continue;
			}
		}	
		//處理被刪除的檔案
		$delete_count = $this->input->post('delete_file_count');
		for($i=0;$i < $delete_count;$i++)
		{		
			$delete_file_name = $this->input->post('delete_file_'.$i);
			//資料庫部分，project_attachment資料表
			$this->db->delete('project_attachment', array('instance_file_name' => $delete_file_name));
			//檔案部分
			unlink('application/assets/project_attachment/'.$project_id.'/'.$delete_file_name);
		}
		return ;
	}	

	/**
	get_project_checked_user():取得專案確認者
	*/
	public function get_project_checked_user($user_id) 
	{
		$this->db->select('*');
		$this->db->from('login_account');	
		$this->db->where('id', $user_id);
		$query = $this->db->get();	
		$result = $query->row_array();	
		return $result;			 
	}
	
	/**
	set_project_data_checked():更新專案資料確認者
	*/
	public function set_project_data_checked($project_id, $user_id, $checked_time)
	{
		$data = array('is_checked' => 1,
			'checked_user' => $user_id,
			'checked_time' => $checked_time);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
	}	

	public function get_project_datatable_record($parameter, $DB_table, $columns)
	{		
		if(isset($parameter['search']) && !empty($parameter['search']))
        {
			$search_content = $parameter['search'];
			//分析搜尋框輸入的內容
			$rule = "";	
			$search_word = explode(' ', $search_content);			
			for($i=0;$i<count($search_word);$i++)
			{
				$rule = $rule."(LOWER(`year`) LIKE LOWER('%".$search_word[$i]."%') OR 				
				LOWER(`idea_id`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`idea_name`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`idea_source`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`scenario_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`function_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`distinction_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`value_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`feasibility_d`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`stage`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`stage_detail`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`progress_description`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`proposed_unit`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`proposer`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`established_date`) LIKE BINARY LOWER('%".$search_word[$i]."%') OR				
				LOWER(`idea_examination`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Idea`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Requirement`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Feasibility`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Prototype`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`note`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`adoption`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`applied_patent`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`resurrection_application_qualified`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`resurrection_applied`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`PM_in_charge`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`closed_case`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`file_name`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`file_content`) LIKE LOWER('%".$search_word[$i]."%'))";
				if(($i+1) != count($search_word))
				{
					$rule = $rule." AND ";
				}
			}	
		}
		else
		{
			$rule = "`year` LIKE '%%' ";
		}	
		$order_column = $columns[intval($this->db->escape_str($parameter['order_column']))];
		$order_method = $this->db->escape_str($parameter['order_method']);
		$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT `project_all`.`id`, `year`, `idea_id`, `idea_name`, `idea_source`, `scenario_d`, `function_d`,`distinction_d`,`value_d`,`feasibility_d`, `stage`, `progress_description`,`proposed_unit`,`proposer`, `Idea`, `Requirement`, `Feasibility`, `Prototype`, `note`, `applied_patent`,`resurrection_application_qualified`,`resurrection_applied`,`PM_in_charge`, `idea_examination`,`closed_case`, established_date, adoption, `is_blocked`, `file_name`, `file_content` FROM `project_all` LEFT JOIN `project_attachment` ON `project_all`.`id` = `project_attachment`.`project_id` WHERE '.$rule.' GROUP BY `project_all`.`id`) AS T ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //只撈出project_list需呈現之資料
		$rResult = $this->db->query($query_string);		
        // Data set length after filtering		
		$query = $this->db->query('SELECT FOUND_ROWS() AS `found_rows`');
		$iFilteredTotal = $query->row()->found_rows;        
        // Total data set length
        $iTotal = $this->db->count_all($DB_table);
		
		$output = array(
            'draw' => intval($parameter['draw']),
            'recordsTotal' => intval($iTotal),
            'recordsFiltered' => intval($iFilteredTotal),
            'data' => array()
        );
		$a = 0;
		$row_index = 0;  //表格row的id編號
		//$column_mapping = array("idea_id"=>"創意提案編號", "year"=>"年分", "km_id"=>"KM文件編號", "idea_name"=>"創意提案名稱", "idea_source"=>"創意提案來源", "scenario_d"=>"情境說明", "function_d"=>"功能構想", "distinction_d"=>"差異化", "value_d"=>"價值性", "feasibility_d"=>"可行性", "market_survey"=>"市場搜尋", "km_survey"=>"KM平台搜尋", "dep_item"=>"研發項目確認", "idea_description"=>"提案說明", "inner_or_outer"=>"提案類別", "stage"=>"階段狀態", "stage_detail"=>"階段細項狀態", "progress_description"=>"進度說明", "proposed_unit"=>"提案單位", "proposer"=>"提案人", "proposed_date"=>"提案日期", "valid_project"=>"有效提案", "established_date"=>"立案日期", "joint_unit"=>"協辦單位", "joint_person"=>"協辦窗口", "co_worker"=>"承作廠商", "idea_examination"=>"提案審核進度", "Idea"=>"Idea", "Requirement"=>"Requirement", "Feasibility"=>"Feasibility", "Prototype"=>"Prototype", "note"=>"備註", "adoption"=>"導入車型", "applied_patent"=>"專利申請", "resurrection_application_qualified"=>"具敗部復活申請資格", "resurrection_applied"=>"申請敗部復活", "PM_in_charge"=>"創意中心窗口", "closed_case"=>"結案");
		$column_mapping = array("idea_id"=>"提案編號", "year"=>"年度", "idea_name"=>"提案名稱", "idea_source"=>"提案來源", "scenario_d"=>"情境說明", "function_d"=>"功能構想", "distinction_d"=>"差異化", "value_d"=>"價值性", "feasibility_d"=>"可行性", "stage"=>"階段狀態", "progress_description"=>"進度說明", "proposed_unit"=>"提案單位", "proposer"=>"提案人", "established_date"=>"立案日期",  "idea_examination"=>"提案審核履歷", "Idea"=>"I階段文件檢核", "Requirement"=>"R階段文件檢核", "Feasibility"=>"F階段文件檢核", "Prototype"=>"P階段文件檢核", "note"=>"備註", "adoption"=>"導入車型/先期式樣", "applied_patent"=>"專利申請/取得", "resurrection_application_qualified"=>"具備敗部復活申請資格", "resurrection_applied"=>"敗部復活申請", "PM_in_charge"=>"創意中心窗口", "closed_case"=>"結案", "file_name"=>"於附加檔案中", "file_content"=>"於附加檔案中");
		foreach($rResult->result_array() as $project)
        {
			$key_sentence = "";  //存放關鍵句子
			$column = "";  //存放關鍵句子所在的欄位		
			$search_result_hint = "";  //查詢結果提示字串			
			if(isset($parameter['search']) && !empty($parameter['search']))
			{
				$search_content = $parameter['search'];
				$search_word = explode(' ', $search_content);
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
				//$temp = preg_split("/[?!,-.;]+/",$all_content);
				$temp = preg_split("/[?!,.;]+/",$all_content);
				foreach($temp as $index=>$sentence)
				{
					$score = 0;
					for($j=0;$j<count($search_word);$j++)
					{
						if(stripos($sentence, $search_word[$j]) !== false)
						{
							$score = $score + substr_count(strtoupper($sentence), strtoupper($search_word[$j]));
						}
					}
					array_push($temp_score, (int)$score);					
				}	
				$first_score = 0;
				$sen = 0;
				foreach($temp as $index=>$sentence)
				{		
					if($temp_score[$index] > $first_score)  //$first_score
					{
						$sen = $sentence;
						$first_score = $temp_score[$index];
					}					
				}
				$key_sentence = $sen;
				foreach($project as $index => $content)
				{					
					if(stripos($content, $key_sentence) !== false)
					{		
						if($index == "file_content")  //假如關鍵句在附加檔案中
						{
							$column = '(附加檔案)'.$project['file_name'];
						}
						else
						{
							$column = $column_mapping[$index];
						}
						break;
					}
				}
				if(strlen(($column.':'.$key_sentence)) > 30) //65
				{
					$search_result_hint = "<div id='$a' onmouseover='show_more_content(this)' onmouseout='show_more_content(this)' style='font-size:10pt;	text-overflow:ellipsis;	width:100%; overflow:hidden; white-space:nowrap;'>$column : $key_sentence</div>";
					$a++;
				}
				else
				{
					$search_result_hint = "<div style='font-size:10pt'>$column : $key_sentence</div>";
				}				
			}			  
            $row = array();			
			$row['DT_RowId'] = 'row_project_'.$row_index;  //增加各row的id屬性
            $i=0;
            foreach($columns as $col)
            {					
				if($col == "null")
				{
					$row[$i] = "";
				}
				else
				{
					switch($col)
					{
						case 'id':	
							if($project['is_blocked'] == 1)	
							{							
								$row[$i] = "<div align=\"center\"><input id=\"row_project_img_$row_index\" style=\"width:30px;height:24px\" type=\"image\" src=\"./application/assets/img/lock3.png\" alt=\"edit\" onclick=\"edit_project($project[$col])\"/><input type=\"hidden\" id=\"row_project_hidden_$row_index\" value=\"$project[$col]\"/></div>";
							}
							else if($project['is_blocked'] == 2)
							{
								$row[$i] = "<div align=\"center\"><input id=\"row_project_img_$row_index\" style=\"width:30px;height:24px\" type=\"image\" src=\"./application/assets/img/edit3.png\" alt=\"edit\" onclick=\"edit_project($project[$col])\"/><input type=\"hidden\" id=\"row_project_hidden_$row_index\" value=\"$project[$col]\"/></div>";
							}
							break;
						case 'idea_name':						
							$row[$i] = '<div style="color:#23459F">'.$project[$col].'</div>'.$search_result_hint;							
							break;
						default:
							$row[$i] = $project[$col];
					}
				}
				$i++;
            }
			$row_index++;
            $output['data'][] = $row;			
        }
        return json_encode($output);
	}	
	
	public function get_news_datatable_record($parameter, $DB_table, $columns)
	{
		if(isset($parameter['search']) && !empty($parameter['search']))
        {
			$search_content = $parameter['search'];
			//分析搜尋框輸入的內容
			$rule = "";	
			$search_word = explode(' ', $search_content);
			for($i=0;$i<count($search_word);$i++)
			{
				$rule = $rule."(LOWER(`title`) LIKE LOWER('%".$search_word[$i]."%') OR 				
				LOWER(`category`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`description`) LIKE LOWER('%".$search_word[$i]."%'))";
				if(($i+1) != count($search_word))
				{
					$rule = $rule." AND ";
				}
			}	
		}
		else
		{
			$rule = "`title` LIKE '%%' ";
		}
		$order_column = $columns[intval($this->db->escape_str($parameter['order_column']))];
		$order_method = $this->db->escape_str($parameter['order_method']);
		$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM `news` WHERE '.$rule.' ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //撈出news紀錄資料
		$rResult = $this->db->query($query_string);		
		$query = $this->db->query('SELECT FOUND_ROWS() AS `found_rows`');
		$iFilteredTotal = $query->row()->found_rows;       
        $iTotal = $this->db->count_all($DB_table);  // Total data set length		
		$output = array(
            'draw' => intval($parameter['draw']),
            'recordsTotal' => intval($iTotal),
            'recordsFiltered' => intval($iFilteredTotal),
            'data' => array()
        );
		$a = 0;
		$row_index = 0;  //表格row的id編號
		$news_column_mapping = array("title"=>"標題", "category"=>"類別", "description"=>"描述", "link"=>"連結", "pub_date"=>"發布日期");
		foreach($rResult->result_array() as $project)
        {
			$key_sentence = "";  //存放關鍵句子
			$column = "";  //存放關鍵句子所在的欄位		
			$search_result_hint = "";  //查詢結果提示字串			
			if(isset($parameter['search']) && !empty($parameter['search']))
			{
				$search_content = $parameter['search'];
				$search_word = explode(' ', $search_content);
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
						if(stripos($sentence, $search_word[$j]) !== false)
						{
							$score = $score + substr_count(strtoupper($sentence), strtoupper($search_word[$j]));
						}
					}
					array_push($temp_score, (int)$score);					
				}	
				$first_score = 0;
				$sen = 0;
				foreach($temp as $index=>$sentence)
				{		
					if($temp_score[$index] > $first_score)  //$first_score
					{
						$sen = $sentence;
						$first_score = $temp_score[$index];
					}					
				}
				$key_sentence = $sen;
				foreach($project as $index => $content)
				{					
					if(stripos($content, $key_sentence) !== false)
					{	
						$column = $news_column_mapping[$index];
						break;
					}
				}
				if(strlen(($column.':'.$key_sentence)) > 30) //65
				{
					$search_result_hint = "<div id='$a' onmouseover='show_more_content(this)' onmouseout='show_more_content(this)' style='font-size:10pt;	text-overflow:ellipsis;	width:100%; overflow:hidden; white-space:nowrap;'>$column : $key_sentence</div>";
					$a++;
				}
				else
				{
					$search_result_hint = "<div style='font-size:10pt'>$column : $key_sentence</div>";
				}				
			}			  
            $row = array();			
			$row['DT_RowId'] = 'row_news_'.$row_index;  //增加各row的id屬性
            $i=0;
            foreach($columns as $col)
            {			
				if($col == "null")
				{
					$row[$i] = "";
				}
				else
				{		
					switch($col)
					{
						case 'id':	
							$row[$i] = "<div align=\"center\"><input id=\"row_news_img_$row_index\" style=\"width:27px;height:24px\" type=\"image\" src=\"./application/assets/img/link.png\" alt=\"edit\" onclick=\"link_to_reference('$project[link]')\"/></div>";
							break;
						case 'title':						
							$row[$i] = '<div style="color:#23459F">'.$project[$col].'</div>'.$search_result_hint;							
							break;
						default:
							$row[$i] = $project[$col];
					}
				}
				$i++;
            }
			$row_index++;
            $output['data'][] = $row;			
        }
        return json_encode($output);
	}
	
	public function get_external_tech_datatable_record($parameter, $DB_table, $columns)
	{
		if(isset($parameter['search']) && !empty($parameter['search']))
        {
			$search_content = $parameter['search'];
			//分析搜尋框輸入的內容
			$rule = "";	
			$search_word = explode(' ', $search_content);
			for($i=0;$i<count($search_word);$i++)
			{
				$rule = $rule."(LOWER(`year`) LIKE LOWER('%".$search_word[$i]."%') OR 				
				LOWER(`idea_id`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`idea_name`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`idea_source`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`scenario_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`function_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`distinction_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`value_d`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`feasibility_d`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`stage`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`stage_detail`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`progress_description`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`proposed_unit`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`proposer`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`established_date`) LIKE BINARY LOWER('%".$search_word[$i]."%') OR				
				LOWER(`idea_examination`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Idea`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Requirement`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Feasibility`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`Prototype`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`note`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`adoption`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`applied_patent`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`resurrection_application_qualified`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`resurrection_applied`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`PM_in_charge`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`closed_case`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`file_name`) LIKE LOWER('%".$search_word[$i]."%') OR				
				LOWER(`file_content`) LIKE LOWER('%".$search_word[$i]."%'))";
				if(($i+1) != count($search_word))
				{
					$rule = $rule." AND ";
				}
			}	
		}
		else
		{
			$rule = "`year` LIKE '%%' ";
		}
		$order_column = $columns[intval($this->db->escape_str($parameter['order_column']))];
		$order_method = $this->db->escape_str($parameter['order_method']);
		$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT `project_all`.`id`, `year`, `idea_id`, `idea_name`, `idea_source`, `scenario_d`, `function_d`,`distinction_d`,`value_d`,`feasibility_d`, `stage`, `progress_description`,`proposed_unit`,`proposer`, `Idea`, `Requirement`, `Feasibility`, `Prototype`, `note`, `applied_patent`,`resurrection_application_qualified`,`resurrection_applied`,`PM_in_charge`, `idea_examination`,`closed_case`, established_date, adoption, `is_blocked`, `file_name`, `file_content` FROM `project_all` LEFT JOIN `project_attachment` ON `project_all`.`id` = `project_attachment`.`project_id` WHERE '.$rule.' GROUP BY `project_all`.`id`) AS T ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //只撈出project_list需呈現之資料
		$rResult = $this->db->query($query_string);		
        // Data set length after filtering
		$query = $this->db->query('SELECT FOUND_ROWS() AS `found_rows`');
		$iFilteredTotal = $query->row()->found_rows;       
        $iTotal = $this->db->count_all($DB_table);  // Total data set length		
		$output = array(
            'draw' => intval($parameter['draw']),
            'recordsTotal' => intval($iTotal),
            'recordsFiltered' => intval($iFilteredTotal),
            'data' => array()
        );
		$a = 0;
		$row_index = 0;  //表格row的id編號
		$column_mapping = array("idea_id"=>"提案編號", "year"=>"年度", "idea_name"=>"提案名稱", "idea_source"=>"提案來源", "scenario_d"=>"情境說明", "function_d"=>"功能構想", "distinction_d"=>"差異化", "value_d"=>"價值性", "feasibility_d"=>"可行性", "stage"=>"階段狀態", "progress_description"=>"進度說明", "proposed_unit"=>"提案單位", "proposer"=>"提案人", "established_date"=>"立案日期",  "idea_examination"=>"提案審核履歷", "Idea"=>"I階段文件檢核", "Requirement"=>"R階段文件檢核", "Feasibility"=>"F階段文件檢核", "Prototype"=>"P階段文件檢核", "note"=>"備註", "adoption"=>"導入車型/先期式樣", "applied_patent"=>"專利申請/取得", "resurrection_application_qualified"=>"具備敗部復活申請資格", "resurrection_applied"=>"敗部復活申請", "PM_in_charge"=>"創意中心窗口", "closed_case"=>"結案", "file_name"=>"於附加檔案中", "file_content"=>"於附加檔案中");
		foreach($rResult->result_array() as $project)
        {
			$key_sentence = "";  //存放關鍵句子
			$column = "";  //存放關鍵句子所在的欄位		
			$search_result_hint = "";  //查詢結果提示字串			
			if(isset($parameter['search']) && !empty($parameter['search']))
			{
				$search_content = $parameter['search'];
				$search_word = explode(' ', $search_content);
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
						if(stripos($sentence, $search_word[$j]) !== false)
						{
							$score = $score + substr_count(strtoupper($sentence), strtoupper($search_word[$j]));
						}
					}
					array_push($temp_score, (int)$score);					
				}	
				$first_score = 0;
				$sen = 0;
				foreach($temp as $index=>$sentence)
				{		
					if($temp_score[$index] > $first_score)  //$first_score
					{
						$sen = $sentence;
						$first_score = $temp_score[$index];
					}					
				}
				$key_sentence = $sen;
				foreach($project as $index => $content)
				{					
					if(stripos($content, $key_sentence) !== false)
					{		
						if($index == "file_content")  //假如關鍵句在附加檔案中
						{
							$column = '(附加檔案)'.$project['file_name'];
						}
						else
						{
							$column = $column_mapping[$index];
						}
						break;
					}
				}
				if(strlen(($column.':'.$key_sentence)) > 30) //65
				{
					$search_result_hint = "<div id='$a' onmouseover='show_more_content(this)' onmouseout='show_more_content(this)' style='font-size:10pt;	text-overflow:ellipsis;	width:100%; overflow:hidden; white-space:nowrap;'>$column : $key_sentence</div>";
					$a++;
				}
				else
				{
					$search_result_hint = "<div style='font-size:10pt'>$column : $key_sentence</div>";
				}				
			}			  
            $row = array();			
			$row['DT_RowId'] = 'row_project_'.$row_index;  //增加各row的id屬性
            $i=0;
            foreach($columns as $col)
            {					
				if($col == "null")
				{
					$row[$i] = "";
				}
				else
				{
					switch($col)
					{
						case 'id':	
							if($project['is_blocked'] == 1)	
							{							
								$row[$i] = "<input id=\"row_project_img_$row_index\" style=\"width:30px;height:24px\" type=\"image\" src=\"./application/assets/img/lock3.png\" alt=\"edit\" onclick=\"edit_project($project[$col])\"/><input type=\"hidden\" id=\"row_project_hidden_$row_index\" value=\"$project[$col]\"/>";
							}
							else if($project['is_blocked'] == 2)
							{
								$row[$i] = "<input id=\"row_project_img_$row_index\" style=\"width:30px;height:24px\" type=\"image\" src=\"./application/assets/img/edit3.png\" alt=\"edit\" onclick=\"edit_project($project[$col])\"/><input type=\"hidden\" id=\"row_project_hidden_$row_index\" value=\"$project[$col]\"/>";
							}
							break;
						case 'idea_name':						
							$row[$i] = '<div style="color:#23459F">'.$project[$col].'</div>'.$search_result_hint;							
							break;
						default:
							$row[$i] = $project[$col];
					}
				}
				$i++;
            }
			$row_index++;
            $output['data'][] = $row;			
        }
        return json_encode($output);
	}
	
	public function get_manager_opinion_datatable_record($parameter, $DB_table, $columns)
	{
		if(isset($parameter['search']) && !empty($parameter['search']))
        {
			$search_content = $parameter['search'];
			//分析搜尋框輸入的內容
			$rule = "";	
			$search_word = explode(' ', $search_content);
			for($i=0;$i<count($search_word);$i++)
			{
				$rule = $rule."(LOWER(`topic`) LIKE LOWER('%".$search_word[$i]."%') OR 				
				LOWER(`content`) LIKE LOWER('%".$search_word[$i]."%') OR 
				LOWER(`in_charge`) LIKE LOWER('%".$search_word[$i]."%') OR
				LOWER(`file_name`) LIKE LOWER('%".$search_word[$i]."%') OR					
				LOWER(`time`) LIKE BINARY LOWER('%".$search_word[$i]."%') OR				
				LOWER(`people`) LIKE LOWER('%".$search_word[$i]."%'))";
				if(($i+1) != count($search_word))
				{
					$rule = $rule." AND ";
				}
			}	
		}
		else
		{
			$rule = "`time` LIKE '%%' ";
		}
		$order_column = $columns[intval($this->db->escape_str($parameter['order_column']))];
		$order_method = $this->db->escape_str($parameter['order_method']);
		$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM `vp_meeting` WHERE '.$rule.' ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //撈出會議紀錄資料
		$rResult = $this->db->query($query_string);		
        // Data set length after filtering
		$query = $this->db->query('SELECT FOUND_ROWS() AS `found_rows`');
		$iFilteredTotal = $query->row()->found_rows;       
        $iTotal = $this->db->count_all($DB_table);  // Total data set length		
		$output = array(
            'draw' => intval($parameter['draw']),
            'recordsTotal' => intval($iTotal),
            'recordsFiltered' => intval($iFilteredTotal),
            'data' => array()
        );
		$a = 0;
		$row_index = 0;  //表格row的id編號
		$manager_opinion_column_mapping = array("topic"=>"討論議題", "content"=>"內容", "in_charge"=>"主辦(承辦)", "file_name"=>"附加檔案", "time"=>"時間", "people"=>"與會人員");
		foreach($rResult->result_array() as $project)
        {
			$key_sentence = "";  //存放關鍵句子
			$column = "";  //存放關鍵句子所在的欄位		
			$search_result_hint = "";  //查詢結果提示字串			
			if(isset($parameter['search']) && !empty($parameter['search']))
			{
				$search_content = $parameter['search'];
				$search_word = explode(' ', $search_content);
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
						if(stripos($sentence, $search_word[$j]) !== false)
						{
							$score = $score + substr_count(strtoupper($sentence), strtoupper($search_word[$j]));
						}
					}
					array_push($temp_score, (int)$score);					
				}	
				$first_score = 0;
				$sen = 0;
				foreach($temp as $index=>$sentence)
				{		
					if($temp_score[$index] > $first_score)  //$first_score
					{
						$sen = $sentence;
						$first_score = $temp_score[$index];
					}					
				}
				$key_sentence = $sen;
				foreach($project as $index => $content)
				{					
					if(stripos($content, $key_sentence) !== false)
					{		
						$column = $manager_opinion_column_mapping[$index];						
						break;
					}
				}
				if(strlen(($column.':'.$key_sentence)) > 30) //65
				{
					$search_result_hint = "<div id='$a' onmouseover='show_more_content(this)' onmouseout='show_more_content(this)' style='font-size:10pt;	text-overflow:ellipsis;	width:100%; overflow:hidden; white-space:nowrap;'>$column : $key_sentence</div>";
					$a++;
				}
				else
				{
					$search_result_hint = "<div style='font-size:10pt'>$column : $key_sentence</div>";
				}				
			}			  
            $row = array();			
			$row['DT_RowId'] = 'row_project_'.$row_index;  //增加各row的id屬性
            $i=0;
            foreach($columns as $col)
            {					
				if($col == "null")
				{
					$row[$i] = "";
				}
				else
				{		
					switch($col)
					{
						case 'id':	
							$row[$i] = "<div align=\"center\"><input id=\"row_manager_opinion_img_$row_index\" style=\"width:27px;height:24px\" type=\"image\" src=\"./application/assets/img/preview.png\" alt=\"edit\" onclick=\"view_file('$project[$col]', 'row_manager_opinion_img_".$row_index."')\"/><input type=\"hidden\" id=\"row_manager_opinion_hidden_$row_index\" value=\"$project[$col]\"/></div>";
							break;
						case 'topic':						
							$row[$i] = '<div style="color:#23459F">'.$project[$col].'</div>'.$search_result_hint;							
							break;
						default:
							$row[$i] = $project[$col];
					}
				}
				$i++;
            }
			$row_index++;
            $output['data'][] = $row;			
        }
        return json_encode($output);
	}
}

