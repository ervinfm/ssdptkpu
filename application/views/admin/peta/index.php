<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <span class="card-title h4">Peta Sebaran DPT Kota Yogyakata <small><i>(Berdasarkan hasil Pemetaan Terbaru)</i></small></span>
                    <?php
                    if ($this->session->userdata('level') != 1) { ?>
                        <a href="<?= site_url('dashboard') ?>" class="btn btn-md btn-dark float-end me-1"><i class="bx bx-home"></i> Beranda</a>
                    <?php } ?>
                </div>
                <div class="col-sm-12 mt-4">
                    <div class="alert alert-info" role="alert">Untuk Rincian Pemetaan, silahkan klik salah satu marker pada maps!</div>
                    <div id="googleMap" style="width:100%;height:800px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAmZjt_jP7G7a8NZnCTZO_XQmOSzefwdE&callback=initialize" async defer></script>
<script type="text/javascript">
    var marker;

    function initialize() {
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
        $no = 1;
        foreach (get_kecamatan()->result() as $key => $kecamatan) {
            $clu1 = $clu2 = $clu3 = 0;
            foreach (get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->result() as $key => $Temp) {
                $nkel = get_kelurahan_by_kecamatan($kecamatan->id_kecamatan)->num_rows();
                $dkel = get_clust_bynamekel($Temp->nama_kelurahan)->row();
                $clu1 = $clu1 + $dkel->ncluster1_hasil;
                $clu2 = $clu2 + $dkel->ncluster2_hasil;
                $clu3 = $clu3 + $dkel->ncluster3_hasil;
            }
            $totalc123 = $clu1 + $clu2 + $clu3;
            $perc1 =  round(($clu1 / $totalc123) * 100, 2);
            $perc2 =  round(($clu2 / $totalc123) * 100, 2);
            $perc3 =  round(($clu3 / $totalc123) * 100, 2);

            $label =
                '<h4><b>Statistik Kecamatan ' . ucfirst(strtolower($kecamatan->nama_kecamatan)) . '</b></h4> <br>Jumlah Kelurahan : ' . $nkel . ' Kelurahan <br> DPT Muda (17-21 Tahun) : ' . $clu1 . ' Orang (' . $perc1 . '%) <br> DPT Dewasa (22-60 Tahun) : ' . $clu2 . ' Orang (' . $perc2 . '%) <br> DPT Lansia (>60 Tahun) : ' . $clu3 . ' Orang (' . $perc3 . '%) <br> <b>Total DPT : ' . ($clu1 + $clu2 + $clu3 . ' Orang </b>');
            $lat  = $kecamatan->latitude_maps;
            $long = $kecamatan->longitude_maps;
            echo "addMarker($lat, $long, '$label');\n";
        }

        ?>


        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: peta,
                position: lokasi,
                // animation: google.maps.Animation.BOUNCE
            });
            peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);
        }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(peta, marker);
            });
        }

    }
</script>