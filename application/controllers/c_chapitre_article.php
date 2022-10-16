<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_chapitre_article extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chapitre');

    }

    public function show_chapitre()
    {

        $data = array(
            "chapitres" => $this->m_chapitre->get_all_chapitre(),
            "page_content" => "pages/v_chapitres/v_add_chapitre",
            "grand_title" => "الأبواب و المواد",
            "page_title" => "الأبواب",
        );
        $this->load->view("layout/main_layout", $data);

    }

    public function edit_chapitre($id_chapitre = null)
    {

        if ($this->form_validation->is_natural_no_zero($id_chapitre) === false) {
            redirect('C_chapitre_article/show_chapitre');
        } else {

            $data = array(
                "chapitre" => $this->m_chapitre->get_chapitre($id_chapitre),
                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_chapitres/v_edit_chapitre",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "تعديل الباب",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function update_chapitre()
    {
        $this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required');
        $this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|is_double_exist[chapitre,pknum_chapitre]');
        $this->form_validation->set_rules('libelle_chapitre', 'تعيين الباب', 'trim|required');

        if ($this->form_validation->run() === false) {

            $data = array(
                "chapitre" => $this->m_chapitre->get_chapitre($this->input->post('id_chapitre')),
                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_chapitres/v_edit_chapitre",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "تعديل الباب",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $data = array(
                'fknum_section' => $this->input->post('PKnum_section'),
                'pknum_chapitre' => $this->input->post('PKnum_chapitre'),
                'libelle_chapitre' => $this->input->post('libelle_chapitre'),
                'id_chapitre' => $this->input->post('id_chapitre'),
            );

            if ($this->m_chapitre->update_chapitre($data)) {
                $this->session->set_flashdata('msg', 'لقد تم التعدبل بنجاح');
                $data = array(
                    "chapitres" => $this->m_chapitre->get_all_chapitre(),
                    "page_content" => "pages/v_chapitres/v_add_chapitre",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "الأبواب",
                );
                $this->load->view("layout/main_layout", $data);

            } else {

            }
        }
    }
    public function form_add_chapitre()
    {
        $data = array(
            "sections" => $this->m_chapitre->get_all_section(),
            "page_content" => "pages/v_chapitres/v_form_add_chapitre",
            "grand_title" => "الأبواب و المواد",
            "page_title" => "إضافة باب",
        );
        $this->load->view("layout/main_layout", $data);

    }
    public function add_chapitre()
    {
        $this->form_validation->set_rules('PKnum_section', 'الفصل', 'trim|required');
        $this->form_validation->set_rules('PKnum_chapitre', 'الباب', 'trim|required|is_unique[chapitre.pknum_chapitre]');
        $this->form_validation->set_rules('libelle_chapitre', 'تعيين الباب', 'trim|required');

        if ($this->form_validation->run() === false) {

            $data = array(

                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_chapitres/v_form_add_chapitre",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "إضافة الباب",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $data = array(
                'fknum_section' => $this->input->post('PKnum_section'),
                'pknum_chapitre' => $this->input->post('PKnum_chapitre'),
                'libelle_chapitre' => $this->input->post('libelle_chapitre'));

            if ($this->m_chapitre->add_chapitre($data)) {
                $this->session->set_flashdata('msg', 'لقد تمت الإضافة بنجاح');
                $data = array(
                    "chapitres" => $this->m_chapitre->get_all_chapitre(),
                    "page_content" => "pages/v_chapitres/v_add_chapitre",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "الأبواب",
                );
                $this->load->view("layout/main_layout", $data);

            } else {
                $this->session->set_flashdata('msg', ' فشلت عملية الإضافة  ');
                $data = array(
                    "chapitres" => $this->m_chapitre->get_all_chapitre(),
                    "page_content" => "pages/v_chapitres/v_add_chapitre",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "الأبواب",
                );
                $this->load->view("layout/main_layout", $data);
            }
        }
    }
    public function remove_chapitre($id_chapitre = null)
    {

        if ($this->m_chapitre->remove_chapitre($id_chapitre)) {
            $this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
            $data = array(
                "chapitres" => $this->m_chapitre->get_all_chapitre(),
                "page_content" => "pages/v_chapitres/v_add_chapitre",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "الأبواب",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
            $data = array(
                "chapitres" => $this->m_chapitre->get_all_chapitre(),
                "page_content" => "pages/v_chapitres/v_add_chapitre",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "الأبواب",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function getchapitre_ajax()
    {
        $num_section = $this->input->post('num_section');
        $allchapitres = $this->m_chapitre->getchapitre_ajax($num_section);
        header('Content-Type: application/json', true);
        echo json_encode($allchapitres);

    }
    public function get_article_ajax()
    {
        $num_chapitre = $this->input->post('num_chapitre');
        $allarticles = $this->m_chapitre->get_article_ajax($num_chapitre);
        header('Content-Type: application/json', true);
        echo json_encode($allarticles);

    }
//************** ARTICLES ******************/
    public function show_article()
    {

        $data = array(
            "articles" => $this->m_chapitre->get_all_article(),
            "page_content" => "pages/v_articles/v_add_article",
            "grand_title" => "الأبواب و المواد",
            "page_title" => "المواد",
        );
        $this->load->view("layout/main_layout", $data);

    }

    public function edit_article($id_article = null)
    {

        if ($this->form_validation->is_natural_no_zero($id_article) === false) {
            redirect('C_article_article/show_article');
        } else {

            $data = array(
                "article" => $this->m_chapitre->get_article($id_article),
                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_articles/v_edit_article",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "تعديل المواد",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

    public function update_article()
    {
        $this->form_validation->set_rules('PKnum_chapitre', 'الفصل', 'trim|required');
        $this->form_validation->set_rules('num_article', 'المادة', 'trim|required|check_update_article');
        $this->form_validation->set_rules('libelle_article', 'تعيين المادة', 'trim|required');
        $this->form_validation->set_rules('paragraphe_article', 'تعيين الفقرة', 'trim');

        if ($this->form_validation->run() === false) {

            $data = array(
                "article" => $this->m_chapitre->get_article($this->input->post('id_article')),
                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_articles/v_edit_article",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "تعديل المواد",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $data = array(
                'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
                'num_article' => $this->input->post('num_article'),
                'libelle_article' => $this->input->post('libelle_article'),
                'paragraphe' => $this->input->post('paragraphe_article'),
                'id_article' => $this->input->post('id_article'),
            );

            if ($this->m_chapitre->update_article($data)) {
                $this->session->set_flashdata('msg', 'لقد تم التعدبل بنجاح');
                $data = array(
                    "articles" => $this->m_chapitre->get_all_article(),
                    "page_content" => "pages/v_articles/v_add_article",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "المواد",
                );
                $this->load->view("layout/main_layout", $data);

            } else {

            }
        }
    }
    public function form_add_article()
    {
        $data = array(
            "sections" => $this->m_chapitre->get_all_section(),
            "page_content" => "pages/v_articles/v_form_add_article",
            "grand_title" => "الأبواب و المواد",
            "page_title" => "إضافة مادة",
        );
        $this->load->view("layout/main_layout", $data);

    }
    public function add_article()
    {
        $this->form_validation->set_rules('PKnum_chapitre', 'الفصل', 'trim|required');
        $this->form_validation->set_rules('num_article', 'المادة', 'trim|required|callback_check_article');
        $this->form_validation->set_rules('libelle_article', 'تعيين المادة', 'trim|required');
        $this->form_validation->set_rules('paragraphe_article', 'تعيين الفقرة', 'trim');

        if ($this->form_validation->run() === false) {

            $data = array(

                "sections" => $this->m_chapitre->get_all_section(),
                "page_content" => "pages/v_articles/v_form_add_article",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "إضافة مادة",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $data = array(
                'fknum_chapitre' => $this->input->post('PKnum_chapitre'),
                'num_article' => $this->input->post('num_article'),
                'libelle_article' => $this->input->post('libelle_article'),
                'paragraphe' => $this->input->post('paragraphe_article'));

            if ($this->m_chapitre->add_article($data)) {
                $this->session->set_flashdata('msg', 'لقد تمت الإضافة بنجاح');
                $data = array(
                    "articles" => $this->m_chapitre->get_all_article(),
                    "page_content" => "pages/v_articles/v_add_article",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "المواد",
                );
                $this->load->view("layout/main_layout", $data);

            } else {
                $this->session->set_flashdata('msg', ' فشلت عملية الإضافة  ');
                $data = array(
                    "articles" => $this->m_chapitre->get_all_article(),
                    "page_content" => "pages/v_articles/v_add_article",
                    "grand_title" => "الأبواب و المواد",
                    "page_title" => "المواد",
                );
                $this->load->view("layout/main_layout", $data);
            }
        }
    }
    public function remove_article($id_article = null)
    {

        if ($this->m_chapitre->remove_article($id_article)) {
            $this->session->set_flashdata('msg', 'لقد تم الحذف بنجاح');
            $data = array(
                "articles" => $this->m_chapitre->get_all_article(),
                "page_content" => "pages/v_articles/v_add_article",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "المواد",
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->session->set_flashdata('msg', ' فشلت عملية الحذف  ');
            $data = array(
                "articles" => $this->m_chapitre->get_all_article(),
                "page_content" => "pages/v_articles/v_add_article",
                "grand_title" => "الأبواب و المواد",
                "page_title" => "المواد",
            );
            $this->load->view("layout/main_layout", $data);
        }
    }

/***************************************** */

    public function check_article()
    {
        $chapitre = $this->input->post('PKnum_chapitre'); //
        $article = $this->input->post('num_article'); //
        $res = $this->m_chapitre->chech_article($article, $chapitre);
        if ($res) {
            $this->form_validation->set_message('check_article', 'من فظلك رقم المادة و الفصل يجب أن تكون قيمة وحيدة');
            return false;
        } else {
            return true;
        }
    }
    public function check_update_article()
    {
        $chapitre = $this->input->post('PKnum_chapitre'); //
        $article = $this->input->post('num_article'); //
        $res = $this->m_chapitre->check_update_article($article, $chapitre);
        if ($res) {
            $this->form_validation->set_message('check_article', 'من فظلك رقم المادة و الفصل يجب أن لا تكون  أكثر من قيمة ');
            return false;
        } else {
            return true;
        }
    }
}