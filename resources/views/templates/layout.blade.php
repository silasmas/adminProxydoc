<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | {{ isset($titre) ? $titre : '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('logo/logo.png') }}" type="image/rdp-icon">

    <!-- Styles -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/summernote/summernote.css') }}" rel="stylesheet">

    @yield('autres_style')
</head>

<body class="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="{{ asset('assets/img/default.png') }}"
                                    width="100" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{ Auth::user()->name }}</strong>
                                    </span> <span class="block text-xs text-muted">{{ Auth::user()->fonction }} <b
                                            class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="">Profile</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            G.Synapse
                        </div>
                    </li>
                    <li class="{{ strpos($titre, 'Gestion') === 0 ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Pages </span>
                            <span class="pull-right label label-primary">Gestion</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ $titre == 'Gestion Banche' || $titre == 'Gestion Service' ? 'active' : '' }}">
                                <a href="">
                                    <span class="nav-label">Branches & Services</span></a>
                            </li>
                            <li class="{{ $titre == 'Gestion Temoignage' ? 'active' : '' }}">
                                <a href="">
                                    <span class="nav-label">Témoignages</span></a>
                            </li>
                            <li class="{{ $titre == 'Gestion Partenaire' ? 'active' : '' }}">
                                <a href="">Partenaire</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ strpos($titre, 'Ajout') === 0 ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Pages </span>
                            <span class="pull-right label label-warning">Insertion</span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ $titre == 'Ajout branche' ? 'active' : '' }}">
                                <a href="">
                                    <span class="nav-label">Branche & Service</span></a>
                            </li>
                            <li class="{{ $titre == 'Ajout partenaire' ? 'active' : '' }}"><a
                                    href="">Partenaire</a></li>
                            <li class="{{ $titre == 'Ajout temoignage' ? 'active' : '' }}"><a
                                    href="">Témoignage</a></li>
                        </ul>
                    </li>

                    <li class="{{ $titre == 'Messages' ? 'active' : '' }}"> 
                        <a href=""><i
                                class="fa fa-envelope-open"></i>
                            <span class="nav-label">Messages{{ Auth::user()->id }}</span>
                            <span class="pull-right label label-danger">0</span></a>
                    </li>
                    <li class="{{ $titre == 'news letter' ? 'active' : '' }}"> 
                        <a href=""><i
                                class="fa fa-envelope-open"></i>
                            <span class="nav-label">News letter</span>
                            <span class="pull-right label label-danger">0</span></a>
                    </li>
                    <li class="{{ $titre == 'Utilisateurs' ? 'active' : '' }}"> 
                        <a href="">
                            <i class="fa fa-user"></i>
                            <span class="nav-label">Utilisateurs</span>
                            <span class="pull-right label label-danger">0</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            {{-- <div class="form-group">
                                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                                    </div> --}}
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenue dans l'espace Admin de {{ config('app.name') }}.</span>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Déconnexion
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{ $titre }}</h2>
                </div>
            </div>

            @yield('content')

            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <a href='silasdev.com'> <strong>Copyright</strong> SDev &copy; 2022 </a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/js/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>

    <script src="{{ asset('assets/js/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote/summernote.min.js') }}"></script>

    @yield('autres-script')

    <script>
        function load(id) {
	$(id).children('.ibox-content').toggleClass('sk-loading');
}
        function supprimer(url, id) {
            // alert(url)
            swal({
                title: "Attention suppression",
                text: "Etes-vous sûre de supprimer cet élement ?",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'Non',
                    delete: 'OUI'
                }
            }).then(function(willDelete) {
                if (willDelete) {
                    load("#tab-user");
                    $.ajax({
                        url: url + "/" + id,
                        method: "GET",
                        data: "",
                        success: function(data) {
                            load("#tab-user");
                            if (!data.reponse) {
                                swal({
                                    title: data.msg,
                                    icon: 'error'
                                })

                            } else {
                                swal({
                                    title: data.msg,
                                    icon: 'success'
                                })
                                actualiser();
                            }
                        },
                    });
                } else {
                    swal({
                        title: "Suppression annuler",
                        icon: 'error'
                    })
                }
            });
        }

        function actualiser() {
            location.reload();
        }
    </script>
</body>

</html>
