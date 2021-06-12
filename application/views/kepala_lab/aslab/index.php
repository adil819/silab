<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Kehadiran Praktikan</h4>
        </div>
        <div class="card-body">
        
        <div id="accordion">
<?php $k=0; foreach ($aslab as $key): ?>
      <div class="card">
        <div class="card-header">
            <a style="font-size: 25px;color: #0c0c0b;font-weight: 500;" class="card-link" data-toggle="collapse" href="#collapse<?=$k?>">
              <span class="fa fa-caret-down"></span>&nbsp;&nbsp;&nbsp;
              <small><b> <?=$key->nama?> (<?=$key->nama_matkul?>) <?=$key->kom[0].$key->kom[1].' '.$key->kom[2].$key->kom[3].$key->kom[4].$key->kom[5]?></b></small>
            </a>
           <!--  <a href="#"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Data Baru</button></a> --> 
        </div>
        <div id="collapse<?=$k?>" class="collapse" data-parent="#accordion">
        <div class="card-body">          
          <?php ?>
          <!-- loop setiap pertemuan -->
          <?php 
          if(isset($pertemuan_ke[$key->id_kelas][0]['pertemuan_ke'])){
          for($j=1; $j<=$pertemuan_ke[$key->id_kelas][0]['pertemuan_ke']; $j++){ ?> 
          <span><b>Pertemuan Ke <?= $j ?> </b></span>
          <div class="table-responsive-sm">
            <table id="" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th class="disabled-sorting" width="200">NIM Mahasiswa</th>
                  <th class="disabled-sorting" width="400">Nama Mahasiswa</th>
                  <th class="disabled-sorting text-center">Status</th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach ($absen[$key->id_kelas] as $row): 
                if($row->pertemuan_ke == $j){?> 
                <tr>
                  <td class="text-center"><?=$i?></td>
                  <td><?=$row->nim?></td>
                  <td><?=$row->nama?></td>
                  <td class="text-center">
                  <?php 
                  if ($row->status == 'hadir')
                     echo "<span class='badge badge-pill badge-success'>Hadir</span>";
                  else if ($row->status == 'alpa') 
                    echo "<span class='badge badge-pill badge-danger'>Alpa</span>";
                  else if ($row->status == 'sakit') 
                    echo "<span class='badge badge-pill badge-warning'>Sakit</span>";
                  else if ($row->status == 'izin') 
                    echo "<span class='badge badge-pill badge-warning'>Izin</span>";

                  ?>
                    <!-- <a href="<?php echo base_url();?>index.php/dosen/matakuliah/update/<?=$row->nim?>" class="btn btn-warning btn-link btn-icon">
                    <i class="fa fa-edit"></i>
                    </a> -->
                  </td>
                </tr>
              <?php }
               $i++; endforeach; ?> 
              </tbody>
            </table>
          </div>
          </div>
          <?php } }
          else{
            echo '<strong>&nbsp;&nbsp;&nbsp;&nbsp;Keterangan: Semua Praktikan Selalu Hadir</strong><br/></div>';
          }?>
          </div>
          </div>
          <?php $k++; endforeach;  ?>
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
