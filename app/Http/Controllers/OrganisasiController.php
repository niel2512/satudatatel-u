<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        // Tim Pengembang Satu Data
        $teamLeader = [
            'name'     => 'Villy Satria Praditha',
            'role'     => 'Kepala Urusan Satu Data',
            'photo'    => '/images/team/villy.jpg',
        ];

        $teamMembers = [
            [
                'name'  => 'Nur Fuad Azizi',
                'role'  => 'Back End Developer',
                'photo' => '/images/team/fuad.jpg',
            ],
            [
                'name'  => 'Yakup Asmady Atanggae',
                'role'  => 'Data Management Officer',
                'photo' => '/images/team/yakup.jpg',
            ],
            [
                'name'  => 'Faridz',
                'role'  => 'Front End Developer',
                'photo' => '/images/team/faridz.jpg',
            ],
        ];

        // Struktur Organisasi PuTI
        $orgStructure = [
            'root' => [
                'title' => 'Direktur Pusat Teknologi Informasi',
                'color' => 'red',
            ],
            'level1' => [
                [
                    'title' => 'Kepala Bagian Pengembangan Produk TI',
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
                    'title' => 'Kepala Bagian Riset dan Layanan TI',
                    'children' => [
                        ['title' => 'Kepala Urusan Satu Data'],
                        ['title' => 'Back End Developer'],
                        ['title' => 'Data Management'],
                    ],
                ],
                [
                    'title' => 'Kepala Bagian Infrastruktur TI',
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
