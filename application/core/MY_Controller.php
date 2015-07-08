<?php
class MY_Controller extends CI_Controller
{
    public $resource_path = array(); 
	
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');  //載入Form輔助函數
		$this->load->helper('url');
		$this->resource_path = array(
            'css_location' => site_url("/application/assets/css"),  //css引用檔案路徑
            'js_location' => site_url("/application/assets/js"),  //js引用檔案路徑
            'img_location' => site_url("/application/assets/img"), //img檔案路徑
			//'plugins_location' => site_url("/application/assets/plugins"),
			'template_location' => site_url("/application/assets/plugin"),  //模板檔案路徑
			'project_location' => site_url("/application/assets/project")
        );			
    }
}
?>