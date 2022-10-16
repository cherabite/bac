<?php
class Admin extends Ci_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            "page_content" => "pages/dashboard",
        );
        $this->load->view("layout/main_layout", $data);
    }
}