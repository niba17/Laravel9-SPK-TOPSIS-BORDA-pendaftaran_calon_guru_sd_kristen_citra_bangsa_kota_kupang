@extends('layouts.master')
@section('title', 'SIG | Tambah Data')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/kasus/{{ 2021 }}" class="btn btn-warning btn-sm mb-2"><i
                            class="fa-solid fa-backward"></i>
                        Kembali</a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Tambah Data Kasus</b></h3>
                        </div>


                        <form action="/kasus-store" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="kelurahan_id">Kelurahan</label>
                                            <select class="form-select @error('kelurahan_id') is-invalid @enderror"
                                                aria-label="Default select example" id="kelurahan_id" name="kelurahan_id">
                                                <option value="" selected>Pilih Kelurahan...
                                                </option>
                                                @foreach ($kelurahan as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kelurahan_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="sasaran">Sasaran</label>
                                            <input type="number"
                                                class="form-control @error('sasaran') is-invalid @enderror" id="sasaran"
                                                name="sasaran" value="{{ old('sasaran') }}"
                                                placeholder="Masukkan Sasaran...">
                                            @error('sasaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="j_b_diukur">Jumlah Balita Diukur</label>
                                            <input type="number"
                                                class="form-control @error('j_b_diukur') is-invalid @enderror"
                                                id="j_b_diukur" name="j_b_diukur" value="{{ old('j_b_diukur') }}"
                                                placeholder="Masukkan Jumlah Balita Diukur...">
                                            @error('j_b_diukur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="s_pendek">Jumlah balita sangat pendek</label>
                                            <input type="number"
                                                class="form-control @error('s_pendek') is-invalid @enderror" id="s_pendek"
                                                name="s_pendek" value="{{ old('s_pendek') }}"
                                                placeholder="Masukkan Jumlah balita sangat pendek...">
                                            @error('s_pendek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="pendek">Jumlah balita pendek</label>
                                            <input type="number" class="form-control @error('pendek') is-invalid @enderror"
                                                id="pendek" name="pendek" value="{{ old('pendek') }}"
                                                placeholder="Masukkan Jumlah balita pendek...">
                                            @error('pendek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="normal">Jumlah balita normal</label>
                                            <input type="number" class="form-control @error('normal') is-invalid @enderror"
                                                id="normal" name="normal" value="{{ old('normal') }}"
                                                placeholder="Masukkan Jumlah balita normal...">
                                            @error('normal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="tinggi">Jumlah balita tinggi</label>
                                            <input type="number" class="form-control @error('tinggi') is-invalid @enderror"
                                                id="tinggi" name="tinggi" value="{{ old('tinggi') }}"
                                                placeholder="Masukkan Jumlah balita tinggi...">
                                            @error('tinggi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="total">Total</label>
                                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                                id="total" name="total" value="{{ old('total') }}"
                                                placeholder="Masukkan total...">
                                            @error('total')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="pendek">Jumlah balita pendek</label>
                                            <input type="number" class="form-control @error('pendek') is-invalid @enderror"
                                                id="pendek" name="pendek" value="{{ old('pendek') }}"
                                                placeholder="Masukkan Jumlah balita pendek...">
                                            @error('pendek')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="presentase">Presentase</label>
                                            <input type="text"
                                                class="form-control @error('presentase') is-invalid @enderror"
                                                id="presentase" name="presentase" value="{{ old('presentase') }}"
                                                placeholder="Masukkan Presentase...">
                                            @error('presentase')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-select @error('tahun') is-invalid @enderror"
                                                aria-label="Default select example" id="tahun" name="tahun">
                                                <option value="" selected>Pilih Tahun...</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                            @error('tahun')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="geojson">GeoJSON</label>
                                            <input type="text"
                                                class="form-control @error('geojson') is-invalid @enderror"
                                                id="geojson" name="geojson" value="{{ old('geojson') }}"
                                                placeholder="Masukkan GeoJSON...">
                                            @error('geojson')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Tambah <i
                                        class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
