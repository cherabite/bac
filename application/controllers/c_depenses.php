<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_depenses extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_depense');
        $this->load->model('m_chapitre');
        $this->load->model('m_year_fiscal');

    }

    public function index()
    {
        $year_fiscal = $this->m_year_fiscal->get_year_fiscal();

        $data = array(
            "n_y" => $year_fiscal,
            "sum_depenses" => $this->m_depense->get_sum_depenses(),
            "depenses" => $this->m_depense->get_all_depenses(),
            "page_content" => "pages/v_depenses/v_show_depenses",
            "grand_title" => " الإعتمادات ",
            "page_title" => "تعديل على الإعتماد",
        );
        $this->load->view("layout/main_layout", $data);
    }

    public function new_year_finence()
    {

        $data = array(

            "page_content" => "pages/v_depenses/v_new_year",
            "grand_title" => " الإعدادات",
            "page_title" => "فتح سنة مالية جديدة",
        );
        $this->load->view("layout/main_layout", $data);

    }
    public function confirm_new_year()
    {
        $this->form_validation->set_rules('new_year', 'السنة المالية الجديدة', 'trim|required|exact_length[4]');

        if ($this->form_validation->run() === false) {

            $data = array(

                "page_content" => "pages/v_depenses/v_new_year",
                "grand_title" => " الإعدادات",
                "page_title" => "فتح سنة مالية جديدة",
            );
            $this->load->view("layout/main_layout", $data);
        } else {

            if ($this->m_year_fiscal->get_year_fiscal() !== null) {
                // تم إنشاء سنة مالية مسبقا
                $n_y = $this->m_year_fiscal->get_year_fiscal();

                if ($n_y == $this->input->post('new_year')) {
                    $this->session->set_flashdata('msg', 'السنة الميلادية موجودة');
                    $data = array(

                        "page_content" => "pages/v_depenses/v_new_year",
                        "grand_title" => " الإعدادات",
                        "page_title" => "فتح سنة مالية جديدة",
                    );
                    $this->load->view("layout/main_layout", $data);
                } else {
                    // يجب حفظ المعلومات الخاصة بالسنة المالية السابقة
                    // يجب التاكد ان السنة المالية السابقة غير موجودة في جدول الارشيف
                    $this->m_depense->archive_bd($n_y);
                    $this->m_depense->create_new_year($this->input->post('new_year'));
                    $this->session->set_flashdata('msg', ' لقد تم فتح سنة ميلادية جديدة ');

                    $data = array(
                        "n_y" => $this->m_year_fiscal->get_year_fiscal(),
                        "sum_depenses" => $this->m_depense->get_sum_depenses(),
                        "depenses" => $this->m_depense->get_all_depenses(),
                        "page_content" => "pages/v_depenses/v_show_depenses",
                        "grand_title" => " الإعتمادات ",
                        "page_title" => "تعديل على الإعتماد",
                    );
                    $this->load->view("layout/main_layout", $data);
                }
            } else {

                // إنشاء سنة مالية لاول مرة

                $this->m_depense->create_new_year($this->input->post('new_year'));
                $this->session->set_flashdata('msg', 'لقد تم فتح سنة مالية جدبيدة');

                $data = array(
                    "n_y" => $this->m_year_fiscal->get_year_fiscal(),
                    "sum_depenses" => $this->m_depense->get_sum_depenses(),
                    "depenses" => $this->m_depense->get_all_depenses(),
                    "page_content" => "pages/v_depenses/v_show_depenses",
                    "grand_title" => " الإعتمادات ",
                    "page_title" => "تعديل على الإعتماد",
                );
                $this->load->view("layout/main_layout", $data);

            }

        }

    }

    public function update_depense()
    {
        if (isset($_POST['depense_id'])) {

            $budjet_primitif = $_POST['budjet_primitif'];

            $this->form_validation->set_rules('budjet_primitif[]', 'الميزانية البيدائية', 'trim|required|decimal');

            if ($this->form_validation->run() == false) {
                $validator = array();
                $validator['success'] = 0;
                //  $validator['captcha']      = $this->_create_captcha();
                $validator['valid_error'] = validation_errors();
                header("Content-Type:application/json ; charset=utf-8");
                echo json_encode($validator);
                exit();
            } else {
                $budjet_primitif = $_POST['budjet_primitif'];
                $id = $_POST['depense_id'];
                for ($count = 0; $count < count($id); $count++) {
                    if ($budjet_primitif[$count] > 0) {
                        $data = array(
                            "nouveau_montant" => $budjet_primitif[$count],
                            "id_engagement" => $id[$count],
                            'n_fiche_engmt' => 1,

                        );
                    } else {
                        $data = array(
                            "nouveau_montant" => $budjet_primitif[$count],
                            "id_engagement" => $id[$count],
                        );
                    }

                    $this->m_depense->update_depense($data);
                }
                $sum = $this->m_depense->get_sum_depenses();
                $sum_depenses = $sum->nouveau_montant;
                $validator['sum_depenses'] = $sum_depenses;
                header("Content-Type:application/json ; charset=utf-8");
                echo json_encode($validator);
            }

        }

    }
    public function fetch_all_depenses_ajax()
    {
        $depenses = $this->m_depense->get_all_depenses();
        echo json_encode($depenses);
    }
}