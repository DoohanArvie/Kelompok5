<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcePath = public_path('frontend/img/logo/');
        $destinationPath = 'public/frontend/img/logo/';

        $logoFileName = 'otorent.png';
        $sourceFile = $sourcePath . $logoFileName;
        $destinationFile = $destinationPath . $logoFileName;

        // Copy the image to the storage path
        if (!Storage::exists($destinationFile)) {
            Storage::put($destinationFile, file_get_contents($sourceFile));
        }

        $settings = [
            'nama_perusahaan' => 'OtoRent',
            'logo' => $destinationFile,
            'alamat' => 'Jl. Pemuda No. 111, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah',
            'phone' => '+62 821 1234 5678',
            'email' => 'otorent@example.com',
            'footer_description' => 'OtoRent - Solusi terpercaya untuk kebutuhan rental mobil dan motor Anda. Dengan pelayanan profesional dan armada kendaraan berkualitas, kami siap menemani perjalanan Anda dengan aman dan nyaman.',
            'tentang_perusahaan' => 'OtoRent adalah penyedia layanan rental mobil dan motor yang berkomitmen untuk memberikan pengalaman perjalanan yang tak terlupakan bagi pelanggan. Dengan berbagai pilihan kendaraan berkualitas mulai dari mobil hingga motor, OtoRent memastikan kebutuhan mobilitas pelanggan terpenuhi dengan pelayanan yang prima. Dengan fokus pada kenyamanan, keamanan, dan keandalan, OtoRent menjadi mitra setia dalam setiap perjalanan, memungkinkan pelanggan untuk menikmati kebebasan menjelajahi kota atau petualangan jauh dengan percaya diri.',
            'sejarah_perusahaan' => 'OtoRent berdiri sejak 2024 dengan tujuan memberikan layanan rental mobil dan motor yang terpercaya dan berkualitas tinggi. Sejak awal berdirinya, OtoRent berkomitmen untuk memenuhi kebutuhan transportasi pelanggan dengan menyediakan berbagai pilihan kendaraan yang terawat dan nyaman. Dalam perjalanannya, OtoRent terus berkembang dan memperluas jangkauan layanan, selalu mengutamakan kepuasan dan kenyamanan pelanggan dalam setiap aspek pelayanan.',
            'tentang_team' => 'OtoRent menciptakan pengalaman digital yang luar biasa di dunia otomatif. Dengan tim ahli yang berpengalaman dan berdidikasi, kami menghadirkan teknologi persewaan rental, desain website menarik, dan konten informatif untuk memenuhi kebutuhan Anda. Kami berkomitmen untuk terus berinovasi dan memberikan solusi terbaik bagi Anda. Mari berkenalan dengan Tim Pengembang Website OtoRent',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'twitter' => 'https://www.twitter.com/',
        ];

        Setting::create($settings);
    }
}
