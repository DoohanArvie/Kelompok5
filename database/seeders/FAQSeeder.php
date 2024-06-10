<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Bagaimana cara melakukan pemesanan mobil?', 
                'answer' => 'Kunjungi halaman pemesanan kami, Pilih jenis mobil yang diinginkan, pilih tanggal dan waktu sewa. Setelah mengisi formulir pemesanan, Anda harus membayar biaya sewa dan admin akan mengkonfirmasi sewa.'
            ],
            [
                'question' => 'Apa syarat dan ketentuan untuk menyewa mobil?',
                'answer'=> 'Anda harus memiliki usia minimal 21 tahun. Memiliki SIM yang masih berlaku. Menyediakan identitas yang valid, seperti KTP.'
            ],
            [
                'question' => 'Bagaimana metode pembayaran yang diterima?', 
                'answer' => 'Kami menerima pembayaran dengan Transfer Rekening Bank.'
            ],
            [
                'question' => 'Apakah ada biaya tambahan yang harus saya bayar?', 
                'answer' => 'Biaya sewa mobil sudah termasuk dalam harga yang tertera. Namun, biaya seperti, biaya pengemudi tambahan dan biaya bahan bakar kendaraan ditanggung penyewa.'
            ],
            [
                'question' => 'Bagaimana kebijakan pembatalan?', 
                'answer' => 'Kebijakan pembatalan dapat bervariasi tergantung pada waktu pembatalan dan tipe penyewaan.'
            ],
            [
                'question' => 'Apakah ada batasan jarak perjalanan?', 
                'answer' => 'Biasanya, kami memberikan jarak perjalanan yang tidak terbatas.'
            ],
            [
                'question' => 'Apakah saya dapat mengubah atau membatalkan pemesanan saya?', 
                'answer' => 'Untuk mengubah atau membatalkan pemesanan, silakan hubungi tim dukungan kami melalui email atau telepon.'
            ],
            [
                'question' => 'Bagaimana cara menghubungi tim dukungan pelanggan?', 
                'answer' => 'Anda dapat menghubungi tim dukungan kami melalui nomor telepon atau email yang tercantum di halaman kontak kami.'
            ],
        ];

        Faq::insert($faqs);
    }
}