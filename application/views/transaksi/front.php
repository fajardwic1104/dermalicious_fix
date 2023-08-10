<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Transaction</title>

  <?php $this->load->view('css/style_transaksi_front')?>
  <style>
    .update {
      color: white;
      padding: 8px;
      font-family: Arial;
    }
    .success {background-color: #04AA6D;} /* Green */
    .info {background-color: #2196F3;} /* Blue */
    .warning {background-color: #ff9800;} /* Orange */
    .danger {background-color: #f44336;} /* Red */ 
    .other {background-color: #e7e7e7; color: black;} /* Gray */ 
  </style>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <!-- <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto"> -->
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
            <?php if ($this->session->flashdata('success')) {
                echo '<div class="success alert-success" style="font-size:12px" role="alert">'.$this->session->flashdata('success').'</div>';
            }?>
            </div><!-- /.col -->
            <div class="col-sm-8">
              <h1>Customer Transaction</h1>
            </div>
            <div class="col-sm-4">
              <div class="button-create">
                <a href="<?=site_url('dashboard/mainpackage')?>" class="btn btn-primary" role="button" style="margin-left: -12px;" title="Back"> <i
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
              <!-- /.card-header -->
              <div class="card-body">
                <form id="form-search">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>ID Customer</label>
                        <input class="form-control" id="id-customer" type="text" placeholder="">
                        </select>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Nama Customer</label>
                        <input class="form-control" id="nama-customer" type="text" placeholder="">
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <!--<div class="form-group">-->
                      <!--  <label>Kategori Paket</label>-->
                      <!--  <select class="form-control select2" id="kategori-paket" style="width: 100%;">-->
                      <!--    <option value="">-- Pilih Kategori Paket --</option>-->
                      <!--    <?php foreach ($kategori as $kategori) {?>-->
                      <!--      <option value="<?=$kategori['kategori_paket']?>"><?=$kategori['kategori_paket']?></option>-->
                      <!--    <?php }?>-->
                      <!--  </select>-->
                      <!--</div>-->
                      <!-- /.form-group -->
                      <!--<div class="form-group">-->
                      <!--  <label>Jenis Paket</label>-->
                      <!--  <select class="form-control select2" id="jenis-paket" style="width: 100%;">-->
                      <!--    <option value="">-- Pilih Jenis Paket --</option>-->
                      <!--    <?php foreach ($jenis as $jenis) {?>-->
                      <!--      <option value="<?=$jenis['jenis_paket']?>"><?=$jenis['jenis_paket']?></option>-->
                      <!--    <?php }?>-->
                      <!--  </select>-->
                      <!--</div>-->
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status Verifikasi</label>
                        <select class="form-control select2" id="status-verifikasi" style="width: 100%;">
                          <option value="Lunas">Lunas</option>
                          <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                      </div>
                      <!-- /.form-group -->
  
                      <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>ID Transaksi</label>
                        <input class="form-control" id="id-transaksi" type="text" placeholder="">
                      </div>
                    </div>
                    <!-- /.col -->
                    <!--<div class="col-md-6">-->
                    <!--  <div class="form-group">-->
                    <!--    <label>Periode Paket</label>-->
                    <!--    <select class="form-control select2" id="periode-paket" style="width: 100%;">-->
                    <!--      <option value="">-- Pilih Periode Paket --</option>-->
                    <!--      <?php foreach ($periode as $periode) {?>-->
                    <!--        <option value="<?=$periode['id_periode_paket']?>"><?=$periode['periode_paket']?></option>-->
                    <!--      <?php }?>-->
                    <!--    </select>-->
  
                    <!--  </div>-->
                    <!--</div>-->
                  </div>
                  <!-- /.col -->
                </form>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                    <button id="reset-button" button type="button" class="btn btn-danger">Reset</button></button>
                    <button id="show-button" button type="button" class="btn btn-primary">Tampilkan</button></button>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <h3 class="card-title">Customer Transaction</h3>
                <div class="card-tools">
                    <?php if ($this->session->userdata('level') == 'PIC Klinik' || $this->session->userdata('level') == 'Admin Dermalicious' || $this->session->userdata('level') == 'super admin') {?>
                      <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-append">
                          <a href="<?=site_url('transaksi/create')?>" button type="submit" class="btn btn-primary"
                            data-toggle="tooltip" title="Create">
                            <i class="fas fa-plus"></i>
                            </button> </a>
                        </div>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="transaksi-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Brand</th>
                    <th>Klinik</th>
                    <th>ID Customer</th>
                    <th>Nama Customer</th>
                    <th>Status Verifikasi</th>
                    <th>Status Payment</th>
                    <th>Detail Paket</th>
                    <th>Tanggal Payment</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </section>
      <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <?php $this->load->view('modal')?>
    
    <script>
      function deleteConfirm(url) {
        $('#deleteModal').modal();
        
        $('#btn-delete').attr('href', url);
      }
    </script>
    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#transaksi-table').DataTable({
            "responsive": true,
              "processing": true,
              "serverSide": true,
              "searching": false,
              "order": [],

              "ajax": {
                  "url": "<?=site_url('transaksi/list_transaksi')?>",
                  "type": "POST",
                  "data": function (data) {
                    data.nama_cust = $('#nama-customer').val();
                    data.id_cust = $('#id-customer').val();
                    // data.kategori = $('#kategori-paket').val();
                    // data.jenis = $('#jenis-paket').val();
                    data.verifikasi = $('#status-verifikasi').val();
                    data.id_trans = $('#id-transaksi').val();
                    // data.periode = $('#periode-paket').val();
                  } 
              },
              // rowCallback: function ( row, data ) {
              //   // console.log(row);
              //   // if (moment(data.update_script, 'YYYY-MM-DD HH:mm:ss') < moment()) {
              //   //   $('td:eq(0)', row).css('background-color', ' rgba(255, 0, 0, 0.2)');
              //   //   $('td:eq(0)', row).css('color', 'blue');
              //   // } else {
              //   //   $('td:eq(0)', row).css('background-color', ''); 
              //   // }
              // },

              "columnDefs": [
              {
                  "targets": [ 0 ],
                  "orderable": true,
              },
              ],

          });

          $('#show-button').click(function(){ //button filter event click
            // alert($('#nama-customer').val());
              table.ajax.reload();  //just reload table
          });
          $('#reset-button').click(function(){ //button reset event click
              $('#form-search')[0].reset();
              // alert($('#nama-customer').val());
              table.ajax.reload();  //just reload table
          });
      });

    </script>
</body>
</html>