<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#home" class="font-bold text-lg text-hijau block py-6">ToFo PUBG</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transiton duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transiton duration-300 ease-in-out"></span>
                    <span class="hamburger-line transiton duration-300 ease-in-out origin-bottom-left"></span>
                </button>

            <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full  lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                <ul class="block lg:flex">
                    <li class="group">
                    <a href="/" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Beranda</a>
                    </li>
                    <li class="group">
                    <a href="/tournaments" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Tournaments</a>
                    </li>
                @auth
                    <li class="group">
                        <a href="/dashboard" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">My Dashboard</a>
                    </li>
                    <li class="group">
                        <a href="/profile" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">My Profile</a>
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                                <button type="submit" class="">Logout</button>
                        </form>
                    </li>

                    <li>
                        <a class="" href="#">Wellcome back, {{ auth()->user()->name }}</a>
                    </li>
                @else
                    <li class="nav-item ">
                        <a href="/login" class="nav-link "><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
                </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
{{-- <header class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow font-mono text-xl">

    <a class="ml-2" href="/"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <a class="text-white col-md-3 col-lg-2 me-0 px-3" href="/">TuruDeck</a>
        <ul class="navbar-nav pl-8">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tournaments">Tournament</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Wellcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> My Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item ">
                    <a href="/login" class="nav-link "><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
    </div>
</header> --}}