<?php

class M_engagement extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
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

    public function get_all_fournisseurs_by_col()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->order_by('id_fournisseur', 'ASC');
        $this->db->select('id_fournisseur,nom_prenom');
        $this->db->from('fournisseurs');
        $query = $this->db->get();
        $query = $query->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    public function get_type_doc_engmt()
    {
        $this->db->select('*');
        $this->db->from('type_doc_engmt');
        $query = $this->db->get();
        $query = $query->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    public function get_type_doc_engmt_by_id($id)
    {
        $this->db->select('*');
        $this->db->where('id_type_doc', $id);
        $this->db->from('type_doc_engmt');
        $query = $this->db->get();
        $query = $query->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    public function insert_engagement($data)
    {
        $res = $this->db->insert('preparer_engagement', $data);
        if ($res) {
            return true;
        } else {
            return false;
        }

    }
    public function remove_engagement($id_engagement)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_engmt_pre ', $id_engagement);
        $res = $this->db->delete('preparer_engagement');
        return $res;

    }
    public function get_all_engagements_attent()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "SELECT preparer_engagement.id_engmt_pre ,preparer_engagement.fknum_chapitre,preparer_engagement.fknum_article,
           preparer_engagement.montant_operation ,preparer_engagement.n_fiche_engmt,type_doc_engmt.type_doc , article.libelle_article,fournisseurs.nom_prenom
       from preparer_engagement
       LEFT JOIN article  ON preparer_engagement.fknum_article=article.num_article
       and
       preparer_engagement.fknum_chapitre= article.fknum_chapitre
       LEFT JOIN chapitre ON preparer_engagement.fknum_chapitre=chapitre.pknum_chapitre
       LEFT JOIN fournisseurs ON preparer_engagement.fk_id_fournisseurs=fournisseurs.id_fournisseur
       LEFT JOIN type_doc_engmt ON preparer_engagement.type_doc_engmt=type_doc_engmt.id_type_doc
       where preparer_engagement.num_cwefd = ?  and preparer_engagement.type_operation = ?
       order by preparer_engagement.fknum_chapitre
       ";
        $res0 = $this->db->query($sql, array($num_cwefd,  'd'));
        $nbr = $res0->num_rows();
        $res = $res0->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        return $data = array(
            'res' => $res,
            'nbr' => $nbr,
        );

    }
    public function get_engagement_preparer_by_id($id_engmt_pre)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "SELECT preparer_engagement.id_engmt_pre ,preparer_engagement.fknum_chapitre,preparer_engagement.fknum_article,
     preparer_engagement.type_doc_engmt, preparer_engagement.date_facture,preparer_engagement.montant_operation ,preparer_engagement.n_fiche_engmt,type_doc_engmt.type_doc , article.libelle_article,chapitre.libelle_chapitre,fournisseurs.nom_prenom
     ,preparer_engagement.fk_id_fournisseurs,preparer_engagement.fknum_section ,section.libelle_section
       from preparer_engagement
       LEFT JOIN article  ON preparer_engagement.fknum_article=article.num_article
       and
       preparer_engagement.fknum_chapitre= article.fknum_chapitre
       LEFT JOIN chapitre ON preparer_engagement.fknum_chapitre=chapitre.pknum_chapitre
       LEFT JOIN section ON preparer_engagement.fknum_section=section.pknum_section
       LEFT JOIN fournisseurs ON preparer_engagement.fk_id_fournisseurs=fournisseurs.id_fournisseur
       LEFT JOIN type_doc_engmt ON preparer_engagement.type_doc_engmt=type_doc_engmt.id_type_doc
       where preparer_engagement.num_cwefd = ? and preparer_engagement.id_engmt_pre= ?

       ";
        $res0 = $this->db->query($sql, array($num_cwefd, $id_engmt_pre));
        $res = $res0->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        return $res;

    }

    public function get_anciant_nontant($fknum_chapitre, $fknum_article, $annee_courant)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $array = array('num_cwefd' => $num_cwefd, 'fknum_chapitre' => $fknum_chapitre,
            'fknum_article' => $fknum_article, 'annee_courant' => $annee_courant);
        $this->db->where($array);
        $this->db->select_min('nouveau_montant');
        $this->db->from('engagement');
        $query = $this->db->get();
        $query = $query->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $query;
    }
    public function get_max_num_fiche_engmt($fknum_chapitre, $fknum_article, $annee_courant)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "select nouveau_montant ,id_engagement ,n_fiche_engmt
        from engagement
        where num_cwefd =? and fknum_chapitre = ? and fknum_article = ? and annee_courant = ?
        ORDER BY n_fiche_engmt DESC
        LIMIT 1
        ";
        $query = $this->db->query($sql, array($num_cwefd, $fknum_chapitre, $fknum_article, $annee_courant));

        $res = $query->row();
        return $res;
    }
    public function get_min_n_m()
    { //get min nouveau montant
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "select nouveau_montant ,id_engagement  ,ancian_montant
        from engagement
        where num_cwefd =? and n_fiche_engmt = ? and type_operation = ?
        ORDER BY nouveau_montant ASC
        LIMIT 1
        ";
        $query = $this->db->query($sql, array($num_cwefd, 0, 'd'));

        $res = $query->row();
        return $res;
    }
    public function get_n_m($id_engagement)
    { //get min nouveau montant
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_engagement', $id_engagement);
        $this->db->select('nouveau_montant,montant_operation');
        $this->db->from('engagement');
        $query = $this->db->get();
        $res = $query->row();
        return $res;
    }
    public function insert_engmt($data)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');

        $res = $this->db->insert('engagement', array(
            'num_cwefd' => $num_cwefd,
            'annee_courant' => $data['annee_courant'],
            'fknum_section' => $data['fknum_section'],
            'fknum_chapitre' => $data['fknum_chapitre'],
            'fknum_article' => $data['fknum_article'],
            'n_fiche_engmt' => $data['n_fiche_engmt'],
            'montant_operation' => $data['montant_operation'],
            'ancian_montant' => $data['ancian_montant'],
            'nouveau_montant' => $data['nouveau_montant'],
        ));
        if ($res) {
            return true;
        } else {
            return false;
        }

    }
    public function update_engagement_by_id($id_engagement, $dat)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_engmt_pre', $id_engagement);
        $this->db->update('preparer_engagement', $dat);

    }

}
