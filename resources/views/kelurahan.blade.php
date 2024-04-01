@extends('layouts.master')
@section('title', 'SIG | Kelurahan')
@section('content')

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/kelurahan-add" class="btn btn-success btn-sm mb-2">Tambah Data <i
                            class="fa-solid fa-plus"></i></a>

                    <div class="card shadow card-primary">
                        <div class="card-header border-transparent">
                            <h3 class="text-center">Lingkup Kelurahan Puskesmas di Kupang</h3>
                        </div>

                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <table class="table" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelurahan</th>
                                            <th>Puskesmas</th>
                                            <th>Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelurahan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->puskesmas->nama ?? 'NULL' }}</td>
                                                <td>{{ $item->puskesmas->kecamatan->nama ?? 'NULL' }}</td>
                                                <td>
                                                    <a href="/kelurahan-edit/{{ $item->id }}"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','{{ $controller = 'kelurahan' }}')"><i
                                                            class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-success btn-sm">Submit <i
                                    class="fa-solid fa-check"></i></button> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    @endsection
