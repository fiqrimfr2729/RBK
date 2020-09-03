-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2020 pada 11.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `Keterangan` varchar(1) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `NIS`, `tanggal`, `Keterangan`, `id_jurusan`, `id_sekolah`) VALUES
(3, 1703075, '2020-08-24', 'S', 1, 1),
(4, 1703075, '2020-08-25', 'S', 5, 1),
(5, 1703075, '2020-08-25', 'A', 5, 1),
(6, 1703075, '2020-08-25', 'S', 5, 1),
(7, 1703090, '2020-08-27', 'S', 7, 2),
(8, 1703066, '2020-08-27', 'S', 7, 2),
(9, 1703090, '2020-08-27', 'S', 7, 2),
(10, 1703066, '2020-08-27', 'A', 7, 2),
(11, 1703090, '2020-08-27', 'S', 7, 2),
(12, 1703066, '2020-08-27', 'S', 7, 2),
(13, 1703090, '2020-08-27', 'S', 7, 2),
(14, 1703066, '2020-08-27', 'A', 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `NIK` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `id_user`, `nama_admin`, `alamat_admin`, `email_admin`, `NIK`, `password`, `username`, `id_sekolah`) VALUES
(1, 1703067, 'ade diana apriliyani', 'Desa Jatibarang Indramayu', 'adedianaapriliyani17@gmail.com', 1703067, '12345678', 'losarang', 1),
(2, 1703081, 'tika surtikayati', 'kota majalengka jawa barat', 'tikasurtikayati@gmail.com', 1703081, '12345678', 'tukdana', 2),
(3, 1703078, 'Iis Juita Sari', 'Lohbener raya', 'iisjuitasari@gmail.com', 1703078, '12345678', 'iis', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `belajar`
--

CREATE TABLE `belajar` (
  `id_belajar` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `waktu_pelanggaran` date NOT NULL,
  `waktu_input` datetime NOT NULL,
  `tkp` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `NIS` int(11) DEFAULT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `isi_bimbingan` text,
  `isi_balasan` text,
  `tanggal_bimbingan` datetime DEFAULT NULL,
  `tanggal_balasan` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `tanggal` date NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_users`, `NIS`, `id_tingkatan`, `subjek`, `isi_bimbingan`, `isi_balasan`, `tanggal_bimbingan`, `tanggal_balasan`, `status`, `tanggal`, `id_sekolah`) VALUES
(28, 10, 1703066, 1, 'Karir', 'bu gimana bu', 'baik', '2020-08-15 00:03:46', '2020-08-27 03:25:47', 1, '2020-08-15', 2),
(29, 202017044, 1703072, 1, 'sosial', 'assalamualaikum\r\n', NULL, '2020-08-25 11:47:52', NULL, 1, '2020-08-25', 2),
(30, 3, 1703066, 1, 'Sosial', 'ade diana', NULL, '2020-08-25 11:55:43', NULL, 1, '2020-08-25', 2),
(31, 10, 1703066, 1, 'karir', 'assalamualaikum wr wb', 'waalaikumusalam', '2020-08-25 11:58:31', '2020-08-25 11:59:06', 1, '2020-08-25', 2),
(32, 10, 1703066, 1, 'sosial', 'assalamuaalikum ibu.\r\nsaya mau bimbingan', 'waalaikumusalam', '2020-08-25 13:47:41', '2020-08-25 13:48:25', 1, '2020-08-25', 2),
(33, 202017046, 1703072, 1, 'pribadi', 'assalamualaikum', NULL, '2020-08-25 22:02:55', NULL, 1, '2020-08-25', 2),
(34, 202017046, 1703072, 1, 'karir', 'Assalamualaikum\r\nibu ini abdullah', NULL, '2020-08-25 22:07:19', NULL, 1, '2020-08-25', 2),
(35, 202017042, 1703072, 1, 'sosial', 'hai', NULL, '2020-08-25 22:10:59', NULL, 1, '2020-08-25', 2),
(36, 7, 1703075, 1, 'karir', 'haiii bu ku', 'haiii juga abdullah', '2020-08-25 22:12:21', '2020-08-25 22:13:45', 2, '2020-08-25', 1),
(37, 7, 1703075, 1, 'pribadi', 'Assalamualaikum.\r\nBapak ini abdullah, saya ingin melanjutkan kuliah tapi bingung keadaan orang tua tidak mndukung, gimana ya pak?', 'waalaikumussalam abdullah.\r\nsabar', '2020-08-25 22:19:03', '2020-08-26 00:55:56', 2, '2020-08-25', 1),
(38, 202017046, 1703075, 1, 'pribadi', 'Assalamualaikum. Bapak ini abdullah, saya ingin melanjutkan kuliah tapi bingung keadaan orang tua tidak mndukung, gimana ya pak?', NULL, '2020-08-26 01:32:15', NULL, 1, '2020-08-26', 1),
(39, 7, 1703075, 1, 'Pribadi', 'bu mantap mantap kuy\r\n', 'kuyy', '2020-08-27 01:49:26', '2020-08-27 01:50:46', 2, '2020-08-27', 1),
(40, 3, 1703066, 1, 'sosial', 'diana ngantuk', NULL, '2020-08-27 01:53:50', NULL, 1, '2020-08-27', 2),
(41, 7, 1703075, 1, 'Pribadi', 'assalamulaikum.\r\nBapak, gimana terkait permasalahan saya', 'menurut saya kamu harus lebih sabar lagi', '2020-08-27 03:27:51', '2020-08-27 04:05:51', 2, '2020-08-27', 1),
(42, 7, 1703075, 1, 'Pribadi', 'assalamualaikum\r\nsaya Abdullah, saya ingin bercerita ', 'waalaikumusalam,..\r\nsilahkan abdullah...', '2020-08-27 04:08:53', '2020-08-27 04:11:19', 2, '2020-08-27', 1),
(43, 7, 1703075, 1, 'Pribadi', 'assalamualaikum.\r\nsaya abdullah, ssaya mempunya masalah pribadi yang aneh bu.. saya.......', 'waalaikumusalam... semogga masalah cepet kelar', '2020-08-27 04:36:34', '2020-08-27 04:38:37', 2, '2020-08-27', 1),
(44, 202017047, 1702033, 1, 'pribadi', 'n', NULL, '2020-08-27 13:58:20', NULL, 0, '2020-08-27', 1),
(45, 202017047, 1702033, 1, 'Sosial', 'aa', NULL, '2020-08-27 13:59:31', NULL, 0, '2020-08-27', 1),
(46, 202017042, 1703072, 1, 'belajar', 'as', NULL, '2020-08-27 14:02:34', NULL, 0, '2020-08-27', 2),
(47, 202017042, 1703072, 2, 'pribadi', 'tingkat 2', NULL, '2020-08-27 14:03:41', NULL, 0, '2020-08-27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat_guru` text NOT NULL,
  `email_guru` varchar(50) NOT NULL,
  `NIK` int(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `alamat_guru`, `email_guru`, `NIK`, `id_jabatan`, `id_tingkatan`, `id_user`, `id_sekolah`) VALUES
(4, 'Fifi Lutfiah, S.Psi', 'Indramayu', 'fifibk@gmail.com', 1998, 1, 3, 1998, 2),
(5, 'Carma, S.Pd., S.ST', 'Indramayu', 'carmaelektro@gmail.com', 1999, 1, 1, 1999, 1),
(6, 'Aim, S. Ag', 'Losarang', 'aimbk@gmail.com', 1997, 1, 1, 1997, 2),
(7, 'Gita Rizkiana Nasri A., S.Pd', 'Majalengka', 'gitbk@gmail.com', 1996, 1, 2, 1996, 2),
(8, 'Adhi Marwanuddin, ST', 'Cirebon', 'adhimesin@gmail.com', 1994, 1, 2, 1994, 1),
(9, 'Purnama, ST', 'Losarang', 'purnamatkr@gmail.com', 1993, 1, 3, 1993, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_sekolah`) VALUES
(2, 'Teknik Pemesinan', 1),
(3, 'Teknik Kendaraan Ringan', 1),
(4, 'Teknik Komputer dan Jaringan', 1),
(5, 'Agribisnis Tanaman Pangan dan Hortikultura', 1),
(7, 'IPA', 2),
(8, 'IPS', 2),
(9, 'Teknik Pendingin', 1),
(13, 'Teknik Anu', 0),
(14, 'Teknik ini', 0),
(15, 'Teknik Informatika', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pelanggaran`
--

CREATE TABLE `kategori_pelanggaran` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pelanggaran`
--

INSERT INTO `kategori_pelanggaran` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Kedisiplinan'),
(5, 'Akademik'),
(6, 'Asusila'),
(7, 'Kesopanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `urutan_kelas` varchar(5) DEFAULT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_tingkatan`, `id_jurusan`, `urutan_kelas`, `id_sekolah`) VALUES
(14, 1, 2, '1', 1),
(15, 1, 2, '2', 1),
(16, 1, 2, '3', 1),
(17, 1, 2, '4', 1),
(18, 2, 2, '1', 1),
(19, 2, 2, '2', 1),
(20, 2, 2, '3', 1),
(21, 2, 2, '4', 1),
(22, 3, 2, '1', 1),
(23, 3, 2, '2', 1),
(24, 3, 2, '3', 1),
(25, 3, 2, '4', 1),
(28, 1, 2, '5', 1),
(30, 1, 3, '1', 1),
(32, 1, 3, '2', 1),
(33, 1, 3, '3', 1),
(34, 1, 3, '4', 1),
(35, 2, 3, '1', 1),
(36, 2, 3, '2', 1),
(37, 2, 3, '3', 1),
(38, 2, 3, '4', 1),
(39, 3, 3, '1', 1),
(40, 3, 3, '2', 1),
(41, 3, 3, '3', 1),
(42, 3, 3, '4', 1),
(43, 1, 4, '1', 1),
(44, 1, 4, '2', 1),
(55, 1, 4, '3', 1),
(56, 1, 4, '4', 1),
(57, 2, 4, '1', 1),
(58, 2, 4, '2', 1),
(59, 2, 4, '3', 1),
(60, 2, 4, '4', 1),
(61, 3, 4, '1', 1),
(62, 3, 4, '2', 1),
(63, 3, 4, '3', 1),
(64, 3, 4, '4', 1),
(65, 2, 5, '1', 1),
(66, 1, 5, '2', 1),
(67, 1, 5, '3', 1),
(68, 1, 5, '4', 1),
(69, 2, 5, '1', 1),
(70, 2, 5, '2', 1),
(71, 2, 5, '3', 1),
(72, 2, 5, '4', 1),
(73, 3, 5, '1', 1),
(74, 3, 5, '2', 1),
(75, 3, 5, '3', 1),
(76, 3, 5, '4', 1),
(89, 1, 7, '1', 2),
(90, 2, 7, '2', 2),
(91, 2, 7, '1', 2),
(92, 2, 7, '2', 2),
(93, 3, 7, '1', 2),
(94, 3, 7, '2', 2),
(95, 3, 8, '1', 2),
(96, 1, 8, '2', 2),
(97, 2, 8, '1', 2),
(98, 2, 8, '2', 2),
(99, 3, 8, '1', 2),
(100, 3, 8, '2', 2),
(104, 1, 2, '1', 1),
(105, 1, 7, '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `id_pengumuman` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `isi_komentar`, `id_pengumuman`, `created_at`) VALUES
(1, 1703066, 'Mantap Jiwa', 1, '2020-08-24 00:00:00'),
(2, 1703066, 'asamulaikum bu', 4, '0000-00-00 00:00:00'),
(3, 1703066, 'waalaikum salam', 4, '2020-08-15 05:28:46'),
(4, 5, 'siap', 1, '2020-08-15 06:20:29'),
(5, 1703066, 'iya bu', 1, '2020-08-18 02:43:48'),
(6, 1703066, 'baik bu', 10, '2020-08-23 06:16:58'),
(7, 1703066, 'Baik bu darsih', 11, '2020-08-23 06:18:37'),
(8, 1703066, 'yang lain sih gimana  yah', 11, '2020-08-23 06:18:46'),
(9, 1703066, 'yang lain sih gimana  yah', 11, '2020-08-23 06:18:59'),
(10, 1703066, 'haii', 11, '2020-08-23 06:21:02'),
(11, 1703075, 'baik bu', 9, '2020-08-23 06:28:39'),
(12, 1703066, 'Baik pak, Inshaa Allah saya hadirr.. Terima Kasih untuk infonya\r\n', 12, '2020-08-25 08:19:54'),
(13, 1703075, 'waalaikumusalam', 17, '2020-08-27 04:09:57'),
(14, 1703075, 'iya bu', 17, '2020-08-27 04:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konseling`
--

CREATE TABLE `konseling` (
  `id_konseling` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `NIS` int(11) DEFAULT NULL,
  `id_pelanggaran` int(11) DEFAULT NULL,
  `catatan` text,
  `waktu_pelanggaran` date DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `tkp` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_pelanggaran` varchar(255) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `id_kategori`, `nama_pelanggaran`, `bobot`) VALUES
(2, 4, 'Pribadi', 0),
(3, 5, 'Keluarga', 20),
(4, 6, 'Akademik', 30),
(5, 4, 'karir', 10),
(6, 7, 'Sosial', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_buat` date NOT NULL,
  `foto` text NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `id_sekolah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `upload_file`, `id_user`, `tgl_buat`, `foto`, `isi_pengumuman`, `created_at`, `update_at`, `id_sekolah`) VALUES
(7, '', 1703067, '2020-07-23', 'IMG-20200303-WA00228.jpg', 'anu', '2020-07-22 17:00:00', NULL, 1),
(9, '', 1703067, '2020-08-16', 'SA_Logout_(1).png', 'Mantap Mantap', '2020-08-15 17:00:00', NULL, 1),
(12, '', 1997, '2020-08-25', 'xgUXaY.jpg', 'Assalamualaikum\r\nTemen-temen semuanya jangan untuk ikut dalam acara diskusi pada hari senin, 26 Sepetember 2019.\r\nSemangat!!!!!!!!!', '2020-08-24 17:00:00', NULL, 2),
(14, '', 1703067, '2020-08-27', '13020402_Permendag_No__25_Th__2019.PDF', 'Mantap', '2020-08-26 17:00:00', NULL, 1),
(15, '', 1998, '2020-08-27', '13020402_Permendag_No__25_Th__20191.PDF', 'Assalamaulaikum', '2020-08-26 17:00:00', NULL, 2),
(16, '', 1999, '2020-08-27', 'GANTI_PASSWORD.jpg', 'assalamualaikum... ', '2020-08-26 17:00:00', NULL, 1),
(17, '', 1999, '2020-08-27', 'Rekap_Absen_Siswa.jpg', 'assalamualaikum', '2020-08-26 17:00:00', NULL, 1),
(18, '', 1997, '2020-08-27', 'xgUXaY1.jpg', 'info penting!!!!', '2020-08-26 17:00:00', NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `file`, `tanggal`, `id_sekolah`) VALUES
(1, 'ABSENSI_SISWA_REKAP_OTOMATIS_SEMESTER_GENAP1.xlsx', '2020-08-26', 1),
(2, 'ABSENSI_SISWA_REKAP_OTOMATIS_SEMESTER_GENAP2.xlsx', '2020-08-26', 1),
(3, 'ABSENSI_SISWA_REKAP_OTOMATIS_SEMESTER_GENAP3.xlsx', '2020-08-26', 1),
(4, 'ABSENSI_SISWA_REKAP_OTOMATIS_SEMESTER_GENAP4.xlsx', '2020-08-27', 2),
(5, 'ABSENSI_SISWA_REKAP_OTOMATIS_SEMESTER_GENAP5.xlsx', '2020-08-27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(30) NOT NULL,
  `alamat_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`) VALUES
(1, 'SMK NEGERI 1 LOSARANG', 'Losarang Indramayu'),
(2, 'SMA NEGERI 1 TUKDANA', 'Tukdana Indramayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `NISN` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jk` varchar(9) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(15) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` text,
  `skor` int(11) NOT NULL DEFAULT '100',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `NIS`, `NISN`, `id_kelas`, `id_sekolah`, `nama_lengkap`, `jk`, `tempat_lahir`, `tanggal_lahir`, `email`, `agama`, `alamat`, `no_hp`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `skor`, `id_user`) VALUES
(0, 1702033, 1702033, 65, 1, 'Naufal', 'Laki-Laki', 'indramayu', '2020-08-26', 'syahruldiyono00@gmail.com', 'ISLAM', 'Losarang', '089775723', 'rahman', 'warsinih', 'petani', 'bappk', 'larangan', 100, 1702033),
(2, 1703066, 1703066, 89, 2, 'Syahrul Diyono', 'Laki-Laki', 'indramayu', '2020-08-08', 'syahruldiyono00@gmail.com', 'ISLAM', 'Rambatan Wetan Indramayu', '08977572395', 'sudiyono', 'rumsari', 'wiraswasta', 'ibu rumah tangga', 'rambatan wetan', 100, 1703066),
(0, 1703072, 1703072, 90, 2, 'Ade Diana Apriliyani', 'Perempuan', 'indramayu', '2020-08-24', 'adedianaapriliyani@gmail.com', 'ISLAM', 'indramayu', '08797768998', 'Nakrawi', 'Warsinih', 'wiraswasta', 'ibu rumah tangga', 'indramayu', 100, 1703072),
(0, 1703075, 1703075, 65, 1, 'Abdullah', 'Laki-Laki', 'indramayu', '2020-08-24', 'abdullah@gmail.com', 'ISLAM', 'indramayu', '0986489865', 'nani', 'rahmin', 'wiraswasta', 'ibu rumah tangga', 'indramayu', 100, 1703075),
(0, 1703078, 1703078, 95, 2, 'Najwah', 'Perempuan', 'indramayu', '2020-08-24', 'najwah@gmail.com', 'ISLAM', 'indramayu', '0986899965', 'rahman', 'rahmin', 'petani', 'ibu rumah tangga', 'indramayu', 100, 0),
(0, 1703086, 1703086, 65, 1, 'Umi Chabibah', 'Perempuan', 'indramayu', '2020-08-26', 'umi@gmail.com', 'ISLAM', 'indramayu', '0008889999', 'adi', 'adu', 'petani', 'ibu rumah tangga', 'indramayu', 100, 0),
(0, 1703090, 1703090, 89, 2, 'Kukuh Ajie Prayoga', 'Laki-Laki', 'indramayu', '2020-08-24', 'kukuh@gmail.com', 'ISLAM', 'indramayu', '09986567899', 'Rahmana', 'Rahmini', 'wiraswasta', 'ibu rumah tangga', 'indramayu', 100, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(10) DEFAULT NULL,
  `tingkatan` varchar(10) DEFAULT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`, `tingkatan`, `id_jurusan`) VALUES
(1, 'Sepuluh', 'X', 1),
(2, 'Sebelas', 'XI', 1),
(3, 'Duabelas', 'XII', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(255) NOT NULL,
  `NIS` int(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email_admin` varchar(100) NOT NULL,
  `level` enum('admin','siswa','ortu','guru') DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `NIS`, `nama_lengkap`, `username`, `password`, `email_admin`, `level`, `id_user`, `id_sekolah`) VALUES
(1, 88989, 'Tika Surtikayati', 'tukdana', '21232f297a57a5a743894a0e4a801fc3', 'tikasurtikayati@gmail.com', 'admin', 1703081, 2),
(3, 1703066, 'Syahrul Diyono', '1703066', 'e8d6ae45fc63b338b19fe4a97321d9e6', 'syahruldiyono00@gmail.com', 'siswa', 1703066, 2),
(4, 1703075, 'Abdullah', '1703075', '1cb74c82e0fd50743f4abb362febf71f', 'abdullah@gmail.com', 'siswa', 1703075, 1),
(6, 1703089, 'Ade Diana Apriliyani', 'losarang', '21232f297a57a5a743894a0e4a801fc3', 'adedianaapriliyanigmail.com', 'admin', 1703067, 1),
(7, 1999, 'Carma, S.Pd., S.ST', 'carma', '21232f297a57a5a743894a0e4a801fc3', 'carmaelektro', 'guru', 1999, 1),
(8, 1998, 'Fifi Lutfiah, S.Psi', 'fifi', '21232f297a57a5a743894a0e4a801fc3', 'fifibk@gmail.com', 'guru', 1998, 2),
(10, 1997, 'Aim, S.Ag', 'Aim', '21232f297a57a5a743894a0e4a801fc3', 'aimbk@gmail.com', 'guru', 1997, 2),
(11, 1996, 'Gita Rizkiana Nasri A., S.Pd', 'Gita', '21232f297a57a5a743894a0e4a801fc3', 'gitabk@gmail.com', 'guru', 1996, 2),
(12, 1994, 'Adhi Marwanuddin, ST', 'Adhi', '21232f297a57a5a743894a0e4a801fc3', 'adhimesin@gmail.com', 'guru', 1994, 2),
(13, 1993, 'Purnama, ST', 'purnama', '21232f297a57a5a743894a0e4a801fc3', 'purnamatkr@gmail.com', 'guru', 1993, 2),
(202017042, 1703072, 'Ade Diana Apriliyani', '1703072', '413ae5d434764b33e29d254667e4c783', 'adedianaapriliyani@gmail.com', 'siswa', 1703072, 2),
(202017043, 1703078, 'Najwah', '1703078', '230d31f090af6a984be9354080da4747', 'najwah@gmail.com', 'siswa', 0, 0),
(202017044, 1703075, 'Abdullah', '1703075', '1cb74c82e0fd50743f4abb362febf71f', 'abdullah@gmail.com', 'siswa', 0, 0),
(202017045, 1703090, 'Kukuh Ajie Prayoga', '1703090', 'e624c68db0979791a40b3236bd82d975', 'kukuh@gmail.com', 'siswa', 0, 2),
(202017046, 1703075, 'Abdullah', '1703075', '1cb74c82e0fd50743f4abb362febf71f', 'abdullah@gmail.com', 'siswa', 1703075, 1),
(202017047, 1702033, 'Naufal', '1702033', '42cdd05178492b6d747627bf0149bc71', 'syahruldiyono00@gmail.com', 'siswa', 1702033, 1),
(202017048, 1703086, 'Umi Chabibah', '1703086', 'd8163b268a829bd0fe357a9074213fc7', 'umi@gmail.com', 'siswa', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `kelas_ibfk_2` (`id_tingkatan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`id_konseling`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`);

--
-- Indeks untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id_tingkatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id_konseling` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202017049;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_tingkatan`) REFERENCES `tingkatan` (`id_tingkatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konseling`
--
ALTER TABLE `konseling`
  ADD CONSTRAINT `konseling_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konseling_ibfk_2` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_pelanggaran` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
