<?php

class M_configuration extends CI_Model
{

    
    function __construct()
    {
        parent::__construct();
    }

    function get_cwefd(){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->select('*');
        $this->db->from('centre_cwefd');    
        $this->db->where('CODE_CWEFD',$num_cwefd);
        $query = $this->db->get();
        $query = $query->row();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
}

 function update_cwefd($data){
    $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
    $this->db->where('CODE_CWEFD',$num_cwefd);
    $res=$this->db->update('centre_cwefd', $data);
    if($res) return true; else return false;
 }
    
}