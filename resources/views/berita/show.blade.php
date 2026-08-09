@extends('layouts.app')

@section('title', $article->title . ' – Satu Data Telkom University')
@section('meta_description', $article->excerpt)

@section('content')

<section class="bg-white pt-10 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm mb-6" aria-label="Breadcrumb">
            <a href="{{ route('berita') }}" class="text-[#8B0000] hover:underline font-medium">Berita</a>
            <span class="text-gray-400">›</span>
            <span class="text-gray-500 line-clamp-1">{{ $article->title }}</span>
        </nav>

        {{-- 2-column layout --}}
        <div class="flex flex-col lg:flex-row gap-8 items-start">

            {{-- ─── KIRI: Konten Artikel ─── --}}
            <div class="flex-1 min-w-0">

                <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">

                    {{-- Judul --}}
                    <div class="px-8 pt-8 pb-4">
                        <h1 class="text-xl font-extrabold text-gray-900 leading-snug">
                            {{ $article->title }}
                        </h1>
                    </div>

                    {{-- Hero Image --}}
                    @if($article->thumbnail)
                    <div class="px-8 pb-4">
                        <img src="{{ $article->thumbnail }}"
                             alt="{{ $article->title }}"
                             class="w-full rounded-xl object-cover"
                             style="max-height:380px;">
                    </div>
                    @endif

                    {{-- Meta --}}
                    <div class="px-8 pb-5 flex flex-wrap items-center gap-x-5 gap-y-1 text-gray-400 text-xs border-b border-gray-100">
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

                    {{-- Body Konten --}}
                    <div class="px-8 py-6 text-gray-700 text-sm leading-relaxed prose prose-sm max-w-none
                                prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700">
                        {!! $article->content !!}
                    </div>
                </div>

            </div>{{-- /kiri --}}

            {{-- ─── KANAN: Sidebar Berita Serupa ─── --}}
            <div class="w-full lg:w-64 flex-shrink-0">
                <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-5">
                    <h3 class="text-sm font-bold text-gray-900 mb-4">Berita Serupa</h3>

                    @if($related->count())
                        <div class="space-y-3">
                            @foreach($related as $rel)
                                <a href="{{ route('news.show', $rel->slug) }}"
                                   class="block group">
                                    <p class="text-sm text-gray-700 group-hover:text-[#8B0000] leading-snug transition-colors py-2 border-b border-gray-50 last:border-0">
                                        {{ $rel->title }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-gray-400">Tidak ada berita serupa.</p>
                    @endif
                </div>
            </div>{{-- /sidebar --}}

        </div>{{-- /2-col --}}

    </div>
</section>

@endsection
