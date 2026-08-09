<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Directorate;
use Illuminate\Http\Request;

class KatalogDatasetController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $search    = $request->get('search', '');
        $dirFilter = $request->get('direktorat', '');
        $perPage   = 3;

        $query = Dataset::published()
            ->with(['directorate', 'dataOwner', 'category'])
            ->orderByDesc('last_updated_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('dataOwner', fn($q) => $q->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('directorate', fn($q) => $q->where('name', 'like', "%{$search}%"));
            });
        }

        if ($dirFilter) {
            $query->whereHas('directorate', fn($q) => $q->where('name', $dirFilter));
        }

        $datasets    = $query->paginate($perPage)->withQueryString();
        $direktorats = Directorate::orderBy('name')->pluck('name');
        $total       = $datasets->total();

        return view('katalog-dataset.index', compact('datasets', 'direktorats', 'search', 'dirFilter', 'total'));
    }

    public function show(string $slug): \Illuminate\View\View
    {
        $dataset = Dataset::published()
            ->with(['directorate', 'dataOwner', 'category'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('katalog-dataset.show', compact('dataset'));
    }
}
