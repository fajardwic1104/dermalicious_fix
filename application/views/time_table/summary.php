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
        <div class="content-wrapper" style="margin-left : auto">
        <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                    <h1>Time Table Summary</h1>
                    </div><!-- /.col -->
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

            <section class="content">
            <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Periode</label>
                                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                    <input type="text" id="periode" class="form-control datetimepicker-input" data-target="#reservationdate2" value="<?=date('d-m-Y')?>" />
                                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            <!--<input type="text" class="form-control float-left" id="periode">-->
                            </div>
                        <!-- /.form-group -->

                        <!-- /.form-group -->
                        </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Paket</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected"></option>
                            <option>Slimming</option>
                            <option>Healthy</option>
                            <option>Hampers</option>
                            <option>Corporate</option>
                            <option>Promosi</option>
                            <option>Staff Meals</option>
                        </select>
                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <div class="row">
                    <div class="col-md-12 text-right">
                        <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                        <a href="" button type="button" class="btn btn-primary">Search</button></a>
                    </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
                <div class="col-12" style="padding: 20px;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Time Table Summary</h3>
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
                            <table id="summary-timetable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>Tanggal</th>
                                <th>Total Slimming</th>
                                <th>Total Healthy</th>
                                <th>Total Hampers</th>
                                <th>Total Corporate</th>
                                <th>Total Promotion</th>
                                <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                <td>01/06/2023</td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>100</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>80</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>30</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>40</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>60</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>500</u>
                                    </div>
                                    </a></td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                    <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                        class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </tr>
                                <tr>
                                <td>02/06/2023</td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>120</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>85</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>42</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>40</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>60</u>
                                    </div>
                                    </a></td>
                                <td><a href="time-table.html">
                                    <div style="height:100%;width:100%">
                                        <u>520</u>
                                    </div>
                                    </a></td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                    <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Create"><i
                                        class="fas fa-pencil-alt"></i></a>
                                    </div>
                                </td>
                                </tr> -->
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
    </div>
    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#summary-timetable').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

              "ajax": {
                  "url": "<?=site_url('TimeTable/list_timetable_summary')?>",
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
        
        $('#reservationdate2').datetimepicker({
          format: 'DD-MM-YYYY'
        });
      })

    </script>
    
</body>
</html>