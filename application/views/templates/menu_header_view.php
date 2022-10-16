<?php defined('BASEPATH') or exit('No direct script access allowed');
?>
    <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> تأكيد المسجلين</title>
        <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
        <!-- Bootstrap theme -->

        <link href="<?php echo base_url() ?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style2.css">

       <script src="<?php echo base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>
       <script  type="text/javascript">

 //**************************************************************CHARGER DATE *********************************************************//
    $(document).ready(function () {
	$('#checkall').on('click', function () {
        if ($(" #checkall").is(':checked')) {
            $("#mytable input class="permission"[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input class="permission"[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
	});

	function charger_date() {

        var select_jour = document.getElementById("jour");
        var select_mois = document.getElementById("mois");
        var select_annee = document.getElementById("annee");
         jour = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
        mois = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        for (var i = 0; i < jour.length; i++)
        {
            var option = document.createElement("OPTION");
            txt = document.createTextNode(jour[i]);
            option.appendChild(txt);
            option.setAttribute("value", jour[i]);
            select_jour.insertBefore(option, select_jour.lastChild);
        }
        for (var i = 0; i < mois.length; i++)
        {
            var option = document.createElement("OPTION"),
                    txt = document.createTextNode(mois[i]);
            option.appendChild(txt);
            option.setAttribute("value", mois[i]);
            select_mois.insertBefore(option, select_mois.lastChild);
        }
        for (var i = 1940; i < 2008; i++)
        {
            var option = document.createElement("OPTION"),
                    txt = document.createTextNode(i);
            option.appendChild(txt);
            option.setAttribute("value", i);
            select_annee.insertBefore(option, select_annee.lastChild);
        }
	}

     function presumer()
    {

        var vv = document.getElementById('pre').checked;
        if (vv)
        {
            document.getElementById('jour').disabled = true;
            document.getElementById('jour').selectedIndex = '0';

            document.getElementById('mois').disabled = true;
            document.getElementById('mois').selectedIndex = '0';
        }
        else if (vv == false)
        {
            document.getElementById('jour').disabled = false;
            document.getElementById('mois').disabled = false;
        }
    }
	function transfer()
    {

        var trans = document.getElementById('trans').checked;
		var nom = document.getElementById('nom').checked;
		var prenom = document.getElementById('prenom').checked;
		var nomlat = document.getElementById('nomlat').checked;
		var prenomlat = document.getElementById('prenomlat').checked;
		var pre = document.getElementById('pre').checked;
		var mois = document.getElementById('mois').checked;
		var jour = document.getElementById('jour').checked;
		var annee = document.getElementById('annee').checked;
		var nom1 = document.getElementById('nom1').checked;
		var prenom1 = document.getElementById('prenom1').checked;
		var nomlat1 = document.getElementById('nomlat1').checked;
		var prenomlat1 = document.getElementById('prenomlat1').checked;
		var pre1 = document.getElementById('pre1').checked;
		var mois1 = document.getElementById('mois1').checked;
		var jour1 = document.getElementById('jour1').checked;
		var annee1 = document.getElementById('annee1').checked;

        if (trans == true)
        {
			nom.value    =mom1.value;
			prenom =prenom1;
			nomlat =nomlat1;
			prenom = prenomlat1;

			if(pre1==true){
				annee=annee1;
			document.getElementById('jour').disabled = true;
            document.getElementById('jour').selectedIndex = '0';

            document.getElementById('mois').disabled = true;
            document.getElementById('mois').selectedIndex = '0';
			}else if (pre1 == false)
           {
           jour=jour1;
		   mois=mois1;
		   annee=annee1;
           }

        }

    }


</script>
        <style>
       .row {
  margin-right: -15px;
  margin-left: -15px;
}
        li{text-align: right}
        </style>

    </head>
<body onLoad="charger_date()">
<?php
if ($this->auth_onefd->logged_in(true)) {
    ?>
   <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ONEFD</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">

          <ul class="nav navbar-nav">
		  <?php
if ($this->auth_onefd->is_admin()) {
        ?>
		  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; تحديد صلاحيات المستخدمين  <span class="glyphicon glyphicon-wrench pull-right"></span></a>
              <ul class="dropdown-menu" role="menu">
			 <li id="topNavClass"><a href="<?php echo base_url('index.php/admin/Admin_master/create_user'); ?>">إنشاء حساب جديد</a></li>
             <li id="topNavClass"><a href="<?php echo base_url('index.php/admin/users/index'); ?>">قائمة المستخدمين</a></li>
			 <li id="topNavClass"><a href="<?php echo base_url('index.php/Welcome/index'); ?>">شهادة المستوى</a></li>
			 <li id="topNavClass"><a href="<?php echo base_url('index.php/Welcome/conv_examen'); ?>">إستدعاء</a></li>
             </ul>
            </li>
			 <?php
}
    if ($this->auth_onefd->_All_Permissions_By_Id_User() !== false) {
        ?>
		    <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; تأكيد التسجيلات  <span class="glyphicon glyphicon-saved pull-right"></span></a>
              <ul class="dropdown-menu" role="menu">
			<?php if ($this->auth_onefd->_All_Permissions_By_Id_User() !== false && array_search('1', array_column($this->auth_onefd->_All_Permissions_By_Id_User(), 'id_perms')) !== false) {?>
			<li id="topNavClass"><a href="<?php echo base_url('index.php/user/valid/index'); ?>">تأكيد تسجيل متعلم جديد</a></li> <?php }?>
			<?php if ($this->auth_onefd->_All_Permissions_By_Id_User() !== false && array_search('2', array_column($this->auth_onefd->_All_Permissions_By_Id_User(), 'id_perms')) !== false) {?>
             <li id="topNavClass"><a href="<?php echo base_url(''); ?>">تأكيد تسجيل متعلم قديم</a></li> <?php }?>

              </ul>
            </li>
           <?php
}
    ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; البحث<span class="glyphicon glyphicon-Search pull-right"></span></a>
              <ul class="dropdown-menu" role="menu">

			   <li id="topNavClass"><a href="<?php echo base_url(''); ?>">البحث عن المؤكدين برقم الإستمارة</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">بـرقم التسجيل</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">البحث عن المؤكدين برقم الإستمارة</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">قائمة بتاريخ الميلاد</a></li>
              </ul>
            </li>

			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; عمليات أخرى<span class="glyphicon glyphicon-lock pull-right"></span></a>
              <ul class="dropdown-menu" role="menu">
              <?php if ($this->auth_onefd->_All_Permissions_By_Id_User() !== false && array_search('4', array_column($this->auth_onefd->_All_Permissions_By_Id_User(), 'id_perms')) !== false) {?>
			  <li id="topNavClass"><a href="<?php echo base_url(''); ?>">معاينة تسليم الدروس و الفروض</a></li> <?php }?>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">إنشاء رزمانة المسجاين</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">جدول توزيع الطابة حسب المستويات و الدوائر</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">إنشاء حساب في المعلام</a></li>
              </ul>
            </li>
			 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; جداول احصائية <span class="glyphicon glyphicon-print pull-right"></span></a>
              <ul class="dropdown-menu" role="menu">

			   <li id="topNavClass"><a href="<?php echo base_url(''); ?>">قائمة التلاميذ الذين دفعوا حقوق التسجيل و لم يؤكدوا</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">التسجيلات الإجمالية</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">معيدون-مقبولون-جدد</a></li>
               <li id="topNavClass"><a href="<?php echo base_url(''); ?>">إنشاء حساب في المعلام</a></li>
              </ul>
            </li>

		  <li class="dropdown" id="log">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i>&nbsp; <?php echo $this->auth_onefd->get_user()->username; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"  role="button" > <i class="glyphicon glyphicon-user"></i> &nbsp;المستخدم : <?php echo $this->auth_onefd->get_user()->nom . ' ' . $this->auth_onefd->get_user()->prenom ?> </a></li>
            <li><a href="<?php echo base_url('index.php/auth/logout'); ?>"> تسجيل خروج</a></li>
          </ul>
        </li>

          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

<?php
}
?>