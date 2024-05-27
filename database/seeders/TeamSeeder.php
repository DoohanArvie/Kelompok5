<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('frontend/img/team/');
        $destinationPath = 'public/frontend/img/team/';

        $teams = [
            [
                'nama' => 'Nida Aulia Karima',
                'jabatan' => 'Manager',
                'photo' => 'team-1.png',
                'bio' => 'Saya Manager di Perusahaan DeMobil. Bertanggung jawab dari proses pengembangan perusahaan DeMobil'
            ],
            [
                'nama' => 'Kharafi Dwi Andika',
                'jabatan' => 'Admin-1',
                'photo' => 'team-2.png',
                'bio' => 'Saya Admin 1, yang bertanggung jawab atas kinerja karyawan di perusahaan DeMobil'
            ],
            [
                'nama' => 'Valentino Aldo',
                'jabatan' => 'Admin-2',
                'photo' => 'team-3.png',
                'bio' => 'Saya Admin 2, yang membantu admin 1 dan manager dalam menangani setiap masalah yang berkaitan dengan perusahaan.'
            ],
            [
                'nama' => 'Ahmad Shodiqin',
                'jabatan' => 'Admin-3',
                'photo' => 'team-4.png',
                'bio' => 'Saya Admin 3, yang bertanggung jawab dalam memastikan segala alat perusahaan bekerja dengan semestiya.'
            ],
            [
                'nama' => 'Avila Difa Adhiguna',
                'jabatan' => 'Admin-4',
                'photo' => 'team-5.png',
                'bio' => 'Saya Admin 4, yang membantu admin 3 untuk mencatat segala urusan yang berkaitan dengan perusahaan.'
            ],
        ];

        foreach ($teams as $team) {
            // Copy the image to the storage path
            $sourceFile = $sourcePath . $team['photo'];
            $destinationFile = $destinationPath . $team['photo'];

            if (!Storage::exists($destinationFile)) {
                Storage::put($destinationFile, file_get_contents($sourceFile));
            }

            // Update the photo path to storage path
            $team['photo'] = $destinationFile;

            // Create the team record
            Team::create($team);
        }
    }
}
