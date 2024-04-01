@extends('layouts.masterLanding')
@section('title', 'SIG | Peta')
@section('content')

    <div class="container-fluid p-3">
        <a href="/" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i> Kembali</a>

        {{-- <div class="card shadow mb-3">
            <div class="card-header bg-info">
                <h2 class="text-center text-dark"><strong>Total Kasus Stunting wilayah Kota Kupang</strong></h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="alert alert-primary" role="alert">
                            <strong>
                                <h5 class="card-title">Total Kasus</h5>
                                <p class="card-text">{{ count($kasus) }}</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="alert alert-success" role="alert">
                            <strong>
                                <h5 class="card-title">Pasien Sembuh</h5>
                                <p class="card-text">34545345</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                <h5 class="card-title">Pasien Dirawat</h5>
                                <p class="card-text">34545345</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="alert alert-danger" role="alert">
                            <strong>
                                <h5 class="card-title">Pasien Meninggal</h5>
                                <p class="card-text">34545345</p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"> --}}
        {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                        class="fa-solid fa-check"></i></button> --}}
        {{-- </div>
        </div> --}}

        <div class="card shadow">

            <div class="card-header bg-info">
                <h2 class="text-center text-white"><strong>Sebaran Stunting wilayah kota Kupang</strong></h2>
            </div>

            <div class="card-body">
                <select class="form-select col-lg-3 col-mb-3 col-sm-12 mb-2" id="tahun"
                    aria-label="Default select example">
                    <option selected>Tahun Persebaran</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            <strong>
                                <h5 class="card-title"><b>Total Kasus</b></h5>
                                <p class="card-text" id="tKasus">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                <h5 class="card-title"><b>Total Sasaran</b></h5>
                                <p class="card-text" id="tSasaran">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <strong>
                                <h5 class="card-title"><b>Total Balita Diukur</b></h5>
                                <p class="card-text" id="tBDiukur">-</p>
                            </strong>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="alert alert-primary" role="alert">
                            <strong>
                                <h5 class="card-title"><b>Presentase</b></h5>
                                <p class="card-text" id="presentase">-</p>
                            </strong>
                        </div>
                    </div>
                </div>


                <div class="row py-1">
                    <div class="col-lg-12">
                        <div id="map" style="height: 690px;"></div>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                    class="fa-solid fa-check"></i></button> --}}
            </div>
        </div>
    </div>

    <script>
        //Dekralasi Map
        var map = L.map('map', {
            zoomControl: true
        });

        //Deklarasi Lat & Lng Map
        var latLng = [-10.210167, 123.608319];

        //Set Posisi View Awal Dan Zoom Map
        map.setView(latLng, 12);

        //Deklarasi Tipe Map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // L.marker(latLng).addTo(map)
        // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        // .openPopup();

        $('#tahun').on('change', function(geojsonLayer) {
            var tahun = $(this).val()
            var kasus = 0
            var sasaran = 0
            var j_b_diukur = 0
            var presentase = 0
            $.ajax({
                url: "{{ route('peta-request') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(element => {
                        if (tahun == element.tahun) {
                            kasus++
                            sasaran = sasaran + element.sasaran
                            j_b_diukur = j_b_diukur + element.j_b_diukur
                            presentase = (j_b_diukur / 100) * sasaran
                        }
                        $.getJSON("{{ asset('/plugin/mapGEOJSON') }}" + '/' + element
                            .geojson,
                            function(data) {
                                if (tahun == element.tahun) {

                                    console.log(element)

                                    geojsonLayer = L.geoJson(data, {
                                        style: function(feature) {
                                            return {
                                                opacity: 0.5,
                                                color: 'blue',
                                                // fillOpacity: 1.0,
                                                fillColor: 'blue',
                                                weight: 1
                                            }
                                        },
                                    }).addTo(map)
                                    geojsonLayer.eachLayer(function(layer) {
                                        layer.bindPopup(
                                            'Kecamatan : ' + element
                                            .kelurahan.puskesmas
                                            .kecamatan.nama +
                                            '<br> Kelurahan : ' +
                                            element
                                            .kelurahan.nama +
                                            '<br> Puskesmas : ' +
                                            element.kelurahan.puskesmas.nama +
                                            '<br>Tahun : ' + element.tahun +
                                            '<br> Total Kasus : ' + element
                                            .total
                                        )
                                    })
                                }
                            })
                    })
                    $('#tKasus').html(kasus)
                    $('#tSasaran').html(sasaran)
                    $('#tBDiukur').html(j_b_diukur)
                    $('#presentase').html(presentase + ' %')


                }
            })
        })
    </script>
@endsection
