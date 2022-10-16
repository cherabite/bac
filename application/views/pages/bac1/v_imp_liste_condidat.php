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
				<form id="form_liste_condidat" method="post" action="<?php echo base_url('bac_imp/imp_liste_condidat') ?>">
					<div class="form-group row">
						<label for="example-search-input" class="col-2 col-form-label">إختر الشعبة
							:</label>
						<div class="col-3">
							<select class="form-control" name="icode" id="icode">
								<option value="">أختر المستوى</option>
								<option value="312">أداب و فلسفة</option>
								<option value="313"> لغات إسبانية</option>
								<option value="314">علوم تجريبية</option>
								<option value="315">لغات إيطالية</option>
								<option value="316">رياضيات</option>
								<option value="318">لغات ألمانية</option>
								<option value="337">تسيير و إقتصاد</option>
								<option value="351">هندسة ميكانيكية</option>
								<option value="353">هندسة كهربائية</option>
								<option value="355">هندسة مدنية</option>
								<option value="357">هندسة الطرائق</option>
								<option value="111">إظهار الكل</option>
								<option value="404">الرابعة متوسط</option>

							</select>
						</div>
						<label for="example-search-input" class="col-1 col-form-label">فلتر
							:</label>
						<div class="col-2">
							<select class="form-control" name="nom_secteur" id="nom_secteur">

								<option value="5344"> سطيف </option>
								<option value="5349">العلمة</option>
								<option value="5351"> عين ولمان</option>
								<option value="5353"> بوقاعة</option>						
								<option value="111">الكل </option>


							</select>
						</div>
						<div class="col-2">
							<select class="form-control" name="id_vag" id="id_vag">

								<option value="1"> 01 مرحلة </option>
								<option value="2">02 مرحلة</option>
								<option value="3"> 03 مرحلة</option>
								<option value="4"> 04 مرحلة</option>
								<option value="5"> 05 مرحلة</option>
								<option value="6"> 06 مرحلة</option>
								<option value="7"> 07 مرحلة</option>
								<option value="111">الكل </option>


							</select>
						</div>
						<div class="col-2 ">
							<button class="btn btn-info" type="" id="search">
								<i class="fas fa-file-pdf "> تحميل</i>
							</button>
						</div>

					</div>
				</form>
				<div class="table-responsive">

					<div id="tab1" class="table-responsive  row">

					</div>




					<!-- /.container-fluid -->
				</div>


			</div><!-- /.container-fluid -->

		</section>
	</div>




</div>
