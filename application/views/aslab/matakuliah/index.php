<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Penilaian Praktikan</h4>
        </div>
        <div class="card-body">

        <div id="accordion">
                          <?php $i = 0; $k = 0; 
                          if(isset($matkul)){
                          foreach ($praktikan as $rows): 
                            if(isset($rows[0])){?>
          <div class="card">
              <div class="card-header">
                <a style="font-size: 20px;color: #0c0c0b;font-weight: 500;" class="card-link" data-toggle="collapse" href="#collapse<?=$k?>">
                  <span class="fa fa-caret-down"></span>&nbsp;&nbsp;&nbsp;
                  <b><?=$matkul[$k][0]->nama_matkul?> (<?=$rows[0]->kom[0].$rows[0]->kom[1]?>)</b> &nbsp;&nbsp;Semester 3 <?=$rows[$k]->angkatan?>
                </a>
              </div>
              <div id="collapse<?=$k?>" class="collapse" data-parent="#accordion">
                <div class="card-body">
               
                  <form class="form-horizontal" action="<?=base_url()?>index.php/aslab/matakuliah/update_nilai/<?= $mhs[$k]->id_kelas ?>" method="post">
                          <input type="number" class="form-control" name="id_kelas" value="<?= $mhs[$k]->id_kelas ?>" required="" hidden>

                    <div class="toolbar">
                    <a href="#"><button type="submit" class="btn btn-success" style="margin-top: -1px; margin-left: 00px"></i> SIMPAN</button></a>
                    <a href="#"><button type="button" class="btn btn-info" style="margin-top: -1px" data-toggle="modal" data-target="#myModal<?=$mhs[$k]->id_kelas?>"></i> Jenis Penilaian </button></a>
                    <a class="btn btn-warning" href="<?=base_url().'index.php/aslab/matakuliah/print/'.$mhs[$k]->id_kelas?>" style="margin-top: -1px; margin-left: 00px"><i class="fa fa-print"></i>CETAK</a>
                    </div>
                    <div class="table-responsive-sm">
                      <table id="datatable<?=$k?>" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="80">Nim</th>
                            <th width="300">Daftar Mahasiswa</th>
                            <?php 		foreach ($jenis[$k] as $key) {
                                        echo '<th width="50">'. $key->jenis_penilaian .' </th>';
                                      }
                            ?>
                            <th width="70">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=0; foreach ($rows as $row): $temp = 0?>
                            <tr>
                              <td class="text-center"><?=$row->nim?></td>
                              <td><?=$row->nama?></td>
                            <?php 		//foreach ($nilai as $key) {
                                      // echo '<td width="50">'. $nilai['Kuis']['171402001'][0]->nilai .' </td>';
                                      //}
                            ?>
                            <?php $j = 0;	foreach ($jenis[$k] as $key) {
                                        echo '<td width="50">';
                                        if(isset($nilai[$key->jenis_penilaian][$row->nim][0]->nilai)) { 
                                          echo '<input type="number" max=100 min=0 class="form-control" name="nilai[' . $key->jenis_penilaian.']['.$row->nim . ']" placeholder="" required=""';
                                          echo 'value="'.$nilai[$key->jenis_penilaian][$row->nim][0]->nilai.'">';
                                          $temp += ($nilai[$key->jenis_penilaian][$row->nim][0]->nilai * $key->persentase / 100);
                                        } else{
                                          echo '<input type="number" max=100 min=0 class="form-control" name="nilai[' . $key->jenis_penilaian.']['.$row->nim . ']" placeholder="" value=0 required="">';
                                        }
                                        echo ' </td>';
                                      }
                            ?>                  
                              <td><?php echo $temp; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </form>

                  
                </div>
              </div>
              
<!-- Classic Modal -->
<div class="modal fade" id="myModal<?=$mhs[$k]->id_kelas?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/aslab/matakuliah/insert_jenis_penilaian/<?=$mhs[$k]->id_kelas?>" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Jenis Penilaian</h6>
        </div>
        <div class="modal-body">
        <?php foreach ($jenis[$k] as $key) { ?>
          <div class="row">
            <label class="col-md-5 col-form-label"><b><?= $key->jenis_penilaian ?></label>
            <label class="col-md-5 col-form-label"><?= $key->persentase ?>%</b></label>
          </div>
        <?php } ?>     
          <br/><hr/><br/>
          <div class="row">
            <label class="col-md-5 col-form-label">Jenis Baru</label>
            <div class="col-md-5">
              <div class="form-group">
                <input type="text" class="form-control" name="jenis_penilaian" placeholder="" required="">
              </div>  
            </div>
          </div>
          <div class="row">
            <label class="col-md-5 col-form-label">Persentasenya (%)</label>
            <div class="col-md-3">
              <div class="form-group">
                <input type="number" min=1 max=100 class="form-control" name="persentase" placeholder="1 - 100" required="">
                <input type="number" class="form-control" name="id_kelas" value="<?=$mhs[$k]->id_kelas?>" required="" hidden >
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="Tambah">
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--  End Modal -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable<?=$k?>').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [-1, 10, 25, 50],
          ["ALL", 10, 25, 50]
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



