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

                <form id="form_add_f" method="post" action="<?php echo base_url('bac/update_condidat') ?>">
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="text-center fa fa-cogs "
                                            style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> تعديل بيانات مترشح </strong> </h4>
                                </div>

                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">

                                        <?php if (validation_errors()) {
											echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';

											echo '<div ><ol>';

											// echo validation_errors('<li>', '</li>');
											echo validation_errors('<li><span class="label label-danger">', '</span></li>');
											echo '</ol></div>';
											echo '</div>';
										}
										$error = $this->session->flashdata('error');
										if ($error) {
										?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                        <?php } ?>



                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label">رقم الإستمارة
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="npr" name="npr"
                                                    value="<?php echo $user->npr ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> رقم الملف
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" id="id_dossier"
                                                    name="id_dossier" value="<?php echo $user->id_dossier ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"> التربيةالبدنية
                                                :
                                            </label>
                                            <div class="col-10">
                                                <select class="form-control" name="sport" id="sport">
                                                    <option value="<?php echo $user->sport ?>"><?php if ($user->sport == 1) echo 'كفء';
																								else echo 'غ/كفء' ?></option>
                                                    <option value="1">كفء</option>
                                                    <option value="0">غ/كفء</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"> ذوي الإحتياجات
                                                الخاصة :
                                            </label>
                                            <div class="col-10">
                                                <select class="form-control" name="categorie" id="categorie">
                                                    <option value="<?php echo $user->categorie ?>">
                                                        <?php echo $user->cat ?></option>
                                                    <option value="0">لا</option>
                                                    <option value="1">حركيا</option>
                                                    <option value="2">سمعيا</option>
                                                    <option value="3">بصريا</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label"> المقاطعة :
                                            </label>
                                            <div class="col-10">
                                                <select class="form-control" name="code_secteur" id="code_secteur">
                                                    <option value="<?php echo $user->code_etab ?>">
                                                        <?php echo $user->nom_secteur ?></option>
                                                    <option value="5344">سطيف</option>
                                                    <option value="5349">العلمة</option>
                                                    <option value="5351">عين ولمان</option>
                                                    <option value="5353">بوقاعة</option>

                                                </select>
                                            </div>
                                        </div>




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