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
              <?= $admin[0]['nama'] ?>
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
          <li class="<?php if($active_menu=='kelas') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/admin/kelas">
              <i class="nc-icon nc-bank"></i>
              <p>Kelas</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='inventaris') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/admin/inventaris">
              <i class="nc-icon nc-box-2"></i>
              <p>Inventaris</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='artikel') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/admin/artikel">
              <i class="nc-icon nc-email-85"></i>
              <p>Artikel</p>
            </a>
          </li>
          <li class="<?php if($active_menu=='rekrutmen') echo "active"; ?>">
            <a href="<?=base_url()?>index.php/admin/rekrutmen">
              <i class="nc-icon nc-single-02"></i>
              <p>Rekrutmen</p>
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
            <a class="navbar-brand" href="#">Dasbor Admin <strong>Teknologi Informasi</strong></a> 
            
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
      <canvas id="bigDashboardChart"></canvas>
      </div> -->
      <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
