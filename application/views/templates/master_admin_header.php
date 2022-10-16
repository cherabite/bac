<!DOCTYPE html>
<html dir="rtl">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title> تأكيد</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css" >
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery/validationEngine.jquery.css" type="text/css"/>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style2.css">
		<!-- javascript    -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine-ar.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.validationEngine.js" charset="utf-8"></script>	
	    <script type="text/javascript" src="<?php echo base_url() ?>custom/chois_wilaya.js"></script>
		

       
        li{text-align: right}
		.img-circle {   padding-top:2px ; 
		                padding-right:4px ; 
						padding-bottom:4px ; 
						padding-left:4px ; 
		                }
		.bb{float: right; }				
					
	     </style>
</head>
<body id="principal"   >
 <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand img-circle " href="#"> <img src="<?php echo base_url() ?>images/logo.png"  alt="ONEFD" width="50px" height="48px" ></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
		
          <ul class="nav navbar-nav">
		  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; طلب التسجيل  <span class="glyphicon glyphicon-edit pull-right"style="color:#99ff33"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#choi_wilaya" role="button" class="btn" data-act-id="nouveau_eleve" data-toggle="modal">متعلــم جــديـد </a></li>
                <li><a href="#choi_wilaya" role="button" class="btn" data-act-id="ancien_eleve" data-toggle="modal" >متعلــم ســابـق  </a></li>
                
              </ul>
            </li>
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">&nbsp; إعادة طبع الوثائق<span class="glyphicon glyphicon-print pull-right" style="color:#99ff33"></span></a>
              <ul class="dropdown-menu" role="menu">
              
			   <li><a  href="#choi_wilaya" role="button" class="btn" data-act-id="reimprim_enpr" data-toggle="modal">بـرقم الإستمــارة</a></li>
                <li><a href="#choi_wilaya" role="button" class="btn" data-act-id="reimprim_nom" data-toggle="modal">بالاسـم و اللـقب</a></li>
                
              </ul>
            </li>
			
			   <li><a href="#choi_wilaya" role="button" data-act-id="confirmation" data-toggle="modal">&nbsp; التحقق من قبول التسجيل <span class="glyphicon glyphicon-duplicate pull-right"style="color:#99ff33"></span></a></li>
			    <li><a href="#frais" role="button" data-act-id="confirmation" data-toggle="modal">&nbsp;حقوق التسجيل <span class="glyphicon glyphicon-usd pull-right"style="color:#99ff33"></span></a></li>
				 <li><a href="<?php echo base_url('index.php/Download/contact') ?>" role="button" data-act-id="confirmation" target="_blank" >&nbsp;إتصل بنا <span class="glyphicon glyphicon-phone-alt pull-right"style="color:#99ff33"></span></a></li>
                      
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>