
    <div class="modal-dialog modal-lg">
<div class="modal-content">
  <div class="modal-header justify-content-center">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <i class="nc-icon nc-simple-remove"></i>
    </button>  
    <h4 class="title title-up"><center><?= $praktikan[0]->nama .'   ('.$praktikan[0]->nim.')' ?></center></h4>
    Mata Kuliah Praktikum:
  </div>

<?php $i = 0; foreach ($kelas as $key => $value): ?>  
  <div class="modal-body" style="float:left;margin-left: 10px;">
    <b><center><?= $matkul[$value->id_kelas][0]->nama_matkul ?></center></b><br/>
    Aslab &nbsp;&nbsp;:&nbsp;&nbsp; <?= $aslab[$value->id_kelas][0]->nama .' ('.$aslab[$value->id_kelas][0]->nim.')' ?><br/>
    Dosen :&nbsp;&nbsp; <?= $dosen[$value->id_kelas][0]->nama_dosen ?>
  </div>
  <div class="modal-body" style="float:right;margin-left: 500px;margin-top: -110px;">
  
      <?php  foreach ($nilai[$value->id_kelas] as $key2 => $value2): ?>  
          <br/><?=$value2->jenis_penilaian.'<b style="float:right; margin-right:20px;">'.$value2->nilai?></b>
      <?php endforeach; ?>
<?php if(empty($nilai[$value->id_kelas])){ echo '<br/><br/>';  } ?>
  </div>
  <hr/>
  <?php if(isset($kelas[$i+1])){ echo '<i style="color:#dddddd">___________________________________________________________________________________________________________________</i>';  } ?>


<?php $i++; endforeach; ?>

  <div class="modal-footer justify-content-center">
    <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Tutup</button>
  </div>
</div>
</div>