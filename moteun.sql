-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2023 pada 05.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moteun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_siap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lahir_ditanam` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alerts`
--

INSERT INTO `alerts` (`id`, `name`, `name_id`, `jenis`, `kelamin`, `status`, `umur_siap`, `umur`, `lahir_ditanam`, `keterangan`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Sapi', '1', 'Hewan', 'Betina', 'Siap', '732', '786', '2020-12-31', '<p>Berkembang biak</p>', '2', '2023-02-11 20:11:18', '2023-02-25 08:36:58'),
(2, 'Sapi', '2', 'Hewan', 'Jantan', 'Siap', '732', '755', '2021-01-31', '<p>Berkembang biak</p>', '2', '2023-02-11 20:11:18', '2023-02-25 08:36:58'),
(3, 'Pohon Mangga Lali Jiwo', '1', 'Tanaman', 'Tanaman Berumah Tunggal', 'Siap', '732', '755', '2021-01-31', '<p>Berkembang biak</p>', '2', '2023-02-11 20:11:18', '2023-02-25 08:36:58'),
(4, 'Pohon Mangga Indramayu', '2', 'Tanaman', 'Tanaman Berumah Tunggal', 'Siap', '732', '755', '2021-01-31', '<p>Berkembang biak</p>', '2', '2023-02-11 20:11:18', '2023-02-25 08:36:58'),
(5, 'Unta', '4', 'Hewan', 'Jantan', 'Belum Siap', '1464', '27', '2023-01-29', '<p>Berkembang Biak</p>', '6', '2023-02-13 17:44:26', '2023-02-25 10:05:46'),
(6, 'Unta', '3', 'Hewan', 'Betina', 'Belum Siap', '1464', '27', '2023-01-29', '<p>Berkembang Biak</p>', '6', '2023-02-13 17:45:14', '2023-02-25 10:06:02'),
(7, 'Padi Koshihikari', '3', 'Tanaman', 'Tanaman Berumah Tunggal', 'Belum Siap', '120', '27', '2023-01-29', '<p>Hibridasi</p>', '6', '2023-02-13 18:04:17', '2023-02-25 10:06:13'),
(8, 'Padi Calrose Rice', '4', 'Tanaman', 'Tanaman Berumah Tunggal', 'Belum Siap', '140', '27', '2023-01-29', '<p>Hibridasi</p>', '6', '2023-02-13 18:04:43', '2023-02-25 10:06:25'),
(9, 'Pohon Mangga Lali Jiwo', '1', 'Tanaman', 'Betina', 'Belum Siap', '1464', '755', '2021-01-31', '<p>Cangkok Batang 2</p>', '2', '2023-02-16 22:02:20', '2023-02-25 08:30:45'),
(10, 'Pohon Mangga Lali Jiwo', '1', 'Tanaman', 'Betina', 'Siap', '732', '748', NULL, '<p>Cangkok Batang 2</p>', '2', '2023-02-16 22:09:22', '2023-02-16 22:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_tulis` date NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `tgl_tulis`, `penulis`, `deskripsi`, `image`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Merawat Unta yang Sedang Sakit', '2023-02-14', 'Izdihar Fazrianti', '<p>Dengan pemberian vitamin Wonder B untuk meningkatkan nafsu makan sekaligus daya tahan unta yag sakit serta dapat membuat unta menjadi lebih segar.</p>', 'unta.jpeg', '6', '2023-02-13 17:25:47', '2023-02-16 22:25:58'),
(3, 'Cara Hibridasi Padi', '2023-02-14', 'Admin', '<p>Dengan mengikat kedua bibit padi yang ingin dihibridasi secara pas dan tidak terlalu ketat. Catatan teknik ini harus diawasi oleh ahli atau pakar dalam bidang hibridasi untuk mengmbangbiakan padi</p>', 'padi.jpeg', '1', '2023-02-13 19:39:34', '2023-02-16 22:20:40'),
(4, 'Cara Menanam Buah Naga', '2023-02-14', 'Izdihar Fazrianti', '<p>Dengan biji buah mangga yang dikeringkan lalu ditanam pada media tanam yang sudah diberi nutrisi pupuk dan air secara teratur. Dalam menanam buah nagaharus di tempat yang tropis dan hanya ada dua musim.</p>', 'pohonbuahnaga.jpeg', '2', '2023-02-14 00:47:36', '2023-02-14 00:49:41'),
(6, 'Cara Mengembangbiakan Sapi', '2023-02-16', 'Izdihar Fazrianti', '<p>Sapi atau lembu adalah hewan ternak anggota famili Bovidae dan subfamili Bovinae. Sapi dipelihara terutama untuk dimanfaatkan susu dan dagingnya sebagai pangan manusia. Hasil sampingannya seperti kulit, jeroan, tanduk, dan kotorannya juga dimanfaatkan untuk berbagai keperluan manusia.</p>\r\n\r\n<p>1. Tetapkan Modal Awal Usaha Ternak Sapi.</p>\r\n\r\n<p>2. Memilih Jenis Sapi.</p>\r\n\r\n<p>3. Menyiapkan Kandang Sapi.</p>\r\n\r\n<p>4. Membuat Kandang Sapi.</p>\r\n\r\n<p>5. Memilih Bibit Sapi Ternak yang Unggul.</p>\r\n\r\n<p>6. Pemberian Pakan.</p>\r\n\r\n<p>7. Perawatan Sapi.</p>', 'sapi.jpeg', '1', '2023-02-15 22:13:29', '2023-02-15 22:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `grow`
--

CREATE TABLE `grow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_betina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jantan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebab` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `grow`
--

INSERT INTO `grow` (`id`, `id_betina`, `id_jantan`, `mulai`, `akhir`, `keterangan`, `hasil`, `status`, `sebab`, `user`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2023-02-11', '2023-11-11', 'Berkembang biak', 'Anak Sapi', 'Proses', 'Lingkungan dan Makanan Bergizi serta Baik', '2', '2023-02-11 20:11:18', '2023-02-11 20:11:18'),
(2, '1', '2', '2023-11-12', NULL, 'Berkembang  Biak', '2 Anak Sapi', 'Proses', 'Pakan dan Lingkungan Harus Dijaga', '2', '2023-02-11 20:38:03', '2023-02-11 20:41:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenistani`
--

CREATE TABLE `jenistani` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenistani`
--

INSERT INTO `jenistani` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pohon', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(2, 'Bunga', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(3, 'Sayuran', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(4, 'Buah - buahan', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(5, 'Pucuk', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(6, 'Tumbuhan Obat', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(7, 'Tumbuhan Liar', '2023-02-11 20:11:13', '2023-02-11 20:11:13'),
(8, 'Tumbuhan Air', '2023-02-11 20:11:14', '2023-02-11 20:11:14'),
(9, 'Tumbuhan Pangan', '2023-02-11 20:11:14', '2023-02-11 20:11:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisternak`
--

CREATE TABLE `jenisternak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenisternak`
--

INSERT INTO `jenisternak` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mamalia', '2023-02-11 20:11:16', '2023-02-11 20:11:16'),
(2, 'Reptil', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(3, 'Burung', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(4, 'Ikan', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(5, 'Serangga', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(6, 'Moluska', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(7, 'Amphibia', '2023-02-11 20:11:17', '2023-02-11 20:11:17'),
(8, 'Arthropoda', '2023-02-11 20:11:17', '2023-02-11 20:11:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `instagram`, `whatsapp`, `linkedin`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'https://www.instagram.com/izdhr_25', 'https://wa.me/0895332520225', 'https://id.linkedin.com/in/izdihar-fazrianti-90568b252/en', 'izdihar0825@gmail.com', '<p>Jl. Lap. Bola Rw. Butun, RT.001/RW.006, Ciketing Udik, Kec. Bantar Gebang, Kota Bks, Jawa Barat 17153.</p>', '2023-02-15 01:07:06', '2023-02-15 23:30:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode`
--

CREATE TABLE `metode` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tanaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebab` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `metode`
--

INSERT INTO `metode` (`id`, `id_tanaman`, `id_pasangan`, `mulai`, `akhir`, `keterangan`, `hasil`, `status`, `sebab`, `user`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2023-02-11', NULL, '<p>Cangkok Batang</p>', 'Bibit Baru', 'Proses', '<p>Media Cangkok Lembab</p>', '2', '2023-02-11 20:11:18', '2023-02-25 01:22:05'),
(2, '1', '2', '2023-02-12', NULL, 'Cangkok Batang', '3 Bibit Mangga', 'Proses', 'Media Cangkok dan Pupuknya Diperhatikan', '2', '2023-02-11 20:43:35', '2023-02-13 18:07:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_29_053053_create_roles_table', 1),
(6, '2023_01_31_030805_create_tani_table', 1),
(7, '2023_01_31_034410_create_ternak_table', 1),
(8, '2023_01_31_034916_create_obat_table', 1),
(9, '2023_01_31_043152_create_sakit_sehats_table', 1),
(10, '2023_01_31_043731_create_artikel_table', 1),
(11, '2023_02_09_022842_create_jenistani_table', 1),
(12, '2023_02_09_023035_create_jenisternak_table', 1),
(13, '2023_02_09_030253_create_alerts_table', 1),
(14, '2023_02_10_053506_create_grow_table', 1),
(15, '2023_02_12_022304_create_metode_table', 1),
(16, '2023_02_12_055141_create_notifications_table', 2),
(17, '2023_02_14_011352_create_kontak_table', 3),
(18, '2023_02_14_011826_create_tentang_table', 3),
(19, '2023_02_25_012238_create_notifications_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `nama`, `jenis`, `obat`, `dosis`, `perawat`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Vitamin Wonder', 'Tanaman', 'Larut dalam Air', 'Hewan', '2x/minggu', 'Izdihar Fazrianti', '2', '2023-02-11 20:11:12', '2023-02-25 21:42:34'),
(2, 'Pestisida 1 Minggu Sekali', 'Tanaman', 'Kimia', 'Tanaman', '1x/minggu', 'Petani', '2', '2023-02-13 21:25:48', '2023-02-25 21:42:56'),
(3, 'Vitamin C', 'Tanaman', 'Larut dalam Air', 'Hewan', '1x/hari', 'Peternak', '2', '2023-02-16 08:53:43', '2023-02-25 21:43:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-02-11 20:11:12', '2023-02-11 20:11:12'),
(2, 'user', '2023-02-11 20:11:12', '2023-02-11 20:11:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sakit_sehats`
--

CREATE TABLE `sakit_sehats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_sakit` date NOT NULL,
  `lama_sakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sembuh` date DEFAULT NULL,
  `obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sakit_sehats`
--

INSERT INTO `sakit_sehats` (`id`, `nama_id`, `nama`, `jenis`, `tgl_sakit`, `lama_sakit`, `tgl_sembuh`, `obat`, `perawat`, `status`, `user`, `created_at`, `updated_at`) VALUES
(2, '2', 'Tanaman', 'Mamalia', '2023-02-01', '24', '2023-02-25', 'Vitamin Wonder', 'Petani', 'Sembuh', '2', '2023-02-15 19:12:52', '2023-02-25 09:17:35'),
(3, '2', 'Tanaman', 'Buah - buahan', '2023-01-29', '18', '2023-02-16', 'Vitamin Wonder', 'Petani', 'Sembuh', '2', '2023-02-15 20:58:02', '2023-02-25 09:17:35'),
(4, '1', 'Tanaman', 'Mamalia', '2023-02-01', '24', '2023-02-25', 'Vitamin Wonder', 'Petani', 'Sembuh', '2', '2023-02-15 23:00:24', '2023-02-25 09:17:35'),
(5, '5', 'Tanaman', 'Buah - buahan', '2023-02-18', '7', NULL, 'Vitamin Wonder', 'Izdihar', 'Sakit', '2', '2023-02-25 01:08:14', '2023-02-25 09:17:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tani`
--

CREATE TABLE `tani` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ditanam` date NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipanen` date DEFAULT NULL,
  `hasil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tani`
--

INSERT INTO `tani` (`id`, `name`, `tanaman`, `jenis`, `kelamin`, `ditanam`, `umur`, `dipanen`, `hasil`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Pohon Mangga Lali Jiwo', 'Menghasilkan buah mangga', 'Buah - buahan', 'Betina', '2021-01-31', '755', '2023-04-30', '<p>10</p>', '2', '2023-02-11 20:11:12', '2023-02-25 01:38:06'),
(2, 'Pohon Mangga Indramayu', 'Menghasilkan buah mangga', 'Buah - buahan', 'Betina', '2021-01-31', '755', '2023-04-30', '<p>10</p>', '2', '2023-02-11 20:11:13', '2023-02-25 01:38:06'),
(3, 'Padi Koshihikari', 'Menghasilkan beras', 'Tumbuhan Pangan', 'Tanaman Berumah Tunggal', '2023-01-29', '27', '2023-06-29', 'Beras', '6', '2023-02-13 17:47:17', '2023-02-25 10:04:32'),
(4, 'Padi Calrose Rice', 'Menghasilkan beras', 'Tumbuhan Pangan', 'Tanaman Berumah Tunggal', '2023-01-29', '27', '2023-06-29', 'Beras', '6', '2023-02-13 17:50:02', '2023-02-25 10:04:32'),
(5, 'Pohon Mangga Indramayu', 'Vitamin C', 'Pohon', 'Tanaman Berumah Tunggal', '2023-01-29', '27', NULL, '<p>Menanam dari bibit</p>', '2', '2023-02-22 23:35:18', '2023-02-25 01:38:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id`, `judul`, `isi`, `poin`, `poin2`, `poin3`, `poin4`, `poin5`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'Moteun', '<p>Aplikasi Monitoring Ternak dan Kebun berbasis Website yang bertujuan untuk membantu para peternak dan petani dalam memantau proses, kendala serta hasil dari aktivitas berternak dan bertani. MoTeun pun menyediakan layanan :</p>', '<ul>\r\n	<li>Mendata jumlah dan umur tanaman dan hewan.</li>\r\n</ul>', '<ul>\r\n	<li>Mengecek kesehatan tanaman dan hewan secara rutin.</li>\r\n</ul>', '<ul>\r\n	<li>Memberi tanda bahwa tanaman dan hewan sudah siap dikembangbiakan.</li>\r\n</ul>', '<ul>\r\n	<li>Saling bertukar pengalaman mengenai tanaman dan hewan yang dibudidayakan.</li>\r\n</ul>', '<ul>\r\n	<li>Mengatur peternakan dan pertanian dengan mudah.</li>\r\n</ul>', 'Meningkatkan kesadaran akan sektor peternakan dan pertanian sebagai sektor penting di Indonesia', '<ol>\r\n	<li>Meningkatkan kesejahteraan para petani dan peternak dengan Aplikasi Monitoring Ternak dan Kebunmu.</li>\r\n	<li>Mengedukasi&nbsp;para petani dan peternak pemula untuk memulai bertani serta&nbsp;beternak dengan bertukar pengalaman pada grup forum dan artikel.</li>\r\n	<li>Membantu memajukan sektor pertanian dan peternakan di Indonesia dengan fitur Kemajuan&nbsp;Hewan dan Kemajuan Tanaman dalam berkembang biak.</li>\r\n</ol>', '2023-02-13 23:31:37', '2023-02-17 07:01:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak`
--

CREATE TABLE `ternak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lahir` date NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mati` date DEFAULT NULL,
  `hasil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak`
--

INSERT INTO `ternak` (`id`, `name`, `hewan`, `jenis`, `kelamin`, `lahir`, `umur`, `mati`, `hasil`, `user`, `created_at`, `updated_at`) VALUES
(1, 'Sapi', 'Menghasilkan Susu', 'Mamalia', 'Betina', '2020-12-31', '786', NULL, '<p>Susu</p>', '2', '2023-02-11 20:11:13', '2023-02-25 09:16:53'),
(2, 'Sapi', 'Menghasilkan Susu', 'Mamalia', 'Jantan', '2021-01-31', '755', NULL, 'Susu', '2', '2023-02-11 20:11:13', '2023-02-25 09:16:53'),
(3, 'Unta', 'Menghasilkan Susu', 'Mamalia', 'Betina', '2023-01-29', '27', NULL, 'Susu', '6', '2023-02-13 17:22:49', '2023-02-25 10:07:02'),
(4, 'Unta', 'Menghasilkan Susu', 'Mamalia', 'Jantan', '2023-01-29', '27', NULL, 'Susu', '6', '2023-02-13 17:23:09', '2023-02-25 10:07:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `image`, `jk`, `name`, `email`, `email_verified_at`, `password`, `no_telp`, `alamat`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'izdihar.jpg', 'Perempuan', 'Izdihar Fazrianti', 'izdihar0825@gmail.com', NULL, '$2a$12$eGikHevlN5Gue0GfF3gp2O8X8.52A5rUIETPwBrWMOFssEiIgNpzG', '0895332520225', 'Griya Alam Sentosa Blok X17 No. 16', 1, NULL, '2023-02-11 20:11:17', '2023-02-13 20:53:30'),
(2, 'profile2.jpg', 'Laki - laki', 'User', 'user@gmail.com', NULL, '$2y$10$Em8X62m7vmIV2dhnZxmqiuI6FDmBRev9p18HIeEBbBqjeecIBnQQa', '087868191540', 'SMK Negeri 2 Kota Bekasi', 2, NULL, '2023-02-11 20:11:18', '2023-02-11 20:11:18'),
(6, 'profile2.jpg', 'Laki - laki', 'SMK Negeri 2 Kota Bekasi', 'butun@gmail.com', NULL, '$2y$10$Lq0BvRPWRBfCJmKU7FIJIu3hUbbOCPia8cjWKs9Tgkl4zcivf4q.i', '08218837422', 'Jl. Lapangan Bola Rawa Butun', 2, NULL, '2023-02-13 17:21:32', '2023-02-13 17:21:32'),
(7, 'lebih QHD.png', 'Laki - laki', 'Aji', 'tryjie.san65@gmail.com', NULL, '$2y$10$vqrVAKVWdmSdW8o1fxXfHeiHF3957o7IIlOnOV79ALO2uKfjYJIjy', '089671176244', 'Jl. Cipendawa Lama No. 45', 1, NULL, '2023-02-16 06:28:15', '2023-02-16 06:28:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `grow`
--
ALTER TABLE `grow`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenistani`
--
ALTER TABLE `jenistani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenisternak`
--
ALTER TABLE `jenisternak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indeks untuk tabel `sakit_sehats`
--
ALTER TABLE `sakit_sehats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tani`
--
ALTER TABLE `tani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak`
--
ALTER TABLE `ternak`
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
-- AUTO_INCREMENT untuk tabel `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `grow`
--
ALTER TABLE `grow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenistani`
--
ALTER TABLE `jenistani`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenisternak`
--
ALTER TABLE `jenisternak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `metode`
--
ALTER TABLE `metode`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sakit_sehats`
--
ALTER TABLE `sakit_sehats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tani`
--
ALTER TABLE `tani`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ternak`
--
ALTER TABLE `ternak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
