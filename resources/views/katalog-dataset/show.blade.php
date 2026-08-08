@extends('layouts.app')

@section('title', $dataset['title'] . ' – Satu Data Telkom University')
@section('meta_description', $dataset['desc'])

@section('content')

<section class="bg-white pt-12 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Breadcrumb ── --}}
        <nav class="flex items-center gap-2 text-sm mb-6" aria-label="Breadcrumb">
            <a href="{{ route('katalog-dataset') }}" class="text-[#8B0000] hover:underline font-medium">Dataset</a>
            <span class="text-gray-400">›</span>
            <span class="text-gray-500 truncate max-w-xs md:max-w-none">{{ $dataset['title'] }}</span>
        </nav>

        {{-- ── Judul & Deskripsi ── --}}
        <h1 class="text-2xl font-extrabold text-gray-900 mb-3 leading-snug">
            {{ $dataset['title'] }}
        </h1>
        <p class="text-gray-500 text-sm leading-relaxed mb-10 max-w-3xl whitespace-pre-line">{{ $dataset['desc_detail'] }}</p>

        {{-- ── Preview Dataset + Download Button ── --}}
        <div class="flex items-center justify-between mb-4 flex-wrap gap-3">
            <h2 class="text-base font-bold text-gray-900">Preview Dataset</h2>
            <a href="#"
               class="inline-flex items-center gap-2 bg-[#8B0000] hover:bg-[#6B0000] text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors duration-200">
                {{-- Download icon --}}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                </svg>
                Download Dataset
            </a>
        </div>

        {{-- ── Tabel Preview ── --}}
        <div class="border border-gray-200 rounded-xl overflow-hidden mb-6">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        @foreach($dataset['preview_columns'] as $col)
                            <th class="px-5 py-3 text-left font-semibold text-gray-700 whitespace-nowrap first:w-12">
                                {{ $col }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($dataset['preview_rows'] as $row)
                        <tr class="hover:bg-gray-50 transition-colors">
                            @foreach($row as $cell)
                                <td class="px-5 py-4 text-gray-700 first:text-gray-500 first:font-medium">
                                    {{ $cell }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── Pagination Preview (simulasi) ── --}}
        <div class="flex items-center justify-center gap-1 mb-12">
            {{-- Prev --}}
            <span class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-100 text-gray-300 text-sm cursor-not-allowed">‹</span>

            @for($i = 1; $i <= $previewTotalPages; $i++)
                <span class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-medium border
                    {{ $i === $previewPage
                        ? 'border-[#8B0000] text-[#8B0000] bg-white'
                        : 'border-gray-200 text-gray-600' }}">
                    {{ $i }}
                </span>
            @endfor

            {{-- Next --}}
            <span class="w-8 h-8 flex items-center justify-center rounded-full border border-gray-200 text-gray-500 text-sm hover:border-[#8B0000] hover:text-[#8B0000] transition-colors cursor-pointer">›</span>
        </div>

        {{-- ── Detail Change Log ── --}}
        <div>
            <h2 class="text-base font-bold text-gray-900 mb-4">Detail change log</h2>

            <div class="border border-gray-200 rounded-xl divide-y divide-gray-100 overflow-hidden">
                @foreach($dataset['changelog'] as $log)
                    <div class="px-6 py-4">
                        <div class="flex items-start justify-between gap-4 flex-wrap">
                            <div>
                                <p class="text-sm font-bold text-gray-900 mb-1">{{ $log['version'] }}</p>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ $log['note'] }}</p>
                            </div>
                            <span class="flex-shrink-0 text-xs font-medium bg-red-50 text-[#8B0000] px-3 py-1 rounded-full whitespace-nowrap">
                                {{ $log['age'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>

@endsection
