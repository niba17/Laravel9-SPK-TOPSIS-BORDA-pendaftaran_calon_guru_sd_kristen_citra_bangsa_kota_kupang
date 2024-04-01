@extends('layouts.master')
@section('title', 'SPK | Kriteria')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Kriteria Sekolah</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <a class="btn btn-primary btn-sm mb-3" href="/home">Kembali</a>
                                            <a class="btn btn-primary btn-sm mb-3"
                                                href="/kriteria-add/kriteria_sekolah">Tambah Data</a>
                                            <table class="table table-bordered table-striped" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Benefit / Cost</th>
                                                        <th>Bobot</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kriteriaSekolah as $item)
                                                        <tr>
                                                            <td class="fw-bold">{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ ucfirst($item->role) }}</td>
                                                            <td>{{ $item->bobot }}</td>
                                                            <td>
                                                                <a href="/kriteria-edit/{{ $item->id }}/kriteria_sekolah"
                                                                    class="btn btn-warning btn-sm"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="hapus('{{ $item->id }}','{{ $controller = 'kriteria' }}','{{ $table = 'kriteria_sekolah' }}')"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Kriteria Yayasan</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <a class="btn btn-primary btn-sm mb-3"
                                                href="/kriteria-add/kriteria_yayasan">Tambah Data</a>
                                            <table class="table table-bordered table-striped" id="myTable2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Benefit / Cost</th>
                                                        <th>Bobot</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kriteriaYayasan as $item)
                                                        <tr>
                                                            <td class="fw-bold">{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ ucfirst($item->role) }}</td>
                                                            <td>{{ $item->bobot }}</td>
                                                            <td>
                                                                <a href="/kriteria-edit/{{ $item->id }}/kriteria_yayasan"
                                                                    class="btn btn-warning btn-sm"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onclick="hapus('{{ $item->id }}','{{ $controller = 'kriteria' }}','{{ $table = 'kriteria_yayasan' }}')"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
