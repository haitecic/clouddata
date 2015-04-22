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
		/*if($search_item['search_bar'] != null || $search_item['search_firm'] != 1 || $search_item['search_school'] != 2 || $search_item['search_institute'] != 3)  //有設定搜尋條件
		{
			$search_content = $search_item['search_bar'];
			$search_firm = $search_item['search_firm'];
			$search_school = $search_item['search_school'];
			$search_institute = $search_item['search_institute'];
			$arr = array($search_firm, $search_school, $search_institute);
			$this->db->select('project.id as project_id, project_name, pm, status, phase, detail_id, collaborate_object.id as collaborate_id, institute, class, collaborate_object.website, project.update_datetime');
			$this->db->from('project');
			$this->db->join('collaborate_object', 'collaborate_object.id = project.collaborate_id');
			$where = "`class` in ('$search_firm', '$search_school', '$search_institute') AND (`institute` LIKE '%$search_content%' OR `project_name` LIKE '%$search_content%' OR `pm` LIKE '%$search_content%')";
			$this->db->where($where);		
			$this->db->order_by("project.update_datetime", "desc");
			$query = $this->db->get();
			$result= $query->result_array();
		}
		else  //沒設定搜尋條件-即取得產學研所有專案
		{
			$this->db->select('project.id as project_id, project_name, pm, status, phase, detail_id, collaborate_object.id  as collaborate_id, institute, class, collaborate_object.website')->from('project')->join('collaborate_object', 'collaborate_object.id = project.collaborate_id')->order_by("project.update_datetime", "desc");;
			$query = $this->db->get();
			$result= $query->result_array();
		}*/
				
		//if($search_item['search_bar'] != null || $search_item['search_firm'] != 1 || $search_item['search_school'] != 2 || $search_item['search_institute'] != 3)  //有設定搜尋條件
		//{
			$search_content = $search_item['search_bar'];
			$search_firm = $search_item['search_firm'];
			$search_school = $search_item['search_school'];
			$search_institute = $search_item['search_institute'];
			$arr = array($search_firm, $search_school, $search_institute);
			//$this->db->distinct();
			//$this->db->select('project_name');
			/*$this->db->distinct();
			$this->db->select('project.id as project_id, project_name, project.pm, project.status, project.phase, organization.id as collaborate_id, org_name as institute, unit_class as class, project.update_datetime');
			$this->db->from('project');			
			$this->db->join('project_history_record', 'project_history_record.project_id = project.id');
			$this->db->join('organization', 'organization.record_id = project_history_record.id');
			$where = "`unit_class` in ('$search_firm', '$search_school', '$search_institute') AND `level_class` = 1 AND(`org_name` LIKE '%$search_content%' OR `project_name` LIKE '%$search_content%' OR project.`pm` LIKE '%$search_content%')";
			$this->db->where($where);		
			$this->db->group_by('project_id');			
			$this->db->order_by("project.update_datetime", "desc");				
			$query = $this->db->get();*/
			//$query_string = sprintf("SELECT data_by_order.* FROM ( SELECT `project`.`id` as project_id, `project_name`, `project`.`pm`, `project`.`status`, `project`.`phase`, `organization`.`id` as collaborate_id, `org_name` as institute, `unit_class` as class, `project`.`update_datetime`, record.`id` as last_record_id FROM `project` JOIN `project_history_record` as record on `record`.`project_id` = `project`.`id` JOIN `organization` on organization.`record_id` = `record`.`id` WHERE `unit_class` in ('1', '2', '3') AND `level_class` = 1 AND (`org_name` LIKE '%%' OR `project_name` LIKE '%%' OR project.`pm` LIKE '%%') ORDER BY record.`id` DESC) AS data_by_order GROUP BY data_by_order.`project_id` order by `last_record_id` desc");
			//$query_string = "SELECT data_by_order.* FROM ( SELECT `project`.`id` as project_id, `project_name`, `project`.`pm`, `project`.`status`, `project`.`phase`, `organization`.`id` as collaborate_id, `org_name` as institute, `unit_class` as class, `project`.`update_datetime`, record.`id` as last_record_id FROM `project` JOIN `project_history_record` as record on `record`.`project_id` = `project`.`id` JOIN `organization` on organization.`record_id` = `record`.`id` WHERE `unit_class` in ('1', '2', '3') AND `level_class` = 1 AND (`org_name` LIKE '%".$search_content."%' OR `project_name` LIKE '%".$search_content."%' OR project.`pm` LIKE '%".$search_content."%') ORDER BY record.`id` DESC) AS data_by_order GROUP BY data_by_order.`project_id` order by `last_record_id` desc";
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
			//$rule1 = "(`org_name` LIKE '%".$search_content."%' OR `project_name` LIKE '%".$search_content."%' OR project.`pm` LIKE '%".$search_content."%')";
			$query_string = "SELECT data_by_order.* FROM ( SELECT `project`.`id` as project_id, `project_name`, `project`.`pm`, `project`.`status`, `project`.`phase`, `organization`.`id` as collaborate_id, `org_name` as institute, `unit_class` as class, `project`.`update_datetime`, record.`id` as last_record_id FROM `project` JOIN `project_history_record` as record on `record`.`project_id` = `project`.`id` JOIN `organization` on organization.`record_id` = `record`.`id` WHERE `unit_class` in ('1', '2', '3') AND `level_class` = 1 AND (".$rule1.") ORDER BY record.`id` DESC) AS data_by_order GROUP BY data_by_order.`project_id` order by `last_record_id` desc";
			$query = $this->db->query($query_string);	
			$result= $query->num_rows();
			//$result= $query->result_array();
		//}
		/*else  //沒設定搜尋條件-即取得產學研所有專案
		{
			$this->db->select('project.id as project_id, project_name, project.pm, project.status, project.phase, organization.id as collaborate_id, org_name as institute, unit_class as class, project.update_datetime');
			$this->db->from('project');			
			$this->db->join('project_history_record', 'project_history_record.project_id = project.id');
			$this->db->join('organization', 'organization.record_id = project_history_record.id');
			$this->db->order_by("project.update_datetime", "desc");
			$query = $this->db->get();
			$result= $query->result_array();
		}*/
		return $result;
	}
	
	/**
	get_specific_projects_data()：取得特定專案資料(舊)
	*/
	/*public function get_specific_projects_data($start_record, $show_record  = 10, $search_item)
	{
		$search_firm = $search_item['search_firm'];
		$search_school = $search_item['search_school'];
		$search_institute = $search_item['search_institute'];
		$search_content = $search_item['search_bar'];
		$search_rule = array('institute' => $search_content, 'project_name'=> $search_content, 'pm' => $search_content);
		//分析搜尋框輸入的內容
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
		$query_string = "SELECT data_by_order.* FROM ( SELECT `project`.`id` as project_id, `project_name`, `project`.`pm`, `project`.`status`, `project`.`phase`, `organization`.`id` as collaborate_id, `org_name` as institute, `unit_class` as class, `project`.`update_datetime`, record.`id` as last_record_id FROM `project` JOIN `project_history_record` as record on `record`.`project_id` = `project`.`id` JOIN `organization` on organization.`record_id` = `record`.`id` WHERE `unit_class` in ('1', '2', '3') AND `level_class` = 1 AND (".$rule1.") ORDER BY record.`id` DESC) AS data_by_order GROUP BY data_by_order.`project_id` order by `last_record_id` desc limit ".$start_record.','. $show_record;
		$query = $this->db->query($query_string);	
		$result = $query->result_array();			
		$data_count = count($result);
		//資料轉換
		for($i=0; $i<$data_count; $i++)
		{
			if($result[$i]['status'] == 1)
			{
				$result[$i]['status'] = "執行中";
			}
			else
			{
				$result[$i]['status'] = "結案";
			}
			switch($result[$i]['phase'])
			{
				case 0:
					$result[$i]['phase'] = "提案中";
					break;
				case 1:
					$result[$i]['phase'] = "創意提案";//(IDC)";
					break;
				case 2:
					$result[$i]['phase'] = "需求定義";//(RSD)";
					break;
				case 3:
					$result[$i]['phase'] = "可行性評估";//(FSC)";
					break;
				case 4:
					$result[$i]['phase'] = "試作件製作";//(PMA)";
					break;
			}			
		}
		return $result;
	}*/
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
		//$query_string = "SELECT " . $item . "FROM `project_all` WHERE ".$rule1;
		$query_string = "SELECT * FROM `project_all` WHERE ".$rule1;
		$query = $this->db->query($query_string);	
		$result = $query->result_array();		
		//$data_count = count($result);
		//資料轉換
		/*for($i=0; $i<$data_count; $i++)
		{
			if($result[$i]['car_model_estimate'] == 1)
			{
				$result[$i]['car_model_estimate'] = "是";
			}
			else if($result[$i]['car_model_estimate'] == 2)
			{
				$result[$i]['car_model_estimate'] = "否";
			}
			if($result[$i]['exhibition'] == 1)
			{
				$result[$i]['exhibition'] = "是";
			}
			else if($result[$i]['exhibition'] == 2)
			{
				$result[$i]['exhibition'] = "否";
			}
			if($result[$i]['status'] == 1)
			{
				$result[$i]['status'] = "執行中";
			}
			else if($result[$i]['status'] == 2)
			{
				$result[$i]['status'] = "結案";
			}	
		}*/
		return $result;
	}
	
	public function get_project_files($project_id)
	{
		$query_string = "SELECT project.name, project_attachment.id, project_attachment.file_content ,project_attachment.project_id, project_attachment.file_name, project_attachment.instance_file_name FROM `project_basic_info` as `project` LEFT OUTER JOIN `project_attachment` on  `project`.`id` = `project_id` WHERE project.id=". $project_id;
		$query = $this->db->query($query_string);	
		$result = $query->result_array();			
		return $result;		
	}
	
	/*設定專案鎖住中*/
	public function set_project_blocked($project_id, $username)
	{
		$data = array('is_blocked'=>1,
			'current_user'=>$username);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
	}
	
	/*設定專案鎖住中*/
	public function set_project_unblocked($project_id)
	{
		$data = array('is_blocked'=>2,
			'current_user'=>null);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
	}
	
	/**
	get_specific_project_data($project_id)：取得特定專案的基本資料
	$project_id：專案編號
	*/	
	public function get_specific_project_data($project_id) 
	{
		$this->db->select('organization.id as organization_id, organization.org_name, organization.dep_name, organization.unit_class as class, project.id as project_id, project.project_name, project.pm, project.status, project.phase');
		$this->db->from('project');			
		$this->db->join('project_history_record', 'project_history_record.project_id = project.id', 'inner');
		$this->db->join('organization', 'organization.record_id = project_history_record.id', 'inner');
		$this->db->where('project.id', $project_id);
		$query = $this->db->get();	
		$result = $query->row_array();
		return $result;			 
	}	
	
	public function update_specific_project_data($project_id) 
	{
		$project = array('project_name'=>$this->input->post('project_name'),
			'collaborate_id'=>$this->input->post('collaborate_id'),
			'pm'=>$this->input->post('pm'),
			'status'=>$this->input->post('status'),
			'phase'=>$this->input->post('phase'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $this->input->post('project_id'));		
		return $this->db->update('project', $project);
	}	
	
	/**
	get_specific_project_all_record($project_id)：取得專案的所有歷史修改紀錄
	$class：專案所屬類別
	$project_id：專案編號
	*/	
	public function get_specific_project_all_record($project_id) 
	{		
		$filter_rule = array('project_id' => $project_id);
		$this->db->select('project_history_record.id, project_history_record.create_datetime, project_history_record.phase, project_history_record.class');
		$this->db->from('project_history_record');
		$this->db->join('project', 'project.id = project_history_record.project_id');
		$this->db->where($filter_rule);
		$this->db->order_by("create_datetime", "asc");
		$query = $this->db->get();	
		$result = $query->result_array();
		
		//將專案紀錄以XML檔格式輸出，作為時間軸的資料來源
		$xml1 = "<data>\r\n";    //存放第一組xml字串(IDC節點資訊) 
		$xml2 = "<data>\r\n"; 
		$xml3 = "<data>\r\n"; 
		$xml4 = "<data>\r\n"; 
		$xml5 = "<data>\r\n";    //所有節點資訊
		foreach($result as $index=>$value)
		{
			switch($value['phase'])
			{
				case 1:
					if($value['class'] == 1)
					{
						$xml1 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'>\r\n\t</event>\r\n";
					}					
					break;
				case 2:
					if($value['class'] == 1)
					{
						$xml2 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'>\r\n\t</event>\r\n";
					}
					break;
				case 3:
					if($value['class'] == 1)
					{
						$xml3 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'>\r\n\t</event>\r\n";
					}
					break;
				case 4:
					if($value['class'] == 1)
					{
						$xml4 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'>\r\n\t</event>\r\n";
					}
					break;
			}
			if($value['class'] == 1)
			{
				$xml5 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'>\r\n\t</event>\r\n";
			}
			else if($value['class'] == 2)
			{
				$xml5 .= "\t<event\r\n\t start='".$value['create_datetime']." GMT'\r\n\t link='".site_url('project_record')."/".$value['id']."'\r\n\t icon='http://localhost/timeline/timeline_new1/dark-red-circle.png'>\r\n\t</event>\r\n";
			}	
		}
		$xml1 .= "</data>"; 
		$xml2 .= "</data>"; 
		$xml3 .= "</data>"; 
		$xml4 .= "</data>"; 
		$xml5 .= "</data>";
		$fp = fopen('example6.xml', 'w');
		$fp2 = fopen('example7.xml', 'w');
		$fp3 = fopen('example8.xml', 'w');
		$fp4 = fopen('example9.xml', 'w');
		$fp5 = fopen('example10.xml', 'w');
		fwrite($fp, $xml1);
		fwrite($fp2, $xml2);
		fwrite($fp3, $xml3);
		fwrite($fp4, $xml4);
		fwrite($fp5, $xml5);
		fclose($fp);
		fclose($fp2);
		fclose($fp3);
		fclose($fp4);
		fclose($fp5);
		//變更專案狀態
		for($i=0;$i<count($result);$i++)
		{
			switch($result[$i]['phase'])
			{
				case 0:
					$result[$i]['phase'] = "提案中";
					break;
				case 1:
					$result[$i]['phase'] = "IDC";
					break;
				case 2:
					$result[$i]['phase'] = "RSD";
					break;
				case 3:
					$result[$i]['phase'] = "FSC";
					break;
				case 4:
					$result[$i]['phase'] = "PMA";
					break;
			}
		}
		return $result;		
	}
	
	/**
	get_specific_project_specific_record($record_id)：取得特定專案的特定一筆紀錄
	*/
	public function get_specific_project_specific_record($record_id)
	{		
		$this->db->select('*')->from('project_history_record')->where('id',$record_id);
		$query = $this->db->get();	
		return $query->row_array();	
	}
	
	/**
	get_specific_project_record_attach_file($record_id)：取得專案記錄的夾帶檔案
	$record_id：紀錄編號
	*/	
	public function get_specific_project_record_attach_file($record_id) 
	{
		$filter_rule = array('record_id' => $record_id);
		$this->db->select('*')->from('minutes_file')->where($filter_rule)->order_by("id", "asc");
		$query = $this->db->get();	
		return $query->result_array();		 
	}
	
	/**
	get_specific_project_record_function_structure($record_id)：取得特定專案紀錄的功能結構
	$record_id：紀錄編號
	*/	
	public function get_specific_project_record_function_structure($record_id) 
	{
		$filter_rule = array('record_id' => $record_id);
		$this->db->select('*')->from('function_structure')->where($filter_rule)->order_by("id", "asc");
		$query = $this->db->get();	
		return $query->result_array();		 
	}
	public function get_specific_project_record_function_structure_picture($function_id) 
	{
		$filter_rule = array('function_id' => $function_id);
		$this->db->select('*')->from('function_structure_picture')->where($filter_rule)->order_by("id", "asc");
		$query = $this->db->get();	
		return $query->result_array();		 
	}	
	public function get_specific_project_record_organization($record_id)
	{		
		$this->db->select('organization.id as organization_id, org_name, dep_name, unit_class, pm, phone_firm, phone_mobile, memo, level_class, function_id, function_name');
		$this->db->from('organization');
		$this->db->join('function_structure', 'function_structure.id = organization.function_id', 'left');
		$this->db->where('organization.record_id', $record_id);
		$query = $this->db->get();	
		return $query->result_array();	
	}
	
	/**
	get_specific_project_last_record()：取得特定專案最新一筆紀錄
	*/
	public function get_specific_project_last_record($project_id)
	{
		$this->db->select('*');
		$this->db->from('project_history_record');
		$this->db->where('project_id',$project_id);
		$this->db->order_by("create_datetime", "desc");
		$query = $this->db->get();	
		return $query->row_array();	
	}
	
	/**
	get_last_project_record()：取得特定專案最新一筆紀錄
	*/
	public function get_last_project_record($project_id)
	{
		$this->db->select('*');
		$this->db->from('project_history_record');
		$filter_rule = array('project_id' => $project_id, 'class' => 1);
		$this->db->where($filter_rule);
		$this->db->order_by("create_datetime", "desc");
		$query = $this->db->get();	
		return $query->row_array();	
	}
	
	/**
	create_specific_minutes_record()：建立專案會議記錄資料
	*/
	public function create_specific_minutes_record()
	{		
		//新增紀錄資料
		$project_id=$this->input->post('project_id');
		$new_record = array('project_id'=>$this->input->post('project_id'),
			'pm'=>$this->input->post('pm'),
			'status'=>$this->input->post('status'),
			'phase'=>$this->input->post('phase'),
			'class'=>2,
			'minutes'=>$this->input->post('minutes'),
			'attendee'=>$this->input->post('attendee'),
			'meeting_date'=>$this->input->post('meeting_date'),
			'meeting_location'=>$this->input->post('meeting_location'),
			'person'=>$this->input->post('person'));
		$this->db->insert('project_history_record', $new_record);
		$new_record_id = $this->db->insert_id();
		$file_count = $this->input->post('file_count');  //取得檔案上傳的數量
		$j = 0; //檔案編號
		$uploaded_file = array();  //存放已經上傳的檔案實體名稱
		$inserted_file_id = array();  //存放檔案id
		for($i=0;$i<$file_count;$i++)
		{
			$file_name = 'file_'.$i;
			if(isset($_FILES[$file_name]) && $_FILES[$file_name]['error'] != UPLOAD_ERR_NO_FILE)  //確定使用者有上傳檔案
			{					
				if(!$this->upload->do_upload($file_name))  //上傳檔案有問題(未上傳檔案除外)，回新增會議記錄頁面
				{					
					$error = array('error' => $this->upload->display_errors());
					//上傳途中有錯，則刪除此次已上傳之檔案
					foreach($uploaded_file as $delete_file_name)
					{
						unlink('./uploads/'.$delete_file_name);
					}
					//刪除已插入之資料庫記錄
					foreach($inserted_file_id as $id)
					{
						$this->db->delete('minutes_file', array('id' => $id)); 
					}	
					return -1;
				}	
				else	
				{
					$upload_file = $this->upload->data();  //取得上傳檔案的屬性資料
					$instance_file_name = $new_record_id.'_'.time().($j++).$upload_file["file_ext"];
					$new_record_file = array('record_id'=>$new_record_id,
					'file_name'=>$upload_file['client_name'],
					'instance_file_name'=>$instance_file_name);
					$this->db->insert('minutes_file', $new_record_file);
					$new_file_record_id = $this->db->insert_id();
					$ori_name = './uploads/'.$upload_file['client_name'];
					$des_name = './uploads/'.$instance_file_name;
					rename(iconv("UTF-8", "BIG5//IGNORE", $ori_name), $des_name);  //將實體檔案的名稱重新命名, 使之與資料庫的檔名一致
					array_push($uploaded_file, $instance_file_name);  //記錄實體檔案名稱
					array_push($inserted_file_id, $new_file_record_id);  //記錄插入資料庫的所有檔案編號
				}				
			}
			else
			{
				continue;
			}
		}
		//新增組織資料(包括內外部合作的組織)
		$org_count = $this->input->post('org_count');
		for($i=0; $i<$org_count;$i++)
		{		
			$record = array('org_name'=>$this->input->post('org_name_'.$i),
				'dep_name'=>$this->input->post('dep_name_'.$i),
				'unit_class'=>$this->input->post('unit_class_'.$i),
				'pm'=>$this->input->post('pm_'.$i),
				'phone_firm'=>$this->input->post('phone_firm_'.$i),
				'phone_mobile'=>$this->input->post('phone_mobile_'.$i),
				'memo'=>$this->input->post('memo_'.$i),
				'level_class'=>$this->input->post('level_class_'.$i),
				'record_id'=>$new_record_id,
				'function_id'=>$this->input->post('function_id_'.$i));
			$this->db->insert('organization', $record);
		}
		//修改專案更新時間
		$project = array('update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $this->input->post('project_id'));		
		$this->db->update('project', $project);
		return $new_record_id;  //原本回傳新增的會議紀錄編號 $new_record_id;
	}
	
	/**
	update_specific_minutes_record()：更新專案會議記錄資料
	*/
	public function update_specific_minutes_record($record_id)
	{
		//更新紀錄資料		
		$update_record = array('minutes'=>$this->input->post('minutes'),
			'meeting_location'=>$this->input->post('meeting_location'),
			'attendee'=>$this->input->post('attendee'),
			'meeting_date'=>$this->input->post('meeting_date'));
		$this->db->where('id', $record_id);
		$this->db->update('project_history_record', $update_record);
		$file_count = $this->input->post('file_count');  //取得檔案上傳的數量
		$j=0;  //使建立之檔案名稱不重複		
		//處理夾帶檔案		
		$uploaded_file = array();  //存放已經上傳的檔案實體名稱
		$inserted_file_id = array();  //存放檔案id
		for($i=0;$i<$file_count;$i++)
		{
			$file_name = 'file_'.$i;
			if(isset($_FILES[$file_name]) && $_FILES[$file_name]['error'] != UPLOAD_ERR_NO_FILE)  //確定使用者有上傳檔案
			{					
				if(!$this->upload->do_upload($file_name))  //上傳檔案有問題(未上傳檔案除外)，回新增會議記錄頁面
				{					
					$error = array('error' => $this->upload->display_errors());
					//上傳途中有錯，則刪除此次已上傳之檔案
					foreach($uploaded_file as $delete_file_name)
					{
						unlink('./uploads/'.$delete_file_name);
					}
					//刪除已插入之資料庫記錄
					foreach($inserted_file_id as $id)
					{
						$this->db->delete('minutes_file', array('id' => $id)); 
					}	
					return -1;
				}	
				else	
				{
					$upload_file = $this->upload->data();  //取得上傳檔案的屬性資料
					$instance_file_name = $record_id.'_'.time().($j++).$upload_file["file_ext"];
					$new_record_file = array('record_id'=>$record_id,
					'file_name'=>$upload_file['client_name'],
					'instance_file_name'=>$instance_file_name);
					$this->db->insert('minutes_file', $new_record_file);
					$new_file_record_id = $this->db->insert_id();
					$ori_name = './uploads/'.$upload_file['client_name'];
					$des_name = './uploads/'.$instance_file_name;
					rename(iconv("UTF-8", "BIG5//IGNORE", $ori_name), $des_name);  //將實體檔案的名稱重新命名, 使之與資料庫的檔名一致
					array_push($uploaded_file, $instance_file_name);  //記錄實體檔案名稱
					array_push($inserted_file_id, $new_file_record_id);  //記錄插入資料庫的所有檔案編號
				}				
			}
			else
			{
				continue;
			}
		}
		//處理本來已上傳, 但後來被刪除的檔案數量
		$delete_file_count = $this->input->post('delete_file_count');  //取得原始檔案數量
		if($delete_file_count != 0)
		{
			for($i=0;$i<=$delete_file_count;$i++)
			{	
				$delete_file_name= $this->input->post('delete_file_'.$i);
				$this->db->delete('minutes_file', array('instance_file_name' => $delete_file_name)); 
				unlink('./uploads/'.$delete_file_name);
			}
		}
		//修改專案更新時間
		$project = array('update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $this->input->post('project_id'));		
		$this->db->update('project', $project);
		return $record_id;
	}
	
	/**
	create_specific_project_record()：建立版本紀錄資料
	*/
	public function create_specific_project_record()
	{		
		//新增紀錄資料
		$project_id=$this->input->post('project_id');
		$new_record = array('project_id'=>$this->input->post('project_id'),
			'pm'=>$this->input->post('pm'),
			'status'=>$this->input->post('status'),
			'phase'=>$this->input->post('phase'),
			'senario'=>$this->input->post('senario'),
			'distinction_market'=>$this->input->post('distinction_market'),
			'distinction_km'=>$this->input->post('distinction_km'),
			'value'=>$this->input->post('value'),
			'feasibility'=>$this->input->post('feasibility'),
			'car_model'=>$this->input->post('car_model'),
			'feature_introduction'=>$this->input->post('feature_introduction'),
			'person'=>$this->input->post('person'));
		$this->db->insert('project_history_record', $new_record);
		$new_record_id = $this->db->insert_id();
		$new_function_id = array();		
		for($i=0; $i<10;$i++)
		{			
			if($this->input->post('function_name_'.$i) != null || $this->input->post('function_specification_'.$i) != null)  //使用者確定有輸入資料才需新增
			{
				$record = array('function_name'=>$this->input->post('function_name_'.$i),
					'function_specification'=>$this->typography->nl2br_except_pre($this->input->post('function_specification_'.$i)),
					'fp_design_dev'=>$this->input->post('fp_design_dev_'.$i),
				  	'fp_validation'=>$this->input->post('fp_validation_'.$i),
					'fp_sample'=>$this->input->post('fp_sample_'.$i),
					'pp_design_dev'=>$this->input->post('pp_design_dev_'.$i),
					'pp_mold'=>$this->input->post('pp_mold_'.$i),
					'pp_jig'=>$this->input->post('pp_jig_'.$i),
					'pp_gauge'=>$this->input->post('pp_gauge_'.$i),
					'pp_validation'=>$this->input->post('pp_validation_'.$i),
					'pp_quantity'=>$this->input->post('pp_quantity_'.$i),
					'pp_unit_cost'=>$this->input->post('pp_unit_cost_'.$i),
					'fp_delivery'=>$this->input->post('fp_delivery_'.$i),
					'pp_delivery'=>$this->input->post('pp_delivery_'.$i),
					'record_id'=>$new_record_id);					
				$this->db->insert('function_structure', $record);
				$function_id=$this->db->insert_id();
				$path_record = array ('rule_restriction'=>'/'.$project_id.'/doc/'.$function_id.'_rule.html',
				  'tech_restriction'=>'/'.$project_id.'/doc/'.$function_id.'_tech.html',
				  'patent_restriction'=>'/'.$project_id.'/doc/'.$function_id.'_patent.html');
				$this->db->where('id' , $function_id);		
		        $this->db->update('function_structure', $path_record);
                //處理rule/tech/patent.html的表單資料
				$evaluate=array("rule","tech","patent");
				for($s=0; $s<=2; $s++)
				{
				$text=$this->input->post($evaluate[$s] . '_'.$i);
				if($text!= null)
				{
                    //處理新上傳圖片
		    		$num_newphoto=substr_count($text,'temp_photo');
                    for($k=0; $k<$num_newphoto; $k++)
                    {
                        $position=strpos($text, 'temp_photo');
                        $cuttext=substr($text, $position);
                        $cuttext0=explode('"' , $cuttext);
                        $cuttext=explode('.' , $cuttext0[0]);
                        $num=count($cuttext)-1;
						
						
						$position_last=strpos($text, '"', $position);
                        for($position_start=$position; $position_last>$position; $position_start--)
                            {
                            $position_last=strpos($text, '"', $position_start);
                            }

                        $position_next=strpos($text, '"', $position);
                        $length=$position_next-$position_last-1;						
                        $filetype=$cuttext[$num];
                        $newpath_text='$project_location/'.$project_id.'/photo/'.$function_id. '_' . $evaluate[$s] . '_'.$k.'.'.$filetype;
				        $newpath='application/assets/project/'.$project_id.'/photo/'.$function_id. '_' . $evaluate[$s] . '_'.$k.'.'.$filetype;
                        $text=substr_replace($text, $newpath_text, $position_last+1, $length);
					    rename($cuttext0[0], $newpath);
                    }
			    	//處理全部圖片
			    	$text=str_replace(site_url("/application/assets/project/". $project_id . '/photo'),'$project_location/'.$project_id.'/photo', $text); 
					$cuttext2=$text;
					$num_allphoto=substr_count($text,'<img');
			    	for($l=0;$l<$num_allphoto;$l++)
			    	{
			    	$position=strpos($cuttext2, '<img');
			    	$cuttext2=substr($cuttext2, $position);
			    	$position=strpos($cuttext2, 'src="');
			    	$cuttext2=substr($cuttext2, $position);
			    	$cuttext3=explode('"' , $cuttext2);
			    	$cuttext3=explode('$project_location', $cuttext3[1]);
			    	$record_photo = array('function_id'=>$function_id,
				                    'class'=>$s,         //class=0:rule,class=1:tech,class=2:patent
								    'path'=>$cuttext3[1]);
				    $this->db->insert('function_structure_picture', $record_photo);
				
				    }
				    $fh=fopen('application/assets/project/'.$project_id.'/doc/'.$function_id.'_'.$evaluate[$s].'.html', 'w') or die("Failed to open");
                    fwrite($fh, $text) or die("Failed to write");
                    fclose($fh);
				}
				}
				array_push($new_function_id, $function_id);
			}
		}		
		//新增組織資料(包括內外部合作的組織)
		$main_organization_is_set = false;
		for($i=0; $i<20;$i++)
		{			
			if($this->input->post('org_name_'.$i) != null || $this->input->post('dep_name_'.$i) != null  || $this->input->post('pm'.$i) != null || $this->input->post('phone_firm'.$i) != null || $this->input->post('phone_mobile'.$i) != null || $this->input->post('memo'.$i) != null)  //使用者確定有輸入資料才需新增
			{
				$main_organization_is_set = true;
				$record = array('org_name'=>$this->input->post('org_name_'.$i),
					'dep_name'=>$this->input->post('dep_name_'.$i),
					'unit_class'=>$this->input->post('unit_class_'.$i),
					'pm'=>$this->input->post('pm_'.$i),
					'phone_firm'=>$this->input->post('phone_firm_'.$i),
					'phone_mobile'=>$this->input->post('phone_mobile_'.$i),
					'memo'=>$this->input->post('memo_'.$i),
					'level_class'=>$this->input->post('level_class_'.$i),
					'record_id'=>$new_record_id,
					'function_id'=>$new_function_id[$this->input->post('function_id_'.$i)]);
				$this->db->insert('organization', $record);
			}
		}
		if($main_organization_is_set = true)
		//修改專案更新時間
		$project = array('update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $this->input->post('project_id'));		
		$this->db->update('project', $project);
		return $new_record_id;
	}
		
	/**
	create_project()：新增專案資料
	*/
	public function create_project()
	{	
		//新增專案資料
		$new_project = array('project_name'=>$this->input->post('project_name'),
			'pm'=>$this->input->post('pm'),
			'status'=>$this->input->post('status'),
			'phase'=>$this->input->post('phase'),
			'detail_id'=>0,
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->insert('project', $new_project);
		$new_project_id = $this->db->insert_id();
		//新增資料夾
		mkdir("application/assets/project/".$new_project_id, 0777);
		mkdir("application/assets/project/".$new_project_id."/photo", 0777);
		mkdir("application/assets/project/".$new_project_id."/doc", 0777);
		//新增專案紀錄資料
		$new_record = array('project_id'=>$new_project_id,
			'class'=>1,
			'unit_id'=>$this->input->post('unit_id'),
			'phase'=>$this->input->post('phase'));
		$this->db->insert('project_history_record', $new_record);
		$new_record_id = $this->db->insert_id();
		//新增合作對象
		$new_organization = array('org_name'=>$this->input->post('org_name'),
			'dep_name'=>$this->input->post('dep_name'),
			'unit_class'=>$this->input->post('unit_class'),
			'pm'=>$this->input->post('outer_pm'),
			'phone_firm'=>$this->input->post('phone_firm'),
			'phone_mobile'=>$this->input->post('phone_mobile'),
			'memo'=>$this->input->post('memo'),
			'level_class'=>1,
			'record_id'=>$new_record_id);
		$this->db->insert('organization', $new_organization);
		$new_organization_id = $this->db->insert_id();
		return ;
	}
	
	/**
	create_project_info()：新增專案資料
	*/
	public function create_project_info()
	{	
		//新增專案資料至資料庫
		$new_project = array('name'=>$this->input->post('project_name'),
			'year'=>$this->input->post('year'),
			'haitec_unit'=>$this->input->post('haitec_unit'),
			'outer_unit'=>$this->input->post('outer_unit'),
			'pm'=>$this->input->post('pm'),
			'car_model_estimate'=>$this->input->post('car_model_estimate'),
			'exhibition'=>$this->input->post('exhibition'),
			'status'=>$this->input->post('status'),
			'keyword'=>$this->input->post('keyword'),
			'idea_id'=>$this->input->post('idea_id'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->insert('project_basic_info', $new_project);
		$new_project_id = $this->db->insert_id();
		
		//建立專案相關檔案存放的資料夾
		mkdir("application/assets/project_attachment/".$new_project_id, 0777);
		//搬移檔案至指定資料夾
		$ori_file_dir = 'uploads/'.$this->input->post('upload_file_dir').'/';  //原始上傳目錄
		$new_file_dir = 'application/assets/project_attachment/'.$new_project_id.'/';//新上傳目錄
		$file_number = $this->input->post('file_number');  //檔案數量
		for($i=0;$i<$file_number;$i++)
		{		
			$file = $this->input->post('upload_file_'.$i);
			if(!empty($file))
			{
				$ori_file_name = $this->input->post('upload_file_'.$i);
				$ext = end(explode('.', $ori_file_name));	
				$des_file_name = $new_project_id.'_'.time().$i.'.'.$ext;
				rename(iconv("UTF-8","BIG5//IGNORE",$ori_file_dir . $ori_file_name), iconv("UTF-8","BIG5//IGNORE",$new_file_dir . $des_file_name));  //move the file to the folder named by project ID
				//Get the content of the upload file
				$file_content = "";
				switch($ext)
				{
					case "pptx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;					
					case "docx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					/*
					case "xls":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					*/
					/*
					case "xlsx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					*/
				}
				$file_content = preg_replace('/\s+/', '', $file_content);
				//新增檔案至資料庫
				$project_file = array('project_id'=>$new_project_id,
				'file_name'=>$ori_file_name,
				'instance_file_name'=>$des_file_name,
				'file_content'=>$file_content);
				$this->db->insert('project_attachment', $project_file);
			}
			else
			{
				continue;
			}
		}		
		return ;
	}
	//get_img_name($km_id)：取得圖片名稱與數量
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
		$this->db->select('id, file_name, instance_file_name, create_time');
		$this->db->from('project_attachment');		
		$this->db->where('project_attachment.project_id', $project_id);
		$this->db->order_by("create_time", "desc"); 
		$query = $this->db->get();	
		$result = $query->result_array();	
		return $result;			 
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
	edit_project_info()：編輯專案資料
	*/
	public function edit_project_info($project_id)
	{	
		//修改資料庫專案資料
		/*$data = array('name'=>$this->input->post('project_name'),
			'year'=>$this->input->post('year'),
			'haitec_unit'=>$this->input->post('haitec_unit'),
			'outer_unit'=>$this->input->post('outer_unit'),
			'pm'=>$this->input->post('pm'),
			'car_model_estimate'=>$this->input->post('car_model_estimate'),
			'exhibition'=>$this->input->post('exhibition'),
			'status'=>$this->input->post('status'),
			'keyword'=>$this->input->post('keyword'),
			'idea_id'=>$this->input->post('idea_id'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $project_id);		
		$this->db->update('project_basic_info', $data);*/
		//建立專案相關檔案存放的資料夾
		//mkdir("application/assets/project_attachment/".$new_project_id, 0777);
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
				$ext = end(explode('.', $ori_file_name));	
				$des_file_name = $project_id.'_'.time().$i.'.'.$ext;
				rename(iconv("UTF-8","BIG5//IGNORE",$ori_file_dir . $ori_file_name), iconv("UTF-8","BIG5//IGNORE",$new_file_dir . $des_file_name));  //move the file to the folder named by project ID
				//Get the content of the upload file
				$file_content = "";
				/*switch($ext)
				{
					case "pptx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;					
					case "docx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					
					case "xls":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					case "xlsx":
						$this->file_conversion->set_filename($new_file_dir . $des_file_name);
						$file_content = $this->file_conversion->convertToText();
						break;
					
				}
				$file_content = preg_replace('/\s+/', '', $file_content);*/
				//新增檔案至資料庫
				$project_file = array('project_id'=>$project_id,
				'file_name'=>$ori_file_name,
				'instance_file_name'=>$des_file_name,
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
	
	public function update_project($project_id)
	{
		$data = array('institute'=>$this->input->post('institute'),
			'department'=>$this->input->post('department'),
			'address'=>$this->input->post('address'),
			'website'=>$this->input->post('website'),
			'memo'=>$this->input->post('memo'),
			'contact_name'=>$this->input->post('contact_name'),
			'contact_sex'=>$this->input->post('contact_sex'),
			'contact_phone'=>$this->input->post('contact_phone'),
			'contact_email'=>$this->input->post('contact_email'),
			'contact_address'=>$this->input->post('contact_address'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $institute_id);		
		return $this->db->update('institute', $data);
	}
	
	/**
	get_all_institute_basic_info()：取得所有法人基本資料
	*/
	public function get_all_institute_basic_info($search_rule)  //取得所有法人資料
	{
		if($search_rule == null)  //沒有設定搜尋條件
		{
			$query = $this->db->get('institute');  //查詢學校專案資料表的資料
			return $query->result_array();
		}
		else
		{
			$search_field = array('institute' => $search_rule, 'department' => $search_rule, 'introduction'=> $search_rule, 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule);  //需搜尋的欄位與搜尋值 
			$this->db->select('*')->from('institute')->or_like($search_field);//查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		}
	}
	
	/**
	get_specific_institute_basic_info()：取得特定法人基本資料
	*/
	public function get_specific_institute_basic_info($start_record, $show_record  = 5, $search_rule)
	{
		if($search_rule == null)  //沒有設定搜尋條件
		{
			$this->db->select('*')->from('institute')->limit($show_record, $start_record); //查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		}
		else  //有設定搜尋條件
		{
			$search_field = array('institute' => $search_rule, 'department' => $search_rule, 'introduction'=> $search_rule, 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule);  //需搜尋的欄位與搜尋值 , 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule
			$this->db->select('*')->from('institute')->or_like($search_field)->limit($show_record, $start_record); //查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		}
	}	
	
	/**
	get_one_specific_institute_basic_info()：取得特定法人基本資料
	*/
	public function get_one_specific_institute_basic_info($institute_id)
	{
		$query = $this->db->get_where('institute', array('id' => $institute_id));
		return $query->row_array();
	}
	/**
	create_institute()：新增資料到資料庫中
	*/	
	public function create_institute()
	{
		$data = array('institute'=>$this->input->post('institute'),
			'department'=>$this->input->post('department'),
			'address'=>$this->input->post('address'),
			'website'=>$this->input->post('website'),
			'memo'=>$this->input->post('memo'),
			'contact_name'=>$this->input->post('contact_name'),
			'contact_sex'=>$this->input->post('contact_sex'),
			'contact_phone'=>$this->input->post('contact_phone'),
			'contact_email'=>$this->input->post('contact_email'),
			'contact_address'=>$this->input->post('contact_address'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		return $this->db->insert('institute', $data);	
	}	
	
	/**
	update_institute()：更新法人資料
	*/	
	public function update_institute($institute_id)
	{
		$data = array('institute'=>$this->input->post('institute'),
			'department'=>$this->input->post('department'),
			'address'=>$this->input->post('address'),
			'website'=>$this->input->post('website'),
			'memo'=>$this->input->post('memo'),
			'contact_name'=>$this->input->post('contact_name'),
			'contact_sex'=>$this->input->post('contact_sex'),
			'contact_phone'=>$this->input->post('contact_phone'),
			'contact_email'=>$this->input->post('contact_email'),
			'contact_address'=>$this->input->post('contact_address'),
			'update_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('id', $institute_id);		
		return $this->db->update('institute', $data);	
	}	
	
	/**
	delete_institute()：刪除法人資料
	*/	
	public function delete_institute($institute_id)
	{
		$this->db->where('id', $institute_id);
		$this->db->delete('institute'); 
	}
	
	/**
	get_all_institute_project()：取得特定法人的所有專案資料
	*/	
	public function get_all_institute_project($institute_id, $search_rule)
	{
		if($search_rule == null)  //沒有設定搜尋條件
		{
			$query = $this->db->get_where('institute_project', array('institute_id' => $institute_id));
			return $query->result_array();
		}
		else
		{
			$search_field = array('institute' => $search_rule, 'department' => $search_rule, 'introduction'=> $search_rule, 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule);  //需搜尋的欄位與搜尋值 
			$this->db->select('*')->from('institute_project')->where('institute_id', $institute_id)->or_like($search_field);//查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		} 
	}

		/**
	get_specific_institute_project()：取得特定法人在特定分頁所需呈現的專案資料
	*/
	public function get_specific_institute_project($institute_id ,$start_record, $show_record  = 5, $search_rule)
	{
		if($search_rule == null)  //沒有設定搜尋條件
		{
			$this->db->select('*')->from('institute_project')->where('institute_id',$institute_id)->limit($show_record, $start_record); //查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		}
		else  //有設定搜尋條件
		{
			$search_field = array('institute' => $search_rule, 'department' => $search_rule, 'introduction'=> $search_rule, 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule);  //需搜尋的欄位與搜尋值 , 'contact_name' => $search_rule, 'contact_phone'=>$search_rule, 'contact_email'=>$search_rule
			$this->db->select('*')->from('institute_project')->where('institute_id',$institute_id)->or_like($search_field)->limit($show_record, $start_record); //查詢學校專案資料表的資料
			$query = $this->db->get();	
			return $query->result_array();
		}
	}
	
	//=================================
	
	/**
	 * Create the data output array for the DataTables rows
	 *
	 *  @param  array $columns Column information array
	 *  @param  array $data    Data from the SQL get
	 *  @return array          Formatted data in a row based format
	 */
	static function data_output ( $columns, $data )
	{
		$out = array();

		for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
			$row = array();

			for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
				$column = $columns[$j];

				// Is there a formatter?
				if ( isset( $column['formatter'] ) ) 
				{
					$row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i]);
				}
				else 
				{
					$row[ $column['dt'] ] = $data[$i][ $columns[$j]['db']];
					//echo var_dump($data[$i][ $columns[$j]['db']]);					
				}
			}

			$out[] = $row;
		}

		return $out;
	}


	/**
	 * Paging
	 *
	 * Construct the LIMIT clause for server-side processing SQL query
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @return string SQL limit clause
	 */
	static function limit ( $request, $columns )
	{
		$limit = '';

		if ( isset($request['start']) && $request['length'] != -1 ) {
			$limit = "LIMIT ".intval($request['start']).", ".intval($request['length']);
		}

		return $limit;
	}


	/**
	 * Ordering
	 *
	 * Construct the ORDER BY clause for server-side processing SQL query
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @return string SQL order by clause
	 */
	static function order ( $request, $columns )
	{
		$order = '';

		if ( isset($request['order']) && count($request['order']) ) {
			$orderBy = array();
			$dtColumns = SSP::pluck( $columns, 'dt' );

			for ( $i=0, $ien=count($request['order']) ; $i<$ien ; $i++ ) {
				// Convert the column index into the column data property
				$columnIdx = intval($request['order'][$i]['column']);
				$requestColumn = $request['columns'][$columnIdx];

				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];

				if ( $requestColumn['orderable'] == 'true' ) {
					$dir = $request['order'][$i]['dir'] === 'asc' ?
						'ASC' :
						'DESC';

					$orderBy[] = '`'.$column['db'].'` '.$dir;
				}
			}

			$order = 'ORDER BY '.implode(', ', $orderBy);
		}

		return $order;
	}


	/**
	 * Searching / Filtering
	 *
	 * Construct the WHERE clause for server-side processing SQL query.
	 *
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here performance on large
	 * databases would be very poor
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $columns Column information array
	 *  @param  array $bindings Array of values for PDO bindings, used in the
	 *    sql_exec() function
	 *  @return string SQL where clause
	 */
	static function filter ( $request, $columns, &$bindings )
	{
		$globalSearch = array();
		$columnSearch = array();
		$dtColumns = SSP::pluck( $columns, 'dt' );

		if ( isset($request['search']) && $request['search']['value'] != '' ) {
			$str = $request['search']['value'];

			for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
				$requestColumn = $request['columns'][$i];
				$columnIdx = array_search( $requestColumn['data'], $dtColumns );
				$column = $columns[ $columnIdx ];

				if ( $requestColumn['searchable'] == 'true' ) {
					$binding = SSP::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
					$globalSearch[] = "`".$column['db']."` LIKE ".$binding;
				}
			}
		}

		// Individual column filtering
		for ( $i=0, $ien=count($request['columns']) ; $i<$ien ; $i++ ) {
			$requestColumn = $request['columns'][$i];
			$columnIdx = array_search( $requestColumn['data'], $dtColumns );
			$column = $columns[ $columnIdx ];

			$str = $requestColumn['search']['value'];

			if ( $requestColumn['searchable'] == 'true' &&
			 $str != '' ) {
				$binding = SSP::bind( $bindings, '%'.$str.'%', PDO::PARAM_STR );
				$columnSearch[] = "`".$column['db']."` LIKE ".$binding;
			}
		}

		// Combine the filters into a single string
		$where = '';

		if ( count( $globalSearch ) ) {
			$where = '('.implode(' OR ', $globalSearch).')';
		}

		if ( count( $columnSearch ) ) {
			$where = $where === '' ?
				implode(' AND ', $columnSearch) :
				$where .' AND '. implode(' AND ', $columnSearch);
		}

		if ( $where !== '' ) {
			$where = 'WHERE '.$where;
		}

		return $where;
	}


	/**
	 * Perform the SQL queries needed for an server-side processing requested,
	 * utilising the helper functions of this class, limit(), order() and
	 * filter() among others. The returned array is ready to be encoded as JSON
	 * in response to an SSP request, or can be modified if needed before
	 * sending back to the client.
	 *
	 *  @param  array $request Data sent to server by DataTables
	 *  @param  array $sql_details SQL connection details - see sql_connect()
	 *  @param  string $table SQL table to query
	 *  @param  string $primaryKey Primary key of the table
	 *  @param  array $columns Column information array
	 *  @return array          Server-side processing response array
	 */
	static function simple ( $request, $sql_details, $table, $primaryKey, $columns )
	{
		$bindings = array();
		$db = SSP::sql_connect( $sql_details );
		$limit = SSP::limit( $request, $columns );
		$order = SSP::order( $request, $columns );
		$where = SSP::filter( $request, $columns, $bindings );

		// Main query to actually get the data
		$data = SSP::sql_exec( $db, $bindings,
			"SELECT SQL_CALC_FOUND_ROWS `".implode("`, `", SSP::pluck($columns, 'db'))."`
			 FROM `$table`
			 $where
			 $order
			 $limit"
		);

		// Data set length after filtering
		$resFilterLength = SSP::sql_exec( $db,
			"SELECT FOUND_ROWS()"
		);
		$recordsFiltered = $resFilterLength[0][0];

		// Total data set length
		$resTotalLength = SSP::sql_exec( $db,
			"SELECT COUNT(`{$primaryKey}`)
			 FROM   `$table`"
		);
		$recordsTotal = $resTotalLength[0][0];


		/*
		 * Output
		 */
		return array(
			"draw"            => intval( $request['draw'] ),
			"recordsTotal"    => intval( $recordsTotal ),
			"recordsFiltered" => intval( $recordsFiltered ),
			"data"            => SSP::data_output( $columns, $data )
		);
	}


	/**
	 * Connect to the database
	 *
	 * @param  array $sql_details SQL server connection details array, with the
	 *   properties:
	 *     * host - host name
	 *     * db   - database name
	 *     * user - user name
	 *     * pass - user password
	 * @return resource Database connection handle
	 */
	static function sql_connect ( $sql_details )
	{		
		try {
			$db = @new PDO(
				"mysql:host={$sql_details['host']};dbname={$sql_details['db']}",
				$sql_details['user'],
				$sql_details['pass'],
				array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION )
			);			
		}
		catch (PDOException $e) {
			SSP::fatal(
				"An error occurred while connecting to the database. ".
				"The error reported by the server was: ".$e->getMessage()
			);
		}

		return $db;
	}


	/**
	 * Execute an SQL query on the database
	 *
	 * @param  resource $db  Database handler
	 * @param  array    $bindings Array of PDO binding values from bind() to be
	 *   used for safely escaping strings. Note that this can be given as the
	 *   SQL query string if no bindings are required.
	 * @param  string   $sql SQL query to execute.
	 * @return array         Result from the query (all rows)
	 */
	static function sql_exec ( $db, $bindings, $sql=null )
	{
		// Argument shifting
		if ( $sql === null ) {
			$sql = $bindings;
		}
		$db->query("set names utf8");
		$stmt = $db->prepare( $sql );
		//echo $sql;

		// Bind parameters
		if ( is_array( $bindings ) ) {
			for ( $i=0, $ien=count($bindings) ; $i<$ien ; $i++ ) {
				$binding = $bindings[$i];
				$stmt->bindValue( $binding['key'], $binding['val'], $binding['type'] );
			}
		}

		// Execute
		try {
			$stmt->execute();
		}
		catch (PDOException $e) {
			SSP::fatal( "An SQL error occurred: ".$e->getMessage() );
		}

		// Return all
		return $stmt->fetchAll();
	}


	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Internal methods
	 */

	/**
	 * Throw a fatal error.
	 *
	 * This writes out an error message in a JSON string which DataTables will
	 * see and show to the user in the browser.
	 *
	 * @param  string $msg Message to send to the client
	 */
	static function fatal ( $msg )
	{
		echo json_encode( array( 
			"error" => $msg
		) );

		exit(0);
	}

	/**
	 * Create a PDO binding key which can be used for escaping variables safely
	 * when executing a query with sql_exec()
	 *
	 * @param  array &$a    Array of bindings
	 * @param  *      $val  Value to bind
	 * @param  int    $type PDO field type
	 * @return string       Bound key to be used in the SQL where this parameter
	 *   would be used.
	 */
	static function bind ( &$a, $val, $type )
	{
		$key = ':binding_'.count( $a );

		$a[] = array(
			'key' => $key,
			'val' => $val,
			'type' => $type
		);

		return $key;
	}


	/**
	 * Pull a particular property from each assoc. array in a numeric array, 
	 * returning and array of the property values from each item.
	 *
	 *  @param  array  $a    Array to get data from
	 *  @param  string $prop Property to read
	 *  @return array        Array of property values
	 */
	static function pluck ( $a, $prop )
	{
		$out = array();

		for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
			$out[] = $a[$i][$prop];
		}

		return $out;
	}
}
//===============================================