<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $query = trim($request->get('q', ''));

        $results = [
            'berita'  => collect(),
            'dataset' => collect(),
        ];

        if ($query === '') {
            return view('search.index', compact('query', 'results'))
                ->with('total', 0);
        }

        // ── Cari Berita ────────────────────────────────────────────────
        $results['berita'] = NewsArticle::published()
            ->with('category')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            })
            ->latestFirst()
            ->limit(5)
            ->get();

        // ── Cari Dataset ───────────────────────────────────────────────
        $results['dataset'] = Dataset::published()
            ->with(['directorate', 'dataOwner', 'category'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('description_detail', 'like', "%{$query}%")
                  ->orWhereHas('directorate', fn($q) => $q->where('name', 'like', "%{$query}%"))
                  ->orWhereHas('dataOwner', fn($q) => $q->where('name', 'like', "%{$query}%"))
                  ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%{$query}%"));
            })
            ->limit(5)
            ->get();

        $total = $results['berita']->count() + $results['dataset']->count();

        // ── Smart Redirect: 1 hasil tepat → langsung ke halaman ────────
        if ($total === 1) {
            if ($results['dataset']->count() === 1) {
                return redirect()->route('dataset.show', $results['dataset']->first()->slug);
            }
            if ($results['berita']->count() === 1) {
                return redirect()->route('news.show', $results['berita']->first()->slug);
            }
        }

        return view('search.index', compact('query', 'results', 'total'));
    }
}
