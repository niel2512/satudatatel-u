@extends('layouts.app')

@section('title', $query ? 'Hasil Pencarian: ' . $query . ' – Satu Data Telkom University' : 'Cari – Satu Data Telkom University')
@section('meta_description', 'Hasil pencarian untuk "' . $query . '" di Satu Data Telkom University.')

@section('content')

<section class="bg-[#F8F9FA] pt-16 pb-20 min-h-[60vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Search Header ── --}}
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-gray-900 mb-1">
                @if($query)
                    Hasil Pencarian untuk <span class="text-[#8B0000]">"{{ $query }}"</span>
                @else
                    Cari di Satu Data Telkom University
                @endif
            </h1>
            @if($query)
                <p class="text-gray-500 text-sm">Ditemukan {{ $total }} hasil pencarian</p>
            @endif
        </div>

        {{-- ── Repeated Search Bar ── --}}
        <form method="GET" action="{{ route('search') }}" class="flex items-center gap-2 max-w-2xl mb-10">
            <div class="flex flex-1 items-center bg-white border border-gray-200 rounded-full px-4 py-2.5 shadow-sm gap-2">
                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                <input type="text" name="q" value="{{ $query }}"
                       placeholder="Cari berita, dataset, atau topik..."
                       autofocus
                       class="flex-1 text-sm text-gray-700 bg-transparent outline-none placeholder-gray-400">
            </div>
            <button type="submit"
                    class="flex-shrink-0 bg-[#8B0000] hover:bg-[#6B0000] text-white text-sm font-semibold px-6 py-2.5 rounded-full transition-colors duration-200">
                Cari
            </button>
        </form>

        @if($query)

            {{-- ═══ BERITA ═══ --}}
            @if($results['berita']->count())
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="text-base font-bold text-gray-900">Berita</h2>
                        <span class="text-xs font-medium bg-[#8B0000]/10 text-[#8B0000] px-2.5 py-0.5 rounded-full">
                            {{ $results['berita']->count() }} hasil
                        </span>
                    </div>
                    <div class="space-y-3">
                        @foreach($results['berita'] as $article)
                            <a href="{{ route('news.show', $article->slug) }}"
                               class="group flex gap-0 bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                                <div class="w-36 flex-shrink-0 overflow-hidden hidden sm:block">
                                    <img src="{{ $article->thumbnail ?? '/images/campus.png' }}" alt="{{ $article->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                         style="min-height:100px;">
                                </div>
                                <div class="flex flex-col justify-center px-5 py-4 flex-1 min-w-0">
                                    <span class="text-xs font-medium text-[#8B0000] mb-1">{{ $article->category?->name ?? '-' }}</span>
                                    <h3 class="text-sm font-bold text-gray-900 mb-1 leading-snug group-hover:text-[#8B0000] transition-colors line-clamp-2">
                                        {{ $article->title }}
                                    </h3>
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-2">{{ $article->excerpt }}</p>
                                    <div class="flex items-center gap-3 text-gray-400 text-xs">
                                        <span>{{ $article->published_at?->format('d M Y') }}</span>
                                        <span>{{ $article->author }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <a href="{{ route('berita', ['search' => $query]) }}"
                           class="inline-flex items-center gap-1 text-sm text-[#8B0000] font-medium hover:underline mt-1">
                            Lihat semua hasil di Berita
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

            {{-- ═══ DATASET ═══ --}}
            @if($results['dataset']->count())
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="text-base font-bold text-gray-900">Dataset</h2>
                        <span class="text-xs font-medium bg-[#8B0000]/10 text-[#8B0000] px-2.5 py-0.5 rounded-full">
                            {{ $results['dataset']->count() }} hasil
                        </span>
                    </div>
                    <div class="border border-gray-200 rounded-xl overflow-hidden divide-y divide-gray-100">
                        @foreach($results['dataset'] as $ds)
                            <a href="{{ route('dataset.show', $ds->slug) }}"
                               class="flex items-start justify-between gap-4 px-5 py-4 bg-white hover:bg-gray-50 transition-colors group">
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-sm font-bold text-gray-900 mb-1 group-hover:text-[#8B0000] transition-colors line-clamp-1">
                                        {{ $ds->title }}
                                    </h3>
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-1">{{ $ds->description }}</p>
                                    <span class="text-xs text-gray-400">{{ $ds->directorate?->name ?? '-' }} · {{ $ds->last_updated_at?->format('d M Y') }}</span>
                                </div>
                                <span class="flex-shrink-0 bg-gray-200 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full whitespace-nowrap">
                                    {{ $ds->file_size ?? '-' }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('katalog-dataset', ['search' => $query]) }}"
                       class="inline-flex items-center gap-1 text-sm text-[#8B0000] font-medium hover:underline mt-3">
                        Lihat semua hasil di Dataset
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                </div>
            @endif

            {{-- Tidak ada hasil --}}
            @if($total === 0)
                <div class="text-center py-16">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                    </svg>
                    <p class="text-gray-500 text-sm mb-1">Tidak ditemukan hasil untuk <strong>"{{ $query }}"</strong></p>
                    <p class="text-gray-400 text-xs">Coba gunakan kata kunci yang berbeda atau lebih umum</p>
                </div>
            @endif

        @else
            <div class="text-center py-16 text-gray-400 text-sm">
                Ketik kata kunci di atas untuk mulai mencari.
            </div>
        @endif

    </div>
</section>

@endsection
