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

        $logoFileName = 'logo-OtoRent.jpg';
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
            'phone' => '+62-896-1963-6519',
            'email' => 'otorent@example.com',
            'jam_buka' => 'Setiap hari jam 07.00 - 17.00 WIB',
            'footer_description' => 'OtoRent - Solusi terpercaya untuk kebutuhan rental mobil dan motor Anda. Dengan pelayanan profesional dan armada kendaraan berkualitas, kami siap menemani perjalanan Anda dengan aman dan nyaman.',
            'tentang_perusahaan' => 'OtoRent menyediakan layanan rental mobil dan motor berkualitas untuk pengalaman perjalanan yang tak terlupakan. Kami menawarkan berbagai pilihan kendaraan yang memenuhi kebutuhan mobilitas Anda dengan pelayanan prima. Fokus pada kenyamanan, keamanan, dan keandalan membuat OtoRent menjadi mitra setia dalam setiap perjalanan, memungkinkan Anda menjelajahi kota atau petualangan jauh dengan percaya diri.',
            'sejarah_perusahaan' => 'OtoRent berdiri sejak 2024 dengan tujuan memberikan layanan rental mobil dan motor yang terpercaya dan berkualitas tinggi. Sejak awal berdirinya, OtoRent berkomitmen untuk memenuhi kebutuhan transportasi pelanggan dengan menyediakan berbagai pilihan kendaraan yang terawat dan nyaman. Dalam perjalanannya, OtoRent terus berkembang dan memperluas jangkauan layanan, selalu mengutamakan kepuasan dan kenyamanan pelanggan dalam setiap aspek pelayanan.',
            'tentang_team' => 'OtoRent menciptakan pengalaman digital yang luar biasa di dunia otomatif. Dengan tim ahli yang berpengalaman dan berdidikasi, kami menghadirkan teknologi persewaan rental, desain website menarik, dan konten informatif untuk memenuhi kebutuhan Anda. Kami berkomitmen untuk terus berinovasi dan memberikan solusi terbaik bagi Anda. Mari berkenalan dengan Tim Pengembang Website OtoRent',
            'hubungi_kami' => 'Kami siap membantu Anda merencanakan perjalanan dengan armada terbaik dan layanan pelanggan yang ramah dan profesional. Nikmati kenyamanan dan keamanan dengan kendaraan yang terawat dan pemesanan yang mudah bersama kami.',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5647.815947689952!2d110.40922178236494!3d-6.984059781375486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708bbd7f1a5095%3A0xf65ef341c1525c5a!2sTugu%20Muda%20Semarang!5e0!3m2!1sid!2sid!4v1718334488887!5m2!1sid!2sid',
            'facebook' => 'https://web.facebook.com/Kharafi911?_rdc=1&_rdr',
            'instagram' => 'https://www.instagram.com/niddaaul/',
            'linkedin' => 'https://www.linkedin.com/in/nidaauliaakarima/',
            'twitter' => 'https://x.com/KharafiA',
        ];

        Setting::create($settings);
    }
}
