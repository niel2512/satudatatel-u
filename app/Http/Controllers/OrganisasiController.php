<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class OrganisasiController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        // Tim Pengembang Satu Data — dari database
        $team = TeamMember::ordered()->get();

        // Pemisahan leader & anggota biasa
        $teamLeader  = $team->where('is_leader', true)->first();
        $teamMembers = $team->where('is_leader', false)->values();

        // Struktur Organisasi PuTI — tetap statis
        $orgStructure = [
            'root' => ['title' => 'Direktur Pusat Teknologi Informasi', 'color' => 'red'],
            'level1' => [
                [
                    'title'    => 'Kepala Bagian Pengembangan Produk TI',
                    'children' => [
                        ['title' => 'Kepala Urusan Pengembangan Produk TI'],
                        ['title' => 'System Analyst'],
                        ['title' => 'Back End Developer'],
                        ['title' => 'Front End Developer'],
                        ['title' => 'UI/UX Designer'],
                        ['title' => 'Technical Writer'],
                    ],
                ],
                [
                    'title'    => 'Kepala Bagian Riset dan Layanan TI',
                    'children' => [
                        ['title' => 'Kepala Urusan Satu Data'],
                        ['title' => 'Back End Developer'],
                        ['title' => 'Data Management'],
                    ],
                ],
                [
                    'title'    => 'Kepala Bagian Infrastruktur TI',
                    'children' => [
                        ['title' => 'Kepala Urusan Pusat Data'],
                        ['title' => 'Staff Urusan Pusat Data'],
                    ],
                ],
            ],
        ];

        return view('organisasi.index', compact('teamLeader', 'teamMembers', 'orgStructure'));
    }
}
