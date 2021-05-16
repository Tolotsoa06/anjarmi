<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="" enctype="multipart/form-data" id="formPartenaire">
                    <input type="hidden" class="form-control" name='id_partenaire'>
                    <div class="form-group">
                        <label>Nom partenaire</label>
                        <input type="text" class="form-control form-control-sm" name='nom' id="nom">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control form-control-sm" name='image' id="image">
                    </div>

                    <button type="submit" class="btn btn-primary btn-md" id="save"> Enregistrer</button>

                </form>
            </div>

            <div class="col-sm-8">
                <table class="table table-sm" id="table">
                    <thead>
                        <tr>
                            <th>Nom partenaire</th>
                            <th>Image</th>
                            <th>Action</th>
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
            "url" : "<?php echo base_url('admin/partenaire/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'nom'},
            {data : 'image'},
            {data : 'action'}
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
    $("#formPartenaire").on('submit', function () {
        var form = new FormData(this);
        var nom = $("#nom").val();
        var image = $("#image").val();
        if (nom && image) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/partenaire/save')?>',
                data: form,
                cache: true,
                contentType: false,
                processData:false,
                dataType: 'json',
                success: function (data) {
                    $("#id_activite").val('');
                    table.api().ajax.reload();
                    form[0].reset();
                }
            });            
        }
        return false;
      });

      function modifier(id_partenaire) {  
          if (id_partenaire) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/partenaire/getOne')?>",
                  data: {
                      id_partenaire: id_partenaire
                  },
                  dataType: "json",
                  success: function (data) {
                      $("input[name=nom]").val(data.nom);
                      $("input[name=image]").val(data.image);
                  }
              });
          }
      }

      function supprimerPart(id_partenaire) {
          if (id_partenaire) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/partenaire/delete')?>",
                  data: {
                      id_partenaire : id_partenaire
                  },
                  dataType: "json",
                  success: function (data) {
                    table.api().ajax.reload();
                  }
              });
          }
          return false;
      }

    
    </script>
    <?= $this->Endsection()?>
