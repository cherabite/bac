<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_fournisseur extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_fournisseur');

    }

    public function show_fournisseurs()
    {

        $data = array(
            "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
            "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
            "grand_title" => "تعديلات",
            "page_title" => "المتعاملين",
        );
        $this->load->view("layout/main_layout", $data);

    }

    public function edit_fournisseur($id_fournisseur = null)
    {

        if ($this->form_validation->is_natural_no_zero($id_fournisseur) == false) {
            redirect('C_fournisseur/show_fournisseurs');
        } else {

            $data = array(

                "fournisseur" => $this->m_fournisseur->get_fournisseur($id_fournisseur),
                "page_content" => "pages/v_fournisseurs/v_edit_fournisseur",
                "grand_title" => "تعديلات",
                "page_title" => "المتعاملين",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function update_fournisseur()
    {
        if ($this->input->post('is_fonctionaire') == 1) {

            $this->form_validation->set_rules('nom_prenom', 'اللقب و الإسم', 'trim|required|encode_php_tags|is_double_exist[fournisseurs, nom_prenom]');
            $this->form_validation->set_rules('adresse', 'العنوان', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('tel', 'الهاتف', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('agence', 'الوكالة', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('type_pay', 'كيفية الدفع', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('n_compte', 'رقم الحساب', 'trim|required|numeric|encode_php_tags|is_double_exist[fournisseurs,n_compte]');

        } else {
            $this->form_validation->set_rules('nom_prenom', 'اللقب و الإسم', 'trim|required|encode_php_tags|is_double_exist[fournisseurs,nom_prenom]');
            $this->form_validation->set_rules('adresse', 'العنوان', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('tel', 'الهاتف', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('agence', 'الوكالة', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('type_pay', 'كيفية الدفع', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('n_compte', 'رقم الحساب', 'trim|required|numeric|encode_php_tags|is_double_exist[fournisseurs,n_compte ]');

            $this->form_validation->set_rules('nrc', 'الرقم التجاري', 'trim|required|numeric|encode_php_tags|exact_length[14]|is_double_exist[fournisseurs,nrc]');
            $this->form_validation->set_rules('nif', 'الرقم الضريبي', 'trim|required|numeric|encode_php_tags|exact_length[18]|is_double_exist[fournisseurs,nif]');
            $this->form_validation->set_rules('nis', 'الرقم الإحصائي', 'trim|required|numeric|encode_php_tags|exact_length[18]|is_double_exist[fournisseurs,nis]');
            $this->form_validation->set_rules('capital_s', 'رأس المال', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('secteur_juridique', 'القطاع القانوني', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('forme_juridique', 'الشكل القانوني ', 'trim|required|encode_php_tags');
        }
        if ($this->form_validation->run() === false) {

            $is_fonctionaire = $this->input->post('is_fonctionaire') ? 1 : 0;
            $data = array(
                "validation_errors" => validation_errors(),
                "is_fonctionaire" => $is_fonctionaire,
                "fournisseur" => $this->m_fournisseur->get_fournisseur($this->input->post('id_fournisseur')),
                "page_content" => "pages/v_fournisseurs/v_edit_fournisseur",
                // "file_js" => "pages/v_fournisseurs/f.js",
                "grand_title" => " التعديلات ",
                "page_title" => "إضافة متعامل",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $is_fonctionaire = $this->input->post('is_fonctionaire') ? 1 : 0;
            $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
            $data = array(
                'id_fournisseur' => $this->input->post('id_fournisseur'),
                'nom_prenom' => $this->input->post('nom_prenom'),
                'adresse' => $this->input->post('adresse'),
                'tel' => $this->input->post('tel'),
                'agence' => $this->input->post('agence'),
                'type_pay' => $this->input->post('type_pay'),
                'n_compte' => $this->input->post('n_compte'),
                'nrc' => $this->input->post('nrc'),
                'nif' => $this->input->post('nif'),
                'nis' => $this->input->post('nis'),
                'capital_s' => $this->input->post('capital_s'),
                'secteur_juridique' => $this->input->post('secteur_juridique'),
                'forme_juridique' => $this->input->post('forme_juridique'),
                "is_fonctionaire" => $is_fonctionaire);

            if ($this->m_fournisseur->update_fournisseur($data)) {
                $this->session->set_flashdata('msg', 'لقد تمت التعديل بنجاح');
                $data = array(
                    "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
                    "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
                    "grand_title" => "تعديلات",
                    "page_title" => "المتعاملين",
                );
                $this->load->view("layout/main_layout", $data);
            } else {
                $this->session->set_flashdata('msg', ' فشلت عملية التعديل  ');
                $data = array(
                    "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
                    "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
                    "grand_title" => "تعديلات",
                    "page_title" => "المتعاملين",
                );
                $this->load->view("layout/main_layout", $data);
            }
        }
    }
    public function form_add_fournisseur()
    {
        $data = array(

            "page_content" => "pages/v_fournisseurs/v_form_add_fournisseur",
            "file_js" => "pages/v_fournisseurs/f.js",
            "grand_title" => " التعديلات ",
            "page_title" => "إضافة متعامل",
        );
        $this->load->view("layout/main_layout", $data);

    }
    public function add_fournisseur()
    {
        if ($this->input->post('is_fonctionaire') == 1) {
            $this->form_validation->set_rules('nom_prenom', 'اللقب و الإسم', 'trim|required|encode_php_tags|is_unique[fournisseurs.nom_prenom]');
            $this->form_validation->set_rules('adresse', 'العنوان', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('tel', 'الهاتف', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('agence', 'الوكالة', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('type_pay', 'كيفية الدفع', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('n_compte', 'رقم الحساب', 'trim|required|numeric|encode_php_tags|is_unique[fournisseurs.n_compte ]');

        } else {
            $this->form_validation->set_rules('nom_prenom', 'اللقب و الإسم', 'trim|required|encode_php_tags|is_unique[fournisseurs.nom_prenom]');
            $this->form_validation->set_rules('adresse', 'العنوان', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('tel', 'الهاتف', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('agence', 'الوكالة', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('type_pay', 'كيفية الدفع', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('n_compte', 'رقم الحساب', 'trim|required|numeric|encode_php_tags|is_unique[fournisseurs.n_compte ]');

            $this->form_validation->set_rules('nrc', 'الرقم التجاري', 'trim|required|numeric|encode_php_tags|exact_length[14]|is_unique[fournisseurs.nrc]');
            $this->form_validation->set_rules('nif', 'الرقم الضريبي', 'trim|required|numeric|encode_php_tags|exact_length[18]|is_unique[fournisseurs.nif]');
            $this->form_validation->set_rules('nis', 'الرقم الإحصائي', 'trim|required|numeric|encode_php_tags|exact_length[18]|is_unique[fournisseurs.nis]');
            $this->form_validation->set_rules('capital_s', 'رأس المال', 'trim|required|numeric|encode_php_tags');
            $this->form_validation->set_rules('secteur_juridique', 'القطاع القانوني', 'trim|required|encode_php_tags');
            $this->form_validation->set_rules('forme_juridique', 'الشكل القانوني ', 'trim|required|encode_php_tags');
        }
        if ($this->form_validation->run() === false) {
            $is_fonctionaire = $this->input->post('is_fonctionaire') ? 1 : 0;
            $data = array(
                "validation_errors" => validation_errors(),
                "is_fonctionaire" => $is_fonctionaire,
                "page_content" => "pages/v_fournisseurs/v_form_add_fournisseur",
                // "file_js" => "pages/v_fournisseurs/f.js",
                "grand_title" => " التعديلات ",
                "page_title" => "إضافة متعامل",
            );
            $this->load->view("layout/main_layout", $data);
        } else {

            $is_fonctionaire = $this->input->post('is_fonctionaire') ? 1 : 0;
            $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
            $data = array(
                'num_cwefd' => $num_cwefd,
                'nom_prenom' => $this->input->post('nom_prenom'),
                'adresse' => $this->input->post('adresse'),
                'tel' => $this->input->post('tel'),
                'agence' => $this->input->post('agence'),
                'type_pay' => $this->input->post('type_pay'),
                'n_compte' => $this->input->post('n_compte'),
                'nrc' => $this->input->post('nrc'),
                'nif' => $this->input->post('nif'),
                'nis' => $this->input->post('nis'),
                'capital_s' => $this->input->post('capital_s'),
                'secteur_juridique' => $this->input->post('secteur_juridique'),
                'forme_juridique' => $this->input->post('forme_juridique'),
                "is_fonctionaire" => $is_fonctionaire);

            if ($this->m_fournisseur->add_fournisseur($data)) {
                $this->session->set_flashdata('msg', 'لقد تمت الإضافة بنجاح');
                $data = array(
                    "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
                    "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
                    "grand_title" => "تعديلات",
                    "page_title" => "المتعاملين",
                );
                $this->load->view("layout/main_layout", $data);
            } else {
                $this->session->set_flashdata('msg', ' فشلت عملية الإضافة  ');
                $data = array(
                    "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
                    "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
                    "grand_title" => "تعديلات",
                    "page_title" => "المتعاملين",
                );
                $this->load->view("layout/main_layout", $data);
            }
        }
    }
    public function remove_fournisseur($id_fournisseur = null)
    {

        if ($this->m_fournisseur->remove_fournisseur($id_fournisseur)) {
            $this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
        } else {
            $this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
        }
        $data = array(
            "fournisseurs" => $this->m_fournisseur->get_all_fournisseurs(),
            "page_content" => "pages/v_fournisseurs/v_show_fournisseurs",
            "grand_title" => "تعديلات",
            "page_title" => "المتعاملين",
        );
        $this->load->view("layout/main_layout", $data);
    }

/***************************************** */
}