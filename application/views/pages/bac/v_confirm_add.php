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
                <?php

				$success = $this->session->flashdata('success');
				if ($success) {
				?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>


                <div class="table-responsive">

                    <div class="table-responsive  row">
                        <table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
                            <thead class="thead table-dark">
                                <tr>


                                    <th>رقم الاستمارة</th>

                                    <th>رقم الملف</th>
                                    <th> الاسم و اللقب</th>
                                    <th> تاريخ الميلاد </th>
                                    <th> مكان الميلاد </th>
                                    <th> جنس </th>
                                    <th> شعبة </th>
                                    <th> رياضة </th>
                                    <th> خصوصية </th>
                                    <th> مقاطعة </th>
                                    <th>مرحلة</th>
                                    <th><i class="text-center fa fa-cogs"></i></th>


                                </tr>

                            </thead>
                            <tbody>
                                <?php
								if ($user) {
									$date = date_create($user->DNS);
									$dns_pre = date_format($date, 'Y');
								?>
                                <tr>
                                    <td><?php echo $user->npr ?> </td>
                                    <td><?php echo $user->id_dossier ?> </td>
                                    <td><?php echo $user->NOM . ' ' . $user->PRENOM ?> </td>
                                    <td><?php if ($user->PRESUME == 1) echo 'خلال' . ' ' . $dns_pre;
											else echo $user->DNS  ?></td>
                                    <td><?php echo $user->LNS ?></td>
                                    <td><?php echo $user->SEXE ?></td>
                                    <td><?php echo $user->ICODE
											?></td>
                                    <td><?php if ($user->sport == 1) echo 'كفء';
											else echo 'غ/كفء' ?></td>
                                    <td><?php echo $user->cat ?></td>
                                    <td><?php echo $user->nom_secteur  ?></td>
                                    <td><?php echo $user->id_vag  ?></td>

                                    <td>
                                        <div style="display: flex;">
                                            <a href="<?php echo base_url('bac/edite_condidat/' . $user->id) ?>"><i
                                                    class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


                                            <a class="confirmation"
                                                href="<?php echo base_url('bac/remove_condidat/' . $user->id) ?>"><i
                                                    class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>

                                        </div>
                                    </td>

                                </tr>
                                <?php
								}
								?>
                            </tbody>
                        </table>

                        </br>
                        <div class="d-flex justify-content-center">
                            <a href="<?php echo base_url('bac/show_v_form_add_condidat') ?>"
                                class="btn btn-success">إضافة مترشح </a>
                        </div>


                    </div><!-- /.container-fluid -->
                </div>


            </div><!-- /.container-fluid -->











        </section>
        <!-- /.content -->
    </div>
</div>