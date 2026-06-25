-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2026 a las 20:42:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_comalapa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyos`
--

CREATE TABLE `apoyos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo_votante`
--

CREATE TABLE `apoyo_votante` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `votante_id` bigint(20) UNSIGNED NOT NULL,
  `apoyo_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casillas`
--

CREATE TABLE `casillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ubicacion_texto` varchar(255) DEFAULT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `casillas`
--

INSERT INTO `casillas` (`id`, `seccion_id`, `nombre`, `ubicacion_texto`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 1, 'aasdads', NULL, NULL, NULL, '2026-06-26 00:00:54', '2026-06-26 00:00:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `votante_id` bigint(20) UNSIGNED NOT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `referencias` varchar(255) DEFAULT NULL,
  `foto_credencial` varchar(255) DEFAULT NULL,
  `foto_personal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expedientes`
--

INSERT INTO `expedientes` (`id`, `votante_id`, `curp`, `telefono`, `fecha_nacimiento`, `genero`, `calle`, `numero`, `colonia`, `referencias`, `foto_credencial`, `foto_personal`, `created_at`, `updated_at`) VALUES
(1, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'expedientes/3mQEyLVAuGpJwqZ8T4N8RTf1GZzIfLNKT5COs3IR.jpg', 'expedientes/kXLiBS6kDtnt6musPjtr6u0aEqe24GIxq0Bhjs7l.png', '2026-06-26 00:23:14', '2026-06-26 00:23:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
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
-- Estructura de tabla para la tabla `job_batches`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mototaxis`
--

