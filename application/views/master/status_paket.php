<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Paket</title>
</head>
<body>

<?php $this->load->view('css/style_transaksi_front')?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading"
                height="auto">
        </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: auto;">
      <!-- Left navbar links -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
            class="nav-link dropdown-toggle">Hai, $UserNAME</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="#" class="dropdown-item">Log Out </a></li>
          </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Master Status Paket</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="button-create">
                <a href="msstatus-paket.html" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
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
                      <label>ID Status Paket</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option>Regular</option>
                        <option>Promotion</option>
                        <option>Hampers</option>
                        <option>Corporate</option>
                        <option>Staff Meals</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <!-- <a href="#" button type="button" class="btn btn-outline-success" -->
                    <!-- style="margin-right: 10px;">Back</button></a> -->
                    <a href="" button type="button" class="btn btn-primary">Search</button></a>
                  </div>
                </div>
              </div>
            </div><!-- /.card body -->

            <div class="row">
              <div class="col-12" style="padding: 20px;">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Master Status Paket Detail</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 50px;">
                        <div class="input-group-append">
                          <a href="<?=site_url('master/DataMaster/StatusPaketAdd')?>" class="btn btn-primary" data-toggle="tooltip" title="Create">
                            <i class="fas fa-plus"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID Status Paket</th>
                          <th>Status Paket</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Delreg001</td>
                          <td>Regular</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="msstatus-paket-edit.html" class="btn btn-warning" data-toggle="tooltip"
                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                        </tr>
                        <tr>
                          <td>Delreg002</td>
                          <td>Regular 2</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>Delmeals001</td>
                          <td>Staff Meals</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                           
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
      </section>

<?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <?php //$this->load->view('js/script_dashboard')?>

    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#transaksi-table').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              "responsive": true,
              "autoWidth": false,
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

            //   "ajax": {
            //       "url": "<?=site_url('transaksi/list_transaksi')?>",
            //       "type": "POST"
            //   },
            //   rowCallback: function ( row, data ) {
            //     // console.log(row);
            //     // if (moment(data.update_script, 'YYYY-MM-DD HH:mm:ss') < moment()) {
            //     //   $('td:eq(0)', row).css('background-color', ' rgba(255, 0, 0, 0.2)');
            //     //   $('td:eq(0)', row).css('color', 'blue');
            //     // } else {
            //     //   $('td:eq(0)', row).css('background-color', ''); 
            //     // }
            //   },

              "columnDefs": [
              {
                  "targets": [ 0 ],
                  "orderable": true,
              },
              ],

          });

      });

    </script>
</body>
</html>
