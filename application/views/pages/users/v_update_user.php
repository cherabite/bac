<?php

if (isset($validation_errors)) {
    $permission = unserialize($permission);
    $nom = set_value('nom');
    $prenom = set_value('prenom');
    $username = set_value('username');
    $password = set_value('password');
    $fonction = set_value('fonction');
    $dns = set_value('dns');
    $status = set_value('status');
    $user_id = $user_id;

} else {
    $permission = unserialize($user->permission);
    $nom = $user->nom;
    $prenom = $user->prenom;
    $username = $user->username;
    $password = $user->password;
    $fonction = $user->fonction;
    $dns = $user->dns;
    $status = $user->status;
    $user_id = $user->id;

}

?>
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

                <form id="form_add_f" method="post" action="<?php echo base_url('c_users/update_user') ?>">

                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-user " style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> تحديث معلومات مستعمل </strong> </h4>
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

                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-2 col-form-label">اللقب
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="<?php echo $nom ?>"
                                                    id="nom" name="nom">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الإسم
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="<?php echo $prenom ?>"
                                                    id="prenom" name="prenom">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> تاريخ الميلاد
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" class="pick_dat   inputligne"
                                                    value="<?php echo $dns ?>" id="dns" name="dns">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الوظيفة
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="<?php echo $fonction ?>"
                                                    id="fonction" name="fonction">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> اسم المستخدم
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text" value="<?php echo $username ?>"
                                                    id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> كلمة المرور
                                                :</label>
                                            <div class="col-10 ">
                                                <input class="form-control" type="text" value="<?php echo $password ?>"
                                                    id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> التفعيل
                                                :</label>
                                            <div class="col-1">

                                                <input class="form-control" type="checkbox" id="status" name="status" <?php if ($status == 1) {
    echo 'checked';
}
?> />
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- .row -->


                        </div>

                    </div>
                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-primary">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-wrench " style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> صلاحيات المستعمل </strong> </h4>
                                </div>

                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <div class="form-group">
                                            <div class="text-center">
                                                <h3> <input type="checkbox" id="cocher">
                                                    تحديد الكل
                                                </h3>
                                            </div>
                                            <br />
                                            <table class="table  table-striped text-center table-bordered "
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>إنشاء</th>
                                                        <th>تحديث</th>
                                                        <th>تصفح</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>تحديد صلاحية المستخدمين</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createUser"
                                                                <?php if ($permission) {if (in_array('createUser', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateUser" <?php if ($permission) {
    if (in_array('updateUser', $permission)) {echo "checked";}}?>> </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewUser" <?php if ($permission) {
    if (in_array('viewUser', $permission)) {echo "checked";}}?>></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteUser" <?php if ($permission) {
    if (in_array('deleteUser', $permission)) {echo "checked";}}?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td> تقديرات ميزانية التسيير</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createBudgetEstimate" <?php if ($permission) {
    if (in_array('createBudgetEstimate', $permission)) {echo "checked";}}?>></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateBudgetEstimate" <?php if ($permission) {
    if (in_array('updateBudgetEstimate', $permission)) {echo "checked";}}?>></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewBudgetEstimate" <?php if ($permission) {
    if (in_array('viewBudgetEstimate', $permission)) {echo "checked";}}?>></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteBudgetEstimate <?php if ($permission) {
    if (in_array('deleteBudgetEstimate', $permission)) {echo "checked";}}?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>حفظ البيانات</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateDada"
                                                                <?php if ($permission) {if (in_array('updateDada', $permission)) {echo "checked";}}?>>

                                                        </td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteData"
                                                                <?php if ($permission) {if (in_array('deleteData', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>إسترجاع البيانات</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createStore"
                                                                <?php if ($permission) {if (in_array('createStore', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateStore"
                                                                <?php if ($permission) {if (in_array('updateStore', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewStore"
                                                                <?php if ($permission) {if (in_array('viewStore', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteStore"
                                                                <?php if ($permission) {if (in_array('deleteStore', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحديث بيانات المركز</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateCentre"
                                                                <?php if ($permission) {if (in_array('updateCentre', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>إنشاء سنة مالية جديدة</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createNewYear"
                                                                <?php if ($permission) {if (in_array('createNewYear', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الأبواب و المواد</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createChapitre"
                                                                <?php if ($permission) {if (in_array('createChapitre', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateChapitre"
                                                                <?php if ($permission) {if (in_array('updateChapitre', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewChapitre"
                                                                <?php if ($permission) {if (in_array('viewChapitre', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteChapitre"
                                                                <?php if ($permission) {if (in_array('deleteChapitre', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>الممونون</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFournisseur"
                                                                <?php if ($permission) {if (in_array('createFournisseur', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateFournisseur"
                                                                <?php if ($permission) {if (in_array('updateFournisseur', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewFournisseur"
                                                                <?php if ($permission) {if (in_array('viewFournisseur', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteFournisseur"
                                                                <?php if ($permission) {if (in_array('deleteFournisseur', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>عمال المركز</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFonctionaire"
                                                                <?php if ($permission) {if (in_array('createFonctionaire', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateFonctionaire"
                                                                <?php if ($permission) {if (in_array('updateFonctionaire', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewFonctionaire"
                                                                <?php if ($permission) {if (in_array('viewFonctionaire', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteFonctionaire"
                                                                <?php if ($permission) {if (in_array('deleteFonctionaire', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>تعديل على الإعتمادات الأولية</td>
                                                        <td> - </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateDepense"
                                                                <?php if ($permission) {if (in_array('updateDepense', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحضير الإلتزام</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createEngagement"
                                                                <?php if ($permission) {if (in_array('createEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateEngagement"
                                                                <?php if ($permission) {if (in_array('updateEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewEngagement"
                                                                <?php if ($permission) {if (in_array('viewEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteEngagement"
                                                                <?php if ($permission) {if (in_array('deleteEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحضير بطاقة الإلتزام</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFicheEngagement"
                                                                <?php if ($permission) {if (in_array('createFicheEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updatecreateFicheEngagement"
                                                                <?php if ($permission) {if (in_array('updatecreateFicheEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewcreateFicheEngagement"
                                                                <?php if ($permission) {if (in_array('viewcreateFicheEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deletecreateFicheEngagement"
                                                                <?php if ($permission) {if (in_array('deletecreateFicheEngagement', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> تحويل بين المواد</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateTransfer"
                                                                <?php if ($permission) {if (in_array('updateTransfer', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>تسيير الإمتحان </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createExamen"
                                                                <?php if ($permission) {if (in_array('createExamen', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateExamenStore"
                                                                <?php if ($permission) {if (in_array('updateExamenStore', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewExamen"
                                                                <?php if ($permission) {if (in_array('viewExamen', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteExamen"
                                                                <?php if ($permission) {if (in_array('deleteExamen', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> الجداول الإحصائية </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewTableauStat"
                                                                <?php if ($permission) {if (in_array('viewTableauStat', $permission)) {echo "checked";}}?>>
                                                        </td>
                                                        <td>-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="shdw-p card-footer clearfix">
                            <div class="float-left">

                                <div>
                                    <button type="submit" class=" btn btn3d btn-primary" id="valid">&nbsp; موافق <i
                                            class="fa fa-check"></i> </button>
                                </div>
                            </div>
                        </div>

                </form>





            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>