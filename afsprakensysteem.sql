-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 nov 2026 om 16:59
-- Serverversie: 10.11.16-MariaDB
-- PHP-versie: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afsprakensysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afsprakens`
--

CREATE TABLE `afsprakens` (
  `afspraak_id` int(10) UNSIGNED NOT NULL,
  `klant_id` int(10) UNSIGNED NOT NULL,
  `Afspraak_title` varchar(255) NOT NULL,
  `Afspraak_datum` date NOT NULL,
  `Afspraak_omschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `afsprakens`
--

INSERT INTO `afsprakens` (`afspraak_id`, `klant_id`, `Afspraak_title`, `Afspraak_datum`, `Afspraak_omschrijving`) VALUES
(2, 1, 'Airco-service', '2026-11-12', 'Hello'),
(3, 2, 'BandenWissel', '2026-11-12', 'Hello worldvfre'),
(4, 4, 'Grote Beurt', '2026-11-25', 'Test test Test'),
(5, 5, 'Auto wassen', '2026-11-30', 'fffffffffff'),
(6, 1, 'Airco-service', '2026-12-04', 'ffffwwfwggefwger3rwrg5e'),
(7, 1, 'Airco service', '2026-11-19', 'fdfiijfrijeijeienfenf'),
(8, 5, 'BandenWissel', '2026-11-25', 'Test testing');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beurts`
--

CREATE TABLE `beurts` (
  `beurt_id` int(10) UNSIGNED NOT NULL,
  `afspraak_id` int(10) UNSIGNED DEFAULT NULL,
  `beurt_naam` varchar(255) NOT NULL,
  `beurt_datum` date NOT NULL,
  `beurt_tijd` time NOT NULL,
  `maximaal_aantal_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `beurts`
--

INSERT INTO `beurts` (`beurt_id`, `afspraak_id`, `beurt_naam`, `beurt_datum`, `beurt_tijd`, `maximaal_aantal_auto`) VALUES
(2, 2, 'PDA-01-D', '2026-11-12', '23:51:00', 5),
(3, 4, '1439-D', '2026-11-12', '23:59:00', 3),
(4, 3, 'Banden Wissel', '2026-11-12', '11:01:00', 2),
(5, 5, 'Auto Wassen', '2026-12-01', '23:01:00', 2),
(6, 5, '1439-D3', '2026-11-26', '12:39:00', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `job_batches`
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
-- Tabelstructuur voor tabel `klantens`
--

CREATE TABLE `klantens` (
  `klant_id` int(10) UNSIGNED NOT NULL,
  `klant_naam` varchar(255) NOT NULL,
  `klant_email` varchar(255) NOT NULL,
  `klant_telefoon` varchar(255) NOT NULL,
  `klant_password` varchar(255) NOT NULL,
  `klant_role` enum('admin','klant') NOT NULL DEFAULT 'klant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klantens`
--

INSERT INTO `klantens` (`klant_id`, `klant_naam`, `klant_email`, `klant_telefoon`, `klant_password`, `klant_role`) VALUES
(1, 'Mohammed Yilmaz', 'JoeMama@gmail.com', '43242424', '$2y$12$n5yFtr9shQ8wlrd36n4L2O8bm/is4sykR0DC.9kB4QQx66aJf3QCC', 'klant'),
(2, 'JustinBieber', 'JustinBieber@gmail.com', '+597 852-3412', '$2y$12$dg8KUj89qx3qCNo4CcO3cefby7CRNd6yJAfx5Izg3WNrQLdW61dlS', 'admin'),
(3, 'Jake Paul', 'JakePaul@gmail.com', '+597 852-3412', '$2y$12$p0WAp47s/KMbMolcQiupveHq2USVezq3ubW2DX3H3UYEX9qYjO1pO', 'klant'),
(4, 'Regeffio Baarn', 'regeffio@gmail.com', '220-3031', '$2y$12$BDE0TgpDE4z8GkAGxIuZguWy1T3JRwmKsbUHhOkvDqaPGMWrOPLbu', 'admin'),
(5, 'Anna Bos', 'AnosBos@gmail.com', '4929222', '$2y$12$k2OU2u.9RXyrAtTbJHZK.et8rnDcDCfpi6GYDQ/39LLXcz/1YIf5e', 'klant');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_11_12_101614_create_klantens_table', 1),
(5, '2026_11_12_123155_create_afsprakens_table', 1),
(6, '2026_11_12_124152_create_beurts_table', 1),
(7, '2026_11_12_143738_make_afspraak_id_nullable_on_beurts_table', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sessions`
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
-- Gegevens worden geëxporteerd voor tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8Hdpzk84yLAS0D6qDTAbiqlUV5jFjOvGDLwnWsGb', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJiZTVWbGJOZzZlakNOcHVmMlozWFlHaUREUkhMRUE1ckNBeEc0eTlqIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL0JldXJ0QmVoZXJlblwvY3JlYXRlIiwicm91dGUiOiJCZXVydEJlaGVyZW4uY3JlYXRlIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyLCJwYXNzd29yZF9oYXNoX3dlYiI6IjExNzllYjNkYTU2ZTA5NzNmM2ViYjhlZjU4MDgzNThhZmY1ZGFjZGM1NDU0ZjE5MGJlMjdjMDQ0NzMwNDQ3MTMifQ==', 1794498541);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afsprakens`
--
ALTER TABLE `afsprakens`
  ADD PRIMARY KEY (`afspraak_id`),
  ADD KEY `afsprakens_klant_id_foreign` (`klant_id`);

--
-- Indexen voor tabel `beurts`
--
ALTER TABLE `beurts`
  ADD PRIMARY KEY (`beurt_id`),
  ADD KEY `beurts_afspraak_id_foreign` (`afspraak_id`);

--
-- Indexen voor tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexen voor tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexen voor tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexen voor tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klantens`
--
ALTER TABLE `klantens`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afsprakens`
--
ALTER TABLE `afsprakens`
  MODIFY `afspraak_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `beurts`
--
ALTER TABLE `beurts`
  MODIFY `beurt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klantens`
--
ALTER TABLE `klantens`
  MODIFY `klant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `afsprakens`
--
ALTER TABLE `afsprakens`
  ADD CONSTRAINT `afsprakens_klant_id_foreign` FOREIGN KEY (`klant_id`) REFERENCES `klantens` (`klant_id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `beurts`
--
ALTER TABLE `beurts`
  ADD CONSTRAINT `beurts_afspraak_id_foreign` FOREIGN KEY (`afspraak_id`) REFERENCES `afsprakens` (`afspraak_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
