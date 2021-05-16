<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anjarmi</title>
    <link rel="stylesheet" href="<?php echo base_url('admin/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('admin/css/datatables.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('admin/css/datatables-select.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('admin/css/main.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('admin/font-awesome/css/font-awesome.min.css')?>">

</head>

<body class="fixed-top">
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="logo-element">
                            A
                        </div>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/accueil')?>"><i class="fa fa-home"></i> <span
                                class="nav-label">Accueil</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/apropos')?>"><i class="fa fa-book"></i> <span
                                class="nav-label">Apropos</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/activite')?>"><i class="fa fa-adn"></i> <span
                                class="nav-label">Activite</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/actualite')?>"><i class="fa fa-adn"></i> <span
                                class="nav-label">Actualite</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/don')?>"><i class="fa fa-money"></i> <span
                                class="nav-label">Donation</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/partenaire')?>"><i class="fa fa-pagelines"></i> <span
                                class="nav-label">Partenaire</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/forum')?>"><i class="fa fa-th-large"></i> <span
                                class="nav-label">Forum</span></a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url('admin/site')?>"><i class="fa fa-plane"></i> <span
                                class="nav-label">Site d'intervention</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="" onclick="logOut();">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <?= $this->renderSection('contenu')?>

            <div class="footer">
                <div>
                    <strong>Copyright</strong> ARATO &copy; 2021
                </div>
            </div>

        </div>
    </div>




    <script src="<?php echo base_url('/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/mdb.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/jquery-3.4.1.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/datatables.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/pace.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('/admin/js/jquery.metisMenu.js')?>"></script>

    <script>
    $(document).ready(function() {
        getLogin();
    });

    function getLogin() {
        if (window.sessionStorage.getItem('id_users')) {

        } else {
            window.location.href = '<?php echo base_url('login/users')?>';
        }
    }

    function logOut() {
        window.localStorage.clear();
        window.location.href = '<?php echo base_url('login/users')?>';
    }
    </script>

<?= $this->renderSection('script')?>

</body>

</html>