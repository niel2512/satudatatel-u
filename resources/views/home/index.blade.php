@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Portal Satu Data Telkom University — Pusat informasi, katalog dataset, dan tata kelola data universitas')

@section('content')

{{-- =================== HERO SECTION =================== --}}
<section class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-red-50 pt-16 pb-20">
    <!-- Decorative blobs -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-red-100 rounded-full opacity-30 blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-red-50 rounded-full opacity-40 blur-2xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto">
            <!-- Badge -->
            {{-- <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-red-50 border border-red-200 rounded-full text-[#8B0000] text-xs font-semibold mb-6 scroll-reveal">
                <span class="w-1.5 h-1.5 bg-[#8B0000] rounded-full animate-pulse"></span>
                Portal Resmi Telkom University
            </div> --}}

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-4 scroll-reveal"> <span class="text-[#77181D]">Satu Data</span><br>
                <span class="text-[#8B0000]">Telkom University</span>
            </h1>

            <p class="text-gray-500 text-base md:text-lg leading-relaxed mb-8 max-w-xl mx-auto scroll-reveal">
                Pusat informasi, katalog dataset, dan ekosistem tata kelola data terpadu
                di lingkungan Universitas Telkom untuk civitas academica dan publik.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center scroll-reveal">
                <a href="/katalog-dataset"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-[#8B0000] text-white font-semibold rounded-xl hover:bg-[#6B0000] transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                    </svg>
                    Jelajahi Katalog
                </a>
                <a href="/tentang"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-white text-[#8B0000] font-semibold rounded-xl border-2 border-[#8B0000] hover:bg-red-50 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Tentang Satu Data
                </a>
            </div>
        </div>
    </div>
</section>

{{-- =================== HOT TOPICS SECTION =================== --}}
<section class="bg-[#8B0000] py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Label "Hot Topics" di atas --}}
        <div class="mb-6 flex justify-center">
            <span class="text-white text-center font-bold text-base tracking-wide">Hot Topics</span>
        </div>

        {{-- Topic tags di bawah --}}
        <div class="flex flex-wrap justify-center gap-2">
            @php
                $topics = ['Satu Data Indonesia', 'Data Governance', 'Open Data', 'Katalog Dataset', 'Data Owner', 'Perpres No.39/2019'];
            @endphp
            @foreach($topics as $topic)
                <a href="/katalog-dataset?q={{ urlencode($topic) }}"
                    class="px-4 py-1.5 bg-white/15 hover:bg-white/25 text-white text-sm font-medium rounded-full
                           transition-all duration-200 border border-white/30 hover:border-white/60 whitespace-nowrap">
                    {{ $topic }}
                </a>
            @endforeach
        </div>
    </div>
</section>


{{-- =================== OVERVIEW SECTION (Profil Universitas) =================== --}}
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Mengubah grid item alignment dari items-start ke items-stretch agar tinggi kolom kanan & kiri sama rata --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-stretch">

            {{-- ======= KIRI: Dua Foto + Badge Logo ======= --}}
            <div class="scroll-reveal">
                {{-- Container dengan tinggi tetap --}}
                <div class="relative flex gap-3 items-start" style="height: 460px">

                    {{-- Foto kiri: penuh dari atas ke bawah --}}
                    <div class="overflow-hidden shadow-lg bg-gray-200 rounded-xl" style="width: 50%; height: 90%; align-self: flex-start;">
                        <img
                            src="/images/tel-u1.jpg"
                            alt="Kampus Telkom University"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    {{-- Foto kanan: lebih pendek, rata bawah (Batas bawah garis acuan kamu) --}}
                    <div class="overflow-hidden shadow-lg bg-gray-200 rounded-xl" style="width: 50%; height: 80%; align-self: flex-end;">
                        <img
                            src="/images/tel-u2.jpg"
                            alt="Kampus Telkom University 2"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    {{-- Badge logo Tel-U: tepat di batas antara dua foto, tengah vertikal --}}
                    <div class="absolute z-10" style="left: 50%; top: 50%; transform: translate(-50%, -50%)">
                        <div class="w-24 h-24 bg-white rounded-full shadow-xl flex items-center justify-center border-4 border-white overflow-hidden p-1">
                            <img src="/images/mid-tel-u.png" alt="Badge Tel-U" class="w-full h-full object-contain">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ======= KANAN: Info Telkom University ======= --}}
            {{-- Menggunakan h-[368px] karena tinggi gambar kanan adalah 80% dari 460px (460 * 0.8 = 368) --}}
            {{-- Kita pasang flex flex-col justify-between agar card otomatis terdorong ke paling bawah --}}
            <div class="scroll-reveal pl-4 flex flex-col lg:h-[368px] justify-between lg:self-end py-1">
                <div class="space-y-6">
                    <p class="text-gray-700 text-[15px] md:text-base leading-relaxed">
                        Telkom University adalah perguruan tinggi swasta terbaik di Indonesia yang berfokus pada bidang
                        <em class="font-medium not-italic text-gray-800">Information and Communications Technologies</em> (ICT),
                        Manajemen, dan Industri Kreatif.
                    </p>

                    {{-- Kontak: Spasi vertikal antar item dinaikkan ke space-y-4 --}}
                    <div class="space-y-4">
                        {{-- Alamat --}}
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 text-[15px] md:text-base leading-relaxed">Jl. Telekomunikasi Terusan Buah Batu Indonesia 40257, Bandung, Indonesia</span>
                        </div>

                        {{-- Telepon --}}
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 text-[15px] md:text-base">022 7564 108</span>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <span class="text-gray-600 text-[16px]">info@telkomuniversity.ac.id</span>
                        </div>

                        {{-- Website --}}
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                </svg>
                            </div>
                            <a href="https://telkomuniversity.ac.id" target="_blank" class="text-gray-600 text-[16px] hover:text-[#C0392B] transition-colors">
                                https://telkomuniversity.ac.id
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Group Bawah: Divider, Akreditasi, dan Stats Cards --}}
                {{-- Bagian ini otomatis nempel ke bawah karena space-between --}}
                <div class="space-y-4 mt-4 lg:mt-0">
                    {{-- Divider & Akreditasi --}}
                    <div class="pt-4">
                        <p class="text-sm font-bold text-gray-900 mb-2">Akreditasi Perguruan Tinggi</p>
                        <div class="space-y-1 text-sm text-gray-600">
                            <div class="flex gap-6">
                                <span class="w-24 flex-shrink-0">Tanggal SK</span>
                                <span>:&nbsp; 28 Desember 2021</span>
                            </div>
                            <div class="flex gap-6">
                                <span class="w-28 flex-shrink-0">Tanggal SK</span>
                                <span>:&nbsp; 28 Desember 2021</span>
                            </div>
                            <div class="flex gap-6">
                                <span class="w-28 flex-shrink-0">Nomor SK</span>
                                <span>:&nbsp; 1055/SK/BAN-PT/Ak-PPJ/PT/XII/2021</span>
                            </div>
                        </div>
                    </div>

                    {{-- Stats cards --}}
                    <div class="grid grid-cols-2 gap-4 py-4">
                        {{-- Fakultas --}}
                        <div class="border border-gray-200 rounded-xl px-5 py-3 text-center bg-white shadow-sm">
                            <p class="text-3xl font-extrabold text-[#C0392B]">9</p>
                            <p class="text-sm text-gray-500 mt-0.5">Fakultas</p>
                        </div>
                        {{-- Program Studi --}}
                        <div class="border border-gray-200 rounded-xl px-5 py-3 text-center bg-white shadow-sm">
                            <p class="text-3xl font-extrabold text-[#C0392B]">83</p>
                            <p class="text-sm text-gray-500 mt-0.5">Program Studi</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- =================== VISI MISI SECTION =================== --}}
