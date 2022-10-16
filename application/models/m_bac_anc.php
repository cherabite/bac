<?php

class M_bac extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function update_new_year($id_vag)
	{
		$sql = "UPDATE tbl_vag
SET active = 0 ";
		$sql1 = "UPDATE tbl_vag
SET active = 1
WHERE id_vag= '$id_vag'";
		$this->db->query($sql);
		$this->db->query($sql1);
	}

	function select_vag_active()
	{
		$sql = "SELECT * from tbl_vag where active =1 ";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		} else {
			return false;
		}
	}
	function get_count_filieres()
	{

		$sql = " SELECT ICODE AS ICODE,NIVEAU AS NIVEAU ,FILIERE AS FILIERE ,COUNT(ENPR) as SUM
               FROM liste_bac1
			   WHERE ICODE != '404'  and id_deleted = 0
                GROUP BY ICODE";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->result();
		} else {
			return false;
		}
	}
	function get_count_bac()
	{
		$sql = " SELECT COUNT(ENPR) as SUM
               FROM liste_bac1
                where ICODE !='404' and id_deleted = 0 ";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		} else {
			return false;
		}
	}
	function get_count_moyen()
	{
		$sql = " SELECT COUNT(ENPR) as SUM
               FROM liste_bac1
                where ICODE='404'  and id_deleted = 0";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		} else {
			return false;
		}
	}
	function add_condidat($data)
	{
		$this->db->insert('tbl_bac', $data);
		$id = $this->db->insert_id();

		if ($id) {
			return $id;
		} else {
			return false;
		}
	}
	function select_by_id($id)
	{

		$sql = " SELECT *
               FROM liste_bac1
                where id='$id'";
		$res = $this->db->query($sql);
		if ($res) {
			return $res->row();
		} else {
			return false;
		}
	}
	function update_condidat($data, $id_condidat)
	{
		$this->db->where('id', $id_condidat);
		$this->db->update('tbl_bac', $data);
	}
	function remove_condidat($id)
	{
		$this->db->where('id', $id);
		$this->db->set('id_deleted', 1, false);
		$this->db->update('tbl_bac');
	}
	function chech_npr($npr)
	{
		$sql = " SELECT id
               FROM tbl_bac
                where npr='$npr' and id_deleted = 0 ";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
	function chech_id_dossier($id_dossier)
	{
		$sql = " SELECT id_dossier
               FROM tbl_bac
                where id_dossier='$id_dossier' and id_deleted = 0 ";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 1) {
			return true;
		} else {
			return false;
		}
	}
	function unique_npr($npr)
	{
		$sql = " SELECT id
               FROM tbl_bac
                where npr='$npr' and id_deleted = 0 ";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function unique_id_dossier($id_dossier)
	{
		$sql = " SELECT id_dossier
               FROM tbl_bac
                where id_dossier='$id_dossier' and id_deleted = 0 ";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function get_liste_by_filter($icode)
	{
		if ($icode == 111) {
			$sql = " SELECT *
               FROM liste_bac1
			   where  id_deleted = 0
			   order by id ASC
                ";
		} else {
			$sql = " SELECT *
               FROM liste_bac1
			   where ICODE='$icode' and id_deleted = 0 
			   order by id ASC
                ";
		}
		$res = $this->db->query($sql);
		if ($res) {
			return $res->result();
		} else {
			return false;
		}
	}
}