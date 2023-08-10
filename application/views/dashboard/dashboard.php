<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dermalicious | Dashboard</title>

  <?php $this->load->view('css/style_dashboard')?>
  
  <style>
      .not-allowed{
       cursor: not-allowed! important;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
  </div>
    
    <?php $this->load->view('navbar')?>


    <div class="content-wrapper" style="margin-left : auto; background-color: white;">
        <div class="bg-image" style="background-image: url('https://test.ayrusp.com/assets/dist/img/pattern3.jpg'); height: 100vh">

      <!-- Content Header (Page header) -->
      <div class="content-header" style="display: flex;">
        <div class="container-fluid d-none d-sm-block">
          <div class="row">
            <div class="col-12">
              <img src="<?=base_url('assets/dist/img/bgdasbor.png')?>" alt="background image" width="100%" height="100%">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->


        <!-- Main content -->
        <div class="container">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">
              <marquee>
                <h4 style="text-align: center;">Welcome To Dermalicious Information System</h4>
              </marquee>
            </div>
          </div>

          <section class="content">
            <div class="row">
              <div class="col-lg-4 col-12">
                <!-- small box --><a href="#" class="not-allowed">
                  <div class="small-box bg-info" style="height: 120px;">
                    <div class="inner">
                      <h6 style="text-align:center; padding-top:35px;">Staff Meals</h6>
                    </div>
                  </div>
              </div></a>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box --><a href="<?=site_url('dashboard/mainpackage')?>">
                  <div class="small-box bg-success" style="height: 120px;">
                    <div class="inner">
                      <h6 style="text-align:center; padding-top:35px;">Main Package<br>(Slimming/Healthy/Other)</h6>
                    </div>
                    <!-- <a href="main-package.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                  </div>
              </div></a>
              <!-- ./col -->
              <div class="col-lg-4 col-12">
                <!-- small box --><a href="#" class="not-allowed">
                  <div class="small-box bg-secondary" style="height: 120px;">
                    <div class="inner">
                      <h6 style="text-align:center; padding-top:35px;">Promotion</h6>

                    </div>
                </a>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-rights"></i></a> -->
              </div>
            </div></a>
        </div>

        <div class="row">
          <div class="col-lg-4 col-12">
            <!-- small box --><a href="#" class="not-allowed">
              <div class="small-box bg-danger" style="height: 120px;">
                <div class="inner">
                  <h6 style="text-align:center; padding-top:35px;">Hampers</h6>
                </div>
              </div>
          </div></a>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box --><a href="#" class="not-allowed">
              <div class="small-box bg-primary" style="height: 120px;">
                <div class="inner">
                  <h6 style="text-align:center; padding-top:35px;">Corporate</h6>
                </div>
                <!-- <a href="main-package.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
          </div></a>
          <?php if ($this->session->userdata('level') == "Admin Dermalicious") {?>
            <div class="col-lg-4 col-12">
              <!-- small box --><a href="<?=site_url('BlastCustomer')?>">
                <div class="small-box bg-warning" style="height: 120px;">
                  <div class="inner">
                    <h6 style="text-align:center; padding-top:35px;">Blast Customer for stop temporary delivery</h6>
                  </div>
                  <!-- <a href="main-package.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div></a>
          <?php } ?>

        </div>
      </div>
    </div>
      </section>
    </div>
  </div>
  <?php $this->load->view('footer')?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('js/script_dashboard')?>
</body>
</html>
