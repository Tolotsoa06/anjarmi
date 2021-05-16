<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="" enctype="multipart/form-data" id="formActualite">
                    <input type="hidden" class="form-control" name='id_actualite'>
                    <div class="form-group">
                        <label for="">Type d'activité</label>
                        <input type="text" class="form-control form-control-sm" name='activite' id="activite">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control form-control-sm" name='description' id="description">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control form-control-sm" name='image' id="image">
                    </div>

                    <div class="form-group">
                        <label>Date d'evenement</label>
                        <input type="date" class="form-control form-control-sm" name='date_event' id="date_event">
                    </div>

                    <button type="submit" class="btn btn-primary" id="save"> Enregistrer</button>

                </form>
            </div>

            <div class="col-sm-8">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Activite</th>
                            <th>Description</th>
                            <th>Date evenement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>




<?= $this->Endsection()?>


<?= $this->section('script')?>

<script>
var table;
$(document).ready(function() {
    table = $('.table').dataTable({
        "ajax": {
            "url": "<?php echo base_url('admin/actualite/liste')?>",
            "dataSrc": "data"
        },
        "columns": [{
                data: 'activite'
            },
            {
                data: 'description'
            },
            {
                data: 'date_event'
            },
            {
                data: 'action'
            }
        ],
        "language": {
            "sEmptyTable": "Aucune donnée disponible dans le tableau",
            "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
            "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
            "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Afficher _MENU_ éléments",
            "sLoadingRecords": "Chargement...",
            "sProcessing": "Traitement...",
            "sSearch": "Rechercher :",
            "sZeroRecords": "Aucun élément correspondant trouvé",
            "oPaginate": {
                "sFirst": "Premier",
                "sLast": "Dernier",
                "sNext": "Suivant",
                "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": activer pour trier la colonne par ordre croissant",
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


$(".logOut").on('click', function() {
    logOut();
})
$("#formActualite").on('submit', function() {
    var form = new FormData(this);
    var activite = $("#activite").val();
    var description = $("#description").val();
    var date_event = $("#date_event").val();
    var image = $("#image").val();
    if (activite && description && image && date_event) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/actualite/save')?>',
            data: form,
            cache: true,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                $("#id_actualite").val('');
                table.api().ajax.reload();
                form[0].reset();
            }
        });
    }
    return false;
});

get_actualite();

function get_actualite() {
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('admin/actualite/get')?>',
        data: {
            getActivite: 1
        },
        dataType: 'json',
        success: function(data) {
            var text = "";
            data.forEach(element => {

                text += "<optiion value='" + element.id_activite + "'>" + element.titre +
                    "</option>";
            });
            $("#activite").empty();
            $("#activite").append(text);
        }


    });


}
</script>
<?= $this->Endsection()?>