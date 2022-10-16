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
    <div class="container-fluid">
        <div>
            <a href="<?php echo base_url('c_users/create_user') ?>" class="btn btn-info btn-sm float-sm-left"><i
                    class="fa fa-user"></i>&nbsp;مستعمل جديد</a> &nbsp;

        </div>
        <div class="dropdown-divider"></div>
        <div>
            <?php
if ($this->session->flashdata('msg') != '') {
    echo $this->session->flashdata('msg');
}
?>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="dropdown-divider"></div>
                <div class=" col-md-12">
                    <h5 class="text-center " style="color: #007bff;">
                        &nbsp;<strong>
                            <i class="fa fa-users"></i> قــــــــائــمـة الـمــستـخــدمــين فــي المــركـــز الــولائــي
                            :
                            <?php echo ' <span class="label label-success"> ' . $this->auth_onefd->get_cwefdBy_ID_user()->WILAYA_CWEFD . '</span>' ?>

                        </strong><span class=" badge bg-warning"
                            style="margin-right:15px"><?php echo $nbr_users ?></span>
                    </h5>

                </div>
            </div>
            <form>
                <div class="table-responsive">

                    <div class="table-responsive  row">
                        <table class=" table  table-striped text-center table-bordered mydatatable" style="width:100%">
                            <thead class="thead table-dark">
                                <tr>

                                    <th> رقم </th>
                                    <th>إسم المسخدم</th>

                                    <th>الإسم و اللقب</th>
                                    <th> تاريخ الميلاد </th>
                                    <th> الوظيفة </th>
                                    <th> تفعيل </th>

                                    <th><i class="text-center fa fa-cogs"></i></th>


                                </tr>
                                <tr>
                                    <!-- <th class="deselect_all"><button class="btn btn-secondary col">إلغاء</button></th> -->
                                    <th></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th class="thSearch"></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
if ($users) {
    $n = 0;
    foreach ($users as $user): $n = $n + 1;?>
                                <tr>
                                    <td><?php echo $n ?> </td>
                                    <td><?php echo $user->username ?> </td>
                                    <td><?php echo $user->nom . '  ' . $user->prenom ?></td>
                                    <td><?php echo $user->dns ?></td>
                                    <td><?php echo $user->fonction ?></td>
                                    <td><?php if ($user->status == 1) {
            echo 'مفعل';
        } else {
            echo 'غير مفعل';
        }
        ?></td>

                                    <td>
                                        <div style="display: flex;">
                                            <a href="<?php echo base_url('c_users/edite_user/' . $user->id) ?>"><i
                                                    class=" fa fa-edit fa-md " style="color:#007bff;margin:3px"></i></a>


                                            <a class="confirmation"
                                                href="<?php echo base_url('c_users/remove_user/' . $user->id) ?>"><i
                                                    class=" fa fa-trash fa-md " style="color:red;margin:3px"></i></a>

                                        </div>
                                    </td>

                                </tr>
                                <?php endforeach;
}
?>
                            </tbody>
                        </table>





                    </div><!-- /.container-fluid -->
                </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
</div>
</div>