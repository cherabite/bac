<?php

class M_year_fiscal extends CI_Model
{

    
    function __construct()
    {
        parent::__construct();
    }

    function get_year_fiscal(){
          $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
            $this->db->where('num_cwefd', $num_cwefd);
            $this->db->select('annee_courant');
            $this->db->limit('1');
           
            $this->db->from('engagement');     
     
            $query = $this->db->get();
            if ($query ->num_rows() > 0 ) {
                $res0 = $query->first_row(); 
               return  $res0->annee_courant;
        
               } 
            else {
               return null;
            }
    }
    
  
}