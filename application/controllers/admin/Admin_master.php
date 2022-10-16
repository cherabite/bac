<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin_master extends CI_Controller
{
	   

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth_onefd');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper(array('url', 'language'));
       $this->lang->load('onefd_auth_lang', 'arabic');
		if (!$this->auth_onefd->logged_in())
		{
          
			redirect('Auth/login', 'refresh');
		}
	}
	public function index()
	{
	if (!$this->auth_onefd->logged_in())
		{
		  $this->load->view('login/login');
		}
		/*else if (!$this->auth_onefd->is_admin()) 
		{
		//  $this->load->view('templates/menu_header_view');
		  
		}*/
		
	}
 public function create_user()
	{
  if ($this->auth_onefd->is_admin()) {
        
	   $this->load->view('templates/menu_header_view');
       $this->load->view('admin/user/create_user_view');
       $this->load->view('templates/footer_view');	   
	}else{
		$this->load->view('templates/menu_header_view');
		$this->load->view('templates/footer_view');
  
	}
	
	}

}	