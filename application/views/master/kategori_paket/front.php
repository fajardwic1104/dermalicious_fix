<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Paket</title>
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

    <?php $this->load->view("navbar")?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left : auto">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
              <h1>Master Kategori Paket</h1>
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
                      <label>ID Kategori Paket</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected"></option>
                        <option>Healthy A</option>
                        <option>Healthy B</option>
                        <option>Healthy C</option>
                        <option>Healthy D</option>
                        <option>Dermalicious A</option>
                        <option>Dermalicious B</option>
                        <option>Dermalicious C</option>
                        <option>Dermalicious D</option>
                        <option>Dermalicious E</option>
                        <option>Dermalicious F</option>
                        <option>Dermalicious Ruby</option>
                        <option>Dermalicious Saphire</option>
                        <option>Slimming Starter</option>
                        <option>Slimming Premiere</option>
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
                    <h3 class="card-title">Master Kategori Paket Detail</h3>
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
                    <table id="kategori-paket-table" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>ID Kategori Paket</th>
                          <th>Kategori Paket</th>
                          <th>Jenis Paket</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <tr>
                          <td>Healthy001</td>
                          <td>Healty A</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="mskategori-paket-edit.html" class="btn btn-warning" data-toggle="tooltip"
                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
                        </tr>
                        <tr>
                          <td>Healthy002</td>
                          <td>Healty B</td>
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
                          <td>Healthy003</td>
                          <td>Healty C</td>
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
                          <td>Healthy004</td>
                          <td>Healty D</td>
                          <td>
                            <div class="btn-group btn-group-xs">
                              <a href="#" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i
                                  class="fas fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i
                                  class="fas fa-trash"></i></a>
                            </div>
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
              <h4 class="modal-title">Add Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=site_url('master/KategoriPaket/insert/')?>" method="post" rnctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Kategori Paket</label>
                                <input class="form-control" name="kategori_paket" type="text">
                                </select>
                                </div>
                                
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Jenis Paket</label>
                                    <select class="form-control select2" style="width: 100%;" name="jenis_paket">
                                    <option value="">-- Select Jenis Paket --</option>';
                                        <?php foreach ($jenis as $key) { ?>
                                            <option value="<?=$key['id_jenis_paket']?>"><?=$key['jenis_paket']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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
              <h4 class="modal-title">Edit Klinik</h4>
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
              <h4 class="modal-title">Detail Klinik</h4>
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
          table = $('#kategori-paket-table').DataTable({

              "processing": true,
              "serverSide": true,
              "searching": false,
              "responsive": true,
              "autoWidth": false,
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              // "searchDelay": 2000,
              // "order": [[5,'desc']],

              "ajax": {
                  "url": "<?=site_url('master/KategoriPaket/list_kategori_paket')?>",
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
            url : "<?=site_url('master/KategoriPaket/EditKategoriPaket') ?>", 
            type:"POST",  
            data:{id:id},  
            success:function(data){
            //alert(data);  
             $('.body-edit-modal').html(data);  
             $('#modal-edit').modal("show");  
            }  
       });  
      }
      
      function getDetail(id) {
        var id = id.getAttribute("data-id");
        // alert(id);
        $.ajax({  
            url : "<?=site_url('master/KategoriPaket/DetailKategoriPaket') ?>", 
            type:"POST",  
            data:{id:id},  
            success:function(data){
            //alert(data);  
             $('.body-detail-modal').html(data);  
             $('#modal-detail').modal("show");  
            }  
       });  
      }

      // function addKlinik() {
      //   // var id = id.getAttribute("data-id");
      //   // alert(id);
      //   $.ajax({  
      //       url : "<?//=site_url('master/klinik/addKlinik') ?>", 
      //       type:"POST",  
      //       // data:{id:id},  
      //       success:function(data){
      //       //alert(data);  
      //        $('.body-detail-modal').html(data);  
      //        $('#modal-create').modal("show");  
      //       }  
      //  });  
      // }

      function deleteConfirm(url) {
        $('#deleteModal').modal();
        
        $('#btn-delete').attr('href', url);
      }
    </script>
</body>
</html>