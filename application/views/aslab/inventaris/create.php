<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-user">
        <div class="card-header">
          <div class="toolbar">
            <a href="<?=base_url()?>index.php/aslab/inventaris"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Data Inventaris</button></a>
          </div>
          <h5 class="card-title">Tambah Inventaris</h5>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url()?>index.php/aslab/inventaris/create/do_create" method="post" enctype="multipart/form-data">
            <div class="row">
              <label class="col-sm-2 col-form-label">Kode Peminjaman</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" name="kode">
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Pilih Barang</label>
              <div class="col-sm-6">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="brg" required>
                    <option></option>
                    <?php foreach ($barang as $brg): ?>
                      <option value="<?=$brg->id_barang?>"><?=$brg->nama_barang?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Jumlah</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="number" name="jumlah">
                </div>
              </div>
            </div>
             <div class="row">
              <label class="col-sm-2 col-form-label">NIM Peminjam</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="text" name="nim">
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="date" class="" name="peminjaman">
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <input type="date" class="" name="pengembalian">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-success btn-round"> &nbsp; Simpan &nbsp; </button>
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
      <form class="form-horizontal" action="<?=base_url()?>index.php/admin/media/kategori/create" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Kategori</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Kategori</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="kategori" placeholder="" required="">
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