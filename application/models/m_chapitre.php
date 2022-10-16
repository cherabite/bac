<?php

class M_chapitre extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_chapitre()
    {
        $this->db->order_by('ch.id_chapitre', 'ASC');
        $this->db->select('s.*');
        $this->db->select('ch.id_chapitre,ch.pknum_chapitre,ch.libelle_chapitre');
        $this->db->from('section s');
        $this->db->join('chapitre ch', 'ch.fknum_section  = s.pknum_section ', 'LEFT');

        $query = $this->db->get();
        $query = $query->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;

    }
    public function get_all_section()
    {
        $this->db->select('*');
        $this->db->from('section');
        $this->db->order_by('pknum_section', 'ASC');
        $query = $this->db->get();
        $query = $query->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    public function get_chapitre($id_chapitre)
    {
        $this->db->order_by('ch.id_chapitre', 'ASC');
        $this->db->select('s.*');
        $this->db->select('ch.id_chapitre,ch.pknum_chapitre,ch.libelle_chapitre');
        $this->db->from('section s');
        $this->db->join('chapitre ch', 'ch.fknum_section  = s.pknum_section ');
        $this->db->where('ch.id_chapitre', $id_chapitre);
        $query = $this->db->get();
        $query = $query->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }

    public function update_chapitre($data)
    {
        $this->db->where('id_chapitre', $data['id_chapitre']);
        $res = $this->db->update('chapitre', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }

    public function add_chapitre($data)
    {

        $res = $this->db->insert('chapitre', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }

    public function remove_chapitre($id_chapitre)
    {
        $this->db->where('id_chapitre', $id_chapitre);
        $res = $this->db->delete('chapitre');
        return $res;
    }
/************************ ARTICLES */
    /* id_article
    fknum_chapitre
    num_article
    libelle_article
    paragraphe
    privat_article */
    public function get_all_article()
    {
        $sql = "SELECT section.pknum_section ,section.libelle_section,chapitre.id_chapitre,chapitre.pknum_chapitre,chapitre.libelle_chapitre,
        article.id_article,article.num_article,article.libelle_article,article.paragraphe
        from article
        LEFT JOIN chapitre ON article.fknum_chapitre=chapitre.pknum_chapitre
        LEFT JOIN section ON chapitre.fknum_section=section.pknum_section

        ";
        $res0 = $this->db->query($sql);
        $res = $res0->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $res;

    }

    public function get_article($id_article)
    {
        $sql = "SELECT section.pknum_section ,section.libelle_section,chapitre.id_chapitre,chapitre.pknum_chapitre,chapitre.libelle_chapitre,
    article.id_article,article.num_article,article.libelle_article,article.paragraphe
    from article
    LEFT JOIN chapitre ON article.fknum_chapitre=chapitre.pknum_chapitre
    LEFT JOIN section ON chapitre.fknum_section=section.pknum_section
    where article.id_article = ?

    ";
        $res0 = $this->db->query($sql, $id_article);
        $res = $res0->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $res;

    }

    public function update_article($data)
    {

        $this->db->where('id_article', $data['id_article']);
        $res = $this->db->update('article', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }

    public function add_article($data)
    {

        $res = $this->db->insert('article', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }

    public function remove_article($id_article)
    {
        $this->db->where('id_article', $id_article);
        $res = $this->db->delete('article');
        return $res;
    }

/******************************** */
    public function getchapitre_ajax($num_section = null)
    {
        if ($num_section) {

            $sql = "SELECT * FROM chapitre WHERE fknum_section = ?";
            $res = $this->db->query($sql, array($num_section));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $row) {
                    $data[] = $row;
                }

                return $data;
                $res->free_result();
            }

        }

    }

    public function get_article_ajax($num_chapitre = null)
    {
        if ($num_chapitre) {

            $sql = "SELECT num_article,libelle_article FROM article WHERE fknum_chapitre = ?";
            $res = $this->db->query($sql, array($num_chapitre));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $row) {
                    $data[] = $row;
                }

                return $data;
                $res->free_result();
            }

        }

    }
    public function chech_article($article, $chapitre)
    {

        $sql = "SELECT id_article FROM article WHERE fknum_chapitre = ? and num_article = ?";
        $res = $this->db->query($sql, array($chapitre, $article));
        if ($res->num_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function check_update_article($article, $chapitre)
    {

        $sql = "SELECT id_article FROM article WHERE fknum_chapitre = ? and num_article = ?";
        $res = $this->db->query($sql, array($chapitre, $article));
        if ($res->num_rows() > 1) {
            return true;
        } else {
            return false;
        }

    }

}