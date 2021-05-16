<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anjarmi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="formLogin" enctype="multipart/form-data">
                    <span class="login100-form-title p-b-26">
                        Inscription
                    </span>
                    <input type="hidden" name="id_users" id="id_users" placeholder="Votre Nom" required />
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="nom_users" id="nom_users">
                        <span class="focus-input100" data-placeholder="Nom"></span>
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="usersname" id="usersname">
                        <span class="focus-input100" data-placeholder="Nom d'utilisateur"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Entrer le mot de passe">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="pass" id="pass">
                        <span class="focus-input100" data-placeholder="Mot de passe"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="file" name="profile_image" id="profile_image">
                        <span class="focus-input100" data-placeholder="Photo de profil"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" id="save">
                                enregistrer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    <script>
    $(document).ready(function() {
        $("#formLogin").on('submit', function() {
            var nom_users = $("#nom_users").val();
            var usersname = $("#usersname").val();
            var pass = $("#pass").val();
            var profile_image = $("#profile_image").val();
            var form = new FormData(this);

            if (nom_users && usersname && pass && profile_image) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('login/newUsers/save')?>',
                    data: form,
                    cache: true,
                    contentType: false,
                    processData:false,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $("#id_users").val('');
                        form[0].reset();
                        window.location.href = '<?php echo base_url('login/users')?>';
                    }
                });
            }
            return false;
        });

    });
    </script>

</body>

</html>