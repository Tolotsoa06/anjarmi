<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="" enctype="multipart/form-data" id="formPropos">
                    <input type="hidden" class="form-control" name='id_apropros'>
                    <div class="form-group">
                        <label>Text</label>
                        <input type="text" class="form-control form-control-sm" name='text' id="text">
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
                            <th>Text</th>
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
            "url" : "<?php echo base_url('admin/apropos/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'text'},
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
    $("#formPropos").on('submit', function () {
        var form = new FormData(this);
        var text = $("#text").val();
        var image = $("#image").val();
        if (text && image) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/apropos/save')?>',
                data: form,
                cache: true,
                contentType: false,
                processData:false,
                dataType: 'json',
                success: function (data) {
                    $("#id_apropos").val('');
                    table.api().ajax.reload();
                    form[0].reset();
                }
            });            
        }
        return false;
      });
      function modifier(id_apropros) {  
          if (id_apropros) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/apropos/getOne')?>",
                  data: {
                      id_apropros: id_apropros
                  },
                  dataType: "json",
                  success: function (data) {
                      $("input[name=text]").val(data.text);
                      $("input[name=image]").val(data.image);
                  }
              });
          }
      }

      function supprimer(id_apropros) {
          if (id_apropros) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/apropos/delete')?>",
                  data: {
                      id_apropros : id_apropros
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