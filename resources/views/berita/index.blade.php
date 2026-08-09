@extends('layouts.app')

@section('title', 'Berita – Satu Data Telkom University')
@section('meta_description', 'Pusat informasi, pengumuman, dan pembaruan terkini di lingkungan Telkom University.')

@section('content')

<section class="bg-[#F8F9FA] pt-16 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Page Header ── --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-[#8B0000] uppercase tracking-tight mb-2">Berita</h1>
            <p class="text-gray-500 text-sm">Pusat informasi, pengumuman, dan pembaruan terkini di lingkungan Telkom University</p>
        </div>

        {{-- ── 2-Column Layout ── --}}
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            {{-- ─── KIRI: Daftar Artikel ─── --}}
            <div class="flex-1 min-w-0">

                {{-- Article list --}}
                <div class="space-y-5">
                    @forelse($articles as $article)
                        <a href="{{ route('news.show', $article->slug) }}"
                           class="group flex gap-0 bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200 block">

                            {{-- Gambar --}}
                            <div class="w-[220px] flex-shrink-0 overflow-hidden">
                                <img src="{{ $article->thumbnail ?? '/images/campus.png' }}"
                                     alt="{{ $article->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                     style="min-height:160px;">
                            </div>

                            {{-- Konten --}}
                            <div class="flex flex-col justify-center px-6 py-5 flex-1 min-w-0">
                                <h2 class="text-base font-bold text-gray-900 mb-2 leading-snug group-hover:text-[#8B0000] transition-colors line-clamp-2">
                                    {{ $article->title }}
                                </h2>
                                <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-2">
                                    {{ $article->excerpt }}
                                </p>
                                {{-- Meta --}}
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-gray-400 text-xs">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                                        </svg>
                                        {{ $article->category?->name ?? '-' }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                        </svg>
                                        {{ $article->published_at?->translatedFormat('d F Y') ?? '-' }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                        </svg>
                                        {{ $article->author }}
                                    </span>
                                </div>
                            </div>

                        </a>
                    @empty
                        <div class="bg-white rounded-xl border border-gray-100 px-6 py-16 text-center text-gray-400 text-sm">
                            Tidak ada berita yang sesuai dengan pencarian Anda.
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $articles->withQueryString()->links() }}
                </div>

            </div>{{-- /kiri --}}

            {{-- ─── KANAN: Sidebar ─── --}}
            <div class="w-full lg:w-72 flex-shrink-0 space-y-6">

                {{-- Search --}}
                <form method="GET" action="{{ route('berita') }}" class="flex items-center bg-white border border-gray-200 rounded-xl px-3 py-2 gap-2 shadow-sm">
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search }}"
                           placeholder="Cari Berita"
                           class="flex-1 text-sm text-gray-700 bg-transparent outline-none placeholder-gray-400">
                    @if($kategori)
                        <input type="hidden" name="kategori" value="{{ $kategori }}">
                    @endif
                </form>

                {{-- Katalog Filter --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-3">Katalog</h3>
                    <form method="GET" action="{{ route('berita') }}" id="berita-filter-form">
                        @if($search)
                            <input type="hidden" name="search" value="{{ $search }}">
                        @endif
                        <select name="kategori"
                                onchange="document.getElementById('berita-filter-form').submit()"
                                class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#8B0000]/20 cursor-pointer">
                            <option value="">Pilih Katalog</option>
                            @foreach($kategoriList as $kat)
                                <option value="{{ $kat }}" {{ $kategori === $kat ? 'selected' : '' }}>{{ $kat }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>

                {{-- Berita Terkini --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                    <h3 class="text-sm font-bold text-gray-900 mb-3">Berita Terkini</h3>
                    <div class="space-y-3">
                        @foreach($terkini as $t)
                            <a href="{{ route('news.show', $t->slug) }}"
                               class="block text-sm text-gray-700 hover:text-[#8B0000] leading-snug transition-colors py-1 border-b border-gray-50 last:border-0">
                                {{ $t->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>{{-- /sidebar --}}

        </div>{{-- /2-col --}}

    </div>
</section>

@endsection
