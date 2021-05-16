<?= $this->extend('page/layout')?>
<?= $this->section('contenu')?>
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form id="formForum">
                    <input type="hidden" class="form-control" name='id_forum'>
                    <div class="form-group">
                        <label>Sujet</label>
                        <input type="text" class="form-control form-control-sm" name='sujet' id="sujet">
                    </div>
                    <div class="form-group">
                        <label>Lieu</label>
                        <input type="text" class="form-control form-control-sm" name='lieu' id="lieu">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control form-control-sm" name='date_forum' id="date_forum">
                    </div>

                    <div class="form-group">
                        <label>Heure</label>
                        <input type="time" class="form-control form-control-sm" name='heure' id="heure">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm" id="save"> Enregistrer</button>

                </form>
            </div>

            <div class="col-sm-8">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Sujet</th>
                            <th>lieu</th>
                            <th>Date</th>
                            <th>heure</th>
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
            "url" : "<?php echo base_url('admin/forum/liste')?>",
            "dataSrc" : "data"
        },
        "columns": [
            {data : 'sujet'},
            {data : 'lieu'},
            {data : 'date'},
            {data : 'heure'},
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
    $("#formForum").on('submit', function () {
        var form = $(this);
        var sujet = $("#sujet").val();
        var lieu = $("#lieu").val();
        var heure = $("#heure").val();
        var date = $("#date_forum").val();
        if (sujet && lieu && date && heure) {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/forum/save')?>',
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {
                    $("#id_forum").val('');
                    table.api().ajax.reload();
                    form[0].reset();
                }
            });            
        }
        return false;
      });

      function modifier(id_forum) {  
          if (id_forum) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/forum/getOne')?>",
                  data: {
                      id_forum: id_forum
                  },
                  dataType: "json",
                  success: function (data) {
                      $("input[name=sujet]").val(data.sujet);
                      $("input[name=lieu]").val(data.lieu);
                      $("input[name=date_forum]").val(data.date_forum);
                      $("input[name=heure]").val(data.heure);
                  }
              });
          }
      }

      function supprimer(id_forum) {
          if (id_forum) {
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('admin/forum/delete')?>",
                  data: {
                      id_forum : id_forum
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