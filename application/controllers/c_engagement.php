<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_engagement extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_engagement');
        $this->load->model('m_year_fiscal');
        $this->load->model('m_fournisseur');
        $this->load->model('m_chapitre');

    }

    public function index()
    {
        $result = $this->m_engagement->get_all_engagements_attent();

        $data = array(

            "nbr_engmt_attent" => $result['nbr'],
            "engagements" => $result['res'],
            "file_js" => "pages/v_engagement/confirm.js",
            "page_content" => "pages/v_engagement/v_list_engagement",
            "grand_title" => " الإلتزامات ",
            "page_title" => "تحضير الإلــتزام",
        );
        $this->load->view("layout/main_layout", $data);
    }

    public function create_engagement()
    {

        $data = array(

            "type_docs" => $this->m_engagement->get_type_doc_engmt(),
            "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
            "sections" => $this->m_engagement->get_all_section(),
            "page_content" => "pages/v_engagement/v_create_engagement",
            "grand_title" => " الإلتزامات ",
            "page_title" => "تحضير الإلــتزام",
        );
        $this->load->view("layout/main_layout", $data);
    }

    public function save_engagement()
    {
        $this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('PKnum_article', 'المادة', 'trim|encode_php_tags');
        $this->form_validation->set_rules('num_engmt', 'رقم الوثيقة', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('type_doc_engmt', 'نوع الوثيقة', 'trim|encode_php_tags');
        $this->form_validation->set_rules('date_facture', 'تاريخ الوثيقة', 'trim|date|encode_php_tags');
        $this->form_validation->set_rules('montant_operation', 'مبلغ الإلتزام', 'trim|decimal|encode_php_tags');
        $this->form_validation->set_rules('id_fournisseur', 'إسم المستفيد', 'trim|required|encode_php_tags');
        if ($this->form_validation->run() === false) {

            $data = array(
                "validation_errors" => validation_errors(),
                "type_docs" => $this->m_engagement->get_type_doc_engmt(),
                "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
                "sections" => $this->m_engagement->get_all_section(),
                "page_content" => "pages/v_engagement/v_create_engagement",
                "grand_title" => " الإلتزامات ",
                "page_title" => "تحضير الإلــتزام",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $montant_operation = $this->input->post('montant_operation');

            if ($montant_operation > 0) {
                $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
                $annee_courant = $this->m_year_fiscal->get_year_fiscal();
                $data = array(
                    'num_cwefd' => $num_cwefd,
                    'annee_courant ' => $annee_courant,
                    'fk_id_fournisseurs' => $this->input->post('id_fournisseur'),
                    'fknum_section' => $this->input->post('PKnum_section'),
                    'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
                    'fknum_article' => $this->input->post('PKnum_article'),
                    'num_engmt' => $this->input->post('num_engmt'),
                    'type_doc_engmt' => $this->input->post('type_doc_engmt'),
                    'date_facture' => $this->input->post('date_facture'),
                    'montant_operation' => $this->input->post('montant_operation'),
                    'date_create_engmt' => date('Y-m-d'),
                    'type_operation' => 'd',
                );

                if ($this->m_engagement->insert_engagement($data)) {
                    $this->session->set_flashdata('msg', get_flashdata('لقد تم إضافة إلتزام جديد  ', 's'));
                    redirect('c_engagement', 'refresh');
                } else {
                    $this->session->set_flashdata('msg', get_flashdata('فشلت عملية التحضير الالتزام ', 'd'));
                    $data = array(
                        "type_docs" => $this->m_engagement->get_type_doc_engmt(),
                        "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
                        "sections" => $this->m_engagement->get_all_section(),
                        "page_content" => "pages/v_engagement/v_create_engagement",
                        "grand_title" => " الإلتزامات ",
                        "page_title" => "تحضير الإلــتزام",
                    );
                    $this->load->view("layout/main_layout", $data);
                }

            } else {
                $this->session->set_flashdata('msg', get_flashdata('مبلغ عملية الإلتزام يكون أكبر من 0.00 ', 'w'));
                $data = array(
                    "type_docs" => $this->m_engagement->get_type_doc_engmt(),
                    "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
                    "sections" => $this->m_engagement->get_all_section(),
                    "page_content" => "pages/v_engagement/v_create_engagement",
                    "grand_title" => " الإلتزامات ",
                    "page_title" => "تحضير الإلــتزام",
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
            "page_title" => "إضافة ممون",
        );
        $this->load->view("layout/main_layout", $data);
    }
    public function get_montant_rest()
    {
        $num_chapitre = $this->input->post('num_chapitre');
        $num_article = $this->input->post('num_article');
        $m_r = $this->m_engagement->get_anciant_nontant($num_chapitre, $num_article, $this->m_year_fiscal->get_year_fiscal());
        $m_rest = $m_r->nouveau_montant;
        $validator['m_rest'] = $m_rest;
        header("Content-Type:application/json ; charset=utf-8");
        echo json_encode($validator);
    }

    public function remove_engagement($id_engagement)
    {
        if ($this->form_validation->is_natural_no_zero($id_engagement) === false) {
            redirect('/', reflesh);
        } else {

            if ($this->m_engagement->remove_engagement($id_engagement)) {
                $this->session->set_flashdata('msg', get_flashdata('لقد تم حذف الإلــــتـزام ', 'i'));
                redirect('c_engagement');
            } else {
                $this->session->set_flashdata('msg', get_flashdata('لقد فشلت عملية حذف  الإلــــتـزام ', 'd'));
                redirect('c_engagement');
            }
        }

    }
    public function edite_engagement($id_engagement)
    {
        if ($this->form_validation->is_natural_no_zero($id_engagement) === false) {
            $this->session->set_flashdata('msg', get_flashdata('أعد المحاولة لاحقا', 'd'));
            redirect('c_engagement');
        } else {
            $engagement = $this->m_engagement->get_engagement_preparer_by_id($id_engagement);
            $data = array(
                "engagement" => $engagement,
				 "id_engmt_pre" => $engagement->id_engmt_pre,
                "nom_fournissuer" => $engagement->nom_prenom,
                "section" => $engagement->libelle_section,
                "chapitre" => $engagement->libelle_chapitre,
                "article" => $engagement->libelle_article,
                "type_doc" => $engagement->type_doc,
                "type_docs" => $this->m_engagement->get_type_doc_engmt(),
                "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
                "sections" => $this->m_engagement->get_all_section(),
                "page_content" => "pages/v_engagement/v_update_engagement",
                "grand_title" => " الإلتزامات ",
                "page_title" => "تعديل على الإلــتزام",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function update_engagement()
    {
        $this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('PKnum_article', 'المادة', 'trim|encode_php_tags');
        $this->form_validation->set_rules('num_engmt', 'رقم الوثيقة', 'trim|required|encode_php_tags');
        $this->form_validation->set_rules('type_doc_engmt', 'نوع الوثيقة', 'trim|encode_php_tags');
        $this->form_validation->set_rules('date_facture', 'تاريخ الوثيقة', 'trim|date|encode_php_tags');
        $this->form_validation->set_rules('montant_operation', 'مبلغ الإلتزام', 'trim|decimal|encode_php_tags');
        $this->form_validation->set_rules('id_fournisseur', 'إسم المستفيد', 'trim|required|encode_php_tags');
        if ($this->form_validation->run() === false) {

            $data = array(
                "validation_errors" => validation_errors(),
                "type_docs" => $this->m_engagement->get_type_doc_engmt(),
                "fournisseurs" => $this->m_engagement->get_all_fournisseurs_by_col(),
                "sections" => $this->m_engagement->get_all_section(),
                "page_content" => "pages/v_engagement/v_update_engagement",
                "grand_title" => " الإلتزامات ",
                "page_title" => "تعديل الإلــتزام",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $montant_operation = $this->input->post('montant_operation');

            if ($montant_operation > 0) {
                $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
                $annee_courant = $this->m_year_fiscal->get_year_fiscal();
                $data = array(
                    'num_cwefd' => $num_cwefd,
                    'annee_courant ' => $annee_courant,
                    'fk_id_fournisseurs' => $this->input->post('id_fournisseur'),
                    'fknum_section' => $this->input->post('PKnum_section'),
                    'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
                    'fknum_article' => $this->input->post('PKnum_article'),
                    'num_engmt' => $this->input->post('num_engmt'),
                    'type_doc_engmt' => $this->input->post('type_doc_engmt'),
                    'date_facture' => $this->input->post('date_facture'),
                    'montant_operation' => $this->input->post('montant_operation'),
                    'date_create_engmt' => date('Y-m-d'),
                    'type_operation' => 'd',
					//'id_engmt_pre' =>$this->input->post('id_engmt_pre')
                );

                if ($this->m_engagement->update_engagement_by_id($this->input->post('id_engmt_pre'),$data)) {
                    $this->session->set_flashdata('msg', get_flashdata('لقد تم تعديل إلتزام   ', 's'));
                    redirect('c_engagement', 'refresh');
                } else {
                    $this->session->set_flashdata('msg', get_flashdata('فشلت عملية تعديل الالتزام ', 'd'));
                    redirect('c_engagement', 'refresh');
                }

            } else {
                $this->session->set_flashdata('msg', get_flashdata('مبلغ عملية الإلتزام يكون أكبر من 0.00 ', 'w'));
                redirect('c_engagement', 'refresh');

            }

        }
    }

    public function create_fiche_engmt()
    {
        if (isset($_POST['engmt_id'])) {

            $this->form_validation->set_rules('engmt_id[]', 'الإلتزام', 'trim|required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('msg', get_flashdata(' خطأ في تحديد الإلتزامات', 'w'));
                redirect('c_engagement');
            } else {

                $id = $_POST['engmt_id'];

                $montant_operation_0 = 0;
                $out = true;
                if (count($id) > 1) {
                    $res = $this->m_engagement->get_engagement_preparer_by_id($id[0]);
                    $n_chapitre_0 = $res->fknum_chapitre;
                    $n_article_0 = $res->fknum_article;
                    $montant_operation_0 = $res->montant_operation + $montant_operation_0;

                    for ($count = 1; $count < count($id); $count++) {
                        $id_engagement = $id[$count];

                        $res = $this->m_engagement->get_engagement_preparer_by_id($id_engagement);
                        $n_chapitre = $res->fknum_chapitre;
                        $n_article = $res->fknum_article;

                        if ($n_chapitre != $n_chapitre_0 or $n_article != $n_article_0) {
                            $out = false;
                            break;
                        } else {
                            $montant_operation_0 = $res->montant_operation + $montant_operation_0;
                        }

                    }
                } else {
                    $res = $this->m_engagement->get_engagement_preparer_by_id($id[0]);
                    $n_chapitre_0 = $res->fknum_chapitre;
                    $n_article_0 = $res->fknum_article;
                    $montant_operation_0 = $res->montant_operation + $montant_operation_0;
                }
                if ($out == false) {
                    $this->session->set_flashdata('msg', get_flashdata('يجب أن يكون جميع الإلتزامات من نفس  نوع الباب و المادة', 'w'));
                    redirect('c_engagement');
                } else {
                    $montant_rest = $this->m_engagement->get_anciant_nontant($n_chapitre_0, $n_article_0, $this->m_year_fiscal->get_year_fiscal())->nouveau_montant;
                    if ($montant_operation_0 > $montant_rest) {

                        $msg = get_flashdata('المبلغ غير كافي لإجراء هذه العملية', 'w');
                        $this->session->set_flashdata('msg', $msg);
                        redirect('c_engagement');
                    } else {
                        // get max num fiche engagement
                        $res = $this->m_engagement->get_max_num_fiche_engmt($n_chapitre_0, $n_article_0, $this->m_year_fiscal->get_year_fiscal());
                        $length = strlen($n_chapitre_0);
                        $dernier = $length - 1;
                        $n_section = substr($n_chapitre_0, $dernier, 1);
                        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
                        $n_fiche_engmt = $res->n_fiche_engmt + 1;
                        $data = array(

                            'annee_courant' => $this->m_year_fiscal->get_year_fiscal(),
                            'fknum_section' => $n_section,
                            'fknum_chapitre' => $n_chapitre_0,
                            'fknum_article' => $n_article_0,
                            'n_fiche_engmt' => $n_fiche_engmt,
                            'montant_operation' => $montant_operation_0,
                            'ancian_montant' => $res->nouveau_montant,
                            'nouveau_montant' => $res->nouveau_montant - $montant_operation_0,
                        );
                        if ($this->m_engagement->insert_engmt($data)) {

                            for ($count = 0; $count < count($id); $count++) {
                                $id_engagement = $id[$count];
                                $dat = array(
                                    'n_fiche_engmt' => $n_fiche_engmt,
                                );
                                $this->m_engagement->update_engagement_by_id($id_engagement, $dat);
                            }
                            $msg = get_flashdata('لقد تم إنشاء بطاقة إلتزام جديدة', 's');
                            $this->session->set_flashdata('msg', $msg);
                            redirect('c_engagement');
                        }
                    }
                }

            }

        } else {
            $this->session->set_flashdata('msg', get_flashdata('يجب تحديد الإلتزامات', 'w'));
            redirect('c_engagement');
        }

    }
}