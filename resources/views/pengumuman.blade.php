@extends('layouts.master')
@section('title', 'SPK | Pengumuman')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Pengumuman Administrasi</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <a class="btn btn-primary btn-sm" href="/home">Kembali</a>
                                <hr>
                                <table class="table table-bordered table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Akun</th>
                                            <th>Nama</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrasi as $item)
                                            <tr
                                                @if ($item->validasi == 0) style="background-color:#efa2a2;""
                                                @else
                                                style="background-color:#7AE381;" @endif>
                                                <td class="fw-bold">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->akun }}
                                                </td>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                    @if ($item->validasi == 0 || $item->validasi == null)
                                                        <b>TL</b>
                                                    @else
                                                        <b>L</b>
                                                    @endif
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
                                    <h5>Pengumuman Akhir</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Akun</th>
                                            <th>Nama</th>
                                            <th>Nilai Akhir</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perhitungan as $item)
                                            <tr
                                                @if ($item->status == 'TL') style="background-color:#efa2a2;""
                                            @else
                                            style="background-color:#7AE381;" @endif>
                                                <td class="fw-bold">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $item->akun }}
                                                </td>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                    {{ $item->nilai_borda }}
                                                </td>
                                                <td>
                                                    @if ($item->status == 'TL')
                                                        Tidak Dipertimbangkan
                                                    @else
                                                        Dipertimbangkan
                                                    @endif
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
