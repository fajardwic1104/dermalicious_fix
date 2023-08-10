    <script>
      $(document).ready(function(){
        $('#jenis_paket').change(function(){
          var jenis = $(this).val();
        //   console.log(jenis);
          $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getkategori')?>",
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
        
        $('#waktu-paket').change(function(){
           var jenis = $('#jenis_paket').val();
           var kategori = $('#kategori_paket').val();
           var waktupaket = $('#waktu-paket').val();
           var periode = $('#periode_paket').val();
           var jenis_paket, kategori_paket;
           Object.values(document.getElementById('jenis_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == jenis) {
                        jenis_paket = option.text;
                        // alert(option.text);
                    }
                });
            Object.values(document.getElementById('kategori_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == kategori) {
                        kategori_paket = option.text;
                        // alert(option.text);
                    }
                }); 
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                if (periode != null || periode != "") {
                    
                // } else {
                    if (periode == "2 Weeks") {
                        if (waktupaket != "lunch-dinner") {
                            document.getElementById("qty-paket").value = 12;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        } else{
                            document.getElementById("qty-paket").value = 24;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        }
                      } else if (periode == "1 Months"){
                        if (waktupaket != "lunch-dinner") {
                            document.getElementById("qty-paket").value = 24;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        } else{
                            document.getElementById("qty-paket").value = 48;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        }
                      } else if (periode == "2 Months"){
                        if (waktupaket != "lunch-dinner") {
                            document.getElementById("qty-paket").value = 48;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        } else{
                            document.getElementById("qty-paket").value = 96;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        }
                      } else if (periode == "1 Weeks" || periode == "1 Week" || periode == "1 weeks" || periode == "1 weeks" || periode == "1 Minggu" || periode == "1 Minggu"){
                        if (waktupaket != "lunch-dinner") {
                            document.getElementById("qty-paket").value = 6;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        } else{
                            document.getElementById("qty-paket").value = 12;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        }
                      } else if (periode == "3 Months" || periode == "3 month" || periode == "3 bulan" || periode == "3 Month"){
                        if (waktupaket != "lunch-dinner") {
                            document.getElementById("qty-paket").value = 72;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        } else{
                            document.getElementById("qty-paket").value = 144;
                            document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
                        }
                      }
                }
        });
        
        $('#jenis_paket').change(function(){
           var jenis = $('#jenis_paket').val();
           var kategori = $('#kategori_paket').val();
           var waktupaket = $('#waktu-paket').val();
           var jenis_paket, kategori_paket;
           Object.values(document.getElementById('jenis_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == jenis) {
                        jenis_paket = option.text;
                        // alert(option.text);
                    }
                });
            Object.values(document.getElementById('kategori_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == kategori) {
                        kategori_paket = option.text;
                        // alert(option.text);
                    }
                }); 
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
        });
      })
    </script>

    <script>
      function checkedAll(allCheckbox){
        var allCheckboxes = document.getElementsByTagName('input');
        for (var i = 0; i < allCheckboxes.length; i++){
          var curCheckbox = allCheckboxes[i];
          if (curCheckbox.id != 'all'){
            curCheckbox.checked = allCheckbox.checked;
          }
        }
      }

      // let jadwal = [];
      function getPeriod() {
        let arr = [];
        let checkedbox = document.querySelectorAll("input[type='checkbox']:checked"); 
        var qty = $('#qty-paket').val();

        for (let i = 0; i < checkedbox.length; i++) {
          arr.push(checkedbox[i].value)
        }
        $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/gethari')?>",
            data: {
                jadwal:arr, qty:qty
            },
            success : function(data){
              // alert(JSON.parse(data).start_periode);
              
              document.getElementById("start_date_periode").value = JSON.parse(data).start_periode;
              document.getElementById("end_date_periode").value = JSON.parse(data).end_periode;
              // $('#kecamatan-1').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
      }

    </script>

    <!-- JavaScript Alamat 1 -->
    <script>
      $(document).ready(function(){
        $('#kota-1').change(function(){
            var kota = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getdistricts')?>",
            data: {
                id_kota:kota
            },
            success : function(response){
              // alert(response);
              $('#kecamatan-1').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
        });

        $('#kecamatan-1').change(function(){
            var kecamatan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getsubdistricts')?>",
            data: {
                id_kecamatan:kecamatan
            },
            success : function(response){
              // alert(response);
              $('#kelurahan-1').html(response);
            }
          })
        });

        $('#kelurahan-1').change(function(){
            var keluarahan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getpostcode')?>",
            data: {
                id_keluarahan:keluarahan
            },
            success : function(response){
              document.getElementById("kodepos-1").value = response;
            }
          })
        });
      })
    </script>

    <!-- JavaScript Alamat 2 -->
    <script>
      $(document).ready(function(){
        $('#kota-2').change(function(){
            var kota = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getdistricts')?>",
            data: {
                id_kota:kota
            },
            success : function(response){
              // alert(response);
              $('#kecamatan-2').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
        });

        $('#kecamatan-2').change(function(){
            var kecamatan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getsubdistricts')?>",
            data: {
                id_kecamatan:kecamatan
            },
            success : function(response){
              // alert(response);
              $('#kelurahan-2').html(response);
            }
          })
        });

        $('#kelurahan-2').change(function(){
            var keluarahan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getpostcode')?>",
            data: {
                id_keluarahan:keluarahan
            },
            success : function(response){
              // alert(response);
              document.getElementById("kodepos-2").value = response;
            }
          })
        });
      })
    </script>

    <!-- JavaScript Alamat 2 -->
    <script>
      $(document).ready(function(){
        $('#kota-3').change(function(){
            var kota = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getdistricts')?>",
            data: {
                id_kota:kota
            },
            success : function(response){
              // alert(response);
              $('#kecamatan-3').html(response);
            //   $('#kategori_paket').selectpicker('refresh');
            }
          })
        });

        $('#kecamatan-3').change(function(){
            var kecamatan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getsubdistricts')?>",
            data: {
                id_kecamatan:kecamatan
            },
            success : function(response){
              // alert(response);
              $('#kelurahan-3').html(response);
            }
          })
        });

        $('#kelurahan-3').change(function(){
            var keluarahan = $(this).val();
            $.ajax({
            type: "POST",
            url: "<?=site_url('transaksi/getpostcode')?>",
            data: {
                id_keluarahan:keluarahan
            },
            success : function(response){
              // alert(response);
              document.getElementById("kodepos-3").value = response;
            }
          })
        });
      })
    </script>

    <script>
      $(document).ready(function(){
        $('#periode_paket').change(function(){
          var periode = $(this).val();
          var waktupaket = $('#waktu-paket').val();
          var jenis = $('#jenis_paket').val();
          var kategori = $('#kategori_paket').val();
          var start_date_periode = $('#start_date_periode').val();
          var jenis_paket, kategori_paket;
            Object.values(document.getElementById('jenis_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == jenis) {
                        jenis_paket = option.text;
                        // alert(option.text);
                    }
                });
            Object.values(document.getElementById('kategori_paket').options).
                forEach(function (option) {
                    // alert(option.text);
                    if (option.value == kategori) {
                        kategori_paket = option.text;
                        // alert(option.text);
                    }
                });
        //   console.log(jenis_paket);

        // $.ajax({
        //     type: "POST",
        //     url: "<?=site_url('transaksi/getEndPeriode')?>",
        //     data: {
        //         periode:periode, start_date_periode:start_date_periode
        //     },
        //     success : function(response){
        //       // alert(response);
        //       // $('#end_date_periode').html(response);
        //       document.getElementById("end_date_periode").value = response;
        //     }
        //   });
        document.getElementById("nama-barang").value = jenis_paket +" - "+ kategori_paket;
          if (periode == "2 Weeks") {
            if (waktupaket != "lunch-dinner") {
                document.getElementById("qty-paket").value = 12;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            } else{
                document.getElementById("qty-paket").value = 24;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            }
          } else if (periode == "1 Months"){
            if (waktupaket != "lunch-dinner") {
                document.getElementById("qty-paket").value = 24;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            } else{
                document.getElementById("qty-paket").value = 48;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            }
          } else if (periode == "2 Months"){
            if (waktupaket != "lunch-dinner") {
                document.getElementById("qty-paket").value = 48;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            } else{
                document.getElementById("qty-paket").value = 96;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            }
          } else if (periode == "1 Weeks" || periode == "1 Week" || periode == "1 weeks" || periode == "1 weeks" || periode == "1 Minggu" || periode == "1 Minggu"){
            if (waktupaket != "lunch-dinner") {
                document.getElementById("qty-paket").value = 6;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            } else{
                document.getElementById("qty-paket").value = 12;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            }
          } else if (periode == "3 Months" || periode == "3 month" || periode == "3 bulan" || periode == "3 Month"){
            if (waktupaket != "lunch-dinner") {
                document.getElementById("qty-paket").value = 72;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            } else{
                document.getElementById("qty-paket").value = 144;
                document.getElementById("detail-paket").value = jenis_paket +" - "+ waktupaket;
            }
          }
        });
      })
    </script>

