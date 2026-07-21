@extends('layouts.app')

@section('title', 'Organisasi – Satu Data Telkom University')
@section('meta_description', 'Profil organisasi Satu Data Center Telkom University.')

@section('content')

{{-- ========================================================
     HERO — Satu Data Center
======================================================== --}}
<section class="bg-gray-100 pt-16 pb-20">
    <div class="scroll-reveal max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-[#8B0000] text-2xl font-extrabold mb-6 tracking-tight">
            SATU DATA CENTER
        </h1>

        <p class="text-gray-600 text-sm leading-relaxed mb-10">
            Satu Data Center adalah unit pengelola data terpusat di Telkom University yang bertugas
            mengintegrasikan, menstandarisasi, dan mendistribusikan data seluruh unit kerja. Kami hadir
            sebagai tulang punggung transformasi digital universitas, memastikan setiap keputusan berbasis
            data yang akurat, mutakhir, dan dapat dipertanggungjawabkan.
        </p>

        {{-- VISION --}}
        <div class="scroll-reveal mb-10">
            <h2 class="text-[#8B0000] text-lg font-extrabold uppercase tracking-widest mb-3">VISION</h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                Menjadi pusat data terpercaya dan inovatif yang mendukung transformasi digital Telkom University
                melalui tata kelola data yang terintegrasi, akurat, dan berkelanjutan guna mewujudkan universitas
                kelas dunia berbasis SAFE AI. Kami berkomitmen menghadirkan platform data yang andal sehingga
                setiap pemangku kepentingan dapat mengambil keputusan strategis berbasis bukti dengan percaya diri.
            </p>
        </div>

        {{-- MISION --}}
        <div class="scroll-reveal">
            <h2 class="text-[#8B0000] text-lg font-extrabold uppercase tracking-widest mb-4">MISION</h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                Mengelola dan mengintegrasikan seluruh data Telkom University dalam satu platform terpusat yang
                mudah diakses, akurat, dan selalu mutakhir. Menetapkan dan menerapkan standar baku pengelolaan
                data yang seragam di seluruh unit kerja universitas. Menjamin keamanan, kerahasiaan, dan
                kepatuhan data terhadap regulasi yang berlaku, termasuk Perpres No.&nbsp;39 Tahun 2019 tentang
                Satu Data Indonesia. Mendorong budaya berbasis data (<em>data-driven culture</em>) di lingkungan
                akademik dan administratif melalui pelatihan, sosialisasi, dan pendampingan intensif.
                Menyediakan layanan analitik dan visualisasi data yang membantu pimpinan universitas dalam
                perencanaan dan evaluasi strategis secara real-time.
            </p>
        </div>
    </div>
</section>

