<?php

class M_fiche_engagement extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_fiche_engagements_attent()
    {
        $num_cwefd = isset($id) ? $id : $this->session->userdata('n_cwefd');
        $sql = "SELECT engagement.id_engagement, engagement.fknum_section ,engagement.fknum_chapitre,engagement.fknum_article,
        engagement.nouveau_montant ,engagement.ancian_montant ,engagement.montant_operation,engagement.n_fiche_engmt ,engagement.num_cachet,engagement.date_cachet  ,article.libelle_article,chapitre.libelle_chapitre
    from engagement
    LEFT JOIN article  ON engagement.fknum_article=article.num_article
    and
    engagement.fknum_chapitre= article.fknum_chapitre
    LEFT JOIN chapitre ON engagement.fknum_chapitre=chapitre.pknum_chapitre
    where engagement.num_cwefd = ? and engagement.is_attent = ?
    order by engagement.fknum_chapitre ";
        $res0 = $this->db->query($sql, array($num_cwefd, 1));
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
}