<script>
    function alamat() {
      var alamat, kecamatan, kelurahan, kota, kodepos;
      var getkecamatan1 =  $('#kecamatan-1').val();
      var getkelurahan1 =  $('#kelurahan-1').val();
      var getkota1 =  $('#kota-1').val();
      Object.values(document.getElementById('kecamatan-1').options).
        forEach(function (option) {
          if (option.value == getkecamatan1) {
            kecamatan = option.text;
          }
        });
        Object.values(document.getElementById('kota-1').options).
        forEach(function (option) {
          if (option.value == getkota1) {
            kota = option.text;
          }
        });
        Object.values(document.getElementById('kelurahan-1').options).
        forEach(function (option) {
          if (option.value == getkelurahan1) {
            kelurahan = option.text;
          }
        });
  
        kodepos = $('#kodepos-1').val();
        // alert(kota + ", " +kecamatan + ", " +kelurahan + ", " + kodepos);
        alamat = $('#alamat-1').val();
        
        let fullAlamat1;
        // alert(alamat3);  
        if (getkota1 == "") {
          fullAlamat1 = alamat;
        } else{
          fullAlamat1 = alamat + ", " + kelurahan + ", " +kecamatan + ", " + kota + ", " + kodepos
        }
        
        let link = document.getElementById("maps-1");
        // link.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.434933898378!2d106.84263727262838!3d-6.206219193781573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f46d89841c4d%3A0x3a9450e726f99c53!2s"+fix+"!5e0!3m2!1sen!2sid!4v1683874918114!5m2!1sen!2sid";
        link.src = "https://maps.google.com/maps?q="+fullAlamat1+"&output=embed";
        document.getElementById("link-maps-1").value = link.src;
        console.log(link.src);
    }
