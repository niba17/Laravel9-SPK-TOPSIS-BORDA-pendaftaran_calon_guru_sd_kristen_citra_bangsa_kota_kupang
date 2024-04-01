@extends('layouts.masterLanding')
@section('title', 'SPK | Data Kasus')
@section('content')

    <div class="container-fluid p-3">

        <a href="/" class="btn btn-warning btn-sm mb-2"><i class="fa-solid fa-backward"></i> Kembali</a>
        <div class="btn-group mb-2">
            <button type="button" class="btn btn-success     dropdown-toggle btn-sm" data-toggle="dropdown">Tahun
                {{ $tahun }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dataKasus/{{ 2021 }}">2021</a></li>
                <li><a class="dropdown-item" href="/dataKasus/{{ 2022 }}">2022</a></li>
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
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    No</th>
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    Lingkup Kelurahan
                                </th>
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    Lingkup Kecamatan
                                </th>
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    Puskesmas
                                </th>
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    Sasaran
                                </th>
                                <th class="align-middle" style="background:#78a0dd;" rowspan="2">
                                    Balita
                                    Diukur
                                </th>
                                <th class="text-center" style="background:#74d78a;" colspan="4">Status Gizi</th>
                                <th class="text-center" style="background:#db7a83;" colspan="3">Stunting</th>
                            </tr>
                            <tr>
                                <th class="align-middle" style="background:#ebe657;">Sangat Pendek
                                </th>
                                <th class="align-middle" style="background:#ebe657;">Pendek</th>
                                <th class="align-middle" style="background:#ebe657;">Normal</th>
                                <th class="align-middle" style="background:#ebe657;">Tinggi</th>
                                <th class="align-middle" style="background:#ebe657;">Total</th>
                                <th class="align-middle" style="background:#ebe657;">Presentase</th>
                                <th class="align-middle" style="background:#ebe657;">Tahun</th>
                                {{-- <th class="align-middle" style="background:#ebe657;">geoJSON</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKasus as $item)
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
                                    {{-- <td class="align-middle">{{ $item->geojson ?? 'NULL' }}</td> --}}
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
@endsection
