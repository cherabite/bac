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

                <form id="form_add_f" method="post" action="<?php echo base_url('c_engagement/save_engagement') ?>">

                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-plus " style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> إلتزام بالنفقة </strong> </h4>
                                </div>

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <?php $error_msg = $this->session->flashdata('msg');?>
                                        <?php if (isset($error_msg)): ?>
                                        <div class="alert alert-success delete_msg pull" style="width: 100%"> <i
                                                class="fa fa-times"></i>
                                            <?php echo $error_msg; ?> &nbsp;
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span> </button>
                                        </div>
                                        <?php endif?>

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

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الفصل
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="PKnum_section" id="PKnum_section">
                                                    <option value="">******** الفصل ********
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

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> المـــادة
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="PKnum_article" id="PKnum_article">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> المستفيد
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="id_fournisseur">
                                                    <option value="">
                                                        **************** المستفيد ******************
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
                                                    <option value="">

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
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('num_engmt') ?>" id="num_engmt"
                                                    name="num_engmt">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label">
                                                بتاريخ
                                                :</label>
                                            <div class="col-10">
                                                <input id="date_facture" class="pick_dat   inputligne" type="date"
                                                    name="date_facture" value="<?php echo set_value('date_facture'); ?>"
                                                    placeholder="" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> مبلغ الإلتزام
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('montant_operation') ?>"
                                                    id="montant_operation" name="montant_operation">
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
</div>