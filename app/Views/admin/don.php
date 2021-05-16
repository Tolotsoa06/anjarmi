<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <h3 style="text-align: center;">Liste des personne qui ont fait la donation</h3>
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Nom donateur</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Type de donation</th>
                            <th>Type de payement</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>

    </div>


    <?= $this->Endsection()?>
    
    <?= $this->section('script')?>
    <script>
    var table;
    $(document).ready(function() {
        table = $('.table').dataTable({
            "ajax" : {
            "url" : "<?php echo base_url('admin/don/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'nom'},
            {data : 'adresse'},
            {data : 'telephone'},
            {data : 'email'},
            {data : 'type_don'},
            {data : 'type_payement'}
        ],
        "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "Rechercher :",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées",
                            "0": "Aucune ligne sélectionnée",
                            "1": "1 ligne sélectionnée"
                        } 
                }
            }

        });

       
    });

    </script>
<?= $this->Endsection()?>