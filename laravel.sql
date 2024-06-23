-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2024 pada 04.52
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days_count` int(11) NOT NULL,
  `booking_fee` decimal(10,2) NOT NULL,
  `with_driver` tinyint(1) NOT NULL,
  `pickup` enum('Ambil Sendiri','Diantar Sesuai Alamat') NOT NULL,
  `driver_fee` decimal(10,2) DEFAULT NULL,
  `total_fee` decimal(10,2) NOT NULL,
  `booking_status` enum('Menunggu Pembayaran','Menunggu Konfirmasi','Sudah Dibayar','Pembayaran Terkonfirmasi','Belum Dikembalikan','Selesai','Dibatalkan') NOT NULL,
  `booking_code` char(36) NOT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `start_date`, `end_date`, `days_count`, `booking_fee`, `with_driver`, `pickup`, `driver_fee`, `total_fee`, `booking_status`, `booking_code`, `snap_token`, `vehicle_type`, `vehicle_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-06-21', '2024-06-22', 2, '600000.00', 0, 'Diantar Sesuai Alamat', '0.00', '600000.00', 'Selesai', 'OA3UD', '2f1e806a-afbe-4abd-a006-d026297c6dc2', 'car', 1, '2024-06-20 07:44:52', '2024-06-20 07:45:48'),
