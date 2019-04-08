-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-08-2017 a las 00:22:44
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(4, 'SUDADERA', NULL, NULL),
(11, 'CAMISA', '2017-07-14 05:23:11', '2017-07-14 05:23:11'),
(13, 'PLAYERA', '2017-07-23 00:34:54', '2017-07-23 00:34:54'),
(16, 'JERSEY', '2017-07-25 01:07:30', '2017-07-25 01:07:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `producto_id`, `imagen`, `created_at`, `updated_at`) VALUES
(110, 37, 'tiendaOnline_1500767503img1.png', '2017-07-23 04:51:43', '2017-07-23 04:51:43'),
(111, 37, 'tiendaOnline_1500767503img3.png', '2017-07-23 04:51:43', '2017-07-23 04:51:43'),
(112, 38, 'tiendaOnline_1500767603playera2.jpg', '2017-07-23 04:53:23', '2017-07-23 04:53:23'),
(113, 39, 'tiendaOnline_1500767707articulo8.jpg', '2017-07-23 04:55:07', '2017-07-23 04:55:07'),
(114, 40, 'tiendaOnline_1500778160Articulo4.jpg', '2017-07-23 07:49:20', '2017-07-23 07:49:20'),
(115, 41, 'tiendaOnline_1500915279Articulo7.jpg', '2017-07-24 21:54:39', '2017-07-24 21:54:39'),
(116, 42, 'tiendaOnline_1500915392Articulo16.jpg', '2017-07-24 21:56:32', '2017-07-24 21:56:32'),
(117, 43, 'tiendaOnline_1500915664Articulo15.jpg', '2017-07-24 22:01:04', '2017-07-24 22:01:04'),
(118, 44, 'tiendaOnline_1500924775necaxa.png', '2017-07-25 00:32:55', '2017-07-25 00:32:55'),
(125, 45, 'tiendaOnline_1500925319ac milan local4.jpg', '2017-07-25 00:41:59', '2017-07-25 00:41:59'),
(126, 45, 'tiendaOnline_1500925320ac milan local3.jpg', '2017-07-25 00:42:00', '2017-07-25 00:42:00'),
(129, 46, 'tiendaOnline_1500926820manchester2.jpg', '2017-07-25 01:07:00', '2017-07-25 01:07:00'),
(130, 46, 'tiendaOnline_1500926820manchester1.jpg', '2017-07-25 01:07:00', '2017-07-25 01:07:00'),
(131, 47, 'tiendaOnline_1500927538acmilanvisitante20163.jpg', '2017-07-25 01:18:58', '2017-07-25 01:18:58'),
(132, 47, 'tiendaOnline_1500927538acmilanvisitante20162.jpg', '2017-07-25 01:18:58', '2017-07-25 01:18:58'),
(133, 48, 'tiendaOnline_1500929168images.jpg', '2017-07-25 01:46:08', '2017-07-25 01:46:08'),
(134, 49, 'tiendaOnline_1500929512images (1).jpg', '2017-07-25 01:51:52', '2017-07-25 01:51:52'),
(135, 50, 'tiendaOnline_1501000208camisa1.jpg', '2017-07-25 21:30:08', '2017-07-25 21:30:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_03_161149_create_categorias_table', 1),
(4, '2017_07_03_161756_create_datos__envio_table', 1),
(5, '2017_07_03_162821_create_tarjeta__tipos_table', 1),
(6, '2017_07_03_162957_create_tarjetas_table', 1),
(7, '2017_07_03_163757_create_productos_table', 1),
(8, '2017_07_03_163948_create_imagenes_table', 1),
(9, '2017_07_03_164148_create_compras_table', 1),
(10, '2017_07_03_165243_create_tallas_table', 1),
(11, '2017_07_11_212446_addsluggable', 2),
(13, '2017_07_20_222540_create_ordenes_table', 3),
(14, '2017_07_20_222541_create_orden_items_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `envio` decimal(10,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `subtotal`, `envio`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '1750.00', '100.00', 94, '2017-07-23 04:56:09', '2017-07-23 04:56:09'),
(5, '650.00', '100.00', 94, '2017-07-23 07:46:15', '2017-07-23 07:46:15'),
(6, '4400.00', '100.00', 94, '2017-07-24 02:13:57', '2017-07-24 02:13:57'),
(7, '2600.00', '100.00', 109, '2017-07-24 20:31:54', '2017-07-24 20:31:54'),
(8, '400.00', '100.00', 94, '2017-07-25 04:29:23', '2017-07-25 04:29:23'),
(9, '1500.00', '100.00', 111, '2017-07-25 04:38:10', '2017-07-25 04:38:10'),
(10, '1600.00', '100.00', 113, '2017-07-25 21:17:24', '2017-07-25 21:17:24'),
(11, '5200.00', '100.00', 113, '2017-07-25 21:27:02', '2017-07-25 21:27:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_items`
--

CREATE TABLE `orden_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `orden_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orden_items`
--

INSERT INTO `orden_items` (`id`, `cantidad`, `precio`, `producto_id`, `orden_id`) VALUES
(4, 2, '800.00', 37, 4),
(5, 1, '150.00', 38, 4),
(6, 1, '200.00', 39, 5),
(7, 3, '150.00', 38, 5),
(8, 5, '800.00', 37, 6),
(9, 2, '200.00', 39, 6),
(10, 13, '200.00', 39, 7),
(11, 1, '400.00', 47, 8),
(12, 1, '500.00', 49, 9),
(13, 2, '500.00', 48, 9),
(14, 1, '400.00', 47, 10),
(15, 1, '1200.00', 44, 10),
(16, 3, '1400.00', 45, 11),
(17, 2, '500.00', 49, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `vendido` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `categoria_id`, `vendido`, `created_at`, `updated_at`, `slug`) VALUES
(37, 'Joker', 'Sudadera original dc comics', '800', '5', 11, 5, '2017-07-23 04:50:55', '2017-07-24 02:13:57', 'joker'),
(38, 'Batman the dark knight returns', 'Playera oficial 100 algodon', '150', '4', 13, 0, '2017-07-23 04:53:22', '2017-07-23 04:53:22', 'batman-the-dark-knight-returns'),
(39, 'COLO COLO', 'ORIGINAL', '200', '15', 13, 15, '2017-07-23 04:55:07', '2017-07-24 21:06:37', 'colo-colo'),
(40, 'DC', 'PLAYERA DC ALGODON', '100', '20', 4, 0, '2017-07-23 07:49:20', '2017-07-23 07:49:41', 'dc'),
(41, 'Camisa DC', 'camisa dc 2018', '500', '20', 11, 0, '2017-07-24 21:21:43', '2017-07-24 21:54:39', 'gbdgtd'),
(42, 'Evolucion', 'playera hecha a mano en mexico', '150', '10', 13, 0, '2017-07-24 21:56:32', '2017-07-24 21:56:32', 'evolucion'),
(43, 'Vans off the wall', 'poliester', '200', '34', 13, 0, '2017-07-24 22:01:04', '2017-07-24 22:01:04', 'vans-off-the-wall'),
(44, 'Jersey Necaxa Charly', 'Jersey Charly Necaxa Local Liga MX', '1200', '26', 16, 1, '2017-07-25 00:32:55', '2017-07-25 21:17:24', 'jersey-necaxa-charly'),
(45, 'AC MILAN JERSEY 2017 2018', 'Jersey Ac milan oficial Adidas', '1400', '3', 16, 3, '2017-07-25 00:38:45', '2017-07-25 21:27:02', 'ac-milan-jersey-2017-2018'),
(46, 'Manchester United Jersey 2018', 'Adquiere el Jersey Adidas Manchester United', '1200', '10', 16, 0, '2017-07-25 01:05:53', '2017-07-25 01:08:34', 'manchester-united-jersey-2018'),
(47, 'AC MILAN VISITANTE 2015', 'Apoya al mejor equipo de la seria A con este increbile jersey', '400', '3', 16, 2, '2017-07-25 01:18:57', '2017-07-25 21:17:24', 'ac-milan-visitante-2015'),
(48, 'Puma jersey', 'Adquiere esta playera orginal puma elegante', '500', '18', 16, 2, '2017-07-25 01:46:08', '2017-07-25 04:38:11', 'puma-jersey'),
(49, 'Jersey necaxa visitante 2017', 'Jersey oficial', '500', '17', 4, 3, '2017-07-25 01:51:51', '2017-07-25 21:27:02', 'jersey-necaxa-visitante-2017'),
(50, 'Camisa7', 'esta es una camisa', '100', '10', 11, 0, '2017-07-25 21:30:07', '2017-07-25 21:30:07', 'camisa7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_talla`
--

CREATE TABLE `producto_talla` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `talla_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_talla`
--

INSERT INTO `producto_talla` (`id`, `producto_id`, `talla_id`, `created_at`, `updated_at`) VALUES
(44, 37, 2, NULL, NULL),
(45, 37, 3, NULL, NULL),
(46, 38, 1, NULL, NULL),
(47, 38, 2, NULL, NULL),
(48, 38, 3, NULL, NULL),
(49, 39, 2, NULL, NULL),
(50, 40, 1, NULL, NULL),
(51, 40, 2, NULL, NULL),
(52, 41, 2, NULL, NULL),
(53, 41, 1, NULL, NULL),
(54, 41, 3, NULL, NULL),
(55, 42, 1, NULL, NULL),
(56, 42, 2, NULL, NULL),
(57, 42, 3, NULL, NULL),
(58, 43, 1, NULL, NULL),
(59, 43, 2, NULL, NULL),
(60, 44, 1, NULL, NULL),
(61, 44, 2, NULL, NULL),
(62, 44, 3, NULL, NULL),
(63, 45, 1, NULL, NULL),
(64, 45, 2, NULL, NULL),
(65, 46, 1, NULL, NULL),
(66, 46, 2, NULL, NULL),
(67, 47, 2, NULL, NULL),
(68, 47, 3, NULL, NULL),
(69, 48, 1, NULL, NULL),
(70, 48, 2, NULL, NULL),
(71, 48, 3, NULL, NULL),
(72, 49, 3, NULL, NULL),
(73, 49, 4, NULL, NULL),
(74, 50, 1, NULL, NULL),
(75, 50, 2, NULL, NULL),
(76, 50, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` int(10) UNSIGNED NOT NULL,
  `talla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`, `created_at`, `updated_at`) VALUES
(1, 'CH', NULL, '2017-07-15 00:35:34'),
(2, 'M', NULL, NULL),
(3, 'G', NULL, NULL),
(4, 'XG', NULL, NULL),
(5, 'S', '2017-07-15 00:19:49', '2017-07-15 00:19:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('member','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Juan', 'juan@gmail.com', '$2y$10$IcAC2WajtjSe8TP0jbeO7OO781/8xgVeUX6.NEZokfuoPJ6UAFsle', 'member', NULL, '2017-07-12 09:26:35', '2017-07-12 09:26:35'),
(24, 'Julio', 'julio@ga', '$2y$10$n/cVMFEyuT4fSCXBovIYGusKM83htoxlWcGu3GOt0v5xNJY1R9MSS', 'admin', NULL, '2017-07-13 03:52:15', '2017-07-25 03:55:11'),
(94, 'Angel', 'angelrene_sum41@hotmail.com', '$2y$10$3/3W4zH8IcYEfgP4erxJruRKqMSqp.FQ8ictYEtGBP4ZjafSY.2oS', 'admin', '0iefsRnE6k6tN8NTuQh7WdFrHLICGaiqHTeL0FroKA0kDnNhcx57UewE2bYd', '2017-07-16 07:31:40', '2017-07-25 03:55:36'),
(97, 'Mr Blake Watsica III', 'dasia.cassin@example.net', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:42', '2017-07-24 21:52:54'),
(99, 'Isabella Wunsch', 'vince30@example.net', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-16 07:32:43'),
(102, 'Marvin jahjahjah', 'bogan.margarita@example.net', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-23 04:53:39'),
(103, 'Edward Langworth', 'upton.lourdes@example.com', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-16 07:32:43'),
(104, 'Dr. Tessie Frami', 'keebler.clementina@example.com', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-16 07:32:43'),
(105, 'Vergie Bogisich', 'aurelio15@example.net', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-16 07:32:43'),
(106, 'Jacinto Rowe', 'yherman@example.com', '$2y$10$BnhJl4KDFs3g.IH/8RgIfuUpnC2EMKfCT6Ql1keu9ugBTbMz2Q7nC', 'member', NULL, '2017-07-16 07:32:43', '2017-07-16 07:32:43'),
(107, 'German g', 'german@gmail.com', '$2y$10$nVLHYOTxbiBit3EBFYL5cudbu3IAVSm1AUfDlO3UjGknXfRQUvIoO', 'member', 'UkhlvDUUGlpnL85U45osDuR9xyYKquY9w0mGc39yRUB3CdQDSbHNKOpg73Pp', '2017-07-19 23:41:06', '2017-07-19 23:41:06'),
(108, 'luis pacheco', 'jajajshjs@hotmail.com', '$2y$10$LDrM29/Eiyr7LIHqj19F9OtOB7Mypl8RMEGrDT4q7q0sXp2xf09t2', 'member', NULL, '2017-07-23 00:29:01', '2017-07-23 00:29:01'),
(109, 'germanWF', '827398273@gmail.com', '$2y$10$2m2nbsEOAwJLcg9d8Sesfu.uvVJCYQntGbJ5IUb4bdF/tOACKiT2K', 'member', 'qCEylQriCkgNNaP7VaRgDGtG5adtp1K7tEoN4C4QHhqTLLkpOVfGOuJAzPmj', '2017-07-24 20:29:58', '2017-07-24 20:32:54'),
(110, 'Jose Dorito', 'dorito@hotmail.com', '$2y$10$9DpCvhIhWuErGVVxwArVMe9iaB5dPzTVUzOATkKzJk0KBiVNg.LDy', 'member', 'qDVj7ovSveg0gzK6DRycVCfj6lhsAC2XCC7BmLgyzpwe8FAApkBztTqEXp9o', '2017-07-25 03:51:26', '2017-07-25 03:51:26'),
(111, 'Juan Barajas', 'barajas@hotmail.com', '$2y$10$Ur47vQ5EtxmOeYtgKg5AeuQkwabhwM.318/Ddn3gEmuI/Ha.9Pwa2', 'member', 'M6KS0SIdFnMDlLmkyt9BrKtx14rglQYEhRYetdY4ws6Ujinkm8yHpxGlWlij', '2017-07-25 04:37:37', '2017-07-25 04:37:37'),
(112, 'german', 'german7@gmail.com', '$2y$10$ACt.5tIHH1WvRYmbL9CT.eL7rCVcfoYjGaGwkfRsUKyXAACZmE2/K', 'member', 'WN1W7IwmVKaWxuDTiV0uqywf4sc0r24OF0DckcV27n1YGKVql9T942BBTbBh', '2017-07-25 20:41:45', '2017-07-25 20:41:45'),
(113, 'Balotelli', 'balodios@gmail.com', '$2y$10$/M6wdPXHymtdgkch.m03aut4y5js2xXNGn6g0twbbXy5ZezYAkgGi', 'member', 'gYcnMnOcSt2ldjwsigaHtSZBTp8Wj1QaAupNjhYBDBC8XwRxeifSZDEhqtPC', '2017-07-25 21:13:25', '2017-07-25 21:13:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordenes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `orden_items`
--
ALTER TABLE `orden_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_items_producto_id_foreign` (`producto_id`),
  ADD KEY `orden_items_orden_id_foreign` (`orden_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `producto_talla`
--
ALTER TABLE `producto_talla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_talla_producto_id_foreign` (`producto_id`),
  ADD KEY `producto_talla_talla_id_foreign` (`talla_id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `orden_items`
--
ALTER TABLE `orden_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `producto_talla`
--
ALTER TABLE `producto_talla`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orden_items`
--
ALTER TABLE `orden_items`
  ADD CONSTRAINT `orden_items_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orden_items_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_talla`
--
ALTER TABLE `producto_talla`
  ADD CONSTRAINT `producto_talla_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_talla_talla_id_foreign` FOREIGN KEY (`talla_id`) REFERENCES `tallas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
