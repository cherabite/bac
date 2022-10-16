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

            <form method="post" action="<?php echo base_url('bac/confirm_new_year') ?>">

                <div class="card border-dark ">
                    <div class="shdw-t card-header text-white  bg-dark">
                        <div class="row">
                            <div class=" col-md-12">
                                <h4 class="text-center "><span class="fa fa-calendar-o " style="color:#99ff33"></span>
                                    &nbsp;<strong class="text-uppercase"> المرحلة رقم : </strong> </h4>
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
									if (isset($message)) {
										echo '<div  class="alert alert-success alert-dismissible" id="message">';
										echo $message;
										echo  '</div>';
									}
									$error_msg = $this->session->flashdata('msg');
									if (isset($error_msg)) : ?>
                                    <div class="alert alert-success delete_msg pull" style="width: 100%"> <i
                                            class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span> </button>
                                    </div>
                                    <?php endif
									?>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">المرحلة رقم :
                                            :</label>
                                        <div class="col-10">
                                            <select class="form-control" name="new_year">

                                                <option value="">------------ إختر -------------</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>

                                                </option>

                                            </select>
                                        </div>
                                    </div>

                                    <br>
                                    <br>
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
    </
section>
    <!-- /.content -->
</div>