<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Cari Praktikan</h4>
        </div>
        <div class="card-body">

          <div class="toolbar">
          
          <div class="input-wrap">
	<form action="<?=base_url()?>index.php/dosen/search" class="form-box d-flex justify-content-between" method="GET">
		<input type="text" placeholder="Masukkan nama atau nim praktikan" class="form-control" name="key" style="    height: 42px;margin-top: 10px;margin-right: 10px;">
		<button type="submit" class="btn search-btn btn-info btn-icon" style="width:40px;height:40px;"><i class="nc-icon nc-zoom-split" style="font-size:25px;"></i></button>
	</form>
  </div>          <br/>

          </div>
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th class="disabled-sorting" width="60">Gambar</th>
                  <th width="300">Nama</th>
                  <th width="100">Nim</th>
                  <th width="100">Angkatan</th>
                  <th class="disabled-sorting text-right">Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; if(isset($data)){foreach ($data as $row): ?>
                <tr><td class="text-center"><?=$i++?></td>
                  <td class="text-center"><img src="https://portal.usu.ac.id/photos/<?=$row->nim?>.jpg" height="100" alt="gambar tidak tersedia"></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->nim ?></td>
                  <td><?= $row->angkatan ?></td>
                  <td class="text-right">
                    <a href="#" class="btn btn-info btn-link btn-icon" onclick="showAjaxModal('<?php echo base_url();?>index.php/dosen/search/detail/<?=$row->nim?>');">
                      <i class="fa fa-search-plus"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; }?>
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
