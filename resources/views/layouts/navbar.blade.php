<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('/template') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
            height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-light shadow-sm">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="{{ asset('/template') }}/#" role="button"><i
                        class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fa-solid fa-gear"></i>
                </a>
            </li> --}}
            <li class="nav-item">
                @if (Auth::user())
                    <a class="nav-link" href="#" role="button" onclick="logout()">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                @else
                    <a class="nav-link" href="/" role="button">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                @endif
            </li>
        </ul>
    </nav>
