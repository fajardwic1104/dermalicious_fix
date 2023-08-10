<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>

    <?php $this->load->view('css/style_detailtimetable')?>
</head>
<body>
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?=site_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
    </div>
    
    <?php $this->load->view('navbar')?>

    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Time Table - <?=$detail->nama_customer?></h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="button-create">
                <a href="<?=site_url('TimeTable')?>" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
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
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Customer</label>
                      <input readonly class="form-control"  type="text" value="<?=$detail->id_customer?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Transaksi</label>
                      <input readonly class="form-control" disabled="disabled" type="text" value="<?=$detail->id_transaksi?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Customer</label>
                      <input readonly class="form-control" type="text" value="<?=$detail->nama_customer?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Transaksi Detail</label>
                      <input readonly class="form-control" value="<?=$detail->id_transaksi_detail?>"></input>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Klinik</label>
                      <input readonly class="form-control" value="<?=$detail->nama_klinik?>"></input>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <input readonly class="form-control" value="<?=$detail->jenis_paket?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <input readonly class="form-control" value="<?=$detail->kategori_paket?>"></input>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Qty Total</label>
                      <input readonly class="form-control" value="<?=$detail->qty?>"></input>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Periode Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">2 Minggu</option>
                        <option>1 Bulan</option>
                        <option>2 Bulan</option>
                      </select>
                    </div>
                  </div> -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Pembayaran</label>
                      <input readonly class="form-control" value="<?=date('d M Y H:i', strtotime($detail->paid_date))?>"></input>
                    </div>
                  </div>
                </div>

                <!-- <div class="row"> -->
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Detail Paket</label>
                      <input readonly class="form-control" value="Slimming - Lunch" value="<?=$detail->id_customer?>">
                    </div>
                  </div> -->
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Pembayaran</label> -->
                      <!-- <div class="input-group date" id="tglpembayaran" data-target-input="nearest"> -->
                      <!-- <input readonly class="form-control" value="<?=date('d M Y', strtotime($detail->paid_date))?>"></input> -->
                        <!-- <div class="input-group-append" data-target="#tglpembayaran" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div> -->
                      <!-- </div> -->
                    <!-- </div>
                  </div>
                </div> -->

                <!-- <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date Periode Paket</label>
                      <div class="input-group date" id="startdateperiode" data-target-input="nearest">
                        <input readonly type="text" value="06/05/2023" class="form-control datetimepicker-input"
                          data-target="#startdateperiode" />
                        <div class="input-group-append" data-target="#startdateperiode" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Date Periode Paket</label>
                      <div class="input-group date" id="enddateperiode" data-target-input="nearest">
                        <input readonly type="text" value="18/05/06" class="form-control datetimepicker-input"
                          data-target="#enddateperiode" />
                        <div class="input-group-append" data-target="#enddateperiode" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <hr>
              </div>

              <div class="row">
                <div class="col-12" style="padding: 20px;">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Time Table Detail</h3>
                      <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 50px;">
                          <div class="input-group-append">
                            <!-- <a href="time-table-add.html" button type="submit" class="btn btn-primary"
                            data-toggle="tooltip" title="Create">
                            <i class="fas fa-plus"></i>
                            </button> </a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                            <!-- <th>Lunch - Dinner</th> -->
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($timetable as $key) { ?>
                            <tr>
                              <td><?=$key['tgl_pengiriman']?></td>
                              <td><?=$key['lunch']?></td>
                              <td><?=$key['dinner']?></td>
                              <!-- <td></td> -->
                              <!-- <td>
                                <div class="btn-group btn-group-xs">
                                  <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                      class="fas fa-eye"></i></a>
                                  <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                      class="fas fa-pencil-alt"></i></a>
                                </div>
                              </td> -->
                            </tr>
                          <?php } ?>
                          <!-- <tr>
                            <td>01/06/2023</td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="time-table-view-html" class="btn btn-info" data-toggle="tooltip"
                                  title="View"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                              </div>
                          </tr>
                          <tr>
                            <td>02/06/2023</td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>03/06/2023</td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>04/06/2023</td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>
                              <div class="btn-group btn-group-xs">
                                <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                    class="fas fa-pencil-alt"></i></a>
                              </div>
                            </td>
                          </tr> -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php $this->load->view('footer');?>
    </div>
  </div>

  <?php $this->load->view('js/script_timetabledetail')?>
</body>
</html>