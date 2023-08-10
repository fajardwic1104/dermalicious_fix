<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Time Table Summary</title>

  <?php $this->load->view('css/style_create')?>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading" height="auto">
        </div>

        <!-- Navbar -->
        <?php $this->load->view('navbar')?>

        <!-- Main Content -->
        <div class="content-wrapper" style="margin-left : auto">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                    <h1>Time Table (<?=date('d M Y', strtotime($tgl))." - ".strtoupper($jenis)?>)</h1>
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

            <section class="content">
                <div class="container-fluid">
                    <div class="card card-default">
                    <div class="card-header">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Klinik</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <option>Dermaster - PIK</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Customer</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>ID Transaksi</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ID Transaksi Detail</label>
                                        <input class="form-control" type="text" placeholder="">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Bayar</label>
                                        <div class="input-group date" id="tanggalbayar" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#tanggalbayar" />
                                            <div class="input-group-append" data-target="#tanggalbayar" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Paket</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <option>Slimming</option>
                                            <option>Healthy</option>
                                            <option>Hampers</option>
                                            <option>Corporate</option>
                                            <option>Staff Meals</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                    <!-- /.form-group -->
                                </div>
                            </div>
                            
                            <div class="col-md-12 text-right">
                                <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                                <a href="" button type="button" class="btn btn-primary">Search</button></a>
                            </div><hr>
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
                                            <table id="time-table" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                <th>Klinik</th>
                                                <th>ID Transaksi</th>
                                                <!-- <th>ID Transaksi Detail</th> -->
                                                <th>ID Customer</th>
                                                <th>Nama Customer</th>
                                                <th>Alamat</th>
                                                <th>Detail Paket</th>
                                                <th>Qty (Total Order)</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <tr>
                                                <td>Dermaster-PIK</td>
                                                <td>0011</td>
                                                <td>00112</td>
                                                <td>001</td>
                                                <td>Fivie</td>
                                                <td>Jakarta Utara, Ruko Cordoba Blok H no. 8 Pantai Indah Kapuk (Toko Bunga Bupa), 14470</td>
                                                <td>Slimming - Lunch</td>
                                                <td>24</td>
                                                <td>
                                                    <div class="btn-group btn-group-xs">
                                                    <a href="time-table-view-html" class="btn btn-info" data-toggle="tooltip" title="View"><i
                                                        class="fas fa-eye"></i></a>
                                                    <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                </tr>
                                                <tr>
                                                <td>Dermaster-Pondok Indah</td>
                                                <td>0012</td>
                                                <td>00123</td>
                                                <td>002</td>
                                                <td>Rina Nurhayati</td>
                                                <td>Depok, Griya Bougenville 1 Blok 40 No. 15 Kel. Limo, 16515</td>
                                                <td>Slimming - Lunch</td>
                                                <td>48</td>
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
                        <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#time-table').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              "responsive": true,
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

              "ajax": {
                  "url": "<?=site_url('TimeTableByDate/list_timetable_by_jenis/'.$tgl.'/'.$jenis)?>",
                  "type": "POST"
              },


              // "columnDefs": [
              // {
              //     "targets": [ 0 ],
              //     "orderable": true,
              // },
              // ],

          });

      });

    </script>
    
     <script>
      $(function () {
        //Initialize Select2 Elements
        
        $('#tanggalbayar').datetimepicker({
          format: 'DD-MM-YYYY'
        });
      })

    </script>
</body>
</html>