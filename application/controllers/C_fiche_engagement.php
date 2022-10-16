<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class C_fiche_engagement extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_fiche_engagement');
        //  $this->load->model('m_year_fiscal');
        // $this->load->model('m_depense');

    }

    public function fiche_engagement()
    { // بطاقة الإلتزام
        $result = $this->m_fiche_engagement->get_all_fiche_engagements_attent();

        $data = array(

            "nbr_fiche_engmt_attent" => $result['nbr'],
            "fiche_engagements" => $result['res'],
            "file_js" => "pages/v_engagement/confirm.js",
            "page_content" => "pages/v_engagement/v_list_fiche_engagement",
            "grand_title" => " الإلتزامات ",
            "page_title" => "بطاقة الإلــتزام",
        );
        $this->load->view("layout/main_layout", $data);
    }

}