@extends('user.layout.layout')

@section('content')
    <div class="p-10">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- header -->
        <header class="w-full my-4 flex sm:flex-row flex-col gap-10">
            <div class="w-full">
                <img src="{{ asset('storage/images/' . $kegiatan->foto) }}" alt="foto" />
            </div>
            <!-- header bagian kanan -->
            <div class="flex flex-col gap-8 w-full">
                <div>
                    <p class="font-bold text-[#006894] text-lg">
                        {{ $kegiatan->judul_kegiatan }}
                    </p>
                </div>
                <div>
                    <!-- list -->
                    @php
                        // Assuming $dateString contains the date in the "MM/DD/YYYY - MM/DD/YYYY" format
                        $dateString = $kegiatan->tgl_kegiatan;

                        [$startDate, $endDate] = explode(' - ', $dateString);

                        $formattedStartDate = date('d F Y', strtotime($startDate));
                        $formattedEndDate = date('d F Y', strtotime($endDate));

                        // Combine formatted dates back into the desired format
                        $formattedDateRange = $formattedStartDate . ' - ' . $formattedEndDate;
                    @endphp
                    <div class="flex flex-col gap-2">
                        <span class="flex flex-row gap-2 items-center">
                            <div class="bg-[#AFCFDD] p-2">
                                <img class="w-7" src="{{ asset('images/calendar1.svg') }}" alt="" />
                            </div>
                            <p>{{ $formattedDateRange }}</p>
                        </span>
                        <span class="flex flex-row gap-2 items-center">
                            <div class="bg-[#AFCFDD] p-2">
                                <img class="w-7" src="{{ asset('images/group1.svg') }}" alt="" />
                            </div>
                            <p>{{ $kegiatan->kuota }} Anggota GenBI</p>
                        </span>
                        <span class="flex flex-row gap-2 items-center">
                            <div class="bg-[#AFCFDD] p-2">
                                <img class="w-7" src="{{ asset('images/suit1.svg') }}" alt="" />
                            </div>
                            <p>{{ $kegiatan->dresscode }}</p>
                        </span>
                        <span class="flex flex-row gap-2 items-center">
                            <div class="bg-[#AFCFDD] p-2">
                                <img class="w-7" src="{{ asset('images/maps.svg') }}" alt="" />
                            </div>
                            <p>{{ $kegiatan->lokasi }}</p>
                        </span>
                    </div>
                </div>
                <div>
                    <!-- Tombol bergabung -->

                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Bergabung Sebagai <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            {{-- px-6 py-2 hover:bg-yellow-600 rounded-full text-white bg-[#EBC707] --}}
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHover"
                        class="z-10 hidden bg--blue-700 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                    @php $sisaPeserta = $kegiatan->kuota - $cekPeserta; @endphp
                                    href="{{ route('kegiatan.peserta.create', $kegiatan->id) }}"
                                    @if ($sisaPeserta <= 0) hidden @endif>Peserta <br>
                                    @if ($sisaPeserta <= 0)
                                        (Penuh)
                                    @else
                                        (Sisa {{ $sisaPeserta }} Peserta)
                                    @endif
                                </a>
                            </li>
                            @foreach ($jabatan as $item)
                                @php
                                $isIdExist = collect($kepanitianChecked)->contains('id_jabatan', $item->id); @endphp
                                @if ($isIdExist)
                                    @php
                                        $kepanitianItem = collect($kepanitianChecked)
                                            ->where('id_jabatan', $item->id)
                                            ->first();
                                        $jumlah = $kepanitianItem ? intval($kepanitianItem->jumlah) : 0;

                                        $cekPanitiaItem = collect($cekPanitia)
                                            ->where('jabatan_id', $item->id)
                                            ->first();
                                        $jumlahTerdaftar = $cekPanitiaItem ? intval($cekPanitiaItem->jumlah) : 0;

                                        $sisa = $jumlah - $jumlahTerdaftar;
                                        // dd($sisa);
                                    @endphp
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            href="{{ route('kegiatan.panitia.create', [
                                                'kegiatan' => $kegiatan->id,
                                                'panitia' => $item->id,
                                            ]) }}"
                                            @if ($sisa <= 0) hidden @endif>{{ $item->jabatan }} <br>
                                            @if ($sisa <= 0)
                                                (Penuh)
                                            @else
                                                (Sisa {{ $sisa }} Panitia)
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- bagikan -->
        <div class="flex flex-row gap-4">
            <p>Bagikan:</p>
            <a href="http://wa.com">
                <img src="{{ asset('images/wa.svg') }}" alt="" />
            </a>
            <a href="http://instagram.com">
                <img src="{{ asset('images/ig.svg') }}" alt="" />
            </a>
        </div>
        <!-- Tentang kegiatan -->
        <div class="mt-4">
            <p class="text-[#4F77A6] font-semibold">Tentang Kegiatan</p>
            <br />
            <p>{!! nl2br(e($kegiatan->deskripsi_kegiatan)) !!}
                {{-- {{ $kegiatan->deskripsi_kegiatan }} --}}
            </p>
        </div>
        <div class="flex sm:flex-row flex-col space-between items-start gap-8 mt-4">

            <!-- Lihat teman -->
            <div class="w-full">
                <p class="text-[#4F77A6] font-semibold">Lihat Teman Kamu</p>
                <br />
                <div class="w-full bg-[#EFF7FF] p-4 rounded-lg">
                    <ul class="flex flex-col gap-2">
                        <li>
                            <p class="text-[#8B8B8B] font-semibold">
                                <span class="text-[#006894]">Nama Lengkap </span>telah bergabung
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
