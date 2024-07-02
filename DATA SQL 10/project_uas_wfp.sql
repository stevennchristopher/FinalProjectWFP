-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 11:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas_wfp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Surabaya, Jawa Timur', '2024-05-07 03:31:19', '2024-05-20 23:29:52'),
(2, 'Pegawai', 'Sidoarjo, Jawa Timur', '2024-05-19 03:15:07', '2024-06-10 04:05:51'),
(3, 'Steven', 'Jakarta', '2024-06-27 11:47:40', '2024-06-27 11:47:40'),
(4, 'Melissa', 'Malang, Jawa Timur', '2024-06-27 12:00:30', '2024-06-27 12:00:30'),
(5, 'Johannes', 'Yogyakarta', '2024-06-27 12:01:33', '2024-06-27 12:01:33'),
(6, 'Michelle', 'Semarang, Jawa Tengah', '2024-06-27 12:02:17', '2024-06-27 12:02:17'),
(7, 'Shinta', 'Cirebon. Jawa Barat', '2024-06-30 21:21:37', '2024-06-30 21:21:37'),
(8, 'Anthon', 'Bali', '2024-06-30 21:25:05', '2024-06-30 21:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `name`, `description`, `product_id`) VALUES
(1, 'WiFi Super Speed', 'Nikmati kecepatan internet hingga 1 Gbps untuk streaming tanpa gangguan.', 1),
(2, 'Smart Mirror TV', 'Cermin interaktif yang juga berfungsi sebagai TV pintar dengan kontrol suara.', 1),
(4, 'Aromatherapy Diffuser', 'Alat penyebar aroma terapi untuk relaksasi maksimal dan tidur nyenyak.', 1),
(5, 'Virtual Fireplace', 'Perapian digital yang memberikan nuansa hangat tanpa panas, ideal untuk suasana romantis.', 2),
(6, 'Forest Sound System', 'Sistem suara yang memutar suara hutan untuk tidur yang lebih nyenyak dan alami.', 2),
(7, 'Organic Tea Station', 'Stasiun teh dengan berbagai pilihan teh organik yang menenangkan.', 2),
(8, 'Star Projector', 'Proyektor langit malam untuk pengalaman tidur di bawah bintang yang memukau.', 3),
(9, 'Galaxy Wall Art', 'Karya seni dinding yang bercahaya dalam gelap, menciptakan suasana galaksi.', 3),
(10, 'Zero-Gravity Recliner', 'Kursi malas dengan sensasi gravitasi nol untuk relaksasi optimal.', 3),
(11, 'Rain Shower with LED Lights', 'Pancuran hujan dengan lampu LED yang berubah warna, menciptakan suasana spa.', 4),
(12, 'Aquarium Bedside Table', 'Meja samping tempat tidur dengan akuarium kecil, menambah sentuhan alam.', 4),
(13, 'Waterfall Wall', 'Dinding dengan efek air terjun yang menenangkan untuk suasana rileks.', 4),
(14, 'Gramophone Speaker', 'Speaker Bluetooth dengan desain gramofon klasik untuk nuansa nostalgia.', 5),
(15, 'Antique Desk', 'Meja tulis antik dengan lampu kuningan, cocok untuk menulis dengan gaya.', 5),
(16, 'Clawfoot Bathtub', 'Bathtub dengan kaki-kaki berbentuk cakar yang klasik, menambah kesan elegan.', 5),
(17, 'Panoramic Window', 'Jendela besar dengan pemandangan cakrawala kota yang menakjubkan.', 11),
(18, 'Cityscape LED Wall Art', 'Seni dinding LED dengan pemandangan kota yang berubah-ubah setiap malam.', 11),
(19, 'High-Rise Hammock', 'Hammock dalam ruangan dengan pemandangan kota dari ketinggian, ideal untuk bersantai.', 11),
(20, 'Palm Tree Ceiling Fan', 'Kipas langit-langit berbentuk pohon palem, menciptakan suasana tropis yang nyaman.', 13),
(21, 'Tiki Bar Mini Fridge', 'Kulkas mini dengan desain tiki bar tropis, sempurna untuk minuman eksotis.', 13),
(22, 'Bamboo Headboard', 'Sandaran tempat tidur dari bambu alami yang memberikan kesan alami dan hangat.', 13),
(23, 'Art Deco Chandelier', 'Lampu gantung dengan desain art deco yang mewah, menambah sentuhan glamor.', 14),
(24, 'Velvet Lounge Chair', 'Kursi santai berbahan beludru dengan warna mencolok, nyaman untuk bersantai.', 14),
(25, 'Geometric Rug', 'Karpet dengan pola geometris yang khas art deco, memberikan gaya unik.', 14),
(26, 'Macramé Wall Hanging', 'Hiasan dinding dari macramé buatan tangan, menambah sentuhan seni bohemian.', 15),
(27, 'Himalayan Salt Lamp', 'Lampu dari batu garam Himalaya yang menenangkan, meningkatkan kualitas udara.', 15),
(28, 'Handwoven Hammock Chair', 'Kursi hammock dari anyaman tangan, sempurna untuk bersantai dan berayun.', 15),
(29, 'Canopy Bed with Silk Drapes', 'Tempat tidur kanopi dengan tirai sutra yang mewah, menambah kesan kerajaan.', 16),
(30, 'Crystal Decanter Set', 'Set decanter kristal untuk minuman mewah, sempurna untuk momen istimewa.', 16),
(31, 'Marble Vanity Table', 'Meja rias marmer dengan cermin besar, menambah kesan elegan dan mewah.', 16);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` double DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `phone`, `email`, `rating`, `type_id`, `updated_at`, `created_at`) VALUES
(1, 'Catalina Inn', '2015 McFarland Blvd', 61350233266, 'info@yourdomain.com', 5, 1, '2024-06-11 04:17:45', '2024-06-17 04:39:51'),
(2, 'Dothan Inn & Suites', '3285 Montgomery Hwy', 16204218000, 'info@yourdomain.com', 4.5, 2, NULL, '2024-06-17 04:39:51'),
(3, 'On the Beach', '337 E Beach Blvd', 19136516000, 'info@yourdomain.com', 3.75, 3, NULL, '2024-06-17 04:39:51'),
(4, 'Athens Inn', '1329 US Highway 72 E', 61350233266, 'info@yourdomain.com', 4.2, 1, NULL, '2024-07-01 12:18:46'),
(5, 'Park Plaza Motor Inn', '3801 McFarland Blvd E', 16204218000, 'info@yourdomain.com', 5, 2, NULL, '2024-07-01 12:18:49'),
(6, 'Abbeville Inn', '1237 US Highway 431 S', 16204218000, 'info@yourdomain.com', 5, 3, NULL, '2024-07-01 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `point`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 8, '2024-06-24 21:00:17', '2024-07-02 12:54:14', 1),
(2, 5, '2024-06-25 02:05:53', '2024-06-25 02:05:53', 2),
(3, 2, '2024-06-30 21:13:20', '2024-06-30 21:13:20', 3),
(4, 0, '2024-06-30 21:13:26', '2024-06-30 21:24:21', 4),
(5, 0, '2024-06-30 21:13:30', '2024-06-30 21:24:17', 5),
(6, 19, '2024-06-30 21:13:35', '2024-07-02 12:52:46', 6),
(7, 0, '2024-06-30 21:23:59', '2024-06-30 21:23:59', 7),
(8, 0, '2024-06-30 21:25:05', '2024-06-30 21:25:05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_05_032539_create_types_table', 1),
(6, '2024_03_05_032720_create_hotels_table', 1),
(7, '2024_03_05_034844_update_types_table', 2),
(8, '2024_03_05_034922_update_hotels_table', 2),
(9, '2024_03_05_042057_add_typeid_hotels_table', 3),
(10, '2024_03_05_051649_create_products_table', 4),
(11, '2024_03_11_060906_add_hotelid_products_table', 5),
(12, '2024_06_17_034239_create_memberships_table', 6),
(13, '2024_06_17_035918_add_userid_memberships_table', 7),
(14, '2024_06_17_051207_add_productid_fasilitas_table', 8),
(15, '2024_06_17_044001_create_type_products_table', 9),
(16, '2024_06_17_045402_create_tipeproduks_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `available_room` int(11) NOT NULL,
  `tipeproduk_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `hotel_id`, `available_room`, `tipeproduk_id`) VALUES
