<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Directorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Csv as CsvReader;

class KatalogDatasetController extends Controller
{
    public function index(Request $request): \Illuminate\View\View
    {
        $search    = $request->get('search', '');
        $dirFilter = $request->get('direktorat', '');
        $perPage   = 3;

        $query = Dataset::published()
            ->with(['directorate', 'dataOwner'])
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
            ->with(['directorate', 'dataOwner'])
            ->where('slug', $slug)
            ->firstOrFail();

        // ── Parse file untuk preview ────────────────────────────────
        $previewHeaders = [];
        $previewRows    = [];

        if ($dataset->file_path && Storage::disk('public')->exists($dataset->file_path)) {
            try {
                $fullPath  = Storage::disk('public')->path($dataset->file_path);
                $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));

                if ($extension === 'csv') {
                    $reader = new CsvReader();
                    $reader->setDelimiter(',');
                    $reader->setEnclosure('"');
                } else {
                    $reader = IOFactory::createReaderForFile($fullPath);
                }

                // Hanya baca data yang diperlukan
                $reader->setReadDataOnly(true);
                $spreadsheet = $reader->load($fullPath);
                $worksheet   = $spreadsheet->getActiveSheet();
                $rows        = $worksheet->toArray(null, true, true, false);

                if (count($rows) > 0) {
                    // Baris pertama = header
                    $previewHeaders = array_values($rows[0] ?? []);

                    // Ambil max 5 baris data (skip header)
                    $dataRows = array_slice($rows, 1, 5);
                    foreach ($dataRows as $row) {
                        $previewRows[] = array_values($row);
                    }
                }

                $spreadsheet->disconnectWorksheets();
                unset($spreadsheet);
            } catch (\Throwable $e) {
                // Jika gagal parse, tampilkan pesan error di preview
                $previewHeaders = [];
                $previewRows    = [];
            }
        }

        return view('katalog-dataset.show', compact('dataset', 'previewHeaders', 'previewRows'));
    }

    /**
     * Download file dataset.
     */
    public function download(string $slug)
    {
        $dataset = Dataset::published()
            ->where('slug', $slug)
            ->firstOrFail();

        if (! $dataset->file_path || ! Storage::disk('public')->exists($dataset->file_path)) {
            abort(404, 'File dataset tidak ditemukan.');
        }

        $extension    = pathinfo($dataset->file_path, PATHINFO_EXTENSION);
        $downloadName = \Illuminate\Support\Str::slug($dataset->title) . '.' . $extension;

        return Storage::disk('public')->download($dataset->file_path, $downloadName);
    }
}
