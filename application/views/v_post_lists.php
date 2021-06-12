<section class="faculty-area section-gap">
	<div class="container">
			<div class="row">
						<?php
            			function limit_words($string, $word_limit){
               				$words = explode(" ",$string);
                			return implode(" ",array_splice($words,0,$word_limit));
						}
$j = 0;
foreach ($data->result_array() as $i) :
                		$id=$i['id_artikel'];
                		$judul=$i['judul'];
                		$image=$i['gambar'];
                		$isi=$i['isi'];
        				?>
						<?php
if($j%2==0){
						?>        				
        				<div class="col-md-5 col-md-offset-2" style="float:right; margin-right: 150px;" >
						
            			<h2><?php echo $judul;?></h2><hr/><br/>
            			<img width="500px" src="<?php echo base_url().'assets/img/'.$image;?>"><br/>
            			<br/><?php echo $isi;//limit_words($isi,30);?><br/><a href="<?php echo base_url().'index.php/post_berita/view/'.$id;?>">  </a><br/><br/>
        				</div>
						<div>

						</div>
						<?php
} else{
						?>      				
        				<div class="col-md-5 col-md-offset-2" style="float:left;" >

						
            			<h2><?php echo $judul;?></h2><hr/><br/>
            			<img width="500px" src="<?php echo base_url().'assets/img/'.$image;?>"><br/>
            			<br/><?php echo $isi;//limit_words($isi,30);?><br/><a href="<?php echo base_url().'index.php/post_berita/view/'.$id;?>">  </a><br/><br/>
        				</div>
<?php } $j++; endforeach;?>
   						</div>
    <script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
           			</div>
		</div>
</section>