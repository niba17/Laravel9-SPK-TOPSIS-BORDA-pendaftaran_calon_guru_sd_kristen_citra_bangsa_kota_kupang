@extends('layouts.master')
@section('title', 'SPK | Bobot')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <a class="btn btn-primary btn-sm mb-3" href="/home">Kembali</a>
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Bobot Sekolah</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <a class="btn btn-primary btn-sm" href="/bobot-add/bobot_sekolah">Tambah Data</a>
                                <hr>
                                <table class="table table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bobotSekolah as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->bobot }}</td>
                                                <td>
                                                    <a href="/bobot-edit/{{ $item->id }}/bobot_sekolah"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','{{ $controller = 'bobot' }}','{{ $table = 'bobot_sekolah' }}')"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Bobot Yayasan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <a class="btn btn-primary btn-sm" href="/bobot-add/bobot_yayasan">Tambah Data</a>
                                <hr>
                                <table class="table table-bordered" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bobotYayasan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->bobot }}</td>
                                                <td>
                                                    <a href="/bobot-edit/{{ $item->id }}/bobot_yayasan"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','{{ $controller = 'bobot' }}','{{ $table = 'bobot_yayasan' }}')"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
