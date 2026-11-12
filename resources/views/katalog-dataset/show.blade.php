@extends('layouts.app')

@section('title', $dataset->title . ' – Satu Data Telkom University')
@section('meta_description', $dataset->description)

@section('content')

<section class="bg-white pt-12 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Breadcrumb ── --}}
        <nav class="flex items-center gap-2 text-sm mb-6" aria-label="Breadcrumb">
            <a href="{{ route('katalog-dataset') }}" class="text-[#8B0000] hover:underline font-medium">Dataset</a>
            <span class="text-gray-400">›</span>
            <span class="text-gray-500 truncate max-w-xs md:max-w-none">{{ $dataset->title }}</span>
        </nav>

        {{-- ── Judul & Deskripsi ── --}}
        <h1 class="text-2xl font-extrabold text-gray-900 mb-3 leading-snug">
            {{ $dataset->title }}
        </h1>
        <p class="text-gray-500 text-sm leading-relaxed mb-10 max-w-3xl whitespace-pre-line">
            {{ $dataset->description_detail ?? $dataset->description }}
        </p>

        {{-- ── Meta Info Card ── --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-400 mb-1">Direktorat</p>
                <p class="text-sm font-semibold text-gray-800">{{ $dataset->directorate?->name ?? '-' }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-400 mb-1">Data Owner</p>
                <p class="text-sm font-semibold text-gray-800">{{ $dataset->dataOwner?->name ?? '-' }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-400 mb-1">Format</p>
                <p class="text-sm font-semibold text-gray-800">{{ $dataset->data_format ?? '-' }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                <p class="text-xs text-gray-400 mb-1">Ukuran</p>
                <p class="text-sm font-semibold text-gray-800">{{ $dataset->file_size ?? '-' }}</p>
            </div>
        </div>

        {{-- ── Tombol Unduh ── --}}
        @if($dataset->file_path)
            <div class="mb-10">
                <a href="{{ route('dataset.download', $dataset->slug) }}"
                   class="inline-flex items-center gap-2 bg-[#8B0000] hover:bg-[#6B0000] text-white text-sm font-semibold px-5 py-3 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V3.75m0 12.75 4.5-4.5M12 16.5l-4.5-4.5M3.75 18.75v.75a2.25 2.25 0 0 0 2.25 2.25h12a2.25 2.25 0 0 0 2.25-2.25v-.75"/>
                    </svg>
                    Unduh Dataset
                </a>
            </div>
        @elseif($dataset->download_url)
            <div class="mb-10">
                <a href="{{ $dataset->download_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 bg-[#8B0000] hover:bg-[#6B0000] text-white text-sm font-semibold px-5 py-3 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V3.75m0 12.75 4.5-4.5M12 16.5l-4.5-4.5M3.75 18.75v.75a2.25 2.25 0 0 0 2.25 2.25h12a2.25 2.25 0 0 0 2.25-2.25v-.75"/>
                    </svg>
                    Unduh Dataset
                </a>
            </div>
        @endif

        {{-- ── Preview Dataset ── --}}
        <div class="flex items-center justify-between mb-4 flex-wrap gap-3">
            <h2 class="text-base font-bold text-gray-900">Preview Dataset</h2>
            @if(count($previewRows) > 0)
                <span class="text-xs text-gray-400">Menampilkan {{ count($previewRows) }} baris pertama dari dataset</span>
            @else
                <span class="text-xs text-gray-400">Menampilkan data sampel dari dataset ini</span>
            @endif
        </div>

        {{-- ── Tabel Preview ── --}}
        @if(count($previewHeaders) > 0 && count($previewRows) > 0)
            <div class="border border-gray-200 rounded-xl overflow-x-auto mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-5 py-3 text-left font-semibold text-gray-700 whitespace-nowrap w-12">No.</th>
                            @foreach($previewHeaders as $header)
                                <th class="px-5 py-3 text-left font-semibold text-gray-700 whitespace-nowrap">
                                    {{ $header ?? '-' }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($previewRows as $index => $row)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-5 py-4 text-gray-500 font-medium">{{ $index + 1 }}</td>
                                @foreach($row as $cell)
                                    <td class="px-5 py-4 text-gray-700">{{ $cell ?? '' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="text-xs text-gray-400 text-center mb-10">
                * Preview menampilkan maksimal 5 baris pertama. Unduh dataset untuk data lengkap.
            </p>
        @else
            <div class="border border-gray-200 rounded-xl p-10 text-center mb-10">
                <svg class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                </svg>
                <p class="text-sm text-gray-400">Belum ada file dataset yang diupload untuk preview.</p>
                <p class="text-xs text-gray-300 mt-1">Hubungi Data Owner untuk informasi lebih lanjut.</p>
            </div>
        @endif


        {{-- ── Log Perubahan ── --}}
        <div class="mb-6">
            <h2 class="text-base font-bold text-gray-900 mb-4">Log Perubahan</h2>
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-5 py-3 text-left font-semibold text-gray-700">Tanggal</th>
                            <th class="px-5 py-3 text-left font-semibold text-gray-700">Versi</th>
                            <th class="px-5 py-3 text-left font-semibold text-gray-700">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-4 text-gray-600">{{ $dataset->last_updated_at?->format('d M Y') ?? now()->format('d M Y') }}</td>
                            <td class="px-5 py-4 text-gray-600">v1.0</td>
                            <td class="px-5 py-4 text-gray-700">Rilis pertama dataset</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── Kontak Data Owner ── --}}
        @if($dataset->dataOwner)
        <div class="bg-[#F8F9FA] rounded-xl p-6 border border-gray-100">
            <h3 class="text-sm font-bold text-gray-900 mb-3">Hubungi Data Owner</h3>
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-[#8B0000]/10 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-[#8B0000]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-900">{{ $dataset->dataOwner->name }}</p>
                    <p class="text-xs text-gray-500">{{ $dataset->dataOwner->position ?? 'Penanggung Jawab Data' }}</p>
                    @if($dataset->dataOwner->email)
                        <a href="mailto:{{ $dataset->dataOwner->email }}" class="text-xs text-[#8B0000] hover:underline mt-1 block">
                            {{ $dataset->dataOwner->email }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @endif

    </div>
</section>

@endsection
