<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $search   = $request->get('search', '');
        $kategori = $request->get('kategori', '');
        $perPage  = 3;

        $query = NewsArticle::published()
            ->with('category')
            ->latestFirst();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($kategori) {
            $query->whereHas('category', fn($q) => $q->where('name', $kategori));
        }

        $articles     = $query->paginate($perPage)->withQueryString();
        $kategoriList = NewsCategory::orderBy('name')->pluck('name');
        $terkini      = NewsArticle::published()->latestFirst()->limit(3)->get();
        $total        = $articles->total();

        return view('berita.index', compact('articles', 'kategoriList', 'terkini', 'search', 'kategori', 'total'));
    }

    public function show(string $slug): \Illuminate\View\View
    {
        $article = NewsArticle::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Artikel serupa: kategori sama, bukan artikel ini, limit 2
        $related = NewsArticle::published()
            ->where('id', '!=', $article->id)
            ->where('category_id', $article->category_id)
            ->latestFirst()
            ->limit(2)
            ->get();

        // Jika kurang dari 2, ambil artikel lain
        if ($related->count() < 2) {
            $extra = NewsArticle::published()
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $related->pluck('id'))
                ->latestFirst()
                ->limit(2 - $related->count())
                ->get();
            $related = $related->merge($extra);
        }

        return view('berita.show', compact('article', 'related'));
    }
}
