<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Master</title>

    <?php $this->load->view('css/style_data_master')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading"
                height="auto">
        </div>

        <!-- Navbar -->
        <?php $this->load->view('navbar')?>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left : auto">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if ($this->session->flashdata('false')) {
                echo '<div class="alert alert-danger" style="font-size:12px" role="alert">'.$this->session->flashdata('false').'</div>';
            }?>
                        </div><!-- /.col -->
                        <div class="col-sm-8">
                            <h1>Data Master</h1>
                        </div>
                        <div class="col-sm-4">
                            <div class="button-create">
                                <a href="<?=site_url('dashboard/mainpackage')?>" class="btn btn-primary"
                                    data-toggle="tooltip" title="Back" role="button" style="margin-left: -12px;"> <i
                                        class="fas fa-reply">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <!-- Main content --><section class="content">
        <div class="container">
          <!-- Small boxes (Stat box) -->
          
          <section class="content">
            <!-- Small boxes (Stat box) -->
            
            <!-- ./col -->
        </section></div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Master</h3>
          </div>
          <div class="card-body">
            <!-- <p>Add the classes <code>.btn.btn-app</code> to an <code>&lt;a&gt;</code> tag to achieve the following:</p> -->
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/User')?>">
              <i class="fas fa-users"></i> Users
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/Pelanggan')?>">
              <i class="fas fa-users-cog"></i> Customer
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/Klinik')?>">
              <i class="fas fa-clinic-medical"></i> Klinik
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/Menu')?>">
              <i class="fas fa-list"></i> Menu
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/Brand')?>">
              <i class="fas fa-building"></i> Brand
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/HargaPaket')?>">
              <i class="fas fa-dollar-sign"></i> Harga Paket
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/JenisPaket')?>">
              <i class="fas fa-list-alt"></i> Jenis Paket
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/kategoriPaket')?>">
              <i class="fas fa-list-ol"></i> Kategori Paket
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/PeriodePaket')?>">
              <i class="fas fa-calendar-alt"></i> Periode Paket
            </a>
            <a class="btn btn-app" href="<?=site_url('master/DataMaster/StatusPaket')?>">
              <i class="fas fa-clipboard-list"></i> Status Paket
            </a>
            <a class="btn btn-app" href="<?=site_url('master/Holiday')?>">
              <i class="fas fa-pause"></i> Holiday
            </a>
            </div>
          </div>

        </section>
      </div>
  <!-- /.content-wrapper -->

            <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_data_master')?>
    <?php //$this->load->view('js/script_dashboard')?>

</body>
</html>