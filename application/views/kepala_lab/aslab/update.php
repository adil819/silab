<?php foreach ($mhs as $key): ?>
<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
    <div class="modal-header justify-content-center">
      </button>
      <h4 class="title title-up">Edit Nilai</h4>
    </div>
    <div class="modal-body">
    <div class="toolbar">
     <a href="<?=base_url()?>index.php/dosen/matakuliah">
     <button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Mata Kuliah</button></a>
    </div>
      <div class="row">
      <form action="<?=base_url()?>index.php/dosen/matakuliah/update/do_update/<?=$key->nim?>"  id="signupForm" method="post">
        <div class="col-sm-6">
        <div class="form-group">
            <label for="nilai" class=" control-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nilai" value="<?=$key->nama?>" readonly>
          </div>
          <div class="form-group">
            <label for="nilai" class=" control-label">Nilai</label>
            <input type="text" class="form-control" name="nilai" value="<?=$key->nilai?>" required>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-center">
     <!--  <div class="left-side">
        <button type="button" class="btn btn-default btn-link" a href="<?php echo base_url();?>index.php/aslab/matakuliah/">Batal</button>
      </div> -->
      <div class="divider"></div>
      <div class="right-side">
        <input type="submit" class="btn btn-danger btn-link" value="submit"></button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
<?php endforeach; ?>