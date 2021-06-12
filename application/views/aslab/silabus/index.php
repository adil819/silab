<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Silabus</h4>
        </div>
        <div class="card-body">


        <div id="accordion">
                          <?php $i = 0; $k = 0; 
                          foreach ($mhs2 as $rows): 
                            if(isset($mhs)){?>
                              <div class="card">
              <div class="card-header">
                <a style="font-size: 20px;color: #0c0c0b;font-weight: 500;" class="card-link" data-toggle="collapse" href="#collapse<?=$k?>">
                  <span class="fa fa-caret-down"></span>&nbsp;&nbsp;&nbsp;
                  <b><?=$matkul[$k][0]->nama_matkul?> (<?=$rows->kom[0].$rows->kom[1]?>)</b> &nbsp;&nbsp;Semester 3 <?=$rows->kom[2].$rows->kom[3].$rows->kom[4].$rows->kom[5]?>
                </a>
              </div>
              <div id="collapse<?=$k?>" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  

          <div class="toolbar">
            <a href="#"><button type="button" class="btn btn-success" style="margin-top: -1px" data-toggle="modal" data-target="#myModal<?=$k?>"></i> &nbsp; Tambah Data Baru</button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable<?=$k?>" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th>Minggu ke</th>
                  <th>Materi</th>
                  <th>Status</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
               <?php if(isset($mhs[$kelas[$k]->id_kelas])){ $i=1; foreach ($mhs[$kelas[$k]->id_kelas] as $row): ?>
                <tr>
                  <td class="text-center"><?=$i?></td>
                  <td><?=$row->minggu_ke?></td>
                  <td><?=$row->nama_materi?></td>
                  <td class="text-center">
                          <?php
                            if($row->status == '1')
                              echo "<span class='badge badge-pill badge-success'>Terlaksana</span>";
                            elseif($row->status == '0')
                              echo "<span class='badge badge-pill badge-warning'>Belum Terlaksana</span>";
                          ?>

                        </td>
                  <td class="text-right">
                    <a href="<?php echo base_url();?>index.php/aslab/silabus/update/<?=$row->id_silabus?>" class="btn btn-warning btn-link btn-icon">
                    <i class="fa fa-edit"></i>
                    </a>
                   <!--  <a class="btn btn-warning btn-link btn-icon" target="_blank" href="<?=base_url()?>index.php/aslab/matakuliah/printdata/<?=$row->nim?>"><i class="fa fa-print"></i></a> -->
                  </td>
                </tr>
                <?php $i++; endforeach; }?>
              </tbody>
            </table>
          </div>
          </div>
          </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal<?=$k?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/aslab/silabus/insert_silabus/<?=$rows->id_kelas?>" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Materi</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Minggu Ke</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="number" max="12" class="form-control" name="minggu_ke" placeholder="" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">Nama Materi</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="nama_materi" placeholder="" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="submit">
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

  <?php $k++; } endforeach; ?>

</div>
</div>
</div>
