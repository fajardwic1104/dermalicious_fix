<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
            </a>
        </li>
      </ul>
    </nav>

    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-4 mt-4">
            <div class="col-sm-12">
              <h1 style="text-align: center;">Master Input User</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">User Management</h3>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="button-create">
                      <!-- <a class="btn btn-primary" data-toggle="tooltip" title="Add" data-toggle="modal" data-target="#modal-xl" role="button" style="margin-top: 10px;"> <i class="fas fa-plus"> -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"
                        style="margin-top: 10px;"><i class="fas fa-plus"></i></button>
                      </i>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Username/Email</th>
                        <th>Divisi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Surya</td>
                        <td>surya.prihatna@dermaster-indonesia.com</td>
                        <td>Accounting</td>
                        <td>
                          <div class="btn-group btn-group-xs">
                            <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> -->
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg"><i
                                class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                      </tr>
                      <tr>
                        <td>Fajar</td>
                        <td>fajar.dwi@dermaster-indonesia.com</td>
                        <td>Admin Klinik</td>
                        <td>
                          <div class="btn-group btn-group-xs">
                            <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> -->
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg"><i
                                class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Dwi</td>
                        <td>warehouse.dermalicious@dermaster-indonesia.com</td>
                        <td>Admin Warehouse</td>
                        <td>
                          <div class="btn-group btn-group-xs">
                            <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> -->
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg"><i
                                class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Devi</td>
                        <td>devi.juli@dermaster-indonesia.com</td>
                        <td>Accounting</td>
                        <td>
                          <div class="btn-group btn-group-xs">
                            <!-- <a href="#" class="btn btn-info" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a> -->
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg"><i
                                class="fas fa-pencil-alt"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.modal -->
              <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Create New User</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nama</label>
                              <input class="form-control" type="text" placeholder="">
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Username/Email</label>
                              <input class="form-control" type="text" placeholder="">
                              </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                              <label>Role</label>
                              <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Admin Klinik</option>
                                <option>Admin Warehouse</option>
                                <option>Accounting</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-success">Save</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
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

