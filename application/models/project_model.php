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
	//取得預覽圖片路徑
	public function get_preview_img($project_id)
	{
	    $str="select id, file_name, project_attachment_id from project_attachment_pdf_to_image where `project_id`='$project_id'";
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
	//取得資料分類
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
	//ajax抓取資料分類
	 public function get_file_category_detail($dir, $project_id)
	 {
	    $rule="(`dir` LIKE '%" . $dir . "%')";
	 	if($dir==null) $query_string = "SELECT * FROM `project_attachment` WHERE `project_id`=$project_id ORDER BY file_name ASC";
		else $query_string = "SELECT * FROM `project_attachment` WHERE (`project_id`=$project_id) AND ".$rule ." ORDER BY file_name ASC";
		$query = $this->db->query($query_string);
		//$this->db->select('*');
		//$this->db->from('project_attachment');		
		//$this->db->where('project_attachment.dir', $dir);
		//$this->db->order_by("file_name", "asc"); 
		//$query = $this->db->get();	
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
				$file_completename = $project_id.'_'.time().$i;//檔案名，不含附檔名
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
					
				}*/
				//$file_content = preg_replace('/\s+/', '', $file_content);
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
	
	public function set_project_data_checked($project_id, $user_id, $checked_time)
	{
		$data = array('is_checked' => 1,
			'checked_user' => $user_id,
			'checked_time' => $checked_time);
		$this->db->where('id', $project_id);		
		return $this->db->update('project_all', $data);
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

	public function get_project_datatable_record($parameter, $DB_table, $columns)
	{
		// Ordering
        /*if(isset($parameter['order_column']))
        {
			$this->db->order_by($columns[intval($this->db->escape_str($parameter['order_column']))], $this->db->escape_str($parameter['order_method']));
        }*/
        
        //
        //Filtering
        //NOTE this does not match the built-in DataTables filtering which does it
        //word by word on any field. It's possible to do here, but concerned about efficiency
        //on very large tables, and MySQL's regex functionality is very limited
        //
		
		if(isset($parameter['search']) && !empty($parameter['search']))
        {
			$search_content = $parameter['search'];
			//分析搜尋框輸入的內容
			$rule = "";	
			$search_word = explode(' ', $search_content);
			/*
			`idea_description` LIKE '%".$search_word[$i]."%' OR 
			`km_id` LIKE '%".$search_word[$i]."%' OR
			`market_survey` LIKE '%".$search_word[$i]."%' OR
			`km_survey` LIKE '%".$search_word[$i]."%' OR
			`dep_item` LIKE '%".$search_word[$i]."%' OR
			`inner_or_outer` LIKE '%".$search_word[$i]."%' OR
			`proposed_date` LIKE BINARY'%".$search_word[$i]."%' OR
			`joint_unit` LIKE '%".$search_word[$i]."%' OR
			`joint_person` LIKE '%".$search_word[$i]."%' OR
			`co_worker` LIKE '%".$search_word[$i]."%' OR
			`valid_project` LIKE '%".$search_word[$i]."%' OR
			*/
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
		
		//setting select clause	
		/*$select_items = '`'.$columns[0].'`';
		for($j=1;$j<count($columns);$j++)
		{
			if($columns[$j] != "null")
			{
				$select_items = $select_items.',`' . $columns[$j] . '`';
			}
		}
		$query_string = "SELECT SQL_CALC_FOUND_ROWS $select_items FROM `$DB_table` WHERE $rule limit ".$parameter['start_record'].','.$parameter['display_length'];
		*/
		//$select_column = 'SQL_CALC_FOUND_ROWS `project_all`.`id`, `year`, `km_id`, `idea_id`, `idea_name`, `idea_source`, `idea_description`, `scenario_d`, `function_d`,`distinction_d`,`value_d`,`feasibility_d`,`market_survey`,`km_survey`,`dep_item`,`inner_or_outer`,`stage`,`stage_detail`,`progress_description`,`proposed_unit`,`proposer`,`proposed_date`,`valid_project`,`established_date`,`joint_unit`,`joint_person`,`co_worker`,`idea_examination`,`Idea`,`Requirement`,`Feasibility`,`Prototype`,`note`,`adoption`,`applied_patent`,`resurrection_application_qualified`,`resurrection_applied`,`PM_in_charge`,`closed_case`';
		$order_column = $columns[intval($this->db->escape_str($parameter['order_column']))];
		$order_method = $this->db->escape_str($parameter['order_method']);
		//$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT `project_all`.`id`, `year`, `km_id`, `idea_id`, `idea_name`, `idea_source`, `idea_description`, `scenario_d`, `function_d`,`distinction_d`,`value_d`,`feasibility_d`,`market_survey`,`km_survey`,`dep_item`,`inner_or_outer`,`stage`,`stage_detail`,`progress_description`,`proposed_unit`,`proposer`,`proposed_date`,`valid_project`,`established_date`,`joint_unit`,`joint_person`,`co_worker`,`idea_examination`,`Idea`,`Requirement`,`Feasibility`,`Prototype`,`note`,`adoption`,`applied_patent`,`resurrection_application_qualified`,`resurrection_applied`,`PM_in_charge`,`closed_case`, `is_blocked` FROM `project_all` LEFT JOIN `project_attachment` ON `project_all`.`id` = `project_attachment`.`project_id` WHERE '.$rule.' GROUP BY `project_all`.`id`) AS T ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //撈出資料庫完整欄位資料
		$query_string = 'SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT `project_all`.`id`, `year`, `idea_id`, `idea_name`, `idea_source`, `scenario_d`, `function_d`,`distinction_d`,`value_d`,`feasibility_d`, `stage`, `progress_description`,`proposed_unit`,`proposer`, `Idea`, `Requirement`, `Feasibility`, `Prototype`, `note`, `applied_patent`,`resurrection_application_qualified`,`resurrection_applied`,`PM_in_charge`, `idea_examination`,`closed_case`, established_date, adoption, `is_blocked`, `file_name`, `file_content` FROM `project_all` LEFT JOIN `project_attachment` ON `project_all`.`id` = `project_attachment`.`project_id` WHERE '.$rule.' GROUP BY `project_all`.`id`) AS T ORDER BY '. $order_column .' '. $order_method .' LIMIT '. $parameter['start_record'] .','.$parameter['display_length'];  //只撈出project_list需呈現之資料
		$rResult = $this->db->query($query_string);
		/*
        if(isset($parameter['search']) && !empty($parameter['search']))
        {	
            for($i=0; $i<count($columns); $i++)
            {
                //$bSearchable = $this->input->get_post('bSearchable_'.$i, true);
                
                // Individual column filtering
                //if(isset($bSearchable) && $bSearchable == 'true')
                //{
				if($columns[$i] != "null")
				{
                    $this->db->or_like($columns[$i], $this->db->escape_like_str($parameter['search']));
                }
				//}
            }
        }
        $this->db->limit($parameter['display_length'], $parameter['start_record']);
		
        // Select Data
		$select_columns = array();
		for($i=0; $i<count($columns); $i++)
        {
			if($columns[$i] != "null")
			{
				array_push($select_columns, $columns[$i]);
			}
        }		
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $select_columns)), false);
        $rResult = $this->db->get($DB_table);
		*/
        // Data set length after filtering
		
		$query = $this->db->query('SELECT FOUND_ROWS() AS `found_rows`');
		$iFilteredTotal = $query->row()->found_rows;
		
        //$this->db->select('FOUND_ROWS() AS found_rows');
        //$iFilteredTotal = $this->db->get()->row()->found_rows;
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
						/*if($index == "file_content")  //假如關鍵句在附加檔案中
						{
							$column = '(附加檔案)'.$project['file_name'];
						}
						else
						{*/
							$column = $manager_opinion_column_mapping[$index];
						//}
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

