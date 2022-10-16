<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link p-2">
        <img src="<?php echo base_url(); ?>assets/images/onefd_logo.png" alt="ONEFD Logo" class="img-circle "
            width="55">

        <span class="brand-text font-weight-light mr-3">البوابة الرقمية </span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/images/salah.jpg" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $this->session->userdata('identifiant') ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                لوحة التحكم

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                الأبواب و المواد
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_chapitre_article/show_chapitre') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>الأبواب </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_chapitre_article/show_article') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>المواد</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                تعديلات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=" <?php echo base_url('c_depenses') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>تعديل على الإعتمادات </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" <?php echo base_url('c_imp_prim_engagement') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> طبع بطاقة الإلتزام الأولية </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>أمر بالمهمة</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>الفواتير</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_fournisseur/show_fournisseurs') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>المتعاملين</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                الإلتزامات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_engagement') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>تحضير الإلتزام </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" <?php echo base_url('c_fiche_engagement/fiche_engagement') ?>"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> بطاقة الإلتزام </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('c_engagement') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مقرر التحويل</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>محتوى التحويل </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                تسيير الإمتحان
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_chapitre_article/show_chapitre') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مركز الإجراء </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_chapitre_article/show_article') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>مركز التصحيح</p>
                                </a>
                            </li>

                        </ul>
                    </li>



                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                إعدادات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_users') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> تحديد صلاحيات المستخدمين </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_configuration/config_cwefd') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>المركز الولائي </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_configuration/save_data') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> حفظ المعلومات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_configuration/recovery_data') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> إرجاع معلومات الحفظ </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_depenses/new_year_finence') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> تقديرات ميزانية التسيير </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('c_depenses/new_year_finence') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> إنشاء سنة مالية جديدة </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>


    <!-- /.sidebar -->
</aside>