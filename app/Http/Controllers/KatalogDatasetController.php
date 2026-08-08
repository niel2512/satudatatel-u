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
                'title'      => 'Data Penerimaan Mahasiswa Baru Telkom University Tahun 2024',
                'size'       => '2.4Mb',
                'desc'       => 'Dataset komprehensif berisi statistik pendaftar, peserta ujian, dan mahasiswa yang lolos seleksi penerimaan mahasiswa baru tahun ajaran 2024/2025, diagregasi berdasarkan program studi dan jalur masuk.',
                'owner'      => 'Aqila Zahra Qonita',
                'direktorat' => 'Direktorat Akademik',
                'date'       => '11 April 2026',
                'slug'       => 'pmb-2024',
            ],
            [
                'title'      => 'Data Rekapitulasi Anggaran Riset Internal Dosen 2023–2025',
                'size'       => '3.2 Mb',
                'desc'       => 'Rincian Alokasi dan realisasi dana hibah riset internal institusi selama periode 3 tahun terakhir. Data mencakup kategori pendanaan, klaster penelitian, dan luaran yang dijanjikan.',
                'owner'      => 'Rina Suryani',
                'direktorat' => 'Direktorat Penelitian & Pengabdian Masyarakat',
                'date'       => '12 April 2026',
                'slug'       => 'anggaran-riset-2023-2025',
            ],
            [
                'title'      => 'Data Pemetaan Distribusi Alumni Berdasarkan Provinsi Bekerja',
                'size'       => '10 Mb',
                'desc'       => 'Data spasial dan tabular mengenai sebaran lulusan Telkom University di seluruh provinsi Indonesia yang telah memasuki dunia kerja, berdasarkan hasil tracer study tahun 2025.',
                'owner'      => 'Budi Santoso',
                'direktorat' => 'Direktorat Kemahasiswaan, Pengembangan karir, Alumni',
                'date'       => '14 April 2026',
                'slug'       => 'alumni-distribusi-2025',
            ],
            [
                'title'      => 'Data Kehadiran dan Kinerja Dosen Semester Genap 2024/2025',
                'size'       => '1.8 Mb',
                'desc'       => 'Rekap presensi mengajar, nilai evaluasi pembelajaran, dan indeks kepuasan mahasiswa terhadap kinerja dosen di seluruh fakultas pada semester genap 2024/2025.',
                'owner'      => 'Dwi Hartanto',
                'direktorat' => 'Direktorat Sumber Daya Manusia',
                'date'       => '16 April 2026',
                'slug'       => 'kinerja-dosen-genap-2025',
            ],
            [
                'title'      => 'Data Publikasi Ilmiah Sivitas Akademika 2022–2025',
                'size'       => '5.6 Mb',
                'desc'       => 'Kumpulan metadata publikasi ilmiah (jurnal, prosiding, buku) yang dihasilkan oleh dosen dan mahasiswa Telkom University pada rentang 2022–2025, terindeks Scopus, WoS, dan SINTA.',
                'owner'      => 'Citra Dewi',
                'direktorat' => 'Direktorat Penelitian & Pengabdian Masyarakat',
                'date'       => '18 April 2026',
                'slug'       => 'publikasi-ilmiah-2022-2025',
            ],
            [
                'title'      => 'Data Kalender Akademik 2024/2025',
                'size'       => '0.5 Mb',
                'desc'       => 'Dokumen resmi kalender akademik Telkom University yang mencakup jadwal perkuliahan, ujian tengah semester, ujian akhir semester, libur nasional, dan kegiatan kemahasiswaan.',
                'owner'      => 'Sekretariat Rektorat',
                'direktorat' => 'Direktorat Akademik',
                'date'       => '20 April 2026',
                'slug'       => 'kalender-akademik-2024-2025',
            ],
            [
                'title'      => 'Data Fasilitas dan Utilisasi Ruang Kelas 2025',
                'size'       => '2.1 Mb',
                'desc'       => 'Informasi kapasitas, tingkat utilisasi, dan kondisi ruang kelas serta laboratorium di seluruh gedung kampus Telkom University per semester genap 2024/2025.',
                'owner'      => 'Tim Sarana Prasarana',
                'direktorat' => 'Direktorat Sarana & Prasarana',
                'date'       => '22 April 2026',
                'slug'       => 'fasilitas-ruang-kelas-2025',
            ],
            [
                'title'      => 'Data Beasiswa dan Bantuan Keuangan Mahasiswa 2024',
                'size'       => '3.7 Mb',
                'desc'       => 'Data penerima beasiswa internal dan eksternal, jumlah dana yang disalurkan, dan distribusi berdasarkan program studi serta kategori beasiswa pada tahun akademik 2024.',
                'owner'      => 'Andi Permana',
                'direktorat' => 'Direktorat Kemahasiswaan, Pengembangan karir, Alumni',
                'date'       => '24 April 2026',
                'slug'       => 'beasiswa-2024',
            ],
            [
                'title'      => 'Data Indeks Kepuasan Layanan Akademik Mahasiswa 2025',
                'size'       => '1.2 Mb',
                'desc'       => 'Hasil survei kepuasan mahasiswa terhadap layanan akademik, administrasi, dan infrastruktur kampus yang dilaksanakan pada semester ganjil 2024/2025 dengan 15.000+ responden.',
                'owner'      => 'Siti Nurhayati',
                'direktorat' => 'Direktorat Akademik',
                'date'       => '26 April 2026',
                'slug'       => 'kepuasan-layanan-2025',
            ],
            [
                'title'      => 'Data Kerja Sama Institusi Nasional dan Internasional 2024',
                'size'       => '0.9 Mb',
                'desc'       => 'Daftar perjanjian kerja sama (MoU/MoA) yang aktif antara Telkom University dengan institusi mitra nasional dan internasional, lengkap dengan ruang lingkup dan masa berlaku.',
                'owner'      => 'Tim Kerja Sama',
                'direktorat' => 'Direktorat Kerja Sama',
                'date'       => '28 April 2026',
                'slug'       => 'kerjasama-institusi-2024',
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

    public function show(string $slug): \Illuminate\Http\RedirectResponse
    {
        // Dataset detail — akan diimplementasi di iterasi berikutnya
        return redirect()->route('katalog-dataset');
    }
}
