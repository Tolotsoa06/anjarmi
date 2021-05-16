<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Anjarmi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Vesperr - v3.0.3
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <a href="index.html"><img src="<?php echo base_url('/assets/img/logo.jpg')?>" alt="logo" style="width: 50px; height: 60px;" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?php echo base_url('/')?>">Accueil</a></li>
                    <li><a href="<?php echo base_url('client/apropos')?>">A-propos</a></li>
                    <li><a href="<?php echo base_url('client/activite')?>">Activité</a></li>
                    <li><a href="<?php echo base_url('client/site')?>">Site d'intervention</a></li>
                    <li><a href="<?php echo base_url('client/don')?>">Don</a></li>
                    <li><a href="<?php echo base_url('client/forum')?>">Forum</a></li>
                    <li><a href="<?php echo base_url('client/actualite')?>">Actualite</a></li>
                    <li><a href="<?php echo base_url('client/partenaire')?>">Partenaire</a></li>
                    <li><a href="<?php echo base_url('client/contact')?>">Contact</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up"><span>Actions nationales des jeunes ambutieux responsable,</span><br>
                    <span>ayant une moralité irreprochable</span>
                    </h1>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="/assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>

    <?= $this->renderSection('contenu')?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Arato-2021</strong>. 
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
                        Designed by <a href="https://arato.mg/">ARATO</a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counterup/counterup.min.js"></script>
    <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/venobox/venobox.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <script>
    $(document).ready(function() {
        afficher();
        afficherActivite();

       
    });

    function afficher() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('partenaire/get')?>',
            data: {
                getPartenaire: 1
            },
            dataType: 'json',
            success: function(data) {
                let text = "";
                data.forEach(element => {
                    text += "<div class='col-md-2'>" +
                        "<img src='<?php echo base_url('/public/partenaire')?>/" +
                        element.image + "' style='width:160px'>"+
                        "</div>";
                });

                $("#partenaire").empty();
                $("#partenaire").append(text);

            }
        });

    }

    function afficherActivite() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('activite/get')?>',
            data: {
                getActivite: 1
            },
            dataType: 'json',
            success: function(data) {
                var texte = "";
                data.forEach(element => {
                    texte +=
                        "<div class='col-md-6 d-flex align-items-stretch mt-3' >" +
                        "<div class='card' style=\"background-image: url('<?php echo base_url('/upload/activite')?>/" +
                        element.image + "');\" data-aos='fade-up' data-aos-delay='100'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href=''>" + element.titre + "</a></h5>" +
                        " <p class='card-text'>" + element.description + "</p>" +
                        " </div>" +
                        "</div>" +
                        "</div> ";

                });
                $("#activite").empty();
                $("#activite").append(texte);
            }
        });
    }
    afficherActualite();
    function afficherActualite() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('actualite/get')?>',
            data: {
                getActualite: 1
            },
            dataType: 'json',
            success: function(data) {
                var texte = "";
                data.forEach(element => {
                    texte +=
                        "<div class='col-md-6 d-flex align-items-stretch mt-3' >" +
                        "<div class='card' style=\"background-image: url('<?php echo base_url('/upload/actualite')?>/" +
                        element.image + "');\" data-aos='fade-up' data-aos-delay='100'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href=''>" + element.activite + "</a></h5>" +
                        " <p class='card-text'>" + element.description +  ',le'  +element.date_event+ "</p>" +
                        " </div>" +
                        "</div>" +
                        "</div> ";

                });
                $("#actualite").empty();
                $("#actualite").append(texte);
            }
        });
    }

    AfficherForum();

    function AfficherForum() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('forum/get')?>",
            data: {
                getForum: 1
            },
            dataType: "json",
            success: function(data) {
                var texte = "";
                data.forEach(element => {
                    var date = new Date();
                    date.toDateString("" + element.date_forum + "");
                    texte +=
                        " <div class='col-md-6 col-lg-4 d-flex align-items-stretch mb-6 mb-lg-1'>" +
                        "<div class='icon-box' data-aos='fade-up' data-aos-delay='100'>" +
                        " <div class='icon'><i class='bx bxl-dribbble'></i></div>" +
                        " <h4 class='title'><a href=''>" + element.sujet + "</a></h4>" +
                        "<p class='description' style='text-align:justify;'>Qui aura lieu au " +
                        element.lieu + " le " + date + " a partir de " + element.heure + "</p>" +
                        "</div>" +
                        "</div>";
                });
                $("#forum").empty();
                $("#forum").append(texte);

            }
        });
    }

    afficherApropos();

    function afficherApropos() {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('apropos/get_apropos')?>",
            data: {
                getAll: 1
            },
            dataType: "json",
            success: function(data) {
                var afficher = "";
                var i = 0;
                data.forEach(element => {
                    if (i % 2 == 0) {
                        afficher +=
                        "<div class='col-lg-6 aos-init aos-animate mt-3' data-aos='fade-up' data-aos-delay='150'>" +
                        "<img class='rounded img-fluid' src='<?php echo base_url('/public/apropos')?>/" +
                        element.image + "' alt='' style='width:100%'>" +
                        "</div>"+
                        "<div class='col-lg-6 aos-init aos-animate mt-2' data-aos='fade-up' data-aos-delay='150'>" +
                        "<p style='text-align:justify'>'" + element.text + "'</p>" +

                        "</div>";
                        
                    }else{
                        afficher +=
                        "<div class='col-lg-6 aos-init aos-animate mt-2' data-aos='fade-up' data-aos-delay='150'>" +
                        "<p style='text-align:justify'>'" + element.text + "'</p>" +

                        "</div>" +
                        "<div class='col-lg-6 aos-init aos-animate mt-3' data-aos='fade-up' data-aos-delay='150'>" +
                        "<img class='rounded img-fluid' src='<?php echo base_url('/public/apropos')?>/" +
                        element.image + "' alt='' style='width:100%'>" +
                        "</div>";
                    }
                    
                    
                        i++;
                });

                $("#apropos").empty();
                $("#apropos").append(afficher);

            }
        });
    }
    afficherSite();

    function afficherSite() { 

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('site/get_site')?>",
            data: {
                getAll : 1
            },
            dataType: 'json',
            success: function (data) {
                var texte = "";
                data.forEach(element => {
                    texte +=
                        "<div class='col-md-6 d-flex align-items-stretch mt-3' >" +
                        "<div class='card' style=\"background-image: url('<?php echo base_url('/public/site')?>/" +
                        element.image + "');\" data-aos='fade-up' data-aos-delay='100'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href=''>" + element.zone + "</a></h5>" +
                        " </div>" +
                        "</div>" +
                        "</div> ";

                });
                $("#site").empty();
                $("#site").append(texte);
            }
        });
     }

     afficherAccueil();
     function afficherAccueil() { 
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('get_all')?>",
            data: {
                getAll: 1
            },
            dataType: "json",
            success: function (data) {
                var afficher ="";
                data.forEach(element => {
                    afficher += 
                    "<div class='col-lg-6 aos-init aos-animate mt-2' data-aos='fade-up' data-aos-delay='150'>" +
                    "</div>"+
                    "<div class='col-lg-6 aos-init aos-animate mt-2' data-aos='fade-up' data-aos-delay='150'>" +
                        "<p style='text-align:justify'>'" + element.text + "'</p>" +

                        "</div>";
                        
                });

                $("#accueil").empty();
                $("#accueil").append(afficher);
            }
        });
      }

      
    </script>

</body>

</html>