</script>

<script>
    function alamat2() {
      var alamat2, kecamatan2, kelurahan2, kota2, kodepos2;
      var getkecamatan2 =  $('#kecamatan-2').val();
      var getkelurahan2 =  $('#kelurahan-2').val();
      var getkota2 =  $('#kota-2').val();
      
      Object.values(document.getElementById('kecamatan-2').options).
        forEach(function (option) {
          if (option.value == getkecamatan2) {
            kecamatan2 = option.text;
          }
        });
        Object.values(document.getElementById('kota-2').options).
        forEach(function (option) {
          if (option.value == getkota2) {
            kota2 = option.text;
          }
        });
        Object.values(document.getElementById('kelurahan-2').options).
        forEach(function (option) {
          if (option.value == getkelurahan2) {
            kelurahan2 = option.text;
          }
        });
  
        kodepos2 = $('#kodepos-2').val();
        alamat2 = $('#alamat-2').val();
        // alert(alamat2);
        let fullAlamat1;
        // alert(alamat3);  
        if (getkota2 == "") {
          fullAlamat1 = alamat2;
        } else{
          
          fullAlamat1 = alamat2 + ", " + kelurahan2 + ", " +kecamatan2 + ", " + kota2 + ", " + kodepos2;
        }
        let link = document.getElementById("maps-2");
        // link.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.434933898378!2d106.84263727262838!3d-6.206219193781573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f46d89841c4d%3A0x3a9450e726f99c53!2s"+fix+"!5e0!3m2!1sen!2sid!4v1683874918114!5m2!1sen!2sid";
        link.src = "https://maps.google.com/maps?q="+fullAlamat1+"&output=embed";
        document.getElementById("link-maps-2").value = link.src;
        console.log(link.src);
    }
</script>

<script>
    function alamat3() {
      var alamat3, kecamatan3, kelurahan3, kota3, kodepos3;
      var getkecamatan3 =  $('#kecamatan-3').val();
      var getkelurahan3 =  $('#kelurahan-3').val();
      var getkota3 =  $('#kota-3').val();
      
      Object.values(document.getElementById('kecamatan-3').options).
        forEach(function (option) {
          if (option.value == getkecamatan3) {
            kecamatan3 = option.text;
          }
        });
        Object.values(document.getElementById('kota-3').options).
        forEach(function (option) {
          if (option.value == getkota3) {
            kota3 = option.text;
          }
        });
        Object.values(document.getElementById('kelurahan-3').options).
        forEach(function (option) {
          if (option.value == getkelurahan3) {
            kelurahan3 = option.text;
          }
        });
        
        let fullAlamat1;
        kodepos3 = $('#kodepos-3').val();
        // alert(getkota3);
        alamat3 = $('#alamat-3').val();
        // alert(alamat3);  
        if (getkota3 == "") {
          fullAlamat1 = alamat3;
        } else{
          fullAlamat1 = alamat3 + ", " + kelurahan3 + ", " +kecamatan3 + ", " + kota3 + ", " + kodepos3;
        }
        let link = document.getElementById("maps-3");
        // link.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.434933898378!2d106.84263727262838!3d-6.206219193781573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f46d89841c4d%3A0x3a9450e726f99c53!2s"+fix+"!5e0!3m2!1sen!2sid!4v1683874918114!5m2!1sen!2sid";
        link.src = "https://maps.google.com/maps?q="+fullAlamat1+"&output=embed";
        document.getElementById("link-maps-3").value = link.src;
        console.log(link.src);
    }
</script>