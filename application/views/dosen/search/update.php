      <?php foreach ($data_media as $row) { ?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <div class="toolbar">
                  <a href="<?=base_url()?>index.php/admin/artikel"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Data Media</button></a>
                </div>
                <h5 class="card-title">Edit Media</h5>
              </div>
              <div class="card-body">
                <form class="form-horizontal" action="<?=base_url()?>index.php/admin/artikel/update/<?=$row->id_artikel?>/do_update" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="text" class="form-control" name="artikel_judul" value="<?=$row->judul?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Kode Prodi</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="text" class="form-control" name="artikel_prodi" value="<?=$row->kode_prodi?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <div class="fileinput fileinput-exists text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            <img src="<?=base_url()?>assets/img/image_placeholder.jpg" alt="...">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail">
                            <img src="<?=base_url()?>assets/img/<?=$row->gambar?>">
                          </div>
                          <div>
                            <span class="btn btn-rose btn-round btn-file">
                              <span class="fileinput-new">Pilih Gambar</span>
                              <span class="fileinput-exists">Ganti</span>
                              <input type="file" name="artikel_gambar" />
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Isi Konten</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <textarea id="editor1" rows="10" cols="80" name="artikel_isi"><?=$row->isi?></textarea>
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

      <?php } ?>

     
<script src="<?=base_url()?>assets/js/plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
  $(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('editor1')
  })
</script>
 <script src="<?=base_url()?>assets/js/plugins/jasny-bootstrap.min.js"></script>