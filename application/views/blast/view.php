<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blast Customer - View</title>
    <?php $this->load->view('css/style_transaksi_front')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <div class="col-sm-8">
              <h1>Create Blast Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="button-create">
                <a href="blast-customer.html" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID User</label>
                      <input class="form-control" type="text" value="" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Blast</label>
                      <input class="form-control" readonly>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Blast</label>
                      <div class="input-group date" id="tglblast" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#tglblast" />
                        <div class="input-group-append" data-target="#tglblast" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Healthy</option>
                        <option>Slimming</option>
                        <option>Other</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Start Date</label>
                      <div class="input-group date" id="startdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#startdate" />
                        <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>End Date</label>
                      <div class="input-group date" id="enddate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#enddate" />
                        <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Whatsapp Message</label>
                      <textarea class="form-control" rows="3" readonly></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="blast-customer.html" button type="button" class="btn btn-outline-success"
                    style="margin-right: 10px;">Back</button></a>
                  <a href="" button type="button" class="btn btn-success swalDefaultSuccess">Save</button></a>
                </div>
              </div>
            </div>
      </section>

    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>

 <!-- Page specific script -->
 <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });

        //Date picker
        $('#tglblast').datetimepicker({
          format: 'DD/MM/YYYY'
        });

        $('#tglstarthold').datetimepicker({
          format: 'DD/MM/YYYY'
        });

        $('#tglendhold').datetimepicker({
          format: 'DD/MM/YYYY'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Tooltip
        $(document).ready(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
      });

    </script>
</body>
</html>