<section class="relative py-24 bg-[#F8F9FA] overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 relative z-10">

        {{-- ── VISI ROW ── --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center mb-24">

            {{-- Visi Text --}}
            <div class="scroll-reveal pl-4 md:pl-10">
                <p class="text-gray-600 text-[15px] md:text-base leading-relaxed">
                    Menjadi National Excellence Entrepreneurial University berbasis SAFE AI
                    pada tahun 2028, yang berkontribusi pada pemenuhan tujuan pembangunan
                    berkelanjutan (sustainable development goals).
                </p>
            </div>

            {{-- [EDIT] Visi Typo — stacking via CSS grid, bukan absolute --}}
            <div class="scroll-reveal flex justify-center md:justify-end pr-4 md:pr-12">
                <div class="relative flex items-end">
                    {{-- Outline (belakang) --}}
                    <span class="select-none leading-none font-black uppercase pointer-events-none"
                        style="
                            font-size: clamp(60px, 14vw, 100px);
                            -webkit-text-stroke: 2.5px #FECDD3;
                            color: transparent;
                            position: absolute;
                            top: -18%;
                            left: -8%;
                            z-index: 0;
                            white-space: nowrap;
                        ">
                        VISI
                    </span>
                    {{-- Solid (depan) --}}
                    <span class="relative leading-none font-black uppercase tracking-tighter"
                        style="font-size: clamp(60px, 14vw, 100px); z-index: 1; color: #8B0000;">
                        VISI
                    </span>
                </div>
            </div>
        </div>

        {{-- ── MISI ROW ── --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16 items-center">

            {{-- [EDIT] Misi Typo --}}
            <div class="scroll-reveal flex justify-center md:justify-start pl-6 md:pl-16 order-2 md:order-1">
                <div class="relative flex items-end">
                    {{-- Outline (belakang) --}}
                    <span class="select-none leading-none font-black uppercase pointer-events-none"
                        style="
                            font-size: clamp(60px, 14vw, 100px);
                            -webkit-text-stroke: 2.5px #FECDD3;
                            color: transparent;
                            position: absolute;
                            top: -18%;
                            left: -8%;
                            z-index: 0;
                            white-space: nowrap;
                        ">
                        MISI
                    </span>
                    {{-- Solid (depan) --}}
                    <span class="relative leading-none font-black uppercase tracking-tighter"
                        style="font-size: clamp(60px, 14vw, 100px); z-index: 1; color: #8B0000;">
                        MISI
                    </span>
                </div>
            </div>

            {{-- Misi Points --}}
            <div class="scroll-reveal order-1 md:order-2 pl-4 md:pl-0">
                <ul class="space-y-6">
                    @php
                        $misiItems = [
                            'Menyelenggarakan dan mengembangkan pendidikan berbasis SAFE AI berkelas dunia, dan berwawasan kewirausahaan.',
                            'Mengakselerasi transformasi digital berbasis SAFE AI dalam mengembangkan dan menyebarluaskan pengetahuan baru dan produk intelektual di bidang teknologi, sains, dan seni yang berkontribusi pada pemenuhan tujuan pembangunan berkelanjutan (sustainable development goals).',
                            'Berkolaborasi dengan industri dan pemangku kepentingan lain dalam pengembangan inovasi berbasis SAFE AI yang berkontribusi pada pertumbuhan ekonomi bangsa.'
                        ];
                    @endphp
                    @foreach($misiItems as $item)
                        <li class="flex items-start gap-4">
                            <div class="mt-1 flex-shrink-0">
                                <svg class="w-[22px] h-[22px]" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 22C12 22 20 18 20 11V5L12 2L4 5V11C4 18 12 22 12 22Z" fill="#9CA3AF"/>
                                    <path d="M9 9H11.5L12 10.5L12.5 9H15V12C15 13.5 14 15 12 15C10 15 9 13.5 9 12V9Z" fill="#F8F9FA"/>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-[14.5px] leading-relaxed">
                                {{ $item }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>

{{-- =================== STATISTIK SECTION =================== --}}
<section class="bg-[#8B0000] py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $statsItems = [
                    ['value' => $stats['total_directorates'] ?? 1517, 'label' => 'Dosen'],
                    ['value' => $stats['total_datasets'] ?? 46246, 'label' => 'Mahasiswa'],
                    ['value' => $stats['total_students'] ?? 96203, 'label' => 'Alumni'],
                    ['value' => $stats['total_data_owners'] ?? 55, 'label' => 'Hektar Area Kampus'],
                ];
            @endphp
            @foreach($statsItems as $stat)
                <div class="text-center scroll-reveal">
                    <div class="counter-value text-3xl md:text-4xl font-extrabold text-white mb-1" data-target="{{ $stat['value'] }}">0</div>
                    <div class="text-red-200 text-sm font-medium">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =================== QUICK LINKS SECTION =================== --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-2">Layanan & Informasi</h2>
            <p class="text-gray-500 text-sm">Akses cepat ke seluruh layanan portal Satu Data</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @php
                $services = [
                    [
                        'title' => 'Data Owner',
                        'desc' => 'Temukan penanggung jawab data dari setiap direktorat dan unit kerja',
                        'url' => '/data-owner',
                        'color' => 'bg-blue-50 border-blue-100',
                        'iconBg' => 'bg-blue-500',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                    ],
                    [
                        'title' => 'Katalog Dataset',
                        'desc' => 'Jelajahi katalog dataset yang tersedia di seluruh unit kerja universitas',
                        'url' => '/katalog-dataset',
                        'color' => 'bg-green-50 border-green-100',
                        'iconBg' => 'bg-green-500',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/>',
                    ],
                    [
                        'title' => 'Data Governance',
                        'desc' => 'Pahami alur dan kebijakan tata kelola data di Telkom University',
                        'url' => '/data-governance',
                        'color' => 'bg-purple-50 border-purple-100',
                        'iconBg' => 'bg-purple-500',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
                    ],
                    [
                        'title' => 'Berita & Artikel',
                        'desc' => 'Informasi terkini seputar pengelolaan data dan inovasi teknologi',
                        'url' => '/berita',
                        'color' => 'bg-orange-50 border-orange-100',
                        'iconBg' => 'bg-orange-500',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>',
                    ],
                ];
            @endphp
            @foreach($services as $service)
                <a href="{{ $service['url'] }}"
                    class="group block p-6 bg-white rounded-2xl border {{ $service['color'] }} shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 scroll-reveal">
                    <div class="w-12 h-12 {{ $service['iconBg'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-200">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $service['icon'] !!}
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">{{ $service['title'] }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed mb-3">{{ $service['desc'] }}</p>
                    <span class="inline-flex items-center gap-1 text-xs font-semibold text-[#8B0000] group-hover:gap-2 transition-all duration-200">
                        Selengkapnya
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- =================== BERITA TERBARU SECTION =================== --}}
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-xs text-[#8B0000] font-semibold uppercase tracking-wider mb-1">Terkini</p>
                <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900">Berita & Artikel</h2>
            </div>
            <a href="/berita" class="hidden sm:inline-flex items-center gap-1 text-sm text-[#8B0000] font-semibold hover:underline">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        @if(isset($latestNews) && $latestNews->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($latestNews as $article)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 scroll-reveal group">
                        <div class="h-44 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                            @if($article->thumbnail)
                                <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#8B0000]/10 to-[#C0392B]/20">
                                    <svg class="w-12 h-12 text-[#8B0000]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            @if($article->category)
                                <span class="inline-block px-2 py-0.5 bg-red-50 text-[#8B0000] text-xs font-semibold rounded-md mb-2">{{ $article->category->name }}</span>
                            @endif
                            <h3 class="font-bold text-gray-900 text-sm leading-snug mb-2 group-hover:text-[#8B0000] transition-colors line-clamp-2">{{ $article->title }}</h3>
                            <p class="text-gray-400 text-xs leading-relaxed mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400 text-xs">{{ $article->published_at?->translatedFormat('d M Y') }}</span>
                                <a href="/berita/{{ $article->slug }}" class="text-xs text-[#8B0000] font-semibold hover:underline">Baca →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <!-- Placeholder cards when no news -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $placeholderNews = [
                        ['title' => 'Telkom University Luncurkan Program Satu Data', 'desc' => 'Direktorat PuTI resmi meluncurkan portal Satu Data sebagai langkah maju dalam transformasi digital universitas.', 'category' => 'Pengumuman', 'date' => '15 Jul 2025'],
                        ['title' => 'Workshop Data Governance bagi Data Owner', 'desc' => 'Workshop intensif tentang tata kelola data dihadiri seluruh Data Owner dari 20 direktorat di Telkom University.', 'category' => 'Kegiatan', 'date' => '10 Jul 2025'],
                        ['title' => 'Implementasi Perpres Satu Data di Perguruan Tinggi', 'desc' => 'Artikel opini tentang bagaimana perguruan tinggi mengimplementasikan regulasi Satu Data Indonesia.', 'category' => 'Artikel', 'date' => '5 Jul 2025'],
                    ];
                @endphp
                @foreach($placeholderNews as $news)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 scroll-reveal group">
                        <div class="h-44 bg-gradient-to-br from-[#8B0000]/10 to-[#C0392B]/20 flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#8B0000]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <div class="p-5">
                            <span class="inline-block px-2 py-0.5 bg-red-50 text-[#8B0000] text-xs font-semibold rounded-md mb-2">{{ $news['category'] }}</span>
                            <h3 class="font-bold text-gray-900 text-sm leading-snug mb-2 group-hover:text-[#8B0000] transition-colors">{{ $news['title'] }}</h3>
                            <p class="text-gray-400 text-xs leading-relaxed mb-3">{{ $news['desc'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-400 text-xs">{{ $news['date'] }}</span>
                                <a href="/berita" class="text-xs text-[#8B0000] font-semibold hover:underline">Baca →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        <div class="text-center mt-8 sm:hidden">
            <a href="/berita" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-xl hover:bg-red-50 transition-all duration-200">
                Lihat Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

{{-- =================== CTA BANNER SECTION =================== --}}
<section class="bg-gradient-to-r from-[#8B0000] to-[#6B0000] py-14 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-48 h-48 bg-white rounded-full blur-2xl"></div>
    </div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">
            Mulai Jelajahi Ekosistem Data Telkom University
        </h2>
        <p class="text-red-200 text-sm mb-8 max-w-xl mx-auto">
            Temukan ratusan dataset, pelajari struktur Data Owner, dan pahami alur Data Governance universitas dalam satu portal terpadu.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="/katalog-dataset"
                class="inline-flex items-center justify-center gap-2 px-7 py-3 bg-white text-[#8B0000] font-bold rounded-xl hover:bg-red-50 transition-all duration-200 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                </svg>
                Jelajahi Katalog Dataset
            </a>
            <a href="/data-owner"
                class="inline-flex items-center justify-center gap-2 px-7 py-3 bg-white/10 text-white font-semibold rounded-xl border border-white/30 hover:bg-white/20 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Lihat Data Owner
            </a>
        </div>
    </div>
</section>

<style>
    .scroll-reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .scroll-reveal.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@endsection
