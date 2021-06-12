
<!DOCTYPE html>
<html>
<head>
<style>
	body{
		font-size: 12px;;
	}
	center{
		font-size: 15px;;
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

  <?php $i = 0; 
  $k = $temp; 
  $rows = $praktikan;
                          //foreach ($praktikan as $rows): ?>
	<br>
	<b>Nama Asisten Laboratorium : <?= $aslab[0]->nama?></b>
		<br>
	<br>
	<b>NIM Asisten Laboratorium  &nbsp;&nbsp;: <?= $aslab[0]->nim?></b>
	<br>
	<br>
	<b>Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$mhs[$k-1]->kom[0].$mhs[$k-1]->kom[1]?></b>
	<br>
	<br> 
	<b>Angkatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$mhs[$k-1]->kom[2].$mhs[$k-1]->kom[3].$mhs[$k-1]->kom[4].$mhs[$k-1]->kom[5]?></b>
	<br>
	<br>
	<b>Mata Kuliah &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $matkul[$k-1][0]->nama_matkul ?></b>
	<br>
	<br>
<div class="table-responsive-sm">
<table id="datatable<?=$k?>" class="table table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th width="80">Nim</th>
                            <th width="300">Daftar Mahasiswa</th>
                            <?php 		foreach ($jenis[$k-1] as $key) {
                                        echo '<th width="50">'. $key->jenis_penilaian .' </th>';
                                      }
                            ?>
                            <th width="70">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i=0; foreach ($praktikan[$k-1] as $row): $temp = 0?>
                            <tr>
                              <td class="text-center"><?=$row->nim?></td>
                              <td><?=$row->nama?></td>
                            <?php 		//foreach ($nilai as $key) {
                                      // echo '<td width="50">'. $nilai['Kuis']['171402001'][0]->nilai .' </td>';
                                      //}
                            ?>
                            <?php $j = 0;	foreach ($jenis[$k-1] as $key) {
                                        echo '<td width="50">';
                                        if(isset($nilai[$key->jenis_penilaian][$row->nim][0]->nilai)) { 
                                          echo $nilai[$key->jenis_penilaian][$row->nim][0]->nilai;
                                          $temp += ($nilai[$key->jenis_penilaian][$row->nim][0]->nilai * $key->persentase / 100);
                                        } else{
                                          echo '1';
                                        }
                                        echo ' </td>';
                                      }
                            ?>                  
                              <td><?php echo $temp; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                      </table>	
							<br/><br/><br/>
						<div style="float:right; margin-right:30px;">
						Dosen Pengampuh<br/><br/><br/><br/><br/>
						&nbsp;&nbsp;&nbsp;<?= $dosen[0][0]->nama_dosen ?>
						</div>
                            <?php $k++; //endforeach; ?>	
          </div>
	</section>
	<br>
	<br>
	<br>
	<br>
</body>
</html>
