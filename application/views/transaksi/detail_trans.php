<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Transaction - View</title>

  <?php $this->load->view('css/style_create')?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?//=base_url('asstes/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
    </div> -->

    <!-- Navbar -->
    <?php $this->load->view('navbar')?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-4 mt-4">
            <div class="col-sm-12">
              <h1 style="text-align: center;">View Customer Detail</h1>
            </div><!-- /.col -->
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
              <!-- <form action="<?//=site_url('transaksi/selectmenu')?>" method="post"> -->
              <div class="card-body">
                <?php if ($this->session->flashdata('success')) {
                  echo '<div class="alert alert-success" style="font-size:12px" role="alert">'.$this->session->flashdata('success').'</div>';
                }?>
                <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>ID User</label>
                          <input class="form-control" type="text" name="id_user" value="<?=$transaksi->id_user?>" readonly>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Status Paket</label>
                          <input class="form-control" type="text" name="status_paket" value="<?=$transaksi->status_paket?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>ID Transaksi</label>
                          <input class="form-control" type="text" name="id_transaksi" value="<?=$transaksi->id_transaksi?>" readonly>
                        </div>
                      </div>
                    </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Brand</label>
                      <input class="form-control" type="text" name="brand" value="<?=$transaksi->nama?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Klinik</label>
                      <input class="form-control" type="text" name="id_klinik" value="<?=$transaksi->nama_klinik?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Customer</label>
                      <input class="form-control" type="text" name="id_customer" value="<?=$transaksi->id_customer?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Customer</label>
                      <input class="form-control" type="text" name="nama_customer" value="<?=$transaksi->nama_customer?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomer Whatsapp<span style="color:red">*</span></label>
                      <input class="form-control" type="text" name="telp_1" value="<?=$transaksi->telepon_1?>" readonly>
                      <!-- <input class="form-control" type="text" name="telp_1" maxlength="13" onkeypress="return hanyaAngka(event)" placeholder=""> -->
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomer Telephone</label>
                      <input class="form-control" type="text" name="telp_2" value="<?=$transaksi->telepon_2?>" readonly>
                      <!-- <input class="form-control" type="text" name="telp_2" maxlength="13" onkeypress="return hanyaAngka(event)" placeholder=""> -->
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Transaksi</label>
                      <input type="text" name="tgl_trans" value="<?=date('d M Y', strtotime($transaksi->tgl_transaksi))?>" readonly class="form-control">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Pembayaran</label>
                      <input type="text" name="tgl_pembayaran" value="<?=date('d M Y', strtotime($transaksi->paid_date))?>" readonly class="form-control">
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Pembayaran</label>
                      <?php if ($transaksi->status_payment == "paid") {?>
                            <input type="text" class="form-control" name="status_pembayaran" readonly value="LUNAS">
                          <?php } else {?>
                            <input type="text" class="form-control" name="status_pembayaran" readonly value="BELUM LUNAS">
                          <?php }?>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <?php if ($this->session->userdata('level') == 'Finance') {?>
                    <?php if ($transaksi->status_veryfied == "not verified") {?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <label for="" class="form-control"><?=$transaksi->status_veryfied?></label>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                        <!-- <div class="col-md-2">
                          <div class="form-group">
                            <label>Verifikasi</label>
                            <form action="<?=site_url('transaksi/verified/'.$transaksi->id_transaksi)?>" method="post">
                                <input type="hidden" name="verifikasi" value="verified" id="">
                                <input type="hidden" name="id_trans" value="<?//=$transaksi->id_transaksi?>" id="">
                                <button type="submit" class="form-control btn btn-primary">Verified</button>
                            </form>
                          </div>
                        </div> -->
                    <?php } else {?>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <!-- <label for="" class="form-control"><?=$transaksi->status_veryfied?></label> -->
                            <input class="form-control" type="text" value="<?=$transaksi->status_veryfied?>" readonly>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                    <?php }?>
                  <?php } else {?>
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Verifikasi</label>
                            <label for="" class="form-control"><?=$transaksi->status_veryfied?></label>
                            <!-- <select class="form-control select2" name="status_paket" style="width: 100%;">
                              <option value="<?//=$transaksi->status_veryfied?>"><?//=$transaksi->status_veryfied?></option>
                              <option value="verified">Verified</option>
                            </select> -->
                          </div>
                        </div>
                  <?php } ?>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Qty Total</label>
                      <input class="form-control" type="text" value="<?=$qty_total?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Remarks</label>
                      <input class="form-control" type="text" value="<?=$transaksi->notes?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Out Standing Paket</label>
                      <input class="form-control" type="text" value="<?=$qty_total - $packdikirim?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Detail Transaksi</h3>
                      <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 50px;">
                              <div class="input-group-append">
                                  <?php if ($transaksi->status_veryfied == "not verified") {?>
                                    <a href="<?=site_url('Transaksi/AddEdit/'). $transaksi->id_transaksi?>" class="btn btn-primary" title="Add" role="button" style="margin-top: 10px;"><i class="fas fa-plus"></i></a>
                                  <?php } ?>
                                  <!--<button type="submit" class="btn btn-primary"-->
                                  <!--    data-toggle="tooltip" title="Create">-->
                                  <!--    <i class="fas fa-plus"></i>-->
                                  <!--</button>-->
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="button-create">
                          <!-- <button type="submit" class="btn btn-primary" title="Add" style="margin-top: 10px;"> <i class="fas fa-plus">
                            </i>
                          </button> -->
                          <!-- <a href="<?=site_url('transaksi/selectmenu')?>" id="datacust" class="btn btn-primary" title="Add" role="button" style="margin-top: 10px;"><i class="fas fa-plus"></i></a> -->
                        </div>
                      </div>
                    </div>
                    <!-- </form> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="detailtransaksi-table" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID Detail Transaksi</th>
                            <th>Kategori Paket</th>
                            <th>Jenis Paket</th>
                            <th>Waktu Paket</th>
                            <th>Qty Paket</th>
                            <th>Periode Paket</th>
                            <th>Detail Paket</th>
                            <th>Action</th>
                            <!-- <th>Status Pembayaran</th> -->
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          
                          <?php foreach ($detail_transaksi as $key) {?>
                            <tr>
                            <td><?=$key['id_transaksi_detail']?></td>
                            <td><?=$key['kategori_paket']?></td>
                            <td><?=$key['jenis_paket']?></td>
                            <td><?=$key['waktu_paket']?></td>
                            <td><?=$key['qty_pemesanan']?></td>
                            <td><?=$key['periode_paket']?></td>
                            <td><?=$key['detail_paket']?></td>
                            <!-- <td> Lunas</td> -->
                            <td>
                              <div class="btn-group btn-group-xs">
                                <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                    class="fas fa-eye"></i></a> -->
                                  <a href="<?=site_url('transaksi/viewdetailtransaksi/'.$key['id_transaksi'].'/'.$key['id_transaksi_detail'])?>" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                        class="fas fa-eye"></i></a>
                                <?php if ($this->session->userdata('level') == "Finance" && $key['status_verification'] != 'verified') {?>
                                  <a href="<?=site_url('Transaksi/verified/'.$transaksi->id_transaksi.'/'.$key['id_transaksi_detail'])?>" class="btn btn-success" data-toggle="tooltip" title="Verified"><i
                                      class="fas fa-check"></i></a>
                                <?php }?>
                                <!-- <a href="<?//=site_url('transaksi/removefromcart/'.$key['rowid'])?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                    class="fas fa-trash"></i></a> -->
                              </div>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
              <hr>
              
                        </tbody>
                      </table>
                    </div>
                  </div> <!-- div close tabel stop delivery -->
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Stop Delivery</h3>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="stopdelivery" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID Transaksi</th>
                            <th>Start Hold</th>
                            <th>End Hold Delivery</th>
                            <th>Start Delivery</th>
                            <th>Keterangan</th>
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (empty($hold)) {?>
                            <tr>
                              <td colspan="6"><i> Tidak Ada Data</i></td>
                            </tr>
                          <?php } else {?>
                            <?php foreach ($hold as $hold) {?>
                              <tr>
                                <td><?=$hold['id_hold']?></td>
                                <td><?=$hold['start_date_hold']?></td>
                                <td><?=$hold['end_date_hold']?></td>
                                <td><?=$hold['start_date_delivery']?></td>
                                <td><?=$hold['note_hold']?></td>
                              </tr>
                              
                            <?php }?>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div> <!-- div close tabel stop delivery -->
                    </div>
                    <div class="col-md-12 text-right">
                        
                        <a href="<?=site_url('transaksi')?>" class="btn btn-outline-success" style="margin-right: 10px;">Back</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </form> -->
            </div>
          </div>
        </div> <!-- close div container fluid -->



        <!-- /.modal detail paket-->
        
      </section>
    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_create')?>
    
    <script>
  		function hanyaAngka(evt) {
  		  var charCode = (evt.which) ? evt.which : event.keyCode
  		   if (charCode > 31 && (charCode < 48 || charCode > 57))

  		    return false;
  		  return true;
  		}
  	</script>
  	
  	<!--<script>-->
   <!--     $(function () {-->
   <!--         $('#detailtransaksi-table').DataTable({-->
   <!--         "paging": true,-->
   <!--         "lengthChange": false,-->
   <!--         "searching": false,-->
   <!--         "ordering": true,-->
   <!--         "info": true,-->
   <!--         "autoWidth": false,-->
   <!--         "responsive": true,-->
   <!--         });-->
   <!--     });-->
  	<!--</script-->
  	
    <script>
      // var form = document.getElementById("user");
      // document.getElementById("datacust").addEventListener("click", function () {
      //   console.log(form.submit());
      //   // form.submit();
      // });

    </script>
    <script>
      $(document).ready(function(){
        $('#perusahaan').change(function(){
          var perusahaan = $(this).val();
          $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getklinik')?>",
            data: {
              perusahaan:perusahaan
            },
            success : function(response){
              // alert(response);
              $('#klinik').html(response);
              $('#klinik').selectpicker('refresh');
            }
          })
        })
      })
    </script>
</body>
</html>