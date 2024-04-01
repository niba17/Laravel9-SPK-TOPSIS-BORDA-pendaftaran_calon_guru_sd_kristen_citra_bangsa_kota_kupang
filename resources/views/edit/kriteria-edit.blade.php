@extends('layouts.master')
@section('title', 'SPK | kriteria-edit')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <div class="card shadow">
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
                        <form action="/kriteria-update/{{ $kriteria->id }}/{{ $table }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/kriteria">Kembali</a>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama Kriteria</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $kriteria->nama }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        @php $role = ['benefit', 'cost'] @endphp
                                        <div class="form-group">
                                            <label for="role">Benefit / Cost</label>
                                            <select class="form-select" aria-label="Default select example" id="role"
                                                name="role">
                                                @foreach ($role as $item)
                                                    <option value="{{ $item }}"
                                                        @if (isset($kriteria->role)) @if ($kriteria->role == $item) {{ 'selected' }} @endif
                                                    @else{ {{ '' }} } @endif>
                                                        {{ ucfirst($item) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="form-group">
                                            <label for="bobot" class="form-label">Bobot</label>
                                            <input type="number" class="form-control @error('bobot') is-invalid @enderror"
                                                id="bobot" name="bobot" value="{{ $kriteria->bobot }}">
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
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
