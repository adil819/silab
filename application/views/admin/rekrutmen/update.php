<?php foreach ($rekrutmen as $key): ?>
<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
    <div class="modal-header justify-content-center">
      </button>
      <h4 class="title title-up">Edit Rekrutmen</h4>
    </div>
    <div class="card-body">
          <form class="form-horizontal" action="<?=base_url()?>index.php/admin/rekrutmen/update/do_update" method="post" enctype="multipart/form-data">
          <div class="row">
              <label class="col-sm-2 col-form-label">Fakultas</label>
          </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">File</label>
              <div class="col-sm-10">
                <div class="form-group">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="<?=base_url()?>/assets/img/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div>
                      <span class="btn btn-rose btn-round btn-file">
                        <span class="fileinput-new">Pilih File</span>
                        <span class="fileinput-exists">Ganti</span>
                        <input type="file" name="file_upload" />
                      </span>
                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>
                    </div>
                  </div>
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
<?php endforeach; ?>