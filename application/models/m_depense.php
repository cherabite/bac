<?php

class M_depense extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function create_new_year($annee_courant)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $articles = $this->get_all_article();
        foreach ($articles as $article) {
            $this->db->insert('engagement', array('num_cwefd' => $num_cwefd,
                'fknum_section ' => $article->pknum_section,
                'fknum_chapitre' => $article->pknum_chapitre,
                'fknum_article' => $article->num_article,
                'annee_courant' => $annee_courant,
                'is_attent' => 0,

            ));

        }

        return;
    }

    public function check_archive($n_y)
    {

        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->select('id_engagement');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('annee_courant', $n_y);
        $query = $this->db->get('engagement_archive');
        $res = $query->num_rows();

        if ($res > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function archive_bd($n_y)
    {

        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        if ($this->check_archive($n_y)) {
            $this->db->where('num_cwefd', $num_cwefd);
            $this->db->where('annee_courant ', $n_y);
            $this->db->delete('engagement_archive');
        }

        $this->db->select('*');
        $this->db->where('num_cwefd', $num_cwefd);
        $result_set = $this->db->get('engagement')->result();
        if (count($result_set) > 0) {
            $this->db->insert_batch('engagement_archive', $result_set);
        }
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->delete('engagement');
    }

    public function get_all_depenses()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "SELECT engagement.id_engagement, engagement.fknum_section ,engagement.fknum_chapitre,engagement.fknum_article,
        engagement.nouveau_montant , article.libelle_article,chapitre.libelle_chapitre
    from engagement
    LEFT JOIN article  ON engagement.fknum_article=article.num_article
    and
    engagement.fknum_chapitre= article.fknum_chapitre
    LEFT JOIN chapitre ON engagement.fknum_chapitre=chapitre.pknum_chapitre
    where engagement.num_cwefd = ? and engagement.n_fiche_engmt < ?
    ";
        $res0 = $this->db->query($sql, array($num_cwefd, 2));
        $res = $res0->result();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $res;

    }

    public function update_depense($data)
    {
        // $annee_courant = $this->config->item('new_year');
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('id_engagement', $data['id_engagement']);
        //  $this->db->where('annee_courant ', $annee_courant );
        $res = $this->db->update('engagement', $data);
        return;
    }

    public function get_sum_depenses()
    {
        // $annee_courant = $this->config->item('new_year');
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $this->db->where('num_cwefd', $num_cwefd);
        $this->db->where('is_attent', 0);
        //  $this->db->where('annee_courant ', $annee_courant );
        $this->db->select_sum('nouveau_montant');
        $query = $this->db->get('engagement');
        $res = $query->row();
        return $res;
    }

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
    public function get_depenses_by_id($id_engagement)
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "SELECT  section.pknum_section ,section.libelle_section,engagement.id_engagement ,
     engagement.fknum_chapitre,engagement.nouveau_montant ,engagement.annee_courant,
    article.libelle_article,article.num_article ,chapitre.libelle_chapitre
    from engagement
    LEFT JOIN article  ON engagement.fknum_article=article.num_article
    and
    engagement.fknum_chapitre= article.fknum_chapitre
    LEFT JOIN chapitre ON engagement.fknum_chapitre=chapitre.pknum_chapitre
    LEFT JOIN section ON engagement.fknum_section=section.pknum_section
    where engagement.num_cwefd = ? and engagement.id_engagement = ?
    ";
        $res0 = $this->db->query($sql, array($num_cwefd, $id_engagement));
        $res = $res0->row();
        $db_error = $this->db->error();
        if (!empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $res;

    }

}