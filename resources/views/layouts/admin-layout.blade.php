<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ant Media | @yield('title')</title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">

<link rel="stylesheet" href="{{ asset('admin/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="{{ asset('common/toastify.css') }}">

<link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
<link rel="shortcut icon" href="{{ asset('admin/images/favicon.svg') }}" type="image/x-icon">
@yield('css')
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item {{ Request::segment(3) == '' ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Streams</span>
                        </a>
                    </li>

                    <!-- <li class="sidebar-item {{ Request::segment(3) == 'service' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Serwisler</span>
                        </a>
                    </li> -->

                    <!-- <li class="sidebar-item {{ Request::segment(3) == 'attribute' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Attributes</span>
                        </a>
                    </li> -->


                    <!-- <li class="sidebar-item has-sub {{ Request::segment(3) == 'category' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Kategoriýalar</span>
                        </a>
                        <ul class="submenu " style="display: {{ last(request()->segments()) == 'category' ? 'block' : 'none' }}">
                            <li class="submenu-item">
                                <a href="#">Esasy kategoriýalar</a>
                            </li>
                            <li class="submenu-item">
                                <a href="#">Sub kategoriýalar</a>
                            </li>
                        </ul>
                    </li> -->


                    <!-- <li class="sidebar-item {{ Request::segment(3) == 'location' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Ýurtlar</span>
                        </a>
                    </li> -->

                    <!-- <li class="sidebar-title">User management</li>
                    <li class="sidebar-item {{ Request::segment(3) == 'admin-user' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Admin ulanyjylar</span>
                        </a>
                    </li> -->

                    <!-- <li class="sidebar-item {{ Request::segment(3) == 'role' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-bezier"></i>
                            <span>Roles</span>
                        </a>
                    </li> -->

                    <!-- <li class="sidebar-title">Ulanyjylardan gelenler</li>
                    <li class="sidebar-item {{ Request::segment(3) == 'offer' ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Zakazlar</span>
                        </a>
                    </li> -->

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <nav class="navbar navbar-expand navbar-light ">
                <div class="container-fluid">
                    <a href="#" class="burger-btn d-block">
                        <i class="bi bi-justify fs-3"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-1">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Mail</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">No new mail</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown me-3">
                                <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Notifications</h6>
                                    </li>
                                    <li><a class="dropdown-item">No notification available</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600">
                                            {{ Auth::guard('admin')->user()->username }}</h6>
                                        <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Hello, {{ Auth::guard('admin')->user()->username }}
                                </li>
                                <!-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                        Settings</a></li>
                                <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                        Wallet</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                
                                <li><a class="dropdown-item" href="{{ route('admin.changePasswordForm') }}">
                                    <i class="icon-mid bi bi-shield-lock  me-2"></i>
                                        Change password</a></li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>


@yield('content')


        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Ant Media</p>
                </div>
                <div class="float-end">
                    <p>by <a href="https://sanlygalam.com" target="_blank">Ant Media</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('admin/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('common/toastify.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>

<script type="text/javascript">
    @if(session('success'))
        Toastify({
            text: '{{ session("success") }}',
            duration: 3000,
            backgroundColor: "linear-gradient(to right, rgb(0, 176, 155), rgb(150, 201, 61))"
        }).showToast();
    @endif

    @if($errors->any())
      @foreach ($errors->all() as $error)
          Toastify({
                text: '{{$error}}',
                duration: 3000,
                backgroundColor: "linear-gradient(90deg, rgba(161,18,25,1) 0%, rgba(235,15,49,1) 35%, rgba(153,8,8,1) 100%)",
          }).showToast();

      @endforeach
    @endif
</script>

@yield('js')
</body>
</html>