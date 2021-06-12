	<section class="courses-area section-gap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<h1>
						Rekrutmen
					</h1>
					<div class="wow fadeIn" data-wow-duration="1s">
						<p>
							Disamping terdapat syarat-syarat dan ketentuan untuk menjadi asisten laboratorium yang di simpan ke dalam file. Di bagi berdasarkan fakultas yang ada di Universitas Sumatera Utara
						</p>
					</div>
					<ul class="courses-list">
						<li><?php foreach ($rerkutmenfk as $row) { ?>
							<a class="wow fadeInLeft" title="Download" href="<?=base_url()?>index.php/home/download/<?=$row->file?>" data-wow-duration="1s" data-wow-delay=".1s">
							<i class="fa fa-book"></i> Download Berkas 
							</a><?php  } ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
