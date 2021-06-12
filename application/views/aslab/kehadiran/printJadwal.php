
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
	<title>jadwal Praktikum Mahasiswa</title>
<script type="text/javascript">
	window.onload = function() { window.print(); }
</script>
</head>
<body>
<center><b>Jadwal Praktikum Mahasiswa</b></center>
		<center>Fakultas Ilmu Komputer Dan Teknologi Informasi</center>
		<center>Universitas Sumatera Utara</center>
	<hr>

<div class="table-responsive-sm">
            <table border="1" id="datatable" class="table table-bordered" cellspacing="0" width="100%" bordered>
              <thead>
                <tr>
                  <th width="25">Hari</th>
                  <th width="85">Sesi</th>
                <?php foreach ($ruangan as $room) {
									echo '<th width="230">'.$room->nama_ruang.'</th>';
								} ?>  
                </tr>
              </thead>
              <tbody>
            <?php foreach ($data as $hari => $value): ?>
              <?php $i=0; foreach ($data[$hari] as $sesi): ?>
                  <tr>
                    <td><?php if(isset($hari[$i])) echo $hari[$i] ?></td>
                    <td><?= $sesis[$i] ?></td>
                <?php foreach ($sesi as $ruangan => $object_kelas): ?>
                    <td><?php if(isset($object_kelas[0]->kom)) echo $object_kelas[0]->kom; ?></td>
                <?php endforeach; ?>
                  </tr>
              <?php $i++; endforeach; ?>
           <?php endforeach; ?>
              </tbody>
            </table><br/><br/><br/>
          </div>
	</section>
	<br>
	<br>
	<br>
	<br>
</body>
</html>
