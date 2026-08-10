<?php

namespace Database\Seeders;

use App\Models\DataCategory;
use App\Models\DataOwner;
use App\Models\Dataset;
use App\Models\Directorate;
use App\Models\NewsArticle;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Users ─────────────────────────────────────────────────
        $admin = User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@telkomuniversity.ac.id',
            'role'     => 'administrator',
            'password' => bcrypt('password'),
        ]);

        // ── 2. Directorates ──────────────────────────────────────────
        $directorates = [
            ['name' => 'Direktorat Akademik',                                       'abbreviation' => 'DAK',  'logo' => '/images/logo-telu.png',         'order' => 1],
            ['name' => 'Direktorat Kampus Jakarta',                                 'abbreviation' => 'DKJK', 'logo' => '/images/logo-dir-telujkt.webp', 'order' => 2],
            ['name' => 'Direktorat Kampus Purwokerto',                              'abbreviation' => 'DKPW', 'logo' => '/images/logo-dir-telupwk.png',  'order' => 3],
            ['name' => 'Direktorat Kampus Surabaya',                                'abbreviation' => 'DKSY', 'logo' => '/images/logo-dir-telusby.webp', 'order' => 4],
            ['name' => 'Direktorat Aset & Sustainability',                          'abbreviation' => 'DAS',  'logo' => '/images/logo-telu.png',         'order' => 5],
            ['name' => 'Direktorat Keuangan',                                       'abbreviation' => 'DKU',  'logo' => '/images/logo-dir-kug.png',      'order' => 6],
            ['name' => 'Direktorat Pemasaran & Admisi',                             'abbreviation' => 'DPA',  'logo' => '/images/logo-telu.png',         'order' => 7],
            ['name' => 'Direktorat Bandung Techno Park',                            'abbreviation' => 'DBTP', 'logo' => '/images/logo-dir-btp.png',      'order' => 8],
            ['name' => 'Direktorat Pengelola Dana Abadi',                           'abbreviation' => 'DPDA', 'logo' => '/images/logo-dir-pda.png',      'order' => 9],
            ['name' => 'Direktorat Sumber Daya Manusia',                            'abbreviation' => 'DSDM', 'logo' => '/images/logo-telu.png',         'order' => 10],
            ['name' => 'Direktorat Sekretariat & Perencanaan Strategis',            'abbreviation' => 'DSPS', 'logo' => '/images/logo-telu.png',         'order' => 11],
            ['name' => 'Direktorat Pasca Sarjana & Advance Learning',               'abbreviation' => 'DPSAL','logo' => '/images/logo-telu.png',         'order' => 12],
            ['name' => 'Direktorat Pusat Teknologi Informasi',                      'abbreviation' => 'PuTI', 'logo' => '/images/puti-logo.png',         'order' => 13],
            ['name' => 'Direktorat Kemahasiswaan, Pengembangan Karir, Alumni',      'abbreviation' => 'DKPKA','logo' => '/images/logo-telu.png',         'order' => 14],
            ['name' => 'Direktorat Kerjasama Strategis & Kantor Urusan Internasional','abbreviation' => 'DKSUI','logo' => '/images/logo-telu.png',        'order' => 15],
            ['name' => 'Direktorat Penelitian & Pengabdian Masyarakat',             'abbreviation' => 'DPPM', 'logo' => '/images/logo-telu.png',         'order' => 16],
        ];

        foreach ($directorates as $d) {
            Directorate::create($d);
        }

        // ── 3. Data Owners (sample per direktorat) ───────────────────
        $ownerNames = [
            'Aqila Zahra Qonita', 'Rina Suryani', 'Budi Santoso', 'Dwi Hartanto',
            'Citra Dewi', 'Sekretariat Rektorat', 'Tim Sarana Prasarana', 'Andi Permana',
            'Siti Nurhayati', 'Tim Kerja Sama', 'Olivia Rodrigo', 'Ahmad Fauzi',
            'Dewi Rahmawati', 'Hendra Kusuma', 'Yunita Sari', 'Bambang Purnomo',
        ];

        foreach (Directorate::all() as $idx => $dir) {
            DataOwner::create([
                'directorate_id' => $dir->id,
                'name'           => $ownerNames[$idx] ?? 'Data Owner ' . ($idx + 1),
                'position'       => 'Penanggung Jawab Data',
                'email'          => 'dataowner' . ($idx + 1) . '@telkomuniversity.ac.id',
                'is_active'      => true,
            ]);

            // Buat akun data_owner untuk beberapa direktorat
            if ($idx < 5) {
                User::create([
                    'name'     => $ownerNames[$idx],
                    'email'    => 'owner' . ($idx + 1) . '@telkomuniversity.ac.id',
                    'role'     => 'data_owner',
                    'password' => bcrypt('password'),
                ]);
            }
        }

        // ── 4. Data Categories ───────────────────────────────────────
        $dataCategories = [
            ['name' => 'Penerimaan Mahasiswa',        'slug' => 'penerimaan-mahasiswa'],
            ['name' => 'Akademik & Kurikulum',         'slug' => 'akademik-kurikulum'],
            ['name' => 'Riset & Inovasi',              'slug' => 'riset-inovasi'],
            ['name' => 'Kemahasiswaan & Alumni',       'slug' => 'kemahasiswaan-alumni'],
            ['name' => 'Keuangan & Anggaran',          'slug' => 'keuangan-anggaran'],
            ['name' => 'Sumber Daya Manusia',          'slug' => 'sumber-daya-manusia'],
            ['name' => 'Fasilitas & Infrastruktur',    'slug' => 'fasilitas-infrastruktur'],
            ['name' => 'Kerja Sama Institusi',         'slug' => 'kerja-sama-institusi'],
        ];

        foreach ($dataCategories as $cat) {
            DataCategory::create($cat);
        }

        // ── 5. Datasets ──────────────────────────────────────────────
        $dak  = Directorate::where('abbreviation', 'DAK')->first();
        $dppm = Directorate::where('abbreviation', 'DPPM')->first();
        $dkpka= Directorate::where('abbreviation', 'DKPKA')->first();
        $dsdm = Directorate::where('abbreviation', 'DSDM')->first();
        $puti = Directorate::where('abbreviation', 'PuTI')->first();

        $catPmb     = DataCategory::where('slug', 'penerimaan-mahasiswa')->first();
        $catRiset   = DataCategory::where('slug', 'riset-inovasi')->first();
        $catAlumni  = DataCategory::where('slug', 'kemahasiswaan-alumni')->first();
        $catAkademik= DataCategory::where('slug', 'akademik-kurikulum')->first();
        $catSDM     = DataCategory::where('slug', 'sumber-daya-manusia')->first();
        $catKeuangan= DataCategory::where('slug', 'keuangan-anggaran')->first();
        $catFasilitas= DataCategory::where('slug', 'fasilitas-infrastruktur')->first();
        $catKerjasama= DataCategory::where('slug', 'kerja-sama-institusi')->first();

        $datasets = [
            [
                'title'              => 'Data Penerimaan Mahasiswa Baru Telkom University Tahun 2024',
                'slug'               => 'pmb-2024',
                'description'        => 'Dataset komprehensif berisi statistik pendaftar, peserta ujian, dan mahasiswa yang lolos seleksi penerimaan mahasiswa baru tahun ajaran 2024/2025, diagregasi berdasarkan program studi dan jalur masuk.',
                'description_detail' => "Dataset ini menyajikan statistik komprehensif terkait penerimaan mahasiswa baru di Telkom University pada tahun ajaran 2023-2024.\nData ini mencakup informasi agregat dari berbagai jalur masuk resmi, termasuk Jalur Prestasi Akademik (JPA), Jalur Mandiri, dan Jalur Beasiswa.",
                'directorate_id'     => $dak?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dak?->id)->first()?->id,
                'category_id'        => $catPmb?->id,
                'data_format'        => 'Excel',
                'file_size'          => '2.4 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-11',
            ],
            [
                'title'              => 'Data Rekapitulasi Anggaran Riset Internal Dosen 2023–2025',
                'slug'               => 'anggaran-riset-2023-2025',
                'description'        => 'Rincian Alokasi dan realisasi dana hibah riset internal institusi selama periode 3 tahun terakhir. Data mencakup kategori pendanaan, klaster penelitian, dan luaran yang dijanjikan.',
                'description_detail' => "Data ini menyajikan rekapitulasi lengkap anggaran riset internal dosen Telkom University selama periode 2023–2025.\nMencakup alokasi per klaster penelitian, realisasi anggaran, dan capaian luaran penelitian setiap tahun.",
                'directorate_id'     => $dppm?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dppm?->id)->first()?->id,
                'category_id'        => $catRiset?->id,
                'data_format'        => 'Excel',
                'file_size'          => '3.2 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-12',
            ],
            [
                'title'              => 'Data Pemetaan Distribusi Alumni Berdasarkan Provinsi Bekerja',
                'slug'               => 'alumni-distribusi-2025',
                'description'        => 'Data spasial dan tabular mengenai sebaran lulusan Telkom University di seluruh provinsi Indonesia yang telah memasuki dunia kerja, berdasarkan hasil tracer study tahun 2025.',
                'description_detail' => "Dataset ini menyajikan peta distribusi alumni Telkom University yang bekerja di seluruh provinsi di Indonesia berdasarkan hasil tracer study 2025.\nData dikumpulkan dari 25.000+ alumni yang merespons survei.",
                'directorate_id'     => $dkpka?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dkpka?->id)->first()?->id,
                'category_id'        => $catAlumni?->id,
                'data_format'        => 'CSV',
                'file_size'          => '10 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-14',
            ],
            [
                'title'              => 'Data Kehadiran dan Kinerja Dosen Semester Genap 2024/2025',
                'slug'               => 'kinerja-dosen-genap-2025',
                'description'        => 'Rekap presensi mengajar, nilai evaluasi pembelajaran, dan indeks kepuasan mahasiswa terhadap kinerja dosen di seluruh fakultas pada semester genap 2024/2025.',
                'description_detail' => "Data ini merekap kehadiran dan kinerja seluruh dosen Telkom University pada semester genap 2024/2025.\nMencakup persentase kehadiran mengajar, skor evaluasi pembelajaran, dan hasil survei kepuasan mahasiswa.",
                'directorate_id'     => $dsdm?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dsdm?->id)->first()?->id,
                'category_id'        => $catSDM?->id,
                'data_format'        => 'Excel',
                'file_size'          => '1.8 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-16',
            ],
            [
                'title'              => 'Data Publikasi Ilmiah Sivitas Akademika 2022–2025',
                'slug'               => 'publikasi-ilmiah-2022-2025',
                'description'        => 'Kumpulan metadata publikasi ilmiah (jurnal, prosiding, buku) yang dihasilkan oleh dosen dan mahasiswa Telkom University pada rentang 2022–2025, terindeks Scopus, WoS, dan SINTA.',
                'description_detail' => "Dataset ini berisi metadata lengkap seluruh publikasi ilmiah sivitas akademika Telkom University tahun 2022–2025.\nMencakup artikel jurnal internasional, prosiding konferensi, dan buku ajar yang terindeks di Scopus, Web of Science, dan SINTA.",
                'directorate_id'     => $dppm?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dppm?->id)->first()?->id,
                'category_id'        => $catRiset?->id,
                'data_format'        => 'JSON',
                'file_size'          => '5.6 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-18',
            ],
            [
                'title'              => 'Data Kalender Akademik 2024/2025',
                'slug'               => 'kalender-akademik-2024-2025',
                'description'        => 'Dokumen resmi kalender akademik Telkom University yang mencakup jadwal perkuliahan, ujian tengah semester, ujian akhir semester, libur nasional, dan kegiatan kemahasiswaan.',
                'description_detail' => "Kalender akademik resmi Telkom University untuk tahun ajaran 2024/2025 dalam format data terstruktur.\nMencakup semua tanggal penting akademik, libur nasional, jadwal UTS/UAS, dan kegiatan kemahasiswaan.",
                'directorate_id'     => $dak?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dak?->id)->first()?->id,
                'category_id'        => $catAkademik?->id,
                'data_format'        => 'PDF',
                'file_size'          => '0.5 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-20',
            ],
            [
                'title'              => 'Data Beasiswa dan Bantuan Keuangan Mahasiswa 2024',
                'slug'               => 'beasiswa-2024',
                'description'        => 'Data penerima beasiswa internal dan eksternal, jumlah dana yang disalurkan, dan distribusi berdasarkan program studi serta kategori beasiswa pada tahun akademik 2024.',
                'description_detail' => "Dataset ini menyajikan data lengkap penerima beasiswa dan bantuan keuangan mahasiswa Telkom University tahun akademik 2024.\nMencakup beasiswa internal yayasan, beasiswa pemerintah (KIP-K), beasiswa industri, dan program bantuan keuangan lainnya.",
                'directorate_id'     => $dkpka?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dkpka?->id)->first()?->id,
                'category_id'        => $catKeuangan?->id,
                'data_format'        => 'Excel',
                'file_size'          => '3.7 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-24',
            ],
            [
                'title'              => 'Data Indeks Kepuasan Layanan Akademik Mahasiswa 2025',
                'slug'               => 'kepuasan-layanan-2025',
                'description'        => 'Hasil survei kepuasan mahasiswa terhadap layanan akademik, administrasi, dan infrastruktur kampus yang dilaksanakan pada semester ganjil 2024/2025 dengan 15.000+ responden.',
                'description_detail' => "Data ini merupakan hasil survei kepuasan layanan akademik yang diikuti oleh lebih dari 15.000 mahasiswa aktif Telkom University.\nSurvei dilakukan secara daring pada akhir semester ganjil 2024/2025.",
                'directorate_id'     => $dak?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $dak?->id)->first()?->id,
                'category_id'        => $catAkademik?->id,
                'data_format'        => 'Excel',
                'file_size'          => '1.2 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-26',
            ],
            [
                'title'              => 'Data Kerja Sama Institusi Nasional dan Internasional 2024',
                'slug'               => 'kerjasama-institusi-2024',
                'description'        => 'Daftar perjanjian kerja sama (MoU/MoA) yang aktif antara Telkom University dengan institusi mitra nasional dan internasional, lengkap dengan ruang lingkup dan masa berlaku.',
                'description_detail' => "Dataset ini mendokumentasikan seluruh perjanjian kerja sama aktif Telkom University per tahun 2024.\nMencakup MoU dan MoA dengan institusi pendidikan, industri, dan pemerintah di tingkat nasional dan internasional.",
                'directorate_id'     => $puti?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $puti?->id)->first()?->id,
                'category_id'        => $catKerjasama?->id,
                'data_format'        => 'Excel',
                'file_size'          => '0.9 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-28',
            ],
            [
                'title'              => 'Data Fasilitas dan Utilisasi Ruang Kelas 2025',
                'slug'               => 'fasilitas-ruang-kelas-2025',
                'description'        => 'Informasi kapasitas, tingkat utilisasi, dan kondisi ruang kelas serta laboratorium di seluruh gedung kampus Telkom University per semester genap 2024/2025.',
                'description_detail' => "Dataset ini mendokumentasikan seluruh fasilitas ruang kelas dan laboratorium Telkom University beserta tingkat utilisasinya.\nData dikumpulkan sepanjang semester genap 2024/2025 dari sistem booking ruang dan laporan fasilitas gedung.",
                'directorate_id'     => $puti?->id,
                'data_owner_id'      => DataOwner::where('directorate_id', $puti?->id)->first()?->id,
                'category_id'        => $catFasilitas?->id,
                'data_format'        => 'Excel',
                'file_size'          => '2.1 MB',
                'status'             => 'published',
                'last_updated_at'    => '2026-04-22',
            ],
        ];

        foreach ($datasets as $d) {
            Dataset::create($d);
        }

        // ── 6. News Categories ───────────────────────────────────────
        $newsCategories = [
            ['name' => 'Campus Sustainability', 'slug' => 'campus-sustainability'],
            ['name' => 'Research Grants',       'slug' => 'research-grants'],
            ['name' => 'Teknologi',             'slug' => 'teknologi'],
            ['name' => 'Pengumuman',            'slug' => 'pengumuman'],
            ['name' => 'Akademik',              'slug' => 'akademik'],
        ];

        foreach ($newsCategories as $nc) {
            NewsCategory::create($nc);
        }

        // ── 7. News Articles ─────────────────────────────────────────
        $catCampus  = NewsCategory::where('slug', 'campus-sustainability')->first();
        $catResearch= NewsCategory::where('slug', 'research-grants')->first();
        $catTek     = NewsCategory::where('slug', 'teknologi')->first();
        $catAnnounce= NewsCategory::where('slug', 'pengumuman')->first();

        $articles = [
            [
                'title'        => 'Siap hadapi semester baru? 5 Tips Persiapan Kuliah Setelah Libur Semester',
                'slug'         => 'tips-persiapan-kuliah-setelah-libur-semester',
                'excerpt'      => 'Untuk menikmati masa libur panjang, mahasiswa rantau biasanya kembali ke kampung halaman untuk melepas rindu dengan keluarga dan kerabat tercinta.',
                'content'      => "<p><strong>Telkom University</strong> – Untuk menikmati masa libur panjang, mahasiswa rantau biasanya kembali ke kampung halaman untuk melepas rindu dengan keluarga dan kerabat tercinta. Momen ini menjadi waktu berharga untuk beristirahat sejenak dari kesibukan akademik dan mengisi ulang energi sebelum menghadapi semester baru.</p>\n\n<h2>1. Evaluasi semester yang sudah dilalui</h2>\n<p>Evaluasi semester yang sudah dilalui adalah langkah penting untuk memahami pencapaian dan tantangan yang dihadapi. Pelajaran terbaik selalu datang dari pengalaman masa lalu, sehingga sebelum memulai semester baru, penting untuk merefleksikan apakah target yang telah ditetapkan sebelumnya sudah tercapai atau masih ada hal yang perlu diperbaiki.</p>\n\n<h2>2. Menyusun impian dan target yang ingin dicapai</h2>\n<p>Setelah menjalani semester sebelumnya, kini saatnya menyusun impian dan target yang ingin dicapai di semester selanjutnya. Menetapkan tujuan yang jelas akan membantu kamu fokus dan terarah dalam menjalani setiap proses pembelajaran.</p>\n\n<h2>3. Menyiapkan hal-hal yang menunjang perkuliahan</h2>\n<p>Sebelum perkuliahan dimulai, kamu bisa mulai merapikan tempat belajarmu agar lebih nyaman dan mendukung produktivitas. Susun kembali buku-buku, alat tulis, serta perlengkapan lainnya agar mudah diakses saat dibutuhkan.</p>\n\n<h2>4. Menyusun rencana keuangan pribadi</h2>\n<p>Keuangan juga menjadi hal yang krusial bagi mahasiswa. Kuliah bukan hanya tentang belajar, tetapi juga tentang mengelola keuangan dengan baik.</p>\n\n<h2>5. Membangun jaringan sosial</h2>\n<p>Kembalinya masa perkuliahan bisa terasa berat setelah liburan panjang, kamu mungkin butuh waktu untuk memulihkan diri sebelum kembali fokus dengan perkuliahan, hal tersebut tentunya bisa diselingi dengan membangun jaringan sosial.</p>",
                'thumbnail'    => '/images/campus.png',
                'category_id'  => $catCampus?->id,
                'author'       => 'Aprilia Sekar N',
                'status'       => 'published',
                'published_at' => Carbon::parse('2025-02-04'),
            ],
            [
                'title'        => 'Kenali Work Life Balance dan Cara Mewujudkannya Bagi Mahasiswa',
                'slug'         => 'kenali-work-life-balance-cara-mewujudkannya',
                'excerpt'      => 'Work life balance merupakan istilah yang dewasa ini semakin sering kita dengar. Istilah work life balance merujuk pada konsep kehidupan yang seimbang antara bekerja dan kehidupan pribadi.',
                'content'      => "<p><strong>Telkom University</strong> – Work life balance merupakan istilah yang dewasa ini semakin sering kita dengar. Bagi mahasiswa, work life balance bisa diartikan sebagai keseimbangan antara kegiatan akademik, organisasi, dan kehidupan sosial.</p>\n\n<h2>1. Atur Prioritas dengan Bijak</h2>\n<p>Langkah pertama dalam mewujudkan work life balance adalah dengan mengatur prioritas. Buat daftar tugas dan kegiatan berdasarkan tingkat urgensi dan kepentingannya.</p>\n\n<h2>2. Tetapkan Batasan Waktu</h2>\n<p>Belajarlah untuk menetapkan batasan yang jelas antara waktu belajar, berorganisasi, dan waktu istirahat.</p>\n\n<h2>3. Jaga Kesehatan Fisik dan Mental</h2>\n<p>Kesehatan adalah fondasi dari work life balance yang baik. Pastikan kamu cukup tidur, makan dengan teratur, dan berolahraga secara konsisten.</p>",
                'thumbnail'    => '/images/mid-tel-u.png',
                'category_id'  => $catResearch?->id,
                'author'       => 'Aqila Zahra Qonita',
                'status'       => 'published',
                'published_at' => Carbon::parse('2025-04-11'),
            ],
            [
                'title'        => 'Intip Lebih Dekat Fasilitas Olahraga Telkom University Kampus Utama',
                'slug'         => 'fasilitas-olahraga-telkom-university-kampus-utama',
                'excerpt'      => 'Olahraga, seperti namanya, berarti mengolah bagian-bagian tubuh agar raga menjadi bugar dan segar. Bagi calon mahasiswa yang sudah terbiasa berolahraga, memilih kampus dengan sarana olahraga menjadi satu hal yang penting.',
                'content'      => "<p><strong>Telkom University</strong> – Olahraga, seperti namanya, berarti mengolah bagian-bagian tubuh agar raga menjadi bugar dan segar. Telkom University Kampus Utama memiliki berbagai fasilitas olahraga yang lengkap dan modern.</p>\n\n<h2>Lapangan Futsal dan Basket</h2>\n<p>Telkom University memiliki lapangan futsal dan basket berstandar yang dapat digunakan oleh mahasiswa dan karyawan.</p>\n\n<h2>Kolam Renang</h2>\n<p>Kampus utama Telkom University juga memiliki kolam renang yang bersih dan terawat.</p>\n\n<h2>Gymnasium dan Fitness Center</h2>\n<p>Bagi yang gemar latihan beban atau cardio, gymnasium dan fitness center Telkom University menyediakan berbagai peralatan fitness yang lengkap.</p>",
                'thumbnail'    => '/images/tel-u1.jpg',
                'category_id'  => $catResearch?->id,
                'author'       => 'Prita Arifa Tyasandari',
                'status'       => 'published',
                'published_at' => Carbon::parse('2025-05-09'),
            ],
            [
                'title'        => 'AI Terbaik Paling Banyak Digunakan Tahun 2026: Siapa Juaranya?',
                'slug'         => 'ai-terbaik-paling-banyak-digunakan-2026',
                'excerpt'      => 'Kecerdasan buatan terus berkembang pesat. Di tahun 2026, berbagai platform AI bersaing untuk menjadi yang terbaik dan paling banyak digunakan oleh pengguna di seluruh dunia.',
                'content'      => "<p><strong>Telkom University</strong> – Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan modern. Di tahun 2026, berbagai model AI baru telah diluncurkan dan bersaing ketat untuk memenangkan hati pengguna di seluruh dunia.</p>\n\n<h2>1. ChatGPT – OpenAI</h2>\n<p>ChatGPT masih mempertahankan posisinya sebagai salah satu AI terpopuler di dunia.</p>\n\n<h2>2. Gemini – Google DeepMind</h2>\n<p>Google Gemini hadir sebagai kompetitor kuat dengan integrasi mendalam ke dalam ekosistem Google.</p>\n\n<h2>3. Claude – Anthropic</h2>\n<p>Claude dari Anthropic dikenal dengan pendekatannya yang berfokus pada keamanan AI dan respons yang lebih panjang serta terperinci.</p>",
                'thumbnail'    => '/images/campus.png',
                'category_id'  => $catTek?->id,
                'author'       => 'Tim Redaksi Satu Data',
                'status'       => 'published',
                'published_at' => Carbon::parse('2026-04-01'),
            ],
            [
                'title'        => 'Website Telkom University Periode April 2026',
                'slug'         => 'website-telkom-university-periode-april-2026',
                'excerpt'      => 'Telkom University terus melakukan pembaruan dan peningkatan pada platform digital resminya untuk memberikan pengalaman terbaik bagi mahasiswa, dosen, dan masyarakat umum.',
                'content'      => "<p><strong>Telkom University</strong> – Dalam rangka meningkatkan layanan digital kepada seluruh sivitas akademika dan masyarakat umum, Telkom University secara resmi mengumumkan pembaruan website universitas yang dilakukan pada periode April 2026.</p>\n\n<h2>Pembaruan Antarmuka Pengguna</h2>\n<p>Tampilan website Telkom University telah diperbarui dengan desain yang lebih modern, bersih, dan responsif.</p>\n\n<h2>Peningkatan Performa dan Kecepatan</h2>\n<p>Tim IT melakukan optimasi teknis yang signifikan sehingga kecepatan loading website meningkat hingga 40%.</p>",
                'thumbnail'    => '/images/mid-tel-u.png',
                'category_id'  => $catAnnounce?->id,
                'author'       => 'Tim IT Telkom University',
                'status'       => 'published',
                'published_at' => Carbon::parse('2026-04-05'),
            ],
            [
                'title'        => 'Broken Link Checker: Pengertian, Dampak, dan Cara Mengatasinya',
                'slug'         => 'broken-link-checker-pengertian-dampak-cara-mengatasi',
                'excerpt'      => 'Broken link adalah tautan yang mengarah ke halaman yang tidak ada atau tidak dapat diakses. Ini merupakan masalah umum yang dapat berdampak negatif pada SEO dan pengalaman pengguna.',
                'content'      => "<p><strong>Telkom University</strong> – Broken link atau tautan rusak adalah salah satu masalah yang sering ditemukan dalam pengelolaan website. Ketika sebuah tautan tidak lagi mengarah ke halaman yang valid, maka tautan tersebut disebut broken link.</p>\n\n<h2>Apa Itu Broken Link?</h2>\n<p>Broken link terjadi ketika sebuah hyperlink pada halaman web tidak lagi dapat diakses. Ini bisa disebabkan oleh berbagai faktor, seperti halaman yang dihapus atau perubahan struktur URL.</p>\n\n<h2>Dampak Broken Link pada Website</h2>\n<p>Broken link dapat memberikan dampak negatif yang signifikan. Dari sisi SEO, mesin pencari seperti Google akan menilai website dengan banyak broken link sebagai website berkualitas rendah.</p>",
                'thumbnail'    => '/images/tel-u1.jpg',
                'category_id'  => $catTek?->id,
                'author'       => 'Tim Redaksi Satu Data',
                'status'       => 'published',
                'published_at' => Carbon::parse('2026-04-08'),
            ],
        ];

        foreach ($articles as $a) {
            NewsArticle::create($a);
        }
    }
}
