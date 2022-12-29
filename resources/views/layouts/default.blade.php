<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DurDur PoS</title>
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body class="sb-nav-fixed" onload="realtimeClock()">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-warning bg-gradient">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-dark" href="/home">DurDur PoS</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-dark" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark bg-warning bg-gradient" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-nav-link-icon inline-block">
                            @if (old('foto_profile', Auth::user()->foto_profile))
                            <img src="{{ asset('storage/'. old('foto_profile', Auth::user()->foto_profile)) }}"
                                width="50px" class="rounded-circle m-3">
                            @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                width="50px" class="rounded-circle m-3">
                            @endif
                            <text class="text-dark">{{ auth()->user()->name }} - <em>{{ auth()->user()->level }}</em></text>
                        </div>

                        <div class="sb-sidenav-menu-heading text-dark">MAIN MENU</div>
                        <a class="nav-link text-dark" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-home text-dark"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link text-dark" href="/produk">
                            <div class="sb-nav-link-icon"><i class="fa fa-sticky-note text-dark"></i></div>
                            Produk
                        </a>
                        <a class="nav-link text-dark" href="/pemasukan">
                            <div class="sb-nav-link-icon"><i class="fa fa-refresh text-dark"></i></div>
                            Pemasukan
                        </a>
                        <a class="nav-link text-dark" href="/pengeluaran">
                            <div class="sb-nav-link-icon"><i class="fa fa-cart-arrow-down text-dark"></i></div>
                            Pengeluaran
                        </a>
                        <div class="sb-sidenav-menu-heading text-dark">Personal</div>
                        <a class="nav-link text-dark" href="/profile">
                            <div class="sb-nav-link-icon"><i class="fas fa-user text-dark"></i></div>
                            Profile
                        </a>
                        <a class="nav-link text-dark" href="/settings">
                            <div class="sb-nav-link-icon"><i class="fas fa-gear text-dark"></i></div>
                            Settings
                        </a>
                        <a class="nav-link text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out text-dark"></i></div>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @stack('before-content')
                @yield('content')
                @stack('after-content')

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; DurDur 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')

    @include('sweetalert::alert')
</body>

</html>
