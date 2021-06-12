<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Kelas</h4>
        </div>
        <div class="card-body">
          <div class="toolbar">
            <a href="<?=base_url()?>index.php/admin/kelas/create"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Data Baru</button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="75">Kelas</th>
                  <th>Mata Kuliah</th>
                  <th>Aslab</th>
                  <th>Hari</th>
                  <th>Pukul</th>
                  <th class="disabled-sorting text-right" width="285">Actions</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php foreach ($kelas as $class): ?> -->
                <tr>
                  <td class="text-center"><?= $class->kom[0].$class->kom[1].'-'.$class->kom[4].$class->kom[5] ?></td>
                  <td><?= $class->nama_matkul ?></td>
                  <td><?= $class->nama ?></td>
                  <td><?= $class->hari ?></td>
                  <td><?= $class->jam_masuk ?></td>
                  <td class="text-right">
                      <a class="btn btn-warning btn-link " target="_blank" href="<?=base_url()?>index.php/aslab/kehadiran/printdata/<?=$class->id_kelas?>"><i class="fa fa-print"></i> Praktikum</a>
                      <a class="btn btn-warning btn-link " target="_blank" href="<?=base_url()?>index.php/aslab/kehadiran/printujian/<?=$class->id_kelas?>"><i class="fa fa-print"></i> Ujian</a>
                      <a target="__blank" onclick="return alert('Data akan segera di Download')"  href="<?=base_url()?>index.php/admin/kelas/ekspor2/<?= $class->id_kelas ?>" class="btn btn-warning btn-link"><i class="fa fa-download"></i> Data Nilai</a>
                  </td>
                </tr>
               <!--  <?php endforeach; ?> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
          <div class="toolbar" style="float:right;">
          &nbsp;&nbsp;&nbsp;
          <a target="__blank"  href="<?=base_url()?>index.php/aslab/kehadiran/printjadwal"><button class="btn btn-success"><i class="fa fa-print"></i>&nbsp; jadwal</button></a>
          </div>
          <div class="toolbar" style="float:right;">
          &nbsp;&nbsp;&nbsp;
          <a target="__blank" onclick="return alert('Data akan segera di Download')"  href="<?=base_url()?>index.php/admin/kelas/ekspor" data-toggle="tooltip" title="Data akan disalin ke dalam excel"><button class="btn btn-warning"><i class="fa fa-download"></i>&nbsp; Data Kelas</button></a>
          </div>
          <div class="toolbar" style="float:right;">
          &nbsp;&nbsp;&nbsp;
          <a target="__blank" onclick="return confirm('Yakin data mahasiswa baru belum tersedia?')"  href="<?=base_url()?>assets/Tutorial%20Input%20data%20mahasiswa%20baru.pdf" data-toggle="tooltip" title="Dilakukan setiap awal semester ganjil"><button class="btn btn-info"><i class="fa fa-upload"></i>&nbsp; Tambah Mahasiswa Baru</button></a>
          </div>
          
          <div class="toolbar" style="float:right;">
          &nbsp;&nbsp;&nbsp;
          <a  onclick="return checkStuff();"  href="<?=base_url()?>index.php/admin/kelas/delete" data-toggle="tooltip" title="DATA AKAN DIHAPUS!" aria-label="close"><button class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Reset Data</button></a>
          </div>
    </div>
  </div>
</div>
  <script type="text/JavaScript">
  <!-- Chief...
  function checkStuff()
  {
    var check1=confirm("Pastikan Anda Telah Mendownload Seluruh Data");
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
