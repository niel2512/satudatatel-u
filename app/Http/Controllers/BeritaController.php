<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private function getAllArticles(): array
    {
        return [
            [
                'slug'      => 'tips-persiapan-kuliah-setelah-libur-semester',
                'title'     => 'Siap hadapi semester baru? 5 Tips Persiapan Kuliah Setelah Libur Semester',
                'excerpt'   => 'Untuk menikmati masa libur panjang, mahasiswa rantau biasanya kembali ke kampung halaman untuk melepas rindu dengan keluarga dan kerabat tercinta.',
                'image'     => '/images/campus.png',
                'kategori'  => 'Campus Sustainability',
                'date'      => '4 Februari 2025',
                'author'    => 'Aprilia Sekar N',
                'content'   => [
                    'intro' => 'Telkom University – Untuk menikmati masa libur panjang, mahasiswa rantau biasanya kembali ke kampung halaman untuk melepas rindu dengan keluarga dan kerabat tercinta. Momen ini menjadi waktu berharga untuk beristirahat sejenak dari kesibukan akademik dan mengisi ulang energi sebelum menghadapi semester baru. Namun, di balik kenyamanan suasana rumah, kamu juga perlu menyadari bahwa perkuliahan akan segera dimulai. Kembali ke rutinitas kampus tentu membutuhkan kesiapan mental dan fisik agar transisi dari liburan ke perkuliahan tidak terasa berat. Agar masa transisi ini tetap menyenangkan, ada beberapa tips yang bisa kamu terapkan untuk mempersiapkan diri sebelum kembali berkuliah. Berikut 5 tips persiapan awal masuk kuliah yang harus kamu ketahui:',
                    'sections' => [
                        ['heading' => '1. Evaluasi semester yang sudah dilalui', 'body' => 'Evaluasi semester yang sudah dilalui adalah langkah penting untuk memahami pencapaian dan tantangan yang dihadapi. Pelajaran terbaik selalu datang dari pengalaman masa lalu, sehingga sebelum memulai semester baru, penting untuk merefleksikan apakah target yang telah ditetapkan sebelumnya sudah tercapai atau masih ada hal yang perlu diperbaiki. Jika hasilnya sesuai dengan harapan, maka kamu bisa mempertahankan strategi belajar yang telah efektif dan terus meningkatkan kualitasnya, namun jika tidak, kamu bisa mencoba membuat strategi dan target baru untuk dicapai kedepannya.'],
                        ['heading' => '2. Menyusun impian dan target yang ingin dicapai', 'body' => 'Setelah menjalani semester sebelumnya, kini saatnya menyusun impian dan target yang ingin dicapai di semester selanjutnya. Menetapkan tujuan yang jelas akan membantu kamu fokus dan terarah dalam menjalani setiap proses pembelajaran. Kamu dapat memulainya dengan menetapkan skala prioritas, baik dalam hal akademik maupun pengembangan diri, ini bisa membantu kamu dapat berkembang secara alami. Dengan motivasi dan semangat baru, kamu bisa menghadapi setiap tantangan dengan pola pikir yang positif dan strategi yang lebih matang. Buatlah rencana yang realistis namun tetap menantang agar setiap pencapaian menjadi langkah maju menuju impian yang lebih besar.'],
                        ['heading' => '3. Menyiapkan hal-hal yang menunjang perkuliahan', 'body' => 'Sebelum perkuliahan dimulai, kamu bisa mulai merapikan tempat belajarmu agar lebih nyaman dan mendukung produktivitas. Susun kembali buku-buku, alat tulis, serta perlengkapan lainnya agar mudah diakses saat dibutuhkan. Lingkungan belajar yang rapi dan tertata dapat membantu meningkatkan fokus serta semangat dalam menjalani aktivitas akademik. Selain itu, menata ulang meja belajar juga bisa menjadi langkah awal untuk membangun kebiasaan yang lebih disiplin dan terorganisir selama semester baru.'],
                        ['heading' => '4. Menyusun rencana keuangan pribadi', 'body' => 'Keuangan juga menjadi hal yang krusial bagi mahasiswa. Kuliah bukan hanya tentang belajar, tetapi juga tentang mengelola keuangan dengan baik. Oleh karena itu, penting juga untuk kita menyusun rencana keuangan yang matang. Kamu bisa mendiskusikan perencanaan ini dengan orang tua atau mulai menyusun anggaran sendiri, yang mencakup biaya kuliah dan buku, kebutuhan sehari-hari, seperti makan dan transportasi hingga dana darurat untuk situasi tidak terduga, seperti saat sakit. Dengan perencanaan yang baik, kamu bisa lebih fokus pada perkuliahan tanpa khawatir masalah keuangan.'],
                        ['heading' => '5. Membangun jaringan sosial', 'body' => 'Kembalinya masa perkuliahan bisa terasa berat setelah liburan panjang, kamu mungkin butuh waktu untuk memulihkan diri sebelum kembali fokus dengan perkuliahan, hal tersebut tentunya bisa diselingi dengan membangun jaringan sosial, seperti olahraga, menonton film atau series, atau sekadar menghabiskan waktu bersama teman-teman. Aktivitas ini tidak hanya menyegarkan pikiran, tetapi juga membantu menjaga keseimbangan antara akademik dan hiburan. Yang terpenting, pastikan tubuh tetap sehat dan bugar agar kamu siap menghadapi semester baru dengan energi penuh!'],
                    ],
                ],
                'related' => [
                    'Kenali Work Life Balance dan Cara Mewujudkannya Bagi Mahasiswa',
                    'Intip Lebih Dekat Fasilitas Olahraga Telkom University Kampus Utama',
                ],
            ],
            [
                'slug'      => 'kenali-work-life-balance-cara-mewujudkannya',
                'title'     => 'Kenali Work Life Balance dan Cara Mewujudkannya Bagi Mahasiswa',
                'excerpt'   => 'Work life balance merupakan istilah yang dewasa ini semakin sering kita dengar. Istilah work life balance merujuk pada konsep kehidupan yang seimbang antara bekerja dan kehidupan pribadi.',
                'image'     => '/images/mid-tel-u.png',
                'kategori'  => 'Research Grants',
                'date'      => '11 April 2025',
                'author'    => 'Aqila Zahra Qonita',
                'content'   => [
                    'intro' => 'Telkom University – Work life balance merupakan istilah yang dewasa ini semakin sering kita dengar. Istilah work life balance merujuk pada konsep kehidupan yang seimbang antara bekerja dan kehidupan pribadi. Bagi mahasiswa, work life balance bisa diartikan sebagai keseimbangan antara kegiatan akademik, organisasi, dan kehidupan sosial. Mencapai keseimbangan ini sangat penting agar mahasiswa tidak mengalami kelelahan atau burnout selama menjalani masa studi.',
                    'sections' => [
                        ['heading' => '1. Atur Prioritas dengan Bijak', 'body' => 'Langkah pertama dalam mewujudkan work life balance adalah dengan mengatur prioritas. Buat daftar tugas dan kegiatan berdasarkan tingkat urgensi dan kepentingannya. Dengan mengetahui mana yang harus diselesaikan lebih dulu, kamu bisa mengelola waktu dengan lebih efisien dan menghindari penumpukan pekerjaan di akhir.'],
                        ['heading' => '2. Tetapkan Batasan Waktu', 'body' => 'Belajarlah untuk menetapkan batasan yang jelas antara waktu belajar, berorganisasi, dan waktu istirahat. Jangan biarkan salah satu aspek mengambil alih seluruh waktumu. Batasan ini penting agar setiap area kehidupanmu mendapat perhatian yang cukup tanpa mengorbankan yang lain.'],
                        ['heading' => '3. Jaga Kesehatan Fisik dan Mental', 'body' => 'Kesehatan adalah fondasi dari work life balance yang baik. Pastikan kamu cukup tidur, makan dengan teratur, dan berolahraga secara konsisten. Aktivitas fisik tidak hanya menjaga kesehatan tubuh, tetapi juga membantu mengurangi stres dan meningkatkan produktivitas dalam belajar.'],
                        ['heading' => '4. Manfaatkan Teknologi dengan Bijak', 'body' => 'Teknologi bisa menjadi alat yang sangat membantu dalam mengatur jadwal dan menyelesaikan tugas. Gunakan aplikasi manajemen tugas, kalender digital, atau timer untuk membantu kamu tetap fokus dan terorganisir. Namun, pastikan juga untuk membatasi penggunaan media sosial yang bisa menjadi pengalih perhatian.'],
                        ['heading' => '5. Cari Dukungan dari Lingkungan Sekitar', 'body' => 'Jangan ragu untuk meminta bantuan atau berbicara dengan teman, keluarga, atau konselor jika kamu merasa kewalahan. Memiliki sistem dukungan yang baik sangat penting dalam menjaga keseimbangan hidup. Ingat, meminta bantuan adalah tanda kekuatan, bukan kelemahan.'],
                    ],
                ],
                'related' => [
                    'Siap hadapi semester baru? 5 Tips Persiapan Kuliah Setelah Libur Semester',
                    'Intip Lebih Dekat Fasilitas Olahraga Telkom University Kampus Utama',
                ],
            ],
            [
                'slug'      => 'fasilitas-olahraga-telkom-university-kampus-utama',
                'title'     => 'Intip Lebih Dekat Fasilitas Olahraga Telkom University Kampus Utama',
                'excerpt'   => 'Olahraga, seperti namanya, berarti mengolah bagian-bagian tubuh agar raga menjadi bugar dan segar. Bagi calon mahasiswa yang sudah terbiasa berolahraga, memilih kampus dengan sarana olahraga menjadi satu hal yang penting.',
                'image'     => '/images/tel-u1.jpg',
                'kategori'  => 'Research Grants',
                'date'      => '9 Mei 2025',
                'author'    => 'Prita Arifa Tyasandari',
                'content'   => [
                    'intro' => 'Telkom University – Olahraga, seperti namanya, berarti mengolah bagian-bagian tubuh agar raga menjadi bugar dan segar. Bagi calon mahasiswa yang sudah terbiasa berolahraga, memilih kampus dengan sarana olahraga menjadi satu hal yang penting. Telkom University Kampus Utama memiliki berbagai fasilitas olahraga yang lengkap dan modern untuk mendukung aktivitas fisik seluruh sivitas akademika.',
                    'sections' => [
                        ['heading' => 'Lapangan Futsal dan Basket', 'body' => 'Telkom University memiliki lapangan futsal dan basket berstandar yang dapat digunakan oleh mahasiswa dan karyawan. Lapangan ini dilengkapi dengan pencahayaan yang memadai sehingga bisa digunakan hingga malam hari. Jadwal penggunaan lapangan diatur secara sistem booking online agar semua pihak mendapatkan kesempatan yang adil.'],
                        ['heading' => 'Kolam Renang', 'body' => 'Kampus utama Telkom University juga memiliki kolam renang yang bersih dan terawat. Fasilitas ini tersedia untuk mahasiswa dengan harga yang sangat terjangkau. Kolam renang ini sering digunakan untuk kegiatan Unit Kegiatan Mahasiswa (UKM) aquatik serta turnamen renang antar fakultas.'],
                        ['heading' => 'Gymnasium dan Fitness Center', 'body' => 'Bagi yang gemar latihan beban atau cardio, gymnasium dan fitness center Telkom University menyediakan berbagai peralatan fitness yang lengkap. Fasilitas ini dikelola secara profesional dengan instruktur yang siap membantu mahasiswa mencapai target kebugaran mereka.'],
                        ['heading' => 'Lapangan Tenis dan Badminton', 'body' => 'Tersedia pula lapangan tenis dan badminton yang bisa digunakan mahasiswa. Beberapa lapangan ini berada di area outdoor dan indoor, memberikan fleksibilitas bagi pengguna untuk berolahraga dalam berbagai kondisi cuaca. Fasilitas ini menjadi favorit bagi mahasiswa yang aktif di UKM olahraga.'],
                        ['heading' => 'Trek Joging Kampus', 'body' => 'Bagi yang lebih menyukai olahraga ringan, Telkom University menyediakan trek joging yang melingkari area kampus. Dikelilingi pepohonan hijau dan suasana yang asri, trek joging ini menjadi tempat favorit mahasiswa dan karyawan untuk berolahraga pagi sebelum memulai aktivitas sehari-hari.'],
                    ],
                ],
                'related' => [
                    'Siap hadapi semester baru? 5 Tips Persiapan Kuliah Setelah Libur Semester',
                    'Kenali Work Life Balance dan Cara Mewujudkannya Bagi Mahasiswa',
                ],
            ],
            [
                'slug'      => 'ai-terbaik-paling-banyak-digunakan-2026',
                'title'     => 'AI Terbaik Paling Banyak Digunakan Tahun 2026: Siapa Juaranya?',
                'excerpt'   => 'Kecerdasan buatan terus berkembang pesat. Di tahun 2026, berbagai platform AI bersaing untuk menjadi yang terbaik dan paling banyak digunakan oleh pengguna di seluruh dunia.',
                'image'     => '/images/campus.png',
                'kategori'  => 'Teknologi',
                'date'      => '1 April 2026',
                'author'    => 'Tim Redaksi Satu Data',
                'content'   => [
                    'intro' => 'Telkom University – Kecerdasan buatan (AI) kini telah menjadi bagian tak terpisahkan dari kehidupan modern. Di tahun 2026, berbagai model AI baru telah diluncurkan dan bersaing ketat untuk memenangkan hati pengguna di seluruh dunia. Dari asisten virtual hingga platform generasi konten, berikut adalah rangkuman AI yang paling banyak digunakan saat ini.',
                    'sections' => [
                        ['heading' => '1. ChatGPT – OpenAI', 'body' => 'ChatGPT masih mempertahankan posisinya sebagai salah satu AI terpopuler di dunia. Dengan berbagai pembaruan model, ChatGPT kini mampu memahami konteks percakapan yang lebih kompleks dan memberikan respons yang lebih akurat dan natural bagi penggunanya.'],
                        ['heading' => '2. Gemini – Google DeepMind', 'body' => 'Google Gemini hadir sebagai kompetitor kuat dengan integrasi mendalam ke dalam ekosistem Google. Kemampuannya dalam memproses teks, gambar, dan kode secara bersamaan menjadikannya pilihan utama bagi para profesional dan pelajar.'],
                        ['heading' => '3. Claude – Anthropic', 'body' => 'Claude dari Anthropic dikenal dengan pendekatannya yang berfokus pada keamanan AI dan respons yang lebih panjang serta terperinci. Platform ini banyak digunakan oleh peneliti dan penulis yang membutuhkan analisis mendalam.'],
                        ['heading' => '4. Copilot – Microsoft', 'body' => 'Microsoft Copilot terintegrasi langsung ke dalam suite Microsoft 365, menjadikannya alat produktivitas yang sangat populer di lingkungan kerja dan pendidikan. Kemampuannya membantu membuat dokumen, presentasi, dan analisis data secara otomatis sangat diapresiasi.'],
                    ],
                ],
                'related' => [
                    'Website Telkom University Periode April 2026',
                    'Broken Link Checker: Pengertian, Dampak, dan Cara Mengatasinya',
                ],
            ],
            [
                'slug'      => 'website-telkom-university-periode-april-2026',
                'title'     => 'Website Telkom University Periode April 2026',
                'excerpt'   => 'Telkom University terus melakukan pembaruan dan peningkatan pada platform digital resminya untuk memberikan pengalaman terbaik bagi mahasiswa, dosen, dan masyarakat umum.',
                'image'     => '/images/mid-tel-u.png',
                'kategori'  => 'Pengumuman',
                'date'      => '5 April 2026',
                'author'    => 'Tim IT Telkom University',
                'content'   => [
                    'intro' => 'Telkom University – Dalam rangka meningkatkan layanan digital kepada seluruh sivitas akademika dan masyarakat umum, Telkom University secara resmi mengumumkan pembaruan website universitas yang dilakukan pada periode April 2026. Pembaruan ini mencakup berbagai aspek teknis dan visual untuk memberikan pengalaman pengguna yang lebih baik.',
                    'sections' => [
                        ['heading' => 'Pembaruan Antarmuka Pengguna', 'body' => 'Tampilan website Telkom University telah diperbarui dengan desain yang lebih modern, bersih, dan responsif. Navigasi dipermudah agar pengguna dapat menemukan informasi yang dibutuhkan dengan lebih cepat dan intuitif.'],
                        ['heading' => 'Peningkatan Performa dan Kecepatan', 'body' => 'Tim IT melakukan optimasi teknis yang signifikan sehingga kecepatan loading website meningkat hingga 40%. Hal ini memberikan pengalaman browsing yang lebih nyaman, terutama bagi pengguna dengan koneksi internet terbatas.'],
                        ['heading' => 'Fitur Aksesibilitas Baru', 'body' => 'Website kini dilengkapi dengan berbagai fitur aksesibilitas, termasuk dukungan screen reader, kontras warna yang dapat disesuaikan, dan navigasi keyboard yang lebih baik untuk memenuhi kebutuhan pengguna dengan disabilitas.'],
                    ],
                ],
                'related' => [
                    'AI Terbaik Paling Banyak Digunakan Tahun 2026: Siapa Juaranya?',
                    'Broken Link Checker: Pengertian, Dampak, dan Cara Mengatasinya',
                ],
            ],
            [
                'slug'      => 'broken-link-checker-pengertian-dampak-cara-mengatasi',
                'title'     => 'Broken Link Checker: Pengertian, Dampak, dan Cara Mengatasinya',
                'excerpt'   => 'Broken link adalah tautan yang mengarah ke halaman yang tidak ada atau tidak dapat diakses. Ini merupakan masalah umum yang dapat berdampak negatif pada SEO dan pengalaman pengguna.',
                'image'     => '/images/tel-u1.jpg',
                'kategori'  => 'Teknologi',
                'date'      => '8 April 2026',
                'author'    => 'Tim Redaksi Satu Data',
                'content'   => [
                    'intro' => 'Telkom University – Broken link atau tautan rusak adalah salah satu masalah yang sering ditemukan dalam pengelolaan website. Ketika sebuah tautan tidak lagi mengarah ke halaman yang valid, baik karena halaman tersebut dihapus, dipindahkan, atau URL-nya berubah, maka tautan tersebut disebut broken link. Memahami cara mendeteksi dan mengatasi masalah ini sangat penting untuk menjaga kualitas website.',
                    'sections' => [
                        ['heading' => 'Apa Itu Broken Link?', 'body' => 'Broken link terjadi ketika sebuah hyperlink pada halaman web tidak lagi dapat diakses. Ini bisa disebabkan oleh berbagai faktor, seperti halaman yang dihapus, perubahan struktur URL, atau website tujuan yang sudah tidak aktif. Pengguna yang mengklik broken link biasanya akan mendapatkan pesan error 404 Not Found.'],
                        ['heading' => 'Dampak Broken Link pada Website', 'body' => 'Broken link dapat memberikan dampak negatif yang signifikan. Dari sisi SEO, mesin pencari seperti Google akan menilai website dengan banyak broken link sebagai website berkualitas rendah. Dari sisi pengalaman pengguna, broken link menciptakan frustrasi dan menurunkan kepercayaan pengunjung terhadap website.'],
                        ['heading' => 'Cara Mendeteksi Broken Link', 'body' => 'Ada beberapa alat yang bisa digunakan untuk mendeteksi broken link, antara lain Google Search Console, Screaming Frog SEO Spider, dan berbagai plugin WordPress. Dengan menggunakan alat-alat ini, kamu bisa mendapatkan laporan lengkap tentang semua broken link yang ada di websitemu.'],
                        ['heading' => 'Cara Mengatasi Broken Link', 'body' => 'Setelah mendeteksi broken link, langkah selanjutnya adalah memperbaikinya. Kamu bisa menghapus tautan yang tidak diperlukan, memperbarui URL ke alamat yang benar, atau menggunakan redirect 301 untuk mengarahkan pengguna dari URL lama ke URL baru yang masih aktif.'],
                    ],
                ],
                'related' => [
                    'Website Telkom University Periode April 2026',
                    'AI Terbaik Paling Banyak Digunakan Tahun 2026: Siapa Juaranya?',
                ],
            ],
        ];
    }

    public function index(Request $request): \Illuminate\View\View
    {
        $perPage   = 3;
        $page      = (int) $request->get('page', 1);
        $search    = $request->get('search', '');
        $kategori  = $request->get('kategori', '');

        $allArticles = collect($this->getAllArticles());

        $filtered = $allArticles
            ->when($search, fn($c) => $c->filter(fn($a) =>
                str_contains(strtolower($a['title']), strtolower($search)) ||
                str_contains(strtolower($a['excerpt']), strtolower($search)) ||
                str_contains(strtolower($a['author']), strtolower($search))
            ))
            ->when($kategori, fn($c) => $c->filter(fn($a) => $a['kategori'] === $kategori));

        $kategoriList = $allArticles->pluck('kategori')->unique()->sort()->values();
        $terkini      = $allArticles->take(3)->values();
        $total        = $filtered->count();
        $totalPages   = max(1, (int) ceil($total / $perPage));
        $page         = min(max($page, 1), $totalPages);
        $articles     = $filtered->forPage($page, $perPage)->values();

        return view('berita.index', compact(
            'articles', 'kategoriList', 'terkini', 'page', 'totalPages', 'search', 'kategori', 'total'
        ));
    }

    public function show(string $slug): \Illuminate\View\View
    {
        $allArticles = collect($this->getAllArticles());
        $article     = $allArticles->firstWhere('slug', $slug);
        abort_if(is_null($article), 404);

        // Ambil artikel serupa berdasarkan judul di related list
        $related = $allArticles->filter(fn($a) =>
            in_array($a['title'], $article['related'])
        )->values();

        return view('berita.show', compact('article', 'related'));
    }
}
