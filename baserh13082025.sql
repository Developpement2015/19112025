-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2025 at 03:02 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baserh`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"Saiss\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"created_at\":\"2024-12-20T16:58:43.000000Z\",\"updated_at\":\"2024-12-20T16:58:43.000000Z\"}}', NULL, '2024-12-20 15:58:43', '2024-12-20 15:58:43'),
(2, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 165, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":165,\"nom\":\"Kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"created_at\":\"2024-12-20T18:21:21.000000Z\",\"updated_at\":\"2024-12-20T18:21:21.000000Z\"}}', NULL, '2024-12-20 17:21:21', '2024-12-20 17:21:21'),
(3, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 166, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":166,\"nom\":\"Kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"created_at\":\"2024-12-20T18:22:02.000000Z\",\"updated_at\":\"2024-12-20T18:22:02.000000Z\"}}', NULL, '2024-12-20 17:22:02', '2024-12-20 17:22:02'),
(4, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 167, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":167,\"nom\":\"Kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"created_at\":\"2024-12-20T18:26:29.000000Z\",\"updated_at\":\"2024-12-20T18:26:29.000000Z\"}}', NULL, '2024-12-20 17:26:29', '2024-12-20 17:26:29'),
(5, 'Les arrondissements et les communes', 'updated', 'App\\Models\\ArrondissementCommune', 'updated', 167, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Kaddouri - AR\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a \\u0635\\u0635\\u0635\",\"updated_at\":\"2024-12-20T18:27:47.000000Z\"},\"old\":{\"nom\":\"Kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"updated_at\":\"2024-12-20T18:26:29.000000Z\"}}', NULL, '2024-12-20 17:27:47', '2024-12-20 17:27:47'),
(6, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 168, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":168,\"nom\":\"fesmeknes\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"created_at\":\"2024-12-25T16:08:21.000000Z\",\"updated_at\":\"2024-12-25T16:08:21.000000Z\"}}', NULL, '2024-12-25 15:08:21', '2024-12-25 15:08:21'),
(7, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 169, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":169,\"nom\":\"fesmeknes\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"created_at\":\"2024-12-25T16:08:22.000000Z\",\"updated_at\":\"2024-12-25T16:08:22.000000Z\"}}', NULL, '2024-12-25 15:08:22', '2024-12-25 15:08:22'),
(8, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 170, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":170,\"nom\":\"casa\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"created_at\":\"2024-12-25T16:14:57.000000Z\",\"updated_at\":\"2024-12-25T16:14:57.000000Z\"}}', NULL, '2024-12-25 15:14:57', '2024-12-25 15:14:57'),
(9, 'Region', 'created', 'App\\Models\\Region', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"fesmeknes\",\"nom_arabe\":\"sS\",\"created_at\":\"2024-12-25T16:17:52.000000Z\",\"updated_at\":\"2024-12-25T16:17:52.000000Z\"}}', NULL, '2024-12-25 15:17:52', '2024-12-25 15:17:52'),
(10, 'Region', 'created', 'App\\Models\\Region', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"rabat\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"created_at\":\"2024-12-25T16:37:34.000000Z\",\"updated_at\":\"2024-12-25T16:37:34.000000Z\"}}', NULL, '2024-12-25 15:37:34', '2024-12-25 15:37:34'),
(11, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 171, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":171,\"nom\":\"Zouagha\",\"nom_arabe\":\"\\u0632\\u0648\\u0627\\u063a\\u0629\",\"created_at\":\"2024-12-26T15:50:24.000000Z\",\"updated_at\":\"2024-12-26T15:50:24.000000Z\"}}', NULL, '2024-12-26 14:50:24', '2024-12-26 14:50:24'),
(12, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 172, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":172,\"nom\":\"F\\u00e8s Medina\",\"nom_arabe\":\"\\u0641\\u0627\\u0633 \\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629\",\"created_at\":\"2024-12-26T15:51:10.000000Z\",\"updated_at\":\"2024-12-26T15:51:10.000000Z\"}}', NULL, '2024-12-26 14:51:10', '2024-12-26 14:51:10'),
(13, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 173, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":173,\"nom\":\"Agdal\",\"nom_arabe\":\"\\u0623\\u0643\\u062f\\u0627\\u0644\",\"created_at\":\"2024-12-26T15:51:31.000000Z\",\"updated_at\":\"2024-12-26T15:51:31.000000Z\"}}', NULL, '2024-12-26 14:51:31', '2024-12-26 14:51:31'),
(14, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 174, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":174,\"nom\":\"Merinide\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0631\\u064a\\u0646\\u064a\\u064a\\u0646\",\"created_at\":\"2024-12-26T15:51:57.000000Z\",\"updated_at\":\"2024-12-26T15:51:57.000000Z\"}}', NULL, '2024-12-26 14:51:57', '2024-12-26 14:51:57'),
(15, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 175, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":175,\"nom\":\"Jnane Elouard\",\"nom_arabe\":\"\\u062c\\u0646\\u0627\\u0646 \\u0627\\u0644\\u0648\\u0631\\u062f\",\"created_at\":\"2024-12-26T15:52:24.000000Z\",\"updated_at\":\"2024-12-26T15:52:24.000000Z\"}}', NULL, '2024-12-26 14:52:25', '2024-12-26 14:52:25'),
(16, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 176, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":176,\"nom\":\"Ain Bida\",\"nom_arabe\":\"\\u0639\\u064a\\u0646 \\u0627\\u0644\\u0628\\u064a\\u0636\\u0627\\u0621\",\"created_at\":\"2024-12-26T15:52:59.000000Z\",\"updated_at\":\"2024-12-26T15:52:59.000000Z\"}}', NULL, '2024-12-26 14:52:59', '2024-12-26 14:52:59'),
(17, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 177, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":177,\"nom\":\"Ouled Tayeb\",\"nom_arabe\":\"\\u0623\\u0648\\u0644\\u0627\\u062f \\u0627\\u0644\\u0637\\u064a\\u0628\",\"created_at\":\"2024-12-26T15:53:15.000000Z\",\"updated_at\":\"2024-12-26T15:53:15.000000Z\"}}', NULL, '2024-12-26 14:53:15', '2024-12-26 14:53:15'),
(18, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 178, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":178,\"nom\":\"Sidi Hrazem\",\"nom_arabe\":\"\\u0633\\u064a\\u062f\\u064a \\u062d\\u0631\\u0627\\u0632\\u0645\",\"created_at\":\"2024-12-26T15:54:26.000000Z\",\"updated_at\":\"2024-12-26T15:54:26.000000Z\"}}', NULL, '2024-12-26 14:54:26', '2024-12-26 14:54:26'),
(19, 'Les arrondissements et les communes', 'updated', 'App\\Models\\ArrondissementCommune', 'updated', 172, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"F\\u00e8s Medinaa\",\"updated_at\":\"2024-12-26T15:59:11.000000Z\"},\"old\":{\"nom\":\"F\\u00e8s Medina\",\"updated_at\":\"2024-12-26T15:51:10.000000Z\"}}', NULL, '2024-12-26 14:59:11', '2024-12-26 14:59:11'),
(20, 'Les arrondissements et les communes', 'updated', 'App\\Models\\ArrondissementCommune', 'updated', 172, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"F\\u00e8s Medina\",\"updated_at\":\"2024-12-26T15:59:20.000000Z\"},\"old\":{\"nom\":\"F\\u00e8s Medinaa\",\"updated_at\":\"2024-12-26T15:59:11.000000Z\"}}', NULL, '2024-12-26 14:59:20', '2024-12-26 14:59:20'),
(21, 'Region', 'created', 'App\\Models\\Region', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"Fes Meknes\",\"nom_arabe\":\"\\u0641\\u0627\\u0633 \\u0645\\u0643\\u0646\\u0627\\u0633\",\"created_at\":\"2024-12-26T16:13:25.000000Z\",\"updated_at\":\"2024-12-26T16:13:25.000000Z\"}}', NULL, '2024-12-26 15:13:25', '2024-12-26 15:13:25'),
(22, 'Region', 'updated', 'App\\Models\\Region', 'updated', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Fes Meknes\\u0633\",\"nom_arabe\":\"\\u0641\\u0627\\u0633 \\u0645\\u0643\\u0646\\u0627\\u0633\\u0646\",\"updated_at\":\"2024-12-26T16:13:36.000000Z\"},\"old\":{\"nom\":\"Fes Meknes\",\"nom_arabe\":\"\\u0641\\u0627\\u0633 \\u0645\\u0643\\u0646\\u0627\\u0633\",\"updated_at\":\"2024-12-26T16:13:25.000000Z\"}}', NULL, '2024-12-26 15:13:36', '2024-12-26 15:13:36'),
(23, 'Ville', 'created', 'App\\Models\\Ville', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"F\\u00e8s\",\"nom_arabe\":\"\\u0641\\u0627\\u0633\",\"region_id\":3,\"created_at\":\"2024-12-26T16:54:22.000000Z\",\"updated_at\":\"2024-12-26T16:54:22.000000Z\"}}', NULL, '2024-12-26 15:54:22', '2024-12-26 15:54:22'),
(24, 'Ville', 'updated', 'App\\Models\\Ville', 'updated', 42, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Ouarzazatee\",\"updated_at\":\"2024-12-26T17:13:19.000000Z\"},\"old\":{\"nom\":\"Ouarzazate\",\"updated_at\":\"2024-12-26T18:08:36.000000Z\"}}', NULL, '2024-12-26 16:13:19', '2024-12-26 16:13:19'),
(25, 'Ville', 'updated', 'App\\Models\\Ville', 'updated', 42, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Ouarzazat\",\"updated_at\":\"2024-12-26T17:13:28.000000Z\"},\"old\":{\"nom\":\"Ouarzazatee\",\"updated_at\":\"2024-12-26T17:13:19.000000Z\"}}', NULL, '2024-12-26 16:13:28', '2024-12-26 16:13:28'),
(26, 'Ville', 'updated', 'App\\Models\\Ville', 'updated', 42, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":\"\\u0648\\u0631\\u0632\\u0627\\u0632\\u0627\\u062akk\",\"updated_at\":\"2024-12-26T17:13:38.000000Z\"},\"old\":{\"nom_arabe\":\"\\u0648\\u0631\\u0632\\u0627\\u0632\\u0627\\u062a\",\"updated_at\":\"2024-12-26T17:13:28.000000Z\"}}', NULL, '2024-12-26 16:13:38', '2024-12-26 16:13:38'),
(27, 'Ville', 'created', 'App\\Models\\Ville', 'created', 61, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":61,\"nom\":\"Technicien 1 grade\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0645\\u0646 \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"region_id\":3,\"created_at\":\"2025-01-02T14:56:41.000000Z\",\"updated_at\":\"2025-01-02T14:56:41.000000Z\"}}', NULL, '2025-01-02 13:56:41', '2025-01-02 13:56:41'),
(28, 'Position', 'created', 'App\\Models\\Position', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"mutation local\",\"nom_arabe\":\"qs\",\"created_at\":\"2025-01-02T15:33:56.000000Z\",\"updated_at\":\"2025-01-02T15:33:56.000000Z\"}}', NULL, '2025-01-02 14:33:56', '2025-01-02 14:33:56'),
(29, 'Position', 'updated', 'App\\Models\\Position', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"mutation locall\",\"updated_at\":\"2025-01-02T15:35:18.000000Z\"},\"old\":{\"nom\":\"mutation local\",\"updated_at\":\"2025-01-02T15:33:56.000000Z\"}}', NULL, '2025-01-02 14:35:18', '2025-01-02 14:35:18'),
(30, 'Service', 'created', 'App\\Models\\Service', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"p\\u00e9diatrie\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0637\\u0641\\u0627\\u0644\",\"created_at\":\"2025-01-09T08:19:11.000000Z\",\"updated_at\":\"2025-01-09T08:19:11.000000Z\"}}', NULL, '2025-01-09 07:19:11', '2025-01-09 07:19:11'),
(31, 'Service', 'updated', 'App\\Models\\Service', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"p\\u00e9diatrie\\u062b\",\"updated_at\":\"2025-01-09T08:19:19.000000Z\"},\"old\":{\"nom\":\"p\\u00e9diatrie\",\"updated_at\":\"2025-01-09T08:19:11.000000Z\"}}', NULL, '2025-01-09 07:19:19', '2025-01-09 07:19:19'),
(32, 'Service', 'updated', 'App\\Models\\Service', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"p\\u00e9diatrie\",\"updated_at\":\"2025-01-09T08:19:27.000000Z\"},\"old\":{\"nom\":\"p\\u00e9diatrie\\u062b\",\"updated_at\":\"2025-01-09T08:19:19.000000Z\"}}', NULL, '2025-01-09 07:19:27', '2025-01-09 07:19:27'),
(33, 'Fonction', 'updated', 'App\\Models\\Fonction', 'updated', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Gestionnaire des ressources humaines\\u0633\",\"updated_at\":\"2025-01-10T14:34:09.000000Z\"},\"old\":{\"nom\":\"Gestionnaire des ressources humaines\",\"updated_at\":\"2025-01-09T09:58:26.000000Z\"}}', NULL, '2025-01-10 13:34:09', '2025-01-10 13:34:09'),
(34, 'Grade', 'created', 'App\\Models\\Grade', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"1 ER GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649\",\"created_at\":\"2025-01-10T14:45:17.000000Z\",\"updated_at\":\"2025-01-10T14:45:17.000000Z\"}}', NULL, '2025-01-10 13:45:17', '2025-01-10 13:45:17'),
(35, 'Grade', 'created', 'App\\Models\\Grade', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"1 ER GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649\",\"created_at\":\"2025-01-10T14:46:18.000000Z\",\"updated_at\":\"2025-01-10T14:46:18.000000Z\"}}', NULL, '2025-01-10 13:46:18', '2025-01-10 13:46:18'),
(36, 'Grade', 'updated', 'App\\Models\\Grade', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"1 ER GRADEeeee\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649dz\",\"updated_at\":\"2025-01-10T14:46:34.000000Z\"},\"old\":{\"nom\":\"1 ER GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649\",\"updated_at\":\"2025-01-10T14:45:17.000000Z\"}}', NULL, '2025-01-10 13:46:34', '2025-01-10 13:46:34'),
(37, 'Position', 'created', 'App\\Models\\Position', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"En Activit\\u00e9\",\"nom_arabe\":\"\\u0646\\u0634\\u064a\\u0637\",\"created_at\":\"2025-01-10T14:51:56.000000Z\",\"updated_at\":\"2025-01-10T14:51:56.000000Z\"}}', NULL, '2025-01-10 13:51:56', '2025-01-10 13:51:56'),
(38, 'Position', 'updated', 'App\\Models\\Position', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"En Activit\\u00e9\\u062b\",\"updated_at\":\"2025-01-10T14:52:05.000000Z\"},\"old\":{\"nom\":\"En Activit\\u00e9\",\"updated_at\":\"2025-01-10T14:51:56.000000Z\"}}', NULL, '2025-01-10 13:52:05', '2025-01-10 13:52:05'),
(39, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"administratif\",\"nom_arabe\":\"\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629\",\"jours\":null,\"created_at\":\"2025-01-10T15:16:03.000000Z\",\"updated_at\":\"2025-01-10T15:16:03.000000Z\"}}', NULL, '2025-01-10 14:16:03', '2025-01-10 14:16:03'),
(40, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"recup\\u00e9ration\",\"nom_arabe\":\"\\u062a\\u0639\\u0648\\u064a\\u0636 \\u0639\\u0646 \\u0639\\u0645\\u0644\",\"jours\":null,\"created_at\":\"2025-01-10T15:16:28.000000Z\",\"updated_at\":\"2025-01-10T15:16:28.000000Z\"}}', NULL, '2025-01-10 14:16:28', '2025-01-10 14:16:28'),
(41, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"exceptionnel\",\"nom_arabe\":\"\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"jours\":null,\"created_at\":\"2025-01-10T15:16:49.000000Z\",\"updated_at\":\"2025-01-10T15:16:49.000000Z\"}}', NULL, '2025-01-10 14:16:49', '2025-01-10 14:16:49'),
(42, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"\\u0632\\u0648\\u0627\\u062c\",\"nom_arabe\":\"\\u0632\\u0648\\u0627\\u062c\",\"jours\":null,\"created_at\":\"2025-01-10T15:17:04.000000Z\",\"updated_at\":\"2025-01-10T15:17:04.000000Z\"}}', NULL, '2025-01-10 14:17:04', '2025-01-10 14:17:04'),
(43, 'Certificate', 'created', 'App\\Models\\TypeCertificate', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"a long terme\",\"nom_arabe\":\"\\u0637\\u0648\\u064a\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0645\\u062f\",\"created_at\":\"2025-01-10T15:53:03.000000Z\",\"updated_at\":\"2025-01-10T15:53:03.000000Z\"}}', NULL, '2025-01-10 14:53:03', '2025-01-10 14:53:03'),
(44, 'Certificate', 'created', 'App\\Models\\TypeCertificate', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"moyenne terme\",\"nom_arabe\":\"\\u0645\\u062a\\u0648\\u0633\\u0637\\u0629 \\u0627\\u0644\\u0627\\u0645\\u062f\",\"created_at\":\"2025-01-10T15:53:27.000000Z\",\"updated_at\":\"2025-01-10T15:53:27.000000Z\"}}', NULL, '2025-01-10 14:53:27', '2025-01-10 14:53:27'),
(45, 'Certificate', 'updated', 'App\\Models\\TypeCertificate', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"moyenne termerrrr\",\"updated_at\":\"2025-01-10T15:58:11.000000Z\"},\"old\":{\"nom\":\"moyenne terme\",\"updated_at\":\"2025-01-10T15:53:27.000000Z\"}}', NULL, '2025-01-10 14:58:11', '2025-01-10 14:58:11'),
(46, 'Certificate', 'updated', 'App\\Models\\TypeCertificate', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"moyenne terme\",\"updated_at\":\"2025-01-10T15:58:19.000000Z\"},\"old\":{\"nom\":\"moyenne termerrrr\",\"updated_at\":\"2025-01-10T15:58:11.000000Z\"}}', NULL, '2025-01-10 14:58:20', '2025-01-10 14:58:20'),
(47, 'Type Congé', 'updated', 'App\\Models\\TypeConge', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"jours\":10,\"updated_at\":\"2025-01-10T16:16:33.000000Z\"},\"old\":{\"jours\":null,\"updated_at\":\"2025-01-10T15:17:04.000000Z\"}}', NULL, '2025-01-10 15:16:33', '2025-01-10 15:16:33'),
(48, 'Type Congé', 'updated', 'App\\Models\\TypeConge', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"jours\":22,\"updated_at\":\"2025-01-10T16:16:59.000000Z\"},\"old\":{\"jours\":null,\"updated_at\":\"2025-01-10T15:16:03.000000Z\"}}', NULL, '2025-01-10 15:16:59', '2025-01-10 15:16:59'),
(49, 'Type Stage', 'created', 'App\\Models\\TypeStage', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"volontaire\",\"nom_arabe\":\"\\u0637\\u0648\\u0639\\u064a\\u0629\",\"created_at\":\"2025-01-10T16:27:17.000000Z\",\"updated_at\":\"2025-01-10T16:27:17.000000Z\"}}', NULL, '2025-01-10 15:27:17', '2025-01-10 15:27:17'),
(50, 'Type Stage', 'created', 'App\\Models\\TypeStage', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"\\u062a\\u0643\\u0648\\u064a\\u0646\",\"nom_arabe\":\"\\u062a\\u0643\\u0648\\u064a\\u0646\",\"created_at\":\"2025-01-10T16:27:39.000000Z\",\"updated_at\":\"2025-01-10T16:27:39.000000Z\"}}', NULL, '2025-01-10 15:27:39', '2025-01-10 15:27:39'),
(51, 'Type Stage', 'updated', 'App\\Models\\TypeStage', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"formation\",\"updated_at\":\"2025-01-10T16:27:52.000000Z\"},\"old\":{\"nom\":\"\\u062a\\u0643\\u0648\\u064a\\u0646\",\"updated_at\":\"2025-01-10T16:27:39.000000Z\"}}', NULL, '2025-01-10 15:27:52', '2025-01-10 15:27:52'),
(52, 'Type Stage', 'created', 'App\\Models\\TypeStage', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"equivalence\",\"nom_arabe\":\"\\u0645\\u0639\\u0627\\u062f\\u0644\\u0629\",\"created_at\":\"2025-01-10T16:28:30.000000Z\",\"updated_at\":\"2025-01-10T16:28:30.000000Z\"}}', NULL, '2025-01-10 15:28:30', '2025-01-10 15:28:30'),
(53, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 206, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":206,\"nom\":\"\\u0646\\u0627\\u0646\\u062a\",\"nom_arabe\":\"\\u0646\\u0646\",\"created_at\":\"2025-01-10T16:29:33.000000Z\",\"updated_at\":\"2025-01-10T16:29:33.000000Z\"}}', NULL, '2025-01-10 15:29:33', '2025-01-10 15:29:33'),
(54, 'Les arrondissements et les communes', 'updated', 'App\\Models\\ArrondissementCommune', 'updated', 206, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"\\u0646\\u0627\\u0646\\u062a\\u0633\\u0636\",\"nom_arabe\":\"\\u0636\",\"updated_at\":\"2025-01-10T16:29:43.000000Z\"},\"old\":{\"nom\":\"\\u0646\\u0627\\u0646\\u062a\",\"nom_arabe\":\"\\u0646\\u0646\",\"updated_at\":\"2025-01-10T16:29:33.000000Z\"}}', NULL, '2025-01-10 15:29:43', '2025-01-10 15:29:43'),
(55, 'Region', 'created', 'App\\Models\\Region', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"nom\":\"KJKJKJ\",\"nom_arabe\":\"\\u062b\",\"created_at\":\"2025-01-10T16:30:38.000000Z\",\"updated_at\":\"2025-01-10T16:30:38.000000Z\"}}', NULL, '2025-01-10 15:30:38', '2025-01-10 15:30:38'),
(56, 'Region', 'updated', 'App\\Models\\Region', 'updated', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"KJKJKJD\",\"updated_at\":\"2025-01-10T16:30:55.000000Z\"},\"old\":{\"nom\":\"KJKJKJ\",\"updated_at\":\"2025-01-10T16:30:38.000000Z\"}}', NULL, '2025-01-10 15:30:55', '2025-01-10 15:30:55'),
(57, 'Ville', 'created', 'App\\Models\\Ville', 'created', 62, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":62,\"nom\":\"qs\",\"nom_arabe\":\"LKLK\",\"region_id\":8,\"created_at\":\"2025-01-10T16:32:17.000000Z\",\"updated_at\":\"2025-01-10T16:32:17.000000Z\"}}', NULL, '2025-01-10 15:32:17', '2025-01-10 15:32:17'),
(58, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"administratif technique\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629\",\"parent_id\":null,\"created_at\":\"2025-01-17T18:57:01.000000Z\",\"updated_at\":\"2025-01-17T18:57:01.000000Z\"}}', NULL, '2025-01-17 17:57:01', '2025-01-17 17:57:01'),
(59, 'Categorie Cadre', 'updated', 'App\\Models\\CategorieCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"administratif technique\\u0634\\u0633\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629\\u0644\\u0627\\u0644\",\"updated_at\":\"2025-01-17T19:00:14.000000Z\"},\"old\":{\"nom\":\"administratif technique\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-01-17T18:57:01.000000Z\"}}', NULL, '2025-01-17 18:00:14', '2025-01-17 18:00:14'),
(60, 'Categorie Cadre', 'updated', 'App\\Models\\CategorieCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"administratif technique\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-01-17T19:00:23.000000Z\"},\"old\":{\"nom\":\"administratif technique\\u0634\\u0633\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\\u0629\\u0644\\u0627\\u0644\",\"updated_at\":\"2025-01-17T19:00:14.000000Z\"}}', NULL, '2025-01-17 18:00:23', '2025-01-17 18:00:23'),
(61, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"\\u0624\\u0621\\u0631\\u0621\\u0631\\u0621\\u0631\",\"nom_arabe\":\"\\u0621\\u0631\\u0621\\u0631\\u0621\\u0631\\u0621\\u0631\",\"parent_id\":null,\"created_at\":\"2025-01-17T19:00:30.000000Z\",\"updated_at\":\"2025-01-17T19:00:30.000000Z\"}}', NULL, '2025-01-17 18:00:30', '2025-01-17 18:00:30'),
(62, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"Kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"categorie_cadre_id\":1,\"created_at\":\"2025-01-17T19:29:00.000000Z\",\"updated_at\":\"2025-01-17T19:29:00.000000Z\"}}', NULL, '2025-01-17 18:29:00', '2025-01-17 18:29:00'),
(63, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"technicien\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a\",\"categorie_cadre_id\":1,\"created_at\":\"2025-01-17T19:30:15.000000Z\",\"updated_at\":\"2025-01-17T19:30:15.000000Z\"}}', NULL, '2025-01-17 18:30:15', '2025-01-17 18:30:15'),
(64, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"administrateur\",\"nom_arabe\":\"\\u0645\\u062a\\u0635\\u0631\\u0641\",\"categorie_cadre_id\":1,\"created_at\":\"2025-01-17T19:31:04.000000Z\",\"updated_at\":\"2025-01-17T19:31:04.000000Z\"}}', NULL, '2025-01-17 18:31:04', '2025-01-17 18:31:04'),
(65, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"medical\",\"nom_arabe\":\"\\u0637\\u0628\\u064a\",\"parent_id\":null,\"created_at\":\"2025-01-17T19:31:31.000000Z\",\"updated_at\":\"2025-01-17T19:31:31.000000Z\"}}', NULL, '2025-01-17 18:31:31', '2025-01-17 18:31:31'),
(66, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"infirmiers et technicien sante\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636\\u064a \\u0648\\u062a\\u0642\\u0646\\u064a \\u0635\\u062d\\u0629\",\"parent_id\":null,\"created_at\":\"2025-01-17T19:32:08.000000Z\",\"updated_at\":\"2025-01-17T19:32:08.000000Z\"}}', NULL, '2025-01-17 18:32:08', '2025-01-17 18:32:08'),
(67, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"assistant m\\u00e9dicaux\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f\\u064a\\u064a\\u0646 \\u0637\\u0628\\u064a\\u064a\\u0646\",\"parent_id\":null,\"created_at\":\"2025-01-17T19:32:39.000000Z\",\"updated_at\":\"2025-01-17T19:32:39.000000Z\"}}', NULL, '2025-01-17 18:32:39', '2025-01-17 18:32:39'),
(68, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"pharmaciens et chirurgiens dentaire\",\"nom_arabe\":\"\\u0635\\u064a\\u0644\\u062f\\u0644\\u0629 \\u0648\\u062c\\u0631\\u0627\\u062d\\u064a \\u0627\\u0644\\u0627\\u0633\\u0646\\u0627\\u0646\",\"parent_id\":null,\"created_at\":\"2025-01-17T19:33:34.000000Z\",\"updated_at\":\"2025-01-17T19:33:34.000000Z\"}}', NULL, '2025-01-17 18:33:35', '2025-01-17 18:33:35'),
(69, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"technicien laboratoire\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0645\\u062e\\u062a\\u0628\\u0631\",\"categorie_cadre_id\":4,\"created_at\":\"2025-01-17T19:34:11.000000Z\",\"updated_at\":\"2025-01-17T19:34:11.000000Z\"}}', NULL, '2025-01-17 18:34:11', '2025-01-17 18:34:11'),
(70, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"assistant medical\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0637\\u0628\\u064a\",\"categorie_cadre_id\":3,\"created_at\":\"2025-01-17T19:34:39.000000Z\",\"updated_at\":\"2025-01-17T19:34:39.000000Z\"}}', NULL, '2025-01-17 18:34:39', '2025-01-17 18:34:39'),
(71, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"chirurgien dentaire\",\"nom_arabe\":\"\\u062c\\u0631\\u0627\\u062d \\u0627\\u0644\\u0627\\u0633\\u0646\\u0627\\u0646\",\"categorie_cadre_id\":6,\"created_at\":\"2025-01-17T19:35:07.000000Z\",\"updated_at\":\"2025-01-17T19:35:07.000000Z\"}}', NULL, '2025-01-17 18:35:07', '2025-01-17 18:35:07'),
(72, 'Cadre', 'updated', 'App\\Models\\Cadre', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"technicien\\u0644\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a\\u0645\",\"categorie_cadre_id\":3,\"updated_at\":\"2025-01-17T19:35:35.000000Z\"},\"old\":{\"nom\":\"technicien\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a\",\"categorie_cadre_id\":1,\"updated_at\":\"2025-01-17T19:30:15.000000Z\"}}', NULL, '2025-01-17 18:35:35', '2025-01-17 18:35:35'),
(73, 'Cadre', 'updated', 'App\\Models\\Cadre', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"technicien\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a\",\"categorie_cadre_id\":1,\"updated_at\":\"2025-01-17T19:35:57.000000Z\"},\"old\":{\"nom\":\"technicien\\u0644\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a\\u0645\",\"categorie_cadre_id\":3,\"updated_at\":\"2025-01-17T19:35:35.000000Z\"}}', NULL, '2025-01-17 18:35:57', '2025-01-17 18:35:57'),
(74, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":2,\"created_at\":\"2025-01-17T20:33:12.000000Z\",\"updated_at\":\"2025-01-17T20:33:12.000000Z\"}}', NULL, '2025-01-17 19:33:12', '2025-01-17 19:33:12'),
(75, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier grade\\u0644\\u062a\\u0644\\u062a\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\\u0644\\u062a\\u0644\",\"cadre_id\":3,\"updated_at\":\"2025-01-17T20:33:40.000000Z\"},\"old\":{\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":2,\"updated_at\":\"2025-01-17T20:33:12.000000Z\"}}', NULL, '2025-01-17 19:33:40', '2025-01-17 19:33:40'),
(76, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"updated_at\":\"2025-01-24T18:48:43.000000Z\"},\"old\":{\"nom\":\"premier grade\\u0644\\u062a\\u0644\\u062a\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\\u0644\\u062a\\u0644\",\"updated_at\":\"2025-01-17T20:33:40.000000Z\"}}', NULL, '2025-01-24 17:48:43', '2025-01-24 17:48:43'),
(77, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier gradeg\",\"updated_at\":\"2025-01-24T18:50:20.000000Z\"},\"old\":{\"nom\":\"premier grade\",\"updated_at\":\"2025-01-24T18:48:43.000000Z\"}}', NULL, '2025-01-24 17:50:20', '2025-01-24 17:50:20'),
(78, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier grade\",\"updated_at\":\"2025-01-24T18:52:29.000000Z\"},\"old\":{\"nom\":\"premier gradeg\",\"updated_at\":\"2025-01-24T18:50:20.000000Z\"}}', NULL, '2025-01-24 17:52:29', '2025-01-24 17:52:29'),
(79, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"qs\",\"nom_arabe\":\"qsd\",\"grade_id\":1,\"created_at\":\"2025-01-24T19:35:20.000000Z\",\"updated_at\":\"2025-01-24T19:35:20.000000Z\"}}', NULL, '2025-01-24 18:35:20', '2025-01-24 18:35:20'),
(80, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"audit\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0641\\u062a\\u062d\\u0627\\u0635\",\"grade_id\":1,\"created_at\":\"2025-01-24T19:36:44.000000Z\",\"updated_at\":\"2025-01-24T19:36:44.000000Z\"}}', NULL, '2025-01-24 18:36:44', '2025-01-24 18:36:44'),
(81, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"gestion ressource humaine\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0648\\u0627\\u0631\\u062f \\u0627\\u0644\\u0628\\u0634\\u0631\\u064a\\u0629\",\"grade_id\":1,\"created_at\":\"2025-01-24T19:41:44.000000Z\",\"updated_at\":\"2025-01-24T19:41:44.000000Z\"}}', NULL, '2025-01-24 18:41:44', '2025-01-24 18:41:44'),
(82, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"gestion entreprise\",\"nom_arabe\":\"\\u062a\\u0633\\u064a\\u064a\\u0631 \\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a\",\"cadre_id\":2,\"created_at\":\"2025-01-24T19:42:40.000000Z\",\"updated_at\":\"2025-01-24T19:42:40.000000Z\"}}', NULL, '2025-01-24 18:42:40', '2025-01-24 18:42:40'),
(83, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-01-24T19:44:10.000000Z\"},\"old\":{\"nom\":\"gestion entreprise\",\"nom_arabe\":\"\\u062a\\u0633\\u064a\\u064a\\u0631 \\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a\",\"updated_at\":\"2025-01-24T19:42:40.000000Z\"}}', NULL, '2025-01-24 18:44:10', '2025-01-24 18:44:10'),
(84, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":2,\"created_at\":\"2025-01-24T19:44:29.000000Z\",\"updated_at\":\"2025-01-24T19:44:29.000000Z\"}}', NULL, '2025-01-24 18:44:29', '2025-01-24 18:44:29'),
(85, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"gestion entreprise\",\"nom_arabe\":\"\\u062a\\u0633\\u064a\\u064a\\u0631 \\u0645\\u0642\\u0627\\u0648\\u0644\\u0627\\u062a\",\"grade_id\":3,\"created_at\":\"2025-01-24T19:45:11.000000Z\",\"updated_at\":\"2025-01-24T19:45:11.000000Z\"}}', NULL, '2025-01-24 18:45:11', '2025-01-24 18:45:11'),
(86, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"sres\",\"nom_arabe\":\"\\u0634\\u0628\\u0643\\u0629\",\"created_at\":\"2025-01-24T20:35:33.000000Z\",\"updated_at\":\"2025-01-24T20:35:33.000000Z\"}}', NULL, '2025-01-24 19:35:33', '2025-01-24 19:35:33'),
(87, 'Categorie Formation', 'updated', 'App\\Models\\CategorieFormation', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"sres\\u0628\",\"nom_arabe\":\"\\u0634\\u0628\\u0643\\u0629\\u0644\",\"updated_at\":\"2025-01-24T20:35:42.000000Z\"},\"old\":{\"nom\":\"sres\",\"nom_arabe\":\"\\u0634\\u0628\\u0643\\u0629\",\"updated_at\":\"2025-01-24T20:35:33.000000Z\"}}', NULL, '2025-01-24 19:35:42', '2025-01-24 19:35:42'),
(88, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"sres\",\"nom_arabe\":\"\\u0645\\u0635\\u0644\\u062d\\u0629 \\u0634\\u0628\\u0643\\u0629 \\u0645\\u0624\\u0633\\u0633\\u0627\\u062a  \\u0635\\u062d\\u064a\\u0629\",\"created_at\":\"2025-01-24T20:36:24.000000Z\",\"updated_at\":\"2025-01-24T20:36:24.000000Z\"}}', NULL, '2025-01-24 19:36:24', '2025-01-24 19:36:24'),
(89, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"d\\u00e9l\\u00e9gation\",\"nom_arabe\":\"\\u0645\\u0646\\u062f\\u0648\\u0628\\u064a\\u0629\",\"created_at\":\"2025-02-03T11:42:45.000000Z\",\"updated_at\":\"2025-02-03T11:42:45.000000Z\"}}', NULL, '2025-02-03 10:42:45', '2025-02-03 10:42:45'),
(90, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"centre sante\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0635\\u062d\\u064a\",\"categorie_formation_id\":3,\"created_at\":\"2025-02-03T19:22:57.000000Z\",\"updated_at\":\"2025-02-03T19:22:57.000000Z\"}}', NULL, '2025-02-03 18:22:57', '2025-02-03 18:22:57'),
(91, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"rems\",\"nom_arabe\":\"\\u0634\\u0628\\u0643\\u0629 \\u0645\\u0624\\u0633\\u0633\\u0627\\u062a \\u0635\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\\u0629\",\"categorie_formation_id\":2,\"created_at\":\"2025-02-03T19:25:44.000000Z\",\"updated_at\":\"2025-02-03T19:25:44.000000Z\"}}', NULL, '2025-02-03 18:25:44', '2025-02-03 18:25:44'),
(92, 'Type Categorie Formation', 'updated', 'App\\Models\\TypeCategorieFormation', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"categorie_formation_id\":3,\"updated_at\":\"2025-02-03T19:26:03.000000Z\"},\"old\":{\"categorie_formation_id\":2,\"updated_at\":\"2025-02-03T19:25:44.000000Z\"}}', NULL, '2025-02-03 18:26:03', '2025-02-03 18:26:03'),
(93, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"premier niveaux\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"type_categorie_formation_id\":1,\"created_at\":\"2025-02-03T19:48:19.000000Z\",\"updated_at\":\"2025-02-03T19:48:19.000000Z\"}}', NULL, '2025-02-03 18:48:19', '2025-02-03 18:48:19'),
(94, 'Niveau Categorie Formation', 'updated', 'App\\Models\\NiveauCategorieFormation', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier niveauxfsss\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644sfs\",\"updated_at\":\"2025-02-03T19:49:20.000000Z\"},\"old\":{\"nom\":\"premier niveaux\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"updated_at\":\"2025-02-03T19:48:19.000000Z\"}}', NULL, '2025-02-03 18:49:20', '2025-02-03 18:49:20'),
(95, 'Niveau Categorie Formation', 'updated', 'App\\Models\\NiveauCategorieFormation', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"premier niveaux\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"updated_at\":\"2025-02-03T19:49:29.000000Z\"},\"old\":{\"nom\":\"premier niveauxfsss\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644sfs\",\"updated_at\":\"2025-02-03T19:49:20.000000Z\"}}', NULL, '2025-02-03 18:49:29', '2025-02-03 18:49:29'),
(96, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"hopital\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0634\\u0641\\u0649\",\"created_at\":\"2025-02-03T19:52:02.000000Z\",\"updated_at\":\"2025-02-03T19:52:02.000000Z\"}}', NULL, '2025-02-03 18:52:02', '2025-02-03 18:52:02'),
(97, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"hopital\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0634\\u0641\\u0649\",\"categorie_formation_id\":4,\"created_at\":\"2025-02-03T19:52:45.000000Z\",\"updated_at\":\"2025-02-03T19:52:45.000000Z\"}}', NULL, '2025-02-03 18:52:45', '2025-02-03 18:52:45'),
(98, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"regionale\",\"nom_arabe\":\"\\u0627\\u0644\\u062c\\u0647\\u0648\\u064a\",\"type_categorie_formation_id\":3,\"created_at\":\"2025-02-03T19:53:12.000000Z\",\"updated_at\":\"2025-02-03T19:53:12.000000Z\"}}', NULL, '2025-02-03 18:53:12', '2025-02-03 18:53:12'),
(99, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"provinciale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a\",\"type_categorie_formation_id\":3,\"created_at\":\"2025-02-03T19:53:36.000000Z\",\"updated_at\":\"2025-02-03T19:53:36.000000Z\"}}', NULL, '2025-02-03 18:53:36', '2025-02-03 18:53:36'),
(100, 'Niveau Categorie Formation', 'updated', 'App\\Models\\NiveauCategorieFormation', 'updated', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"provinciale jhj\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a \\u062a\\u0644\\u0627\\u0644\\u0627\",\"updated_at\":\"2025-02-03T19:54:23.000000Z\"},\"old\":{\"nom\":\"provinciale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a\",\"updated_at\":\"2025-02-03T19:53:36.000000Z\"}}', NULL, '2025-02-03 18:54:23', '2025-02-03 18:54:23'),
(101, 'Niveau Categorie Formation', 'updated', 'App\\Models\\NiveauCategorieFormation', 'updated', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"provinciale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a\",\"updated_at\":\"2025-02-03T19:57:00.000000Z\"},\"old\":{\"nom\":\"provinciale jhj\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a \\u062a\\u0644\\u0627\\u0644\\u0627\",\"updated_at\":\"2025-02-03T19:54:23.000000Z\"}}', NULL, '2025-02-03 18:57:00', '2025-02-03 18:57:00'),
(102, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"bensouda\",\"nom_arabe\":\"\\u0628\\u0646\\u0633\\u0648\\u062f\\u0629\",\"niveau_categorie_formation_id\":1,\"ville_id\":13,\"created_at\":\"2025-02-03T20:38:17.000000Z\",\"updated_at\":\"2025-02-03T20:38:17.000000Z\"}}', NULL, '2025-02-03 19:38:17', '2025-02-03 19:38:17'),
(103, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"alghassani\",\"nom_arabe\":\"\\u0627\\u0644\\u063a\\u0633\\u0627\\u0646\\u064a\",\"niveau_categorie_formation_id\":2,\"ville_id\":13,\"created_at\":\"2025-02-03T20:59:21.000000Z\",\"updated_at\":\"2025-02-03T20:59:21.000000Z\"}}', NULL, '2025-02-03 19:59:21', '2025-02-03 19:59:21'),
(104, 'Nom Formation Sanitaire', 'updated', 'App\\Models\\NomFormationSanitaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"ville_id\":3,\"updated_at\":\"2025-02-03T20:59:43.000000Z\"},\"old\":{\"ville_id\":13,\"updated_at\":\"2025-02-03T20:59:21.000000Z\"}}', NULL, '2025-02-03 19:59:43', '2025-02-03 19:59:43'),
(105, 'Nom Formation Sanitaire', 'updated', 'App\\Models\\NomFormationSanitaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"ville_id\":13,\"updated_at\":\"2025-02-03T20:59:57.000000Z\"},\"old\":{\"ville_id\":3,\"updated_at\":\"2025-02-03T20:59:43.000000Z\"}}', NULL, '2025-02-03 19:59:57', '2025-02-03 19:59:57'),
(106, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"Kaddouri\",\"nom_arabe\":\"Mohammef\",\"niveau_categorie_formation_id\":1,\"ville_id\":3,\"created_at\":\"2025-02-03T21:00:05.000000Z\",\"updated_at\":\"2025-02-03T21:00:05.000000Z\"}}', NULL, '2025-02-03 20:00:05', '2025-02-03 20:00:05'),
(107, 'Grade', 'created', 'App\\Models\\Grade', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"PREMIER GRADE\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"created_at\":\"2025-02-06T11:16:35.000000Z\",\"updated_at\":\"2025-02-06T11:16:35.000000Z\"}}', NULL, '2025-02-06 10:16:35', '2025-02-06 10:16:35'),
(108, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"CENTRE ADDICTOLOGIE\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0637\\u0628 \\u0627\\u0644\\u0627\\u062f\\u0645\\u0627\\u0646\",\"categorie_formation_id\":2,\"created_at\":\"2025-02-06T11:28:27.000000Z\",\"updated_at\":\"2025-02-06T11:28:27.000000Z\"}}', NULL, '2025-02-06 10:28:27', '2025-02-06 10:28:27'),
(109, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"CSU1\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0635\\u062d\\u064a \\u0627\\u0644\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"type_categorie_formation_id\":1,\"created_at\":\"2025-02-06T11:30:36.000000Z\",\"updated_at\":\"2025-02-06T11:30:36.000000Z\"}}', NULL, '2025-02-06 10:30:36', '2025-02-06 10:30:36'),
(110, 'Type Categorie Formation', 'updated', 'App\\Models\\TypeCategorieFormation', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"categorie_formation_id\":2,\"updated_at\":\"2025-02-06T11:31:49.000000Z\"},\"old\":{\"categorie_formation_id\":3,\"updated_at\":\"2025-02-03T19:22:57.000000Z\"}}', NULL, '2025-02-06 10:31:49', '2025-02-06 10:31:49'),
(111, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"MONFLEURI\",\"nom_arabe\":\"\\u0645\\u0648\\u0646\\u0641\\u0644\\u0648\\u0631\\u064a\",\"niveau_categorie_formation_id\":4,\"ville_id\":13,\"created_at\":\"2025-02-06T11:32:53.000000Z\",\"updated_at\":\"2025-02-06T11:32:53.000000Z\"}}', NULL, '2025-02-06 10:32:53', '2025-02-06 10:32:53'),
(112, 'Position', 'updated', 'App\\Models\\Position', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"En Activit\\u00e9\",\"updated_at\":\"2025-02-12T14:19:18.000000Z\"},\"old\":{\"nom\":\"En Activit\\u00e9\\u062b\",\"updated_at\":\"2025-01-10T14:52:05.000000Z\"}}', NULL, '2025-02-12 13:19:18', '2025-02-12 13:19:18'),
(113, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"nom\":\"RC\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u062d\\u0627\\u0642 \\u0632\\u0648\\u062c \\u0627\\u0648 \\u0627\\u0644\\u0632\\u0648\\u062c\\u0629\",\"created_at\":\"2025-02-12T14:33:35.000000Z\",\"updated_at\":\"2025-02-12T14:33:35.000000Z\"}}', NULL, '2025-02-12 13:33:35', '2025-02-12 13:33:35'),
(114, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom\":\"local\",\"nom_arabe\":\"\\u0645\\u062d\\u0644\\u064a\\u0629\",\"created_at\":\"2025-02-12T14:33:55.000000Z\",\"updated_at\":\"2025-02-12T14:33:55.000000Z\"}}', NULL, '2025-02-12 13:33:55', '2025-02-12 13:33:55'),
(115, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"detachement\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0627\\u0642\",\"created_at\":\"2025-02-12T14:34:23.000000Z\",\"updated_at\":\"2025-02-12T14:34:23.000000Z\"}}', NULL, '2025-02-12 13:34:23', '2025-02-12 13:34:23'),
(116, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"recrutement\",\"nom_arabe\":\"\\u062a\\u0648\\u0638\\u064a\\u0641\",\"created_at\":\"2025-02-12T14:35:57.000000Z\",\"updated_at\":\"2025-02-12T14:35:57.000000Z\"}}', NULL, '2025-02-12 13:35:57', '2025-02-12 13:35:57'),
(117, 'HistoriquePopulation', 'created', 'App\\Models\\HistoriquePopulation', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"nom_formation_sanitaire_id\":5,\"population\":20000,\"annee\":2025,\"created_at\":\"2025-02-21T15:21:20.000000Z\",\"updated_at\":\"2025-02-21T15:21:20.000000Z\"}}', NULL, '2025-02-21 14:21:20', '2025-02-21 14:21:20'),
(118, 'HistoriquePopulation', 'created', 'App\\Models\\HistoriquePopulation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom_formation_sanitaire_id\":5,\"population\":20000,\"annee\":2024,\"created_at\":\"2025-02-21T15:27:06.000000Z\",\"updated_at\":\"2025-02-21T15:27:06.000000Z\"}}', NULL, '2025-02-21 14:27:06', '2025-02-21 14:27:06'),
(119, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"ppr\":\"1660747\",\"nom\":\"KADDOURI\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"\\u0645\\u062d\\u0645\\u062f\",\"cin\":\"C23159\",\"sexe\":\"M\",\"date_naissance\":\"1989-02-19\",\"date_embauche\":\"2011-12-14\",\"email\":\"developpement2015@gmail.com\",\"telephone\":\"0659187693\",\"adresse\":\"AV FES\",\"fonction_id\":22,\"nom_formation_sanitaire_id\":null,\"remarques\":null,\"service_id\":22,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2011-12-11\",\"date_prise_en_service\":\"2011-11-14\",\"created_at\":\"2025-02-21T16:17:47.000000Z\",\"updated_at\":\"2025-02-21T16:17:47.000000Z\"}}', NULL, '2025-02-21 15:17:47', '2025-02-21 15:17:47'),
(120, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"ppr\":\"qqqqq\",\"nom\":\"qwqwqwq\",\"nom_arabe\":\"zr\",\"prenom\":\"wqwqwq\",\"prenom_arabe\":\"azr\",\"cin\":\"wqw\",\"sexe\":\"M\",\"date_naissance\":\"2025-02-06\",\"date_embauche\":\"2025-02-08\",\"email\":\"azr@gmail.com\",\"telephone\":\"azr\",\"adresse\":\"azrfgdfg\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":5,\"remarques\":\"azr\",\"service_id\":7,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"2025-02-27\",\"date_prise_en_service\":\"2025-02-23\",\"created_at\":\"2025-02-21T16:52:23.000000Z\",\"updated_at\":\"2025-02-21T16:52:23.000000Z\"}}', NULL, '2025-02-21 15:52:23', '2025-02-21 15:52:23');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(121, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"ppr\":\"1660747555\",\"nom\":\"KADDOURI55\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a5\",\"prenom\":\"MOHAMMED55\",\"prenom_arabe\":\"\\u0645\\u062d\\u0645\\u062f5\",\"cin\":\"C2315955\",\"date_naissance\":\"1989-02-26\",\"date_embauche\":\"2011-12-17\",\"email\":\"developpem5ent2015@gmail.com\",\"telephone\":\"06591876935\",\"adresse\":\"AV FES5\",\"fonction_id\":18,\"remarques\":\"55\",\"service_id\":15,\"specialite_grade_id\":6,\"type_mutation\":2,\"date_mutation\":\"2011-12-28\",\"date_prise_en_service\":\"2011-11-30\",\"updated_at\":\"2025-02-21T16:53:29.000000Z\"},\"old\":{\"ppr\":\"1660747\",\"nom\":\"KADDOURI\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"\\u0645\\u062d\\u0645\\u062f\",\"cin\":\"C23159\",\"date_naissance\":\"1989-02-19\",\"date_embauche\":\"2011-12-14\",\"email\":\"developpement2015@gmail.com\",\"telephone\":\"0659187693\",\"adresse\":\"AV FES\",\"fonction_id\":22,\"remarques\":null,\"service_id\":22,\"specialite_grade_id\":7,\"type_mutation\":4,\"date_mutation\":\"2011-12-11\",\"date_prise_en_service\":\"2011-11-14\",\"updated_at\":\"2025-02-21T16:17:47.000000Z\"}}', NULL, '2025-02-21 15:53:29', '2025-02-21 15:53:29'),
(122, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"ppr\":\"166074oo\",\"updated_at\":\"2025-02-26T15:30:29.000000Z\"},\"old\":{\"ppr\":\"1660747555\",\"updated_at\":\"2025-02-21T16:53:29.000000Z\"}}', NULL, '2025-02-26 15:30:29', '2025-02-26 15:30:29'),
(123, 'Categorie Cadre', 'updated', 'App\\Models\\CategorieCadre', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"infirmiers et technicien sante \\ud83e\\uddd1\\u200d\\u2695\\ufe0f\",\"updated_at\":\"2025-02-26T17:43:39.000000Z\"},\"old\":{\"nom\":\"infirmiers et technicien sante\",\"updated_at\":\"2025-01-17T19:32:08.000000Z\"}}', NULL, '2025-02-26 17:43:39', '2025-02-26 17:43:39'),
(124, 'Categorie Cadre', 'updated', 'App\\Models\\CategorieCadre', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"administratif technique \\ud83e\\uddd1\\u200d\\ud83d\\udcbc\",\"updated_at\":\"2025-02-26T17:44:40.000000Z\"},\"old\":{\"nom\":\"administratif technique\",\"updated_at\":\"2025-01-17T19:00:23.000000Z\"}}', NULL, '2025-02-26 17:44:40', '2025-02-26 17:44:40'),
(125, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"type_mutation\":4,\"date_prise_en_service\":\"2011-12-31\",\"updated_at\":\"2025-02-28T15:40:10.000000Z\"},\"old\":{\"type_mutation\":2,\"date_prise_en_service\":\"2011-11-30\",\"updated_at\":\"2025-02-26T15:30:29.000000Z\"}}', NULL, '2025-02-28 15:40:10', '2025-02-28 15:40:10'),
(126, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"date_mutation\":\"2011-12-17\",\"updated_at\":\"2025-02-28T15:41:43.000000Z\"},\"old\":{\"date_mutation\":\"2011-12-28\",\"updated_at\":\"2025-02-28T15:40:10.000000Z\"}}', NULL, '2025-02-28 15:41:43', '2025-02-28 15:41:43'),
(127, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"date_note\":\"2025-02-28\",\"ref_note\":\"1\\/26032025\",\"updated_at\":\"2025-02-28T17:58:17.000000Z\"},\"old\":{\"date_note\":null,\"ref_note\":null,\"updated_at\":\"2025-02-28T15:41:43.000000Z\"}}', NULL, '2025-02-28 17:58:17', '2025-02-28 17:58:17'),
(128, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fichier_note\":\"1740765497.pdf\"},\"old\":{\"fichier_note\":null}}', NULL, '2025-02-28 17:58:17', '2025-02-28 17:58:17'),
(131, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":2,\"type_mutation_id\":4,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/2rZdcmtWsPwCkGfMtJsT4cTtYXi9cJORHidrGHBv.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":\"mutation local\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":15,\"nouveau_service_id\":22,\"ancien_fonction_id\":18,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":6,\"nouveau_specialite_id\":6,\"created_at\":\"2025-02-28T18:13:03.000000Z\",\"updated_at\":\"2025-02-28T18:13:03.000000Z\"}}', NULL, '2025-02-28 18:13:03', '2025-02-28 18:13:03'),
(132, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":17,\"service_id\":22,\"date_mutation\":\"2025-02-28\",\"date_prise_en_service\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"fichier_note\":\"fichiers_notes\\/2rZdcmtWsPwCkGfMtJsT4cTtYXi9cJORHidrGHBv.pdf\",\"updated_at\":\"2025-02-28T18:13:03.000000Z\"},\"old\":{\"fonction_id\":18,\"service_id\":15,\"date_mutation\":\"2011-12-17\",\"date_prise_en_service\":\"2011-12-31\",\"date_note\":\"2025-02-28\",\"fichier_note\":\"1740765497.pdf\",\"updated_at\":\"2025-02-28T17:58:17.000000Z\"}}', NULL, '2025-02-28 18:13:03', '2025-02-28 18:13:03'),
(133, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":2,\"type_mutation_id\":2,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/9UzsUVS3q78ods3V50jwrq1L3O7ldI8Y5H23ezJu.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":\"mutation local\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":22,\"nouveau_service_id\":7,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":6,\"nouveau_specialite_id\":5,\"created_at\":\"2025-02-28T18:19:52.000000Z\",\"updated_at\":\"2025-02-28T18:19:52.000000Z\"}}', NULL, '2025-02-28 18:19:52', '2025-02-28 18:19:52'),
(134, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":1,\"service_id\":7,\"specialite_grade_id\":5,\"type_mutation\":2,\"fichier_note\":\"fichiers_notes\\/9UzsUVS3q78ods3V50jwrq1L3O7ldI8Y5H23ezJu.pdf\",\"updated_at\":\"2025-02-28T18:19:52.000000Z\"},\"old\":{\"fonction_id\":17,\"service_id\":22,\"specialite_grade_id\":6,\"type_mutation\":4,\"fichier_note\":\"fichiers_notes\\/2rZdcmtWsPwCkGfMtJsT4cTtYXi9cJORHidrGHBv.pdf\",\"updated_at\":\"2025-02-28T18:13:03.000000Z\"}}', NULL, '2025-02-28 18:19:52', '2025-02-28 18:19:52'),
(135, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":2,\"type_mutation_id\":1,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/z9YYF2StA71xpoBKxq5xr8S24JA3rnQtMn7LM18t.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":\"mutation local\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":7,\"nouveau_service_id\":11,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":7,\"created_at\":\"2025-02-28T18:24:23.000000Z\",\"updated_at\":\"2025-02-28T18:24:23.000000Z\"}}', NULL, '2025-02-28 18:24:23', '2025-02-28 18:24:23'),
(136, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":6,\"service_id\":11,\"specialite_grade_id\":7,\"type_mutation\":1,\"fichier_note\":\"fichiers_notes\\/z9YYF2StA71xpoBKxq5xr8S24JA3rnQtMn7LM18t.pdf\",\"updated_at\":\"2025-02-28T18:24:23.000000Z\"},\"old\":{\"fonction_id\":1,\"service_id\":7,\"specialite_grade_id\":5,\"type_mutation\":2,\"fichier_note\":\"fichiers_notes\\/9UzsUVS3q78ods3V50jwrq1L3O7ldI8Y5H23ezJu.pdf\",\"updated_at\":\"2025-02-28T18:19:52.000000Z\"}}', NULL, '2025-02-28 18:24:23', '2025-02-28 18:24:23'),
(137, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":2,\"type_mutation_id\":1,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/z9YYF2StA71xpoBKxq5xr8S24JA3rnQtMn7LM18t.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":null,\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":null,\"ancien_service_id\":11,\"nouveau_service_id\":11,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-02-28T18:26:07.000000Z\",\"updated_at\":\"2025-02-28T18:26:07.000000Z\"}}', NULL, '2025-02-28 18:26:07', '2025-02-28 18:26:07'),
(138, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":2,\"type_mutation_id\":1,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/FAeY26XMkpAMaAYfpmt1BFCBKtLBHuBbQZDWAMx4.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":\"mutation local\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":11,\"nouveau_service_id\":7,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":5,\"created_at\":\"2025-02-28T18:26:07.000000Z\",\"updated_at\":\"2025-02-28T18:26:07.000000Z\"}}', NULL, '2025-02-28 18:26:07', '2025-02-28 18:26:07'),
(139, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":1,\"service_id\":7,\"specialite_grade_id\":5,\"fichier_note\":\"fichiers_notes\\/FAeY26XMkpAMaAYfpmt1BFCBKtLBHuBbQZDWAMx4.pdf\",\"updated_at\":\"2025-02-28T18:26:07.000000Z\"},\"old\":{\"fonction_id\":6,\"service_id\":11,\"specialite_grade_id\":7,\"fichier_note\":\"fichiers_notes\\/z9YYF2StA71xpoBKxq5xr8S24JA3rnQtMn7LM18t.pdf\",\"updated_at\":\"2025-02-28T18:24:23.000000Z\"}}', NULL, '2025-02-28 18:26:07', '2025-02-28 18:26:07'),
(140, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"IBN KHATIB\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0634\\u0641\\u0649 \\u0627\\u0628\\u0646 \\u062e\\u0637\\u064a\\u0628\",\"niveau_categorie_formation_id\":2,\"arrondissement_commune_id\":174,\"created_at\":\"2025-03-07T13:53:25.000000Z\",\"updated_at\":\"2025-03-07T13:53:25.000000Z\"}}', NULL, '2025-03-07 13:53:25', '2025-03-07 13:53:25'),
(141, 'Fonction', 'updated', 'App\\Models\\Fonction', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"secr\\u00e9tariat\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0627\\u062f\\u0627\\u0631\\u064a\",\"updated_at\":\"2025-03-07T13:57:25.000000Z\"},\"old\":{\"nom\":\"Aide-soignant(e)\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f\\/\\u0645\\u0633\\u0627\\u0639\\u062f\\u0629\",\"updated_at\":\"2025-01-09T09:58:26.000000Z\"}}', NULL, '2025-03-07 13:57:25', '2025-03-07 13:57:25'),
(142, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"MEDECIN\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0637\\u0628\\u0627\\u0621\",\"parent_id\":null,\"created_at\":\"2025-03-07T14:01:15.000000Z\",\"updated_at\":\"2025-03-07T14:01:15.000000Z\"}}', NULL, '2025-03-07 14:01:15', '2025-03-07 14:01:15'),
(143, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"MEDECIN GENERALE\",\"nom_arabe\":\"\\u0637\\u0628\\u064a\\u0628 \\u0639\\u0627\\u0645\",\"categorie_cadre_id\":7,\"created_at\":\"2025-03-07T14:01:52.000000Z\",\"updated_at\":\"2025-03-07T14:01:52.000000Z\"}}', NULL, '2025-03-07 14:01:52', '2025-03-07 14:01:52'),
(144, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"PREMIER GRADE\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":7,\"created_at\":\"2025-03-07T14:02:37.000000Z\",\"updated_at\":\"2025-03-07T14:02:37.000000Z\"}}', NULL, '2025-03-07 14:02:37', '2025-03-07 14:02:37'),
(145, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"ppr\":\"198989\",\"nom\":\"alaoui\",\"nom_arabe\":\"\\u064a\\u0628\\u064a\\u0628\",\"prenom\":\"mohammed\",\"prenom_arabe\":\"\\u0628\\u064a\\u0628\",\"cin\":\"cd434343\",\"sexe\":\"M\",\"date_naissance\":\"2000-12-12\",\"date_embauche\":\"2014-12-12\",\"email\":\"SDS@GMAIL.COM\",\"telephone\":\"86767\",\"adresse\":\"FDF\",\"fonction_id\":22,\"nom_formation_sanitaire_id\":6,\"remarques\":\"FES\",\"service_id\":17,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2014-12-12\",\"date_prise_en_service\":\"2014-12-13\",\"date_note\":\"2014-12-12\",\"fichier_note\":\"\",\"ref_note\":\"FD\",\"created_at\":\"2025-03-07T14:13:41.000000Z\",\"updated_at\":\"2025-03-07T14:13:41.000000Z\"}}', NULL, '2025-03-07 14:13:41', '2025-03-07 14:13:41'),
(146, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":4,\"type_mutation_id\":4,\"date_mutation\":\"2014-12-12\",\"date_note\":\"2014-12-12\",\"ref_note\":\"FD\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2014-12-13\",\"date_cessation_service\":null,\"ancien_service_id\":17,\"nouveau_service_id\":17,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-03-07T14:40:38.000000Z\",\"updated_at\":\"2025-03-07T14:40:38.000000Z\"}}', NULL, '2025-03-07 14:40:38', '2025-03-07 14:40:38'),
(147, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":4,\"type_mutation_id\":3,\"date_mutation\":\"2025-02-24\",\"date_note\":\"2025-02-25\",\"ref_note\":\"note\",\"fichiers_notes\":\"fichiers_notes\\/esXrRLtJrDo44gHc8wwBk3AgJ9QL2aIGQc2IyPRB.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":5,\"remarque\":\"kjk\",\"date_prise_en_service\":\"2025-02-27\",\"date_cessation_service\":\"2025-02-26\",\"ancien_service_id\":17,\"nouveau_service_id\":13,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":21,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":5,\"created_at\":\"2025-03-07T14:40:38.000000Z\",\"updated_at\":\"2025-03-07T14:40:38.000000Z\"}}', NULL, '2025-03-07 14:40:38', '2025-03-07 14:40:38'),
(148, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":21,\"nom_formation_sanitaire_id\":5,\"service_id\":13,\"specialite_grade_id\":5,\"type_mutation\":3,\"date_mutation\":\"2025-02-24\",\"date_prise_en_service\":\"2025-02-27\",\"date_note\":\"2025-02-25\",\"fichier_note\":\"fichiers_notes\\/esXrRLtJrDo44gHc8wwBk3AgJ9QL2aIGQc2IyPRB.pdf\",\"ref_note\":\"note\",\"updated_at\":\"2025-03-07T14:40:38.000000Z\"},\"old\":{\"fonction_id\":22,\"nom_formation_sanitaire_id\":6,\"service_id\":17,\"specialite_grade_id\":7,\"type_mutation\":4,\"date_mutation\":\"2014-12-12\",\"date_prise_en_service\":\"2014-12-13\",\"date_note\":\"2014-12-12\",\"fichier_note\":\"\",\"ref_note\":\"FD\",\"updated_at\":\"2025-03-07T14:13:41.000000Z\"}}', NULL, '2025-03-07 14:40:38', '2025-03-07 14:40:38'),
(149, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":4,\"type_mutation_id\":1,\"date_mutation\":\"2025-03-05\",\"date_note\":\"2025-03-04\",\"ref_note\":\"PIIIU\",\"fichiers_notes\":\"fichiers_notes\\/qFN75GuFK0cNvVHsHEuSkHADqy5mHRLD3DLZrdMi.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":5,\"remarque\":\"rrrrrr\",\"date_prise_en_service\":\"2025-03-06\",\"date_cessation_service\":\"2025-03-05\",\"ancien_service_id\":13,\"nouveau_service_id\":22,\"ancien_fonction_id\":21,\"nouveau_fonction_id\":24,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":6,\"created_at\":\"2025-03-07T14:43:37.000000Z\",\"updated_at\":\"2025-03-07T14:43:37.000000Z\"}}', NULL, '2025-03-07 14:43:37', '2025-03-07 14:43:37'),
(150, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":24,\"service_id\":22,\"specialite_grade_id\":6,\"type_mutation\":1,\"date_mutation\":\"2025-03-05\",\"date_prise_en_service\":\"2025-03-06\",\"date_note\":\"2025-03-04\",\"fichier_note\":\"fichiers_notes\\/qFN75GuFK0cNvVHsHEuSkHADqy5mHRLD3DLZrdMi.pdf\",\"ref_note\":\"PIIIU\",\"updated_at\":\"2025-03-07T14:43:37.000000Z\"},\"old\":{\"fonction_id\":21,\"service_id\":13,\"specialite_grade_id\":5,\"type_mutation\":3,\"date_mutation\":\"2025-02-24\",\"date_prise_en_service\":\"2025-02-27\",\"date_note\":\"2025-02-25\",\"fichier_note\":\"fichiers_notes\\/esXrRLtJrDo44gHc8wwBk3AgJ9QL2aIGQc2IyPRB.pdf\",\"ref_note\":\"note\",\"updated_at\":\"2025-03-07T14:40:38.000000Z\"}}', NULL, '2025-03-07 14:43:37', '2025-03-07 14:43:37'),
(151, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":2,\"type_mutation_id\":1,\"date_mutation\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"ref_note\":\"1\\/26032025\",\"fichiers_notes\":\"fichiers_notes\\/FAeY26XMkpAMaAYfpmt1BFCBKtLBHuBbQZDWAMx4.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":5,\"remarque\":null,\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":null,\"ancien_service_id\":7,\"nouveau_service_id\":7,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-03-07T14:51:28.000000Z\",\"updated_at\":\"2025-03-07T14:51:28.000000Z\"}}', NULL, '2025-03-07 14:51:28', '2025-03-07 14:51:28'),
(152, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":2,\"type_mutation_id\":3,\"date_mutation\":\"2025-02-25\",\"date_note\":\"2025-02-26\",\"ref_note\":\"ERAER\",\"fichiers_notes\":\"fichiers_notes\\/v3fefs32mS1jZYCxNdNjsBJszJm0fE7wVSVdSNEy.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":6,\"remarque\":\"SDQSD\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":7,\"nouveau_service_id\":22,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":7,\"created_at\":\"2025-03-07T14:51:28.000000Z\",\"updated_at\":\"2025-03-07T14:51:28.000000Z\"}}', NULL, '2025-03-07 14:51:28', '2025-03-07 14:51:28'),
(153, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":6,\"service_id\":22,\"specialite_grade_id\":7,\"type_mutation\":3,\"date_mutation\":\"2025-02-25\",\"fichier_note\":\"fichiers_notes\\/v3fefs32mS1jZYCxNdNjsBJszJm0fE7wVSVdSNEy.pdf\",\"ref_note\":\"ERAER\",\"updated_at\":\"2025-03-07T14:51:28.000000Z\"},\"old\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":5,\"service_id\":7,\"specialite_grade_id\":5,\"type_mutation\":1,\"date_mutation\":\"2025-02-28\",\"fichier_note\":\"fichiers_notes\\/FAeY26XMkpAMaAYfpmt1BFCBKtLBHuBbQZDWAMx4.pdf\",\"ref_note\":\"1\\/26032025\",\"updated_at\":\"2025-02-28T18:26:07.000000Z\"}}', NULL, '2025-03-07 14:51:28', '2025-03-07 14:51:28'),
(154, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":2,\"type_mutation_id\":2,\"date_mutation\":\"2025-03-01\",\"date_note\":\"2025-03-02\",\"ref_note\":\"QSQSDQS\",\"fichiers_notes\":\"fichiers_notes\\/GehF0y8eklVX3lyB4SVJdEoLy7BiLuBzSP6lNxSc.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":5,\"remarque\":\"QS\",\"date_prise_en_service\":\"2025-03-04\",\"date_cessation_service\":\"2025-03-05\",\"ancien_service_id\":22,\"nouveau_service_id\":14,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":5,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":5,\"created_at\":\"2025-03-07T14:59:57.000000Z\",\"updated_at\":\"2025-03-07T14:59:57.000000Z\"}}', NULL, '2025-03-07 14:59:57', '2025-03-07 14:59:57'),
(155, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":5,\"nom_formation_sanitaire_id\":5,\"service_id\":14,\"specialite_grade_id\":5,\"type_mutation\":2,\"date_mutation\":\"2025-03-01\",\"date_prise_en_service\":\"2025-03-04\",\"date_note\":\"2025-03-02\",\"fichier_note\":\"fichiers_notes\\/GehF0y8eklVX3lyB4SVJdEoLy7BiLuBzSP6lNxSc.pdf\",\"ref_note\":\"QSQSDQS\",\"updated_at\":\"2025-03-07T14:59:57.000000Z\"},\"old\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":6,\"service_id\":22,\"specialite_grade_id\":7,\"type_mutation\":3,\"date_mutation\":\"2025-02-25\",\"date_prise_en_service\":\"2025-02-28\",\"date_note\":\"2025-02-26\",\"fichier_note\":\"fichiers_notes\\/v3fefs32mS1jZYCxNdNjsBJszJm0fE7wVSVdSNEy.pdf\",\"ref_note\":\"ERAER\",\"updated_at\":\"2025-03-07T14:51:28.000000Z\"}}', NULL, '2025-03-07 14:59:57', '2025-03-07 14:59:57'),
(156, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 12, 'App\\Models\\User', 2, '{\"old\":{\"id\":12,\"fonctionnaire_id\":2,\"type_mutation_id\":3,\"date_mutation\":\"2025-02-25\",\"date_note\":\"2025-02-26\",\"ref_note\":\"ERAER\",\"fichiers_notes\":\"fichiers_notes\\/v3fefs32mS1jZYCxNdNjsBJszJm0fE7wVSVdSNEy.pdf\",\"formation_sanitaire_origine_id\":5,\"formation_sanitaire_destination_id\":6,\"remarque\":\"SDQSD\",\"date_prise_en_service\":\"2025-02-28\",\"date_cessation_service\":\"2025-02-27\",\"ancien_service_id\":7,\"nouveau_service_id\":22,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":7,\"created_at\":\"2025-03-07T14:51:28.000000Z\",\"updated_at\":\"2025-03-07T14:51:28.000000Z\"}}', NULL, '2025-03-07 15:24:46', '2025-03-07 15:24:46'),
(157, 'Position', 'created', 'App\\Models\\Position', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"suspendus\",\"nom_arabe\":\"\\u0645\\u062a\\u0648\\u0642\\u0641\",\"created_at\":\"2025-03-07T17:12:48.000000Z\",\"updated_at\":\"2025-03-07T17:12:48.000000Z\"}}', NULL, '2025-03-07 17:12:48', '2025-03-07 17:12:48'),
(158, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":2,\"ancien_position_id\":2,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-03-08\",\"date_prise_en_service\":\"2025-03-06\",\"remarque\":\"ddfgdf\",\"date_note\":\"2025-03-09\",\"ref_note\":\"lkl\",\"fichiers_notes\":\"fichiers_notes\\/qaZkCWxYis2TBM3nL0ZA5uhVVJREMfn2tIUSZkln.pdf\",\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-03-07T17:17:20.000000Z\",\"updated_at\":\"2025-03-07T17:17:20.000000Z\"}}', NULL, '2025-03-07 17:17:20', '2025-03-07 17:17:20'),
(159, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"position_id\":3,\"updated_at\":\"2025-03-07T17:17:20.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-03-07T14:59:57.000000Z\"}}', NULL, '2025-03-07 17:17:20', '2025-03-07 17:17:20'),
(160, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":2,\"ancien_position_id\":3,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-03-08\",\"date_prise_en_service\":\"2025-03-18\",\"remarque\":null,\"date_note\":\"2025-03-08\",\"ref_note\":\"REF CONGE\",\"fichiers_notes\":\"fichiers_notes\\/TJdfpQF1Kk7dAfRfu7Ur8DWeBqQP5DDyPpfN64VZ.pdf\",\"type\":\"conge\",\"type_certificate_id\":null,\"type_conge_id\":1,\"created_at\":\"2025-03-12T15:18:39.000000Z\",\"updated_at\":\"2025-03-12T15:18:39.000000Z\"}}', NULL, '2025-03-12 15:18:39', '2025-03-12 15:18:39'),
(161, 'Grade', 'created', 'App\\Models\\Grade', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:06:51.000000Z\",\"updated_at\":\"2025-03-19T16:06:51.000000Z\"}}', NULL, '2025-03-19 16:06:51', '2025-03-19 16:06:51'),
(162, 'Grade', 'created', 'App\\Models\\Grade', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"troisi\\u00e8me grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u0629\",\"created_at\":\"2025-03-19T16:07:29.000000Z\",\"updated_at\":\"2025-03-19T16:07:29.000000Z\"}}', NULL, '2025-03-19 16:07:29', '2025-03-19 16:07:29'),
(163, 'Grade', 'created', 'App\\Models\\Grade', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"hors grade\",\"nom_arabe\":\"\\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"created_at\":\"2025-03-19T16:07:58.000000Z\",\"updated_at\":\"2025-03-19T16:07:58.000000Z\"}}', NULL, '2025-03-19 16:07:58', '2025-03-19 16:07:58'),
(164, 'Grade', 'created', 'App\\Models\\Grade', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"exceptionnel grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:08:33.000000Z\",\"updated_at\":\"2025-03-19T16:08:33.000000Z\"}}', NULL, '2025-03-19 16:08:33', '2025-03-19 16:08:33'),
(165, 'Service', 'created', 'App\\Models\\Service', 'created', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":25,\"nom\":\"Urgence\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u0639\\u062c\\u0644\\u0627\\u062a\",\"created_at\":\"2025-03-19T16:09:36.000000Z\",\"updated_at\":\"2025-03-19T16:09:36.000000Z\"}}', NULL, '2025-03-19 16:09:36', '2025-03-19 16:09:36'),
(166, 'Service', 'created', 'App\\Models\\Service', 'created', 26, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":26,\"nom\":\"Ressources humaines\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0648\\u0627\\u062f \\u0627\\u0644\\u0628\\u0634\\u0631\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:12:13.000000Z\",\"updated_at\":\"2025-03-19T16:12:13.000000Z\"}}', NULL, '2025-03-19 16:12:13', '2025-03-19 16:12:13'),
(167, 'Service', 'created', 'App\\Models\\Service', 'created', 27, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":27,\"nom\":\"Plannification Famililaes\",\"nom_arabe\":\"\\u062a\\u0646\\u0638\\u064a\\u0645 \\u0627\\u0644\\u062d\\u0645\\u0644\",\"created_at\":\"2025-03-19T16:12:55.000000Z\",\"updated_at\":\"2025-03-19T16:12:55.000000Z\"}}', NULL, '2025-03-19 16:12:55', '2025-03-19 16:12:55'),
(168, 'Service', 'created', 'App\\Models\\Service', 'created', 28, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":28,\"nom\":\"SAA\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062a\\u0642\\u0628\\u0627\\u0644 \\u0648\\u0627\\u0644\\u0642\\u0628\\u0648\\u0644\",\"created_at\":\"2025-03-19T16:13:16.000000Z\",\"updated_at\":\"2025-03-19T16:13:16.000000Z\"}}', NULL, '2025-03-19 16:13:16', '2025-03-19 16:13:16'),
(169, 'Service', 'created', 'App\\Models\\Service', 'created', 29, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":29,\"nom\":\"La Caisse\",\"nom_arabe\":\"\\u062a\\u062d\\u0635\\u064a\\u0644 \\u0627\\u0644\\u0645\\u062f\\u0627\\u062e\\u064a\\u0644\",\"created_at\":\"2025-03-19T16:13:38.000000Z\",\"updated_at\":\"2025-03-19T16:13:38.000000Z\"}}', NULL, '2025-03-19 16:13:38', '2025-03-19 16:13:38'),
(170, 'Service', 'created', 'App\\Models\\Service', 'created', 30, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":30,\"nom\":\"p\\u00e9diatire\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0637\\u0641\\u0627\\u0644\",\"created_at\":\"2025-03-19T16:13:55.000000Z\",\"updated_at\":\"2025-03-19T16:13:55.000000Z\"}}', NULL, '2025-03-19 16:13:55', '2025-03-19 16:13:55'),
(171, 'Service', 'created', 'App\\Models\\Service', 'created', 31, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":31,\"nom\":\"maternit\\u00e9\",\"nom_arabe\":\"\\u0627\\u0644\\u0648\\u0644\\u0627\\u062f\\u0627\\u062a\",\"created_at\":\"2025-03-19T16:14:17.000000Z\",\"updated_at\":\"2025-03-19T16:14:17.000000Z\"}}', NULL, '2025-03-19 16:14:17', '2025-03-19 16:14:17'),
(172, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Mutation R\\u00e9gionale\",\"nom_arabe\":\"\\u062d\\u0631\\u0643\\u0629 \\u0627\\u0644\\u062c\\u0647\\u0648\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:16:06.000000Z\",\"updated_at\":\"2025-03-19T16:16:06.000000Z\"}}', NULL, '2025-03-19 16:16:06', '2025-03-19 16:16:06'),
(173, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"Mutation national\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0631\\u0643\\u0629 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:16:55.000000Z\",\"updated_at\":\"2025-03-19T16:16:55.000000Z\"}}', NULL, '2025-03-19 16:16:55', '2025-03-19 16:16:55'),
(174, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"Raison de sant\\u00e9\",\"nom_arabe\":\"\\u0644\\u0644\\u0627\\u0633\\u0628\\u0627\\u0628 \\u0635\\u062d\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:17:40.000000Z\",\"updated_at\":\"2025-03-19T16:17:40.000000Z\"}}', NULL, '2025-03-19 16:17:40', '2025-03-19 16:17:40'),
(175, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"Mise a la disposition\",\"nom_arabe\":\"\\u0627\\u0644\\u0648\\u0636\\u0639 \\u0631\\u0647\\u0646 \\u0627\\u0634\\u0627\\u0631\\u0629\",\"created_at\":\"2025-03-19T16:18:13.000000Z\",\"updated_at\":\"2025-03-19T16:18:13.000000Z\"}}', NULL, '2025-03-19 16:18:13', '2025-03-19 16:18:13'),
(176, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"nom\":\"Formation\\/Stage de formation\",\"nom_arabe\":\"\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0627\\u0648 \\u062a\\u062f\\u0631\\u064a\\u0628\",\"created_at\":\"2025-03-19T16:19:58.000000Z\",\"updated_at\":\"2025-03-19T16:19:58.000000Z\"}}', NULL, '2025-03-19 16:19:58', '2025-03-19 16:19:58'),
(177, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"nom\":\"Poste de responsabilit\\u00e9\",\"nom_arabe\":\"\\u062a\\u0639\\u064a\\u064a\\u0646 \\u0645\\u0646\\u0635\\u0628 \\u0627\\u0644\\u0645\\u0633\\u0624\\u0648\\u0644\\u064a\\u0629\",\"created_at\":\"2025-03-19T16:20:47.000000Z\",\"updated_at\":\"2025-03-19T16:20:47.000000Z\"}}', NULL, '2025-03-19 16:20:47', '2025-03-19 16:20:47'),
(178, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"nom\":\"Provisoire\",\"nom_arabe\":\"\\u0645\\u0624\\u0642\\u062a\",\"created_at\":\"2025-03-19T16:21:39.000000Z\",\"updated_at\":\"2025-03-19T16:21:39.000000Z\"}}', NULL, '2025-03-19 16:21:39', '2025-03-19 16:21:39'),
(179, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"ALHAJ\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u062c\",\"jours\":30,\"created_at\":\"2025-03-19T16:26:22.000000Z\",\"updated_at\":\"2025-03-19T16:26:22.000000Z\"}}', NULL, '2025-03-19 16:26:22', '2025-03-19 16:26:22'),
(180, 'Certificate', 'created', 'App\\Models\\TypeCertificate', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"nom\":\"Court terme\",\"nom_arabe\":\"\\u0642\\u0635\\u064a\\u0631\\u0629 \\u0627\\u0644\\u0645\\u062f\\u0629\",\"created_at\":\"2025-03-19T16:27:27.000000Z\",\"updated_at\":\"2025-03-19T16:27:27.000000Z\"}}', NULL, '2025-03-19 16:27:27', '2025-03-19 16:27:27'),
(181, 'Certificate', 'created', 'App\\Models\\TypeCertificate', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"Moyenne Terme\",\"nom_arabe\":\"\\u0645\\u062a\\u0648\\u0633\\u0637\\u0629 \\u0627\\u0644\\u0645\\u062f\\u0629\",\"created_at\":\"2025-03-19T16:27:46.000000Z\",\"updated_at\":\"2025-03-19T16:27:46.000000Z\"}}', NULL, '2025-03-19 16:27:46', '2025-03-19 16:27:46'),
(182, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"Cong\\u00e9 sans sole\",\"nom_arabe\":\"\\u0631\\u062e\\u0635\\u0629 \\u0628\\u062f\\u0648\\u0646 \\u0627\\u062c\\u0631\",\"jours\":0,\"created_at\":\"2025-03-19T16:28:31.000000Z\",\"updated_at\":\"2025-03-19T16:28:31.000000Z\"}}', NULL, '2025-03-19 16:28:31', '2025-03-19 16:28:31'),
(183, 'Position', 'created', 'App\\Models\\Position', 'created', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":4,\"nom\":\"D\\u00e9ces\",\"nom_arabe\":\"\\u0648\\u0641\\u0627\\u0629\",\"created_at\":\"2025-03-19T16:31:11.000000Z\",\"updated_at\":\"2025-03-19T16:31:11.000000Z\"}}', NULL, '2025-03-19 16:31:11', '2025-03-19 16:31:11'),
(184, 'Position', 'created', 'App\\Models\\Position', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Mise en disponibilit\\u00e9\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062d\\u0627\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u0633\\u062a\\u064a\\u062f\\u0627\\u0639\",\"created_at\":\"2025-03-19T16:37:09.000000Z\",\"updated_at\":\"2025-03-19T16:37:09.000000Z\"}}', NULL, '2025-03-19 16:37:09', '2025-03-19 16:37:09'),
(185, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"Cong\\u00e9 Maternit\\u00e9\",\"nom_arabe\":\"\\u0631\\u062e\\u0635\\u0629 \\u0627\\u0644\\u0648\\u0644\\u0627\\u062f\\u0629\",\"jours\":90,\"created_at\":\"2025-03-19T16:39:05.000000Z\",\"updated_at\":\"2025-03-19T16:39:05.000000Z\"}}', NULL, '2025-03-19 16:39:05', '2025-03-19 16:39:05'),
(186, 'Certificate', 'created', 'App\\Models\\TypeCertificate', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Enceinte\",\"nom_arabe\":\"\\u062d\\u0645\\u0644\",\"created_at\":\"2025-03-19T16:40:26.000000Z\",\"updated_at\":\"2025-03-19T16:40:26.000000Z\"}}', NULL, '2025-03-19 16:40:26', '2025-03-19 16:40:26'),
(187, 'Type Congé', 'created', 'App\\Models\\TypeConge', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"Cong\\u00e9 de paternit\\u00e9\",\"nom_arabe\":\"\\u0631\\u062e\\u0635\\u0629 \\u0627\\u0644\\u0627\\u0628\\u0648\\u0629\",\"jours\":11,\"created_at\":\"2025-03-19T16:45:32.000000Z\",\"updated_at\":\"2025-03-19T16:45:32.000000Z\"}}', NULL, '2025-03-19 16:45:32', '2025-03-19 16:45:32'),
(188, 'Position', 'updated', 'App\\Models\\Position', 'updated', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Mise en disponibilit\\u00e9 (3 ans maximum renouvel\\u00e9 une fois)\",\"updated_at\":\"2025-03-19T16:46:28.000000Z\"},\"old\":{\"nom\":\"Mise en disponibilit\\u00e9\",\"updated_at\":\"2025-03-19T16:37:09.000000Z\"}}', NULL, '2025-03-19 16:46:28', '2025-03-19 16:46:28'),
(189, 'Position', 'updated', 'App\\Models\\Position', 'updated', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062d\\u0627\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u0633\\u062a\\u064a\\u062f\\u0627\\u0639(\\u0644\\u0627\\u062a\\u062a\\u0639\\u062f\\u0649 3 \\u0633\\u0646\\u0648\\u0627\\u062a \\u0648\\u062a\\u062c\\u062f\\u062f \\u0645\\u0631\\u0629 \\u0648\\u0627\\u062d\\u062f\\u0629)\",\"updated_at\":\"2025-03-19T16:47:03.000000Z\"},\"old\":{\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062d\\u0627\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0627\\u0633\\u062a\\u064a\\u062f\\u0627\\u0639\",\"updated_at\":\"2025-03-19T16:46:28.000000Z\"}}', NULL, '2025-03-19 16:47:03', '2025-03-19 16:47:03'),
(190, 'Position', 'created', 'App\\Models\\Position', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"d\\u00e9tachement\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0644\\u062d\\u0627\\u0642\",\"created_at\":\"2025-03-19T16:49:26.000000Z\",\"updated_at\":\"2025-03-19T16:49:26.000000Z\"}}', NULL, '2025-03-19 16:49:26', '2025-03-19 16:49:26'),
(191, 'Position', 'created', 'App\\Models\\Position', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"disponibilit\\u00e9 prononc\\u00e9e\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0648\\u0642\\u064a\\u0641 \\u0627\\u0644\\u062d\\u062a\\u0645\\u064a\",\"created_at\":\"2025-03-19T16:55:24.000000Z\",\"updated_at\":\"2025-03-19T16:55:24.000000Z\"}}', NULL, '2025-03-19 16:55:24', '2025-03-19 16:55:24'),
(192, 'Categorie Cadre', 'created', 'App\\Models\\CategorieCadre', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"M\\u00e9dicale\",\"nom_arabe\":\"\\u0627\\u0644\\u0637\\u0628\\u064a\",\"parent_id\":null,\"created_at\":\"2025-03-19T16:57:13.000000Z\",\"updated_at\":\"2025-03-19T16:57:13.000000Z\"}}', NULL, '2025-03-19 16:57:13', '2025-03-19 16:57:13'),
(193, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"M\\u00e9decin G\\u00e9n\\u00e9rale\",\"nom_arabe\":\"\\u0623\\u0637\\u0628\\u0627\\u0621 \\u0627\\u0644\\u0639\\u0627\\u0645\\u064a\\u0646\",\"categorie_cadre_id\":8,\"created_at\":\"2025-03-19T16:58:20.000000Z\",\"updated_at\":\"2025-03-19T16:58:20.000000Z\"}}', NULL, '2025-03-19 16:58:20', '2025-03-19 16:58:20'),
(194, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"nom\":\"M\\u00e9decin Sp\\u00e9cilialiste\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0637\\u0628\\u0627\\u0621 \\u0627\\u0644\\u0627\\u062e\\u062a\\u0635\\u0627\\u0635\\u064a\\u064a\\u0646\",\"categorie_cadre_id\":8,\"created_at\":\"2025-03-19T16:58:49.000000Z\",\"updated_at\":\"2025-03-19T16:58:49.000000Z\"}}', NULL, '2025-03-19 16:58:49', '2025-03-19 16:58:49'),
(195, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"nom\":\"Sage femme\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629\",\"categorie_cadre_id\":4,\"created_at\":\"2025-03-19T16:59:26.000000Z\",\"updated_at\":\"2025-03-19T16:59:26.000000Z\"}}', NULL, '2025-03-19 16:59:26', '2025-03-19 16:59:26'),
(196, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"nom\":\"Di\\u00e9t\\u00e9ticien\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0645\\u064a\\u0629 \\u0648\\u0627\\u0644\\u062a\\u063a\\u062f\\u064a\\u0629\",\"categorie_cadre_id\":4,\"created_at\":\"2025-03-19T17:00:03.000000Z\",\"updated_at\":\"2025-03-19T17:00:03.000000Z\"}}', NULL, '2025-03-19 17:00:03', '2025-03-19 17:00:03'),
(197, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"nom\":\"Ing\\u00e9nieur\",\"nom_arabe\":\"\\u0645\\u0647\\u0646\\u062f\\u0633\",\"categorie_cadre_id\":1,\"created_at\":\"2025-03-19T17:00:43.000000Z\",\"updated_at\":\"2025-03-19T17:00:43.000000Z\"}}', NULL, '2025-03-19 17:00:43', '2025-03-19 17:00:43'),
(198, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"nom\":\"Adjoint technique\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u062a\\u0642\\u0646\\u064a\",\"categorie_cadre_id\":1,\"created_at\":\"2025-03-19T17:02:20.000000Z\",\"updated_at\":\"2025-03-19T17:02:20.000000Z\"}}', NULL, '2025-03-19 17:02:20', '2025-03-19 17:02:20'),
(199, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"nom\":\"Aide Soignant\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0644\\u0627\\u062c\",\"categorie_cadre_id\":1,\"created_at\":\"2025-03-19T17:02:47.000000Z\",\"updated_at\":\"2025-03-19T17:02:47.000000Z\"}}', NULL, '2025-03-19 17:02:47', '2025-03-19 17:02:47'),
(200, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 15, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":15,\"nom\":\"Pharmacien\",\"nom_arabe\":\"\\u0637\\u0628\\u064a\\u0628 \\u0635\\u064a\\u062f\\u0644\\u064a\",\"categorie_cadre_id\":6,\"created_at\":\"2025-03-19T17:03:35.000000Z\",\"updated_at\":\"2025-03-19T17:03:35.000000Z\"}}', NULL, '2025-03-19 17:03:35', '2025-03-19 17:03:35'),
(201, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 16, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":16,\"nom\":\"Infirmiers polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"categorie_cadre_id\":4,\"created_at\":\"2025-03-19T17:04:12.000000Z\",\"updated_at\":\"2025-03-19T17:04:12.000000Z\"}}', NULL, '2025-03-19 17:04:12', '2025-03-19 17:04:12'),
(202, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":17,\"nom\":\"infirmier en anesth\\u00e9sie et r\\u00e9animation\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0627\\u0644\\u0627\\u0646\\u0639\\u0627\\u0634 \\u0648\\u0627\\u0644\\u062a\\u062e\\u062f\\u064a\\u0631\",\"categorie_cadre_id\":4,\"created_at\":\"2025-03-19T17:04:56.000000Z\",\"updated_at\":\"2025-03-19T17:04:56.000000Z\"}}', NULL, '2025-03-19 17:04:56', '2025-03-19 17:04:56'),
(203, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"Chirurgie visc\\u00e9rale\",\"nom_arabe\":\"\\u062c\\u0631\\u0627\\u062d\\u0629 \\u0627\\u0644\\u0628\\u0627\\u0637\\u0646\\u064a\\u0629\",\"grade_id\":1,\"created_at\":\"2025-03-19T17:09:11.000000Z\",\"updated_at\":\"2025-03-19T17:09:11.000000Z\"}}', NULL, '2025-03-19 17:09:11', '2025-03-19 17:09:11'),
(204, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":9,\"created_at\":\"2025-03-19T17:10:34.000000Z\",\"updated_at\":\"2025-03-19T17:10:34.000000Z\"}}', NULL, '2025-03-19 17:10:34', '2025-03-19 17:10:34'),
(205, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"hors grade\",\"nom_arabe\":\"\\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"cadre_id\":9,\"created_at\":\"2025-03-19T17:11:02.000000Z\",\"updated_at\":\"2025-03-19T17:11:02.000000Z\"}}', NULL, '2025-03-19 17:11:02', '2025-03-19 17:11:02'),
(206, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"grade exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":9,\"created_at\":\"2025-03-19T17:12:06.000000Z\",\"updated_at\":\"2025-03-19T17:12:06.000000Z\"}}', NULL, '2025-03-19 17:12:06', '2025-03-19 17:12:06'),
(207, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"exceptionnel grade\",\"updated_at\":\"2025-03-19T17:12:26.000000Z\"},\"old\":{\"nom\":\"grade exceptionnel\",\"updated_at\":\"2025-03-19T17:12:06.000000Z\"}}', NULL, '2025-03-19 17:12:26', '2025-03-19 17:12:26'),
(208, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":3,\"created_at\":\"2025-03-19T17:12:53.000000Z\",\"updated_at\":\"2025-03-19T17:12:53.000000Z\"}}', NULL, '2025-03-19 17:12:53', '2025-03-19 17:12:53'),
(209, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"nom\":\"troisi\\u00e8me grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u0629\",\"cadre_id\":3,\"created_at\":\"2025-03-19T17:13:10.000000Z\",\"updated_at\":\"2025-03-19T17:13:10.000000Z\"}}', NULL, '2025-03-19 17:13:10', '2025-03-19 17:13:10'),
(210, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"nom\":\"premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":8,\"created_at\":\"2025-03-19T17:13:31.000000Z\",\"updated_at\":\"2025-03-19T17:13:31.000000Z\"}}', NULL, '2025-03-19 17:13:31', '2025-03-19 17:13:31'),
(211, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":8,\"created_at\":\"2025-03-19T17:14:51.000000Z\",\"updated_at\":\"2025-03-19T17:14:51.000000Z\"}}', NULL, '2025-03-19 17:14:51', '2025-03-19 17:14:51'),
(212, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"hors grade\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"updated_at\":\"2025-03-19T17:15:30.000000Z\"},\"old\":{\"nom\":\"deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-03-19T17:14:51.000000Z\"}}', NULL, '2025-03-19 17:15:30', '2025-03-19 17:15:30'),
(213, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":\"\\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"updated_at\":\"2025-03-19T17:15:57.000000Z\"},\"old\":{\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"updated_at\":\"2025-03-19T17:15:30.000000Z\"}}', NULL, '2025-03-19 17:15:57', '2025-03-19 17:15:57'),
(214, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"nom\":\"grade exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":8,\"created_at\":\"2025-03-19T17:16:14.000000Z\",\"updated_at\":\"2025-03-19T17:16:14.000000Z\"}}', NULL, '2025-03-19 17:16:14', '2025-03-19 17:16:14'),
(215, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"nom\":\"Deuxi\\u00e8me grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":3,\"created_at\":\"2025-03-19T17:16:59.000000Z\",\"updated_at\":\"2025-03-19T17:16:59.000000Z\"}}', NULL, '2025-03-19 17:16:59', '2025-03-19 17:16:59'),
(216, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"nom\":\"Premier grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":16,\"created_at\":\"2025-03-19T17:18:06.000000Z\",\"updated_at\":\"2025-03-19T17:18:06.000000Z\"}}', NULL, '2025-03-19 17:18:06', '2025-03-19 17:18:06'),
(217, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 15, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":15,\"nom\":\"Deuxieme grade\",\"nom_arabe\":\"\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":16,\"created_at\":\"2025-03-19T17:18:34.000000Z\",\"updated_at\":\"2025-03-19T17:18:34.000000Z\"}}', NULL, '2025-03-19 17:18:34', '2025-03-19 17:18:34'),
(218, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"nom\":\"Polyvalent\",\"nom_arabe\":\"\\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"grade_id\":14,\"created_at\":\"2025-03-19T17:19:42.000000Z\",\"updated_at\":\"2025-03-19T17:19:42.000000Z\"}}', NULL, '2025-03-19 17:19:42', '2025-03-19 17:19:42'),
(219, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"nom\":\"Polyvalent\",\"nom_arabe\":\"\\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"grade_id\":15,\"created_at\":\"2025-03-19T17:20:17.000000Z\",\"updated_at\":\"2025-03-19T17:20:17.000000Z\"}}', NULL, '2025-03-19 17:20:17', '2025-03-19 17:20:17');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(220, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Fondation Med VI\",\"nom_arabe\":\"\\u0645\\u0624\\u0633\\u0633\\u0629 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0633\\u0627\\u062f\\u0633 \\u0644\\u062a\\u0636\\u0627\\u0645\\u0646\",\"created_at\":\"2025-03-19T17:30:41.000000Z\",\"updated_at\":\"2025-03-19T17:30:41.000000Z\"}}', NULL, '2025-03-19 17:30:41', '2025-03-19 17:30:41'),
(221, 'Type Categorie Formation', 'updated', 'App\\Models\\TypeCategorieFormation', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"Structure Appui\",\"nom_arabe\":\"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u0627\\u0644\\u062f\\u0639\\u0645\",\"updated_at\":\"2025-03-19T17:31:23.000000Z\"},\"old\":{\"nom\":\"CENTRE ADDICTOLOGIE\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0637\\u0628 \\u0627\\u0644\\u0627\\u062f\\u0645\\u0627\\u0646\",\"updated_at\":\"2025-02-06T11:28:27.000000Z\"}}', NULL, '2025-03-19 17:31:23', '2025-03-19 17:31:23'),
(222, 'Type Categorie Formation', 'updated', 'App\\Models\\TypeCategorieFormation', 'updated', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"\\u064cRESSP\",\"nom_arabe\":\"\\u0634\\u0628\\u0643\\u0629 \\u0645\\u0624\\u0633\\u0633\\u0627\\u062a \\u0627\\u0644\\u0631\\u0639\\u0627\\u064a\\u0629 \\u0627\\u0644\\u0635\\u062d\\u064a\\u0629  \\u0627\\u0644\\u0627\\u0648\\u0644\\u064a\\u0629\",\"updated_at\":\"2025-03-19T17:35:01.000000Z\"},\"old\":{\"nom\":\"Structure Appui\",\"nom_arabe\":\"\\u0645\\u0631\\u0627\\u0643\\u0632 \\u0627\\u0644\\u062f\\u0639\\u0645\",\"updated_at\":\"2025-03-19T17:31:23.000000Z\"}}', NULL, '2025-03-19 17:35:01', '2025-03-19 17:35:01'),
(223, 'Niveau Categorie Formation', 'updated', 'App\\Models\\NiveauCategorieFormation', 'updated', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"type_categorie_formation_id\":4,\"updated_at\":\"2025-03-19T17:35:37.000000Z\"},\"old\":{\"type_categorie_formation_id\":1,\"updated_at\":\"2025-02-03T19:49:29.000000Z\"}}', NULL, '2025-03-19 17:35:37', '2025-03-19 17:35:37'),
(224, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Structure Appui\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u062f\\u0639\\u0645\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-03-19T17:39:19.000000Z\",\"updated_at\":\"2025-03-19T17:39:19.000000Z\"}}', NULL, '2025-03-19 17:39:19', '2025-03-19 17:39:19'),
(225, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"CRSR SAISS\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0645\\u0631\\u062c\\u0639\\u064a \\u0644\\u0635\\u062d\\u0629 \\u0627\\u0644\\u0627\\u0646\\u062c\\u0627\\u0628\\u064a\\u0629 \\u0633\\u0627\\u064a\\u0633\",\"niveau_categorie_formation_id\":5,\"arrondissement_commune_id\":1,\"created_at\":\"2025-03-19T17:41:15.000000Z\",\"updated_at\":\"2025-03-19T17:41:15.000000Z\"}}', NULL, '2025-03-19 17:41:15', '2025-03-19 17:41:15'),
(226, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"CDTMR Bendebab\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u062a\\u0634\\u062e\\u064a\\u0635\\u064a \\u0639\\u0644\\u0627\\u062c \\u0627\\u0645\\u0631\\u0627\\u0636 \\u0627\\u0644\\u062a\\u0646\\u0641\\u0633\\u064a\\u0629 \\u0628\\u0646 \\u062f\\u0628\\u0627\\u0628\",\"niveau_categorie_formation_id\":5,\"arrondissement_commune_id\":174,\"created_at\":\"2025-03-19T17:43:05.000000Z\",\"updated_at\":\"2025-03-19T17:43:05.000000Z\"}}', NULL, '2025-03-19 17:43:05', '2025-03-19 17:43:05'),
(227, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"nom\":\"Alghassani\",\"nom_arabe\":\"\\u0627\\u0644\\u063a\\u0633\\u0627\\u0646\\u064a\",\"niveau_categorie_formation_id\":2,\"arrondissement_commune_id\":173,\"created_at\":\"2025-03-19T17:44:39.000000Z\",\"updated_at\":\"2025-03-19T17:44:39.000000Z\"}}', NULL, '2025-03-19 17:44:39', '2025-03-19 17:44:39'),
(228, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"nom\":\"Monfleuri 1\",\"nom_arabe\":\"\\u0645\\u0648\\u0646\\u0641\\u0644\\u0648\\u0631\\u064a 1\",\"niveau_categorie_formation_id\":5,\"arrondissement_commune_id\":1,\"created_at\":\"2025-03-19T17:45:26.000000Z\",\"updated_at\":\"2025-03-19T17:45:26.000000Z\"}}', NULL, '2025-03-19 17:45:26', '2025-03-19 17:45:26'),
(229, 'Nom Formation Sanitaire', 'updated', 'App\\Models\\NomFormationSanitaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"niveau_categorie_formation_id\":1,\"updated_at\":\"2025-03-19T17:45:45.000000Z\"},\"old\":{\"niveau_categorie_formation_id\":5,\"updated_at\":\"2025-03-19T17:45:26.000000Z\"}}', NULL, '2025-03-19 17:45:45', '2025-03-19 17:45:45'),
(230, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"nom\":\"Centre r\\u00e9f\\u00e9rence et pr\\u00e9coce de cancer\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0645\\u0631\\u062c\\u0639\\u064a \\u0644\\u0639\\u0644\\u0627\\u062c \\u0633\\u0631\\u0637\\u0627\\u0646 \\u0639\\u0646\\u0642 \\u0631\\u062d\\u0645\",\"categorie_formation_id\":5,\"created_at\":\"2025-03-19T17:50:35.000000Z\",\"updated_at\":\"2025-03-19T17:50:35.000000Z\"}}', NULL, '2025-03-19 17:50:36', '2025-03-19 17:50:36'),
(231, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"nom\":\"Centre fondation Med VI\",\"nom_arabe\":\"\\u0645\\u0624\\u0633\\u0633\\u0629 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0633\\u0627\\u062f\\u0633 \\u0644\\u062a\\u0636\\u0627\\u0645\\u0646\",\"type_categorie_formation_id\":5,\"created_at\":\"2025-03-19T17:51:36.000000Z\",\"updated_at\":\"2025-03-19T17:51:36.000000Z\"}}', NULL, '2025-03-19 17:51:36', '2025-03-19 17:51:36'),
(232, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"nom\":\"fondation med VI traitement cancer\",\"nom_arabe\":\"\\u0645\\u0624\\u0633\\u0633\\u0629 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0633\\u0627\\u062f\\u0633 \\u0644\\u062a\\u0636\\u0627\\u0645\\u0646 \\u0639\\u0644\\u0627\\u062c \\u0633\\u0631\\u0637\\u0627\\u0646 \\u0639\\u0646\\u0642 \\u0631\\u062d\\u0645\",\"niveau_categorie_formation_id\":6,\"arrondissement_commune_id\":171,\"created_at\":\"2025-03-19T17:53:07.000000Z\",\"updated_at\":\"2025-03-19T17:53:07.000000Z\"}}', NULL, '2025-03-19 17:53:07', '2025-03-19 17:53:07'),
(233, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 5, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":5,\"ppr\":\"166070\",\"nom\":\"kaddouri\",\"nom_arabe\":\"\\u0642\\u062f\\u0648\\u0631\\u064a\",\"prenom\":\"mohammed\",\"prenom_arabe\":\"\\u0645\\u062d\\u0645\\u062f\",\"cin\":\"Cd231259\",\"sexe\":\"M\",\"date_naissance\":\"1999-02-05\",\"date_embauche\":\"2011-12-14\",\"email\":\"kaddouriamc1@gmail.com\",\"telephone\":\"0659187692\",\"adresse\":\"av soussa rue angad zohour 2 n 31 fes\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":9,\"remarques\":\"\",\"service_id\":26,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2011-12-14\",\"date_prise_en_service\":\"2011-12-15\",\"date_note\":\"2011-12-15\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-03-19T17:55:38.000000Z\",\"updated_at\":\"2025-03-19T17:55:38.000000Z\"}}', NULL, '2025-03-19 17:55:38', '2025-03-19 17:55:38'),
(234, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":6,\"ppr\":\"1660747555\",\"nom\":\"ALAOUI\",\"nom_arabe\":\"\\u0639\\u0644\\u0648\\u064a\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"\\u0645\\u062d\\u0645\\u062f\",\"cin\":\"CDJJHJHJH\",\"sexe\":\"M\",\"date_naissance\":\"1990-12-12\",\"date_embauche\":\"2020-11-11\",\"email\":\"HGH@GMAIL.COM\",\"telephone\":\"808989\",\"adresse\":\"FES\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"AE\",\"service_id\":24,\"specialite_grade_id\":8,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"2020-11-11\",\"date_prise_en_service\":\"2020-11-12\",\"date_note\":\"2020-11-12\",\"fichier_note\":\"\",\"ref_note\":\"AZE\",\"created_at\":\"2025-03-19T18:04:44.000000Z\",\"updated_at\":\"2025-03-19T18:04:44.000000Z\"}}', NULL, '2025-03-19 18:04:44', '2025-03-19 18:04:44'),
(235, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"nom\":\"Viscerale\",\"nom_arabe\":\"\\u062c\\u0631\\u0627\\u062d\\u0629 \\u0627\\u0644\\u0628\\u0627\\u0637\\u0646\\u064a\\u0629\",\"grade_id\":6,\"created_at\":\"2025-03-19T18:06:01.000000Z\",\"updated_at\":\"2025-03-19T18:06:01.000000Z\"}}', NULL, '2025-03-19 18:06:01', '2025-03-19 18:06:01'),
(236, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 6, 'App\\Models\\User', 2, '{\"attributes\":{\"specialite_grade_id\":11,\"updated_at\":\"2025-03-19T18:06:19.000000Z\"},\"old\":{\"specialite_grade_id\":8,\"updated_at\":\"2025-03-19T18:04:44.000000Z\"}}', NULL, '2025-03-19 18:06:19', '2025-03-19 18:06:19'),
(237, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"observation\":\"AZ\",\"url\":\"certificates\\/3ws248RJIjzPXkwhmGnMeAplWizqS52HClfSkcsm.pdf\",\"type_certificate_id\":1,\"fonctionnaire_id\":6,\"jours\":1,\"date_depot\":\"2025-05-07\",\"date_debut\":\"2025-05-07\",\"created_at\":\"2025-05-07T01:57:57.000000Z\",\"updated_at\":\"2025-05-07T01:57:57.000000Z\"}}', NULL, '2025-05-07 00:57:57', '2025-05-07 00:57:57'),
(238, 'default', 'created', 'App\\Models\\User', 'created', 4, NULL, NULL, '{\"attributes\":{\"name\":\"Admin User\",\"email\":\"admin@test.com\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(239, 'Region', 'created', 'App\\Models\\Region', 'created', 14, NULL, NULL, '{\"attributes\":{\"id\":14,\"nom\":\"F\\u00e8s-Mekn\\u00e8s\",\"nom_arabe\":\"\\u0641\\u0627\\u0633 \\u0645\\u0643\\u0646\\u0627\\u0633\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(240, 'Region', 'created', 'App\\Models\\Region', 'created', 15, NULL, NULL, '{\"attributes\":{\"id\":15,\"nom\":\"Rabat-Sal\\u00e9-K\\u00e9nitra\",\"nom_arabe\":\"\\u0627\\u0644\\u0631\\u0628\\u0627\\u0637 \\u0633\\u0644\\u0627 \\u0627\\u0644\\u0642\\u0646\\u064a\\u0637\\u0631\\u0629\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(241, 'Region', 'created', 'App\\Models\\Region', 'created', 16, NULL, NULL, '{\"attributes\":{\"id\":16,\"nom\":\"Casablanca-Settat\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0627\\u0631 \\u0627\\u0644\\u0628\\u064a\\u0636\\u0627\\u0621 \\u0633\\u0637\\u0627\\u062a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(242, 'Region', 'created', 'App\\Models\\Region', 'created', 17, NULL, NULL, '{\"attributes\":{\"id\":17,\"nom\":\"Marrakech-Safi\",\"nom_arabe\":\"\\u0645\\u0631\\u0627\\u0643\\u0634 \\u0622\\u0633\\u0641\\u064a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(243, 'Region', 'created', 'App\\Models\\Region', 'created', 18, NULL, NULL, '{\"attributes\":{\"id\":18,\"nom\":\"Tanger-T\\u00e9touan-Al Hoce\\u00efma\",\"nom_arabe\":\"\\u0637\\u0646\\u062c\\u0629 \\u062a\\u0637\\u0648\\u0627\\u0646 \\u0627\\u0644\\u062d\\u0633\\u064a\\u0645\\u0629\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(244, 'Region', 'created', 'App\\Models\\Region', 'created', 19, NULL, NULL, '{\"attributes\":{\"id\":19,\"nom\":\"Oriental\",\"nom_arabe\":\"\\u0627\\u0644\\u0634\\u0631\\u0642\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(245, 'Region', 'created', 'App\\Models\\Region', 'created', 20, NULL, NULL, '{\"attributes\":{\"id\":20,\"nom\":\"Souss-Massa\",\"nom_arabe\":\"\\u0633\\u0648\\u0633 \\u0645\\u0627\\u0633\\u0629\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(246, 'Region', 'created', 'App\\Models\\Region', 'created', 21, NULL, NULL, '{\"attributes\":{\"id\":21,\"nom\":\"Dr\\u00e2a-Tafilalet\",\"nom_arabe\":\"\\u062f\\u0631\\u0639\\u0629 \\u062a\\u0627\\u0641\\u064a\\u0644\\u0627\\u0644\\u062a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(247, 'Region', 'created', 'App\\Models\\Region', 'created', 22, NULL, NULL, '{\"attributes\":{\"id\":22,\"nom\":\"B\\u00e9ni Mellal-Kh\\u00e9nifra\",\"nom_arabe\":\"\\u0628\\u0646\\u064a \\u0645\\u0644\\u0627\\u0644 \\u062e\\u0646\\u064a\\u0641\\u0631\\u0629\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(248, 'Region', 'created', 'App\\Models\\Region', 'created', 23, NULL, NULL, '{\"attributes\":{\"id\":23,\"nom\":\"Guelmim-Oued Noun\",\"nom_arabe\":\"\\u0643\\u0644\\u0645\\u064a\\u0645 \\u0648\\u0627\\u062f \\u0646\\u0648\\u0646\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(249, 'Region', 'created', 'App\\Models\\Region', 'created', 24, NULL, NULL, '{\"attributes\":{\"id\":24,\"nom\":\"La\\u00e2youne-Sakia El Hamra\",\"nom_arabe\":\"\\u0627\\u0644\\u0639\\u064a\\u0648\\u0646 \\u0627\\u0644\\u0633\\u0627\\u0642\\u064a\\u0629 \\u0627\\u0644\\u062d\\u0645\\u0631\\u0627\\u0621\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(250, 'Region', 'created', 'App\\Models\\Region', 'created', 25, NULL, NULL, '{\"attributes\":{\"id\":25,\"nom\":\"Dakhla-Oued Ed-Dahab\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0627\\u062e\\u0644\\u0629 \\u0648\\u0627\\u062f\\u064a \\u0627\\u0644\\u0630\\u0647\\u0628\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(251, 'Ville', 'created', 'App\\Models\\Ville', 'created', 63, NULL, NULL, '{\"attributes\":{\"id\":63,\"nom\":\"F\\u00e8s\",\"nom_arabe\":\"\\u0641\\u0627\\u0633\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(252, 'Ville', 'created', 'App\\Models\\Ville', 'created', 64, NULL, NULL, '{\"attributes\":{\"id\":64,\"nom\":\"Mekn\\u00e8s\",\"nom_arabe\":\"\\u0645\\u0643\\u0646\\u0627\\u0633\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(253, 'Ville', 'created', 'App\\Models\\Ville', 'created', 65, NULL, NULL, '{\"attributes\":{\"id\":65,\"nom\":\"Taza\",\"nom_arabe\":\"\\u062a\\u0627\\u0632\\u0629\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(254, 'Ville', 'created', 'App\\Models\\Ville', 'created', 66, NULL, NULL, '{\"attributes\":{\"id\":66,\"nom\":\"Sefrou\",\"nom_arabe\":\"\\u0635\\u0641\\u0631\\u0648\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(255, 'Ville', 'created', 'App\\Models\\Ville', 'created', 67, NULL, NULL, '{\"attributes\":{\"id\":67,\"nom\":\"El Hajeb\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0627\\u062c\\u0628\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(256, 'Ville', 'created', 'App\\Models\\Ville', 'created', 68, NULL, NULL, '{\"attributes\":{\"id\":68,\"nom\":\"Ifrane\",\"nom_arabe\":\"\\u0625\\u0641\\u0631\\u0627\\u0646\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(257, 'Ville', 'created', 'App\\Models\\Ville', 'created', 69, NULL, NULL, '{\"attributes\":{\"id\":69,\"nom\":\"Moulay Yacoub\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u0627\\u064a \\u064a\\u0639\\u0642\\u0648\\u0628\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(258, 'Ville', 'created', 'App\\Models\\Ville', 'created', 70, NULL, NULL, '{\"attributes\":{\"id\":70,\"nom\":\"Boulemane\",\"nom_arabe\":\"\\u0628\\u0648\\u0644\\u0645\\u0627\\u0646\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(259, 'Ville', 'created', 'App\\Models\\Ville', 'created', 71, NULL, NULL, '{\"attributes\":{\"id\":71,\"nom\":\"Taounate\",\"nom_arabe\":\"\\u062a\\u0627\\u0648\\u0646\\u0627\\u062a\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(260, 'Ville', 'created', 'App\\Models\\Ville', 'created', 72, NULL, NULL, '{\"attributes\":{\"id\":72,\"nom\":\"Kh\\u00e9nifra\",\"nom_arabe\":\"\\u062e\\u0646\\u064a\\u0641\\u0631\\u0629\",\"region_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(261, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 207, NULL, NULL, '{\"attributes\":{\"id\":207,\"nom\":\"Agdal\",\"nom_arabe\":\"\\u0623\\u0643\\u062f\\u0627\\u0644\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(262, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 208, NULL, NULL, '{\"attributes\":{\"id\":208,\"nom\":\"Saiss\",\"nom_arabe\":\"\\u0633\\u0627\\u064a\\u0633\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(263, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 209, NULL, NULL, '{\"attributes\":{\"id\":209,\"nom\":\"Zouagha\",\"nom_arabe\":\"\\u0632\\u0648\\u0627\\u063a\\u0629\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(264, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 210, NULL, NULL, '{\"attributes\":{\"id\":210,\"nom\":\"Jnan El Ward\",\"nom_arabe\":\"\\u062c\\u0646\\u0627\\u0646 \\u0627\\u0644\\u0648\\u0631\\u062f\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(265, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 211, NULL, NULL, '{\"attributes\":{\"id\":211,\"nom\":\"Marinides\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0631\\u064a\\u0646\\u064a\\u064a\\u0646\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(266, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 212, NULL, NULL, '{\"attributes\":{\"id\":212,\"nom\":\"M\\u00e9dina\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629\",\"ville_id\":1,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(267, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 213, NULL, NULL, '{\"attributes\":{\"id\":213,\"nom\":\"Hamria\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0645\\u0631\\u064a\\u0629\",\"ville_id\":2,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(268, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 214, NULL, NULL, '{\"attributes\":{\"id\":214,\"nom\":\"Toulal\",\"nom_arabe\":\"\\u062a\\u0648\\u0644\\u0627\\u0644\",\"ville_id\":2,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(269, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 215, NULL, NULL, '{\"attributes\":{\"id\":215,\"nom\":\"Zitoune\",\"nom_arabe\":\"\\u0627\\u0644\\u0632\\u064a\\u062a\\u0648\\u0646\",\"ville_id\":2,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(270, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 216, NULL, NULL, '{\"attributes\":{\"id\":216,\"nom\":\"Ouislane\",\"nom_arabe\":\"\\u0648\\u064a\\u0633\\u0644\\u0627\\u0646\",\"ville_id\":2,\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(271, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"nom\":\"Formation M\\u00e9dicale\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0627\\u0644\\u0637\\u0628\\u064a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(272, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"nom\":\"Formation Param\\u00e9dicale\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0634\\u0628\\u0647 \\u0627\\u0644\\u0637\\u0628\\u064a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(273, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"nom\":\"Formation Administrative\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u064a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(274, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"nom\":\"Formation Technique\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0627\\u0644\\u062a\\u0642\\u0646\\u064a\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(275, 'Categorie Formation', 'created', 'App\\Models\\CategorieFormation', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"nom\":\"Formation Sp\\u00e9cialis\\u00e9e\",\"nom_arabe\":\"\\u0627\\u0644\\u062a\\u0643\\u0648\\u064a\\u0646 \\u0627\\u0644\\u0645\\u062a\\u062e\\u0635\\u0635\",\"created_at\":\"2025-05-24T15:37:32.000000Z\",\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(276, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":6,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(277, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 2, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":6,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(278, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":6,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(279, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":6,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(280, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":6,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(281, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":6,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(282, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 7, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":6,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(283, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 8, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":6,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-24T15:38:03.000000Z\",\"updated_at\":\"2025-05-24T15:38:03.000000Z\"}}', NULL, '2025-05-24 14:38:03', '2025-05-24 14:38:03'),
(284, 'Grève', 'created', 'App\\Models\\Greve', 'created', 1, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":6,\"date_debut\":\"2025-05-16\",\"date_fin\":\"2025-05-23\",\"remarque\":\"-\",\"created_at\":\"2025-05-24T15:38:20.000000Z\",\"updated_at\":\"2025-05-24T15:38:20.000000Z\"}}', NULL, '2025-05-24 14:38:20', '2025-05-24 14:38:20'),
(285, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"ppr\":\"48283\",\"nom\":\"MESKINI\",\"nom_arabe\":\"\",\"prenom\":\"LAILA\",\"prenom_arabe\":\"\",\"cin\":\"C268338\",\"sexe\":\"F\",\"date_naissance\":\"1968-11-13\",\"date_embauche\":\"1995-07-03\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":11,\"remarques\":\"\",\"service_id\":30,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1995-07-03\",\"date_prise_en_service\":\"1995-07-03\",\"date_note\":\"1995-07-03\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T11:48:18.000000Z\",\"updated_at\":\"2025-05-27T11:48:18.000000Z\"}}', NULL, '2025-05-27 10:48:18', '2025-05-27 10:48:18'),
(286, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"nom\":\"centre universitaire Sais\",\"nom_arabe\":\"centre universitaire Sais\",\"niveau_categorie_formation_id\":5,\"arrondissement_commune_id\":1,\"created_at\":\"2025-05-27T11:50:13.000000Z\",\"updated_at\":\"2025-05-27T11:50:13.000000Z\"}}', NULL, '2025-05-27 10:50:13', '2025-05-27 10:50:13'),
(287, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"nom_formation_sanitaire_id\":12,\"remarques\":null,\"ref_note\":\"03071995\",\"updated_at\":\"2025-05-27T11:50:53.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"nom_formation_sanitaire_id\":11,\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T11:48:18.000000Z\"}}', NULL, '2025-05-27 10:50:53', '2025-05-27 10:50:53'),
(288, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":7,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(289, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":7,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(290, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":7,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(291, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":7,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(292, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":7,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(293, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"fonctionnaire_id\":7,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(294, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 15, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":15,\"fonctionnaire_id\":7,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(295, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 16, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":16,\"fonctionnaire_id\":7,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T11:51:35.000000Z\",\"updated_at\":\"2025-05-27T11:51:35.000000Z\"}}', NULL, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(296, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"nom\":\"M\\u00e9decin g\\u00e9neraliste\",\"nom_arabe\":\"M\\u00e9decin g\\u00e9neraliste\",\"grade_id\":11,\"created_at\":\"2025-05-27T11:53:08.000000Z\",\"updated_at\":\"2025-05-27T11:53:08.000000Z\"}}', NULL, '2025-05-27 10:53:08', '2025-05-27 10:53:08'),
(297, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"specialite_grade_id\":12,\"updated_at\":\"2025-05-27T11:53:20.000000Z\"},\"old\":{\"specialite_grade_id\":5,\"updated_at\":\"2025-05-27T11:50:53.000000Z\"}}', NULL, '2025-05-27 10:53:20', '2025-05-27 10:53:20'),
(298, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"nom\":\"interne hors mouvement\",\"nom_arabe\":\"\\u062f\\u0627\\u062e\\u0644\\u064a\\u0629 \\u062e\\u0627\\u0631\\u062c \\u062d\\u0631\\u0643\\u0629\",\"created_at\":\"2025-05-27T11:55:43.000000Z\",\"updated_at\":\"2025-05-27T11:55:43.000000Z\"}}', NULL, '2025-05-27 10:55:43', '2025-05-27 10:55:43'),
(299, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"nom\":\"Nargiss\",\"nom_arabe\":\"\\u0646\\u0631\\u062c\\u0633\",\"niveau_categorie_formation_id\":1,\"arrondissement_commune_id\":1,\"created_at\":\"2025-05-27T11:57:50.000000Z\",\"updated_at\":\"2025-05-27T11:57:50.000000Z\"}}', NULL, '2025-05-27 10:57:50', '2025-05-27 10:57:50'),
(301, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 15, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":15,\"fonctionnaire_id\":7,\"type_mutation_id\":4,\"date_mutation\":\"1995-07-03\",\"date_note\":\"1995-07-03\",\"ref_note\":\"03071995\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":12,\"remarque\":null,\"date_prise_en_service\":\"1995-07-03\",\"date_cessation_service\":null,\"ancien_service_id\":30,\"nouveau_service_id\":30,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:00:38.000000Z\",\"updated_at\":\"2025-05-27T12:00:38.000000Z\"}}', NULL, '2025-05-27 11:00:38', '2025-05-27 11:00:38'),
(302, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 16, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":16,\"fonctionnaire_id\":7,\"type_mutation_id\":4,\"date_mutation\":\"1995-07-03\",\"date_note\":\"2024-06-10\",\"ref_note\":\"3303\\/DMS\\/24\",\"fichiers_notes\":\"fichiers_notes\\/0NxeiWtHZ4e9ivy2MPASRWDJsSWYzVh4JF6kRiby.pdf\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":13,\"remarque\":null,\"date_prise_en_service\":\"2024-06-10\",\"date_cessation_service\":\"2024-06-10\",\"ancien_service_id\":30,\"nouveau_service_id\":30,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:00:38.000000Z\",\"updated_at\":\"2025-05-27T12:00:38.000000Z\"}}', NULL, '2025-05-27 11:00:38', '2025-05-27 11:00:38'),
(303, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":13,\"date_prise_en_service\":\"2024-06-10\",\"date_note\":\"2024-06-10\",\"fichier_note\":\"fichiers_notes\\/0NxeiWtHZ4e9ivy2MPASRWDJsSWYzVh4JF6kRiby.pdf\",\"ref_note\":\"3303\\/DMS\\/24\",\"updated_at\":\"2025-05-27T12:00:38.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":12,\"date_prise_en_service\":\"1995-07-03\",\"date_note\":\"1995-07-03\",\"fichier_note\":\"\",\"ref_note\":\"03071995\",\"updated_at\":\"2025-05-27T11:53:20.000000Z\"}}', NULL, '2025-05-27 11:00:38', '2025-05-27 11:00:38'),
(304, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 16, 'App\\Models\\User', 2, '{\"old\":{\"id\":16,\"fonctionnaire_id\":7,\"type_mutation_id\":4,\"date_mutation\":\"1995-07-03\",\"date_note\":\"2024-06-10\",\"ref_note\":\"3303\\/DMS\\/24\",\"fichiers_notes\":\"fichiers_notes\\/0NxeiWtHZ4e9ivy2MPASRWDJsSWYzVh4JF6kRiby.pdf\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":13,\"remarque\":null,\"date_prise_en_service\":\"2024-06-10\",\"date_cessation_service\":\"2024-06-10\",\"ancien_service_id\":30,\"nouveau_service_id\":30,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:00:38.000000Z\",\"updated_at\":\"2025-05-27T12:00:38.000000Z\"}}', NULL, '2025-05-27 11:01:56', '2025-05-27 11:01:56'),
(305, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"date_prise_en_service\":\"1995-07-03\",\"updated_at\":\"2025-05-27T12:02:48.000000Z\"},\"old\":{\"date_prise_en_service\":\"2024-06-10\",\"updated_at\":\"2025-05-27T12:00:38.000000Z\"}}', NULL, '2025-05-27 11:02:48', '2025-05-27 11:02:48'),
(306, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":12,\"updated_at\":\"2025-05-27T12:03:39.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":13,\"updated_at\":\"2025-05-27T12:02:48.000000Z\"}}', NULL, '2025-05-27 11:03:39', '2025-05-27 11:03:39'),
(307, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":17,\"fonctionnaire_id\":7,\"type_mutation_id\":12,\"date_mutation\":\"1995-07-03\",\"date_note\":\"2024-04-26\",\"ref_note\":\"SEF\",\"fichiers_notes\":\"fichiers_notes\\/Y12qYU0SdiYtfnUQuhV6QZjRpQYoAguU0DdPt7d8.pdf\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":13,\"remarque\":\"A\",\"date_prise_en_service\":\"2024-04-26\",\"date_cessation_service\":\"2024-04-25\",\"ancien_service_id\":30,\"nouveau_service_id\":26,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:08:38.000000Z\",\"updated_at\":\"2025-05-27T12:08:38.000000Z\"}}', NULL, '2025-05-27 11:08:38', '2025-05-27 11:08:38'),
(308, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":13,\"service_id\":26,\"type_mutation\":12,\"date_prise_en_service\":\"2024-04-26\",\"date_note\":\"2024-04-26\",\"fichier_note\":\"fichiers_notes\\/Y12qYU0SdiYtfnUQuhV6QZjRpQYoAguU0DdPt7d8.pdf\",\"ref_note\":\"SEF\",\"updated_at\":\"2025-05-27T12:08:38.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":12,\"service_id\":30,\"type_mutation\":4,\"date_prise_en_service\":\"1995-07-03\",\"date_note\":\"2024-06-10\",\"fichier_note\":\"fichiers_notes\\/0NxeiWtHZ4e9ivy2MPASRWDJsSWYzVh4JF6kRiby.pdf\",\"ref_note\":\"3303\\/DMS\\/24\",\"updated_at\":\"2025-05-27T12:03:39.000000Z\"}}', NULL, '2025-05-27 11:08:38', '2025-05-27 11:08:38'),
(309, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 17, 'App\\Models\\User', 2, '{\"old\":{\"id\":17,\"fonctionnaire_id\":7,\"type_mutation_id\":12,\"date_mutation\":\"1995-07-03\",\"date_note\":\"2024-04-26\",\"ref_note\":\"SEF\",\"fichiers_notes\":\"fichiers_notes\\/Y12qYU0SdiYtfnUQuhV6QZjRpQYoAguU0DdPt7d8.pdf\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":13,\"remarque\":\"A\",\"date_prise_en_service\":\"2024-04-26\",\"date_cessation_service\":\"2024-04-25\",\"ancien_service_id\":30,\"nouveau_service_id\":26,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:08:38.000000Z\",\"updated_at\":\"2025-05-27T12:08:38.000000Z\"}}', NULL, '2025-05-27 11:10:00', '2025-05-27 11:10:00'),
(310, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":12,\"type_mutation\":4,\"date_prise_en_service\":\"1995-07-03\",\"date_note\":\"1995-07-03\",\"updated_at\":\"2025-05-27T12:11:17.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":13,\"type_mutation\":12,\"date_prise_en_service\":\"2024-04-26\",\"date_note\":\"2024-04-26\",\"updated_at\":\"2025-05-27T12:08:38.000000Z\"}}', NULL, '2025-05-27 11:11:17', '2025-05-27 11:11:17'),
(311, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":18,\"fonctionnaire_id\":7,\"type_mutation_id\":12,\"date_mutation\":\"2024-06-04\",\"date_note\":\"2024-06-04\",\"ref_note\":\"ZERZER\",\"fichiers_notes\":\"fichiers_notes\\/NO3zAdwE7LblLP8LfF5iUmKOt4uyVIldtsEwLs4e.pdf\",\"formation_sanitaire_origine_id\":12,\"formation_sanitaire_destination_id\":13,\"remarque\":\"ZEA\",\"date_prise_en_service\":\"2024-06-04\",\"date_cessation_service\":\"2026-04-03\",\"ancien_service_id\":26,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-05-27T12:12:36.000000Z\",\"updated_at\":\"2025-05-27T12:12:36.000000Z\"}}', NULL, '2025-05-27 11:12:36', '2025-05-27 11:12:36'),
(312, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":13,\"service_id\":24,\"type_mutation\":12,\"date_mutation\":\"2024-06-04\",\"date_prise_en_service\":\"2024-06-04\",\"date_note\":\"2024-06-04\",\"fichier_note\":\"fichiers_notes\\/NO3zAdwE7LblLP8LfF5iUmKOt4uyVIldtsEwLs4e.pdf\",\"ref_note\":\"ZERZER\",\"updated_at\":\"2025-05-27T12:12:36.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":12,\"service_id\":26,\"type_mutation\":4,\"date_mutation\":\"1995-07-03\",\"date_prise_en_service\":\"1995-07-03\",\"date_note\":\"1995-07-03\",\"fichier_note\":\"fichiers_notes\\/Y12qYU0SdiYtfnUQuhV6QZjRpQYoAguU0DdPt7d8.pdf\",\"ref_note\":\"SEF\",\"updated_at\":\"2025-05-27T12:11:17.000000Z\"}}', NULL, '2025-05-27 11:12:36', '2025-05-27 11:12:36'),
(313, 'Service', 'created', 'App\\Models\\Service', 'created', 32, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":32,\"nom\":\"M\\u00e9decine g\\u00e9nerale\",\"nom_arabe\":\"M\\u00e9decine g\\u00e9nerale\",\"created_at\":\"2025-05-27T12:15:32.000000Z\",\"updated_at\":\"2025-05-27T12:15:32.000000Z\"}}', NULL, '2025-05-27 11:15:33', '2025-05-27 11:15:33'),
(314, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"ppr\":\"66870\",\"nom\":\"IDRISSI TAGHKI\",\"nom_arabe\":\"\",\"prenom\":\"ABDELHAI\",\"prenom_arabe\":\"\",\"cin\":\"C169545\",\"sexe\":\"M\",\"date_naissance\":\"1966-09-20\",\"date_embauche\":\"1994-08-01\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"FES\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":11,\"remarques\":\"ZER\",\"service_id\":24,\"specialite_grade_id\":12,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-07-03\",\"date_prise_en_service\":\"1994-07-04\",\"date_note\":\"1994-07-04\",\"fichier_note\":\"1748348225.pdf\",\"ref_note\":\"SRF\",\"created_at\":\"2025-05-27T12:17:05.000000Z\",\"updated_at\":\"2025-05-27T12:17:05.000000Z\"}}', NULL, '2025-05-27 11:17:05', '2025-05-27 11:17:05'),
(315, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"Deuxi\\u00e8me niveaux\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-05-27T12:18:10.000000Z\",\"updated_at\":\"2025-05-27T12:18:10.000000Z\"}}', NULL, '2025-05-27 11:18:10', '2025-05-27 11:18:10'),
(316, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"nom\":\"Massira 1\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0633\\u064a\\u0631\\u0629 1\",\"niveau_categorie_formation_id\":7,\"arrondissement_commune_id\":171,\"created_at\":\"2025-05-27T12:19:09.000000Z\",\"updated_at\":\"2025-05-27T12:19:09.000000Z\"}}', NULL, '2025-05-27 11:19:09', '2025-05-27 11:19:09'),
(317, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":9,\"ppr\":\"66870\",\"nom\":\"IDRISSI TAGHKI\",\"nom_arabe\":\"\",\"prenom\":\"ABDELHAI\",\"prenom_arabe\":\"\",\"cin\":\"C169545\",\"sexe\":\"M\",\"date_naissance\":\"1966-09-20\",\"date_embauche\":\"1994-08-01\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":24,\"specialite_grade_id\":12,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-08-01\",\"date_prise_en_service\":\"1994-08-01\",\"date_note\":\"1994-08-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T12:24:47.000000Z\",\"updated_at\":\"2025-05-27T12:24:47.000000Z\"}}', NULL, '2025-05-27 11:24:47', '2025-05-27 11:24:47'),
(318, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 9, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"nom_formation_sanitaire_id\":14,\"remarques\":null,\"ref_note\":\"01081994\",\"updated_at\":\"2025-05-27T12:25:21.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T12:24:47.000000Z\"}}', NULL, '2025-05-27 11:25:21', '2025-05-27 11:25:21'),
(319, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":17,\"fonctionnaire_id\":9,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(320, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":18,\"fonctionnaire_id\":9,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(321, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 19, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":19,\"fonctionnaire_id\":9,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(322, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 20, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":20,\"fonctionnaire_id\":9,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(323, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 21, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":21,\"fonctionnaire_id\":9,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(324, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 22, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":22,\"fonctionnaire_id\":9,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(325, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 23, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":23,\"fonctionnaire_id\":9,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(326, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 24, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":24,\"fonctionnaire_id\":9,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T12:25:32.000000Z\",\"updated_at\":\"2025-05-27T12:25:32.000000Z\"}}', NULL, '2025-05-27 11:25:32', '2025-05-27 11:25:32'),
(327, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"nom_formation_sanitaire_id\":14,\"updated_at\":\"2025-05-27T12:33:25.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"nom_formation_sanitaire_id\":11,\"updated_at\":\"2025-05-27T12:17:05.000000Z\"}}', NULL, '2025-05-27 11:33:25', '2025-05-27 11:33:25'),
(328, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":25,\"fonctionnaire_id\":8,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(329, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 26, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":26,\"fonctionnaire_id\":8,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(330, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 27, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":27,\"fonctionnaire_id\":8,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(331, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 28, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":28,\"fonctionnaire_id\":8,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(332, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 29, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":29,\"fonctionnaire_id\":8,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(333, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 30, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":30,\"fonctionnaire_id\":8,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(334, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 31, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":31,\"fonctionnaire_id\":8,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(335, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 32, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":32,\"fonctionnaire_id\":8,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T12:33:37.000000Z\",\"updated_at\":\"2025-05-27T12:33:37.000000Z\"}}', NULL, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(336, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 15, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":15,\"nom\":\"Centre r\\u00e9ference maladie chronique\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0645\\u0631\\u062c\\u0639\\u064a \\u0627\\u0644\\u0627\\u0645\\u0631\\u0627\\u0636 \\u0645\\u0632\\u0645\\u0646\\u0629\",\"niveau_categorie_formation_id\":5,\"arrondissement_commune_id\":171,\"created_at\":\"2025-05-27T12:37:53.000000Z\",\"updated_at\":\"2025-05-27T12:37:53.000000Z\"}}', NULL, '2025-05-27 11:37:53', '2025-05-27 11:37:53'),
(337, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":10,\"ppr\":\"74266\",\"nom\":\"ouennan\",\"nom_arabe\":\"\",\"prenom\":\"najiya\",\"prenom_arabe\":\"\",\"cin\":\"cb21738\",\"sexe\":\"M\",\"date_naissance\":\"1969-10-20\",\"date_embauche\":\"1994-08-02\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":9,\"nom_formation_sanitaire_id\":15,\"remarques\":\"EZE\",\"service_id\":24,\"specialite_grade_id\":9,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-08-02\",\"date_prise_en_service\":\"1994-08-02\",\"date_note\":\"1994-08-02\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T12:43:36.000000Z\",\"updated_at\":\"2025-05-27T12:43:36.000000Z\"}}', NULL, '2025-05-27 11:43:36', '2025-05-27 11:43:36'),
(338, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 33, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":33,\"fonctionnaire_id\":10,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(339, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 34, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":34,\"fonctionnaire_id\":10,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(340, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 35, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":35,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(341, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 36, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":36,\"fonctionnaire_id\":10,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(342, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 37, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":37,\"fonctionnaire_id\":10,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(343, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 38, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":38,\"fonctionnaire_id\":10,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(344, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 39, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":39,\"fonctionnaire_id\":10,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(345, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 40, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":40,\"fonctionnaire_id\":10,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T12:43:45.000000Z\",\"updated_at\":\"2025-05-27T12:43:45.000000Z\"}}', NULL, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(346, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 19, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":19,\"fonctionnaire_id\":10,\"type_mutation_id\":4,\"date_mutation\":\"1994-08-02\",\"date_note\":\"1994-08-02\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":15,\"formation_sanitaire_destination_id\":15,\"remarque\":null,\"date_prise_en_service\":\"1994-08-02\",\"date_cessation_service\":null,\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":9,\"nouveau_fonction_id\":9,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:45:39.000000Z\",\"updated_at\":\"2025-05-27T12:45:39.000000Z\"}}', NULL, '2025-05-27 11:45:39', '2025-05-27 11:45:39'),
(347, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 20, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":20,\"fonctionnaire_id\":10,\"type_mutation_id\":2,\"date_mutation\":\"2022-10-04\",\"date_note\":\"2022-10-04\",\"ref_note\":\"ZER\",\"fichiers_notes\":\"fichiers_notes\\/YZ5JT9RwF8QK2UYrHWszMwudo20fyR8C5FjPuZba.pdf\",\"formation_sanitaire_origine_id\":15,\"formation_sanitaire_destination_id\":9,\"remarque\":\"ZER\",\"date_prise_en_service\":\"2009-10-04\",\"date_cessation_service\":\"2009-10-04\",\"ancien_service_id\":24,\"nouveau_service_id\":25,\"ancien_fonction_id\":9,\"nouveau_fonction_id\":9,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:45:39.000000Z\",\"updated_at\":\"2025-05-27T12:45:39.000000Z\"}}', NULL, '2025-05-27 11:45:39', '2025-05-27 11:45:39'),
(348, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":9,\"service_id\":25,\"type_mutation\":2,\"date_mutation\":\"2022-10-04\",\"date_prise_en_service\":\"2009-10-04\",\"date_note\":\"2022-10-04\",\"fichier_note\":\"fichiers_notes\\/YZ5JT9RwF8QK2UYrHWszMwudo20fyR8C5FjPuZba.pdf\",\"ref_note\":\"ZER\",\"updated_at\":\"2025-05-27T12:45:39.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":15,\"service_id\":24,\"type_mutation\":4,\"date_mutation\":\"1994-08-02\",\"date_prise_en_service\":\"1994-08-02\",\"date_note\":\"1994-08-02\",\"fichier_note\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T12:43:36.000000Z\"}}', NULL, '2025-05-27 11:45:39', '2025-05-27 11:45:39'),
(349, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 20, 'App\\Models\\User', 2, '{\"old\":{\"id\":20,\"fonctionnaire_id\":10,\"type_mutation_id\":2,\"date_mutation\":\"2022-10-04\",\"date_note\":\"2022-10-04\",\"ref_note\":\"ZER\",\"fichiers_notes\":\"fichiers_notes\\/YZ5JT9RwF8QK2UYrHWszMwudo20fyR8C5FjPuZba.pdf\",\"formation_sanitaire_origine_id\":15,\"formation_sanitaire_destination_id\":9,\"remarque\":\"ZER\",\"date_prise_en_service\":\"2009-10-04\",\"date_cessation_service\":\"2009-10-04\",\"ancien_service_id\":24,\"nouveau_service_id\":25,\"ancien_fonction_id\":9,\"nouveau_fonction_id\":9,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:45:39.000000Z\",\"updated_at\":\"2025-05-27T12:45:39.000000Z\"}}', NULL, '2025-05-27 11:46:19', '2025-05-27 11:46:19'),
(350, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"nom_formation_sanitaire_id\":15,\"date_mutation\":\"1994-08-02\",\"date_prise_en_service\":\"1994-08-02\",\"date_note\":\"1994-08-02\",\"updated_at\":\"2025-05-27T12:48:31.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"nom_formation_sanitaire_id\":9,\"date_mutation\":\"2022-10-04\",\"date_prise_en_service\":\"2009-10-04\",\"date_note\":\"2022-10-04\",\"updated_at\":\"2025-05-27T12:45:39.000000Z\"}}', NULL, '2025-05-27 11:48:31', '2025-05-27 11:48:31'),
(351, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 21, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":21,\"fonctionnaire_id\":10,\"type_mutation_id\":2,\"date_mutation\":\"2009-10-04\",\"date_note\":\"2009-10-04\",\"ref_note\":\"AZE\",\"fichiers_notes\":\"fichiers_notes\\/pVB26qieyCJrXAxLiGx27n3y0BlqHguHkY4eTGdJ.pdf\",\"formation_sanitaire_origine_id\":15,\"formation_sanitaire_destination_id\":9,\"remarque\":null,\"date_prise_en_service\":\"2009-10-04\",\"date_cessation_service\":\"2009-10-04\",\"ancien_service_id\":25,\"nouveau_service_id\":25,\"ancien_fonction_id\":9,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:49:44.000000Z\",\"updated_at\":\"2025-05-27T12:49:44.000000Z\"}}', NULL, '2025-05-27 11:49:44', '2025-05-27 11:49:44'),
(352, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":9,\"date_mutation\":\"2009-10-04\",\"date_prise_en_service\":\"2009-10-04\",\"date_note\":\"2009-10-04\",\"fichier_note\":\"fichiers_notes\\/pVB26qieyCJrXAxLiGx27n3y0BlqHguHkY4eTGdJ.pdf\",\"ref_note\":\"AZE\",\"updated_at\":\"2025-05-27T12:49:44.000000Z\"},\"old\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":15,\"date_mutation\":\"1994-08-02\",\"date_prise_en_service\":\"1994-08-02\",\"date_note\":\"1994-08-02\",\"fichier_note\":\"fichiers_notes\\/YZ5JT9RwF8QK2UYrHWszMwudo20fyR8C5FjPuZba.pdf\",\"ref_note\":\"ZER\",\"updated_at\":\"2025-05-27T12:48:31.000000Z\"}}', NULL, '2025-05-27 11:49:44', '2025-05-27 11:49:44'),
(353, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 22, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":22,\"fonctionnaire_id\":10,\"type_mutation_id\":11,\"date_mutation\":\"2022-09-12\",\"date_note\":\"2022-09-12\",\"ref_note\":\"AZEA\",\"fichiers_notes\":\"fichiers_notes\\/ArVLMdrlJkoShJHUh6mZa0dmEHnQn1MOtyBxzxnk.pdf\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":6,\"remarque\":\"QZ\",\"date_prise_en_service\":\"2022-09-12\",\"date_cessation_service\":\"2022-09-12\",\"ancien_service_id\":25,\"nouveau_service_id\":28,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:51:08.000000Z\",\"updated_at\":\"2025-05-27T12:51:08.000000Z\"}}', NULL, '2025-05-27 11:51:08', '2025-05-27 11:51:08'),
(354, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":6,\"service_id\":28,\"type_mutation\":11,\"date_mutation\":\"2022-09-12\",\"date_prise_en_service\":\"2022-09-12\",\"date_note\":\"2022-09-12\",\"fichier_note\":\"fichiers_notes\\/ArVLMdrlJkoShJHUh6mZa0dmEHnQn1MOtyBxzxnk.pdf\",\"ref_note\":\"AZEA\",\"updated_at\":\"2025-05-27T12:51:08.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":9,\"service_id\":25,\"type_mutation\":2,\"date_mutation\":\"2009-10-04\",\"date_prise_en_service\":\"2009-10-04\",\"date_note\":\"2009-10-04\",\"fichier_note\":\"fichiers_notes\\/pVB26qieyCJrXAxLiGx27n3y0BlqHguHkY4eTGdJ.pdf\",\"ref_note\":\"AZE\",\"updated_at\":\"2025-05-27T12:49:44.000000Z\"}}', NULL, '2025-05-27 11:51:08', '2025-05-27 11:51:08'),
(355, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 16, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":16,\"nom\":\"CMP BENSOUDA\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0637\\u0628\\u064a \\u0644\\u0644\\u0642\\u0631\\u0628 \\u0628\\u0646\\u0633\\u0648\\u062f\\u0629\",\"niveau_categorie_formation_id\":3,\"arrondissement_commune_id\":171,\"created_at\":\"2025-05-27T12:52:24.000000Z\",\"updated_at\":\"2025-05-27T12:52:24.000000Z\"}}', NULL, '2025-05-27 11:52:24', '2025-05-27 11:52:24'),
(356, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 22, 'App\\Models\\User', 2, '{\"old\":{\"id\":22,\"fonctionnaire_id\":10,\"type_mutation_id\":11,\"date_mutation\":\"2022-09-12\",\"date_note\":\"2022-09-12\",\"ref_note\":\"AZEA\",\"fichiers_notes\":\"fichiers_notes\\/ArVLMdrlJkoShJHUh6mZa0dmEHnQn1MOtyBxzxnk.pdf\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":6,\"remarque\":\"QZ\",\"date_prise_en_service\":\"2022-09-12\",\"date_cessation_service\":\"2022-09-12\",\"ancien_service_id\":25,\"nouveau_service_id\":28,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":9,\"created_at\":\"2025-05-27T12:51:08.000000Z\",\"updated_at\":\"2025-05-27T12:51:08.000000Z\"}}', NULL, '2025-05-27 11:53:07', '2025-05-27 11:53:07'),
(357, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 23, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":23,\"fonctionnaire_id\":10,\"type_mutation_id\":11,\"date_mutation\":\"2022-08-29\",\"date_note\":\"2022-08-29\",\"ref_note\":\"SFE\",\"fichiers_notes\":\"fichiers_notes\\/VX3iI7ZmNHfxdzEjLvPD9rs8B1daboqnE19P5Wra.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":8,\"remarque\":\"AZEA\",\"date_prise_en_service\":\"2022-08-29\",\"date_cessation_service\":\"2022-08-29\",\"ancien_service_id\":28,\"nouveau_service_id\":29,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":10,\"created_at\":\"2025-05-27T12:56:51.000000Z\",\"updated_at\":\"2025-05-27T12:56:51.000000Z\"}}', NULL, '2025-05-27 11:56:51', '2025-05-27 11:56:51'),
(358, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":8,\"service_id\":29,\"specialite_grade_id\":10,\"date_mutation\":\"2022-08-29\",\"date_prise_en_service\":\"2022-08-29\",\"date_note\":\"2022-08-29\",\"fichier_note\":\"fichiers_notes\\/VX3iI7ZmNHfxdzEjLvPD9rs8B1daboqnE19P5Wra.pdf\",\"ref_note\":\"SFE\",\"updated_at\":\"2025-05-27T12:56:51.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":6,\"service_id\":28,\"specialite_grade_id\":9,\"date_mutation\":\"2022-09-12\",\"date_prise_en_service\":\"2022-09-12\",\"date_note\":\"2022-09-12\",\"fichier_note\":\"fichiers_notes\\/ArVLMdrlJkoShJHUh6mZa0dmEHnQn1MOtyBxzxnk.pdf\",\"ref_note\":\"AZEA\",\"updated_at\":\"2025-05-27T12:51:08.000000Z\"}}', NULL, '2025-05-27 11:56:51', '2025-05-27 11:56:51'),
(359, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":11,\"ppr\":\"370531\",\"nom\":\"EL YOUSSEFI\",\"nom_arabe\":\"\",\"prenom\":\"ABDERRAHMANE\",\"prenom_arabe\":\"\",\"cin\":\"C165681\",\"sexe\":\"M\",\"date_naissance\":\"1955-01-01\",\"date_embauche\":\"1989-10-23\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":22,\"nom_formation_sanitaire_id\":9,\"remarques\":\"\",\"service_id\":28,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1989-10-23\",\"date_prise_en_service\":\"1989-10-23\",\"date_note\":\"1989-10-23\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T13:03:06.000000Z\",\"updated_at\":\"2025-05-27T13:03:06.000000Z\"}}', NULL, '2025-05-27 12:03:06', '2025-05-27 12:03:06'),
(360, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 41, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":41,\"fonctionnaire_id\":11,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T13:03:26.000000Z\",\"updated_at\":\"2025-05-27T13:03:26.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(361, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 42, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":42,\"fonctionnaire_id\":11,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(362, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 43, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":43,\"fonctionnaire_id\":11,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(363, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 44, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":44,\"fonctionnaire_id\":11,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(364, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 45, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":45,\"fonctionnaire_id\":11,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(365, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 46, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":46,\"fonctionnaire_id\":11,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(366, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 47, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":47,\"fonctionnaire_id\":11,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(367, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 48, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":48,\"fonctionnaire_id\":11,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T13:03:27.000000Z\",\"updated_at\":\"2025-05-27T13:03:27.000000Z\"}}', NULL, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(368, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 24, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":24,\"fonctionnaire_id\":11,\"type_mutation_id\":4,\"date_mutation\":\"1989-10-23\",\"date_note\":\"1989-10-23\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":9,\"remarque\":null,\"date_prise_en_service\":\"1989-10-23\",\"date_cessation_service\":null,\"ancien_service_id\":28,\"nouveau_service_id\":28,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-05-27T13:05:16.000000Z\",\"updated_at\":\"2025-05-27T13:05:16.000000Z\"}}', NULL, '2025-05-27 12:05:16', '2025-05-27 12:05:16'),
(369, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":25,\"fonctionnaire_id\":11,\"type_mutation_id\":2,\"date_mutation\":\"2010-10-24\",\"date_note\":\"2010-10-24\",\"ref_note\":\"AZE\",\"fichiers_notes\":\"fichiers_notes\\/uWXbpZlSSaSS4Ft89WI9yPuiH3c0xfdL44KWKjI3.pdf\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":7,\"remarque\":null,\"date_prise_en_service\":\"2010-02-24\",\"date_cessation_service\":\"2010-02-24\",\"ancien_service_id\":28,\"nouveau_service_id\":29,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-05-27T13:05:16.000000Z\",\"updated_at\":\"2025-05-27T13:05:16.000000Z\"}}', NULL, '2025-05-27 12:05:16', '2025-05-27 12:05:16'),
(370, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":7,\"service_id\":29,\"type_mutation\":2,\"date_mutation\":\"2010-10-24\",\"date_prise_en_service\":\"2010-02-24\",\"date_note\":\"2010-10-24\",\"fichier_note\":\"fichiers_notes\\/uWXbpZlSSaSS4Ft89WI9yPuiH3c0xfdL44KWKjI3.pdf\",\"ref_note\":\"AZE\",\"updated_at\":\"2025-05-27T13:05:16.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":9,\"service_id\":28,\"type_mutation\":4,\"date_mutation\":\"1989-10-23\",\"date_prise_en_service\":\"1989-10-23\",\"date_note\":\"1989-10-23\",\"fichier_note\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T13:03:06.000000Z\"}}', NULL, '2025-05-27 12:05:16', '2025-05-27 12:05:16'),
(371, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":17,\"nom\":\"CENTRE REFERENCE MALADIE CHRONIQUE\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0645\\u0631\\u062c\\u0639\\u064a \\u0644\\u0644\\u0627\\u0645\\u0631\\u0627\\u0636 \\u0627\\u0644\\u0645\\u0632\\u0645\\u0646\\u0629 \\u0632\\u0648\\u0627\\u063a\\u0629\",\"niveau_categorie_formation_id\":1,\"arrondissement_commune_id\":171,\"created_at\":\"2025-05-27T13:11:33.000000Z\",\"updated_at\":\"2025-05-27T13:11:33.000000Z\"}}', NULL, '2025-05-27 12:11:33', '2025-05-27 12:11:33'),
(372, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 23, 'App\\Models\\User', 2, '{\"old\":{\"id\":23,\"fonctionnaire_id\":10,\"type_mutation_id\":11,\"date_mutation\":\"2022-08-29\",\"date_note\":\"2022-08-29\",\"ref_note\":\"SFE\",\"fichiers_notes\":\"fichiers_notes\\/VX3iI7ZmNHfxdzEjLvPD9rs8B1daboqnE19P5Wra.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":8,\"remarque\":\"AZEA\",\"date_prise_en_service\":\"2022-08-29\",\"date_cessation_service\":\"2022-08-29\",\"ancien_service_id\":28,\"nouveau_service_id\":29,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":10,\"created_at\":\"2025-05-27T12:56:51.000000Z\",\"updated_at\":\"2025-05-27T12:56:51.000000Z\"}}', NULL, '2025-05-27 12:12:37', '2025-05-27 12:12:37'),
(373, 'Nom Formation Sanitaire', 'updated', 'App\\Models\\NomFormationSanitaire', 'updated', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"nom\":\"CENTRE REFERENCE MALADIE CHRONIQUE ZOUGHA\",\"updated_at\":\"2025-05-27T13:14:27.000000Z\"},\"old\":{\"nom\":\"CENTRE REFERENCE MALADIE CHRONIQUE\",\"updated_at\":\"2025-05-27T13:11:33.000000Z\"}}', NULL, '2025-05-27 12:14:27', '2025-05-27 12:14:27'),
(374, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 26, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":26,\"fonctionnaire_id\":11,\"type_mutation_id\":2,\"date_mutation\":\"2010-10-21\",\"date_note\":\"2020-10-21\",\"ref_note\":\"AZE\",\"fichiers_notes\":\"fichiers_notes\\/yVY66vXvYlIqP5VMc1ZFXxOBkC4hU7BzdtKqLg3I.pdf\",\"formation_sanitaire_origine_id\":7,\"formation_sanitaire_destination_id\":17,\"remarque\":\"AZE\",\"date_prise_en_service\":\"2010-10-20\",\"date_cessation_service\":\"2010-10-20\",\"ancien_service_id\":29,\"nouveau_service_id\":29,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":6,\"created_at\":\"2025-05-27T13:15:57.000000Z\",\"updated_at\":\"2025-05-27T13:15:57.000000Z\"}}', NULL, '2025-05-27 12:15:57', '2025-05-27 12:15:57'),
(375, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_formation_sanitaire_id\":17,\"specialite_grade_id\":6,\"date_mutation\":\"2010-10-21\",\"date_prise_en_service\":\"2010-10-20\",\"date_note\":\"2020-10-21\",\"fichier_note\":\"fichiers_notes\\/yVY66vXvYlIqP5VMc1ZFXxOBkC4hU7BzdtKqLg3I.pdf\",\"updated_at\":\"2025-05-27T13:15:57.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":7,\"specialite_grade_id\":7,\"date_mutation\":\"2010-10-24\",\"date_prise_en_service\":\"2010-02-24\",\"date_note\":\"2010-10-24\",\"fichier_note\":\"fichiers_notes\\/uWXbpZlSSaSS4Ft89WI9yPuiH3c0xfdL44KWKjI3.pdf\",\"updated_at\":\"2025-05-27T13:05:16.000000Z\"}}', NULL, '2025-05-27 12:15:57', '2025-05-27 12:15:57'),
(376, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"remarques\":null,\"specialite_grade_id\":7,\"updated_at\":\"2025-05-27T13:17:56.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"remarques\":\"\",\"specialite_grade_id\":6,\"updated_at\":\"2025-05-27T13:15:57.000000Z\"}}', NULL, '2025-05-27 12:17:56', '2025-05-27 12:17:56'),
(377, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":11,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2015-01-01T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"60.0\",\"annees_service\":\"25.2\",\"motif\":null,\"statut\":\"propose\",\"remarques\":null,\"created_by\":2,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-05-27T13:26:13.000000Z\",\"updated_at\":\"2025-05-27T13:26:13.000000Z\"}}', NULL, '2025-05-27 12:26:13', '2025-05-27 12:26:13'),
(378, 'default', 'Dossier de retraite créé', 'App\\Models\\Retraite', NULL, 1, 'App\\Models\\User', 2, '{\"fonctionnaire\":\"EL YOUSSEFI ABDERRAHMANE\",\"type\":\"limite_age\"}', NULL, '2025-05-27 12:26:13', '2025-05-27 12:26:13'),
(379, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 7, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":7,\"nom\":\"d\\u00e9legation Fes\",\"nom_arabe\":\"\\u0645\\u0646\\u062f\\u0648\\u0628\\u064a\\u0629 \\u0641\\u0627\\u0633\",\"categorie_formation_id\":3,\"created_at\":\"2025-05-27T13:31:50.000000Z\",\"updated_at\":\"2025-05-27T13:31:50.000000Z\"}}', NULL, '2025-05-27 12:31:50', '2025-05-27 12:31:50'),
(380, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":8,\"nom\":\"provinciale\",\"nom_arabe\":\"\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a\\u0629\",\"type_categorie_formation_id\":7,\"created_at\":\"2025-05-27T13:32:23.000000Z\",\"updated_at\":\"2025-05-27T13:32:23.000000Z\"}}', NULL, '2025-05-27 12:32:23', '2025-05-27 12:32:23'),
(381, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":18,\"nom\":\"Delegation sante et protection sociale Fes\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0646\\u062f\\u0648\\u0628\\u064a\\u0629 \\u0627\\u0644\\u0627\\u0642\\u0644\\u064a\\u0645\\u064a\\u0629 \\u0644\\u0635\\u062d\\u0629 \\u0641\\u0627\\u0633\",\"niveau_categorie_formation_id\":8,\"arrondissement_commune_id\":173,\"created_at\":\"2025-05-27T13:33:24.000000Z\",\"updated_at\":\"2025-05-27T13:33:24.000000Z\"}}', NULL, '2025-05-27 12:33:24', '2025-05-27 12:33:24'),
(382, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":12,\"ppr\":\"1660747\",\"nom\":\"kaddouri\",\"nom_arabe\":\"\",\"prenom\":\"mohammed\",\"prenom_arabe\":\"\",\"cin\":\"Cd231259\",\"sexe\":\"M\",\"date_naissance\":\"1989-02-19\",\"date_embauche\":\"2011-12-14\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":22,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":29,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2011-12-14\",\"date_prise_en_service\":\"2011-12-14\",\"date_note\":\"2011-12-14\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T13:34:47.000000Z\",\"updated_at\":\"2025-05-27T13:34:47.000000Z\"}}', NULL, '2025-05-27 12:34:47', '2025-05-27 12:34:47'),
(383, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"nom_formation_sanitaire_id\":18,\"remarques\":null,\"ref_note\":\"D\",\"updated_at\":\"2025-05-27T13:35:07.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T13:34:47.000000Z\"}}', NULL, '2025-05-27 12:35:07', '2025-05-27 12:35:07'),
(384, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 49, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":49,\"fonctionnaire_id\":12,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(385, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 50, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":50,\"fonctionnaire_id\":12,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(386, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 51, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":51,\"fonctionnaire_id\":12,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(387, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 52, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":52,\"fonctionnaire_id\":12,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(388, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 53, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":53,\"fonctionnaire_id\":12,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(389, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 54, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":54,\"fonctionnaire_id\":12,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(390, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 55, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":55,\"fonctionnaire_id\":12,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(391, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 56, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":56,\"fonctionnaire_id\":12,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T13:37:12.000000Z\",\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(392, 'Grève', 'created', 'App\\Models\\Greve', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":12,\"date_debut\":\"2025-01-01\",\"date_fin\":\"2025-01-05\",\"remarque\":null,\"created_at\":\"2025-05-27T13:38:18.000000Z\",\"updated_at\":\"2025-05-27T13:38:18.000000Z\"}}', NULL, '2025-05-27 12:38:18', '2025-05-27 12:38:18'),
(393, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":2,\"observation\":null,\"url\":null,\"type_certificate_id\":1,\"fonctionnaire_id\":12,\"jours\":5,\"date_depot\":\"2025-05-20\",\"date_debut\":\"2025-05-25\",\"created_at\":\"2025-05-27T13:39:08.000000Z\",\"updated_at\":\"2025-05-27T13:39:08.000000Z\"}}', NULL, '2025-05-27 12:39:08', '2025-05-27 12:39:08'),
(394, 'Ville', 'created', 'App\\Models\\Ville', 'created', 73, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":73,\"nom\":\"MEKNES\",\"nom_arabe\":\"MEKNES\",\"region_id\":3,\"created_at\":\"2025-05-27T13:45:46.000000Z\",\"updated_at\":\"2025-05-27T13:45:46.000000Z\"}}', NULL, '2025-05-27 12:45:46', '2025-05-27 12:45:46'),
(395, 'Les arrondissements et les communes', 'created', 'App\\Models\\ArrondissementCommune', 'created', 217, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":217,\"nom\":\"LAHMRYA\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u0645\\u0631\\u064a\\u0629\",\"ville_id\":14,\"created_at\":\"2025-05-27T13:47:36.000000Z\",\"updated_at\":\"2025-05-27T13:47:36.000000Z\"}}', NULL, '2025-05-27 12:47:36', '2025-05-27 12:47:36'),
(396, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 19, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":19,\"nom\":\"HOPITAL PAGNION\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0634\\u0641\\u0649 \\u0628\\u0627\\u0646\\u064a\\u0648\\u0646\",\"niveau_categorie_formation_id\":3,\"arrondissement_commune_id\":213,\"created_at\":\"2025-05-27T13:48:31.000000Z\",\"updated_at\":\"2025-05-27T13:48:31.000000Z\"}}', NULL, '2025-05-27 12:48:31', '2025-05-27 12:48:31'),
(397, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 27, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":27,\"fonctionnaire_id\":12,\"type_mutation_id\":4,\"date_mutation\":\"2011-12-14\",\"date_note\":\"2011-12-14\",\"ref_note\":\"D\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":18,\"remarque\":null,\"date_prise_en_service\":\"2011-12-14\",\"date_cessation_service\":null,\"ancien_service_id\":29,\"nouveau_service_id\":29,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-05-27T13:51:36.000000Z\",\"updated_at\":\"2025-05-27T13:51:36.000000Z\"}}', NULL, '2025-05-27 12:51:36', '2025-05-27 12:51:36'),
(398, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 28, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":28,\"fonctionnaire_id\":12,\"type_mutation_id\":5,\"date_mutation\":\"2024-12-31\",\"date_note\":\"2024-12-31\",\"ref_note\":\"AAAZE\",\"fichiers_notes\":\"fichiers_notes\\/9gDFKilxq67KHRTXlLieMeoA8K8KPCRabCjLWCDp.pdf\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":19,\"remarque\":\"DAZ\",\"date_prise_en_service\":\"2024-12-31\",\"date_cessation_service\":\"2024-12-31\",\"ancien_service_id\":29,\"nouveau_service_id\":29,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":19,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-05-27T13:51:36.000000Z\",\"updated_at\":\"2025-05-27T13:51:36.000000Z\"}}', NULL, '2025-05-27 12:51:36', '2025-05-27 12:51:36'),
(399, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 12, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":19,\"nom_formation_sanitaire_id\":19,\"type_mutation\":5,\"date_mutation\":\"2024-12-31\",\"date_prise_en_service\":\"2024-12-31\",\"date_note\":\"2024-12-31\",\"fichier_note\":\"fichiers_notes\\/9gDFKilxq67KHRTXlLieMeoA8K8KPCRabCjLWCDp.pdf\",\"ref_note\":\"AAAZE\",\"updated_at\":\"2025-05-27T13:51:36.000000Z\"},\"old\":{\"fonction_id\":22,\"nom_formation_sanitaire_id\":18,\"type_mutation\":4,\"date_mutation\":\"2011-12-14\",\"date_prise_en_service\":\"2011-12-14\",\"date_note\":\"2011-12-14\",\"fichier_note\":\"\",\"ref_note\":\"D\",\"updated_at\":\"2025-05-27T13:35:07.000000Z\"}}', NULL, '2025-05-27 12:51:36', '2025-05-27 12:51:36'),
(400, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 3, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":8,\"ancien_position_id\":2,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-05-01\",\"date_prise_en_service\":\"2025-05-01\",\"remarque\":\"SS\",\"date_note\":\"2025-05-01\",\"ref_note\":null,\"fichiers_notes\":\"fichiers_notes\\/BkRnieaycg175q53a1nA8q1MosgRgXP3Vk62mXmc.pdf\",\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-05-27T14:24:26.000000Z\",\"updated_at\":\"2025-05-27T14:24:26.000000Z\"}}', NULL, '2025-05-27 13:24:26', '2025-05-27 13:24:26'),
(401, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 8, 'App\\Models\\User', 2, '{\"attributes\":{\"position_id\":5,\"updated_at\":\"2025-05-27T14:24:26.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-05-27T12:33:25.000000Z\"}}', NULL, '2025-05-27 13:24:26', '2025-05-27 13:24:26'),
(402, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"ppr\":\"81771\",\"nom\":\"OULE SIFA\",\"nom_arabe\":\"\",\"prenom\":\"HASSAN\",\"prenom_arabe\":\"\",\"cin\":\"C614594\",\"sexe\":\"M\",\"date_naissance\":\"1970-02-05\",\"date_embauche\":\"1994-11-01\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":18,\"remarques\":\"\",\"service_id\":27,\"specialite_grade_id\":8,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-11-01\",\"date_prise_en_service\":\"1994-11-01\",\"date_note\":\"1994-11-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T14:35:26.000000Z\",\"updated_at\":\"2025-05-27T14:35:26.000000Z\"}}', NULL, '2025-05-27 13:35:26', '2025-05-27 13:35:26'),
(403, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":18,\"nom\":\"ADJOINT TECHNIQE\",\"nom_arabe\":\"ADJOINT TECHNIQE\",\"categorie_cadre_id\":1,\"created_at\":\"2025-05-27T14:36:52.000000Z\",\"updated_at\":\"2025-05-27T14:36:52.000000Z\"}}', NULL, '2025-05-27 13:36:52', '2025-05-27 13:36:52'),
(404, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 16, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":16,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"deuxieme grade\",\"cadre_id\":18,\"created_at\":\"2025-05-27T14:37:29.000000Z\",\"updated_at\":\"2025-05-27T14:37:29.000000Z\"}}', NULL, '2025-05-27 13:37:29', '2025-05-27 13:37:29'),
(405, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":13,\"nom\":\"CHAUFFEUR\",\"nom_arabe\":\"CHAUFFEUR\",\"grade_id\":16,\"created_at\":\"2025-05-27T14:37:52.000000Z\",\"updated_at\":\"2025-05-27T14:37:52.000000Z\"}}', NULL, '2025-05-27 13:37:52', '2025-05-27 13:37:52'),
(406, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"remarques\":null,\"service_id\":28,\"specialite_grade_id\":13,\"ref_note\":\"D\",\"updated_at\":\"2025-05-27T14:38:28.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"remarques\":\"\",\"service_id\":27,\"specialite_grade_id\":8,\"ref_note\":\"\",\"updated_at\":\"2025-05-27T14:35:26.000000Z\"}}', NULL, '2025-05-27 13:38:28', '2025-05-27 13:38:28'),
(407, 'Service', 'created', 'App\\Models\\Service', 'created', 33, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":33,\"nom\":\"PARC AUTO DELEGATION SANTE FES\",\"nom_arabe\":\"PARC AUTO DELEGATION SANTE FES\",\"created_at\":\"2025-05-27T14:38:51.000000Z\",\"updated_at\":\"2025-05-27T14:38:51.000000Z\"}}', NULL, '2025-05-27 13:38:51', '2025-05-27 13:38:51'),
(408, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 57, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":57,\"fonctionnaire_id\":13,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(409, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 58, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":58,\"fonctionnaire_id\":13,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(410, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 59, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":59,\"fonctionnaire_id\":13,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(411, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 60, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":60,\"fonctionnaire_id\":13,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(412, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 61, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":61,\"fonctionnaire_id\":13,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(413, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 62, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":62,\"fonctionnaire_id\":13,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(414, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 63, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":63,\"fonctionnaire_id\":13,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(415, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 64, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":64,\"fonctionnaire_id\":13,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-05-27T14:39:08.000000Z\",\"updated_at\":\"2025-05-27T14:39:08.000000Z\"}}', NULL, '2025-05-27 13:39:08', '2025-05-27 13:39:08'),
(416, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 29, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":29,\"fonctionnaire_id\":13,\"type_mutation_id\":4,\"date_mutation\":\"1994-11-01\",\"date_note\":\"1994-11-01\",\"ref_note\":\"D\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":18,\"remarque\":null,\"date_prise_en_service\":\"1994-11-01\",\"date_cessation_service\":null,\"ancien_service_id\":28,\"nouveau_service_id\":28,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":13,\"nouveau_specialite_id\":13,\"created_at\":\"2025-05-27T14:40:57.000000Z\",\"updated_at\":\"2025-05-27T14:40:57.000000Z\"}}', NULL, '2025-05-27 13:40:57', '2025-05-27 13:40:57'),
(417, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 30, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":30,\"fonctionnaire_id\":13,\"type_mutation_id\":12,\"date_mutation\":\"2024-11-01\",\"date_note\":\"2024-11-01\",\"ref_note\":\"DE\",\"fichiers_notes\":\"fichiers_notes\\/VEIOgnrpz8wfX5hydxjfIVZq6LRUJC4xQH0zLGvw.pdf\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2024-11-01\",\"date_cessation_service\":\"2024-11-01\",\"ancien_service_id\":28,\"nouveau_service_id\":33,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":19,\"ancien_specialite_id\":13,\"nouveau_specialite_id\":13,\"created_at\":\"2025-05-27T14:40:57.000000Z\",\"updated_at\":\"2025-05-27T14:40:57.000000Z\"}}', NULL, '2025-05-27 13:40:57', '2025-05-27 13:40:57'),
(418, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 13, 'App\\Models\\User', 2, '{\"attributes\":{\"fonction_id\":19,\"nom_formation_sanitaire_id\":6,\"service_id\":33,\"type_mutation\":12,\"date_mutation\":\"2024-11-01\",\"date_prise_en_service\":\"2024-11-01\",\"date_note\":\"2024-11-01\",\"fichier_note\":\"fichiers_notes\\/VEIOgnrpz8wfX5hydxjfIVZq6LRUJC4xQH0zLGvw.pdf\",\"ref_note\":\"DE\",\"updated_at\":\"2025-05-27T14:40:57.000000Z\"},\"old\":{\"fonction_id\":17,\"nom_formation_sanitaire_id\":18,\"service_id\":28,\"type_mutation\":4,\"date_mutation\":\"1994-11-01\",\"date_prise_en_service\":\"1994-11-01\",\"date_note\":\"1994-11-01\",\"fichier_note\":\"\",\"ref_note\":\"D\",\"updated_at\":\"2025-05-27T14:38:28.000000Z\"}}', NULL, '2025-05-27 13:40:57', '2025-05-27 13:40:57'),
(419, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":17,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"deuxieme grade\",\"cadre_id\":13,\"created_at\":\"2025-05-27T14:44:59.000000Z\",\"updated_at\":\"2025-05-27T14:44:59.000000Z\"}}', NULL, '2025-05-27 13:44:59', '2025-05-27 13:44:59'),
(420, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"nom\":\"chauffeur\",\"nom_arabe\":\"chauffeur\",\"grade_id\":17,\"created_at\":\"2025-05-27T14:45:35.000000Z\",\"updated_at\":\"2025-05-27T14:45:35.000000Z\"}}', NULL, '2025-05-27 13:45:35', '2025-05-27 13:45:35'),
(421, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 14, 'App\\Models\\User', 2, '{\"attributes\":{\"id\":14,\"ppr\":\"QSq\",\"nom\":\"QSqs\",\"nom_arabe\":\"\",\"prenom\":\"QSqs\",\"prenom_arabe\":\"\",\"cin\":\"QSqs\",\"sexe\":\"M\",\"date_naissance\":\"2970-01-01\",\"date_embauche\":\"2011-01-01\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":33,\"specialite_grade_id\":14,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2011-01-01\",\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-05-27T14:46:32.000000Z\",\"updated_at\":\"2025-05-27T14:46:32.000000Z\"}}', NULL, '2025-05-27 13:46:32', '2025-05-27 13:46:32'),
(422, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 65, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":65,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(423, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 66, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":66,\"fonctionnaire_id\":14,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(424, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 67, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":67,\"fonctionnaire_id\":14,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(425, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 68, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":68,\"fonctionnaire_id\":14,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(426, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 69, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":69,\"fonctionnaire_id\":14,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(427, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 70, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":70,\"fonctionnaire_id\":14,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(428, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 71, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":71,\"fonctionnaire_id\":14,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(429, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 72, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":72,\"fonctionnaire_id\":14,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-01T16:46:43.000000Z\",\"updated_at\":\"2025-06-01T16:46:43.000000Z\"}}', NULL, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(430, 'HistoriqueMutation', 'updated', 'App\\Models\\HistoriqueMutation', 'updated', 21, 'App\\Models\\User', 3, '{\"attributes\":{\"nouveau_fonction_id\":5,\"updated_at\":\"2025-06-01T16:57:39.000000Z\"},\"old\":{\"nouveau_fonction_id\":6,\"updated_at\":\"2025-05-27T12:49:44.000000Z\"}}', NULL, '2025-06-01 15:57:39', '2025-06-01 15:57:39'),
(431, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 10, 'App\\Models\\User', 3, '{\"attributes\":{\"fonction_id\":5,\"service_id\":25,\"specialite_grade_id\":9,\"type_mutation\":2,\"date_mutation\":\"2009-10-04\",\"date_prise_en_service\":\"2009-10-04\",\"date_note\":\"2009-10-04\",\"ref_note\":\"AZE\",\"updated_at\":\"2025-06-01T16:57:39.000000Z\"},\"old\":{\"fonction_id\":6,\"service_id\":29,\"specialite_grade_id\":10,\"type_mutation\":11,\"date_mutation\":\"2022-08-29\",\"date_prise_en_service\":\"2022-08-29\",\"date_note\":\"2022-08-29\",\"ref_note\":\"SFE\",\"updated_at\":\"2025-05-27T12:56:51.000000Z\"}}', NULL, '2025-06-01 15:57:39', '2025-06-01 15:57:39'),
(432, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"nouveaux_position_id\":3,\"type_certificate_id\":1,\"type_conge_id\":1,\"updated_at\":\"2025-06-01T16:58:16.000000Z\"},\"old\":{\"nouveaux_position_id\":5,\"type_certificate_id\":null,\"type_conge_id\":null,\"updated_at\":\"2025-05-27T14:24:26.000000Z\"}}', NULL, '2025-06-01 15:58:16', '2025-06-01 15:58:16'),
(433, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 8, 'App\\Models\\User', 3, '{\"attributes\":{\"position_id\":3,\"updated_at\":\"2025-06-01T16:58:16.000000Z\"},\"old\":{\"position_id\":5,\"updated_at\":\"2025-05-27T14:24:26.000000Z\"}}', NULL, '2025-06-01 15:58:16', '2025-06-01 15:58:16'),
(434, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 4, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":12,\"ancien_position_id\":2,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-06-01\",\"date_prise_en_service\":\"2025-06-26\",\"remarque\":null,\"date_note\":null,\"ref_note\":null,\"fichiers_notes\":null,\"type\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-05T19:36:42.000000Z\",\"updated_at\":\"2025-06-05T19:36:42.000000Z\"}}', NULL, '2025-06-05 18:36:42', '2025-06-05 18:36:42'),
(435, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 12, 'App\\Models\\User', 3, '{\"attributes\":{\"position_id\":3,\"updated_at\":\"2025-06-05T19:36:42.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-05-27T13:51:36.000000Z\"}}', NULL, '2025-06-05 18:36:42', '2025-06-05 18:36:42'),
(436, 'Demande Congé', 'created', 'App\\Models\\DemandeConge', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":7,\"type_conge_id\":1,\"date_demande\":\"2025-05-10\",\"date_debut\":\"2025-07-16\",\"demande\":9,\"created_at\":\"2025-06-07T15:49:14.000000Z\",\"updated_at\":\"2025-06-07T15:49:14.000000Z\"}}', NULL, '2025-06-07 14:49:14', '2025-06-07 14:49:14'),
(437, 'Demande Congé', 'created', 'App\\Models\\DemandeConge', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":8,\"type_conge_id\":1,\"date_demande\":\"2025-05-25\",\"date_debut\":\"2025-06-25\",\"demande\":10,\"created_at\":\"2025-06-07T15:49:14.000000Z\",\"updated_at\":\"2025-06-07T15:49:14.000000Z\"}}', NULL, '2025-06-07 14:49:14', '2025-06-07 14:49:14'),
(438, 'Demande Congé', 'created', 'App\\Models\\DemandeConge', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":10,\"type_conge_id\":1,\"date_demande\":\"2025-05-13\",\"date_debut\":\"2025-07-16\",\"demande\":7,\"created_at\":\"2025-06-07T15:49:14.000000Z\",\"updated_at\":\"2025-06-07T15:49:14.000000Z\"}}', NULL, '2025-06-07 14:49:14', '2025-06-07 14:49:14'),
(439, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 5, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":12,\"ancien_position_id\":3,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-06-01\",\"date_prise_en_service\":null,\"remarque\":null,\"date_note\":null,\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"conge\",\"type_certificate_id\":null,\"type_conge_id\":1,\"created_at\":\"2025-06-07T15:50:00.000000Z\",\"updated_at\":\"2025-06-07T15:50:00.000000Z\"}}', NULL, '2025-06-07 14:50:00', '2025-06-07 14:50:00'),
(440, 'Congé Availability', 'updated', 'App\\Models\\CongeAvailability', 'updated', 49, 'App\\Models\\User', 3, '{\"attributes\":{\"jours_utilises\":22,\"jours_restants\":0,\"updated_at\":\"2025-06-07T15:50:00.000000Z\"},\"old\":{\"jours_utilises\":0,\"jours_restants\":22,\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-06-07 14:50:00', '2025-06-07 14:50:00'),
(441, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 6, 'App\\Models\\User', 3, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":12,\"ancien_position_id\":3,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-06-01\",\"date_prise_en_service\":null,\"remarque\":null,\"date_note\":null,\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"conge\",\"type_certificate_id\":null,\"type_conge_id\":3,\"created_at\":\"2025-06-07T16:13:53.000000Z\",\"updated_at\":\"2025-06-07T16:13:53.000000Z\"}}', NULL, '2025-06-07 15:13:53', '2025-06-07 15:13:53'),
(442, 'Congé Availability', 'updated', 'App\\Models\\CongeAvailability', 'updated', 51, 'App\\Models\\User', 3, '{\"attributes\":{\"jours_utilises\":5,\"jours_restants\":5,\"updated_at\":\"2025-06-07T16:13:53.000000Z\"},\"old\":{\"jours_utilises\":0,\"jours_restants\":10,\"updated_at\":\"2025-05-27T13:37:12.000000Z\"}}', NULL, '2025-06-07 15:13:53', '2025-06-07 15:13:53'),
(443, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"nom\":\"Universit\\u00e9 Mohammed V\",\"nom_arabe\":\"\\u062c\\u0627\\u0645\\u0639\\u0629 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u062e\\u0627\\u0645\\u0633\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(444, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"nom\":\"Universit\\u00e9 Hassan II\",\"nom_arabe\":\"\\u062c\\u0627\\u0645\\u0639\\u0629 \\u0627\\u0644\\u062d\\u0633\\u0646 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(445, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"nom\":\"Institut Sup\\u00e9rieur des Sciences de la Sant\\u00e9\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0639\\u0647\\u062f \\u0627\\u0644\\u0639\\u0627\\u0644\\u064a \\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0635\\u062d\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(446, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"nom\":\"\\u00c9cole Nationale de Sant\\u00e9 Publique\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0633\\u0629 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\\u0629 \\u0644\\u0644\\u0635\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0648\\u0645\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(447, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 5, NULL, NULL, '{\"attributes\":{\"id\":5,\"nom\":\"Facult\\u00e9 de M\\u00e9decine et de Pharmacie\",\"nom_arabe\":\"\\u0643\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0637\\u0628 \\u0648\\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(448, 'Option', 'created', 'App\\Models\\Option', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"nom\":\"Kin\\u00e9sith\\u00e9rapeute\",\"nom_arabe\":\"\\u0623\\u062e\\u0635\\u0627\\u0626\\u064a \\u0627\\u0644\\u0639\\u0644\\u0627\\u062c \\u0627\\u0644\\u0637\\u0628\\u064a\\u0639\\u064a\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(449, 'Option', 'created', 'App\\Models\\Option', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"nom\":\"Aide Soignant\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0645\\u0645\\u0631\\u0636\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(450, 'Option', 'created', 'App\\Models\\Option', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"nom\":\"Infirmier\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(451, 'Option', 'created', 'App\\Models\\Option', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"nom\":\"Technicien de Laboratoire\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0645\\u062e\\u062a\\u0628\\u0631\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(452, 'Option', 'created', 'App\\Models\\Option', 'created', 5, NULL, NULL, '{\"attributes\":{\"id\":5,\"nom\":\"Radiologie\",\"nom_arabe\":\"\\u0627\\u0644\\u0623\\u0634\\u0639\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(453, 'Option', 'created', 'App\\Models\\Option', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"nom\":\"Pharmacie\",\"nom_arabe\":\"\\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(454, 'Option', 'created', 'App\\Models\\Option', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"nom\":\"M\\u00e9decine G\\u00e9n\\u00e9rale\",\"nom_arabe\":\"\\u0627\\u0644\\u0637\\u0628 \\u0627\\u0644\\u0639\\u0627\\u0645\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(455, 'Option', 'created', 'App\\Models\\Option', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"nom\":\"Administration Hospitali\\u00e8re\",\"nom_arabe\":\"\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0634\\u0641\\u0627\\u0626\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(456, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 1, NULL, NULL, '{\"attributes\":{\"id\":1,\"nom\":\"Dr. Ahmed Benali\",\"nom_arabe\":\"\\u062f. \\u0623\\u062d\\u0645\\u062f \\u0628\\u0646 \\u0639\\u0644\\u064a\",\"fonction\":\"Chef de Service\",\"fonction_arabe\":\"\\u0631\\u0626\\u064a\\u0633 \\u0627\\u0644\\u0645\\u0635\\u0644\\u062d\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(457, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"nom\":\"Dr. Fatima Zahra\",\"nom_arabe\":\"\\u062f. \\u0641\\u0627\\u0637\\u0645\\u0629 \\u0627\\u0644\\u0632\\u0647\\u0631\\u0627\\u0621\",\"fonction\":\"M\\u00e9decin Sp\\u00e9cialiste\",\"fonction_arabe\":\"\\u0637\\u0628\\u064a\\u0628 \\u0645\\u062e\\u062a\\u0635\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(458, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"nom\":\"Mme. Khadija Alami\",\"nom_arabe\":\"\\u0627\\u0644\\u0633\\u064a\\u062f\\u0629 \\u062e\\u062f\\u064a\\u062c\\u0629 \\u0627\\u0644\\u0639\\u0644\\u0645\\u064a\",\"fonction\":\"Infirmi\\u00e8re Major\",\"fonction_arabe\":\"\\u0645\\u0645\\u0631\\u0636\\u0629 \\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(459, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"nom\":\"M. Omar Tazi\",\"nom_arabe\":\"\\u0627\\u0644\\u0633\\u064a\\u062f \\u0639\\u0645\\u0631 \\u0627\\u0644\\u062a\\u0627\\u0632\\u064a\",\"fonction\":\"Technicien Principal\",\"fonction_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0631\\u0626\\u064a\\u0633\\u064a\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(460, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 5, NULL, NULL, '{\"attributes\":{\"id\":5,\"nom\":\"Dr. Youssef Idrissi\",\"nom_arabe\":\"\\u062f. \\u064a\\u0648\\u0633\\u0641 \\u0627\\u0644\\u0625\\u062f\\u0631\\u064a\\u0633\\u064a\",\"fonction\":\"Directeur M\\u00e9dical\",\"fonction_arabe\":\"\\u0645\\u062f\\u064a\\u0631 \\u0637\\u0628\\u064a\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(461, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"nom\":\"Universit\\u00e9 Mohammed V\",\"nom_arabe\":\"\\u062c\\u0627\\u0645\\u0639\\u0629 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u062e\\u0627\\u0645\\u0633\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(462, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"nom\":\"Universit\\u00e9 Hassan II\",\"nom_arabe\":\"\\u062c\\u0627\\u0645\\u0639\\u0629 \\u0627\\u0644\\u062d\\u0633\\u0646 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(463, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"nom\":\"Institut Sup\\u00e9rieur des Sciences de la Sant\\u00e9\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0639\\u0647\\u062f \\u0627\\u0644\\u0639\\u0627\\u0644\\u064a \\u0644\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u0635\\u062d\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(464, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"nom\":\"\\u00c9cole Nationale de Sant\\u00e9 Publique\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u062f\\u0631\\u0633\\u0629 \\u0627\\u0644\\u0648\\u0637\\u0646\\u064a\\u0629 \\u0644\\u0644\\u0635\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0645\\u0648\\u0645\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(465, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"nom\":\"Facult\\u00e9 de M\\u00e9decine et de Pharmacie\",\"nom_arabe\":\"\\u0643\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0637\\u0628 \\u0648\\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(466, 'Option', 'created', 'App\\Models\\Option', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"nom\":\"Kin\\u00e9sith\\u00e9rapeute\",\"nom_arabe\":\"\\u0623\\u062e\\u0635\\u0627\\u0626\\u064a \\u0627\\u0644\\u0639\\u0644\\u0627\\u062c \\u0627\\u0644\\u0637\\u0628\\u064a\\u0639\\u064a\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(467, 'Option', 'created', 'App\\Models\\Option', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"nom\":\"Aide Soignant\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0645\\u0645\\u0631\\u0636\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(468, 'Option', 'created', 'App\\Models\\Option', 'created', 11, NULL, NULL, '{\"attributes\":{\"id\":11,\"nom\":\"Infirmier\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(469, 'Option', 'created', 'App\\Models\\Option', 'created', 12, NULL, NULL, '{\"attributes\":{\"id\":12,\"nom\":\"Technicien de Laboratoire\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0645\\u062e\\u062a\\u0628\\u0631\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(470, 'Option', 'created', 'App\\Models\\Option', 'created', 13, NULL, NULL, '{\"attributes\":{\"id\":13,\"nom\":\"Radiologie\",\"nom_arabe\":\"\\u0627\\u0644\\u0623\\u0634\\u0639\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(471, 'Option', 'created', 'App\\Models\\Option', 'created', 14, NULL, NULL, '{\"attributes\":{\"id\":14,\"nom\":\"Pharmacie\",\"nom_arabe\":\"\\u0627\\u0644\\u0635\\u064a\\u062f\\u0644\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(472, 'Option', 'created', 'App\\Models\\Option', 'created', 15, NULL, NULL, '{\"attributes\":{\"id\":15,\"nom\":\"M\\u00e9decine G\\u00e9n\\u00e9rale\",\"nom_arabe\":\"\\u0627\\u0644\\u0637\\u0628 \\u0627\\u0644\\u0639\\u0627\\u0645\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(473, 'Option', 'created', 'App\\Models\\Option', 'created', 16, NULL, NULL, '{\"attributes\":{\"id\":16,\"nom\":\"Administration Hospitali\\u00e8re\",\"nom_arabe\":\"\\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0634\\u0641\\u0627\\u0626\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(474, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 6, NULL, NULL, '{\"attributes\":{\"id\":6,\"nom\":\"Dr. Ahmed Benali\",\"nom_arabe\":\"\\u062f. \\u0623\\u062d\\u0645\\u062f \\u0628\\u0646 \\u0639\\u0644\\u064a\",\"fonction\":\"Chef de Service\",\"fonction_arabe\":\"\\u0631\\u0626\\u064a\\u0633 \\u0627\\u0644\\u0645\\u0635\\u0644\\u062d\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(475, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 7, NULL, NULL, '{\"attributes\":{\"id\":7,\"nom\":\"Dr. Fatima Zahra\",\"nom_arabe\":\"\\u062f. \\u0641\\u0627\\u0637\\u0645\\u0629 \\u0627\\u0644\\u0632\\u0647\\u0631\\u0627\\u0621\",\"fonction\":\"M\\u00e9decin Sp\\u00e9cialiste\",\"fonction_arabe\":\"\\u0637\\u0628\\u064a\\u0628 \\u0645\\u062e\\u062a\\u0635\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(476, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 8, NULL, NULL, '{\"attributes\":{\"id\":8,\"nom\":\"Mme. Khadija Alami\",\"nom_arabe\":\"\\u0627\\u0644\\u0633\\u064a\\u062f\\u0629 \\u062e\\u062f\\u064a\\u062c\\u0629 \\u0627\\u0644\\u0639\\u0644\\u0645\\u064a\",\"fonction\":\"Infirmi\\u00e8re Major\",\"fonction_arabe\":\"\\u0645\\u0645\\u0631\\u0636\\u0629 \\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(477, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 9, NULL, NULL, '{\"attributes\":{\"id\":9,\"nom\":\"M. Omar Tazi\",\"nom_arabe\":\"\\u0627\\u0644\\u0633\\u064a\\u062f \\u0639\\u0645\\u0631 \\u0627\\u0644\\u062a\\u0627\\u0632\\u064a\",\"fonction\":\"Technicien Principal\",\"fonction_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0631\\u0626\\u064a\\u0633\\u064a\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(478, 'Encadrant', 'created', 'App\\Models\\Encadrant', 'created', 10, NULL, NULL, '{\"attributes\":{\"id\":10,\"nom\":\"Dr. Youssef Idrissi\",\"nom_arabe\":\"\\u062f. \\u064a\\u0648\\u0633\\u0641 \\u0627\\u0644\\u0625\\u062f\\u0631\\u064a\\u0633\\u064a\",\"fonction\":\"Directeur M\\u00e9dical\",\"fonction_arabe\":\"\\u0645\\u062f\\u064a\\u0631 \\u0637\\u0628\\u064a\",\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(479, 'Stage', 'created', 'App\\Models\\Stage', 'created', 2, NULL, NULL, '{\"attributes\":{\"id\":2,\"nom_prenom\":\"Amina Benali\",\"cin\":\"AB123456\",\"institut_details\":\"\\u00c9tudiante en 3\\u00e8me ann\\u00e9e de kin\\u00e9sith\\u00e9rapie \\u00e0 l\'Universit\\u00e9 Mohammed V\",\"duree\":30,\"date_debut\":\"2024-01-15T00:00:00.000000Z\",\"date_fin\":\"2024-02-14T00:00:00.000000Z\",\"hierarchie\":\"Directeur R\\u00e9gional de la Sant\\u00e9\",\"avis\":\"Stage effectu\\u00e9 avec satisfaction\",\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"type_stage\":\"formation\",\"ecole_id\":1,\"option_id\":1,\"service_id\":24,\"formation_sanitaire_id\":9,\"encadrant_id\":1,\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(480, 'Stage', 'created', 'App\\Models\\Stage', 'created', 3, NULL, NULL, '{\"attributes\":{\"id\":3,\"nom_prenom\":\"Mohammed Tazi\",\"cin\":\"MT789012\",\"institut_details\":\"\\u00c9tudiant en 2\\u00e8me ann\\u00e9e d\'aide soignant \\u00e0 l\'Institut Sup\\u00e9rieur des Sciences de la Sant\\u00e9\",\"duree\":45,\"date_debut\":\"2024-02-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-17T00:00:00.000000Z\",\"hierarchie\":\"Chef de Service\",\"avis\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"type_stage\":\"volontaire\",\"ecole_id\":3,\"option_id\":2,\"service_id\":25,\"formation_sanitaire_id\":10,\"encadrant_id\":2,\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(481, 'Stage', 'created', 'App\\Models\\Stage', 'created', 4, NULL, NULL, '{\"attributes\":{\"id\":4,\"nom_prenom\":\"Sara Alami\",\"cin\":\"SA345678\",\"institut_details\":\"\\u00c9tudiante en 1\\u00e8re ann\\u00e9e d\'infirmerie \\u00e0 l\'\\u00c9cole Nationale de Sant\\u00e9 Publique\",\"duree\":60,\"date_debut\":\"2024-03-01T00:00:00.000000Z\",\"date_fin\":\"2024-04-30T00:00:00.000000Z\",\"hierarchie\":\"Directeur de l\'H\\u00f4pital\",\"avis\":\"Excellent travail et motivation\",\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"type_stage\":\"formation\",\"ecole_id\":4,\"option_id\":3,\"service_id\":30,\"formation_sanitaire_id\":11,\"encadrant_id\":3,\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(482, 'default', 'created', 'App\\Models\\User', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Samir Taqqi\",\"email\":\"tsamir.stage@grh.ma\"}}', NULL, '2025-06-10 09:58:57', '2025-06-10 09:58:57'),
(483, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 5, 'App\\Models\\User', 4, '{\"roles\":[\"Stage RH\"]}', NULL, '2025-06-10 09:58:57', '2025-06-10 09:58:57'),
(484, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 1, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":1,\"fonctionnaire_id\":8,\"type_conge_id\":2,\"nombre_jours\":5,\"date_debut\":\"2026-01-01T00:00:00.000000Z\",\"date_fin\":\"2026-01-05T00:00:00.000000Z\",\"date_decision\":\"2025-06-12T00:00:00.000000Z\",\"numero_decision\":\"09\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:12:01.000000Z\",\"updated_at\":\"2025-06-12T23:12:01.000000Z\"}}', NULL, '2025-06-12 22:12:01', '2025-06-12 22:12:01'),
(485, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 2, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":12,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2025-06-13T00:00:00.000000Z\",\"date_fin\":\"2025-06-23T00:00:00.000000Z\",\"date_decision\":\"2025-06-13T00:00:00.000000Z\",\"numero_decision\":\"98\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:26:37.000000Z\",\"updated_at\":\"2025-06-12T23:26:37.000000Z\"}}', NULL, '2025-06-12 22:26:37', '2025-06-12 22:26:37'),
(486, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"nombre_jours\":5,\"date_debut\":\"2025-06-01T00:00:00.000000Z\",\"date_fin\":\"2025-06-08T00:00:00.000000Z\",\"date_decision\":\"2025-06-01T00:00:00.000000Z\",\"numero_decision\":\"98\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:41:32.000000Z\",\"updated_at\":\"2025-06-12T23:41:32.000000Z\"}}', NULL, '2025-06-12 22:41:32', '2025-06-12 22:41:32'),
(487, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"date_naissance\":\"1940-02-19\",\"updated_at\":\"2025-06-13T00:32:35.000000Z\"},\"old\":{\"date_naissance\":\"1989-02-19\",\"updated_at\":\"2025-06-05T19:36:42.000000Z\"}}', NULL, '2025-06-12 23:32:35', '2025-06-12 23:32:35'),
(488, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"date_naissance\":\"1940-01-01\",\"email\":null,\"telephone\":null,\"adresse\":null,\"remarques\":null,\"ref_note\":\"H\",\"updated_at\":\"2025-06-13T00:45:57.000000Z\"},\"old\":{\"nom_arabe\":\"\",\"prenom_arabe\":\"\",\"date_naissance\":\"2970-01-01\",\"email\":\"\",\"telephone\":\"\",\"adresse\":\"\",\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-05-27T14:46:32.000000Z\"}}', NULL, '2025-06-12 23:45:57', '2025-06-12 23:45:57'),
(489, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 2, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":2,\"fonctionnaire_id\":12,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-06-13T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"85.3\",\"annees_service\":\"13.5\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (63 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-06-13T00:46:44.000000Z\",\"updated_at\":\"2025-06-13T00:46:44.000000Z\"}}', NULL, '2025-06-12 23:46:44', '2025-06-12 23:46:44'),
(490, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":14,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-06-13T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"85.4\",\"annees_service\":\"14.4\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (63 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-06-13T00:46:44.000000Z\",\"updated_at\":\"2025-06-13T00:46:44.000000Z\"}}', NULL, '2025-06-12 23:46:44', '2025-06-12 23:46:44'),
(491, 'Stage', 'created', 'App\\Models\\Stage', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"nom_prenom\":\"vvvDFD FGFGF\",\"cin\":\"cd434343\",\"institut_details\":\"IUIUIU\",\"duree\":60,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-06-06T00:00:00.000000Z\",\"hierarchie\":\"MR DIRECTEUR\",\"avis\":null,\"fichier\":null,\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"type_stage\":\"volontaire\",\"ecole_id\":3,\"option_id\":13,\"service_id\":26,\"formation_sanitaire_id\":13,\"encadrant_id\":5,\"created_at\":\"2025-06-13T01:16:40.000000Z\",\"updated_at\":\"2025-06-13T01:16:40.000000Z\"}}', NULL, '2025-06-13 00:16:40', '2025-06-13 00:16:40'),
(492, 'Stage', 'updated', 'App\\Models\\Stage', 'updated', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"fichier\":\"stages\\/fichiers\\/1749777433_Design sans titre (1).pdf\",\"updated_at\":\"2025-06-13T01:17:13.000000Z\"},\"old\":{\"fichier\":null,\"updated_at\":\"2025-06-13T01:16:40.000000Z\"}}', NULL, '2025-06-13 00:17:13', '2025-06-13 00:17:13'),
(493, 'default', 'created', 'App\\Models\\TypeStage', 'created', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"aze\",\"nom_arabe\":\"aze\",\"actif\":true}}', NULL, '2025-06-13 12:48:39', '2025-06-13 12:48:39'),
(494, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":15,\"ppr\":\"989797\",\"nom\":\"SAMIRA\",\"nom_arabe\":\"MEDAH\",\"prenom\":\"MEDAH\",\"prenom_arabe\":\"SAMIRA\",\"cin\":\"CG65656\",\"sexe\":\"F\",\"date_naissance\":\"1970-01-01\",\"date_embauche\":\"2009-01-01\",\"email\":\"HKHJ@GMAIL.COM\",\"telephone\":\"898989898\",\"adresse\":\"FES\",\"fonction_id\":5,\"nom_formation_sanitaire_id\":9,\"remarques\":\"\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2009-01-01\",\"date_prise_en_service\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-06-23T21:49:23.000000Z\",\"updated_at\":\"2025-06-23T21:49:23.000000Z\"}}', NULL, '2025-06-23 20:49:23', '2025-06-23 20:49:23'),
(495, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":18,\"nom\":\"PREMIER GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0623\\u0648\\u0644\\u0649\",\"cadre_id\":12,\"created_at\":\"2025-06-23T21:50:41.000000Z\",\"updated_at\":\"2025-06-23T21:50:41.000000Z\"}}', NULL, '2025-06-23 20:50:41', '2025-06-23 20:50:41'),
(496, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":15,\"nom\":\"INFORMATIQUE\",\"nom_arabe\":\"\\u0645\\u0639\\u0644\\u0648\\u0645\\u064a\\u0627\\u062a\",\"grade_id\":18,\"created_at\":\"2025-06-23T21:54:50.000000Z\",\"updated_at\":\"2025-06-23T21:54:50.000000Z\"}}', NULL, '2025-06-23 20:54:50', '2025-06-23 20:54:50'),
(497, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":16,\"nom\":\"LABORATOIRE\",\"nom_arabe\":\"\\u0645\\u062e\\u062a\\u0628\\u0631\",\"grade_id\":15,\"created_at\":\"2025-06-23T21:57:42.000000Z\",\"updated_at\":\"2025-06-23T21:57:42.000000Z\"}}', NULL, '2025-06-23 20:57:42', '2025-06-23 20:57:42'),
(498, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":17,\"nom\":\"URGENTISTE\",\"nom_arabe\":\"\\u0645\\u0633\\u062a\\u0639\\u062c\\u0644\\u0627\\u062a\",\"grade_id\":14,\"created_at\":\"2025-06-23T21:58:14.000000Z\",\"updated_at\":\"2025-06-23T21:58:14.000000Z\"}}', NULL, '2025-06-23 20:58:14', '2025-06-23 20:58:14'),
(499, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"nom\":\"ASSISTANT MEDICAL\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0637\\u0628\\u064a\",\"categorie_cadre_id\":5,\"created_at\":\"2025-06-23T22:00:04.000000Z\",\"updated_at\":\"2025-06-23T22:00:04.000000Z\"}}', NULL, '2025-06-23 21:00:04', '2025-06-23 21:00:04'),
(500, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"nom\":\"HORS GRADE\",\"nom_arabe\":\"\\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"cadre_id\":19,\"created_at\":\"2025-06-23T22:00:49.000000Z\",\"updated_at\":\"2025-06-23T22:00:49.000000Z\"}}', NULL, '2025-06-23 21:00:49', '2025-06-23 21:00:49'),
(501, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":18,\"nom\":\"PHYISQUE NUCLEAIRE\",\"nom_arabe\":\"\\u0641\\u064a\\u0632\\u064a\\u0627\\u0621 \\u0646\\u0648\\u0648\\u064a\\u0629\",\"grade_id\":19,\"created_at\":\"2025-06-23T22:01:54.000000Z\",\"updated_at\":\"2025-06-23T22:01:54.000000Z\"}}', NULL, '2025-06-23 21:01:54', '2025-06-23 21:01:54'),
(502, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"nom\":\"GYNECOLOGIE\",\"nom_arabe\":\"\\u0627\\u0644\\u0648\\u0644\\u0627\\u062f\\u0629\",\"grade_id\":5,\"created_at\":\"2025-06-23T22:02:52.000000Z\",\"updated_at\":\"2025-06-23T22:02:52.000000Z\"}}', NULL, '2025-06-23 21:02:52', '2025-06-23 21:02:52'),
(503, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"nom\":\"CHIRURGIE TRAUMATOLOGIE\",\"nom_arabe\":\"\\u062c\\u0631\\u0627\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0638\\u0627\\u0645\",\"grade_id\":5,\"created_at\":\"2025-06-23T22:03:46.000000Z\",\"updated_at\":\"2025-06-23T22:03:46.000000Z\"}}', NULL, '2025-06-23 21:03:46', '2025-06-23 21:03:46'),
(504, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"nom\":\"PNEUMOLOGIE\",\"nom_arabe\":\"\\u0637\\u0628 \\u0627\\u0644\\u062a\\u0646\\u0641\\u0633\",\"grade_id\":6,\"created_at\":\"2025-06-23T22:04:26.000000Z\",\"updated_at\":\"2025-06-23T22:04:26.000000Z\"}}', NULL, '2025-06-23 21:04:26', '2025-06-23 21:04:26'),
(505, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_arabe\":\"\\u0637\\u0628 \\u0627\\u0644\\u0627\\u0645\\u0631\\u0627\\u0636 \\u0627\\u0644\\u0635\\u062f\\u0631\\u064a\\u0629\",\"updated_at\":\"2025-06-23T22:04:47.000000Z\"},\"old\":{\"nom_arabe\":\"\\u0637\\u0628 \\u0627\\u0644\\u062a\\u0646\\u0641\\u0633\",\"updated_at\":\"2025-06-23T22:04:26.000000Z\"}}', NULL, '2025-06-23 21:04:47', '2025-06-23 21:04:47'),
(506, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"nom\":\"AIDE SOIGNANT\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0644\\u0627\\u062c\",\"categorie_cadre_id\":1,\"created_at\":\"2025-06-23T22:06:11.000000Z\",\"updated_at\":\"2025-06-23T22:06:11.000000Z\"}}', NULL, '2025-06-23 21:06:11', '2025-06-23 21:06:11'),
(507, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"nom\":\"TROISIEME GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062a\\u0629\",\"cadre_id\":14,\"created_at\":\"2025-06-23T22:07:03.000000Z\",\"updated_at\":\"2025-06-23T22:07:03.000000Z\"}}', NULL, '2025-06-23 21:07:03', '2025-06-23 21:07:03'),
(508, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"nom\":\"QUATRIEME GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0639\\u0629\",\"cadre_id\":20,\"created_at\":\"2025-06-23T22:09:12.000000Z\",\"updated_at\":\"2025-06-23T22:09:12.000000Z\"}}', NULL, '2025-06-23 21:09:12', '2025-06-23 21:09:12'),
(509, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"nom\":\"AIDE SOIGNANT\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0644\\u0627\\u062c\",\"grade_id\":21,\"created_at\":\"2025-06-23T22:10:17.000000Z\",\"updated_at\":\"2025-06-23T22:10:17.000000Z\"}}', NULL, '2025-06-23 21:10:17', '2025-06-23 21:10:17'),
(510, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"nom\":\"AMBULANCIER\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u0639\\u0627\\u0641\",\"categorie_cadre_id\":1,\"created_at\":\"2025-06-23T22:11:05.000000Z\",\"updated_at\":\"2025-06-23T22:11:05.000000Z\"}}', NULL, '2025-06-23 21:11:05', '2025-06-23 21:11:05'),
(511, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"nom\":\"QUATRIEME GRADE\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0639\\u0629\",\"cadre_id\":21,\"created_at\":\"2025-06-23T22:11:55.000000Z\",\"updated_at\":\"2025-06-23T22:11:55.000000Z\"}}', NULL, '2025-06-23 21:11:55', '2025-06-23 21:11:55'),
(512, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"nom\":\"CHAFFEUR AMBULANCIER\",\"nom_arabe\":\"\\u0633\\u0627\\u0626\\u0642 \\u0627\\u0644\\u0627\\u0633\\u0639\\u0627\\u0641 \\u0648\\u0646\\u0642\\u0644 \\u0635\\u062d\\u064a\",\"grade_id\":22,\"created_at\":\"2025-06-23T22:12:46.000000Z\",\"updated_at\":\"2025-06-23T22:12:46.000000Z\"}}', NULL, '2025-06-23 21:12:46', '2025-06-23 21:12:46'),
(513, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"ppr\":\"898998\",\"nom\":\"ABOUZAYD\",\"prenom\":\"SANAE\",\"updated_at\":\"2025-06-23T22:37:29.000000Z\"},\"old\":{\"ppr\":\"QSq\",\"nom\":\"QSqs\",\"prenom\":\"QSqs\",\"updated_at\":\"2025-06-13T00:45:57.000000Z\"}}', NULL, '2025-06-23 21:37:29', '2025-06-23 21:37:29'),
(514, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"cin\":\"BG9898989\",\"updated_at\":\"2025-06-23T22:37:44.000000Z\"},\"old\":{\"cin\":\"QSqs\",\"updated_at\":\"2025-06-23T22:37:29.000000Z\"}}', NULL, '2025-06-23 21:37:44', '2025-06-23 21:37:44'),
(515, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":16,\"ppr\":\"009898\",\"nom\":\"HANANE\",\"nom_arabe\":\"\\u0643\\u0627\\u0645\\u064a\\u0644\\u0629\",\"prenom\":\"KAMILA\",\"prenom_arabe\":\"\\u062d\\u0646\\u0627\\u0646\",\"cin\":\"CD98989\",\"sexe\":\"F\",\"date_naissance\":\"1975-08-09\",\"date_embauche\":\"1995-12-01\",\"email\":\"KAMILA@GMAIL.COM\",\"telephone\":\"89898\",\"adresse\":\"AIN NOKBI FES\",\"fonction_id\":13,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":30,\"specialite_grade_id\":22,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1995-12-01\",\"date_prise_en_service\":\"1995-12-01\",\"date_note\":\"1995-12-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-06-23T22:40:14.000000Z\",\"updated_at\":\"2025-06-23T22:40:14.000000Z\"}}', NULL, '2025-06-23 21:40:14', '2025-06-23 21:40:14');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(516, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":17,\"ppr\":\"42444\",\"nom\":\"DAWIRI\",\"nom_arabe\":\"DAWIRI\",\"prenom\":\"YOUSSEF\",\"prenom_arabe\":\"YOUSSEF\",\"cin\":\"CH88868\",\"sexe\":\"M\",\"date_naissance\":\"1991-01-01\",\"date_embauche\":\"2011-01-01\",\"email\":\"DAWIRI@GMAIL.COM\",\"telephone\":\"89898989898\",\"adresse\":\"FES NARJISS\",\"fonction_id\":10,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":28,\"specialite_grade_id\":18,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2011-01-01\",\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-06-23T22:42:45.000000Z\",\"updated_at\":\"2025-06-23T22:42:45.000000Z\"}}', NULL, '2025-06-23 21:42:45', '2025-06-23 21:42:45'),
(517, 'Service', 'created', 'App\\Models\\Service', 'created', 34, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":34,\"nom\":\"AIDE SOIGNANT\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0644\\u0627\\u062c\",\"created_at\":\"2025-06-23T22:43:26.000000Z\",\"updated_at\":\"2025-06-23T22:43:26.000000Z\"}}', NULL, '2025-06-23 21:43:26', '2025-06-23 21:43:26'),
(518, 'Service', 'created', 'App\\Models\\Service', 'created', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":35,\"nom\":\"AIDE OPERATOIRE\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0645\\u0644\\u064a\\u0627\\u062a\",\"created_at\":\"2025-06-23T22:43:58.000000Z\",\"updated_at\":\"2025-06-23T22:43:58.000000Z\"}}', NULL, '2025-06-23 21:43:58', '2025-06-23 21:43:58'),
(519, 'Service', 'created', 'App\\Models\\Service', 'created', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":36,\"nom\":\"GESTION FINANCIER\",\"nom_arabe\":\"\\u062a\\u0633\\u064a\\u064a\\u0631 \\u0645\\u0627\\u0644\\u064a\",\"created_at\":\"2025-06-23T22:44:52.000000Z\",\"updated_at\":\"2025-06-23T22:44:52.000000Z\"}}', NULL, '2025-06-23 21:44:52', '2025-06-23 21:44:52'),
(520, 'Service', 'created', 'App\\Models\\Service', 'created', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":37,\"nom\":\"CHIRURGIE TRAUMATOLOGIE\",\"nom_arabe\":\"\\u062c\\u0631\\u0627\\u062d\\u0629 \\u0627\\u0644\\u0639\\u0638\\u0627\\u0645\",\"created_at\":\"2025-06-23T22:45:40.000000Z\",\"updated_at\":\"2025-06-23T22:45:40.000000Z\"}}', NULL, '2025-06-23 21:45:40', '2025-06-23 21:45:40'),
(521, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":18,\"ppr\":\"1313\",\"nom\":\"BENANI\",\"nom_arabe\":\"BENANI\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"MOHAMMED\",\"cin\":\"KJ440909\",\"sexe\":\"M\",\"date_naissance\":\"1991-01-01\",\"date_embauche\":\"2009-01-01\",\"email\":\"BENANI@GMAIL.COM\",\"telephone\":\"0678787878\",\"adresse\":\"FES RYAD\",\"fonction_id\":22,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":36,\"specialite_grade_id\":15,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"2009-01-01\",\"date_prise_en_service\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-06-23T22:48:30.000000Z\",\"updated_at\":\"2025-06-23T22:48:30.000000Z\"}}', NULL, '2025-06-23 21:48:30', '2025-06-23 21:48:30'),
(522, 'Service', 'created', 'App\\Models\\Service', 'created', 38, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":38,\"nom\":\"INFORMATIQUE\",\"nom_arabe\":\"\\u0645\\u0639\\u0644\\u0648\\u0645\\u064a\\u0627\\u062a\",\"created_at\":\"2025-06-23T22:48:53.000000Z\",\"updated_at\":\"2025-06-23T22:48:53.000000Z\"}}', NULL, '2025-06-23 21:48:53', '2025-06-23 21:48:53'),
(523, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"remarques\":null,\"service_id\":38,\"ref_note\":\"D\",\"updated_at\":\"2025-06-23T22:49:54.000000Z\"},\"old\":{\"remarques\":\"\",\"service_id\":36,\"ref_note\":\"\",\"updated_at\":\"2025-06-23T22:48:30.000000Z\"}}', NULL, '2025-06-23 21:49:54', '2025-06-23 21:49:54'),
(524, 'Type Categorie Formation', 'created', 'App\\Models\\TypeCategorieFormation', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"nom\":\"r\\u00e9gionale\",\"nom_arabe\":\"\\u062c\\u0647\\u0648\\u064a\",\"categorie_formation_id\":4,\"created_at\":\"2025-06-23T22:51:39.000000Z\",\"updated_at\":\"2025-06-23T22:51:39.000000Z\"}}', NULL, '2025-06-23 21:51:39', '2025-06-23 21:51:39'),
(525, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"nom\":\"ibn baytar fes\",\"nom_arabe\":\"\\u0627\\u0628\\u0646 \\u0628\\u064a\\u0637\\u0631 \\u0641\\u0627\\u0633\",\"niveau_categorie_formation_id\":2,\"arrondissement_commune_id\":207,\"created_at\":\"2025-06-23T22:53:05.000000Z\",\"updated_at\":\"2025-06-23T22:53:05.000000Z\"}}', NULL, '2025-06-23 21:53:05', '2025-06-23 21:53:05'),
(526, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"ppr\":\"8787878\",\"nom\":\"ABOUMEHDI\",\"nom_arabe\":\"ABOUMEHDI\",\"prenom\":\"HAFID\",\"prenom_arabe\":\"HAFIDA\",\"cin\":\"CH989898\",\"sexe\":\"M\",\"date_naissance\":\"1989-08-01\",\"date_embauche\":\"2007-01-01\",\"email\":\"ABOUMEHDI@GMAIL.COM\",\"telephone\":\"0989898\",\"adresse\":\"FES SIDI HRAZEM\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":20,\"remarques\":\"\",\"service_id\":36,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2007-01-01\",\"date_prise_en_service\":\"2007-01-01\",\"date_note\":\"2007-01-01\",\"fichier_note\":\"\",\"ref_note\":\"09JJH\",\"created_at\":\"2025-06-23T22:56:38.000000Z\",\"updated_at\":\"2025-06-23T22:56:38.000000Z\"}}', NULL, '2025-06-23 21:56:38', '2025-06-23 21:56:38'),
(527, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 73, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":73,\"fonctionnaire_id\":18,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(528, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 74, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":74,\"fonctionnaire_id\":18,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(529, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 75, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":75,\"fonctionnaire_id\":18,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(530, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 76, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":76,\"fonctionnaire_id\":18,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(531, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 77, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":77,\"fonctionnaire_id\":18,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(532, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 78, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":78,\"fonctionnaire_id\":18,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(533, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 79, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":79,\"fonctionnaire_id\":18,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(534, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 80, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":80,\"fonctionnaire_id\":18,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-23T22:57:38.000000Z\",\"updated_at\":\"2025-06-23T22:57:38.000000Z\"}}', NULL, '2025-06-23 21:57:38', '2025-06-23 21:57:38'),
(535, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 81, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":81,\"fonctionnaire_id\":19,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(536, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 82, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":82,\"fonctionnaire_id\":19,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(537, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 83, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":83,\"fonctionnaire_id\":19,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(538, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 84, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":84,\"fonctionnaire_id\":19,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(539, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 85, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":85,\"fonctionnaire_id\":19,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(540, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 86, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":86,\"fonctionnaire_id\":19,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(541, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 87, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":87,\"fonctionnaire_id\":19,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(542, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 88, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":88,\"fonctionnaire_id\":19,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-23T22:57:45.000000Z\",\"updated_at\":\"2025-06-23T22:57:45.000000Z\"}}', NULL, '2025-06-23 21:57:45', '2025-06-23 21:57:45'),
(543, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 89, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":89,\"fonctionnaire_id\":17,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-23T22:57:48.000000Z\",\"updated_at\":\"2025-06-23T22:57:48.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(544, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 90, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":90,\"fonctionnaire_id\":17,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(545, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 91, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":91,\"fonctionnaire_id\":17,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(546, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 92, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":92,\"fonctionnaire_id\":17,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(547, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 93, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":93,\"fonctionnaire_id\":17,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(548, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 94, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":94,\"fonctionnaire_id\":17,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(549, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 95, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":95,\"fonctionnaire_id\":17,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(550, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 96, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":96,\"fonctionnaire_id\":17,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-23T22:57:49.000000Z\",\"updated_at\":\"2025-06-23T22:57:49.000000Z\"}}', NULL, '2025-06-23 21:57:49', '2025-06-23 21:57:49'),
(551, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 97, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":97,\"fonctionnaire_id\":15,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(552, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 98, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":98,\"fonctionnaire_id\":15,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(553, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 99, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":99,\"fonctionnaire_id\":15,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(554, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 100, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":100,\"fonctionnaire_id\":15,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(555, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 101, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":101,\"fonctionnaire_id\":15,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(556, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 102, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":102,\"fonctionnaire_id\":15,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(557, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 103, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":103,\"fonctionnaire_id\":15,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(558, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 104, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":104,\"fonctionnaire_id\":15,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-23T22:57:53.000000Z\",\"updated_at\":\"2025-06-23T22:57:53.000000Z\"}}', NULL, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(559, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 105, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":105,\"fonctionnaire_id\":16,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(560, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 106, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":106,\"fonctionnaire_id\":16,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(561, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 107, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":107,\"fonctionnaire_id\":16,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(562, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 108, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":108,\"fonctionnaire_id\":16,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(563, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 109, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":109,\"fonctionnaire_id\":16,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(564, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 110, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":110,\"fonctionnaire_id\":16,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(565, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 111, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":111,\"fonctionnaire_id\":16,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(566, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 112, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":112,\"fonctionnaire_id\":16,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-23T22:57:55.000000Z\",\"updated_at\":\"2025-06-23T22:57:55.000000Z\"}}', NULL, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(571, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":14,\"ancien_position_id\":2,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-06-23\",\"date_prise_en_service\":null,\"remarque\":null,\"date_note\":\"2025-06-23\",\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-23T23:01:47.000000Z\",\"updated_at\":\"2025-06-23T23:01:47.000000Z\"}}', NULL, '2025-06-23 22:01:47', '2025-06-23 22:01:47'),
(572, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":5,\"updated_at\":\"2025-06-23T23:01:47.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-06-23T22:37:44.000000Z\"}}', NULL, '2025-06-23 22:01:47', '2025-06-23 22:01:47'),
(573, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":3,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":14,\"jours\":7,\"date_depot\":\"2025-01-23\",\"date_debut\":\"2025-01-23\",\"created_at\":\"2025-06-23T23:02:38.000000Z\",\"updated_at\":\"2025-06-23T23:02:38.000000Z\"}}', NULL, '2025-06-23 22:02:38', '2025-06-23 22:02:38'),
(574, 'Grève', 'created', 'App\\Models\\Greve', 'created', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":3,\"fonctionnaire_id\":14,\"date_debut\":\"2024-01-01\",\"date_fin\":\"2024-01-05\",\"remarque\":null,\"created_at\":\"2025-06-23T23:03:01.000000Z\",\"updated_at\":\"2025-06-23T23:03:01.000000Z\"}}', NULL, '2025-06-23 22:03:01', '2025-06-23 22:03:01'),
(575, 'Grève', 'created', 'App\\Models\\Greve', 'created', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":14,\"date_debut\":\"2024-08-08\",\"date_fin\":\"2024-08-12\",\"remarque\":null,\"created_at\":\"2025-06-23T23:03:21.000000Z\",\"updated_at\":\"2025-06-23T23:03:21.000000Z\"}}', NULL, '2025-06-23 22:03:21', '2025-06-23 22:03:21'),
(576, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":4,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":14,\"jours\":8,\"date_depot\":\"2024-06-23\",\"date_debut\":\"2024-06-23\",\"created_at\":\"2025-06-23T23:03:50.000000Z\",\"updated_at\":\"2025-06-23T23:03:50.000000Z\"}}', NULL, '2025-06-23 22:03:50', '2025-06-23 22:03:50'),
(577, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":19,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2025-05-04T00:00:00.000000Z\",\"date_fin\":\"2025-06-04T00:00:00.000000Z\",\"date_decision\":\"2025-04-03T00:00:00.000000Z\",\"numero_decision\":\"09JJH\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:05:45.000000Z\",\"updated_at\":\"2025-06-23T23:05:45.000000Z\"}}', NULL, '2025-06-23 22:05:45', '2025-06-23 22:05:45'),
(578, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"nombre_jours\":15,\"date_debut\":\"2025-08-01T00:00:00.000000Z\",\"date_fin\":\"2025-08-26T00:00:00.000000Z\",\"date_decision\":\"2025-07-31T00:00:00.000000Z\",\"numero_decision\":\"31072025CONGE\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:06:31.000000Z\",\"updated_at\":\"2025-06-23T23:06:31.000000Z\"}}', NULL, '2025-06-23 22:06:31', '2025-06-23 22:06:31'),
(579, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":8,\"type_conge_id\":2,\"nombre_jours\":5,\"date_debut\":\"2024-03-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-15T00:00:00.000000Z\",\"date_decision\":\"2024-03-01T00:00:00.000000Z\",\"numero_decision\":\"Z\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:07:21.000000Z\",\"updated_at\":\"2025-06-23T23:07:21.000000Z\"}}', NULL, '2025-06-23 22:07:21', '2025-06-23 22:07:21'),
(580, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 1, 'App\\Models\\User', 4, '{\"old\":{\"id\":1,\"fonctionnaire_id\":8,\"type_conge_id\":2,\"nombre_jours\":5,\"date_debut\":\"2026-01-01T00:00:00.000000Z\",\"date_fin\":\"2026-01-05T00:00:00.000000Z\",\"date_decision\":\"2025-06-12T00:00:00.000000Z\",\"numero_decision\":\"09\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:12:01.000000Z\",\"updated_at\":\"2025-06-12T23:12:01.000000Z\"}}', NULL, '2025-06-23 22:07:55', '2025-06-23 22:07:55'),
(581, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 3, 'App\\Models\\User', 4, '{\"old\":{\"id\":3,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"nombre_jours\":5,\"date_debut\":\"2025-06-01T00:00:00.000000Z\",\"date_fin\":\"2025-06-08T00:00:00.000000Z\",\"date_decision\":\"2025-06-01T00:00:00.000000Z\",\"numero_decision\":\"98\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:41:32.000000Z\",\"updated_at\":\"2025-06-12T23:41:32.000000Z\"}}', NULL, '2025-06-23 22:08:04', '2025-06-23 22:08:04'),
(582, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 4, 'App\\Models\\User', 4, '{\"old\":{\"id\":4,\"fonctionnaire_id\":19,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2025-05-04T00:00:00.000000Z\",\"date_fin\":\"2025-06-04T00:00:00.000000Z\",\"date_decision\":\"2025-04-03T00:00:00.000000Z\",\"numero_decision\":\"09JJH\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:05:45.000000Z\",\"updated_at\":\"2025-06-23T23:05:45.000000Z\"}}', NULL, '2025-06-23 22:08:13', '2025-06-23 22:08:13'),
(583, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 5, 'App\\Models\\User', 4, '{\"old\":{\"id\":5,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"nombre_jours\":15,\"date_debut\":\"2025-08-01T00:00:00.000000Z\",\"date_fin\":\"2025-08-26T00:00:00.000000Z\",\"date_decision\":\"2025-07-31T00:00:00.000000Z\",\"numero_decision\":\"31072025CONGE\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:06:31.000000Z\",\"updated_at\":\"2025-06-23T23:06:31.000000Z\"}}', NULL, '2025-06-23 22:08:20', '2025-06-23 22:08:20'),
(584, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":15,\"type_conge_id\":1,\"nombre_jours\":15,\"date_debut\":\"2024-06-01T00:00:00.000000Z\",\"date_fin\":\"2024-06-15T00:00:00.000000Z\",\"date_decision\":\"2024-06-01T00:00:00.000000Z\",\"numero_decision\":\"ZE\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:09:02.000000Z\",\"updated_at\":\"2025-06-23T23:09:02.000000Z\"}}', NULL, '2025-06-23 22:09:02', '2025-06-23 22:09:02'),
(585, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"nombre_jours\":4,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-01-05T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"D\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:09:37.000000Z\",\"updated_at\":\"2025-06-23T23:09:37.000000Z\"}}', NULL, '2025-06-23 22:09:37', '2025-06-23 22:09:37'),
(586, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"nombre_jours\":4,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-01-05T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"D\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:09:38.000000Z\",\"updated_at\":\"2025-06-23T23:09:38.000000Z\"}}', NULL, '2025-06-23 22:09:38', '2025-06-23 22:09:38'),
(587, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":18,\"jours\":4,\"date_depot\":\"2024-06-24\",\"date_debut\":\"2024-06-24\",\"created_at\":\"2025-06-24T07:50:10.000000Z\",\"updated_at\":\"2025-06-24T07:50:10.000000Z\"}}', NULL, '2025-06-24 06:50:10', '2025-06-24 06:50:10'),
(588, 'Grève', 'created', 'App\\Models\\Greve', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":18,\"date_debut\":\"2024-02-02\",\"date_fin\":\"2024-02-05\",\"remarque\":null,\"created_at\":\"2025-06-24T07:51:08.000000Z\",\"updated_at\":\"2025-06-24T07:51:08.000000Z\"}}', NULL, '2025-06-24 06:51:08', '2025-06-24 06:51:08'),
(589, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":7,\"type_conge_id\":1,\"nombre_jours\":7,\"date_debut\":\"2024-05-06T00:00:00.000000Z\",\"date_fin\":\"2024-05-12T00:00:00.000000Z\",\"date_decision\":\"2024-05-06T00:00:00.000000Z\",\"numero_decision\":\"S\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T07:52:16.000000Z\",\"updated_at\":\"2025-06-24T07:52:16.000000Z\"}}', NULL, '2025-06-24 06:52:16', '2025-06-24 06:52:16'),
(590, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":7,\"type_conge_id\":4,\"nombre_jours\":5,\"date_debut\":\"2024-02-02T00:00:00.000000Z\",\"date_fin\":\"2024-02-07T00:00:00.000000Z\",\"date_decision\":\"2024-02-02T00:00:00.000000Z\",\"numero_decision\":\"S\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T07:52:49.000000Z\",\"updated_at\":\"2025-06-24T07:52:49.000000Z\"}}', NULL, '2025-06-24 06:52:49', '2025-06-24 06:52:49'),
(591, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"nombre_jours\":9,\"date_debut\":\"2024-07-01T00:00:00.000000Z\",\"date_fin\":\"2024-07-11T00:00:00.000000Z\",\"date_decision\":\"2024-07-01T00:00:00.000000Z\",\"numero_decision\":\"E\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T07:53:24.000000Z\",\"updated_at\":\"2025-06-24T07:53:24.000000Z\"}}', NULL, '2025-06-24 06:53:24', '2025-06-24 06:53:24'),
(592, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":11,\"type_conge_id\":5,\"nombre_jours\":30,\"date_debut\":\"2024-08-01T00:00:00.000000Z\",\"date_fin\":\"2024-09-01T00:00:00.000000Z\",\"date_decision\":\"2024-08-01T00:00:00.000000Z\",\"numero_decision\":\"HAJ76\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T07:59:36.000000Z\",\"updated_at\":\"2025-06-24T07:59:36.000000Z\"}}', NULL, '2025-06-24 06:59:36', '2025-06-24 06:59:36'),
(593, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":14,\"fonctionnaire_id\":16,\"type_conge_id\":7,\"nombre_jours\":90,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-31T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"1MATERNITE\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:00:13.000000Z\",\"updated_at\":\"2025-06-24T08:00:13.000000Z\"}}', NULL, '2025-06-24 07:00:13', '2025-06-24 07:00:13'),
(594, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":15,\"fonctionnaire_id\":10,\"type_conge_id\":8,\"nombre_jours\":11,\"date_debut\":\"2024-03-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-11T00:00:00.000000Z\",\"date_decision\":\"2024-03-01T00:00:00.000000Z\",\"numero_decision\":\"AZ\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:03:52.000000Z\",\"updated_at\":\"2025-06-24T08:03:52.000000Z\"}}', NULL, '2025-06-24 07:03:52', '2025-06-24 07:03:52'),
(595, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":6,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":11,\"jours\":4,\"date_depot\":\"2024-06-24\",\"date_debut\":\"2024-06-24\",\"created_at\":\"2025-06-24T08:04:57.000000Z\",\"updated_at\":\"2025-06-24T08:04:57.000000Z\"}}', NULL, '2025-06-24 07:04:57', '2025-06-24 07:04:57'),
(596, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"observation\":null,\"url\":null,\"type_certificate_id\":4,\"fonctionnaire_id\":11,\"jours\":30,\"date_depot\":\"2024-11-24\",\"date_debut\":\"2024-11-24\",\"created_at\":\"2025-06-24T08:05:23.000000Z\",\"updated_at\":\"2025-06-24T08:05:23.000000Z\"}}', NULL, '2025-06-24 07:05:23', '2025-06-24 07:05:23'),
(600, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 38, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":38,\"fonctionnaire_id\":8,\"type_mutation_id\":4,\"date_mutation\":\"1994-07-03\",\"date_note\":\"1994-07-04\",\"ref_note\":\"SRF\",\"fichiers_notes\":\"1748348225.pdf\",\"formation_sanitaire_origine_id\":14,\"formation_sanitaire_destination_id\":14,\"remarque\":null,\"date_prise_en_service\":\"1994-07-04\",\"date_cessation_service\":null,\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-06-24T08:07:33.000000Z\",\"updated_at\":\"2025-06-24T08:07:33.000000Z\"}}', NULL, '2025-06-24 07:07:33', '2025-06-24 07:07:33'),
(601, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 39, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":39,\"fonctionnaire_id\":8,\"type_mutation_id\":4,\"date_mutation\":\"1994-07-03\",\"date_note\":\"2024-01-01\",\"ref_note\":\"S\",\"fichiers_notes\":\"fichiers_notes\\/X7x5wczqso0wOTg8oDTt6BKAezLNnQ50JZeAMJP7.png\",\"formation_sanitaire_origine_id\":14,\"formation_sanitaire_destination_id\":20,\"remarque\":\"ED\",\"date_prise_en_service\":\"2024-01-01\",\"date_cessation_service\":\"2023-12-31\",\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-06-24T08:07:33.000000Z\",\"updated_at\":\"2025-06-24T08:07:33.000000Z\"}}', NULL, '2025-06-24 07:07:33', '2025-06-24 07:07:33'),
(602, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_formation_sanitaire_id\":20,\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"fichier_note\":\"fichiers_notes\\/X7x5wczqso0wOTg8oDTt6BKAezLNnQ50JZeAMJP7.png\",\"ref_note\":\"S\",\"updated_at\":\"2025-06-24T08:07:33.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":14,\"date_prise_en_service\":\"1994-07-04\",\"date_note\":\"1994-07-04\",\"fichier_note\":\"1748348225.pdf\",\"ref_note\":\"SRF\",\"updated_at\":\"2025-06-01T16:58:16.000000Z\"}}', NULL, '2025-06-24 07:07:33', '2025-06-24 07:07:33'),
(603, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 40, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":40,\"fonctionnaire_id\":8,\"type_mutation_id\":4,\"date_mutation\":\"1994-07-03\",\"date_note\":\"2024-01-01\",\"ref_note\":\"S\",\"fichiers_notes\":\"fichiers_notes\\/FK4mNhyTZyww1CpKMFTZnJdlp1ME7YzKsRrESkM4.png\",\"formation_sanitaire_origine_id\":14,\"formation_sanitaire_destination_id\":20,\"remarque\":\"ED\",\"date_prise_en_service\":\"2024-01-01\",\"date_cessation_service\":\"2023-12-31\",\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":12,\"nouveau_specialite_id\":12,\"created_at\":\"2025-06-24T08:07:33.000000Z\",\"updated_at\":\"2025-06-24T08:07:33.000000Z\"}}', NULL, '2025-06-24 07:07:34', '2025-06-24 07:07:34'),
(604, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"fichier_note\":\"fichiers_notes\\/FK4mNhyTZyww1CpKMFTZnJdlp1ME7YzKsRrESkM4.png\",\"updated_at\":\"2025-06-24T08:07:34.000000Z\"},\"old\":{\"fichier_note\":\"fichiers_notes\\/X7x5wczqso0wOTg8oDTt6BKAezLNnQ50JZeAMJP7.png\",\"updated_at\":\"2025-06-24T08:07:33.000000Z\"}}', NULL, '2025-06-24 07:07:34', '2025-06-24 07:07:34'),
(605, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":7,\"ancien_position_id\":2,\"nouveaux_position_id\":7,\"date_cessation_service\":\"2024-02-02\",\"date_prise_en_service\":\"2025-02-02\",\"remarque\":null,\"date_note\":\"2024-02-02\",\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-24T08:08:55.000000Z\",\"updated_at\":\"2025-06-24T08:08:55.000000Z\"}}', NULL, '2025-06-24 07:08:55', '2025-06-24 07:08:55'),
(606, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":7,\"updated_at\":\"2025-06-24T08:08:55.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-05-27T12:12:36.000000Z\"}}', NULL, '2025-06-24 07:08:55', '2025-06-24 07:08:55'),
(607, 'Grève', 'created', 'App\\Models\\Greve', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":7,\"date_debut\":\"2024-01-01\",\"date_fin\":\"2024-01-02\",\"remarque\":null,\"created_at\":\"2025-06-24T08:09:37.000000Z\",\"updated_at\":\"2025-06-24T08:09:37.000000Z\"}}', NULL, '2025-06-24 07:09:37', '2025-06-24 07:09:37'),
(608, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"observation\":null,\"url\":null,\"type_certificate_id\":5,\"fonctionnaire_id\":7,\"jours\":90,\"date_depot\":\"2023-10-01\",\"date_debut\":\"2024-01-01\",\"created_at\":\"2025-06-24T08:10:20.000000Z\",\"updated_at\":\"2025-06-24T08:10:20.000000Z\"}}', NULL, '2025-06-24 07:10:20', '2025-06-24 07:10:20'),
(609, 'Grève', 'created', 'App\\Models\\Greve', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":7,\"date_debut\":\"2023-11-01\",\"date_fin\":\"2023-11-04\",\"remarque\":null,\"created_at\":\"2025-06-24T08:10:53.000000Z\",\"updated_at\":\"2025-06-24T08:10:53.000000Z\"}}', NULL, '2025-06-24 07:10:53', '2025-06-24 07:10:53'),
(610, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":41,\"fonctionnaire_id\":16,\"type_mutation_id\":4,\"date_mutation\":\"1995-12-01\",\"date_note\":\"1995-12-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"1995-12-01\",\"date_cessation_service\":null,\"ancien_service_id\":30,\"nouveau_service_id\":30,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":13,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":22,\"created_at\":\"2025-06-24T08:12:38.000000Z\",\"updated_at\":\"2025-06-24T08:12:38.000000Z\"}}', NULL, '2025-06-24 07:12:38', '2025-06-24 07:12:38'),
(611, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":42,\"fonctionnaire_id\":16,\"type_mutation_id\":1,\"date_mutation\":\"1995-12-01\",\"date_note\":\"2024-06-06\",\"ref_note\":\"SS\",\"fichiers_notes\":\"fichiers_notes\\/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":9,\"remarque\":\"AZ\",\"date_prise_en_service\":\"2024-06-07\",\"date_cessation_service\":\"2024-06-06\",\"ancien_service_id\":30,\"nouveau_service_id\":25,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":13,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":22,\"created_at\":\"2025-06-24T08:12:38.000000Z\",\"updated_at\":\"2025-06-24T08:12:38.000000Z\"}}', NULL, '2025-06-24 07:12:38', '2025-06-24 07:12:38'),
(612, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_formation_sanitaire_id\":9,\"service_id\":25,\"type_mutation\":1,\"date_prise_en_service\":\"2024-06-07\",\"date_note\":\"2024-06-06\",\"fichier_note\":\"fichiers_notes\\/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png\",\"ref_note\":\"SS\",\"updated_at\":\"2025-06-24T08:12:38.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":6,\"service_id\":30,\"type_mutation\":4,\"date_prise_en_service\":\"1995-12-01\",\"date_note\":\"1995-12-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-06-23T22:40:14.000000Z\"}}', NULL, '2025-06-24 07:12:38', '2025-06-24 07:12:38'),
(613, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":16,\"ancien_position_id\":2,\"nouveaux_position_id\":4,\"date_cessation_service\":\"2024-09-06\",\"date_prise_en_service\":\"2024-06-06\",\"remarque\":null,\"date_note\":\"2024-09-06\",\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"d\\u00e9ces\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-24T08:13:36.000000Z\",\"updated_at\":\"2025-06-24T08:13:36.000000Z\"}}', NULL, '2025-06-24 07:13:36', '2025-06-24 07:13:36'),
(614, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":4,\"updated_at\":\"2025-06-24T08:13:36.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-06-24T08:12:38.000000Z\"}}', NULL, '2025-06-24 07:13:36', '2025-06-24 07:13:36'),
(615, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":16,\"jours\":5,\"date_depot\":\"2024-02-02\",\"date_debut\":\"2024-02-02\",\"created_at\":\"2025-06-24T08:14:07.000000Z\",\"updated_at\":\"2025-06-24T08:14:07.000000Z\"}}', NULL, '2025-06-24 07:14:07', '2025-06-24 07:14:07'),
(616, 'Grève', 'created', 'App\\Models\\Greve', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":16,\"date_debut\":\"2024-04-04\",\"date_fin\":\"2024-04-07\",\"remarque\":null,\"created_at\":\"2025-06-24T08:14:34.000000Z\",\"updated_at\":\"2025-06-24T08:14:34.000000Z\"}}', NULL, '2025-06-24 07:14:34', '2025-06-24 07:14:34'),
(617, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":15,\"ancien_position_id\":2,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2024-11-08\",\"date_prise_en_service\":null,\"remarque\":null,\"date_note\":\"2024-11-08\",\"ref_note\":\"QER\",\"fichiers_notes\":null,\"type\":\"conseildisciplinaire\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-24T08:15:15.000000Z\",\"updated_at\":\"2025-06-24T08:15:15.000000Z\"}}', NULL, '2025-06-24 07:15:15', '2025-06-24 07:15:15'),
(618, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":3,\"updated_at\":\"2025-06-24T08:15:15.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-06-23T21:49:23.000000Z\"}}', NULL, '2025-06-24 07:15:15', '2025-06-24 07:15:15'),
(619, 'Grève', 'created', 'App\\Models\\Greve', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":15,\"date_debut\":\"2024-03-03\",\"date_fin\":\"2024-03-05\",\"remarque\":null,\"created_at\":\"2025-06-24T08:15:47.000000Z\",\"updated_at\":\"2025-06-24T08:15:47.000000Z\"}}', NULL, '2025-06-24 07:15:47', '2025-06-24 07:15:47'),
(620, 'Type Mutation', 'created', 'App\\Models\\TypeMutation', 'created', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":13,\"nom\":\"Mise a la disposition\",\"nom_arabe\":\"\\u0627\\u0644\\u0648\\u0636\\u0639 \\u0631\\u0647\\u0646 \\u0627\\u0634\\u0627\\u0631\\u0629\",\"created_at\":\"2025-06-24T08:17:16.000000Z\",\"updated_at\":\"2025-06-24T08:17:16.000000Z\"}}', NULL, '2025-06-24 07:17:16', '2025-06-24 07:17:16'),
(622, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 44, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":44,\"fonctionnaire_id\":14,\"type_mutation_id\":4,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"ref_note\":\"H\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2011-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":33,\"nouveau_service_id\":33,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":14,\"created_at\":\"2025-06-24T08:19:28.000000Z\",\"updated_at\":\"2025-06-24T08:19:28.000000Z\"}}', NULL, '2025-06-24 07:19:28', '2025-06-24 07:19:28');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(623, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 45, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":45,\"fonctionnaire_id\":14,\"type_mutation_id\":8,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2024-01-02\",\"ref_note\":\"ZD\",\"fichiers_notes\":\"fichiers_notes\\/jXWhpXlxj3fzdkxOegy1v2lZeeZrIU86SxrbWgo1.png\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":11,\"remarque\":\"ADZ\",\"date_prise_en_service\":\"2024-01-02\",\"date_cessation_service\":\"2024-01-01\",\"ancien_service_id\":33,\"nouveau_service_id\":26,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":14,\"created_at\":\"2025-06-24T08:19:28.000000Z\",\"updated_at\":\"2025-06-24T08:19:28.000000Z\"}}', NULL, '2025-06-24 07:19:28', '2025-06-24 07:19:28'),
(624, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_formation_sanitaire_id\":11,\"service_id\":26,\"type_mutation\":8,\"date_prise_en_service\":\"2024-01-02\",\"date_note\":\"2024-01-02\",\"fichier_note\":\"fichiers_notes\\/jXWhpXlxj3fzdkxOegy1v2lZeeZrIU86SxrbWgo1.png\",\"ref_note\":\"ZD\",\"updated_at\":\"2025-06-24T08:19:28.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":6,\"service_id\":33,\"type_mutation\":4,\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"fichier_note\":\"\",\"ref_note\":\"H\",\"updated_at\":\"2025-06-23T23:01:47.000000Z\"}}', NULL, '2025-06-24 07:19:28', '2025-06-24 07:19:28'),
(625, 'PositionHistorique', 'deleted', 'App\\Models\\PositionHistorique', 'deleted', 7, 'App\\Models\\User', 4, '{\"old\":{\"id\":7,\"fonctionnaire_id\":14,\"ancien_position_id\":2,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-06-23\",\"date_prise_en_service\":null,\"remarque\":null,\"date_note\":\"2025-06-23\",\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-23T23:01:47.000000Z\",\"updated_at\":\"2025-06-23T23:01:47.000000Z\"}}', NULL, '2025-06-24 07:19:54', '2025-06-24 07:19:54'),
(626, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":14,\"jours\":3,\"date_depot\":\"2024-06-24\",\"date_debut\":\"2024-06-24\",\"created_at\":\"2025-06-24T08:20:56.000000Z\",\"updated_at\":\"2025-06-24T08:20:56.000000Z\"}}', NULL, '2025-06-24 07:20:56', '2025-06-24 07:20:56'),
(627, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":16,\"fonctionnaire_id\":14,\"type_conge_id\":3,\"nombre_jours\":5,\"date_debut\":\"2024-05-05T00:00:00.000000Z\",\"date_fin\":\"2024-05-09T00:00:00.000000Z\",\"date_decision\":\"2024-05-05T00:00:00.000000Z\",\"numero_decision\":\"S\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:25:40.000000Z\",\"updated_at\":\"2025-06-24T08:25:40.000000Z\"}}', NULL, '2025-06-24 07:25:40', '2025-06-24 07:25:40'),
(628, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":17,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"nombre_jours\":3,\"date_debut\":\"2024-09-09T00:00:00.000000Z\",\"date_fin\":\"2024-09-11T00:00:00.000000Z\",\"date_decision\":\"2024-09-09T00:00:00.000000Z\",\"numero_decision\":\"AZ\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:26:05.000000Z\",\"updated_at\":\"2025-06-24T08:26:05.000000Z\"}}', NULL, '2025-06-24 07:26:05', '2025-06-24 07:26:05'),
(629, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":4,\"fonctionnaire_id\":16,\"type_retraite\":\"anticipee\",\"date_retraite\":\"2024-05-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"48.7\",\"annees_service\":\"28.4\",\"motif\":\"DOSSIER MEDICALE\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-06-24T08:26:49.000000Z\",\"updated_at\":\"2025-06-24T08:26:49.000000Z\"}}', NULL, '2025-06-24 07:26:49', '2025-06-24 07:26:49'),
(630, 'default', 'Dossier de retraite créé', 'App\\Models\\Retraite', NULL, 4, 'App\\Models\\User', 4, '{\"fonctionnaire\":\"HANANE KAMILA\",\"type\":\"anticipee\"}', NULL, '2025-06-24 07:26:49', '2025-06-24 07:26:49'),
(631, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"ppr\":\"767676\",\"nom\":\"NACIRI\",\"nom_arabe\":\"\",\"prenom\":\"IMANE\",\"prenom_arabe\":\"\",\"cin\":\"CH6767\",\"sexe\":\"F\",\"date_naissance\":\"1950-01-01\",\"date_embauche\":\"1970-02-01\",\"email\":\"\",\"telephone\":\"A@GMAIL.COM\",\"adresse\":\"\",\"fonction_id\":16,\"nom_formation_sanitaire_id\":17,\"remarques\":\"\",\"service_id\":29,\"specialite_grade_id\":7,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1970-02-01\",\"date_prise_en_service\":\"1970-02-01\",\"date_note\":\"1970-02-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-06-24T08:29:04.000000Z\",\"updated_at\":\"2025-06-24T08:29:04.000000Z\"}}', NULL, '2025-06-24 07:29:04', '2025-06-24 07:29:04'),
(632, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 113, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":113,\"fonctionnaire_id\":20,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(633, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 114, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":114,\"fonctionnaire_id\":20,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(634, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 115, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":115,\"fonctionnaire_id\":20,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(635, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 116, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":116,\"fonctionnaire_id\":20,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(636, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 117, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":117,\"fonctionnaire_id\":20,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(637, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 118, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":118,\"fonctionnaire_id\":20,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(638, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 119, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":119,\"fonctionnaire_id\":20,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(639, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 120, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":120,\"fonctionnaire_id\":20,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-24T08:29:46.000000Z\",\"updated_at\":\"2025-06-24T08:29:46.000000Z\"}}', NULL, '2025-06-24 07:29:46', '2025-06-24 07:29:46'),
(640, 'Grève', 'created', 'App\\Models\\Greve', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":20,\"date_debut\":\"2024-08-08\",\"date_fin\":\"2024-08-11\",\"remarque\":null,\"created_at\":\"2025-06-24T08:30:13.000000Z\",\"updated_at\":\"2025-06-24T08:30:13.000000Z\"}}', NULL, '2025-06-24 07:30:13', '2025-06-24 07:30:13'),
(641, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 46, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":46,\"fonctionnaire_id\":20,\"type_mutation_id\":4,\"date_mutation\":\"1970-02-01\",\"date_note\":\"1970-02-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":17,\"remarque\":null,\"date_prise_en_service\":\"1970-02-01\",\"date_cessation_service\":null,\"ancien_service_id\":29,\"nouveau_service_id\":29,\"ancien_fonction_id\":16,\"nouveau_fonction_id\":16,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-06-24T08:31:45.000000Z\",\"updated_at\":\"2025-06-24T08:31:45.000000Z\"}}', NULL, '2025-06-24 07:31:45', '2025-06-24 07:31:45'),
(642, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 47, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":47,\"fonctionnaire_id\":20,\"type_mutation_id\":6,\"date_mutation\":\"1970-02-01\",\"date_note\":\"1990-02-01\",\"ref_note\":\"Z\",\"fichiers_notes\":\"fichiers_notes\\/G51diyfcIm8lQ0PyLwSnYQxnIfFq51oJo20EVYUo.png\",\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":8,\"remarque\":\"E\",\"date_prise_en_service\":\"1990-02-01\",\"date_cessation_service\":\"1990-02-01\",\"ancien_service_id\":29,\"nouveau_service_id\":27,\"ancien_fonction_id\":16,\"nouveau_fonction_id\":10,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":7,\"created_at\":\"2025-06-24T08:31:45.000000Z\",\"updated_at\":\"2025-06-24T08:31:45.000000Z\"}}', NULL, '2025-06-24 07:31:45', '2025-06-24 07:31:45'),
(643, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":10,\"nom_formation_sanitaire_id\":8,\"service_id\":27,\"type_mutation\":6,\"date_prise_en_service\":\"1990-02-01\",\"date_note\":\"1990-02-01\",\"fichier_note\":\"fichiers_notes\\/G51diyfcIm8lQ0PyLwSnYQxnIfFq51oJo20EVYUo.png\",\"ref_note\":\"Z\",\"updated_at\":\"2025-06-24T08:31:45.000000Z\"},\"old\":{\"fonction_id\":16,\"nom_formation_sanitaire_id\":17,\"service_id\":29,\"type_mutation\":4,\"date_prise_en_service\":\"1970-02-01\",\"date_note\":\"1970-02-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-06-24T08:29:04.000000Z\"}}', NULL, '2025-06-24 07:31:45', '2025-06-24 07:31:45'),
(644, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":18,\"fonctionnaire_id\":20,\"type_conge_id\":1,\"nombre_jours\":17,\"date_debut\":\"2024-05-05T00:00:00.000000Z\",\"date_fin\":\"2024-05-16T00:00:00.000000Z\",\"date_decision\":\"2024-05-05T00:00:00.000000Z\",\"numero_decision\":\"A\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:32:58.000000Z\",\"updated_at\":\"2025-06-24T08:32:58.000000Z\"}}', NULL, '2025-06-24 07:32:58', '2025-06-24 07:32:58'),
(645, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"fonctionnaire_id\":20,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-06-24T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"75.5\",\"annees_service\":\"55.4\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (62.5 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-06-24T08:33:12.000000Z\",\"updated_at\":\"2025-06-24T08:33:12.000000Z\"}}', NULL, '2025-06-24 07:33:12', '2025-06-24 07:33:12'),
(646, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 41, 'App\\Models\\User', 4, '{\"old\":{\"id\":41,\"fonctionnaire_id\":16,\"type_mutation_id\":4,\"date_mutation\":\"1995-12-01\",\"date_note\":\"1995-12-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"1995-12-01\",\"date_cessation_service\":null,\"ancien_service_id\":30,\"nouveau_service_id\":30,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":13,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":22,\"created_at\":\"2025-06-24T08:12:38.000000Z\",\"updated_at\":\"2025-06-24T08:12:38.000000Z\"}}', NULL, '2025-06-24 08:07:34', '2025-06-24 08:07:34'),
(647, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 42, 'App\\Models\\User', 4, '{\"old\":{\"id\":42,\"fonctionnaire_id\":16,\"type_mutation_id\":1,\"date_mutation\":\"1995-12-01\",\"date_note\":\"2024-06-06\",\"ref_note\":\"SS\",\"fichiers_notes\":\"fichiers_notes\\/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":9,\"remarque\":\"AZ\",\"date_prise_en_service\":\"2024-06-07\",\"date_cessation_service\":\"2024-06-06\",\"ancien_service_id\":30,\"nouveau_service_id\":25,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":13,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":22,\"created_at\":\"2025-06-24T08:12:38.000000Z\",\"updated_at\":\"2025-06-24T08:12:38.000000Z\"}}', NULL, '2025-06-24 08:07:41', '2025-06-24 08:07:41'),
(648, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"fonctionnaire_id\":12,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-01-11T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"JH\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-29T13:26:07.000000Z\",\"updated_at\":\"2025-06-29T13:26:07.000000Z\"}}', NULL, '2025-06-29 12:26:07', '2025-06-29 12:26:07'),
(649, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"ppr\":\"0090909\",\"nom\":\"TAMNSOURT\",\"nom_arabe\":\"\\u062a\\u0645\\u0646\\u0635\\u0648\\u0631\\u062a\",\"prenom\":\"HICHAM\",\"prenom_arabe\":\"\\u0647\\u0634\\u0627\\u0645\",\"cin\":\"CD324\",\"sexe\":\"M\",\"date_naissance\":\"1990-01-01\",\"date_embauche\":\"2011-01-01\",\"email\":\"JJGJ@GMAIL.COM\",\"telephone\":\"34224\",\"adresse\":\"\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":18,\"remarques\":\"ZER\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":6,\"date_mutation\":\"2022-01-01\",\"date_prise_en_service\":\"2022-02-02\",\"date_note\":\"2022-02-02\",\"fichier_note\":\"\",\"ref_note\":\"ZER\",\"created_at\":\"2025-06-29T13:56:36.000000Z\",\"updated_at\":\"2025-06-29T13:56:36.000000Z\"}}', NULL, '2025-06-29 12:56:36', '2025-06-29 12:56:36'),
(650, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":24,\"nom\":\"INFORMATIQUE\",\"nom_arabe\":\"\\u0645\\u0639\\u0644\\u0648\\u0645\\u064a\\u0627\\u062a\",\"grade_id\":2,\"created_at\":\"2025-06-29T13:57:43.000000Z\",\"updated_at\":\"2025-06-29T13:57:43.000000Z\"}}', NULL, '2025-06-29 12:57:43', '2025-06-29 12:57:43'),
(651, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"adresse\":null,\"specialite_grade_id\":24,\"updated_at\":\"2025-06-29T13:58:25.000000Z\"},\"old\":{\"adresse\":\"\",\"specialite_grade_id\":5,\"updated_at\":\"2025-06-29T13:56:36.000000Z\"}}', NULL, '2025-06-29 12:58:25', '2025-06-29 12:58:25'),
(652, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 121, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":121,\"fonctionnaire_id\":21,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(653, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 122, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":122,\"fonctionnaire_id\":21,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(654, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 123, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":123,\"fonctionnaire_id\":21,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(655, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 124, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":124,\"fonctionnaire_id\":21,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(656, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 125, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":125,\"fonctionnaire_id\":21,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(657, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 126, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":126,\"fonctionnaire_id\":21,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(658, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 127, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":127,\"fonctionnaire_id\":21,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(659, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 128, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":128,\"fonctionnaire_id\":21,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-06-29T13:58:37.000000Z\",\"updated_at\":\"2025-06-29T13:58:37.000000Z\"}}', NULL, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(660, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"service_id\":38,\"updated_at\":\"2025-06-29T14:00:09.000000Z\"},\"old\":{\"service_id\":24,\"updated_at\":\"2025-06-29T13:58:25.000000Z\"}}', NULL, '2025-06-29 13:00:09', '2025-06-29 13:00:09'),
(661, 'Les arrondissements et les communes', 'updated', 'App\\Models\\ArrondissementCommune', 'updated', 213, 'App\\Models\\User', 4, '{\"attributes\":{\"ville_id\":14,\"updated_at\":\"2025-06-29T14:04:02.000000Z\"},\"old\":{\"ville_id\":2,\"updated_at\":\"2025-05-24T15:37:32.000000Z\"}}', NULL, '2025-06-29 13:04:02', '2025-06-29 13:04:02'),
(663, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 49, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":49,\"fonctionnaire_id\":21,\"type_mutation_id\":6,\"date_mutation\":\"2022-01-01\",\"date_note\":\"2022-02-02\",\"ref_note\":\"ZER\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":18,\"remarque\":null,\"date_prise_en_service\":\"2022-02-02\",\"date_cessation_service\":null,\"ancien_service_id\":38,\"nouveau_service_id\":38,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":24,\"nouveau_specialite_id\":24,\"created_at\":\"2025-06-29T14:06:21.000000Z\",\"updated_at\":\"2025-06-29T14:06:21.000000Z\"}}', NULL, '2025-06-29 13:06:21', '2025-06-29 13:06:21'),
(664, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 50, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":50,\"fonctionnaire_id\":21,\"type_mutation_id\":6,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"EZER\",\"fichiers_notes\":\"fichiers_notes\\/10195bynPyOp2iD7WwTpfVWWgHHY49CdvRxqL9Hh.png\",\"formation_sanitaire_origine_id\":18,\"formation_sanitaire_destination_id\":19,\"remarque\":\"ZER\",\"date_prise_en_service\":\"2025-02-02\",\"date_cessation_service\":\"2025-01-28\",\"ancien_service_id\":38,\"nouveau_service_id\":38,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":24,\"nouveau_specialite_id\":15,\"created_at\":\"2025-06-29T14:06:21.000000Z\",\"updated_at\":\"2025-06-29T14:06:21.000000Z\"}}', NULL, '2025-06-29 13:06:21', '2025-06-29 13:06:21'),
(665, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":22,\"nom_formation_sanitaire_id\":19,\"specialite_grade_id\":15,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-02-02\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"fichiers_notes\\/10195bynPyOp2iD7WwTpfVWWgHHY49CdvRxqL9Hh.png\",\"ref_note\":\"EZER\",\"updated_at\":\"2025-06-29T14:06:21.000000Z\"},\"old\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":18,\"specialite_grade_id\":24,\"date_mutation\":\"2022-01-01\",\"date_prise_en_service\":\"2022-02-02\",\"date_note\":\"2022-02-02\",\"fichier_note\":\"\",\"ref_note\":\"ZER\",\"updated_at\":\"2025-06-29T14:00:09.000000Z\"}}', NULL, '2025-06-29 13:06:21', '2025-06-29 13:06:21'),
(666, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":24,\"updated_at\":\"2025-06-29T14:08:23.000000Z\"},\"old\":{\"specialite_grade_id\":15,\"updated_at\":\"2025-06-29T14:06:21.000000Z\"}}', NULL, '2025-06-29 13:08:23', '2025-06-29 13:08:23'),
(667, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":21,\"ancien_position_id\":2,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-03-01\",\"date_prise_en_service\":\"2025-05-01\",\"remarque\":\"ZER\",\"date_note\":\"2025-03-01\",\"ref_note\":\"ZER\",\"fichiers_notes\":null,\"type\":\"conseildisciplinaire\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-29T14:14:10.000000Z\",\"updated_at\":\"2025-06-29T14:14:10.000000Z\"}}', NULL, '2025-06-29 13:14:10', '2025-06-29 13:14:10'),
(668, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":3,\"updated_at\":\"2025-06-29T14:14:10.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-06-29T14:08:23.000000Z\"}}', NULL, '2025-06-29 13:14:10', '2025-06-29 13:14:10'),
(669, 'HistoriqueMutation', 'updated', 'App\\Models\\HistoriqueMutation', 'updated', 50, 'App\\Models\\User', 4, '{\"attributes\":{\"type_mutation_id\":5,\"updated_at\":\"2025-06-29T14:18:04.000000Z\"},\"old\":{\"type_mutation_id\":6,\"updated_at\":\"2025-06-29T14:06:21.000000Z\"}}', NULL, '2025-06-29 13:18:04', '2025-06-29 13:18:04'),
(670, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":15,\"type_mutation\":5,\"updated_at\":\"2025-06-29T14:18:04.000000Z\"},\"old\":{\"specialite_grade_id\":24,\"type_mutation\":6,\"updated_at\":\"2025-06-29T14:14:10.000000Z\"}}', NULL, '2025-06-29 13:18:04', '2025-06-29 13:18:04'),
(671, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":21,\"ancien_position_id\":3,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-05-01\",\"date_prise_en_service\":\"2027-05-01\",\"remarque\":\"ZRE\",\"date_note\":\"2027-05-01\",\"ref_note\":\"ZE\",\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-29T14:20:05.000000Z\",\"updated_at\":\"2025-06-29T14:20:05.000000Z\"}}', NULL, '2025-06-29 13:20:05', '2025-06-29 13:20:05'),
(672, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":5,\"updated_at\":\"2025-06-29T14:20:05.000000Z\"},\"old\":{\"position_id\":3,\"updated_at\":\"2025-06-29T14:18:04.000000Z\"}}', NULL, '2025-06-29 13:20:05', '2025-06-29 13:20:05'),
(673, 'PositionHistorique', 'deleted', 'App\\Models\\PositionHistorique', 'deleted', 11, 'App\\Models\\User', 4, '{\"old\":{\"id\":11,\"fonctionnaire_id\":21,\"ancien_position_id\":2,\"nouveaux_position_id\":3,\"date_cessation_service\":\"2025-03-01\",\"date_prise_en_service\":\"2025-05-01\",\"remarque\":\"ZER\",\"date_note\":\"2025-03-01\",\"ref_note\":\"ZER\",\"fichiers_notes\":null,\"type\":\"conseildisciplinaire\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-29T14:14:10.000000Z\",\"updated_at\":\"2025-06-29T14:14:10.000000Z\"}}', NULL, '2025-06-29 13:28:33', '2025-06-29 13:28:33'),
(674, 'Stage', 'updated', 'App\\Models\\Stage', 'updated', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"statut_attestation\":\"trait\\u00e9\",\"updated_at\":\"2025-06-29T14:32:26.000000Z\"},\"old\":{\"statut_attestation\":\"en cours\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-06-29 13:32:26', '2025-06-29 13:32:26'),
(675, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 45, 'App\\Models\\User', 4, '{\"old\":{\"id\":45,\"fonctionnaire_id\":14,\"type_mutation_id\":8,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2024-01-02\",\"ref_note\":\"ZD\",\"fichiers_notes\":\"fichiers_notes\\/jXWhpXlxj3fzdkxOegy1v2lZeeZrIU86SxrbWgo1.png\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":11,\"remarque\":\"ADZ\",\"date_prise_en_service\":\"2024-01-02\",\"date_cessation_service\":\"2024-01-01\",\"ancien_service_id\":33,\"nouveau_service_id\":26,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":14,\"created_at\":\"2025-06-24T08:19:28.000000Z\",\"updated_at\":\"2025-06-24T08:19:28.000000Z\"}}', NULL, '2025-06-29 13:35:09', '2025-06-29 13:35:09'),
(676, 'HistoriqueMutation', 'deleted', 'App\\Models\\HistoriqueMutation', 'deleted', 44, 'App\\Models\\User', 4, '{\"old\":{\"id\":44,\"fonctionnaire_id\":14,\"type_mutation_id\":4,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"ref_note\":\"H\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2011-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":33,\"nouveau_service_id\":33,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":14,\"created_at\":\"2025-06-24T08:19:28.000000Z\",\"updated_at\":\"2025-06-24T08:19:28.000000Z\"}}', NULL, '2025-06-29 13:35:19', '2025-06-29 13:35:19'),
(677, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":2,\"updated_at\":\"2025-06-29T14:35:57.000000Z\"},\"old\":{\"position_id\":5,\"updated_at\":\"2025-06-24T08:19:28.000000Z\"}}', NULL, '2025-06-29 13:35:57', '2025-06-29 13:35:57'),
(678, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"fonctionnaire_id\":14,\"type_conge_id\":1,\"nombre_jours\":3,\"date_debut\":\"2026-01-01T00:00:00.000000Z\",\"date_fin\":\"2026-01-04T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"FG\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T14:24:20.000000Z\",\"updated_at\":\"2025-07-05T14:24:20.000000Z\"}}', NULL, '2025-07-05 13:24:20', '2025-07-05 13:24:20'),
(679, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"fonctionnaire_id\":12,\"type_conge_id\":5,\"nombre_jours\":34,\"date_debut\":\"2025-03-03T00:00:00.000000Z\",\"date_fin\":\"2025-04-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"D\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T14:28:52.000000Z\",\"updated_at\":\"2025-07-05T14:28:52.000000Z\"}}', NULL, '2025-07-05 13:28:52', '2025-07-05 13:28:52'),
(680, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 21, 'App\\Models\\User', 4, '{\"old\":{\"id\":21,\"fonctionnaire_id\":12,\"type_conge_id\":5,\"nombre_jours\":34,\"date_debut\":\"2025-03-03T00:00:00.000000Z\",\"date_fin\":\"2025-04-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"D\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T14:28:52.000000Z\",\"updated_at\":\"2025-07-05T14:28:52.000000Z\"}}', NULL, '2025-07-05 13:32:08', '2025-07-05 13:32:08'),
(681, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 19, 'App\\Models\\User', 4, '{\"old\":{\"id\":19,\"fonctionnaire_id\":12,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-01-11T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"JH\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-29T13:26:07.000000Z\",\"updated_at\":\"2025-06-29T13:26:07.000000Z\"}}', NULL, '2025-07-05 13:32:17', '2025-07-05 13:32:17'),
(682, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 2, 'App\\Models\\User', 4, '{\"old\":{\"id\":2,\"fonctionnaire_id\":12,\"type_conge_id\":1,\"nombre_jours\":10,\"date_debut\":\"2025-06-13T00:00:00.000000Z\",\"date_fin\":\"2025-06-23T00:00:00.000000Z\",\"date_decision\":\"2025-06-13T00:00:00.000000Z\",\"numero_decision\":\"98\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-12T23:26:37.000000Z\",\"updated_at\":\"2025-06-12T23:26:37.000000Z\"}}', NULL, '2025-07-05 13:32:27', '2025-07-05 13:32:27'),
(683, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"fonctionnaire_id\":12,\"type_conge_id\":5,\"nombre_jours\":65,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-03-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"RS\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T14:33:08.000000Z\",\"updated_at\":\"2025-07-05T14:33:08.000000Z\"}}', NULL, '2025-07-05 13:33:08', '2025-07-05 13:33:08'),
(684, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 22, 'App\\Models\\User', 4, '{\"old\":{\"id\":22,\"fonctionnaire_id\":12,\"type_conge_id\":5,\"nombre_jours\":65,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-03-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"RS\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T14:33:08.000000Z\",\"updated_at\":\"2025-07-05T14:33:08.000000Z\"}}', NULL, '2025-07-05 13:39:19', '2025-07-05 13:39:19'),
(685, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"fonctionnaire_id\":21,\"type_conge_id\":2,\"nombre_jours\":2,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-03-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"3E\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T15:06:28.000000Z\",\"updated_at\":\"2025-07-05T15:06:28.000000Z\"}}', NULL, '2025-07-05 14:06:28', '2025-07-05 14:06:28'),
(686, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":24,\"fonctionnaire_id\":10,\"type_conge_id\":1,\"nombre_jours\":97,\"date_debut\":\"2026-09-09T00:00:00.000000Z\",\"date_fin\":\"2026-10-10T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"SD\",\"remarques\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T15:39:56.000000Z\",\"updated_at\":\"2025-07-05T15:39:56.000000Z\"}}', NULL, '2025-07-05 14:39:56', '2025-07-05 14:39:56'),
(687, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur Hopital ibn baytar\"],\"updated_at\":\"2025-07-05T15:59:52.000000Z\"},\"old\":{\"ampliations\":null,\"updated_at\":\"2025-07-05T15:39:56.000000Z\"}}', NULL, '2025-07-05 14:59:52', '2025-07-05 14:59:52'),
(688, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur Hopital ibn baytar\"],\"updated_at\":\"2025-07-05T16:00:02.000000Z\"},\"old\":{\"ampliations\":null,\"updated_at\":\"2025-07-05T15:06:28.000000Z\"}}', NULL, '2025-07-05 15:00:02', '2025-07-05 15:00:02'),
(689, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur Hopital ibn baytar\"],\"updated_at\":\"2025-07-05T16:00:10.000000Z\"},\"old\":{\"ampliations\":null,\"updated_at\":\"2025-07-05T14:24:20.000000Z\"}}', NULL, '2025-07-05 15:00:10', '2025-07-05 15:00:10'),
(690, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur Hopital ibn khatib\"],\"updated_at\":\"2025-07-05T16:06:55.000000Z\"},\"old\":{\"ampliations\":[\"M. directeur Hopital ibn baytar\"],\"updated_at\":\"2025-07-05T16:00:02.000000Z\"}}', NULL, '2025-07-05 15:06:56', '2025-07-05 15:06:56'),
(691, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":6,\"fonctionnaire_id\":19,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-01-01T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"35.4\",\"annees_service\":\"18.0\",\"motif\":null,\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T16:54:05.000000Z\",\"updated_at\":\"2025-07-05T16:54:05.000000Z\"}}', NULL, '2025-07-05 15:54:05', '2025-07-05 15:54:05'),
(692, 'default', 'Dossier de retraite créé', 'App\\Models\\Retraite', NULL, 6, 'App\\Models\\User', 4, '{\"fonctionnaire\":\"ABOUMEHDI HAFID\",\"type\":\"limite_age\"}', NULL, '2025-07-05 15:54:05', '2025-07-05 15:54:05'),
(693, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"date_naissance\":\"1963-07-03\",\"updated_at\":\"2025-07-05T16:57:26.000000Z\"},\"old\":{\"date_naissance\":\"1991-01-01\",\"updated_at\":\"2025-06-23T22:49:54.000000Z\"}}', NULL, '2025-07-05 15:57:26', '2025-07-05 15:57:26'),
(694, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"date_naissance\":\"1960-07-03\",\"updated_at\":\"2025-07-05T16:58:31.000000Z\"},\"old\":{\"date_naissance\":\"1963-07-03\",\"updated_at\":\"2025-07-05T16:57:26.000000Z\"}}', NULL, '2025-07-05 15:58:31', '2025-07-05 15:58:31'),
(695, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"fonctionnaire_id\":18,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-05-07T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"64.8\",\"annees_service\":\"16.3\",\"motif\":null,\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:01:01.000000Z\",\"updated_at\":\"2025-07-05T17:01:01.000000Z\"}}', NULL, '2025-07-05 16:01:01', '2025-07-05 16:01:01'),
(696, 'default', 'Dossier de retraite créé', 'App\\Models\\Retraite', NULL, 7, 'App\\Models\\User', 4, '{\"fonctionnaire\":\"BENANI MOHAMMED\",\"type\":\"limite_age\"}', NULL, '2025-07-05 16:01:01', '2025-07-05 16:01:01'),
(697, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"fonctionnaire_id\":7,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"56.6\",\"annees_service\":\"30.0\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (55 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:08:31.000000Z\",\"updated_at\":\"2025-07-05T17:08:31.000000Z\"}}', NULL, '2025-07-05 16:08:31', '2025-07-05 16:08:31'),
(698, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"fonctionnaire_id\":8,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"58.8\",\"annees_service\":\"30.9\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (55 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:08:31.000000Z\",\"updated_at\":\"2025-07-05T17:08:31.000000Z\"}}', NULL, '2025-07-05 16:08:31', '2025-07-05 16:08:31'),
(699, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"fonctionnaire_id\":10,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"55.7\",\"annees_service\":\"30.9\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (55 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:08:31.000000Z\",\"updated_at\":\"2025-07-05T17:08:31.000000Z\"}}', NULL, '2025-07-05 16:08:31', '2025-07-05 16:08:31'),
(700, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":15,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"55.5\",\"annees_service\":\"16.5\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (55 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:08:31.000000Z\",\"updated_at\":\"2025-07-05T17:08:31.000000Z\"}}', NULL, '2025-07-05 16:08:31', '2025-07-05 16:08:31'),
(701, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"date_naissance\":\"1960-08-01\",\"remarques\":null,\"updated_at\":\"2025-07-05T17:21:36.000000Z\"},\"old\":{\"date_naissance\":\"1989-08-01\",\"remarques\":\"\",\"updated_at\":\"2025-06-23T22:56:38.000000Z\"}}', NULL, '2025-07-05 16:21:36', '2025-07-05 16:21:36'),
(702, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"ppr\":\"211\",\"nom\":\"LAMRANI\",\"nom_arabe\":\"SFG\",\"prenom\":\"SIHAM\",\"prenom_arabe\":\"5G\",\"cin\":\"DS2333\",\"sexe\":\"M\",\"date_naissance\":\"1963-01-01\",\"date_embauche\":\"2020-01-01\",\"email\":\"ZER@GMAIL.COM\",\"telephone\":\"80090\",\"adresse\":\"ZER\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":8,\"remarques\":\"ER\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2020-01-01\",\"date_prise_en_service\":\"2020-01-01\",\"date_note\":\"2020-01-01\",\"fichier_note\":\"\",\"ref_note\":\"ZET\",\"created_at\":\"2025-07-05T17:23:33.000000Z\",\"updated_at\":\"2025-07-05T17:23:33.000000Z\"}}', NULL, '2025-07-05 16:23:33', '2025-07-05 16:23:33'),
(703, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":22,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-05T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"62.5\",\"annees_service\":\"5.5\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (51 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-05T17:23:54.000000Z\",\"updated_at\":\"2025-07-05T17:23:54.000000Z\"}}', NULL, '2025-07-05 16:23:54', '2025-07-05 16:23:54'),
(704, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"ppr\":\"887878\",\"nom\":\"SALMI\",\"nom_arabe\":\"SALIM\",\"prenom\":\"SALMI\",\"prenom_arabe\":\"SALIM\",\"cin\":\"AZE6666\",\"sexe\":\"M\",\"date_naissance\":\"1963-07-06\",\"date_embauche\":\"1999-01-01\",\"email\":\"ZEAZE@GMAIL.COM\",\"telephone\":\"34534\",\"adresse\":\"354\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"1999-01-01\",\"date_prise_en_service\":\"1999-01-01\",\"date_note\":\"1999-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-06T12:58:52.000000Z\",\"updated_at\":\"2025-07-06T12:58:52.000000Z\"}}', NULL, '2025-07-06 11:58:52', '2025-07-06 11:58:52'),
(705, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"date_naissance\":\"1962-07-06\",\"remarques\":null,\"ref_note\":\"Z\",\"updated_at\":\"2025-07-06T13:00:16.000000Z\"},\"old\":{\"date_naissance\":\"1963-07-06\",\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-07-06T12:58:52.000000Z\"}}', NULL, '2025-07-06 12:00:16', '2025-07-06 12:00:16'),
(706, 'default', 'created', 'App\\Models\\User', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"ABDLHAK\",\"email\":\"ABDLHAK@gmail.com\"}}', NULL, '2025-07-06 12:54:19', '2025-07-06 12:54:19'),
(707, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 4, '{\"roles\":[\"Utilisateur\"]}', NULL, '2025-07-06 12:54:19', '2025-07-06 12:54:19'),
(708, 'default', 'created', 'App\\Models\\User', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"mansour\",\"email\":\"mansour@gamil.com\"}}', NULL, '2025-07-06 12:54:48', '2025-07-06 12:54:48'),
(709, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 7, 'App\\Models\\User', 4, '{\"roles\":[\"conge\"]}', NULL, '2025-07-06 12:54:48', '2025-07-06 12:54:48'),
(710, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 129, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":129,\"fonctionnaire_id\":22,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-06T14:53:22.000000Z\",\"updated_at\":\"2025-07-06T14:53:22.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(711, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 130, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":130,\"fonctionnaire_id\":22,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(712, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 131, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":131,\"fonctionnaire_id\":22,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(713, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 132, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":132,\"fonctionnaire_id\":22,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(714, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 133, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":133,\"fonctionnaire_id\":22,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(715, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 134, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":134,\"fonctionnaire_id\":22,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(716, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 135, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":135,\"fonctionnaire_id\":22,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(717, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 136, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":136,\"fonctionnaire_id\":22,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-06T14:53:23.000000Z\",\"updated_at\":\"2025-07-06T14:53:23.000000Z\"}}', NULL, '2025-07-06 13:53:23', '2025-07-06 13:53:23'),
(718, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 25, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":25,\"fonctionnaire_id\":20,\"type_conge_id\":3,\"nombre_jours\":6,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-07T00:00:00.000000Z\",\"date_decision\":\"2025-01-01T00:00:00.000000Z\",\"numero_decision\":\"ZE\",\"remarques\":\"ZER\",\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-06T15:00:37.000000Z\",\"updated_at\":\"2025-07-06T15:00:37.000000Z\"}}', NULL, '2025-07-06 14:00:37', '2025-07-06 14:00:37'),
(719, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 7, 'App\\Models\\User', 4, '{\"old\":{\"id\":7,\"fonctionnaire_id\":15,\"type_conge_id\":1,\"nombre_jours\":15,\"date_debut\":\"2024-06-01T00:00:00.000000Z\",\"date_fin\":\"2024-06-15T00:00:00.000000Z\",\"date_decision\":\"2024-06-01T00:00:00.000000Z\",\"numero_decision\":\"ZE\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:09:02.000000Z\",\"updated_at\":\"2025-06-23T23:09:02.000000Z\"}}', NULL, '2025-07-06 14:12:38', '2025-07-06 14:12:38');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(720, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 25, 'App\\Models\\User', 4, '{\"old\":{\"id\":25,\"fonctionnaire_id\":20,\"type_conge_id\":3,\"nombre_jours\":6,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-07T00:00:00.000000Z\",\"date_decision\":\"2025-01-01T00:00:00.000000Z\",\"numero_decision\":\"ZE\",\"remarques\":\"ZER\",\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-06T15:00:37.000000Z\",\"updated_at\":\"2025-07-06T15:00:37.000000Z\"}}', NULL, '2025-07-06 14:12:45', '2025-07-06 14:12:45'),
(721, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 16, 'App\\Models\\User', 4, '{\"old\":{\"id\":16,\"fonctionnaire_id\":14,\"type_conge_id\":3,\"nombre_jours\":5,\"date_debut\":\"2024-05-05T00:00:00.000000Z\",\"date_fin\":\"2024-05-09T00:00:00.000000Z\",\"date_decision\":\"2024-05-05T00:00:00.000000Z\",\"numero_decision\":\"S\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:25:40.000000Z\",\"updated_at\":\"2025-06-24T08:25:40.000000Z\"}}', NULL, '2025-07-06 14:13:02', '2025-07-06 14:13:02'),
(722, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 24, 'App\\Models\\User', 4, '{\"old\":{\"id\":24,\"fonctionnaire_id\":10,\"type_conge_id\":1,\"nombre_jours\":97,\"date_debut\":\"2026-09-09T00:00:00.000000Z\",\"date_fin\":\"2026-10-10T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"SD\",\"remarques\":null,\"ampliations\":[\"M. directeur Hopital ibn baytar\"],\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T15:39:56.000000Z\",\"updated_at\":\"2025-07-05T15:59:52.000000Z\"}}', NULL, '2025-07-06 14:13:09', '2025-07-06 14:13:09'),
(723, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 15, 'App\\Models\\User', 4, '{\"old\":{\"id\":15,\"fonctionnaire_id\":10,\"type_conge_id\":8,\"nombre_jours\":11,\"date_debut\":\"2024-03-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-11T00:00:00.000000Z\",\"date_decision\":\"2024-03-01T00:00:00.000000Z\",\"numero_decision\":\"AZ\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-24T08:03:52.000000Z\",\"updated_at\":\"2025-06-24T08:03:52.000000Z\"}}', NULL, '2025-07-06 14:21:25', '2025-07-06 14:21:25'),
(724, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 23, 'App\\Models\\User', 4, '{\"old\":{\"id\":23,\"fonctionnaire_id\":21,\"type_conge_id\":2,\"nombre_jours\":2,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-03-03T00:00:00.000000Z\",\"date_decision\":\"2025-07-05T00:00:00.000000Z\",\"numero_decision\":\"3E\",\"remarques\":null,\"ampliations\":[\"M. directeur Hopital ibn khatib\"],\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-05T15:06:28.000000Z\",\"updated_at\":\"2025-07-05T16:06:55.000000Z\"}}', NULL, '2025-07-06 14:21:36', '2025-07-06 14:21:36'),
(725, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":26,\"fonctionnaire_id\":21,\"type_conge_id\":1,\"nombre_jours\":6,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-06T00:00:00.000000Z\",\"date_decision\":\"2025-07-06T00:00:00.000000Z\",\"numero_decision\":\"ZE\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-06T15:22:07.000000Z\",\"updated_at\":\"2025-07-06T15:22:07.000000Z\"}}', NULL, '2025-07-06 14:22:07', '2025-07-06 14:22:07'),
(726, 'Décision Congé', 'created', 'App\\Models\\CongeDecision', 'created', 27, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":27,\"fonctionnaire_id\":8,\"type_conge_id\":1,\"nombre_jours\":4,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-09-09T00:00:00.000000Z\",\"date_decision\":\"2025-07-06T00:00:00.000000Z\",\"numero_decision\":\"JH\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-07-06T17:13:29.000000Z\",\"updated_at\":\"2025-07-06T17:13:29.000000Z\"}}', NULL, '2025-07-06 16:13:29', '2025-07-06 16:13:29'),
(727, 'Décision Congé', 'deleted', 'App\\Models\\CongeDecision', 'deleted', 8, 'App\\Models\\User', 4, '{\"old\":{\"id\":8,\"fonctionnaire_id\":10,\"type_conge_id\":3,\"nombre_jours\":4,\"date_debut\":\"2024-01-01T00:00:00.000000Z\",\"date_fin\":\"2024-01-05T00:00:00.000000Z\",\"date_decision\":\"2024-01-01T00:00:00.000000Z\",\"numero_decision\":\"D\",\"remarques\":null,\"ampliations\":null,\"statut\":\"approuve\",\"fichier_decision\":null,\"created_at\":\"2025-06-23T23:09:37.000000Z\",\"updated_at\":\"2025-06-23T23:09:37.000000Z\"}}', NULL, '2025-07-06 16:26:17', '2025-07-06 16:26:17'),
(728, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur CHR alghassani Fes\"],\"updated_at\":\"2025-07-07T09:37:51.000000Z\"},\"old\":{\"ampliations\":null,\"updated_at\":\"2025-06-24T07:53:24.000000Z\"}}', NULL, '2025-07-07 08:37:51', '2025-07-07 08:37:51'),
(729, 'Décision Congé', 'updated', 'App\\Models\\CongeDecision', 'updated', 27, 'App\\Models\\User', 4, '{\"attributes\":{\"ampliations\":[\"M. directeur CHR alghassani Fes\"],\"updated_at\":\"2025-07-07T09:38:00.000000Z\"},\"old\":{\"ampliations\":null,\"updated_at\":\"2025-07-06T17:13:29.000000Z\"}}', NULL, '2025-07-07 08:38:00', '2025-07-07 08:38:00'),
(730, 'Categorie Formation', 'updated', 'App\\Models\\CategorieFormation', 'updated', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Fondation Med VI HANDICAPE\",\"updated_at\":\"2025-07-07T13:03:08.000000Z\"},\"old\":{\"nom\":\"Fondation Med VI\",\"updated_at\":\"2025-03-19T17:30:41.000000Z\"}}', NULL, '2025-07-07 12:03:08', '2025-07-07 12:03:08'),
(731, 'Position', 'updated', 'App\\Models\\Position', 'updated', 3, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"suspension\",\"updated_at\":\"2025-07-07T13:20:30.000000Z\"},\"old\":{\"nom\":\"suspendus\",\"updated_at\":\"2025-03-07T17:12:48.000000Z\"}}', NULL, '2025-07-07 12:20:30', '2025-07-07 12:20:30'),
(732, 'Retraite', 'created', 'App\\Models\\Retraite', 'created', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":23,\"type_retraite\":\"limite_age\",\"date_retraite\":\"2025-07-07T00:00:00.000000Z\",\"date_effet\":null,\"age_retraite\":\"63.0\",\"annees_service\":\"26.5\",\"motif\":\"Retraite automatique - limite d\'\\u00e2ge atteinte (63 ans)\",\"statut\":\"propose\",\"remarques\":null,\"created_by\":4,\"validated_by\":null,\"validated_at\":null,\"created_at\":\"2025-07-07T13:21:19.000000Z\",\"updated_at\":\"2025-07-07T13:21:19.000000Z\"}}', NULL, '2025-07-07 12:21:19', '2025-07-07 12:21:19'),
(733, 'Cadre', 'updated', 'App\\Models\\Cadre', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Infirmiers\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636\",\"updated_at\":\"2025-07-07T13:32:57.000000Z\"},\"old\":{\"nom\":\"Infirmiers polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"updated_at\":\"2025-03-19T17:04:12.000000Z\"}}', NULL, '2025-07-07 12:32:57', '2025-07-07 12:32:57'),
(734, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"nom\":\"Infirmiers de 1 er grade\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0646 \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":16,\"created_at\":\"2025-07-07T13:33:49.000000Z\",\"updated_at\":\"2025-07-07T13:33:49.000000Z\"}}', NULL, '2025-07-07 12:33:49', '2025-07-07 12:33:49'),
(735, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Infirmier(ere) Polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636(\\u0629) \\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"updated_at\":\"2025-07-07T13:36:56.000000Z\"},\"old\":{\"nom\":\"Polyvalent\",\"nom_arabe\":\"\\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"updated_at\":\"2025-03-19T17:20:17.000000Z\"}}', NULL, '2025-07-07 12:36:56', '2025-07-07 12:36:56'),
(736, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 29, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_arabe\":\"s\",\"prenom_arabe\":\"QS\",\"date_naissance\":\"1999-01-01\",\"date_embauche\":\"2025-01-01\",\"email\":\"qsS@GMAIL.COM\",\"telephone\":\"997\",\"adresse\":\"ZS\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":6,\"remarques\":\"QSD\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":2,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"D\",\"updated_at\":\"2025-07-07T15:30:34.000000Z\"},\"old\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"date_naissance\":null,\"date_embauche\":null,\"email\":null,\"telephone\":null,\"adresse\":null,\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"remarques\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"0000-00-00\",\"date_prise_en_service\":\"0000-00-00\",\"date_note\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-07 14:30:34', '2025-07-07 14:30:34'),
(737, 'Encadrant', 'deleted', 'App\\Models\\Encadrant', 'deleted', 1, 'App\\Models\\User', 4, '{\"old\":{\"id\":1,\"nom\":\"Dr. Ahmed Benali\",\"nom_arabe\":\"\\u062f. \\u0623\\u062d\\u0645\\u062f \\u0628\\u0646 \\u0639\\u0644\\u064a\",\"fonction\":\"Chef de Service\",\"fonction_arabe\":\"\\u0631\\u0626\\u064a\\u0633 \\u0627\\u0644\\u0645\\u0635\\u0644\\u062d\\u0629\",\"created_at\":\"2025-06-10T09:58:11.000000Z\",\"updated_at\":\"2025-06-10T09:58:11.000000Z\"}}', NULL, '2025-07-08 13:14:25', '2025-07-08 13:14:25'),
(739, 'Stage', 'created', 'App\\Models\\Stage', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":6,\"nom_prenom\":\"AZD\",\"cin\":\"DZ22\",\"institut_details\":\"AZDAZDAZDAZDAZDAZDAZD\",\"duree\":2,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-02T00:00:00.000000Z\",\"hierarchie\":\"AZAZDAZDAZDAZ\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":3,\"option_id\":14,\"service_id\":37,\"formation_sanitaire_id\":19,\"encadrant_id\":8,\"intitule_formation_id\":1,\"created_at\":\"2025-07-08T14:43:29.000000Z\",\"updated_at\":\"2025-07-08T14:43:29.000000Z\"}}', NULL, '2025-07-08 13:43:29', '2025-07-08 13:43:29'),
(741, 'Stage', 'created', 'App\\Models\\Stage', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":7,\"nom_prenom\":\"KADIRIII\",\"cin\":\"AZ\",\"institut_details\":\"sq\",\"duree\":6,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-05T00:00:00.000000Z\",\"hierarchie\":\"AZAZE\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":2,\"option_id\":14,\"service_id\":37,\"formation_sanitaire_id\":18,\"encadrant_id\":9,\"intitule_formation_id\":1,\"created_at\":\"2025-07-08T14:49:52.000000Z\",\"updated_at\":\"2025-07-08T14:49:52.000000Z\"}}', NULL, '2025-07-08 13:49:52', '2025-07-08 13:49:52'),
(742, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 53, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":53,\"fonctionnaire_id\":22,\"type_mutation_id\":4,\"date_mutation\":\"2020-01-01\",\"date_note\":\"2020-01-01\",\"ref_note\":\"ZET\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":8,\"formation_sanitaire_destination_id\":8,\"remarque\":null,\"date_prise_en_service\":\"2020-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-07-08T14:50:59.000000Z\",\"updated_at\":\"2025-07-08T14:50:59.000000Z\"}}', NULL, '2025-07-08 13:50:59', '2025-07-08 13:50:59'),
(743, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 54, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":54,\"fonctionnaire_id\":22,\"type_mutation_id\":5,\"date_mutation\":\"2025-07-07\",\"date_note\":\"2025-07-07\",\"ref_note\":\"BJBN\",\"fichiers_notes\":\"fichiers_notes\\/Fsdn1TDHRIvrqhdOWg8D8lJrrkJDzPUCbTjEwl2C.docx\",\"formation_sanitaire_origine_id\":8,\"formation_sanitaire_destination_id\":10,\"remarque\":\"AZE\",\"date_prise_en_service\":\"2025-07-08\",\"date_cessation_service\":\"2025-07-06\",\"ancien_service_id\":24,\"nouveau_service_id\":null,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":10,\"created_at\":\"2025-07-08T14:50:59.000000Z\",\"updated_at\":\"2025-07-08T14:50:59.000000Z\"}}', NULL, '2025-07-08 13:50:59', '2025-07-08 13:50:59'),
(744, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":10,\"service_id\":null,\"specialite_grade_id\":10,\"type_mutation\":5,\"date_mutation\":\"2025-07-07\",\"date_prise_en_service\":\"2025-07-08\",\"date_note\":\"2025-07-07\",\"fichier_note\":\"fichiers_notes\\/Fsdn1TDHRIvrqhdOWg8D8lJrrkJDzPUCbTjEwl2C.docx\",\"ref_note\":\"BJBN\",\"updated_at\":\"2025-07-08T14:50:59.000000Z\"},\"old\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":8,\"service_id\":24,\"specialite_grade_id\":5,\"type_mutation\":4,\"date_mutation\":\"2020-01-01\",\"date_prise_en_service\":\"2020-01-01\",\"date_note\":\"2020-01-01\",\"fichier_note\":\"\",\"ref_note\":\"ZET\",\"updated_at\":\"2025-07-05T17:23:33.000000Z\"}}', NULL, '2025-07-08 13:50:59', '2025-07-08 13:50:59'),
(745, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 55, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":55,\"fonctionnaire_id\":18,\"type_mutation_id\":1,\"date_mutation\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"ref_note\":\"D\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2009-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":38,\"nouveau_service_id\":38,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":22,\"ancien_specialite_id\":15,\"nouveau_specialite_id\":15,\"created_at\":\"2025-07-08T14:52:04.000000Z\",\"updated_at\":\"2025-07-08T14:52:04.000000Z\"}}', NULL, '2025-07-08 13:52:04', '2025-07-08 13:52:04'),
(746, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 56, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":56,\"fonctionnaire_id\":18,\"type_mutation_id\":1,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"BJ\",\"fichiers_notes\":\"fichiers_notes\\/I1F1Pv1kdFyHtdpVABuJYfnjRyQEblhEUoRVsIgA.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":9,\"remarque\":null,\"date_prise_en_service\":\"2025-07-07\",\"date_cessation_service\":\"2025-07-06\",\"ancien_service_id\":38,\"nouveau_service_id\":28,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":5,\"ancien_specialite_id\":15,\"nouveau_specialite_id\":9,\"created_at\":\"2025-07-08T14:52:04.000000Z\",\"updated_at\":\"2025-07-08T14:52:04.000000Z\"}}', NULL, '2025-07-08 13:52:04', '2025-07-08 13:52:04'),
(747, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":5,\"nom_formation_sanitaire_id\":9,\"service_id\":28,\"specialite_grade_id\":9,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-07-07\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"fichiers_notes\\/I1F1Pv1kdFyHtdpVABuJYfnjRyQEblhEUoRVsIgA.pdf\",\"ref_note\":\"BJ\",\"updated_at\":\"2025-07-08T14:52:04.000000Z\"},\"old\":{\"fonction_id\":22,\"nom_formation_sanitaire_id\":6,\"service_id\":38,\"specialite_grade_id\":15,\"date_mutation\":\"2009-01-01\",\"date_prise_en_service\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"fichier_note\":\"\",\"ref_note\":\"D\",\"updated_at\":\"2025-07-05T16:58:31.000000Z\"}}', NULL, '2025-07-08 13:52:04', '2025-07-08 13:52:04'),
(748, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 33, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":33,\"ppr\":\"9898\",\"nom\":\"TAMRI\",\"nom_arabe\":\"BN\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"NBN\",\"cin\":\"CH776\",\"sexe\":\"M\",\"date_naissance\":\"1989-01-01\",\"date_embauche\":\"2010-01-01\",\"email\":\"BNB@GMAIL.COM\",\"telephone\":\"989898\",\"adresse\":\"FES\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"JHJH\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2025-07-07\",\"date_prise_en_service\":\"2025-07-07\",\"date_note\":\"2025-07-07\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-08T14:55:10.000000Z\",\"updated_at\":\"2025-07-08T14:55:10.000000Z\"}}', NULL, '2025-07-08 13:55:10', '2025-07-08 13:55:10'),
(749, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 34, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":34,\"ppr\":\"9898\",\"nom\":\"TAMRI\",\"nom_arabe\":\"BN\",\"prenom\":\"MOHAMMED\",\"prenom_arabe\":\"NBN\",\"cin\":\"CH776\",\"sexe\":\"M\",\"date_naissance\":\"1989-01-01\",\"date_embauche\":\"2010-01-01\",\"email\":\"BNB@GMAIL.COM\",\"telephone\":\"989898\",\"adresse\":\"FES\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"JHJH\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2025-07-07\",\"date_prise_en_service\":\"2025-07-07\",\"date_note\":\"2025-07-07\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-08T14:55:11.000000Z\",\"updated_at\":\"2025-07-08T14:55:11.000000Z\"}}', NULL, '2025-07-08 13:55:11', '2025-07-08 13:55:11'),
(750, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 137, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":137,\"fonctionnaire_id\":33,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(751, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 138, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":138,\"fonctionnaire_id\":33,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(752, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 139, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":139,\"fonctionnaire_id\":33,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(753, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 140, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":140,\"fonctionnaire_id\":33,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(754, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 141, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":141,\"fonctionnaire_id\":33,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(755, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 142, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":142,\"fonctionnaire_id\":33,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(756, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 143, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":143,\"fonctionnaire_id\":33,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(757, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 144, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":144,\"fonctionnaire_id\":33,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-08T14:55:37.000000Z\",\"updated_at\":\"2025-07-08T14:55:37.000000Z\"}}', NULL, '2025-07-08 13:55:37', '2025-07-08 13:55:37'),
(758, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":35,\"ppr\":\"9898\",\"nom\":\"MANOUNI\",\"nom_arabe\":\"NBN\",\"prenom\":\"MANOUNI\",\"prenom_arabe\":\"NBN\",\"cin\":\"JH7676\",\"sexe\":\"M\",\"date_naissance\":\"2020-01-01\",\"date_embauche\":\"2020-01-01\",\"email\":\"?KJ@GMAIL.COM\",\"telephone\":\"9898\",\"adresse\":\"\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"remarques\":\"KHKH\",\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-08T14:57:58.000000Z\",\"updated_at\":\"2025-07-08T14:57:58.000000Z\"}}', NULL, '2025-07-08 13:57:58', '2025-07-08 13:57:58'),
(759, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 145, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":145,\"fonctionnaire_id\":35,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(760, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 146, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":146,\"fonctionnaire_id\":35,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(761, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 147, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":147,\"fonctionnaire_id\":35,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(762, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 148, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":148,\"fonctionnaire_id\":35,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(763, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 149, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":149,\"fonctionnaire_id\":35,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(764, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 150, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":150,\"fonctionnaire_id\":35,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(765, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 151, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":151,\"fonctionnaire_id\":35,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(766, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 152, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":152,\"fonctionnaire_id\":35,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-08T14:58:09.000000Z\",\"updated_at\":\"2025-07-08T14:58:09.000000Z\"}}', NULL, '2025-07-08 13:58:09', '2025-07-08 13:58:09'),
(768, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 58, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":58,\"fonctionnaire_id\":35,\"type_mutation_id\":1,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":6,\"remarque\":null,\"date_prise_en_service\":\"2025-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":1,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-07-08T14:59:58.000000Z\",\"updated_at\":\"2025-07-08T14:59:58.000000Z\"}}', NULL, '2025-07-08 13:59:58', '2025-07-08 13:59:58'),
(769, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 59, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":59,\"fonctionnaire_id\":35,\"type_mutation_id\":3,\"date_mutation\":\"2025-08-08\",\"date_note\":\"2025-08-08\",\"ref_note\":\"JHJH\",\"fichiers_notes\":\"fichiers_notes\\/cooBsXuganalDxkSFGrdNYQLFnysTVAJh5GORQAk.pdf\",\"formation_sanitaire_origine_id\":6,\"formation_sanitaire_destination_id\":null,\"remarque\":\"ZER\",\"date_prise_en_service\":\"2025-08-08\",\"date_cessation_service\":\"2025-08-08\",\"ancien_service_id\":24,\"nouveau_service_id\":null,\"ancien_fonction_id\":1,\"nouveau_fonction_id\":null,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":null,\"created_at\":\"2025-07-08T14:59:58.000000Z\",\"updated_at\":\"2025-07-08T14:59:58.000000Z\"}}', NULL, '2025-07-08 13:59:58', '2025-07-08 13:59:58'),
(770, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"type_mutation\":3,\"date_mutation\":\"2025-08-08\",\"date_prise_en_service\":\"2025-08-08\",\"date_note\":\"2025-08-08\",\"fichier_note\":\"fichiers_notes\\/cooBsXuganalDxkSFGrdNYQLFnysTVAJh5GORQAk.pdf\",\"ref_note\":\"JHJH\",\"updated_at\":\"2025-07-08T14:59:58.000000Z\"},\"old\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"service_id\":24,\"specialite_grade_id\":5,\"type_mutation\":1,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-07-08T14:57:58.000000Z\"}}', NULL, '2025-07-08 13:59:58', '2025-07-08 13:59:58'),
(771, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"adresse\":null,\"fonction_id\":1,\"nom_formation_sanitaire_id\":18,\"service_id\":24,\"specialite_grade_id\":7,\"updated_at\":\"2025-07-08T15:00:52.000000Z\"},\"old\":{\"adresse\":\"\",\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"updated_at\":\"2025-07-08T14:59:58.000000Z\"}}', NULL, '2025-07-08 14:00:52', '2025-07-08 14:00:52'),
(773, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 61, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":61,\"fonctionnaire_id\":14,\"type_mutation_id\":8,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2024-01-02\",\"ref_note\":\"ZD\",\"fichiers_notes\":\"fichiers_notes\\/jXWhpXlxj3fzdkxOegy1v2lZeeZrIU86SxrbWgo1.png\",\"formation_sanitaire_origine_id\":11,\"formation_sanitaire_destination_id\":11,\"remarque\":null,\"date_prise_en_service\":\"2024-01-02\",\"date_cessation_service\":null,\"ancien_service_id\":26,\"nouveau_service_id\":26,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":14,\"created_at\":\"2025-07-08T15:03:33.000000Z\",\"updated_at\":\"2025-07-08T15:03:33.000000Z\"}}', NULL, '2025-07-08 14:03:33', '2025-07-08 14:03:33'),
(774, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 62, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":62,\"fonctionnaire_id\":14,\"type_mutation_id\":8,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"ref_note\":\"KJK\",\"fichiers_notes\":\"fichiers_notes\\/pUrpNtm63ttQeLm8585F8HicnFncKsDPTpDJtzMS.pdf\",\"formation_sanitaire_origine_id\":11,\"formation_sanitaire_destination_id\":9,\"remarque\":\"ZE\",\"date_prise_en_service\":\"2011-01-01\",\"date_cessation_service\":\"2011-01-01\",\"ancien_service_id\":26,\"nouveau_service_id\":28,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":4,\"ancien_specialite_id\":14,\"nouveau_specialite_id\":9,\"created_at\":\"2025-07-08T15:03:33.000000Z\",\"updated_at\":\"2025-07-08T15:03:33.000000Z\"}}', NULL, '2025-07-08 14:03:33', '2025-07-08 14:03:33'),
(775, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":9,\"service_id\":28,\"specialite_grade_id\":9,\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"fichier_note\":\"fichiers_notes\\/pUrpNtm63ttQeLm8585F8HicnFncKsDPTpDJtzMS.pdf\",\"ref_note\":\"KJK\",\"updated_at\":\"2025-07-08T15:03:33.000000Z\"},\"old\":{\"fonction_id\":17,\"nom_formation_sanitaire_id\":11,\"service_id\":26,\"specialite_grade_id\":14,\"date_prise_en_service\":\"2024-01-02\",\"date_note\":\"2024-01-02\",\"fichier_note\":\"fichiers_notes\\/jXWhpXlxj3fzdkxOegy1v2lZeeZrIU86SxrbWgo1.png\",\"ref_note\":\"ZD\",\"updated_at\":\"2025-06-29T14:35:57.000000Z\"}}', NULL, '2025-07-08 14:03:33', '2025-07-08 14:03:33'),
(776, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 63, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":63,\"fonctionnaire_id\":14,\"type_mutation_id\":5,\"date_mutation\":\"2025-05-05\",\"date_note\":\"2025-05-05\",\"ref_note\":\"HJH\",\"fichiers_notes\":\"fichiers_notes\\/XQugf65PgkrzCOOcUNWCa1ZHunjqwE6GsJ5UfGCr.pdf\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":8,\"remarque\":\"DA\",\"date_prise_en_service\":\"2025-05-09\",\"date_cessation_service\":\"2025-05-09\",\"ancien_service_id\":28,\"nouveau_service_id\":26,\"ancien_fonction_id\":4,\"nouveau_fonction_id\":5,\"ancien_specialite_id\":9,\"nouveau_specialite_id\":10,\"created_at\":\"2025-07-08T15:05:07.000000Z\",\"updated_at\":\"2025-07-08T15:05:07.000000Z\"}}', NULL, '2025-07-08 14:05:07', '2025-07-08 14:05:07'),
(777, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":5,\"nom_formation_sanitaire_id\":8,\"service_id\":26,\"specialite_grade_id\":10,\"type_mutation\":5,\"date_mutation\":\"2025-05-05\",\"date_prise_en_service\":\"2025-05-09\",\"date_note\":\"2025-05-05\",\"fichier_note\":\"fichiers_notes\\/XQugf65PgkrzCOOcUNWCa1ZHunjqwE6GsJ5UfGCr.pdf\",\"ref_note\":\"HJH\",\"updated_at\":\"2025-07-08T15:05:07.000000Z\"},\"old\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":9,\"service_id\":28,\"specialite_grade_id\":9,\"type_mutation\":8,\"date_mutation\":\"2011-01-01\",\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"fichier_note\":\"fichiers_notes\\/pUrpNtm63ttQeLm8585F8HicnFncKsDPTpDJtzMS.pdf\",\"ref_note\":\"KJK\",\"updated_at\":\"2025-07-08T15:03:33.000000Z\"}}', NULL, '2025-07-08 14:05:07', '2025-07-08 14:05:07'),
(778, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":36,\"ppr\":\"12\",\"nom\":\"QSDQSD\",\"nom_arabe\":\"K\",\"prenom\":\"QSD\",\"prenom_arabe\":\"KJ\",\"cin\":\"QSD\",\"sexe\":\"F\",\"date_naissance\":\"1990-01-01\",\"date_embauche\":\"2025-01-01\",\"email\":\"KJ@GMAIL.COM\",\"telephone\":\"8787\",\"adresse\":\"?B?\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":17,\"remarques\":\"LJLJ\",\"service_id\":35,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":8,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-08T15:23:39.000000Z\",\"updated_at\":\"2025-07-08T15:23:39.000000Z\"}}', NULL, '2025-07-08 14:23:39', '2025-07-08 14:23:39'),
(779, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 153, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":153,\"fonctionnaire_id\":36,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(780, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 154, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":154,\"fonctionnaire_id\":36,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(781, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 155, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":155,\"fonctionnaire_id\":36,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(782, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 156, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":156,\"fonctionnaire_id\":36,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(783, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 157, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":157,\"fonctionnaire_id\":36,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(784, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 158, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":158,\"fonctionnaire_id\":36,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(785, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 159, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":159,\"fonctionnaire_id\":36,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(786, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 160, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":160,\"fonctionnaire_id\":36,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-08T15:23:46.000000Z\",\"updated_at\":\"2025-07-08T15:23:46.000000Z\"}}', NULL, '2025-07-08 14:23:46', '2025-07-08 14:23:46'),
(788, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 65, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":65,\"fonctionnaire_id\":36,\"type_mutation_id\":8,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":17,\"remarque\":null,\"date_prise_en_service\":\"2025-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":35,\"nouveau_service_id\":35,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":17,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-07-09T13:58:34.000000Z\",\"updated_at\":\"2025-07-09T13:58:34.000000Z\"}}', NULL, '2025-07-09 12:58:34', '2025-07-09 12:58:34'),
(789, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 66, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":66,\"fonctionnaire_id\":36,\"type_mutation_id\":5,\"date_mutation\":\"2025-07-07\",\"date_note\":\"2025-07-07\",\"ref_note\":\"JHJH\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":10,\"remarque\":\"AZ\",\"date_prise_en_service\":\"2025-07-07\",\"date_cessation_service\":\"2025-07-07\",\"ancien_service_id\":35,\"nouveau_service_id\":null,\"ancien_fonction_id\":17,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":9,\"created_at\":\"2025-07-09T13:58:34.000000Z\",\"updated_at\":\"2025-07-09T13:58:34.000000Z\"}}', NULL, '2025-07-09 12:58:34', '2025-07-09 12:58:34'),
(790, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":10,\"service_id\":null,\"specialite_grade_id\":9,\"type_mutation\":5,\"date_mutation\":\"2025-07-07\",\"date_prise_en_service\":\"2025-07-07\",\"date_note\":\"2025-07-07\",\"ref_note\":\"JHJH\",\"updated_at\":\"2025-07-09T13:58:34.000000Z\"},\"old\":{\"fonction_id\":17,\"nom_formation_sanitaire_id\":17,\"service_id\":35,\"specialite_grade_id\":5,\"type_mutation\":8,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"\",\"updated_at\":\"2025-07-08T15:23:39.000000Z\"}}', NULL, '2025-07-09 12:58:34', '2025-07-09 12:58:34'),
(791, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 67, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":67,\"fonctionnaire_id\":15,\"type_mutation_id\":4,\"date_mutation\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":9,\"remarque\":null,\"date_prise_en_service\":\"2009-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":24,\"nouveau_service_id\":24,\"ancien_fonction_id\":5,\"nouveau_fonction_id\":5,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-07-09T14:09:05.000000Z\",\"updated_at\":\"2025-07-09T14:09:05.000000Z\"}}', NULL, '2025-07-09 13:09:05', '2025-07-09 13:09:05'),
(792, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 68, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":68,\"fonctionnaire_id\":15,\"type_mutation_id\":5,\"date_mutation\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"ref_note\":\"LKL\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":10,\"remarque\":\"ZD\",\"date_prise_en_service\":\"2009-01-01\",\"date_cessation_service\":\"2009-01-01\",\"ancien_service_id\":24,\"nouveau_service_id\":28,\"ancien_fonction_id\":5,\"nouveau_fonction_id\":4,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":8,\"created_at\":\"2025-07-09T14:09:05.000000Z\",\"updated_at\":\"2025-07-09T14:09:05.000000Z\"}}', NULL, '2025-07-09 13:09:05', '2025-07-09 13:09:05'),
(793, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":10,\"service_id\":28,\"specialite_grade_id\":8,\"type_mutation\":5,\"ref_note\":\"LKL\",\"updated_at\":\"2025-07-09T14:09:05.000000Z\"},\"old\":{\"fonction_id\":5,\"nom_formation_sanitaire_id\":9,\"service_id\":24,\"specialite_grade_id\":5,\"type_mutation\":4,\"ref_note\":\"\",\"updated_at\":\"2025-06-24T08:15:15.000000Z\"}}', NULL, '2025-07-09 13:09:05', '2025-07-09 13:09:05'),
(794, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 69, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":69,\"fonctionnaire_id\":15,\"type_mutation_id\":6,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"KJ\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":10,\"formation_sanitaire_destination_id\":8,\"remarque\":\"AZAZ\",\"date_prise_en_service\":\"2025-01-01\",\"date_cessation_service\":\"2025-01-01\",\"ancien_service_id\":28,\"nouveau_service_id\":null,\"ancien_fonction_id\":4,\"nouveau_fonction_id\":3,\"ancien_specialite_id\":8,\"nouveau_specialite_id\":7,\"created_at\":\"2025-07-09T14:09:50.000000Z\",\"updated_at\":\"2025-07-09T14:09:50.000000Z\"}}', NULL, '2025-07-09 13:09:50', '2025-07-09 13:09:50'),
(795, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":3,\"nom_formation_sanitaire_id\":8,\"service_id\":null,\"specialite_grade_id\":7,\"type_mutation\":6,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"KJ\",\"updated_at\":\"2025-07-09T14:09:50.000000Z\"},\"old\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":10,\"service_id\":28,\"specialite_grade_id\":8,\"type_mutation\":5,\"date_mutation\":\"2009-01-01\",\"date_prise_en_service\":\"2009-01-01\",\"date_note\":\"2009-01-01\",\"ref_note\":\"LKL\",\"updated_at\":\"2025-07-09T14:09:05.000000Z\"}}', NULL, '2025-07-09 13:09:50', '2025-07-09 13:09:50'),
(796, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"ppr\":\"12121222\",\"service_id\":24,\"updated_at\":\"2025-07-09T14:11:29.000000Z\"},\"old\":{\"ppr\":\"12\",\"service_id\":null,\"updated_at\":\"2025-07-09T13:58:34.000000Z\"}}', NULL, '2025-07-09 13:11:29', '2025-07-09 13:11:29'),
(797, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 70, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":70,\"fonctionnaire_id\":12,\"type_mutation_id\":3,\"date_mutation\":\"2011-12-14\",\"date_note\":\"2011-12-14\",\"ref_note\":\"KJKJ\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":19,\"formation_sanitaire_destination_id\":8,\"remarque\":\"ZE\",\"date_prise_en_service\":\"2011-12-14\",\"date_cessation_service\":\"2011-12-14\",\"ancien_service_id\":29,\"nouveau_service_id\":27,\"ancien_fonction_id\":19,\"nouveau_fonction_id\":4,\"ancien_specialite_id\":7,\"nouveau_specialite_id\":8,\"created_at\":\"2025-07-09T14:13:12.000000Z\",\"updated_at\":\"2025-07-09T14:13:12.000000Z\"}}', NULL, '2025-07-09 13:13:12', '2025-07-09 13:13:12'),
(798, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":8,\"service_id\":27,\"specialite_grade_id\":8,\"type_mutation\":3,\"date_mutation\":\"2011-12-14\",\"date_prise_en_service\":\"2011-12-14\",\"date_note\":\"2011-12-14\",\"ref_note\":\"KJKJ\",\"updated_at\":\"2025-07-09T14:13:12.000000Z\"},\"old\":{\"fonction_id\":19,\"nom_formation_sanitaire_id\":19,\"service_id\":29,\"specialite_grade_id\":7,\"type_mutation\":5,\"date_mutation\":\"2024-12-31\",\"date_prise_en_service\":\"2024-12-31\",\"date_note\":\"2024-12-31\",\"ref_note\":\"AAAZE\",\"updated_at\":\"2025-06-13T00:32:35.000000Z\"}}', NULL, '2025-07-09 13:13:12', '2025-07-09 13:13:12'),
(799, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":12,\"jours\":3,\"date_depot\":\"2024-07-09\",\"date_debut\":\"2024-07-09\",\"created_at\":\"2025-07-09T14:14:44.000000Z\",\"updated_at\":\"2025-07-09T14:14:44.000000Z\"}}', NULL, '2025-07-09 13:14:44', '2025-07-09 13:14:44'),
(800, 'Grève', 'created', 'App\\Models\\Greve', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"fonctionnaire_id\":12,\"date_debut\":\"2024-01-01\",\"date_fin\":\"2024-04-04\",\"remarque\":null,\"created_at\":\"2025-07-09T14:15:15.000000Z\",\"updated_at\":\"2025-07-09T14:15:15.000000Z\"}}', NULL, '2025-07-09 13:15:15', '2025-07-09 13:15:15'),
(801, 'Grève', 'created', 'App\\Models\\Greve', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"fonctionnaire_id\":17,\"date_debut\":\"2025-01-01\",\"date_fin\":\"2025-01-05\",\"nombre_jours\":5,\"remarque\":null,\"created_at\":\"2025-07-09T14:31:18.000000Z\",\"updated_at\":\"2025-07-09T14:31:18.000000Z\"}}', NULL, '2025-07-09 13:31:18', '2025-07-09 13:31:18'),
(802, 'Grève', 'created', 'App\\Models\\Greve', 'created', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":21,\"date_debut\":\"2025-01-01\",\"date_fin\":\"2025-06-06\",\"nombre_jours\":157,\"remarque\":null,\"created_at\":\"2025-07-09T14:59:21.000000Z\",\"updated_at\":\"2025-07-09T14:59:21.000000Z\"}}', NULL, '2025-07-09 13:59:21', '2025-07-09 13:59:21'),
(803, 'Ecole', 'created', 'App\\Models\\Ecole', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"nom\":\"Facult\\u00e9 des sciences dhar lamraz Fes\",\"nom_arabe\":\"\\u0643\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0639\\u0644\\u0648\\u0645 \\u0638\\u0647\\u0631 \\u0644\\u0645\\u0647\\u0631\\u0627\\u0632 \\u0641\\u0627\\u0633\",\"created_at\":\"2025-07-14T14:32:57.000000Z\",\"updated_at\":\"2025-07-14T14:32:57.000000Z\"}}', NULL, '2025-07-14 13:32:57', '2025-07-14 13:32:57'),
(804, 'Option', 'created', 'App\\Models\\Option', 'created', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":17,\"nom\":\"Biologie\",\"nom_arabe\":\"\\u0639\\u0644\\u0648\\u0645 \\u0627\\u0644\\u062d\\u064a\\u0627\\u0629 \\u0648\\u0627\\u0644\\u0627\\u0631\\u0636\",\"created_at\":\"2025-07-14T14:33:43.000000Z\",\"updated_at\":\"2025-07-14T14:33:43.000000Z\"}}', NULL, '2025-07-14 13:33:43', '2025-07-14 13:33:43'),
(805, 'Service', 'created', 'App\\Models\\Service', 'created', 39, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":39,\"nom\":\"Laboratoire\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u062e\\u062a\\u0628\\u0631\",\"created_at\":\"2025-07-14T14:36:17.000000Z\",\"updated_at\":\"2025-07-14T14:36:17.000000Z\"}}', NULL, '2025-07-14 13:36:17', '2025-07-14 13:36:17');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(806, 'Stage', 'deleted', 'App\\Models\\Stage', 'deleted', 5, 'App\\Models\\User', 4, '{\"old\":{\"id\":5,\"nom_prenom\":\"vvvDFD FGFGF\",\"cin\":\"cd434343\",\"institut_details\":\"IUIUIU\",\"duree\":60,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-06-06T00:00:00.000000Z\",\"hierarchie\":\"MR DIRECTEUR\",\"avis\":null,\"fichier\":\"stages\\/fichiers\\/1749777433_Design sans titre (1).pdf\",\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":1,\"type_stage\":\"volontaire\",\"type_stage_id\":1,\"ecole_id\":3,\"option_id\":13,\"service_id\":26,\"formation_sanitaire_id\":13,\"encadrant_id\":5,\"intitule_formation_id\":null,\"created_at\":\"2025-06-13T01:16:40.000000Z\",\"updated_at\":\"2025-06-13T01:17:13.000000Z\"}}', NULL, '2025-07-14 13:38:40', '2025-07-14 13:38:40'),
(807, 'Stage', 'deleted', 'App\\Models\\Stage', 'deleted', 4, 'App\\Models\\User', 4, '{\"old\":{\"id\":4,\"nom_prenom\":\"Sara Alami\",\"cin\":\"SA345678\",\"institut_details\":\"\\u00c9tudiante en 1\\u00e8re ann\\u00e9e d\'infirmerie \\u00e0 l\'\\u00c9cole Nationale de Sant\\u00e9 Publique\",\"duree\":60,\"date_debut\":\"2024-03-01T00:00:00.000000Z\",\"date_fin\":\"2024-04-30T00:00:00.000000Z\",\"hierarchie\":\"Directeur de l\'H\\u00f4pital\",\"avis\":\"Excellent travail et motivation\",\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":1,\"type_stage\":\"formation\",\"type_stage_id\":2,\"ecole_id\":4,\"option_id\":3,\"service_id\":30,\"formation_sanitaire_id\":11,\"encadrant_id\":3,\"intitule_formation_id\":null,\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-10T09:59:00.000000Z\"}}', NULL, '2025-07-14 13:38:46', '2025-07-14 13:38:46'),
(808, 'Stage', 'deleted', 'App\\Models\\Stage', 'deleted', 3, 'App\\Models\\User', 4, '{\"old\":{\"id\":3,\"nom_prenom\":\"Mohammed Tazi\",\"cin\":\"MT789012\",\"institut_details\":\"\\u00c9tudiant en 2\\u00e8me ann\\u00e9e d\'aide soignant \\u00e0 l\'Institut Sup\\u00e9rieur des Sciences de la Sant\\u00e9\",\"duree\":45,\"date_debut\":\"2024-02-01T00:00:00.000000Z\",\"date_fin\":\"2024-03-17T00:00:00.000000Z\",\"hierarchie\":\"Chef de Service\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"trait\\u00e9\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":1,\"type_stage\":\"volontaire\",\"type_stage_id\":1,\"ecole_id\":3,\"option_id\":2,\"service_id\":25,\"formation_sanitaire_id\":10,\"encadrant_id\":2,\"intitule_formation_id\":null,\"created_at\":\"2025-06-10T09:59:00.000000Z\",\"updated_at\":\"2025-06-29T14:32:26.000000Z\"}}', NULL, '2025-07-14 13:38:51', '2025-07-14 13:38:51'),
(809, 'Stage', 'deleted', 'App\\Models\\Stage', 'deleted', 7, 'App\\Models\\User', 4, '{\"old\":{\"id\":7,\"nom_prenom\":\"KADIRIII\",\"cin\":\"AZ\",\"institut_details\":\"sq\",\"duree\":6,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-05T00:00:00.000000Z\",\"hierarchie\":\"AZAZE\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":2,\"option_id\":14,\"service_id\":37,\"formation_sanitaire_id\":18,\"encadrant_id\":9,\"intitule_formation_id\":1,\"created_at\":\"2025-07-08T14:49:52.000000Z\",\"updated_at\":\"2025-07-08T14:49:52.000000Z\"}}', NULL, '2025-07-14 13:38:57', '2025-07-14 13:38:57'),
(810, 'Stage', 'deleted', 'App\\Models\\Stage', 'deleted', 6, 'App\\Models\\User', 4, '{\"old\":{\"id\":6,\"nom_prenom\":\"AZD\",\"cin\":\"DZ22\",\"institut_details\":\"AZDAZDAZDAZDAZDAZDAZD\",\"duree\":2,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-01-02T00:00:00.000000Z\",\"hierarchie\":\"AZAZDAZDAZDAZ\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":3,\"option_id\":14,\"service_id\":37,\"formation_sanitaire_id\":19,\"encadrant_id\":8,\"intitule_formation_id\":1,\"created_at\":\"2025-07-08T14:43:29.000000Z\",\"updated_at\":\"2025-07-08T14:43:29.000000Z\"}}', NULL, '2025-07-14 13:39:02', '2025-07-14 13:39:02'),
(811, 'Stage', 'created', 'App\\Models\\Stage', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":8,\"nom_prenom\":\"s\",\"cin\":\"az\",\"institut_details\":\"AZSAZ\",\"duree\":30,\"date_debut\":\"2025-08-01T00:00:00.000000Z\",\"date_fin\":\"2025-08-31T00:00:00.000000Z\",\"hierarchie\":\"AAZE\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"administratif\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":9,\"option_id\":14,\"service_id\":37,\"formation_sanitaire_id\":18,\"encadrant_id\":9,\"intitule_formation_id\":1,\"created_at\":\"2025-07-14T14:44:16.000000Z\",\"updated_at\":\"2025-07-14T14:44:16.000000Z\"}}', NULL, '2025-07-14 13:44:16', '2025-07-14 13:44:16'),
(812, 'Stage', 'created', 'App\\Models\\Stage', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"nom_prenom\":\"AZE\",\"cin\":\"A\",\"institut_details\":\"A\",\"duree\":39,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-09-09T00:00:00.000000Z\",\"hierarchie\":\"AZE\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":null,\"ecole_id\":10,\"option_id\":16,\"service_id\":38,\"formation_sanitaire_id\":18,\"encadrant_id\":8,\"intitule_formation_id\":1,\"created_at\":\"2025-07-14T15:07:15.000000Z\",\"updated_at\":\"2025-07-14T15:07:15.000000Z\"}}', NULL, '2025-07-14 14:07:15', '2025-07-14 14:07:15'),
(813, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_formation_sanitaire_id\":17,\"remarques\":null,\"ref_note\":\"Z\",\"updated_at\":\"2025-07-14T15:55:00.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":6,\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-06-23T22:42:45.000000Z\"}}', NULL, '2025-07-14 14:55:00', '2025-07-14 14:55:00'),
(814, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 71, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":71,\"fonctionnaire_id\":17,\"type_mutation_id\":4,\"date_mutation\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"ref_note\":\"Z\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":17,\"remarque\":null,\"date_prise_en_service\":\"2011-01-01\",\"date_cessation_service\":null,\"ancien_service_id\":28,\"nouveau_service_id\":28,\"ancien_fonction_id\":10,\"nouveau_fonction_id\":10,\"ancien_specialite_id\":18,\"nouveau_specialite_id\":18,\"created_at\":\"2025-07-14T15:55:47.000000Z\",\"updated_at\":\"2025-07-14T15:55:47.000000Z\"}}', NULL, '2025-07-14 14:55:47', '2025-07-14 14:55:47'),
(815, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 72, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":72,\"fonctionnaire_id\":17,\"type_mutation_id\":5,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"NB\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":17,\"formation_sanitaire_destination_id\":10,\"remarque\":\"SD\",\"date_prise_en_service\":\"2025-01-01\",\"date_cessation_service\":\"2025-01-01\",\"ancien_service_id\":28,\"nouveau_service_id\":null,\"ancien_fonction_id\":10,\"nouveau_fonction_id\":4,\"ancien_specialite_id\":18,\"nouveau_specialite_id\":7,\"created_at\":\"2025-07-14T15:55:47.000000Z\",\"updated_at\":\"2025-07-14T15:55:47.000000Z\"}}', NULL, '2025-07-14 14:55:47', '2025-07-14 14:55:47'),
(816, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":4,\"nom_formation_sanitaire_id\":10,\"service_id\":null,\"specialite_grade_id\":7,\"type_mutation\":5,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"NB\",\"updated_at\":\"2025-07-14T15:55:47.000000Z\"},\"old\":{\"fonction_id\":10,\"nom_formation_sanitaire_id\":17,\"service_id\":28,\"specialite_grade_id\":18,\"type_mutation\":4,\"date_mutation\":\"2011-01-01\",\"date_prise_en_service\":\"2011-01-01\",\"date_note\":\"2011-01-01\",\"ref_note\":\"Z\",\"updated_at\":\"2025-07-14T15:55:00.000000Z\"}}', NULL, '2025-07-14 14:55:47', '2025-07-14 14:55:47'),
(817, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 73, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":73,\"fonctionnaire_id\":16,\"type_mutation_id\":1,\"date_mutation\":\"1995-12-01\",\"date_note\":\"2024-06-06\",\"ref_note\":\"SS\",\"fichiers_notes\":\"fichiers_notes\\/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png\",\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":9,\"remarque\":null,\"date_prise_en_service\":\"2024-06-07\",\"date_cessation_service\":null,\"ancien_service_id\":25,\"nouveau_service_id\":25,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":13,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":22,\"created_at\":\"2025-07-14T15:58:06.000000Z\",\"updated_at\":\"2025-07-14T15:58:06.000000Z\"}}', NULL, '2025-07-14 14:58:06', '2025-07-14 14:58:06'),
(818, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 74, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":74,\"fonctionnaire_id\":16,\"type_mutation_id\":5,\"date_mutation\":\"2025-12-01\",\"date_note\":\"2025-02-02\",\"ref_note\":\"NBN\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":9,\"formation_sanitaire_destination_id\":10,\"remarque\":\"AZE\",\"date_prise_en_service\":\"2025-01-01\",\"date_cessation_service\":\"2025-01-01\",\"ancien_service_id\":25,\"nouveau_service_id\":null,\"ancien_fonction_id\":13,\"nouveau_fonction_id\":6,\"ancien_specialite_id\":22,\"nouveau_specialite_id\":10,\"created_at\":\"2025-07-14T15:58:06.000000Z\",\"updated_at\":\"2025-07-14T15:58:06.000000Z\"}}', NULL, '2025-07-14 14:58:06', '2025-07-14 14:58:06'),
(819, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":10,\"service_id\":null,\"specialite_grade_id\":10,\"type_mutation\":5,\"date_mutation\":\"2025-12-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-02-02\",\"ref_note\":\"NBN\",\"updated_at\":\"2025-07-14T15:58:06.000000Z\"},\"old\":{\"fonction_id\":13,\"nom_formation_sanitaire_id\":9,\"service_id\":25,\"specialite_grade_id\":22,\"type_mutation\":1,\"date_mutation\":\"1995-12-01\",\"date_prise_en_service\":\"2024-06-07\",\"date_note\":\"2024-06-06\",\"ref_note\":\"SS\",\"updated_at\":\"2025-06-24T08:13:36.000000Z\"}}', NULL, '2025-07-14 14:58:06', '2025-07-14 14:58:06'),
(820, 'Type Stage', 'created', 'App\\Models\\TypeStage', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":5,\"nom\":\"KKKKKK\",\"nom_arabe\":\"HH\",\"actif\":1,\"created_at\":\"2025-07-14T16:02:57.000000Z\",\"updated_at\":\"2025-07-14T16:02:57.000000Z\"}}', NULL, '2025-07-14 15:02:57', '2025-07-14 15:02:57'),
(821, 'Stage', 'created', 'App\\Models\\Stage', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"nom_prenom\":\"ALAOUI\",\"cin\":\"CG998989\",\"institut_details\":\"AZAZEAZEAZE\",\"duree\":40,\"date_debut\":\"2025-01-01T00:00:00.000000Z\",\"date_fin\":\"2025-02-01T00:00:00.000000Z\",\"hierarchie\":\"QZDD\",\"avis\":null,\"fichier\":null,\"fichier_scanner_note\":null,\"fichier_scanner_attestation\":null,\"statut_attestation\":\"en cours\",\"cadre\":\"m\\u00e9dical\",\"cadre_stage_id\":null,\"type_stage\":\"volontaire\",\"type_stage_id\":5,\"ecole_id\":9,\"option_id\":13,\"service_id\":35,\"formation_sanitaire_id\":20,\"encadrant_id\":5,\"intitule_formation_id\":3,\"created_at\":\"2025-07-14T16:03:33.000000Z\",\"updated_at\":\"2025-07-14T16:03:33.000000Z\"}}', NULL, '2025-07-14 15:03:33', '2025-07-14 15:03:33'),
(822, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 75, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":75,\"fonctionnaire_id\":21,\"type_mutation_id\":1,\"date_mutation\":\"2022-01-01\",\"date_note\":\"2022-01-01\",\"ref_note\":\"HG\",\"fichiers_notes\":\"fichiers_notes\\/JBV1QzIc10XSpDsDTmkvmsNID7VbYxqw9xd0CLHx.pdf\",\"formation_sanitaire_origine_id\":19,\"formation_sanitaire_destination_id\":9,\"remarque\":\"Z\",\"date_prise_en_service\":\"2026-01-01\",\"date_cessation_service\":\"2026-01-01\",\"ancien_service_id\":38,\"nouveau_service_id\":24,\"ancien_fonction_id\":22,\"nouveau_fonction_id\":null,\"ancien_specialite_id\":15,\"nouveau_specialite_id\":8,\"created_at\":\"2025-07-14T16:27:14.000000Z\",\"updated_at\":\"2025-07-14T16:27:14.000000Z\"}}', NULL, '2025-07-14 15:27:15', '2025-07-14 15:27:15'),
(823, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":9,\"service_id\":24,\"specialite_grade_id\":8,\"type_mutation\":1,\"date_mutation\":\"2022-01-01\",\"date_prise_en_service\":\"2026-01-01\",\"date_note\":\"2022-01-01\",\"fichier_note\":\"fichiers_notes\\/JBV1QzIc10XSpDsDTmkvmsNID7VbYxqw9xd0CLHx.pdf\",\"ref_note\":\"HG\",\"updated_at\":\"2025-07-14T16:27:15.000000Z\"},\"old\":{\"fonction_id\":22,\"nom_formation_sanitaire_id\":19,\"service_id\":38,\"specialite_grade_id\":15,\"type_mutation\":5,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-02-02\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"fichiers_notes\\/10195bynPyOp2iD7WwTpfVWWgHHY49CdvRxqL9Hh.png\",\"ref_note\":\"EZER\",\"updated_at\":\"2025-06-29T14:20:05.000000Z\"}}', NULL, '2025-07-14 15:27:15', '2025-07-14 15:27:15'),
(824, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 76, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":76,\"fonctionnaire_id\":16,\"type_mutation_id\":3,\"date_mutation\":\"2025-12-01\",\"date_note\":\"2025-12-01\",\"ref_note\":\"KKHK\",\"fichiers_notes\":\"fichiers_notes\\/ODZCiOTwcdXHxnt9sxO3AzcMNeOOnO4czPUxqt3a.pdf\",\"formation_sanitaire_origine_id\":10,\"formation_sanitaire_destination_id\":13,\"remarque\":\"Z\",\"date_prise_en_service\":\"2025-12-01\",\"date_cessation_service\":\"2025-12-01\",\"ancien_service_id\":null,\"nouveau_service_id\":27,\"ancien_fonction_id\":6,\"nouveau_fonction_id\":3,\"ancien_specialite_id\":10,\"nouveau_specialite_id\":6,\"created_at\":\"2025-07-14T16:39:24.000000Z\",\"updated_at\":\"2025-07-14T16:39:24.000000Z\"}}', NULL, '2025-07-14 15:39:25', '2025-07-14 15:39:25'),
(825, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":3,\"nom_formation_sanitaire_id\":13,\"service_id\":27,\"specialite_grade_id\":6,\"type_mutation\":3,\"date_prise_en_service\":\"2025-12-01\",\"date_note\":\"2025-12-01\",\"fichier_note\":\"fichiers_notes\\/ODZCiOTwcdXHxnt9sxO3AzcMNeOOnO4czPUxqt3a.pdf\",\"ref_note\":\"KKHK\",\"updated_at\":\"2025-07-14T16:39:25.000000Z\"},\"old\":{\"fonction_id\":6,\"nom_formation_sanitaire_id\":10,\"service_id\":null,\"specialite_grade_id\":10,\"type_mutation\":5,\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-02-02\",\"fichier_note\":\"fichiers_notes\\/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png\",\"ref_note\":\"NBN\",\"updated_at\":\"2025-07-14T15:58:06.000000Z\"}}', NULL, '2025-07-14 15:39:25', '2025-07-14 15:39:25'),
(826, 'PositionHistorique', 'deleted', 'App\\Models\\PositionHistorique', 'deleted', 9, 'App\\Models\\User', 4, '{\"old\":{\"id\":9,\"fonctionnaire_id\":16,\"ancien_position_id\":2,\"nouveaux_position_id\":4,\"date_cessation_service\":\"2024-09-06\",\"date_prise_en_service\":\"2024-06-06\",\"remarque\":null,\"date_note\":\"2024-09-06\",\"ref_note\":null,\"fichiers_notes\":null,\"type\":\"d\\u00e9ces\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-24T08:13:36.000000Z\",\"updated_at\":\"2025-06-24T08:13:36.000000Z\"}}', NULL, '2025-07-14 15:39:41', '2025-07-14 15:39:41'),
(827, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":13,\"fonctionnaire_id\":16,\"ancien_position_id\":4,\"nouveaux_position_id\":7,\"date_cessation_service\":\"2025-12-12\",\"date_prise_en_service\":\"2025-12-12\",\"remarque\":null,\"date_note\":\"2025-12-12\",\"ref_note\":\"AZE\",\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-14T16:40:13.000000Z\",\"updated_at\":\"2025-07-14T16:40:13.000000Z\"}}', NULL, '2025-07-14 15:40:13', '2025-07-14 15:40:13'),
(828, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":7,\"updated_at\":\"2025-07-14T16:40:13.000000Z\"},\"old\":{\"position_id\":4,\"updated_at\":\"2025-07-14T16:39:25.000000Z\"}}', NULL, '2025-07-14 15:40:13', '2025-07-14 15:40:13'),
(829, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":14,\"fonctionnaire_id\":15,\"ancien_position_id\":3,\"nouveaux_position_id\":6,\"date_cessation_service\":\"2025-07-14\",\"date_prise_en_service\":\"2025-07-14\",\"remarque\":\"hg\",\"date_note\":\"2025-07-14\",\"ref_note\":\"H\",\"fichiers_notes\":null,\"type\":\"d\\u00e9tachement\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-14T16:47:57.000000Z\",\"updated_at\":\"2025-07-14T16:47:57.000000Z\"}}', NULL, '2025-07-14 15:47:57', '2025-07-14 15:47:57'),
(830, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":6,\"updated_at\":\"2025-07-14T16:47:57.000000Z\"},\"old\":{\"position_id\":3,\"updated_at\":\"2025-07-09T14:09:50.000000Z\"}}', NULL, '2025-07-14 15:47:57', '2025-07-14 15:47:57'),
(831, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":15,\"fonctionnaire_id\":15,\"ancien_position_id\":6,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-08-08\",\"date_prise_en_service\":\"2025-08-08\",\"remarque\":null,\"date_note\":\"2025-08-08\",\"ref_note\":\"JH\",\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-14T16:53:42.000000Z\",\"updated_at\":\"2025-07-14T16:53:42.000000Z\"}}', NULL, '2025-07-14 15:53:42', '2025-07-14 15:53:42'),
(832, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":5,\"updated_at\":\"2025-07-14T16:53:42.000000Z\"},\"old\":{\"position_id\":6,\"updated_at\":\"2025-07-14T16:47:57.000000Z\"}}', NULL, '2025-07-14 15:53:42', '2025-07-14 15:53:42'),
(833, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-08-08\"},\"old\":{\"date_mutation\":\"2025-01-01\"}}', NULL, '2025-07-14 15:53:42', '2025-07-14 15:53:42'),
(834, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":37,\"ppr\":\"9898\",\"nom\":\"TAMRI\",\"nom_arabe\":\"TAMRI\",\"prenom\":\"TAMRI\",\"prenom_arabe\":\"TAMRI\",\"cin\":\"SS222\",\"sexe\":\"M\",\"date_naissance\":\"1990-10-01\",\"date_embauche\":\"2010-01-01\",\"email\":\"TAMRI@GMAIL.COM\",\"telephone\":\"\",\"adresse\":\"JHJH\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":17,\"remarques\":\"\",\"service_id\":36,\"specialite_grade_id\":6,\"position_id\":2,\"type_mutation\":2,\"date_mutation\":\"2024-10-10\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-10-10\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-14T17:37:55.000000Z\",\"updated_at\":\"2025-07-14T17:37:55.000000Z\"}}', NULL, '2025-07-14 16:37:55', '2025-07-14 16:37:55'),
(835, 'Stage', 'updated', 'App\\Models\\Stage', 'updated', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"institut_details\":\"Axcvxcvxcvxc\",\"type_stage_id\":1,\"updated_at\":\"2025-07-14T19:51:08.000000Z\"},\"old\":{\"institut_details\":\"A\",\"type_stage_id\":null,\"updated_at\":\"2025-07-14T15:07:15.000000Z\"}}', NULL, '2025-07-14 18:51:08', '2025-07-14 18:51:08'),
(836, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"telephone\":null,\"fonction_id\":1,\"remarques\":null,\"service_id\":39,\"specialite_grade_id\":12,\"ref_note\":\"S\",\"updated_at\":\"2025-07-15T16:29:13.000000Z\"},\"old\":{\"telephone\":\"\",\"fonction_id\":17,\"remarques\":\"\",\"service_id\":36,\"specialite_grade_id\":6,\"ref_note\":\"\",\"updated_at\":\"2025-07-14T17:37:55.000000Z\"}}', NULL, '2025-07-15 15:29:13', '2025-07-15 15:29:13'),
(837, 'PositionHistorique', 'deleted', 'App\\Models\\PositionHistorique', 'deleted', 12, 'App\\Models\\User', 4, '{\"old\":{\"id\":12,\"fonctionnaire_id\":21,\"ancien_position_id\":3,\"nouveaux_position_id\":5,\"date_cessation_service\":\"2025-05-01\",\"date_prise_en_service\":\"2027-05-01\",\"remarque\":\"ZRE\",\"date_note\":\"2027-05-01\",\"ref_note\":\"ZE\",\"fichiers_notes\":null,\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-06-29T14:20:05.000000Z\",\"updated_at\":\"2025-06-29T14:20:05.000000Z\"}}', NULL, '2025-07-15 15:29:39', '2025-07-15 15:29:39'),
(838, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"type_mutation\":5,\"date_mutation\":\"2025-01-01\",\"updated_at\":\"2025-07-15T16:29:39.000000Z\"},\"old\":{\"type_mutation\":1,\"date_mutation\":\"2022-01-01\",\"updated_at\":\"2025-07-14T16:27:15.000000Z\"}}', NULL, '2025-07-15 15:29:39', '2025-07-15 15:29:39'),
(839, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":16,\"fonctionnaire_id\":21,\"ancien_position_id\":5,\"nouveaux_position_id\":2,\"date_cessation_service\":\"2025-07-15\",\"date_prise_en_service\":\"2025-07-15\",\"remarque\":null,\"date_note\":\"2025-07-15\",\"ref_note\":\"NB\",\"fichiers_notes\":null,\"type\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-15T16:30:03.000000Z\",\"updated_at\":\"2025-07-15T16:30:03.000000Z\"}}', NULL, '2025-07-15 15:30:03', '2025-07-15 15:30:03'),
(840, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":2,\"updated_at\":\"2025-07-15T16:30:03.000000Z\"},\"old\":{\"position_id\":5,\"updated_at\":\"2025-07-15T16:29:39.000000Z\"}}', NULL, '2025-07-15 15:30:03', '2025-07-15 15:30:03'),
(841, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-07-15\"},\"old\":{\"date_mutation\":\"2025-01-01\"}}', NULL, '2025-07-15 15:30:03', '2025-07-15 15:30:03'),
(842, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 17, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":17,\"fonctionnaire_id\":15,\"ancien_position_id\":5,\"nouveaux_position_id\":2,\"date_cessation_service\":\"2025-08-08\",\"date_prise_en_service\":\"2025-08-08\",\"remarque\":null,\"date_note\":\"2025-08-08\",\"ref_note\":\"K\",\"fichiers_notes\":null,\"type\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-15T16:30:57.000000Z\",\"updated_at\":\"2025-07-15T16:30:57.000000Z\"}}', NULL, '2025-07-15 15:30:57', '2025-07-15 15:30:57'),
(843, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":2,\"updated_at\":\"2025-07-15T16:30:57.000000Z\"},\"old\":{\"position_id\":5,\"updated_at\":\"2025-07-14T16:53:42.000000Z\"}}', NULL, '2025-07-15 15:30:57', '2025-07-15 15:30:57'),
(844, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":18,\"fonctionnaire_id\":16,\"ancien_position_id\":7,\"nouveaux_position_id\":2,\"date_cessation_service\":\"2025-12-12\",\"date_prise_en_service\":\"2025-12-12\",\"remarque\":null,\"date_note\":\"2025-12-12\",\"ref_note\":\"J\",\"fichiers_notes\":null,\"type\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-15T16:31:40.000000Z\",\"updated_at\":\"2025-07-15T16:31:40.000000Z\"}}', NULL, '2025-07-15 15:31:40', '2025-07-15 15:31:40'),
(845, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":2,\"updated_at\":\"2025-07-15T16:31:40.000000Z\"},\"old\":{\"position_id\":7,\"updated_at\":\"2025-07-14T16:40:13.000000Z\"}}', NULL, '2025-07-15 15:31:40', '2025-07-15 15:31:40'),
(846, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-12-12\"},\"old\":{\"date_mutation\":\"2025-12-01\"}}', NULL, '2025-07-15 15:31:40', '2025-07-15 15:31:40'),
(847, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":1,\"specialite_grade_id\":9,\"updated_at\":\"2025-07-15T16:32:57.000000Z\"},\"old\":{\"fonction_id\":null,\"specialite_grade_id\":8,\"updated_at\":\"2025-07-15T16:30:03.000000Z\"}}', NULL, '2025-07-15 15:32:57', '2025-07-15 15:32:57'),
(848, 'default', 'created', 'App\\Models\\User', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"asmae\",\"email\":\"asmae@gmail.com\"}}', NULL, '2025-07-15 23:41:50', '2025-07-15 23:41:50'),
(849, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 8, 'App\\Models\\User', 4, '{\"roles\":[\"conge\"]}', NULL, '2025-07-15 23:41:50', '2025-07-15 23:41:50'),
(850, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 161, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":161,\"fonctionnaire_id\":37,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(851, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 162, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":162,\"fonctionnaire_id\":37,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(852, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 163, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":163,\"fonctionnaire_id\":37,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(853, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 164, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":164,\"fonctionnaire_id\":37,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(854, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 165, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":165,\"fonctionnaire_id\":37,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(855, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 166, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":166,\"fonctionnaire_id\":37,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(856, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 167, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":167,\"fonctionnaire_id\":37,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(857, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 168, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":168,\"fonctionnaire_id\":37,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-16T02:16:47.000000Z\",\"updated_at\":\"2025-07-16T02:16:47.000000Z\"}}', NULL, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(858, 'Certificate', 'created', 'App\\Models\\Certificate', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"observation\":null,\"url\":null,\"type_certificate_id\":3,\"fonctionnaire_id\":37,\"jours\":10,\"date_depot\":\"2025-07-16\",\"date_debut\":\"2025-07-16\",\"created_at\":\"2025-07-16T13:57:55.000000Z\",\"updated_at\":\"2025-07-16T13:57:55.000000Z\"}}', NULL, '2025-07-16 12:57:55', '2025-07-16 12:57:55'),
(859, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"remarques\":null,\"service_id\":24,\"date_mutation\":\"2024-08-08\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"updated_at\":\"2025-07-16T13:59:44.000000Z\"},\"old\":{\"remarques\":\"\",\"service_id\":null,\"date_mutation\":\"2025-08-08\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"updated_at\":\"2025-07-15T16:30:57.000000Z\"}}', NULL, '2025-07-16 12:59:44', '2025-07-16 12:59:44'),
(860, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 38, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":38,\"ppr\":\"0808\",\"nom\":\"HJHJH\",\"nom_arabe\":\"jhjh\",\"prenom\":\"JHJHJH\",\"prenom_arabe\":\"jhjh\",\"cin\":\"JHJH\",\"sexe\":\"F\",\"date_naissance\":\"2006-01-01\",\"date_embauche\":\"2006-01-01\",\"email\":\"jhjh@gmail.com\",\"telephone\":\"7556565\",\"adresse\":\"L\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":13,\"remarques\":\"\",\"service_id\":37,\"specialite_grade_id\":22,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2024-01-01\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-16T14:15:38.000000Z\",\"updated_at\":\"2025-07-16T14:15:38.000000Z\"}}', NULL, '2025-07-16 13:15:38', '2025-07-16 13:15:38'),
(861, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":22,\"updated_at\":\"2025-07-16T14:45:26.000000Z\"},\"old\":{\"specialite_grade_id\":12,\"updated_at\":\"2025-07-15T16:29:13.000000Z\"}}', NULL, '2025-07-16 13:45:26', '2025-07-16 13:45:26'),
(862, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":13,\"updated_at\":\"2025-07-16T14:57:34.000000Z\"},\"old\":{\"fonction_id\":1,\"updated_at\":\"2025-07-15T16:32:57.000000Z\"}}', NULL, '2025-07-16 13:57:34', '2025-07-16 13:57:34'),
(863, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/SQRhGkpqvf55jKAG6u31hbf27nNAy8DR5Ij5olyg.pdf\",\"type_certificate_id\":1,\"type_conge_id\":1,\"updated_at\":\"2025-07-16T17:27:09.000000Z\"},\"old\":{\"fichiers_notes\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"updated_at\":\"2025-07-14T16:40:13.000000Z\"}}', NULL, '2025-07-16 16:27:09', '2025-07-16 16:27:09'),
(864, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":7,\"updated_at\":\"2025-07-16T17:27:09.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-07-15T16:31:40.000000Z\"}}', NULL, '2025-07-16 16:27:09', '2025-07-16 16:27:09'),
(865, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 13, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/gAgyDbO8n3nS1KDGMKABRJHSG6UoHpQi1jQJ3b15.pdf\",\"updated_at\":\"2025-07-16T17:27:51.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/SQRhGkpqvf55jKAG6u31hbf27nNAy8DR5Ij5olyg.pdf\",\"updated_at\":\"2025-07-16T17:27:09.000000Z\"}}', NULL, '2025-07-16 16:27:51', '2025-07-16 16:27:51'),
(866, 'PositionHistorique', 'deleted', 'App\\Models\\PositionHistorique', 'deleted', 13, 'App\\Models\\User', 4, '{\"old\":{\"id\":13,\"fonctionnaire_id\":16,\"ancien_position_id\":4,\"nouveaux_position_id\":7,\"date_cessation_service\":\"2025-12-12\",\"date_prise_en_service\":\"2025-12-12\",\"remarque\":null,\"date_note\":\"2025-12-12\",\"ref_note\":\"AZE\",\"fichiers_notes\":\"fichiers_notes\\/gAgyDbO8n3nS1KDGMKABRJHSG6UoHpQi1jQJ3b15.pdf\",\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":1,\"type_conge_id\":1,\"created_at\":\"2025-07-14T16:40:13.000000Z\",\"updated_at\":\"2025-07-16T17:27:51.000000Z\"}}', NULL, '2025-07-16 16:28:06', '2025-07-16 16:28:06'),
(867, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/vO7AViO4hEnOS7xVAEBAMDgGdGwYp4n0f9bR75uF.pdf\",\"type_certificate_id\":1,\"type_conge_id\":1,\"updated_at\":\"2025-07-16T17:28:24.000000Z\"},\"old\":{\"fichiers_notes\":null,\"type_certificate_id\":null,\"type_conge_id\":null,\"updated_at\":\"2025-07-15T16:31:40.000000Z\"}}', NULL, '2025-07-16 16:28:24', '2025-07-16 16:28:24'),
(868, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":2,\"updated_at\":\"2025-07-16T17:28:24.000000Z\"},\"old\":{\"position_id\":7,\"updated_at\":\"2025-07-16T17:27:09.000000Z\"}}', NULL, '2025-07-16 16:28:24', '2025-07-16 16:28:24'),
(869, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"fichier_note\":\"1752688236.pdf\",\"updated_at\":\"2025-07-16T17:50:36.000000Z\"},\"old\":{\"fichier_note\":\"\",\"updated_at\":\"2025-07-16T14:45:26.000000Z\"}}', NULL, '2025-07-16 16:50:36', '2025-07-16 16:50:36'),
(870, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/QlwkcyMONXh70wwAVtsBHPUA8qZAmnukKtRvj4Jy.pdf\",\"updated_at\":\"2025-07-16T17:51:17.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/vO7AViO4hEnOS7xVAEBAMDgGdGwYp4n0f9bR75uF.pdf\",\"updated_at\":\"2025-07-16T17:28:24.000000Z\"}}', NULL, '2025-07-16 16:51:17', '2025-07-16 16:51:17'),
(871, 'HistoriqueMutation', 'updated', 'App\\Models\\HistoriqueMutation', 'updated', 76, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/byo4G4AaKjI3n06oetojzjVh8r5kZZeeDAHjV1a0.pdf\",\"ancien_service_id\":24,\"updated_at\":\"2025-07-16T17:51:53.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/ODZCiOTwcdXHxnt9sxO3AzcMNeOOnO4czPUxqt3a.pdf\",\"ancien_service_id\":null,\"updated_at\":\"2025-07-14T16:39:24.000000Z\"}}', NULL, '2025-07-16 16:51:53', '2025-07-16 16:51:53'),
(872, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-12-01\",\"fichier_note\":\"fichiers_notes\\/byo4G4AaKjI3n06oetojzjVh8r5kZZeeDAHjV1a0.pdf\",\"updated_at\":\"2025-07-16T17:51:53.000000Z\"},\"old\":{\"date_mutation\":\"2025-12-12\",\"fichier_note\":\"fichiers_notes\\/ODZCiOTwcdXHxnt9sxO3AzcMNeOOnO4czPUxqt3a.pdf\",\"updated_at\":\"2025-07-16T17:28:24.000000Z\"}}', NULL, '2025-07-16 16:51:53', '2025-07-16 16:51:53'),
(873, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-12-12\"},\"old\":{\"date_mutation\":\"2025-12-01\"}}', NULL, '2025-07-16 16:51:53', '2025-07-16 16:51:53'),
(874, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 18, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/6rvym1gKGTH4fbI6RH63zpYX6dghSWSpj27mQuWZ.pdf\",\"updated_at\":\"2025-07-16T17:52:17.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/QlwkcyMONXh70wwAVtsBHPUA8qZAmnukKtRvj4Jy.pdf\",\"updated_at\":\"2025-07-16T17:51:17.000000Z\"}}', NULL, '2025-07-16 16:52:17', '2025-07-16 16:52:17'),
(875, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":19,\"fonctionnaire_id\":16,\"ancien_position_id\":2,\"nouveaux_position_id\":6,\"date_cessation_service\":\"2025-12-12\",\"date_prise_en_service\":\"2025-01-01\",\"remarque\":null,\"date_note\":\"2025-01-01\",\"ref_note\":\"KJ\",\"fichiers_notes\":\"fichiers_notes\\/dZvdoT3bCcJFWzNNGwuKPbTNP0VvQxmGoGnomgU7.pdf\",\"type\":\"d\\u00e9tachement\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-16T17:52:53.000000Z\",\"updated_at\":\"2025-07-16T17:52:53.000000Z\"}}', NULL, '2025-07-16 16:52:53', '2025-07-16 16:52:53'),
(876, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":6,\"updated_at\":\"2025-07-16T17:52:53.000000Z\"},\"old\":{\"position_id\":2,\"updated_at\":\"2025-07-16T17:51:53.000000Z\"}}', NULL, '2025-07-16 16:52:53', '2025-07-16 16:52:53'),
(877, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 169, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":169,\"fonctionnaire_id\":38,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(878, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 170, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":170,\"fonctionnaire_id\":38,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(879, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 171, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":171,\"fonctionnaire_id\":38,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(880, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 172, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":172,\"fonctionnaire_id\":38,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(881, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 173, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":173,\"fonctionnaire_id\":38,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(882, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 174, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":174,\"fonctionnaire_id\":38,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(883, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 175, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":175,\"fonctionnaire_id\":38,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(884, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 176, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":176,\"fonctionnaire_id\":38,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-16T17:59:30.000000Z\",\"updated_at\":\"2025-07-16T17:59:30.000000Z\"}}', NULL, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(885, 'PositionHistorique', 'updated', 'App\\Models\\PositionHistorique', 'updated', 19, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/rxcqHxeoFsLk2N2xk9kuEaMq05tLtyNsI8qk02k4.pdf\",\"type_certificate_id\":1,\"type_conge_id\":1,\"updated_at\":\"2025-07-16T18:02:27.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/dZvdoT3bCcJFWzNNGwuKPbTNP0VvQxmGoGnomgU7.pdf\",\"type_certificate_id\":null,\"type_conge_id\":null,\"updated_at\":\"2025-07-16T17:52:53.000000Z\"}}', NULL, '2025-07-16 17:02:27', '2025-07-16 17:02:27'),
(886, 'PositionHistorique', 'created', 'App\\Models\\PositionHistorique', 'created', 20, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":20,\"fonctionnaire_id\":16,\"ancien_position_id\":6,\"nouveaux_position_id\":7,\"date_cessation_service\":\"2025-12-12\",\"date_prise_en_service\":\"2025-12-12\",\"remarque\":null,\"date_note\":\"2025-12-12\",\"ref_note\":\"L\",\"fichiers_notes\":\"fichiers_notes\\/cYhrxI3kLUK1hbJVBBRRExIyrcjyMhdsqgLHEa5F.pdf\",\"type\":\"mise_en_disponibilite\",\"type_certificate_id\":null,\"type_conge_id\":null,\"created_at\":\"2025-07-16T18:05:01.000000Z\",\"updated_at\":\"2025-07-16T18:05:01.000000Z\"}}', NULL, '2025-07-16 17:05:01', '2025-07-16 17:05:01'),
(887, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"position_id\":7,\"updated_at\":\"2025-07-16T18:05:01.000000Z\"},\"old\":{\"position_id\":6,\"updated_at\":\"2025-07-16T17:52:53.000000Z\"}}', NULL, '2025-07-16 17:05:01', '2025-07-16 17:05:01'),
(888, 'HistoriqueMutation', 'updated', 'App\\Models\\HistoriqueMutation', 'updated', 76, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/94ZKR7MBJH5cfZ3PDW65mSP9lnZGEiwWzA11itFL.pdf\",\"updated_at\":\"2025-07-16T18:11:45.000000Z\"},\"old\":{\"fichiers_notes\":\"fichiers_notes\\/byo4G4AaKjI3n06oetojzjVh8r5kZZeeDAHjV1a0.pdf\",\"updated_at\":\"2025-07-16T17:51:53.000000Z\"}}', NULL, '2025-07-16 17:11:45', '2025-07-16 17:11:45'),
(889, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-12-01\",\"fichier_note\":\"fichiers_notes\\/94ZKR7MBJH5cfZ3PDW65mSP9lnZGEiwWzA11itFL.pdf\",\"updated_at\":\"2025-07-16T18:11:45.000000Z\"},\"old\":{\"date_mutation\":\"2025-12-12\",\"fichier_note\":\"fichiers_notes\\/byo4G4AaKjI3n06oetojzjVh8r5kZZeeDAHjV1a0.pdf\",\"updated_at\":\"2025-07-16T18:05:01.000000Z\"}}', NULL, '2025-07-16 17:11:45', '2025-07-16 17:11:45'),
(890, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 16, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-12-12\"},\"old\":{\"date_mutation\":\"2025-12-01\"}}', NULL, '2025-07-16 17:11:45', '2025-07-16 17:11:45'),
(891, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 39, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":39,\"ppr\":\"3212\",\"nom\":\"SDFSD\",\"nom_arabe\":\"KJKJ\",\"prenom\":\"XCVXC\",\"prenom_arabe\":\"KJKJ\",\"cin\":\"XV\",\"sexe\":\"M\",\"date_naissance\":\"1990-01-01\",\"date_embauche\":\"1990-01-01\",\"email\":\"KJK@GMAIL.COM\",\"telephone\":\"0909\",\"adresse\":\"0JH\",\"fonction_id\":12,\"nom_formation_sanitaire_id\":17,\"remarques\":\"\",\"service_id\":37,\"specialite_grade_id\":20,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2024-01-01\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-16T18:25:28.000000Z\",\"updated_at\":\"2025-07-16T18:25:28.000000Z\"}}', NULL, '2025-07-16 17:25:28', '2025-07-16 17:25:28'),
(892, 'default', 'created', 'App\\Models\\User', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"saisie\",\"email\":\"saisie@gmail.com\"}}', NULL, '2025-07-17 00:20:00', '2025-07-17 00:20:00'),
(893, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"roles\":[\"SASIEFONCTIONNAIRE\"]}', NULL, '2025-07-17 00:20:00', '2025-07-17 00:20:00'),
(894, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 25, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":25,\"nom\":\"sd\",\"nom_arabe\":\"sd\",\"grade_id\":1,\"created_at\":\"2025-07-17T01:23:32.000000Z\",\"updated_at\":\"2025-07-17T01:23:32.000000Z\"}}', NULL, '2025-07-17 00:23:32', '2025-07-17 00:23:32'),
(895, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 177, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":177,\"fonctionnaire_id\":39,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(896, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 178, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":178,\"fonctionnaire_id\":39,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(897, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 179, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":179,\"fonctionnaire_id\":39,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(898, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 180, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":180,\"fonctionnaire_id\":39,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(899, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 181, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":181,\"fonctionnaire_id\":39,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(900, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 182, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":182,\"fonctionnaire_id\":39,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(901, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 183, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":183,\"fonctionnaire_id\":39,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(902, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 184, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":184,\"fonctionnaire_id\":39,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-17T02:04:20.000000Z\",\"updated_at\":\"2025-07-17T02:04:20.000000Z\"}}', NULL, '2025-07-17 01:04:20', '2025-07-17 01:04:20'),
(903, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 26, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":26,\"nom\":\"Z\",\"nom_arabe\":\"Z\",\"grade_id\":1,\"created_at\":\"2025-07-17T02:10:58.000000Z\",\"updated_at\":\"2025-07-17T02:10:58.000000Z\"}}', NULL, '2025-07-17 01:10:58', '2025-07-17 01:10:58'),
(904, 'Type Categorie Formation', 'updated', 'App\\Models\\TypeCategorieFormation', 'updated', 8, 'App\\Models\\User', 9, '{\"attributes\":{\"nom\":\"r\\u00e9gionaleE\",\"updated_at\":\"2025-07-17T02:23:22.000000Z\"},\"old\":{\"nom\":\"r\\u00e9gionale\",\"updated_at\":\"2025-06-23T22:51:39.000000Z\"}}', NULL, '2025-07-17 01:23:22', '2025-07-17 01:23:22'),
(905, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 39, 'App\\Models\\User', 9, '{\"attributes\":{\"cin\":\"XV3R3\",\"remarques\":null,\"ref_note\":\"M\",\"updated_at\":\"2025-07-17T02:23:54.000000Z\"},\"old\":{\"cin\":\"XV\",\"remarques\":\"\",\"ref_note\":\"\",\"updated_at\":\"2025-07-16T18:25:28.000000Z\"}}', NULL, '2025-07-17 01:23:54', '2025-07-17 01:23:54'),
(906, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 39, 'App\\Models\\User', 9, '{\"attributes\":{\"ppr\":\"3212666666666\",\"updated_at\":\"2025-07-17T02:24:06.000000Z\"},\"old\":{\"ppr\":\"3212\",\"updated_at\":\"2025-07-17T02:23:54.000000Z\"}}', NULL, '2025-07-17 01:24:06', '2025-07-17 01:24:06'),
(907, 'default', 'created', 'App\\Models\\User', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"saisie2\",\"email\":\"saisie2@gamil.com\"}}', NULL, '2025-07-17 01:46:14', '2025-07-17 01:46:14'),
(908, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"roles\":[\"SASIEFONCTIONNAIRE\"]}', NULL, '2025-07-17 01:46:14', '2025-07-17 01:46:14'),
(909, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 5, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":5,\"name\":\"Samir Taqqi\",\"email\":\"tsamir.stage@grh.ma\",\"email_verified_at\":null,\"created_at\":\"2025-06-10T10:58:56.000000Z\",\"updated_at\":\"2025-06-10T10:58:56.000000Z\",\"roles\":[{\"id\":4,\"name\":\"Stage RH\",\"guard_name\":\"web\",\"created_at\":\"2025-06-10T10:58:01.000000Z\",\"updated_at\":\"2025-06-10T10:58:01.000000Z\",\"pivot\":{\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":5,\"role_id\":4}}]},\"roles\":[\"Stage RH\"]}', NULL, '2025-07-17 02:11:13', '2025-07-17 02:11:13'),
(910, 'default', 'deleted', 'App\\Models\\User', 'deleted', 5, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Samir Taqqi\",\"email\":\"tsamir.stage@grh.ma\"}}', NULL, '2025-07-17 02:11:13', '2025-07-17 02:11:13'),
(911, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"saisie2\",\"email\":\"saisie2@gamil.com\",\"roles\":[\"SASIEFONCTIONNAIRE\"]},\"new_roles\":[\"SASIEFONCTIONNAIRE\"],\"password_changed\":true}', NULL, '2025-07-17 02:11:58', '2025-07-17 02:11:58'),
(912, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"ABDLHAK\",\"email\":\"ABDLHAK@gmail.com\",\"roles\":[\"Utilisateur\"]},\"new_roles\":[\"Utilisateur\"],\"password_changed\":true}', NULL, '2025-07-17 02:12:20', '2025-07-17 02:12:20'),
(913, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2024-07-15\",\"date_prise_en_service\":\"2024-01-01\",\"updated_at\":\"2025-07-17T13:49:26.000000Z\"},\"old\":{\"date_mutation\":\"2025-07-15\",\"date_prise_en_service\":\"2026-01-01\",\"updated_at\":\"2025-07-16T14:57:34.000000Z\"}}', NULL, '2025-07-17 12:49:26', '2025-07-17 12:49:26'),
(914, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 40, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":40,\"ppr\":\"00909\",\"nom\":\"JHJH\",\"nom_arabe\":\"JHJH\",\"prenom\":\"JHJ\",\"prenom_arabe\":\"JHJH\",\"cin\":\"JHJH\",\"sexe\":\"F\",\"date_naissance\":\"2020-01-01\",\"date_embauche\":\"2024-01-01\",\"email\":\"BBV@GMAIL.COM\",\"telephone\":\"989898\",\"adresse\":\"JHJHJH\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":8,\"remarques\":\"KJKJ\",\"service_id\":37,\"specialite_grade_id\":16,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2024-01-01\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-17T13:52:31.000000Z\",\"updated_at\":\"2025-07-17T13:52:31.000000Z\"}}', NULL, '2025-07-17 12:52:31', '2025-07-17 12:52:31'),
(915, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 185, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":185,\"fonctionnaire_id\":40,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(916, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 186, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":186,\"fonctionnaire_id\":40,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(917, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 187, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":187,\"fonctionnaire_id\":40,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(918, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 188, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":188,\"fonctionnaire_id\":40,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(919, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 189, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":189,\"fonctionnaire_id\":40,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(920, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 190, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":190,\"fonctionnaire_id\":40,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(921, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 191, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":191,\"fonctionnaire_id\":40,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(922, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 192, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":192,\"fonctionnaire_id\":40,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-18T00:31:15.000000Z\",\"updated_at\":\"2025-07-18T00:31:15.000000Z\"}}', NULL, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(923, 'HistoriqueMutation', 'updated', 'App\\Models\\HistoriqueMutation', 'updated', 69, 'App\\Models\\User', 4, '{\"attributes\":{\"fichiers_notes\":\"fichiers_notes\\/2aT8cReg9k9hxOQJHGXcqeLIEge2nrQlQnEZeBvc.pdf\",\"nouveau_service_id\":24,\"updated_at\":\"2025-07-18T00:32:10.000000Z\"},\"old\":{\"fichiers_notes\":null,\"nouveau_service_id\":null,\"updated_at\":\"2025-07-09T14:09:50.000000Z\"}}', NULL, '2025-07-17 23:32:10', '2025-07-17 23:32:10'),
(924, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"fichiers_notes\\/2aT8cReg9k9hxOQJHGXcqeLIEge2nrQlQnEZeBvc.pdf\",\"updated_at\":\"2025-07-18T00:32:10.000000Z\"},\"old\":{\"date_mutation\":\"2024-08-08\",\"date_prise_en_service\":\"2024-01-01\",\"date_note\":\"2024-01-01\",\"fichier_note\":\"\",\"updated_at\":\"2025-07-16T13:59:44.000000Z\"}}', NULL, '2025-07-17 23:32:10', '2025-07-17 23:32:10'),
(925, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 15, 'App\\Models\\User', 4, '{\"attributes\":{\"date_mutation\":\"2025-08-08\"},\"old\":{\"date_mutation\":\"2025-01-01\"}}', NULL, '2025-07-17 23:32:10', '2025-07-17 23:32:10'),
(926, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":41,\"ppr\":\"898989898\",\"nom\":\"JHJHJH\",\"nom_arabe\":\"GFG\",\"prenom\":\"JHJHJ\",\"prenom_arabe\":\"EZ\",\"cin\":\"CG8787\",\"sexe\":\"F\",\"marie\":\"non\",\"nom_conjoint\":null,\"prenom_conjoint\":null,\"enfants\":null,\"photo\":null,\"numero_assurance\":\"787887\",\"date_naissance\":\"2024-01-01\",\"date_embauche\":\"2025-01-01\",\"email\":\"ZE@GMAIL.COM\",\"telephone\":\"08787878\",\"adresse\":\"AZEAZ\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":17,\"remarques\":\"ZEZE\",\"service_id\":37,\"specialite_grade_id\":18,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-12-31\",\"date_note\":\"2025-12-31\",\"fichier_note\":\"\",\"ref_note\":\"AZE\",\"created_at\":\"2025-07-18T00:33:57.000000Z\",\"updated_at\":\"2025-07-18T00:33:57.000000Z\"}}', NULL, '2025-07-17 23:33:57', '2025-07-17 23:33:57'),
(927, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 193, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":193,\"fonctionnaire_id\":41,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(928, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 194, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":194,\"fonctionnaire_id\":41,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(929, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 195, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":195,\"fonctionnaire_id\":41,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(930, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 196, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":196,\"fonctionnaire_id\":41,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(931, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 197, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":197,\"fonctionnaire_id\":41,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(932, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 198, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":198,\"fonctionnaire_id\":41,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(933, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 199, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":199,\"fonctionnaire_id\":41,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(934, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 200, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":200,\"fonctionnaire_id\":41,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-18T00:34:38.000000Z\",\"updated_at\":\"2025-07-18T00:34:38.000000Z\"}}', NULL, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(935, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":42,\"ppr\":\"0909\",\"nom\":\"ALAOUI\",\"nom_arabe\":\"AZ\",\"prenom\":\"AMAL\",\"prenom_arabe\":\"AZE\",\"cin\":\"K9898\",\"sexe\":\"F\",\"marie\":null,\"nom_conjoint\":null,\"prenom_conjoint\":null,\"enfants\":null,\"photo\":null,\"numero_assurance\":null,\"date_naissance\":\"2026-01-01\",\"date_embauche\":\"2010-01-01\",\"email\":\"AZE@GMAIL.COM\",\"telephone\":\"98989\",\"adresse\":\"AZ\",\"fonction_id\":2,\"nom_formation_sanitaire_id\":8,\"remarques\":\"ZEAZ\",\"service_id\":37,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-12-31\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-18T00:52:56.000000Z\",\"updated_at\":\"2025-07-18T00:52:56.000000Z\"}}', NULL, '2025-07-17 23:52:56', '2025-07-17 23:52:56'),
(936, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 201, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":201,\"fonctionnaire_id\":42,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(937, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 202, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":202,\"fonctionnaire_id\":42,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(938, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 203, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":203,\"fonctionnaire_id\":42,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(939, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 204, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":204,\"fonctionnaire_id\":42,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(940, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 205, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":205,\"fonctionnaire_id\":42,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(941, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 206, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":206,\"fonctionnaire_id\":42,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(942, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 207, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":207,\"fonctionnaire_id\":42,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(943, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 208, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":208,\"fonctionnaire_id\":42,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-18T00:53:07.000000Z\",\"updated_at\":\"2025-07-18T00:53:07.000000Z\"}}', NULL, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(944, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 77, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":77,\"fonctionnaire_id\":42,\"type_mutation_id\":4,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"ref_note\":\"\",\"fichiers_notes\":\"\",\"formation_sanitaire_origine_id\":8,\"formation_sanitaire_destination_id\":8,\"remarque\":null,\"date_prise_en_service\":\"2025-12-31\",\"date_cessation_service\":null,\"ancien_service_id\":37,\"nouveau_service_id\":37,\"ancien_fonction_id\":2,\"nouveau_fonction_id\":2,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":5,\"created_at\":\"2025-07-18T00:59:49.000000Z\",\"updated_at\":\"2025-07-18T00:59:49.000000Z\"}}', NULL, '2025-07-17 23:59:49', '2025-07-17 23:59:49'),
(945, 'HistoriqueMutation', 'created', 'App\\Models\\HistoriqueMutation', 'created', 78, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":78,\"fonctionnaire_id\":42,\"type_mutation_id\":5,\"date_mutation\":\"2025-01-01\",\"date_note\":\"2026-01-01\",\"ref_note\":\"BNB\",\"fichiers_notes\":null,\"formation_sanitaire_origine_id\":8,\"formation_sanitaire_destination_id\":10,\"remarque\":null,\"date_prise_en_service\":\"2026-01-01\",\"date_cessation_service\":\"2026-01-01\",\"ancien_service_id\":37,\"nouveau_service_id\":27,\"ancien_fonction_id\":2,\"nouveau_fonction_id\":3,\"ancien_specialite_id\":5,\"nouveau_specialite_id\":7,\"created_at\":\"2025-07-18T00:59:49.000000Z\",\"updated_at\":\"2025-07-18T00:59:49.000000Z\"}}', NULL, '2025-07-17 23:59:49', '2025-07-17 23:59:49'),
(946, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"fonction_id\":3,\"nom_formation_sanitaire_id\":10,\"service_id\":27,\"specialite_grade_id\":7,\"type_mutation\":5,\"date_prise_en_service\":\"2026-01-01\",\"date_note\":\"2026-01-01\",\"ref_note\":\"BNB\",\"updated_at\":\"2025-07-18T00:59:49.000000Z\"},\"old\":{\"fonction_id\":2,\"nom_formation_sanitaire_id\":8,\"service_id\":37,\"specialite_grade_id\":5,\"type_mutation\":4,\"date_prise_en_service\":\"2025-12-31\",\"date_note\":\"2025-01-01\",\"ref_note\":\"\",\"updated_at\":\"2025-07-18T00:52:56.000000Z\"}}', NULL, '2025-07-17 23:59:49', '2025-07-17 23:59:49'),
(947, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"type_mutation\":4},\"old\":{\"type_mutation\":\"5\"}}', NULL, '2025-07-17 23:59:49', '2025-07-17 23:59:49'),
(948, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 43, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":43,\"ppr\":\"INSAF\",\"nom\":\"EER\",\"nom_arabe\":\"Sq\",\"prenom\":\"QD\",\"prenom_arabe\":\"z\",\"cin\":\"QS\",\"sexe\":\"F\",\"marie\":null,\"nom_conjoint\":null,\"prenom_conjoint\":null,\"enfants\":null,\"photo\":\"photo_1752800598.png\",\"numero_assurance\":null,\"date_naissance\":\"2025-01-01\",\"date_embauche\":\"2007-01-01\",\"email\":\"aze@gmail.com\",\"telephone\":\"zae\",\"adresse\":\"a\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":8,\"remarques\":\"AZ\",\"service_id\":36,\"specialite_grade_id\":8,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2007-01-01\",\"date_prise_en_service\":\"2027-01-01\",\"date_note\":\"2027-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-18T01:03:18.000000Z\",\"updated_at\":\"2025-07-18T01:03:18.000000Z\"}}', NULL, '2025-07-18 00:03:18', '2025-07-18 00:03:18'),
(949, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 3, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":3,\"name\":\"Mohammed Kaddouri\",\"email\":\"mohammed@rhapp.com\",\"email_verified_at\":\"2025-03-23T23:30:45.000000Z\",\"created_at\":\"2025-03-23T23:30:45.000000Z\",\"updated_at\":\"2025-03-23T23:30:45.000000Z\",\"roles\":[]},\"roles\":[]}', NULL, '2025-07-22 12:05:16', '2025-07-22 12:05:16'),
(950, 'default', 'deleted', 'App\\Models\\User', 'deleted', 3, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Mohammed Kaddouri\",\"email\":\"mohammed@rhapp.com\"}}', NULL, '2025-07-22 12:05:16', '2025-07-22 12:05:16'),
(951, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 2, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":2,\"name\":\"Mohammed Kaddouri\",\"email\":\"mohammed@grh.com\",\"email_verified_at\":\"2024-12-20T15:28:19.000000Z\",\"created_at\":\"2024-12-20T15:28:19.000000Z\",\"updated_at\":\"2024-12-20T15:57:40.000000Z\",\"roles\":[]},\"roles\":[]}', NULL, '2025-07-22 12:05:22', '2025-07-22 12:05:22'),
(952, 'default', 'deleted', 'App\\Models\\User', 'deleted', 2, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Mohammed Kaddouri\",\"email\":\"mohammed@grh.com\"}}', NULL, '2025-07-22 12:05:22', '2025-07-22 12:05:22'),
(953, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 7, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":7,\"name\":\"mansour\",\"email\":\"mansour@gamil.com\",\"email_verified_at\":null,\"created_at\":\"2025-07-06T14:54:48.000000Z\",\"updated_at\":\"2025-07-06T14:54:48.000000Z\",\"roles\":[{\"id\":5,\"name\":\"conge\",\"guard_name\":\"web\",\"created_at\":\"2025-06-23T22:46:03.000000Z\",\"updated_at\":\"2025-06-23T22:46:03.000000Z\",\"pivot\":{\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":7,\"role_id\":5}}]},\"roles\":[\"conge\"]}', NULL, '2025-07-22 12:05:28', '2025-07-22 12:05:28'),
(954, 'default', 'deleted', 'App\\Models\\User', 'deleted', 7, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"mansour\",\"email\":\"mansour@gamil.com\"}}', NULL, '2025-07-22 12:05:28', '2025-07-22 12:05:28'),
(955, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 6, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":6,\"name\":\"ABDLHAK\",\"email\":\"ABDLHAK@gmail.com\",\"email_verified_at\":null,\"created_at\":\"2025-07-06T14:54:19.000000Z\",\"updated_at\":\"2025-07-17T04:12:20.000000Z\",\"roles\":[{\"id\":3,\"name\":\"Utilisateur\",\"guard_name\":\"web\",\"created_at\":\"2025-05-24T16:37:31.000000Z\",\"updated_at\":\"2025-05-24T16:37:31.000000Z\",\"pivot\":{\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":6,\"role_id\":3}}]},\"roles\":[\"Utilisateur\"]}', NULL, '2025-07-22 12:05:48', '2025-07-22 12:05:48'),
(956, 'default', 'deleted', 'App\\Models\\User', 'deleted', 6, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"ABDLHAK\",\"email\":\"ABDLHAK@gmail.com\"}}', NULL, '2025-07-22 12:05:48', '2025-07-22 12:05:48'),
(957, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"saisie\",\"email\":\"saisie@gmail.com\",\"roles\":[]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":false}', NULL, '2025-07-22 12:11:57', '2025-07-22 12:11:57'),
(958, 'default', 'updated', 'App\\Models\\User', 'updated', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"amalmalih\",\"email\":\"amalmalih@gmail.com\"},\"old\":{\"name\":\"saisie\",\"email\":\"saisie@gmail.com\"}}', NULL, '2025-07-22 12:12:36', '2025-07-22 12:12:36'),
(959, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"saisie\",\"email\":\"saisie@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":false}', NULL, '2025-07-22 12:12:36', '2025-07-22 12:12:36'),
(960, 'default', 'updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"assiamabrour\",\"email\":\"assiamabrour@gmail.com\"},\"old\":{\"name\":\"asmae\",\"email\":\"asmae@gmail.com\"}}', NULL, '2025-07-22 12:13:21', '2025-07-22 12:13:21'),
(961, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 8, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"asmae\",\"email\":\"asmae@gmail.com\",\"roles\":[\"conge\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:13:21', '2025-07-22 12:13:21'),
(962, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 30, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"soukaina\",\"email\":\"soukaina@gmail.com\",\"roles\":[]},\"new_roles\":[\"Super Admin\"],\"password_changed\":false}', NULL, '2025-07-22 12:15:59', '2025-07-22 12:15:59'),
(963, 'default', 'updated', 'App\\Models\\User', 'updated', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\"},\"old\":{\"name\":\"saisie2\",\"email\":\"saisie2@gamil.com\"}}', NULL, '2025-07-22 12:16:31', '2025-07-22 12:16:31'),
(964, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"saisie2\",\"email\":\"saisie2@gamil.com\",\"roles\":[]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:16:31', '2025-07-22 12:16:31'),
(965, 'default', 'Mot de passe réinitialisé', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"action\":\"password_reset\"}', NULL, '2025-07-22 12:19:00', '2025-07-22 12:19:00'),
(966, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:20:48', '2025-07-22 12:20:48'),
(967, 'default', 'updated', 'App\\Models\\User', 'updated', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"email\":\"amalmalihm@gmail.com\"},\"old\":{\"email\":\"amalmalih@gmail.com\"}}', NULL, '2025-07-22 12:23:08', '2025-07-22 12:23:08'),
(968, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"amalmalih\",\"email\":\"amalmalih@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:23:08', '2025-07-22 12:23:08'),
(969, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 30, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"soukaina\",\"email\":\"soukaina@gmail.com\",\"roles\":[\"Super Admin\"]},\"new_roles\":[\"Super Admin\"],\"password_changed\":true}', NULL, '2025-07-22 12:24:06', '2025-07-22 12:24:06'),
(970, 'default', 'Utilisateur supprimé', 'App\\Models\\User', NULL, 30, 'App\\Models\\User', 4, '{\"user_data\":{\"id\":30,\"name\":\"soukaina\",\"email\":\"soukaina@gmail.com\",\"email_verified_at\":null,\"created_at\":null,\"updated_at\":\"2025-07-22T14:24:06.000000Z\",\"roles\":[{\"id\":1,\"name\":\"Super Admin\",\"guard_name\":\"web\",\"created_at\":\"2025-05-24T16:37:31.000000Z\",\"updated_at\":\"2025-05-24T16:37:31.000000Z\",\"pivot\":{\"model_type\":\"App\\\\Models\\\\User\",\"model_id\":30,\"role_id\":1}}]},\"roles\":[\"Super Admin\"]}', NULL, '2025-07-22 12:24:34', '2025-07-22 12:24:34'),
(971, 'default', 'deleted', 'App\\Models\\User', 'deleted', 30, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"soukaina\",\"email\":\"soukaina@gmail.com\"}}', NULL, '2025-07-22 12:24:34', '2025-07-22 12:24:34'),
(972, 'default', 'created', 'App\\Models\\User', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"soukaina\",\"email\":\"soukaina2025@gmail.com\"}}', NULL, '2025-07-22 12:31:54', '2025-07-22 12:31:54'),
(973, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 11, 'App\\Models\\User', 4, '{\"roles\":[\"Super Admin\"]}', NULL, '2025-07-22 12:31:54', '2025-07-22 12:31:54'),
(974, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:34:47', '2025-07-22 12:34:47'),
(975, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 8, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"assiamabrour\",\"email\":\"assiamabrour@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 12:36:08', '2025-07-22 12:36:08'),
(976, 'Fonctionnaire', 'created', 'App\\Models\\Fonctionnaire', 'created', 65, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":65,\"ppr\":\"22121\",\"nom\":\"xxxxxxx\",\"nom_arabe\":\"xxx\",\"prenom\":\"xxxxxx\",\"prenom_arabe\":\"xxxx\",\"cin\":\"xx22\",\"sexe\":\"F\",\"marie\":null,\"nom_conjoint\":null,\"prenom_conjoint\":null,\"enfants\":null,\"photo\":null,\"numero_assurance\":null,\"date_naissance\":\"2025-01-01\",\"date_embauche\":\"2025-10-10\",\"email\":\"xxxx@gmail.com\",\"telephone\":\"224\",\"adresse\":\"\",\"fonction_id\":17,\"nom_formation_sanitaire_id\":9,\"remarques\":\"\",\"service_id\":37,\"specialite_grade_id\":8,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2025-01-01\",\"date_prise_en_service\":\"2025-01-01\",\"date_note\":\"2025-01-01\",\"fichier_note\":\"\",\"ref_note\":\"\",\"created_at\":\"2025-07-22T14:37:37.000000Z\",\"updated_at\":\"2025-07-22T14:37:37.000000Z\"}}', NULL, '2025-07-22 12:37:37', '2025-07-22 12:37:37'),
(977, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":24,\"nom\":\"Hors grade\",\"nom_arabe\":\"\\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"cadre_id\":8,\"created_at\":\"2025-07-22T14:47:01.000000Z\",\"updated_at\":\"2025-07-22T14:47:01.000000Z\"}}', NULL, '2025-07-22 12:47:02', '2025-07-22 12:47:02'),
(978, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"nom\":\"Technicien de Sante\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u0635\\u062d\\u0629\",\"categorie_cadre_id\":4,\"created_at\":\"2025-07-22T14:51:37.000000Z\",\"updated_at\":\"2025-07-22T14:51:37.000000Z\"}}', NULL, '2025-07-22 12:51:37', '2025-07-22 12:51:37'),
(979, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 25, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":25,\"nom\":\"Principale\",\"nom_arabe\":\"\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\",\"cadre_id\":22,\"created_at\":\"2025-07-22T14:53:23.000000Z\",\"updated_at\":\"2025-07-22T14:53:23.000000Z\"}}', NULL, '2025-07-22 12:53:23', '2025-07-22 12:53:23'),
(980, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":26,\"nom\":\"Exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u0625\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":22,\"created_at\":\"2025-07-22T14:54:19.000000Z\",\"updated_at\":\"2025-07-22T14:54:19.000000Z\"}}', NULL, '2025-07-22 12:54:19', '2025-07-22 12:54:19'),
(981, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 27, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":27,\"nom\":\"1 er Grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":22,\"created_at\":\"2025-07-22T14:55:28.000000Z\",\"updated_at\":\"2025-07-22T14:55:28.000000Z\"}}', NULL, '2025-07-22 12:55:28', '2025-07-22 12:55:28'),
(982, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"nom\":\"Infirmier Auxilaire\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f\",\"categorie_cadre_id\":4,\"created_at\":\"2025-07-22T14:56:30.000000Z\",\"updated_at\":\"2025-07-22T14:56:30.000000Z\"}}', NULL, '2025-07-22 12:56:30', '2025-07-22 12:56:30'),
(983, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 28, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":28,\"nom\":\"1 er Grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":23,\"created_at\":\"2025-07-22T14:57:15.000000Z\",\"updated_at\":\"2025-07-22T14:57:15.000000Z\"}}', NULL, '2025-07-22 12:57:15', '2025-07-22 12:57:15'),
(984, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":24,\"nom\":\"Assistant social\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0627\\u062c\\u062a\\u0645\\u0627\\u0639\\u064a\",\"categorie_cadre_id\":4,\"created_at\":\"2025-07-22T14:59:41.000000Z\",\"updated_at\":\"2025-07-22T14:59:41.000000Z\"}}', NULL, '2025-07-22 12:59:41', '2025-07-22 12:59:41'),
(985, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 29, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":29,\"nom\":\"1 er Grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":24,\"created_at\":\"2025-07-22T14:59:57.000000Z\",\"updated_at\":\"2025-07-22T14:59:57.000000Z\"}}', NULL, '2025-07-22 12:59:57', '2025-07-22 12:59:57'),
(986, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 30, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":30,\"nom\":\"Principale\",\"nom_arabe\":\"\\u0631\\u0626\\u064a\\u0633\\u064a\",\"cadre_id\":23,\"created_at\":\"2025-07-22T15:00:34.000000Z\",\"updated_at\":\"2025-07-22T15:00:34.000000Z\"}}', NULL, '2025-07-22 13:00:34', '2025-07-22 13:00:34'),
(987, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 31, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":31,\"nom\":\"deuxieme grade\",\"nom_arabe\":\"deuxieme grade\",\"cadre_id\":16,\"created_at\":\"2025-07-22T15:08:36.000000Z\",\"updated_at\":\"2025-07-22T15:08:36.000000Z\"}}', NULL, '2025-07-22 13:08:36', '2025-07-22 13:08:36'),
(988, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":26,\"nom\":\"sport\",\"nom_arabe\":\"sdd\",\"grade_id\":11,\"created_at\":\"2025-07-22T15:12:53.000000Z\",\"updated_at\":\"2025-07-22T15:12:53.000000Z\"}}', NULL, '2025-07-22 13:12:53', '2025-07-22 13:12:53'),
(989, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"nom_arabe\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u0629\",\"updated_at\":\"2025-07-22T15:13:30.000000Z\"},\"old\":{\"nom_arabe\":\"sdd\",\"updated_at\":\"2025-07-22T15:12:53.000000Z\"}}', NULL, '2025-07-22 13:13:30', '2025-07-22 13:13:30'),
(990, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 8, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"assiamabrour\",\"email\":\"assiamabrour@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-22 13:14:27', '2025-07-22 13:14:27'),
(991, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 27, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":27,\"nom\":\"Sage femme\",\"nom_arabe\":\"\\u0642\\u0627\\u0628\\u0644\\u0629\",\"grade_id\":14,\"created_at\":\"2025-07-24T12:59:29.000000Z\",\"updated_at\":\"2025-07-24T12:59:29.000000Z\"}}', NULL, '2025-07-24 10:59:29', '2025-07-24 10:59:29'),
(992, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 32, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":32,\"nom\":\"Exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":16,\"created_at\":\"2025-07-24T13:02:01.000000Z\",\"updated_at\":\"2025-07-24T13:02:01.000000Z\"}}', NULL, '2025-07-24 11:02:01', '2025-07-24 11:02:01'),
(993, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 28, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":28,\"nom\":\"Polyvalent\",\"nom_arabe\":\"\\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"grade_id\":32,\"created_at\":\"2025-07-24T13:03:05.000000Z\",\"updated_at\":\"2025-07-24T13:03:05.000000Z\"}}', NULL, '2025-07-24 11:03:05', '2025-07-24 11:03:05'),
(994, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 46, 'App\\Models\\User', 8, '{\"attributes\":{\"nom_arabe\":\"LAAROUSSI\",\"prenom_arabe\":\"MAJDOULINE\",\"fonction_id\":9,\"nom_formation_sanitaire_id\":6,\"service_id\":24,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2016-10-21\",\"ref_note\":\"1942339\",\"updated_at\":\"2025-07-24T13:07:03.000000Z\"},\"old\":{\"nom_arabe\":null,\"prenom_arabe\":null,\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2025-05-22\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:07:03', '2025-07-24 11:07:03'),
(995, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 209, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":209,\"fonctionnaire_id\":46,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-24T13:07:30.000000Z\",\"updated_at\":\"2025-07-24T13:07:30.000000Z\"}}', NULL, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(996, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 210, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":210,\"fonctionnaire_id\":46,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T13:07:30.000000Z\",\"updated_at\":\"2025-07-24T13:07:30.000000Z\"}}', NULL, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(997, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 211, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":211,\"fonctionnaire_id\":46,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T13:07:30.000000Z\",\"updated_at\":\"2025-07-24T13:07:30.000000Z\"}}', NULL, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(998, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 212, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":212,\"fonctionnaire_id\":46,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T13:07:30.000000Z\",\"updated_at\":\"2025-07-24T13:07:30.000000Z\"}}', NULL, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(999, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 213, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":213,\"fonctionnaire_id\":46,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-24T13:07:30.000000Z\",\"updated_at\":\"2025-07-24T13:07:30.000000Z\"}}', NULL, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(1000, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 214, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":214,\"fonctionnaire_id\":46,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T13:07:31.000000Z\",\"updated_at\":\"2025-07-24T13:07:31.000000Z\"}}', NULL, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(1001, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 215, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":215,\"fonctionnaire_id\":46,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-24T13:07:31.000000Z\",\"updated_at\":\"2025-07-24T13:07:31.000000Z\"}}', NULL, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(1002, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 216, 'App\\Models\\User', 8, '{\"attributes\":{\"id\":216,\"fonctionnaire_id\":46,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-24T13:07:31.000000Z\",\"updated_at\":\"2025-07-24T13:07:31.000000Z\"}}', NULL, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(1003, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":9,\"nom\":\"Adarissa\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u0633\\u0629\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-07-24T13:18:10.000000Z\",\"updated_at\":\"2025-07-24T13:18:10.000000Z\"}}', NULL, '2025-07-24 11:18:10', '2025-07-24 11:18:10'),
(1004, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":10,\"nom\":\"CSU 1\",\"nom_arabe\":\"\\u0627\\u0644\\u0645\\u0633\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0623\\u0648\\u0644\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-07-24T13:21:44.000000Z\",\"updated_at\":\"2025-07-24T13:21:44.000000Z\"}}', NULL, '2025-07-24 11:21:44', '2025-07-24 11:21:44'),
(1005, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 21, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":21,\"nom\":\"Adarissa\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u0633\\u0629\",\"niveau_categorie_formation_id\":10,\"arrondissement_commune_id\":207,\"created_at\":\"2025-07-24T13:24:24.000000Z\",\"updated_at\":\"2025-07-24T13:24:24.000000Z\"}}', NULL, '2025-07-24 11:24:24', '2025-07-24 11:24:24'),
(1006, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 46, 'App\\Models\\User', 8, '{\"attributes\":{\"specialite_grade_id\":9,\"updated_at\":\"2025-07-24T13:28:25.000000Z\"},\"old\":{\"specialite_grade_id\":5,\"updated_at\":\"2025-07-24T13:07:03.000000Z\"}}', NULL, '2025-07-24 11:28:25', '2025-07-24 11:28:25'),
(1007, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 46, 'App\\Models\\User', 8, '{\"attributes\":{\"nom_formation_sanitaire_id\":21,\"service_id\":31,\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:29:48.000000Z\"},\"old\":{\"nom_formation_sanitaire_id\":6,\"service_id\":24,\"specialite_grade_id\":9,\"updated_at\":\"2025-07-24T13:28:25.000000Z\"}}', NULL, '2025-07-24 11:29:48', '2025-07-24 11:29:48'),
(1008, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 33, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":33,\"nom\":\"1 er garde\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":10,\"created_at\":\"2025-07-24T13:30:49.000000Z\",\"updated_at\":\"2025-07-24T13:30:49.000000Z\"}}', NULL, '2025-07-24 11:30:49', '2025-07-24 11:30:49'),
(1009, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 47, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":31,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2020-06-11\",\"ref_note\":\"2070290\",\"updated_at\":\"2025-07-24T13:34:39.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2023-02-08\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:34:39', '2025-07-24 11:34:39'),
(1010, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 44, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":31,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2022-06-02\",\"date_prise_en_service\":\"2025-02-08\",\"date_note\":\"2025-02-08\",\"ref_note\":\"2176357\",\"updated_at\":\"2025-07-24T13:38:02.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2025-07-10\",\"date_prise_en_service\":\"2025-07-10\",\"date_note\":\"2025-07-10\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:38:02', '2025-07-24 11:38:02'),
(1011, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 45, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":31,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2009-07-20\",\"ref_note\":\"1552792\",\"updated_at\":\"2025-07-24T13:41:41.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2021-09-10\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:41:41', '2025-07-24 11:41:41'),
(1012, 'Service', 'created', 'App\\Models\\Service', 'created', 40, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":40,\"nom\":\"Sans\",\"nom_arabe\":\"\\u0628\\u062f\\u0648\\u0646\",\"created_at\":\"2025-07-24T13:42:34.000000Z\",\"updated_at\":\"2025-07-24T13:42:34.000000Z\"}}', NULL, '2025-07-24 11:42:34', '2025-07-24 11:42:34'),
(1013, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 45, 'App\\Models\\User', 8, '{\"attributes\":{\"service_id\":40,\"updated_at\":\"2025-07-24T13:43:04.000000Z\"},\"old\":{\"service_id\":31,\"updated_at\":\"2025-07-24T13:41:41.000000Z\"}}', NULL, '2025-07-24 11:43:04', '2025-07-24 11:43:04'),
(1014, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 48, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":1,\"date_mutation\":\"2005-12-05\",\"ref_note\":\"1258737\",\"updated_at\":\"2025-07-24T13:46:02.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2023-06-09\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:46:02', '2025-07-24 11:46:02');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1015, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 49, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2006-04-13\",\"ref_note\":\"1259364\",\"updated_at\":\"2025-07-24T13:49:05.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2021-11-08\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:49:05', '2025-07-24 11:49:05'),
(1016, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 50, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":6,\"service_id\":40,\"specialite_grade_id\":27,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1992-08-10\",\"ref_note\":\"726398\",\"updated_at\":\"2025-07-24T13:52:31.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2018-05-25\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 11:52:31', '2025-07-24 11:52:31'),
(1017, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 11:55:33', '2025-07-24 11:55:33'),
(1018, 'Service', 'created', 'App\\Models\\Service', 'created', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":41,\"nom\":\"Aide soignant\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u0639\\u0644\\u0627\\u062c\",\"created_at\":\"2025-07-24T13:58:00.000000Z\",\"updated_at\":\"2025-07-24T13:58:00.000000Z\"}}', NULL, '2025-07-24 11:58:00', '2025-07-24 11:58:00'),
(1019, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"amalmalih\",\"email\":\"amalmalihm@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 11:58:27', '2025-07-24 11:58:27'),
(1020, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 52, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":28,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1980-07-01\",\"ref_note\":\"969256\",\"updated_at\":\"2025-07-24T14:00:31.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2021-09-23\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:00:31', '2025-07-24 12:00:31'),
(1021, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 51, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":41,\"specialite_grade_id\":22,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"74241\",\"updated_at\":\"2025-07-24T14:03:23.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:03:23', '2025-07-24 12:03:23'),
(1022, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 53, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":28,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2018-11-01\",\"ref_note\":\"2029607\",\"updated_at\":\"2025-07-24T14:07:19.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2025-03-10\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:07:19', '2025-07-24 12:07:19'),
(1023, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":11,\"nom\":\"CSC\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u0635\\u062d\\u064a \\u0642\\u0631\\u0648\\u064a\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-07-24T14:07:22.000000Z\",\"updated_at\":\"2025-07-24T14:07:22.000000Z\"}}', NULL, '2025-07-24 12:07:22', '2025-07-24 12:07:22'),
(1024, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 22, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":22,\"nom\":\"Ain Bida\",\"nom_arabe\":\"\\u0639\\u064a\\u0646 \\u0627\\u0644\\u0628\\u064a\\u0636\\u0627\\u0621\",\"niveau_categorie_formation_id\":11,\"arrondissement_commune_id\":176,\"created_at\":\"2025-07-24T14:08:38.000000Z\",\"updated_at\":\"2025-07-24T14:08:38.000000Z\"}}', NULL, '2025-07-24 12:08:38', '2025-07-24 12:08:38'),
(1025, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":23,\"nom\":\"Ain Haroun\",\"nom_arabe\":\"\\u0639\\u064a\\u0646 \\u0647\\u0627\\u0631\\u0648\\u0646\",\"niveau_categorie_formation_id\":10,\"arrondissement_commune_id\":174,\"created_at\":\"2025-07-24T14:09:41.000000Z\",\"updated_at\":\"2025-07-24T14:09:41.000000Z\"}}', NULL, '2025-07-24 12:09:41', '2025-07-24 12:09:41'),
(1026, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 55, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":28,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"1041999\",\"updated_at\":\"2025-07-24T14:10:21.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:10:21', '2025-07-24 12:10:21'),
(1027, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 24, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":24,\"nom\":\"Ain Kadous\",\"nom_arabe\":\"\\u0639\\u064a\\u0646 \\u0642\\u0627\\u062f\\u0648\\u0633\",\"niveau_categorie_formation_id\":10,\"arrondissement_commune_id\":174,\"created_at\":\"2025-07-24T14:10:25.000000Z\",\"updated_at\":\"2025-07-24T14:10:25.000000Z\"}}', NULL, '2025-07-24 12:10:25', '2025-07-24 12:10:25'),
(1028, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 25, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":25,\"nom\":\"Ain nokbi\",\"nom_arabe\":\"\\u0639\\u064a\\u0646 \\u0646\\u0642\\u0628\\u064a\",\"niveau_categorie_formation_id\":10,\"arrondissement_commune_id\":175,\"created_at\":\"2025-07-24T14:11:31.000000Z\",\"updated_at\":\"2025-07-24T14:11:31.000000Z\"}}', NULL, '2025-07-24 12:11:31', '2025-07-24 12:11:31'),
(1029, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 54, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":9,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"330874\",\"updated_at\":\"2025-07-24T14:12:09.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:12:09', '2025-07-24 12:12:09'),
(1030, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 34, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":34,\"nom\":\"Exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":10,\"created_at\":\"2025-07-24T14:12:55.000000Z\",\"updated_at\":\"2025-07-24T14:12:55.000000Z\"}}', NULL, '2025-07-24 12:12:55', '2025-07-24 12:12:55'),
(1031, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 29, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":29,\"nom\":\"Sage Femme\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629\",\"grade_id\":34,\"created_at\":\"2025-07-24T14:13:40.000000Z\",\"updated_at\":\"2025-07-24T14:13:40.000000Z\"}}', NULL, '2025-07-24 12:13:40', '2025-07-24 12:13:40'),
(1032, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 57, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":9,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"850487\",\"updated_at\":\"2025-07-24T14:13:42.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:13:43', '2025-07-24 12:13:43'),
(1033, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 56, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":28,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-11-07\",\"ref_note\":\"98596\",\"updated_at\":\"2025-07-24T14:18:10.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2022-05-10\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:18:11', '2025-07-24 12:18:11'),
(1034, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 58, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":9,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":9,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"969254\",\"updated_at\":\"2025-07-24T14:20:07.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:20:07', '2025-07-24 12:20:07'),
(1035, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 59, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":12,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"2007-09-25\",\"ref_note\":\"1449869\",\"updated_at\":\"2025-07-24T14:22:34.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2025-05-22\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:22:34', '2025-07-24 12:22:34'),
(1036, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 63, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":26,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1991-06-10\",\"ref_note\":\"893790\",\"updated_at\":\"2025-07-24T14:25:34.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"1991-10-06\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:25:34', '2025-07-24 12:25:34'),
(1037, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 59, 'App\\Models\\User', 8, '{\"attributes\":{\"specialite_grade_id\":26,\"updated_at\":\"2025-07-24T14:26:56.000000Z\"},\"old\":{\"specialite_grade_id\":12,\"updated_at\":\"2025-07-24T14:22:34.000000Z\"}}', NULL, '2025-07-24 12:26:56', '2025-07-24 12:26:56'),
(1038, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 217, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":217,\"fonctionnaire_id\":43,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1039, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 218, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":218,\"fonctionnaire_id\":43,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1040, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 219, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":219,\"fonctionnaire_id\":43,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1041, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 220, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":220,\"fonctionnaire_id\":43,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1042, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 221, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":221,\"fonctionnaire_id\":43,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1043, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 222, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":222,\"fonctionnaire_id\":43,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(1044, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 223, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":223,\"fonctionnaire_id\":43,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-24T14:28:09.000000Z\",\"updated_at\":\"2025-07-24T14:28:09.000000Z\"}}', NULL, '2025-07-24 12:28:10', '2025-07-24 12:28:10'),
(1045, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 224, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":224,\"fonctionnaire_id\":43,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-24T14:28:10.000000Z\",\"updated_at\":\"2025-07-24T14:28:10.000000Z\"}}', NULL, '2025-07-24 12:28:10', '2025-07-24 12:28:10'),
(1046, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 62, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":26,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"1146668\",\"updated_at\":\"2025-07-24T14:28:30.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:28:31', '2025-07-24 12:28:31'),
(1047, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 225, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":225,\"fonctionnaire_id\":50,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-24T14:30:00.000000Z\",\"updated_at\":\"2025-07-24T14:30:00.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1048, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 226, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":226,\"fonctionnaire_id\":50,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1049, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 227, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":227,\"fonctionnaire_id\":50,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1050, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 228, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":228,\"fonctionnaire_id\":50,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1051, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 229, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":229,\"fonctionnaire_id\":50,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1052, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 230, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":230,\"fonctionnaire_id\":50,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1053, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 231, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":231,\"fonctionnaire_id\":50,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(1054, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 232, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":232,\"fonctionnaire_id\":50,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-24T14:30:01.000000Z\",\"updated_at\":\"2025-07-24T14:30:01.000000Z\"}}', NULL, '2025-07-24 12:30:02', '2025-07-24 12:30:02'),
(1055, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 60, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":26,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"399399\",\"updated_at\":\"2025-07-24T14:30:19.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:30:19', '2025-07-24 12:30:19'),
(1056, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 12:34:07', '2025-07-24 12:34:07'),
(1057, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 12:35:16', '2025-07-24 12:35:16'),
(1058, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 10, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"fayzamouhib\",\"email\":\"fayzamouhib@gamil.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 12:37:06', '2025-07-24 12:37:06'),
(1059, 'default', 'Utilisateur mis à jour', 'App\\Models\\User', NULL, 9, 'App\\Models\\User', 4, '{\"old_data\":{\"name\":\"amalmalih\",\"email\":\"amalmalihm@gmail.com\",\"roles\":[\"saisiefonctionnaires\"]},\"new_roles\":[\"saisiefonctionnaires\"],\"password_changed\":true}', NULL, '2025-07-24 12:38:10', '2025-07-24 12:38:10'),
(1060, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 61, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":26,\"position_id\":2,\"type_mutation\":4,\"date_mutation\":\"1994-04-07\",\"ref_note\":\"782939\",\"updated_at\":\"2025-07-24T14:39:39.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"date_mutation\":\"2022-04-08\",\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:39:39', '2025-07-24 12:39:39'),
(1061, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 64, 'App\\Models\\User', 8, '{\"attributes\":{\"fonction_id\":1,\"nom_formation_sanitaire_id\":21,\"service_id\":40,\"specialite_grade_id\":5,\"position_id\":2,\"type_mutation\":4,\"ref_note\":\"321824\",\"updated_at\":\"2025-07-24T14:43:20.000000Z\"},\"old\":{\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:43:20', '2025-07-24 12:43:20'),
(1062, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 66, 'App\\Models\\User', 9, '{\"attributes\":{\"sexe\":\"F\",\"fonction_id\":1,\"nom_formation_sanitaire_id\":6,\"service_id\":24,\"specialite_grade_id\":16,\"position_id\":2,\"type_mutation\":1,\"ref_note\":\"836758\",\"updated_at\":\"2025-07-24T14:44:45.000000Z\"},\"old\":{\"sexe\":\"F\\u00e9minin\",\"fonction_id\":null,\"nom_formation_sanitaire_id\":null,\"service_id\":null,\"specialite_grade_id\":null,\"position_id\":null,\"type_mutation\":null,\"ref_note\":null,\"updated_at\":null}}', NULL, '2025-07-24 12:44:45', '2025-07-24 12:44:45'),
(1063, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 233, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":233,\"fonctionnaire_id\":66,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-07-24T14:44:49.000000Z\",\"updated_at\":\"2025-07-24T14:44:49.000000Z\"}}', NULL, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(1064, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 234, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":234,\"fonctionnaire_id\":66,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:44:49.000000Z\",\"updated_at\":\"2025-07-24T14:44:49.000000Z\"}}', NULL, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(1065, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 235, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":235,\"fonctionnaire_id\":66,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:44:49.000000Z\",\"updated_at\":\"2025-07-24T14:44:49.000000Z\"}}', NULL, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(1066, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 236, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":236,\"fonctionnaire_id\":66,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-07-24T14:44:50.000000Z\",\"updated_at\":\"2025-07-24T14:44:50.000000Z\"}}', NULL, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(1067, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 237, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":237,\"fonctionnaire_id\":66,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-07-24T14:44:50.000000Z\",\"updated_at\":\"2025-07-24T14:44:50.000000Z\"}}', NULL, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(1068, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 238, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":238,\"fonctionnaire_id\":66,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-07-24T14:44:50.000000Z\",\"updated_at\":\"2025-07-24T14:44:50.000000Z\"}}', NULL, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(1069, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 239, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":239,\"fonctionnaire_id\":66,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-07-24T14:44:50.000000Z\",\"updated_at\":\"2025-07-24T14:44:50.000000Z\"}}', NULL, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(1070, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 240, 'App\\Models\\User', 9, '{\"attributes\":{\"id\":240,\"fonctionnaire_id\":66,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-07-24T14:44:50.000000Z\",\"updated_at\":\"2025-07-24T14:44:50.000000Z\"}}', NULL, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(1071, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 23, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"CHAFFEUR AMBULANCIER 4 grade\",\"nom_arabe\":\"\\u0633\\u0627\\u0626\\u0642 \\u0627\\u0644\\u0627\\u0633\\u0639\\u0627\\u0641 \\u0648\\u0646\\u0642\\u0644 \\u0635\\u062d\\u064a \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0632\\u0627\\u0628\\u063a\\u0629\",\"updated_at\":\"2025-07-24T14:52:48.000000Z\"},\"old\":{\"nom\":\"CHAFFEUR AMBULANCIER\",\"nom_arabe\":\"\\u0633\\u0627\\u0626\\u0642 \\u0627\\u0644\\u0627\\u0633\\u0639\\u0627\\u0641 \\u0648\\u0646\\u0642\\u0644 \\u0635\\u062d\\u064a\",\"updated_at\":\"2025-06-23T23:12:46.000000Z\"}}', NULL, '2025-07-24 12:52:48', '2025-07-24 12:52:48'),
(1072, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"M\\u00e9decin g\\u00e9neraliste hors grade\",\"nom_arabe\":\"\\u0637\\u0628\\u064a\\u0628 \\u0639\\u0627\\u0645 \\u062e\\u0627\\u0631\\u062c \\u0633\\u0644\\u0645\",\"updated_at\":\"2025-07-24T14:55:05.000000Z\"},\"old\":{\"nom\":\"M\\u00e9decin g\\u00e9neraliste\",\"nom_arabe\":\"M\\u00e9decin g\\u00e9neraliste\",\"updated_at\":\"2025-05-27T12:53:08.000000Z\"}}', NULL, '2025-07-24 12:55:05', '2025-07-24 12:55:05'),
(1073, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 30, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":30,\"nom\":\"Infirmier Auxilaire 1er grade\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"grade_id\":28,\"created_at\":\"2025-07-24T14:56:56.000000Z\",\"updated_at\":\"2025-07-24T14:56:56.000000Z\"}}', NULL, '2025-07-24 12:56:56', '2025-07-24 12:56:56'),
(1074, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":35,\"nom\":\"Principale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u0627\\u0633\\u064a\\u0629\",\"cadre_id\":10,\"created_at\":\"2025-07-24T15:04:30.000000Z\",\"updated_at\":\"2025-07-24T15:04:30.000000Z\"}}', NULL, '2025-07-24 13:04:30', '2025-07-24 13:04:30'),
(1075, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Sport hors grade\",\"nom_arabe\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u0629  \\u062e\\u0627\\u0631\\u062c \\u0627\\u0644\\u0633\\u0644\\u0645\",\"updated_at\":\"2025-07-24T15:07:30.000000Z\"},\"old\":{\"nom\":\"sport\",\"nom_arabe\":\"\\u0627\\u0644\\u0631\\u064a\\u0627\\u0636\\u0629\",\"updated_at\":\"2025-07-22T15:13:30.000000Z\"}}', NULL, '2025-07-24 13:07:30', '2025-07-24 13:07:30'),
(1076, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 25, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":25,\"nom\":\"Technicien hygi\\u00e8ne milieux\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u0628\\u064a\\u0626\\u0629\",\"categorie_cadre_id\":4,\"created_at\":\"2025-07-24T15:09:34.000000Z\",\"updated_at\":\"2025-07-24T15:09:34.000000Z\"}}', NULL, '2025-07-24 13:09:35', '2025-07-24 13:09:35'),
(1077, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":36,\"nom\":\"Exceptionnel\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":22,\"created_at\":\"2025-07-24T15:11:41.000000Z\",\"updated_at\":\"2025-07-24T15:11:41.000000Z\"}}', NULL, '2025-07-24 13:11:42', '2025-07-24 13:11:42'),
(1078, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 31, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":31,\"nom\":\"Technicien hygi\\u00e8ne milieux -Exceptionnel\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u0628\\u064a\\u0626\\u0629 - \\u0627\\u0644\\u0627\\u0633\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"grade_id\":36,\"created_at\":\"2025-07-24T15:13:48.000000Z\",\"updated_at\":\"2025-07-24T15:13:48.000000Z\"}}', NULL, '2025-07-24 13:13:48', '2025-07-24 13:13:48'),
(1079, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 32, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":32,\"nom\":\"Infirmier Auxilaire -Principale\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u063a\\u062f -\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"grade_id\":30,\"created_at\":\"2025-07-24T15:16:05.000000Z\",\"updated_at\":\"2025-07-24T15:16:05.000000Z\"}}', NULL, '2025-07-24 13:16:05', '2025-07-24 13:16:05'),
(1080, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Infirmier(ere) Polyvalent -Deuxieme grade\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636(\\u0629) \\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a  - \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-07-24T15:16:50.000000Z\"},\"old\":{\"nom\":\"Infirmier(ere) Polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636(\\u0629) \\u0645\\u062a\\u0639\\u062f\\u062f \\u0627\\u0644\\u062a\\u062e\\u0635\\u0635\\u0627\\u062a\",\"updated_at\":\"2025-07-07T14:36:56.000000Z\"}}', NULL, '2025-07-24 13:16:50', '2025-07-24 13:16:50'),
(1081, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":26,\"nom\":\"Elhajoui csu1\",\"nom_arabe\":\"\\u0627\\u0644\\u062d\\u062c\\u0648\\u064a\",\"niveau_categorie_formation_id\":10,\"arrondissement_commune_id\":175,\"created_at\":\"2025-07-24T15:18:04.000000Z\",\"updated_at\":\"2025-07-24T15:18:04.000000Z\"}}', NULL, '2025-07-24 13:18:04', '2025-07-24 13:18:04'),
(1082, 'Niveau Categorie Formation', 'created', 'App\\Models\\NiveauCategorieFormation', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":12,\"nom\":\"CDTMR\",\"nom_arabe\":\"\\u0645\\u0631\\u0643\\u0632 \\u062a\\u0634\\u062e\\u064a\\u0635 \\u0645\\u0639\\u0627\\u0644\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0645\\u0631\\u0627\\u0636 \\u0627\\u0644\\u062a\\u0646\\u0641\\u0633\\u064a\\u0629\",\"type_categorie_formation_id\":4,\"created_at\":\"2025-07-24T15:19:50.000000Z\",\"updated_at\":\"2025-07-24T15:19:50.000000Z\"}}', NULL, '2025-07-24 13:19:50', '2025-07-24 13:19:50'),
(1083, 'Nom Formation Sanitaire', 'created', 'App\\Models\\NomFormationSanitaire', 'created', 27, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":27,\"nom\":\"ANNEXE ADOUA CDTMR\",\"nom_arabe\":\"\\u0645\\u0644\\u062d\\u0642\\u0629 \\u0627\\u0644\\u0639\\u062f\\u0648\\u0627 CDTMR\",\"niveau_categorie_formation_id\":12,\"arrondissement_commune_id\":212,\"created_at\":\"2025-07-24T15:21:14.000000Z\",\"updated_at\":\"2025-07-24T15:21:14.000000Z\"}}', NULL, '2025-07-24 13:21:15', '2025-07-24 13:21:15'),
(1084, 'Cadre', 'created', 'App\\Models\\Cadre', 'created', 26, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":26,\"nom\":\"Technicien Radiologie\",\"nom_arabe\":\"\\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u0627\\u0634\\u0639\\u0629\",\"categorie_cadre_id\":4,\"created_at\":\"2025-07-24T15:22:29.000000Z\",\"updated_at\":\"2025-07-24T15:22:29.000000Z\"}}', NULL, '2025-07-24 13:22:29', '2025-07-24 13:22:29'),
(1085, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":37,\"nom\":\"Principale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u0627\\u0633\\u064a\",\"cadre_id\":26,\"created_at\":\"2025-07-24T15:23:08.000000Z\",\"updated_at\":\"2025-07-24T15:23:08.000000Z\"}}', NULL, '2025-07-24 13:23:08', '2025-07-24 13:23:08'),
(1086, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 33, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":33,\"nom\":\"Radiologie -Princiaple\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0634\\u0639\\u0629 -\\u0627\\u0644\\u0627\\u0633\\u0627\\u0633\\u064a\",\"grade_id\":37,\"created_at\":\"2025-07-24T15:24:03.000000Z\",\"updated_at\":\"2025-07-24T15:24:03.000000Z\"}}', NULL, '2025-07-24 13:24:03', '2025-07-24 13:24:03'),
(1087, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 38, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":38,\"nom\":\"1 er Grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":26,\"created_at\":\"2025-07-24T15:24:43.000000Z\",\"updated_at\":\"2025-07-24T15:24:43.000000Z\"}}', NULL, '2025-07-24 13:24:43', '2025-07-24 13:24:43'),
(1088, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 34, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":34,\"nom\":\"Radiologie -premier grade\",\"nom_arabe\":\"Radiologie -premier grade\",\"grade_id\":37,\"created_at\":\"2025-07-24T15:25:45.000000Z\",\"updated_at\":\"2025-07-24T15:25:45.000000Z\"}}', NULL, '2025-07-24 13:25:45', '2025-07-24 13:25:45'),
(1089, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Sage Femme- Principale\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629 -\\u0627\\u0644\\u0627\\u0633\\u0627\\u0633\\u064a\\u0629\",\"updated_at\":\"2025-08-13T13:53:58.000000Z\"},\"old\":{\"nom\":\"Principale\",\"nom_arabe\":\"\\u0627\\u0644\\u0627\\u0633\\u0627\\u0633\\u064a\\u0629\",\"updated_at\":\"2025-07-24T15:04:30.000000Z\"}}', NULL, '2025-08-13 11:53:58', '2025-08-13 11:53:58'),
(1090, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 39, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":39,\"nom\":\"Sage femme -1er grade\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629 -\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"cadre_id\":10,\"created_at\":\"2025-08-13T13:55:16.000000Z\",\"updated_at\":\"2025-08-13T13:55:16.000000Z\"}}', NULL, '2025-08-13 11:55:16', '2025-08-13 11:55:16'),
(1091, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 40, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":40,\"nom\":\"Sage Femme- Exceptionnel\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629 -\\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"cadre_id\":10,\"created_at\":\"2025-08-13T13:55:37.000000Z\",\"updated_at\":\"2025-08-13T13:55:37.000000Z\"}}', NULL, '2025-08-13 11:55:37', '2025-08-13 11:55:37'),
(1092, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 35, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":35,\"nom\":\"Sage femme 1er grade\",\"nom_arabe\":\"\\u0642\\u0627\\u0628\\u0644\\u0629 \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"grade_id\":35,\"created_at\":\"2025-08-13T13:57:41.000000Z\",\"updated_at\":\"2025-08-13T13:57:41.000000Z\"}}', NULL, '2025-08-13 11:57:41', '2025-08-13 11:57:41'),
(1093, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 36, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":36,\"nom\":\"Sage Femme Exceptionnel\",\"nom_arabe\":\"\\u0645\\u0648\\u0644\\u062f\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"grade_id\":32,\"created_at\":\"2025-08-13T13:58:02.000000Z\",\"updated_at\":\"2025-08-13T13:58:02.000000Z\"}}', NULL, '2025-08-13 11:58:03', '2025-08-13 11:58:03'),
(1094, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 37, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":37,\"nom\":\"Sage femme 1er grade\",\"nom_arabe\":\"\\u0642\\u0627\\u0628\\u0644\\u0629 \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"grade_id\":14,\"created_at\":\"2025-08-13T13:58:24.000000Z\",\"updated_at\":\"2025-08-13T13:58:24.000000Z\"}}', NULL, '2025-08-13 11:58:24', '2025-08-13 11:58:24'),
(1095, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 44, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"date_prise_en_service\":\"2025-07-10\",\"date_note\":\"2025-07-10\",\"updated_at\":\"2025-08-13T13:59:54.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"date_prise_en_service\":\"2025-02-08\",\"date_note\":\"2025-02-08\",\"updated_at\":\"2025-07-24T13:38:02.000000Z\"}}', NULL, '2025-08-13 11:59:54', '2025-08-13 11:59:54'),
(1096, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 241, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":241,\"fonctionnaire_id\":44,\"type_conge_id\":1,\"year\":2025,\"jours_total\":22,\"jours_reportes\":0,\"jours_disponibles\":22,\"jours_utilises\":0,\"jours_restants\":22,\"created_at\":\"2025-08-13T14:00:03.000000Z\",\"updated_at\":\"2025-08-13T14:00:03.000000Z\"}}', NULL, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(1097, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 242, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":242,\"fonctionnaire_id\":44,\"type_conge_id\":2,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-08-13T14:00:03.000000Z\",\"updated_at\":\"2025-08-13T14:00:03.000000Z\"}}', NULL, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(1098, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 243, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":243,\"fonctionnaire_id\":44,\"type_conge_id\":3,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-08-13T14:00:03.000000Z\",\"updated_at\":\"2025-08-13T14:00:03.000000Z\"}}', NULL, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(1099, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 244, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":244,\"fonctionnaire_id\":44,\"type_conge_id\":4,\"year\":2025,\"jours_total\":10,\"jours_reportes\":0,\"jours_disponibles\":10,\"jours_utilises\":0,\"jours_restants\":10,\"created_at\":\"2025-08-13T14:00:03.000000Z\",\"updated_at\":\"2025-08-13T14:00:03.000000Z\"}}', NULL, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(1100, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 245, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":245,\"fonctionnaire_id\":44,\"type_conge_id\":5,\"year\":2025,\"jours_total\":30,\"jours_reportes\":0,\"jours_disponibles\":30,\"jours_utilises\":0,\"jours_restants\":30,\"created_at\":\"2025-08-13T14:00:04.000000Z\",\"updated_at\":\"2025-08-13T14:00:04.000000Z\"}}', NULL, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(1101, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 246, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":246,\"fonctionnaire_id\":44,\"type_conge_id\":6,\"year\":2025,\"jours_total\":0,\"jours_reportes\":0,\"jours_disponibles\":0,\"jours_utilises\":0,\"jours_restants\":0,\"created_at\":\"2025-08-13T14:00:04.000000Z\",\"updated_at\":\"2025-08-13T14:00:04.000000Z\"}}', NULL, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(1102, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 247, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":247,\"fonctionnaire_id\":44,\"type_conge_id\":7,\"year\":2025,\"jours_total\":90,\"jours_reportes\":0,\"jours_disponibles\":90,\"jours_utilises\":0,\"jours_restants\":90,\"created_at\":\"2025-08-13T14:00:04.000000Z\",\"updated_at\":\"2025-08-13T14:00:04.000000Z\"}}', NULL, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(1103, 'Congé Availability', 'created', 'App\\Models\\CongeAvailability', 'created', 248, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":248,\"fonctionnaire_id\":44,\"type_conge_id\":8,\"year\":2025,\"jours_total\":11,\"jours_reportes\":0,\"jours_disponibles\":11,\"jours_utilises\":0,\"jours_restants\":11,\"created_at\":\"2025-08-13T14:00:04.000000Z\",\"updated_at\":\"2025-08-13T14:00:04.000000Z\"}}', NULL, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(1104, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 45, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:01:22.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:43:04.000000Z\"}}', NULL, '2025-08-13 12:01:23', '2025-08-13 12:01:23'),
(1105, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 46, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:06:34.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:29:48.000000Z\"}}', NULL, '2025-08-13 12:06:34', '2025-08-13 12:06:34'),
(1106, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 47, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:07:03.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:34:39.000000Z\"}}', NULL, '2025-08-13 12:07:03', '2025-08-13 12:07:03'),
(1107, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 48, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:07:23.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:46:02.000000Z\"}}', NULL, '2025-08-13 12:07:23', '2025-08-13 12:07:23'),
(1108, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 49, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:08:45.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:49:05.000000Z\"}}', NULL, '2025-08-13 12:08:45', '2025-08-13 12:08:45'),
(1109, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 50, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":35,\"updated_at\":\"2025-08-13T14:09:07.000000Z\"},\"old\":{\"specialite_grade_id\":27,\"updated_at\":\"2025-07-24T13:52:31.000000Z\"}}', NULL, '2025-08-13 12:09:07', '2025-08-13 12:09:07'),
(1110, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":41,\"nom\":\"Adjoint technique 3 grade\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062a\\u0629\",\"cadre_id\":13,\"created_at\":\"2025-08-13T14:21:04.000000Z\",\"updated_at\":\"2025-08-13T14:21:04.000000Z\"}}', NULL, '2025-08-13 12:21:04', '2025-08-13 12:21:04'),
(1111, 'Spécialité Grade', 'updated', 'App\\Models\\SpecialiteGrade', 'updated', 14, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Adjoint technique 2 grade\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-08-13T14:36:52.000000Z\"},\"old\":{\"nom\":\"chauffeur\",\"nom_arabe\":\"chauffeur\",\"updated_at\":\"2025-05-27T15:45:35.000000Z\"}}', NULL, '2025-08-13 12:36:52', '2025-08-13 12:36:52'),
(1112, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"3 grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062a\\u0629\",\"updated_at\":\"2025-08-13T14:40:09.000000Z\"},\"old\":{\"nom\":\"Adjoint technique 3 grade\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062a\\u0629\",\"updated_at\":\"2025-08-13T14:21:04.000000Z\"}}', NULL, '2025-08-13 12:40:09', '2025-08-13 12:40:09'),
(1113, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 38, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":38,\"nom\":\"21\",\"nom_arabe\":\"21\",\"grade_id\":41,\"created_at\":\"2025-08-13T14:41:29.000000Z\",\"updated_at\":\"2025-08-13T14:41:29.000000Z\"}}', NULL, '2025-08-13 12:41:29', '2025-08-13 12:41:29'),
(1114, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 39, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":39,\"nom\":\"Adjoint technique 3 grade chauffeur\",\"nom_arabe\":\"\\u0645\\u0633\\u0627\\u0639\\u062f \\u062a\\u0642\\u0646\\u064a \\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062a\\u0629 \\u0633\\u0627\\u0626\\u0642\",\"grade_id\":41,\"created_at\":\"2025-08-13T14:45:15.000000Z\",\"updated_at\":\"2025-08-13T14:45:15.000000Z\"}}', NULL, '2025-08-13 12:45:15', '2025-08-13 12:45:15'),
(1115, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 51, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":39,\"updated_at\":\"2025-08-13T14:45:48.000000Z\"},\"old\":{\"specialite_grade_id\":22,\"updated_at\":\"2025-07-24T14:03:23.000000Z\"}}', NULL, '2025-08-13 12:45:48', '2025-08-13 12:45:48'),
(1116, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 40, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":40,\"nom\":\"Infirmier exceptionnel -polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636  \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0633\\u062b\\u062a\\u0646\\u0627\\u0626\\u064a\\u0629\",\"grade_id\":32,\"created_at\":\"2025-08-13T14:48:52.000000Z\",\"updated_at\":\"2025-08-13T14:48:52.000000Z\"}}', NULL, '2025-08-13 12:48:53', '2025-08-13 12:48:53'),
(1117, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 52, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":40,\"updated_at\":\"2025-08-13T14:49:11.000000Z\"},\"old\":{\"specialite_grade_id\":28,\"updated_at\":\"2025-07-24T14:00:31.000000Z\"}}', NULL, '2025-08-13 12:49:11', '2025-08-13 12:49:11'),
(1118, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 41, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":41,\"nom\":\"Infirmier 1 er Garde -polyvalent\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649 \\u0645\\u062a\\u0639\\u062f\\u062f \\u062a\\u062d\\u0635\\u0635\\u0627\\u062a\",\"grade_id\":14,\"created_at\":\"2025-08-13T14:50:37.000000Z\",\"updated_at\":\"2025-08-13T14:50:37.000000Z\"}}', NULL, '2025-08-13 12:50:37', '2025-08-13 12:50:37');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1119, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 53, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":41,\"updated_at\":\"2025-08-13T14:54:25.000000Z\"},\"old\":{\"specialite_grade_id\":28,\"updated_at\":\"2025-07-24T14:07:19.000000Z\"}}', NULL, '2025-08-13 12:54:25', '2025-08-13 12:54:25'),
(1120, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 54, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":41,\"updated_at\":\"2025-08-13T14:54:41.000000Z\"},\"old\":{\"specialite_grade_id\":9,\"updated_at\":\"2025-07-24T14:12:09.000000Z\"}}', NULL, '2025-08-13 12:54:41', '2025-08-13 12:54:41'),
(1121, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 55, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":41,\"updated_at\":\"2025-08-13T14:54:56.000000Z\"},\"old\":{\"specialite_grade_id\":28,\"updated_at\":\"2025-07-24T14:10:21.000000Z\"}}', NULL, '2025-08-13 12:54:56', '2025-08-13 12:54:56'),
(1122, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":42,\"nom\":\"Infirmier Auxilaire 2 \\u00e9me grade\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":23,\"created_at\":\"2025-08-13T14:57:13.000000Z\",\"updated_at\":\"2025-08-13T14:57:13.000000Z\"}}', NULL, '2025-08-13 12:57:13', '2025-08-13 12:57:13'),
(1123, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"Infirmier Auxilaire\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f\",\"updated_at\":\"2025-08-13T14:58:49.000000Z\"},\"old\":{\"nom\":\"Infirmier Auxilaire 2 \\u00e9me grade\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f \\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"updated_at\":\"2025-08-13T14:57:13.000000Z\"}}', NULL, '2025-08-13 12:58:49', '2025-08-13 12:58:49'),
(1124, 'Grade Cadre', 'updated', 'App\\Models\\GradeCadre', 'updated', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"nom\":\"1er grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u0627\\u0648\\u0644\\u0649\",\"updated_at\":\"2025-08-13T14:59:44.000000Z\"},\"old\":{\"nom\":\"Infirmier Auxilaire\",\"nom_arabe\":\"\\u0645\\u0645\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0639\\u062f\",\"updated_at\":\"2025-08-13T14:58:49.000000Z\"}}', NULL, '2025-08-13 12:59:44', '2025-08-13 12:59:44'),
(1125, 'Grade Cadre', 'created', 'App\\Models\\GradeCadre', 'created', 43, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":43,\"nom\":\"2 \\u00e9me grade\",\"nom_arabe\":\"\\u0627\\u0644\\u062f\\u0631\\u062c\\u0629 \\u0627\\u0644\\u062a\\u0627\\u0646\\u064a\\u0629\",\"cadre_id\":23,\"created_at\":\"2025-08-13T15:00:43.000000Z\",\"updated_at\":\"2025-08-13T15:00:43.000000Z\"}}', NULL, '2025-08-13 13:00:43', '2025-08-13 13:00:43'),
(1126, 'Spécialité Grade', 'created', 'App\\Models\\SpecialiteGrade', 'created', 42, 'App\\Models\\User', 4, '{\"attributes\":{\"id\":42,\"nom\":\"Infirmier Auxilaire 2 \\u00e9me grade\",\"nom_arabe\":\"Infirmier Auxilaire 2 \\u00e9me grade\",\"grade_id\":43,\"created_at\":\"2025-08-13T15:01:38.000000Z\",\"updated_at\":\"2025-08-13T15:01:38.000000Z\"}}', NULL, '2025-08-13 13:01:38', '2025-08-13 13:01:38'),
(1127, 'Fonctionnaire', 'updated', 'App\\Models\\Fonctionnaire', 'updated', 56, 'App\\Models\\User', 4, '{\"attributes\":{\"specialite_grade_id\":42,\"updated_at\":\"2025-08-13T15:01:52.000000Z\"},\"old\":{\"specialite_grade_id\":28,\"updated_at\":\"2025-07-24T14:18:10.000000Z\"}}', NULL, '2025-08-13 13:01:52', '2025-08-13 13:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

CREATE TABLE `affectations` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `formation_arrondissement_commune_id` bigint UNSIGNED NOT NULL,
  `categorie_formation_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `fonction_id` bigint UNSIGNED NOT NULL,
  `date_affectation` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_fichiers`
--

CREATE TABLE `archive_fichiers` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `fonctionnaires_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arrondissement_communes`
--

CREATE TABLE `arrondissement_communes` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arrondissement_communes`
--

INSERT INTO `arrondissement_communes` (`id`, `nom`, `nom_arabe`, `ville_id`, `created_at`, `updated_at`) VALUES
(1, 'Saiss', 'سايس', 13, '2024-12-20 15:58:43', '2024-12-20 15:58:43'),
(171, 'Zouagha', 'زواغة', 13, '2024-12-26 14:50:24', '2024-12-26 14:50:24'),
(173, 'Agdal', 'أكدال', 13, '2024-12-26 14:51:31', '2024-12-26 14:51:31'),
(174, 'Merinide', 'المرينيين', 13, '2024-12-26 14:51:57', '2024-12-26 14:51:57'),
(175, 'Jnane Elouard', 'جنان الورد', 13, '2024-12-26 14:52:24', '2024-12-26 14:52:24'),
(176, 'Ain Bida', 'عين البيضاء', 13, '2024-12-26 14:52:59', '2024-12-26 14:52:59'),
(177, 'Ouled Tayeb', 'أولاد الطيب', 13, '2024-12-26 14:53:15', '2024-12-26 14:53:15'),
(178, 'Sidi Hrazem', 'سيدي حرازم', 13, '2024-12-26 14:54:26', '2024-12-26 14:54:26'),
(207, 'Agdal', 'أكدال', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(208, 'Saiss', 'سايس', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(209, 'Zouagha', 'زواغة', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(210, 'Jnan El Ward', 'جنان الورد', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(211, 'Marinides', 'المرينيين', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(212, 'Médina', 'المدينة', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(213, 'Hamria', 'الحمرية', 14, '2025-05-24 14:37:32', '2025-06-29 13:04:02'),
(214, 'Toulal', 'تولال', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(215, 'Zitoune', 'الزيتون', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(216, 'Ouislane', 'ويسلان', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(217, 'LAHMRYA', 'الحمرية', 14, '2025-05-27 12:47:36', '2025-05-27 12:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:103:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:30:\"administration.tableau-de-bord\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:34:\"administration.statistics-detailed\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:28:\"administration.statistics-hr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:30:\"administration.user-management\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:36:\"parametrage.arrondissements-communes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:19:\"parametrage.regions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"parametrage.villes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:18:\"parametrage.grades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:21:\"parametrage.positions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:20:\"parametrage.services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:25:\"parametrage.type-mutation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:21:\"parametrage.fonctions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:24:\"parametrage.conges-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:29:\"parametrage.certificats-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:24:\"parametrage.stages-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:24:\"cadres.categories-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"cadres.cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"cadres.grades-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:25:\"cadres.specialites-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:30:\"formation.categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:35:\"formation.type-categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:37:\"formation.niveau-categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:33:\"formation.nom-formation-sanitaire\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:25:\"fonctionnaires.management\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"fonctionnaires.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:8;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:21:\"fonctionnaires.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:8;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:19:\"fonctionnaires.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:8;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:21:\"fonctionnaires.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:8;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:27:\"fonctionnaires.informations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:8;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:24:\"fonctionnaires.mutations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:24:\"fonctionnaires.positions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:21:\"fonctionnaires.conges\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:26:\"fonctionnaires.certificats\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"fonctionnaires.greves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:8;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:16:\"documents.search\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:10:\"users.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:10:\"users.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"users.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:10:\"roles.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:10:\"roles.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:12:\"roles.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:18:\"activity-logs.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:14:\"retraites.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:16:\"retraites.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:14:\"retraites.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:16:\"retraites.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:18:\"retraites.validate\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:21:\"retraites.auto-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"stages.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"stages.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:11:\"stages.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:13:\"stages.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:18:\"stages.attestation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"stages.export\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:20:\"stages.manage-ecoles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:21:\"stages.manage-options\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:24:\"stages.manage-encadrants\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:11:\"greves.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:13:\"greves.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:11:\"greves.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:13:\"greves.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:16:\"batch-print.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:24:\"batch-print.attestations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:27:\"batch-print.conge-decisions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:5;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:22:\"statistics.ai-analyses\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:25:\"administration.parameters\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:11:\"cadres.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"cadres.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:11:\"cadres.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:13:\"cadres.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:13:\"cadres.export\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:31:\"formations.categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:34:\"formations.nom-formation-sanitaire\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:23:\"documents.export-conges\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:23:\"documents.export-greves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:21:\"fonctionnaires.import\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:8;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:21:\"fonctionnaires.export\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:8;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:15:\"formations.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:17:\"formations.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:15:\"formations.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:17:\"formations.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:33:\"stages.manage-intitule-formations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:11:\"conges.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:13:\"conges.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:11:\"conges.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:13:\"conges.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:16:\"conges.decisions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:14:\"mutations.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:16:\"mutations.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:14:\"mutations.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:16:\"mutations.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:22:\"documents.note-service\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:15:\"statistics.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:4:{s:1:\"a\";i:96;s:1:\"b\";s:19:\"statistics.detailed\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:4:{s:1:\"a\";i:97;s:1:\"b\";s:13:\"statistics.hr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:4:{s:1:\"a\";i:98;s:1:\"b\";s:28:\"parametrage.specialite-grade\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:36:\"parametrage.type-categorie-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:38:\"parametrage.niveau-categorie-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:4:{s:1:\"a\";i:101;s:1:\"b\";s:24:\"parametrage.types-conges\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:4:{s:1:\"a\";i:102;s:1:\"b\";s:26:\"parametrage.type-mutations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:23:\"parametrage.certificats\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:6:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"RH Manager\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:8;s:1:\"b\";s:20:\"saisiefonctionnaires\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Utilisateur\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:8:\"Stage RH\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:5:\"conge\";s:1:\"c\";s:3:\"web\";}}}', 1755179191);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cadres`
--

CREATE TABLE `cadres` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_cadre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cadres`
--

INSERT INTO `cadres` (`id`, `nom`, `nom_arabe`, `categorie_cadre_id`, `created_at`, `updated_at`) VALUES
(2, 'technicien', 'تقني', 1, '2025-01-17 18:30:15', '2025-01-17 18:35:57'),
(3, 'administrateur', 'متصرف', 1, '2025-01-17 18:31:04', '2025-01-17 18:31:04'),
(4, 'technicien laboratoire', 'تقني مختبر', 4, '2025-01-17 18:34:11', '2025-01-17 18:34:11'),
(6, 'chirurgien dentaire', 'جراح الاسنان', 6, '2025-01-17 18:35:07', '2025-01-17 18:35:07'),
(8, 'Médecin Générale', 'أطباء العامين', 8, '2025-03-19 16:58:20', '2025-03-19 16:58:20'),
(9, 'Médecin Spécilialiste', 'الاطباء الاختصاصيين', 8, '2025-03-19 16:58:49', '2025-03-19 16:58:49'),
(10, 'Sage femme', 'مولدة', 4, '2025-03-19 16:59:26', '2025-03-19 16:59:26'),
(11, 'Diététicien', 'الحمية والتغدية', 4, '2025-03-19 17:00:03', '2025-03-19 17:00:03'),
(12, 'Ingénieur', 'مهندس', 1, '2025-03-19 17:00:43', '2025-03-19 17:00:43'),
(13, 'Adjoint technique', 'مساعد تقني', 1, '2025-03-19 17:02:20', '2025-03-19 17:02:20'),
(15, 'Pharmacien', 'طبيب صيدلي', 6, '2025-03-19 17:03:35', '2025-03-19 17:03:35'),
(16, 'Infirmiers', 'ممرض', 4, '2025-03-19 17:04:12', '2025-07-07 12:32:57'),
(17, 'infirmier en anesthésie et réanimation', 'ممرض الانعاش والتخدير', 4, '2025-03-19 17:04:56', '2025-03-19 17:04:56'),
(19, 'ASSISTANT MEDICAL', 'مساعد طبي', 5, '2025-06-23 21:00:04', '2025-06-23 21:00:04'),
(20, 'AIDE SOIGNANT', 'مساعد علاج', 1, '2025-06-23 21:06:11', '2025-06-23 21:06:11'),
(21, 'AMBULANCIER', 'الاسعاف', 1, '2025-06-23 21:11:05', '2025-06-23 21:11:05'),
(22, 'Technicien de Sante', 'تقني الصحة', 4, '2025-07-22 12:51:37', '2025-07-22 12:51:37'),
(23, 'Infirmier Auxilaire', 'ممرض مساعد', 4, '2025-07-22 12:56:30', '2025-07-22 12:56:30'),
(24, 'Assistant social', 'مساعد اجتماعي', 4, '2025-07-22 12:59:41', '2025-07-22 12:59:41'),
(26, 'Technicien Radiologie', 'تقني الاشعة', 4, '2025-07-24 13:22:29', '2025-07-24 13:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `cadres_stages`
--

CREATE TABLE `cadres_stages` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cadres_stages`
--

INSERT INTO `cadres_stages` (`id`, `nom`, `nom_arabe`, `actif`, `created_at`, `updated_at`) VALUES
(1, 'médical', 'طبي', 1, '2025-06-13 00:22:41', '2025-06-13 00:22:41'),
(2, 'administratif', 'إداري', 1, '2025-06-13 00:22:41', '2025-06-13 00:22:41'),
(3, 'QSDQ', 'QSDQS', 1, '2025-06-13 14:08:47', '2025-06-13 14:08:48'),
(4, 'QQSDQDQSD', 'إداري', 1, '2025-06-13 00:22:41', '2025-06-13 00:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_cadres`
--

CREATE TABLE `categorie_cadres` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorie_cadres`
--

INSERT INTO `categorie_cadres` (`id`, `nom`, `nom_arabe`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'administratif technique 🧑‍💼', 'الادارية والتقنية', NULL, '2025-01-17 17:57:01', '2025-02-26 17:44:40'),
(4, 'infirmiers et technicien sante 🧑‍⚕️', 'ممرضي وتقني صحة', NULL, '2025-01-17 18:32:08', '2025-02-26 17:43:39'),
(5, 'assistant médicaux', 'مساعديين طبيين', NULL, '2025-01-17 18:32:39', '2025-01-17 18:32:39'),
(6, 'pharmaciens et chirurgiens dentaire', 'صيلدلة وجراحي الاسنان', NULL, '2025-01-17 18:33:34', '2025-01-17 18:33:34'),
(8, 'Médicale', 'الطبي', NULL, '2025-03-19 16:57:13', '2025-03-19 16:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_formations`
--

CREATE TABLE `categorie_formations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorie_formations`
--

INSERT INTO `categorie_formations` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(2, 'sres', 'مصلحة شبكة مؤسسات  صحية', '2025-01-24 19:36:24', '2025-01-24 19:36:24'),
(3, 'délégation', 'مندوبية', '2025-02-03 10:42:45', '2025-02-03 10:42:45'),
(4, 'hopital', 'مستشفى', '2025-02-03 18:52:02', '2025-02-03 18:52:02'),
(5, 'Fondation Med VI HANDICAPE', 'مؤسسة محمد السادس لتضامن', '2025-03-19 17:30:41', '2025-07-07 12:03:08'),
(6, 'Formation Médicale', 'التكوين الطبي', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(7, 'Formation Paramédicale', 'التكوين شبه الطبي', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(8, 'Formation Administrative', 'التكوين الإداري', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(9, 'Formation Technique', 'التكوين التقني', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(10, 'Formation Spécialisée', 'التكوين المتخصص', '2025-05-24 14:37:32', '2025-05-24 14:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_certificate_id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `jours` int NOT NULL,
  `date_depot` date NOT NULL,
  `date_debut` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `observation`, `url`, `type_certificate_id`, `fonctionnaire_id`, `jours`, `date_depot`, `date_debut`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, 3, 16, 5, '2024-02-02', '2024-02-02', '2025-06-24 07:14:07', '2025-06-24 07:14:07'),
(12, NULL, NULL, 3, 37, 10, '2025-07-16', '2025-07-16', '2025-07-16 12:57:55', '2025-07-16 12:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `conges`
--

CREATE TABLE `conges` (
  `id` bigint UNSIGNED NOT NULL,
  `demande_conges_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conge_availabilities`
--

CREATE TABLE `conge_availabilities` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `type_conge_id` bigint UNSIGNED NOT NULL,
  `year` int NOT NULL,
  `jours_total` int NOT NULL,
  `jours_reportes` int NOT NULL DEFAULT '0',
  `jours_disponibles` int NOT NULL,
  `jours_utilises` int NOT NULL DEFAULT '0',
  `jours_restants` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conge_availabilities`
--

INSERT INTO `conge_availabilities` (`id`, `fonctionnaire_id`, `type_conge_id`, `year`, `jours_total`, `jours_reportes`, `jours_disponibles`, `jours_utilises`, `jours_restants`, `created_at`, `updated_at`) VALUES
(97, 15, 1, 2025, 22, 0, 22, 0, 22, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(98, 15, 2, 2025, 0, 0, 0, 0, 0, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(99, 15, 3, 2025, 10, 0, 10, 0, 10, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(100, 15, 4, 2025, 10, 0, 10, 0, 10, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(101, 15, 5, 2025, 30, 0, 30, 0, 30, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(102, 15, 6, 2025, 0, 0, 0, 0, 0, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(103, 15, 7, 2025, 90, 0, 90, 0, 90, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(104, 15, 8, 2025, 11, 0, 11, 0, 11, '2025-06-23 21:57:53', '2025-06-23 21:57:53'),
(105, 16, 1, 2025, 22, 0, 22, 0, 22, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(106, 16, 2, 2025, 0, 0, 0, 0, 0, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(107, 16, 3, 2025, 10, 0, 10, 0, 10, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(108, 16, 4, 2025, 10, 0, 10, 0, 10, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(109, 16, 5, 2025, 30, 0, 30, 0, 30, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(110, 16, 6, 2025, 0, 0, 0, 0, 0, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(111, 16, 7, 2025, 90, 0, 90, 0, 90, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(112, 16, 8, 2025, 11, 0, 11, 0, 11, '2025-06-23 21:57:55', '2025-06-23 21:57:55'),
(121, 21, 1, 2025, 22, 0, 22, 0, 22, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(122, 21, 2, 2025, 0, 0, 0, 0, 0, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(123, 21, 3, 2025, 10, 0, 10, 0, 10, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(124, 21, 4, 2025, 10, 0, 10, 0, 10, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(125, 21, 5, 2025, 30, 0, 30, 0, 30, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(126, 21, 6, 2025, 0, 0, 0, 0, 0, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(127, 21, 7, 2025, 90, 0, 90, 0, 90, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(128, 21, 8, 2025, 11, 0, 11, 0, 11, '2025-06-29 12:58:37', '2025-06-29 12:58:37'),
(161, 37, 1, 2025, 22, 0, 22, 0, 22, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(162, 37, 2, 2025, 0, 0, 0, 0, 0, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(163, 37, 3, 2025, 10, 0, 10, 0, 10, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(164, 37, 4, 2025, 10, 0, 10, 0, 10, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(165, 37, 5, 2025, 30, 0, 30, 0, 30, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(166, 37, 6, 2025, 0, 0, 0, 0, 0, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(167, 37, 7, 2025, 90, 0, 90, 0, 90, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(168, 37, 8, 2025, 11, 0, 11, 0, 11, '2025-07-16 01:16:47', '2025-07-16 01:16:47'),
(169, 38, 1, 2025, 22, 0, 22, 0, 22, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(170, 38, 2, 2025, 0, 0, 0, 0, 0, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(171, 38, 3, 2025, 10, 0, 10, 0, 10, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(172, 38, 4, 2025, 10, 0, 10, 0, 10, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(173, 38, 5, 2025, 30, 0, 30, 0, 30, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(174, 38, 6, 2025, 0, 0, 0, 0, 0, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(175, 38, 7, 2025, 90, 0, 90, 0, 90, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(176, 38, 8, 2025, 11, 0, 11, 0, 11, '2025-07-16 16:59:30', '2025-07-16 16:59:30'),
(185, 40, 1, 2025, 22, 0, 22, 0, 22, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(186, 40, 2, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(187, 40, 3, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(188, 40, 4, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(189, 40, 5, 2025, 30, 0, 30, 0, 30, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(190, 40, 6, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(191, 40, 7, 2025, 90, 0, 90, 0, 90, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(192, 40, 8, 2025, 11, 0, 11, 0, 11, '2025-07-17 23:31:15', '2025-07-17 23:31:15'),
(193, 41, 1, 2025, 22, 0, 22, 0, 22, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(194, 41, 2, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(195, 41, 3, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(196, 41, 4, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(197, 41, 5, 2025, 30, 0, 30, 0, 30, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(198, 41, 6, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(199, 41, 7, 2025, 90, 0, 90, 0, 90, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(200, 41, 8, 2025, 11, 0, 11, 0, 11, '2025-07-17 23:34:38', '2025-07-17 23:34:38'),
(201, 42, 1, 2025, 22, 0, 22, 0, 22, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(202, 42, 2, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(203, 42, 3, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(204, 42, 4, 2025, 10, 0, 10, 0, 10, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(205, 42, 5, 2025, 30, 0, 30, 0, 30, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(206, 42, 6, 2025, 0, 0, 0, 0, 0, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(207, 42, 7, 2025, 90, 0, 90, 0, 90, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(208, 42, 8, 2025, 11, 0, 11, 0, 11, '2025-07-17 23:53:07', '2025-07-17 23:53:07'),
(209, 46, 1, 2025, 22, 0, 22, 0, 22, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(210, 46, 2, 2025, 0, 0, 0, 0, 0, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(211, 46, 3, 2025, 10, 0, 10, 0, 10, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(212, 46, 4, 2025, 10, 0, 10, 0, 10, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(213, 46, 5, 2025, 30, 0, 30, 0, 30, '2025-07-24 11:07:30', '2025-07-24 11:07:30'),
(214, 46, 6, 2025, 0, 0, 0, 0, 0, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(215, 46, 7, 2025, 90, 0, 90, 0, 90, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(216, 46, 8, 2025, 11, 0, 11, 0, 11, '2025-07-24 11:07:31', '2025-07-24 11:07:31'),
(217, 43, 1, 2025, 22, 0, 22, 0, 22, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(218, 43, 2, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(219, 43, 3, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(220, 43, 4, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(221, 43, 5, 2025, 30, 0, 30, 0, 30, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(222, 43, 6, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(223, 43, 7, 2025, 90, 0, 90, 0, 90, '2025-07-24 12:28:09', '2025-07-24 12:28:09'),
(224, 43, 8, 2025, 11, 0, 11, 0, 11, '2025-07-24 12:28:10', '2025-07-24 12:28:10'),
(225, 50, 1, 2025, 22, 0, 22, 0, 22, '2025-07-24 12:30:00', '2025-07-24 12:30:00'),
(226, 50, 2, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(227, 50, 3, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(228, 50, 4, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(229, 50, 5, 2025, 30, 0, 30, 0, 30, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(230, 50, 6, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(231, 50, 7, 2025, 90, 0, 90, 0, 90, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(232, 50, 8, 2025, 11, 0, 11, 0, 11, '2025-07-24 12:30:01', '2025-07-24 12:30:01'),
(233, 66, 1, 2025, 22, 0, 22, 0, 22, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(234, 66, 2, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(235, 66, 3, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:44:49', '2025-07-24 12:44:49'),
(236, 66, 4, 2025, 10, 0, 10, 0, 10, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(237, 66, 5, 2025, 30, 0, 30, 0, 30, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(238, 66, 6, 2025, 0, 0, 0, 0, 0, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(239, 66, 7, 2025, 90, 0, 90, 0, 90, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(240, 66, 8, 2025, 11, 0, 11, 0, 11, '2025-07-24 12:44:50', '2025-07-24 12:44:50'),
(241, 44, 1, 2025, 22, 0, 22, 0, 22, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(242, 44, 2, 2025, 0, 0, 0, 0, 0, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(243, 44, 3, 2025, 10, 0, 10, 0, 10, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(244, 44, 4, 2025, 10, 0, 10, 0, 10, '2025-08-13 12:00:03', '2025-08-13 12:00:03'),
(245, 44, 5, 2025, 30, 0, 30, 0, 30, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(246, 44, 6, 2025, 0, 0, 0, 0, 0, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(247, 44, 7, 2025, 90, 0, 90, 0, 90, '2025-08-13 12:00:04', '2025-08-13 12:00:04'),
(248, 44, 8, 2025, 11, 0, 11, 0, 11, '2025-08-13 12:00:04', '2025-08-13 12:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `conge_decisions`
--

CREATE TABLE `conge_decisions` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `type_conge_id` bigint UNSIGNED NOT NULL,
  `nombre_jours` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_decision` date NOT NULL,
  `numero_decision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarques` text COLLATE utf8mb4_unicode_ci,
  `ampliations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `statut` enum('en_attente','approuve','refuse') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `fichier_decision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `conge_decisions`
--

INSERT INTO `conge_decisions` (`id`, `fonctionnaire_id`, `type_conge_id`, `nombre_jours`, `date_debut`, `date_fin`, `date_decision`, `numero_decision`, `remarques`, `ampliations`, `statut`, `fichier_decision`, `created_at`, `updated_at`) VALUES
(14, 16, 7, 90, '2024-01-01', '2024-03-31', '2024-01-01', '1MATERNITE', NULL, NULL, 'approuve', NULL, '2025-06-24 07:00:13', '2025-06-24 07:00:13'),
(26, 21, 1, 6, '2025-01-01', '2025-01-06', '2025-07-06', 'ZE', NULL, NULL, 'approuve', NULL, '2025-07-06 14:22:07', '2025-07-06 14:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `demande_conges`
--

CREATE TABLE `demande_conges` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `type_conge_id` bigint UNSIGNED NOT NULL,
  `date_demande` date NOT NULL,
  `date_debut` date NOT NULL,
  `demande` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecoles`
--

INSERT INTO `ecoles` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'Université Mohammed V', 'جامعة محمد الخامس', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(2, 'Université Hassan II', 'جامعة الحسن الثاني', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(3, 'Institut Supérieur des Sciences de la Santé', 'المعهد العالي لعلوم الصحة', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(4, 'École Nationale de Santé Publique', 'المدرسة الوطنية للصحة العمومية', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(5, 'Faculté de Médecine et de Pharmacie', 'كلية الطب والصيدلة', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(6, 'Université Mohammed V', 'جامعة محمد الخامس', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(7, 'Université Hassan II', 'جامعة الحسن الثاني', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(8, 'Institut Supérieur des Sciences de la Santé', 'المعهد العالي لعلوم الصحة', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(9, 'École Nationale de Santé Publique', 'المدرسة الوطنية للصحة العمومية', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(10, 'Faculté de Médecine et de Pharmacie', 'كلية الطب والصيدلة', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(11, 'Faculté des sciences dhar lamraz Fes', 'كلية العلوم ظهر لمهراز فاس', '2025-07-14 13:32:57', '2025-07-14 13:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `encadrants`
--

CREATE TABLE `encadrants` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encadrants`
--

INSERT INTO `encadrants` (`id`, `nom`, `nom_arabe`, `fonction`, `fonction_arabe`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Fatima Zahra', 'د. فاطمة الزهراء', 'Médecin Spécialiste', 'طبيب مختص', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(3, 'Mme. Khadija Alami', 'السيدة خديجة العلمي', 'Infirmière Major', 'ممرضة رئيسية', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(4, 'M. Omar Tazi', 'السيد عمر التازي', 'Technicien Principal', 'تقني رئيسي', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(5, 'Dr. Youssef Idrissi', 'د. يوسف الإدريسي', 'Directeur Médical', 'مدير طبي', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(6, 'Dr. Ahmed Benali', 'د. أحمد بن علي', 'Chef de Service', 'رئيس المصلحة', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(7, 'Dr. Fatima Zahra', 'د. فاطمة الزهراء', 'Médecin Spécialiste', 'طبيب مختص', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(8, 'Mme. Khadija Alami', 'السيدة خديجة العلمي', 'Infirmière Major', 'ممرضة رئيسية', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(9, 'M. Omar Tazi', 'السيد عمر التازي', 'Technicien Principal', 'تقني رئيسي', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(10, 'Dr. Youssef Idrissi', 'د. يوسف الإدريسي', 'Directeur Médical', 'مدير طبي', '2025-06-10 08:59:00', '2025-06-10 08:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `etat_prise_cesations`
--

CREATE TABLE `etat_prise_cesations` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `date_cesation` date NOT NULL,
  `date_prise` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fichiers_fonctionnaires`
--

CREATE TABLE `fichiers_fonctionnaires` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `date_note` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonctionnaires`
--

CREATE TABLE `fonctionnaires` (
  `id` bigint UNSIGNED NOT NULL,
  `ppr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marie` enum('oui','non') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_conjoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_conjoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enfants` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_assurance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_embauche` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonction_id` bigint UNSIGNED DEFAULT NULL,
  `nom_formation_sanitaire_id` bigint UNSIGNED DEFAULT NULL,
  `remarques` text COLLATE utf8mb4_unicode_ci,
  `service_id` bigint UNSIGNED DEFAULT NULL,
  `specialite_grade_id` bigint UNSIGNED DEFAULT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `type_mutation` bigint UNSIGNED DEFAULT NULL,
  `date_mutation` date NOT NULL,
  `date_prise_en_service` date NOT NULL,
  `date_note` date DEFAULT NULL,
  `fichier_note` text COLLATE utf8mb4_unicode_ci,
  `ref_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `fonctionnaires`
--

INSERT INTO `fonctionnaires` (`id`, `ppr`, `nom`, `nom_arabe`, `prenom`, `prenom_arabe`, `cin`, `sexe`, `marie`, `nom_conjoint`, `prenom_conjoint`, `enfants`, `photo`, `numero_assurance`, `date_naissance`, `date_embauche`, `email`, `telephone`, `adresse`, `fonction_id`, `nom_formation_sanitaire_id`, `remarques`, `service_id`, `specialite_grade_id`, `position_id`, `type_mutation`, `date_mutation`, `date_prise_en_service`, `date_note`, `fichier_note`, `ref_note`, `created_at`, `updated_at`) VALUES
(43, 'INSAF', 'EER', 'Sq', 'QD', 'z', 'QS', 'F', NULL, NULL, NULL, NULL, 'photo_1752800598.png', NULL, '2025-01-01', '2007-01-01', 'aze@gmail.com', 'zae', 'a', 17, 8, 'AZ', 36, 8, 2, 4, '2007-01-01', '2027-01-01', '2027-01-01', '', '', '2025-07-18 00:03:18', '2025-07-18 00:03:18'),
(44, '2176357', 'JIRANI', NULL, 'MOUNIA', NULL, 'ZT185393', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1995-07-23', '2022-06-02', NULL, NULL, NULL, 9, 21, NULL, 31, 35, 2, 4, '2022-06-02', '2025-07-10', '2025-07-10', NULL, '2176357', NULL, '2025-08-13 11:59:54'),
(45, '1552792', 'SAHAL', NULL, 'KARIMA', NULL, 'CD98693', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1987-02-01', '2009-07-20', NULL, NULL, NULL, 9, 21, NULL, 40, 35, 2, 4, '2009-07-20', '2021-09-10', '2021-09-10', NULL, '1552792', NULL, '2025-08-13 12:01:22'),
(46, '1942339', 'LAAROUSSI', 'LAAROUSSI', 'MAJDOULINE', 'MAJDOULINE', 'CD184749', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1990-06-13', '2016-10-21', NULL, NULL, NULL, 9, 21, NULL, 31, 35, 2, 4, '2016-10-21', '2025-05-22', '2025-05-22', NULL, '1942339', NULL, '2025-08-13 12:06:34'),
(47, '2070290', 'HID', NULL, 'NAJOUA', NULL, 'CD271670', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1995-11-09', '2020-06-11', NULL, NULL, NULL, 9, 21, NULL, 31, 35, 2, 4, '2020-06-11', '2023-02-08', '2023-02-08', NULL, '2070290', NULL, '2025-08-13 12:07:03'),
(48, '1258737', 'CHAIBI', NULL, 'ASIYA', NULL, 'C979862', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1983-12-27', '2005-12-05', NULL, NULL, NULL, 9, 21, NULL, 40, 35, 2, 1, '2005-12-05', '2023-06-09', '2023-06-09', NULL, '1258737', NULL, '2025-08-13 12:07:23'),
(49, '1259364', 'EL MOHTADI', NULL, 'MARIAME', NULL, 'C979047', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1982-11-30', '2006-04-13', NULL, NULL, NULL, 9, 21, NULL, 40, 35, 2, 4, '2006-04-13', '2021-11-08', '2021-11-08', NULL, '1259364', NULL, '2025-08-13 12:08:45'),
(50, '726398', 'LAMOUDNI', NULL, 'BADIA', NULL, 'C333174', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1969-04-19', '1992-08-10', NULL, NULL, NULL, 9, 6, NULL, 40, 35, 2, 4, '1992-08-10', '2018-05-25', '2018-05-25', NULL, '726398', NULL, '2025-08-13 12:09:07'),
(51, '74241', 'CHARRADI', NULL, 'FATMA', NULL, 'C660814', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1966-02-12', '1994-11-07', NULL, NULL, NULL, 9, 21, NULL, 41, 39, 2, 4, '1994-11-07', '1994-11-07', '1994-11-07', NULL, '74241', NULL, '2025-08-13 12:45:48'),
(52, '969256', 'MOUTAOUAKKEL', NULL, 'OUAFAE', NULL, 'C245615', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1961-12-31', '1980-07-01', NULL, NULL, NULL, 9, 21, NULL, 40, 40, 2, 4, '1980-07-01', '2021-09-23', '2021-09-23', NULL, '969256', NULL, '2025-08-13 12:49:11'),
(53, '2029607', 'EZZOUAINE', NULL, 'MERYEM', NULL, 'CD253610', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1996-05-02', '2018-11-01', NULL, NULL, NULL, 9, 21, NULL, 40, 41, 2, 4, '2018-11-01', '2025-03-10', '2025-03-10', NULL, '2029607', NULL, '2025-08-13 12:54:25'),
(54, '330874', 'BEN MIMOUN', NULL, 'MINA', NULL, 'D314557', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1965-01-05', '1987-07-22', NULL, NULL, NULL, 9, 21, NULL, 40, 41, 2, 4, '1987-07-22', '1987-07-22', '1987-07-22', NULL, '330874', NULL, '2025-08-13 12:54:41'),
(55, '1041999', 'MAMOUNI', NULL, 'BOUCHRA', NULL, 'CB6945', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1966-11-26', '1995-08-30', NULL, NULL, NULL, 9, 21, NULL, 40, 41, 2, 4, '1995-08-30', '1995-08-30', '1995-08-30', NULL, '1041999', NULL, '2025-08-13 12:54:56'),
(56, '98596', 'BUYAZIDEN', NULL, 'FARIDA', NULL, 'R98915', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1965-02-25', '1994-11-07', NULL, NULL, NULL, 9, 21, NULL, 40, 42, 2, 4, '1994-11-07', '2022-05-10', '2022-05-10', NULL, '98596', NULL, '2025-08-13 13:01:52'),
(57, '850487', 'BENAIJA', NULL, 'RACHIDA', NULL, '850472', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1960-12-11', '1981-07-01', NULL, NULL, NULL, 9, 21, NULL, 40, 9, 2, 4, '1981-07-01', '1981-07-01', '1981-07-01', NULL, '850487', NULL, '2025-07-24 12:13:42'),
(58, '969254', 'MRANI ALAOUI', NULL, 'KHADIJA', NULL, 'C300297', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1957-04-21', '1980-07-01', NULL, NULL, NULL, 9, 21, NULL, 40, 9, 2, 4, '1980-07-01', '1980-07-01', '1980-07-01', NULL, '969254', NULL, '2025-07-24 12:20:07'),
(59, '1449869', 'ANOUCHE', NULL, 'NAWAL', NULL, 'BH414590', 'M', NULL, NULL, NULL, NULL, NULL, NULL, '1977-04-18', '2007-09-25', NULL, NULL, NULL, 1, 21, NULL, 40, 26, 2, 4, '2007-09-25', '2025-05-22', '2025-05-22', NULL, '1449869', NULL, '2025-07-24 12:26:56'),
(60, '399399', 'JIBER', NULL, 'ABDELLAH', NULL, 'C301593', 'M', NULL, NULL, NULL, NULL, NULL, NULL, '1962-09-19', '1993-03-30', NULL, NULL, NULL, 1, 21, NULL, 40, 26, 2, 4, '1993-03-30', '1993-03-30', '1993-03-30', NULL, '399399', NULL, '2025-07-24 12:30:19'),
(61, '782939', 'CHEMLAL', NULL, 'RABIA', NULL, 'K93211', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1963-02-11', '1994-04-07', NULL, NULL, NULL, 1, 21, NULL, 40, 26, 2, 4, '1994-04-07', '2022-04-08', '2022-04-08', NULL, '782939', NULL, '2025-07-24 12:39:39'),
(62, '1146668', 'ZADI FATIMA', NULL, 'ZAHRA', NULL, 'C423734', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1972-08-09', '1999-05-05', NULL, NULL, NULL, 1, 21, NULL, 40, 26, 2, 4, '1999-05-05', '1999-05-05', '1999-05-05', NULL, '1146668', NULL, '2025-07-24 12:28:30'),
(63, '893790', 'BERRAHOU', NULL, 'NOUFISSA', NULL, 'A286102', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1960-02-22', '1991-10-06', NULL, NULL, NULL, 1, 21, NULL, 40, 26, 2, 4, '1991-06-10', '1991-10-06', '1991-10-06', NULL, '893790', NULL, '2025-07-24 12:25:34'),
(64, '321824', 'EL ATTAR', NULL, 'LATIFA', NULL, 'C26242', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1958-12-31', '1993-12-01', NULL, NULL, NULL, 1, 21, NULL, 40, 5, 2, 4, '1993-12-01', '1993-12-01', '1993-12-01', NULL, '321824', NULL, '2025-07-24 12:43:20'),
(65, '22121', 'xxxxxxx', 'xxx', 'xxxxxx', 'xxxx', 'xx22', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-01', '2025-10-10', 'xxxx@gmail.com', '224', '', 17, 9, '', 37, 8, 2, 4, '2025-01-01', '2025-01-01', '2025-01-01', '', '', '2025-07-22 12:37:37', '2025-07-22 12:37:37'),
(66, '836758', 'RIHANI', NULL, 'ASMAE', NULL, 'C321617', 'F', NULL, NULL, NULL, NULL, NULL, NULL, '1967-11-27', '1995-06-02', NULL, NULL, NULL, 1, 6, NULL, 24, 16, 2, 1, '1995-06-02', '1995-06-02', '1995-06-02', NULL, '836758', NULL, '2025-07-24 12:44:45'),
(67, '876399', 'MOUFID', NULL, 'ILHAM', NULL, 'C376421', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1962-12-31', '1984-01-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1984-01-02', '1984-01-02', '1984-01-02', NULL, NULL, NULL, NULL),
(68, '884576', 'AL HAJJI', NULL, 'SAMIRA', NULL, 'C388355', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1968-01-28', '1987-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1987-07-22', '2021-12-30', '2021-12-30', NULL, NULL, NULL, NULL),
(69, '81894', 'HAMMAN', NULL, 'LALLA YAMINA', NULL, '36', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1970-12-18', '1994-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1994-07-27', '2020-11-02', '2020-11-02', NULL, NULL, NULL, NULL),
(70, '1486150', 'AICHOUCH', NULL, 'OUADIE', NULL, 'CD124578', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1987-05-10', '2012-07-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-07-11', '2024-02-06', '2024-02-06', NULL, NULL, NULL, NULL),
(71, '881595', 'BOU AICHA', NULL, 'MOHAMMED', NULL, 'C38182', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1957-12-31', '1987-07-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1987-07-22', '1995-08-23', '1995-08-23', NULL, NULL, NULL, NULL),
(72, '1764377', 'EMHIRRACH', NULL, 'SAFA', NULL, 'CB214853', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1985-01-10', '2014-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-12-11', '2023-02-24', '2023-02-24', NULL, NULL, NULL, NULL),
(73, '1185003', 'BENNANI', NULL, 'MOHAMMED MONCEF', NULL, 'C191266', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1972-12-07', '2002-03-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-03-18', '2023-05-26', '2023-05-26', NULL, NULL, NULL, NULL),
(74, '872330', 'LHADRI', NULL, 'LATIFA', NULL, 'L62438', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1957-08-12', '1985-12-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1985-12-15', '1985-12-15', '1985-12-15', NULL, NULL, NULL, NULL),
(75, '839681', 'HARABI', NULL, 'KHADIJA', NULL, 'C144873', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1960-12-08', '1993-12-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-12-01', '2003-05-05', '2003-05-05', NULL, NULL, NULL, NULL),
(76, '965015', 'MRANI', NULL, 'ALAOUI SEDIYA', NULL, 'C109010', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1958-05-16', '1979-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-07-02', '2016-03-01', '2016-03-01', NULL, NULL, NULL, NULL),
(77, '850783', 'EL HAJJI', NULL, 'HADDA', NULL, 'C260943', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1956-12-31', '1981-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1981-07-01', '1981-07-01', '1981-07-01', NULL, NULL, NULL, NULL),
(78, '262203', 'ENNIYA', NULL, 'RACHIDA', NULL, 'C322307', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1961-12-31', '1984-01-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1984-01-02', '1984-01-02', '1984-01-02', NULL, NULL, NULL, NULL),
(79, '1448658', 'ERRHOUNI', NULL, 'ASMAE', NULL, 'CC25898', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1985-05-16', '2007-02-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2007-02-06', '2016-04-04', '2016-04-04', NULL, NULL, NULL, NULL),
(80, '840005', 'CHARKANI', NULL, 'EL HASSANI HALIMA', NULL, 'C384144', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1968-12-31', '1993-07-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-07-08', '2024-09-03', '2024-09-03', NULL, NULL, NULL, NULL),
(81, '396284', 'MATMATA', NULL, 'NADIA', NULL, 'CB16996', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1970-05-22', '1991-01-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1991-01-10', '1991-01-10', '1991-01-10', NULL, NULL, NULL, NULL),
(82, '730330', 'MOUNIR', NULL, 'SOUAD', NULL, 'C340936', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1969-10-21', '1992-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1992-08-10', '1992-08-10', '1992-08-10', NULL, NULL, NULL, NULL),
(83, '1607558', 'LACHHAB', NULL, 'FAICAL', NULL, 'CD174459', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1987-04-15', '2011-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011-04-18', '2020-06-12', '2020-06-12', NULL, NULL, NULL, NULL),
(84, '1184132', 'EL ALLAM', NULL, 'NADIA', NULL, 'C656299', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1973-12-31', '2001-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2001-01-31', '2022-03-14', '2022-03-14', NULL, NULL, NULL, NULL),
(85, '1716080', 'IKRIM', NULL, 'SOUMIA', NULL, 'CD424372', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1992-10-28', '2014-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-10-20', '2023-07-07', '2023-07-07', NULL, NULL, NULL, NULL),
(86, '135301', 'KANDRI', NULL, 'ABDELAZIZ', NULL, 'C147288', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1957-12-31', '1979-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-07-02', '1979-07-02', '1979-07-02', NULL, NULL, NULL, NULL),
(87, '1253055', 'MONTACER', NULL, 'AMAL', NULL, 'C678850', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1974-05-28', '2001-11-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2001-11-15', '2022-02-09', '2022-02-09', NULL, NULL, NULL, NULL),
(88, '1255524', 'EL FADILI', NULL, 'LOUBNA', NULL, 'C796344', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1982-01-07', '2003-12-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2003-12-22', '2025-05-30', '2025-05-30', NULL, NULL, NULL, NULL),
(89, '758709', 'TOUALABI', NULL, 'AICHA', NULL, 'C322582', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1965-11-30', '1995-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1995-07-17', '1995-07-17', '1995-07-17', NULL, NULL, NULL, NULL),
(90, '976053', 'MAHROUSS', NULL, 'MALIKA', NULL, 'Z70729', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1959-11-07', '1980-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-07-01', '1980-07-01', '1980-07-01', NULL, NULL, NULL, NULL),
(91, '872090', 'HARIMA', NULL, 'FATIMA', NULL, 'D215938', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1962-01-20', '1983-12-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1983-12-13', '1983-12-13', '1983-12-13', NULL, NULL, NULL, NULL),
(92, '782500', 'CHERGUI', NULL, 'HASSAN', NULL, 'C369060', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1966-02-11', '1992-02-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1992-02-03', '1992-02-03', '1992-02-03', NULL, NULL, NULL, NULL),
(93, '1140424', 'HASSOUNI', NULL, 'OUAFAE', NULL, 'C339539', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1969-01-03', '1999-02-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-02-02', '1999-02-02', '1999-02-02', NULL, NULL, NULL, NULL),
(94, '2028063', 'LOUARDI', NULL, 'KHADIJA', NULL, 'CD329329', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1993-11-19', '2018-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-07', '2024-10-14', '2024-10-14', NULL, NULL, NULL, NULL),
(95, '850533', 'RHERMOUL', NULL, 'MALIKA', NULL, 'C305078', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1960-12-31', '1981-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1981-07-01', '1981-07-01', '1981-07-01', NULL, NULL, NULL, NULL),
(96, '965838', 'MELYANI', NULL, 'NAIMA', NULL, 'C77938', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1957-12-17', '1979-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-07-02', '1979-07-02', '1979-07-02', NULL, NULL, NULL, NULL),
(97, '1042277', 'BOURABAA', NULL, 'LAILA', NULL, 'C318616', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1965-09-12', '1994-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1994-11-01', '1994-11-01', '1994-11-01', NULL, NULL, NULL, NULL),
(98, '961339', 'EL MOUSTAINE FILALI', NULL, 'NAIMA', NULL, 'C170061', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1958-11-19', '1979-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1979-07-02', '1979-07-02', '1979-07-02', NULL, NULL, NULL, NULL),
(99, '396249', 'LAHLALI', NULL, 'SAMIRA', NULL, 'Z61680', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1962-12-14', '1993-01-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-01-30', '1993-01-30', '1993-01-30', NULL, NULL, NULL, NULL),
(100, '1449722', 'HOUR', NULL, 'NTISSAR', NULL, 'E612834', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1979-04-11', '2007-09-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2007-09-24', '2024-07-17', '2024-07-17', NULL, NULL, NULL, NULL),
(101, '759824', 'BENCHEKROUN', NULL, 'BELABBES SAMIRA', NULL, 'C366462', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1964-09-15', '1993-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1993-08-12', '1993-08-12', '1993-08-12', NULL, NULL, NULL, NULL),
(102, '1147679', 'EL AMRANI', NULL, 'HANAE', NULL, 'GM19721', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1970-12-09', '2000-05-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000-05-15', '2000-05-15', '2000-05-15', NULL, NULL, NULL, NULL),
(103, '2027319', 'SGHIRI', NULL, 'RAJA', NULL, 'D965319', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1995-06-10', '2018-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-05-07', '2020-06-01', '2020-06-01', NULL, NULL, NULL, NULL),
(104, '1835053', 'EL-YAHYAOUI', NULL, 'HAJIBA', NULL, 'CN6890', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1993-03-26', '2016-12-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-28', '2021-03-15', '2021-03-15', NULL, NULL, NULL, NULL),
(105, '1835034', 'MABROUKI', NULL, 'FATIMA ZAHRA', NULL, 'CD139693', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1993-01-13', '2017-01-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-01-02', '2022-01-12', '2022-01-12', NULL, NULL, NULL, NULL),
(106, '2297111', 'FARIH', NULL, 'YOUSRA', NULL, 'CD727558', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '2002-07-06', '2023-11-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-02', '2025-05-16', '2025-05-16', NULL, NULL, NULL, NULL),
(107, '1763923', 'FRINDY', NULL, 'FADOUA', NULL, 'D959979', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1986-11-10', '2014-11-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-07', '2019-10-18', '2019-10-18', NULL, NULL, NULL, NULL),
(108, '1140002', 'BENLACHEHAB', NULL, 'MOUNIR', NULL, 'C315936', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1965-08-07', '1998-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1998-11-12', '1998-11-12', '1998-11-12', NULL, NULL, NULL, NULL),
(109, '1253390', 'JMILI', NULL, 'KHALID', NULL, 'D361767', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1966-10-15', '2002-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2002-05-16', '2009-08-06', '2009-08-06', NULL, NULL, NULL, NULL),
(110, '1553052', 'TAIK', NULL, 'INTISSAR', NULL, 'T183552', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1982-05-24', '2009-07-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2009-07-29', '2022-08-24', '2022-08-24', NULL, NULL, NULL, NULL),
(111, '1661305', 'MOUSSAOUI', NULL, 'NABIL', NULL, 'R254559', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1984-07-11', '2012-07-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-07-02', '2012-10-12', '2012-10-12', NULL, NULL, NULL, NULL),
(112, '1834059', 'NGAR', NULL, 'TOURIA', NULL, 'CD383231', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1989-03-10', '2016-04-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-04-13', '2019-03-20', '2019-03-20', NULL, NULL, NULL, NULL),
(113, '1140546', 'MOUATASSEM', NULL, 'FATIMA', NULL, 'C176422', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1965-09-21', '1999-02-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1999-02-09', '2011-08-09', '2011-08-09', NULL, NULL, NULL, NULL),
(114, '321506', 'EL MAMOUNI', NULL, 'SABAH', NULL, 'Z70452', 'Féminin', NULL, NULL, NULL, NULL, NULL, NULL, '1961-01-05', '1987-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1987-08-10', '2020-07-06', '2020-07-06', NULL, NULL, NULL, NULL),
(115, '171536', 'EL OUARDI', NULL, 'MOHAMED', NULL, 'Z66661', 'Masculin', NULL, NULL, NULL, NULL, NULL, NULL, '1963-12-31', '1981-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1981-07-01', '1981-07-01', '1981-07-01', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonctions`
--

INSERT INTO `fonctions` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'Médecin', 'طبيب', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(2, 'Chirurgien', 'جراح', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(3, 'Pédiatre', 'طبيب أطفال', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(4, 'Gynécologue', 'طبيب نساء', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(5, 'Anesthésiste', 'طبيب تخدير', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(6, 'Radiologue', 'طبيب أشعة', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(7, 'Laborantin', 'فني مختبرات', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(8, 'Pharmacien', 'صيدلي', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(9, 'Infirmier(ère)', 'ممرض/ممرضة', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(10, 'secrétariat', 'مساعد اداري', '2025-01-09 08:58:26', '2025-03-07 13:57:25'),
(11, 'Kinésithérapeute', 'علاج طبيعي', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(12, 'Ergothérapeute', 'علاج مهني', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(13, 'Orthophoniste', 'علاج نطق', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(14, 'Audiologue', 'علاج سمع', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(16, 'Secrétaire', 'سكرتير', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(17, 'Comptable', 'محاسب', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(18, 'Gestionnaire des ressources humainesس', 'مدير الموارد البشرية', '2025-01-09 08:58:26', '2025-01-10 13:34:09'),
(19, 'Gestionnaire des achats', 'مدير المشتريات', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(20, 'Gestionnaire des stocks', 'مدير المخزون', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(21, 'Technicien en maintenance', 'فني صيانة', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(22, 'Technicien en informatique', 'فني حاسوب', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(23, 'Technicien en radiologie', 'فني أشعة', '2025-01-09 08:58:26', '2025-01-09 08:58:26'),
(24, 'Technicien en laboratoire', 'فني مختبرات', '2025-01-09 08:58:26', '2025-01-09 08:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `formation_arrondissement_communes`
--

CREATE TABLE `formation_arrondissement_communes` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie_formation_id` bigint UNSIGNED NOT NULL,
  `arrondissement_commune_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(3, 'PREMIER GRADE', 'درجة الاولى', '2025-02-06 10:16:35', '2025-02-06 10:16:35'),
(4, 'deuxieme grade', 'درجة التانية', '2025-03-19 16:06:51', '2025-03-19 16:06:51'),
(5, 'troisième grade', 'درجة الثالة', '2025-03-19 16:07:29', '2025-03-19 16:07:29'),
(6, 'hors grade', 'خارج السلم', '2025-03-19 16:07:58', '2025-03-19 16:07:58'),
(7, 'exceptionnel grade', 'درجة الاسثتنائية', '2025-03-19 16:08:33', '2025-03-19 16:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `grade_cadres`
--

CREATE TABLE `grade_cadres` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cadre_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_cadres`
--

INSERT INTO `grade_cadres` (`id`, `nom`, `nom_arabe`, `cadre_id`, `created_at`, `updated_at`) VALUES
(1, 'premier grade', 'درجة الاولى', 3, '2025-01-17 19:33:12', '2025-01-24 17:52:29'),
(2, 'deuxieme grade', 'درجة التانية', 2, '2025-01-24 18:42:40', '2025-01-24 18:44:10'),
(3, 'premier grade', 'درجة الاولى', 2, '2025-01-24 18:44:29', '2025-01-24 18:44:29'),
(5, 'premier grade', 'درجة الاولى', 9, '2025-03-19 17:10:34', '2025-03-19 17:10:34'),
(6, 'hors grade', 'خارج السلم', 9, '2025-03-19 17:11:02', '2025-03-19 17:11:02'),
(7, 'exceptionnel grade', 'الدرجة الاسثتنائية', 9, '2025-03-19 17:12:06', '2025-03-19 17:12:26'),
(8, 'deuxieme grade', 'درجة التانية', 3, '2025-03-19 17:12:53', '2025-03-19 17:12:53'),
(9, 'troisième grade', 'درجة الثالة', 3, '2025-03-19 17:13:10', '2025-03-19 17:13:10'),
(10, 'premier grade', 'درجة الاولى', 8, '2025-03-19 17:13:31', '2025-03-19 17:13:31'),
(11, 'hors grade', 'خارج السلم', 8, '2025-03-19 17:14:51', '2025-03-19 17:15:57'),
(12, 'grade exceptionnel', 'الاسثتنائية', 8, '2025-03-19 17:16:14', '2025-03-19 17:16:14'),
(13, 'Deuxième grade', 'درجة التانية', 3, '2025-03-19 17:16:59', '2025-03-19 17:16:59'),
(14, 'Premier grade', 'درجة الاولى', 16, '2025-03-19 17:18:06', '2025-03-19 17:18:06'),
(15, 'Deuxieme grade', 'درجة التانية', 16, '2025-03-19 17:18:34', '2025-03-19 17:18:34'),
(17, 'deuxieme grade', 'deuxieme grade', 13, '2025-05-27 13:44:59', '2025-05-27 13:44:59'),
(18, 'PREMIER GRADE', 'الدرجة الأولى', 12, '2025-06-23 20:50:41', '2025-06-23 20:50:41'),
(19, 'HORS GRADE', 'خارج السلم', 19, '2025-06-23 21:00:49', '2025-06-23 21:00:49'),
(21, 'QUATRIEME GRADE', 'الدرجة الرابعة', 20, '2025-06-23 21:09:12', '2025-06-23 21:09:12'),
(22, 'QUATRIEME GRADE', 'الدرجة الرابعة', 21, '2025-06-23 21:11:55', '2025-06-23 21:11:55'),
(23, 'Infirmiers de 1 er grade', 'ممرض من الدرجة الاولى', 16, '2025-07-07 12:33:49', '2025-07-07 12:33:49'),
(25, 'Principale', 'رئيسية', 22, '2025-07-22 12:53:23', '2025-07-22 12:53:23'),
(26, 'Exceptionnel', 'الإسثتنائية', 22, '2025-07-22 12:54:19', '2025-07-22 12:54:19'),
(27, '1 er Grade', 'الدرجة الاولى', 22, '2025-07-22 12:55:28', '2025-07-22 12:55:28'),
(28, '1 er Grade', 'الدرجة الاولى', 23, '2025-07-22 12:57:15', '2025-07-22 12:57:15'),
(29, '1 er Grade', 'الدرجة الاولى', 24, '2025-07-22 12:59:57', '2025-07-22 12:59:57'),
(30, 'Principale', 'رئيسي', 23, '2025-07-22 13:00:34', '2025-07-22 13:00:34'),
(31, 'deuxieme grade', 'deuxieme grade', 16, '2025-07-22 13:08:36', '2025-07-22 13:08:36'),
(32, 'Exceptionnel', 'الاسثتنائية', 16, '2025-07-24 11:02:01', '2025-07-24 11:02:01'),
(33, '1 er garde', 'الدرجة الاولى', 10, '2025-07-24 11:30:49', '2025-07-24 11:30:49'),
(34, 'Exceptionnel', 'الاسثتنائية', 10, '2025-07-24 12:12:55', '2025-07-24 12:12:55'),
(35, 'Sage Femme- Principale', 'مولدة -الاساسية', 10, '2025-07-24 13:04:30', '2025-08-13 11:53:58'),
(36, 'Exceptionnel', 'الاسثتنائية', 22, '2025-07-24 13:11:41', '2025-07-24 13:11:41'),
(37, 'Principale', 'الاساسي', 26, '2025-07-24 13:23:08', '2025-07-24 13:23:08'),
(38, '1 er Grade', 'الدرجة الاولى', 26, '2025-07-24 13:24:43', '2025-07-24 13:24:43'),
(39, 'Sage femme -1er grade', 'مولدة -الدرجة الاولى', 10, '2025-08-13 11:55:16', '2025-08-13 11:55:16'),
(40, 'Sage Femme- Exceptionnel', 'مولدة -الاسثتنائية', 10, '2025-08-13 11:55:37', '2025-08-13 11:55:37'),
(41, '3 grade', 'الدرجة الثالتة', 13, '2025-08-13 12:21:04', '2025-08-13 12:40:09'),
(42, '1er grade', 'الدرجة الاولى', 23, '2025-08-13 12:57:13', '2025-08-13 12:59:44'),
(43, '2 éme grade', 'الدرجة التانية', 23, '2025-08-13 13:00:43', '2025-08-13 13:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `greves`
--

CREATE TABLE `greves` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `nombre_jours` int DEFAULT NULL,
  `remarque` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `greves`
--

INSERT INTO `greves` (`id`, `fonctionnaire_id`, `date_debut`, `date_fin`, `nombre_jours`, `remarque`, `created_at`, `updated_at`) VALUES
(8, 16, '2024-04-04', '2024-04-07', NULL, NULL, '2025-06-24 07:14:34', '2025-06-24 07:14:34'),
(9, 15, '2024-03-03', '2024-03-05', NULL, NULL, '2025-06-24 07:15:47', '2025-06-24 07:15:47'),
(13, 21, '2025-01-01', '2025-06-06', 157, NULL, '2025-07-09 13:59:21', '2025-07-09 13:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `historique_mutations`
--

CREATE TABLE `historique_mutations` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED DEFAULT NULL,
  `type_mutation_id` bigint UNSIGNED DEFAULT NULL,
  `date_mutation` date DEFAULT NULL,
  `date_note` date DEFAULT NULL,
  `ref_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichiers_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formation_sanitaire_origine_id` bigint UNSIGNED DEFAULT NULL,
  `formation_sanitaire_destination_id` bigint UNSIGNED DEFAULT NULL,
  `remarque` text COLLATE utf8mb4_unicode_ci,
  `date_prise_en_service` date DEFAULT NULL,
  `date_cessation_service` date DEFAULT NULL,
  `ancien_service_id` bigint UNSIGNED DEFAULT NULL,
  `nouveau_service_id` bigint UNSIGNED DEFAULT NULL,
  `ancien_fonction_id` bigint UNSIGNED DEFAULT NULL,
  `nouveau_fonction_id` bigint UNSIGNED DEFAULT NULL,
  `ancien_specialite_id` bigint UNSIGNED DEFAULT NULL,
  `nouveau_specialite_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historique_mutations`
--

INSERT INTO `historique_mutations` (`id`, `fonctionnaire_id`, `type_mutation_id`, `date_mutation`, `date_note`, `ref_note`, `fichiers_notes`, `formation_sanitaire_origine_id`, `formation_sanitaire_destination_id`, `remarque`, `date_prise_en_service`, `date_cessation_service`, `ancien_service_id`, `nouveau_service_id`, `ancien_fonction_id`, `nouveau_fonction_id`, `ancien_specialite_id`, `nouveau_specialite_id`, `created_at`, `updated_at`) VALUES
(49, 21, 6, '2022-01-01', '2022-02-02', 'ZER', '', 18, 18, NULL, '2022-02-02', NULL, 38, 38, 1, 1, 24, 24, '2025-06-29 13:06:21', '2025-06-29 13:06:21'),
(50, 21, 5, '2025-01-01', '2025-01-01', 'EZER', 'fichiers_notes/10195bynPyOp2iD7WwTpfVWWgHHY49CdvRxqL9Hh.png', 18, 19, 'ZER', '2025-02-02', '2025-01-28', 38, 38, 1, 22, 24, 15, '2025-06-29 13:06:21', '2025-06-29 13:18:04'),
(67, 15, 4, '2009-01-01', '2009-01-01', '', '', 9, 9, NULL, '2009-01-01', NULL, 24, 24, 5, 5, 5, 5, '2025-07-09 13:09:05', '2025-07-09 13:09:05'),
(68, 15, 5, '2009-01-01', '2009-01-01', 'LKL', NULL, 9, 10, 'ZD', '2009-01-01', '2009-01-01', 24, 28, 5, 4, 5, 8, '2025-07-09 13:09:05', '2025-07-09 13:09:05'),
(69, 15, 6, '2025-01-01', '2025-01-01', 'KJ', 'fichiers_notes/2aT8cReg9k9hxOQJHGXcqeLIEge2nrQlQnEZeBvc.pdf', 10, 8, 'AZAZ', '2025-01-01', '2025-01-01', 28, 24, 4, 3, 8, 7, '2025-07-09 13:09:50', '2025-07-17 23:32:10'),
(73, 16, 1, '1995-12-01', '2024-06-06', 'SS', 'fichiers_notes/Xc15jhH7I6k0IIgA6H2C8vElXyAtEf6HJidjoYBi.png', 9, 9, NULL, '2024-06-07', NULL, 25, 25, 13, 13, 22, 22, '2025-07-14 14:58:06', '2025-07-14 14:58:06'),
(74, 16, 5, '2025-12-01', '2025-02-02', 'NBN', NULL, 9, 10, 'AZE', '2025-01-01', '2025-01-01', 25, NULL, 13, 6, 22, 10, '2025-07-14 14:58:06', '2025-07-14 14:58:06'),
(75, 21, 1, '2022-01-01', '2022-01-01', 'HG', 'fichiers_notes/JBV1QzIc10XSpDsDTmkvmsNID7VbYxqw9xd0CLHx.pdf', 19, 9, 'Z', '2026-01-01', '2026-01-01', 38, 24, 22, NULL, 15, 8, '2025-07-14 15:27:14', '2025-07-14 15:27:14'),
(76, 16, 3, '2025-12-01', '2025-12-01', 'KKHK', 'fichiers_notes/94ZKR7MBJH5cfZ3PDW65mSP9lnZGEiwWzA11itFL.pdf', 10, 13, 'Z', '2025-12-01', '2025-12-01', 24, 27, 6, 3, 10, 6, '2025-07-14 15:39:24', '2025-07-16 17:11:45'),
(77, 42, 4, '2025-01-01', '2025-01-01', '', '', 8, 8, NULL, '2025-12-31', NULL, 37, 37, 2, 2, 5, 5, '2025-07-17 23:59:49', '2025-07-17 23:59:49'),
(78, 42, 5, '2025-01-01', '2026-01-01', 'BNB', NULL, 8, 10, NULL, '2026-01-01', '2026-01-01', 37, 27, 2, 3, 5, 7, '2025-07-17 23:59:49', '2025-07-17 23:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `historique_populations`
--

CREATE TABLE `historique_populations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_formation_sanitaire_id` bigint UNSIGNED NOT NULL,
  `population` double NOT NULL,
  `annee` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intitule_formations`
--

CREATE TABLE `intitule_formations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intitule_formations`
--

INSERT INTO `intitule_formations` (`id`, `nom`, `description`, `actif`, `created_at`, `updated_at`) VALUES
(1, 'Formation en Médecine Générale', 'Formation de base en médecine générale', 1, '2025-07-08 13:40:42', '2025-07-08 13:40:42'),
(2, 'Formation en Soins Infirmiers', 'Formation spécialisée en soins infirmiers', 1, '2025-07-08 13:40:42', '2025-07-08 13:40:42'),
(3, 'Formation en Pharmacie', 'Formation pharmaceutique et préparation de médicaments', 1, '2025-07-08 13:40:42', '2025-07-08 13:40:42'),
(4, 'Formation en Gestion Hospitalière', 'Formation en administration et gestion des établissements de santé', 1, '2025-07-08 13:40:42', '2025-07-08 13:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_04_153341_create_permission_tables', 1),
(5, '2024_12_04_154005_create_activity_log_table', 1),
(6, '2024_12_04_154006_add_event_column_to_activity_log_table', 1),
(7, '2024_12_04_154007_add_batch_uuid_column_to_activity_log_table', 1),
(8, '2024_12_04_154704_create_regions_table', 1),
(9, '2024_12_04_154910_create_villes_table', 1),
(10, '2024_12_04_155814_create_categorie_cadres_table', 1),
(11, '2024_12_04_162103_create_specialites_table', 1),
(12, '2024_12_04_162706_create_grades_table', 1),
(13, '2024_12_04_163056_create_categorie_formations_table', 1),
(14, '2024_12_04_165923_create_positions_table', 1),
(15, '2024_12_04_170828_create_statut_positionaires_table', 1),
(16, '2024_12_04_171152_create_type_mutations_table', 1),
(18, '2024_12_10_143914_create_fichiers_fonctionnaires_table', 1),
(19, '2024_12_10_150111_create_arrondissement_communes_table', 1),
(20, '2024_12_10_150548_create_formation_arrondissement_communes_table', 1),
(21, '2024_12_10_152125_create_services_table', 1),
(22, '2024_12_10_152134_create_fonctions_table', 1),
(23, '2024_12_10_152741_create_affectations_table', 1),
(24, '2024_12_10_155918_create_type_conges_table', 1),
(25, '2024_12_10_163735_create_demande_conges_table', 1),
(26, '2024_12_10_163738_create_conges_table', 1),
(27, '2024_12_10_165050_create_type_certificates_table', 1),
(28, '2024_12_10_165059_create_certificates_table', 1),
(29, '2024_12_10_170731_create_etat_prise_cesations_table', 1),
(30, '2024_12_13_151157_create_mutations_table', 1),
(31, '2024_12_13_153918_create_archive_fichiers_table', 1),
(32, '2025_01_10_160613_create_type_stages_table', 2),
(33, '2025_01_17_190245_create_cadres_table', 3),
(34, '2025_01_17_194007_create_grade_cadres_table', 4),
(35, '2025_01_24_185451_create_specialite_grades_table', 5),
(36, '2025_02_03_190228_create_type_categorie_formations_table', 6),
(37, '2025_02_03_192914_create_niveau_categorie_formations_table', 7),
(38, '2025_02_03_195850_create_nom_formation_sanitaires_table', 8),
(39, '2024_12_04_171904_create_fonctionnaires_table', 9),
(42, '2025_02_12_155953_create_historique_mutations_table', 10),
(43, '2025_02_12_160046_create_position_historiques_table', 10),
(44, '2025_02_21_144253_create_historique_populations_table', 11),
(45, '2024_01_01_000001_create_greves_table', 12),
(46, '2025_04_25_225044_add_date_conge_to_relicats_table', 12),
(47, '2025_05_13_191650_create_conge_availabilities_table', 12),
(48, '2025_05_24_145201_create_retraites_table', 12),
(49, '2025_01_27_000000_create_conge_decisions_table', 13),
(50, '2025_06_10_094804_create_ecoles_table', 14),
(51, '2025_06_10_094812_create_options_table', 14),
(52, '2025_06_10_094819_create_encadrants_table', 14),
(53, '2025_06_10_094828_create_stages_table', 14),
(55, '2025_01_12_100000_add_fichier_to_stages_table', 15),
(56, '2025_01_12_110000_create_cadres_stages_table', 16),
(57, '2025_01_12_110001_create_type_stages_table', 17),
(58, '2025_01_12_110002_modify_stages_table_for_relations', 17),
(59, '2025_01_12_120000_add_scanner_files_to_stages_table', 18),
(60, '2025_01_12_130000_add_actif_column_to_type_stages_table', 19),
(61, '2025_07_05_155422_add_ampliations_to_conge_decisions_table', 20),
(62, '2025_07_05_164023_create_retirement_settings_table', 21),
(63, '2025_07_07_150000_create_intitule_formations_table', 22),
(64, '2025_07_09_142847_add_nombre_jours_to_greves_table', 23),
(65, '2025_07_14_155934_add_type_stage_id_to_stages_table', 24),
(67, '2025_07_18_005610_add_photo_to_fonctionnaires_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 8),
(8, 'App\\Models\\User', 9),
(8, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mutations`
--

CREATE TABLE `mutations` (
  `id` bigint UNSIGNED NOT NULL,
  `type_mutation_id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `old_service_id` bigint UNSIGNED NOT NULL,
  `new_service_id` bigint UNSIGNED NOT NULL,
  `old_fonction_id` bigint UNSIGNED NOT NULL,
  `new_fonction_id` bigint UNSIGNED NOT NULL,
  `old_categorie_formations_id` bigint UNSIGNED NOT NULL,
  `new_categorie_formations_id` bigint UNSIGNED NOT NULL,
  `old_arrondissement_communes_id` bigint UNSIGNED NOT NULL,
  `new_arrondissement_communes_id` bigint UNSIGNED NOT NULL,
  `old_categorie_cadres_id` bigint UNSIGNED NOT NULL,
  `new_categorie_cadres_id` bigint UNSIGNED NOT NULL,
  `old_grades_id` bigint UNSIGNED NOT NULL,
  `new_grades_id` bigint UNSIGNED NOT NULL,
  `old_specialites_id` bigint UNSIGNED NOT NULL,
  `new_specialites_id` bigint UNSIGNED NOT NULL,
  `old_villes_id` bigint UNSIGNED NOT NULL,
  `new_villes_id` bigint UNSIGNED NOT NULL,
  `date_prise` date NOT NULL,
  `date_cessation` date NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_decision_note` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `niveau_categorie_formations`
--

CREATE TABLE `niveau_categorie_formations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_categorie_formation_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveau_categorie_formations`
--

INSERT INTO `niveau_categorie_formations` (`id`, `nom`, `nom_arabe`, `type_categorie_formation_id`, `created_at`, `updated_at`) VALUES
(1, 'premier niveaux', 'مستوى الاول', 4, '2025-02-03 18:48:19', '2025-03-19 17:35:37'),
(2, 'regionale', 'الجهوي', 3, '2025-02-03 18:53:12', '2025-02-03 18:53:12'),
(3, 'provinciale', 'الاقليمي', 3, '2025-02-03 18:53:36', '2025-02-03 18:57:00'),
(5, 'Structure Appui', 'مركز الدعم', 4, '2025-03-19 17:39:19', '2025-03-19 17:39:19'),
(6, 'Centre fondation Med VI', 'مؤسسة محمد السادس لتضامن', 5, '2025-03-19 17:51:36', '2025-03-19 17:51:36'),
(7, 'Deuxième niveaux', 'المستوى الثاني', 4, '2025-05-27 11:18:10', '2025-05-27 11:18:10'),
(8, 'provinciale', 'اقليمية', 7, '2025-05-27 12:32:23', '2025-05-27 12:32:23'),
(9, 'Adarissa', 'الادارسة', 4, '2025-07-24 11:18:10', '2025-07-24 11:18:10'),
(10, 'CSU 1', 'المستوى الأول', 4, '2025-07-24 11:21:44', '2025-07-24 11:21:44'),
(11, 'CSC', 'مركز صحي قروي', 4, '2025-07-24 12:07:22', '2025-07-24 12:07:22'),
(12, 'CDTMR', 'مركز تشخيص معالجة الامراض التنفسية', 4, '2025-07-24 13:19:50', '2025-07-24 13:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `nom_formation_sanitaires`
--

CREATE TABLE `nom_formation_sanitaires` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau_categorie_formation_id` bigint UNSIGNED NOT NULL,
  `arrondissement_commune_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nom_formation_sanitaires`
--

INSERT INTO `nom_formation_sanitaires` (`id`, `nom`, `nom_arabe`, `niveau_categorie_formation_id`, `arrondissement_commune_id`, `created_at`, `updated_at`) VALUES
(6, 'IBN KHATIB', 'مستشفى ابن خطيب', 2, 174, '2025-03-07 13:53:25', '2025-03-07 13:53:25'),
(7, 'CRSR SAISS', 'المركز المرجعي لصحة الانجابية سايس', 5, 1, '2025-03-19 17:41:15', '2025-03-19 17:41:15'),
(8, 'CDTMR Bendebab', 'مركز تشخيصي علاج امراض التنفسية بن دباب', 5, 174, '2025-03-19 17:43:05', '2025-03-19 17:43:05'),
(9, 'Alghassani', 'الغساني', 2, 173, '2025-03-19 17:44:39', '2025-03-19 17:44:39'),
(10, 'Monfleuri 1', 'مونفلوري 1', 1, 1, '2025-03-19 17:45:26', '2025-03-19 17:45:45'),
(11, 'fondation med VI traitement cancer', 'مؤسسة محمد السادس لتضامن علاج سرطان عنق رحم', 6, 171, '2025-03-19 17:53:07', '2025-03-19 17:53:07'),
(12, 'centre universitaire Sais', 'centre universitaire Sais', 5, 1, '2025-05-27 10:50:13', '2025-05-27 10:50:13'),
(13, 'Nargiss', 'نرجس', 1, 1, '2025-05-27 10:57:50', '2025-05-27 10:57:50'),
(14, 'Massira 1', 'المسيرة 1', 7, 171, '2025-05-27 11:19:09', '2025-05-27 11:19:09'),
(15, 'Centre réference maladie chronique', 'مركز المرجعي الامراض مزمنة', 5, 171, '2025-05-27 11:37:53', '2025-05-27 11:37:53'),
(16, 'CMP BENSOUDA', 'مركز طبي للقرب بنسودة', 3, 171, '2025-05-27 11:52:24', '2025-05-27 11:52:24'),
(17, 'CENTRE REFERENCE MALADIE CHRONIQUE ZOUGHA', 'المركز المرجعي للامراض المزمنة زواغة', 1, 171, '2025-05-27 12:11:33', '2025-05-27 12:14:27'),
(18, 'Delegation sante et protection sociale Fes', 'المندوبية الاقليمية لصحة فاس', 8, 173, '2025-05-27 12:33:24', '2025-05-27 12:33:24'),
(19, 'HOPITAL PAGNION', 'مستشفى بانيون', 3, 213, '2025-05-27 12:48:31', '2025-05-27 12:48:31'),
(20, 'ibn baytar fes', 'ابن بيطر فاس', 2, 207, '2025-06-23 21:53:05', '2025-06-23 21:53:05'),
(21, 'Adarissa', 'الادارسة', 10, 207, '2025-07-24 11:24:24', '2025-07-24 11:24:24'),
(22, 'Ain Bida', 'عين البيضاء', 11, 176, '2025-07-24 12:08:38', '2025-07-24 12:08:38'),
(23, 'Ain Haroun', 'عين هارون', 10, 174, '2025-07-24 12:09:41', '2025-07-24 12:09:41'),
(24, 'Ain Kadous', 'عين قادوس', 10, 174, '2025-07-24 12:10:25', '2025-07-24 12:10:25'),
(25, 'Ain nokbi', 'عين نقبي', 10, 175, '2025-07-24 12:11:31', '2025-07-24 12:11:31'),
(26, 'Elhajoui csu1', 'الحجوي', 10, 175, '2025-07-24 13:18:04', '2025-07-24 13:18:04'),
(27, 'ANNEXE ADOUA CDTMR', 'ملحقة العدوا CDTMR', 12, 212, '2025-07-24 13:21:14', '2025-07-24 13:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'Kinésithérapeute', 'أخصائي العلاج الطبيعي', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(2, 'Aide Soignant', 'مساعد ممرض', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(3, 'Infirmier', 'ممرض', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(4, 'Technicien de Laboratoire', 'تقني مختبر', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(5, 'Radiologie', 'الأشعة', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(6, 'Pharmacie', 'الصيدلة', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(7, 'Médecine Générale', 'الطب العام', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(8, 'Administration Hospitalière', 'الإدارة الاستشفائية', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
(9, 'Kinésithérapeute', 'أخصائي العلاج الطبيعي', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(10, 'Aide Soignant', 'مساعد ممرض', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(11, 'Infirmier', 'ممرض', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(12, 'Technicien de Laboratoire', 'تقني مختبر', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(13, 'Radiologie', 'الأشعة', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(14, 'Pharmacie', 'الصيدلة', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(15, 'Médecine Générale', 'الطب العام', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(16, 'Administration Hospitalière', 'الإدارة الاستشفائية', '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(17, 'Biologie', 'علوم الحياة والارض', '2025-07-14 13:33:43', '2025-07-14 13:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administration.tableau-de-bord', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(2, 'administration.statistics-detailed', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(3, 'administration.statistics-hr', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(4, 'administration.user-management', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(5, 'parametrage.arrondissements-communes', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(6, 'parametrage.regions', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(7, 'parametrage.villes', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(8, 'parametrage.grades', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(9, 'parametrage.positions', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(10, 'parametrage.services', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(11, 'parametrage.type-mutation', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(12, 'parametrage.fonctions', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(13, 'parametrage.conges-types', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(14, 'parametrage.certificats-types', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(15, 'parametrage.stages-types', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(16, 'cadres.categories-cadres', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(17, 'cadres.cadres', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(18, 'cadres.grades-cadres', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(19, 'cadres.specialites-cadres', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(20, 'formation.categories-formation', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(21, 'formation.type-categories-formation', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(22, 'formation.niveau-categories-formation', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(23, 'formation.nom-formation-sanitaire', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(24, 'fonctionnaires.management', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(25, 'fonctionnaires.view', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(26, 'fonctionnaires.create', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(27, 'fonctionnaires.edit', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(28, 'fonctionnaires.delete', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(29, 'fonctionnaires.informations', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(30, 'fonctionnaires.mutations', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(31, 'fonctionnaires.positions', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(32, 'fonctionnaires.conges', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(33, 'fonctionnaires.certificats', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(34, 'fonctionnaires.greves', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(35, 'documents.search', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(36, 'users.view', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(37, 'users.create', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(38, 'users.edit', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(39, 'users.delete', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(40, 'roles.view', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(41, 'roles.create', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(42, 'roles.edit', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(43, 'roles.delete', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(44, 'activity-logs.view', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(45, 'retraites.view', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(46, 'retraites.create', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(47, 'retraites.edit', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(48, 'retraites.delete', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(49, 'retraites.validate', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(50, 'retraites.auto-create', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(51, 'stages.view', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(52, 'stages.create', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(53, 'stages.edit', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(54, 'stages.delete', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(55, 'stages.attestation', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(56, 'stages.export', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(57, 'stages.manage-ecoles', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(58, 'stages.manage-options', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(59, 'stages.manage-encadrants', 'web', '2025-06-10 09:52:00', '2025-06-10 09:52:00'),
(60, 'greves.view', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(61, 'greves.create', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(62, 'greves.edit', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(63, 'greves.delete', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(64, 'batch-print.view', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(65, 'batch-print.attestations', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(66, 'batch-print.conge-decisions', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(67, 'statistics.ai-analyses', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48'),
(68, 'administration.parameters', 'web', '2025-06-12 23:21:08', '2025-06-12 23:21:08'),
(69, 'cadres.view', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(70, 'cadres.create', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(71, 'cadres.edit', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(72, 'cadres.delete', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(73, 'cadres.export', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(74, 'formations.categories-formation', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(75, 'formations.nom-formation-sanitaire', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(76, 'documents.export-conges', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(77, 'documents.export-greves', 'web', '2025-07-17 01:20:42', '2025-07-17 01:20:42'),
(78, 'fonctionnaires.import', 'web', '2025-07-17 01:32:16', '2025-07-17 01:32:16'),
(79, 'fonctionnaires.export', 'web', '2025-07-17 01:32:16', '2025-07-17 01:32:16'),
(80, 'formations.view', 'web', '2025-07-17 01:32:16', '2025-07-17 01:32:16'),
(81, 'formations.create', 'web', '2025-07-17 01:32:16', '2025-07-17 01:32:16'),
(82, 'formations.edit', 'web', '2025-07-17 01:32:16', '2025-07-17 01:32:16'),
(83, 'formations.delete', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(84, 'stages.manage-intitule-formations', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(85, 'conges.view', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(86, 'conges.create', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(87, 'conges.edit', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(88, 'conges.delete', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(89, 'conges.decisions', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(90, 'mutations.view', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(91, 'mutations.create', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(92, 'mutations.edit', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(93, 'mutations.delete', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(94, 'documents.note-service', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(95, 'statistics.view', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(96, 'statistics.detailed', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(97, 'statistics.hr', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(98, 'parametrage.specialite-grade', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(99, 'parametrage.type-categorie-formation', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(100, 'parametrage.niveau-categorie-formation', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(101, 'parametrage.types-conges', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(102, 'parametrage.type-mutations', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17'),
(103, 'parametrage.certificats', 'web', '2025-07-17 01:32:17', '2025-07-17 01:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(2, 'En Activité', 'نشيط', '2025-01-10 13:51:56', '2025-02-12 13:19:18'),
(3, 'suspension', 'متوقف', '2025-03-07 17:12:48', '2025-07-07 12:20:30'),
(4, 'Déces', 'وفاة', '2025-03-19 16:31:11', '2025-03-19 16:31:11'),
(5, 'Mise en disponibilité (3 ans maximum renouvelé une fois)', 'الاحالة على الاستيداع(لاتتعدى 3 سنوات وتجدد مرة واحدة)', '2025-03-19 16:37:09', '2025-03-19 16:47:03'),
(6, 'détachement', 'الالحاق', '2025-03-19 16:49:26', '2025-03-19 16:49:26'),
(7, 'disponibilité prononcée', 'التوقيف الحتمي', '2025-03-19 16:55:24', '2025-03-19 16:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `position_historiques`
--

CREATE TABLE `position_historiques` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED DEFAULT NULL,
  `ancien_position_id` bigint UNSIGNED DEFAULT NULL,
  `nouveaux_position_id` bigint UNSIGNED DEFAULT NULL,
  `date_cessation_service` date DEFAULT NULL,
  `date_prise_en_service` date DEFAULT NULL,
  `remarque` text COLLATE utf8mb4_unicode_ci,
  `date_note` date DEFAULT NULL,
  `ref_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichiers_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_certificate_id` bigint UNSIGNED DEFAULT NULL,
  `type_conge_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_historiques`
--

INSERT INTO `position_historiques` (`id`, `fonctionnaire_id`, `ancien_position_id`, `nouveaux_position_id`, `date_cessation_service`, `date_prise_en_service`, `remarque`, `date_note`, `ref_note`, `fichiers_notes`, `type`, `type_certificate_id`, `type_conge_id`, `created_at`, `updated_at`) VALUES
(10, 15, 2, 3, '2024-11-08', NULL, NULL, '2024-11-08', 'QER', NULL, 'conseildisciplinaire', NULL, NULL, '2025-06-24 07:15:15', '2025-06-24 07:15:15'),
(14, 15, 3, 6, '2025-07-14', '2025-07-14', 'hg', '2025-07-14', 'H', NULL, 'détachement', NULL, NULL, '2025-07-14 15:47:57', '2025-07-14 15:47:57'),
(15, 15, 6, 5, '2025-08-08', '2025-08-08', NULL, '2025-08-08', 'JH', NULL, 'mise_en_disponibilite', NULL, NULL, '2025-07-14 15:53:42', '2025-07-14 15:53:42'),
(16, 21, 5, 2, '2025-07-15', '2025-07-15', NULL, '2025-07-15', 'NB', NULL, NULL, NULL, NULL, '2025-07-15 15:30:03', '2025-07-15 15:30:03'),
(17, 15, 5, 2, '2025-08-08', '2025-08-08', NULL, '2025-08-08', 'K', NULL, NULL, NULL, NULL, '2025-07-15 15:30:57', '2025-07-15 15:30:57'),
(18, 16, 7, 2, '2025-12-12', '2025-12-12', NULL, '2025-12-12', 'J', 'fichiers_notes/6rvym1gKGTH4fbI6RH63zpYX6dghSWSpj27mQuWZ.pdf', NULL, 1, 1, '2025-07-15 15:31:40', '2025-07-16 16:52:17'),
(19, 16, 2, 6, '2025-12-12', '2025-01-01', NULL, '2025-01-01', 'KJ', 'fichiers_notes/rxcqHxeoFsLk2N2xk9kuEaMq05tLtyNsI8qk02k4.pdf', 'détachement', 1, 1, '2025-07-16 16:52:53', '2025-07-16 17:02:27'),
(20, 16, 6, 7, '2025-12-12', '2025-12-12', NULL, '2025-12-12', 'L', 'fichiers_notes/cYhrxI3kLUK1hbJVBBRRExIyrcjyMhdsqgLHEa5F.pdf', 'mise_en_disponibilite', NULL, NULL, '2025-07-16 17:05:01', '2025-07-16 17:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'Tanger-Tétouan-Al Hoceïma', 'طنجة - تطوان - الحسيمة', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(2, 'Oriental', 'الشرق', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(3, 'Fès-Meknès', 'فاس - مكناس', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(4, 'Rabat-Salé-Kénitra', 'الرباط - سلا - القنيطرة', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(5, 'Béni Mellal-Khénifra', 'بني ملال - خنيفرة', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(6, 'Casablanca-Settat', 'الدار البيضاء - سطات', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(7, 'Marrakech-Safi', 'مراكش - آسفي', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(8, 'Drâa-Tafilalet', 'درعة - تافيلالت', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(9, 'Souss-Massa', 'سوس - ماسة', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(10, 'Guelmim-Oued Noun', 'كلميم - واد نون', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(11, 'Laâyoune-Sakia El Hamra', 'العيون - الساقية الحمراء', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(12, 'Dakhla-Oued Ed-Dahab', 'الداخلة - وادي الذهب', '2024-12-26 16:15:38', '2024-12-26 16:15:38'),
(14, 'Fès-Meknès', 'فاس مكناس', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(15, 'Rabat-Salé-Kénitra', 'الرباط سلا القنيطرة', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(16, 'Casablanca-Settat', 'الدار البيضاء سطات', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(17, 'Marrakech-Safi', 'مراكش آسفي', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(18, 'Tanger-Tétouan-Al Hoceïma', 'طنجة تطوان الحسيمة', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(19, 'Oriental', 'الشرق', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(20, 'Souss-Massa', 'سوس ماسة', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(21, 'Drâa-Tafilalet', 'درعة تافيلالت', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(22, 'Béni Mellal-Khénifra', 'بني ملال خنيفرة', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(23, 'Guelmim-Oued Noun', 'كلميم واد نون', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(24, 'Laâyoune-Sakia El Hamra', 'العيون الساقية الحمراء', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(25, 'Dakhla-Oued Ed-Dahab', 'الداخلة وادي الذهب', '2025-05-24 14:37:32', '2025-05-24 14:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `relicats`
--

CREATE TABLE `relicats` (
  `id` bigint NOT NULL,
  `fonctionnaire_id` int NOT NULL,
  `type_conge_id` int NOT NULL,
  `nbr_jours_disponibles` int NOT NULL,
  `date_conge` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relicats`
--

INSERT INTO `relicats` (`id`, `fonctionnaire_id`, `type_conge_id`, `nbr_jours_disponibles`, `date_conge`, `created_at`, `updated_at`) VALUES
(2, 12, 1, 22, '2025-06-01', '2025-06-07 15:50:00', '2025-06-07 15:50:00'),
(3, 12, 3, 5, '2025-06-01', '2025-06-07 16:13:53', '2025-06-07 16:13:53'),
(4, 8, 1, 15, '2025-07-06', '2025-07-06 17:14:21', '2025-07-06 17:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `retirement_settings`
--

CREATE TABLE `retirement_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retirement_settings`
--

INSERT INTO `retirement_settings` (`id`, `key`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'retirement_age_limit', '63', 'Âge limite de retraite en années', '2025-07-05 15:42:04', '2025-07-06 11:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `retraites`
--

CREATE TABLE `retraites` (
  `id` bigint UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint UNSIGNED NOT NULL,
  `type_retraite` enum('limite_age','anticipee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'limite_age',
  `date_retraite` date NOT NULL,
  `date_effet` date DEFAULT NULL,
  `age_retraite` decimal(4,1) DEFAULT NULL,
  `annees_service` decimal(4,1) DEFAULT NULL,
  `motif` text COLLATE utf8mb4_unicode_ci,
  `statut` enum('propose','valide','rejete','effectue') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'propose',
  `remarques` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `validated_by` bigint UNSIGNED DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retraites`
--

INSERT INTO `retraites` (`id`, `fonctionnaire_id`, `type_retraite`, `date_retraite`, `date_effet`, `age_retraite`, `annees_service`, `motif`, `statut`, `remarques`, `created_by`, `validated_by`, `validated_at`, `created_at`, `updated_at`) VALUES
(4, 16, 'anticipee', '2024-05-05', NULL, 48.7, 28.4, 'DOSSIER MEDICALE', 'propose', NULL, 4, NULL, NULL, '2025-06-24 07:26:49', '2025-06-24 07:26:49'),
(11, 15, 'limite_age', '2025-07-05', NULL, 55.5, 16.5, 'Retraite automatique - limite d\'âge atteinte (55 ans)', 'propose', NULL, 4, NULL, NULL, '2025-07-05 16:08:31', '2025-07-05 16:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(2, 'RH Manager', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(3, 'Utilisateur', 'web', '2025-05-24 14:37:31', '2025-05-24 14:37:31'),
(4, 'Stage RH', 'web', '2025-06-10 09:58:01', '2025-06-10 09:58:01'),
(5, 'conge', 'web', '2025-06-23 20:46:03', '2025-06-23 20:46:03'),
(8, 'saisiefonctionnaires', 'web', '2025-07-22 12:09:04', '2025-07-22 12:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(1, 2),
(2, 2),
(3, 2),
(8, 2),
(9, 2),
(10, 2),
(12, 2),
(13, 2),
(14, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(64, 5),
(65, 5),
(66, 5),
(24, 8),
(25, 8),
(26, 8),
(27, 8),
(28, 8),
(29, 8),
(30, 8),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(78, 8),
(79, 8);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(24, 'Radiologie', 'الأشعة', '2025-01-09 08:39:30', '2025-01-09 08:39:30'),
(25, 'Urgence', 'المستعجلات', '2025-03-19 16:09:36', '2025-03-19 16:09:36'),
(26, 'Ressources humaines', 'المواد البشرية', '2025-03-19 16:12:13', '2025-03-19 16:12:13'),
(27, 'Plannification Famililaes', 'تنظيم الحمل', '2025-03-19 16:12:55', '2025-03-19 16:12:55'),
(28, 'SAA', 'الاستقبال والقبول', '2025-03-19 16:13:16', '2025-03-19 16:13:16'),
(29, 'La Caisse', 'تحصيل المداخيل', '2025-03-19 16:13:38', '2025-03-19 16:13:38'),
(30, 'pédiatire', 'الاطفال', '2025-03-19 16:13:55', '2025-03-19 16:13:55'),
(31, 'maternité', 'الولادات', '2025-03-19 16:14:17', '2025-03-19 16:14:17'),
(32, 'Médecine génerale', 'Médecine génerale', '2025-05-27 11:15:32', '2025-05-27 11:15:32'),
(33, 'PARC AUTO DELEGATION SANTE FES', 'PARC AUTO DELEGATION SANTE FES', '2025-05-27 13:38:51', '2025-05-27 13:38:51'),
(34, 'AIDE SOIGNANT', 'مساعد علاج', '2025-06-23 21:43:26', '2025-06-23 21:43:26'),
(35, 'AIDE OPERATOIRE', 'مساعد عمليات', '2025-06-23 21:43:58', '2025-06-23 21:43:58'),
(36, 'GESTION FINANCIER', 'تسيير مالي', '2025-06-23 21:44:52', '2025-06-23 21:44:52'),
(37, 'CHIRURGIE TRAUMATOLOGIE', 'جراحة العظام', '2025-06-23 21:45:40', '2025-06-23 21:45:40'),
(38, 'INFORMATIQUE', 'معلوميات', '2025-06-23 21:48:53', '2025-06-23 21:48:53'),
(39, 'Laboratoire', 'المختبر', '2025-07-14 13:36:17', '2025-07-14 13:36:17'),
(40, 'Sans', 'بدون', '2025-07-24 11:42:34', '2025-07-24 11:42:34'),
(41, 'Aide soignant', 'مساعد علاج', '2025-07-24 11:58:00', '2025-07-24 11:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eSTXS9CQYePiXL70sp4p7rFmP6rx7H65brQukofl', 4, '192.168.100.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWHR6Y0FVTXNuWXNVOVVrcks1U3BHTU42VFFwMHZjc1lvZzAzOGxHMSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzE5Mi4xNjguMTAwLjY2Ojg4NzYiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2MDoiaHR0cDovLzE5Mi4xNjguMTAwLjY2Ojg4NzYvZm9uY3Rpb25uYWlyZXM/c2VhcmNoX3Rlcm09Ujk4OTE1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1755097313);

-- --------------------------------------------------------

--
-- Table structure for table `specialites`
--

CREATE TABLE `specialites` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_cadres_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialite_grades`
--

CREATE TABLE `specialite_grades` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialite_grades`
--

INSERT INTO `specialite_grades` (`id`, `nom`, `nom_arabe`, `grade_id`, `created_at`, `updated_at`) VALUES
(5, 'audit', 'الافتحاص', 1, '2025-01-24 18:36:44', '2025-01-24 18:36:44'),
(6, 'gestion ressource humaine', 'الموارد البشرية', 1, '2025-01-24 18:41:44', '2025-01-24 18:41:44'),
(7, 'gestion entreprise', 'تسيير مقاولات', 3, '2025-01-24 18:45:11', '2025-01-24 18:45:11'),
(8, 'Chirurgie viscérale', 'جراحة الباطنية', 1, '2025-03-19 17:09:11', '2025-03-19 17:09:11'),
(10, 'Infirmier(ere) Polyvalent -Deuxieme grade', 'ممرض(ة) متعدد التخصصات  - درجة التانية', 15, '2025-03-19 17:20:17', '2025-07-24 13:16:50'),
(11, 'Viscerale', 'جراحة الباطنية', 6, '2025-03-19 18:06:01', '2025-03-19 18:06:01'),
(12, 'Médecin géneraliste hors grade', 'طبيب عام خارج سلم', 11, '2025-05-27 10:53:08', '2025-07-24 12:55:05'),
(14, 'Adjoint technique 2 grade', 'مساعد تقني الدرجة الثانية', 17, '2025-05-27 13:45:35', '2025-08-13 12:36:52'),
(15, 'INFORMATIQUE', 'معلوميات', 18, '2025-06-23 20:54:50', '2025-06-23 20:54:50'),
(16, 'LABORATOIRE', 'مختبر', 15, '2025-06-23 20:57:42', '2025-06-23 20:57:42'),
(17, 'URGENTISTE', 'مستعجلات', 14, '2025-06-23 20:58:14', '2025-06-23 20:58:14'),
(18, 'PHYISQUE NUCLEAIRE', 'فيزياء نووية', 19, '2025-06-23 21:01:54', '2025-06-23 21:01:54'),
(19, 'GYNECOLOGIE', 'الولادة', 5, '2025-06-23 21:02:52', '2025-06-23 21:02:52'),
(20, 'CHIRURGIE TRAUMATOLOGIE', 'جراحة العظام', 5, '2025-06-23 21:03:46', '2025-06-23 21:03:46'),
(21, 'PNEUMOLOGIE', 'طب الامراض الصدرية', 6, '2025-06-23 21:04:26', '2025-06-23 21:04:47'),
(22, 'AIDE SOIGNANT', 'مساعد علاج', 21, '2025-06-23 21:10:17', '2025-06-23 21:10:17'),
(23, 'CHAFFEUR AMBULANCIER 4 grade', 'سائق الاسعاف ونقل صحي الدرجة الزابغة', 22, '2025-06-23 21:12:46', '2025-07-24 12:52:48'),
(24, 'INFORMATIQUE', 'معلوميات', 2, '2025-06-29 12:57:43', '2025-06-29 12:57:43'),
(25, 'sd', 'sd', 1, '2025-07-17 00:23:32', '2025-07-17 00:23:32'),
(26, 'Sport hors grade', 'الرياضة  خارج السلم', 11, '2025-07-22 13:12:53', '2025-07-24 13:07:30'),
(30, 'Infirmier Auxilaire 1er grade', 'ممرض مساعد درجة الاولى', 28, '2025-07-24 12:56:56', '2025-07-24 12:56:56'),
(31, 'Technicien hygiène milieux -Exceptionnel', 'تقني البيئة - الاستنائية', 36, '2025-07-24 13:13:48', '2025-07-24 13:13:48'),
(32, 'Infirmier Auxilaire -Principale', 'ممرض مساغد -الاسثتنائية', 30, '2025-07-24 13:16:05', '2025-07-24 13:16:05'),
(33, 'Radiologie -Princiaple', 'الاشعة -الاساسي', 37, '2025-07-24 13:24:03', '2025-07-24 13:24:03'),
(34, 'Radiologie -premier grade', 'Radiologie -premier grade', 37, '2025-07-24 13:25:45', '2025-07-24 13:25:45'),
(35, 'Sage femme 1er grade', 'قابلة درجة الاولى', 35, '2025-08-13 11:57:41', '2025-08-13 11:57:41'),
(36, 'Sage Femme Exceptionnel', 'مولدة الاسثتنائية', 32, '2025-08-13 11:58:02', '2025-08-13 11:58:02'),
(37, 'Sage femme 1er grade', 'قابلة درجة الاولى', 14, '2025-08-13 11:58:24', '2025-08-13 11:58:24'),
(39, 'Adjoint technique 3 grade chauffeur', 'مساعد تقني الدرجة الثالتة سائق', 41, '2025-08-13 12:45:15', '2025-08-13 12:45:15'),
(40, 'Infirmier exceptionnel -polyvalent', 'ممرض  درجة الاسثتنائية', 32, '2025-08-13 12:48:52', '2025-08-13 12:48:52'),
(41, 'Infirmier 1 er Garde -polyvalent', 'ممرض درجة الاولى متعدد تحصصات', 14, '2025-08-13 12:50:37', '2025-08-13 12:50:37'),
(42, 'Infirmier Auxilaire 2 éme grade', 'Infirmier Auxilaire 2 éme grade', 43, '2025-08-13 13:01:38', '2025-08-13 13:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institut_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `hierarchie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avis` text COLLATE utf8mb4_unicode_ci,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichier_scanner_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichier_scanner_attestation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_attestation` enum('traité','pas en cours','en cours') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en cours',
  `cadre` enum('médical','administratif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cadre_stage_id` bigint UNSIGNED DEFAULT NULL,
  `type_stage` enum('volontaire','formation') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_stage_id` bigint UNSIGNED DEFAULT NULL,
  `ecole_id` bigint UNSIGNED NOT NULL,
  `option_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `formation_sanitaire_id` bigint UNSIGNED NOT NULL,
  `encadrant_id` bigint UNSIGNED NOT NULL,
  `intitule_formation_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `nom_prenom`, `cin`, `institut_details`, `duree`, `date_debut`, `date_fin`, `hierarchie`, `avis`, `fichier`, `fichier_scanner_note`, `fichier_scanner_attestation`, `statut_attestation`, `cadre`, `cadre_stage_id`, `type_stage`, `type_stage_id`, `ecole_id`, `option_id`, `service_id`, `formation_sanitaire_id`, `encadrant_id`, `intitule_formation_id`, `created_at`, `updated_at`) VALUES
(8, 's', 'az', 'AZSAZ', 30, '2025-08-01', '2025-08-31', 'AAZE', NULL, NULL, NULL, NULL, 'en cours', 'administratif', NULL, 'volontaire', NULL, 9, 14, 37, 18, 9, 1, '2025-07-14 13:44:16', '2025-07-14 13:44:16'),
(9, 'AZE', 'A', 'Axcvxcvxcvxc', 39, '2025-01-01', '2025-09-09', 'AZE', NULL, NULL, NULL, NULL, 'en cours', 'médical', NULL, 'volontaire', 1, 10, 16, 38, 18, 8, 1, '2025-07-14 14:07:15', '2025-07-14 18:51:08'),
(10, 'ALAOUI', 'CG998989', 'AZAZEAZEAZE', 40, '2025-01-01', '2025-02-01', 'QZDD', NULL, NULL, NULL, NULL, 'en cours', 'médical', NULL, 'volontaire', 5, 9, 13, 35, 20, 5, 3, '2025-07-14 15:03:33', '2025-07-14 15:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `statut_positionaires`
--

CREATE TABLE `statut_positionaires` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_categorie_formations`
--

CREATE TABLE `type_categorie_formations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_formation_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_categorie_formations`
--

INSERT INTO `type_categorie_formations` (`id`, `nom`, `nom_arabe`, `categorie_formation_id`, `created_at`, `updated_at`) VALUES
(2, 'rems', 'شبكة مؤسسات صحية الاجتماعية', 3, '2025-02-03 18:25:44', '2025-02-03 18:26:03'),
(3, 'hopital', 'مستشفى', 4, '2025-02-03 18:52:45', '2025-02-03 18:52:45'),
(4, 'ٌRESSP', 'شبكة مؤسسات الرعاية الصحية  الاولية', 2, '2025-02-06 10:28:27', '2025-03-19 17:35:01'),
(5, 'Centre référence et précoce de cancer', 'مركز المرجعي لعلاج سرطان عنق رحم', 5, '2025-03-19 17:50:35', '2025-03-19 17:50:35'),
(7, 'délegation Fes', 'مندوبية فاس', 3, '2025-05-27 12:31:50', '2025-05-27 12:31:50'),
(8, 'régionaleE', 'جهوي', 4, '2025-06-23 21:51:39', '2025-07-17 01:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `type_certificates`
--

CREATE TABLE `type_certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_certificates`
--

INSERT INTO `type_certificates` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'a long terme', 'طويلة الامد', '2025-01-10 14:53:03', '2025-01-10 14:53:03'),
(3, 'Court terme', 'قصيرة المدة', '2025-03-19 16:27:27', '2025-03-19 16:27:27'),
(4, 'Moyenne Terme', 'متوسطة المدة', '2025-03-19 16:27:46', '2025-03-19 16:27:46'),
(5, 'Enceinte', 'حمل', '2025-03-19 16:40:26', '2025-03-19 16:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `type_conges`
--

CREATE TABLE `type_conges` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jours` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_conges`
--

INSERT INTO `type_conges` (`id`, `nom`, `nom_arabe`, `jours`, `created_at`, `updated_at`) VALUES
(1, 'administratif', 'ادارية', 22, '2025-01-10 14:16:03', '2025-01-10 15:16:59'),
(2, 'recupération', 'تعويض عن عمل', 0, '2025-01-10 14:16:28', '2025-01-10 14:16:28'),
(3, 'exceptionnel', 'اسثتنائية', 10, '2025-01-10 14:16:49', '2025-01-10 14:16:49'),
(4, 'mariage', 'زواج', 10, '2025-01-10 14:17:04', '2025-01-10 15:16:33'),
(5, 'ALHAJ', 'الحج', 30, '2025-03-19 16:26:22', '2025-03-19 16:26:22'),
(6, 'Congé sans sole', 'رخصة بدون اجر', 0, '2025-03-19 16:28:31', '2025-03-19 16:28:31'),
(7, 'Congé Maternité', 'رخصة الولادة', 90, '2025-03-19 16:39:05', '2025-03-19 16:39:05'),
(8, 'Congé de paternité', 'رخصة الابوة', 11, '2025-03-19 16:45:32', '2025-03-19 16:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `type_mutations`
--

CREATE TABLE `type_mutations` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_mutations`
--

INSERT INTO `type_mutations` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'RC', 'التحاق زوج او الزوجة', '2025-02-12 13:33:35', '2025-02-12 13:33:35'),
(2, 'local', 'محلية', '2025-02-12 13:33:55', '2025-02-12 13:33:55'),
(3, 'detachement', 'الحاق', '2025-02-12 13:34:23', '2025-02-12 13:34:23'),
(4, 'recrutement', 'توظيف', '2025-02-12 13:35:57', '2025-02-12 13:35:57'),
(5, 'Mutation Régionale', 'حركة الجهوية', '2025-03-19 16:16:06', '2025-03-19 16:16:06'),
(6, 'Mutation national', 'الحركة الوطنية', '2025-03-19 16:16:55', '2025-03-19 16:16:55'),
(7, 'Raison de santé', 'للاسباب صحية', '2025-03-19 16:17:40', '2025-03-19 16:17:40'),
(8, 'Mise a la disposition', 'الوضع رهن اشارة', '2025-03-19 16:18:13', '2025-03-19 16:18:13'),
(9, 'Formation/Stage de formation', 'تكوين او تدريب', '2025-03-19 16:19:58', '2025-03-19 16:19:58'),
(10, 'Poste de responsabilité', 'تعيين منصب المسؤولية', '2025-03-19 16:20:47', '2025-03-19 16:20:47'),
(11, 'Provisoire', 'مؤقت', '2025-03-19 16:21:39', '2025-03-19 16:21:39'),
(12, 'interne hors mouvement', 'داخلية خارج حركة', '2025-05-27 10:55:43', '2025-05-27 10:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `type_stages`
--

CREATE TABLE `type_stages` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_stages`
--

INSERT INTO `type_stages` (`id`, `nom`, `nom_arabe`, `actif`, `created_at`, `updated_at`) VALUES
(1, 'volontaire', 'طوعية', 1, '2025-01-10 15:27:17', '2025-01-10 15:27:17'),
(2, 'formation', 'تكوين', 1, '2025-01-10 15:27:39', '2025-01-10 15:27:52'),
(3, 'equivalence', 'معادلة', 1, '2025-01-10 15:28:30', '2025-01-10 15:28:30'),
(4, 'aze', 'aze', 1, '2025-06-13 12:48:39', '2025-06-13 12:48:39'),
(5, 'KKKKKK', 'HH', 1, '2025-07-14 15:02:57', '2025-07-14 15:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin User', 'admin@test.com', NULL, '$2y$12$z2aaYodSMtbV.qaVny4RT./knieVRw5AY/0s.UqMgQsfzTwmcW4B2', 'UVD9x1uTEiwjNXDP2dshx6NFGbQEzc390ea63vL4veqmIe0NxnkxSCuAjadf', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(8, 'assiamabrour', 'assiamabrour@gmail.com', NULL, '$2y$12$w9kBmtz7qpqfnjzhTHfUYeLw7eadWaYSe2TJvSLPAuiQV8pjxPJ7G', NULL, '2025-07-15 23:41:50', '2025-07-22 13:14:27'),
(9, 'amalmalih', 'amalmalihm@gmail.com', NULL, '$2y$12$JAcxWSo5dlzCWvcUiZ2zPepQjaed4AaOZi94PK2RdwLULTjQtlYra', NULL, '2025-07-17 00:20:00', '2025-07-24 12:38:10'),
(10, 'fayzamouhib', 'fayzamouhib@gamil.com', NULL, '$2y$12$Ooq9hSrJOyy4eKskAMRjeeoOsY1H45QXiacdAoEq/Hoc87Z8lJmC6', NULL, '2025-07-17 01:46:14', '2025-07-24 12:37:06'),
(11, 'soukaina', 'soukaina2025@gmail.com', NULL, '$2y$12$qqKUQZ2qYPQzYv/L/m0Wo.Ke0LF.mR3vy0VI3.GDtgpT/gJ76/RO.', NULL, '2025-07-22 12:31:54', '2025-07-22 12:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_arabe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nom`, `nom_arabe`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Tanger', 'طنجة', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(2, 'Tétouan', 'تطوان', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(3, 'Al Hoceïma', 'الحسيمة', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(4, 'M\'diq', 'المضيق', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(5, 'Fnideq', 'الفنيدق', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(6, 'Chefchaouen', 'شفشاون', 1, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(7, 'Oujda', 'وجدة', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(8, 'Nador', 'الناظور', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(9, 'Berkane', 'بركان', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(10, 'Jerada', 'جرادة', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(11, 'Guercif', 'جرسيف', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(12, 'Taourirt', 'تاوريرت', 2, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(13, 'Fès', 'فاس', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(14, 'Meknès', 'مكناس', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(15, 'Ifrane', 'إفران', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(16, 'Sefrou', 'صفرو', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(17, 'Boulemane', 'بولمان', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(18, 'El Hajeb', 'الحاجب', 3, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(19, 'Rabat', 'الرباط', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(20, 'Salé', 'سلا', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(21, 'Kénitra', 'القنيطرة', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(22, 'Témara', 'تمارة', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(23, 'Sidi Slimane', 'سيدي سليمان', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(24, 'Sidi Kacem', 'سيدي قاسم', 4, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(25, 'Béni Mellal', 'بني ملال', 5, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(26, 'Khénifra', 'خنيفرة', 5, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(27, 'Azilal', 'أزيلال', 5, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(28, 'Fquih Ben Salah', 'الفقيه بن صالح', 5, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(29, 'Kasba Tadla', 'قصبة تادلة', 5, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(30, 'Casablanca', 'الدار البيضاء', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(31, 'Settat', 'سطات', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(32, 'Mohammédia', 'المحمدية', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(33, 'Berrechid', 'برشيد', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(34, 'El Jadida', 'الجديدة', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(35, 'Sidi Bennour', 'سيدي بنور', 6, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(36, 'Marrakech', 'مراكش', 7, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(37, 'Safi', 'آسفي', 7, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(38, 'Essaouira', 'الصويرة', 7, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(39, 'Youssoufia', 'اليوسفية', 7, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(40, 'Chichaoua', 'شيشاوة', 7, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(41, 'Errachidia', 'الرشيدية', 8, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(43, 'Zagora', 'زاكورة', 8, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(44, 'Tinghir', 'تنغير', 8, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(45, 'Midelt', 'ميدلت', 8, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(46, 'Agadir', 'أكادير', 9, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(47, 'Taroudant', 'تارودانت', 9, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(48, 'Tiznit', 'تيزنيت', 9, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(49, 'Inezgane', 'إنزكان', 9, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(50, 'Aït Melloul', 'أيت ملول', 9, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(51, 'Guelmim', 'كلميم', 10, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(52, 'Tan-Tan', 'طانطان', 10, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(53, 'Sidi Ifni', 'سيدي إفني', 10, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(54, 'Assa', 'آسا', 10, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(55, 'Laâyoune', 'العيون', 11, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(56, 'Boujdour', 'بوجدور', 11, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(57, 'Es-Semara', 'السمارة', 11, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(58, 'Tarfaya', 'طرفاية', 11, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(59, 'Dakhla', 'الداخلة', 12, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(60, 'Aousserd', 'أوسرد', 12, '2024-12-26 17:08:36', '2024-12-26 17:08:36'),
(63, 'Fès', 'فاس', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(65, 'Taza', 'تازة', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(66, 'Sefrou', 'صفرو', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(67, 'El Hajeb', 'الحاجب', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(68, 'Ifrane', 'إفران', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(69, 'Moulay Yacoub', 'مولاي يعقوب', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(70, 'Boulemane', 'بولمان', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(71, 'Taounate', 'تاونات', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(72, 'Khénifra', 'خنيفرة', 1, '2025-05-24 14:37:32', '2025-05-24 14:37:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `affectations`
--
ALTER TABLE `affectations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affectations_fonctionnaire_id_foreign` (`fonctionnaire_id`),
  ADD KEY `affectations_formation_arrondissement_commune_id_foreign` (`formation_arrondissement_commune_id`),
  ADD KEY `affectations_categorie_formation_id_foreign` (`categorie_formation_id`),
  ADD KEY `affectations_service_id_foreign` (`service_id`),
  ADD KEY `affectations_fonction_id_foreign` (`fonction_id`);

--
-- Indexes for table `archive_fichiers`
--
ALTER TABLE `archive_fichiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_fichiers_fonctionnaires_id_foreign` (`fonctionnaires_id`);

--
-- Indexes for table `arrondissement_communes`
--
ALTER TABLE `arrondissement_communes`
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
-- Indexes for table `cadres`
--
ALTER TABLE `cadres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadres_categorie_cadre_id_foreign` (`categorie_cadre_id`);

--
-- Indexes for table `cadres_stages`
--
ALTER TABLE `cadres_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie_cadres`
--
ALTER TABLE `categorie_cadres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_cadres_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `categorie_formations`
--
ALTER TABLE `categorie_formations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_type_certificate_id_foreign` (`type_certificate_id`),
  ADD KEY `certificates_fonctionnaire_id_foreign` (`fonctionnaire_id`);

--
-- Indexes for table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conges_demande_conges_id_foreign` (`demande_conges_id`);

--
-- Indexes for table `conge_availabilities`
--
ALTER TABLE `conge_availabilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conge_availabilities_fonctionnaire_id_type_conge_id_year_unique` (`fonctionnaire_id`,`type_conge_id`,`year`),
  ADD KEY `conge_availabilities_type_conge_id_foreign` (`type_conge_id`);

--
-- Indexes for table `conge_decisions`
--
ALTER TABLE `conge_decisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conge_decisions_type_conge_id_foreign` (`type_conge_id`),
  ADD KEY `conge_decisions_fonctionnaire_id_type_conge_id_index` (`fonctionnaire_id`,`type_conge_id`),
  ADD KEY `conge_decisions_date_decision_index` (`date_decision`),
  ADD KEY `conge_decisions_statut_index` (`statut`);

--
-- Indexes for table `demande_conges`
--
ALTER TABLE `demande_conges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demande_conges_fonctionnaire_id_foreign` (`fonctionnaire_id`),
  ADD KEY `demande_conges_type_conge_id_foreign` (`type_conge_id`);

--
-- Indexes for table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encadrants`
--
ALTER TABLE `encadrants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etat_prise_cesations`
--
ALTER TABLE `etat_prise_cesations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etat_prise_cesations_fonctionnaire_id_foreign` (`fonctionnaire_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fichiers_fonctionnaires`
--
ALTER TABLE `fichiers_fonctionnaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fichiers_fonctionnaires_fonctionnaire_id_foreign` (`fonctionnaire_id`);

--
-- Indexes for table `fonctionnaires`
--
ALTER TABLE `fonctionnaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fonctionnaires_fonction_id_foreign` (`fonction_id`),
  ADD KEY `fonctionnaires_nom_formation_sanitaire_id_foreign` (`nom_formation_sanitaire_id`),
  ADD KEY `fonctionnaires_service_id_foreign` (`service_id`),
  ADD KEY `fonctionnaires_specialite_grade_id_foreign` (`specialite_grade_id`),
  ADD KEY `fonctionnaires_position_id_foreign` (`position_id`),
  ADD KEY `fonctionnaires_type_mutation_foreign` (`type_mutation`);

--
-- Indexes for table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formation_arrondissement_communes`
--
ALTER TABLE `formation_arrondissement_communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_arrondissement_communes_categorie_formation_id_foreign` (`categorie_formation_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_cadres`
--
ALTER TABLE `grade_cadres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_cadres_cadre_id_foreign` (`cadre_id`);

--
-- Indexes for table `greves`
--
ALTER TABLE `greves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `greves_fonctionnaire_id_foreign` (`fonctionnaire_id`);

--
-- Indexes for table `historique_mutations`
--
ALTER TABLE `historique_mutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_mutations_fonctionnaire_id_foreign` (`fonctionnaire_id`),
  ADD KEY `historique_mutations_type_mutation_id_foreign` (`type_mutation_id`),
  ADD KEY `historique_mutations_formation_sanitaire_origine_id_foreign` (`formation_sanitaire_origine_id`),
  ADD KEY `historique_mutations_formation_sanitaire_destination_id_foreign` (`formation_sanitaire_destination_id`),
  ADD KEY `historique_mutations_ancien_service_id_foreign` (`ancien_service_id`),
  ADD KEY `historique_mutations_nouveau_service_id_foreign` (`nouveau_service_id`),
  ADD KEY `historique_mutations_ancien_fonction_id_foreign` (`ancien_fonction_id`),
  ADD KEY `historique_mutations_nouveau_fonction_id_foreign` (`nouveau_fonction_id`),
  ADD KEY `historique_mutations_ancien_specialite_id_foreign` (`ancien_specialite_id`),
  ADD KEY `historique_mutations_nouveau_specialite_id_foreign` (`nouveau_specialite_id`);

--
-- Indexes for table `historique_populations`
--
ALTER TABLE `historique_populations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_populations_nom_formation_sanitaire_id_foreign` (`nom_formation_sanitaire_id`);

--
-- Indexes for table `intitule_formations`
--
ALTER TABLE `intitule_formations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mutations`
--
ALTER TABLE `mutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutations_type_mutation_id_foreign` (`type_mutation_id`),
  ADD KEY `mutations_fonctionnaire_id_foreign` (`fonctionnaire_id`),
  ADD KEY `mutations_old_service_id_foreign` (`old_service_id`),
  ADD KEY `mutations_new_service_id_foreign` (`new_service_id`),
  ADD KEY `mutations_old_fonction_id_foreign` (`old_fonction_id`),
  ADD KEY `mutations_new_fonction_id_foreign` (`new_fonction_id`),
  ADD KEY `mutations_old_categorie_formations_id_foreign` (`old_categorie_formations_id`),
  ADD KEY `mutations_new_categorie_formations_id_foreign` (`new_categorie_formations_id`),
  ADD KEY `mutations_old_arrondissement_communes_id_foreign` (`old_arrondissement_communes_id`),
  ADD KEY `mutations_new_arrondissement_communes_id_foreign` (`new_arrondissement_communes_id`),
  ADD KEY `mutations_old_categorie_cadres_id_foreign` (`old_categorie_cadres_id`),
  ADD KEY `mutations_new_categorie_cadres_id_foreign` (`new_categorie_cadres_id`),
  ADD KEY `mutations_old_grades_id_foreign` (`old_grades_id`),
  ADD KEY `mutations_new_grades_id_foreign` (`new_grades_id`),
  ADD KEY `mutations_old_specialites_id_foreign` (`old_specialites_id`),
  ADD KEY `mutations_new_specialites_id_foreign` (`new_specialites_id`),
  ADD KEY `mutations_old_villes_id_foreign` (`old_villes_id`),
  ADD KEY `mutations_new_villes_id_foreign` (`new_villes_id`);

--
-- Indexes for table `niveau_categorie_formations`
--
ALTER TABLE `niveau_categorie_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveau_categorie_formations_type_categorie_formation_id_foreign` (`type_categorie_formation_id`);

--
-- Indexes for table `nom_formation_sanitaires`
--
ALTER TABLE `nom_formation_sanitaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom_formation_sanitaires_niveau_categorie_formation_id_foreign` (`niveau_categorie_formation_id`),
  ADD KEY `arrondissement_commune_id` (`arrondissement_commune_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_historiques`
--
ALTER TABLE `position_historiques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_historiques_fonctionnaire_id_foreign` (`fonctionnaire_id`),
  ADD KEY `position_historiques_ancien_position_id_foreign` (`ancien_position_id`),
  ADD KEY `position_historiques_nouveaux_position_id_foreign` (`nouveaux_position_id`),
  ADD KEY `position_historiques_type_certificate_id_foreign` (`type_certificate_id`),
  ADD KEY `position_historiques_type_conge_id_foreign` (`type_conge_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relicats`
--
ALTER TABLE `relicats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retirement_settings`
--
ALTER TABLE `retirement_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `retirement_settings_key_unique` (`key`);

--
-- Indexes for table `retraites`
--
ALTER TABLE `retraites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retraites_created_by_foreign` (`created_by`),
  ADD KEY `retraites_validated_by_foreign` (`validated_by`),
  ADD KEY `retraites_type_retraite_statut_index` (`type_retraite`,`statut`),
  ADD KEY `retraites_date_retraite_index` (`date_retraite`),
  ADD KEY `retraites_fonctionnaire_id_type_retraite_index` (`fonctionnaire_id`,`type_retraite`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `specialites`
--
ALTER TABLE `specialites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialites_categorie_cadres_id_foreign` (`categorie_cadres_id`);

--
-- Indexes for table `specialite_grades`
--
ALTER TABLE `specialite_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialite_grades_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_ecole_id_foreign` (`ecole_id`),
  ADD KEY `stages_option_id_foreign` (`option_id`),
  ADD KEY `stages_service_id_foreign` (`service_id`),
  ADD KEY `stages_formation_sanitaire_id_foreign` (`formation_sanitaire_id`),
  ADD KEY `stages_encadrant_id_foreign` (`encadrant_id`),
  ADD KEY `stages_cadre_stage_id_foreign` (`cadre_stage_id`),
  ADD KEY `stages_type_stage_id_foreign` (`type_stage_id`),
  ADD KEY `stages_intitule_formation_id_foreign` (`intitule_formation_id`);

--
-- Indexes for table `statut_positionaires`
--
ALTER TABLE `statut_positionaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_categorie_formations`
--
ALTER TABLE `type_categorie_formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_categorie_formations_categorie_formation_id_foreign` (`categorie_formation_id`);

--
-- Indexes for table `type_certificates`
--
ALTER TABLE `type_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_conges`
--
ALTER TABLE `type_conges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_mutations`
--
ALTER TABLE `type_mutations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_stages`
--
ALTER TABLE `type_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_region_id_foreign` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `affectations`
--
ALTER TABLE `affectations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_fichiers`
--
ALTER TABLE `archive_fichiers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arrondissement_communes`
--
ALTER TABLE `arrondissement_communes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `cadres`
--
ALTER TABLE `cadres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cadres_stages`
--
ALTER TABLE `cadres_stages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorie_cadres`
--
ALTER TABLE `categorie_cadres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categorie_formations`
--
ALTER TABLE `categorie_formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conge_availabilities`
--
ALTER TABLE `conge_availabilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `conge_decisions`
--
ALTER TABLE `conge_decisions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demande_conges`
--
ALTER TABLE `demande_conges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `encadrants`
--
ALTER TABLE `encadrants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `etat_prise_cesations`
--
ALTER TABLE `etat_prise_cesations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fichiers_fonctionnaires`
--
ALTER TABLE `fichiers_fonctionnaires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonctionnaires`
--
ALTER TABLE `fonctionnaires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `formation_arrondissement_communes`
--
ALTER TABLE `formation_arrondissement_communes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade_cadres`
--
ALTER TABLE `grade_cadres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `greves`
--
ALTER TABLE `greves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `historique_mutations`
--
ALTER TABLE `historique_mutations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `historique_populations`
--
ALTER TABLE `historique_populations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intitule_formations`
--
ALTER TABLE `intitule_formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `mutations`
--
ALTER TABLE `mutations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `niveau_categorie_formations`
--
ALTER TABLE `niveau_categorie_formations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nom_formation_sanitaires`
--
ALTER TABLE `nom_formation_sanitaires`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position_historiques`
--
ALTER TABLE `position_historiques`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `relicats`
--
ALTER TABLE `relicats`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retirement_settings`
--
ALTER TABLE `retirement_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retraites`
--
ALTER TABLE `retraites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `specialite_grades`
--
ALTER TABLE `specialite_grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
