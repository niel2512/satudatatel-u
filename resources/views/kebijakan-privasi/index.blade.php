@extends('layouts.app')

@section('title', 'Kebijakan Privasi')
@section('meta_description', 'Pemberitahuan Privasi Satu Data Telkom University — informasi mengenai pengumpulan, penggunaan, dan perlindungan data pribadi Anda.')

@section('content')

{{-- ── Halaman Kebijakan Privasi ── --}}
<section class="bg-gray-50 pt-16 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-extrabold text-[#8B0000] tracking-tight mb-6">
            Pemberitahuan Privasi
        </h1>
        <div class="bg-white rounded-2xl shadow-sm px-8 py-10 md:px-14 md:py-14 space-y-12 text-gray-700 text-sm leading-relaxed">

            {{-- 1. Pendahuluan --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Pendahuluan</h2>
                <p class="mb-4">
                    Kami menggunakan Pemberitahuan Privasi ini untuk mengungkapkan praktik privasi pada Telkom University (Tel-U) sesuai dengan peraturan berlaku, yaitu Undang-Undang Nomor 19 Tahun 2019 tentang Informasi dan Transaksi Elektronik, dan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. Kami bertujuan untuk membantu Anda dalam memahami Data Pribadi apa yang Kami kumpulkan, bagaimana Kami menggunakannya, dan kontrol apa yang Anda miliki atas hal tersebut. Pemberitahuan ini berlaku untuk data yang dikumpulkan dari <a href="https://www.telkomuniversity.ac.id" class="text-[#8B0000] underline" target="_blank">www.telkomuniversity.ac.id</a> dan seluruh subdomainnya. Pemberitahuan ini akan memperbarui hal-hal berikut:
                </p>
                <ul class="list-disc list-inside space-y-2 pl-2 text-gray-600">
                    <li>Jenis Data Pribadi yang dikumpulkan, digunakan, dilindungi, dikirim, dan disimpan</li>
                    <li>Tujuan penggunaan yang diberikan oleh pengguna (nama, kumpulan, foto, dan lainnya)</li>
                    <li>Hak atas pilihan Anda terkait Data Pribadi Anda</li>
                    <li>Langkah-langkah yang dapat Anda ambil untuk melindungi diri dari masalah seperti kerahasiaan pada Data Anda atau meminta penghapusan Data Pribadi Anda</li>
                </ul>
                <p class="mt-4">
                    Harap baca Pemberitahuan Privasi berikut untuk memahami pemberitahuan, kebijakan, dan hak Anda terkait dengan Data Pribadi Anda.
                </p>
            </div>

            <hr class="border-gray-100">

            {{-- 2. Tentang Kami --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Tentang Kami</h2>
                <p class="mb-4">
                    Telkom University (Tel-U) adalah perguruan tinggi swasta berbadan hukum yang berada di Kota Bandung, Republik Indonesia. Misi Tel-U adalah menjadi perguruan tinggi yang terkenal, berkembang, dan bertanggung jawab dalam meningkatkan kualitas sumber daya manusia dan teknologi informasi, dan Anda diminta untuk mencapai ini melalui pengelolaan dan penggunaan Data Pribadi Anda.
                </p>
                <p class="mb-4">
                    Untuk tujuan pemberitahuan ini, Kami bertindak sebagai "Pengendali Data". Kami berperan sebagai pihak yang ikut menentukan bagaimana Data Pribadi Anda digunakan dan diproses.
                </p>
                <p>
                    Kami juga menyuruh Penjaga Pengendali Informasi dan Dokumen (PIB) untuk membantu dengan pengelolaan, pemantauan, dan keyakinan terkait Pemberitahuan Privasi dan Data Pribadi Anda. Untuk detail terkait bagaimana menghubungi Kontak di sini, lihat bagian "Informasi Kontak" di bawah.
                </p>
            </div>

            <hr class="border-gray-100">

            {{-- 3. Data Yang Dikumpulkan --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Data Yang Dikumpulkan</h2>
                <p class="mb-5">
                    Kami memiliki beberapa data yang Anda berikan secara sukarela melalui email, telepon, formulir, pesan singkat, pendaftaran pengguna, dan survei. Kami mengumpulkan jenis data sebagai berikut:
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h3 class="font-bold text-gray-800 text-sm mb-3">Data Identitas</h3>
                        <ul class="space-y-1.5 text-gray-500 text-xs">
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Nama Lengkap</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>NIK (Nomor Induk Kependudukan)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>NIM/NIP (Nomor Induk Pegawai)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Tanggal Lahir</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Jenis Kelamin</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Agama</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Status Perkawinan</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h3 class="font-bold text-gray-800 text-sm mb-3">Data Akademik</h3>
                        <ul class="space-y-1.5 text-gray-500 text-xs">
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>NIM (Nomor Induk Mahasiswa)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>NIDN (Nomor Induk Dosen Nasional)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>NUPTK (Nomor Unik Pendidik dan Tenaga Kependidikan)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Program Studi</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Fakultas</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Indeks Prestasi (Akademik)</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Transkrip Akademik</li>
                        </ul>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <h3 class="font-bold text-gray-800 text-sm mb-3">Data Kontak</h3>
                        <ul class="space-y-1.5 text-gray-500 text-xs">
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Alamat</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Nomor Telepon / Email</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Nomor HP</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Nomor Telepon Darurat</li>
                            <li class="flex items-start gap-1.5"><span class="mt-1 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>Detail Kontak Darurat</li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100">

            {{-- 4. Bagaimana Kami Menggunakan Data --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Bagaimana Kami Menggunakan Data Anda</h2>
                <p class="mb-4">Data Pribadi Anda dapat digunakan untuk tujuan berikut:</p>
                <ul class="space-y-2 text-gray-600">
                    @foreach([
                        'Memberikan konten dan pengalaman pengguna',
                        'Memproses identitas Anda saat Anda menggunakan atau berinteraksi di www.telkomuniversity.ac.id',
                        'Pengiriman dan administrasi email',
                        'Melakukan polling dan survei',
                        'Penelitian dan pengembangan layanan',
                        'Kepatuhan administratif dan hukum',
                        'Audit internal',
                        'Proses rekrutmen',
                        'Pemantauan kepatuhan yang dilaksanakan dalam setiap peraturan dan perundang-undangan',
                        'Pemrosesan kebutuhan untuk keperluan layanan pendidikan, penelitian, dan pengabdian masyarakat',
                        'Memastikan keamanan seluruh platform dan pengguna',
                        'Memberikan informasi kepada pengguna tentang pelayanan yang tersedia',
                        'Menanggapi permintaan dan komentar Anda',
                    ] as $item)
                        <li class="flex items-start gap-2">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <hr class="border-gray-100">

            {{-- 5. Dasar Hukum Pemrosesan --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Dasar Hukum Pemrosesan</h2>
                <p class="mb-4">Kami memproses Data Pribadi untuk satu atau beberapa alasan berikut:</p>
                <div class="space-y-4">
                    @foreach([
                        ['Tujuan keberatan yang sah', 'Kami Memproses Data Pribadi untuk tujuan keberatan yang sah seperti mencegah kecurangan, memastikan keamanan fisik dan jaringan pada sistem, dan pengelolaan serta pemantauan informasi.'],
                        ['Kepentingan umum', 'Memproses yang dilakukan oleh lembaga untuk kepentingan yang berlaku dengan pelaksanaan tugas dan tanggung jawab.'],
                        ['Kewajiban legal', 'Pemrosesan yang dilakukan karena lembaga memiliki kewajiban hukum, penelitian, audit internal, dan pengelolaan kepegawaian.'],
                        ['Kontrak', 'Pemrosesan yang dilakukan berdasarkan kontrak seperti kontrak pegawai, kontrak peneliti, dan sebagainya.'],
                        ['Persetujuan', 'Pemrosesan yang dilakukan atas persetujuan Anda berdasarkan tujuan pemrosesan yang diberikan, seperti persetujuan untuk tujuan informasi.'],
                    ] as [$title, $desc])
                        <div class="flex items-start gap-3 bg-gray-50 rounded-xl px-4 py-3">
                            <span class="mt-0.5 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>
                            <p><span class="font-semibold text-gray-800">{{ $title }}:</span> {{ $desc }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr class="border-gray-100">

            {{-- 6. Bagaimana Kami Melindungi Data --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Bagaimana Kami Melindungi Data Anda</h2>
                <ul class="space-y-2 text-gray-600">
                    @foreach([
                        'Menggunakan enkripsi dan protokol keamanan (baik saat dalam jaringan (daring) maupun luar jaringan (luring)).',
                        'Kami telah menerapkan pengamanan yang tepat untuk mencegah Data Pribadi hilang, disalahgunakan, diakses, diubah, atau diungkapkan oleh pihak yang tidak berwenang.',
                        'Kami membatasi akses ke Data Pribadi Anda dan memastikan kerahasiaan untuk semua staf Tel-U.',
                        'Data Anda dapat disimpan oleh penyedia layanan yang Kami percaya yang memiliki ikatan privasi yang kuat sesuai dengan perjanjian kerahasiaan ke Telkom University.',
                        'Kami menjaga keamanan data personalia selama lembaga menjamin perlindungan yang sesuai untuk data privasi yang sedang diperlukan.',
                        'Setiap pegawai secara teratur menerima pelatihan tentang keamanan informasi dan menjelajahi pedoman tentang penggunaan data ini.',
                    ] as $item)
                        <li class="flex items-start gap-2">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <hr class="border-gray-100">

            {{-- 7. Hak Anda --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Hak Anda Terkait Data Pribadi Anda</h2>
                <p class="mb-4">Dalam kasus tertentu, Anda memiliki hak untuk hal-hal berikut:</p>
                <ul class="space-y-2 text-gray-600">
                    @foreach([
                        'Mendapat semua informasi yang Kami miliki tentang Anda, jika ada.',
                        'Mendapatkan salinan semua informasi Data Pribadi yang Kami miliki tentang Anda.',
                        'Meminta Kami menggunakan Data Pribadi yang tidak akurat yang ada bagi Kami untuk terus memprosesnya.',
                        'Meminta penghapusan Data Pribadi.',
                        'Meminta transfer Data Pribadi Anda.',
                        'Meminta untuk menerima pemberitahuan dari kontrak dengan Kami secara saat ini.',
                        'Mengajukan keluhan dengan semua orang yang ada tentang data yang Kami miliki tentang Anda.',
                        'Menyatakan ketidaksetujuan atau keberatan atas cara Kami memproses data tentang Anda.',
                    ] as $item)
                        <li class="flex items-start gap-2">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#8B0000] flex-shrink-0"></span>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <p class="mt-4 text-gray-500">
                    Untuk melakukan hak-hak ini, silakan hubungi Kami melalui email, surat, atau informasi telepon yang disebutkan di bagian "Informasi Kontak".
                </p>
            </div>

            <hr class="border-gray-100">

            {{-- 8. Informasi Kontak --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Informasi Kontak</h2>
                <p class="mb-5">
                    Untuk pertanyaan, masalah, atau permintaan untuk menggunakan Hak Anda yang dijelaskan dalam Pemberitahuan Privasi ini, silakan hubungi Kami melalui:
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-[#8B0000]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Email</p>
                            <a href="mailto:info@telkomuniversity.ac.id" class="text-[#8B0000] hover:underline text-sm font-medium">info@telkomuniversity.ac.id</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-[#8B0000]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 6z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Telepon</p>
                            <p class="text-sm font-medium text-gray-800">(022) 7566456</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-[#8B0000]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 mb-0.5">Alamat</p>
                            <p class="text-sm font-medium text-gray-800">Gedung Bangkit Telkom University Jl. Telekomunikasi No. 1, Terusan Buah Batu, Bandung, Jawa Barat 40257, Indonesia </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100">

            {{-- 9. Perubahan --}}
            <div>
                <h2 class="text-lg font-extrabold text-gray-900 mb-4 uppercase tracking-wide">Perubahan Pemberitahuan Privasi</h2>
                <p>
                    Pemberitahuan Privasi ini terakhir diperbarui pada Maret 2026. Setiap perubahan pada Pemberitahuan Privasi ini dapat ditemukan di situs web Kami.
                </p>
            </div>

            {{-- Tanda Tangan --}}
            <div class="pt-6 text-center border-t border-gray-100">
                <p class="text-gray-400 text-xs pb-20">Ditetapkan di Bandung pada tanggal:</p>
                <p class="pt-8 pb-8 font-extrabold text-gray-900 text-sm tracking-widest uppercase">Telkom University <br> Rektor</p>
            </div>

        </div>
    </div>
</section>

@endsection
