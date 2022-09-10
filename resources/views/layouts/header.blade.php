<header class="bg-slate-800  top-0 left-0 w-full flex items-center z-10 h-11">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#home" class="font-bold text-lg text-white block py-6">ToFo PUBG</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="bg-white block absolute right-4 lg:hidden rounded">
                    <span class="hamburger-line transiton duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transiton duration-300 ease-in-out"></span>
                    <span class="hamburger-line transiton duration-300 ease-in-out origin-bottom-left"></span>
                </button>

            <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full  lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                <ul class="block lg:flex">
                    <li class="group">
                    <a href="/tournaments" class="text-lg lg:text-white text-hijau py-2 mx-8 flex group-hover:text-hijau">Tournaments</a>
                    </li>
                @auth
                    <li class="group">
                        <a href="/dashboard" class="text-lg lg:text-white text-hijau py-2 mx-8 flex group-hover:text-hijau">My Dashboard</a>
                    </li>
                    <li class="group">
                        <a href="/profile" class="text-lg lg:text-white text-hijau py-2 mx-8 flex group-hover:text-hijau">My Profile</a>
                    </li>
                    <li class="group mt-2">
                        <a class="ml-7 text-lg lg:text-white text-black" href="#">Wellcome back, {{ auth()->user()->name }}</a>
                    </li>
                    <li class="group ml-7 mt-2">
                        <form action="/logout" method="post">
                            @csrf
                                <button type="submit" class="lg:text-white text-hijau text-lg">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="group lg:mt-2 lg:ml-auto ml-8">
                        <a href="/login" class="nav-link text-lg lg:text-white text-hijau"><i class="bi bi-box-arrow-in-right text-lg lg:text-white text-hijau"></i> Login</a>
                    </li>
                @endauth
                </ul>
                </nav>
            </div>
        </div>
    </div>
</header>