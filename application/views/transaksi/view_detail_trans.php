<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Detail - View</title>
  <?php $this->load->view('css/style_create')?>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
    </div>

    <!-- Navbar -->
    <?php $this->load->view('navbar')?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Detail Transaksi</h1>
            </div><!-- /.col -->
            <!--<div class="col-sm-4">-->
            <!--  <div class="button-create">-->
            <!--    <a href="<?=site_url('transaksi/edittransaksi/'.$detail_transaksi->id_transaksi)?>" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i-->
            <!--        class="fas fa-reply">-->
            <!--      </i>-->
            <!--    </a>-->
            <!--  </div>-->
            <!--</div>-->
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
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?=site_url('transaksi/updatedetailtrans/'.$id_detail_trans)?>" id="form-produk" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label>ID Customer</label>
                      <input class="form-control" disabled="disabled" type="text" value="<?=$detail_transaksi->id_customer?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" value="<?=$detail_transaksi->deskripsi?>" rows="3" placeholder="" readonly></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Transaksi</label>
                      <input class="form-control" readonly type="text" name="id_transaksi" value="<?=$detail_transaksi->id_transaksi?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <input class="form-control" readonly type="text" name="jenis_paket" id="jenis_paket" value="<?=$detail_transaksi->jenis_paket?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <input class="form-control" readonly type="text" name="kategori_paket" id="kategori_paket" value="<?=$detail_transaksi->kategori_paket?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Waktu Paket</label>
                      <input class="form-control" readonly type="text" name="waktu_paket" id="waktu-paket" value="<?=$detail_transaksi->waktu_paket?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Periode Paket</label>
                      <input class="form-control" readonly type="text" name="periode_paket" id="periode_paket" value="<?=$detail_transaksi->periode_paket?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Qty Paket</label>
                      <input class="form-control" id="qty-paket" name="qty_paket" type="text" value="<?=$detail_transaksi->qty_pemesanan?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Detail Paket</label>
                      <input class="form-control" id="detail-paket" name="detail_paket" readonly type="text" value="<?=$detail_transaksi->detail_paket?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="color: red;">Riwayat Alergi</label>
                      <textarea class="form-control" rows="3" name="riwayat_alergi" value="<?=$detail_transaksi->riwayat_alergi?>" readonly></textarea>
                      <!-- <input class="form-control" type="text" name="riwayat_alergi" placeholder="Riwayat alergi jika ada.."> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date Periode Paket</label>
                      <!-- <div class="input-group date" id="reservationdate" data-target-input="nearest"> -->
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="start_date_periode" id="start_date_periode" value="<?=date('d M Y' , strtotime ($detail_transaksi->start_date_periode_paket))?>" readonly />
                        <!-- <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div> -->
                      <!-- </div> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Date Periode Paket</label>
                      <!-- <div class="input-group date" id="reservationdate2" data-target-input="nearest"> -->
                        <input type="text" class="form-control" readonly name="end_date_periode" id="end_date_periode" value="<?=date('d M Y', strtotime ($detail_transaksi->end_date_periode_paket))?>" readonly/>
                        <!-- <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div> -->
                      <!-- </div> -->
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jadwal Pengiriman</label>
                      <div class="form-check">
                        <div class="row">
                          <?php
                            $hari = explode(', ', $detail_transaksi->jadwal_pengiriman);
                            // print_r($hari);
                          ?>
                          <div class="col-3">
                            <input class="form-check-input" onclick="checkedAll(this)" id="everyday"  type="checkbox" disabled>
                            <label class="form-check-label">Everyday</label>
                          </div>
                          <div class="col-3">
                            
                            <input class="form-check-input" <?php if (in_array('Monday', $hari)){echo "checked='checked'";}?> name="days[]" value="Monday" type="checkbox" disabled>
                            <label class="form-check-label">Monday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" <?php if (in_array('Tuesday', $hari)){echo "checked='checked'";}?> name="days[]" value="Tuesday" type="checkbox" disabled>
                            <label class="form-check-label">Tuesday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" <?php if (in_array('Wednesday', $hari)){echo "checked='checked'";}?> name="days[]" value="Wednesday" type="checkbox" disabled>
                            <label class="form-check-label">Wednesday</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <input class="form-check-input" <?php if (in_array('Thursday', $hari)){echo "checked='checked'";}?> name="days[]" value="Thursday" type="checkbox" disabled>
                            <label class="form-check-label">Thursday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" <?php if (in_array('Friday', $hari)){echo "checked='checked'";}?> name="days[]" value="Friday" type="checkbox" disabled>
                            <label class="form-check-label">Friday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input" <?php if (in_array('Saturday', $hari)){echo "checked='checked'";}?> name="days[]" value="Saturday" type="checkbox" disabled>
                            <label class="form-check-label">Saturday</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat Utama</label>
                      <textarea class="form-control" rows="3" id="alamat-1" name="alamat_1"  readonly><?=$detail_transaksi->alamat_1?></textarea>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Kota</label>
                      <input class="form-control" readonly type="text" id="kota-1" name="kota_1" value="<?=$detail_transaksi->kota_1?>" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input class="form-control" readonly type="text" id="kecamatan-1" name="kecamatan_1" value="<?=$detail_transaksi->kecamatan_1?>" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <input class="form-control" readonly type="text" id="kelurahan-1" name="kelurahan_1" value="<?=$detail_transaksi->kelurahan_1?>" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input class="form-control" id="kodepos-1" type="text" name="kodepos_1" readonly>
                    </div>
                  </div>

                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                    <label class="my-1 d-flex align-items-center">Google Maps <span class="ml-auto"><i class="fas fa-search-location"></i></span></label>
                      <!-- <a href="#" class="btn btn-light" data-toggle="tooltip" title="Search"><i
                        class="fas fa-search-location"></i></a><br> -->
                      <!-- <a onclick="alamat()" class="btn btn-light" data-toggle="tooltip" title="Search" ><i class="fas fa-search-location"></i></a> -->
                      <!-- <button onclick="alamat()">search</button> -->
                      <!-- <div id="map"></div> -->
                      <!-- <div ></div> -->
                      <iframe id="maps-1" class="form-control form-control-lg" src="<?=$detail_transaksi->maps_1?>" style="height: 253px;" frameborder="0"></iframe>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Catatan Pengiriman</label>
                      <textarea class="form-control" rows="10" name="notepengiriman_1" style="height: 250px;" readonly> <?=$detail_transaksi->note_pengiriman_1?> </textarea>
                    </div>
                  </div>
                </div>

                <!-- start box alamat2 -->
                <div class="row">
                  <div class="col-12">
                    <!-- <div class="form-group"> -->
                      <div class="row">
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>Alamat 2</label>
                            <textarea class="form-control" rows="3" id="alamat-2" name="alamat_2" readonly> <?=$detail_transaksi->alamat_2?> </textarea>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kota</label>
                                <input class="form-control" id="kota-2" name="kota_2" readonly type="text" value="<?=$detail_transaksi->kota_2?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" id="kecamatan-2" name="kecamatan_2" readonly type="text" value="<?=$detail_transaksi->kecamatan_2?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kelurahan</label>
                                <input class="form-control" id="kelurahan-2" name="kelurahan_2" readonly type="text" value="<?=$detail_transaksi->kelurahan_2?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" id="kodepos-2" name="kodepos_2" type="text" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                              <label class="my-1 d-flex align-items-center">Google Maps <span class="ml-auto"><i class="fas fa-search-location"></i></span></label>
                                <!-- <a onclick="alamat2()" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fas fa-search-location" ></i></a> -->
                                <iframe id="maps-2" class="form-control form-control-lg" src="<?=$detail_transaksi->maps_2?>" style="height: 253px;" frameborder="0"></iframe>
                                <input class="form-control form-control-lg" type="hidden" name="linkmaps_2" value="<?=$detail_transaksi->maps_2?>" id="link-maps-2" style="height: 80px;">
                              </div>
                              <!-- <a href="#" class="btn btn-sm-light" data-toggle="tooltip" title="Search"><i class="fas fa-search-location"></i></a> -->
                              <!-- <input class="form-control form-control-lg" type="text" placeholder=""
                                style="height: 80px;"> -->
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <label>Catatan Pengiriman</label>
                              <textarea class="form-control" name="notepengiriman_2" style="height: 250px;" readonly> <?=$detail_transaksi->note_pengiriman_2?> </textarea>
                            </div>
                          </div>


                        </div> <!-- div close box alamat2 -->
                        <!-- start box alamat3 -->
                        <div class="col-lg-6 col-sm-12">
                          <div class="form-group">
                            <label>Alamat 3</label>
                            <textarea class="form-control" rows="3" id="alamat-3" name="alamat_3" readonly> <?=$detail_transaksi->alamat_3?> </textarea>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kota</label>
                                <input class="form-control" id="kota-3" name="kota-3" readonly type="text" value="<?=$detail_transaksi->kota_3?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" id="kecamatan-3" name="kecamatan-3" readonly type="text" value="<?=$detail_transaksi->kecamatan_3?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kelurahan</label>
                                <input class="form-control" id="kelurahan-3" name="kelurahan-3" readonly type="text" value="<?=$detail_transaksi->kelurahan_3?>" readonly>
                              </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" id="kodepos-3" name="kodepos_3" type="text" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                              <label class="my-1 d-flex align-items-center">Google Maps <span class="ml-auto"><i class="fas fa-search-location"></i></span></label>
                                <!-- <a onclick="alamat3()" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fas fa-search-location" ></i></a> -->
                                <!-- <button onclick="alamat3()">search</button> -->
                                <iframe id="maps-3" class="form-control form-control-lg" src="<?=$detail_transaksi->maps_3?>" style="height: 253px;" frameborder="0"></iframe>
                                <input class="form-control form-control-lg" type="hidden" name="linkmaps_3" value="<?=$detail_transaksi->maps_3?>" id="link-maps-3" placeholder="">
                              </div>
                              <!-- <input class="form-control form-control-lg" type="text" placeholder=""
                                style="height: 80px;"> -->
                            </div>
                            <div class="col-lg-6 col-sm-12">
                              <div class="form-group">
                                <label>Catatan Pengiriman</label>
                                <textarea class="form-control" rows="10" name="notepengiriman_3" style="height: 250px;" readonly> <?=$detail_transaksi->note_pengiriman_3?> </textarea>
                              </div>
                            </div>
                          </div>
                        </div> <!-- div close box alamat3 -->
                      </div>
                    <!-- </div> -->
                    <hr>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-12">
                    <div class="btn btn-group">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="btn btn-group">
                            <a href="<?=site_url('transaksi/detailtransaksi/'.$detail_transaksi->id_transaksi)?>"><button type="button"
                              class="btn btn-warning">Back</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="btn btn-group">
                          <button type="submit" onclick="submit_form()" class="btn btn-success">Save</button>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="col-md-12 text-right">
                    <a href="<?=site_url('transaksi/detailtransaksi/'.$detail_transaksi->id_transaksi)?>" class="btn btn-outline-success" style="margin-right: 10px;">Back</a>
                    <!-- <a href="" button="" type="button" class="btn btn-success">Save</a> -->
                  </div>
                </div>
                </form>
              </div>
            </div>
      </section>
    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_create')?>
    <?php $this->load->view('js/auto_response')?>

    <script>
      function submit_form(){
        document.form-produk.submit();
        // document.form2.submit();
      }
      // $(document).ready(function(){
      //   $("#form-produk").submit(function(e){

      //   })
      // })
    </script>
  
</body>

</html>
