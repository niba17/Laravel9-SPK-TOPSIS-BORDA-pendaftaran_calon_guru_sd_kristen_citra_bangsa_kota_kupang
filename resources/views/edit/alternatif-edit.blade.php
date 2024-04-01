@extends('layouts.master')
@section('title', 'SPK | alternatif-edit')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <div class="card shadow">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Alternatif @if ($table == 'alternatif_kriteria_sekolah')
                                            Sekolah
                                        @else
                                            Yayasan
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <form action="/alternatif-update/{{ $alternatif->id }}/{{ $table }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/alternatif">Kembali</a>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama"
                                                value="{{ $alternatif->nama ?? 'NULL' }}" disabled>
                                            <input type="hidden" value="{{ $alternatif->id ?? 'NULL' }}" name="biodata_id">
                                        </div>
                                    </div>
                                    @foreach ($kriteria as $item)
                                        <div class="col-lg-4 col-sm-12">
                                            <input type="hidden"
                                                @if ($item->nama == 'Usia') id="kriteria_id[usia]" @else id="kriteria_id[{{ $loop->iteration - 1 }}]" @endif
                                                name="kriteria_id[{{ $loop->iteration - 1 }}]" value="{{ $item->id }}">
                                            <div class="form-group">
                                                <label for="bobot_{{ $item->nama }}"
                                                    class="form-label">{{ $item->nama }}</label>
                                                <input type="number" @if ($item->nama != 'Usia') step="any" @endif
                                                    class="form-control @if ($item->nama == 'Usia') @error('bobot_usia') is-invalid @enderror @else @error('bobot_' . $item->id) is-invalid @enderror @endif"
                                                    id="bobot_{{ $item->id }}"
                                                    @if ($item->nama == 'Usia') name="bobot_usia" @else name="bobot_{{ $item->id }}" @endif
                                                    @if ($table == 'alternatif_kriteria_sekolah' && count($alternatif->kriteria_sekolah) > 0) value="{{ $alternatif->kriteria_sekolah[$loop->iteration - 1]->nilai ?? '' }}"
                                        @elseif(count($alternatif->kriteria_sekolah) < 1)
                                        value=""
                                    @elseif($table == 'alternatif_kriteria_yayasan' && count($alternatif->kriteria_yayasan) > 0) value="{{ $alternatif->kriteria_yayasan[$loop->iteration - 1]->nilai ?? '' }}" @elseif(count($alternatif->kriteria_yayasan) < 1) value="" @else value="" @endif>
                                                @if ($item->nama == 'Usia')
                                                    @error('bobot_usia')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @else
                                                    @error('bobot_' . $item->id)
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- @php
                                        echo '<pre>';
                                        print_r($errors);
                                    @endphp --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
                                {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                                        class="fa-solid fa-check"></i></button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <script>
            // function check(input) {
            //     if (input.value < 20) {
            //         input.setCustomValidity('Usia minimaladalah 20 tahun!');
            //     } else if (input.value > 30) {
            //         // input is fine -- reset the error message
            //         input.setCustomValidity('Usia maximaladalah 30 tahun!');
            //     } else {
            //         input.setCustomValidity('');
            //     }
            // }

            // $('#usia').siblings('input').on('focusout', function() {
            //     var usia = $(this).val()
            //     $(this).parent('div').children('small').empty()
            //     if (usia > 30) {
            //         $(this).parent('div').append(`
    //         <small class="text-danger">Usia maximal adalah 30 tahun!</small>
    //         `)
            //     } else if (usia < 20) {
            //         $(this).parent('div').append(`
    //         <small class="text-danger">Usia minimal adalah 20 tahun!</small>
    //         `)
            //     } else if (usia >= 20 && usia <= 22) {
            //         $(this).parent('div').append(`
    //         <small class="text-success">Bobot Usia : 1</small>
    //         `)
            //     } else if (usia > 22 && usia <= 24) {
            //         $(this).parent('div').append(`
    //         <small class="text-success">Bobot Usia : 2</small>
    //         `)
            //     } else if (usia > 24 && usia <= 26) {
            //         $(this).parent('div').append(`
    //         <small class="text-success">Bobot Usia : 3</small>
    //         `)
            //     } else if (usia > 26 && usia <= 28) {
            //         $(this).parent('div').append(`
    //         <small class="text-success">Bobot Usia : 4</small>
    //         `)
            //     } else if (usia > 28 && usia <= 30) {
            //         $(this).parent('div').append(`
    //         <small class="text-success">Bobot Usia : 5</small>
    //         `)
            //     }
            // })

            // $('#bukan_usia').siblings('input').on('focusout', function() {
            //     var value = $(this).val()
            //     $(this).parent('div').children('small').empty()
            //     if (value >= 0 && value < 20) {
            //         $(this).parent('div').append(`<small class="text-success">Bobot Usia : 1</small>`)
            //     } else if (value >= 20 && value < 40) {
            //         $(this).parent('div').append(`<small class="text-success">Bobot Usia : 2</small>`)
            //     } else if (value >= 40 && value < 60) {
            //         $(this).parent('div').append(`<small class="text-success">Bobot Usia : 3</small>`)
            //     } else if (value >= 60 && value < 80) {
            //         $(this).parent('div').append(`<small class="text-success">Bobot Usia : 4</small>`)
            //     } else if (value >= 80 && value <= 100) {
            //         $(this).parent('div').append(`<small class="text-success">Bobot Usia : 5</small>`)
            //     }
            // })

            // $('#bukan_usia').siblings('input').on('focusout', function() {

            // var value = $(this).val()
            // $(this).parent('div').children('small').empty()
            // if (value >= 0 && value < 20) {
            //     $(this).parent('div').append(`<small class="text-success">Bobot Usia : 1</small>`)
            // } else if (value >= 20 && value < 40) {
            //     $(this).parent('div').append(`<small class="text-success">Bobot Usia : 2</small>`)
            // } else if (value >= 40 && value < 60) {
            //     $(this).parent('div').append(`<small class="text-success">Bobot Usia : 3</small>`)
            // } else if (value >= 60 && value < 80) {
            //     $(this).parent('div').append(`<small class="text-success">Bobot Usia : 4</small>`)
            // } else if (value >= 80 && value <= 100) {
            //     $(this).parent('div').append(`<small class="text-success">Bobot Usia : 5</small>`)
            // }
            // })
        </script>
    @endsection
