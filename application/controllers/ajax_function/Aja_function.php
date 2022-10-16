<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Aja_function extends Admin_Controller
{

///***Ce bloc est obligatoire*****////
    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth_onefd');
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url'));
        $this->load->model('M_date');

    }

///*** celle la est la méthode de contrôleur**/////

    public function getdaira_ajax()
    {

        $wilayaVall = $this->input->post('codewilaya');

        $this->load->model('M_date');

        $allWillaya = $this->M_date->getDairaIDwilaya($wilayaVall);
        header('Content-Type: application/json', true);
        echo json_encode($allWillaya);

    }
    public function getcommune_ajax()
    {

        $dairaVall = $this->input->post('codedaira');
        $allCommunes = $this->M_date->getCommunIDdaira($dairaVall);
        header('Content-Type: application/json', true);
        echo json_encode($allCommunes);

    }
    public function getcours_ajax()
    {

        $CODE_ANNEXE = $this->session->userdata('CODE_ANNEXE');
        $icodeVAL = $this->input->post('icodeval');
        $allCours = $this->M_date->getCourByicode($icodeVAL, $CODE_ANNEXE);

        header('Content-Type: application/json', true);
        echo json_encode($allCours);

    }
    public function refresh_captcha()
    {
        $this->load->helper('captcha');
        $captcha = $this->_create_captcha();
        echo $captcha;
    }

    public function matching_captcha($str)
    {
        if (strtolower($str) != strtolower($this->session->userdata('captchaWord'))) {
            $this->form_validation->set_message('matching_captcha', 'تحقق من المعلومات الموجودة في الصورة');
            return false;
        } else {
            return true;
        }
    }
}