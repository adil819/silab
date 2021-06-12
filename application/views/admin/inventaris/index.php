<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Inventaris Laboratorium</h4>
        </div>
        <div class="card-body">
<div id="accordion">
<?php $k=0; foreach($lab as $key){ ?>

<div class="content">
  <div class="row">
   <div class="col-md-12">
      
   <div class="card">
    <div class="card-header">
                <a style="font-size: 25px;color: #0c0c0b;font-weight: 400;" class="card-link" data-toggle="collapse" href="#collapse<?=$k?>">
        <div class="card-header">
          <span class="fa fa-caret-down"></span>&nbsp;&nbsp;&nbsp;
          <strong class="card-title"> Inventaris Ruang <?=$key->nama_ruang?></strong>
        </div>
                </a>
    </div>
    <div id="collapse<?=$k?>" class="collapse" data-parent="#accordion">
        <div class="card-body">

          <div class="toolbar">
            <a href="<?=base_url()?>index.php/admin/inventaris/create/<?=$key->id_ruang?>"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Data Baru</button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable<?=$k?>" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Kondisi</th>
                </tr>
              </thead>
              <tbody>
               <?php $i=1; foreach ($aset[$key->id_ruang] as $row): ?>
                <tr>
                  <td class="text-center"><?=$i?></td>
                  <td><?=$row->nama_barang?></td>
                  <td><?=$row->jumlah?></td>
                  <td><?=$row->kondisi?></td>
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
</div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable<?=$k?>').DataTable({
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

      var table = $('#datatable<?=$k?>').DataTable();

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
  <?php $k++;} ?>
  </div>
  </div>
    </div>
  </div>
  </div>
</div>