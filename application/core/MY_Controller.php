<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

}

class Admin_Controller extends MY_Controller
{

    /*
    var $permission = array();

    public function __construct()
    {
    parent::__construct();

    $group_data = array();
    if(empty($this->session->userdata('logged_in'))) {
    $session_data = array('logged_in' => FALSE);
    $this->session->set_userdata($session_data);
    }
    else {
    $user_id = $this->session->userdata('id');
    $this->load->model('model_groups');
    $group_data = $this->model_groups->getUserGroupByUserId($user_id);

    $this->data['user_permission'] = unserialize($group_data['permission']);

    $this->permission = unserialize($group_data['permission']);
    }
    }

     */
    public $permission = array();
    public function __construct()
    {
        parent::__construct();
        //$permission = array();
        $this->lang->load('onefd_auth_lang', 'arabic');
        if (!$this->auth_onefd->logged_in() or !$this->auth_onefd->is_logged_in(true)) {
            redirect('Auth/login', 'refresh');
        } else {

            $this->load->model('administrator_model');
            $user = $this->administrator_model->get_user_By_id();

            //$this->data['user_permission'] = unserialize($user['permission']);

          //  $this->permission = unserialize($user['permission']);
        }

    }

    public function _create_captcha()
    {
        $this->load->helper('captcha');

        $cap = create_captcha(array(
            'img_path' => './' . $this->config->item('captcha_path', 'onefd_auth'),
            'img_url' => base_url() . $this->config->item('captcha_path', 'onefd_auth'),
            'font_path' => './' . $this->config->item('captcha_fonts_path', 'onefd_auth'),
            'font_size' => $this->config->item('captcha_font_size', 'onefd_auth'),
            'img_width' => $this->config->item('captcha_width', 'onefd_auth'),
            'img_height' => $this->config->item('captcha_height', 'onefd_auth'),
            'show_grid' => $this->config->item('captcha_grid', 'onefd_auth'),
            'expiration' => $this->config->item('captcha_expire', 'onefd_auth'),
            'word_length' => $this->config->item('word_length', 'onefd_auth'),
            'img_height' => $this->config->item('img_height', 'onefd_auth'),
            'img_width' => $this->config->item('img_width', 'onefd_auth'),
        ));

        // Save captcha params in session
        $this->session->set_flashdata(array(
            'captcha_word' => $cap['word'],
            'captcha_time' => $cap['time'],
        ));

        return $cap['image'];
    }

    public function _check_captcha($code)
    {
        $time = $this->session->flashdata('captcha_time');
        $word = $this->session->flashdata('captcha_word');

        list($usec, $sec) = explode(" ", microtime());
        $now = ((float) $usec + (float) $sec);

        if ($now - $time > $this->config->item('captcha_expire', 'onefd_auth')) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_captcha_expired'));
            return false;

        } elseif (($this->config->item('captcha_case_sensitive', 'onefd_auth') and
            $code != $word) or
            strtolower($code) != strtolower($word)) {
            $this->form_validation->set_message('_check_captcha', $this->lang->line('auth_incorrect_captcha'));
            return false;
        }
        return true;
    }

}