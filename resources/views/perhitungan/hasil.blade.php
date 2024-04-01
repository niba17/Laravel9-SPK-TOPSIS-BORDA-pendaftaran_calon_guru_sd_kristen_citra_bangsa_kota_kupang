@extends('layouts.master')
@section('title', 'SPK | Hasil')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Hasil Perhitungan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <a class="btn btn-primary btn-sm mb-3" href="/home">Kembali</a>
                            <br>
                            <label for="kuota">Kuota Penerimaan</label>
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <form action="/perhitungan-broadcast" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="number" class="form-control @error('kuota') is-invalid @enderror"
                                                id="kuota" name="kuota" value="{{ $kuota[0]->kuota ?? '0' }}"
                                                placeholder="Kuota Penerimaan">
                                            @error('kuota')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3" style="height:37px;">Posting
                                        Hasil
                                        Perhitungan
                                    </button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="myTable2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Akun</th>
                                            <th>Nama</th>
                                            <th>Topsis Yayasan</th>
                                            <th>Topsis Sekolah</th>
                                            <th>Nilai Akhir</th>
                                            <th>Ranking</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perhitungan as $item)
                                            <tr
                                                @if ($item['status'] == 'TL') style="background-color:#efa2a2;" @else style="background-color:#7AE381;" @endif>
                                                <td class="fw-bold">{{ $loop->iteration }}</td>
                                                <td>{{ $item['username'] }}</td>
                                                <td>
                                                    @if ($item['nama'])
                                                        {{ $item['nama'] }}
                                                    @else
                                                        <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>{{ $item['topsis']['yayasan']['nilai_preferensi']['nilai_preferensi'] }}
                                                </td>
                                                <td>{{ $item['topsis']['sekolah']['nilai_preferensi']['nilai_preferensi'] }}
                                                </td>
                                                <td>{{ $item['borda']['nilai_borda'] }}</td>
                                                <td>{{ $item['ranking'] }}</td>
                                                <td>
                                                    @if ($item['status'] == 'TL')
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
            </section>
        </div>
    @endsection
