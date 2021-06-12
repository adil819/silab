
<!DOCTYPE html>
<html>
<head>
<style>
	body{
		font-size: 14px;;
	}
	center{
		font-size: 17px;;
	}
</style>
	<title>Absensi Praktikum Mahasiswa</title>
<script type="text/javascript">
	window.onload = function() { window.print(); }
</script>
</head>
<body>
<center><b>Absensi Praktikum Mahasiswa</b></center>
		<center>Fakultas Ilmu Komputer Dan Teknologi Informasi</center>
		<center>Universitas Sumatera Utara</center>
	<hr>

	<br>
	<b>Nama Asisten Laboratorium : <?= $aslab[0]->nama?></b>
	<br>
	<br>
	<b>NIM Asisten Laboratorium  &nbsp;&nbsp;: <?= $aslab[0]->nim?></b>
	<br>
	<br>
	<b>Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$mhs[0]->kom[0].$mhs[0]->kom[1]?></b>
	<br>
	<br> 
	<b>Angkatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$mhs[0]->kom[2].$mhs[0]->kom[3].$mhs[0]->kom[4].$mhs[0]->kom[5]?></b>
	<br>
	<br>
	<b>Mata Kuliah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $matkul[0]->nama_matkul ?></b>
	<br>
	<br>
<div class="table-responsive-sm">
            <table border="1" id="datatable" class="table table-bordered" cellspacing="0" width="100%" bordered>
              <thead>
                <tr>
                  <th width="25">No</th>
                  <th width="85">Nim</th>
                  <th width="300">Daftar Mahasiswa</th>
                  <th width="230">Kehadiran</th>				  
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($praktikan as $rows): ?>
                <?php foreach ($rows as $row): ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td class="text-center"><?=$row->nim?></td>
                    <td><?=$row->nama?></td>
                  <?php if($i % 2 == 0){
										echo '<th width="20" style="text-align:right;padding-right:100px;">'. $i .'.</th>';
									}else{
										echo '<th width="20" style="text-align:left;padding-left:30px;">'. $i .'.</th>';
									}
									?>
                  </tr>
                  <?php $i++; endforeach; ?>
                  <?php endforeach; ?>
              </tbody>
            </table><br/><br/><br/>
						<div style="float:right; margin-right:30px;">
						Dosen Pengampuh<br/><br/><br/><br/><br/>
						&nbsp;&nbsp;&nbsp;<?= $dosen[0]->nama_dosen ?>
						</div>
          </div>
	</section>
	<br>
	<br>
	<br>
	<br>
</body>
</html>
