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

            <form method="post" action="<?php echo base_url('c_chapitre_article/update_article') ?>">

                <div class="card border-dark ">
                    <div class="shdw-t card-header text-white  bg-dark">
                        <div class="row">
                            <div class=" col-md-12">
                                <h4 class="text-center "><span class="fa fa-edit " style="color:#99ff33"></span>
                                    &nbsp;<strong class="text-uppercase"> تعديل على المواد </strong> </h4>
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
                                        <label for="example-text-input" class="col-2 col-form-label">الفــصـل
                                            :</label>
                                        <div class="col-10">
                                            <select class="form-control" name="pknum_section" id="pknum_section">
                                                <option value="<?php echo $article->pknum_section ?>">
                                                    <?php echo $article->pknum_section .'   '.$article->libelle_section ?>
                                                </option>
                                                <?php
											if ($sections) {
												foreach ($sections as $section):
													?>
                                                <option value="<?php echo $section->pknum_section ?>">
                                                    <?php echo $section->pknum_section .'   '.$section->libelle_section ?>
                                                </option>
                                                <?php
												endforeach
												?>
                                                <?php
											}
											else {
												?>
                                                <option value="">غ موجود</option>
                                                <?php
											}
											?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">الباب :</label>
                                        <div class="col-10">

                                            <select class="form-control" name="pknum_chapitre" id="pknum_chapitre">
                                            <option value="<?php echo $article->pknum_chapitre ?>">
                                                    <?php echo $article->pknum_chapitre .'   '.$article->libelle_chapitre ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> رقم المادة
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo $article->num_article ?>" id="num_article" name="num_article">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> تعيين المادة
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo $article->libelle_article ?>" id="libelle_article"
                                                name="libelle_article">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> الفقرة
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo $article->paragraphe ?>" id="paragraphe_article"
                                                name="paragraphe_article">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_article" value="<?php echo $article->id_article ?>">

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