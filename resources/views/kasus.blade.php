@extends('layouts.master')
@section('title', 'SIG | Kasus')
@section('content')
    {{-- {{ dd($tahun) }} --}}

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-4">
                <div class="container-fluid">

                    <a href="/kasus-add" class="btn btn-success btn-sm mb-2">Tambah Data
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <div class="btn-group mb-2">
                        <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">Tahun
                            {{ $tahun }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/kasus/{{ 2021 }}">2021</a></li>
                            <li><a class="dropdown-item" href="/kasus/{{ 2022 }}">2022</a></li>
                        </ul>
                    </div>
                    <div class="card shadow card-primary">
                        <div class="card-header border-transparent">
                            <h3 class="text-center">Data Kasus Stunting Tahun {{ $tahun }}</h3>
                        </div>

                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <table class="table table-bordered text-xs" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                No</th>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                Lingkup Kelurahan
                                            </th>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                Lingkup Kecamatan
                                            </th>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                Puskesmas
                                            </th>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                Sasaran
                                            </th>
                                            <th class="align-middle" style="background:#78a0dd; color:#343a40;"
                                                rowspan="2">
                                                Balita
                                                Diukur
                                            </th>
                                            <th class="text-center" style="background:#74d78a; color:#343a40;"
                                                colspan="4">Status Gizi
                                            </th>
                                            <th class="text-center" style="background:#db7a83; color:#343a40;"
                                                colspan="5">Stunting</th>
                                        </tr>
                                        <tr>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Sangat
                                                Pendek
                                            </th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Pendek</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Normal</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Tinggi</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Total</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Presentase
                                            </th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Tahun</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">GeoJSON</th>
                                            <th class="align-middle" style="background:#ebe657; color:#343a40;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kasus as $item)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">
                                                    {{ $item->kelurahan->nama ?? 'NULL' }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->kelurahan->puskesmas->kecamatan->nama ?? 'NULL' }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $item->kelurahan->puskesmas->nama ?? 'NULL' }}
                                                </td>
                                                <td class="align-middle">{{ $item->sasaran }}</td>
                                                <td class="align-middle">{{ $item->j_b_diukur }}</td>
                                                <td class="align-middle">{{ $item->s_pendek }}</td>
                                                <td class="align-middle">{{ $item->pendek }}</td>
                                                <td class="align-middle">{{ $item->normal }}</td>
                                                <td class="align-middle">{{ $item->tinggi }}</td>
                                                <td class="align-middle">{{ $item->total }}</td>
                                                <td class="align-middle">{{ $item->presentase }}</td>
                                                <td class="align-middle">{{ $item->tahun }}</td>
                                                <td class="align-middle">{{ $item->geojson ?? 'NULL' }}</td>
                                                <td class="align-middle">
                                                    <a href="/kasus-edit/{{ $item->id }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm"
                                                        onclick="hapus('{{ $item->id }}','kasus')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
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
