<?php

if (isset($validation_errors)) {
    $fk_id_fournisseurs = set_value('fk_id_fournisseurs');
    $fknum_section = set_value('fknum_section');
    $fknum_chapitre = set_value('fknum_chapitre');
    $fknum_article = set_value('fknum_article');
    $num_engmt = set_value('n_fiche_engmt');
    $type_doc_engmt = set_value('type_doc_engmt');
    $date_facture = set_value('date_facture');
    $montant_operation = set_value('montant_operation');
   
} else {
    $fk_id_fournisseurs = $engagement->fk_id_fournisseurs;
    $fknum_section = $engagement->fknum_section;
    $fknum_chapitre = $engagement->fknum_chapitre;
    $fknum_article = $engagement->fknum_article;
    $num_engmt = $engagement->n_fiche_engmt;
    $type_doc_engmt = $engagement->type_doc_engmt;

    $date_facture = $engagement->date_facture;
    $montant_operation = $engagement->montant_operation;
	 

}

?>
<div id="refresh">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#"><?php echo $grand_title ?></a></li>
                            <li class="breadcrumb-item active"><?php echo $page_title ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <form id="form_add_f" method="post" action="<?php echo base_url('c_engagement/update_engagement') ?>">

                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-edit " style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> تعديل التزام </strong> </h4>
                                </div>

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <?php if ($this->session->flashdata('msg') != '') {
    echo $this->session->flashdata('msg');
}
?>


                                        <?php if (validation_errors()) {
    echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';

    echo '<div ><ol>';

    // echo validation_errors('<li>', '</li>');
    echo validation_errors('<li><span class="label label-danger">', '</span></li>');
    echo '</ol></div>';
    echo '</div>';
}
if (isset($message)) {
    echo '<div  class="alert alert-success alert-dismissible" id="message">';
    echo $message;
    echo '</div>';}
?>
 <input type="hidden" name="id_engmt_pre"
                                        value="<?php echo $engagement->id_engmt_pre; ?>">
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الفصل
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="PKnum_section" id="PKnum_section">
                                                    <option value=" <?php echo $fknum_section ?>"><?php echo $section ?>
                                                    </option>
                                                    <?php
if ($sections) {
    foreach ($sections as $section):
    ?>
                                                    <option value="<?php echo $section->pknum_section ?>">
                                                        <?php echo $section->pknum_section . '   ' . $section->libelle_section ?>
                                                    </option>
                                                    <?php
endforeach
    ?>
                                                    <?php
} else {
    ?>
                                                    <option value="">غ موجود</option>
                                                    <?php
}
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label">
                                                البـــاب
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="PKnum_chapitre" id="PKnum_chapitre">
                                                    <option value="<?php echo $fknum_chapitre ?>">
                                                        <?php echo $chapitre ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> المـــادة
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="PKnum_article" id="PKnum_article">
                                                    <option value="<?php echo $fknum_article ?>"><?php echo $article ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> المستفيد
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="id_fournisseur">
                                                    <option value="<?php echo $fk_id_fournisseurs ?>">
                                                        <?php echo $nom_fournissuer ?>
                                                    </option>
                                                    <?php
if ($fournisseurs) {
    foreach ($fournisseurs as $fournisseur):
    ?>
                                                    <option value="<?php echo $fournisseur->id_fournisseur ?>">
                                                        <?php echo $fournisseur->nom_prenom ?>
                                                    </option>
                                                    <?php
endforeach
    ?>
                                                    <?php
} else {
    ?>
                                                    <option value="">غ موجود</option>
                                                    <?php
}
?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> وثيقة
                                                الإلتزام
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="type_doc_engmt">

                                                    <option value=" <?php echo $type_doc_engmt ?>">
                                                        <?php echo $type_doc ?></option>
                                                    </option>
                                                    <?php
if ($type_docs) {
    foreach ($type_docs as $type_doc):
    ?>
                                                    <option value="<?php echo $type_doc->id_type_doc ?>">
                                                        <?php echo $type_doc->type_doc ?>
                                                    </option>
                                                    <?php
endforeach
    ?>
                                                    <?php
} else {
    ?>
                                                    <option value="">غ موجود</option>
                                                    <?php
}
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label">رقم الوثيقة
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="<?php echo $num_engmt ?>"
                                                    id="num_engmt" name="num_engmt">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label">
                                                بتاريخ
                                                :</label>
                                            <div class="col-10">
                                                <input id="date_facture" class="pick_dat   inputligne" type="date"
                                                    name="date_facture" value="<?php echo $date_facture ?>"
                                                    placeholder="" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> مبلغ الإلتزام
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo $montant_operation ?>" id="montant_operation"
                                                    name="montant_operation">
                                            </div>
                                        </div>
                                        <div id="m_rest"></div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- .row -->


                        </div>

                        <div class="shdw-p card-footer clearfix">
                            <div class="float-left">

                                <div>
                                    <button type="submit" class=" btn btn3d btn-primary" id="valid">&nbsp; موافق <i
                                            class="fa fa-check"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>





            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div> <!-- /.content -->
</div>
</div>