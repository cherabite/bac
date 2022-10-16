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

            <form method="post" action="<?php echo base_url('C_configuration/update_cwefd') ?>">

                <div class="card border-dark ">
                    <div class="shdw-t card-header text-white  bg-dark">
                        <div class="row">
                            <div class=" col-md-12">
                                <h4 class="text-center "><span class="fa fa-edit " style="color:#99ff33"></span>
                                    &nbsp;<strong class="text-uppercase"> تعديل بيانات المركز الولائي : سطيف </strong>
                                </h4>
                            </div>

                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">

                                    <?php if(validation_errors()){
							echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">إنــتـبـــه </span>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class=" glyphicon glyphicon-remove-circle"></i><span aria-hidden="true"></span></button>';
						
						echo'<div ><ol>' ;
						
                      // echo validation_errors('<li>', '</li>'); 
                        echo validation_errors('<li><span class="label label-danger">', '</span></li>'); 
						echo'</ol></div>';
						echo'</div>';
						}
						if (isset($message)) {
					    echo '<div  class="alert alert-success alert-dismissible" id="message">'; 
                        echo $message;
			            echo  '</div>';}
					?>



                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-3 col-form-label"> عنوان المركز
                                            الولائي :
                                            </label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value=" <?php echo $cwefd->ADR_CWEFD; ?>" id=""
                                                name="adresse_cwefd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-3 col-form-label"> العنوان
                                            الإلكتروني
                                            :</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value=" <?php echo $cwefd->EMAIL_CWEFD ?>" id="" name="email_cwefd">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-3 col-form-label"> الهاتف
                                            :</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?php echo $cwefd->TEL_CWEFD ?> " id="" name="tel_cwefd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-3 col-form-label"> الفاكس
                                            :</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value=" <?php echo $cwefd->FAX_CWEFD ?>" id="" name="fax_cwefd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-3 col-form-label"> مدير
                                            المركز
                                            :</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" value="<?php echo $cwefd->DIRECTEUR_CWEFD ?> " id=""
                                                name="directeur_cwefd">
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
                                    <button type="submit" class=" btn btn3d btn-primary" id="valid">&nbsp;
                                        حفظ البيانات <i class="fa fa-check"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>