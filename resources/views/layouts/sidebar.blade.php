<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/home" class="brand-link">
        {{-- <img src="{{ asset('/template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        @if (Auth::user()->role == 0)
            <i class="fa-solid fa-user-shield brand-image img-circle elevation-3 py-1" style="font-size: 30px"></i>
            <span class="brand-text font-weight-light ml-4"><b>
                    Admin
                @else
                    <i class="fa-solid fa-user brand-image img-circle elevation-3 py-1" style="font-size: 30px"></i>
                    <span class="brand-text font-weight-light ml-4"><b>
                            Member
        @endif
        </b></span>
    </a>

    <div class="sidebar">

        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ asset('/template') }}/#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        {{-- {{ Route::currentRouteNamed('route_name') ? 'active' : '' }} --}}

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ 'home' == request()->path() ? 'active' : '' }}">
                        <i class="fa-solid fa-house-user"
                            style="font-size: 20px; margin-left:2px; margin-right:10px;"></i>
                        <p class="text-white">
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-item @if (request()->path() == 'dataDiri' ||
                    Request::route()->getName() == 'dataDiri-edit' ||
                    request()->path() == 'member' ||
                    request()->path() == 'alternatif' ||
                    Request::route()->getName() == 'alternatif-edit' ||
                    request()->path() == 'pengumuman' ||
                    request()->path() == 'kriteria' ||
                    Request::route()->getName() == 'kriteria-edit' ||
                    request()->path() == 'kriteria-add') {{ 'menu-is-opening menu-open' }} @endif">
                    <a href="{{ asset('/template') }}/#"
                        class="nav-link @if (request()->path() == 'dataDiri' ||
                            Request::route()->getName() == 'dataDiri-edit' ||
                            request()->path() == 'member' ||
                            request()->path() == 'alternatif' ||
                            request()->path() == 'pengumuman' ||
                            request()->path() == 'kriteria' ||
                            request()->path() == 'kriteria-add') {{ 'active' }} @endif">
                        <i class="fa-solid fa-database"
                            style="font-size: 22px; margin-left:3px; margin-right:12px;"></i>
                        <p class="text-white">
                            Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->role == 1)
                            <li class="nav-item">
                                <a href="/dataDiri"
                                    class="nav-link {{ 'dataDiri' == request()->path() || Request::route()->getName() == 'dataDiri-edit' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p
                                        style="{{ 'dataDiri' == request()->path() || Request::route()->getName() == 'dataDiri-edit' ? 'color:black;' : 'color:white;' }}">
                                        Data Diri
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pengumuman"
                                    class="nav-link {{ 'pengumuman' == request()->path() ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p
                                        style="{{ 'pengumuman' == request()->path() ? 'color:black;' : 'color:white;' }}">
                                        Pengumuman
                                    </p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/member" class="nav-link {{ 'member' == request()->path() ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p style="{{ 'member' == request()->path() ? 'color:black;' : 'color:white;' }}">
                                        Members
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/alternatif"
                                    class="nav-link {{ 'alternatif' == request()->path() || Request::route()->getName() == 'alternatif-edit' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p
                                        style="{{ 'alternatif' == request()->path() || Request::route()->getName() == 'alternatif-edit' ? 'color:black;' : 'color:white;' }}">
                                        Alternatif
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/kriteria"
                                    class="nav-link {{ 'kriteria' == request()->path() || Request::route()->getName() == 'kriteria-edit' ? 'active' : '' }}  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p
                                        style="{{ 'kriteria' == request()->path() || Request::route()->getName() == 'kriteria-edit' ? 'color:black;' : 'color:white;' }}">
                                        Kriteria
                                    </p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</aside>
