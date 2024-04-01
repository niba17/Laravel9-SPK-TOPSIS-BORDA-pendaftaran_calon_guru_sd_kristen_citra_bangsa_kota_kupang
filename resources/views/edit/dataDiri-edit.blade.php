@extends('layouts.master')
@section('title', 'SPK | dataDiri-edit')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <div class="card shadow">
                        <form action="/dataDiri-update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body px-3 py-3">
                                <a class="btn btn-primary btn-sm" href="/dataDiri">Kembali</a>
                                <hr>
                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Akun</label>
                                            <input type="text" class="form-control" id="username"
                                                value="{{ $user->username }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama"
                                                value="{{ $user->biodata->nama ?? old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="mb-3">
                                            <label for="no_hp" class="form-label">No HP</label>
                                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                                id="no_hp" name="no_hp"
                                                value="{{ $user->biodata->no_hp ?? old('no_hp') }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_foto))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_foto) }}"
                                                    alt="{{ $user->biodata->scan_foto }}"
                                                    style="width:100px; height:110px;">
                                                <br>
                                            @endif
                                            <label for="scan_foto">Scan Foto @if (isset($user->biodata->scan_foto))
                                                    ({{ $user->biodata->scan_foto }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_foto') is-invalid @enderror" id="scan_foto"
                                                name="scan_foto" value="{{ $user->biodata->scan_foto ?? '' }}">
                                            @error('scan_foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_ktp))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_ktp) }}"
                                                    alt="{{ $user->biodata->scan_ktp }}"
                                                    style="width:100px; height:110px;">
                                                <br>
                                            @endif
                                            <label for="scan_ktp">Scan KTP @if (isset($user->biodata->scan_ktp))
                                                    ({{ $user->biodata->scan_ktp }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_ktp') is-invalid @enderror" id="scan_ktp"
                                                name="scan_ktp" value="{{ $user->biodata->scan_ktp ?? '' }}">
                                            @error('scan_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_ijazah))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_ijazah) }}"
                                                    alt="{{ $user->biodata->scan_ijazah }}"
                                                    style="width:100px; height:110px;" onclick="popUpFoto()">
                                                <br>
                                            @endif
                                            <label for="scan_ijazah">Scan Ijazah @if (isset($user->biodata->scan_ijazah))
                                                    ({{ $user->biodata->scan_ijazah }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_ijazah') is-invalid @enderror"
                                                id="scan_ijazah" name="scan_ijazah"
                                                value="{{ $user->biodata->scan_ijazah ?? '' }}">
                                            @error('scan_ijazah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_kk))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_kk) }}"
                                                    alt="{{ $user->biodata->scan_kk }}" style="width:100px; height:110px;">
                                                <br>
                                            @endif
                                            <label for="scan_kk">Scan Kartu Keluarga @if (isset($user->biodata->scan_kk))
                                                    ({{ $user->biodata->scan_kk }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_kk') is-invalid @enderror" id="scan_kk"
                                                name="scan_kk" value="{{ $user->biodata->scan_kk ?? '' }}">
                                            @error('scan_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_slk))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_slk) }}"
                                                    alt="{{ $user->biodata->scan_slk }}"
                                                    style="width:100px; height:110px;">
                                                <br>
                                            @endif
                                            <label for="scan_slk">Scan Surat Lamaran Kerja @if (isset($user->biodata->scan_slk))
                                                    ({{ $user->biodata->scan_slk }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_slk') is-invalid @enderror" id="scan_slk"
                                                name="scan_slk" value="{{ $user->biodata->scan_slk ?? '' }}">
                                            @error('scan_slk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_ak))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_ak) }}"
                                                    alt="{{ $user->biodata->scan_ak }}"
                                                    style="width:100px; height:110px;" onclick="popUpFoto()">
                                                <br>
                                            @endif
                                            <label for="scan_ak">Scan Akta Kelahiran @if (isset($user->biodata->scan_ak))
                                                    ({{ $user->biodata->scan_ak }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_ak') is-invalid @enderror" id="scan_ak"
                                                name="scan_ak" value="{{ $user->biodata->scan_ak ?? '' }}">
                                            @error('scan_ak')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            @if (isset($user->biodata->scan_cv))
                                                <img src="{{ asset('storage/images/' . $user->biodata->scan_cv) }}"
                                                    alt="{{ $user->biodata->scan_cv }}"
                                                    style="width:100px; height:110px;" onclick="popUpFoto()">
                                                <br>
                                            @endif
                                            <label for="scan_cv">Scan CV @if (isset($user->biodata->scan_cv))
                                                    ({{ $user->biodata->scan_cv }})
                                                @endif
                                            </label>
                                            <input type="file"
                                                class="form-control @error('scan_cv') is-invalid @enderror" id="scan_cv"
                                                name="scan_cv" value="{{ $user->biodata->scan_cv ?? '' }}">
                                            @error('scan_cv')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
                            </div>
                        </form>
                    </div>





                </div>

            </section>
        </div>
    @endsection
