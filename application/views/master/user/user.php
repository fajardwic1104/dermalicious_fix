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

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?=base_url('assets/dist/img/loadingicon.png')?>" alt="icon loading"
                    height="auto">
            </div>

            <?php $this->load->view('navbar')?>

            <!-- /.navbar -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="margin-left : auto">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1>Master User</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                                <div class="button-create">
                                    <a href="<?=site_url('master/MasterMenu')?>" class="btn btn-primary" role="button"
                                        style="margin-left: -12px;" title="Back"> <i class="fas fa-reply">
                                        </i>
                                    </a>
                                    <!-- <button class="btn btn-primary" on style="margin-left: -12px;"> <i
                                            class="fas fa-reply">
                                        </i>
                                    </button> -->
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <section class="content">
                    <div class="col-sm-12">
                        <?php if ($this->session->flashdata('success')) {
          echo '<div class="success alert-success" style="font-size:12px" role="alert">'.$this->session->flashdata('success').'</div>';
        } else {
          echo '<div class="success alert-danger" style="font-size:12px" role="alert">'.$this->session->flashdata('fail').'</div>';
        }?>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">User Management</h3>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 50px;">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-lg" style="margin-top: 10px;" title="Create"><i
                                                            class="fas fa-plus"></i></button>
                                                    </button> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="tbl-user" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Username/Email</th>
                                                    <th>Role</th>
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
                                <!-- /.modal -->
                                <div class="modal fade" id="modal-lg">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Create New User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?=site_url('master/user/insertuser')?>" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input class="form-control" name="nama_user"
                                                                        type="text" placeholder="">
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Username/Email</label>
                                                                    <input class="form-control" name="email_user"
                                                                        type="text" placeholder="">
                                                                    </select>
                                                                </div>
                                                                <!-- /.form-group -->
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select class="form-control select2"
                                                                        style="width: 100%;" name="role_user">
                                                                        <?php foreach ($role as $key) {?>
                                                                        <option value="<?=$key->id_role?>">
                                                                            <?=$key->nama_role?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modal-edit">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                                                <h4 class="modal-title">Detail User</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                </section>

                <?php $this->load->view('footer')?>
                <?php $this->load->view('js/script_transaksi_front')?>
                <?php $this->load->view('modal')?>

                <script>
                var table;
                $(document).ready(function() {

                    //datatables
                    table = $('#tbl-user').DataTable({

                        processing: true,
                        serverSide: true,
                        searching: false,
                        responsive: true,
                        dom: 'Bfrtip',

                        "ajax": {
                            "url": "<?=site_url('master/user/list_user')?>",
                            "type": "POST"
                        },

                        "columnDefs": [{
                            "targets": [0],
                            "orderable": true,
                        }, ],
                    });
                });
                </script>

                <script>
                function getEdit(id_user) {
                    var id = id_user.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/User/EditUser') ?>",
                        type: "POST",
                        data: {
                            id_user: id
                        },
                        success: function(data) {
                            //alert(data);  
                            $('.body-edit-modal').html(data);
                            $('#modal-edit').modal("show");
                        }
                    });
                }

                function getDetail(id_user) {
                    var id = id_user.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/User/DetailUser') ?>",
                        type: "POST",
                        data: {
                            id_user: id
                        },
                        success: function(data) {
                            //alert(data);  
                            $('.body-detail-modal').html(data);
                            $('#modal-detail').modal("show");
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