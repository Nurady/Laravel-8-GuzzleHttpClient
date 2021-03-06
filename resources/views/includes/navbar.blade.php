<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('all.complaint') }}">FrontEndKelurahan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::segment(1) === 'all-complaint' ? 'active' : null }}">
                    <a class="nav-link" href="{{ route('all.complaint') }}">Semua Pengaduan</a>
                </li>
                @if(session('token'))
                    <li class="nav-item {{ Request::segment(1) === 'create' ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('create.complaint') }}">Kirim Aduan</a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'dashboard-user' ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('dashboard.user') }}">Dashboard</a>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav ml-auto">
                @if(!session('token'))
                    <li class="nav-item {{ Request::segment(1) === 'login' ? 'active' : null }}">
                        <a class="nav-link" href="{{ url('login') }}">login</a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'register' ? 'active' : null }}">
                        <a class="nav-link" href="{{ url('register') }}">Register</a>
                    </li>
                @endif
                @if(session('token'))
                    <li class="nav-item {{ Request::segment(1) === 'akun-user' ? 'active' : null }}">
                        <a class="nav-link" href="{{ route('akun.user') }}">Akun</a>
                    </li>
                    <li class="nav-item {{ Request::segment(1) === 'logout-user' ? 'active' : null }}">
                        <a class="nav-link" href="{{ url('logout-user') }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>