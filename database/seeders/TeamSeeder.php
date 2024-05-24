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
                'bio' => 'John is the CEO of the company and has over 20 years of experience in the industry.'
            ],
            [
                'nama' => 'Kharafi Dwi Andika',
                'jabatan' => 'Admin-1',
                'photo' => 'team-2.png',
                'bio' => 'Jane is the CTO and a tech visionary with numerous successful projects under her belt.'
            ],
            [
                'nama' => 'Valentino Aldo',
                'jabatan' => 'Admin-2',
                'photo' => 'team-3.png',
                'bio' => 'Mike oversees the financial operations and ensures the company\'s financial health.'
            ],
            [
                'nama' => 'Ahmad Shodiqin',
                'jabatan' => 'Admin-3',
                'photo' => 'team-4.png',
                'bio' => 'Emily is the COO and ensures smooth operations across all departments.'
            ],
            [
                'nama' => 'Avila Difa Adhiguna',
                'jabatan' => 'Admin-4',
                'photo' => 'team-5.png',
                'bio' => 'David is the CMO, responsible for marketing strategies and campaigns.'
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
