<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'GenBIpedia' }}</title>
    @include('user.layout.header')

</head>

<body>
    <div class="flex flex-col h-screen">
        <!-- Navbar -->
        <nav class="flex justify-between items-center h-50 bg-gray-300 ">
            <!-- Logo -->
            <a href="/" class="text-decoration-none">
                <div class="flex items-center gap-2 px-10 py-3">
                    <div class="w-14 h-14 bg-cover bg-center rounded-full"
                        style="background-image: url('{{ asset('images/logo-genbi.png') }}')"></div>
                    <div>
                        <p class="text-[#006894] text-lg font-bold">Generasi Baru Indonesia</p>
                        <p class="text-[#006894] text-lg">Provinsi Bengkulu</p>
                    </div>
                </div>
            </a>

            <!-- Menu -->
            <div class="flex items-center gap-4 px-10">
                <a href="/" class="text-[#006894] hover:text-white text-decoration-none">Beranda</a>
                <a href="{{ route('leaderboard') }}" class="text-[#006894] hover:text-white text-decoration-none">Leaderboard</a>
                <a href="#" class="text-[#006894] hover:text-white text-decoration-none">Contact</a>


                <!-- Tombol bergabung -->
                @if (auth()->guest())
                    <a href="{{ route('login') }}"
                        class="text-decoration-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    </a>
                @else
                    <a href="\home"
                        class="text-decoration-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Home
                    </a>
                @endif

            </div>
        </nav>
        @yield('content')

        @include('user.layout.footer')
    </div>

</body>

</html>
