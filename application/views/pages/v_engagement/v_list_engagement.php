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
            <div class="row">
                <ul class="nav nav-tabs">
                    <li><a class="btn" href="<?php echo base_url('c_engagement/create_engagement') ?>"> <span
                                class="fa fa-plus fa-lg pull-right" style="color:#d9534f"></span>إلتزام بالنفقة </a>
                    </li>

                    <li><a class="btn" href="<?php echo base_url('c_engagement/create_engagement_initial') ?>"> <span
                                class="fa fa-users fa-lg pull-right" style="color:#d9534f"></span> إلتزام بالميزانية
                            الأولية</a></li>
                    <li><a class="btn" type="submit" id="new_cart" href="<?php echo base_url('') ?>"> <span
                                class="fa fa-medkit fa-lg pull-right" style="color:#d9534f"></span> بطاقة إلتزام </a>
                    </li>


                </ul>
            </div>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">

        <?php
if ($this->session->flashdata('msg') != '') {
    echo $this->session->flashdata('msg');
}
?>

    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="dropdown-divider"></div>
            <div class=" col-md-12">
                <h5 class="text-center " style="color: #007bff;">
                    &nbsp;<strong> الإلـتزامـات قيد الإنتظار
                    </strong><span class=" badge bg-warning"
                        style="margin-right:15px"><?php echo $nbr_engmt_attent ?></span> </h5>

            </div>
        </div>
        <form method="post" id="form_new_cart" action="<?php echo base_url('c_engagement/create_fiche_engmt') ?>">
            <div class="table-responsive">

                <div class="table-responsive  row">
                    <table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
                        <thead class="thead table-dark">
                            <tr>
                                <!-- <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th> -->
                                <!-- <th></th> -->

                                <th> بطاقةإلتزام </th>
                                <th> ر.ب</th>

                                <th> ر.م</th>
                                <th>تعيين المادة </th>
                                <th> المستفيد </th>
                                <th> الرقم </th>
                                <th> النوع </th>
                                <th> مبلغ </th>
                                <th><i class="text-center fa fa-cogs"></i></th>


                            </tr>
                            <tr>
                                <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->
                                <th></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th></th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
if ($engagements) {
    foreach ($engagements as $engagement): ?>
                            <tr>
                                <td> <input type="checkbox" class="check_box_engmt " name="engmt_id[]"
                                        value="<?php echo $engagement->id_engmt_pre ?>" />


                                </td>
                                <td><?php echo $engagement->fknum_chapitre ?> </td>
                                <td><?php echo $engagement->fknum_article ?></td>
                                <td><?php echo $engagement->libelle_article ?></td>
                                <td><?php echo $engagement->nom_prenom ?></td>
                                <td><?php echo $engagement->n_fiche_engmt ?></td>
                                <td><?php echo $engagement->type_doc ?></td>
                                <td><?php echo $engagement->montant_operation ?> </td>
                                <td>
                                    <div style="display: flex;">
                                        <a
                                            href="<?php echo base_url('c_engagement/edite_engagement/' . $engagement->id_engmt_pre) ?>"><i
                                                class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


                                        <a class="confirmation"
                                            href="<?php echo base_url('c_engagement/remove_engagement/' . $engagement->id_engmt_pre) ?>"><i
                                                class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>

                                    </div>
                                </td>

                            </tr>
                            <?php endforeach;
}
?>
                        </tbody>
                    </table>





                </div><!-- /.container-fluid -->
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>