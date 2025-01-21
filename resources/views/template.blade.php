<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset ('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset ('assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{asset ('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                    
                        <!-- Menu Dashboard -->
                        <li class="sidebar-item {{ Request::routeIs('admin.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}" class="sidebar-link">
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    
                        <!-- Menu Data Master -->
                        <li class="sidebar-item has-sub {{ Request::is('admin/users', 'admin/jurusan', 'admin/ekstrakurikuler') ? 'active' : '' }}">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-collection "></i>
                                <span>Data master</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
                                    <a href="{{ route('admin.users') }}">Users</a>
                                </li>
                                <li class="submenu-item {{ Request::routeIs('admin.jurusan') ? 'active' : '' }}">
                                    <a href="{{ route('admin.jurusanIndex') }}">Jurusan</a>
                                </li>
                                <li class="submenu-item {{ Request::routeIs('admin/ekstrakurikuler') ? 'active' : '' }}">
                                    <a href="{{ route('admin.eskulIndex') }}">Ekstrakurikuler</a>
                                </li>
                            </ul>
                        </li>
                    
                        <!-- Menu Pendaftaran -->
                        <li class="sidebar-item {{ Request::is('admin/pendaftaran') ? 'active' : '' }}">
                            <a href="{{ url('admin/pendaftaran') }}" class="sidebar-link">
                                <i class="bi bi-file-earmark-text-fill "></i>
                                <span>Pendaftaran</span>
                            </a>
                        </li>
                    
                        <!-- Menu Nilai -->
                        <li class="sidebar-item {{ Request::is('admin/nilai') ? 'active' : '' }}">
                            <a href="{{ url('admin/nilai') }}" class="sidebar-link">
                                <i class="bi bi-award-fill"></i>
                                <span>Nilai</span>
                            </a>
                        </li>
                    </ul>
                    
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class="d-flex flex-column min-vh-100">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            <footer class="mt-auto">
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset ('assets/js/formValidate.js')}}"></script>
    <script src="{{asset ('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset ('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset ('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset ('assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset ('assets/js/main.js')}}"></script>
</body>

</html>
