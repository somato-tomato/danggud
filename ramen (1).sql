-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2021 pada 06.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramen`
--

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
-- Struktur dari tabel `fakturs`
--

CREATE TABLE `fakturs` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `namaPengirim` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `outlet_id` varchar(255) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `retur` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `grandTotal` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_barangs`
--

CREATE TABLE `faktur_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faktur_id` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `HPP` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods`
--

CREATE TABLE `goods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaModal` int(11) NOT NULL,
  `stokkeluar` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `minStok` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goods`
--

INSERT INTO `goods` (`id`, `slug`, `kodeBarang`, `namaBarang`, `hargaModal`, `stokkeluar`, `stok`, `minStok`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'selada-2qhv37edey', 'xx01', 'selada', 2000, NULL, 99, 3, 'pcs', '2021-06-22 13:28:27', '2021-06-22 13:28:27'),
(2, 'tomat-eqwN0P1yro', 'xx02', 'tomat', 1000, NULL, 99, 3, 'pcs', '2021-06-22 13:29:35', '2021-06-22 13:29:35'),
(3, 'bawang-putih-1NlizxybTs', 'xx-03', 'bawang putih', 10000, NULL, 99, 3, 'pcs', '2021-06-23 04:24:26', '2021-06-23 04:24:26'),
(4, 'bawang-bombay-rEIwX4TqzD', 'xx-04', 'bawang bombay', 2000, NULL, 99, 3, 'pcs', '2021-06-23 04:25:22', '2021-06-23 04:25:22'),
(5, 'kentang-bpXmhhyrjS', 'xx-05', 'kentang', 2000, NULL, 99, 3, 'pcs', '2021-06-23 04:26:11', '2021-06-23 04:26:11'),
(6, 'bumbu-6RKfJN9DHr', 'xx06', 'bumbu', 3000, NULL, 99, 3, 'pcs', '2021-06-23 04:27:03', '2021-06-23 04:27:03'),
(7, 'ayam-Q3qlGaotl8', 'xx07', 'ayam', 11000, NULL, 99, 3, 'pcs', '2021-06-23 04:28:30', '2021-06-23 04:28:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_first_stocks`
--

CREATE TABLE `goods_first_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stokAwal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goods_first_stocks`
--

INSERT INTO `goods_first_stocks` (`id`, `goods_id`, `keterangan`, `stokAwal`, `created_at`, `updated_at`) VALUES
(1, 1, 'ok', 99, '2021-06-22 13:28:42', '2021-06-22 13:28:42'),
(2, 2, 'ok', 99, '2021-06-22 13:29:44', '2021-06-22 13:29:44'),
(3, 3, 'ok', 99, '2021-06-23 04:24:43', '2021-06-23 04:24:43'),
(4, 4, 'ok', 99, '2021-06-23 04:25:30', '2021-06-23 04:25:30'),
(5, 5, 'ok', 99, '2021-06-23 04:26:18', '2021-06-23 04:26:18'),
(6, 6, 'ok', 99, '2021-06-23 04:27:10', '2021-06-23 04:27:10'),
(7, 7, 'ok', 99, '2021-06-23 04:28:38', '2021-06-23 04:28:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_prices`
--

CREATE TABLE `goods_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) NOT NULL,
  `jenisOutlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `goods_prices`
--

INSERT INTO `goods_prices` (`id`, `goods_id`, `jenisOutlet`, `hargaJual`, `created_at`, `updated_at`) VALUES
(1, 1, 'ramen', 2500, '2021-06-22 13:29:04', '2021-06-22 13:29:04'),
(2, 2, 'ramen', 1200, '2021-06-22 13:29:58', '2021-06-22 13:29:58'),
(3, 3, 'ramen', 12000, '2021-06-23 04:24:52', '2021-06-23 04:24:52'),
(4, 4, 'ramen', 23000, '2021-06-23 04:25:41', '2021-06-23 04:25:41'),
(5, 5, 'ramen', 23000, '2021-06-23 04:26:29', '2021-06-23 04:26:29'),
(6, 6, 'ramen', 34000, '2021-06-23 04:27:20', '2021-06-23 04:27:20'),
(7, 7, 'ramen', 12000, '2021-06-23 04:28:50', '2021-06-23 04:28:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_stocks`
--

CREATE TABLE `goods_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) NOT NULL,
  `namaPengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stokMasuk` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `good_price_histories`
--

CREATE TABLE `good_price_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `goods_id` bigint(20) NOT NULL,
  `hargaModal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `good_price_histories`
--

INSERT INTO `good_price_histories` (`id`, `goods_id`, `hargaModal`, `created_at`, `updated_at`) VALUES
(1, 36, 100000, '2020-12-24 20:12:00', '2020-12-24 20:12:00'),
(3, 36, 100001, '2020-12-24 20:16:41', '2020-12-24 20:16:41'),
(4, 1, 2000, '2021-06-22 13:28:27', '2021-06-22 13:28:27'),
(5, 2, 1000, '2021-06-22 13:29:36', '2021-06-22 13:29:36'),
(6, 3, 10000, '2021-06-23 04:24:26', '2021-06-23 04:24:26'),
(7, 4, 2000, '2021-06-23 04:25:22', '2021-06-23 04:25:22'),
(8, 5, 2000, '2021-06-23 04:26:12', '2021-06-23 04:26:12'),
(9, 6, 3000, '2021-06-23 04:27:04', '2021-06-23 04:27:04'),
(10, 7, 11000, '2021-06-23 04:28:30', '2021-06-23 04:28:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gross_expenses`
--

CREATE TABLE `gross_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaPengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biayaPengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalPengeluaran` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gross_expenses`
--

INSERT INTO `gross_expenses` (`id`, `namaPengeluaran`, `biayaPengeluaran`, `tanggalPengeluaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(7, 'ijiji', '20000', '2020-12-27', 'okok', '2020-12-28 03:45:05', '2020-12-28 03:45:05');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_26_202453_create_sessions_table', 1),
(7, '2020_11_04_225439_create_outlets_table', 2),
(8, '2020_11_05_234757_create_goods_table', 3),
(9, '2020_11_07_024954_create_goods_prices_table', 4),
(10, '2020_11_07_224934_create_goods_stocks_table', 5),
(11, '2020_11_07_230259_create_goods_first_stocks_table', 5),
(12, '2020_11_14_150419_create_faktur_barangs_table', 6),
(13, '2020_12_24_113356_create_gross_expenses_table', 7),
(14, '2020_12_24_113941_create_good_price_histories_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeOutlet` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaOutlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `jenisOutlet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outlets`
--

INSERT INTO `outlets` (`id`, `slug`, `kodeOutlet`, `namaOutlet`, `alamat`, `telepon`, `status`, `jenisOutlet`, `created_at`, `updated_at`) VALUES
(35, 'ramen-xx-ak4fB', '01', 'ramen xx', 'xxx', 898978779989, 'aktif', 'ramen', '2021-06-22 13:27:46', '2021-06-22 13:27:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('panjidenisgiantoroo@gmail.com', '$2y$10$an1dpV0X/9UnvOjXtQmZ1.FG8/22M2w4L5rEUvFT35z5Tbpf0jnAK', '2021-06-12 02:41:38');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UBXgFNbOdV4bD2XTb793NLrm2meHrh3jvofoXND3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSktHR0ZvenlwbEpDV0pkVUpIckFla3BqTWNGMVhqWjQ3SGFVOVNCayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1624422194),
('xy6UrvfmL4ysfnsd1iELDPWDF93G3rmcDiDBzG47', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRWIxYkg4RmlJSlR3dUhoMGRjcE9lMDVDb2xHY2s2NEJnR1FoY0hvaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYXJhbmcvYXlhbS1RM3FsR2FvdGw4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEQuOFdLa3htOUcxUFBkN09lU2dTYWVRdmMyMEpHZk9PM291dXNleTkvY2tuSGhWL0hpaEFLIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRELjhXS2t4bTlHMVBQZDdPZVNnU2FlUXZjMjBKR2ZPTzNvdXVzZXk5L2NrbkhoVi9IaWhBSyI7czo1OiJhbGVydCI7YTowOnt9fQ==', 1624422531);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `jumlahMaterial` int(11) DEFAULT NULL,
  `satuanHarga` int(11) DEFAULT NULL,
  `jumlahHarga` int(11) DEFAULT NULL,
  `satuan` varchar(244) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tests`
--

INSERT INTO `tests` (`id`, `jumlahMaterial`, `satuanHarga`, `jumlahHarga`, `satuan`, `updated_at`, `created_at`) VALUES
(1, 9, 9, 81, 'oko', '2020-11-25 22:25:09', '2020-11-25 22:25:09'),
(2, 8, 8, 64, 'ofdsok', '2020-11-25 22:25:09', '2020-11-25 22:25:09'),
(3, 9, 7, 63, 'kdsj', '2020-11-25 22:25:09', '2020-11-25 22:25:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Diaz', 'admin@mail.com', NULL, '$2y$10$AEV0K56JDGSC8Tdq0F.oR.Pdlodg2U.UQ1LysB6AEAA3WRSneYBVa', NULL, NULL, 'd7mMPWVb1kr4peEuJGZgO3KEnkYaiNSTNy1MQRHxKvjVr5mueAogHxKnRkAK', NULL, NULL, '2020-11-03 15:30:01', '2020-11-03 15:30:01'),
(2, 'panji denis', 'panjidenisgiantoroo@gmail.com', NULL, '$2y$10$D.8WKkxm9G1PPd7OeSgSaeQvc20JGfOO3ouusey9/cknHhV/HihAK', NULL, NULL, NULL, NULL, NULL, '2021-06-11 12:35:56', '2021-06-11 12:35:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fakturs`
--
ALTER TABLE `fakturs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur_barangs`
--
ALTER TABLE `faktur_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goods_first_stocks`
--
ALTER TABLE `goods_first_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goods_prices`
--
ALTER TABLE `goods_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goods_stocks`
--
ALTER TABLE `goods_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `good_price_histories`
--
ALTER TABLE `good_price_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gross_expenses`
--
ALTER TABLE `gross_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlets`
--
ALTER TABLE `outlets`
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
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tests`
--
ALTER TABLE `tests`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faktur_barangs`
--
ALTER TABLE `faktur_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `goods`
--
ALTER TABLE `goods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `goods_first_stocks`
--
ALTER TABLE `goods_first_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `goods_prices`
--
ALTER TABLE `goods_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `goods_stocks`
--
ALTER TABLE `goods_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `good_price_histories`
--
ALTER TABLE `good_price_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gross_expenses`
--
ALTER TABLE `gross_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
