<?php
    $b=$data->row_array();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $b['judul'];?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body style="background-color:beige">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h2><?php echo $b['judul'];?></h2><hr/><br/>
            <img src="<?php echo base_url().'assets/images/'.$b['gambar'];?>"><br/>
            <br/><?php echo $b['isi'];?>
        </div>
         
    </div>
 
    <script src="<?php echo base_url().'assets/jquery/jquery-2.2.3.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>
</div>