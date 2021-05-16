<?php
  use App\Controllers\Client\Home;
?>

<?= $this->extend('page/header')?>
<?= $this->section('contenu')?>
<section class="apropos">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Présentation</h2>
        </div>

        <div class="row content" id="accueil"></div>
    </div>
</section>


<?= $this->Endsection()?>