(2, 3, '2024-06-22', '2024-06-23', 2, '600000.00', 0, 'Diantar Sesuai Alamat', '0.00', '600000.00', 'Menunggu Pembayaran', 'QH6OH', '3985d105-79bc-4471-bbb4-fea5e505b686', 'car', 2, '2024-06-20 09:32:48', '2024-06-20 09:32:50'),
(3, 3, '2024-06-22', '2024-06-23', 2, '600000.00', 0, 'Ambil Sendiri', '0.00', '600000.00', 'Selesai', 'QPWX6', '33779022-43e3-43bb-aa13-6a337d82fc18', 'car', 1, '2024-06-20 19:39:20', '2024-06-20 19:39:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cancellations`
--

CREATE TABLE `cancellations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `refund_account` varchar(255) DEFAULT NULL,
  `proof_payment` varchar(255) DEFAULT NULL,
  `refund_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `pintu` int(11) NOT NULL,
  `penumpang` int(11) NOT NULL,
  `description` text NOT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL,
  `image4` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cars`
--

INSERT INTO `cars` (`id`, `nama_mobil`, `slug`, `plat_nomor`, `type_id`, `price`, `pintu`, `penumpang`, `description`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Suzuki Ertiga', 'suzuki-ertiga', 'H 28 YT', 1, '300000.00', 5, 6, 'Mobil MPV yang ideal untuk keluarga dengan desain yang modern dan efisien.', 'cars/images/mpv-suzuki-ertiga-1.png', 'cars/images/mpv-suzuki-ertiga-2.png', 'cars/images/mpv-suzuki-ertiga-3.png', 'cars/images/mpv-suzuki-ertiga-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(2, 'Toyota Calya', 'toyota-calya', 'H 29 YT', 1, '300000.00', 5, 4, 'MPV kompak dengan desain yang stylish dan efisiensi bahan bakar yang baik.', 'cars/images/mpv-toyota-calya-1.png', 'cars/images/mpv-toyota-calya-2.png', 'cars/images/mpv-toyota-calya-3.png', 'cars/images/mpv-toyota-calya-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(3, 'Toyota Innova', 'toyota-innova', 'H 30 YT', 1, '900000.00', 5, 8, 'MPV yang luas dan nyaman, cocok untuk keluarga besar atau perjalanan jarak jauh.', 'cars/images/mpv-toyota-innova-1-hitam.png', 'cars/images/mpv-toyota-innova-2-hitam.png', 'cars/images/mpv-toyota-innova-3-hitam.png', 'cars/images/mpv-toyota-innova-4-hitam.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(4, 'Toyota Innova', 'toyota-innova', 'H 31 YT', 1, '1100000.00', 5, 8, 'Varian warna lain dari Toyota Innova yang menawarkan ruang yang luas dan kenyamanan maksimal.', 'cars/images/mpv-toyota-innova-1-putih.png', 'cars/images/mpv-toyota-innova-2-putih.png', 'cars/images/mpv-toyota-innova-3-putih.png', 'cars/images/mpv-toyota-innova-4-putih.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(5, 'Toyota Venturer', 'toyota-venturer', 'H 32 YT', 1, '700000.00', 5, 8, 'SUV dengan desain sporty yang cocok untuk petualangan dan gaya hidup aktif.', 'cars/images/mpv-toyota-venturer-1-abu.png', 'cars/images/mpv-toyota-venturer-2-abu.png', 'cars/images/mpv-toyota-venturer-3-abu.png', 'cars/images/mpv-toyota-venturer-4-abu.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(6, 'Toyota Venturer', 'toyota-venturer', 'H 33 YT', 1, '500000.00', 5, 6, 'Varian warna lain dari Toyota Venturer yang memberikan kombinasi gaya dan kenyamanan.', 'cars/images/mpv-toyota-venturer-1-putih.png', 'cars/images/mpv-toyota-venturer-2-putih.png', 'cars/images/mpv-toyota-venturer-3-putih.png', 'cars/images/mpv-toyota-venturer-4-putih.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(7, 'Daihatsu Terios', 'daihatsu-terios', 'H 34 YT', 2, '500000.00', 5, 8, 'SUV kompak yang tangguh dan handal di berbagai medan.', 'cars/images/suv-daihatsu-terios-1.png', 'cars/images/suv-daihatsu-terios-2.png', 'cars/images/suv-daihatsu-terios-3.png', 'cars/images/suv-daihatsu-terios-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(8, 'Honda BRV', 'honda-brv', 'H 35 YT', 2, '800000.00', 5, 8, 'SUV yang elegan dengan ruang kabin luas, cocok untuk perjalanan keluarga atau bersama teman.', 'cars/images/suv-honda-brv-1-hitam.png', 'cars/images/suv-honda-brv-2-hitam.png', 'cars/images/suv-honda-brv-3-hitam.png', 'cars/images/suv-honda-brv-4-hitam.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(9, 'Honda BRV', 'honda-brv', 'H 36 YT', 2, '500000.00', 5, 6, 'Varian warna lain dari Honda BRV yang menawarkan gaya dan kenyamanan.', 'cars/images/suv-honda-brv-1-putih.png', 'cars/images/suv-honda-brv-2-putih.png', 'cars/images/suv-honda-brv-3-putih.png', 'cars/images/suv-honda-brv-4-putih.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(10, 'Honda CRV', 'honda-crv', 'H 37 YT', 2, '500000.00', 5, 4, 'SUV premium dengan desain elegan dan fitur canggih untuk kenyamanan maksimal.', 'cars/images/suv-honda-crv-1.png', 'cars/images/suv-honda-crv-2.png', 'cars/images/suv-honda-crv-3.png', 'cars/images/suv-honda-crv-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(11, 'Honda HRV', 'honda-hrv', 'H 38 YT', 2, '400000.00', 5, 4, 'SUV kompak dengan gaya yang dinamis dan efisiensi bahan bakar yang baik.', 'cars/images/suv-honda-hrv-1.png', 'cars/images/suv-honda-hrv-2.png', 'cars/images/suv-honda-hrv-3.png', 'cars/images/suv-honda-hrv-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(12, 'Honda WRV', 'honda-wrv', 'H 39 YT', 2, '500000.00', 5, 4, 'SUV modern yang cocok untuk kehidupan perkotaan dengan kenyamanan dan keamanan yang prima.', 'cars/images/suv-honda-wrv-1.png', 'cars/images/suv-honda-wrv-2.png', 'cars/images/suv-honda-wrv-3.png', 'cars/images/suv-honda-wrv-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(13, 'Honda CRV', 'honda-crv', 'H 40 YT', 2, '500000.00', 5, 4, 'SUV premium dengan desain elegan dan fitur canggih untuk kenyamanan maksimal.', 'cars/images/suv-honda-crv-1.png', 'cars/images/suv-honda-crv-2.png', 'cars/images/suv-honda-crv-3.png', 'cars/images/suv-honda-crv-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(14, 'Mitsubishi Xpander', 'mitsubishi-xpander', 'H 41 YT', 2, '500000.00', 5, 8, 'MPV dengan desain futuristik dan ruang kabin yang luas, ideal untuk perjalanan keluarga.', 'cars/images/suv-mitsubishi-xpander-1.png', 'cars/images/suv-mitsubishi-xpander-2.png', 'cars/images/suv-mitsubishi-xpander-3.png', 'cars/images/suv-mitsubishi-xpander-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(15, 'Toyota Fortuner', 'toyota-fortuner', 'H 42 YT', 2, '1400000.00', 5, 8, 'SUV yang kuat dan tangguh, cocok untuk petualangan di segala medan.', 'cars/images/suv-toyota-fortuner-1.png', 'cars/images/suv-toyota-fortuner-2.png', 'cars/images/suv-toyota-fortuner-3.png', 'cars/images/suv-toyota-fortuner-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(16, 'Honda Jazz', 'honda-jazz', 'H 43 YT', 3, '400000.00', 5, 4, 'Hatchback yang energik dengan ruang kabin yang fleksibel dan efisiensi bahan bakar yang baik.', 'cars/images/hatchback-honda-jazz-1.png', 'cars/images/hatchback-honda-jazz-2.png', 'cars/images/hatchback-honda-jazz-3.png', 'cars/images/hatchback-honda-jazz-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(17, 'Honda Accord', 'honda-accord', 'H 44 YT', 4, '1000000.00', 5, 8, 'Sedan premium dengan performa tinggi dan desain yang elegan, cocok untuk gaya hidup profesional.', 'cars/images/sedan-honda-accord-1.png', 'cars/images/sedan-honda-accord-2.png', 'cars/images/sedan-honda-accord-3.png', 'cars/images/sedan-honda-accord-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(18, 'Honda City', 'honda-city', 'H 45 YT', 4, '400000.00', 5, 4, 'Sedan kompak yang menggabungkan kenyamanan dan kepraktisan dalam satu paket.', 'cars/images/sedan-honda-city-1.png', 'cars/images/sedan-honda-city-2.png', 'cars/images/sedan-honda-city-3.png', 'cars/images/sedan-honda-city-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(19, 'Toyota Camry', 'toyota-camry', 'H 46 YT', 4, '700000.00', 5, 6, 'Sedan mewah dengan teknologi canggih dan kenyamanan premium untuk pengalaman berkendara yang istimewa.', 'cars/images/sedan-toyota-camry-1.png', 'cars/images/sedan-toyota-camry-2.png', 'cars/images/sedan-toyota-camry-3.png', 'cars/images/sedan-toyota-camry-4.png', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_awal` varchar(255) NOT NULL,
  `nama_akhir` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biaya_driver` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `drivers`
--

INSERT INTO `drivers` (`id`, `biaya_driver`, `created_at`, `updated_at`) VALUES
(1, '250000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Bagaimana cara melakukan pemesanan Kendaraan di OtoRent?', 'Kunjungi halaman pemesanan, pilih mobil dan waktu sewa, lalu isi formulir dan lakukan pembayaran. Admin akan mengonfirmasi penyewaan Anda.', NULL, NULL),
(2, 'Apa syarat dan ketentuan untuk menyewa Kendaraan di OtoRent?', 'Anda harus memiliki usia minimal 17 tahun. Memiliki SIM yang masih berlaku. Menyediakan identitas yang valid, seperti KTP.', NULL, NULL),
(3, 'Bagaimana metode pembayaran yang diterima?', 'Kami menerima pembayaran melalui transfer bank dan dompet digital.', NULL, NULL),
(4, 'Apakah ada biaya tambahan yang harus saya bayar?', 'Biaya sewa mobil sudah termasuk dalam harga yang tertera. Namun, biaya seperti pengemudi tambahan dan bahan bakar ditanggung oleh penyewa.', NULL, NULL),
(5, 'Bagaimana kebijakan pembatalan?', 'Jika pembayaran belum diterima dalam 1 hari, penyewaan otomatis dibatalkan.', NULL, NULL),
(6, 'Bagaimana kebijakan Denda di OtoRent?', 'Jika penyewa melebihi masa sewa, maka akan dikenakan denda sebesar biaya sewa per-hari', NULL, NULL),
(7, 'Apakah ada batasan jarak perjalanan?', 'Kami memberikan jarak perjalanan yang tidak terbatas.', NULL, NULL),
(8, 'Bagaimana cara menghubungi Pihak OtoRent?', 'Anda dapat menghubungi tim dukungan kami melalui nomor telepon atau email yang tertera di halaman kontak kami.', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `booking_code` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_26_080734_create_types_table', 1),
(6, '2023_03_27_090022_create_categories_table', 1),
(7, '2023_03_27_091052_create_cars_table', 1),
(8, '2023_03_27_091600_create_testimonials_table', 1),
(9, '2023_03_27_091847_create_blogs_table', 1),
(10, '2023_03_27_093240_create_teams_table', 1),
(11, '2023_03_27_093547_create_contacts_table', 1),
(12, '2023_03_27_094121_create_settings_table', 1),
(13, '2024_05_23_010410_create_users_table', 1),
(14, '2024_05_28_085529_create_motorcycles_table', 1),
(15, '2024_05_28_112103_create_type_motorcycles_table', 1),
(16, '2024_05_30_181023_create_bookings_table', 1),
(17, '2024_05_30_181208_create_drivers_table', 1),
(18, '2024_06_03_071005_create_feedbacks_table', 1),
(19, '2024_06_08_151843_create_faqs_table', 1),
(20, '2024_06_13_085357_create_cancellations_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `motorcycles`
--

CREATE TABLE `motorcycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_motor` varchar(255) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `description` text NOT NULL,
  `image1` text DEFAULT NULL,
  `image2` text DEFAULT NULL,
  `image3` text DEFAULT NULL,
  `image4` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `motorcycles`
--

INSERT INTO `motorcycles` (`id`, `nama_motor`, `plat_nomor`, `slug`, `type_id`, `price`, `description`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honda Beat', 'AD 2345 VW', 'honda-beat', 1, '70000.00', 'Honda Beat Pink adalah pilihan sempurna bagi mereka yang mencari kendaraan dengan tampilan ceria dan energik. Warna pink yang mencolok sangat cocok untuk kaum muda atau mereka yang ingin tampil berbeda di jalan. Motor ini ideal untuk penggunaan harian di perkotaan, dengan desain yang ramping dan mudah dikendarai.', 'motorcycles/images/matic-honda-beat-1-1-pink.jpg', 'motorcycles/images/matic-honda-beat-1-2-pink.jpg', 'motorcycles/images/matic-honda-beat-1-3-pink.jpg', 'motorcycles/images/matic-honda-beat-1-4-pink.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(2, 'Honda Beat', 'AD 2346 VW', 'honda-beat', 1, '70000.00', 'Honda Beat Hitam menawarkan kesan elegan dan maskulin. Warna hitam yang klasik cocok untuk semua kalangan, baik pria maupun wanita. Motor ini sangat cocok untuk perjalanan sehari-hari, termasuk pergi ke kantor atau kampus, karena tampilannya yang netral dan elegan.', 'motorcycles/images/matic-honda-beat-2-1-hitam.jpg', 'motorcycles/images/matic-honda-beat-2-2-hitam.jpg', 'motorcycles/images/matic-honda-beat-2-3-hitam.jpg', 'motorcycles/images/matic-honda-beat-2-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(3, 'Honda Beat', 'AD 2347 VW', 'honda-beat', 1, '70000.00', 'Honda Beat Putih adalah pilihan yang sempurna bagi mereka yang menyukai tampilan bersih dan modern. Warna putih memberikan kesan stylish dan cocok untuk segala situasi, baik itu untuk aktivitas sehari-hari atau jalan-jalan santai di akhir pekan.', 'motorcycles/images/matic-honda-beat-3-1-putih.jpg', 'motorcycles/images/matic-honda-beat-3-2-putih.jpg', 'motorcycles/images/matic-honda-beat-3-3-putih.jpg', 'motorcycles/images/matic-honda-beat-3-4-putih.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(4, 'Honda Vario', 'AD 2348 VW', 'honda-vario', 1, '80000.00', 'Honda Vario Hitam adalah motor yang menggabungkan kekuatan dan gaya. Warna hitam yang kuat membuatnya terlihat gagah dan cocok untuk pengendara yang membutuhkan kendaraan dengan performa tangguh serta desain yang menarik. Cocok untuk penggunaan di perkotaan maupun perjalanan jarak menengah.', 'motorcycles/images/matic-honda-vario-1-1-hitam.jpg', 'motorcycles/images/matic-honda-vario-1-2-hitam.jpg', 'motorcycles/images/matic-honda-vario-1-3-hitam.jpg', 'motorcycles/images/matic-honda-vario-1-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(5, 'Yamaha Lexi', 'AD 2349 VW', 'yamaha-lexi', 1, '105000.00', 'Yamaha Lexi Hitam hadir dengan desain modern dan sporty. Warna hitamnya memberikan tampilan yang dinamis dan berkelas. Motor ini sangat cocok untuk mereka yang mencari kenyamanan dan kepraktisan dalam berkendara, terutama untuk perjalanan harian di kota.', 'motorcycles/images/matic-yamaha-lexi-1-1-hitam.jpg', 'motorcycles/images/matic-yamaha-lexi-1-2-hitam.jpg', 'motorcycles/images/matic-yamaha-lexi-1-3-hitam.jpg', 'motorcycles/images/matic-yamaha-lexi-1-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(6, 'Yamaha Nmax', 'AD 2350 VW', 'yamaha-nmax', 1, '150000.00', 'Yamaha Nmax Putih adalah pilihan ideal untuk mereka yang menginginkan kenyamanan dan performa tinggi. Warna putih yang elegan membuat motor ini terlihat mewah dan cocok untuk pengendara yang sering melakukan perjalanan jarak jauh atau membutuhkan kenyamanan ekstra saat berkendara di kota.', 'motorcycles/images/matic-yamaha-nmax-1-1-putih.jpg', 'motorcycles/images/matic-yamaha-nmax-1-2-putih.jpg', 'motorcycles/images/matic-yamaha-nmax-1-3-putih.jpg', 'motorcycles/images/matic-yamaha-nmax-1-4-putih.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(7, 'Honda PCX', 'AD 2351 VW', 'honda-pcx', 1, '135000.00', 'Honda PCX Hitam menawarkan kenyamanan dan kemewahan dalam satu paket. Warna hitamnya yang elegan cocok untuk pengendara yang mencari motor dengan fitur lengkap dan desain premium. Ideal untuk perjalanan harian maupun touring.', 'motorcycles/images/matic-honda-pcx-1-1-hitam.jpg', 'motorcycles/images/matic-honda-pcx-1-2-hitam.jpg', 'motorcycles/images/matic-honda-pcx-1-3-hitam.jpg', 'motorcycles/images/matic-honda-pcx-1-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(8, 'Honda Vario', 'AD 2352 VW', 'honda-vario', 1, '80000.00', 'Honda Vario Merah adalah motor yang mencolok dan energik. Warna merah yang cerah sangat cocok untuk mereka yang ingin tampil berani dan penuh semangat. Motor ini sangat cocok untuk pengendara muda dan dinamis, baik untuk perjalanan ke kampus atau aktivitas harian lainnya.', 'motorcycles/images/matic-honda-vario-2-1-merah.jpg', 'motorcycles/images/matic-honda-vario-2-2-merah.jpg', 'motorcycles/images/matic-honda-vario-2-3-merah.jpg', 'motorcycles/images/matic-honda-vario-2-4-merah.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(9, 'Honda Revo', 'AD 2353 VW', 'honda-revo', 2, '100000.00', 'Honda Revo Hitam adalah pilihan praktis untuk pengendara yang mencari efisiensi dan daya tahan. Warna hitamnya yang klasik membuatnya cocok untuk segala usia dan kebutuhan, baik untuk perjalanan sehari-hari atau kegiatan bisnis.', 'motorcycles/images/bebek-honda-revo-1-1-hitam.jpg', 'motorcycles/images/bebek-honda-revo-1-2-hitam.jpg', 'motorcycles/images/bebek-honda-revo-1-3-hitam.jpg', 'motorcycles/images/bebek-honda-revo-1-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(10, 'Honda Supra', 'AD 2354 VW', 'honda-supra', 2, '70000.00', 'Honda Supra Biru menawarkan kesan segar dan dinamis. Warna birunya memberikan tampilan yang sporty dan modern, cocok untuk pengendara muda maupun dewasa yang mencari motor dengan performa handal dan tampilan menarik.', 'motorcycles/images/bebek-honda-supra-2-1-biru.jpg', 'motorcycles/images/bebek-honda-supra-2-2-biru.jpg', 'motorcycles/images/bebek-honda-supra-2-3-biru.jpg', 'motorcycles/images/bebek-honda-supra-2-4-biru.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(11, 'Honda Supra X', 'AD 2355 VW', 'honda-supra-x', 2, '70000.00', 'Honda Supra X Merah adalah motor dengan desain sporty dan energik. Warna merahnya yang mencolok cocok untuk mereka yang ingin tampil berbeda dan penuh gaya di jalanan. Ideal untuk berbagai kebutuhan, dari aktivitas harian hingga perjalanan jarak menengah.', 'motorcycles/images/bebek-honda-supra-3-1-merah.jpg', 'motorcycles/images/bebek-honda-supra-3-2-merah.jpg', 'motorcycles/images/bebek-honda-supra-3-3-merah.jpg', 'motorcycles/images/bebek-honda-supra-3-4-merah.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(12, 'Honda Supra X', 'AD 2356 VW', 'honda-supra-x', 2, '70000.00', 'Honda Supra X Merah adalah motor dengan desain sporty dan energik. Warna merahnya yang mencolok cocok untuk mereka yang ingin tampil berbeda dan penuh gaya di jalanan. Ideal untuk berbagai kebutuhan, dari aktivitas harian hingga perjalanan jarak menengah.', 'motorcycles/images/bebek-honda-supra-1-1-merah.jpg', 'motorcycles/images/bebek-honda-supra-1-2-merah.jpg', 'motorcycles/images/bebek-honda-supra-1-3-merah.jpg', 'motorcycles/images/bebek-honda-supra-1-4-merah.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(13, 'Yamaha R15', 'AD 2357 VW', 'yamaha-r15', 3, '200000.00', 'Yamaha R15 Kuning adalah motor sport yang menawarkan performa tinggi dan desain agresif. Warna kuning yang mencolok membuatnya sangat menarik perhatian dan cocok untuk pengendara yang menginginkan kecepatan dan tampilan sporty.', 'motorcycles/images/sport-yamaha-r15-1-1-kuning.jpg', 'motorcycles/images/sport-yamaha-r15-1-2-kuning.jpg', 'motorcycles/images/sport-yamaha-r15-1-3-kuning.jpg', 'motorcycles/images/sport-yamaha-r15-1-4-kuning.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(14, 'Honda CBR', 'AD 2358 VW', 'honda-cbr', 3, '200000.00', 'Honda CBR Oranye adalah motor sport dengan desain yang agresif dan penuh gaya. Warna oranye yang mencolok membuatnya ideal untuk mereka yang ingin tampil beda dan menonjol di jalanan. Cocok untuk pengendara yang mengutamakan performa dan tampilan.', 'motorcycles/images/sport-honda-cbr-1-1-orange.jpg', 'motorcycles/images/sport-honda-cbr-1-2-orange.jpg', 'motorcycles/images/sport-honda-cbr-1-3-orange.jpg', 'motorcycles/images/sport-honda-cbr-1-4-orange.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(15, 'Honda CBR', 'AD 2359 VW', 'honda-cbr', 3, '200000.00', ' Honda CBR Hitam adalah motor sport yang menggabungkan performa tinggi dengan desain yang elegan dan agresif. Warna hitam yang klasik memberikan kesan maskulin dan mewah, membuat motor ini cocok untuk pengendara yang ingin tampil berkelas di jalan.', 'motorcycles/images/sport-honda-cbr-2-1-hitam.jpg', 'motorcycles/images/sport-honda-cbr-2-2-hitam.jpg', 'motorcycles/images/sport-honda-cbr-2-3-hitam.jpg', 'motorcycles/images/sport-honda-cbr-2-4-hitam.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36'),
(16, 'Suzuki GSX', 'H 6754 VW', 'suzuki-gsx', 3, '200000.00', 'Suzuki GSX Biru adalah motor sport yang menawarkan performa tinggi dan desain stylish. Warna biru memberikan tampilan yang segar dan modern, cocok untuk pengendara yang mencari keseimbangan antara gaya dan kecepatan. Ideal untuk penggunaan di trek maupun di jalan raya.', 'motorcycles/images/sport-suzuki-gsx-1-1-biru.jpg', 'motorcycles/images/sport-suzuki-gsx-1-2-biru.jpg', 'motorcycles/images/sport-suzuki-gsx-1-3-biru.jpg', 'motorcycles/images/sport-suzuki-gsx-1-4-biru.jpg', 1, '2024-06-20 07:37:36', '2024-06-20 07:37:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jam_buka` text NOT NULL,
  `footer_description` text NOT NULL,
  `tentang_perusahaan` text NOT NULL,
  `sejarah_perusahaan` text NOT NULL,
  `tentang_team` text NOT NULL,
  `hubungi_kami` text NOT NULL,
  `maps` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `nama_perusahaan`, `logo`, `alamat`, `phone`, `email`, `jam_buka`, `footer_description`, `tentang_perusahaan`, `sejarah_perusahaan`, `tentang_team`, `hubungi_kami`, `maps`, `facebook`, `instagram`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'OtoRent', 'public/frontend/img/logo/logo-OtoRent.png', 'Jl. Pemuda No. 111, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah', '089619636519', 'otorent@gmail.com', 'Setiap hari jam 07.00 - 17.00 WIB', 'OtoRent - Solusi terpercaya untuk kebutuhan rental mobil dan motor Anda. Dengan pelayanan profesional dan armada kendaraan berkualitas, kami siap menemani perjalanan Anda dengan aman dan nyaman.', 'OtoRent menyediakan layanan rental mobil dan motor berkualitas untuk pengalaman perjalanan yang tak terlupakan. Kami menawarkan berbagai pilihan kendaraan yang memenuhi kebutuhan mobilitas Anda dengan pelayanan prima. Fokus pada kenyamanan, keamanan, dan keandalan membuat OtoRent menjadi mitra setia dalam setiap perjalanan, memungkinkan Anda menjelajahi kota atau petualangan jauh dengan percaya diri.', 'OtoRent berdiri sejak 2024 dengan tujuan memberikan layanan rental mobil dan motor yang terpercaya dan berkualitas tinggi. Sejak awal berdirinya, OtoRent berkomitmen untuk memenuhi kebutuhan transportasi pelanggan dengan menyediakan berbagai pilihan kendaraan yang terawat dan nyaman. Dalam perjalanannya, OtoRent terus berkembang dan memperluas jangkauan layanan, selalu mengutamakan kepuasan dan kenyamanan pelanggan dalam setiap aspek pelayanan.', 'OtoRent menciptakan pengalaman digital yang luar biasa di dunia otomatif. Dengan tim ahli yang berpengalaman dan berdidikasi, kami menghadirkan teknologi persewaan rental, desain website menarik, dan konten informatif untuk memenuhi kebutuhan Anda. Kami berkomitmen untuk terus berinovasi dan memberikan solusi terbaik bagi Anda. Mari berkenalan dengan Tim Pengembang Website OtoRent', 'Kami siap membantu Anda merencanakan perjalanan dengan armada terbaik serta layanan pelanggan yang ramah dan profesional. Nikmati kenyamanan dan keamanan dengan kendaraan yang terawat serta pemesanan yang mudah bersama kami.', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15829.12133303518!2d110.5058263!3d-7.3223756!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a791eea650a7b%3A0xa48e44ca27450c1b!2sGamelab%20Indonesia!5e0!3m2!1sid!2sid!4v1718876031310!5m2!1sid!2sid', 'https://web.facebook.com/Kharafi911?_rdc=1&_rdr', 'https://www.instagram.com/niddaaul/', 'https://x.com/KharafiA', 'https://www.linkedin.com/in/nidaauliaakarima/', '2024-06-20 07:37:35', '2024-06-20 07:37:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`id`, `nama`, `jabatan`, `photo`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Nida Aulia Karima', 'Chief Executive Officer (CEO)', 'public/frontend/img/team/team-1.jpg', 'Nida adalah pemimpin perusahaan yang mengarahkan visi dan strategi bisnis. Dia memastikan semua departemen bekerja menuju tujuan yang sama dan menjaga hubungan baik dengan stakeholder.', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(2, 'Kharafi Dwi Andika', 'Chief Technology Officer (CTO)', 'public/frontend/img/team/team-2.jpg', 'Kharafi adalah pemimpin teknis yang memastikan semua solusi teknologi sejalan dengan tujuan bisnis perusahaan. Dia bertanggung jawab atas visi teknologi dan memastikan inovasi terus berkembang.', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(3, 'Valentino Aldo', 'Chief Operating Officer (COO)', 'public/frontend/img/team/team-3.jpg', 'Valentino memastikan semua aspek operasional perusahaan berjalan lancar dan efisien. Dia mengkoordinasikan berbagai departemen untuk mencapai tujuan perusahaan.', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(4, 'Ahmad Shodiqin', 'Chief Financial Officer (CFO)', 'public/frontend/img/team/team-4.jpg', 'Ahmad mengawasi keuangan perusahaan, memastikan anggaran digunakan dengan efektif dan efisien. Dia juga bertanggung jawab atas laporan keuangan dan strategi keuangan jangka panjang.', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(5, 'Avila Difa Adhiguna', 'Chief Marketing Officer (CMO)', 'public/frontend/img/team/team-5.jpg', 'Avila bertanggung jawab atas semua aktivitas pemasaran dan promosi. Dia merancang strategi untuk meningkatkan visibilitas produk dan memastikan pesan perusahaan tersampaikan dengan efektif kepada pelanggan.', '2024-06-20 07:37:35', '2024-06-20 07:37:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `profile` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'MPV', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(2, 'SUV', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(3, 'Hatchback', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(4, 'Sedan', '2024-06-20 07:37:35', '2024-06-20 07:37:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_motorcycles`
--

CREATE TABLE `type_motorcycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `type_motorcycles`
--

INSERT INTO `type_motorcycles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Matic', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(2, 'Bebek', '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(3, 'Sport', '2024-06-20 07:37:35', '2024-06-20 07:37:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `sim` varchar(255) DEFAULT NULL,
  `account_status` enum('Belum Terverifikasi','Menunggu Verifikasi','Terverifikasi') NOT NULL DEFAULT 'Belum Terverifikasi',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `phone`, `address`, `ktp`, `sim`, `account_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@admin.com', NULL, '$2y$10$3WqInlBvg2Sv2DJsIykfz.0uH3lOou5lt5rJ.DqWCnV5ye8r5x4FC', 1, NULL, NULL, NULL, NULL, 'Terverifikasi', NULL, '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(2, NULL, 'user', 'user@user.com', '2024-06-20 16:31:12', '$2y$10$G6vOjHtzfoINeByRZL2LM.xlOKJUdggvRUilfkAPR/c1Pf5lMM2jS', 0, NULL, NULL, NULL, NULL, 'Terverifikasi', NULL, '2024-06-20 07:37:35', '2024-06-20 07:37:35'),
(3, '2UnyVWh2NWWjeSNTq7E50WikPD3hrb6JKC4Ef9kT.png', 'NIDA AULIA KARIMA', '111202113495@mhs.dinus.ac.id', '2024-06-21 14:43:19', '$2y$10$aDR6G3sVR5rFobHXy7.pGe9Z10ihElgMt6j0qq6q3wtA/Gqyjl6/O', 0, '088654977531', 'Semarang', NULL, NULL, 'Terverifikasi', NULL, '2024-06-20 07:40:31', '2024-06-20 07:51:10'),
(4, NULL, 'Kharafi Dwi Andika', 'kharaffidwiandhika@gmail.com', NULL, '$2y$10$Gw.xCIcgsmWHxAxRdO865OCfwtdMp7cRBJxi2oxFinWFBW7Jn7cm2', 0, NULL, NULL, NULL, NULL, 'Belum Terverifikasi', NULL, '2024-06-20 19:42:29', '2024-06-20 19:42:29'),
(5, NULL, 'Ahmad Shodiqin', 'nexusgaming991@gmail.com', NULL, '$2y$10$LX3QrdX43WRrzbnUmLp9JOLrNqb/SpZg1kneq16iakjaux/ferhPm', 0, NULL, NULL, NULL, NULL, 'Belum Terverifikasi', NULL, '2024-06-20 19:45:08', '2024-06-20 19:45:08'),
(6, NULL, 'Valentino Aldo', 'valentinoaldoo7@gmail.com', NULL, '$2y$10$Jfo9LkBYNjTURL.QDBK/h.xzdnMPMMDl7nYawxZuTg5YaHy4Lq9gW', 0, NULL, NULL, NULL, NULL, 'Belum Terverifikasi', NULL, '2024-06-20 19:46:28', '2024-06-20 19:46:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `blogs` ADD FULLTEXT KEY `search` (`title`,`slug`,`excerpt`,`description`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookings_booking_code_unique` (`booking_code`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_vehicle_id_vehicle_type_index` (`vehicle_id`,`vehicle_type`);

--
-- Indeks untuk tabel `cancellations`
--
ALTER TABLE `cancellations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancellations_user_id_foreign` (`user_id`),
  ADD KEY `cancellations_booking_code_foreign` (`booking_code`);

--
-- Indeks untuk tabel `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `motorcycles`
--
ALTER TABLE `motorcycles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `type_motorcycles`
--
ALTER TABLE `type_motorcycles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cancellations`
--
ALTER TABLE `cancellations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `motorcycles`
--
ALTER TABLE `motorcycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `type_motorcycles`
--
ALTER TABLE `type_motorcycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cancellations`
--
ALTER TABLE `cancellations`
  ADD CONSTRAINT `cancellations_booking_code_foreign` FOREIGN KEY (`booking_code`) REFERENCES `bookings` (`booking_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `cancellations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
