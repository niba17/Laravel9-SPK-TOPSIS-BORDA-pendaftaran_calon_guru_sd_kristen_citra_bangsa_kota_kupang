@extends('layouts.master')
@section('title', 'SPK | Alternatif')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Alternatif Sekolah</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <a class="btn btn-primary btn-sm mb-3" href="/home">Kembali</a>
                                <table class="table table-bordered table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Akun</th>
                                            <th>Nama</th>
                                            @foreach ($kriteriaSekolah as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($alternatif as $item)
                                            @if ($item->role != 0 && $item->validasi == 1)
                                                <tr>
                                                    <td class="fw-bold">{{ $i + 1 }}</td>
                                                    <td>
                                                        @if ($item->username)
                                                            {{ $item->username }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->biodata->nama) && $item->biodata->nama != null)
                                                            {{ $item->biodata->nama }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    @if (isset($item->biodata->kriteria_sekolah))
                                                        @if (count($item->biodata->kriteria_sekolah) > 0)
                                                            @foreach ($kriteriaSekolah as $value)
                                                                <td>
                                                                    @if (isset($item->biodata->kriteria_sekolah[$loop->iteration - 1]->kriteria_id) &&
                                                                        $item->biodata->kriteria_sekolah[$loop->iteration - 1]->kriteria_id == $value->id)
                                                                        {{ $item->biodata->kriteria_sekolah[$loop->iteration - 1]->bobot }}
                                                                    @else
                                                                        <i
                                                                            class="fa-solid fa-file-circle-question text-danger"></i>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                        @else
                                                            @foreach ($kriteriaSekolah as $item1)
                                                                <td> <i
                                                                        class="fa-solid fa-file-circle-question text-danger"></i>
                                                                </td>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        @foreach ($kriteriaSekolah as $item2)
                                                            <td>
                                                                <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                            </td>
                                                        @endforeach
                                                    @endif
                                                    <td>
                                                        <a href="/alternatif-edit/{{ $item->biodata->id }}/alternatif_kriteria_sekolah"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                </tr>

                                                @php
                                                    $i++;
                                                @endphp
                                            @endif

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
                                    <h5>Alternatif Yayasan</h5>
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
                                            @foreach ($kriteriaYayasan as $item)
                                                <th>{{ $item->nama }}</th>
                                            @endforeach
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($alternatif as $item)
                                            @if ($item->role != 0 && $item->validasi == 1)
                                                <tr>
                                                    <td class="fw-bold">{{ $i + 1 }}</td>
                                                    <td>
                                                        @if ($item->username)
                                                            {{ $item->username }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->biodata->nama) && $item->biodata->nama != null)
                                                            {{ $item->biodata->nama }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    @if (isset($item->biodata->kriteria_yayasan))
                                                        @if (count($item->biodata->kriteria_yayasan) > 0)
                                                            @foreach ($kriteriaYayasan as $value)
                                                                <td>
                                                                    @if (isset($item->biodata->kriteria_yayasan[$loop->iteration - 1]->kriteria_id) &&
                                                                        $item->biodata->kriteria_yayasan[$loop->iteration - 1]->kriteria_id == $value->id)
                                                                        {{ $item->biodata->kriteria_yayasan[$loop->iteration - 1]->bobot }}
                                                                    @else
                                                                        <i
                                                                            class="fa-solid fa-file-circle-question text-danger"></i>
                                                                    @endif
                                                                </td>
                                                            @endforeach
                                                        @else
                                                            @foreach ($kriteriaYayasan as $item1)
                                                                <td>
                                                                    <i
                                                                        class="fa-solid fa-file-circle-question text-danger"></i>
                                                                </td>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        @foreach ($kriteriaYayasan as $item2)
                                                            <td>
                                                                <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                            </td>
                                                        @endforeach
                                                    @endif
                                                    <td>
                                                        <a href="/alternatif-edit/{{ $item->biodata->id }}/alternatif_kriteria_yayasan"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endif

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
