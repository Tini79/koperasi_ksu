-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.2.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for koperasi_ksu
CREATE DATABASE IF NOT EXISTS `koperasi_ksu` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `koperasi_ksu`;

-- Dumping structure for table koperasi_ksu.akuns
CREATE TABLE IF NOT EXISTS `akuns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `akun_id` bigint(20) unsigned DEFAULT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.akuns: ~106 rows (approximately)
/*!40000 ALTER TABLE `akuns` DISABLE KEYS */;
INSERT INTO `akuns` (`id`, `akun_id`, `nama_akun`, `kategori`, `kode_akun`, `saldo`, `created_at`, `updated_at`) VALUES
	(2, NULL, 'Aset', 'Debet', '100', 6000000, '2022-11-04 16:03:01', '2022-11-06 03:48:23'),
	(3, 2, 'Aset Lancar', 'Debet', '101', 0, '2022-11-04 16:03:26', '2022-11-04 16:03:26'),
	(4, 3, 'Kas', 'Debet', '101-1', 400000, '2022-11-04 16:06:10', '2022-11-05 16:17:13'),
	(5, 3, 'Bank', 'Debet', '101-2', 0, '2022-11-04 16:06:44', '2022-11-04 16:06:44'),
	(6, 3, 'Surat Berharga', 'Debet', '101-3', 0, '2022-11-04 16:07:03', '2022-11-04 16:07:03'),
	(7, 3, 'Piutang Usaha', 'Debet', '101-4', 0, '2022-11-04 16:08:55', '2022-11-04 16:08:55'),
	(8, 3, 'Piutang Pinjaman Anggota', 'Debet', '101-5', 0, '2022-11-04 16:09:22', '2022-11-04 16:09:22'),
	(9, 3, 'Piutang Pinjaman Non-anggota', 'Debet', '101-6', 0, '2022-11-04 16:09:59', '2022-11-04 16:09:59'),
	(10, 3, 'Penyisihan Hutang Tak Tertagih', 'Debet', '101-7', 0, '2022-11-04 16:10:29', '2022-11-04 16:10:29'),
	(11, 3, 'Persediaan', 'Debet', '101-8', 0, '2022-11-04 16:10:47', '2022-11-04 16:10:47'),
	(12, 3, 'Beban Dibayar Di Muka', 'Debet', '101-9', 0, '2022-11-04 16:11:20', '2022-11-04 16:11:20'),
	(13, 3, 'Pendp. yang Akan Diterima', 'Debet', '101-10', 0, '2022-11-04 16:12:17', '2022-11-04 16:12:17'),
	(14, 3, 'Aset Lancar Lainnya', 'Debet', '101-11', 0, '2022-11-04 16:12:36', '2022-11-04 16:12:36'),
	(15, 2, 'Aset Tidak Lancar', 'Kredit', '102', 0, '2022-11-04 16:14:27', '2022-11-04 16:14:27'),
	(16, 15, 'Investasi Jangka Panjang', 'Kredit', '102-1', 0, '2022-11-04 16:15:22', '2022-11-04 16:15:22'),
	(18, 15, 'Properti Investasi', 'Kredit', '102-2', 0, '2022-11-04 16:17:38', '2022-11-04 16:17:38'),
	(19, 15, 'Akun Penyimpanan Properti Investasi', 'Kredit', '102-3', 0, '2022-11-04 16:20:17', '2022-11-04 16:20:17'),
	(20, 15, 'Aset Tetap', 'Kredit', '102-4', 0, '2022-11-04 16:21:05', '2022-11-04 16:21:05'),
	(21, 20, 'Tanah', 'Kredit', '1024-1', 0, '2022-11-04 16:21:33', '2022-11-04 16:21:33'),
	(22, 20, 'Bangunan', 'Kredit', '1024-2', 0, '2022-11-04 16:21:49', '2022-11-04 16:21:49'),
	(23, 20, 'Mesin dan Kendaraan', 'Kredit', '1024-3', 0, '2022-11-04 16:22:15', '2022-11-04 16:22:15'),
	(24, 20, 'Inventaris dan Peralatan Kantor', 'Kredit', '1024-4', 0, '2022-11-04 16:22:43', '2022-11-04 16:22:43'),
	(25, 20, 'Akun Peny. Aset Tetap', 'Kredit', '1024-5', 0, '2022-11-04 16:23:09', '2022-11-04 16:23:09'),
	(26, 15, 'Aset Tidak Berwujud', 'Kredit', '102-5', 0, '2022-11-04 16:24:36', '2022-11-04 16:24:36'),
	(27, 26, 'Akun Peny. Aset Tidak Berwujud', 'Kredit', '1025-1', 0, '2022-11-04 16:25:35', '2022-11-04 16:25:35'),
	(28, NULL, 'Kewajiban', 'Kredit', '200', 0, '2022-11-04 16:28:54', '2022-11-04 16:28:54'),
	(29, 28, 'Kewajiban Jangka Pendek', 'Kredit', '201', 0, '2022-11-04 16:29:19', '2022-11-04 16:29:19'),
	(30, 29, 'Simpanan Anggota', 'Kredit', '201-1', 0, '2022-11-04 16:30:11', '2022-11-04 16:30:11'),
	(31, 30, 'Simpanan Sukarela', 'Kredit', '201-1', 0, '2022-11-04 16:31:51', '2022-11-04 16:31:51'),
	(32, 30, 'Simpanan Berjangka', 'Kredit', '201-1', 0, '2022-11-04 16:32:11', '2022-11-04 16:32:11'),
	(33, 29, 'SHU Bagian Anggota', 'Kredit', '201-2', 0, '2022-11-04 16:32:44', '2022-11-04 16:32:44'),
	(34, 29, 'Utang Usaha', 'Kredit', '201-3', 0, '2022-11-04 16:33:04', '2022-11-04 16:33:04'),
	(35, 29, 'Utang Bank', 'Kredit', '201-4', 0, '2022-11-04 16:33:30', '2022-11-04 16:33:30'),
	(36, 29, 'Utang Jangka Pendek Lainnya', 'Kredit', '201-5', 0, '2022-11-04 16:33:56', '2022-11-04 16:33:56'),
	(37, 29, 'Beban Yang Masih Harus Dibayar', 'Kredit', '201-6', 0, '2022-11-04 16:34:21', '2022-11-04 16:34:21'),
	(38, 29, 'Pendp. Diterima Di Muka', 'Kredit', '201-7', 0, '2022-11-04 16:35:07', '2022-11-04 16:35:07'),
	(39, 28, 'Kewajiban Jangka Panjang', 'Kredit', '202', 0, '2022-11-04 16:35:44', '2022-11-04 16:35:44'),
	(40, 39, 'Utang Bank', 'Kredit', '202-1', 0, '2022-11-04 16:36:16', '2022-11-04 16:36:16'),
	(41, 39, 'Kewajiban Imbalan Pasca Kerja', 'Kredit', '202-2', 0, '2022-11-04 16:37:14', '2022-11-04 16:37:14'),
	(42, 39, 'Kewajiban Jangka Panjang Lainnya', 'Kredit', '202-3', 0, '2022-11-04 16:38:04', '2022-11-04 16:38:04'),
	(43, NULL, 'Ekuitas', 'Kredit', '300', 0, '2022-11-04 16:40:40', '2022-11-04 16:40:40'),
	(44, 43, 'Simpanan Pokok', 'Kredit', '301', 0, '2022-11-04 16:40:58', '2022-11-04 16:40:58'),
	(45, 43, 'Simpanan Wajib', 'Kredit', '302', 0, '2022-11-04 16:41:19', '2022-11-04 16:41:19'),
	(46, 43, 'Hibah', 'Kredit', '303', 0, '2022-11-04 16:41:35', '2022-11-04 16:41:35'),
	(47, 43, 'Cadangan', 'Kredit', '304', 0, '2022-11-04 16:41:52', '2022-11-04 16:41:52'),
	(48, 43, 'SHU Tahun Berjalan', 'Kredit', '305', 0, '2022-11-04 16:42:30', '2022-11-04 16:42:30'),
	(49, NULL, 'Pendapatan', 'Debet', '400', 0, '2022-11-04 16:44:14', '2022-11-04 16:44:14'),
	(50, 49, 'Pelayanan Bruto Anggota', 'Debet', '401', 3000000, '2022-11-04 16:45:03', '2022-11-04 16:45:03'),
	(51, 49, 'Beban Pokok Pelayanan', 'Debet', '402', 0, '2022-11-04 16:45:26', '2022-11-04 16:45:26'),
	(52, 49, 'Pelayanan Neto Anggota (a)', 'Debet', '403', 0, '2022-11-04 16:45:56', '2022-11-04 16:45:56'),
	(53, 49, 'Beban Pokok Penjualan', 'Debet', '405', 0, '2022-11-04 16:50:35', '2022-11-04 16:50:35'),
	(54, 49, 'Laba/Rugi Non-anggota (b)', 'Debet', '406', 0, '2022-11-04 16:51:04', '2022-11-04 16:51:04'),
	(55, 49, 'SHU Kotor (a+b)', 'Debet', '407', 0, '2022-11-04 16:52:03', '2022-11-04 16:52:03'),
	(56, NULL, 'Beban Operasional', 'Kredit', '500', 2000000, '2022-11-04 16:53:11', '2022-11-04 16:53:11'),
	(57, 56, 'Beban Usaha', 'Kredit', '500-1', 2000000, '2022-11-04 16:53:32', '2022-11-05 16:36:34'),
	(58, 56, 'Beban Administrasi Dan Umum', 'Kredit', '500-2', 0, '2022-11-04 16:53:57', '2022-11-04 16:53:57'),
	(59, 56, 'Beban Perkoperasian', 'Kredit', '500-3', 0, '2022-11-04 16:54:18', '2022-11-04 16:54:18'),
	(60, 56, 'Shu Operasional ((a+b)-c)', 'Kredit', '501', 0, '2022-11-04 16:54:34', '2022-11-04 16:54:34'),
	(61, 56, 'Pendapatan dan beban lain', 'Kredit', '501-1', 0, '2022-11-04 16:54:51', '2022-11-04 16:54:51'),
	(62, 56, 'Pendapatan Lainnya', 'Kredit', '501-2', 0, '2022-11-04 16:55:17', '2022-11-04 16:55:17'),
	(63, 56, 'Beban Lainnya', 'Kredit', '501-3', 0, '2022-11-04 16:55:31', '2022-11-04 16:55:31'),
	(64, 56, 'SHU Sebelum Bunga Dan Pajak', 'Kredit', '504', 0, '2022-11-04 16:55:46', '2022-11-04 16:55:46'),
	(65, 56, 'Beban Bunga', 'Kredit', '504-1', 0, '2022-11-04 16:56:01', '2022-11-04 16:56:01'),
	(66, 56, 'SHU Sebelum Pajak', 'Kredit', '505', 0, '2022-11-04 16:56:16', '2022-11-04 16:56:16'),
	(67, 56, 'Pajak penghasilan', 'Kredit', '506', 0, '2022-11-04 16:56:30', '2022-11-04 16:56:30'),
	(68, 56, 'SHU Setelah Pajak', 'Kredit', '507', 0, '2022-11-04 16:56:45', '2022-11-04 16:56:45'),
	(69, NULL, 'Arus kas dari aktivitas koperasi', 'Debet', '600', 0, '2022-11-04 16:57:10', '2022-11-04 16:57:10'),
	(70, 69, 'Penerimaan kas dari pelayanan pada anggota', 'Debet', '600-1', 0, '2022-11-04 16:57:26', '2022-11-04 16:57:26'),
	(71, 69, 'Penerimaan kas dari penjualan non anggota', 'Debet', '600-2', 0, '2022-11-04 16:57:45', '2022-11-04 16:57:45'),
	(72, 69, 'Pembayaran terkait pembelian barang/jasa untuk dijual ke anggota', 'Kredit', '600-3', 0, '2022-11-04 16:58:01', '2022-11-04 16:58:01'),
	(73, 69, 'Pembayaran terkait pembelian barang/jasa untuk dijual ke non anggota', 'Kredit', '600-4', 0, '2022-11-04 16:58:15', '2022-11-04 16:58:15'),
	(74, 69, 'Pembayaran biaya operasional dan administrasi', 'Kredit', '600-5', 0, '2022-11-04 16:58:29', '2022-11-04 16:58:29'),
	(75, 69, 'Pembayaran biaya bunga', 'Kredit', '600-6', 0, '2022-11-04 16:58:44', '2022-11-04 16:58:44'),
	(76, 69, 'Pembayaran pajak', 'Kredit', '600-7', 0, '2022-11-04 16:59:07', '2022-11-04 16:59:07'),
	(77, 69, 'Pembayaran pos luar biasa', 'Kredit', '600-8', 0, '2022-11-04 17:03:20', '2022-11-04 17:03:20'),
	(78, 69, 'Arus Kas dari Aktivitas', 'Debet', '601-1', 0, '2022-11-04 17:03:38', '2022-11-04 17:03:38'),
	(79, 69, 'Investasi', 'Kredit', '601-2', 0, '2022-11-04 17:03:54', '2022-11-04 17:03:54'),
	(80, 69, 'Penjualan surat berharga', 'Debet', '601-3', 0, '2022-11-04 17:04:09', '2022-11-04 17:04:09'),
	(81, 69, 'Penjualan investasi jangka panjang', 'Debet', '601-4', 0, '2022-11-04 17:04:30', '2022-11-04 17:04:30'),
	(82, 69, 'Penjualan porperti investasi', 'Debet', '601-5', 0, '2022-11-04 17:04:46', '2022-11-04 17:04:46'),
	(83, 69, 'Penjualan aset tetap', 'Debet', '601-6', 0, '2022-11-04 17:05:01', '2022-11-04 17:05:01'),
	(84, 69, 'Pembelian surat berharga', 'Kredit', '601-7', 0, '2022-11-04 17:05:29', '2022-11-04 17:05:29'),
	(85, 69, 'Pembelian investasi jangka panjang', 'Kredit', '607-8', 0, '2022-11-04 17:05:43', '2022-11-04 17:05:43'),
	(86, 69, 'Pembelian porperti investasi', 'Kredit', '601-9', 0, '2022-11-04 17:05:59', '2022-11-04 17:05:59'),
	(87, 69, 'Pembelian aset tetap', 'Kredit', '601-10', 0, '2022-11-04 17:06:36', '2022-11-04 17:06:36'),
	(88, 69, 'Arus Kas Dari Aktivitas Pendanaan', 'Debet', '602', 0, '2022-11-04 17:06:56', '2022-11-04 17:06:56'),
	(89, 69, 'Penerimaan simpanan pokok', 'Debet', '602-1', 0, '2022-11-04 17:07:11', '2022-11-04 17:07:11'),
	(90, 69, 'Penerimaan simpanan wajib', 'Debet', '602-2', 0, '2022-11-04 17:07:28', '2022-11-04 17:07:28'),
	(91, 69, 'Penerimaan hibah/donasi', 'Debet', '602-3', 0, '2022-11-04 17:07:43', '2022-11-04 17:07:43'),
	(92, 69, 'Penerbitan surat utang', 'Debet', '602-4', 0, '2022-11-04 17:07:59', '2022-11-04 17:07:59'),
	(93, 69, 'Penerimaan pinjaman bank', 'Debet', '602-5', 0, '2022-11-04 17:08:15', '2022-11-04 17:08:15'),
	(94, 69, 'Pengembalian simpanan pokok', 'Kredit', '602-6', 0, '2022-11-04 17:08:30', '2022-11-04 17:08:30'),
	(95, 69, 'Pengembalian simpanan wajib', 'Kredit', '602-7', 0, '2022-11-04 17:08:43', '2022-11-04 17:08:43'),
	(96, 69, 'Pembayaran surat utang', 'Kredit', '602-8', 0, '2022-11-04 17:09:00', '2022-11-04 17:09:00'),
	(97, 69, 'Pembayaran pinjaman bank', 'Kredit', '602-9', 0, '2022-11-04 17:09:13', '2022-11-04 17:09:13'),
	(98, 69, 'Saldo Kas Awal Periode', 'Debet', '603', 0, '2022-11-04 17:09:29', '2022-11-04 17:09:29'),
	(99, 69, 'Saldo Kas Akhir Periode', 'Debet', '604', 0, '2022-11-04 17:09:45', '2022-11-04 17:09:45'),
	(100, NULL, 'Saldo Modal Awal', 'Debet', '700', 0, '2022-11-04 17:09:56', '2022-11-04 17:09:56'),
	(101, 100, 'Simpanan Pokok', 'Kredit', '701-1', 0, '2022-11-04 17:10:15', '2022-11-04 17:10:15'),
	(102, 100, 'Simpanan Wajib', 'Kredit', '701-2', 0, '2022-11-04 17:10:29', '2022-11-04 17:10:29'),
	(103, 100, 'Hibah PP', 'Kredit', '701-3', 0, '2022-11-04 17:10:42', '2022-11-04 17:10:42'),
	(104, 100, 'Cadangan PP', 'Kredit', '701-4', 0, '2022-11-04 17:10:57', '2022-11-04 17:10:57'),
	(105, 100, 'Biaya Cadangan SHU', 'Kredit', '701-5', 0, '2022-11-04 17:11:14', '2022-11-04 17:11:14'),
	(106, NULL, 'Transaksi antara koperasi dengan anggotanya', 'Debet', '800', 0, '2022-11-04 17:11:40', '2022-11-04 17:11:40'),
	(107, 106, 'Transaksi antara koperasi dengan non anggotanya', 'Debet', '801', 0, '2022-11-04 17:11:56', '2022-11-04 17:11:56'),
	(108, 106, 'Transaksi khusus pada koperasi sektor ril', 'Debet', '802', 0, '2022-11-04 17:12:10', '2022-11-04 17:12:10');
/*!40000 ALTER TABLE `akuns` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.anggotas
CREATE TABLE IF NOT EXISTS `anggotas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_daftar` date NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `simpanan_pokok` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.anggotas: ~5 rows (approximately)
/*!40000 ALTER TABLE `anggotas` DISABLE KEYS */;
INSERT INTO `anggotas` (`id`, `tgl_daftar`, `nama_anggota`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `agama`, `status_perkawinan`, `no_tlp`, `alamat`, `simpanan_pokok`, `created_at`, `updated_at`) VALUES
	(1, '2022-01-01', 'Nia', '5104024667008809', 'Perempuan', 'Badung', '1990-01-01', 'Mentor', 'Hindu', 'Cerai Hidup', '081936278911', 'Badung', 10000, '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(2, '2022-01-01', 'Angga', '5104024666656809', 'Perempuan', 'Badung', '1990-01-01', 'Mentor', 'Hindu', 'Cerai Hidup', '081936278911', 'Badung', 10000, '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(3, '2022-11-06', 'buwyvuwiwe', '5104024707008809', 'Perempuan', 'gelagy', '2022-11-06', 'fizur', 'pobymisasi', 'Cerai Hidup', '089883748914', 'pemevoz', 10000, '2022-11-06 07:17:23', '2022-11-06 07:17:23'),
	(4, '2022-11-07', 'zuzedy', '5104024809000779', 'Laki-Laki', 'qazyw', '2022-11-07', 'hisadeta', 'rylecizup', 'Cerai Mati', '089883748914', 'jyzupakelu', 10000, '2022-11-07 20:39:15', '2022-11-07 20:39:15'),
	(7, '2022-11-07', 'qelisywug', '5104024709077001', 'Laki-Laki', 'hoduri', '2022-11-07', 'dycohu', 'wijam', 'Belum Kawin', '089883748914', 'dyretijug', 10000, '2022-11-07 20:42:16', '2022-11-07 20:42:16');
/*!40000 ALTER TABLE `anggotas` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.angsuran_pinjamans
CREATE TABLE IF NOT EXISTS `angsuran_pinjamans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pinjaman_id` bigint(20) unsigned NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal_setoran` double NOT NULL,
  `sisa_angsuran` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.angsuran_pinjamans: ~1 rows (approximately)