CREATE TABLE `mototaxis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `votante_id` bigint(20) UNSIGNED NOT NULL,
  `numero_economico` varchar(255) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '3a644afc8d32f0320404dbe905de5ea105843c6eee2de7267574c08ab7e4e4bf', '[\"*\"]', '2026-06-25 10:57:32', NULL, '2026-06-25 08:39:14', '2026-06-25 10:57:32'),
(2, 'App\\Models\\User', 1, 'auth_token', 'c8316014f26d8ab0b0b611fe46096352c037473e31883e85c76c66ff22812184', '[\"*\"]', '2026-06-25 10:21:02', NULL, '2026-06-25 09:57:45', '2026-06-25 10:21:02'),
(3, 'App\\Models\\User', 1, 'auth_token', 'fd89b0bc3b64e61d78078279371ef0d10ea55afaf9c3add4edbe45d445e16e3a', '[\"*\"]', '2026-06-25 11:45:58', NULL, '2026-06-25 11:02:44', '2026-06-25 11:45:58'),
(4, 'App\\Models\\User', 1, 'auth_token', '151a4bcc03525e962dc6fea3667a2da9dbb03c443b52efe923473a4655a98ff6', '[\"*\"]', '2026-06-25 12:00:39', NULL, '2026-06-25 11:46:08', '2026-06-25 12:00:39'),
(5, 'App\\Models\\User', 1, 'auth_token', 'c9fddde95ceb255bb16e0794eed070a408bc8f6a737e21f6636c17f5a98b9938', '[\"*\"]', '2026-06-25 12:01:33', NULL, '2026-06-25 12:00:55', '2026-06-25 12:01:33'),
(6, 'App\\Models\\User', 1, 'auth_token', '2cd51ce502721d8f51d00f23408a9a97abd0bcd56cf8a971da564ac9f0acc093', '[\"*\"]', '2026-06-25 12:19:31', NULL, '2026-06-25 12:02:59', '2026-06-25 12:19:31'),
(7, 'App\\Models\\User', 1, 'auth_token', 'c7d4b8058cfcfe90f742e491db2ea6d71a6c75ad62af6ee013c6afdeb68bdef0', '[\"*\"]', '2026-06-25 12:26:33', NULL, '2026-06-25 12:19:45', '2026-06-25 12:26:33'),
(8, 'App\\Models\\User', 1, 'auth_token', '3e553be06146d2de295d7fea2106ffaf6e5d9a9654fb11af40c82f19b1f57474', '[\"*\"]', '2026-06-25 12:28:06', NULL, '2026-06-25 12:26:46', '2026-06-25 12:28:06'),
(9, 'App\\Models\\User', 1, 'auth_token', '36081f70fc58f4bdd7e538a5fb364c81d4fcd51fe83611bb46eedab70ca31557', '[\"*\"]', '2026-06-25 12:29:03', NULL, '2026-06-25 12:28:17', '2026-06-25 12:29:03'),
(14, 'App\\Models\\User', 1, 'auth_token', 'cade3a5a62ed803a5af991bb6ee840beba225ea01c9f52405481b54bd225816d', '[\"*\"]', '2026-06-25 12:43:19', NULL, '2026-06-25 12:39:14', '2026-06-25 12:43:19'),
(15, 'App\\Models\\User', 1, 'auth_token', '462eb8f75ad88ddfd507150bebc91f02b3f4693b44235b48847ec55b7a175350', '[\"*\"]', '2026-06-25 12:50:25', NULL, '2026-06-25 12:43:31', '2026-06-25 12:50:25'),
(16, 'App\\Models\\User', 1, 'auth_token', '0d93db887aedf761b821d9274933bf110d3ba857776c383b4931fa4793a83185', '[\"*\"]', '2026-06-25 12:53:52', NULL, '2026-06-25 12:50:37', '2026-06-25 12:53:52'),
(17, 'App\\Models\\User', 1, 'auth_token', '8e8ef009ac2525b089edf048abc906b4e24cc1c947ae1fd78a3c6dbd438df7bf', '[\"*\"]', '2026-06-25 12:56:43', NULL, '2026-06-25 12:54:07', '2026-06-25 12:56:43'),
(18, 'App\\Models\\User', 3, 'auth_token', 'ecbccccda3f96f72014a752120d0c8660eb71ef073119f01e993a4a605e13865', '[\"*\"]', '2026-06-25 12:58:07', NULL, '2026-06-25 12:56:58', '2026-06-25 12:58:07'),
(20, 'App\\Models\\User', 1, 'auth_token', '216368d7195183c39fdaa1eeb9acb197f2ae34825144294c81bccdb59aeafe48', '[\"*\"]', '2026-06-25 13:00:59', NULL, '2026-06-25 12:58:53', '2026-06-25 13:00:59'),
(21, 'App\\Models\\User', 3, 'auth_token', '71f4da030db0dc5883c20249462cced295501e59391223c33c62b1e81b2968e5', '[\"*\"]', '2026-06-25 13:01:39', NULL, '2026-06-25 13:01:34', '2026-06-25 13:01:39'),
(22, 'App\\Models\\User', 1, 'auth_token', '46b4caf7b733df410c9a1cd9fe14fd56e74bc4401f5af0e8656f59bf5c751eb3', '[\"*\"]', '2026-06-26 00:41:00', NULL, '2026-06-25 13:01:49', '2026-06-26 00:41:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero` varchar(10) NOT NULL,
  `casillas_disponibles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`casillas_disponibles`)),
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `poligono` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`poligono`)),
  `barrios` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`barrios`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `numero`, `casillas_disponibles`, `latitud`, `longitud`, `poligono`, `barrios`, `created_at`, `updated_at`) VALUES
(1, '1212', '[\"aasdads\"]', NULL, NULL, NULL, '[]', '2026-06-26 00:00:54', '2026-06-26 00:00:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9IigcXCtYklFus6Rks6WrUjCUqchimuXen5URhjI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN29NZUI2blFkZmlxeEJoTEVrc1kyODZkZFY3ZXl0OFhPZllVbmVnWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782410276),
('GEpx0XslhmI2DTF4ZSHOMvTLyXZAaKJxexLvXxqy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjFVZ3F3cVVXMjF3OTFZNnFWNEFjTDFiRzNGdHVSRlRaN056Q2N1NyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1782350158);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'movilizador',
  `seccion` varchar(255) DEFAULT NULL,
  `casilla` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `rol`, `seccion`, `casilla`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Guzman', 'admin', 'admin@delta.com', NULL, '$2y$12$c835wx8DeyG8QfZs3/JfHeSu9q3OFeIIrVS8I4r/j8bEyyfZh1Ysy', NULL, 'superadmin', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 12:02:35'),
(3, 'Rosa Mel', 'ROSA', 'ROSA@sistema.local', NULL, '$2y$12$hWe.ZKcs6ONVOJMujmfkuexhgaBOAA2nYtPHiK.iY/2Ovq2ejIKem', NULL, 'capturista', NULL, NULL, '2026-06-25 12:38:07', '2026-06-25 12:56:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votantes`
--

CREATE TABLE `votantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave_elector` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `latitud` varchar(255) DEFAULT NULL,
  `longitud` varchar(255) DEFAULT NULL,
  `seccion` varchar(10) NOT NULL,
  `casilla` varchar(255) DEFAULT NULL,
  `asociacion` varchar(255) DEFAULT NULL,
  `foto_url` text DEFAULT NULL,
  `simpatia` enum('a_favor','en_contra','indeciso','no_visitado') NOT NULL DEFAULT 'no_visitado',
  `foto_evidencia` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `votantes`
