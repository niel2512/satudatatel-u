<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogDatasetController extends Controller
{
    // Dataset statis — akan dipindah ke model/database di iterasi berikutnya
    private function getAllDatasets(): array
    {
        return [
            [
                'title'       => 'Data Penerimaan Mahasiswa Baru Telkom University Tahun 2024',
                'size'        => '2.4Mb',
                'desc'        => 'Dataset komprehensif berisi statistik pendaftar, peserta ujian, dan mahasiswa yang lolos seleksi penerimaan mahasiswa baru tahun ajaran 2024/2025, diagregasi berdasarkan program studi dan jalur masuk.',
                'desc_detail' => "Dataset ini menyajikan statistik komprehensif terkait penerimaan mahasiswa baru di Telkom University pada tahun ajaran 2023-2024.\nData ini mencakup informasi agregat dari berbagai jalur masuk resmi, termasuk Jalur Prestasi Akademik (JPA), Jalur Mandiri, dan Jalur Beasiswa.",
                'owner'       => 'Aqila Zahra Qonita',
                'direktorat'  => 'Direktorat Akademik',
                'date'        => '11 April 2026',
                'slug'        => 'pmb-2024',
                'preview_columns' => ['No', 'Jalur Masuk', 'Pendaftar', 'Lulus', 'Registrasi Ulang'],
                'preview_rows'    => [
                    [1, 'Jalur Prestasi Akademik 2 (JPA 2)', '12,450', '3,200', '2,850'],
                    [2, 'International Undergraduate Program (IUP)', '1,200', '150', '148'],
                    [3, 'Ekstensi D3-S1 Batch 2', '450', '200', '186'],
                    [4, 'S1 Online Learning (PJJ)', '8,900', '2,100', '1,750'],
                    [5, 'Vokasi Direct Track', '560', '325', '300'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Pembaruan Data', 'age' => '2 Hari yang lalu', 'note' => 'Pembaruan data jalur mandiri gelombang 2 mencakup penyesuaian angka registrasi akhir setelah masa perpanjangan.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '1 Bulan yang lalu', 'note' => 'Publikasi awal dataset statistik pendaftaran untuk periode akademik 2023-2024.'],
                ],
            ],
            [
                'title'       => 'Data Rekapitulasi Anggaran Riset Internal Dosen 2023–2025',
                'size'        => '3.2 Mb',
                'desc'        => 'Rincian Alokasi dan realisasi dana hibah riset internal institusi selama periode 3 tahun terakhir. Data mencakup kategori pendanaan, klaster penelitian, dan luaran yang dijanjikan.',
                'desc_detail' => "Data ini menyajikan rekapitulasi lengkap anggaran riset internal dosen Telkom University selama periode 2023–2025.\nMencakup alokasi per klaster penelitian, realisasi anggaran, dan capaian luaran penelitian setiap tahun.",
                'owner'       => 'Rina Suryani',
                'direktorat'  => 'Direktorat Penelitian & Pengabdian Masyarakat',
                'date'        => '12 April 2026',
                'slug'        => 'anggaran-riset-2023-2025',
                'preview_columns' => ['No', 'Klaster Penelitian', 'Alokasi (Rp)', 'Realisasi (Rp)', 'Jumlah Peneliti'],
                'preview_rows'    => [
                    [1, 'Teknologi Informasi & Komunikasi', '2.500.000.000', '2.350.000.000', '42'],
                    [2, 'Teknik Elektro & Energi', '1.800.000.000', '1.720.000.000', '35'],
                    [3, 'Manajemen & Bisnis', '900.000.000', '870.000.000', '28'],
                    [4, 'Industri Kreatif & Seni', '600.000.000', '580.000.000', '18'],
                    [5, 'Ilmu Sosial & Humaniora', '400.000.000', '380.000.000', '12'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Update Realisasi', 'age' => '3 Hari yang lalu', 'note' => 'Penambahan data realisasi anggaran semester 2 tahun 2025 setelah audit internal selesai.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '2 Bulan yang lalu', 'note' => 'Publikasi awal data rekapitulasi anggaran riset internal periode 2023–2025.'],
                ],
            ],
            [
                'title'       => 'Data Pemetaan Distribusi Alumni Berdasarkan Provinsi Bekerja',
                'size'        => '10 Mb',
                'desc'        => 'Data spasial dan tabular mengenai sebaran lulusan Telkom University di seluruh provinsi Indonesia yang telah memasuki dunia kerja, berdasarkan hasil tracer study tahun 2025.',
                'desc_detail' => "Dataset ini menyajikan peta distribusi alumni Telkom University yang bekerja di seluruh provinsi di Indonesia berdasarkan hasil tracer study 2025.\nData dikumpulkan dari 25.000+ alumni yang merespons survei, mencakup informasi provinsi bekerja, bidang industri, dan jenis perusahaan.",
                'owner'       => 'Budi Santoso',
                'direktorat'  => 'Direktorat Kemahasiswaan, Pengembangan karir, Alumni',
                'date'        => '14 April 2026',
                'slug'        => 'alumni-distribusi-2025',
                'preview_columns' => ['No', 'Provinsi', 'Jumlah Alumni', 'Bidang Terbanyak', '% dari Total'],
                'preview_rows'    => [
                    [1, 'Jawa Barat', '8,420', 'Teknologi Informasi', '33.7%'],
                    [2, 'DKI Jakarta', '5,210', 'Telekomunikasi', '20.8%'],
                    [3, 'Jawa Timur', '2,180', 'Manufaktur & Industri', '8.7%'],
                    [4, 'Jawa Tengah', '1,650', 'Perbankan & Keuangan', '6.6%'],
                    [5, 'Banten', '1,340', 'E-commerce & Startup', '5.4%'],
                ],
                'changelog' => [
                    ['version' => 'v1.2 - Penambahan Provinsi Baru', 'age' => '1 Hari yang lalu', 'note' => 'Penambahan data alumni di wilayah Indonesia Timur yang sebelumnya belum terdata.'],
                    ['version' => 'v1.1 - Koreksi Data', 'age' => '2 Minggu yang lalu', 'note' => 'Koreksi data provinsi Jawa Barat setelah validasi ulang dengan sistem SIAK.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '1 Bulan yang lalu', 'note' => 'Publikasi awal hasil tracer study distribusi alumni tahun 2025.'],
                ],
            ],
            [
                'title'       => 'Data Kehadiran dan Kinerja Dosen Semester Genap 2024/2025',
                'size'        => '1.8 Mb',
                'desc'        => 'Rekap presensi mengajar, nilai evaluasi pembelajaran, dan indeks kepuasan mahasiswa terhadap kinerja dosen di seluruh fakultas pada semester genap 2024/2025.',
                'desc_detail' => "Data ini merekap kehadiran dan kinerja seluruh dosen Telkom University pada semester genap 2024/2025.\nMencakup persentase kehadiran mengajar, skor evaluasi pembelajaran, dan hasil survei kepuasan mahasiswa per mata kuliah.",
                'owner'       => 'Dwi Hartanto',
                'direktorat'  => 'Direktorat Sumber Daya Manusia',
                'date'        => '16 April 2026',
                'slug'        => 'kinerja-dosen-genap-2025',
                'preview_columns' => ['No', 'Fakultas', 'Total Dosen', 'Rata-rata Kehadiran', 'Skor Evaluasi'],
                'preview_rows'    => [
                    [1, 'Fakultas Teknik Elektro', '85', '94.2%', '3.82'],
                    [2, 'Fakultas Informatika', '120', '96.1%', '3.91'],
                    [3, 'Fakultas Rekayasa Industri', '72', '93.8%', '3.78'],
                    [4, 'Fakultas Komunikasi & Bisnis', '95', '95.3%', '3.86'],
                    [5, 'Fakultas Ilmu Terapan', '68', '92.7%', '3.74'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Update Data FIB', 'age' => '5 Hari yang lalu', 'note' => 'Penambahan data Fakultas Industri Kreatif yang sebelumnya belum diikutsertakan.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '3 Minggu yang lalu', 'note' => 'Publikasi awal rekap kehadiran dan evaluasi kinerja dosen semester genap 2024/2025.'],
                ],
            ],
            [
                'title'       => 'Data Publikasi Ilmiah Sivitas Akademika 2022–2025',
                'size'        => '5.6 Mb',
                'desc'        => 'Kumpulan metadata publikasi ilmiah (jurnal, prosiding, buku) yang dihasilkan oleh dosen dan mahasiswa Telkom University pada rentang 2022–2025, terindeks Scopus, WoS, dan SINTA.',
                'desc_detail' => "Dataset ini berisi metadata lengkap seluruh publikasi ilmiah sivitas akademika Telkom University tahun 2022–2025.\nMencakup artikel jurnal internasional, prosiding konferensi, dan buku ajar yang terindeks di Scopus, Web of Science, dan SINTA.",
                'owner'       => 'Citra Dewi',
                'direktorat'  => 'Direktorat Penelitian & Pengabdian Masyarakat',
                'date'        => '18 April 2026',
                'slug'        => 'publikasi-ilmiah-2022-2025',
                'preview_columns' => ['No', 'Tahun', 'Jurnal Scopus', 'Prosiding', 'SINTA Q1-Q2'],
                'preview_rows'    => [
                    [1, '2022', '245', '312', '189'],
                    [2, '2023', '298', '380', '234'],
                    [3, '2024', '342', '425', '287'],
                    [4, '2025 (Q1)', '98', '120', '82'],
                    [5, '2025 (Q2)', '112', '145', '95'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Update Q2 2025', 'age' => '1 Minggu yang lalu', 'note' => 'Penambahan data publikasi kuartal 2 tahun 2025 setelah verifikasi oleh perpustakaan.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '2 Bulan yang lalu', 'note' => 'Publikasi awal metadata publikasi ilmiah periode 2022–2025.'],
                ],
            ],
            [
                'title'       => 'Data Kalender Akademik 2024/2025',
                'size'        => '0.5 Mb',
                'desc'        => 'Dokumen resmi kalender akademik Telkom University yang mencakup jadwal perkuliahan, ujian tengah semester, ujian akhir semester, libur nasional, dan kegiatan kemahasiswaan.',
                'desc_detail' => "Kalender akademik resmi Telkom University untuk tahun ajaran 2024/2025 dalam format data terstruktur.\nMencakup semua tanggal penting akademik, libur nasional, jadwal UTS/UAS, dan kegiatan kemahasiswaan di seluruh kampus.",
                'owner'       => 'Sekretariat Rektorat',
                'direktorat'  => 'Direktorat Akademik',
                'date'        => '20 April 2026',
                'slug'        => 'kalender-akademik-2024-2025',
                'preview_columns' => ['No', 'Kegiatan', 'Tanggal Mulai', 'Tanggal Selesai', 'Durasi'],
                'preview_rows'    => [
                    [1, 'Perkuliahan Semester Ganjil', '02 Sep 2024', '13 Des 2024', '15 Minggu'],
                    [2, 'Ujian Tengah Semester Ganjil', '21 Okt 2024', '26 Okt 2024', '1 Minggu'],
                    [3, 'Ujian Akhir Semester Ganjil', '16 Des 2024', '21 Des 2024', '1 Minggu'],
                    [4, 'Perkuliahan Semester Genap', '03 Feb 2025', '13 Jun 2025', '15 Minggu'],
                    [5, 'Wisuda Periode I 2025', '15 Mar 2025', '15 Mar 2025', '1 Hari'],
                ],
                'changelog' => [
                    ['version' => 'v1.0 - Initial Publish', 'age' => '1 Bulan yang lalu', 'note' => 'Publikasi kalender akademik resmi 2024/2025 yang telah disahkan oleh Rektor.'],
                ],
            ],
            [
                'title'       => 'Data Fasilitas dan Utilisasi Ruang Kelas 2025',
                'size'        => '2.1 Mb',
                'desc'        => 'Informasi kapasitas, tingkat utilisasi, dan kondisi ruang kelas serta laboratorium di seluruh gedung kampus Telkom University per semester genap 2024/2025.',
                'desc_detail' => "Dataset ini mendokumentasikan seluruh fasilitas ruang kelas dan laboratorium Telkom University beserta tingkat utilisasinya.\nData dikumpulkan sepanjang semester genap 2024/2025 dari sistem booking ruang dan laporan fasilitas gedung.",
                'owner'       => 'Tim Sarana Prasarana',
                'direktorat'  => 'Direktorat Sarana & Prasarana',
                'date'        => '22 April 2026',
                'slug'        => 'fasilitas-ruang-kelas-2025',
                'preview_columns' => ['No', 'Gedung', 'Jumlah Ruang', 'Kapasitas Total', 'Utilisasi (%)'],
                'preview_rows'    => [
                    [1, 'Gedung Rektorat', '24', '1,440', '78.5%'],
                    [2, 'Gedung B (FTE)', '48', '2,880', '85.2%'],
                    [3, 'Gedung C (FIF)', '36', '2,160', '82.1%'],
                    [4, 'Gedung D (FKB)', '30', '1,800', '79.8%'],
                    [5, 'Laboratorium Komputer', '20', '800', '91.4%'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Tambah Lab Baru', 'age' => '4 Hari yang lalu', 'note' => 'Penambahan data laboratorium baru di gedung E yang mulai beroperasi Maret 2025.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '1 Bulan yang lalu', 'note' => 'Publikasi awal data fasilitas dan utilisasi ruang kelas semester genap 2024/2025.'],
                ],
            ],
            [
                'title'       => 'Data Beasiswa dan Bantuan Keuangan Mahasiswa 2024',
                'size'        => '3.7 Mb',
                'desc'        => 'Data penerima beasiswa internal dan eksternal, jumlah dana yang disalurkan, dan distribusi berdasarkan program studi serta kategori beasiswa pada tahun akademik 2024.',
                'desc_detail' => "Dataset ini menyajikan data lengkap penerima beasiswa dan bantuan keuangan mahasiswa Telkom University tahun akademik 2024.\nMencakup beasiswa internal yayasan, beasiswa pemerintah (KIP-K), beasiswa industri, dan program bantuan keuangan lainnya.",
                'owner'       => 'Andi Permana',
                'direktorat'  => 'Direktorat Kemahasiswaan, Pengembangan karir, Alumni',
                'date'        => '24 April 2026',
                'slug'        => 'beasiswa-2024',
                'preview_columns' => ['No', 'Jenis Beasiswa', 'Jumlah Penerima', 'Total Dana (Rp)', 'Rata-rata/Mhs'],
                'preview_rows'    => [
                    [1, 'KIP Kuliah (Pemerintah)', '1,250', '18.750.000.000', '15.000.000'],
                    [2, 'Beasiswa Yayasan Internal', '850', '8.500.000.000', '10.000.000'],
                    [3, 'Beasiswa Industri & Mitra', '320', '6.400.000.000', '20.000.000'],
                    [4, 'Beasiswa Prestasi Akademik', '420', '4.200.000.000', '10.000.000'],
                    [5, 'Bantuan Keuangan Darurat', '180', '900.000.000', '5.000.000'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Update Semester Genap', 'age' => '1 Minggu yang lalu', 'note' => 'Penambahan data penerima beasiswa semester genap 2024 termasuk KIP-K gelombang 2.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '2 Bulan yang lalu', 'note' => 'Publikasi awal data beasiswa dan bantuan keuangan semester ganjil 2024.'],
                ],
            ],
            [
                'title'       => 'Data Indeks Kepuasan Layanan Akademik Mahasiswa 2025',
                'size'        => '1.2 Mb',
                'desc'        => 'Hasil survei kepuasan mahasiswa terhadap layanan akademik, administrasi, dan infrastruktur kampus yang dilaksanakan pada semester ganjil 2024/2025 dengan 15.000+ responden.',
                'desc_detail' => "Data ini merupakan hasil survei kepuasan layanan akademik yang diikuti oleh lebih dari 15.000 mahasiswa aktif Telkom University.\nSurvei dilakukan secara daring pada akhir semester ganjil 2024/2025 mencakup 12 aspek layanan kampus.",
                'owner'       => 'Siti Nurhayati',
                'direktorat'  => 'Direktorat Akademik',
                'date'        => '26 April 2026',
                'slug'        => 'kepuasan-layanan-2025',
                'preview_columns' => ['No', 'Aspek Layanan', 'Skor Rata-rata', 'Responden', 'Kategori'],
                'preview_rows'    => [
                    [1, 'Kualitas Pengajaran Dosen', '4.12 / 5.00', '15,240', 'Sangat Baik'],
                    [2, 'Layanan Administrasi Akademik', '3.78 / 5.00', '15,240', 'Baik'],
                    [3, 'Fasilitas Perpustakaan', '3.95 / 5.00', '14,890', 'Baik'],
                    [4, 'Koneksi Internet Kampus', '3.62 / 5.00', '15,240', 'Baik'],
                    [5, 'Kebersihan & Kenyamanan Kampus', '4.05 / 5.00', '15,100', 'Sangat Baik'],
                ],
                'changelog' => [
                    ['version' => 'v1.0 - Initial Publish', 'age' => '3 Minggu yang lalu', 'note' => 'Publikasi awal hasil survei kepuasan layanan akademik semester ganjil 2024/2025.'],
                ],
            ],
            [
                'title'       => 'Data Kerja Sama Institusi Nasional dan Internasional 2024',
                'size'        => '0.9 Mb',
                'desc'        => 'Daftar perjanjian kerja sama (MoU/MoA) yang aktif antara Telkom University dengan institusi mitra nasional dan internasional, lengkap dengan ruang lingkup dan masa berlaku.',
                'desc_detail' => "Dataset ini mendokumentasikan seluruh perjanjian kerja sama aktif Telkom University per tahun 2024.\nMencakup MoU dan MoA dengan institusi pendidikan, industri, dan pemerintah di tingkat nasional dan internasional.",
                'owner'       => 'Tim Kerja Sama',
                'direktorat'  => 'Direktorat Kerja Sama',
                'date'        => '28 April 2026',
                'slug'        => 'kerjasama-institusi-2024',
                'preview_columns' => ['No', 'Institusi Mitra', 'Jenis', 'Ruang Lingkup', 'Berlaku Hingga'],
                'preview_rows'    => [
                    [1, 'Universitas Indonesia', 'MoU', 'Penelitian & Pendidikan', '31 Des 2026'],
                    [2, 'PT Telkom Indonesia', 'MoA', 'Penelitian Terapan & Magang', '30 Jun 2027'],
                    [3, 'Arizona State University (USA)', 'MoU', 'Program Double Degree', '31 Des 2025'],
                    [4, 'Kementerian Kominfo RI', 'MoA', 'Pendidikan Vokasi Digital', '31 Mar 2026'],
                    [5, 'Samsung Electronics Indonesia', 'MoA', 'Beasiswa & Riset Bersama', '31 Okt 2025'],
                ],
                'changelog' => [
                    ['version' => 'v1.1 - Tambah MoA Baru', 'age' => '2 Minggu yang lalu', 'note' => 'Penambahan 8 MoA baru yang ditandatangani pada Februari 2024.'],
                    ['version' => 'v1.0 - Initial Publish', 'age' => '3 Bulan yang lalu', 'note' => 'Publikasi awal daftar kerja sama aktif per Januari 2024.'],
                ],
            ],
        ];
    }

    public function index(Request $request): \Illuminate\View\View
    {
        $perPage   = 3;
        $page      = (int) $request->get('page', 1);
        $search    = $request->get('search', '');
        $dirFilter = $request->get('direktorat', '');

        $allDatasets = collect($this->getAllDatasets());

        $filtered = $allDatasets
            ->when($search, fn($c) => $c->filter(fn($d) =>
                str_contains(strtolower($d['title']), strtolower($search)) ||
                str_contains(strtolower($d['owner']), strtolower($search)) ||
                str_contains(strtolower($d['direktorat']), strtolower($search))
            ))
            ->when($dirFilter, fn($c) => $c->filter(fn($d) => $d['direktorat'] === $dirFilter));

        $direktorats = $allDatasets->pluck('direktorat')->unique()->sort()->values();
        $total       = $filtered->count();
        $totalPages  = max(1, (int) ceil($total / $perPage));
        $page        = min(max($page, 1), $totalPages);
        $datasets    = $filtered->forPage($page, $perPage)->values();

        return view('katalog-dataset.index', compact(
            'datasets', 'direktorats', 'page', 'totalPages', 'search', 'dirFilter', 'total'
        ));
    }

    public function show(string $slug): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        $dataset = collect($this->getAllDatasets())->firstWhere('slug', $slug);
        abort_if(is_null($dataset), 404);

        // Pagination preview tabel (5 rows per page, semua di halaman 1 dalam kasus ini)
        $previewPage       = 1;
        $previewTotalPages = 5; // simulasi 5 halaman

        return view('katalog-dataset.show', compact('dataset', 'previewPage', 'previewTotalPages'));
    }
}
