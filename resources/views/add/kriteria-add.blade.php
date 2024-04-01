@extends('layouts.master')
@section('title', 'SPK | kriteria-add')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="card shadow">


                        <form action="/kriteria-store/{{ $table }}" method="POST">
                            @csrf
                            <div class="card-header text-center bg-dark">
                                <div class="row align-items-center">
                                    <div>
                                        <h5>Kriteria @if ($table == 'kriteria_sekolah')
                                                Sekolah
                                            @else
                                                Yayasan
                                            @endif
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/kriteria">Kembali</a>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}"
                                                placeholder="Nama...">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="role">Benefit / Cost</label>
                                            <select class="form-select @error('role') is-invalid @enderror"
                                                aria-label="Default select example" id="role" name="role">
                                                <option value="" selected disabled>Pilih Benefit / Cost...</option>
                                                <option value="benefit">Benefit</option>
                                                <option value="cost">Cost</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="bobot">Bobot</label>
                                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                                id="bobot" name="bobot" value="{{ old('bobot') }}"
                                                placeholder="Bobot...">
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
                                <button type="submit" class="btn btn-success btn-sm">Tambah <i
                                        class="fa-solid fa-check"></i></button>
                            </div>
                        </form>
                    </div>

                </div>

            </section>
        </div>

    @endsection
