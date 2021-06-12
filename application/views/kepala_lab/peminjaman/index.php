<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Peminjaman</h4>
        </div>
        <div class="card-body">

          <div class="toolbar">
            <a href="<?=base_url()?>index.php/kepala_lab/peminjaman/create"><button class="btn btn-success"><i class="fa fa-plus"></i> &nbsp; Tambah Transaksi Peminjaman</button></a>
          </div>
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="35">No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pinjam</th>
                  <th>NIM Peminjam</th>
                  <th class="disabled-sorting text-right">Status Pengembalian</th>
                </tr>
              </thead>
              <tbody>
               <?php $i=1; foreach ($peminjaman as $row): ?>
                <tr>
                  <td class="text-center"><?=$i?></td>
                  <td><?=$row->nama_barang?></td>
                  <td><?=$row->jumlah?></td>
                  <td><?=$row->tanggal?></td>
                  <td><?=$row->nim?></td>
                  <td class="text-right">
              <div class="col-sm-4">
                <div class="">
                  <button type="button"
                  <?php
                       $sekarang = date("Y-m-d");
                      if( (int)$row->tanggal[8].$row->tanggal[9] + 7 < (int)$sekarang[8].$sekarang[9] ){
                        echo ' class="btn btn-danger"';
                      }else{
                        echo ' class="btn btn-warning"';
                      }
                    ?>   style="margin-top: -1px" data-toggle="modal" data-target="#myModal<?=$row->id_peminjaman?>">
                    <i class="fa fa-plus"></i> &nbsp; 
                    <?php
                       $sekarang = date("Y-m-d");
                      if( (int)$row->tanggal[8].$row->tanggal[9] + 7 < (int)$sekarang[8].$sekarang[9] ){
                        echo 'telat dikembalikan';
                      }else{
                        echo 'belum dikembalikan';
                      }
                    ?>
                    <input class="form-control" type="number" class="" name="id_ruang" value="<?=$lab[0]->id_ruang?>" hidden>
                  </button>
                </div>
              </div>
                  </td>
                </tr>
                
<!-- Classic Modal -->
<div class="modal fade" id="myModal<?=$row->id_peminjaman?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/kepala_lab/peminjaman/ganti_status" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Status Saat Ini</h6>
                    <input class="form-control" type="number" class="" name="id_peminjaman" value="<?=$row->id_peminjaman?>" hidden>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Status</label>
            <div class="col-md-9">
              <div class="form-group">
              <select class="form-control" id="kategori" name="status" required>
                      <option value="sudah">Sudah Dikembalikkan</option>
                      <option value="perpanjang">Perpanjang 1 Minggu</option>
                  </select>              </div>
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
