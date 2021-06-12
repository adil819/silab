<div class="content" style="margin-top: 0px;">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Inventaris Ruang Multimedia</h4>
        </div>
        <div class="card-body">

          <div class="toolbar">
            <a href="<?=base_url()?>index.php/admin/inventaris/create"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Data Baru</button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable2" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Kondisi</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
               <?php $i=1; foreach ($aset as $row): ?>
                <tr>
                  <td class="text-center"><?=$i?></td>
                  <td><?=$row->nama_barang?></td>
                  <td><?=$row->jumlah?></td>
                  <td><?=$row->kondisi?></td>
                  <td class="text-right">
                  </td>
                </tr>
               <?php $i++; endforeach; ?>
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
      $('#datatable2').DataTable({
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

      var table = $('#datatable2').DataTable();

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
