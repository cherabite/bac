<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_configuration extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_configuration');

    }

    public function config_cwefd()
    {

        $data = array(
            "cwefd" => $this->m_configuration->get_cwefd(),
            "page_content" => "pages/v_configuration/v_config_cwefd",
            "grand_title" => "الإعدادات",
            "page_title" => "تعديل بيانات المركز",
        );
        $this->load->view("layout/main_layout", $data);

    }
    public function update_cwefd()
    {
        $this->form_validation->set_rules('adresse_cwefd', 'العنوان', 'trim|required');
        $this->form_validation->set_rules('email_cwefd', 'العنوان الإلكتروني', 'trim|required');
        $this->form_validation->set_rules('tel_cwefd', 'الهاتف', 'trim|required');
        $this->form_validation->set_rules('fax_cwefd', 'الفاكس', 'trim|required');
        $this->form_validation->set_rules('directeur_cwefd', 'مدير المركز', 'trim|required');

        if ($this->form_validation->run() === false) {

            $data = array(
                "cwefd" => $this->m_configuration->get_cwefd(),
                "page_content" => "pages/v_configuration/v_config_cwefd",
                "grand_title" => "الإعدادات",
                "page_title" => "تعديل بيانات المركز",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $data = array(
                'ADR_CWEFD' => $this->input->post('adresse_cwefd'),
                'TEL_CWEFD' => $this->input->post('tel_cwefd'),
                'FAX_CWEFD' => $this->input->post('fax_cwefd'),
                'DIRECTEUR_CWEFD' => $this->input->post('directeur_cwefd'),
                'EMAIL_CWEFD' => $this->input->post('email_cwefd'),
            );

            if ($this->m_configuration->update_cwefd($data)) {
                $this->session->set_flashdata('msg', 'لقد تم التعدبل بنجاح');
                $data = array(
                    "cwefd" => $this->m_configuration->get_cwefd(),
                    "page_content" => "pages/v_configuration/v_config_cwefd",
                    "grand_title" => "الإعدادات",
                    "page_title" => "تعديل بيانات المركز",
                );
                $this->load->view("layout/main_layout", $data);

            } else {
                echo "حدث خطأ أثناء تعديل قاعدة البيانات";
            }
        }
    }
    public function save_data()
    {
        $data = array(
            "cwefd" => $this->m_configuration->get_cwefd(),
            "page_content" => "pages/v_configuration/v_config_save",
            "grand_title" => "الإعدادات",
            "page_title" => "حفظ بيانات المركز",
        );
        $this->load->view("layout/main_layout", $data);
    }
    public function recovery_data()
    {
        $data = array(
            "cwefd" => $this->m_configuration->get_cwefd(),
            "page_content" => "pages/v_configuration/v_config_recovery",
            "grand_title" => "الإعدادات",
            "page_title" => "إسترجاع بيانات المركز",
        );
        $this->load->view("layout/main_layout", $data);
    }

}