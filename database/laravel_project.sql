-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Nov 06, 2024 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'muhammad saad', 'ms22458881@gmail.com', '$2y$10$G9VZsbrUGzH3phQ9.yRG/.eX44Yp.Zoyk7a8Qe0dG9ewWC9fPqjHm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_des` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cat_name`, `cat_des`, `cat_image`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'Best Laptops for gaming', 'laptop category.jpg', '2024-10-10 13:23:09', '2024-10-10 13:23:09'),
(2, 'Smartphones', 'Best smartphones with good processors', 'smartphone.jpg', '2024-10-10 13:24:02', '2024-10-10 13:24:02'),
(3, 'Camera', 'Best camera\'s for shooting', 'camera category.jpg', '2024-10-10 13:56:07', '2024-10-10 13:56:07'),
(6, 'Headphones', 'Best Headphones for gaming', 'headphone.jpg', '2024-10-16 06:39:00', '2024-11-03 06:00:48'),
(10, 'Accessories', 'Best Electronics Accessories', 'accessories.jpg', '2024-10-25 13:56:30', '2024-11-03 05:59:39');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_26_184337_create_category_table', 1),
(5, '2024_09_26_184616_create_product_table', 1),
(6, '2024_10_07_175426_create_register_table', 1),
(7, '2024_10_10_101147_create_admins_table', 1),
(8, '2024_10_11_105859_create_admins_table', 2),
(9, '2024_10_28_091008_create_cart_table', 3),
(10, '2024_11_02_172540_create_orders_table', 4),
(11, '2024_11_02_172552_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `bill`, `status`, `customer_name`, `created_at`, `updated_at`) VALUES
(16, 19, 74000, 'pending', 'muhammad saad', '2024-11-02 13:10:40', '2024-11-02 13:10:40'),
(17, 18, 238000, 'pending', 'sami khan', '2024-11-03 05:34:52', '2024-11-03 05:34:52'),
(21, 19, 188000, 'pending', 'muhammad saad', '2024-11-03 06:16:27', '2024-11-03 06:16:27'),
(22, 19, 188000, 'pending', 'muhammad saad', '2024-11-03 06:16:27', '2024-11-03 06:16:27'),
(23, 20, 20000, 'pending', 'fahad junaid', '2024-11-03 06:18:01', '2024-11-03 06:18:01'),
(24, 20, 20000, 'pending', 'fahad junaid', '2024-11-03 06:18:02', '2024-11-03 06:18:02'),
(25, 19, 54000, 'pending', 'muhammad saad', '2024-11-03 06:18:58', '2024-11-03 06:18:58'),
(26, 19, 20000, 'pending', 'muhammad saad', '2024-11-03 06:21:16', '2024-11-03 06:21:16'),
(27, 19, 20000, 'pending', 'muhammad saad', '2024-11-03 06:21:16', '2024-11-03 06:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `orderid` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `quantity`, `price`, `orderid`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 70000, 16, '2024-11-02 13:10:40', '2024-11-02 13:10:40'),
(4, 6, 2, 2000, 16, '2024-11-02 13:10:40', '2024-11-02 13:10:40'),
(5, 2, 2, 54000, 17, '2024-11-03 05:34:52', '2024-11-03 05:34:52'),
(6, 3, 1, 70000, 17, '2024-11-03 05:34:52', '2024-11-03 05:34:52'),
(7, 7, 3, 20000, 17, '2024-11-03 05:34:52', '2024-11-03 05:34:52'),
(8, 8, 2, 1500, 19, '2024-11-03 06:09:31', '2024-11-03 06:09:31'),
(9, 13, 4, 50000, 19, '2024-11-03 06:09:31', '2024-11-03 06:09:31'),
(10, 2, 2, 54000, 21, '2024-11-03 06:16:27', '2024-11-03 06:16:27'),
(11, 7, 4, 20000, 21, '2024-11-03 06:16:27', '2024-11-03 06:16:27'),
(12, 7, 1, 20000, 23, '2024-11-03 06:18:01', '2024-11-03 06:18:01'),
(13, 2, 1, 54000, 25, '2024-11-03 06:18:58', '2024-11-03 06:18:58'),
(14, 7, 1, 20000, 26, '2024-11-03 06:21:16', '2024-11-03 06:21:16');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` bigint(255) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `pro_des` varchar(255) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pro_name`, `pro_price`, `cat_id`, `pro_des`, `pro_image`, `created_at`, `updated_at`) VALUES
(1, 'Lenovo Legion Pro 5 Gen 8 16', 4200, 1, 'Experience AI-tuned gaming performance on the Legion Pro 5 Gen 8 (16-inch AMD) laptop with AMD Ryzen™ processors and NVIDIA® GeForce RTX™ 40 Series GP', 'product-2.jfif', '2024-10-10 13:27:01', '2024-10-29 13:19:04'),
(2, 'tecno spark 20 pro plus', 54000, 2, 'It has a G99 processor to give you ultimate processing power for playing video games and streaming of HD videos. With 8GB RAM and ROM 256 GB', 'product-4.jpeg', '2024-10-10 13:34:40', '2024-10-30 05:16:43'),
(3, 'galaxy S23', 75000, 2, 'The Samsung Galaxy S23 is a high-end smartphone with impressive features .Display(6.1-inch Dynamic AMOLED 2X display).Memory(8GB RAM 128GB or 256GB internal storage).Processor(Qualcomm Snapdragon 8 Gen 2 octa-core processor)', 'smartphone 1.jpg', '2024-10-10 13:37:45', '2024-11-03 06:14:03'),
(7, 'Canon 350D DSLR', 20000, 3, 'Canon EOS 350D Dslr Camera Canon Introduce Canon 350D with two other names Canon EOS Kiss Digital N or Canon EOS Digital Rebel XT.Lens: Canon 35-80 mm ...', 'camera-1.jpg', '2024-10-18 13:31:19', '2024-10-30 05:19:34'),
(8, 'Alienware m18', 1500, 1, 'best laptop', 'laptop category.jpg', '2024-10-18 13:48:48', '2024-11-03 06:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `rid` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6HkrUl9nab8laaGYKCNYYdFGTIWjFjAHBbpqUfPJ', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiOHRQNGsyOE5lZzJ1QVZLNkFqTjIwbEdtcm9MYndvdmtid0NHOVkyNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTp7aTowO3M6Nzoic3VjY2VzcyI7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NDoibmFtZSI7czoxMzoibXVoYW1tYWQgc2FhZCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7czoyOiJpZCI7aToxOTtzOjU6ImVtYWlsIjtzOjIwOiJtczIyNDU4ODgxQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJFNjenpsUTEubU1xR2RLNTRwTWw1V3VsSjM2MnBjS2NMM2ZMRWMueVhXcmVISjFQMC4vNzdpIjtzOjc6InN1Y2Nlc3MiO3M6MTg6ImxvZ2luIHN1Y2Nlc3NmdWxseSI7fQ==', 1730632092),
('ffGZ0nBYNlM8bGHBuyUsGmqgLNoigfQz67WPo4IC', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiTTMxdEFmMzFKOFZYTjg3bmNYalM1eDRsRlN0NlNKbU55SVVoWGR4diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTp7aTowO3M6Nzoic3VjY2VzcyI7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6NDoibmFtZSI7czoxMzoibXVoYW1tYWQgc2FhZCI7czoyOiJpZCI7aToxOTtzOjU6ImVtYWlsIjtzOjIwOiJtczIyNDU4ODgxQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJFNjenpsUTEubU1xR2RLNTRwTWw1V3VsSjM2MnBjS2NMM2ZMRWMueVhXcmVISjFQMC4vNzdpIjtzOjc6InN1Y2Nlc3MiO3M6MTg6ImxvZ2luIHN1Y2Nlc3NmdWxseSI7fQ==', 1730632802),
('j70FpWCfsjN5dlVJUf337owYC2SeTCo3B9iQIuRo', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiS0hrMVU4WVg2VjdVZjUycmN6dldXd3Jhd0IyU1ZqWjZEUEpWT2RITiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTp7aTowO3M6Nzoic3VjY2VzcyI7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6MjoiaWQiO2k6MTk7czo0OiJuYW1lIjtzOjEzOiJtdWhhbW1hZCBzYWFkIjtzOjU6ImVtYWlsIjtzOjIwOiJtczIyNDU4ODgxQGdtYWlsLmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJFNjenpsUTEubU1xR2RLNTRwTWw1V3VsSjM2MnBjS2NMM2ZMRWMueVhXcmVISjFQMC4vNzdpIjtzOjc6InN1Y2Nlc3MiO3M6MTg6ImxvZ2luIHN1Y2Nlc3NmdWxseSI7fQ==', 1730632100),
('qU5MAc11NP1cydSwbDSDdvk62QmiMbDS9wTmP1CM', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejh6RkwzQ2JJWFZFUXlzWnFKb1ZjVFAwdm4wU0dqZWxkNEhOVHl4UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NDoibmFtZSI7czoxMzoibXVoYW1tYWQgc2FhZCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7fQ==', 1730632891),
('UwJxUwqwTF31ML2TzahIoFEl8H2A0Qd0pDCEnVGh', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiY3pNMkN2WGw5eTI5VmZuM1d1RkRhNXlqTHRvQXQ5N0lXQ3VpaXVZdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1wYW5lbC9sb2dpbiI7fXM6NDoibmFtZSI7czoxMzoibXVoYW1tYWQgc2FhZCI7czo1OiJlbWFpbCI7czoyMDoibXMyMjQ1ODg4MUBnbWFpbC5jb20iO3M6ODoicGFzc3dvcmQiO3M6NjA6IiQyeSQxMiRTY3p6bFExLm1NcUdkSzU0cE1sNVd1bEozNjJwY0tjTDNmTEVjLnlYV3JlSEoxUDAuLzc3aSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTk7fQ==', 1730632239);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'sami khan', 'sami@gmail.com', '$2y$12$3B.Unk/guj.1d7.4cm00juspl5O0LOf9Lhzk48aF8uy4HDn3pIH9.', NULL, '2024-10-28 05:31:26', '2024-10-28 05:31:26'),
(19, 'muhammad saad', 'ms22458881@gmail.com', '$2y$12$SczzlQ1.mMqGdK54pMl5WulJ362pcKcL3fLEc.yXWreHJ1P0./77i', NULL, '2024-10-28 05:50:31', '2024-10-28 05:50:31'),
(20, 'fahad junaid', 'fahad@gmail.com', '$2y$12$rKsgzqo5znMmjDh7Kc9dkeI6irh1wAJs50/x7HVdHAp1xOtEax5VG', NULL, '2024-11-03 06:17:36', '2024-11-03 06:17:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `product_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `rid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
