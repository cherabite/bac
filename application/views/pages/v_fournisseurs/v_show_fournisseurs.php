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
            <!-- Small boxes (Stat box) -->
            <div class="panel ">
                <div class="panel-heading"> <i class="fa fa-list"> قائمة متعاملين </i>



                    <a href="<?php echo base_url('c_fournisseur/form_add_fournisseur') ?>"
                        class="btn btn-info btn-sm float-sm-left"><i class="fa fa-plus"></i>&nbsp;إضافة متعامل</a>
                    &nbsp;

                </div>
            </div>

        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="dropdown-divider"></div>
        <?php $error_msg = $this->session->flashdata('msg');?>
        <?php if (isset($error_msg)): ?>
        <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
            <?php echo $error_msg; ?> &nbsp;
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
        </div>
        <?php endif?>



        <div class="table-responsive  row">
            <table style="width:100%" class="tab0 table  table-striped text-center table-bordered mydatatable ">
                <thead class="thead table-dark">
                    <tr>
                        <!-- <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th> -->

                        <th> اللقب و الإسم</th>
                        <th> العنوان</th>
                        <th> الهاتف </th>
                        <th> كيفية الدفع </th>
                        <th> الوكالة </th>
                        <th> رقم الحساب </th>
                        <th> رقم التجاري </th>
                        <th> رقم ضريبي </th>
                        <th> رقم إحصائي </th>
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
                        <th class="thSearch"></th>
                        <th class="thSearch"></th>
                        <th></th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fournisseurs as $fournisseur): ?>
                    <tr>
                        <td><?php echo $fournisseur->nom_prenom ?></td>
                        <td><?php echo $fournisseur->adresse ?></td>
                        <td><?php echo $fournisseur->tel ?></td>
                        <td><?php echo $fournisseur->type_pay ?></td>
                        <td><?php echo $fournisseur->agence ?> </td>
                        <td><?php if ($fournisseur->n_compte == null) {
    echo '/';
} else {
    echo $fournisseur->n_compte;
}
?></td>
                        <td><?php if ($fournisseur->nrc == null) {
    echo '/';
} else {
    echo $fournisseur->nrc;
}
?></td>
                        <td><?php if ($fournisseur->nif == null) {
    echo '/';
} else {
    echo $fournisseur->nif;
}
?></td>
                        <td><?php if ($fournisseur->nis == null) {
    echo '/';
} else {
    echo $fournisseur->nis;
}
?></td>
                        <td>
                            <div style="display: flex;">
                                <a
                                    href="<?php echo base_url('c_fournisseur/edit_fournisseur/' . $fournisseur->id_fournisseur) ?>"><i
                                        class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


                                <a class="confirmation"
                                    href="<?php echo base_url('c_fournisseur/remove_fournisseur/' . $fournisseur->id_fournisseur) ?>"><i
                                        class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>

                            </div>
                        </td>


                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>