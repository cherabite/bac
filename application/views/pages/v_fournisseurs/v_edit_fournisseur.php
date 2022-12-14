<?php
if (isset($validation_errors)) {
	$is_fonctionaire = $is_fonctionaire;
	$nom_prenom = set_value('nom_prenom');
	$adresse = set_value('adresse');
	$tel = set_value('tel');
	$agence = set_value('agence');
	$type_pay = set_value('type_pay');
	$n_compte = set_value('n_compte');
	$nrc = set_value('nrc');
	$nif = set_value('nif');
	$nis = set_value('nis');
	$capital_s = set_value('capital_s');
	$secteur_juridique = set_value('secteur_juridique');
	$forme_juridique = set_value('forme_juridique');
} else {
	$is_fonctionaire = $fournisseur->is_fonctionaire;
	$nom_prenom = $fournisseur->nom_prenom;
	$adresse = $fournisseur->adresse;
	$tel = $fournisseur->tel;
	$agence = $fournisseur->agence;
	$type_pay = $fournisseur->type_pay;
	$n_compte = $fournisseur->n_compte;
	$nrc = $fournisseur->nrc;
	$nif = $fournisseur->nif;
	$nis = $fournisseur->nis;
	$capital_s = $fournisseur->capital_s;
	$secteur_juridique = $fournisseur->secteur_juridique;
	$forme_juridique = $fournisseur->forme_juridique;
}

?>
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

			<form id="form_add_f" method="post" action="<?php echo base_url('c_fournisseur/update_fournisseur') ?>">

				<div class="card border-dark ">
					<div class="shdw-t card-header text-white  bg-dark">
						<div class="row">
							<div class=" col-md-12">
								<h4 class="text-center "><span class="fa fa-shopping-cart " style="color:#99ff33"></span>
									&nbsp;<strong class="text-uppercase"> ?????????? ???????????? ???????????? </strong> </h4>
							</div>

						</div>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="white-box">

									<?php if (validation_errors()) {
										echo '<div class="alert alert-warning alert-dismissible" role="alert" <span style="color: #FF0000; font-weight: bold">?????????????????????? </span>
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
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
											<?php echo $this->session->flashdata('error'); ?>
										</div>
									<?php } ?>
									<?php
									$success = $this->session->flashdata('success');
									if ($success) {
									?>
										<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button>
											<?php echo $this->session->flashdata('success'); ?>
										</div>
									<?php } ?>
									?>

									<input type="hidden" name="id_fournisseur" value="<?php echo $fournisseur->id_fournisseur; ?>">
									<div class="form-group row">
										<label for="example-search-input" class="col-2 col-form-label">?????????? ?? ??????????
											:</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?php echo $nom_prenom; ?>" id="nom_prenom" name="nom_prenom">
										</div>
									</div>
									<div class="form-group row">

										<label for="example-search-input" class=" col-form-label"> ??????????
											?????????????????? ?????????????? :&nbsp;&nbsp;&nbsp;
										</label>
										<input type="checkbox" name="is_fonctionaire" id="is_fonctionaire" value="1" <?php if ($is_fonctionaire) {
																															if ($is_fonctionaire == 1) {
																																echo "checked";
																															}
																														} ?>>

									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ??????????????
											:</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?php echo $adresse ?>" id="adresse" name="adresse">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ??????????????
											:</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?php echo $agence ?>" id="agence" name="agence">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ????????????
											:</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?php echo $tel ?>" id="tel" name="tel">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ?????? ????????????
											:</label>
										<div class="col-10">
											<input class="form-control" type="text" value="<?php echo $n_compte ?>" id="n_compte" name="n_compte">
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-2 col-form-label">?????????? ??????????
										</label>
										<div class="col-10">
											<select class="form-control" name="type_pay" id="type_pay">
												<option value="<?php echo $type_pay ?>"><?php echo $type_pay ?></option>
												<option value="??.??.??"> ??.??.??</option>
												<option value="??.??.??"> ??.??.??</option>
												<option value="??.??.??">??.??.?? </option>
												<option value="??.??.??">??.??.?? </option>
												<option value="??.??.??">??.??.?? </option>
												<option value="??.??.??.??">??.??.??.?? </option>
												<option value="BNA"> BNA</option>
												<option value="??????????????">?????????????? </option>

											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ?????????? ????????????????
											:</label>
										<div class="col-10">
											<select class="form-control" name="forme_juridique" id="forme_juridique">
												<option value="<?php echo $forme_juridique ?>">
													<?php echo $forme_juridique ?></option>
												<option value="P.physique">P.physique </option>
												<option value="SPA">SPA</option>
												<option value="SARL">SARL</option>
												<option value="EURL">EURL </option>
												<option value="SNC"> SNC</option>
												<option value="EPIC"> EPIC</option>
												<option value="Autre"> autre</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-2 col-form-label"> ???????????? ????????????????
											:</label>
										<div class="col-10">
											<select class="form-control" name="secteur_juridique" id="secteur_juridique">
												<option value="<?php echo $secteur_juridique ?>">
													<?php echo $secteur_juridique ?></option>
												<option value="Public">Public</option>
												<option value="Prive">Prive</option>
												<option value="Etrange">Etrange</option>
												<option value="Mixte">Mixte </option>

											</select>
										</div>
									</div>
								</div>


								<div class="form-group row">
									<label for="example-email-input" class="col-2 col-form-label"> ?????????? ??????????????
										:</label>
									<div class="col-10">
										<input class="form-control" type="text" value="<?php echo $nrc ?>" id="nrc" name="nrc">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-email-input" class="col-2 col-form-label"> ?????????? ??????????????
										:</label>
									<div class="col-10">
										<input class="form-control" type="text" value="<?php echo $nif ?>" id="nif" name="nif">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-email-input" class="col-2 col-form-label"> ?????????? ????????????????
										:</label>
									<div class="col-10">
										<input class="form-control" type="text" value="<?php echo $nis ?>" id="nis" name="nis">
									</div>
								</div>
								<div class="form-group row">
									<label for="example-email-input" class="col-2 col-form-label"> ?????? ??????????
										:</label>
									<div class="col-10">
										<input class="form-control" type="text" value="<?php echo $capital_s ?>" id="capital_s" name="capital_s">
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
							<button type="submit" class=" btn btn3d btn-primary" id="valid">&nbsp; ?????????? <i class="fa fa-check"></i> </button>
						</div>
					</div>
				</div>
		</div>
		</form>





</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
