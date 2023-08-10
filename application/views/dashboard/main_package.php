<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Main Package</title>

  <?php $this->load->view('css/style_main_package')?>
  
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
    <!-- Background image -->
    <div class="bg-image" style="background-image: url('<?=base_url('assets/dist/img/pattern3.jpg')?>'); height: 100vh">
        <!-- Background image -->
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-7 text-right">
              <h1>Main Package</h1>
            </div>
            <div class="col-sm-5 text-right">
              <a href="<?=site_url('dashboard')?>" class="btn btn-primary" role="button" title="Back"> <i class="fas fa-reply">
                </i>
              </a>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <!-- Main content -->
      <section class="content">
          <div class="container">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <?php if ($this->session->userdata('level') != 'Warehouse') {?>
                <div class="col-lg-3 col-6">
                  <!-- small box --><a href="<?=site_url('transaksi')?>">
                    <div class="small-box bg-info" style="height: 120px;">
                      <div class="inner">
                        <h5 style="text-align:center; padding-top:35px;">Data Transaksi</h5>
                      </div>
                    </div>
                </div>
              <?php }?>
                <!-- ./col -->
              <?php // if ($this->session->userdata('level') == 'Warehouse') {?>
                <div class="col-lg-3 col-6">
                  <!-- small box --><a href="<?=site_url('TimeTable')?>">
                    <div class="small-box bg-success" style="height: 120px;">
                      <div class="inner">
                        <h5 style="text-align:center; padding-top:35px;">Time Table</h5>
                      </div>
                      <!-- <a href="../examples/main-package.html" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div></a>
              <?php// }?>
                <!-- ./col -->
              <?php if ($this->session->userdata('level') != 'Warehouse') {?>
                <div class="col-lg-3 col-6">
                  <!-- small box --><a href="#" class="not-allowed">
                    <div class="small-box bg-warning" style="height: 120px;">
                      <div class="inner">
                        <h5 style="text-align:center; padding-top:35px;">Master Order</h5>
                      </div>
                      <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div></a>
              <?php }?>
              <?php if ($this->session->userdata('level') != 'Warehouse') {?>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box --><a href="#" class="not-allowed">
                    <div class="small-box bg-danger" style="height: 120px;">
                      <div class="inner">
                        <h5 style="text-align:center; padding-top:35px;">Set Menu</h5>
                      </div>
                      <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div></a>
                <!-- ./col -->
              <?php }?>
              <!-- <div class="row"> -->
                <div class="col-lg-3 col-6">
                  <!-- small box --><a href="<?=site_url('ReportKM')?>">
                    <div class="small-box bg-primary" style="height: 120px;">
                      <div class="inner">
                        <h5 style="text-align:center; padding-top:35px;">Meal Delivery</h5>
                      </div>
                      <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div></a>
                <!-- ./col -->
              <!-- </div> -->
            </div>
            <!-- <section class="content"> -->
              <!-- Small boxes (Stat box) -->
            <!-- </section> -->
              <!-- ./col -->
          </div>

        <!-- /.row -->
      </section>
    </div>
    <!-- /.card-body -->
  </div>
</div>
  
  <!-- /.content-wrapper -->
  <?php $this->load->view('footer')?>
  <?php $this->load->view('js/script_main_package')?>
</body>

</html>