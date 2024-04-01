@extends('layouts.master')
@section('title', 'SPK | Member-edit')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="row">

                        <div class="card shadow">
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/member">Kembali</a>
                                <hr>
                                <form>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Akun</label>
                                        <input type="text" class="form-control" id="username"
                                            value="{{ $member->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama"
                                            value="{{ $member->biodata->nama }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No HP</label>
                                        <input type="number" class="form-control" id="no_hp"
                                            value="{{ $member->biodata->no_hp }}">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
