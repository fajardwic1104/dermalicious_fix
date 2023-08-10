<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Order</title>
    <?php $this->load->view('css/style_transaksi_front')?>
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
                            <h1 id="title">Delivery Order </h1>
                        </div>
                        <div class="col-sm-4">
                            <div class="button-create">
                                <a href="<?=site_url('dashboard/mainpackage')?>" class="btn btn-primary" role="button"
                                    style="margin-left: -12px;" title="Back"> <i class="fas fa-reply">
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
                                            <label>Tanggal Delivery</label>
                                            <div class="input-group date" id="reservationdate2"
                                                data-target-input="nearest">
                                                <input type="text" id="tgl-report"
                                                    class="form-control datetimepicker-input"
                                                    data-target="#reservationdate2" />
                                                <div class="input-group-append" data-target="#reservationdate2"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <!-- /.col -->
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <!-- <a href="customer-detail.html" button type="button" class="btn btn-warning">Back</button></a> -->
                                        <a id="tampil-report" type="button"
                                            class="btn btn-primary">Search</a>
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
                                    <h3 class="card-title">List Delivery Order </h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div style="display:none"><h1 id="tgl-pilih"></h1></div>
                                    <!--<div id="report"></div>-->
                                                 <table id="delivery-table" class="table table-bordered table-hover">
                                                  <thead>
                                                  <tr>
                                                    <th>No</th>
                                                    <th>Nama Customer</th>
                                                    <th>Tanggal Pengiriman</th>
                                                    <th>Periode</th>
                                                    <th>Alamat Pengiriman 1</th>
                                                    <th>Jarak Alamat 1</th>
                                                    <th>Alamat Pengiriman 2</th>
                                                    <th>Jarak Alamat 2</th>
                                                    <th>Catatan Pengiriman</th>
                                                    <th>No Telp</th>
                                                    <th>Jumlah Pesanan</th>
                                                    <th>Diterima Oleh</th>
                                                    <?php  if ($this->session->userdata('level') == "Admin Dermalicious") {?>
                                                        <th>Action</th>
                                                    <?php }?>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  </tbody>
                                                </table>    
                                </div>
                            </div>
                                <!-- /.card-body -->
                        </div>
                            <!-- /.card -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>

    <script>
    // function tampilreport() {
    //     var tgl_report = $('#tgl-report').val();
    //     // alert(tgl_report);
    //     $.ajax({
    //         type: "POST",
    //         url: "<?=site_url('ReportKM/listJarak')?>",
    //         data: {
    //             tgl: tgl_report
    //         },
    //         success: function(response) {
    //             // alert(JSON.parse(data).start_periode);
    //             //   alert(response);
    //             $('#report').html(response);
    //         }
    //     })
    // }
    </script>
    
    <script>
      function printTable() {
        const table = document.getElementById('table-jarak');
        const newWindow = window.open('', '_blank');
        newWindow.document.write('<html><head><title>Print Table</title></head><body>');
        // newWindow.document.write(table[0].outerHTML);
        newWindow.document.write("<style> td:nth-child(2){display:none;} </style>");
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
      }
    </script>

    <script>
        $(function () {
        //Initialize Select2 Elements
        
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        
        // alert(day);
        // if (month < 10) month = "0" + month;
        // if (day < 10) day = "0" + day;
        
        var today = day + "-" + month + "-" + year;
        
        document.getElementById("tgl-report").value = today;
        document.getElementById("tgl-pilih").innerHTML = today;
        document.getElementById("title").innerHTML = "Delivery Order " + today;
        
        
        $('#reservationdate2').datetimepicker({
          format: 'DD-MM-YYYY',
        //   value :new Date()
        });
        
        // alert($('#tgl-report').val());
      })
    </script>
    
    <script type="text/javascript">
      var title = document.getElementById('title').innerHTML;
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#delivery-table').DataTable({
            "responsive": true,
              "processing": true,
              "serverSide": true,
              "searching": false,
              "order": [],

              "ajax": {
                  "url": "<?=site_url('ReportKM/get_listJarak')?>",
                  "type": "POST",
                  "data": function (data) {
                    data.tgl_delivery = $('#tgl-report').val();
                    // data.id_cust = $('#id-customer').val();
                    // data.kategori = $('#kategori-paket').val();
                    // data.jenis = $('#jenis-paket').val();
                    // data.verifikasi = $('#status-verifikasi').val();
                    // data.periode = $('#periode-paket').val();
                  } 
              },
              
              "dom": 'lBfrtip',
                buttons: [
                 {
                     extend: 'excel',
                     footer: false,
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                      }
                 }, {
                     extend: 'print',
                     title : title,
                     footer: false,
                      exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                      }
                 }
              ],

              "columnDefs": [
              {
                  "targets": [ 0 ],
                  "orderable": true,
              },
              ],
              
              "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],

          });

          $('#tampil-report').click(function(){ //button filter event click
            // alert($('#nama-customer').val());
            const tgl = $('#tgl-report').val();
            document.getElementById("title").innerHTML = "Delivery Order " + tgl;
            // alert(document.getElementById("title").innerHTML);
            //   document.getElementById("tgl-pilih").innerHTML = $('#tgl-report').val();
              table.ajax.reload();  //just reload table
              
          });
          $('#reset-button').click(function(){ //button reset event click
              $('#form-search')[0].reset();
              // alert($('#nama-customer').val());
              table.ajax.reload();  //just reload table
          });
      });
      
      function edit(id_pengiriman)
          {
            // if(confirm('Stok '+id_pengiriman+' akan diubah, Anda yakin?'))
            // {
              // ajax adding data to database
              $.ajax({
                  url : "<?php echo site_url('ReportKM/update_pengiriman') ?>",
                  type: "POST",
                  data: $('#'+id_pengiriman).serialize(),
                  dataType: "JSON",
                  success: function(data)
                  {
    
                      if(data.status) //if success close modal and reload ajax table
                      {
                          $('#delivery-table').DataTable().ajax.reload();
                        //   showNotification("alert-success", "Stok "+sku+" berhasil diubah menjadi "+data.stok, "bottom", "center", "", "");
                      }
    
    
                  },
                //   error: function (jqXHR, textStatus, errorThrown)
                //   {
                //       showNotification("alert-danger", "Stok "+sku+" gagal diubah, hubungi tim IT.", "bottom", "center", "", "");
    
                //   }
              });
            // }
          }
    </script>
</body>

</html>