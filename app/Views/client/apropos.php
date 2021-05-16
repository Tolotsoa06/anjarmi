<?php
  use App\Controllers\Client\Home;
?>

<?= $this->extend('page/header')?>
<?= $this->section('contenu')?>
<section class="apropos">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>A-Propos</h2>
            <h3>A propos de notre organisation</h3>
        </div>

        <div class="row content" id="apropos"></div>
    </div>
</section>


<?= $this->Endsection()?>