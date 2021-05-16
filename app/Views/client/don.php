<?php
  use App\Controllers\Client\Home;
?>

<?= $this->extend('page/header')?>
<?= $this->section('contenu')?>

<section id="services" class="services">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Donation</h2>
            <h3>Effectué un donation</h3>
        </div>

        <form id="formDonation">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            1- Choisir le type de Donation
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="id_don" name="id_don" class="form-control form-control-sm">
                            <div class="form-group">
                            <select name="type_don" id="type_don" class="form-control form-control-sm">
                                <option value=""></option>
                                <option value="annuel">Annuel</option>
                                <option value="mensuel">Mensuel</option>
                                <option value="journaliaire">Journaliaire</option>
                            </select>
                            </div>
                           

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            2- Information du Donateur
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control form-control-sm" required>
                            </div>

                            <div class="form-group">
                                <label for="">Adresse</label>
                                <input type="text" id="adresse" name="adresse" class="form-control form-control-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-sm"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="">Telephone</label>
                                <input type="text" id="telephone" name="telephone" class="form-control form-control-sm"
                                    required>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            3- Choisir le type de Payement
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select name="type_payement" id="type_payement" class="form-control form-control-sm">
                                    <option value=""></option>
                                    <option value="carte vise">Par carte visa</option>
                                    <option value="compte privé">Par compte privé</option>
                                    <option value="mobile money">Par lobile money</option>
                                </select>
                            </div>
                            <hr>
                            <ul>
                                <li>
                                    <span class="fa fa-check-circle">Pour le payment en <b>Carte Visa et le Compte
                                            Sercret</b> Veuillez contacté le <a
                                            href="http://contact@Arato.mg">contact@Arato.mg</a></span>
                                </li>
                                <li>
                                    <span class="fa fa-check-circle">Pour le payment en <b>Mobile Money</b> Veuillez
                                        contacté le <a href="#">+261 034 94 521 80 ou +261 034 10 058 68</a></span>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary" id="save"> <span class="fa fa-save"> Effectuer la
                            donation</span></button>
                </div>


        </form>

    </div>
    </div>
    </div>
</section>
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script>
$("#formDonation").on('submit', function() {
    var form = $(this);
    var type_don = $("#type_don").val();
    var nom = $("#nom").val();
    var adresse = $("#adresse").val();
    var email = $("#email").val();
    var telephone = $("#telephone").val();
    var payement = $("#type_payement").val();
    if (type_don && nom && adresse && email && telephone && payement) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('client/don/save')?>",
            data: form.serialize(),
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#id_don").val('');
                form[0].reset();
            }
        });
    }
    return false;
});
</script>

<?= $this->Endsection()?>