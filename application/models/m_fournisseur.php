<?php

class M_fournisseur extends CI_Model
{

    
    function __construct()
    {
        parent::__construct();
    }


function get_all_fournisseurs()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->order_by('id_fournisseur','ASC');
        $this->db->select('*');
        $this->db->from('fournisseurs');
        $query = $this->db->get();
        $query = $query->result();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query; 
    }

    function add_fournisseur($data){
        $res=$this->db->insert('fournisseurs', $data);
    if($res) return true; else return false;
    }


    function get_fournisseur($id_fournisseur){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_fournisseur', $id_fournisseur);     
        $this->db->select('*');
        $this->db->from('fournisseurs');
        $query = $this->db->get();
        $query = $query->row();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query; 
    }
    function update_fournisseur($data){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_fournisseur', $data['id_fournisseur']); 
        $res=$this->db->update('fournisseurs', $data);
        if($res) return true; else return false;

    }

    function remove_fournisseur($id_fournisseur){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_fournisseur', $id_fournisseur); 
        $res= $this->db->delete('fournisseurs');
   return $res;
    }
}