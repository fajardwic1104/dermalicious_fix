<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik</title>
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
                                <h1>Klinik</h1>
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
                                                <label>ID Klinik</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Klinik</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option>Dermaster Mangga Besar</option>
                                                    <option>Dermaster Pondok Indah</option>
                                                    <option>Dermaster Pantai Indah Kapuk</option>
                                                    <option>Dermaster Bali Seminyak</option>
                                                    <option>Dermaster Kemang</option>
                                                    <option>Dermaster Kelapa Gading</option>
                                                    <option>Dermaster Pakubuwono</option>
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
                                            <h3 class="card-title">Master Klinik Detail</h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 50px;">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#modal-create"
                                                            style="margin-top: 10px;"><i
                                                                class="fas fa-plus" title="Create"></i></button>
                                                        <!-- <button class="btn btn-primary" data-toggle="tooltip" title="Create" data-toggle="modal" data-target="#modal-create">
                            <i class="fas fa-plus"></i></button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="klinik-table" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID Klinik</th>
                                                        <th>Nama Klinik</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                </section>

                <!-- Modal Create -->
                <div class="modal fade" id="modal-create">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Klinik</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?=site_url('master/Klinik/insertDataKlinik/')?>" method="post"
                                rnctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input class="form-control" name="nama_klinik" type="text">
                                                    </select>
                                                </div>

                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Brand</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        name="perusahaan">
                                                        <option value="">-- Select Perusahaan --</option>';
                                                        <?php foreach ($brand as $key) { ?>
                                                        <option value="<?=$key['id_perusahaan']?>"><?=$key['nama']?>
                                                        </option>
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
                    table = $('#klinik-table').DataTable({

                        "processing": true,
                        "serverSide": true,
                        "searching": false,
                        "responsive": true,
                        "autoWidth": true,
                        // "dom": 'Bfrtip',
                        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                        // "searchDelay": 2000,
                        // "order": [[5,'desc']],

                        "ajax": {
                            "url": "<?=site_url('master/klinik/list_klinik')?>",
                            "type": "POST"
                        },

                        dom: 'lBfrtip',
                        buttons: [{
                            extend: 'pdf',
                            footer: false,

                        }, {
                            extend: 'excel',
                            footer: false,
                        }, {
                            extend: 'print',
                            footer: false,
                        }],

                        "columnDefs": [{
                            "targets": [0],
                            "orderable": true,
                        }, ],

                    });

                });
                </script>

                <script>
                function getEdit(id_klinik) {
                    var id = id_klinik.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/klinik/EditKlinik') ?>",
                        type: "POST",
                        data: {
                            id_klinik: id
                        },
                        success: function(data) {
                            //alert(data);  
                            $('.body-edit-modal').html(data);
                            $('#modal-edit').modal("show");
                        }
                    });
                }

                function getDetail(id_klinik) {
                    var id = id_klinik.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/klinik/DetailKlinik') ?>",
                        type: "POST",
                        data: {
                            id_klinik: id
                        },
                        success: function(data) {
                            //alert(data);  
                            $('.body-detail-modal').html(data);
                            $('#modal-detail').modal("show");
                        }
                    });
                }

                // function addKlinik() {
                //   // var id = id_klinik.getAttribute("data-id");
                //   // alert(id);
                //   $.ajax({  
                //       url : "<?//=site_url('master/klinik/addKlinik') ?>", 
                //       type:"POST",  
                //       // data:{id_klinik:id},  
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