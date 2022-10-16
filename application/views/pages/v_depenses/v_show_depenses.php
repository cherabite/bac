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

            <div class=" col-md-12">
                <h4 class="text-center "><span class=" " style="color:#99ff33"></span>
                    &nbsp;<strong class="text-uppercase"> الميزانية الأولية للسنة المالية : <?php echo  $n_y ?>
                    </strong> </h4>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="dropdown-divider"></div>
        <?php $error_msg = $this->session->flashdata('msg'); ?>
        <?php if (isset($error_msg)): ?>
        <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
            <?php echo $error_msg; ?> &nbsp;
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                    aria-hidden="true">×</span> </button>
        </div>
        <?php endif ?>


        <div class="table-responsive">

            <form method="post" id="update_form">
                <div class="row">
                    <div class="col-md-6" align="right">
                        <label id="sum_depenses" style="color:blue">
                            مجموع الميزانية : <?php echo $sum_depenses->nouveau_montant ?> <span>د ج </span>
                        </label>
                    </div>
                    <div class="col-md-6" align="left">
                         <input type="submit" name="update_form" id="update_form" class="btn btn-info"
                            value="حفظ التعديلات " />
                    </div>


                </div>
                <br />
                <div id="errorvalidation">
                </div>
                <div class="table-responsive  row">
                    <table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
                        <thead class="thead table-dark">
                            <tr>
                                <!-- <th class="select_all"><button class="btn btn-secondary col">تحديد </button> </th> -->
                                <th></th>
                                <th>رقم الفصل</th>

                                <th>رقم الباب</th>

                                <th>رقم المادة</th>
                                <th>تعيين المادة </th>
                                <th> الميزانية البيدائية </th>


                            </tr>
                            <tr>
                                <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->
                                <th></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($depenses as $depense): ?>
                            <tr>
                                <!-- <td></td> -->
                                <td>
                                    <input type="checkbox" class="check_box" id="<?php echo $depense->id_engagement  ?> "
                                        data-budjet_primitif="<?php echo $depense->nouveau_montant  ?> "
                                        data-fknum_section="<?php echo $depense->fknum_section  ?> "
                                        data-fknum_chapitre="<?php echo $depense->fknum_chapitre  ?> "
                                        data-fknum_article="<?php echo $depense->fknum_article  ?> "
                                        data-libelle_article="<?php echo $depense->libelle_article  ?> " />
                                </td>
                                <td><?php echo $depense->fknum_section  ?></td>
                                <td><?php echo $depense->fknum_chapitre ?> </td>
                                <td><?php echo $depense->fknum_article ?></td>
                                <td><?php echo $depense->libelle_article ?></td>
                                <td><?php echo $depense->nouveau_montant  ?> </td>




                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>





                </div><!-- /.container-fluid -->
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>