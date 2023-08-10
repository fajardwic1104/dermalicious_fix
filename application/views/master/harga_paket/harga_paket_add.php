<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Paket - Add</title>
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
              <h1>Create Master Harga Paket</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <div class="button-create">
                <a href="msharga-paket.html" class="btn btn-primary" role="button" style="margin-left: -12px;"> <i
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
                <form action="<?=site_url('master/HargaPaket/insert')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ID Harga</label>
                      <input class="form-control" disabled="disabled" type="text" placeholder="Generated By System">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Paket</label>
                      <select class="form-control select2" id="jenis_paket" name="jenis" style="width: 100%;">
                        <option value="">-- Pilih Jenis Paket --</option>
                        <?php foreach ($jenis as $jenis) {?>
                            <option value="<?=$jenis['id_jenis_paket']?>"><?=$jenis['jenis_paket']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kategori Paket</label>
                      <select class="form-control select2" id="kategori_paket" name="kategori" style="width: 100%;">
                        <!--<option selected="selected"></option>-->
                        <!--<option>Healthy A</option>-->
                        <!--<option>Healthy B</option>-->
                        <!--<option>Healthy C</option>-->
                        <!--<option>Healthy D</option>-->
                        <!--<option>Dermalicious A</option>-->
                        <!--<option>Dermalicious B</option>-->
                        <!--<option>Dermalicious C</option>-->
                        <!--<option>Dermalicious D</option>-->
                        <!--<option>Dermalicious E</option>-->
                        <!--<option>Dermalicious F</option>-->
                        <!--<option>Dermalicious Ruby</option>-->
                        <!--<option>Dermalicious Saphire</option>-->
                        <!--<option>Slimming Starter</option>-->
                        <!--<option>Slimming Premiere</option>-->
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <!--<div class="col-md-6">-->
                  <!--  <div class="form-group">-->
                  <!--    <label>Periode Paket</label>-->
                  <!--    <select class="form-control select2" style="width: 100%;">-->
                  <!--      <option value="">-- Pilih Periode Paket --</option>-->
                  <!--      <?php foreach ($periode as $periode) {?>-->
                  <!--          <option><?=$periode['periode_paket']?></option>-->
                  <!--      <?php } ?>-->
                  <!--    </select>-->
                  <!--  </div>-->
                  <!--</div>-->
                <!--</div>-->
                <!--<div class="row">-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Waktu Paket</label>
                      <div class="form-group">
                        <div class="form-check">
                          <div class="row">
                            <div class="col-4">
                              <input class="form-check-input" value="Lunch" type="checkbox" name="waktu[]">
                              <label class="form-check-label">Lunch</label>
                            </div>
                            <div class="col-4">
                              <input class="form-check-input" value="Dinner" type="checkbox" name="waktu[]">
                              <label class="form-check-label">Dinner</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Hari Paket</label>
                      <div class="form-check">
                        <div class="row">
                          <div class="col-3">
                            <input class="form-check-input" onclick="checkedAll(this)" id="everyday"  type="checkbox">
                            <label class="form-check-label">Everyday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Monday" type="checkbox">
                            <label class="form-check-label">Monday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Tuesday" type="checkbox">
                            <label class="form-check-label">Tuesday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Wednesday" type="checkbox">
                            <label class="form-check-label">Wednesday</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Thursday" type="checkbox">
                            <label class="form-check-label">Thursday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Friday" type="checkbox">
                            <label class="form-check-label">Friday</label>
                          </div>
                          <div class="col-3">
                            <input class="form-check-input hari" name="days[]" value="Saturday" type="checkbox">
                            <label class="form-check-label">Saturday</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!--</div>-->
                <!--<div class="row">-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Harga</label>
                      <input class="form-control" name="harga" type="text" onkeypress="return hanyaAngka(event)" onkeyup="return count(event)" id="harga-satuan" placeholder="Rp">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Diskon</label>
                      <input class="form-control" name="diskon" type="text" onkeypress="return hanyaAngka(event)" onkeyup="return count(event)" id="persen" placeholder="%">
                    </div>
                  </div>
                <!--</div>-->
                <!--<div class="row">-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Harga Setelah Diskon</label>
                      <input class="form-control" name="setelah_diskon" onkeypress="return hanyaAngka(event)" type="text" id="setelah-diskon" placeholder="Rp">
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a href="msharga-paket.html" button type="button" class="btn btn-outline-success"
                      style="margin-right: 10px;">Back</button></a>
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
                </div>
                    
                </form>
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
    
    <script>
      $(document).ready(function(){
        $('#jenis_paket').change(function(){
          var jenis = $(this).val();
        //   console.log(jenis);
          $.ajax({
            type: "POST",
            url: "<?=site_url('master/HargaPaket/getkategori')?>",
            data: {
                id_jenis_perusahaan:jenis
            },
            success : function(response){
              // alert(response);
              $('#kategori_paket').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
        });
      });
      
      function hanyaAngka(evt) {
  		var charCode = (evt.which) ? evt.which : event.keyCode
        // alert(evt.target.value);
  		  if (charCode > 31 && (charCode < 48 || charCode > 57))

  	      return false;
  	    return true;
        
  	  }
  	  
  	  
  	  function checkedAll(allCheckbox){
        var allCheckboxes = document.getElementsByClassName('hari');
        for (var i = 0; i < allCheckboxes.length; i++){
          var curCheckbox = allCheckboxes[i];
          if (curCheckbox.id != 'all'){
            curCheckbox.checked = allCheckbox.checked;
          }
        }
      }
    </script>
    
    <script>
      const diskon = document.getElementById("diskon");
  	  const harga_satuan = document.getElementById("harga-satuan");
  	  const setelah_diskon = document.getElementById("setelah-diskon");
  	  
  	  function count(evt) {
  	      var charCode = (evt.which) ? evt.which : event.keyCode;
  	      
  	     // var value_discount = parseInt(evt.target.value) ? parseInt(evt.target.value) : 0;
  	      var value_discount = parseInt($('#diskon').val()) ? parseInt($('#diskon').val()) : 0;
  	      var harga = parseInt(harga_satuan.value) ? parseInt(harga_satuan.value) : 0;
  	      var checkedbox = $('[name="days[]"]:checked').length;
  	      const disk = (value_discount/100).toFixed(2);
  	      const calculate_disc = disk * (harga * checkedbox);
  	      const hasil = (harga * checkedbox) - calculate_disc;
  	      
  	     // if (checkedbox == 6) {
  	         
  	     // }
        //   alert(hasil);
        $('#setelah-diskon').val(hasil);
  	  }
    </script>
</body>
</html>
