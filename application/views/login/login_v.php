<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>البواية الرقمية للديوان</title>
    <!-- Tell the browser to be responsive to screen width -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/login_style.css">
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>

    <style>


    </style>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-header ">
                        <fieldset>
                            <legend>
                                تـسجيــل الدخــــول
                            </legend>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo site_url('Auth/login'); ?>" id="loginForm">
                            <div id="el"> </div>
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
    echo '<div  class="alert alert-warning alert-dismissible" id="message">';
    echo $message;
    echo '</div>';

}
?>
                            </br>
                            <form class="form-signin">
                                <div class="form-label-group">
                                    <input type="text" id="identifiant" name="identifiant" name="identifiant"
                                        class="form-control text-center" placeholder="إسم المستخدم" required autofocus>
                                    <label for="identifiant">إسم المستخدم</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password" name="password"
                                        class="form-control text-center" placeholder="كلمة المرور" required>
                                    <label for="password">كلمة المرور</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input class=" permission""
                                        id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">تذكر تسجيل الدخول
                                    </label>
                                </div>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase " type="submit">دخـــول
                                    <i class="fa fa-users"></i> </button>
                                <hr class="my-4">
                                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                        class="fab fa-google mr-2"></i> تسجيل جديد</button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                        class="fab fa-facebook-f mr-2"></i> نسيت كلمة المرور</button>
                            </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
    $(document).ready(function() {
        var validator = new FormValidator('loginForm', {
                name: 'identifiant',
                display: 'required',
                rules: 'required'
            }, {
                name: 'password',
                rules: 'alpha_numeric'
            },
            messages: {
                firstname: "    أدخل اسم المستخدم",
                lastname: "أدخل كلمة المرور"
            },

            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }




        });


    });
    </script>
</body>

</html>