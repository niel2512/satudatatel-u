<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/DataOwnerController.php

class DataOwnerController extends Controller
{
    // Data direktorat hardcode — akan dipindah ke database di iterasi berikutnya
    private function getDirectorates(): array
    {
        return [
            [
                'slug'             => 'direktorat-akademik',
                'name'             => 'Direktorat Akademik',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-kampus-jakarta',
                'name'             => 'Direktorat Kampus Jakarta',
                'logo'             => '/images/logo-dir-telujkt.webp',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-kampus-purwokerto',
                'name'             => 'Direktorat Kampus Purwokerto',
                'logo'             => '/images/logo-dir-telupwk.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-kampus-surabaya',
                'name'             => 'Direktorat Kampus Surabaya',
                'logo'             => '/images/logo-dir-telusby.webp',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-aset-sustainability',
                'name'             => 'Direktorat Aset & Sustainability',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-keuangan',
                'name'             => 'Direktorat Keuangan',
                'logo'             => '/images/logo-dir-kug.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-pemasaran-admisi',
                'name'             => 'Direktorat Pemasaran & Admisi',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-bandung-techno-park',
                'name'             => 'Direktorat Bandung Techno Park',
                'logo'             => '/images/logo-dir-btp.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-pengelola-dana-abadi',
                'name'             => 'Direktorat Pengelola Dana Abadi',
                'logo'             => '/images/logo-dir-pda.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-sumber-daya-manusia',
                'name'             => 'Direktorat Sumber Daya Manusia',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-sekretariat-perencanaan-strategis',
                'name'             => 'Direktorat Sekretariat & Perencanaan Strategis',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-pasca-sarjana-advance-learning',
                'name'             => 'Direktorat Pasca Sarjana & Advance Learning',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-pusat-teknologi-informasi',
                'name'             => 'Direktorat Pusat Teknologi Informasi',
                'logo'             => '/images/puti-logo.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-kemahasiswaan-pengembangan-karir-alumni',
                'name'             => 'Direktorat Kemahasiswaan, Pengembangan Karir, Alumni',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-kerjasama-strategis-urusan-internasional',
                'name'             => 'Direktorat Kerjasama Strategis & Kantor Urusan Internasional',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
            [
                'slug'             => 'direktorat-penelitian-pengabdian-masyarakat',
                'name'             => 'Direktorat Penelitian & Pengabdian Masyarakat',
                'logo'             => '/images/logo-telu.png',
                'penanggung_jawab' => 'Olivia Rodrigo',
            ],
        ];
    }

    public function index(Request $request): \Illuminate\View\View
    {
        $search        = $request->get('search', '');
        $directorates  = $this->getDirectorates();

        // Filter pencarian sederhana
        if ($search) {
            $directorates = array_filter(
                $directorates,
                fn($d) => str_contains(strtolower($d['name']), strtolower($search))
            );
        }

        return view('data-owner.index', compact('directorates', 'search'));
    }

    public function show(string $slug): \Illuminate\View\View
    {
        $directorates = $this->getDirectorates();

        // Cari berdasarkan slug
        $directorate = collect($directorates)->firstWhere('slug', $slug);

        abort_if(is_null($directorate), 404);

        return view('data-owner.show', compact('directorate'));
    }
}
