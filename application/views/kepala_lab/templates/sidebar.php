<?php
$active_menu=$this->session->userdata('menu');
?>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="success">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <i>S</i><strong class="text-danger">L</strong>
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          <i>Si<strong class="text-primary">lab</strong></i>
          <!-- <div class="logo-image-big">
            <img src="<?=base_url()?>assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper"> 
        <div class="user">
          <div class="photo">
            <img src="<?=base_url()?>/assets/img/faces/avatar6.png" />
          </div>
          <div class="info">
            <a data-toggle="collapse" href="!#collapseExample" class="collapsed">
              <span>
              <?=$dosen[0]->nama_dosen?>
               <!--  <?=$this->session->userdata('user_nama');?> -->
               <!--  <b class="caret"></b> -->
              </span>
            </a>
            <!-- <div class="clearfix"></div>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">MP</span>
                    <span class="sidebar-normal">My Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">EP</span>
                    <span class="sidebar-normal">Edit Profile</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="sidebar-mini-icon">S</span>
                    <span class="sidebar-normal">Settings</span>
                  </a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
        <ul class="nav">
          <li class="<?php if($active_menu=='inventaris') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/inventaris">
              <i class="nc-icon nc-box-2"></i>
              <p>Inventaris</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='peminjaman') {  echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/peminjaman">
              <img src="<?=base_url()?>assets/img/borrow-book2.png" width="30px" style="float: left" class="nc-icon nc-box-2">
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peminjaman</p>
            </a>
          <?php } else { echo '">';?>
            <a href="<?=base_url()?>index.php/kepala_lab/peminjaman">
              <img src="<?=base_url()?>assets/img/borrow-book.png" width="30px" style="float: left" class="nc-icon nc-box-2">
              <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Peminjaman</p>
            </a>
          <?php } ?>
          </li>
          <li class="<?php if($active_menu=='kelas') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/kelas">
              <i class="nc-icon nc-bank"></i>
              <p>Kelas</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='aslab') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/aslab">
              <i class="nc-icon nc-single-02"></i>
              <p>Praktikan</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='silabus') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/silabus">
              <i class="nc-icon nc-paper"></i>
              <p>Silabus</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='search') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/kepala_lab/search">
              <i class="nc-icon nc-zoom-split"></i>
              <p>Search</p>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>index.php/auth/logout">
              <i class="nc-icon nc-button-power"></i>
              <p style="color:red">Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Dasbor Kepala Laboratorium <b><?=$lab[0]->nama_ruang?></b> <strong>Teknologi Informasi</strong> </a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
      <canvas id="bigDashboardChart"></canvas>
      </div> -->
      <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
