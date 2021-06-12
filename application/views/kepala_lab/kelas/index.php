<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Kelas yang menggunakan ruang <?=$lab[0]->nama_ruang?></h4>
        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="75">Kelas</th>
                  <th>Mata Kuliah</th>
                  <th>Aslab</th>
                  <th>Jadwal</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php foreach ($kelas as $class): ?> -->
                <tr>
                  <td class="text-center"><?= $class->kom[0].$class->kom[1].'-'.$class->kom[4].$class->kom[5] ?></td>
                  <td><?= $class->nama_matkul ?></td>
                  <td><?= $class->nama ?></td>
                  <td><?= $class->jam_masuk ?></td>
                </tr>
               <!--  <?php endforeach; ?> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
  <script src="<?=base_url()?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
