<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataGovernanceController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $governanceCards = [
            [
                'title' => 'Data Collection',
                'desc'  => 'Proses pengumpulan data di Telkom University dilakukan secara sistematis melalui berbagai sumber resmi, termasuk sistem informasi akademik, administrasi kepegawaian, dan portal layanan mahasiswa. Setiap data yang dikumpulkan harus memenuhi standar kelengkapan dan akurasi yang ditetapkan oleh kebijakan data universitas untuk memastikan integritas informasi dari awal siklus hidupnya. Pengumpulan data dilakukan dengan memperhatikan aspek keamanan dan privasi sesuai dengan peraturan perundang-undangan yang berlaku di Indonesia.',
            ],
            [
                'title' => 'Data Storage and Organization',
                'desc'  => 'Penyimpanan dan pengorganisasian data di Telkom University menggunakan infrastruktur teknologi yang aman dan terstandarisasi. Data dikelompokkan berdasarkan kategori dan tingkat sensitivitas, kemudian disimpan dalam repositori terpusat yang dikelola oleh Pusat Teknologi Informasi. Sistem penyimpanan dirancang untuk memastikan ketersediaan data yang tinggi, kemudahan akses oleh pihak yang berwenang, serta ketahanan terhadap kehilangan atau kerusakan data dengan menerapkan mekanisme backup dan pemulihan yang andal.',
            ],
            [
                'title' => 'Data Processing and Analysis',
                'desc'  => 'Pemrosesan dan analisis data dilakukan untuk menghasilkan wawasan yang mendukung pengambilan keputusan strategis di Telkom University. Proses ini melibatkan transformasi data mentah menjadi informasi yang bermakna melalui serangkaian prosedur standar yang telah ditetapkan. Setiap aktivitas pemrosesan data harus terdokumentasi dengan baik dan dilakukan oleh personel yang berwenang, serta mengikuti prosedur yang telah ditetapkan untuk menjaga kualitas dan konsistensi hasil analisis yang digunakan dalam pelaporan dan evaluasi kinerja institusi.',
            ],
        ];

        $utilizationCards = [
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

        return view('data-governance.index', compact('governanceCards', 'utilizationCards'));
    }
}
