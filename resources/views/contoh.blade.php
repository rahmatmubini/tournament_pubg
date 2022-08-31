<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rahmatpedia</title>

    {{-- <link href="css/l.css" rel="stylesheet"> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <style type="">
      *{
        border: 1px solid red;
      }
    </style> --}}
  </head>

<body class="bg-white">
  {{-- Header Start --}}
  <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
      <div class="flex items-center justify-between relative">
        <div class="px-4">
          <a href="#home" class="font-bold text-lg text-hijau block py-6">Sandikha Ghali</a>
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
                <a href="#home" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Beranda</a>
              </li>
              <li class="group">
                <a href="#about" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Tentang Saya</a>
              </li>
              <li class="group">
                <a href="#portfolio" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Portfolio</a>
              </li>
              <li class="group">
                <a href="#contact" class="text-base text-hitam py-2 mx-8 flex group-hover:text-hijau">Contact</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  {{-- Header End --}}

  {{-- Hero Section Start --}}
  <section id="home" class="pt-36">
    <div class= "container">
        <div class="flex flex-wrap">
            <div class="W-full self-center px-4 lg:w-1/2">
                <h1 class="text-base font-semibold text-hijau md:text-xl">Halo Semua, saya <span class="block font-bold text-hitam text-4xl mt-1 lg:text-5xl">Sandhika Galih</span></h1>
                <h2 class="font-medium text-abu text-lg mb-5 lg:text-2xl">Lecturer & <span class="text-hitam"> Content Creator</span></h2>
                <p class="font-medium text-abu mb-10 leading-relaxed">Belajar web programming it mudah dan menyenangkan bukan.
                <span class="font-bold text-hitam">bukan!</span></p>
  
                <a href="" class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Hubungi Saya</a>
            </div>
            <div class="w-full self-end px-4 lg:w-1/2">
                <div class="relative mt-10 lg:mt-0 lg:right-0">
                    <img src="https://www.pngkey.com/png/full/402-4026064_orang-sukses-png-thumb-up-man-png.png" alt="sandhika galih" class="max-w-full mx-auto" />
                    <span class="absolute bottom-12 -z-10 left-1/5 -translate-x-1 md:scale-5">
                        <svg width="400" height="400" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#14b8a6" d="M37.3,-65.9C48.4,-58.1,57.5,-48.3,64.1,-37C70.7,-25.6,74.8,-12.8,75.5,0.4C76.1,13.6,73.3,27.1,66.5,38.1C59.7,49.2,49,57.7,37.2,60.4C25.5,63.1,12.8,59.9,0.8,58.5C-11.1,57,-22.2,57.4,-36.1,56C-50.1,54.6,-66.8,51.4,-74.3,41.8C-81.8,32.2,-80,16.1,-74.2,3.3C-68.5,-9.4,-58.7,-18.8,-49.8,-26C-40.9,-33.3,-33,-38.3,-24.8,-47.8C-16.7,-57.2,-8.4,-71.1,2.4,-75.2C13.1,-79.3,26.1,-73.6,37.3,-65.9Z" transform="translate(100 100) scale(0.8)" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
  </section>
  {{-- Hero Section End --}}

  {{-- About Section Start --}}
  <section id="about" class="pt-36 pb-32">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full px-4 mb-10 lg:w-1/2">
          <h4 class="font-bold uppercase text-hijau text-lg mb-3">Tentang Saya</h4>
          <h2 class="font-bold text-hitam text-3xl mb-5 max-w-md lg:text-4xl">Yuk, Belajar Web Programing di WPU</h2>
          <p class="font-medium text-base text-abu max-w-xl lg:text-lg">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque quasi, ipsam accusamus rem praesentium incidunt quibusdam?</p>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <h3 class="font-semibold text-hitam text-2xl mb-4 lg:text-3xl lg:pt-10">Mari Berteman</h3>
          <p class="font-medium text-base text-abu lg:text-lg">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id amet fugit maiores veritatis, minus maxime. Eum, nisi explicabo?
          </p>
          <div class="flex items-center mt-5">
            {{-- Youtube --}}
            <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-hijau hover:bg-hijau hover:text-white text-slate-300">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
            {{-- Instagram --}}
            <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-hijau hover:bg-hijau hover:text-white text-slate-300">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
            </a>
          </div>

        </div>
      </div>
    </div>

  </section>
  {{-- About Section End --}}

  {{-- Portfolio Section Start --}}
    <section id="portfolio" class="pt-36 pb-16 bg-slate-100">
      <div class="container">
        
        <div class="w-full px-4">
          <div class="max-w-xl mx-auto text-center mb-16">
            <h4 class="font-semibold text-lg text-hijau mb-2">Portfolio</h4>
            <h2 class="font-bold text-hitam text-3xl mb-4 sm:text-4xl lg:text-5xl">Project Terbaru</h2>
            <p class="font-meduim text-md text-abu md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae veniam cumque deleniti perspiciatis! Sint commodi nostrum, temporibus nulla sed provident.</p>
          </div>
        </div>

        <div class="w-full px-4 flex flex-wrap justify-center xl:10/12 xl:mx-auto">
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="img/erangel.jpg" alt="" width="w-full">
            </div>
            <h3 class="font-semibold text-xl text-hitam mt-5 mb-3">Landing Page Sandikha Galih</h3>
            <p class="font-medium text-base text-abu">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio veniam officiis esse quos vero minus?</p>
          </div>
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="img/miramar.jpg" alt="" width="w-full">
            </div>
            <h3 class="font-semibold text-xl text-hitam mt-5 mb-3">Landing Page Sandikha Galih</h3>
            <p class="font-medium text-base text-abu">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio veniam officiis esse quos vero minus?</p>
          </div>
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="img/sanhok.jpg" alt="" width="w-full">
            </div>
            <h3 class="font-semibold text-xl text-hitam mt-5 mb-3">Landing Page Sandikha Galih</h3>
            <p class="font-medium text-base text-abu">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio veniam officiis esse quos vero minus?</p>
          </div>
          <div class="mb-12 p-4 md:w-1/2">
            <div class="rounded-md shadow-md overflow-hidden">
              <img src="img/livik.jpg" alt="" width="w-full">
            </div>
            <h3 class="font-semibold text-xl text-hitam mt-5 mb-3">Landing Page Sandikha Galih</h3>
            <p class="font-medium text-base text-abu">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio veniam officiis esse quos vero minus?</p>
          </div>
        </div>
      </div>
    </section>
  {{-- Portfolio Section End --}}

  {{-- Clints Section Start --}}
  <section id="clients" class="pt-36 pb-32 bg-slate-800">
    <div class="container">
      <div class="w-full px-4">
        <div class="mx-auto text-center mb-16">
          <h4 class="font-semibold text-lg text-hijau mb-2">Clients</h4>
          <h2 class="font-bold text-white text-3xl mb-4 sm:text-4xl lg:text-5xl">Yang Pernah Bekerjasama</h2>
          <p class="font-meduim text-md text-abu md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae veniam cumque deleniti perspiciatis! Sint commodi nostrum, temporibus nulla sed provident.</p>
        </div>
      </div>

      <div class="w-full px-4">
        <div class="flex flex-wrap items-center justify-center">
          <a href="#" class="max-[120px] mx-4 py-4 grayscale opacity-60 transition duration-500 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">
            <img src="img/google1.svg.png" alt="Google" class="w-36">
          </a>
          <a href="#" class="max-[120px] mx-4 py-4 grayscale opacity-60 transition duration-500 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">
            <img src="img/google1.svg.png" alt="Google" class="w-36">
          </a>
          <a href="#" class="max-[120px] mx-4 py-4 grayscale opacity-60 transition duration-500 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">
            <img src="img/google1.svg.png" alt="Google" class="w-36">
          </a>
          <a href="#" class="max-[120px] mx-4 py-4 grayscale opacity-60 transition duration-500 hover:grayscale-0 hover:opacity-100 lg:mx-6 xl:mx-8">
            <img src="img/google1.svg.png" alt="Google" class="w-36">
          </a>
        </div>
      </div>
    </div>
