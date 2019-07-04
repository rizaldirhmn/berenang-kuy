<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PCTA Indonesia</title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=0.6') }}">
    @yield('css')
</head>

<body>

    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{ route('index') }}" class="brand-logo"><img src="{{ asset('image/logo.png') }}" class="responsive-img il" alt="">
                        PCTA
                        <span class="hide-on-small-only">Indonesia Prov Banten</span></a>
                    <a href="{{ route('index') }}" data-target="mobile-demo" class="sidenav-trigger"><i
                            class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('index.about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('index.product') }}">Produk</a></li>
                        <li><a href="{{ route('index.liputan') }}">Liputan</a></li>
                        <li><a href="{{ route('index.artikel') }}">Artikel</a></li>
                        <li><a href="{{ route('index.department') }}">Department</a></li>
                        <li><a href="{{ route('index.kantor') }}">Kantor DPC</a></li>
                        <li><a href="{{ route('index.gallery') }}">Galeri</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="{{ route('index.about') }}">Tentang Kami</a></li>
        <li><a href="{{ route('index.product') }}">Produk</a></li>
        <li><a href="{{ route('index.liputan') }}">Liputan</a></li>
        <li><a href="{{ route('index.artikel') }}">Artikel</a></li>
        <li><a href="{{ route('index.department') }}">Department</a></li>
        <li><a href="{{ route('index.kantor') }}">Kantor DPC</a></li>
        <li><a href="{{ route('index.gallery') }}">Galeri</a></li>
    </ul>

			@yield('content')

    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col m4 l4 s6">
                    <h5>Jam Kerja</h5>
                    <p>Senin - Jumat : 09:00-17:00</p>
                    <p>Sabtu : 09:00 - 15:00</p>
                </div>
                <div class="col m4 l4 s6">
                    <h5>Follow US</h5>
                    <div class="fu">
                        <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-pinterest"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col m4 l4 s12">
                    <h5>Alamat</h5>
                    <p>GSD, GKI Ciledug Raya, Jalan HOS Cokroaminoto 3, Larangan Utara, Tangerang</p>
                    <p>Banten</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center">
                Copyright @2019. Designed by PCTA Banten
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/style.js?v=0.3') }}"></script>
    @yield('script')
</body>

</html>