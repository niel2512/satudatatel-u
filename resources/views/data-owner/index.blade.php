{{-- resources/views/data-owner/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Data Owner – Satu Data Telkom University')
@section('meta_description', 'Daftar Direktorat sebagai pengelola data di lingkungan Telkom University')

@section('content')

<section class="py-12 bg-[#F8F9FA] min-h-screen scroll-reveal">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-gray-900 uppercase tracking-tight mb-1">
                Data Owner
            </h1>
            <p class="text-gray-500 text-sm">
                Daftar Direktorat sebagai pengelola data di lingkungan Telkom University
            </p>
        </div>

        {{-- Search --}}
        {{-- <form method="GET" action="{{ route('data-owner') }}" class="mb-8">
            <div class="relative max-w-xs">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                </span>
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Cari direktorat..."
                    class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-full
                           bg-white focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30
                           focus:border-[#8B0000] transition">
            </div>
        </form> --}}

        {{-- Grid kartu --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($directorates as $dir)
        <div class="py-10 group flex flex-col bg-white rounded-2xl border border-gray-150 shadow-sm
                    hover:shadow-md transition-all duration-300 hover:-translate-y-1
                    min-h-[220px] scroll-reveal overflow-hidden">

            {{-- Area Logo — fixed height agar selaras semua card --}}
            <div class="w-full flex-1 flex items-center justify-center">
                <img
                    src="{{ $dir['logo'] }}"
                    alt="Logo {{ $dir['name'] }}"
                    class="max-h-16 max-w-[85%] object-contain
                           filter group-hover:brightness-95 transition-all duration-200"
                    onerror="this.src='https://placehold.co/160x64/f3f4f6/9ca3af?text=Logo'">
            </div>

            {{-- Info + Tombol --}}
            <div class="px-5 pt-10 flex flex-col gap-2">

                {{-- Nama & Penanggung Jawab --}}
                <div>
                    <h3 class="font-bold text-gray-800 text-sm tracking-tight leading-snug
                               group-hover:text-red-700 transition-colors duration-200">
                        Data {{ $dir['name'] }}
                    </h3>
                    <p class="text-gray-400 text-xs mt-0.5">
                        Penanggung Jawab: {{ $dir['penanggung_jawab'] }}
                    </p>
                </div>

                <div class="border-t border-gray-100 mx-4"></div>

                {{-- Tombol Lihat Data --}}
                <a href="#"
                   class="inline-flex items-center gap-1.5 bg-[#C0392B] hover:bg-[#a93226] active:bg-[#8B0000]
                          text-white text-xs font-semibold px-4 py-2 rounded-full w-fit
                          transition-colors duration-200 mt-1">
                    Lihat Data
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                              d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

        </div>
    @endforeach
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
</style>

@endsection