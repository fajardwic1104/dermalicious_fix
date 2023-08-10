<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Detail - Edit</title>
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
            <div class="col-sm-4">
              <div class="button-create">
                <!-- <a href="<?=site_url('transaksi/detailtransaksi/'.$detail_transaksi->id_transaksi)?>" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
                    class="fas fa-reply">
                  </i>
                </a> -->
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
              <!-- /.card-header -->
              <div class="card-body">
                <form action="<?=site_url('transaksi/insertdetailtrans/'.$transaksi->id_transaksi)?>" id="form-produk" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Customer</label>
                      <input class="form-control" disabled="disabled" type="text" value="<?=$transaksi->id_customer?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" rows="3" placeholder=""></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Transaksi</label>
                      <input class="form-control" readonly type="text" name="id_transaksi" value="<?=$transaksi->id_transaksi?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" name="jenis_paket" id="jenis_paket" style="width: 100%;" required>
                        
                        <option value="">-- Pilih Jenis Paket --</option>
                        <?php foreach ($jenis_paket as $key) {?>
                            <option value="<?=$key['id_jenis_paket']?>"><?=$key['jenis_paket']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <select class="form-control select2" name="kategori_paket" id="kategori_paket" style="width: 100%;" required>
                        <!-- <option value="<?=$detail_transaksi->kategori_paket?>"><?=$detail_transaksi->kategori_paket?></option> -->
                      </select>
                      <input class="form-control" id="nama-barang" name="nama_barang" type="hidden">
                      <input class="form-control" id="tgl-bayar" name="tgl_bayar" type="hidden" value="<?=date('Y-m-d', strtotime($transaksi->paid_date))?>">
                      <input class="form-control" id="waktu-bayar" name="waktu_bayar" type="hidden" value="<?=date('H:i', strtotime($transaksi->paid_date))?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Waktu Paket</label>
                      <select class="form-control select2" name="waktu_paket" id="waktu-paket" style="width: 100%;" required>
                        <!-- <option value="<?=$detail_transaksi->waktu_paket?>"><?=$detail_transaksi->waktu_paket?></option> -->
                        <option>-- Pilih Waktu Paket --</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                        <option value="lunch-dinner">Lunch - Dinner</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Periode Paket</label>
                      <select class="form-control select2" name="periode_paket" id="periode_paket" style="width: 100%;" required>
                        <option>-- Pilih Periode Paket --</option>
                        <?php foreach ($periode as $periode) {?>
                            <option value="<?=$periode['periode_paket']?>"><?=$periode['periode_paket']?></option>
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Qty Paket</label>
                      <input class="form-control" id="qty-paket" name="qty_paket" type="text"  required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Detail Paket</label>
                      <input class="form-control" id="detail-paket" name="detail_paket" readonly type="text" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label style="color: red;">Riwayat Alergi</label>
                      <textarea class="form-control" rows="3" name="riwayat_alergi" ></textarea>
                      <!-- <input class="form-control" type="text" name="riwayat_alergi" placeholder="Riwayat alergi jika ada.."> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label>Jadwal Pengiriman</label>
                      <div class="form-check">
                        <div class="row">
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" onclick="checkedAll(this)" id="everyday"  type="checkbox">
                            <label class="form-check-label">Everyday</label>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Monday" type="checkbox">
                            <label class="form-check-label">Monday</label>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Tuesday" type="checkbox">
                            <label class="form-check-label">Tuesday</label>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Wednesday" type="checkbox">
                            <label class="form-check-label">Wednesday</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Thursday" type="checkbox">
                            <label class="form-check-label">Thursday</label>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Friday" type="checkbox">
                            <label class="form-check-label">Friday</label>
                          </div>
                          <div class="col-lg-3 col-sm-3">
                            <input class="form-check-input" name="days[]" value="Saturday" type="checkbox">
                            <label class="form-check-label">Saturday</label>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-3 align-self-center">
                      <!-- <form action="" method="post"> -->
                      <a type="button" class="form-control btn btn-primary" onclick="getNewPeriod()">Get Periode</a>
                      <!-- </form> -->
                </div>
              </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date Periode Paket</label>
                      <!-- <div class="input-group date" id="reservationdate" data-target-input="nearest"> -->
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="start_date_periode" id="start_date_periode" readonly />
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
                        <input type="text" class="form-control" readonly name="end_date_periode" id="end_date_periode" />
                        <!-- <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div> -->
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat Utama</label>
                      <textarea class="form-control" rows="3" id="alamat-1" name="alamat_1" placeholder="Nama Jalan ..." required></textarea>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kota</label>
                      <select class="form-control select2" id="kota-1" name="kota_1" style="width: 100%;" >
                        <option value="">-- Pilih Kota --</option>
                        <?php foreach ($kota as $kota) {?>
                            <option value="<?=$kota['city_id']?>"><?=$kota['city_name']?></option>
                        <?php }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control select2" id="kecamatan-1" name="kecamatan_1" style="width: 100%;" >
                        <option selected="selected">-- Pilih Kecamatan --</option>
                        <!-- <option>Kecamatan a</option>
                        <option>Kecamatan b</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select class="form-control select2" id="kelurahan-1" name="kelurahan_1" style="width: 100%;" >
                        <option selected="selected">-- Pilih Kelurahan --</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input class="form-control" id="kodepos-1" type="text" name="kodepos_1" readonly placeholder="12345">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                    <label class="my-1 d-flex align-items-center">Google Maps <span class="ml-auto"><i class="fas fa-search-location" onclick="alamat()" style="cursor:pointer";></i></span></label>
                      <iframe id="maps-1" class="form-control form-control-lg" src="" style="height: 253px;" frameborder="0"></iframe>
                      <input class="form-control form-control-lg" type="hidden" name="linkmaps_1" id="link-maps-1" placeholder="" style="height: 80px;">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Catatan Pengiriman</label>
                      <!-- <input class="form-control form-control-lg" type="text" name="notepengiriman_1" required placeholder="" style="height: 250px;"> -->
                      <textarea class="form-control" rows="10" name="notepengiriman_1" required></textarea>
                    </div>
                  </div>
                </div>

                <!-- start box alamat2 -->
                <div class="row">
                  <div class="col-12">
                    <!-- <div class="form-group"> -->
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>Alamat 2</label>
                            <textarea class="form-control" rows="3" id="alamat-2" name="alamat_2" placeholder="Nama Jalan ..."></textarea>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kota</label>
                                <select class="form-control select2" id="kota-2" name="kota_2" style="width: 100%;">
                                  <option value="">-- Pilih Kota --</option>
                                  <?php foreach ($kota2 as $kota2){?>
                                      <option value="<?=$kota2["city_id"]?>"><?=$kota2['city_name']?></option>
                                  <?php }?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control select2" id="kecamatan-2" name="kecamatan_2"  style="width: 100%;">
                                  <option selected="selected">-- Pilih Kecamatan --</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control select2" id="kelurahan-2" name="kelurahan_2" style="width: 100%;">
                                  <option selected="selected">-- Pilih Kelurahan --</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" id="kodepos-2" name="kodepos_2" type="text" readonly placeholder="12345">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                              <label>Google Maps</label>
                                <a onclick="alamat2()" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fas fa-search-location" ></i></a>
                                
                                <iframe id="maps-2" class="form-control form-control-lg" src="" style="height: 250px;" frameborder="0"></iframe>
                                <input class="form-control form-control-lg" type="hidden" name="linkmaps_2" id="link-maps-2" placeholder="" style="height: 80px;">
                              </div>
                              <!-- <a href="#" class="btn btn-sm-light" data-toggle="tooltip" title="Search"><i class="fas fa-search-location"></i></a> -->
                              <!-- <input class="form-control form-control-lg" type="text" placeholder=""
                                style="height: 80px;"> -->
                            </div>
                            <div class="col-6">
                              <label>Catatan Pengiriman</label>
                              <input class="form-control form-control-lg" type="text" name="notepengiriman_2" placeholder="" style="height: 250px;">
                            </div>
                          </div>


                        </div> <!-- div close box alamat2 -->
                        <!-- start box alamat3 -->
                        <div class="col-6">
                          <div class="form-group">
                            <label>Alamat 3</label>
                            <textarea class="form-control" rows="3" id="alamat-3" name="alamat_3" placeholder="Nama Jalan ..."></textarea>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kota</label>
                                <select class="form-control select2" id="kota-3" name="kota_3" style="width: 100%;">
                                  <option value="">-- Pilih Kota --</option>
                                  <?php foreach ($kota3 as $kota3){?>
                                      <option value="<?=$kota3["city_id"]?>"><?=$kota3['city_name']?></option>
                                  <?php }?>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control select2" id="kecamatan-3" name="kecamatan_3"  style="width: 100%;">
                                  <option>-- Pilih Kecamatan --</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control select2" id="kelurahan-3" name="kelurahan_3"  style="width: 100%;">
                                  <option>-- Pilih Kelurahan --</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" id="kodepos-3" name="kodepos_3" required type="text" readonly placeholder="12345">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Google Maps</label>
                                <a onclick="alamat3()" class="btn btn-primary" data-toggle="tooltip" title="Search"><i class="fas fa-search-location" ></i></a>
                                <!-- <button onclick="alamat3()">search</button> -->
                                <iframe id="maps-3" class="form-control form-control-lg" src="" style="height: 250px;" frameborder="0"></iframe>
                                <input class="form-control form-control-lg" type="hidden" name="linkmaps_3" id="link-maps-3" placeholder="">
                              </div>
                              <!-- <input class="form-control form-control-lg" type="text" placeholder=""
                                style="height: 80px;"> -->
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Catatan Pengiriman</label>
                                <input class="form-control form-control-lg" type="text" name="notepengiriman_3" placeholder="" style="height: 250px;">
                              </div>
                            </div>
                          </div>
                        </div> <!-- div close box alamat3 -->
                      </div>
                    <!-- </div> -->
                    <hr>
                  </div>
                </div>
                <!--<div class="row">-->
                <!--  <div class="col-12">-->
                <!--    <div class="btn btn-group">-->
                <!--      <div class="row">-->
                <!--        <div class="col-md-6">-->
                <!--          <div class="btn btn-group">-->
                <!--            <a href="<?//=site_url('transaksi/detailtransaksi/'.$detail_transaksi->id_transaksi)?>"><button type="button"-->
                <!--              class="btn btn-warning">Back</button></a>-->
                <!--          </div>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--      <div class="col-md-6">-->
                <!--        <div class="btn btn-group">-->
                <!--          <button type="submit" onclick="submit_form()" class="btn btn-success">Save</button>-->
                <!--        </div>-->
                <!--      </div>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="col-md-12 text-right">
                    <a href="<?=site_url('transaksi/edittransaksi/'.$transaksi->id_transaksi)?>" class="btn btn-outline-success" style="margin-right: 10px;">Back</a>
                    <button type="submit" onclick="submit_form()" class="btn btn-success">Save</button>
                    <!-- <a href="" button="" type="button" class="btn btn-success">Save</a> -->
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

    <script>
        function getNewPeriod() {
        let arr = [];
        let checkedbox = document.querySelectorAll("input[type='checkbox']:checked"); 
        var qty = $('#qty-paket').val();
        var tgl_bayar = $('#tgl-bayar').val();
        var waktu_bayar = $('#waktu-bayar').val();

        for (let i = 0; i < checkedbox.length; i++) {
          arr.push(checkedbox[i].value)
        }
        $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getNewHari')?>",
            data: {
                jadwal:arr, qty:qty, tgl_bayar:tgl_bayar, waktu_bayar:waktu_bayar,
            },
            success : function(data){
              // alert(JSON.parse(data).start_periode);
              
              document.getElementById("start_date_periode").value = JSON.parse(data).start_periode;
              document.getElementById("end_date_periode").value = JSON.parse(data).end_periode;
              // $('#kecamatan-1').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
      }

    </script>
  
</body>

</html>
