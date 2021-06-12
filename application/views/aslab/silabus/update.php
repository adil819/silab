<?php foreach ($mhs as $key): ?>
<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="card">
    <div class="modal-header justify-content-center">
      </button>
      <h4 class="title title-up">Edit Status</h4>
    </div>
    <div class="modal-body">
    <div class="toolbar">
     <a href="<?=base_url()?>index.php/aslab/silabus">
     <button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Silabus</button></a>
    </div>
      <div class="row">
      <form action="<?=base_url()?>index.php/aslab/silabus/update/do_update/<?=$key->id_silabus?>"  id="signupForm" method="post">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="status" class=" control-label">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="0" <?php if($key->status == '0') echo "selected"; ?> >Belum Terlaksana</option>
              <option value="1" <?php if($key->status == '1') echo "selected"; ?> >Terlaksana</option>
            </select>
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
<?php endforeach; ?>