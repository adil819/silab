<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-user">
        <div class="card-header">
          <div class="toolbar">
            <a href="<?=base_url()?>index.php/kepala_lab/peminjaman"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Data peminjaman</button></a>
          </div>
          <h5 class="card-title">Tambah peminjaman</h5>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url()?>index.php/kepala_lab/peminjaman/create/do_create" method="post" enctype="multipart/form-data">
            <div class="row">
              <label class="col-sm-2 col-form-label">Pilih Barang</label>
              <div class="col-sm-4">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="brg" required>
                    <option></option>
                    <?php foreach ($barang as $brg): ?>
                      <option value="<?=$brg->id_barang?>"><?=$brg->nama_barang?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <button type="button" class="btn btn-round" style="margin-top: -1px" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> &nbsp; Tambah Jenis Barang
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-2">
                <div class="form-group">
                  <input class="form-control" type="number" min=1 name="jumlah">
                </div>
              </div>
            </div>
             <div class="row">
              <label class="col-sm-2 col-form-label">NIM Peminjam</label>
              <div class="col-sm-2">
                <div class="form-group">
                  <input class="form-control" type="number" name="nim">
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
              <div class="col-sm-3">
                <div class="form-group">
                  <input class="form-control" type="date" class="" name="peminjaman" value="<?=date("Y-m-d")?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-success btn-round" value> &nbsp; Simpan &nbsp; </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/kepala_lab/peminjaman/insert_jenis_barang" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Jenis Barang</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Nama Barang</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="nama_barang" placeholder="" required="">
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
<script src="<?=base_url()?>assets/js/plugins/ckeditor/ckeditor.js"></script>

  <script type="text/javascript">
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
    })
  </script>
 <script src="<?=base_url()?>assets/js/plugins/jasny-bootstrap.min.js"></script>