-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 02:10 PM
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
-- Database: `applicationrhsante`
--
CREATE database  applicationrhsante;
USE applicationrhsante;
-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(483, 'default', 'Utilisateur créé', 'App\\Models\\User', NULL, 5, 'App\\Models\\User', 4, '{\"roles\":[\"Stage RH\"]}', NULL, '2025-06-10 09:58:57', '2025-06-10 09:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `affectations`
--

CREATE TABLE `affectations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `formation_arrondissement_commune_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_formation_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `fonction_id` bigint(20) UNSIGNED NOT NULL,
  `date_affectation` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_fichiers`
--

CREATE TABLE `archive_fichiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `url_fichier` varchar(255) NOT NULL,
  `observation` text DEFAULT NULL,
  `fonctionnaires_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `arrondissement_communes`
--

CREATE TABLE `arrondissement_communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `ville_id` bigint(11) DEFAULT NULL,
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
(213, 'Hamria', 'الحمرية', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(214, 'Toulal', 'تولال', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(215, 'Zitoune', 'الزيتون', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(216, 'Ouislane', 'ويسلان', 2, '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(217, 'LAHMRYA', 'الحمرية', 14, '2025-05-27 12:47:36', '2025-05-27 12:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:67:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:30:\"administration.tableau-de-bord\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:34:\"administration.statistics-detailed\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:28:\"administration.statistics-hr\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:30:\"administration.user-management\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:36:\"parametrage.arrondissements-communes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:19:\"parametrage.regions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"parametrage.villes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:18:\"parametrage.grades\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:21:\"parametrage.positions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:20:\"parametrage.services\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:25:\"parametrage.type-mutation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:21:\"parametrage.fonctions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:24:\"parametrage.conges-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:29:\"parametrage.certificats-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:24:\"parametrage.stages-types\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:24:\"cadres.categories-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"cadres.cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"cadres.grades-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:25:\"cadres.specialites-cadres\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:30:\"formation.categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:35:\"formation.type-categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:37:\"formation.niveau-categories-formation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:33:\"formation.nom-formation-sanitaire\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:25:\"fonctionnaires.management\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"fonctionnaires.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:21:\"fonctionnaires.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:19:\"fonctionnaires.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:21:\"fonctionnaires.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:27:\"fonctionnaires.informations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:24:\"fonctionnaires.mutations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:24:\"fonctionnaires.positions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:21:\"fonctionnaires.conges\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:26:\"fonctionnaires.certificats\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"fonctionnaires.greves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:16:\"documents.search\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:10:\"users.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:12:\"users.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:10:\"users.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"users.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:10:\"roles.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:12:\"roles.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:10:\"roles.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:12:\"roles.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:18:\"activity-logs.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:14:\"retraites.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:16:\"retraites.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:14:\"retraites.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:16:\"retraites.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:18:\"retraites.validate\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:21:\"retraites.auto-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:11:\"stages.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:13:\"stages.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:11:\"stages.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:13:\"stages.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:18:\"stages.attestation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:13:\"stages.export\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:20:\"stages.manage-ecoles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:21:\"stages.manage-options\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:24:\"stages.manage-encadrants\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:11:\"greves.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:13:\"greves.create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:11:\"greves.edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:13:\"greves.delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:16:\"batch-print.view\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:24:\"batch-print.attestations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:27:\"batch-print.conge-decisions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:22:\"statistics.ai-analyses\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:10:\"RH Manager\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Utilisateur\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:8:\"Stage RH\";s:1:\"c\";s:3:\"web\";}}}', 1749643755);

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
-- Table structure for table `cadres`
--

CREATE TABLE `cadres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `categorie_cadre_id` bigint(20) UNSIGNED NOT NULL,
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
(14, 'Aide Soignant', 'مساعد علاج', 1, '2025-03-19 17:02:47', '2025-03-19 17:02:47'),
(15, 'Pharmacien', 'طبيب صيدلي', 6, '2025-03-19 17:03:35', '2025-03-19 17:03:35'),
(16, 'Infirmiers polyvalent', 'ممرض متعدد التخصصات', 4, '2025-03-19 17:04:12', '2025-03-19 17:04:12'),
(17, 'infirmier en anesthésie et réanimation', 'ممرض الانعاش والتخدير', 4, '2025-03-19 17:04:56', '2025-03-19 17:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `categorie_cadres`
--

CREATE TABLE `categorie_cadres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
(5, 'Fondation Med VI', 'مؤسسة محمد السادس لتضامن', '2025-03-19 17:30:41', '2025-03-19 17:30:41'),
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `observation` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type_certificate_id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `jours` int(11) NOT NULL,
  `date_depot` date NOT NULL,
  `date_debut` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `observation`, `url`, `type_certificate_id`, `fonctionnaire_id`, `jours`, `date_depot`, `date_debut`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 1, 12, 5, '2025-05-20', '2025-05-25', '2025-05-27 12:39:08', '2025-05-27 12:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `conges`
--

CREATE TABLE `conges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `demande_conges_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conge_availabilities`
--

CREATE TABLE `conge_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `type_conge_id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `jours_total` int(11) NOT NULL,
  `jours_reportes` int(11) NOT NULL DEFAULT 0,
  `jours_disponibles` int(11) NOT NULL,
  `jours_utilises` int(11) NOT NULL DEFAULT 0,
  `jours_restants` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conge_availabilities`
--

INSERT INTO `conge_availabilities` (`id`, `fonctionnaire_id`, `type_conge_id`, `year`, `jours_total`, `jours_reportes`, `jours_disponibles`, `jours_utilises`, `jours_restants`, `created_at`, `updated_at`) VALUES
(9, 7, 1, 2025, 22, 0, 22, 0, 22, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(10, 7, 2, 2025, 0, 0, 0, 0, 0, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(11, 7, 3, 2025, 10, 0, 10, 0, 10, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(12, 7, 4, 2025, 10, 0, 10, 0, 10, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(13, 7, 5, 2025, 30, 0, 30, 0, 30, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(14, 7, 6, 2025, 0, 0, 0, 0, 0, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(15, 7, 7, 2025, 90, 0, 90, 0, 90, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(16, 7, 8, 2025, 11, 0, 11, 0, 11, '2025-05-27 10:51:35', '2025-05-27 10:51:35'),
(25, 8, 1, 2025, 22, 0, 22, 0, 22, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(26, 8, 2, 2025, 0, 0, 0, 0, 0, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(27, 8, 3, 2025, 10, 0, 10, 0, 10, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(28, 8, 4, 2025, 10, 0, 10, 0, 10, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(29, 8, 5, 2025, 30, 0, 30, 0, 30, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(30, 8, 6, 2025, 0, 0, 0, 0, 0, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(31, 8, 7, 2025, 90, 0, 90, 0, 90, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(32, 8, 8, 2025, 11, 0, 11, 0, 11, '2025-05-27 11:33:37', '2025-05-27 11:33:37'),
(33, 10, 1, 2025, 22, 0, 22, 0, 22, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(34, 10, 2, 2025, 0, 0, 0, 0, 0, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(35, 10, 3, 2025, 10, 0, 10, 0, 10, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(36, 10, 4, 2025, 10, 0, 10, 0, 10, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(37, 10, 5, 2025, 30, 0, 30, 0, 30, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(38, 10, 6, 2025, 0, 0, 0, 0, 0, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(39, 10, 7, 2025, 90, 0, 90, 0, 90, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(40, 10, 8, 2025, 11, 0, 11, 0, 11, '2025-05-27 11:43:45', '2025-05-27 11:43:45'),
(41, 11, 1, 2025, 22, 0, 22, 0, 22, '2025-05-27 12:03:26', '2025-05-27 12:03:26'),
(42, 11, 2, 2025, 0, 0, 0, 0, 0, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(43, 11, 3, 2025, 10, 0, 10, 0, 10, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(44, 11, 4, 2025, 10, 0, 10, 0, 10, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(45, 11, 5, 2025, 30, 0, 30, 0, 30, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(46, 11, 6, 2025, 0, 0, 0, 0, 0, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(47, 11, 7, 2025, 90, 0, 90, 0, 90, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(48, 11, 8, 2025, 11, 0, 11, 0, 11, '2025-05-27 12:03:27', '2025-05-27 12:03:27'),
(49, 12, 1, 2025, 22, 0, 22, 22, 0, '2025-05-27 12:37:12', '2025-06-07 14:50:00'),
(50, 12, 2, 2025, 0, 0, 0, 0, 0, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(51, 12, 3, 2025, 10, 0, 10, 5, 5, '2025-05-27 12:37:12', '2025-06-07 15:13:53'),
(52, 12, 4, 2025, 10, 0, 10, 0, 10, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(53, 12, 5, 2025, 30, 0, 30, 0, 30, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(54, 12, 6, 2025, 0, 0, 0, 0, 0, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(55, 12, 7, 2025, 90, 0, 90, 0, 90, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(56, 12, 8, 2025, 11, 0, 11, 0, 11, '2025-05-27 12:37:12', '2025-05-27 12:37:12'),
(65, 14, 1, 2025, 22, 0, 22, 0, 22, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(66, 14, 2, 2025, 0, 0, 0, 0, 0, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(67, 14, 3, 2025, 10, 0, 10, 0, 10, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(68, 14, 4, 2025, 10, 0, 10, 0, 10, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(69, 14, 5, 2025, 30, 0, 30, 0, 30, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(70, 14, 6, 2025, 0, 0, 0, 0, 0, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(71, 14, 7, 2025, 90, 0, 90, 0, 90, '2025-06-01 15:46:43', '2025-06-01 15:46:43'),
(72, 14, 8, 2025, 11, 0, 11, 0, 11, '2025-06-01 15:46:43', '2025-06-01 15:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `conge_decisions`
--

CREATE TABLE `conge_decisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `type_conge_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_jours` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `date_decision` date NOT NULL,
  `numero_decision` varchar(255) NOT NULL,
  `remarques` text DEFAULT NULL,
  `statut` enum('en_attente','approuve','refuse') NOT NULL DEFAULT 'en_attente',
  `fichier_decision` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demande_conges`
--

CREATE TABLE `demande_conges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `type_conge_id` bigint(20) UNSIGNED NOT NULL,
  `date_demande` date NOT NULL,
  `date_debut` date NOT NULL,
  `demande` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demande_conges`
--

INSERT INTO `demande_conges` (`id`, `fonctionnaire_id`, `type_conge_id`, `date_demande`, `date_debut`, `demande`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2025-05-10', '2025-07-16', 9, '2025-06-07 14:49:14', '2025-06-07 14:49:14'),
(2, 8, 1, '2025-05-25', '2025-06-25', 10, '2025-06-07 14:49:14', '2025-06-07 14:49:14'),
(3, 10, 1, '2025-05-13', '2025-07-16', 7, '2025-06-07 14:49:14', '2025-06-07 14:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
(10, 'Faculté de Médecine et de Pharmacie', 'كلية الطب والصيدلة', '2025-06-10 08:59:00', '2025-06-10 08:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `encadrants`
--

CREATE TABLE `encadrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `fonction_arabe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encadrants`
--

INSERT INTO `encadrants` (`id`, `nom`, `nom_arabe`, `fonction`, `fonction_arabe`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Ahmed Benali', 'د. أحمد بن علي', 'Chef de Service', 'رئيس المصلحة', '2025-06-10 08:58:11', '2025-06-10 08:58:11'),
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `fichiers_fonctionnaires`
--

CREATE TABLE `fichiers_fonctionnaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_arabe` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `date_note` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fonctionnaires`
--

CREATE TABLE `fonctionnaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ppr` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_arabe` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `prenom_arabe` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `date_naissance` varchar(255) DEFAULT NULL,
  `date_embauche` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `fonction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom_formation_sanitaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarques` text DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `specialite_grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_mutation` bigint(20) UNSIGNED DEFAULT NULL,
  `date_mutation` date NOT NULL,
  `date_prise_en_service` date NOT NULL,
  `date_note` date DEFAULT NULL,
  `fichier_note` text DEFAULT NULL,
  `ref_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fonctionnaires`
--

INSERT INTO `fonctionnaires` (`id`, `ppr`, `nom`, `nom_arabe`, `prenom`, `prenom_arabe`, `cin`, `sexe`, `date_naissance`, `date_embauche`, `email`, `telephone`, `adresse`, `fonction_id`, `nom_formation_sanitaire_id`, `remarques`, `service_id`, `specialite_grade_id`, `position_id`, `type_mutation`, `date_mutation`, `date_prise_en_service`, `date_note`, `fichier_note`, `ref_note`, `created_at`, `updated_at`) VALUES
(7, '48283', 'MESKINI', NULL, 'LAILA', NULL, 'C268338', 'F', '1968-11-13', '1995-07-03', NULL, NULL, NULL, 1, 13, NULL, 24, 12, 2, 12, '2024-06-04', '2024-06-04', '2024-06-04', 'fichiers_notes/NO3zAdwE7LblLP8LfF5iUmKOt4uyVIldtsEwLs4e.pdf', 'ZERZER', '2025-05-27 10:48:18', '2025-05-27 11:12:36'),
(8, '66870', 'IDRISSI TAGHKI', NULL, 'ABDELHAI', NULL, 'C169545', 'M', '1966-09-20', '1994-08-01', NULL, NULL, 'FES', 1, 14, 'ZER', 24, 12, 3, 4, '1994-07-03', '1994-07-04', '1994-07-04', '1748348225.pdf', 'SRF', '2025-05-27 11:17:05', '2025-06-01 15:58:16'),
(10, '74266', 'ouennan', NULL, 'najiya', NULL, 'cb21738', 'M', '1969-10-20', '1994-08-02', NULL, NULL, NULL, 5, 8, 'EZE', 25, 9, 2, 2, '2009-10-04', '2009-10-04', '2009-10-04', 'fichiers_notes/VX3iI7ZmNHfxdzEjLvPD9rs8B1daboqnE19P5Wra.pdf', 'AZE', '2025-05-27 11:43:36', '2025-06-01 15:57:39'),
(11, '370531', 'EL YOUSSEFI', NULL, 'ABDERRAHMANE', NULL, 'C165681', 'M', '1955-01-01', '1989-10-23', NULL, NULL, NULL, 22, 17, NULL, 29, 7, 2, 2, '2010-10-21', '2010-10-20', '2020-10-21', 'fichiers_notes/yVY66vXvYlIqP5VMc1ZFXxOBkC4hU7BzdtKqLg3I.pdf', 'AZE', '2025-05-27 12:03:06', '2025-05-27 12:17:56'),
(12, '1660747', 'kaddouri', NULL, 'mohammed', NULL, 'Cd231259', 'M', '1989-02-19', '2011-12-14', NULL, NULL, NULL, 19, 19, NULL, 29, 7, 3, 5, '2024-12-31', '2024-12-31', '2024-12-31', 'fichiers_notes/9gDFKilxq67KHRTXlLieMeoA8K8KPCRabCjLWCDp.pdf', 'AAAZE', '2025-05-27 12:34:47', '2025-06-05 18:36:42'),
(14, 'QSq', 'QSqs', '', 'QSqs', '', 'QSqs', 'M', '2970-01-01', '2011-01-01', '', '', '', 17, 6, '', 33, 14, 2, 4, '2011-01-01', '2011-01-01', '2011-01-01', '', '', '2025-05-27 13:46:32', '2025-05-27 13:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_arabe` varchar(255) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_formation_id` bigint(20) UNSIGNED NOT NULL,
  `arrondissement_commune_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `cadre_id` bigint(20) UNSIGNED NOT NULL,
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
(17, 'deuxieme grade', 'deuxieme grade', 13, '2025-05-27 13:44:59', '2025-05-27 13:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `greves`
--

CREATE TABLE `greves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `remarque` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `greves`
--

INSERT INTO `greves` (`id`, `fonctionnaire_id`, `date_debut`, `date_fin`, `remarque`, `created_at`, `updated_at`) VALUES
(2, 12, '2025-01-01', '2025-01-05', NULL, '2025-05-27 12:38:18', '2025-05-27 12:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `historique_mutations`
--

CREATE TABLE `historique_mutations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_mutation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_mutation` date DEFAULT NULL,
  `date_note` date DEFAULT NULL,
  `ref_note` varchar(255) DEFAULT NULL,
  `fichiers_notes` varchar(255) DEFAULT NULL,
  `formation_sanitaire_origine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `formation_sanitaire_destination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarque` text DEFAULT NULL,
  `date_prise_en_service` date DEFAULT NULL,
  `date_cessation_service` date DEFAULT NULL,
  `ancien_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nouveau_service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ancien_fonction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nouveau_fonction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ancien_specialite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nouveau_specialite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historique_mutations`
--

INSERT INTO `historique_mutations` (`id`, `fonctionnaire_id`, `type_mutation_id`, `date_mutation`, `date_note`, `ref_note`, `fichiers_notes`, `formation_sanitaire_origine_id`, `formation_sanitaire_destination_id`, `remarque`, `date_prise_en_service`, `date_cessation_service`, `ancien_service_id`, `nouveau_service_id`, `ancien_fonction_id`, `nouveau_fonction_id`, `ancien_specialite_id`, `nouveau_specialite_id`, `created_at`, `updated_at`) VALUES
(15, 7, 4, '1995-07-03', '1995-07-03', '03071995', '', 12, 12, NULL, '1995-07-03', NULL, 30, 30, 1, 1, 12, 12, '2025-05-27 11:00:38', '2025-05-27 11:00:38'),
(18, 7, 12, '2024-06-04', '2024-06-04', 'ZERZER', 'fichiers_notes/NO3zAdwE7LblLP8LfF5iUmKOt4uyVIldtsEwLs4e.pdf', 12, 13, 'ZEA', '2024-06-04', '2026-04-03', 26, 24, 1, 1, 12, 12, '2025-05-27 11:12:36', '2025-05-27 11:12:36'),
(19, 10, 4, '1994-08-02', '1994-08-02', '', '', 15, 15, NULL, '1994-08-02', NULL, 24, 24, 9, 9, 9, 9, '2025-05-27 11:45:39', '2025-05-27 11:45:39'),
(21, 10, 2, '2009-10-04', '2009-10-04', 'AZE', 'fichiers_notes/pVB26qieyCJrXAxLiGx27n3y0BlqHguHkY4eTGdJ.pdf', 15, 9, NULL, '2009-10-04', '2009-10-04', 25, 25, 9, 5, 9, 9, '2025-05-27 11:49:44', '2025-06-01 15:57:39'),
(24, 11, 4, '1989-10-23', '1989-10-23', '', '', 9, 9, NULL, '1989-10-23', NULL, 28, 28, 22, 22, 7, 7, '2025-05-27 12:05:16', '2025-05-27 12:05:16'),
(25, 11, 2, '2010-10-24', '2010-10-24', 'AZE', 'fichiers_notes/uWXbpZlSSaSS4Ft89WI9yPuiH3c0xfdL44KWKjI3.pdf', 9, 7, NULL, '2010-02-24', '2010-02-24', 28, 29, 22, 22, 7, 7, '2025-05-27 12:05:16', '2025-05-27 12:05:16'),
(26, 11, 2, '2010-10-21', '2020-10-21', 'AZE', 'fichiers_notes/yVY66vXvYlIqP5VMc1ZFXxOBkC4hU7BzdtKqLg3I.pdf', 7, 17, 'AZE', '2010-10-20', '2010-10-20', 29, 29, 22, 22, 7, 6, '2025-05-27 12:15:57', '2025-05-27 12:15:57'),
(27, 12, 4, '2011-12-14', '2011-12-14', 'D', '', 18, 18, NULL, '2011-12-14', NULL, 29, 29, 22, 22, 7, 7, '2025-05-27 12:51:36', '2025-05-27 12:51:36'),
(28, 12, 5, '2024-12-31', '2024-12-31', 'AAAZE', 'fichiers_notes/9gDFKilxq67KHRTXlLieMeoA8K8KPCRabCjLWCDp.pdf', 18, 19, 'DAZ', '2024-12-31', '2024-12-31', 29, 29, 22, 19, 7, 7, '2025-05-27 12:51:36', '2025-05-27 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `historique_populations`
--

CREATE TABLE `historique_populations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_formation_sanitaire_id` bigint(20) UNSIGNED NOT NULL,
  `population` double NOT NULL,
  `annee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(53, '2025_06_10_094828_create_stages_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mutations`
--

CREATE TABLE `mutations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_mutation_id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `old_service_id` bigint(20) UNSIGNED NOT NULL,
  `new_service_id` bigint(20) UNSIGNED NOT NULL,
  `old_fonction_id` bigint(20) UNSIGNED NOT NULL,
  `new_fonction_id` bigint(20) UNSIGNED NOT NULL,
  `old_categorie_formations_id` bigint(20) UNSIGNED NOT NULL,
  `new_categorie_formations_id` bigint(20) UNSIGNED NOT NULL,
  `old_arrondissement_communes_id` bigint(20) UNSIGNED NOT NULL,
  `new_arrondissement_communes_id` bigint(20) UNSIGNED NOT NULL,
  `old_categorie_cadres_id` bigint(20) UNSIGNED NOT NULL,
  `new_categorie_cadres_id` bigint(20) UNSIGNED NOT NULL,
  `old_grades_id` bigint(20) UNSIGNED NOT NULL,
  `new_grades_id` bigint(20) UNSIGNED NOT NULL,
  `old_specialites_id` bigint(20) UNSIGNED NOT NULL,
  `new_specialites_id` bigint(20) UNSIGNED NOT NULL,
  `old_villes_id` bigint(20) UNSIGNED NOT NULL,
  `new_villes_id` bigint(20) UNSIGNED NOT NULL,
  `date_prise` date NOT NULL,
  `date_cessation` date NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `url_note` varchar(255) DEFAULT NULL,
  `date_decision_note` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `niveau_categorie_formations`
--

CREATE TABLE `niveau_categorie_formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `type_categorie_formation_id` bigint(20) UNSIGNED NOT NULL,
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
(8, 'provinciale', 'اقليمية', 7, '2025-05-27 12:32:23', '2025-05-27 12:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `nom_formation_sanitaires`
--

CREATE TABLE `nom_formation_sanitaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `niveau_categorie_formation_id` bigint(20) UNSIGNED NOT NULL,
  `arrondissement_commune_id` bigint(20) UNSIGNED NOT NULL,
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
(19, 'HOPITAL PAGNION', 'مستشفى بانيون', 3, 213, '2025-05-27 12:48:31', '2025-05-27 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
(16, 'Administration Hospitalière', 'الإدارة الاستشفائية', '2025-06-10 08:59:00', '2025-06-10 08:59:00');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
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
(67, 'statistics.ai-analyses', 'web', '2025-06-10 10:37:48', '2025-06-10 10:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(2, 'En Activité', 'نشيط', '2025-01-10 13:51:56', '2025-02-12 13:19:18'),
(3, 'suspendus', 'متوقف', '2025-03-07 17:12:48', '2025-03-07 17:12:48'),
(4, 'Déces', 'وفاة', '2025-03-19 16:31:11', '2025-03-19 16:31:11'),
(5, 'Mise en disponibilité (3 ans maximum renouvelé une fois)', 'الاحالة على الاستيداع(لاتتعدى 3 سنوات وتجدد مرة واحدة)', '2025-03-19 16:37:09', '2025-03-19 16:47:03'),
(6, 'détachement', 'الالحاق', '2025-03-19 16:49:26', '2025-03-19 16:49:26'),
(7, 'disponibilité prononcée', 'التوقيف الحتمي', '2025-03-19 16:55:24', '2025-03-19 16:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `position_historiques`
--

CREATE TABLE `position_historiques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ancien_position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nouveaux_position_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_cessation_service` date DEFAULT NULL,
  `date_prise_en_service` date DEFAULT NULL,
  `remarque` text DEFAULT NULL,
  `date_note` date DEFAULT NULL,
  `ref_note` varchar(255) DEFAULT NULL,
  `fichiers_notes` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `type_certificate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_conge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_historiques`
--

INSERT INTO `position_historiques` (`id`, `fonctionnaire_id`, `ancien_position_id`, `nouveaux_position_id`, `date_cessation_service`, `date_prise_en_service`, `remarque`, `date_note`, `ref_note`, `fichiers_notes`, `type`, `type_certificate_id`, `type_conge_id`, `created_at`, `updated_at`) VALUES
(3, 8, 2, 3, '2025-05-01', '2025-05-01', 'SS', '2025-05-01', NULL, 'fichiers_notes/BkRnieaycg175q53a1nA8q1MosgRgXP3Vk62mXmc.pdf', 'mise_en_disponibilite', 1, 1, '2025-05-27 13:24:26', '2025-06-01 15:58:16'),
(4, 12, 2, 3, '2025-06-01', '2025-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-05 18:36:42', '2025-06-05 18:36:42'),
(5, 12, 3, 3, '2025-06-01', NULL, NULL, NULL, NULL, NULL, 'conge', NULL, 1, '2025-06-07 14:50:00', '2025-06-07 14:50:00'),
(6, 12, 3, 3, '2025-06-01', NULL, NULL, NULL, NULL, NULL, 'conge', NULL, 3, '2025-06-07 15:13:53', '2025-06-07 15:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
  `id` bigint(20) NOT NULL,
  `fonctionnaire_id` int(11) NOT NULL,
  `type_conge_id` int(11) NOT NULL,
  `nbr_jours_disponibles` int(11) NOT NULL,
  `date_conge` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relicats`
--

INSERT INTO `relicats` (`id`, `fonctionnaire_id`, `type_conge_id`, `nbr_jours_disponibles`, `date_conge`, `created_at`, `updated_at`) VALUES
(2, 12, 1, 22, '2025-06-01', '2025-06-07 15:50:00', '2025-06-07 15:50:00'),
(3, 12, 3, 5, '2025-06-01', '2025-06-07 16:13:53', '2025-06-07 16:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `retraites`
--

CREATE TABLE `retraites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fonctionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `type_retraite` enum('limite_age','anticipee') NOT NULL DEFAULT 'limite_age',
  `date_retraite` date NOT NULL,
  `date_effet` date DEFAULT NULL,
  `age_retraite` decimal(4,1) DEFAULT NULL,
  `annees_service` decimal(4,1) DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `statut` enum('propose','valide','rejete','effectue') NOT NULL DEFAULT 'propose',
  `remarques` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `validated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retraites`
--

INSERT INTO `retraites` (`id`, `fonctionnaire_id`, `type_retraite`, `date_retraite`, `date_effet`, `age_retraite`, `annees_service`, `motif`, `statut`, `remarques`, `created_by`, `validated_by`, `validated_at`, `created_at`, `updated_at`) VALUES
(1, 11, 'limite_age', '2015-01-01', NULL, 60.0, 25.2, NULL, 'propose', NULL, 2, NULL, NULL, '2025-05-27 12:26:13', '2025-05-27 12:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
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
(4, 'Stage RH', 'web', '2025-06-10 09:58:01', '2025-06-10 09:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
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
(24, 2),
(25, 1),
(25, 2),
(25, 3),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(29, 1),
(29, 2),
(29, 3),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(35, 3),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(49, 1),
(49, 2),
(50, 1),
(50, 2),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(52, 1),
(52, 2),
(52, 4),
(53, 1),
(53, 2),
(53, 4),
(54, 1),
(54, 2),
(54, 4),
(55, 1),
(55, 2),
(55, 3),
(55, 4),
(56, 1),
(56, 2),
(56, 4),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(58, 4),
(59, 1),
(59, 2),
(59, 4),
(60, 1),
(60, 2),
(60, 3),
(61, 1),
(61, 2),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_arabe` varchar(255) DEFAULT NULL,
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
(33, 'PARC AUTO DELEGATION SANTE FES', 'PARC AUTO DELEGATION SANTE FES', '2025-05-27 13:38:51', '2025-05-27 13:38:51');

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
('3qITyeMIeLoi3RX9xNWrRckGojuioJqIawpOLr0V', NULL, '127.0.0.1', 'curl/8.8.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnk0cHMxbUhDb0xiSVhNSGx2SDBpenl5Y25nNlpqaTNiWjNwUmNuMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LWF0dGVzdGF0aW9uLXRleHQvMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749551586),
('8zE1Eq9pAuqJJxQeGeCitQhhU3lWqzRaKuVNH9Uk', NULL, '127.0.0.1', 'curl/8.8.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQTJ0REFIVnJXeEpWbUlFWVRxaGtXMDdMRkxmZ1pyZU9JZ1J2MG9FcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LXN0YWdlLWF0dGVzdGF0aW9uLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749550985),
('PQGy8rMgnvvosG3p5xyrtQI7vumfvRvlKL3fv08M', NULL, '127.0.0.1', 'curl/8.8.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT09lYjlHcDA3dDFGYjdWOWV5NmVnTEhVdUFnRzNUeXhqMWpweWk2TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXN0LXN0YWdlLWF0dGVzdGF0aW9uLzIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1749551012),
('pyTSASFksHKrTo4mqeFDzNJL9mA86JKKkhRmvrVR', NULL, '127.0.0.1', 'curl/8.8.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVHU3WkhQNDF5dHM5RElYQ2t6NG0xSmhRMTdIWlpScUFwNEpoVXZiQSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N0YWdlcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc3RhZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749553590),
('UU7zISPPNljQUPJT4URpHkEJbgf2TwJ1fY4LuuL6', NULL, '127.0.0.1', 'curl/8.8.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDJ5MXFMc1ZqSDVvaTh2c1drZkpRTzFnVVY0OFJsOFhhcFJqVmlKNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N0YWdlcy9hdHRlc3RhdGlvbi8xIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdGFnZXMvYXR0ZXN0YXRpb24vMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749550961),
('vT0kCxkPUwqRW9mGY51bXFkwxv3Qc2ZQtPqk2YGC', NULL, '127.0.0.1', 'curl/8.8.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzVJTVAyYTdXdGE1NEZUeTZFTHd0dkR2c0tGdFFVcTFwTzB1dzBMRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N0YWdlcyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc3RhZ2VzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749554079),
('wi9zsziVynsmx7n0KK8Tp08lIgbr1PNP6nOiZqBA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkxWVkdnNVdjbWVOMDN0WEpUYWFKa1RRcjR4a0pkWkdJb0lnUkd6USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6MjMyMy9sb2dpbiI7fX0=', 1749557429);

-- --------------------------------------------------------

--
-- Table structure for table `specialites`
--

CREATE TABLE `specialites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `categorie_cadres_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialite_grades`
--

CREATE TABLE `specialite_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
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
(9, 'Polyvalent', 'متعدد التخصصات', 14, '2025-03-19 17:19:42', '2025-03-19 17:19:42'),
(10, 'Polyvalent', 'متعدد التخصصات', 15, '2025-03-19 17:20:17', '2025-03-19 17:20:17'),
(11, 'Viscerale', 'جراحة الباطنية', 6, '2025-03-19 18:06:01', '2025-03-19 18:06:01'),
(12, 'Médecin géneraliste', 'Médecin géneraliste', 11, '2025-05-27 10:53:08', '2025-05-27 10:53:08'),
(14, 'chauffeur', 'chauffeur', 17, '2025-05-27 13:45:35', '2025-05-27 13:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `institut_details` text NOT NULL,
  `duree` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `hierarchie` varchar(255) NOT NULL,
  `avis` text DEFAULT NULL,
  `statut_attestation` enum('traité','pas en cours','en cours') NOT NULL DEFAULT 'en cours',
  `cadre` enum('médical','administratif') NOT NULL,
  `type_stage` enum('volontaire','formation') NOT NULL,
  `ecole_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `formation_sanitaire_id` bigint(20) UNSIGNED NOT NULL,
  `encadrant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `nom_prenom`, `cin`, `institut_details`, `duree`, `date_debut`, `date_fin`, `hierarchie`, `avis`, `statut_attestation`, `cadre`, `type_stage`, `ecole_id`, `option_id`, `service_id`, `formation_sanitaire_id`, `encadrant_id`, `created_at`, `updated_at`) VALUES
(2, 'Amina Benali', 'AB123456', 'Étudiante en 3ème année de kinésithérapie à l\'Université Mohammed V', 30, '2024-01-15', '2024-02-14', 'Directeur Régional de la Santé', 'Stage effectué avec satisfaction', 'traité', 'médical', 'formation', 1, 1, 24, 9, 1, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(3, 'Mohammed Tazi', 'MT789012', 'Étudiant en 2ème année d\'aide soignant à l\'Institut Supérieur des Sciences de la Santé', 45, '2024-02-01', '2024-03-17', 'Chef de Service', NULL, 'en cours', 'médical', 'volontaire', 3, 2, 25, 10, 2, '2025-06-10 08:59:00', '2025-06-10 08:59:00'),
(4, 'Sara Alami', 'SA345678', 'Étudiante en 1ère année d\'infirmerie à l\'École Nationale de Santé Publique', 60, '2024-03-01', '2024-04-30', 'Directeur de l\'Hôpital', 'Excellent travail et motivation', 'traité', 'médical', 'formation', 4, 3, 30, 11, 3, '2025-06-10 08:59:00', '2025-06-10 08:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `statut_positionaires`
--

CREATE TABLE `statut_positionaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_categorie_formations`
--

CREATE TABLE `type_categorie_formations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `categorie_formation_id` bigint(20) UNSIGNED NOT NULL,
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
(7, 'délegation Fes', 'مندوبية فاس', 3, '2025-05-27 12:31:50', '2025-05-27 12:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `type_certificates`
--

CREATE TABLE `type_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `nom_arabe` varchar(255) DEFAULT NULL,
  `jours` int(11) DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_stages`
--

INSERT INTO `type_stages` (`id`, `nom`, `nom_arabe`, `created_at`, `updated_at`) VALUES
(1, 'volontaire', 'طوعية', '2025-01-10 15:27:17', '2025-01-10 15:27:17'),
(2, 'formation', 'تكوين', '2025-01-10 15:27:39', '2025-01-10 15:27:52'),
(3, 'equivalence', 'معادلة', '2025-01-10 15:28:30', '2025-01-10 15:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mohammed Kaddouri', 'mohammed@grh.com', '2024-12-20 14:28:19', '$2y$12$z2aaYodSMtbV.qaVny4RT./knieVRw5AY/0s.UqMgQsfzTwmcW4B2', 'E77SeCWhLzCC5zVWOykgL4QFS5POEULMWEzwhIsbCXnp0ZaO7BblEevuOD2c', '2024-12-20 14:28:19', '2024-12-20 14:57:40'),
(3, 'Mohammed Kaddouri', 'mohammed@rhapp.com', '2025-03-23 22:30:45', '$2y$12$WlNN1maBHqdJv7rw7FYXGO/gzIfbw14tGaYkdE4I9hTRTRI7Egndy', 'IdSnEZYTok', '2025-03-23 22:30:45', '2025-03-23 22:30:45'),
(4, 'Admin User', 'admin@test.com', NULL, '$2y$12$qvp8uTyQDI07eOJ8dXB/l.A4OoLf1q0TCYVH3Wb0jxriYR7u39Kaa', 'kua5AQ7P9vbzSc5N7xmnq6vs8DoqyD9ecUf7huOSC4UmyxgfxF1bCD0yxzKr', '2025-05-24 14:37:32', '2025-05-24 14:37:32'),
(5, 'Samir Taqqi', 'tsamir.stage@grh.ma', NULL, '$2y$12$lxxp3.AameHnenKYr0cNwOkTNp/B0oR.Qa/iqWVKa9KkfpcIiVJSC', '2VRjqhE9ckXDf1Ocj2eQH3wbqEb6BW7jqK3EHrBKstpnEjAYdUl12BjtmoO7', '2025-06-10 09:58:56', '2025-06-10 09:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `nom_arabe` varchar(255) NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
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
  ADD KEY `stages_encadrant_id_foreign` (`encadrant_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT for table `affectations`
--
ALTER TABLE `affectations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_fichiers`
--
ALTER TABLE `archive_fichiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arrondissement_communes`
--
ALTER TABLE `arrondissement_communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `cadres`
--
ALTER TABLE `cadres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categorie_cadres`
--
ALTER TABLE `categorie_cadres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categorie_formations`
--
ALTER TABLE `categorie_formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conge_availabilities`
--
ALTER TABLE `conge_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `conge_decisions`
--
ALTER TABLE `conge_decisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demande_conges`
--
ALTER TABLE `demande_conges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `encadrants`
--
ALTER TABLE `encadrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `etat_prise_cesations`
--
ALTER TABLE `etat_prise_cesations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fichiers_fonctionnaires`
--
ALTER TABLE `fichiers_fonctionnaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fonctionnaires`
--
ALTER TABLE `fonctionnaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `formation_arrondissement_communes`
--
ALTER TABLE `formation_arrondissement_communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grade_cadres`
--
ALTER TABLE `grade_cadres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `greves`
--
ALTER TABLE `greves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historique_mutations`
--
ALTER TABLE `historique_mutations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `historique_populations`
--
ALTER TABLE `historique_populations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `mutations`
--
ALTER TABLE `mutations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `niveau_categorie_formations`
--
ALTER TABLE `niveau_categorie_formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nom_formation_sanitaires`
--
ALTER TABLE `nom_formation_sanitaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `position_historiques`
--
ALTER TABLE `position_historiques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `relicats`
--
ALTER TABLE `relicats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retraites`
--
ALTER TABLE `retraites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `specialites`
--
ALTER TABLE `specialites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialite_grades`
--
ALTER TABLE `specialite_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statut_positionaires`
--
ALTER TABLE `statut_positionaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_categorie_formations`
--
ALTER TABLE `type_categorie_formations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type_certificates`
--
ALTER TABLE `type_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_conges`
--
ALTER TABLE `type_conges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type_mutations`
--
ALTER TABLE `type_mutations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type_stages`
--
ALTER TABLE `type_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectations`
--
ALTER TABLE `affectations`
  ADD CONSTRAINT `affectations_categorie_formation_id_foreign` FOREIGN KEY (`categorie_formation_id`) REFERENCES `categorie_formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `affectations_fonction_id_foreign` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `affectations_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `affectations_formation_arrondissement_commune_id_foreign` FOREIGN KEY (`formation_arrondissement_commune_id`) REFERENCES `formation_arrondissement_communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `affectations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `archive_fichiers`
--
ALTER TABLE `archive_fichiers`
  ADD CONSTRAINT `archive_fichiers_fonctionnaires_id_foreign` FOREIGN KEY (`fonctionnaires_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cadres`
--
ALTER TABLE `cadres`
  ADD CONSTRAINT `cadres_categorie_cadre_id_foreign` FOREIGN KEY (`categorie_cadre_id`) REFERENCES `categorie_cadres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categorie_cadres`
--
ALTER TABLE `categorie_cadres`
  ADD CONSTRAINT `categorie_cadres_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categorie_cadres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_type_certificate_id_foreign` FOREIGN KEY (`type_certificate_id`) REFERENCES `type_certificates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conges`
--
ALTER TABLE `conges`
  ADD CONSTRAINT `conges_demande_conges_id_foreign` FOREIGN KEY (`demande_conges_id`) REFERENCES `demande_conges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conge_availabilities`
--
ALTER TABLE `conge_availabilities`
  ADD CONSTRAINT `conge_availabilities_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conge_availabilities_type_conge_id_foreign` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conge_decisions`
--
ALTER TABLE `conge_decisions`
  ADD CONSTRAINT `conge_decisions_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conge_decisions_type_conge_id_foreign` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `demande_conges`
--
ALTER TABLE `demande_conges`
  ADD CONSTRAINT `demande_conges_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demande_conges_type_conge_id_foreign` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etat_prise_cesations`
--
ALTER TABLE `etat_prise_cesations`
  ADD CONSTRAINT `etat_prise_cesations_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fichiers_fonctionnaires`
--
ALTER TABLE `fichiers_fonctionnaires`
  ADD CONSTRAINT `fichiers_fonctionnaires_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fonctionnaires`
--
ALTER TABLE `fonctionnaires`
  ADD CONSTRAINT `fonctionnaires_fonction_id_foreign` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fonctionnaires_nom_formation_sanitaire_id_foreign` FOREIGN KEY (`nom_formation_sanitaire_id`) REFERENCES `nom_formation_sanitaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fonctionnaires_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fonctionnaires_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fonctionnaires_specialite_grade_id_foreign` FOREIGN KEY (`specialite_grade_id`) REFERENCES `specialite_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fonctionnaires_type_mutation_foreign` FOREIGN KEY (`type_mutation`) REFERENCES `type_mutations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `formation_arrondissement_communes`
--
ALTER TABLE `formation_arrondissement_communes`
  ADD CONSTRAINT `formation_arrondissement_communes_categorie_formation_id_foreign` FOREIGN KEY (`categorie_formation_id`) REFERENCES `categorie_formations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grade_cadres`
--
ALTER TABLE `grade_cadres`
  ADD CONSTRAINT `grade_cadres_cadre_id_foreign` FOREIGN KEY (`cadre_id`) REFERENCES `cadres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `greves`
--
ALTER TABLE `greves`
  ADD CONSTRAINT `greves_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `historique_mutations`
--
ALTER TABLE `historique_mutations`
  ADD CONSTRAINT `historique_mutations_ancien_fonction_id_foreign` FOREIGN KEY (`ancien_fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_ancien_service_id_foreign` FOREIGN KEY (`ancien_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_ancien_specialite_id_foreign` FOREIGN KEY (`ancien_specialite_id`) REFERENCES `specialite_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_formation_sanitaire_destination_id_foreign` FOREIGN KEY (`formation_sanitaire_destination_id`) REFERENCES `nom_formation_sanitaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_formation_sanitaire_origine_id_foreign` FOREIGN KEY (`formation_sanitaire_origine_id`) REFERENCES `nom_formation_sanitaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_nouveau_fonction_id_foreign` FOREIGN KEY (`nouveau_fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_nouveau_service_id_foreign` FOREIGN KEY (`nouveau_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_nouveau_specialite_id_foreign` FOREIGN KEY (`nouveau_specialite_id`) REFERENCES `specialite_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_mutations_type_mutation_id_foreign` FOREIGN KEY (`type_mutation_id`) REFERENCES `type_mutations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `historique_populations`
--
ALTER TABLE `historique_populations`
  ADD CONSTRAINT `historique_populations_nom_formation_sanitaire_id_foreign` FOREIGN KEY (`nom_formation_sanitaire_id`) REFERENCES `nom_formation_sanitaires` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mutations`
--
ALTER TABLE `mutations`
  ADD CONSTRAINT `mutations_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_arrondissement_communes_id_foreign` FOREIGN KEY (`new_arrondissement_communes_id`) REFERENCES `arrondissement_communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_categorie_cadres_id_foreign` FOREIGN KEY (`new_categorie_cadres_id`) REFERENCES `categorie_cadres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_categorie_formations_id_foreign` FOREIGN KEY (`new_categorie_formations_id`) REFERENCES `categorie_formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_fonction_id_foreign` FOREIGN KEY (`new_fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_grades_id_foreign` FOREIGN KEY (`new_grades_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_service_id_foreign` FOREIGN KEY (`new_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_specialites_id_foreign` FOREIGN KEY (`new_specialites_id`) REFERENCES `specialites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_new_villes_id_foreign` FOREIGN KEY (`new_villes_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_arrondissement_communes_id_foreign` FOREIGN KEY (`old_arrondissement_communes_id`) REFERENCES `arrondissement_communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_categorie_cadres_id_foreign` FOREIGN KEY (`old_categorie_cadres_id`) REFERENCES `categorie_cadres` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_categorie_formations_id_foreign` FOREIGN KEY (`old_categorie_formations_id`) REFERENCES `categorie_formations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_fonction_id_foreign` FOREIGN KEY (`old_fonction_id`) REFERENCES `fonctions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_grades_id_foreign` FOREIGN KEY (`old_grades_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_service_id_foreign` FOREIGN KEY (`old_service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_specialites_id_foreign` FOREIGN KEY (`old_specialites_id`) REFERENCES `specialites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_old_villes_id_foreign` FOREIGN KEY (`old_villes_id`) REFERENCES `villes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mutations_type_mutation_id_foreign` FOREIGN KEY (`type_mutation_id`) REFERENCES `type_mutations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `niveau_categorie_formations`
--
ALTER TABLE `niveau_categorie_formations`
  ADD CONSTRAINT `niveau_categorie_formations_type_categorie_formation_id_foreign` FOREIGN KEY (`type_categorie_formation_id`) REFERENCES `type_categorie_formations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nom_formation_sanitaires`
--
ALTER TABLE `nom_formation_sanitaires`
  ADD CONSTRAINT `nom_formation_sanitaires_ibfk_1` FOREIGN KEY (`arrondissement_commune_id`) REFERENCES `arrondissement_communes` (`id`),
  ADD CONSTRAINT `nom_formation_sanitaires_niveau_categorie_formation_id_foreign` FOREIGN KEY (`niveau_categorie_formation_id`) REFERENCES `niveau_categorie_formations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `position_historiques`
--
ALTER TABLE `position_historiques`
  ADD CONSTRAINT `position_historiques_ancien_position_id_foreign` FOREIGN KEY (`ancien_position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_historiques_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_historiques_nouveaux_position_id_foreign` FOREIGN KEY (`nouveaux_position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_historiques_type_certificate_id_foreign` FOREIGN KEY (`type_certificate_id`) REFERENCES `type_certificates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `position_historiques_type_conge_id_foreign` FOREIGN KEY (`type_conge_id`) REFERENCES `type_conges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `retraites`
--
ALTER TABLE `retraites`
  ADD CONSTRAINT `retraites_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `retraites_fonctionnaire_id_foreign` FOREIGN KEY (`fonctionnaire_id`) REFERENCES `fonctionnaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `retraites_validated_by_foreign` FOREIGN KEY (`validated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialites`
--
ALTER TABLE `specialites`
  ADD CONSTRAINT `specialites_categorie_cadres_id_foreign` FOREIGN KEY (`categorie_cadres_id`) REFERENCES `categorie_cadres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialite_grades`
--
ALTER TABLE `specialite_grades`
  ADD CONSTRAINT `specialite_grades_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grade_cadres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_ecole_id_foreign` FOREIGN KEY (`ecole_id`) REFERENCES `ecoles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stages_encadrant_id_foreign` FOREIGN KEY (`encadrant_id`) REFERENCES `encadrants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stages_formation_sanitaire_id_foreign` FOREIGN KEY (`formation_sanitaire_id`) REFERENCES `nom_formation_sanitaires` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stages_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `type_categorie_formations`
--
ALTER TABLE `type_categorie_formations`
  ADD CONSTRAINT `type_categorie_formations_categorie_formation_id_foreign` FOREIGN KEY (`categorie_formation_id`) REFERENCES `categorie_formations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
