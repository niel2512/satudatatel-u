<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\NewsArticle;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $query = trim($request->get('q', ''));

        $results = [
            'berita'  => collect(),
            'dataset' => collect(),
        ];

        if ($query !== '') {
            // ── Berita ────────────────────────────────────────────────
            $results['berita'] = NewsArticle::published()
                ->with('category')
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('excerpt', 'like', "%{$query}%")
                      ->orWhere('author', 'like', "%{$query}%");
                })
                ->latestFirst()
                ->limit(5)
                ->get();

            // ── Dataset ───────────────────────────────────────────────
            $results['dataset'] = Dataset::published()
                ->with(['directorate', 'dataOwner', 'category'])
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhereHas('directorate', fn($q) => $q->where('name', 'like', "%{$query}%"))
                      ->orWhereHas('dataOwner', fn($q) => $q->where('name', 'like', "%{$query}%"));
                })
                ->limit(5)
                ->get();
        }

        $total = $results['berita']->count() + $results['dataset']->count();

        return view('search.index', compact('query', 'results', 'total'));
    }
}
