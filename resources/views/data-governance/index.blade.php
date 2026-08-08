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

        {{-- 3-column Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Card 1: Data Collection --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="font-bold text-gray-900 text-md">Data Collection</h2>
                </div>
                <div class="px-6 py-5">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Proses pengumpulan data di Telkom University dilakukan secara sistematis melalui berbagai sumber resmi, termasuk sistem informasi akademik, administrasi kepegawaian, dan portal layanan mahasiswa. Setiap data yang dikumpulkan harus memenuhi standar kelengkapan dan akurasi yang ditetapkan oleh kebijakan data universitas untuk memastikan integritas informasi dari awal siklus hidupnya. Pengumpulan data dilakukan dengan memperhatikan aspek keamanan dan privasi sesuai dengan peraturan perundang-undangan yang berlaku di Indonesia.
                    </p>
                </div>
            </div>

            {{-- Card 2: Data Storage and Organization --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="font-bold text-gray-900 text-md">Data Storage and Organization</h2>
                </div>
                <div class="px-6 py-5">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Penyimpanan dan pengorganisasian data di Telkom University menggunakan infrastruktur teknologi yang aman dan terstandarisasi. Data dikelompokkan berdasarkan kategori dan tingkat sensitivitas, kemudian disimpan dalam repositori terpusat yang dikelola oleh Pusat Teknologi Informasi. Sistem penyimpanan dirancang untuk memastikan ketersediaan data yang tinggi, kemudahan akses oleh pihak yang berwenang, serta ketahanan terhadap kehilangan atau kerusakan data dengan menerapkan mekanisme backup dan pemulihan yang andal.
                    </p>
                </div>
            </div>

            {{-- Card 3: Data Processing and Analysis --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="font-bold text-gray-900 text-md">Data Processing and Analysis</h2>
                </div>
                <div class="px-6 py-5">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pemrosesan dan analisis data dilakukan untuk menghasilkan wawasan yang mendukung pengambilan keputusan strategis di Telkom University. Proses ini melibatkan transformasi data mentah menjadi informasi yang bermakna melalui serangkaian prosedur standar yang telah ditetapkan. Setiap aktivitas pemrosesan data harus terdokumentasi dengan baik dan dilakukan oleh personel yang berwenang, serta mengikuti prosedur yang telah ditetapkan untuk menjaga kualitas dan konsistensi hasil analisis yang digunakan dalam pelaporan dan evaluasi kinerja institusi.
                    </p>
                </div>
            </div>

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

        {{-- 2×2 Grid Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @php
            $cards = [
                [
                    'title' => 'Student Performance Analysis',
                    'desc'  => 'Analisis kinerja mahasiswa memanfaatkan data akademik secara komprehensif untuk mengidentifikasi tren, pola belajar, dan faktor-faktor yang memengaruhi keberhasilan studi. Hasil analisis ini digunakan untuk merancang program intervensi yang tepat sasaran, memberikan bimbingan akademik yang lebih personal, serta mendukung kebijakan peningkatan mutu pembelajaran di seluruh program studi Telkom University secara berkelanjutan dan berbasis bukti.',
                ],
                [
                    'title' => 'Research and Innovation Insights',
                    'desc'  => 'Data riset dan inovasi dimanfaatkan untuk memetakan kapasitas penelitian institusi, mengidentifikasi peluang kolaborasi strategis, dan mengukur dampak penelitian terhadap perkembangan ilmu pengetahuan maupun kebutuhan industri. Informasi ini mendukung perencanaan roadmap riset universitas serta pengelolaan sumber daya penelitian secara efisien dan efektif demi meningkatkan daya saing Telkom University di tingkat nasional dan internasional.',
                ],
                [
                    'title' => 'Resource Optimization',
                    'desc'  => 'Pemanfaatan data operasional memungkinkan Telkom University mengoptimalkan penggunaan sumber daya institusi, mulai dari fasilitas fisik, anggaran, hingga sumber daya manusia. Analisis berbasis data membantu mengidentifikasi inefisiensi, merencanakan kebutuhan masa depan, dan mengalokasikan sumber daya secara lebih strategis sehingga operasional universitas berjalan lebih efisien dan mendukung pencapaian target kinerja yang telah ditetapkan.',
                ],
                [
                    'title' => 'Community Engagement Analytics',
                    'desc'  => 'Data pengabdian masyarakat dan keterlibatan komunitas dianalisis untuk mengukur dampak sosial program-program yang dijalankan Telkom University. Wawasan yang dihasilkan membantu perancangan program pengabdian yang lebih relevan, pengukuran kontribusi institusi terhadap pembangunan masyarakat, serta pelaporan kinerja pengabdian kepada pemangku kepentingan secara transparan dan akuntabel sesuai dengan misi Telkom University.',
                ],
            ];
            @endphp

            @foreach($cards as $card)
                <div class="rounded-xl shadow-sm border border-gray-200 px-6 pt-6 pb-6" style="background-color:#EEF3FF;">
                    <h3 class="font-bold text-gray-900 text-md mb-6">{{ $card['title'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $card['desc'] }}</p>
                </div>
            @endforeach

        </div>{{-- /2x2 grid --}}

    </div>
</section>

@endsection
