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

                <form id="form_add_f" method="post" action="<?php echo base_url('c_users/create_user') ?>">

                    <div class="card border-dark ">
                        <div class="shdw-t card-header text-white  bg-dark">
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4 class="text-center "><span class="fa fa-user " style="color:#99ff33"></span>
                                        &nbsp;<strong class="text-uppercase"> مستعمل جديد </strong> </h4>
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
                                            <label for="example-search-input" class="col-2 col-form-label">اللقب
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('nom') ?>" id="nom" name="nom">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الإسم
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('prenom') ?>" id="prenom" name="prenom">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> تاريخ الميلاد
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="date" class="pick_dat   inputligne"
                                                    value="<?php echo set_value('dns') ?>" id="dns" name="dns">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> الوظيفة
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('fonction') ?>" id="fonction"
                                                    name="fonction">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> اسم المستخدم
                                                :</label>
                                            <div class="col-10">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('username') ?>" id="username"
                                                    name="username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> كلمة المرور
                                                :</label>
                                            <div class="col-10 ">
                                                <input class="form-control" type="text"
                                                    value="<?php echo set_value('password ') ?>" id="password"
                                                    name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-2 col-form-label"> التفعيل
                                                :</label>
                                            <div class="col-1">

                                                <input class="form-control" type="checkbox" id="status" name="status"
                                                    value="1" />
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
                                                                class="permission" value="createUser"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateUser"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewUser"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteUser"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>  تقديرات ميزانية التسيير</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createBudgetEstimate"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateBudgetEstimate"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewBudgetEstimate"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteBudgetEstimate"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>حفظ البيانات</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateDada"></td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteData"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>إسترجاع البيانات</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createStore"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateStore"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewStore"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteStore"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحديث بيانات المركز</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateCentre"></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>إنشاء سنة مالية جديدة</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createCategory"></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>الأبواب و المواد</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createChapitre"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateChapitre"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewChapitre"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteChapitre"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>الممونون</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFournisseur"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateFournisseur"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewFournisseur"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteFournisseur"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>عمال المركز</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFonctionaire"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateFonctionaire"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewFonctionaire"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteFonctionaire"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تعديل على الإعتمادات الأولية</td>
                                                        <td> - </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateDepense"></td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحضير الإلتزام</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createEngagement"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateEngagement"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewEngagement"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteEngagement"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تحضير بطاقة الإلتزام</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createFicheEngagement"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updatecreateFicheEngagement">
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewcreateFicheEngagement">
                                                        </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deletecreateFicheEngagement">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> تحويل بين المواد</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateTransfer"></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>تسيير الإمتحان </td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="createExamen"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="updateExamenStore"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewExamen"></td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="deleteExamen"></td>
                                                    </tr>
                                                    <tr>
                                                        <td> الجداول الإحصائية </td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td><input type="checkbox" name="permission[]" id="permission"
                                                                class="permission" value="viewTableauStat"></td>
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