<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday</title>
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
                                <h1>Master Holiday</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                                <div class="button-create">
                                    <a href="<?=site_url('master/MasterMenu')?>" class="btn btn-primary" role="button"
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
                                                <label>ID Holiday</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <div class="input-group date" id="tglholiday"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#tglholiday" />
                                                    <div class="input-group-append" data-target="#tglholiday"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
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
                                            <h3 class="card-title">Holiday Detail</h3>
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm" style="width: 50px;">
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#modal-create"
                                                            style="margin-top: 10px;"><i
                                                                class="fas fa-plus" title="Create"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="holiday-table" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID Holiday</th>
                                                        <th>Date</th>
                                                        <th>Remarks</th>
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
                                <h4 class="modal-title">Add Holiday</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?=site_url('master/holiday/insertHoliday/')?>" method="post"
                                rnctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Date Holiday</label>
                                                    <div class="input-group date" id="tgl-addholiday"
                                                        data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input"
                                                            name="date_holiday" data-target="#tgl-addholiday" />
                                                        <div class="input-group-append" data-target="#tgl-addholiday"
                                                            data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <input class="form-control" name="tgl_holiday" type="text"> -->
                                                    </select>
                                                </div>

                                                <!-- /.form-group -->
                                                <div class="form-group">
                                                    <label>Remarks</label>
                                                    <input class="form-control" name="catatan_holiday" type="text">
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
                                <h4 class="modal-title">Edit Holiday</h4>
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
                                <h4 class="modal-title">Detail Holiday</h4>
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
                    table = $('#holiday-table').DataTable({

                        "processing": true,
                        "serverSide": true,
                        "searching": false,
                        "responsive": true,
                        "autoWidth": false,
                        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                        // "searchDelay": 2000,
                        // "order": [[5,'desc']],

                        "ajax": {
                            "url": "<?=site_url('master/holiday/list_holiday')?>",
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

                        "columnDefs": [{
                            "targets": [0],
                            "orderable": true,
                        }, ],

                    });

                });
                </script>

                <script>
                $(function() {
                    $('#tgl-addholiday').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                    $('#tgl-editholiday').datetimepicker({
                        format: 'YYYY-MM-DD'
                    });
                })
                </script>

                <script>
                function getEdit(id_holiday) {
                    var id = id_holiday.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/holiday/EditHoliday') ?>",
                        type: "POST",
                        data: {
                            id_holiday: id
                        },
                        success: function(data) {
                            //alert(data);  
                            $('.body-edit-modal').html(data);
                            $('#modal-edit').modal("show");
                        }
                    });
                }

                function getDetail(id_holiday) {
                    var id = id_holiday.getAttribute("data-id");
                    // alert(id);
                    $.ajax({
                        url: "<?=site_url('master/holiday/DetailHoliday') ?>",
                        type: "POST",
                        data: {
                            id_holiday: id
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