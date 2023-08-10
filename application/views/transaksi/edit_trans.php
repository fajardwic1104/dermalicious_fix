<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Transaction - Edit</title>

    <?php $this->load->view('css/style_create')?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
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
                    <div class="row mb-4 mt-4">
                        <div class="col-sm-12">
                            <h1 style="text-align: center;">Edit Customer Detail</h1>
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
                            <form action="<?=site_url('transaksi/updatetrans')?>" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID User</label>
                                                <input class="form-control" value="<?=$transaksi->id_user?>" readonly
                                                    type="text" name="id_user">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Paket</label>
                                                <select class="form-control select2" name="status_paket"
                                                    style="width: 100%;">
                                                    <option value="<?=$transaksi->status_paket?>">
                                                        <?=$transaksi->status_paket?></option>
                                                    <option>-- Pilih Status Paket --</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Promotion">Promotion</option>
                                                    <option value="Hampers">Hampers</option>
                                                    <option value="Corporate">Corporate</option>
                                                    <option value="Staff Meals">Staff Meals</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID Transaksi</label>
                                                <input class="form-control" value="<?=$transaksi->id_transaksi?>"
                                                    readonly name="id_transaksi" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select class="form-control select2" id="perusahaan" name="brand"
                                                    style="width: 100%;">
                                                    <option value="<?=$transaksi->id_perusahaan?>"><?=$transaksi->nama?>
                                                    </option>
                                                    <option value="">-- Select Branch --</option>
                                                    <option value="1">Dermaster</option>
                                                    <option value="2">Derma Express</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Klinik</label>
                                                <select class="form-control select2" name="id_klinik" id="klinik"
                                                    style="width: 100%;">
                                                    <option value="<?=$transaksi->id_klinik?>">
                                                        <?=$transaksi->nama_klinik?></option>
                                                    <?php if (!empty($this->session->userdata('id_klinik'))) { ?>
                                                    <option value="<?=$this->session->userdata('id_klinik')?>">
                                                        <?=$this->session->userdata('nama_klinik')?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ID Customer</label>
                                                <input class="form-control" name="id_customer" type="text"
                                                    value="<?=$transaksi->id_customer?>" readonly>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Customer</label>
                                                <input class="form-control" name="nama_customer"
                                                    value="<?=$transaksi->nama_customer?>" id="nama_customer"
                                                    type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomer Whatsapp<span style="color:red">*</span></label>

                                                <input class="form-control" name="telp_1" maxlength="13"
                                                    value="<?=$transaksi->telepon_1?>"
                                                    onkeypress="return hanyaAngka(event)" type="text" placeholder="">
                                                <!-- <input class="form-control" type="text" name="telp_1" maxlength="13" onkeypress="return hanyaAngka(event)" placeholder=""> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomer Telephone</label>
                                                <input class="form-control" name="telp_2" maxlength="13"
                                                    onkeypress="return hanyaAngka(event)" type="text"
                                                    value="<?=$transaksi->telepon_2?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Transaksi</label>
                                                <!-- <div class="input-group date" id="reservationdate" data-target-input="nearest"> -->
                                                <!-- <?php if (!empty($this->session->userdata('tgl_trans'))) { ?>
                              <input type="text" name="tgl_trans" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?=$this->session->userdata('tgl_trans')?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            <?php } else {?>
                              <input type="text" name="tgl_trans" class="form-control datetimepicker-input" data-target="#reservationdate" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                            <?php } ?> -->
                                                <input type="text" name="tgl_trans"
                                                    value="<?=date('d M Y', strtotime($transaksi->tgl_transaksi))?>"
                                                    readonly class="form-control">
                                                <!-- </div> -->
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu Transaksi</label>
                                                <!-- <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <?php if (!empty($this->session->userdata('waktu_trans'))) { ?>
                              <input type="text" name="waktu_trans" class="form-control datetimepicker-input" data-target="#timepicker" value="<?=$this->session->userdata('waktu_trans')?>" />
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                            <?php } else {?>
                              <input type="text" name="waktu_trans" class="form-control datetimepicker-input" data-target="#timepicker" />
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                            <?php } ?>
                          </div> -->
                                                <input type="text" name="waktu_trans"
                                                    value="<?=date('H:i', strtotime($transaksi->tgl_transaksi))?>"
                                                    readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Pembayaran</label>
                                                <?php if ($transaksi->status_veryfied == "not verified") { ?>
                                                <div class="input-group date" id="reservationdate2"
                                                    data-target-input="nearest">
                                                    <input type="text" name="tgl_pembayaran"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#reservationdate2"
                                                        value="<?=date('d-m-Y', strtotime($transaksi->paid_date))?>" />
                                                    <div class="input-group-append" data-target="#reservationdate2"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else {?>
                                                <input type="text" name="tgl_pembayaran" readonly
                                                    value="<?=date('d M Y', strtotime($transaksi->paid_date))?>"
                                                    class="form-control">
                                                <?php } ?>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Waktu Pembayaran</label>
                                                <?php if ($transaksi->status_veryfied == "not verified") { ?>
                                                <div class="input-group date" id="timepicker2"
                                                    data-target-input="nearest">
                                                    <input type="text" name="waktu_pembayaran"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#timepicker2"
                                                        value="<?=date('H:i', strtotime($transaksi->paid_date))?>" />
                                                    <div class="input-group-append" data-target="#timepicker2"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                    </div>
                                                </div>
                                                <?php } else {?>
                                                <input type="text" name="waktu_pembayaran" readonly
                                                    value="<?=date('H:i', strtotime($transaksi->paid_date))?>"
                                                    class="form-control">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Pembayaran</label>
                                                <?php if ($transaksi->status_payment == "paid") {?>
                                                <input type="text" class="form-control" name="status_pembayaran"
                                                    readonly value="LUNAS">
                                                <?php } else {?>
                                                <input type="text" class="form-control" name="status_pembayaran"
                                                    readonly value="BELUM LUNAS">
                                                <?php }?>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <input type="text" name="status_verifikasi" id="" class="form-control"
                                                    value="<?=$transaksi->status_veryfied?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Qty Total</label>
                                                <input class="form-control" type="text" readonly name="qty_total"
                                                    value="<?=$qty_total?>" placeholder="Pack..">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Remarks</label>
                                                <input class="form-control" name="remarks"
                                                    value="<?=$transaksi->notes?>" type="text" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <!-- START DETAIL TABLE TRANSAKSI -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Detail Transaksi</h3>
                                                <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 50px;">
                                                        <div class="input-group-append">
                                                            <?php if ($transaksi->status_veryfied == "not verified") {?>
                                                              <a href="<?=site_url('Transaksi/AddEdit/'). $transaksi->id_transaksi?>" class="btn btn-primary" title="Add" ro="button" style="margin-top: 10px;"><i class="fas fa-plus"></i></a>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!--  -->
                                            </div>
                                            <div class="card-body">
                                                <table id="detailmenu-table" class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Transaksi Detail</th>
                                                            <th>Kategori Paket</th>
                                                            <th>Jenis Paket</th>
                                                            <th>Waktu Paket</th>
                                                            <th>Qty Paket</th>
                                                            <th>Periode Paket</th>
                                                            <th>Detail Paket</th>
                                                            <!-- <th>Status Pembayaran</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (empty($detail_transaksi)) { ?>
                                                        <tr>
                                                            <td colspan="8"><i> Tidak Ada Data</i></td>
                                                        </tr>
                                                        <?php }
                              foreach ($detail_transaksi as $key) {?>
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
                                                                    <!--<a href="#" class="btn btn-info"-->
                                                                    <!--    data-toggle="tooltip" title="View"><i-->
                                                                    <!--        class="fas fa-eye"></i></a>-->
                                                                    <a href="<?=site_url('transaksi/editdetailtransaksi/'.$key['id_transaksi'].'/'.$key['id_transaksi_detail'])?>"
                                                                        class="btn btn-warning" data-toggle="tooltip"
                                                                        title="Edit"><i
                                                                            class="fas fa-pencil-alt"></i></a>
                                                                <?php if ($transaksi->status_veryfied == "verified") {?>
                                                                    <a href="<?=site_url('StopHoldDelivery/addstop/'.$key['id_transaksi'].'/'.$key['id_transaksi_detail'])?>" class="btn btn-danger" data-toggle="tooltip" title="Stop"><i
                                        class="fas fa-pause"></i></a>
                                                                <?php } ?>
                                                                    <!-- <a href="<?//=site_url('transaksi/removefromcart/'.$key['rowid'])?>" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                        class="fas fa-trash"></i></a> -->
                                                                </div>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                    <div class="card-header">
                                      <h3 class="card-title">Stop Delivery</h3>
                                    </div>
                                    
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      <table id="stopdelivery-table" class="table table-bordered table-hover">
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
                                    <!--<div class="col-12">-->
                                    <!--  <div class="btn btn-group pull-right">-->
                                    <!--    <div class="row">-->
                                    <!--      <div class="col-md-6">-->
                                    <!--        <div class="btn btn-group">-->
                                    <!--          <a href="<?=site_url('transaksi')?>"><button type="button" class="btn btn-warning">Back</button></a>-->
                                    <!--        </div>-->
                                    <!--      </div>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-md-6">-->
                                    <!--      <div class="btn btn-group">-->
                                    <!-- <a href="<?//=site_url('transaksi/insert_trans')?>" type="button" class="btn btn-success">Save</a> -->
                                    <!--        <button type="submit" class="btn btn-success">Save</button>-->
                                    <!--      </div>-->
                                    <!--    </div>-->
                                    <!--  </div>-->
                                    <!--</div>-->
                                    <div class="col-md-12 text-right">
                                        <a href="<?=site_url('transaksi')?>" class="btn btn-outline-success"
                                            style="margin-right: 10px;">Back</a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                        </div>
                        <!-- END DETAIL TABLE TRANSAKSI -->
                    </div>
                </div>
                <!-- </form> -->
                </form>
        </div>
    </div>
    </div>
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

    <script>
    // var form = document.getElementById("user");
    // document.getElementById("datacust").addEventListener("click", function () {
    //   console.log(form.submit());
    //   // form.submit();
    // });
    </script>
    <script>
    $(document).ready(function() {
        $('#perusahaan').change(function() {
            var perusahaan = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?=site_url('transaksi/getklinik')?>",
                data: {
                    perusahaan: perusahaan
                },
                success: function(response) {
                    // alert(response);
                    $('#klinik').html(response);
                    $('#klinik').selectpicker('refresh');
                }
            })
        })
    })
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#detailmenu-table').DataTable({

            // "processing": true,
            // "serverSide": true,
            "searching": false,
            "responsive": true,
            "autoWidth": false,
        });
    })
    </script>
    
    <!--<script type="text/javascript">-->
    <!--$(document).ready(function() {-->
    <!--    $('#stopdelivery-table').DataTable({-->

            // "processing": true,
            // "serverSide": true,
    <!--        "searching": false,-->
    <!--        "responsive": true,-->
    <!--        "autoWidth": false,-->
    <!--    });-->
    <!--})-->
    <!--</script>-->

    <!-- <script>
      $('#passing-datacust').click(function(){
        var val = $(this).attr('class');
        var val2 = $("#nama_customer").val();
        alert(val2);
        document.getElementById("cust").submit();
      });
    </script> -->
</body>

</html>