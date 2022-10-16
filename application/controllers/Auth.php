<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('administrator_model');
		$this->load->model('m_bac');
    }

    public function welcome()
    {
        if ($this->auth_onefd->logged_in() and $this->auth_onefd->is_logged_in(true)) {
            $data = array(
				"filieres" => $this->m_bac->get_count_filieres(),
				"sumbac" => $this->m_bac->get_count_bac(),
				"moyens" => $this->m_bac->get_count_moyen(),
				"page_content" => "pages/bac/dashboard",
            );
            $this->load->view("layout/main_layout", $data);
        } elseif ($this->auth_onefd->autologin()) {
            $data = array(
				"page_content" => "pages/bac/dashboard",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->load->view('login/login_v');
        }
    }
    public function login()
    {
        $data = array();

        if ($this->input->post('identifiant', true) && $this->input->post('password', true)) {
            $this->form_validation->set_rules('identifiant', 'كلمة المرور', 'trim|required|min_length[3]|max_length[15]');
            $this->form_validation->set_rules('password', ' إسم المستخدم', 'trim|required|min_length[3]|max_length[15]');
            if ($this->form_validation->run() == false) {

                $this->load->view('login/login_v');
            } else {
                // validation ok
                if ($this->auth_onefd->connect($this->form_validation->set_value('identifiant'), $this->form_validation->set_value('password'), $this->form_validation->set_value('remember'))) { // success

                    redirect('auth/welcome');
                } else {

                    $errors = $this->auth_onefd->get_error_message();
                    if (isset($errors['identifiant'])) {
                        $this->_show_message($this->lang->line('identifiant') . ' ' . $errors['identifiant']);

                    } elseif (isset($errors['not_activated'])) { // not activated user
                        $data['message'] = $errors['not_activated'];
                    } elseif (isset($errors['login_false'])) { // not activated user
                        $data['message'] = $errors['login_false'];
                    }
                    $this->load->view('login/login_v', $data);
                }
            }

        } else {
            $data['message'] = $this->lang->line('login_unsuccessful');
            $this->load->view('login/login_v', $data);
        }

    }

    public function logout()
    {
        //$this->delete_autologin();
        $this->auth_onefd->logout();
        $this->load->view('login/login_v');

    }

}
