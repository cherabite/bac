<?php

class M_engagement extends CI_Model
{

    
    function __construct()
    {
        parent::__construct();
    }

     function get_all_section (){
        $this->db->select('*'); 
        $this->db->from('section');
        $this->db->order_by('pknum_section','ASC');
        $query = $this->db->get();
        $query = $query->result();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
     }

    function get_all_fournisseurs_by_col()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->order_by('id_fournisseur','ASC');
        $this->db->select('id_fournisseur,nom_prenom');
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
    function get_type_doc_engmt(){
        $this->db->select('*');
        $this->db->from('type_doc_engmt');
        $query = $this->db->get();
        $query = $query->result();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query; 
    }
    function get_anciant_nontant($fknum_chapitre,$fknum_article,$annee_courant ){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('fknum_chapitre', $fknum_chapitre);
        $this->db->where('fknum_article', $fknum_article);
        $this->db->where('annee_courant', $annee_courant);
        $this->db->select_min('nouveau_montant');
        $this->db->from('engagement');
        $query = $this->db->get();
        $query = $query->row();  
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    function insert_engagement($data){
        $res=$this->db->insert('engagement', $data);
    if($res) return true; else return false;
    }
    function get_all_engagements_attent(){
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql= "SELECT engagement.id_engagement ,engagement.fknum_chapitre,engagement.fknum_article,
           engagement.montant_operation ,engagement.num_engmt,type_doc_engmt.type_doc , article.libelle_article,fournisseurs.nom_prenom
       from engagement     
       LEFT JOIN article  ON engagement.fknum_article=article.num_article 
       and
       engagement.fknum_chapitre= article.fknum_chapitre
       LEFT JOIN chapitre ON engagement.fknum_chapitre=chapitre.pknum_chapitre 
       LEFT JOIN fournisseurs ON engagement.fk_id_fournisseurs=fournisseurs.id_fournisseur
       LEFT JOIN type_doc_engmt ON engagement.type_doc_engmt=type_doc_engmt.id_type_doc  
       where engagement.num_cwefd = ? and n_fiche_engmt = ? and type_operation = ?
       order by engagement.fknum_chapitre
       " ;
       $res0= $this->db->query($sql,array($num_cwefd,0,'d'));
       $nbr  =$res0->num_rows();
       $res=$res0->result();
           $db_error = $this->db->error();
           if (! empty($db_error['code'])) {
               echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
               exit();
           }
          
           return  $data=array(
              'res'  =>$res,
              'nbr'  =>$nbr
           );
          
    }
    function get_min_n_m(){//get min nouveau montant
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');   
        $sql="select nouveau_montant ,id_engagement  ,ancian_montant 
        from engagement
        where num_cwefd =? and n_fiche_engmt = ? and type_operation = ?
        ORDER BY nouveau_montant ASC
        LIMIT 1
        ";
         $query= $this->db->query($sql,array($num_cwefd,0,'d'));
       
        $res = $query->row();  
        return $res;
}
function get_n_m($id_engagement){//get min nouveau montant
    $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');   
    $this->db->where('num_cwefd', $num_cwefd);
    $this->db->where('id_engagement', $id_engagement);
    $this->db->select('nouveau_montant,montant_operation');
    $this->db->from('engagement');
    $query = $this->db->get();
    $res = $query->row();  
    return $res;
}
    function remove_engagement($id_engagement){
            $num_cwefd     = isset($id) ? $id : $this->session->userdata('n_cwefd');  
            $result        = $this->get_min_n_m();
            $min_n_m       = $result->nouveau_montant; //min nouveau_mon
            $min_ans_m     = $result->ancian_montant; // الرصيد السابق الموافق للالتزام الدي لديه اصغر رصيد جديد
            $id_engagement_min = $result->id_engagement;//id min montant
            $result2       = $this->get_n_m($id_engagement);
            $n_m           = $result2 ->nouveau_montant;
            $m_opetation   = $result2 ->montant_operation;
       if($min_n_m != $n_m) // الإلتزام الأخير في قاعدة البيانات
         {
             
          // حذف الإلتزام و لكن ليس الأخير
             $data=array('nouveau_montant' =>$min_n_m + $m_opetation,
                         'ancian_montant'  =>$min_ans_m + $m_opetation  );  
            $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
            $this->db->where('num_cwefd', $num_cwefd);
            $this->db->where('id_engagement', $id_engagement_min); 
            $res=$this->db->update('engagement', $data);

         }  
         $this->db->where('num_cwefd', $num_cwefd);
         $this->db->where('id_engagement ', $id_engagement );
         $this->db->where('n_fiche_engmt', 0);
         $this->db->where('type_operation', 'd');
         $res=   $this->db->delete('engagement');
         return $res;



            
    }
}