{{-- ========================================================
     TIM PENGEMBANG SATU DATA
======================================================== --}}
<section class="py-16 bg-[#F8F9FA]">
    <div class="scroll-reveal max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-center text-gray-900 text-2xl font-extrabold mb-10">
            Tim Pengembang Satu Data
        </h2>

        {{-- Leader Card — di tengah, lebar sedang --}}
        <div class="flex justify-center mb-8">
            <div class="scroll-reveal w-64 md:w-72">
                <div class="overflow-hidden bg-gray-200 shadow-md">
                    <img
                        src="{{ $teamLeader['photo'] }}"
                        alt="{{ $teamLeader['name'] }}"
                        class="w-full h-full object-cover object-top"
                        onerror="this.src='https://placehold.co/600x800/e5e7eb/9ca3af?text=Photo'"
                    >
                </div>
                <div class="bg-[#8B0000] px-4 py-4 mt-auto text-center">
                    <p class="text-white text-sm font-bold leading-tight">{{ $teamLeader['name'] }}</p>
                    <p class="text-red-200 text-xs mt-0.5">{{ $teamLeader['role'] }}</p>
                </div>
            </div>
        </div>

        {{-- Member Cards — Grid 3 Kolom Sejajar --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            @foreach ($teamMembers as $member)
                <div class="scroll-reveal w-64 md:w-72 mx-auto bg-[#7A1315] rounded-none overflow-hidden shadow-lg flex flex-col transition-transform duration-300 hover:scale-[1.02]">
                    <div class="w-full h-full aspect-[3/4] bg-gray-100">
                        <img
                            src="{{ $member['photo'] }}"
                            alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover object-top"
                            onerror="this.src='https://placehold.co/600x800/e5e7eb/9ca3af?text=Photo'"
                        >
                    </div>
                    <div class="bg-[#8B0000] px-4 py-4 text-center mt-auto">
                        <p class="text-white text-base font-bold tracking-wide leading-snug">{{ $member['name'] }}</p>
                        <p class="text-red-200 text-xs mt-1">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ========================================================
     STRUKTUR ORGANISASI PuTI
======================================================== --}}
<section class="py-16 bg-gray-100 overflow-x-hidden">
    <div class="scroll-reveal max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-center text-gray-900 text-2xl font-extrabold mb-10">
            Struktur Organisasi PuTI
        </h2>

        {{-- ROOT NODE --}}
        <div class="flex justify-center">
            <div class="bg-[#8B0000] text-white text-sm font-bold px-6 py-4 rounded-xl shadow">
                Direktur Pusat Teknologi Informasi
            </div>
        </div>

        {{-- Garis turun dari root ke T-junction --}}
        <div style="display:flex; justify-content:center; height:32px;">
            <div style="border-left:1px solid #9ca3af; height:100%;"></div>
        </div>

        {{-- T-JUNCTION: bar horizontal + 3 garis turun --}}
        <div style="position:relative; height:32px; display:flex;">
            {{-- Bar horizontal absolut dari center col1 ke center col3 --}}
            <div style="position:absolute; top:0; left:16.667%; right:16.667%; border-top:1px solid #9ca3af;"></div>
            {{-- 3 garis vertikal turun dari bar ke masing-masing Kepala Bagian --}}
            <div style="flex:1; display:flex; justify-content:center;">
                <div style="border-left:1px solid #9ca3af; height:100%;"></div>
            </div>
            <div style="flex:1; display:flex; justify-content:center;">
                <div style="border-left:1px solid #9ca3af; height:100%;"></div>
            </div>
            <div style="flex:1; display:flex; justify-content:center;">
                <div style="border-left:1px solid #9ca3af; height:100%;"></div>
            </div>
        </div>

        {{-- TIGA KOLOM ISI --}}
        <div style="display:flex;">

            {{-- KOLOM KIRI: Kepala Bagian Pengembangan Produk TI --}}
            <div style="flex:1; min-width:0; display:flex; flex-direction:column; align-items:center; padding:0 12px;">
                <div class="w-full border-2 border-[#8B0000] text-[#8B0000] text-xs font-bold px-4 py-3 rounded-xl text-center leading-snug">
                    Kepala Bagian Pengembangan Produk TI
                </div>
                {{-- garis turun ke child pertama --}}
                <div style="display:flex; justify-content:center; height:20px; width:100%;">
                    <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                </div>
                @foreach([
                    'Kepala Urusan Pengembangan Produk TI',
                    'System Analyst',
                    'Back End Developer',
                    'Front End Developer',
                    'UI/UX Designer',
                    'Technical Writer',
                ] as $c)
                    <div class="w-full border border-gray-300 bg-white text-[#8B0000] text-xs font-semibold px-4 py-2.5 rounded-xl text-center">
                        {{ $c }}
                    </div>
                    @if(!$loop->last)
                        <div style="display:flex; justify-content:center; height:10px; width:100%;">
                            <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- KOLOM TENGAH: Kepala Bagian Riset dan Layanan TI --}}
            <div style="flex:1; min-width:0; display:flex; flex-direction:column; align-items:center; padding:0 12px;">
                <div class="w-full border-2 border-[#8B0000] text-[#8B0000] text-xs font-bold px-4 py-3 rounded-xl text-center leading-snug">
                    Kepala Bagian Riset dan Layanan TI
                </div>
                <div style="display:flex; justify-content:center; height:20px; width:100%;">
                    <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                </div>
                @foreach([
                    'Kepala Urusan Satu Data',
                    'Back End Developer',
                    'Data Management',
                ] as $c)
                    <div class="w-full border border-gray-300 bg-white text-[#8B0000] text-xs font-semibold px-4 py-2.5 rounded-xl text-center">
                        {{ $c }}
                    </div>
                    @if(!$loop->last)
                        <div style="display:flex; justify-content:center; height:10px; width:100%;">
                            <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- KOLOM KANAN: Kepala Bagian Infrastruktur TI --}}
            <div style="flex:1; min-width:0; display:flex; flex-direction:column; align-items:center; padding:0 12px;">
                <div class="w-full border-2 border-[#8B0000] text-[#8B0000] text-xs font-bold px-4 py-3 rounded-xl text-center leading-snug">
                    Kepala Bagian Infrastruktur TI
                </div>
                <div style="display:flex; justify-content:center; height:20px; width:100%;">
                    <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                </div>
                @foreach([
                    'Kepala Urusan Pusat Data',
                    'Staff Urusan Pusat Data',
                ] as $c)
                    <div class="w-full border border-gray-300 bg-white text-[#8B0000] text-xs font-semibold px-4 py-2.5 rounded-xl text-center">
                        {{ $c }}
                    </div>
                    @if(!$loop->last)
                        <div style="display:flex; justify-content:center; height:10px; width:100%;">
                            <div style="border-left:1px solid #9ca3af; height:100%;"></div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>{{-- /flex tiga kolom --}}

    </div>
</section>

@endsection