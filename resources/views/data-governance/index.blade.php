@extends('layouts.app')

@section('title', 'Data Governance – Satu Data Telkom University')
@section('meta_description', 'Kebijakan dan tata kelola data Telkom University — meliputi pengumpulan, penyimpanan, pemrosesan, dan pemanfaatan data.')

@section('content')

{{-- ═══════════════════════════════════════════
     SECTION 1 — DATA GOVERNANCE
═══════════════════════════════════════════ --}}
<section class="bg-white pt-16 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Heading --}}
        <h1 class="text-[#8B0000] text-2xl font-extrabold mb-6 tracking-tight">
            DATA GOVERNANCE
        </h1>

        {{-- Deskripsi --}}
        <p class="text-gray-700 text-sm leading-relaxed mb-10">
            Data Governance di Telkom University merupakan kerangka kerja yang mengatur pengelolaan aset data secara menyeluruh untuk memastikan kualitas, keamanan, dan ketersediaan data yang mendukung proses akademik dan operasional institusi. Kebijakan ini mencakup seluruh siklus hidup data mulai dari pengumpulan hingga pemanfaatan, dengan tujuan menciptakan ekosistem data yang terintegrasi, terpercaya, dan dapat diakses oleh seluruh pemangku kepentingan di lingkungan Telkom University sesuai dengan prinsip keterbukaan informasi publik dan kepatuhan terhadap regulasi yang berlaku.
        </p>

        {{-- 3-column Cards — data dari DataGovernanceController --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($governanceCards as $card)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="font-bold text-gray-900 text-md">{{ $card['title'] }}</h2>
                    </div>
                    <div class="px-6 py-5">
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>{{-- /grid 3 kolom --}}

    </div>
</section>

{{-- ═══════════════════════════════════════════
     SECTION 2 — DATA UTILIZATION
     Background: abu-abu dengan pola hexagon
═══════════════════════════════════════════ --}}
<section class="pt-16 pb-20 bg-gray-100 relative overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Heading --}}
        <h1 class="text-[#8B0000] text-center text-2xl font-extrabold mb-6 tracking-tight">
            DATA UTILIZATION
        </h1>

        {{-- 2×2 Grid Cards — data dari DataGovernanceController --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($utilizationCards as $card)
                <div class="rounded-xl shadow-sm border border-gray-200 px-6 pt-6 pb-6" style="background-color:#EEF3FF;">
                    <h3 class="font-bold text-gray-900 text-md mb-6">{{ $card['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>{{-- /2x2 grid --}}

    </div>
</section>

@endsection
