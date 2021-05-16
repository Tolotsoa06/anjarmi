<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="" enctype="multipart/form-data" id="formActivite">
                    <input type="hidden" class="form-control" name='id_activite'>
                    <div class="form-group">
                        <label>Type activité</label>
                        <input type="text" class="form-control form-control-sm" name='titre' id="titre">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control form-control-sm" name='description' id="description">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control form-control-sm" name='image' id="image">
                    </div>

                    <button type="submit" class="btn btn-primary" id="save"> Enregistrer</button>

                </form>
            </div>

            <div class="col-sm-8">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Type d'activités</th>
                            <th>Description</th>
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
            "url" : "<?php echo base_url('admin/activite/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'titre'},
            {data : 'description'},
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
    $("#formActivite").on('submit', function () {
        var form = new FormData(this);
        var type = $("#titre").val();
        var description = $("#description").val();
        var image = $("#image").val();
        if (type&& description && image) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/activite/save')?>',
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

      function modifier(id_activite) {  
          if (id_activite) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/activite/getOne')?>",
                  data: {
                      id_activite: id_activite
                  },
                  dataType: "json",
                  success: function (data) {
                      $("input[name=titre]").val(data.titre);
                      $("input[name=description]").val(data.description);
                      $("input[name=image]").val(data.image);;
                  }
              });
          }
      }

      function supprimer(id_activite) {
          if (id_activite) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/activite/delete')?>",
                  data: {
                      id_activite : id_activite
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