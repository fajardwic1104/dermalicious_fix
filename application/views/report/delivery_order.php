<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Order</title>

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
                            <h1 style="text-align: center;">Delivery Order</h1>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-left" id="periode">
                                            </div>
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
                                        <a href="" button type="button" class="btn btn-primary">Tampilkan</button></a>
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
                                        <h3 class="card-title">Delivery Order</h3>
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
                                                    <th>No.</th>
                                                    <th>Nama Customer</th>
                                                    <th>Periode Paket</th>
                                                    <th>Alamat Pengiriman</th>
                                                    <th>Nomer Telephone</th>
                                                    <th>Jumlah Pesanan</th>
                                                    <th>Waktu Tiba</th>
                                                    <th>Tanda Terima</th>
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
    <?php $this->load->view('js/script_create')?>

    <script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        eturn true;
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
    //datatables
    $(document).ready(function() {
        $('#transaksi-table').DataTable({

            "processing": true,
            "serverSide": true,
            "searching": false,
            "responsive": true,
        });
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
            "searching": false,
            "responsive": true,
        });
    })
    </script>

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