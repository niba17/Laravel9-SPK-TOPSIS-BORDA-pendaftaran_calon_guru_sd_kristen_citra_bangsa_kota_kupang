@extends('layouts.master')
@section('title', 'SPK | Members')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="content-wrapper">

            <section class="content p-3">
                <div class="container-fluid">
                    <div class="card shadow card-primary">
                        <div class="card-header text-center bg-dark">
                            <div class="row align-items-center">
                                <div>
                                    <h5>Members</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-3 py-3">
                            <div class="table-responsive">
                                <a class="btn btn-primary btn-sm" href="/home">Kembali</a>
                                <a href="/member-broadcast" class="btn btn-primary btn-sm">Posting
                                    Hasil Administrasi</a>
                                <hr>
                                <table class="table table-bordered table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Akun</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Scan Foto</th>
                                            <th>Scan KTP</th>
                                            <th>Scan Ijazah</th>
                                            <th>Scan KK</th>
                                            <th>Scan SLK</th>
                                            <th>Scan AK</th>
                                            <th>Scan CV</th>
                                            <th>Pendaftaran</th>
                                            <th>Validasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $item)
                                            @if ($item->role == 1)
                                                <tr>
                                                    <td class="fw-bold">{{ $loop->iteration - 1 }}
                                                    </td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>
                                                        @if (isset($item->biodata->nama) && $item->biodata->nama != null)
                                                            {{ $item->biodata->nama }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->biodata->no_hp) && $item->biodata->no_hp != null)
                                                            {{ $item->biodata->no_hp }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_foto) && $item->biodata->scan_foto != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_foto) && $item->biodata->scan_foto != null) onclick="popUpFoto('{{ $item->biodata->scan_foto }}')" @endif>
                                                        @if (isset($item->biodata->scan_foto) && $item->biodata->scan_foto != null)
                                                            {{ $item->biodata->scan_foto }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_ktp) && $item->biodata->scan_ktp != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_ktp) && $item->biodata->scan_ktp != null) onclick="popUpFoto('{{ $item->biodata->scan_ktp }}')" @endif>
                                                        @if (isset($item->biodata->scan_ktp) && $item->biodata->scan_ktp != null)
                                                            {{ $item->biodata->scan_ktp }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_ijazah) && $item->biodata->scan_ijazah != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_ijazah) && $item->biodata->scan_ijazah != null) onclick="popUpFoto('{{ $item->biodata->scan_ijazah }}')" @endif>
                                                        @if (isset($item->biodata->scan_ijazah) && $item->biodata->scan_ijazah != null)
                                                            {{ $item->biodata->scan_ijazah }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_kk) && $item->biodata->scan_kk != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_kk) && $item->biodata->scan_kk != null) onclick="popUpFoto('{{ $item->biodata->scan_kk }}')" @endif>
                                                        @if (isset($item->biodata->scan_kk) && $item->biodata->scan_kk != null)
                                                            {{ $item->biodata->scan_kk }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_slk) && $item->biodata->scan_slk != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_slk) && $item->biodata->scan_slk != null) onclick="popUpFoto('{{ $item->biodata->scan_slk }}')" @endif>
                                                        @if (isset($item->biodata->scan_slk) && $item->biodata->scan_slk != null)
                                                            {{ $item->biodata->scan_slk }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_ak) && $item->biodata->scan_ak != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_ak) && $item->biodata->scan_ak != null) onclick="popUpFoto('{{ $item->biodata->scan_ak }}')" @endif>
                                                        @if (isset($item->biodata->scan_ak) && $item->biodata->scan_ak != null)
                                                            {{ $item->biodata->scan_ak }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="{{ isset($item->biodata->scan_cv) && $item->biodata->scan_cv != null ? 'trigger' : '' }}"
                                                        @if (isset($item->biodata->scan_cv) && $item->biodata->scan_cv != null) onclick="popUpFoto('{{ $item->biodata->scan_cv }}')" @endif>
                                                        @if (isset($item->biodata->scan_cv) && $item->biodata->scan_cv != null)
                                                            {{ $item->biodata->scan_cv }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($item->created_at) && $item->created_at != null)
                                                            {{ $item->created_at }}
                                                        @else
                                                            <i class="fa-solid fa-file-circle-question text-danger"></i>
                                                        @endif
                                                    </td>
                                                    <td class="text-start" id="{{ $item->id }}">


                                                        <div class="form-check" id="1">
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios{{ $item->id }}"
                                                                id="exampleRadios{{ $item->id }}" value="1"
                                                                id-user="{{ $item->id }}"
                                                                @if (!isset($item->biodata->id)) disabled @endif
                                                                @if ($item->validasi !== null || $item->validasi !== 0) checked @endif>
                                                            <label class="form-check-label"
                                                                for="exampleRadios{{ $item->id }}">
                                                                <span class="text-success fw-bold">Valid</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check" id="2">
                                                            <input class="form-check-input" type="radio"
                                                                name="exampleRadios{{ $item->id }}"
                                                                id="exampleRadios{{ $item->id }}" value="0"
                                                                id-user="{{ $item->id }}"
                                                                @if (!isset($item->biodata->id)) checked @endif
                                                                @if ($item->validasi == null || $item->validasi == 0) checked @endif>
                                                            <label class="form-check-label"
                                                                for="exampleRadios{{ $item->id }}">
                                                                <span class="text-danger fw-bold">Invalid</span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm align-items-center"
                                                            onclick="hapus('{{ $item->id }}','{{ $controller = 'member' }}')"><i
                                                                class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
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

        <script>
            $('.form-check-input').on('change', function() {
                $.ajax({
                    url: "member-update/{id}",
                    type: 'GET',
                    data: {
                        id: $(this).attr('id-user'),
                        validasi: $(this).val()
                    },
                    success: function(response) {}
                });
            })

            $.ajax({
                url: "{{ route('member-request') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(element => {
                        if (element.validasi == null || element.validasi == 0) {
                            $('#' + element.id).children('#1').children('input').removeAttr('checked')
                            $('#' + element.id).children('#2').children('input').attr('checked', 'true')
                        } else {
                            $('#' + element.id).children('#2').children('input').removeAttr('checked')
                            $('#' + element.id).children('#1').children('input').attr('checked', 'true')
                        }
                    });
                }
            })
        </script>
    @endsection
