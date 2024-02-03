@extends('user.layout.layout')

@section('content')
    <!--
          Heads up! 👋

          This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
        -->

    <section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg.png') }}');">
        <div class="absolute inset-0 bg-gray-500 opacity-30"></div>

        <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
            <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                <h1 class="text-3xl font-extrabold sm:text-5xl text-left text-white">
                    Selamat Datang,

                    <strong class="block font-extrabold text-blue-700 text-left"> GenBIers. </strong>
                </h1>

                <p class="mt-4 max-w-lg sm:text-xl/relaxed text-left text-white">
                    Terus tingkatkan point keaktifan mu, agar kamu menjadi juara di setiap momen
                </p>

                <div class="mt-8 flex flex-wrap gap-4 text-center">
                    <a href="#leaderboard"
                        class="block w-full rounded bg-blue-700 px-12 py-3 text-sm font-medium text-white shadow focus:outline-none focus:ring active:bg-rose-500 sm:w-auto text-decoration-none">
                        Leaderboard
                    </a>

                    <a href="#"
                        class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-blue-600 shadow focus:outline-none focus:ring active:blue-500 sm:w-auto text-decoration-none">
                        Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </section>


    <section id="pusat-informasi">
        <div class="container-custom-box1">
            <h1 class="text-3xl font-bold text-center text-blue-500"> Pusat Informasi</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a class="card-button text-decoration-none"><small> selengkapnya >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a class="card-button text-decoration-none"><small> selengkapnya >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a class="card-button text-decoration-none"><small> selengkapnya >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a class="card-button text-decoration-none"><small> selengkapnya >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a href="" class="card-button text-decoration-none"><small> selengkapnya
                                            >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 1000px; border: none;">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="{{ asset('images/informasi2.png') }}" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" style="margin-top: 15px;">GenBI UNIB melaksanakan kegiatan
                                        Famgath menyambut anggota Baru GenBI</h5>
                                    <p class="text-secondary"><small>28 November 2023</small></p>
                                    <a class="card-button text-decoration-none"><small> selengkapnya >></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="komisariat" style="background-image: url('{{ asset('images/bg.png') }}');">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-3xl font-bold text-center text-blue-500">KOMISARIAT</h1>
                </div>
                <div class="row mt-5">


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon position-relative">
                                <img src="{{ asset('images/logo-iain.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 24px;">IAIN Curup</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon-unib position-relative">
                                <img src="{{ asset('images/logo-unib.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 20px;">Universitas Bengkulu</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 order-lg-1">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon-umb position-relative">
                                <img src="{{ asset('images/logo-umb.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 24px;">UM Bengkulu</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 order-lg-1">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon-uin position-relative">
                                <img src="{{ asset('images/logo-uin.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 24px;">UINFAS</h3>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 order-lg-1">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon-smk5 position-relative">
                                <img src="{{ asset('images/logo-smk5.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 24px;">
                                    SMKN 5 Bengkulu</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 order-lg-1">
                        <div class="card-komisariat d-flex align-items-center">
                            <div class="circle-icon-smk1 position-relative">
                                <img src="{{ asset('images/logo-smk1.png') }}" alt="" class="w-100 h-100">
                            </div>
                            <div class="text-container ml-3">
                                <h3 class="my-0" style="color: #006D9C; font-size: 20px;">SMKN 1 Kota Bengkulu</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="Leaderboard" id="leaderboard">
        <div class="container-ld text-center">
            <h3>Leaderboard</h3>
            <div class="row">
                <div class="col-md-7">
                    <!-- leaderboard -->
                    <div class="w-full p-4 md:w-2/3 mx-auto flex flex-col gap-4 rounded-lg relative bg-[#EAF5FF]">
                        <div class="p-1 absolute top-4 right-4">
                            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                                data-dropdown-trigger="hover"
                                class="text-white bg-[#9BCADF] hover:bg-[#9BCADF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-1.5 text-center inline-flex items-center dark:bg-[#9BCADF] dark:hover:bg-[#9BCADF] dark:focus:ring-blue-800"
                                type="button" style="float: right;">
                                Pilih Kategori
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div id="dropdownHover"
                            class="z-10 hidden bg-[#9BCADF] divide-y divide-bg-[#9BCADF] rounded-lg shadow w-44 dark:bg-[#9BCADF]">
                            <ul class="py-2 text-sm text-white dark:text-white" aria-labelledby="dropdownHoverButton">
                                @foreach ($komisariat as $komisariat)
                                    @if ($komisariat->komisariat !== 'Pembina' && $komisariat->komisariat !== 'Operator')
                                        <li><a href=""
                                                class="block px-4 py-2 hover:bg-[#9BCADF] dark:hover:bg-gray-600 dark:hover:text-white">{{ $komisariat->komisariat }}
                                            </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- foto leaderboard -->

                        <div class="h-48 mt-8 p-4 w-full flex justify-center">
                            <!-- rank2 -->
                            <div class="w-full relative flex flex-col items-center justify-center">
                                <div>
                                    <img class="mx-auto w-[88px] border-4 border-[#BCBCBC] rounded-full"
                                        src="{{ asset('storage/images/' . $top3[1]->foto) }} " alt="" />
                                </div>
                                <p class="text-xs font-semibold">{{ $top3[1]->nama }}</p>
                                <p class="text-xs text-yellow-500 font-semibold">{{ $top3[1]->poin }} Point</p>
                            </div>
                            <!-- rank1 -->
                            <div class="w-full relative flex flex-col items-center">
                                <div>
                                    <img class="mx-auto w-[88px] border-4 relative border-amber-400 rounded-full"
                                        src="{{ asset('storage/images/' . $top3[0]->foto) }}" alt="" />
                                </div>
                                <div>
                                    <p class="text-xs font-semibold">{{ $top3[0]->nama }}</p>
                                    <p class="text-center text-xs text-yellow-500 font-semibold">{{ $top3[0]->poin }}
                                        Point</p>
                                </div>
                            </div>
                            <!-- rank3 -->
                            <div class="w-full relative flex flex-col items-center justify-end">
                                <div>
                                    <img class="mx-auto w-[88px] border-4 border-[#D2941D] rounded-full"
                                        src="{{ asset('storage/images/' . $top3[2]->foto) }}" alt="" />
                                </div>
                                <p class="text-xs font-semibold">{{ $top3[2]->nama }}</p>
                                <p class="text-xs text-yellow-500 font-semibold">{{ $top3[2]->poin }} Point</p>
                            </div>
                        </div>
                        <!-- end of foto leaderboard -->

                        <!-- daftarlist nama leaderboard -->
                        <ol class="flex flex-col list-decimal text-white gap-2">
                            <!-- list tiap nama  -->
                            @foreach ($user as $user)
                                <div class="bg-[#9BCADF] px-8 flex flex-row justify-between rounded-full py-2">
                                    <li>{{ $user->nama }}</li>
                                    <p>{{ $user->poin }} Point</p>
                                </div>
                            @endforeach
                        </ol>
                        <!-- end of daftarlist nama leaderboard -->
                    </div>
                    <!-- end of leaderboard -->
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/ld.png') }}" class="h-auto max-w-full" alt="">
                    <p class="text-sm ext-gray-800 mb-4">yukk.....terus tingkatkan point keaktifan mu, agar kamu menjadi
                        juara di setiap momen</p>
                    <a href="{{ route('leaderboard') }}"
                        class="text-decoration-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">
                        Leaderboard</a>
                </div>
            </div>

        </div>
        </div>
    </section>

    <section id="Informasi Lainnya">
        <div class="container-ld text-center">
            <h3>Informasi Lainnya</h3>

        </div>
    </section>

    </body>
    <footer>
        <div class="text-center text-dark p-4" style="background-color: rgba(0, 0, 0, 0.1);">
            © 2024 Copyright:
            <a class="text-dark" href="">Team Project Infomatika dan Sistem Informasi GenBI UNIB 2024</a>
        </div>
    </footer>
@endsection
