<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Materi yang diajarkan</h4>
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

         <!--  <div class="toolbar">
            <a href="#"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Data Baru</button></a>
          </div> -->
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th>Minggu ke</th>
                  <th>Materi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
               <?php $i=1; foreach ($mhs[$key->id_kelas] as $row): ?>
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
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
          <?php $k++; endforeach;  ?>
  </div>
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
