<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Valid_model extends CI_Model {
	/*  private $table_inseleve1			= 'inseleve1';
      private $table_eleve			    = 'eleve';
      private $table_inscription	    = 'inscription';	*/  
	   private $table_inseleve1			= 'INSELEVE1';
       private $table_eleve			    = 'ELEVE';
       private $table_inscription	    = 'INSCRIPTION';	
	   function __construct() {
       parent::__construct();
       $this->load->database();
    }
	
		public function enpr_check($enpr){
			$n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$b='preinscription'.$n_cwefd ;		
	        $base_preins= $this->load->database($b, TRUE);
		    $array=array('ENPR'=>$enpr)	;	
            $base_preins->select('*');			
      	    $base_preins->where($array);
            $query = $base_preins->get($this->table_inseleve1);
	
	              if ($query->num_rows() > 0) {
					   return $query->row() ;
                      }else{
			        	return NULL;	
		              }
         return $query->result();
    
	    }
		
		public function check_Eleve_By_Nom_Prenom_Dns_Presume($nom,$prenom,$dns,$presume){
			
			$n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$b='scolarite'.$n_cwefd ;		
	        $base_scol= $this->load->database($b, TRUE);
		    $array=array('NOM'    => $nom ,
			             'PRENOM' => $prenom,
                         'DNS'    => $dns,
                         'PRESUME'=> $presume);						 
            $base_scol->select('ANNEXE,ANNEEINS,NSEQ,NOM,PRENOM,DNS,LNS,PRESUME,SEXE,NOMLAT,PRENOMLAT');			
      	    $base_scol->where($array);
            $query = $base_scol->get($this->table_eleve);
	
	              if ($query->num_rows() > 0) {
					   return $query->row() ;
                      }else{
			        	return NULL;	
		              }
         return $query->result();
		}
		
			public function get_Eleve_from_Eleve($annexe,$anneeins,$nseq){
			
			$n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$b='scolarite'.$n_cwefd ;		
	        $base_scol= $this->load->database($b, TRUE);
		     $array=array( 'ANNEXE'    => $annexe ,
			                 'ANNEEINS'  => $anneeins,
                             'NSEQ'      => $nseq);						 
            $base_scol->select('ANNEXE,ANNEEINS,NSEQ,NOM,PRENOM,DNS,LNS,PRESUME,SEXE,NOMLAT,PRENOMLAT');			
      	    $base_scol->where($array);
            $query = $base_scol->get($this->table_eleve);
	
	              if ($query->num_rows() > 0) {
					   return $query->row() ;
                      }else{
			        	return NULL;	
		              }
         return $query->result();
		}
			public function get_Eleve_from_Inscription($annexe,$anneeins,$nseq){
		
		       $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd');
			   $b='scolarite'.$n_cwefd ;		
	           $base_scol= $this->load->database($b, TRUE);
               $array=array( 'IANNEXE'    => $annexe ,
			                 'IANNEEINS'  => $anneeins,
                             'INSEQ'      => $nseq);			   
		       $base_scol->select('ICODE,IANNEE,MENTION'); 
               $base_scol->where($array) ;
			   $base_scol->order_by('IANNEE','desc');
               $query = $base_scol->get($this->table_inscription);
	           if ($query->num_rows() > 0) {
		       $row= $query->first_row();
		  	   return $row ;
                }else{
				return NULL;	
		 	}
	   $query ->free_result();
	}
		 
		public function get_Max_Ordec_By_Icode($icode){ 
		   
		    $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$b='preinscription'.$n_cwefd ;		
	        $base_preins= $this->load->database($b, TRUE);
		    $array=array('ICODE'=>$icode)	;	
            $base_preins->select_max('ORDREC');			
      	    $base_preins->where($array);
            $query = $base_preins->get($this->table_inseleve1);
	               if ($query->num_rows() > 0) {
					   return $query->row() ;
                      }else{
			        	return NULL;	
		              }
	             // return  $MAX_ORDREC;
				  
         return $query->result();
		}
		
		public function get_Max_NSEQ(){ 
		    $statut='جديد';
		    $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$b='preinscription'.$n_cwefd ;		
	        $base_preins= $this->load->database($b, TRUE);	
			$array=array('STATUT' => $statut)	;
            $base_preins->select_max('NSEQ');	
      	    $base_preins->where($array);			
      	    $query = $base_preins->get($this->table_inseleve1);
	               if ($query->num_rows() > 0) {
					   return $query->row() ;
                      }else{
			        	return NULL;	
		              }
	            				  
         return $query->result();
		}
		 
		 
		public function valid_Nouv_Eleve($data){
		    $returnn='';
	     	$this->load->helper('date'); 
		    $n_cwefd = isset($n_cwefd) ? $n_cwefd : $this->session->userdata('n_cwefd'); 
			$DATEINS=date("Y-m-d H:i:s");
			/*************************************/
			if(!is_null($eleve=$this->enpr_check( $data['ENPR']))){
					 if($eleve->VALID== 0){
										   $ordrec=$this->get_Max_Ordec_By_Icode($data['ICODE'])->ORDREC;  
							$array=array( 
										  'NSEQ'      =>   sprintf("%05d", $this->get_Max_NSEQ()->NSEQ + 1),
										  'ORDREC'    =>  $this->get_Max_Ordec_By_Icode($data['ICODE'])->ORDREC + 1 ,
										  'VALID'     =>  '1',
										  'DATEINS'   =>  $DATEINS,
										  'PRESUME'   =>  $data['PRESUME'],
										  'NOM'       =>  $data['NOM'],
										  'PRENOM'    =>  $data['PRENOM'],
										  'NOMLAT'    =>  $data['NOMLAT'], 
										  'PRENOMLAT' =>  $data['PRENOMLAT'],
										  'SEXE'      =>  $data['SEXE'], 
										  'ICODE'     =>  $data['ICODE'], 
										  'NOM_SCOL'  =>  $data['NOM_SCOL'], 
										 'PRENOM_SCOL'=>  $data['PRENOM_SCOL'] )	;
							$b='preinscription'.$n_cwefd ;		
							$base_preins= $this->load->database($b, TRUE);
							
							$base_preins->where('ENPR',$data['ENPR']);
							$base_preins->update($this->table_inseleve1,$array);
							if ($base_preins->affected_rows() >= '1') {
								$returnn='success';
					             return $returnn;
								}else{
								$returnn='fail';
					             return $returnn;
								}
					  }else{
                      $returnn='valid';
					   return $returnn;
					   }
			}else{
				$returnn='not_found';
			    return $returnn;
			}
			/*************************************/
			
		}
		
		public function get_IcodePass($icode,$mention){	
			$data=array();
			$base_helper= $this->load->database('default', TRUE);
			$base_helper->select('*');
			$base_helper->from('passage');
			$base_helper->where("ICODE",$icode);
			$base_helper->where('MENTION',$mention);
			$query=$base_helper->get();
			if($query->num_rows()>0){
				foreach($query->result_array() as $row){
					$Q=$base_helper->query("select * from classes where ICODE=".$row['PASS_ICODE']." order by ICODE limit 1");
					if($Q->num_rows()>0){
						$row1 = $Q->first_row();
						$ICODE=$row1->ICODE;
						$NIVEAU=$row1->NIVEAU;
						$FILIERE=$row1->FILIERE;
					}
				//	$Q->free_result();
					$data[]=array(
					'icode' => $ICODE,
					'niveau' => $NIVEAU,
					'filiere' => $FILIERE
					);
				}
				return $data;
				$query->free_result();
				
			}    
			}
		
}