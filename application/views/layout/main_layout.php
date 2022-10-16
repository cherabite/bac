<!DOCTYPE html>
<html>

<head dir="rtl" lang="ar" xml:lang="ar">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>البواية الرقمية للديوان</title>
    <!-- Tell the browser to be responsive to screen width -->
    <?php $this->load->view("include/styles")?>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view("include/navbar")?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("include/sidebar_bac")?>


        <!-- Content Wrapper. Contains page content -->

        <?php $this->load->view($page_content);?>


        <!-- /.content-wrapper -->
        <?php $this->load->view("include/footer")?>



    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("include/scripts")?>

    <?php

if (isset($file_js)) {
    echo '<script>';
    $this->load->view($file_js);
    echo '</script>';
}
?>

</body>

</html>