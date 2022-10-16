<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_date extends CI_Model {
protected $tab_categorie = 'categorie';
protected $tab_classes='classes';
protected $tab_places='PLACES';
protected $tab_fraisinscription='fraisinscription';
public function __construct()
    {
      parent::__construct();
	  if (!isset($_SESSION)) {
            session_start();
        }
    
	
    }
  
        
        
   public function getJour()
	{
		
			$query = $base_helper->get('jours');
			if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
	}
	public function getMois()
	{
		
			$query = $base_helper->get('moiss');
            if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
	}
	
	public function getAnnee()
	{
		
			$query = $base_helper->get('annee');
                 if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
		
	}
	public function getNiv()
	{
			
	         $base_helper= $this->load->database('default', TRUE);
		     $base_helper->select('*');
			 $base_helper->where('TYPE','1');
			 $base_helper->order_by('ID_CODE','1');
		     $base_helper->from($this->tab_classes);
			 $query = $base_helper->get();
             if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
		
	}
	public function getWilaya()
	{
 			
	$base_helper= $this->load->database('default', TRUE);
		     $base_helper->select('*');
			  $base_helper->DISTINCT('W_WILAYA');
			  $base_helper->group_by('W_WILAYA');
			  $base_helper->order_by('W_CODEPOST',"ASC");
              $base_helper->from('wilaya');
             $query = $base_helper->get();
             if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
		
	}
	public function getDairaIDwilaya($wilayaVall= null)
	{
	if($wilayaVall) {
			
	$base_helper= $this->load->database('default', TRUE);
			$sql = "SELECT distinct W_DAIRA FROM wilaya WHERE W_WILAYA = ?";
			$query = $base_helper->query($sql, array($wilayaVall));
			if ($query ->num_rows() > 0 ) {
                foreach($query->result() as $row)
                    {
                   $data[] = $row;
                     }
     
				 return $data;
				  $query ->free_result();
				}
				  
		}	
 		
	}
	public function getCommunIDdaira($dairaVall= null)
	{
	if($dairaVall) {
			
	$base_helper= $this->load->database('default', TRUE);
			$sql = "SELECT W_COMMUNE,W_CODEPOST  FROM wilaya WHERE W_DAIRA = ?";
			$query = $base_helper->query($sql, array($dairaVall));
			if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
		}	
 		
	}
	public function getCategorie()
	{
		$base_helper= $this->load->database('default', TRUE);
		 $base_helper->select('*');
         $base_helper->from($this->tab_categorie);
         $base_helper->where('ID','7');
         $base_helper->or_where('ID','8');
		 $base_helper->or_where('ID','9');
		 $base_helper->or_where('ID','10');
         $query=$base_helper->get();	
		if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				  return $data;
				}
				 
				  $query ->free_result();
 		
	}
	public function getCategorieByID($id= null)
	{
		if($id != null){
		 $base_helper= $this->load->database('default', TRUE);
		 $base_helper->select('*');
         $base_helper->from($this->tab_categorie);
         $base_helper->where('ID',$id);
         $query=$base_helper->get();	
		 if ($query ->num_rows() > 0 ) {
                $row= $query->first_row();
				  return $row;
				}else{
					return false;
				}
		}else{
			return null;
		}
				 
				  $query ->free_result();
 		
	}

	
	public function getIcode($icodeval=null)
	{
	if($icodeval) {
			
	$base_helper= $this->load->database('default', TRUE);
			$sql = "SELECT * FROM places WHERE CODE = ?";
			$query = $base_helper->query($sql, array($icodeval));
	     	if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				}
				  return $data;
				  $query ->free_result();
		}	
 		
	}
	public function getCourByicode($icodeVAL=null,$CODE_ANNEXE)
	{
	
	   if($icodeVAL) {
	   $CODE_cwefd = $CODE_ANNEXE;
	  $b='preinscription'.$CODE_cwefd ;		
	  $base_ins= $this->load->database($b, TRUE);
	         $base_ins->from($this->tab_places);
             $base_ins->where('CODE',$icodeVAL);
           	 $query=$base_ins->get();	
		 	if ($query ->num_rows() > 0 ) {
                 $data = $query->result();
				   return $data;
				}else {
					return false;}
				
				  $query ->free_result();
		}	
 		
	}
	
	public function Callback_cours($icode,$cours,$CODE_ANNEXE)
	{
	if($icode!=null and $cours!=null){	
		   $CODE_cwefd = $CODE_ANNEXE;
	  $b='preinscription'.$CODE_cwefd ;		
	  $base_ins= $this->load->database($b, TRUE);
	         $base_ins->from($this->tab_places);
             $base_ins->where('CODE',$icode);
			 $query=$base_ins->get();	
		 	if ($query ->num_rows() > 0 ) {
               $row = $query->first_row();
	   		  $data=$row->$cours;
				      if($data > 0){
					     return true;
				      }else{
					    return false;
				      }
				}else {
					return false;
				}	
 		//$query ->free_result();
	}
	}
	public function getCommunCodepost($commune= null)
	{
	if($commune) {
			
	$base_helper= $this->load->database('default', TRUE);
			$sql = "SELECT * FROM wilaya WHERE W_COMMUNE = ?";
			$query = $base_helper->query($sql, array($commune));
			if ($query->num_rows() > 0) {
			  $row = $query->first_row();
	   		  $data=$row->W_CODEPOST;
               }
			   return $data;
			 $query ->free_result();   
		}	
 		
	}
	
	public function getWilayaByCodewilaya($codewilaya= null)
	{
	if($codewilaya) {
			
	$base_helper= $this->load->database('default', TRUE);
			$sql = "SELECT * FROM wilaya WHERE W_CODEPOST = ?";
			$query = $base_helper->query($sql, array($codewilaya));
			if ($query->num_rows() > 0) {
			  $row = $query->first_row();
	   		  $data=$row->W_WILAYA;
               }
			   return $data;
			 $query ->free_result();   
		}	
 		
	}
	
