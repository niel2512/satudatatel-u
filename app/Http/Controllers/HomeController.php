<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Static placeholder stats (will be replaced with DB queries in future iterations)
        $stats = [
            'total_directorates' => 1517,
            'total_datasets'     => 46246,
            'total_students'     => 96203,
            'total_data_owners'  => 55,
        ];

        // Placeholder content (will be replaced with SiteContent model in future iterations)
        $content = [
            'about_description' => 'Satu Data Telkom University adalah inisiatif tata kelola data terintegrasi yang bertujuan mewujudkan pengelolaan data yang andal, akurat, dan dapat dipertanggungjawabkan di seluruh unit kerja Universitas Telkom.',
        ];

        // Latest news placeholder (will be replaced with NewsArticle model)
        $latestNews = collect([]);

        return view('home.index', compact('stats', 'content', 'latestNews'));
    }
}