--

INSERT INTO `votantes` (`id`, `clave_elector`, `nombre`, `direccion`, `latitud`, `longitud`, `seccion`, `casilla`, `asociacion`, `foto_url`, `simpatia`, `foto_evidencia`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'GENP037946PZWK7502', 'ILIANA SWANIAWSKI', NULL, NULL, NULL, '1071', 'Contigua 1', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(2, 'YSQQ131476UNVY2358', 'CHRISTELLE BARTOLETTI', NULL, NULL, NULL, '1070', 'Contigua 1', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(3, 'SXJG215832HEKO0942', 'MISS ESPERANZA HARRIS', NULL, NULL, NULL, '1070', 'Contigua 3', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(4, 'TLNQ614313VWAZ6229', 'LOY TILLMAN', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(5, 'MNOH266761RKCC3523', 'JAYCE STARK DDS', NULL, NULL, NULL, '1071', 'Extraordinaria', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(6, 'TIDF739698QCNW1002', 'PROF. ROSE FEENEY III', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(7, 'RKAX390950LYIV1146', 'CORTEZ POWLOWSKI', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(8, 'ZYMA889418BICL1001', 'PROF. SHAINA SCHUMM', NULL, NULL, NULL, '1071', 'Contigua 1', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(9, 'JYMA428307WJMY1283', 'GEORGIANNA JOHNSON', NULL, NULL, NULL, '1071', 'Básica', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(10, 'YZAQ680666TVJN8170', 'JAMEL POUROS', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(11, 'RFDQ357177WLMX4409', 'MS. OTTILIE HUEL', NULL, NULL, NULL, '1071', 'Contigua 1', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(12, 'VTEW452476YOHQ5693', 'LESTER GUTMANN II', NULL, NULL, NULL, '1070', 'Contigua 3', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(13, 'MZDA215524XOFD7698', 'PROF. IDELLA DACH II', NULL, NULL, NULL, '1071', 'Básica', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(14, 'GQTK303315XZBJ9129', 'TRENT ROBERTS', NULL, NULL, NULL, '1070', 'Básica', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(15, 'ONOT951555TELW7640', 'MRS. LYDA DOOLEY', NULL, NULL, NULL, '1070', 'Contigua 2', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(16, 'QRZD958635GKUP4157', 'STEPHANIE SCHILLER', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(17, 'NWDM576667PALP5206', 'PROF. CLEVELAND LOWE', NULL, NULL, NULL, '1071', 'Extraordinaria', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(18, 'QVPR675798MIHO9971', 'TESSIE THIEL', NULL, NULL, NULL, '1070', 'Contigua 2', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(19, 'AQQP353385OBER5714', 'BERENICE KUTCH', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(20, 'QIYN063527OSAZ2547', 'ANAIS STARK', NULL, NULL, NULL, '1071', NULL, NULL, 'fotos_padron/anais_stark_1782411805.jpg', 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-26 00:23:25'),
(21, 'YBED681704SHXV5284', 'MR. KADEN CUMMERATA V', NULL, NULL, NULL, '1070', 'Básica', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(22, 'ZPJA021307PJDZ6346', 'DELFINA KEMMER', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(23, 'XGIM178042INSL3716', 'DORIS KING V', NULL, NULL, NULL, '1070', 'Contigua 2', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(24, 'HTKX850408NCEV0659', 'ARTHUR GULGOWSKI', NULL, NULL, NULL, '1070', NULL, NULL, 'fotos_padron/arthur_gulgowski_1782411814.jpg', 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-26 00:23:34'),
(25, 'LWYB765354TUMR1485', 'ROLLIN WEIMANN II', NULL, NULL, NULL, '1071', 'Básica', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(26, 'TQQR113395HTOJ5529', 'ADELIA COLLINS', NULL, NULL, NULL, '1212', 'AASDADS', 'chile_piquin', 'fotos_padron/adelia_collins_1782411481.jpg', 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-26 00:23:43'),
(27, 'ELAN778798QXUS1403', 'HOPE HOWELL DVM', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(28, 'IJLN409038BVKC1760', 'MAZIE CREMIN', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(29, 'TEGS356590XOUD2951', 'STERLING VEUM', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(30, 'TFHY939611EEBO4685', 'PRINCE BEIER', NULL, NULL, NULL, '1070', 'Contigua 1', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(31, 'KQOV273929GBYR1941', 'EBBA KOEPP', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(32, 'ONZV846722PAMA7166', 'DR. ELTON HAMMES', NULL, NULL, NULL, '1070', 'Contigua 2', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(33, 'BJEB753471XAZA6486', 'DR. JERRY ROMAGUERA II', NULL, NULL, NULL, '1070', 'Básica', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(34, 'VUHW699637IYMY5641', 'MARIE DENESIK', NULL, NULL, NULL, '1071', 'Contigua 3', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(35, 'HFBB466060DNFH9528', 'AUGUSTUS STEHR', NULL, NULL, NULL, '1070', 'Contigua 3', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(36, 'RLCO764058EMVB3129', 'HELLEN PURDY', NULL, NULL, NULL, '1070', 'Contigua 3', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(37, 'FLGU199304PIGU7516', 'DR. LURLINE LANGOSH', NULL, NULL, NULL, '1071', 'Extraordinaria', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(38, 'BUOH406725MQBQ5006', 'JOAQUIN LIND SR.', NULL, NULL, NULL, '1071', 'Contigua 2', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(39, 'XAWT877146CABQ1151', 'CANDIDO HESSEL', NULL, NULL, NULL, '1071', 'Contigua 1', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(40, 'XXLG611345LPNN6425', 'VADA SCHULTZ', NULL, NULL, NULL, '1070', 'Contigua 2', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(41, 'DCOR253235ALKT1165', 'STUART ANKUNDING', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(42, 'BUQP995036VWMK5817', 'KAIA KIRLIN', NULL, NULL, NULL, '1070', 'Contigua 1', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(43, 'OLAI763791XZFM6791', 'YESENIA GLEASON I', NULL, NULL, NULL, '1070', 'Básica', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(44, 'HKZG035967MCYL5065', 'PROF. ADRIEN CRUICKSHANK DVM', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(45, 'ANIW643097DBYM8636', 'PROF. JORDON HUELS IV', NULL, NULL, NULL, '1070', 'Básica', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(46, 'FFSZ535870PZIQ5615', 'JERROD FEEST', NULL, NULL, NULL, '1071', 'Contigua 2', NULL, NULL, 'a_favor', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(47, 'OURZ448787KBDY8072', 'ROSSIE MARKS', NULL, NULL, NULL, '1070', 'Contigua 1', NULL, NULL, 'indeciso', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(48, 'VARS077291SAOJ5920', 'JOHNSON KASSULKE', NULL, NULL, NULL, '1071', 'Extraordinaria', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(49, 'PXHI631880CZVS0931', 'CITLALLI LABADIE', NULL, NULL, NULL, '1070', 'Extraordinaria', NULL, NULL, 'no_visitado', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14'),
(50, 'RRLV840058XITA8833', 'TITUS MURRAY DVM', NULL, NULL, NULL, '1071', 'Básica', NULL, NULL, 'en_contra', NULL, NULL, '2026-06-25 08:17:14', '2026-06-25 08:17:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apoyos`
--
ALTER TABLE `apoyos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apoyo_votante`
--
ALTER TABLE `apoyo_votante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apoyo_votante_votante_id_foreign` (`votante_id`),
  ADD KEY `apoyo_votante_apoyo_id_foreign` (`apoyo_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `casillas`
--
ALTER TABLE `casillas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `casillas_seccion_id_foreign` (`seccion_id`);

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expedientes_votante_id_unique` (`votante_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mototaxis`
--
ALTER TABLE `mototaxis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mototaxis_votante_id_foreign` (`votante_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secciones_numero_unique` (`numero`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `votantes`
--
ALTER TABLE `votantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `votantes_clave_elector_unique` (`clave_elector`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apoyos`
--
ALTER TABLE `apoyos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `apoyo_votante`
--
ALTER TABLE `apoyo_votante`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casillas`
--
ALTER TABLE `casillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mototaxis`
--
ALTER TABLE `mototaxis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `votantes`
--
ALTER TABLE `votantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apoyo_votante`
--
ALTER TABLE `apoyo_votante`
  ADD CONSTRAINT `apoyo_votante_apoyo_id_foreign` FOREIGN KEY (`apoyo_id`) REFERENCES `apoyos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `apoyo_votante_votante_id_foreign` FOREIGN KEY (`votante_id`) REFERENCES `votantes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `casillas`
--
ALTER TABLE `casillas`
  ADD CONSTRAINT `casillas_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_votante_id_foreign` FOREIGN KEY (`votante_id`) REFERENCES `votantes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mototaxis`
--
ALTER TABLE `mototaxis`
  ADD CONSTRAINT `mototaxis_votante_id_foreign` FOREIGN KEY (`votante_id`) REFERENCES `votantes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
