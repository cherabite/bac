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
                        <a href="<?php echo base_url('auth/welcome') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                لوحة التحكم

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('bac/show_v_form_add_condidat') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                حجز المترشحين

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('bac/show_v_liste_condidat') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                قائمة المترشحين

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('bac/show_v_liste_condidat') ?>" class="nav-link">
                            <i class="nav-icon fas fa-search"></i>
                            <p>
                                بحث

                            </p>
                        </a>
                    </li>



                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                طباعة
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('bac/show_imp_liste_condidat') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>القوائم الإسمية </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href=" <?php echo base_url('bac_stat/show_form_stat') ?>"
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> إحصائيات البكالوريا الإجمالية </p>
                                </a>
                            </li>

                          
                            <li class="nav-item">
                                <a href="<?php echo base_url('bac_stat/show_stat_total_4
                                ') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> إحصائيات الرابعة متوسط </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('bac/show_v_liste_condidat_sport
                                ') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> إحصائيات  الرياضة </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('bac/show_form_config_new_year') ?>" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                إعدادات

                            </p>
                        </a>
                    </li>

                </ul>

            </nav>
            <!-- /.sidebar-menu -->
        </div>













    </div>

    <!-- /.sidebar -->
</aside>