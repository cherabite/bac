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

                <form id="form_add_f" method="post" action="<?php echo base_url('c_fournisseur/add_fournisseur') ?>">

                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-shopping-cart "
                                            style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> إضافة متعامل </strong> </h4>
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
    echo '</div>';}
?>


                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label">اللقب و الإسم
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('nom_prenom') ?>" id="nom_prenom"
                                                    name="nom_prenom">
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <label for="example-search-input" class=" col-form-label"> مـوظف
                                                بالمــركز الولائي :&nbsp;&nbsp;&nbsp;
                                            </label>
                                            <input type="checkbox" name="is_fonctionaire" id="is_fonctionaire" value="1" <?php if (isset($is_fonctionaire)) {
    if ($is_fonctionaire == 1) {echo "checked";}}?>>

                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> العنوان
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('adresse') ?>" id="adresse"
                                                    name="adresse">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الوكالة
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('agence') ?>" id="agence" name="agence">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الهاتف
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('tel') ?>" id="tel" name="tel">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> رقم الحساب
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('n_compte') ?>" id="n_compte"
                                                    name="n_compte">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-2 col-form-label">كيفية الدفع
                                            </label>
                                            <div class="col-10">
                                                <select class="form-control" name="type_pay" id="type_pay">
                                                    <option value="">----------- اختر --------------</option>
                                                    <option value="ب.و.ج"> ب.و.ج</option>
                                                    <option value="ب.خ.ج"> ب.خ.ج</option>
                                                    <option value="ح.ج.ب">ح.ج.ب </option>
                                                    <option value="ق.ش.ج">ق.ش.ج </option>
                                                    <option value="ب.ت.م">ب.ت.م </option>
                                                    <option value="ب.ف.ت.ر">ب.ف.ت.ر </option>
                                                    <option value="BNA"> BNA</option>
                                                    <option value="الخزينة">الخزينة </option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الشكل
                                                القانوني
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="forme_juridique"
                                                    id="forme_juridique">
                                                    <option value="">----------- اختر --------------</option>
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
                                            <label for="example-email-input" class="col-2 col-form-label"> القطاع
                                                القانوني
                                                :</label>
                                            <div class="col-10">
                                                <select class="form-control" name="secteur_juridique"
                                                    id="secteur_juridique">
                                                    <option value="">----------- اختر --------------</option>
                                                    <option value="Public">Public</option>
                                                    <option value="Prive">Prive</option>
                                                    <option value="Etrange">Etrange</option>
                                                    <option value="Mixte">Mixte </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> الرقم التجاري
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo set_value('nrc') ?>" id="nrc" name="nrc">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> الرقم الضريبي
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo set_value('nif') ?>" id="nif" name="nif">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> الرقم الإحصائي
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo set_value('nis') ?>" id="nis" name="nis">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label"> رأس المال
                                            :</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text"
                                                value="<?php echo set_value('capital_s') ?>" id="capital_s"
                                                name="capital_s">
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