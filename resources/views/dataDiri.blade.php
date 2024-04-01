@extends('layouts.master')
@section('title', 'SPK | Data Diri')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-8">

                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    @if (isset($user->biodata->scan_foto)) src="{{ asset('storage/images') . '/' . $user->biodata->scan_foto }}"
                                                @else
                                                src="{{ asset('storage/images') . '/user-default.png' }}" @endif>
                                            </div>
                                            <h3 class="profile-username text-center mt-2 mb-1">{{ $user->username }}</h3>
                                            <p class="text-muted text-center mb-1">Member</p>
                                            <a href="/home" class="btn btn-primary btn-sm mb-3">Kembali</a>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Nama</b>
                                                            <div class="float-right text-dark">
                                                                @if (isset($user->biodata->nama))
                                                                    {{ $user->biodata->nama }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>No HP</b>
                                                            <div class="float-right text-dark">
                                                                @if (isset($user->biodata->no_hp))
                                                                    {{ $user->biodata->no_hp }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan Foto</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_foto)) onclick="popUpFoto('{{ $user->biodata->scan_foto }}')" @endif>
                                                                @if (isset($user->biodata->scan_foto))
                                                                    {{ $user->biodata->scan_foto }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan KTP</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_ktp)) onclick="popUpFoto('{{ $user->biodata->scan_ktp }}')" @endif>
                                                                @if (isset($user->biodata->scan_ktp))
                                                                    {{ $user->biodata->scan_ktp }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan Ijazah</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_ijazah)) onclick="popUpFoto('{{ $user->biodata->scan_ijazah }}')" @endif>
                                                                @if (isset($user->biodata->scan_ijazah))
                                                                    {{ $user->biodata->scan_ijazah }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan Kartu Keluraga</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_kk)) onclick="popUpFoto('{{ $user->biodata->scan_kk }}')" @endif>
                                                                @if (isset($user->biodata->scan_kk))
                                                                    {{ $user->biodata->scan_kk }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan Surat Lamaran Kerja</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_slk)) onclick="popUpFoto('{{ $user->biodata->scan_slk }}')" @endif>
                                                                @if (isset($user->biodata->scan_slk))
                                                                    {{ $user->biodata->scan_slk }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan Akta Kelahiran</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_ak)) onclick="popUpFoto('{{ $user->biodata->scan_ak }}')" @endif>
                                                                @if (isset($user->biodata->scan_ak))
                                                                    {{ $user->biodata->scan_ak }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="row justify-content-center">
                                                        <div class="col-8">
                                                            <b>Scan CV</b>
                                                            <div class="float-right text-primary" id="trigger"
                                                                @if (isset($user->biodata->scan_cv)) onclick="popUpFoto('{{ $user->biodata->scan_cv }}')" @endif>
                                                                @if (isset($user->biodata->scan_cv))
                                                                    {{ $user->biodata->scan_cv }}
                                                                @else
                                                                    <i
                                                                        class="fa-solid fa-clipboard-question text-warning fa-2x"></i>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="dataDiri-edit/{{ $user->id }}"
                                                class="btn btn-primary btn-block"><b>Edit</b></a>
                                        </div>

                                    </div>




                                </div>



                            </div>

                        </div>
                    </section>
                </div>
            </section>
        </div>
    @endsection
