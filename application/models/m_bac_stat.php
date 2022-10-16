<?php

class M_bac_stat extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	function stat_total($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		,COUNT( IF( ICODE =  '312', ENPR, NULL ) ) AS a,COUNT( IF( ICODE =  '313', ENPR, NULL ) ) AS b,COUNT( IF( ICODE =  '314', ENPR, NULL ) ) AS c,COUNT( IF( ICODE =  '315', ENPR, NULL ) ) AS d,COUNT( IF( ICODE =  '316', ENPR, NULL ) ) AS e,COUNT( IF( ICODE =  '318', ENPR, NULL ) ) AS f,COUNT( IF( ICODE =  '337', ENPR, NULL ) ) AS g
							,COUNT( IF( ICODE =  '351', ENPR, NULL ) ) AS h,COUNT( IF( ICODE =  '353', ENPR, NULL ) ) AS i,COUNT( IF( ICODE =  '355', ENPR, NULL ) ) AS j,COUNT( IF( ICODE =  '357', ENPR, NULL ) ) AS k
		
		
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag'
		GROUP BY ICODE ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
			,COUNT( IF( ICODE =  '312', ENPR, NULL ) ) AS a,COUNT( IF( ICODE =  '313', ENPR, NULL ) ) AS b,COUNT( IF( ICODE =  '314', ENPR, NULL ) ) AS c,COUNT( IF( ICODE =  '315', ENPR, NULL ) ) AS d,COUNT( IF( ICODE =  '316', ENPR, NULL ) ) AS e,COUNT( IF( ICODE =  '318', ENPR, NULL ) ) AS f,COUNT( IF( ICODE =  '337', ENPR, NULL ) ) AS g
								,COUNT( IF( ICODE =  '351', ENPR, NULL ) ) AS h,COUNT( IF( ICODE =  '353', ENPR, NULL ) ) AS i,COUNT( IF( ICODE =  '355', ENPR, NULL ) ) AS j,COUNT( IF( ICODE =  '357', ENPR, NULL ) ) AS k
			
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 
		GROUP BY ICODE ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
			,COUNT( IF( ICODE =  '312', ENPR, NULL ) ) AS a,COUNT( IF( ICODE =  '313', ENPR, NULL ) ) AS b,COUNT( IF( ICODE =  '314', ENPR, NULL ) ) AS c,COUNT( IF( ICODE =  '315', ENPR, NULL ) ) AS d,COUNT( IF( ICODE =  '316', ENPR, NULL ) ) AS e,COUNT( IF( ICODE =  '318', ENPR, NULL ) ) AS f,COUNT( IF( ICODE =  '337', ENPR, NULL ) ) AS g
								,COUNT( IF( ICODE =  '351', ENPR, NULL ) ) AS h,COUNT( IF( ICODE =  '353', ENPR, NULL ) ) AS i,COUNT( IF( ICODE =  '355', ENPR, NULL ) ) AS j,COUNT( IF( ICODE =  '357', ENPR, NULL ) ) AS k
			
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0  and id_vag='$id_vag'
		GROUP BY ICODE ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
			,COUNT( IF( ICODE =  '312', ENPR, NULL ) ) AS a,COUNT( IF( ICODE =  '313', ENPR, NULL ) ) AS b,COUNT( IF( ICODE =  '314', ENPR, NULL ) ) AS c,COUNT( IF( ICODE =  '315', ENPR, NULL ) ) AS d,COUNT( IF( ICODE =  '316', ENPR, NULL ) ) AS e,COUNT( IF( ICODE =  '318', ENPR, NULL ) ) AS f,COUNT( IF( ICODE =  '337', ENPR, NULL ) ) AS g
								,COUNT( IF( ICODE =  '351', ENPR, NULL ) ) AS h,COUNT( IF( ICODE =  '353', ENPR, NULL ) ) AS i,COUNT( IF( ICODE =  '355', ENPR, NULL ) ) AS j,COUNT( IF( ICODE =  '357', ENPR, NULL ) ) AS k
			
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' 
		GROUP BY ICODE ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			//return $res->result_array();
			return $res->result();
		}
	}
	function stat_total_t($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag'
		 ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2, ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 
		 ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0  and id_vag='$id_vag'
		 ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' 
	 ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		}
	}
	function stat_total_m($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag'
		 ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2, ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 
		 ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0  and id_vag='$id_vag'
		 ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 and code_etab='$code_etab' 
	 ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		}
	}
	function stat_total_4()
	{
	
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F,COUNT(IF( sport = 1,ENPR , NULL)) as apte,COUNT(IF( categorie = 3,ENPR , NULL)) as ayes ,COUNT(IF( categorie = 1,ENPR , NULL)) as endicap 
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 
		 ";
	
		


		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		}
	}
	/************************************************** */
	function stat_total_s($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag' and sport=1
		GROUP BY ICODE 
		 ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =
				"SELECT nom_secteur,code_secteur,expr2, ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and sport=1
		GROUP BY ICODE 
		 ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0  and id_vag='$id_vag' and sport=1
		GROUP BY ICODE 
		 ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and sport=1
		GROUP BY ICODE 
	 ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			return $res->result();
		}
	}
	function stat_total_t_s($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag' and sport=1
		 ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2, ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and sport=1
		 ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0  and id_vag='$id_vag' and sport=1
		 ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE != '404'  and id_deleted = 0 and code_etab='$code_etab' and sport=1
	 ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		}
	}



	function stat_total_m_s($code_etab, $id_vag)
	{
		if ($code_etab != 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 and code_etab='$code_etab' and id_vag='$id_vag' and sport=1
		 ";
		}
		if ($code_etab == 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2, ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 and sport=1
		 ";
		}
		if ($code_etab == 111 and $id_vag != 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0  and id_vag='$id_vag' and sport=1
		 ";
		}
		if ($code_etab != 111 and $id_vag == 111) {
			$sql =   "SELECT nom_secteur,code_secteur,expr2,ICODE AS ICODE,COUNT(ENPR) as SUM ,COUNT(IF( SEXE =  'ذكر',ENPR , NULL)) as H,COUNT(IF( SEXE =  'أنثى',ENPR , NULL)) as F
		FROM liste_bac1 
		WHERE ICODE = '404'  and id_deleted = 0 and code_etab='$code_etab' and sport=1
	 ";
		}


		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		}
	}
}