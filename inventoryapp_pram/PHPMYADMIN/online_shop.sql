-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2026 at 12:32 PM
-- Server version: 8.4.7
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Aksesoris dan Perhiasan', 'Berikan sentuhan akhir yang memukau pada penampilanmu. Dirancang dengan presisi tinggi dan lapisan berkilau premium, aksesoris ini memancarkan kesan mewah dan berkelas tanpa berlebihan. Cocok dipadukan dengan gaun pesta maupun busana Hari Raya untuk membuat tampilanmu jadi pusat perhatian masyarakt umum', '2026-08-15 05:50:10', '2026-08-22 11:51:32'),
(8, 'Laptop dan Komputer', 'Libas semua tugas berat tanpa kendala! Ditenagai oleh prosesor performa tinggi dan kartu grafis bertenaga, laptop/komputer ini dirancang khusus untuk kebutuhan gaming berat, rendering video, hingga desain grafis. Dilengkapi sistem pendingin optimal dan layar dengan refresh rate tinggi untuk visual yang mulus, responsif, dan bebas lag.', '2026-08-20 12:54:57', '2026-08-20 12:54:57'),
(9, 'Jasa Editing', 'Buat foto produk dan portofoliomu terlihat lebih bernilai dan memikat calon pembeli. Layanan photo editing kami meliputi pembersihan background (retouching), perbaikan pencahayaan, manipulasi warna, hingga manipulasi objek secara rapi dan natural. Hasil akhir beresolusi tinggi, siap digunakan untuk materi promosi e-commerce maupun media sosial.', '2026-08-21 07:27:23', '2026-08-21 07:27:23'),
(10, 'Hewan Ternak', 'Belilah hewan ternak disini karena terpercaya', '2026-08-22 11:50:13', '2026-08-22 11:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2026_08_13_134752_create_users_table', 1),
(2, '2026_08_13_135908_create_categories_table', 1),
(3, '2026_08_13_140650_create_profile_table', 1),
(4, '2026_08_13_140707_create_products_table', 1),
(5, '2026_08_13_142412_create_transactions_table', 2),
(6, '2026_08_15_040837_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `stock`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Monitor 19 Inch Murah Meriah', '1787284194.webp', 'Tingkatkan efisiensi kerjamu dengan monitor 19 inch beresolusi HD. Mengusung teknologi layar flicker-free dan low blue light yang membuat mata tetap nyaman meski menatap layar seharian. Dilengkapi port HDMI dan VGA untuk kemudahan konektivitas ke berbagai PC desktop maupun laptop. Solusi hemat energi dan andal untuk kebutuhan admin kantor atau kasir.', 350000, 10, 8, '2026-08-21 03:49:54', '2026-08-22 11:54:15'),
(7, 'Keyboard gaming', '1787399615.webp', 'Tingkatkan presisi permainanmu dengan keyboard mechanical gaming responsif. Dilengkapi switch tahan lama dengan tactile feedback memuaskan, fitur anti-ghosting penuh untuk mencegah tombol terlewat saat combo, serta lampu RGB backlit yang dapat disesuaikan. Pilihan utama untuk meraih kemenangan di game kompetitif favoritmu.', 500000, 32, 8, '2026-08-22 11:53:35', '2026-08-22 12:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `age` int NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `age`, `bio`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 19, 'ganteng benerr banget', 4, '2026-08-22 04:26:38', '2026-08-22 04:49:01'),
(2, 20, 'Mantap jiwa', 5, '2026-08-22 09:09:42', '2026-08-22 09:09:42'),
(3, 20, 'Halo saya Hola!', 7, '2026-08-22 12:04:33', '2026-08-22 12:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('j2GhI1DjvEWcSWWxKhlpdWXKiDr5xcJOO20atRpg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI3dFpkbHJ6Q2VrbkJlSTR4M1BRTUNUVHVuSmlNOVd2ZHpFY251V3FkIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2xvZ2luIiwicm91dGUiOm51bGx9fQ==', 1787400376);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_product_id_foreign` (`product_id`),
  KEY `transactions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `user_id`, `type`, `amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'out', 1, 'ambil 1 produk', '2026-08-22 09:03:02', '2026-08-22 09:03:02'),
(2, 3, 5, 'in', 10, 'Tambah stok', '2026-08-22 09:08:42', '2026-08-22 09:08:42'),
(5, 7, 4, 'in', 20, 'Tambah keyboard', '2026-08-22 12:03:28', '2026-08-22 12:03:28'),
(6, 7, 7, 'out', 8, 'Take out keyboard', '2026-08-22 12:05:51', '2026-08-22 12:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('staff','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@mail.com', '$2y$12$p4yDu84jyIf/9OuRKw0g.uLGIIGxJtMwSUQERi0Do5ETLQI8vgpXW', 'admin', '2026-08-21 13:18:39', '2026-08-21 13:18:39'),
(5, 'pramudya', 'pram@mail.com', '$2y$12$KzJjmKgFvOOWyDNjRmvW5.PM.urgjTf1DAR210UXz9h7jIUuj9GHO', 'staff', '2026-08-21 13:19:08', '2026-08-21 13:19:08'),
(6, 'farhan', 'farhan@mail.com', '$2y$12$Tn0ZwVrVEC/TE7iypNo7t.3EpZb83./TlkkyoGioR3MFlP548kcnK', 'staff', '2026-08-22 09:10:26', '2026-08-22 09:10:26'),
(7, 'Hola', 'hola@mail.com', '$2y$12$gQfyhV9KbBTWhvwHiNkaV.zwQ3GU/1drLOhFusmsyzFJvCZ3jzCt.', 'staff', '2026-08-22 11:48:23', '2026-08-22 11:48:23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
