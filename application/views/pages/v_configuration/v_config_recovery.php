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
                    <div class="shdw-t card-header text-white  bg-yellow">
                        <div class="row">
                            <div class=" col-md-12">
                                <h4 class="text-center "><span class="fa fa-edit " style="color:#99ff33"></span>
                                    &nbsp;<strong class="text-uppercase"> إسترجاع قاعدة البيانات </strong>
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
                                        <label for="example-email-input" class="col-2 col-form-label">
                                            إسترجاع البانات
                                        </label>
                                        <div class="col-3">
                                            <button type="submit" class=" btn btn3d btn-primary" id="valid">&nbsp;
                                                إسترجاع <i class="fa fa-check"></i> </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- .row -->


                        </div>


                    </div>
            </form>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>