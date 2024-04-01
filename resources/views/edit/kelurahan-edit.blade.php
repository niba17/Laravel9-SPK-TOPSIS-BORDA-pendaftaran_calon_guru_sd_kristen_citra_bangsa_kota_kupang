@extends('layouts.master')
@section('title', 'SPK | Ubah Data')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/kelurahan" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i>
                        Kembali</a>

                    <div class="card shadow card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>Ubah Data Kelurahan</b></h3>
                        </div>

                        <form action="/kelurahan-update/{{ $kelurahan->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nama">Kelurahan</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ $kelurahan->nama }}"
                                                placeholder="Nama Kelurahan...">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="puskesmas_id">Puskesmas</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="puskesmas_id" name="puskesmas_id">
                                                @foreach ($puskesmas as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if (isset($kelurahan->puskesmas->nama)) @if ($kelurahan->puskesmas->nama == $item->nama) {{ 'selected' }} @endif
                                                    @else { {{ '' }} } @endif>
                                                        {{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-sm">Ubah <i
                                        class="fa-solid fa-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
