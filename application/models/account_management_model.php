<?php
class Account_management_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();  //載入資料庫程式庫
	}
	
	/**
	get_login_account()：Check the login account is available.
	*/	
	public function get_login_account()
	{
		//取得使用者帳密
		$account = $this->input->post('account');
		$password = $this->input->post('passwd');
		$user_login_data = array('account' => $account, 'password' => $password);
		$query = $this->db->select('id, account, surname, given_names')->from('login_account')->where($user_login_data)->get();
		return $query->row_array();
	}

	/**
	set_user_behavior()：紀錄使用者行為
	*/
	public function set_user_behavior($user_id, $page, $cursorX, $cursorY, $clicked_element_id, $search_keyword)
	{
		$new_record = array('user_id'=>$user_id,
			'page'=>$page,
			'pageX'=>$cursorX,
			'pageY'=>$cursorY,
			'clicked_element_id'=>$clicked_element_id,
			'search_keyword'=>$search_keyword);
		$this->db->insert('user_behavior_log', $new_record);
		return ;
	}
}