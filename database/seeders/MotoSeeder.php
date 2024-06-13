<?php

namespace Database\Seeders;

use App\Models\Motorcycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('frontend/img/motorcycles/');
        $destinationPath = 'public/motorcycles/images/';

        $motos = [
            [
                'id' => '1',
                'nama_motor' => 'Honda Beat',
                'slug' => 'honda-beat',
                'type_id' => '1',
                'price' => '100000',
                'description' => 'Honda Beat',
                'image1' => 'matic-honda-beat-1-1-pink.jpg',
                'image2' => 'matic-honda-beat-1-2-pink.jpg',
                'image3' => 'matic-honda-beat-1-3-pink.jpg',
                'image4' => 'matic-honda-beat-1-4-pink.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'nama_motor' => 'Honda Beat',
                'slug' => 'honda-beat',
                'type_id' => '1',
                'price' => '100000',
                'description' => 'Honda Beat',
                'image1' => 'matic-honda-beat-2-1-hitam.jpg',
                'image2' => 'matic-honda-beat-2-2-hitam.jpg',
                'image3' => 'matic-honda-beat-2-3-hitam.jpg',
                'image4' => 'matic-honda-beat-2-4-hitam.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'nama_motor' => 'Honda Beat',
                'slug' => 'honda-beat',
                'type_id' => '1',
                'price' => '100000',
                'description' => 'Honda Beat',
                'image1' => 'matic-honda-beat-3-1-putih.jpg',
                'image2' => 'matic-honda-beat-3-2-putih.jpg',
                'image3' => 'matic-honda-beat-3-3-putih.jpg',
                'image4' => 'matic-honda-beat-3-4-putih.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'nama_motor' => 'Honda Vario',
                'slug' => 'honda-vario',
                'type_id' => '1',
                'price' => '120000',
                'description' => 'Honda Vario',
                'image1' => 'matic-honda-vario-1-1-hitam.jpg',
                'image2' => 'matic-honda-vario-1-2-hitam.jpg',
                'image3' => 'matic-honda-vario-1-3-hitam.jpg',
                'image4' => 'matic-honda-vario-1-4-hitam.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'nama_motor' => 'Yamaha Lexi',
                'slug' => 'yamaha-lexi',
                'type_id' => '1',
                'price' => '100000',
                'description' => 'Yamaha Lexi',
                'image1' => 'matic-yamaha-lexi-1-1-hitam.jpg',
                'image2' => 'matic-yamaha-lexi-1-2-hitam.jpg',
                'image3' => 'matic-yamaha-lexi-1-3-hitam.jpg',
                'image4' => 'matic-yamaha-lexi-1-4-hitam.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'nama_motor' => 'Yamaha Nmax',
                'slug' => 'yamaha-nmax',
                'type_id' => '1',
                'price' => '150000',
                'description' => 'Yamaha Nmax',
                'image1' => 'matic-yamaha-nmax-1-1-putih.jpg',
                'image2' => 'matic-yamaha-nmax-1-2-putih.jpg',
                'image3' => 'matic-yamaha-nmax-1-3-putih.jpg',
                'image4' => 'matic-yamaha-nmax-1-4-putih.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '7',
                'nama_motor' => 'Honda Supra X',
                'slug' => 'honda-supra-x',
                'type_id' => '2',
                'price' => '100000',
                'description' => 'Honda Supra X',
                'image1' => 'bebek-honda-supra-1-1-merah.jpg',
                'image2' => 'bebek-honda-supra-1-2-merah.jpg',
                'image3' => 'bebek-honda-supra-1-3-merah.jpg',
                'image4' => 'bebek-honda-supra-1-4-merah.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '8',
                'nama_motor' => 'Yamaha R15',
                'slug' => 'yamaha-r15',
                'type_id' => '3',
                'price' => '200000',
                'description' => 'Yamaha R15',
                'image1' => 'sport-yamaha-r15-1-1-kuning.jpg',
                'image2' => 'sport-yamaha-r15-1-2-kuning.jpg',
                'image3' => 'sport-yamaha-r15-1-3-kuning.jpg',
                'image4' => 'sport-yamaha-r15-1-4-kuning.jpg',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($motos as $moto) {
            // Iterate over each image
            for ($i = 1; $i <= 4; $i++) {
                $imageKey = 'image' . $i;

                // Get source and destination paths for the current image
                $sourceFile = $sourcePath . $moto[$imageKey];
                $destinationFile = $destinationPath . basename($moto[$imageKey]);

                // Check if the destination file doesn't exist
                if (!Storage::exists($destinationFile)) {
                    // Copy the image to the destination path
                    Storage::put($destinationFile, file_get_contents($sourceFile));
                }

                // Update the photo path to the storage path for the current image
                $moto[$imageKey] = 'motorcycles/images/' . basename($moto[$imageKey]);
            }

            // Create the motorcycle record
            Motorcycle::create($moto);
        }
    }
}
