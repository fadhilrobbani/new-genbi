@extends('user.layout.layout')

@section('content')
    <!-- Main -->
    <div class="p-10 mt-4 gap-10 flex flex-col">
        <!-- leaderboard -->
        <div class="max-w-md mx-auto">
            <!-- Your image goes here -->
            <img src="{{ asset('images/image102.png') }}" alt="Your Image" class="w-full h-auto" />
            <!-- Title -->
            <h1 class="text-3xl font-bold mt-4 text-[#006894]">Leaderboard</h1>
        </div>

        <div class="w-5 p-4 md:w-2/3 mx-auto flex flex-col gap-4 rounded-lg relative bg-[#EAF5FF]">
            <div class="p-1 absolute top-4 right-4">
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="text-white bg-[#9BCADF] hover:bg-[#9BCADF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-2 py-1.5 text-center inline-flex items-center dark:bg-[#9BCADF] dark:hover:bg-[#9BCADF] dark:focus:ring-blue-800"
                    type="button" style="float: right;">
                    Pilih Kategori
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
            </div>

            <!-- Dropdown menu -->
            <div id="dropdownHover"
                class="z-10 hidden bg-[#9BCADF] divide-y divide-bg-[#9BCADF] rounded-lg shadow w-44 dark:bg-[#9BCADF]">
                <ul class="py-2 text-sm text-white dark:text-white" aria-labelledby="dropdownHoverButton">
                    @foreach ($komisariat as $komisariat)
                        @if ($komisariat->komisariat !== 'Pembina' && $komisariat->komisariat !== 'Operator')
                            <li><a href="" class="block px-4 py-2 hover:bg-[#9BCADF] dark:hover:bg-gray-600 dark:hover:text-white">{{ $komisariat->komisariat }}
                                </a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            {{-- <div class="bg-[#9BCADF] p-1 absolute top-4 right-4 rounded-full">
            <p class="text-xs text-white">Universitas Bengkulu</p>
          </div> --}}
            {{-- <div class="flex items-center justify-center">
            <div class="flex flex-wrap">
                @foreach ($komisariat as $komisariat)
                    @if ($komisariat->komisariat !== 'Pembina' && $komisariat->komisariat !== 'Operator')
                        <div class="bg-[#9BCADF] p-1 flex justify-center rounded-full mb-2 m-1">
                            <a class="text-xs text-white">{{ $komisariat->komisariat }}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div> --}}
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
                        <p class="text-center text-xs text-yellow-500 font-semibold">{{ $top3[0]->poin }} Point</p>
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

        <div class="mx-auto grid grid-cols-3 gap-4 justify-between">
            <!-- Image on the left with a smaller width -->
            <div class="">
                <img src="{{ asset('images/52172151.png') }}" alt="Your Image" class="w-full h-auto" />
            </div>

            <!-- Text on the right, right-aligned -->
            <div class="text-left col-span-2 flex flex-col justify-center">
                <p class="text-3xl font-bold mt-4 text-[#006894] mb-10">KAMU PERLU TAHU</p>
                <p class="text-sm text-gray-800 mb-4">
                    point keaktifan akan terinput ketika kalian mengikuti kegiatan yang tersedia, hubungi sekretaris
                    komisariat apabila terdapat point keaktifan yang belum terinput.
                </p>
                <p class="text-sm text-gray-800">
                    Tingkatkan point keaktifanmu selama menjadi anggota GenBI, Karena bukan hanya anggota saja yang dapat
                    melihat point mu, Tetapi pihak Bank Indonesia KPw Bengkulu juga dapat melihatnya.
                </p>
            </div>
        </div>
    </div>

    <!-- end of main -->
@endsection
