<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=kelas.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>

<tr>

 <th></th>
 <div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <a href="<?=base_url()?>index.php/admin/kelas/create"><button class="btn btn-success"><i class="fa fa-plus"></i> </button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="75">Kelas</th>
                  <th>Mata Kuliah</th>
                  <th>Aslab</th>
                  <th>Hari</th>
                  <th>Jadwal</th>
                  <th>nidn</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php foreach ($kelas as $class): ?> -->
                <tr>
                  <td class="text-center"><?= $class->kom[0].$class->kom[1].'-'.$class->kom[4].$class->kom[5] ?></td>
                  <td><?= $class->nama_matkul ?></td>
                  <td><?= $class->nama ?></td>
                  <td><?= $class->hari ?></td>
                  <td><?= $class->jam_masuk ?>
                  <?php
                    if($class->jam_masuk%1==0) echo 'WIB';
                  ?></td>
                  <td><?= $class->nidn ?></td>
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
  <script type="text/JavaScript">
  <!-- Chief...
  function checkStuff()
  {
    var check1=confirm("DATA YANG TELAH DIHAPUS TIDAK DAPAT DIKEMBALIKAN!");
    if (check1)
    {
      var check2=confirm("============================================= SEMUA DATA DISEMESTER INI BENAR-BENAR AKAN DIHAPUS! YAKIN? =============================================                                        cancel untuk membatalkannya");
      if (check2)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    else
    {
      return false;
    }
  }
  -->
  </script>
  <script type="text/javascript">
    $('.close').alert();
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
  <script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });
  </script>
  <script src="<?=base_url()?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
