<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Kehadiran Praktikan Pekan Ini</h4>
        </div>
        <div class="card-body">

        <div id="accordion">
        <?php $i = 0; $k = 0; 
if(isset($mhs[$k]->id_kelas)){
foreach ($praktikan as $rows): 
  if(isset($rows[0])){?>
      <div class="card">
      
        <form class="form-horizontal" action="<?=base_url()?>index.php/aslab/kehadiran/insert" method="POST">
                          <input type="number" class="form-control" name="pertemuan_ke" value="<?php if(isset($pertemuan_ke[$k][0]['pertemuan_ke'])) echo $pertemuan_ke[$k][0]['pertemuan_ke']+1; else echo 1?>" required="" hidden>
                          <input type="number" class="form-control" name="id_kelas" value="<?= $mhs[$k]->id_kelas ?>" required="" hidden>
          <div class="card-header">
            <a style="font-size: 20px;color: #0c0c0b;font-weight: 500;" class="card-link" data-toggle="collapse" href="#collapse<?=$k?>">
            <span class="fa fa-caret-down"></span>&nbsp;&nbsp;&nbsp;
            <strong><?=$matkul[$k][0]->nama_matkul?> (<?=$rows[0]->kom[0].$rows[0]->kom[1]?>)</strong> Semester 3 <?=$rows[0]->angkatan?> <strong style="float:right">Pertemuan Ke - <?php if(isset($pertemuan_ke[$k][0]['pertemuan_ke'])) echo $pertemuan_ke[$k][0]['pertemuan_ke']+1; else echo 1;?> </strong>
            </a>
          </div>
          <div id="collapse<?=$k?>" class="collapse" data-parent="#accordion">
            <div class="card-body">

              <div class="toolbar">
                <button type="submit" data-toggle="tooltip" title="Absensi pekan ini" onclick="confirm('Absensi yang telah dikumpul tidak dapat diambil kembali')" class="btn btn-warning" value="submit"><i class="fa fa-plus"></i> &nbsp; Kumpul Absensi Digital</button>
              </div>
              <div class="table-responsive-sm">
                <table id="datatable<?=$k?>" class="table table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="80">Nim</th>
                      <th width="300">Daftar Mahasiswa</th>
                      <th width="30">Sakit</th>
                      <th width="30">Izin</th>
                      <th width="30">Absen</th>
                      <th class="disabled-sorting text-right" width="400">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php //$i = 0 ?>
                    <?php foreach ($rows as $row): ?>
                      <tr>
                        <td class="text-center"><?=$row->nim?></td>
                        <td><?=$row->nama?></td>
                        <td><?php if(isset($sakit[$row->nim][0]['jumlah'])) echo $sakit[$row->nim][0]['jumlah']; else echo '-' ?></td>
                        <td><?php if(isset($izin[$row->nim][0]['jumlah'])) echo $izin[$row->nim][0]['jumlah']; else echo '-' ?></td>
                        <td><?php if(isset($alpa[$row->nim][0]['jumlah'])) echo $alpa [$row->nim][0]['jumlah']; else echo '-' ?></td>
                        <td class="text-right">
                            <input type="text" class="form-control" name="nim[<?=$i?>]" value="<?=$row->nim?>" required="" hidden>
                            <!-- <input type="radio" name="status[<?=$i?>]" value="hadir"> Hadir &nbsp;&nbsp;
                            <input type="radio" name="status[<?=$i?>]" value="sakit" > Sakit &nbsp;&nbsp;
                            <input type="radio" name="status[<?=$i?>]" value="izin" > Izin &nbsp;&nbsp;
                            <input type="radio" name="status[<?=$i?>]" value="alpa "> Absen -->
                        <div class="custom-control custom-radio" style="float:right;">
                          <input type="radio" class="custom-control-input" id="alpa[<?=$i?>]" name="status[<?=$i?>]" value="alpa" >
                          <label style="color:red;padding-top: 4px;" class="custom-control-label radio-inline" for="alpa[<?=$i?>]">Alpa</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-radio" style="float:right;">
                          <input type="radio" class="custom-control-input" id="izin[<?=$i?>]" name="status[<?=$i?>]" value="izin" >
                          <label style="padding-top: 4px;" class="custom-control-label radio-inline" for="izin[<?=$i?>]">Izin</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-radio" style="float:right;">
                          <input type="radio" class="custom-control-input" id="sakit[<?=$i?>]" name="status[<?=$i?>]" value="sakit" >
                          <label style="padding-top: 4px;" class="custom-control-label radio-inline" for="sakit[<?=$i?>]">Sakit</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-radio" style="float:right; color:black;">
                          <input type="radio" class="custom-control-input" id="hadir[<?=$i?>]" name="status[<?=$i?>]" value="hadir" checked>
                          <label style="color:blue;padding-top: 4px;" class="custom-control-label radio-inline" for="hadir[<?=$i++?>]">Hadir</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                          
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable<?=$k?>').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [-1 , 10, 25, 50],
          ["All", 10, 25, 50]
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
<?php $k++; } endforeach; }else echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kelas belum terdaftar"?>
      </div>
      </div>
    </div>
  </div>
</div>
</div>


