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
                <div class="col-2">
                    <a href="<?php echo base_url('c_engagement/create_engagement') ?>"
                        class="btn btn-info btn-sm float-sm-left"><i class="fa fa-plus"></i>&nbsp; إلتزام جــديد</a>
                    &nbsp;
                </div>
                <div class="col-3">
                    <a href="<?php echo base_url('c_engagement') ?>" class="btn btn-success btn-sm float-sm-left"><i
                            class="fa fa-edit"></i> بطاقة إلتزام جديدة</a>
                    &nbsp;


                </div>
                <div class="col-3">
                    <button type="" id="" class="btn btn-success btn-sm float-sm-left"><i class="fa fa-check"></i> بطاقة
                        إلتزام مقبولة</button>
                    &nbsp;


                </div>
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
                    &nbsp;<strong> بطاقة الإلتزام قيد الإنتظار
                    </strong><span class=" badge bg-warning"
                        style="margin-right:15px"><?php echo $nbr_fiche_engmt_attent ?></span> </h5>

            </div>
        </div>
        <form method="post" id="form_new_cart" action="<?php ?>">
            <div class="table-responsive">
                <div id="errorvalidation">
                </div>
                <div class="table-responsive  row">
                    <table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
                        <thead class="thead table-dark">
                            <tr>
                                <!-- <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th> -->
                                <!-- <th></th> -->

                                <th> بطاقةإلتزام </th>
                                <th>ر الباب</th>

                                <th> ر.م</th>
                                <th>تعيين المادة </th>
                                <th> م. السابق </th>
                                <th> م. العملية </th>
                                <th> م. الجديد </th>
                                <th><i class="text-center fa fa-cogs"></i></th>


                            </tr>
                            <tr>
                                <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->

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
if ($fiche_engagements) {
    foreach ($fiche_engagements as $engagement): ?>
                            <tr>
                                <td> <?php echo $engagement->n_fiche_engmt ?>


                                </td>
                                <td><?php echo $engagement->fknum_chapitre ?> </td>
                                <td><?php echo $engagement->fknum_article ?></td>
                                <td><?php echo $engagement->libelle_article ?></td>
                                <td><?php echo $engagement->ancian_montant ?></td>
                                <td><?php echo $engagement->montant_operation ?></td>
                                <td><?php echo $engagement->nouveau_montant ?></td>
                                <td>
                                    <div style="display: flex;">
                                        <a
                                            href="<?php base_url('c_engagement/remove_fiche_engagement/' . $engagement->id_engagement)?>"><i
                                                class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


                                        <a class="confirmation"
                                            href="<?php echo base_url('c_engagement/remove_fiche_engagement/' . $engagement->id_engagement) ?>"><i
                                                class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>
                                        <a class="confirmation"
                                            href="<?php echo base_url('c_engagement/remove_fiche_engagement/' . $engagement->id_engagement) ?>"><i
                                                class=" fa fa-print fa-md " style="color:green;margin:3px"></i></a>

                                    </div>
                                </td>

                            </tr>
                            <?php endforeach;
}
?>
                        </tbody>
                    </table>





                </div><!-- /.container-fluid -->
        </form>
</div>
</section>
<!-- /.content -->
</div>