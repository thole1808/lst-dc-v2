-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2020 at 09:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lst-dc-v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_admin_klien`
--

CREATE TABLE `master_admin_klien` (
  `id_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no_telepon_admin` varchar(15) DEFAULT NULL,
  `alamat_admin` text DEFAULT NULL,
  `email_admin` text DEFAULT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_admin_klien`
--

INSERT INTO `master_admin_klien` (`id_admin`, `nama_admin`, `no_telepon_admin`, `alamat_admin`, `email_admin`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('ADM-021020-0001', 'Faisal', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 09:57:18', NULL),
('ADM-021020-0002', 'Ibnu Berau', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 09:59:12', NULL),
('ADM-021020-0003', 'Den Prabowo', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:09:41', NULL),
('ADM-021020-0004', 'Budi Klaten', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:12:23', NULL),
('ADM-021020-0006', 'Bayu Klaten', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-02 10:13:38', '2020-10-02 10:34:41'),
('ADM-021020-0007', 'Rio Probolinggo', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:20:25', NULL),
('ADM-021020-0008', 'Yulianto Jember', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:25:34', NULL),
('ADM-021020-0009', 'Maulana Mempawah', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:36:14', NULL),
('ADM-021020-0010', 'Andri Bandung Barat', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:44:03', NULL),
('ADM-021020-0011', 'Riadi LST Kaltara', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:23:39', NULL),
('ADM-021020-0012', 'Kusuma Pelaihari', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:26:14', NULL),
('ADM-021020-0013', 'Hamdani Pelaihari', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:27:27', NULL),
('ADM-021020-0014', 'Adit Belu', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:04:18', NULL),
('ADM-021020-0015', 'M. Agus Riady', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:21:50', NULL),
('ADM-021020-0016', 'Andi Lebak', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:28:47', NULL),
('ADM-021020-0017', 'Andi Balangan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:29:03', NULL),
('ADM-021020-0018', 'Herianto', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:43:31', NULL),
('ADM-021020-0019', 'Ibu Dwi CV mulya Sari', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-02 14:29:33', '2020-10-02 14:32:23'),
('ADM-021020-0020', 'Erik RSUD', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-10-02 14:37:17', NULL),
('ADM-300920-0001', 'Suasono Edy', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:52:27', NULL),
('ADM-300920-0002', 'Yuliyanto', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:52:40', NULL),
('ADM-300920-0003', 'Ujang', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:52:52', '2020-10-02 13:10:26'),
('ADM-300920-0004', 'Indri Arifin', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:53:04', NULL),
('ADM-300920-0005', 'Dwi Janu', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:53:25', NULL),
('ADM-300920-0006', 'Wisnu', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:53:37', NULL),
('ADM-300920-0007', 'Doddy', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:53:46', NULL),
('ADM-300920-0008', 'Khoerul', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:54:06', NULL),
('ADM-300920-0009', 'Mujio', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:54:17', NULL),
('ADM-300920-0010', 'Kurniawan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:54:29', NULL),
('ADM-300920-0011', 'Marthen Sangguwali', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:54:41', NULL),
('ADM-300920-0012', 'Budi Oku Timur', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:54:57', '2020-10-02 10:58:15'),
('ADM-300920-0013', 'Yoso', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:55:05', NULL),
('ADM-300920-0014', 'Made Bambang', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:55:15', NULL),
('ADM-300920-0015', 'Aghna', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:55:26', '2020-10-02 10:58:48'),
('ADM-300920-0016', 'Aris Munandar', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:55:36', NULL),
('ADM-300920-0017', 'Iqbal Aconk', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:55:43', NULL),
('ADM-300920-0018', 'Agus Sutriono', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:55:50', NULL),
('ADM-300920-0019', 'Hamdani Tanah Laut', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:56:26', '2020-10-02 11:27:12'),
('ADM-300920-0020', 'Heru', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:56:36', '2020-10-02 10:57:15'),
('ADM-300920-0021', 'Fauzan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:56:44', NULL),
('ADM-300920-0022', 'Adinus', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:56:53', NULL),
('ADM-300920-0023', 'Wiryo', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:56:59', NULL),
('ADM-300920-0024', 'Ahmad Saik', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:57:06', NULL),
('ADM-300920-0025', 'Reki', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:57:13', NULL),
('ADM-300920-0026', 'Eri', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:57:21', NULL),
('ADM-300920-0027', 'Irawan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:57:29', NULL),
('ADM-300920-0028', 'Bayu Cilacap', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:57:36', '2020-10-02 10:34:53'),
('ADM-300920-0029', 'Charles', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:57:42', NULL),
('ADM-300920-0030', 'Yulianto Purbalingga', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:57:50', '2020-10-02 10:25:25'),
('ADM-300920-0031', 'Andi Tapin', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:57:56', '2020-10-02 13:28:41'),
('ADM-300920-0032', 'Putra', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:58:04', '2020-10-02 10:59:42'),
('ADM-300920-0033', 'Ganjar', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:58:12', NULL),
('ADM-300920-0034', 'Dion', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:58:17', NULL),
('ADM-300920-0035', 'Rio Kuburaya', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:58:23', '2020-10-02 10:19:49'),
('ADM-300920-0036', 'Septian', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:58:30', NULL),
('ADM-300920-0037', 'Ridwan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:58:36', '2020-10-02 11:16:58'),
('ADM-300920-0038', 'Tofik', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:58:43', '2020-10-02 10:58:06'),
('ADM-300920-0039', 'Randa', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:58:50', NULL),
('ADM-300920-0040', 'Roni', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:58:57', NULL),
('ADM-300920-0041', 'Endro', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:02', NULL),
('ADM-300920-0042', 'Harrni', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:09', NULL),
('ADM-300920-0043', 'Alfany', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:15', NULL),
('ADM-300920-0044', 'Degan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:21', NULL),
('ADM-300920-0045', 'Adit Banjarnegara', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 17:59:27', '2020-10-02 13:02:54'),
('ADM-300920-0046', 'Ulil', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:33', NULL),
('ADM-300920-0047', 'Rizkia', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 17:59:40', NULL),
('ADM-300920-0048', 'Nizam', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:00:05', NULL),
('ADM-300920-0049', 'Yovi', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:00:14', NULL),
('ADM-300920-0050', 'Andri Wonosobo', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:00:29', '2020-10-02 10:43:30'),
('ADM-300920-0051', 'Erik', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:00:43', '2020-10-02 11:16:34'),
('ADM-300920-0052', 'Hilman', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:00:50', NULL),
('ADM-300920-0053', 'Nano', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:00:57', NULL),
('ADM-300920-0054', 'Saeful', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:01:09', NULL),
('ADM-300920-0055', 'Bambang', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:01:15', NULL),
('ADM-300920-0056', 'Nurul', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:01:22', NULL),
('ADM-300920-0057', 'Rizky', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:01:28', NULL),
('ADM-300920-0058', 'Maulana Klaten', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:01:45', '2020-10-02 10:36:06'),
('ADM-300920-0059', 'Prio', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:02:02', '2020-10-02 13:10:35'),
('ADM-300920-0060', 'Admin Buru', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:02:15', NULL),
('ADM-300920-0061', 'Arisa', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:02:21', NULL),
('ADM-300920-0062', 'Diki', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:02:30', '2020-10-02 10:57:58'),
('ADM-300920-0063', 'Ali sodiqin', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:02:36', NULL),
('ADM-300920-0064', 'Mihrom', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:02:42', NULL),
('ADM-300920-0065', 'Ahmad Yani', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:02:47', NULL),
('ADM-300920-0066', 'Kusuma Tanah Laut', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:02:55', '2020-10-02 11:25:58'),
('ADM-300920-0067', 'Ibnu Blitar', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:03:05', '2020-10-02 09:59:32'),
('ADM-300920-0068', 'Hari Martha', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:03:13', NULL),
('ADM-300920-0069', 'Fajar', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:03:19', NULL),
('ADM-300920-0070', 'Rommy', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:03:30', '2020-10-02 11:11:54'),
('ADM-300920-0071', 'Nyoman', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:03:44', NULL),
('ADM-300920-0072', 'Ibu Cristin', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:04:13', NULL),
('ADM-300920-0073', 'Tono TSI', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:04:20', '2020-10-02 10:57:48'),
('ADM-300920-0074', 'Didik', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:04:39', '2020-10-02 10:57:35'),
('ADM-300920-0075', 'Ramli', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:05:44', NULL),
('ADM-300920-0076', 'Eka', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:05:53', '2020-10-02 10:57:26'),
('ADM-300920-0077', 'Abu', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:06:17', NULL),
('ADM-300920-0078', 'Mulyadi', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:06:24', NULL),
('ADM-300920-0079', 'Suri', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:06:29', '2020-10-02 13:27:03'),
('ADM-300920-0080', 'Yosi', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:06:44', NULL),
('ADM-300920-0081', 'Selamat', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:06:57', NULL),
('ADM-300920-0082', 'Beni', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:03', NULL),
('ADM-300920-0083', 'Arko', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:17', NULL),
('ADM-300920-0084', 'Msibyaniadi', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:30', NULL),
('ADM-300920-0085', 'Amca', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:36', NULL),
('ADM-300920-0086', 'Hendra', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:41', NULL),
('ADM-300920-0087', 'Rizki Najami', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:48', NULL),
('ADM-300920-0088', 'Agus Triyanto', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:07:53', NULL),
('ADM-300920-0089', 'Irfan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:02', NULL),
('ADM-300920-0090', 'Achmad Tasikmalaya', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:08:08', '2020-10-02 10:28:26'),
('ADM-300920-0091', 'Fitra', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:13', NULL),
('ADM-300920-0092', 'Rizki Tasikmalaya Kota', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:08:18', '2020-10-02 13:35:43'),
('ADM-300920-0093', 'Iyad', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:23', NULL),
('ADM-300920-0094', 'Dian', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:29', NULL),
('ADM-300920-0095', 'Dwi Putra hasanah', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:34', NULL),
('ADM-300920-0096', 'Adnan', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:08:46', NULL),
('ADM-300920-0097', 'Ady', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:00', NULL),
('ADM-300920-0098', 'Agus Banjarnegara', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:09:16', '2020-10-02 13:06:08'),
('ADM-300920-0099', 'Septi Rina', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:30', NULL),
('ADM-300920-0100', 'Cipto Keraf', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:36', NULL),
('ADM-300920-0101', 'Teguh', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:43', NULL),
('ADM-300920-0102', 'Dani Saman', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:51', NULL),
('ADM-300920-0103', 'Yayak', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:09:57', NULL),
('ADM-300920-0104', 'Bambi', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:10:04', NULL),
('ADM-300920-0105', 'Sutik', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:10:12', NULL),
('ADM-300920-0106', 'Rico', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:10:19', NULL),
('ADM-300920-0107', 'Amin', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', NULL, '2020-09-30 18:10:31', NULL),
('ADM-300920-0108', 'Ari', NULL, NULL, NULL, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 18:10:37', '2020-09-30 18:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `master_cabang`
--

CREATE TABLE `master_cabang` (
  `id_cabang` varchar(20) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_cabang`
--

INSERT INTO `master_cabang` (`id_cabang`, `nama_cabang`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('CAB-300920-0001', 'LST-JAKARTA', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:28:26', NULL),
('CAB-300920-0002', 'LST-PURWOKERTO', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:28:34', NULL),
('CAB-300920-0003', 'LST-FREE', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:28:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_dampak`
--

CREATE TABLE `master_dampak` (
  `id_dampak` varchar(20) NOT NULL,
  `nama_dampak` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_dampak`
--

INSERT INTO `master_dampak` (`id_dampak`, `nama_dampak`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('DMP-011020-0001', 'High Impact', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:34:17', NULL),
('DMP-011020-0002', 'Medium Impact', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:34:23', NULL),
('DMP-011020-0003', 'Low Impact', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 13:34:28', '2020-10-01 13:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `master_item_klasifikasi`
--

CREATE TABLE `master_item_klasifikasi` (
  `id_item_klasifikasi` varchar(20) NOT NULL,
  `nama_item_klasifikasi` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_item_klasifikasi`
--

INSERT INTO `master_item_klasifikasi` (`id_item_klasifikasi`, `nama_item_klasifikasi`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('ITK-111020-0001', 'Akses user aplikasi', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-11 18:32:16', '2020-11-21 23:01:45'),
('ITK-111020-0002', 'Akses user server', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:32:21', NULL),
('ITK-111020-0003', 'API tidak dapat diakses', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:32:27', NULL),
('ITK-111020-0004', 'Aplikasi tidak dapat', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:32:34', NULL),
('ITK-111020-0005', 'Aplikasi tidak respo', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:32:40', NULL),
('ITK-111020-0006', 'Data hilang', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:32:46', NULL),
('ITK-111020-0007', 'Data tidak muncul', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:33:40', NULL),
('ITK-111020-0008', 'Error Input', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:33:46', NULL),
('ITK-111020-0009', 'Fasilitas user aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:33:54', NULL),
('ITK-111020-0010', 'Fitur', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:33:59', NULL),
('ITK-111020-0011', 'Lokasi tidak muncul', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:05', NULL),
('ITK-111020-0012', 'MS Office', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:09', NULL),
('ITK-111020-0013', 'Nama user berubah', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:14', NULL),
('ITK-111020-0014', 'Nomor antrian tidak muncul', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:19', NULL),
('ITK-111020-0015', 'Query time out', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:24', NULL),
('ITK-111020-0016', 'Server tidak dapat diakses', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:29', NULL),
('ITK-111020-0017', 'Tidak bisa print', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:34', NULL),
('ITK-111020-0018', 'Cloud Print Expired', 'Achmad Agus Hadiyanto', 'Admin LST-DC', '2020-10-11 18:34:40', '2020-11-27 16:30:20'),
('ITK-111020-0019', 'Cloud Print tidak dapat diakses', 'Achmad Agus Hadiyanto', 'Admin LST-DC', '2020-10-11 18:34:47', '2020-11-27 16:30:40'),
('ITK-111020-0020', 'Pembangunan aplikasi baru', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:53', NULL),
('ITK-111020-0021', 'Perubahan/Perbaikan aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:34:59', NULL),
('ITK-111020-0022', 'Pengakhiran aplikasi (retirement)', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:35:04', NULL),
('ITK-111020-0023', 'Bunyi Beep', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:13', NULL),
('ITK-111020-0024', 'Fitur Sistem Operasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:19', NULL),
('ITK-111020-0025', 'Server down', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:24', NULL),
('ITK-111020-0026', 'Server Backup', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:36', NULL),
('ITK-111020-0027', 'Akses VPN', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:41', NULL),
('ITK-111020-0028', 'IP terblokir', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:46', NULL),
('ITK-111020-0029', 'Network down', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:53', NULL),
('ITK-111020-0030', 'AC', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:36:58', NULL),
('ITK-111020-0031', 'Akses user database', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:03', NULL),
('ITK-111020-0032', 'Backup belum tersinkronisasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:09', NULL),
('ITK-111020-0033', 'Database penuh', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:14', NULL),
('ITK-111020-0034', 'Database tidak dapat diakses', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:20', NULL),
('ITK-111020-0035', 'Database tidak responsif', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:29', NULL),
('ITK-111020-0036', 'Warning Backup', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:34', NULL),
('ITK-111020-0037', 'Anti Virus', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:43', NULL),
('ITK-111020-0038', 'PC Firewall', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:47', NULL),
('ITK-111020-0039', 'Pop-up Blocker', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:52', NULL),
('ITK-111020-0040', 'Anti Spam', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:37:57', NULL),
('ITK-111020-0041', 'Anti Malware', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:02', NULL),
('ITK-111020-0042', 'Firewall', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:11', NULL),
('ITK-111020-0043', 'Proxy Server', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:16', NULL),
('ITK-111020-0044', 'Intrusion Detection System', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:36', NULL),
('ITK-111020-0045', 'Intrusion Prevention System', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:43', NULL),
('ITK-111020-0046', 'Log Correlation', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:38:48', NULL),
('ITK-111020-0047', 'Aplikasi tidak dapat diakses', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:39:10', NULL),
('ITK-111020-0048', 'Aplikasi tidak responsif', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:39:19', NULL),
('ITK-111020-0049', 'Akses telekomunikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:27', NULL),
('ITK-111020-0050', 'Lisensi software tertentu', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:33', NULL),
('ITK-111020-0051', 'Email', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:38', NULL),
('ITK-111020-0052', 'Internet', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:43', NULL),
('ITK-111020-0053', 'Layanan hak akses', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:52', NULL),
('ITK-111020-0054', 'Layanan teleworking', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:41:57', NULL),
('ITK-111020-0055', 'Penyiapan Desktop dan Jaringan', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:42:03', NULL),
('ITK-111020-0056', 'Penyediaan raw data', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:42:37', NULL),
('ITK-111020-0057', 'Backup data', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:42:43', NULL),
('ITK-271120-0001', 'GW Cloud Expired', 'Achmad Agus Hadiyanto', NULL, '2020-11-27 16:30:55', NULL),
('ITK-271120-0002', 'Tabel Database', 'Achmad Agus Hadiyanto', NULL, '2020-11-27 16:31:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_item_layanan`
--

CREATE TABLE `master_item_layanan` (
  `id_item_layanan` varchar(20) NOT NULL,
  `nama_item_layanan` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `diubah_oleh` varchar(50) NOT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT current_timestamp(),
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_item_layanan`
--

INSERT INTO `master_item_layanan` (`id_item_layanan`, `nama_item_layanan`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('ILY-191120-0001', 'SIMDA Keuangan', 'Achmad Agus Hadiyanto', '', '2020-11-19 11:56:18', NULL),
('ILY-191120-0002', 'SIMDA BMD', 'Achmad Agus Hadiyanto', '', '2020-11-19 11:56:23', NULL),
('ILY-191120-0003', 'SIM Pendapatan', 'Achmad Agus Hadiyanto', '', '2020-11-19 11:56:33', NULL),
('ILY-191120-0004', 'Sitanti', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 11:56:39', '2020-11-24 14:15:22'),
('ILY-191120-0005', 'SIMEDIKA RS', 'Achmad Agus Hadiyanto', '', '2020-11-19 11:56:58', NULL),
('ILY-191120-0006', 'SIMEDIKA PUSKESMAS', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 11:57:11', '2020-11-19 14:10:02'),
('ILY-191120-0007', 'ASKEPCLOUD', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 11:57:21', '2020-11-19 14:10:28'),
('ILY-191120-0008', 'PPOB', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:01:39', NULL),
('ILY-191120-0009', 'Remiten', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:02:21', NULL),
('ILY-191120-0010', 'CMS', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:02:42', NULL),
('ILY-191120-0011', 'Internet Banking', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 12:03:38', '2020-11-19 12:04:27'),
('ILY-191120-0012', 'Mobile Banking', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 12:03:55', '2020-11-19 12:04:36'),
('ILY-191120-0013', 'VPS Ritel', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:06:11', NULL),
('ILY-191120-0014', 'VPS Corporate', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:06:27', NULL),
('ILY-191120-0015', 'Link Jaringan', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 12:07:19', '2020-11-24 14:20:30'),
('ILY-191120-0016', 'Software Licence', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:07:36', NULL),
('ILY-191120-0017', 'Data Center', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:07:45', NULL),
('ILY-191120-0018', 'Colocation', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 12:09:17', '2020-11-24 14:13:35'),
('ILY-191120-0019', 'Dedicated', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:09:25', NULL),
('ILY-191120-0020', 'SMS Masking', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:10:32', NULL),
('ILY-191120-0021', 'APM', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:11:33', NULL),
('ILY-191120-0022', 'Lainnya', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:12:00', NULL),
('ILY-191120-0023', 'SIMGAJI', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:07:50', NULL),
('ILY-191120-0024', 'SIMPATDA', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:08:25', NULL),
('ILY-191120-0025', 'SIMBOS', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:09:02', NULL),
('ILY-191120-0026', 'SIMBLUD', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:09:23', NULL),
('ILY-191120-0027', 'SIMKEUDES', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:10:45', NULL),
('ILY-191120-0028', 'SISMIOP', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:14:21', NULL),
('ILY-191120-0029', 'SIMDAREN', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:14:55', NULL),
('ILY-191120-0030', 'LPSE', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:15:46', NULL),
('ILY-191120-0031', 'SP2D Online', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:17:12', NULL),
('ILY-191120-0032', 'SIMPERSEDIAAN', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:17:45', NULL),
('ILY-191120-0033', 'SMEP', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:18:32', NULL),
('ILY-191120-0034', 'PROTASIK', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:19:02', NULL),
('ILY-191120-0035', 'SIMBADA', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:20:15', NULL),
('ILY-191120-0036', 'e-Reporting', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:21:02', NULL),
('ILY-191120-0037', 'SIPONKUDA', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:21:31', NULL),
('ILY-191120-0038', 'SIM PBB ONLINE', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:21:49', NULL),
('ILY-191120-0039', 'SIMCAN', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:22:25', NULL),
('ILY-191120-0040', 'TNDE', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:23:26', NULL),
('ILY-191120-0041', 'SITA', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:23:54', NULL),
('ILY-191120-0042', 'e-MONEV', 'Achmad Agus Hadiyanto', '', '2020-11-19 13:25:12', NULL),
('ILY-191120-0043', 'SIDIA', 'Achmad Agus Hadiyanto', '', '2020-11-19 14:08:24', NULL),
('ILY-191120-0044', 'SIM KINERJA', 'Achmad Agus Hadiyanto', '', '2020-11-19 14:08:57', NULL),
('ILY-191120-0045', 'SISALSA', 'Achmad Agus Hadiyanto', '', '2020-11-19 14:09:14', NULL),
('ILY-241120-0001', 'e-Office', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:14:32', NULL),
('ILY-241120-0002', 'BARANG & JASA', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:16:51', NULL),
('ILY-241120-0003', 'Cpanel', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:17:39', NULL),
('ILY-241120-0004', 'IP (Internet Protocol)', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:18:20', NULL),
('ILY-241120-0005', 'ATKP', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:18:31', NULL),
('ILY-241120-0006', 'Pengadaan Barang', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:18:46', NULL),
('ILY-241120-0007', 'Manage Service', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:18:57', NULL),
('ILY-241120-0008', 'Simpus', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:19:24', NULL),
('ILY-241120-0009', 'VPS', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:21:20', NULL),
('ILY-241120-0010', 'KONEKSI JATENG', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:23:40', NULL),
('ILY-241120-0011', 'SERVER', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:24:31', NULL),
('ILY-241120-0012', 'SIMPAT', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:26:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `id_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id_jabatan`, `nama_jabatan`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('JBT-300920-0001', 'Direktur Utama', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:06', NULL),
('JBT-300920-0002', 'Direktur Operasional', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:13', NULL),
('JBT-300920-0003', 'Direktur Teknis', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:20', NULL),
('JBT-300920-0004', 'General Manager', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:27', NULL),
('JBT-300920-0005', 'Administrasi', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:35', NULL),
('JBT-300920-0006', 'Sys-Admin', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:42', NULL),
('JBT-300920-0007', 'NOC-Purchase', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:07:53', NULL),
('JBT-300920-0008', 'NOC-Asset', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:00', NULL),
('JBT-300920-0009', 'NOC-Networking', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:08', NULL),
('JBT-300920-0010', 'NOC-Monitoring', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:15', NULL),
('JBT-300920-0011', 'Programer', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:21', NULL),
('JBT-300920-0012', 'Driver - Umum', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:28', NULL),
('JBT-300920-0013', 'Support - Umum', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:34', NULL),
('JBT-300920-0014', 'Kepala Cabang', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:41', NULL),
('JBT-300920-0015', 'Sys-Admin Outside', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:47', NULL),
('JBT-300920-0016', 'Production Manager', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:53', NULL),
('JBT-300920-0017', 'NOC - Field', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:08:59', NULL),
('JBT-300920-0018', 'Admin Programmer', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:09:06', NULL),
('JBT-300920-0019', 'Tax & Finance', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:09:11', NULL),
('JBT-300920-0020', 'Magang Programer', 'Achmad Agus Hadiyanto', NULL, '2020-09-30 15:09:17', NULL),
('JBT-300920-0021', 'Network Technician', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 15:09:22', '2020-09-30 15:10:22');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_tiket`
--

CREATE TABLE `master_jenis_tiket` (
  `id_jenis_tiket` varchar(20) NOT NULL,
  `nama_jenis_tiket` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jenis_tiket`
--

INSERT INTO `master_jenis_tiket` (`id_jenis_tiket`, `nama_jenis_tiket`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('JTK-011020-0001', 'Insiden', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 10:37:00', '2020-10-04 16:24:26'),
('JTK-041020-0001', 'Insiden Keamanan Informasi', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 13:16:05', '2020-10-04 13:18:39'),
('JTK-041020-0002', 'Permintaan Layanan', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 16:21:15', '2020-10-04 16:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `master_klasifikasi`
--

CREATE TABLE `master_klasifikasi` (
  `id_klasifikasi` varchar(20) NOT NULL,
  `nama_klasifikasi` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_klasifikasi`
--

INSERT INTO `master_klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('KLS-011020-0001', 'Aplikasi', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 13:13:31', '2020-11-19 17:18:54'),
('KLS-011020-0002', 'Data dan Informasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:13:43', NULL),
('KLS-011020-0003', 'Server', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:13:51', NULL),
('KLS-011020-0004', 'Persiapan Event', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:00', NULL),
('KLS-011020-0005', 'Hak Akses', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:09', NULL),
('KLS-011020-0006', 'Komunikasi Kolaborasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:18', NULL),
('KLS-011020-0007', 'Lisensi software', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:25', NULL),
('KLS-011020-0008', 'Telekomunikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:32', NULL),
('KLS-011020-0009', 'Client Side', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:39', NULL),
('KLS-011020-0010', 'Server Side & Data Center', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:47', NULL),
('KLS-011020-0011', 'Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:14:57', NULL),
('KLS-011020-0012', 'Facility', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:15:15', NULL),
('KLS-011020-0013', 'Network', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 13:15:22', '2020-10-01 13:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `master_klien`
--

CREATE TABLE `master_klien` (
  `id_klien` varchar(20) NOT NULL,
  `nama_klien` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `diubah_oleh` varchar(50) NOT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_klien`
--

INSERT INTO `master_klien` (`id_klien`, `nama_klien`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('KLI-191120-0001', 'CV. Mulya Sari Putri', 'Achmad Agus Hadiyanto', '', '2020-11-19 12:16:03', NULL),
('KLI-241120-0001', 'Direktorat Jendral Bina Pemerintahan Desa', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:03:23', NULL),
('KLI-241120-0002', 'RSUD MGR. GABRIEL MANEK, SVD ATAMBUA', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:03:31', NULL),
('KLI-241120-0003', 'PT. Belant Persada', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:03:37', NULL),
('KLI-241120-0004', 'CV Sari Bhakti Meening', 'Achmad Agus Hadiyanto', '', '2020-11-24 14:03:43', NULL),
('KLI-241120-0005', 'Internal Lawang Sewu', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-24 14:05:03', '2020-11-24 14:05:18'),
('KLI-300920-0001', 'Kabupaten Probolinggo', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 13:20:32', '2020-10-01 23:57:25'),
('KLI-300920-0002', 'Kabupaten Jember', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-09-30 13:24:42', '2020-09-30 14:19:44'),
('KLI-300920-0003', 'Kabupaten Tasikmalaya', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:28:56', NULL),
('KLI-300920-0004', 'Kabupaten Klaten', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:04', NULL),
('KLI-300920-0005', 'Kabupaten Berau', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:09', NULL),
('KLI-300920-0006', 'Kabupaten Wonosobo', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:14', NULL),
('KLI-300920-0007', 'Kabupaten Bangka', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:19', NULL),
('KLI-300920-0008', 'Kabupaten Brebes', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:25', NULL),
('KLI-300920-0009', 'Kabupaten Oku', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:30', NULL),
('KLI-300920-0010', 'Kabupaten Purbalingga', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:37', NULL),
('KLI-300920-0011', 'Kabupaten Sumba Timur', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:42', NULL),
('KLI-300920-0012', 'Kabupaten Oku Timur', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:47', NULL),
('KLI-300920-0013', 'Kabupaten Tegal', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:52', NULL),
('KLI-300920-0014', 'Kabupaten Klungkung', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:29:57', NULL),
('KLI-300920-0015', 'Kabupaten Pemalang', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:02', NULL),
('KLI-300920-0016', 'Kabupaten Pali', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:06', NULL),
('KLI-300920-0017', 'Kabupaten Mojokerto', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:13', NULL),
('KLI-300920-0018', 'Kabupaten Sukabumi', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:18', NULL),
('KLI-300920-0019', 'Kabupaten Cilacap', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:22', NULL),
('KLI-300920-0020', 'Kabupaten Slawi', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:27', NULL),
('KLI-300920-0021', 'Kabupaten Kutai Barat', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:32', NULL),
('KLI-300920-0022', 'Kabupaten Bulungan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:37', NULL),
('KLI-300920-0023', 'Kabupaten Kutai Kartanegara', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:42', NULL),
('KLI-300920-0024', 'Kabupaten Samarinda', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:46', NULL),
('KLI-300920-0025', 'Kabupaten Nunukan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:50', NULL),
('KLI-300920-0026', 'Kabupaten Malinau', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:30:56', NULL),
('KLI-300920-0027', 'Kabupaten Tana Tidung', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:00', NULL),
('KLI-300920-0028', 'Kabupaten Paser', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:05', NULL),
('KLI-300920-0029', 'Kabupaten Kutai Timur', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:09', NULL),
('KLI-300920-0030', 'Kabupaten Penajam', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:14', NULL),
('KLI-300920-0031', 'Kabupaten Bontang', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:19', NULL),
('KLI-300920-0032', 'Kabupaten Balikpapan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:24', NULL),
('KLI-300920-0033', 'Kabupaten Tarakan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:28', NULL),
('KLI-300920-0034', 'Kabupaten Kaltim', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:32', NULL),
('KLI-300920-0035', 'Kabupaten Kaltara', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:37', NULL),
('KLI-300920-0036', 'Bank BPD Kaltim ( 16 Kabupaten Kaltim)', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:41', NULL),
('KLI-300920-0037', 'Kabupaten Pasuruan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:46', NULL),
('KLI-300920-0038', 'Kabupaten Tanah Laut', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:50', NULL),
('KLI-300920-0039', 'Kabupaten Banjarnegara', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:55', NULL),
('KLI-300920-0040', 'Kabupaten Cianjur', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:31:59', NULL),
('KLI-300920-0041', 'Kabupaten Landak', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:04', NULL),
('KLI-300920-0042', 'Kabupaten Blitar', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:10', NULL),
('KLI-300920-0043', 'Kabupaten Pelaihari', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:15', NULL),
('KLI-300920-0044', 'Kabupaten Kuburaya', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:19', NULL),
('KLI-300920-0045', 'Kabupaten Hulu Sungai Selatan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:24', NULL),
('KLI-300920-0046', 'Kabupaten Belu', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:29', NULL),
('KLI-300920-0047', 'Kabupaten Mempawah', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:34', NULL),
('KLI-300920-0048', 'Kabupaten Tapin', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:39', NULL),
('KLI-300920-0049', 'Kabupaten Bandung Barat', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:43', NULL),
('KLI-300920-0050', 'Kabupaten Serang', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:48', NULL),
('KLI-300920-0051', 'Bank Jateng', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:53', NULL),
('KLI-300920-0052', 'Kabupaten Naganraya', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:32:58', NULL),
('KLI-300920-0053', 'Kabupaten Simeulue', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:02', NULL),
('KLI-300920-0054', 'Kabupaten Buru', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:07', NULL),
('KLI-300920-0055', 'Tasikmalaya Kota', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:11', NULL),
('KLI-300920-0056', 'Jawan Tengah', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:16', NULL),
('KLI-300920-0057', 'IMMOBI', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:32', NULL),
('KLI-300920-0058', 'Kabupaten Balangan', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:36', NULL),
('KLI-300920-0059', 'Kabupaten Lebak', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:41', NULL),
('KLI-300920-0060', 'Kabupaten Tanah Bumbu', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:45', NULL),
('KLI-300920-0061', 'Kabupaten Bombana', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:49', NULL),
('KLI-300920-0062', 'Tifa Finance', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:53', NULL),
('KLI-300920-0063', 'Flores  Timur', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:33:57', NULL),
('KLI-300920-0064', 'PT. Cybertechtonic Pratama', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:02', NULL),
('KLI-300920-0065', 'PT. Agara Cipta Mandiri', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:07', NULL),
('KLI-300920-0066', 'Balai Besar Karantina Ikan Soekarno-Hatta', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:11', NULL),
('KLI-300920-0067', 'Kemendagri/WorlBank', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:16', NULL),
('KLI-300920-0069', 'PT. Tangara Mitrakom', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:27', NULL),
('KLI-300920-0070', 'RSUD Palabuhanratu', 'Achmad Agus Hadiyanto', '', '2020-09-30 21:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_layanan`
--

CREATE TABLE `master_layanan` (
  `id_layanan` varchar(20) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_layanan`
--

INSERT INTO `master_layanan` (`id_layanan`, `nama_layanan`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('LYN-191120-0001', 'SAAS', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-11-19 10:49:11', '2020-11-19 17:14:59'),
('LYN-191120-0002', 'Kesehatan', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:56:48', NULL),
('LYN-191120-0003', 'Transaction Channel', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:01:21', NULL),
('LYN-191120-0004', 'IAAS', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:05:18', NULL),
('LYN-191120-0005', 'Manage Service', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:07:11', NULL),
('LYN-191120-0006', 'Data Center', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:09:08', NULL),
('LYN-191120-0007', 'Infrastruktur', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:10:04', NULL),
('LYN-191120-0008', 'Telekomunikasi', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:10:20', NULL),
('LYN-191120-0009', 'Software Development', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:11:03', NULL),
('LYN-191120-0010', 'Konsultasi', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:11:17', NULL),
('LYN-191120-0011', 'Lainnya', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:11:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_penyebab_utama`
--

CREATE TABLE `master_penyebab_utama` (
  `id_penyebab` varchar(20) NOT NULL,
  `nama_penyebab` text NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_penyebab_utama`
--

INSERT INTO `master_penyebab_utama` (`id_penyebab`, `nama_penyebab`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('PYB-011020-0001', 'Spoofing', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:35:46', '2020-10-01 14:37:12'),
('PYB-011020-0002', 'Tampering', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:37:21', NULL),
('PYB-011020-0003', 'Repudiation', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:37:26', NULL),
('PYB-011020-0004', 'Denial of Service', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:37:57', NULL),
('PYB-011020-0005', 'Escalation Privilege', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:02', NULL),
('PYB-011020-0006', 'Procedure/process violation', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:38:09', '2020-10-01 14:38:21'),
('PYB-011020-0007', 'Procedure/process exception', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:15', NULL),
('PYB-011020-0008', 'Planned Maintenance Failure', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:26', NULL),
('PYB-011020-0009', 'Unplanned Maintenance Failure', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:30', NULL),
('PYB-011020-0010', 'Data Processing Error', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:35', NULL),
('PYB-011020-0011', 'Unknown Error', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:38:39', NULL),
('PYB-011020-0012', 'Won\'t Fix Bug', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:25', NULL),
('PYB-011020-0013', 'By Design', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:30', NULL),
('PYB-011020-0014', 'Lack of Knowledge', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:35', NULL),
('PYB-011020-0015', 'Hardware Malfunction', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:39', NULL),
('PYB-011020-0016', 'Lost or Missing', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:44', NULL),
('PYB-011020-0017', 'Software Malfunction', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:48', NULL),
('PYB-011020-0018', 'Akses DB Unlimited', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:52', NULL),
('PYB-011020-0019', 'Akses User belum terdaftar', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:39:58', NULL),
('PYB-011020-0020', 'Antivirus', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:03', NULL),
('PYB-011020-0021', 'Akses belum terhubung dengan Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:08', NULL),
('PYB-011020-0022', 'Database belum diinstall', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:12', NULL),
('PYB-011020-0023', 'Database belum diupdate', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:16', NULL),
('PYB-011020-0024', 'Dvs control bermasalah', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:22', NULL),
('PYB-011020-0025', 'File Upload besar', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:27', NULL),
('PYB-011020-0026', 'Fitur Aplikasi Simbada', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:31', NULL),
('PYB-011020-0027', 'Gangguan internet di customer', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:37', NULL),
('PYB-011020-0028', 'Gangguan internet di provider LST', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:41', NULL),
('PYB-011020-0029', 'Gangguan network H2H', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:46', NULL),
('PYB-011020-0030', 'Gangguan user console MMC', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:51', NULL),
('PYB-011020-0031', 'Gwcloud expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:40:56', NULL),
('PYB-011020-0032', 'harddisk malfunction', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:01', NULL),
('PYB-011020-0033', 'Intemittent network connection', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:18', NULL),
('PYB-011020-0034', 'IP diblokir', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:22', NULL),
('PYB-011020-0035', 'IP duplikat', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:26', NULL),
('PYB-011020-0036', 'Kapasitas Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:30', NULL),
('PYB-011020-0037', 'Kapasitas Server', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:34', NULL),
('PYB-011020-0038', 'Koneksi VPN terputus', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:39', NULL),
('PYB-011020-0039', 'Konfigurasi jaringan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:45', NULL),
('PYB-011020-0040', 'Konfigurasi sinkronisasi Database belum lengkap', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:50', NULL),
('PYB-011020-0041', 'Koordinasi dengan LKPP', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:53', NULL),
('PYB-011020-0042', 'Lisensi RDP expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:41:58', NULL),
('PYB-011020-0043', 'log query besar', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:03', NULL),
('PYB-011020-0044', 'Looping VLAN', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:08', NULL),
('PYB-011020-0045', 'MS Office tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:12', NULL),
('PYB-011020-0046', 'NTP belum diterapkan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:17', NULL),
('PYB-011020-0047', 'Ongoing sinkronisasi Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:21', NULL),
('PYB-011020-0048', 'Password user DBMS expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:25', NULL),
('PYB-011020-0049', 'Penambahan LUN storage', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:29', NULL),
('PYB-011020-0050', 'Perubahan akses user password DBMS', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:34', NULL),
('PYB-011020-0051', 'Perubahan internet di customer', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:40', NULL),
('PYB-011020-0052', 'Perubahan konfigurasi aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:44', NULL),
('PYB-011020-0053', 'Perubahan tampilan karena user tidak logout', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:49', NULL),
('PYB-011020-0054', 'Perubahan user password', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:53', NULL),
('PYB-011020-0055', 'Port belum terdaftar', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:42:57', NULL),
('PYB-011020-0056', 'Port server disable', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:05', NULL),
('PYB-011020-0057', 'Port web service digunakan aplikasi lain', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:12', NULL),
('PYB-011020-0058', 'Printer belum diinstal', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:19', NULL),
('PYB-011020-0059', 'Problem PC client', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:47', NULL),
('PYB-011020-0060', 'Propagasi domain', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:52', NULL),
('PYB-011020-0061', 'qsync tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:43:57', NULL),
('PYB-011020-0062', 'Query time out - log database besar', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:01', NULL),
('PYB-011020-0063', 'qsync tidak jalan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:06', NULL),
('PYB-011020-0064', 'Router bridge down', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:10', NULL),
('PYB-011020-0065', 'Router tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:15', NULL),
('PYB-011020-0066', 'Server tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:20', NULL),
('PYB-011020-0067', 'Server tidak mendapatkan IP address', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:26', NULL),
('PYB-011020-0068', 'Server / Client terblokir di antivirus', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:32', NULL),
('PYB-011020-0069', 'Server / Client terblokir di firewall RDS Knight', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:36', NULL),
('PYB-011020-0070', 'Setting ukuran kertas', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:40', NULL),
('PYB-011020-0071', 'Sinkronisasi Database belum diaktifkan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:48', NULL),
('PYB-011020-0072', 'Sinkronisasi Database belum diaktifkan dengan user', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:52', NULL),
('PYB-011020-0073', 'Sinkronisasi Database tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:44:57', NULL),
('PYB-011020-0074', 'Sistem Operasi belum diaktivasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:01', NULL),
('PYB-011020-0075', 'Topologi sistem', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:09', NULL),
('PYB-011020-0076', 'Tsplus expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:13', NULL),
('PYB-011020-0077', 'Tsplus limited', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:19', NULL),
('PYB-011020-0078', 'Tsplus update (close port)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:25', NULL),
('PYB-011020-0079', 'Tsprint belum diinstal', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:29', NULL),
('PYB-011020-0080', 'Tsprint expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:33', NULL),
('PYB-011020-0081', 'Tsprint fitur', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:38', NULL),
('PYB-011020-0082', 'Tsprint tidak aktif', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:43', NULL),
('PYB-011020-0083', 'Uncontrolled incident', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:48', NULL),
('PYB-011020-0084', 'Unexplained', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:45:55', NULL),
('PYB-011020-0085', 'Unexplained - Akses user', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:00', NULL),
('PYB-011020-0086', 'Unexplained - Fasilitas User', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:05', NULL),
('PYB-011020-0087', 'Unexplained - Fasilitas User (delete user)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:08', NULL),
('PYB-011020-0088', 'Unexplained - Fitur Aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:12', NULL),
('PYB-011020-0089', 'Unexplained - Gangguan aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:16', NULL),
('PYB-011020-0090', 'Unexplained - Gangguan Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:20', NULL),
('PYB-011020-0091', 'Unexplained - Gangguan Database (restart service)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:24', NULL),
('PYB-011020-0092', 'Unexplained - Gangguan Database (stop encrypt data', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:29', NULL),
('PYB-011020-0093', 'Unexplained - Gangguan Facility', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:34', NULL),
('PYB-011020-0094', 'Unexplained - Gangguan interface/port (restart)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:38', NULL),
('PYB-011020-0095', 'Unexplained - Gangguan Network', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:43', NULL),
('PYB-011020-0096', 'Unexplained - Gangguan Network (reenable rule fire', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:47', NULL),
('PYB-011020-0097', 'Unexplained - Gangguan Network (restart router)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:52', NULL),
('PYB-011020-0098', 'Unexplained - Gangguan print (revert snapshot)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:46:56', NULL),
('PYB-011020-0099', 'Unexplained - Gangguan server', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:47:00', NULL),
('PYB-011020-0100', 'Unexplained - Gangguan server (restart)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:47:06', NULL),
('PYB-011020-0101', 'Unexplained - Gangguan sistem operasi (logoff user', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:47:11', NULL),
('PYB-011020-0102', 'Unexplained - Gangguan tsprint (reinstall)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:48:55', NULL),
('PYB-011020-0103', 'Unexplained - Gangguan tsprint (restart)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:01', NULL),
('PYB-011020-0104', 'Unexplained - Gangguan VPN (restart router)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:06', NULL),
('PYB-011020-0105', 'Unexplained - Gangguan web service (restart)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:11', NULL),
('PYB-011020-0106', 'Unexplained - logoff user', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:16', NULL),
('PYB-011020-0107', 'Unexplained - Sinkronisasi Database', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:20', NULL),
('PYB-011020-0108', 'Untag di dalam port tagging sw 14 port 6', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:24', NULL),
('PYB-011020-0109', 'User belum diberikan fasilitas aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:29', NULL),
('PYB-011020-0110', 'User belum didaftarkan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:33', NULL),
('PYB-011020-0111', 'User belum digrupkan sebagai administrator', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:37', NULL),
('PYB-011020-0112', 'User belum logoff setelah menggunakan aplikasi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:41', NULL),
('PYB-011020-0113', 'User dan Password API berubah', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:46', NULL),
('PYB-011020-0114', 'User password expired', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:52', NULL),
('PYB-011020-0115', 'User terkunci (tidak bisa login)', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:49:56', NULL),
('PYB-011020-0116', 'User terkunci (tidak bisa login) ketika koneksi terputus', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:50:01', NULL),
('PYB-011020-0117', 'Utilitas resource Server Tinggi', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:50:06', NULL),
('PYB-011020-0118', 'Virus', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:50:11', NULL),
('PYB-011020-0119', 'VPN didisable oleh user', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:50:17', NULL),
('PYB-011020-0120', 'Web Service belum di aktifkan', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 14:50:22', NULL),
('PYB-251120-0001', 'Pembuatan Server', 'Khotibul Umam', NULL, '2020-11-25 11:56:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_prioritas`
--

CREATE TABLE `master_prioritas` (
  `id_prioritas` varchar(20) NOT NULL,
  `nama_prioritas` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `durasi_waktu` int(5) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_prioritas`
--

INSERT INTO `master_prioritas` (`id_prioritas`, `nama_prioritas`, `deskripsi`, `durasi_waktu`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('PRI-011020-0001', 'Prioritas 1', 'maksimal penyelesaian incident 4 jam', 4, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:07:54', '2020-10-15 10:12:05'),
('PRI-011020-0002', 'Prioritas 2', 'maksimal penyelesaian incident 24 jam', 24, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:08:01', '2020-10-15 10:11:53'),
('PRI-011020-0003', 'Prioritas 3', 'maksimal penyelesaian incident 48 jam', 48, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:08:08', '2020-10-15 10:11:46'),
('PRI-011020-0004', 'Prioritas 4', 'maksimal penyelesaian incident 3 hari kerja', 72, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:08:14', '2020-10-15 10:11:24'),
('PRI-011020-0005', 'Prioritas 5', 'penyelesaian dengan upaya terbaik (best effort basis)', 0, 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 14:08:23', '2020-10-15 10:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `master_shift`
--

CREATE TABLE `master_shift` (
  `id_shift` varchar(20) NOT NULL,
  `nama_shift` varchar(20) NOT NULL,
  `jam_masuk_shift` time DEFAULT NULL,
  `jam_keluar_shift` time DEFAULT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_shift`
--

INSERT INTO `master_shift` (`id_shift`, `nama_shift`, `jam_masuk_shift`, `jam_keluar_shift`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SHF-071020-0001', 'Pagi - Sore', '07:00:00', '15:00:00', 'Achmad Agus Hadiyanto', NULL, '2020-10-07 10:06:34', NULL),
('SHF-071020-0002', 'Sore - Malam', '15:00:00', '23:00:00', 'Achmad Agus Hadiyanto', NULL, '2020-10-07 10:07:06', NULL),
('SHF-071020-0003', 'Malam - Pagi', '23:00:00', '07:00:00', 'Achmad Agus Hadiyanto', NULL, '2020-10-07 10:12:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_status_tiket`
--

CREATE TABLE `master_status_tiket` (
  `id_status_tiket` varchar(20) NOT NULL,
  `nama_status` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_status_tiket`
--

INSERT INTO `master_status_tiket` (`id_status_tiket`, `nama_status`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('STK-091020-0001', 'Open', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:21:38', NULL),
('STK-091020-0002', 'Closed', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:22:03', NULL),
('STK-091020-0003', 'Closed Resolved with Permanent Solution', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:22:41', NULL),
('STK-091020-0004', 'Closed Resolved with Temporary Solution', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:22:54', NULL),
('STK-091020-0005', 'Closed Unresolved', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:23:11', NULL),
('STK-091020-0006', 'Cancelled', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:23:21', NULL),
('STK-091020-0007', 'Closed and Deferred Non-LST Service', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:23:37', NULL),
('STK-091020-0008', 'Escalated to Problem Management', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:23:47', NULL),
('STK-091020-0009', 'In Progress', 'Achmad Agus Hadiyanto', NULL, '2020-10-09 19:24:00', NULL),
('STK-121020-0001', 'Closed and Resolved with Permanent Solution', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:51:53', NULL),
('STK-121020-0002', 'Closed and Resolved with Temporary Solution', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:52:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_urgency`
--

CREATE TABLE `master_urgency` (
  `id_urgency` varchar(20) NOT NULL,
  `nama_urgency` varchar(50) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_urgency`
--

INSERT INTO `master_urgency` (`id_urgency`, `nama_urgency`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('URG-011020-0001', 'High Urgency', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:51:39', NULL),
('URG-011020-0002', 'Medium Urgency', 'Achmad Agus Hadiyanto', NULL, '2020-10-01 13:51:47', NULL),
('URG-011020-0003', 'Low Urgency', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-01 13:51:54', '2020-10-01 13:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(29, 1, 29),
(44, 6, 1),
(45, 6, 5),
(46, 6, 6),
(52, 1, 31),
(55, 1, 33),
(56, 1, 30),
(57, 1, 32),
(58, 1, 34),
(60, 1, 35),
(61, 1, 36),
(67, 6, 30),
(70, 6, 32),
(71, 1, 37),
(74, 1, 37),
(78, 6, 37),
(79, 1, 38),
(80, 1, 39),
(81, 6, 38),
(82, 6, 39),
(83, 5, 1),
(84, 5, 5),
(85, 5, 6),
(86, 5, 38),
(87, 5, 39),
(88, 4, 1),
(89, 4, 5),
(90, 4, 6),
(91, 4, 38),
(92, 4, 39),
(94, 1, 40),
(95, 6, 40),
(96, 5, 40),
(97, 4, 40),
(98, 7, 1),
(99, 7, 5),
(100, 7, 6),
(101, 7, 7),
(102, 7, 8),
(103, 7, 9),
(104, 7, 10),
(105, 7, 11),
(106, 7, 12),
(107, 7, 13),
(108, 7, 14),
(109, 7, 15),
(110, 7, 16),
(111, 7, 17),
(112, 7, 18),
(113, 7, 19),
(114, 7, 20),
(115, 7, 21),
(116, 7, 22),
(117, 7, 23),
(118, 7, 25),
(119, 7, 26),
(121, 1, 41),
(122, 7, 31),
(123, 7, 34),
(124, 7, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran_tiket_masuk`
--

CREATE TABLE `tbl_lampiran_tiket_masuk` (
  `id_lampiran` bigint(20) NOT NULL,
  `no_tiket` varchar(20) NOT NULL,
  `lampiran_tiket_keluhan_masuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lampiran_update_tiket_penanganan`
--

CREATE TABLE `tbl_lampiran_update_tiket_penanganan` (
  `id_lampiran_update` bigint(20) NOT NULL,
  `no_tiket` varchar(20) NOT NULL,
  `lampiran_update_tiket_penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_user` varchar(255) NOT NULL,
  `log_tipe` int(11) NOT NULL,
  `log_desc` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `info_browser` varchar(500) NOT NULL,
  `aksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Dashboard', 'beranda', 'fa  fa-home', 0, 'Aktif'),
(2, 'Management Menu', 'kelolamenu', 'fa  fa-server', 0, 'Aktif'),
(3, 'Management Pengguna', 'user', 'fa fa-user-o', 0, 'Aktif'),
(4, 'Level Pengguna', 'userlevel', 'fa fa-users', 0, 'Aktif'),
(5, 'Ganti Profile', 'ganti_profile', 'fa fa-profile', 0, 'Tidak Aktif'),
(6, 'Ganti Password', 'ganti_password', 'fa fa-key', 0, 'Tidak Aktif'),
(7, 'Master Data', '#', 'fa fa-list', 0, 'Aktif'),
(8, 'M. Klien', 'master_klien', 'fa fa-database', 7, 'Aktif'),
(9, 'M. Layanan', 'master_layanan', 'fa fa-database', 7, 'Aktif'),
(10, 'M. Item Layanan', 'master_item_layanan', 'fa fa-database', 7, 'Aktif'),
(11, 'M. Jabatan', 'master_jabatan', 'fa fa-database', 7, 'Aktif'),
(12, 'M. Cabang', 'master_cabang', 'fa fa-database', 7, 'Aktif'),
(13, 'M. Jenis Tiket', 'master_jenis_tiket', 'fa fa-database', 7, 'Aktif'),
(14, 'M. Status Tiket', 'master_status_tiket', 'fa fa-database', 7, 'Aktif'),
(15, 'M. Admin Klien', 'master_admin_klien', 'fa fa-database', 7, 'Aktif'),
(16, 'M. Klasifikasi', 'master_klasifikasi', 'fa fa-database', 7, 'Aktif'),
(17, 'M. Dampak', 'master_dampak', 'fa fa-database', 7, 'Aktif'),
(18, 'M. Urgency', 'master_urgency', 'fa fa-database', 7, 'Aktif'),
(19, 'M. Prioritas', 'master_prioritas', 'fa fa-database', 7, 'Aktif'),
(20, 'M. Penyebab Utama', 'master_penyebab_utama', 'fa fa-database', 7, 'Aktif'),
(21, 'Sub data', '#', 'fa fa-list', 0, 'Aktif'),
(22, 'Sub Layanan', 'sub_layanan', 'fa fa-cog', 21, 'Aktif'),
(23, 'Sub Admin Klien', 'sub_admin_klien', 'fa fa-cog', 21, 'Aktif'),
(25, 'Sub Dampak Insiden', 'sub_dampak_insiden', 'fa fa-cog', 21, 'Aktif'),
(26, 'Sub Urgency Insiden', 'sub_urgency_insiden', 'fa fa-cog', 21, 'Aktif'),
(29, 'Helpdesk', '#', 'fa fa-list', 0, 'Tidak Aktif'),
(31, 'M. Shift', 'master_shift', 'fa fa-database', 7, 'Aktif'),
(33, 'Sub Klasifikasi', 'sub_klasifikasi', 'fa fa-cog', 21, 'Aktif'),
(34, 'M. Item Klasifikasi', 'master_item_klasifikasi', 'fa fa-database', 7, 'Aktif'),
(35, 'Sub Status Jenis Tiket', 'sub_status_jenis_tiket', 'fa fa-cog', 21, 'Aktif'),
(37, 'Buat Tiket', 'buat_tiket', 'fa fa-cog', 0, 'Aktif'),
(38, 'List Tiket Ongoing', 'list_tiket_ongoing', 'fa fa-cog', 0, 'Aktif'),
(39, 'List Tiket Closed', 'list_tiket_closed', 'fa fa-cog', 0, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_tiket`
--

CREATE TABLE `tbl_riwayat_tiket` (
  `id_riwayat_tiket` bigint(20) NOT NULL,
  `no_tiket` varchar(20) NOT NULL,
  `id_user_level_pembuat` int(10) NOT NULL,
  `dibuat_oleh` varchar(50) NOT NULL,
  `id_user_level_pengubah` int(10) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `id_status_tiket` varchar(20) NOT NULL,
  `tgl_dibuat` datetime DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL,
  `aksi` varchar(20) NOT NULL,
  `id_user_level` int(10) DEFAULT NULL,
  `penerima_tiket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_admin_klien`
--

CREATE TABLE `tbl_sub_admin_klien` (
  `id_sub_admin_klien` varchar(20) NOT NULL,
  `id_klien` varchar(20) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_admin_klien`
--

INSERT INTO `tbl_sub_admin_klien` (`id_sub_admin_klien`, `id_klien`, `id_admin`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SAK-021020-0001', 'KLI-300920-0001', 'ADM-300920-0103', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:17:34', NULL),
('SAK-021020-0002', 'KLI-300920-0001', 'ADM-300920-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:18:52', NULL),
('SAK-021020-0003', 'KLI-300920-0001', 'ADM-021020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:23:16', NULL),
('SAK-021020-0004', 'KLI-300920-0002', 'ADM-300920-0105', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:24:08', NULL),
('SAK-021020-0005', 'KLI-300920-0002', 'ADM-021020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:25:51', NULL),
('SAK-021020-0006', 'KLI-300920-0003', 'ADM-300920-0090', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:28:41', NULL),
('SAK-021020-0007', 'KLI-300920-0003', 'ADM-300920-0089', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:29:45', NULL),
('SAK-021020-0008', 'KLI-300920-0003', 'ADM-300920-0064', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:30:24', NULL),
('SAK-021020-0009', 'KLI-300920-0003', 'ADM-300920-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:31:25', NULL),
('SAK-021020-0010', 'KLI-300920-0004', 'ADM-021020-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:32:20', NULL),
('SAK-021020-0011', 'KLI-300920-0004', 'ADM-021020-0004', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:33:02', NULL),
('SAK-021020-0012', 'KLI-300920-0004', 'ADM-021020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:35:11', NULL),
('SAK-021020-0013', 'KLI-300920-0004', 'ADM-300920-0004', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:36:48', NULL),
('SAK-021020-0014', 'KLI-300920-0005', 'ADM-021020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:38:04', NULL),
('SAK-021020-0015', 'KLI-300920-0005', 'ADM-021020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:38:36', NULL),
('SAK-021020-0016', 'KLI-300920-0005', 'ADM-300920-0076', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:39:19', NULL),
('SAK-021020-0017', 'KLI-300920-0005', 'ADM-300920-0005', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:41:33', NULL),
('SAK-021020-0018', 'KLI-300920-0006', 'ADM-300920-0083', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:42:27', NULL),
('SAK-021020-0019', 'KLI-300920-0006', 'ADM-300920-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:44:27', NULL),
('SAK-021020-0020', 'KLI-300920-0007', 'ADM-300920-0085', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:45:17', NULL),
('SAK-021020-0021', 'KLI-300920-0007', 'ADM-300920-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:46:45', NULL),
('SAK-021020-0022', 'KLI-300920-0008', 'ADM-300920-0043', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:47:34', NULL),
('SAK-021020-0023', 'KLI-300920-0008', 'ADM-300920-0025', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:48:02', NULL),
('SAK-021020-0024', 'KLI-300920-0008', 'ADM-300920-0023', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:48:33', NULL),
('SAK-021020-0025', 'KLI-300920-0008', 'ADM-300920-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:48:52', NULL),
('SAK-021020-0026', 'KLI-300920-0009', 'ADM-300920-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:49:31', NULL),
('SAK-021020-0027', 'KLI-300920-0001', 'ADM-300920-0040', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:51:57', NULL),
('SAK-021020-0028', 'KLI-300920-0010', 'ADM-300920-0042', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:52:39', NULL),
('SAK-021020-0029', 'KLI-300920-0010', 'ADM-300920-0030', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:53:31', NULL),
('SAK-021020-0030', 'KLI-300920-0010', 'ADM-300920-0010', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:53:53', NULL),
('SAK-021020-0031', 'KLI-300920-0011', 'ADM-300920-0011', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:54:33', NULL),
('SAK-021020-0032', 'KLI-300920-0012', 'ADM-300920-0032', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 10:56:17', NULL),
('SAK-021020-0033', 'KLI-300920-0013', 'ADM-300920-0013', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:02:44', NULL),
('SAK-021020-0034', 'KLI-300920-0014', 'ADM-300920-0014', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:03:41', NULL),
('SAK-021020-0035', 'KLI-300920-0014', 'ADM-300920-0095', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:04:36', NULL),
('SAK-021020-0036', 'KLI-300920-0014', 'ADM-300920-0071', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:05:15', NULL),
('SAK-021020-0037', 'KLI-300920-0014', 'ADM-300920-0086', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:07:12', NULL),
('SAK-021020-0038', 'KLI-300920-0015', 'ADM-300920-0015', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:08:05', NULL),
('SAK-021020-0039', 'KLI-300920-0015', 'ADM-300920-0057', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:08:37', NULL),
('SAK-021020-0040', 'KLI-300920-0015', 'ADM-300920-0021', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:09:10', NULL),
('SAK-021020-0041', 'KLI-300920-0016', 'ADM-300920-0080', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:09:55', NULL),
('SAK-021020-0042', 'KLI-300920-0016', 'ADM-300920-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:10:37', NULL),
('SAK-021020-0043', 'KLI-300920-0017', 'ADM-300920-0070', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:12:09', NULL),
('SAK-021020-0044', 'KLI-300920-0017', 'ADM-300920-0104', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:12:35', NULL),
('SAK-021020-0045', 'KLI-300920-0017', 'ADM-300920-0101', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:12:55', NULL),
('SAK-021020-0046', 'KLI-300920-0017', 'ADM-300920-0038', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:13:28', NULL),
('SAK-021020-0047', 'KLI-300920-0018', 'ADM-300920-0108', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:14:17', NULL),
('SAK-021020-0048', 'KLI-300920-0018', 'ADM-300920-0093', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:15:08', NULL),
('SAK-021020-0049', 'KLI-300920-0018', 'ADM-300920-0017', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:15:40', NULL),
('SAK-021020-0050', 'KLI-300920-0018', 'ADM-300920-0052', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:16:00', NULL),
('SAK-021020-0051', 'KLI-300920-0018', 'ADM-300920-0051', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:16:25', NULL),
('SAK-021020-0052', 'KLI-300920-0018', 'ADM-300920-0037', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:17:18', NULL),
('SAK-021020-0053', 'KLI-300920-0019', 'ADM-300920-0018', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:18:01', NULL),
('SAK-021020-0054', 'KLI-300920-0019', 'ADM-300920-0018', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:18:34', NULL),
('SAK-021020-0055', 'KLI-300920-0019', 'ADM-300920-0069', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:18:50', NULL),
('SAK-021020-0056', 'KLI-300920-0019', 'ADM-300920-0028', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:19:14', NULL),
('SAK-021020-0057', 'KLI-300920-0019', 'ADM-300920-0027', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:19:43', NULL),
('SAK-021020-0058', 'KLI-300920-0019', 'ADM-300920-0026', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:20:03', NULL),
('SAK-021020-0059', 'KLI-300920-0004', 'ADM-021020-0011', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:23:50', NULL),
('SAK-021020-0060', 'KLI-300920-0037', 'ADM-300920-0063', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:24:38', NULL),
('SAK-021020-0061', 'KLI-300920-0038', 'ADM-300920-0099', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:25:10', NULL),
('SAK-021020-0062', 'KLI-300920-0038', 'ADM-300920-0066', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:25:34', NULL),
('SAK-021020-0063', 'KLI-300920-0038', 'ADM-300920-0044', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:26:46', NULL),
('SAK-021020-0064', 'KLI-300920-0038', 'ADM-300920-0019', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 11:27:51', NULL),
('SAK-021020-0065', 'KLI-300920-0039', 'ADM-300920-0045', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:03:34', NULL),
('SAK-021020-0066', 'KLI-300920-0039', 'ADM-300920-0098', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:06:21', NULL),
('SAK-021020-0067', 'KLI-300920-0039', 'ADM-300920-0096', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:07:09', NULL),
('SAK-021020-0068', 'KLI-300920-0039', 'ADM-300920-0077', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:07:48', NULL),
('SAK-021020-0069', 'KLI-300920-0039', 'ADM-300920-0056', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:08:13', NULL),
('SAK-021020-0070', 'KLI-300920-0039', 'ADM-300920-0068', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:08:54', NULL),
('SAK-021020-0071', 'KLI-300920-0039', 'ADM-300920-0061', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:09:24', NULL),
('SAK-021020-0072', 'KLI-300920-0039', 'ADM-300920-0055', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:09:47', NULL),
('SAK-021020-0073', 'KLI-300920-0040', 'ADM-300920-0059', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:11:01', NULL),
('SAK-021020-0074', 'KLI-300920-0040', 'ADM-300920-0020', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:11:26', NULL),
('SAK-021020-0075', 'KLI-300920-0040', 'ADM-300920-0033', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:12:45', NULL),
('SAK-021020-0076', 'KLI-300920-0041', 'ADM-300920-0022', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:13:40', NULL),
('SAK-021020-0077', 'KLI-300920-0042', 'ADM-300920-0067', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:14:27', NULL),
('SAK-021020-0078', 'KLI-300920-0042', 'ADM-300920-0041', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:14:52', NULL),
('SAK-021020-0079', 'KLI-300920-0042', 'ADM-300920-0024', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:15:18', NULL),
('SAK-021020-0080', 'KLI-300920-0043', 'ADM-021020-0013', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:15:58', NULL),
('SAK-021020-0081', 'KLI-300920-0043', 'ADM-021020-0012', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:18:15', NULL),
('SAK-021020-0082', 'KLI-300920-0044', 'ADM-300920-0035', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:19:53', NULL),
('SAK-021020-0083', 'KLI-300920-0044', 'ADM-300920-0053', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:20:20', NULL),
('SAK-021020-0084', 'KLI-300920-0044', 'ADM-300920-0054', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:21:19', NULL),
('SAK-021020-0085', 'KLI-300920-0045', 'ADM-021020-0015', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:22:01', NULL),
('SAK-021020-0086', 'KLI-300920-0045', 'ADM-300920-0065', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:22:22', NULL),
('SAK-021020-0087', 'KLI-300920-0046', 'ADM-300920-0072', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:23:32', NULL),
('SAK-021020-0088', 'KLI-300920-0046', 'ADM-300920-0029', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:23:52', NULL),
('SAK-021020-0089', 'KLI-300920-0046', 'ADM-021020-0014', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:24:18', NULL),
('SAK-021020-0090', 'KLI-300920-0046', 'ADM-300920-0034', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:24:37', NULL),
('SAK-021020-0091', 'KLI-300920-0047', 'ADM-300920-0091', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:25:07', NULL),
('SAK-021020-0092', 'KLI-300920-0047', 'ADM-021020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:25:38', NULL),
('SAK-021020-0093', 'KLI-300920-0047', 'ADM-300920-0048', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:25:55', NULL),
('SAK-021020-0094', 'KLI-300920-0048', 'ADM-300920-0087', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:26:21', NULL),
('SAK-021020-0095', 'KLI-300920-0048', 'ADM-300920-0081', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:26:38', NULL),
('SAK-021020-0096', 'KLI-300920-0048', 'ADM-300920-0079', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:27:11', NULL),
('SAK-021020-0097', 'KLI-300920-0048', 'ADM-300920-0074', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:27:26', NULL),
('SAK-021020-0098', 'KLI-300920-0048', 'ADM-300920-0062', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:28:02', NULL),
('SAK-021020-0099', 'KLI-300920-0049', 'ADM-021020-0010', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:30:04', NULL),
('SAK-021020-0100', 'KLI-300920-0050', 'ADM-300920-0082', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:30:58', NULL),
('SAK-021020-0101', 'KLI-300920-0050', 'ADM-300920-0036', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:31:29', NULL),
('SAK-021020-0102', 'KLI-300920-0052', 'ADM-300920-0046', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:32:18', NULL),
('SAK-021020-0103', 'KLI-300920-0053', 'ADM-300920-0039', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:32:42', NULL),
('SAK-021020-0104', 'KLI-300920-0054', 'ADM-300920-0075', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:33:08', NULL),
('SAK-021020-0105', 'KLI-300920-0055', 'ADM-300920-0092', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:36:00', NULL),
('SAK-021020-0106', 'KLI-300920-0055', 'ADM-300920-0094', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:36:50', NULL),
('SAK-021020-0107', 'KLI-300920-0055', 'ADM-300920-0049', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:37:28', NULL),
('SAK-021020-0108', 'KLI-300920-0056', 'ADM-300920-0073', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:38:13', NULL),
('SAK-021020-0109', 'KLI-300920-0057', 'ADM-300920-0078', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:38:39', NULL),
('SAK-021020-0110', 'KLI-300920-0058', 'ADM-021020-0017', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:39:28', NULL),
('SAK-021020-0111', 'KLI-300920-0059', 'ADM-300920-0102', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:39:58', NULL),
('SAK-021020-0112', 'KLI-300920-0059', 'ADM-021020-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:40:12', NULL),
('SAK-021020-0113', 'KLI-300920-0060', 'ADM-300920-0107', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:40:42', NULL),
('SAK-021020-0114', 'KLI-300920-0060', 'ADM-300920-0084', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:41:04', NULL),
('SAK-021020-0115', 'KLI-300920-0061', 'ADM-021020-0018', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 13:43:44', NULL),
('SAK-021020-0117', 'KLI-300920-0070', 'ADM-021020-0020', 'Achmad Agus Hadiyanto', NULL, '2020-10-02 14:37:29', NULL),
('SAK-191120-0001', 'KLI-191120-0001', 'ADM-021020-0019', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:35:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_dampak_insiden`
--

CREATE TABLE `tbl_sub_dampak_insiden` (
  `id_sub_dampak_insiden` varchar(20) NOT NULL,
  `id_jenis_tiket` varchar(20) NOT NULL,
  `id_dampak` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_dampak_insiden`
--

INSERT INTO `tbl_sub_dampak_insiden` (`id_sub_dampak_insiden`, `id_jenis_tiket`, `id_dampak`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SDI-041020-0001', 'JTK-011020-0001', 'DMP-011020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:31:35', NULL),
('SDI-041020-0002', 'JTK-011020-0001', 'DMP-011020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:21', NULL),
('SDI-041020-0003', 'JTK-011020-0001', 'DMP-011020-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:27', NULL),
('SDI-041020-0004', 'JTK-041020-0001', 'DMP-011020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:33', NULL),
('SDI-041020-0005', 'JTK-041020-0001', 'DMP-011020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:41', NULL),
('SDI-041020-0006', 'JTK-041020-0001', 'DMP-011020-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:48', NULL),
('SDI-041020-0007', 'JTK-041020-0002', 'DMP-011020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:52', NULL),
('SDI-041020-0008', 'JTK-041020-0002', 'DMP-011020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-04 16:32:59', NULL),
('SDI-041020-0009', 'JTK-041020-0002', 'DMP-011020-0003', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 16:33:06', '2020-10-04 20:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_klasifikasi`
--

CREATE TABLE `tbl_sub_klasifikasi` (
  `id_sub_klasifikasi` varchar(20) NOT NULL,
  `id_jenis_tiket` varchar(20) NOT NULL,
  `id_klasifikasi` varchar(20) NOT NULL,
  `id_item_klasifikasi` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_klasifikasi`
--

INSERT INTO `tbl_sub_klasifikasi` (`id_sub_klasifikasi`, `id_jenis_tiket`, `id_klasifikasi`, `id_item_klasifikasi`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SKL-111020-0001', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:57:07', NULL),
('SKL-111020-0002', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 18:57:15', NULL),
('SKL-111020-0003', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:00:22', NULL),
('SKL-111020-0004', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0047', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:00:36', NULL),
('SKL-111020-0005', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0048', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:11', NULL),
('SKL-111020-0006', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:18', NULL),
('SKL-111020-0007', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:31', NULL),
('SKL-111020-0008', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:39', NULL),
('SKL-111020-0009', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:46', NULL),
('SKL-111020-0010', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0010', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:01:57', NULL),
('SKL-111020-0011', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0011', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:04', NULL),
('SKL-111020-0012', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0012', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:20', NULL),
('SKL-111020-0013', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0013', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:27', NULL),
('SKL-111020-0014', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0014', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:34', NULL),
('SKL-111020-0015', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0015', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:41', NULL),
('SKL-111020-0016', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:47', NULL),
('SKL-111020-0017', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0017', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:02:54', NULL),
('SKL-111020-0018', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0018', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:03', NULL),
('SKL-111020-0019', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0019', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:20', NULL),
('SKL-111020-0020', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0020', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:27', NULL),
('SKL-111020-0021', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0021', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:37', NULL),
('SKL-111020-0022', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0022', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:46', NULL),
('SKL-111020-0023', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:03:59', NULL),
('SKL-111020-0024', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0023', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:04:17', NULL),
('SKL-111020-0025', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0024', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:04:36', NULL),
('SKL-111020-0026', 'JTK-011020-0001', 'KLS-011020-0001', 'ITK-111020-0025', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:04:44', NULL),
('SKL-111020-0027', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:04:53', NULL),
('SKL-111020-0028', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0026', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:05:01', NULL),
('SKL-111020-0029', 'JTK-011020-0001', 'KLS-011020-0013', 'ITK-111020-0027', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:05:17', NULL),
('SKL-111020-0030', 'JTK-011020-0001', 'KLS-011020-0013', 'ITK-111020-0028', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:05:39', NULL),
('SKL-111020-0031', 'JTK-011020-0001', 'KLS-011020-0013', 'ITK-111020-0029', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:05:52', NULL),
('SKL-111020-0032', 'JTK-011020-0001', 'KLS-011020-0012', 'ITK-111020-0030', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:06:08', NULL),
('SKL-111020-0033', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0031', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:07:55', NULL),
('SKL-111020-0034', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0032', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:08:13', NULL),
('SKL-111020-0035', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0033', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:08:26', NULL),
('SKL-111020-0036', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0034', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:08:39', NULL),
('SKL-111020-0037', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0035', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:08:50', NULL),
('SKL-111020-0038', 'JTK-011020-0001', 'KLS-011020-0011', 'ITK-111020-0036', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:09:01', NULL),
('SKL-111020-0039', 'JTK-041020-0001', 'KLS-011020-0009', 'ITK-111020-0037', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:09:31', NULL),
('SKL-111020-0040', 'JTK-041020-0001', 'KLS-011020-0009', 'ITK-111020-0038', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:09:43', NULL),
('SKL-111020-0041', 'JTK-041020-0001', 'KLS-011020-0009', 'ITK-111020-0039', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:09:55', NULL),
('SKL-111020-0042', 'JTK-041020-0001', 'KLS-011020-0009', 'ITK-111020-0040', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:10:06', NULL),
('SKL-111020-0043', 'JTK-041020-0001', 'KLS-011020-0009', 'ITK-111020-0041', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:10:30', NULL),
('SKL-111020-0044', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0042', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:10:48', NULL),
('SKL-111020-0045', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0043', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:11:08', NULL),
('SKL-111020-0046', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0037', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:11:25', NULL),
('SKL-111020-0047', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0040', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:11:43', NULL),
('SKL-111020-0048', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0044', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:11:56', NULL),
('SKL-111020-0049', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0045', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:12:08', NULL),
('SKL-111020-0050', 'JTK-041020-0001', 'KLS-011020-0010', 'ITK-111020-0046', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:12:19', NULL),
('SKL-111020-0051', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:12:42', NULL),
('SKL-111020-0052', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:12:55', NULL),
('SKL-111020-0053', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0003', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:04', NULL),
('SKL-111020-0054', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0047', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:16', NULL),
('SKL-111020-0055', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0048', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:28', NULL),
('SKL-111020-0056', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:39', NULL),
('SKL-111020-0057', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:48', NULL),
('SKL-111020-0058', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:13:59', NULL),
('SKL-111020-0059', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:08', NULL),
('SKL-111020-0060', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0010', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:17', NULL),
('SKL-111020-0061', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0011', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:25', NULL),
('SKL-111020-0062', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0012', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:34', NULL),
('SKL-111020-0063', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0013', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:43', NULL),
('SKL-111020-0064', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0014', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:14:52', NULL),
('SKL-111020-0065', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0015', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:02', NULL),
('SKL-111020-0066', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:18', NULL),
('SKL-111020-0067', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0017', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:28', NULL),
('SKL-111020-0068', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0018', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:40', NULL),
('SKL-111020-0069', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0019', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:49', NULL),
('SKL-111020-0070', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0020', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:15:58', NULL),
('SKL-111020-0071', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0021', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:16:08', NULL),
('SKL-111020-0072', 'JTK-041020-0002', 'KLS-011020-0001', 'ITK-111020-0022', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:16:17', NULL),
('SKL-111020-0073', 'JTK-041020-0002', 'KLS-011020-0008', 'ITK-111020-0049', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:16:29', NULL),
('SKL-111020-0074', 'JTK-041020-0002', 'KLS-011020-0007', 'ITK-111020-0050', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:16:44', NULL),
('SKL-111020-0075', 'JTK-041020-0002', 'KLS-011020-0006', 'ITK-111020-0051', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:17:03', NULL),
('SKL-111020-0076', 'JTK-041020-0002', 'KLS-011020-0006', 'ITK-111020-0052', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:17:15', NULL),
('SKL-111020-0077', 'JTK-041020-0002', 'KLS-011020-0005', 'ITK-111020-0053', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:17:31', NULL),
('SKL-111020-0078', 'JTK-041020-0002', 'KLS-011020-0005', 'ITK-111020-0054', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:17:45', NULL),
('SKL-111020-0079', 'JTK-041020-0002', 'KLS-011020-0004', 'ITK-111020-0055', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:18:01', NULL),
('SKL-111020-0080', 'JTK-041020-0002', 'KLS-011020-0003', 'ITK-111020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:18:15', NULL),
('SKL-111020-0081', 'JTK-041020-0002', 'KLS-011020-0003', 'ITK-111020-0023', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:18:25', NULL),
('SKL-111020-0082', 'JTK-041020-0002', 'KLS-011020-0003', 'ITK-111020-0024', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:18:35', NULL),
('SKL-111020-0083', 'JTK-041020-0002', 'KLS-011020-0003', 'ITK-111020-0025', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:18:45', NULL),
('SKL-111020-0084', 'JTK-011020-0001', 'KLS-011020-0003', 'ITK-111020-0016', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:19:00', NULL),
('SKL-111020-0085', 'JTK-041020-0002', 'KLS-011020-0003', 'ITK-111020-0026', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:19:17', NULL),
('SKL-111020-0086', 'JTK-041020-0002', 'KLS-011020-0002', 'ITK-111020-0056', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:19:31', NULL),
('SKL-111020-0087', 'JTK-041020-0002', 'KLS-011020-0002', 'ITK-111020-0057', 'Achmad Agus Hadiyanto', NULL, '2020-10-11 19:19:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_layanan`
--

CREATE TABLE `tbl_sub_layanan` (
  `id_sub_layanan` varchar(20) NOT NULL,
  `id_layanan` varchar(20) NOT NULL,
  `id_item_layanan` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_layanan`
--

INSERT INTO `tbl_sub_layanan` (`id_sub_layanan`, `id_layanan`, `id_item_layanan`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SLY-191120-0001', 'LYN-191120-0001', 'ILY-191120-0001', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:57:35', NULL),
('SLY-191120-0002', 'LYN-191120-0001', 'ILY-191120-0002', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:57:43', NULL),
('SLY-191120-0003', 'LYN-191120-0001', 'ILY-191120-0003', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:57:52', NULL),
('SLY-191120-0004', 'LYN-191120-0001', 'ILY-191120-0004', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:58:01', NULL),
('SLY-191120-0005', 'LYN-191120-0002', 'ILY-191120-0005', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:58:15', NULL),
('SLY-191120-0006', 'LYN-191120-0002', 'ILY-191120-0006', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:58:28', NULL),
('SLY-191120-0007', 'LYN-191120-0002', 'ILY-191120-0007', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 11:58:38', NULL),
('SLY-191120-0008', 'LYN-191120-0003', 'ILY-191120-0008', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:01:59', NULL),
('SLY-191120-0009', 'LYN-191120-0003', 'ILY-191120-0009', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:02:29', NULL),
('SLY-191120-0010', 'LYN-191120-0003', 'ILY-191120-0010', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:02:50', NULL),
('SLY-191120-0011', 'LYN-191120-0003', 'ILY-191120-0011', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:03:47', NULL),
('SLY-191120-0012', 'LYN-191120-0003', 'ILY-191120-0012', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:04:06', NULL),
('SLY-191120-0013', 'LYN-191120-0004', 'ILY-191120-0013', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:06:44', NULL),
('SLY-191120-0014', 'LYN-191120-0004', 'ILY-191120-0014', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:06:55', NULL),
('SLY-191120-0015', 'LYN-191120-0005', 'ILY-191120-0015', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:07:59', NULL),
('SLY-191120-0016', 'LYN-191120-0005', 'ILY-191120-0016', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:08:09', NULL),
('SLY-191120-0017', 'LYN-191120-0005', 'ILY-191120-0017', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:08:54', NULL),
('SLY-191120-0018', 'LYN-191120-0006', 'ILY-191120-0018', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:09:39', NULL),
('SLY-191120-0019', 'LYN-191120-0006', 'ILY-191120-0019', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:09:52', NULL),
('SLY-191120-0020', 'LYN-191120-0008', 'ILY-191120-0020', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:10:42', NULL),
('SLY-191120-0021', 'LYN-191120-0008', 'ILY-191120-0022', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 12:12:08', NULL),
('SLY-191120-0022', 'LYN-191120-0001', 'ILY-191120-0023', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:08:01', NULL),
('SLY-191120-0023', 'LYN-191120-0001', 'ILY-191120-0024', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:08:34', NULL),
('SLY-191120-0024', 'LYN-191120-0001', 'ILY-191120-0025', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:09:10', NULL),
('SLY-191120-0025', 'LYN-191120-0001', 'ILY-191120-0026', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:09:29', NULL),
('SLY-191120-0026', 'LYN-191120-0001', 'ILY-191120-0027', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:10:51', NULL),
('SLY-191120-0027', 'LYN-191120-0001', 'ILY-191120-0028', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:14:28', NULL),
('SLY-191120-0028', 'LYN-191120-0001', 'ILY-191120-0029', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:15:05', NULL),
('SLY-191120-0029', 'LYN-191120-0001', 'ILY-191120-0030', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:15:52', NULL),
('SLY-191120-0030', 'LYN-191120-0001', 'ILY-191120-0031', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:17:18', NULL),
('SLY-191120-0031', 'LYN-191120-0001', 'ILY-191120-0032', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:17:53', NULL),
('SLY-191120-0032', 'LYN-191120-0001', 'ILY-191120-0033', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:18:38', NULL),
('SLY-191120-0033', 'LYN-191120-0001', 'ILY-191120-0034', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:19:07', NULL),
('SLY-191120-0034', 'LYN-191120-0001', 'ILY-191120-0035', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:20:22', NULL),
('SLY-191120-0035', 'LYN-191120-0001', 'ILY-191120-0036', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:21:09', NULL),
('SLY-191120-0036', 'LYN-191120-0001', 'ILY-191120-0037', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:21:38', NULL),
('SLY-191120-0037', 'LYN-191120-0001', 'ILY-191120-0038', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:22:00', NULL),
('SLY-191120-0038', 'LYN-191120-0001', 'ILY-191120-0040', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:23:34', NULL),
('SLY-191120-0039', 'LYN-191120-0001', 'ILY-191120-0041', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:24:00', NULL),
('SLY-191120-0040', 'LYN-191120-0001', 'ILY-191120-0042', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 13:25:21', NULL),
('SLY-191120-0041', 'LYN-191120-0001', 'ILY-191120-0043', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 14:08:32', NULL),
('SLY-191120-0042', 'LYN-191120-0001', 'ILY-191120-0044', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 14:09:03', NULL),
('SLY-191120-0043', 'LYN-191120-0001', 'ILY-191120-0045', 'Achmad Agus Hadiyanto', NULL, '2020-11-19 14:09:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_status_jenis_tiket`
--

CREATE TABLE `tbl_sub_status_jenis_tiket` (
  `id_sub_status_jenis_tiket` varchar(20) NOT NULL,
  `id_jenis_tiket` varchar(20) NOT NULL,
  `id_status_tiket` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_status_jenis_tiket`
--

INSERT INTO `tbl_sub_status_jenis_tiket` (`id_sub_status_jenis_tiket`, `id_jenis_tiket`, `id_status_tiket`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SSJ-121020-0001', 'JTK-011020-0001', 'STK-091020-0001', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-12 11:50:37', '2020-10-12 12:14:18'),
('SSJ-121020-0002', 'JTK-011020-0001', 'STK-121020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:52:06', NULL),
('SSJ-121020-0003', 'JTK-011020-0001', 'STK-121020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:52:27', NULL),
('SSJ-121020-0004', 'JTK-011020-0001', 'STK-091020-0005', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:52:55', NULL),
('SSJ-121020-0005', 'JTK-011020-0001', 'STK-091020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:53:08', NULL),
('SSJ-121020-0006', 'JTK-011020-0001', 'STK-091020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:53:17', NULL),
('SSJ-121020-0007', 'JTK-011020-0001', 'STK-091020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:53:25', NULL),
('SSJ-121020-0008', 'JTK-011020-0001', 'STK-091020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:53:34', NULL),
('SSJ-121020-0009', 'JTK-041020-0001', 'STK-091020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:54:13', NULL),
('SSJ-121020-0010', 'JTK-041020-0001', 'STK-121020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:54:29', NULL),
('SSJ-121020-0011', 'JTK-041020-0001', 'STK-121020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:54:38', NULL),
('SSJ-121020-0012', 'JTK-041020-0001', 'STK-091020-0005', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:54:47', NULL),
('SSJ-121020-0013', 'JTK-041020-0001', 'STK-091020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:54:57', NULL),
('SSJ-121020-0014', 'JTK-041020-0001', 'STK-091020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:55:06', NULL),
('SSJ-121020-0015', 'JTK-041020-0001', 'STK-091020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:55:15', NULL),
('SSJ-121020-0016', 'JTK-041020-0001', 'STK-091020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:55:26', NULL),
('SSJ-121020-0017', 'JTK-041020-0002', 'STK-091020-0001', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:55:43', NULL),
('SSJ-121020-0018', 'JTK-041020-0002', 'STK-091020-0002', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:02', NULL),
('SSJ-121020-0019', 'JTK-041020-0002', 'STK-091020-0005', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:10', NULL),
('SSJ-121020-0020', 'JTK-041020-0002', 'STK-091020-0006', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:19', NULL),
('SSJ-121020-0021', 'JTK-041020-0002', 'STK-091020-0007', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:29', NULL),
('SSJ-121020-0022', 'JTK-041020-0002', 'STK-091020-0008', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:38', NULL),
('SSJ-121020-0023', 'JTK-041020-0002', 'STK-091020-0009', 'Achmad Agus Hadiyanto', NULL, '2020-10-12 11:56:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_urgency_insiden`
--

CREATE TABLE `tbl_sub_urgency_insiden` (
  `id_sub_urgency_insiden` varchar(20) NOT NULL,
  `id_dampak` varchar(20) NOT NULL,
  `id_urgency` varchar(20) NOT NULL,
  `id_prioritas` varchar(20) NOT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `tgl_terakhir_dibuat` datetime DEFAULT NULL,
  `tgl_terakhir_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_urgency_insiden`
--

INSERT INTO `tbl_sub_urgency_insiden` (`id_sub_urgency_insiden`, `id_dampak`, `id_urgency`, `id_prioritas`, `dibuat_oleh`, `diubah_oleh`, `tgl_terakhir_dibuat`, `tgl_terakhir_diubah`) VALUES
('SUI-041020-0001', 'DMP-011020-0001', 'URG-011020-0001', 'PRI-011020-0001', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:06', '2020-10-05 00:31:22'),
('SUI-041020-0002', 'DMP-011020-0001', 'URG-011020-0002', 'PRI-011020-0002', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:15', '2020-10-05 00:31:40'),
('SUI-041020-0003', 'DMP-011020-0001', 'URG-011020-0003', 'PRI-011020-0003', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:22', '2020-10-05 00:31:49'),
('SUI-041020-0004', 'DMP-011020-0002', 'URG-011020-0001', 'PRI-011020-0002', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:28', '2020-10-05 00:31:58'),
('SUI-041020-0005', 'DMP-011020-0002', 'URG-011020-0002', 'PRI-011020-0003', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:36', '2020-10-05 00:32:08'),
('SUI-041020-0006', 'DMP-011020-0002', 'URG-011020-0003', 'PRI-011020-0004', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:43', '2020-10-05 00:32:18'),
('SUI-041020-0007', 'DMP-011020-0003', 'URG-011020-0001', 'PRI-011020-0003', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:48', '2020-10-05 00:32:29'),
('SUI-041020-0008', 'DMP-011020-0003', 'URG-011020-0002', 'PRI-011020-0004', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:19:54', '2020-10-05 00:32:43'),
('SUI-041020-0009', 'DMP-011020-0003', 'URG-011020-0003', 'PRI-011020-0005', 'Achmad Agus Hadiyanto', 'Achmad Agus Hadiyanto', '2020-10-04 21:20:03', '2020-10-05 00:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `id_trans_tiket` varchar(20) NOT NULL,
  `no_tiket` varchar(20) NOT NULL,
  `id_layanan` varchar(20) NOT NULL,
  `id_item_layanan` varchar(20) NOT NULL,
  `id_klien` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `id_jenis_tiket` varchar(20) NOT NULL,
  `id_dampak` varchar(20) NOT NULL,
  `id_urgency` varchar(20) NOT NULL,
  `id_prioritas` varchar(20) DEFAULT NULL,
  `id_status_tiket` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `id_shift` varchar(20) NOT NULL,
  `id_klasifikasi` varchar(20) NOT NULL,
  `id_item_klasifikasi` varchar(20) NOT NULL,
  `id_penyebab` varchar(20) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_dibuat` datetime DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL,
  `id_user_level_pembuat` int(5) DEFAULT NULL,
  `dibuat_oleh` varchar(50) DEFAULT NULL,
  `id_user_level_pengubah` int(5) DEFAULT NULL,
  `diubah_oleh` varchar(50) DEFAULT NULL,
  `id_user_level` int(10) DEFAULT NULL,
  `penerima_tiket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Achmad Agus Hadiyanto', 'achmadagushadiyanto18@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '_MG_0252.JPG', 1, 'Aktif'),
(2, 'Supervisi Sysadmin', 'supervisisys@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 2, 'Aktif'),
(3, 'Supervisi Programmer', 'supervisinoc@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 3, 'Aktif'),
(4, 'Achmad Aris Setiawan', 'setiawan@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 4, 'Aktif'),
(5, 'Budi Santoso', 'budi.santoso@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 4, 'Aktif'),
(6, 'Asnan Wiyono', 'asnan@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 4, 'Aktif'),
(7, 'Margiyanto', 'margiyanto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(8, 'Ricat Riansyah', 'ricat.riansyah@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(9, 'Oripa Rangga', 'oripa.rangga@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(10, 'Taufiq Shidqi', 'taufiq.shidqi28@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(11, 'Khotibul Umam', 'umam@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(12, 'Henryadi saputra', 'henryadi@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif'),
(13, 'Achmad Agus Hadiyanto', 'agus@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(14, 'Admin LST-DC', 'admin_lstdc@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 7, 'Aktif'),
(15, 'Haryo Isdianto', 'haryo.isdianto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin_karyawan.jpg', 6, 'Aktif'),
(16, 'Sagita Aribowo', 'sigit@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(17, 'M. Fakhrurrozi Bimo Arfianto', 'fakhrurroziarfianto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(18, 'Ilham Ardiansyah', 'ilham@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(19, 'Martinus Billy Pratikto', 'tito@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(20, 'Sigit Stiyanto', 'sigit.stiyanto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(21, 'Hendarto', 'hendarto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator.png', 5, 'Aktif'),
(22, 'Wahyu Subianto', 'wahyu.subianto@lawangsewu.com', '81dc9bdb52d04dc20036dbd8313ed055', 'noc.png', 6, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Administrator'),
(2, 'Supervisi Sysadmin'),
(3, 'Supervisi NOC'),
(4, 'Sysadmin'),
(5, 'Programmer'),
(6, 'Helpdesk'),
(7, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_admin_klien`
--
ALTER TABLE `master_admin_klien`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `master_cabang`
--
ALTER TABLE `master_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `master_dampak`
--
ALTER TABLE `master_dampak`
  ADD PRIMARY KEY (`id_dampak`);

--
-- Indexes for table `master_item_klasifikasi`
--
ALTER TABLE `master_item_klasifikasi`
  ADD PRIMARY KEY (`id_item_klasifikasi`);

--
-- Indexes for table `master_item_layanan`
--
ALTER TABLE `master_item_layanan`
  ADD PRIMARY KEY (`id_item_layanan`) USING BTREE;

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `master_jenis_tiket`
--
ALTER TABLE `master_jenis_tiket`
  ADD PRIMARY KEY (`id_jenis_tiket`) USING BTREE;

--
-- Indexes for table `master_klasifikasi`
--
ALTER TABLE `master_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`) USING BTREE;

--
-- Indexes for table `master_klien`
--
ALTER TABLE `master_klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `master_layanan`
--
ALTER TABLE `master_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `master_penyebab_utama`
--
ALTER TABLE `master_penyebab_utama`
  ADD PRIMARY KEY (`id_penyebab`);

--
-- Indexes for table `master_prioritas`
--
ALTER TABLE `master_prioritas`
  ADD PRIMARY KEY (`id_prioritas`);

--
-- Indexes for table `master_shift`
--
ALTER TABLE `master_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `master_status_tiket`
--
ALTER TABLE `master_status_tiket`
  ADD PRIMARY KEY (`id_status_tiket`);

--
-- Indexes for table `master_urgency`
--
ALTER TABLE `master_urgency`
  ADD PRIMARY KEY (`id_urgency`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_level` (`id_user_level`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_menu` (`id_menu`);

--
-- Indexes for table `tbl_lampiran_tiket_masuk`
--
ALTER TABLE `tbl_lampiran_tiket_masuk`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `tbl_lampiran_update_tiket_penanganan`
--
ALTER TABLE `tbl_lampiran_update_tiket_penanganan`
  ADD PRIMARY KEY (`id_lampiran_update`),
  ADD KEY `fk_no_tiket` (`no_tiket`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `index_log` (`log_id`,`log_time`,`log_user`,`log_tipe`,`log_desc`,`ip_address`,`info_browser`) USING BTREE;

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `tbl_riwayat_tiket`
--
ALTER TABLE `tbl_riwayat_tiket`
  ADD PRIMARY KEY (`id_riwayat_tiket`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_sub_admin_klien`
--
ALTER TABLE `tbl_sub_admin_klien`
  ADD PRIMARY KEY (`id_sub_admin_klien`),
  ADD KEY `fk_klien` (`id_klien`),
  ADD KEY `fk_adm_klien` (`id_admin`);

--
-- Indexes for table `tbl_sub_dampak_insiden`
--
ALTER TABLE `tbl_sub_dampak_insiden`
  ADD PRIMARY KEY (`id_sub_dampak_insiden`),
  ADD KEY `fk_jns_tiket` (`id_jenis_tiket`),
  ADD KEY `fk_dampak` (`id_dampak`);

--
-- Indexes for table `tbl_sub_klasifikasi`
--
ALTER TABLE `tbl_sub_klasifikasi`
  ADD PRIMARY KEY (`id_sub_klasifikasi`),
  ADD KEY `fk_jenis_tiket` (`id_jenis_tiket`),
  ADD KEY `fk_klasifikasi` (`id_klasifikasi`),
  ADD KEY `fk_item_klasifikasi` (`id_item_klasifikasi`);

--
-- Indexes for table `tbl_sub_layanan`
--
ALTER TABLE `tbl_sub_layanan`
  ADD PRIMARY KEY (`id_sub_layanan`),
  ADD KEY `fk_layanan` (`id_layanan`),
  ADD KEY `fk_item_layanan` (`id_item_layanan`);

--
-- Indexes for table `tbl_sub_status_jenis_tiket`
--
ALTER TABLE `tbl_sub_status_jenis_tiket`
  ADD PRIMARY KEY (`id_sub_status_jenis_tiket`),
  ADD KEY `fk_jenis_tiket_status` (`id_jenis_tiket`),
  ADD KEY `fk_status_tiket` (`id_status_tiket`);

--
-- Indexes for table `tbl_sub_urgency_insiden`
--
ALTER TABLE `tbl_sub_urgency_insiden`
  ADD PRIMARY KEY (`id_sub_urgency_insiden`) USING BTREE,
  ADD KEY `fk_dmpk` (`id_dampak`),
  ADD KEY `fk_urgency` (`id_urgency`),
  ADD KEY `fk_prioritas` (`id_prioritas`);

--
-- Indexes for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`id_trans_tiket`),
  ADD KEY `no_tiket` (`no_tiket`),
  ADD KEY `fk_laynan` (`id_layanan`),
  ADD KEY `fk_itm_laynan` (`id_item_layanan`),
  ADD KEY `fk_klienn` (`id_klien`),
  ADD KEY `fk_admin` (`id_admin`),
  ADD KEY `fk_jns_tkt` (`id_jenis_tiket`),
  ADD KEY `fk_dampk` (`id_dampak`),
  ADD KEY `fk_urgen` (`id_urgency`),
  ADD KEY `fk_prio` (`id_prioritas`),
  ADD KEY `fk_stts_tiket` (`id_status_tiket`),
  ADD KEY `fk_shift` (`id_shift`),
  ADD KEY `fk_klasifik` (`id_klasifikasi`),
  ADD KEY `fk_itm_klsifk` (`id_item_klasifikasi`),
  ADD KEY `fk_penyebab` (`id_penyebab`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `user_level` (`id_user_level`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_lampiran_tiket_masuk`
--
ALTER TABLE `tbl_lampiran_tiket_masuk`
  MODIFY `id_lampiran` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lampiran_update_tiket_penanganan`
--
ALTER TABLE `tbl_lampiran_update_tiket_penanganan`
  MODIFY `id_lampiran_update` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_riwayat_tiket`
--
ALTER TABLE `tbl_riwayat_tiket`
  MODIFY `id_riwayat_tiket` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sub_admin_klien`
--
ALTER TABLE `tbl_sub_admin_klien`
  ADD CONSTRAINT `fk_adm_klien` FOREIGN KEY (`id_admin`) REFERENCES `master_admin_klien` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_klien` FOREIGN KEY (`id_klien`) REFERENCES `master_klien` (`id_klien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_dampak_insiden`
--
ALTER TABLE `tbl_sub_dampak_insiden`
  ADD CONSTRAINT `fk_dampak` FOREIGN KEY (`id_dampak`) REFERENCES `master_dampak` (`id_dampak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jns_tiket` FOREIGN KEY (`id_jenis_tiket`) REFERENCES `master_jenis_tiket` (`id_jenis_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_klasifikasi`
--
ALTER TABLE `tbl_sub_klasifikasi`
  ADD CONSTRAINT `fk_item_klasifikasi` FOREIGN KEY (`id_item_klasifikasi`) REFERENCES `master_item_klasifikasi` (`id_item_klasifikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenis_tiket` FOREIGN KEY (`id_jenis_tiket`) REFERENCES `master_jenis_tiket` (`id_jenis_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_klasifikasi` FOREIGN KEY (`id_klasifikasi`) REFERENCES `master_klasifikasi` (`id_klasifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_layanan`
--
ALTER TABLE `tbl_sub_layanan`
  ADD CONSTRAINT `fk_item_layanan` FOREIGN KEY (`id_item_layanan`) REFERENCES `master_item_layanan` (`id_item_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `master_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_status_jenis_tiket`
--
ALTER TABLE `tbl_sub_status_jenis_tiket`
  ADD CONSTRAINT `fk_jenis_tiket_status` FOREIGN KEY (`id_jenis_tiket`) REFERENCES `master_jenis_tiket` (`id_jenis_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_tiket` FOREIGN KEY (`id_status_tiket`) REFERENCES `master_status_tiket` (`id_status_tiket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_urgency_insiden`
--
ALTER TABLE `tbl_sub_urgency_insiden`
  ADD CONSTRAINT `fk_dmpk` FOREIGN KEY (`id_dampak`) REFERENCES `master_dampak` (`id_dampak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prioritas` FOREIGN KEY (`id_prioritas`) REFERENCES `master_prioritas` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_urgency` FOREIGN KEY (`id_urgency`) REFERENCES `master_urgency` (`id_urgency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `master_admin_klien` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dampk` FOREIGN KEY (`id_dampak`) REFERENCES `master_dampak` (`id_dampak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itm_laynan` FOREIGN KEY (`id_item_layanan`) REFERENCES `master_item_layanan` (`id_item_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jns_tkt` FOREIGN KEY (`id_jenis_tiket`) REFERENCES `master_jenis_tiket` (`id_jenis_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_klienn` FOREIGN KEY (`id_klien`) REFERENCES `master_klien` (`id_klien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_laynan` FOREIGN KEY (`id_layanan`) REFERENCES `master_layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prio` FOREIGN KEY (`id_prioritas`) REFERENCES `master_prioritas` (`id_prioritas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shift` FOREIGN KEY (`id_shift`) REFERENCES `master_shift` (`id_shift`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stts_tiket` FOREIGN KEY (`id_status_tiket`) REFERENCES `master_status_tiket` (`id_status_tiket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_urgen` FOREIGN KEY (`id_urgency`) REFERENCES `master_urgency` (`id_urgency`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
