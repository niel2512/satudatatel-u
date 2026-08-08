@extends('layouts.app')

@section('title', 'Dataset – Satu Data Telkom University')
@section('meta_description', 'Portal transparansi dan aksesibilitas data institusional Telkom University. Temukan, unduh, dan manfaatkan dataset publik untuk riset, analisis, dan inovasi pendidikan.')

@section('content')

{{-- ═══════════════ HERO / SEARCH SECTION ═══════════════ --}}
<section class="bg-[#F8F9FA] pt-20 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <h1 class="text-3xl font-extrabold text-[#8B0000] uppercase tracking-tight mb-3">
            Dataset
        </h1>
        <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto mb-8 leading-relaxed">
            Portal transparansi dan aksesibilitas data institusional Telkom University.
            Temukan, unduh, dan manfaatkan dataset publik untuk riset, analisis, dan inovasi pendidikan.
        </p>

        {{-- Search bar --}}
        <form method="GET" action="{{ route('katalog-dataset') }}" class="flex items-center gap-2 max-w-2xl mx-auto mb-6">
            <div class="flex flex-1 items-center bg-white border border-gray-200 rounded-full px-4 py-2.5 shadow-sm gap-2">
                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Cari berdasarkan nama dataset, pemilik, atau topik..."
                    class="flex-1 text-sm text-gray-700 bg-transparent outline-none placeholder-gray-400"
                >
                @if($dirFilter)
                    <input type="hidden" name="direktorat" value="{{ $dirFilter }}">
                @endif
            </div>
            <button type="submit"
                    class="flex-shrink-0 bg-[#8B0000] hover:bg-[#6B0000] text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-colors duration-200">
                Cari Dataset
            </button>
        </form>

        {{-- Topik Populer --}}
        <div class="flex flex-wrap items-center justify-center gap-2">
            <span class="text-gray-700 text-sm font-medium mr-1">Topik Populer:</span>
            @foreach(['Data Penerimaan Mahasiswa Baru 2024','Data Publikasi Ilmiah','Data Alumni','Kalender Akademik'] as $topik)
                <a href="{{ route('katalog-dataset', ['search' => $topik]) }}"
                   class="inline-block border border-gray-300 bg-white text-gray-700 text-xs font-medium px-4 py-1.5 rounded-full hover:border-[#8B0000] hover:text-[#8B0000] transition-colors duration-150">
                    {{ $topik }}
                </a>
            @endforeach
        </div>

    </div>
</section>

{{-- ═══════════════ KATALOG SECTION ═══════════════ --}}
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Toolbar: label + filter direktorat --}}
        <div class="flex items-center justify-between mb-6 flex-wrap gap-3">
            <h2 class="text-base font-semibold text-gray-800">
                Katalog Dataset
                @if($total > 0)
                    <span class="ml-2 text-gray-400 font-normal text-sm">({{ $total }} dataset)</span>
                @endif
            </h2>

            <form method="GET" action="{{ route('katalog-dataset') }}" id="filter-form">
                @if($search)
                    <input type="hidden" name="search" value="{{ $search }}">
                @endif
                <select name="direktorat" onchange="document.getElementById('filter-form').submit()"
                        class="text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#8B0000]/30 cursor-pointer">
                    <option value="">Pilih Direktorat</option>
                    @foreach($direktorats as $dir)
                        <option value="{{ $dir }}" {{ $dirFilter === $dir ? 'selected' : '' }}>{{ $dir }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        {{-- Dataset list --}}
        <div class="border border-gray-200 rounded-2xl overflow-hidden divide-y divide-gray-100">

            @forelse($datasets as $ds)
                <div class="px-6 py-6">
                    <div class="flex items-start justify-between gap-4">
                        {{-- Kiri: info --}}
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base font-bold text-gray-900 mb-2 leading-snug">
                                <a href="{{ route('dataset.show', $ds['slug']) }}" class="hover:text-[#8B0000] transition-colors">
                                    {{ $ds['title'] }}
                                </a>
                            </h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-3">
                                {{ $ds['desc'] }}
                            </p>
                            {{-- Meta --}}
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-gray-400 text-xs mb-4">
                                {{-- Owner --}}
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                    </svg>
                                    {{ $ds['owner'] }}
                                </span>
                                {{-- Direktorat --}}
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                    </svg>
                                    {{ $ds['direktorat'] }}
                                </span>
                                {{-- Tanggal --}}
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                                    </svg>
                                    {{ $ds['date'] }}
                                </span>
                            </div>
                            {{-- Download link --}}
                            <a href="{{ route('dataset.show', $ds['slug']) }}" class="text-[#8B0000] text-sm font-semibold hover:underline">
                                Download Dataset
                            </a>
                        </div>

                        {{-- Kanan: size badge --}}
                        <span class="flex-shrink-0 bg-gray-200 text-gray-600 text-xs font-semibold px-3 py-1.5 rounded-full whitespace-nowrap mt-0.5">
                            {{ $ds['size'] }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="px-6 py-16 text-center text-gray-400 text-sm">
                    Tidak ada dataset yang sesuai dengan pencarian Anda.
                </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        @if($totalPages > 1)
            <div class="mt-8 flex items-center justify-center gap-1">
                {{-- Prev --}}
                @if($page > 1)
                    <a href="{{ route('katalog-dataset', array_merge(request()->only('search','direktorat'), ['page' => $page - 1])) }}"
                       class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-200 text-gray-500 hover:border-[#8B0000] hover:text-[#8B0000] text-sm transition-colors">
                        ‹
                    </a>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-100 text-gray-300 text-sm cursor-not-allowed">‹</span>
                @endif

                {{-- Page numbers --}}
                @for($i = 1; $i <= $totalPages; $i++)
                    <a href="{{ route('katalog-dataset', array_merge(request()->only('search','direktorat'), ['page' => $i])) }}"
                       class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-medium transition-colors
                              {{ $i === $page
                                    ? 'bg-white border border-[#8B0000] text-[#8B0000]'
                                    : 'border border-gray-200 text-gray-600 hover:border-[#8B0000] hover:text-[#8B0000]' }}">
                        {{ $i }}
                    </a>
                @endfor

                {{-- Next --}}
                @if($page < $totalPages)
                    <a href="{{ route('katalog-dataset', array_merge(request()->only('search','direktorat'), ['page' => $page + 1])) }}"
                       class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-200 text-gray-500 hover:border-[#8B0000] hover:text-[#8B0000] text-sm transition-colors">
                        ›
                    </a>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-100 text-gray-300 text-sm cursor-not-allowed">›</span>
                @endif
            </div>
        @endif

    </div>
</section>

@endsection
