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

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">

   <!-- Preloader -->
   <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading"
                height="auto">
        </div>

    <?php $this->load->view('navbar')?>
    
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
                <a href="<?=site_url('master/MasterMenu')?>" class="btn btn-primary" role="button" style="margin-left: -12px;" title="Back"> <i
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create"
                        style="margin-top: 10px;" title="Create"><i class="fas fa-plus"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="status-paket-table" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID Status Paket</th>
                          <th>Status Paket</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
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
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
      </section>
        <!-- Modal Create -->
      <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Status Paket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=site_url('master/StatusPaket/insert/')?>" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Status Paket</label>
                                <input class="form-control" name="status_paket" type="text">
                                </select>
                                </div>
                                
                                <!-- /.form-group -->
                                <!-- <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input class="form-control" name="nama_brand" type="text">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- End Of Modal Create -->

      <!-- Modal Edit -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Status Paket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="body-edit-modal"></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- End Of Modal Edit -->

      <!-- Modal Detail -->
      <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Jenis Paket</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="body-detail-modal"></div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- End Of Modal Detail -->
<?php $this->load->view('footer')?>
    <?php $this->load->view('js/script_transaksi_front')?>
    <?php $this->load->view('modal')?>

    <script type="text/javascript">
      var table;
      $(document).ready(function() {

          //datatables
          table = $('#status-paket-table').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              "responsive": true,
              "autoWidth": false,
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

              "ajax": {
                  "url": "<?=site_url('master/StatusPaket/list_status_paket')?>",
                  "type": "POST"
              },
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

    <script>
      function getEdit(id) {
        var id = id.getAttribute("data-id");
        // alert(id);
        $.ajax({  
            url : "<?=site_url('master/StatusPaket/EditStatusPaket') ?>", 
            type:"POST",  
            data:{id:id},  
            success:function(data){
            //alert(data);  
             $('.body-edit-modal').html(data);  
             $('#modal-edit').modal("show");  
            }  
       });  
      }

      function deleteConfirm(url) {
        $('#deleteModal').modal();
        
        $('#btn-delete').attr('href', url);
      }
    </script>
</body>
</html>