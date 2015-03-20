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
		/*取得使用者的帳密*/
		$account = $this->input->post('account');
		$password = $this->input->post('passwd');
		$user_login_data = array('account' => $account, 'password' => $password);
		$query = $this->db->select('account, surname, given_names')->from('login_account')->where($user_login_data)->get();
		return $query->row_array();
	}
	
	public function get_account($reg_account)
	{
		/*取得使用者的帳密*/
		$user_login_data = array('account' => $reg_account);
		$query = $this->db->select('account')->from('login_account')->where($user_login_data)->get();
		return $query->row_array();
	}
	
}