@extends('layouts.master')
@section('title', 'SPK | Home')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    @if (Auth::user()->role == 0)
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="/perhitungan-validation" class="info-box shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-square-root-variable"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Perhitungan</span>
                                        <span class="info-box-number">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="/member" class="info-box shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Members</span>
                                        <span class="info-box-number">
                                            {{ count($user) - 1 }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="/alternatif" class="info-box mb-3 shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-people-group"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Alternatif</span>
                                        <span class="info-box-number">
                                            {{ $alternatif }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <a href="/kriteria" class="info-box mb-3 shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-gear"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Kriteria</span>
                                        <span class="info-box-number">
                                            {{ count($kriteria_sekolah) }} | {{ count($kriteria_yayasan) }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <a href="/dataDiri" class="info-box mb-3 shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-address-card"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Data Diri</span>
                                        <span class="info-box-number">

                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-12">
                                <a href="/pengumuman" class="info-box mb-3 shadow">
                                    <span class="info-box-icon bg-primary elevation-1">
                                        <i class="fa-solid fa-exclamation"></i>
                                    </span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text">Pengumuman</span>
                                        <span class="info-box-number">
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    @endsection
