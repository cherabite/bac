<?php

class M_bac_stat extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
function stat_total($code_etab){

    $sql=   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,SEXE AS HOME ,COUNT(ENPR) as SUM FROM liste_bac1 WHERE ICODE != '404' and SEXE='ذكر' and id_deleted = 0 and code_etab='$code_etab'   GROUP BY ICODE ";
    $res = $this->db->query($sql);
    if ($res) {
      $data['home']=$res->result();
    } 
    $sql=   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE ,SEXE AS FEMME,COUNT(ENPR) as SUM FROM liste_bac1 WHERE ICODE != '404' and SEXE='أنثى' and id_deleted = 0 and code_etab='$code_etab'    GROUP BY ICODE ";
    $res = $this->db->query($sql);
    if ($res) {
      $data['femme']=$res->result();
    } 

    $sql=   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE ,COUNT(ENPR) as SUM FROM liste_bac1 WHERE ICODE != '404' and id_deleted = 0 and code_etab='$code_etab'   GROUP BY ICODE ";
    $res = $this->db->query($sql);
    if ($res) {
      $data['sum']=$res->result();
    } 
 $sql=   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,SEXE AS INAPTE ,COUNT(ENPR) as SUM FROM liste_bac1 WHERE ICODE != '404' and id_deleted = 0 and sport = 0  and code_etab='$code_etab'   GROUP BY ICODE ";
$res = $this->db->query($sql);
if ($res) {
  $data['inapte']=$res->result();
} 
$sql=   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,SEXE AS APTE ,COUNT(ENPR) as SUM FROM liste_bac1 WHERE ICODE != '404' and id_deleted = 0 and sport = 1 and code_etab='$code_etab'   GROUP BY ICODE ";
$res = $this->db->query($sql);
if ($res) {
  $data['apte']=$res->result();
} 
return $data;
}

}