(1, 'Tropicana', 275000, 1, 3, 1),
(2, 'Mandarin Oriental', 350000, 2, 2, 2),
(3, 'Quality Suite', 1000000, 3, 3, 3),
(4, 'Primeland', 900000, 4, 4, 4),
(5, 'Roosevelt', 555000, 5, 5, 5),
(11, 'La Dolce', 630000, 5, 5, 6),
(13, 'El Paraiso', 150000, 3, 3, 7),
(14, 'Amansara', 340000, 6, 8, 8),
(15, 'El Encanto', 685000, 1, 1, 9),
(16, 'La Rosa Bianca', 450000, 2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_transaction`
--

CREATE TABLE `product_transaction` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_transaction`
--

INSERT INTO `product_transaction` (`product_id`, `transaction_id`, `quantity`, `subtotal`) VALUES
(1, 1, 2, 550000),
(2, 4, 1, 350000),
(4, 3, 1, 900000),
(5, 2, 1, 555000),
(11, 2, 2, 1260000),
(13, 2, 1, 150000),
(14, 3, 1, 340000),
(15, 1, 1, 685000);

-- --------------------------------------------------------

--
-- Table structure for table `tipeproduks`
--

CREATE TABLE `tipeproduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipeproduks`
--

INSERT INTO `tipeproduks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Standard', NULL, NULL),
(2, 'Deluxe', NULL, NULL),
(3, 'President', NULL, NULL),
(4, 'Balcony', NULL, NULL),
(5, 'Superior', NULL, NULL),
(6, 'Suite', NULL, NULL),
(7, 'Single Room', NULL, NULL),
(8, 'Double Room', NULL, NULL),
(9, 'Family Room', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_date` datetime NOT NULL,
  `harga_asli` double NOT NULL,
  `diskon` double NOT NULL,
  `ppn` double NOT NULL,
  `harga_grandtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `transaction_date`, `harga_asli`, `diskon`, `ppn`, `harga_grandtotal`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-02 19:31:49', 1235000, 1000000, 135850, 370850, '2024-07-02 12:31:49', '2024-07-02 12:31:49'),
(2, 6, '2024-07-02 19:50:42', 1965000, 0, 216150, 2181150, '2024-07-02 12:50:42', '2024-07-02 12:50:42'),
(3, 6, '2024-07-02 19:52:46', 1240000, 0, 136400, 1376400, '2024-07-02 12:52:46', '2024-07-02 12:52:46'),
(4, 1, '2024-07-02 19:54:14', 350000, 300000, 38500, 88500, '2024-07-02 12:54:14', '2024-07-02 12:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'City Hotel', 'A smalls, cozy establishment offering lodging and often meals, typically in a rural or semi-rural location.'),
(2, 'Residential Hotel', 'A full-service accommodation providing recreation and entertainment, often in a scenic or vacation destination.'),
(3, 'Motel', 'Budget-friendly roadside accommodations designed for motorists, with convenient parking and basic amenities.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'owner', '$2y$10$Jn0IKcWsfY0yjjn7UXGemeMnvtPwkK5lY/1BEhzj98Ft26ti0EMsO', NULL, '2024-06-10 07:43:06', '2024-06-10 07:43:06'),
(2, 'Pegawai', 'pegawai@gmail.com', NULL, 'employee', '$2y$10$miwOeNzBJYUfxc0QWGwX/u9bWpVm5caBv0L1lzgp07hRlevvuZli2', NULL, '2024-06-10 07:46:52', '2024-06-10 07:46:52'),
(3, 'Steven', 'steven@gmail.com', NULL, 'customer', '$2y$10$YnfasmA97qZl9cYCNO4P3Of9.OQTjgq5T9JpQmgC6bTHBcNxM5s5G', NULL, '2024-06-27 11:47:40', '2024-06-27 11:47:40'),
(4, 'Melissa', 'melissa@gmail.com', NULL, 'customer', '$2y$10$cko9A8nrJ7MrBsBtheaNFOCVEnswfNsPbitvt0ynQtwasdPg8HRHC', NULL, '2024-06-27 12:00:30', '2024-06-27 12:00:30'),
(5, 'Johannes', 'johannes@gmail.com', NULL, 'customer', '$2y$10$TETWJAcExMrmvXqzRvBVdeiCRjiqyk/9XbZdymnpLE.0NLm1LpDC2', NULL, '2024-06-27 12:01:33', '2024-06-27 12:01:33'),
(6, 'Michelle', 'michelle@gmail.com', NULL, 'customer', '$2y$10$24MjSkAQ2xPLSgUQ37QJJuMFqlDdXFf1vumPOTI8HSJUYb20Fxyye', NULL, '2024-06-27 12:02:17', '2024-06-27 12:02:17'),
(7, 'Shinta', 'shinta@gmail.com', NULL, 'employee', '$2y$10$Pj7itNqQTjkYHwVpi/6zZOrPuV/unAnuF/kqvSWhkuB9c1O/YrloG', NULL, '2024-06-30 21:21:37', '2024-06-30 21:21:37'),
(8, 'Anthon', 'anthon@gmail.com', NULL, 'customer', '$2y$10$citClGndHWR4b0toBkALUuqig6fWLLeC8m82kPpJGfxFZS6MAvCCK', NULL, '2024-06-30 21:25:05', '2024-06-30 21:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fasilitas_product_id_foreign` (`product_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_type_id_foreign` (`type_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_user_id_foreign` (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_hotel_id_foreign` (`hotel_id`),
  ADD KEY `products_tipeproduk_id_foreign` (`tipeproduk_id`);

--
-- Indexes for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD PRIMARY KEY (`product_id`,`transaction_id`),
  ADD KEY ` product_transaction_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `tipeproduks`
--
ALTER TABLE `tipeproduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tipeproduks`
--
ALTER TABLE `tipeproduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_user_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `products_tipeproduk_id_foreign` FOREIGN KEY (`tipeproduk_id`) REFERENCES `tipeproduks` (`id`);

--
-- Constraints for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD CONSTRAINT `product_transaction_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_transaction_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
