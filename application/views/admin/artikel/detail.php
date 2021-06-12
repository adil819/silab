<?php foreach ($media as $key): ?>
<div class="modal-content">
  <div class="modal-header justify-content-center">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <i class="nc-icon nc-simple-remove"></i>
    </button>
    <h4 class="title title-up"><?=$key->judul?></h4>
  </div>
  <div class="modal-body">
    <?=$key->isi?>
  </div>
  <div class="modal-footer justify-content-center">
    <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
  </div>
</div>
<?php endforeach; ?>