/*!40000 ALTER TABLE `angsuran_pinjamans` DISABLE KEYS */;
INSERT INTO `angsuran_pinjamans` (`id`, `pinjaman_id`, `tanggal_pembayaran`, `nominal_setoran`, `sisa_angsuran`, `status`, `created_at`, `updated_at`) VALUES
	(2, 1, '2022-11-06', 411992420, 3587933980, 0, '2022-11-06 13:13:52', '2022-11-06 13:13:52');
/*!40000 ALTER TABLE `angsuran_pinjamans` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.detail_memorials
CREATE TABLE IF NOT EXISTS `detail_memorials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `akun_id` bigint(20) unsigned NOT NULL,
  `memorial_id` bigint(20) unsigned NOT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.detail_memorials: ~3 rows (approximately)
/*!40000 ALTER TABLE `detail_memorials` DISABLE KEYS */;
INSERT INTO `detail_memorials` (`id`, `akun_id`, `memorial_id`, `debet`, `kredit`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, 70000, 0, '2022-11-06 07:46:44', '2022-11-06 07:46:44'),
	(2, 71, 2, 50000, 0, '2022-11-06 07:50:02', '2022-11-06 07:50:02'),
	(3, 21, 3, 2000000, 1000000, '2022-11-06 13:16:16', '2022-11-06 13:16:16');