public function getNiveauByicode($icode)
	{
		$base_helper= $this->load->database('default', TRUE); 
		    $base_helper->select('ICODE,NIVEAU,FILIERE');
			$base_helper->from($this->tab_classes);
            $base_helper->where('ICODE',$icode);
        	$query=$base_helper->get();
            if ($query->num_rows() > 0) {
		   $row= $query->first_row();
		  	 return $row ;
              }else{
				return false;	
			}
		 $query ->free_result();    
	
		
	}
	public function getCwefd_Annaxe($wilaya= null)
	{
			
	$base_helper= $this->load->database('default', TRUE); 
		    $base_helper->select('*');
			$base_helper->from('centre_cwefd');
            $base_helper->where('NOM_WILAYA',$wilaya);
        	$query=$base_helper->get();
            if ($query->num_rows() > 0) {
		   $row= $query->first_row();
		  	 return $row ;
              }else{
				return false;	
			}
		 $query ->free_result();    
	
		}
		
		public function getFrai_inscription($cours= null,$courARA=null)
	{
		$base_helper= $this->load->database('default', TRUE);
		 $base_helper->select('*');
         $base_helper->from($this->tab_fraisinscription);
		 if($cours!=''){
         $base_helper->where('COUR_LAT',$cours);	
		 }
		 if($courARA!=''){
		  $base_helper->where('COUR_ARA',$courARA);	
		  }
         $query=$base_helper->get();	
		if ($query ->num_rows() > 0 ) {
                $row= $query->first_row();
				  return $row;
				}else{
					return false;
				}
				 
				  $query ->free_result();
 		
	}
	public function login($username = null, $password = null) 
	{
		if($username && $password) {
			$base_helper= $this->load->database('default', TRUE);
			$base_helper->select('*');
			$base_helper->from('users');
            $base_helper->where('username',$username);
			 $base_helper->where('password',$password);
        	 $query=$base_helper->get();
		
			if ($query->num_rows() > 0) {
			  $row = $query->first_row();
	   		  $data=$row->user_id;
			   return $data;
         		}
		     else {
			return false;
		}
		
	}
	}
	public function getAdr_DetIDwilaya($wilayaVall= null,$CODE_ANNEXE=null)
	{
	if($wilayaVall && $CODE_ANNEXE) {
			
	$CODE_cwefd = $CODE_ANNEXE;
	$b='preinscription'.$CODE_cwefd ;		
	$base_ins= $this->load->database($b, TRUE);
			$sql = "SELECT distinct ADR FROM ADR_DET WHERE WIL = ?";
			$query = $base_ins->query($sql, array($wilayaVall));
			if ($query ->num_rows() > 0 ) {
                foreach($query->result() as $row)
                    {
                   $data[] = $row;
                     }
     
				 return $data;
				  $query ->free_result();
				}
				  
		}	
 		
	}

}
?>