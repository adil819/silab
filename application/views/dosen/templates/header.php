<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/img/fav">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    SiLab
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />-->
  <link href="<?=base_url()?>assets/css/paper-dashboard.min.css?v=2.0.1"" rel="stylesheet" />

  <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
    <script>
        $(document).ready(function(){
                var pesan = <?=$this->session->flashdata('pesan')!=null? json_encode($this->session->flashdata('pesan')):null ?>;
                if(pesan != null){
                    $.notify ( {
                     icon: "nc-icon nc-bell-55",
                  title: pesan.title,
                  message: pesan.message,
                    }, {
                        type: pesan.type
                    });   
                }
                


        
        
    });
    </script>
  
</head>