/*!40000 ALTER TABLE `detail_memorials` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.jaminan_agunans
CREATE TABLE IF NOT EXISTS `jaminan_agunans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pinjaman_id` bigint(20) unsigned NOT NULL,
  `jaminan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_jaminan` double NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.jaminan_agunans: ~3 rows (approximately)
/*!40000 ALTER TABLE `jaminan_agunans` DISABLE KEYS */;
INSERT INTO `jaminan_agunans` (`id`, `pinjaman_id`, `jaminan`, `nominal_jaminan`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Motor', 10000, 'Warna merah', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(2, 2, 'In irure sunt aut au', 20000000, 'Ut distinctio Praes', NULL, NULL),
	(3, 4, 'Voluptatum beatae ex', 2000000, 'Illo delectus fugit', NULL, NULL);
/*!40000 ALTER TABLE `jaminan_agunans` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.memorials
CREATE TABLE IF NOT EXISTS `memorials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_jurnal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.memorials: ~3 rows (approximately)
/*!40000 ALTER TABLE `memorials` DISABLE KEYS */;
INSERT INTO `memorials` (`id`, `tanggal`, `keterangan`, `created_at`, `updated_at`, `no_jurnal`) VALUES
	(1, '2022-11-06', 'test', '2022-11-06 07:46:44', '2022-11-06 07:46:44', '061120220001'),
	(2, '2022-11-06', 'testt', '2022-11-06 07:50:02', '2022-11-06 07:50:02', '061120220002'),
	(3, '2022-11-06', 'test', '2022-11-06 13:16:16', '2022-11-06 13:16:16', '061120220003');
/*!40000 ALTER TABLE `memorials` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.migrations: ~19 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_09_10_123755_create_anggotas_table', 1),
	(6, '2022_09_17_033726_create_permission_tables', 1),
	(7, '2022_09_22_043611_create_pegawais_table', 1),
	(8, '2022_09_24_123832_create_produk_simpanans_table', 1),
	(9, '2022_09_27_134949_create_rekening_simpanans_table', 1),
	(10, '2022_10_07_065612_create_jaminan_agunans_table', 1),
	(11, '2022_10_07_133333_create_rekening_pinjamans_table', 1),
	(12, '2022_10_07_163226_create_pinjamans_table', 1),
	(13, '2022_10_15_032428_create_simpanan_anggotas_table', 1),
	(14, '2022_10_20_135001_create_akuns_table', 1),
	(15, '2022_10_20_135239_create_memorials_table', 1),
	(16, '2022_10_20_160038_create_angsuran_pinjamans_table', 1),
	(17, '2022_10_31_154213_create_detail_memorials', 1),
	(18, '2022_11_05_132511_add_no_jurnal_to_memorials', 1),
	(19, '2022_11_06_215753_add_status_to_pinjamans', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.pegawais
CREATE TABLE IF NOT EXISTS `pegawais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.pegawais: ~4 rows (approximately)
/*!40000 ALTER TABLE `pegawais` DISABLE KEYS */;
INSERT INTO `pegawais` (`id`, `no_pegawai`, `nama_pegawai`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_tlp`, `alamat`, `divisi`, `created_at`, `updated_at`) VALUES
	(1, '1127', 'Ryan', '5104024667007809', 'Laki-laki', 'Gianyar', '1990-01-01', '081936278911', 'Gianyar', 'Admin', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(2, '1167', 'Ryan', '5104024667007809', 'Laki-laki', 'Gianyar', '1990-01-01', '081936278911', 'Gianyar', 'Bendahara', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(3, '00003', 'nefiha', '5102030005000062', 'Laki-Laki', 'jifobebab', '2022-11-06', '089883748913', 'qyjavafa', 'Admin', '2022-11-06 07:17:55', '2022-11-06 07:17:55'),
	(4, '00004', 'gecyvyw', '5104024809000009', 'Laki-Laki', 'hovypi', '2022-11-06', '089883748914', 'sodapunu', 'Ketua', '2022-11-06 07:18:20', '2022-11-06 07:18:20');
/*!40000 ALTER TABLE `pegawais` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.pinjamans
CREATE TABLE IF NOT EXISTS `pinjamans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) unsigned NOT NULL,
  `no_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bunga` int(11) NOT NULL,
  `jumlah_pinjaman` double NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `jangka_waktu_pinjaman` int(11) NOT NULL,
  `provisi` double NOT NULL,
  `materai` double NOT NULL,
  `notaris` double NOT NULL,
  `simpanan_wajib` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pinjamans_anggota_id_index` (`anggota_id`),
  CONSTRAINT `pinjamans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.pinjamans: ~4 rows (approximately)
/*!40000 ALTER TABLE `pinjamans` DISABLE KEYS */;
INSERT INTO `pinjamans` (`id`, `anggota_id`, `no_pinjaman`, `agunan`, `bunga`, `jumlah_pinjaman`, `tgl_pinjaman`, `jangka_waktu_pinjaman`, `provisi`, `materai`, `notaris`, `simpanan_wajib`, `created_at`, `updated_at`, `status`) VALUES
	(1, 3, '00001', 'Tanpa Agunan', 3, 4000000000, '2022-11-06', 10, 30000, 13600, 30000, 0, '2022-11-06 13:13:41', '2022-11-06 22:25:49', 1),
	(2, 4, '00002', 'Dengan Agunan', 3, 4000000, '2022-11-07', 6, 20000, 16900, 18400, 20000, '2022-11-07 21:14:49', '2022-11-07 21:14:49', 0),
	(3, 3, '00003', 'Tanpa Agunan', 3, 4000000, '2022-11-16', 4, 40000, 10000, 10000, 10000, '2022-11-16 21:19:20', '2022-11-16 21:19:21', NULL),
	(4, 3, '00004', 'Dengan Agunan', 3, 3000000, '2022-11-16', 19, 10000, 10000, 8000, 10000, '2022-11-16 21:21:20', '2022-11-16 21:23:39', 1);
/*!40000 ALTER TABLE `pinjamans` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.produk_simpanans
CREATE TABLE IF NOT EXISTS `produk_simpanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.produk_simpanans: ~4 rows (approximately)
/*!40000 ALTER TABLE `produk_simpanans` DISABLE KEYS */;
INSERT INTO `produk_simpanans` (`id`, `no_produk`, `produk`, `created_at`, `updated_at`) VALUES
	(1, '1001', 'Simpanan Pokok', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(2, '1002', 'Simpanan Wajib', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(3, '1003', 'Simpanan Sukarela', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(4, '1004', 'Hibah/Donasi', '2022-11-06 07:10:01', '2022-11-06 07:10:01');
/*!40000 ALTER TABLE `produk_simpanans` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.rekening_simpanans
CREATE TABLE IF NOT EXISTS `rekening_simpanans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) unsigned NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rekening_simpanans_anggota_id_index` (`anggota_id`),
  CONSTRAINT `rekening_simpanans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.rekening_simpanans: ~4 rows (approximately)
/*!40000 ALTER TABLE `rekening_simpanans` DISABLE KEYS */;
INSERT INTO `rekening_simpanans` (`id`, `anggota_id`, `no_rekening`, `tgl_daftar`, `created_at`, `updated_at`) VALUES
	(1, 1, '001', '2022-01-01', '2022-11-06 07:10:01', '2022-11-06 07:10:01'),
	(2, 3, '0002', '2022-11-06', NULL, NULL),
	(3, 4, '0003', '2022-11-07', NULL, NULL),
	(6, 7, '0006', '2022-11-07', NULL, NULL);
/*!40000 ALTER TABLE `rekening_simpanans` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.simpanan_anggotas
CREATE TABLE IF NOT EXISTS `simpanan_anggotas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint(20) unsigned NOT NULL,
  `produk_simpanan_id` bigint(20) unsigned NOT NULL,
  `rekening_simpanan_id` bigint(20) unsigned NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Setor',
  `saldo` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `simpanan_anggotas_anggota_id_index` (`anggota_id`),
  KEY `simpanan_anggotas_produk_simpanan_id_index` (`produk_simpanan_id`),
  KEY `simpanan_anggotas_rekening_simpanan_id_index` (`rekening_simpanan_id`),
  CONSTRAINT `simpanan_anggotas_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `simpanan_anggotas_produk_simpanan_id_foreign` FOREIGN KEY (`produk_simpanan_id`) REFERENCES `produk_simpanans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `simpanan_anggotas_rekening_simpanan_id_foreign` FOREIGN KEY (`rekening_simpanan_id`) REFERENCES `rekening_simpanans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.simpanan_anggotas: ~14 rows (approximately)
/*!40000 ALTER TABLE `simpanan_anggotas` DISABLE KEYS */;
INSERT INTO `simpanan_anggotas` (`id`, `anggota_id`, `produk_simpanan_id`, `rekening_simpanan_id`, `tgl_transaksi`, `transaksi`, `saldo`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 2, '2022-11-06', 'Setor', 10000, NULL, NULL),
	(2, 3, 3, 2, '2022-11-06', 'Setor', 3000000, '2022-11-06 13:01:22', '2022-11-06 13:01:22'),
	(3, 3, 3, 2, '2022-11-06', 'Tarik', 300000, '2022-11-06 13:01:39', '2022-11-06 13:01:39'),
	(4, 4, 1, 3, '2022-11-07', 'Setor', 10000, NULL, NULL),
	(9, 7, 3, 6, '2022-11-16', 'Setor', 3000, '2022-11-16 22:50:25', '2022-11-16 22:50:25'),
	(10, 7, 3, 6, '2022-11-16', 'Setor', 3000, '2022-11-16 23:09:02', '2022-11-16 23:09:02'),
	(13, 7, 1, 6, '2022-11-16', 'Setor', 3000, '2022-11-16 23:10:34', '2022-11-16 23:10:34'),
	(14, 7, 4, 6, '2022-11-16', 'Tarik', 3000, '2022-11-16 23:13:15', '2022-11-16 23:13:15'),
	(15, 7, 4, 6, '2022-11-16', 'Tarik', 0, '2022-11-16 23:14:20', '2022-11-16 23:14:20'),
	(16, 7, 1, 6, '2022-11-16', 'Tarik', 850, '2022-11-16 23:14:44', '2022-11-16 23:14:44'),
	(17, 7, 3, 6, '2022-11-16', 'Setor', 2222, '2022-11-16 23:45:36', '2022-11-16 23:45:36'),
	(18, 7, 3, 6, '2022-11-16', 'Setor', 111, '2022-11-16 23:47:18', '2022-11-16 23:47:18'),
	(19, 7, 3, 6, '2022-12-02', 'Tarik', 0, '2022-11-16 23:51:02', '2022-11-16 23:51:02'),
	(20, 3, 3, 2, '2022-11-18', 'Tarik', 200000, NULL, NULL);
/*!40000 ALTER TABLE `simpanan_anggotas` ENABLE KEYS */;

-- Dumping structure for table koperasi_ksu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) unsigned DEFAULT NULL,
  `anggota_id` bigint(20) unsigned DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anggota',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table koperasi_ksu.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `pegawai_id`, `anggota_id`, `username`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, NULL, 3, 'anggota', '$2y$10$G3UQYWR43kFVELR/TP.A4.k36w2hQm6AeqidIF3bWjAVeDnBCLF.a', 'Anggota', NULL, NULL, NULL),
	(3, 3, NULL, 'admin', '$2y$10$CldQk.t.TZjEnFyaaa8/UuvDO/Z8wnJRa8E2FF7Z8gEzAZlbeWFJi', 'Admin', NULL, NULL, NULL),
	(4, 4, NULL, 'ketua', '$2y$10$uIYq0QuMXRihM3sJgjIp/e2WBQRO5.r/LPgfX2tgBCIFxr4DQt9Ne', 'Ketua', NULL, NULL, NULL),
	(5, NULL, 4, 'tenoxo', '$2y$10$V2zApuydq0.W5LdOwTC1Cutp0LCLowuBIDMNUWKA2v.1jY81IX9.q', 'Anggota', NULL, NULL, NULL),
	(8, NULL, 7, 'buvyr', '$2y$10$rVR8YKXS7FZRxFpom3F64ekvLYfgD7w.hi1/hBbH2OUtTKZRZONvW', 'Anggota', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
