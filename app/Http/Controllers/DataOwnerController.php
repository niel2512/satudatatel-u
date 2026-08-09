<?php

namespace App\Http\Controllers;

use App\Models\Directorate;
use Illuminate\Http\Request;

class DataOwnerController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $search = $request->get('search', '');
        $filter = $request->get('direktorat', '');

        $query = Directorate::with(['dataOwners' => fn($q) => $q->active()])
            ->ordered();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('dataOwners', fn($q) => $q->where('name', 'like', "%{$search}%"));
            });
        }

        if ($filter) {
            $query->where('name', $filter);
        }

        $direktorats = $query->get();
        $allNames    = Directorate::ordered()->pluck('name');

        return view('data-owner.index', compact('direktorats', 'allNames', 'search', 'filter'));
    }

    public function show(string $slug): \Illuminate\View\View
    {
        // Slug direktorat: ambil berdasarkan abbreviation atau match nama
        $directorate = Directorate::with(['dataOwners' => fn($q) => $q->active(), 'datasets' => fn($q) => $q->published()])
            ->where('abbreviation', strtoupper($slug))
            ->orWhere('name', 'like', '%' . str_replace('-', ' ', $slug) . '%')
            ->first();

        abort_if(is_null($directorate), 404);

        return view('data-owner.show', compact('directorate'));
    }
}
