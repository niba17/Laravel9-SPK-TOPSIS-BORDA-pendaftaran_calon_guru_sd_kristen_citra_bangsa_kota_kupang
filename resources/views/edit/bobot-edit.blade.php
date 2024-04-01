@extends('layouts.master')
@section('title', 'SPK | bobot-edit')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <div class="card shadow">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Bobot @if ($table == 'bobot_sekolah')
                                            Sekolah
                                        @else
                                            Yayasan
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <form action="/bobot-update/{{ $bobot->id }}/{{ $table }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/bobot">Kembali</a>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama Bobot</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $bobot->nama }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">

                                        <div class="form-group">
                                            <label for="bobot" class="form-label">Bobot</label>
                                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                                id="bobot" name="bobot" value="{{ $bobot->bobot }}">
                                            @error('bobot')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

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
    @endsection
