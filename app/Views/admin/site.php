<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="" enctype="multipart/form-data" id="formSite">
                    <input type="hidden" class="form-control" name='id_site'>
                    <div class="form-group">
                        <label>Zone ou Region</label>
                        <input type="text" class="form-control form-control-sm" name='zone' id="zone">
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
                            <th>Zone</th>
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
            "url" : "<?php echo base_url('admin/site/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'zone'},
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
    $("#formSite").on('submit', function () {
        var form = new FormData(this);
        var zone = $("#zone").val();
        var image = $("#image").val();
        if (zone && image) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/site/save')?>',
                data: form,
                cache: true,
                contentType: false,
                processData:false,
                dataType: 'json',
                success: function (data) {
                    $("#id_site").val('');
                    table.api().ajax.reload();
                    form[0].reset();
                }
            });            
        }
        return false;
      });

      function modifier(id_site) {  
          if (id_site) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/site/getOne')?>",
                  data: {
                      id_site: id_site
                  },
                  dataType: "json",
                  success: function (data) {
                      $("input[name=zone]").val(data.zone);
                      $("input[name=image]").val(data.image);
                  }
              });
          }
      }

      function supprimer(id_site) {
          if (id_site) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/site/delete')?>",
                  data: {
                      id_site : id_site
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