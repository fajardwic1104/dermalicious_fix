<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stop Delivery - Add</title>
  <?php $this->load->view('css/style_hold_deliv')?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?=site_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
    </div>

    <?php $this->load->view('navbar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Create Stop Hold Delivery</h1>
            </div><!-- /.col -->
            <!--<div class="col-sm-4">-->
            <!--  <div class="button-create">-->
            <!--    <a href="customer-transaction-detail.html" class="btn btn-primary" role="button"-->
            <!--      style="margin-left: -12px;"> <i class="fas fa-reply">-->
            <!--      </i>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <!-- /.card-header -->
              <form action="<?=site_url('StopHoldDelivery/insertHoldDeliv')?>" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ID Stop Hold Delivery</label>
                        <input type="hidden" name="id_trans" value="<?=$transaksi->id_transaksi?>" id="">
                        <input type="hidden" name="id_trans_detail" value="<?=$transaksi->id_transaksi_detail?>" id="">
                        <input class="form-control" disabled="disabled" type="text" placeholder="Generated by system">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ID Customer</label>
                        <input class="form-control" readonly type="text" name="id_cust" value="<?=$transaksi->id_customer?>">
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Start Hold Delivery</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" name="start_hold" class="form-control datetimepicker-input" required data-target="#reservationdate" />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>End Hold Delivery</label>
                        <div class="input-group date" id="endholddelivery" data-target-input="nearest">
                          <input type="text" name="end_hold" class="form-control datetimepicker-input" id="end-hold" required data-target="#endholddelivery" />
                          <div class="input-group-append" data-target="#endholddelivery" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan" placeholder="Alasan hold delivery.."></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Re-start Date Delivery</label>
                        <div class="input-group date" id="restartdelivery" name="restart_date" required data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" id="start-deliv" data-target="#restartdelivery" />
                          <div class="input-group-append" data-target="#restartdelivery" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-12 text-right">
                      <a href="<?=site_url('transaksi/edittransaksi/'.$transaksi->id_transaksi)?>" button type="button" class="btn btn-outline-success"
                        style="margin-right: 10px;">Back</button></a>
                      <button href="submit" onclick="submit_form()" type="submit" class="btn btn-success">Save</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php $this->load->view('footer')?>
  <?php $this->load->view('js/script_hold_deliv')?>

</body>
</html>