</section>
  {{-- Clints Section End --}}

  {{-- Blog Section Start --}}
  <section id="blog" class="pt-36 pb-32 bg-slate-100">
    <div class="container">
      <div class="w-full px-4">
        <div class="max-w-xl mx-auto text-center mb-16">
          <h4 class="font-semibold text-lg text-hijau mb-2">Blog</h4>
          <h2 class="font-bold text-hitam text-3xl mb-4 sm:text-4xl lg:text-5xl">Tulisan Terkini</h2>
          <p class="font-meduim text-md text-abu md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae veniam cumque deleniti perspiciatis! Sint commodi nostrum, temporibus nulla sed provident.</p>
        </div>
      </div>

      <div class="flex flex-wrap">
        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
            <img src="https://source.unsplash.com/360x200?programing" alt="Programing" class="w-full">
            <div class="py-8 px-6">
              <h3 class="">
                <a href="#" class="block mb-3 font-semibold text-xl text-hitam hover:text-hijau truncate">Tips Belajar Programing</a>
              </h3>
              <p class="font-medium text-base text-abu mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo, totam?</p>
              <a href="" class="font-medium text-sm text-white bg-hijau py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
            <img src="https://source.unsplash.com/360x200?mechanical+keyboard" alt="mechanical" class="w-full">
            <div class="py-8 px-6">
              <h3 class="">
                <a href="#" class="block mb-3 font-semibold text-xl text-hitam hover:text-hijau truncate">Tips Belajar Mechanical Keyboard</a>
              </h3>
              <p class="font-medium text-base text-abu mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo, totam?</p>
              <a href="" class="font-medium text-sm text-white bg-hijau py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <div class="w-full px-4 lg:w-1/2 xl:w-1/3">
          <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-10">
            <img src="https://source.unsplash.com/360x200?coffee" alt="coffee" class="w-full">
            <div class="py-8 px-6">
              <h3 class="">
                <a href="#" class="block mb-3 font-semibold text-xl text-hitam hover:text-hijau truncate">Tips Belajar Coffee</a>
              </h3>
              <p class="font-medium text-base text-abu mb-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo, totam?</p>
              <a href="" class="font-medium text-sm text-white bg-hijau py-2 px-4 rounded-lg hover:opacity-80">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Blog Section End --}}

  {{-- Contact Section Start --}}
  <section id="contact" class="pt-36 pb-32">
    <div class="container">
      
      <div class="w-full px-4">
        <div class="max-w-xl mx-auto text-center mb-16">
          <h4 class="font-semibold text-lg text-hijau mb-2">Contact</h4>
          <h2 class="font-bold text-hitam text-3xl mb-4 sm:text-4xl lg:text-5xl">Hubungi Kami</h2>
          <p class="font-meduim text-md text-abu md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae veniam cumque deleniti perspiciatis! Sint commodi nostrum, temporibus nulla sed provident.</p>
        </div>
      </div>

      <form action="">
        <div class="w-full lg:w-2/4 lg:mx-auto">
          <div class="w-full px-4 mb-8">
            <label for="name" class="text-base font-bold text-hijau">Name</label>
            <input type="text" id="name" class="w-full bg-slate-200 text-hitam p-3 rounded-md focus:border-hijau">
          </div>
          <div class="w-full px-4 mb-8">
            <label for="email" class="text-base font-bold text-hijau">Email</label>
            <input type="text" id="email" class="w-full bg-slate-200 text-hitam p-3 rounded-md focus:border-hijau">
          </div>
          <div class="w-full px-4 mb-8">
            <label for="message" class="text-base font-bold text-hijau">Pesan</label>
            <textarea type="text" id="message" class="w-full bg-slate-200 text-hitam p-3 rounded-md focus:outline-none focus:ring-hijau focus:ring-1 focus:border-hijau h-32"></textarea>
          </div>
          <div class="w-full px-4">
            <button class="text-base font-semibold text-white bg-hijau py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">Kirim</button>
          </div>
        </div>
      </form>

    </div>
  </section>
  {{-- Contact Section End --}}

  {{-- Footer Start --}}
  <footer class="bg-hitam pt-24 pb-12">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="W-full px-4 mb-12 text-slate-300 font-medium md:w-1/3">
          <h2 class="font-bold text-4xl text-white mb-5">WPU</h2>
          <h3 class="font-bold text-2xl mb-2">Hubungi Kami</h3>
          <p>sandhikagalih@gmail.com</p>
          <p>Jl. Dr. Setiabudhi No. 193</p>
          <p>Bandung</p>
        </div>
        <div class="W-full px-4 mb-12 md:w-1/3">
          <h3 class="font-semibold text-xl text-white mb-5">Kategori Tulisan</h3>
          <ul class="text-slate-300">
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
          </ul>
        </div>

        <div class="W-full px-4 mb-12 md:w-1/3">
          <h3 class="font-semibold text-xl text-white mb-5">Kategori Tulisan</h3>
          <ul class="text-slate-300">
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
            <li>
              <a href="#" class="inline-block text-base hover:text-hijau mb-3">Programing</a>
            </li>
          </ul>
        </div>

      </div>
      <div class="w-full pt-10 border-t border-slate-700">
        <div class="flex items-center mt-5 justify-center mb-5">
          {{-- Youtube --}}
          <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-hijau hover:bg-hijau hover:text-white text-slate-300">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          </a>
          {{-- Instagram --}}
          <a href="" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-hijau hover:bg-hijau hover:text-white text-slate-300">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
          </a>
        </div>
        <p class="font-medium text-xs text-slate-500 text-center">Dibuat Dengan <span class="text-pink-500">❤</span> Oleh <a href="" target="_blank" class="font-bold text-hijau">Rahmat</a>, Menggunakan <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwindcss</a>.</p>
      </div>
    </div>
  </footer>
  {{-- Footer End --}}

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
