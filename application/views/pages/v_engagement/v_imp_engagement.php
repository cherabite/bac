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
                            value="طباعة الكل " />
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
                                <!-- <th></th> -->
                                <th>رقم الفصل</th>

                                <th>رقم الباب</th>

                                <th>رقم المادة</th>
                                <th>تعيين المادة </th>
                                <th> الميزانية البيدائية </th>
                                <th> طباعة  </th>

                            </tr>
                            <tr>
                                <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->
                                <!-- <th></th> -->
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th class="thSearch"></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($depenses as $depense): ?>
                            <tr>
     
                                <td><?php echo $depense->fknum_section  ?></td>
                                <td><?php echo $depense->fknum_chapitre ?> </td>
                                <td><?php echo $depense->fknum_article ?></td>
                                <td><?php echo $depense->libelle_article ?></td>
                                <td><?php echo $depense->nouveau_montant  ?> </td>
                                <td>
                            <a
                                href="<?php echo base_url('c_imp_prim_engagement/imp_engagement/'.$depense->id_engagement) ?>"><button
                                    type="button" class="btn btn-info btn-circle btn-xs" data-toggle="tooltip"
                                    data-original-title="طباعة"><i class="fa fa-print"></i></button></a>



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