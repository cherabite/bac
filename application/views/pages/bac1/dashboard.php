<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">لوحة التحكم</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                        <li class="breadcrumb-item active">لوحة التحكم</li>
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
            <div class="alert alert-info" role="alert">
                <span> شهادة البكالوريا دورة 2022 </span>
                <span class=" float-sm-left"> الإجمالي: <?php echo $sumbac->SUM ?></span>
            </div>
            <div class="row">

                <?php
				if ($filieres) {

					$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
					foreach ($filieres as $filiere) :
						//$rand1 = rand(0, 15);
						//$rand = $rand0[$rand1];
						$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];


				?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div style="background-color: <?php echo $color
															?>" class="small-box ">
                        <div class="inner">
                            <h3><?php echo $filiere->SUM ?></h3>
                            <h6></h6>
                            <h4><?php echo $filiere->ICODE . '   ' . $filiere->FILIERE ?></h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('module/edite_module/') ?>" class="small-box-footer">المزيد <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <?php endforeach;
				}
				?>
                <!-- ./col -->
            </div>
            <!-- شهادة المتوسط -->
            <div class="alert alert-info" role="alert">
                <span> شهادة التعليم المتوسط دورة 2022 </span>
                <span class=" float-sm-left"> الإجمالي: <?php echo $moyens->SUM ?></span>
            </div>
            <div class="row">

                <?php
				if ($moyens) {

					$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

					$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];


				?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div style="background-color: <?php echo $color
														?>" class="small-box ">
                        <div class="inner">
                            <h3><?php echo $moyens->SUM ?></h3>
                            <h6></h6>
                            <h4><?php echo 'الرابعة متوسط' ?></h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo base_url('module/edite_module/') ?>" class="small-box-footer">المزيد <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <?php
				}
				?>
                <!-- ./col -->
            </div>

        </div><!-- /.container-fluid -->


    </section>





</div>