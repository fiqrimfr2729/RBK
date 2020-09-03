-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2019 pada 10.18
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

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
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `NIS` int(11) DEFAULT NULL,
  `subjek` varchar(100) DEFAULT NULL,
  `isi_bimbingan` text,
  `isi_balasan` text,
  `tanggal_bimbingan` datetime DEFAULT NULL,
  `tanggal_balasan` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_users`, `NIS`, `subjek`, `isi_bimbingan`, `isi_balasan`, `tanggal_bimbingan`, `tanggal_balasan`, `status`, `tanggal`) VALUES
(1, 5, 11307074, 'karir', 'saya ingin bertanya, dengan skill dan kemampuan yang saya miliki sekiranya saya bisa berkarir di bidang apa ya ?', 'silahkan dicocokkan dengan kemampuan anda.', '2019-08-14 02:28:53', '2019-08-29 20:26:59', 2, '2019-08-14'),
(2, NULL, 18926877, 'pribadi', 'Pak/Bu, bagaimana cara untuk menghadapi bullying disekolah ?', NULL, '2019-09-10 17:42:49', NULL, 1, '2019-09-10'),
(3, NULL, NULL, 'sosial', 'hay', NULL, '2019-09-10 21:42:52', NULL, 1, '2019-09-10'),
(4, 5, 14639335, 'pribadi', 'hay', 'iya ada apa?', '2019-09-11 05:50:09', '2019-09-11 05:50:32', 2, '2019-09-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'MIPA'),
(2, 'IPS');

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
(6, 'Asusila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `urutan_kelas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_tingkatan`, `id_jurusan`, `urutan_kelas`) VALUES
(2, 1, 1, '1'),
(3, 1, 1, '2'),
(4, 1, 1, '3'),
(6, 2, 1, '1'),
(7, 2, 1, '2'),
(8, 2, 1, '3'),
(9, 2, 1, '4'),
(10, 3, 1, '1'),
(11, 3, 1, '2'),
(12, 3, 1, '3'),
(13, 3, 1, '4'),
(14, 1, 2, '1'),
(15, 1, 2, '2'),
(16, 1, 2, '3'),
(17, 1, 2, '4'),
(18, 2, 2, '1'),
(19, 2, 2, '2'),
(20, 2, 2, '3'),
(21, 2, 2, '4'),
(22, 3, 2, '1'),
(23, 3, 2, '2'),
(24, 3, 2, '3'),
(25, 3, 2, '4'),
(26, 2, 1, '4'),
(27, 1, 1, '4'),
(28, 1, 2, '5');



-- --------------------------------------------------------

--
-- Struktur dari tabel `konseling`
--

CREATE TABLE `konseling` (
  `id_konseling` int(11) NOT NULL,
  `NIS` int(11) DEFAULT NULL,
  `id_pelanggaran` int(11) DEFAULT NULL,
  `catatan` text,
  `waktu_pelanggaran` date DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `tkp` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konseling`
--

INSERT INTO `konseling` (`id_konseling`, `NIS`, `id_pelanggaran`, `catatan`, `waktu_pelanggaran`, `waktu_input`, `tkp`, `status`) VALUES
(10, 11307074, 2, 'test', '2019-07-25', '2019-07-25 12:37:43', 'test', 1),
(11, 18926877, 3, 'bolos di warnet', '2019-09-09', '2019-09-10 17:49:04', 'Warnet', 1);

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
(2, 4, 'Merokok', 10),
(3, 5, 'Bolos', 20),
(4, 6, 'Pacaran Dikelas', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(11) NOT NULL,
  `NISN` int(11) DEFAULT NULL,
  `id_kelas` int(11) NOT NULL,
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
  `skor` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `NISN`, `id_kelas`, `nama_lengkap`, `jk`, `tempat_lahir`, `tanggal_lahir`, `email`, `agama`, `alamat`, `no_hp`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `skor`) VALUES
(11307074, 171810185, 10, 'TOAT TU\'ILMI', 'Perempuan', 'Indramayu', '2001-06-27', 'sella.baihaqi@gmail.com', 'ISLAM', 'Blok Pekuwon', '', 'Rastana', 'Daenah', 'Wiraswasta', 'Ibu Rumah Tangga', NULL, 90),
(13777831, 171810129, 10, 'NUR DWI HARYANTI', 'P', 'Indramayu', '2001-12-18', '', 'Islam ', 'Blok Darung', '', 'Sutara ', 'Istiqomah', 'Petani', 'Ibu Ruamah Tangga', 'Ds. Kliwed Kec. Kertasemaya Kab. Indramayu ', 100),
(14639335, 171810107, 10, 'LUQMAN HAKIM ', 'L', 'Jakarta', '2002-01-10', '', 'Islam ', 'Blok Bhakti No. 08', '', 'Lutfi', 'Yuliana', 'Wiraswasta', 'PNS', 'Kel. Cilincing Kec. Ciilincing Kab. Jakarta Utara ', 100),
(17418276, 171810096, 10, 'KHUSNUL KHOTIMAH', 'P', 'Indramayu', '2001-08-09', '', 'Islam ', 'Blok Riok', '', 'H. Abdul Muin', 'Anipah', 'Petani ', 'Ibu Ruamah Tangga', 'Ds. Tenajar Kec. Kertasemaya Kab. Indramayu ', 100),
(18926877, 171810002, 10, 'ABDULLOH', 'L', 'Cirebon', '2001-06-08', '', 'Islam ', 'Blok 05 Al-Istiqomah', '', 'Ma\'muri', 'Maemunah', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Tegalgubug Lor  Kec. Arjawinangun Kab. Cirebon ', 80),
(20889848, 171810062, 10, 'ERAWATI', 'P', 'Indramayu', '2002-03-02', '', 'Islam ', 'Blok Bojong Loa', '', 'Sadri ', 'Tarwisi ', 'Petani ', 'Ibu Ruamah Tangga', 'Ds. Gunungsari Kec. Sukagumiwang Kab. Indramayu ', 100),
(21504026, 171810053, 10, 'DEWI SULISTIANI', 'P', 'Indramayu', '2002-02-19', '', 'Islam ', 'Blok Soga', '', 'Subhi', 'Hj. Fasikha', 'Pedagang', 'Ibu Ruamah Tangga', 'Ds. Tenajar Kidul Kec. Kertasemaya Kab. Indramayu ', 100),
(22287566, 171810014, 10, 'AINUN NOVI YANSAH', 'P', 'Indramayu', '2002-11-02', '', 'Islam ', 'Blok Mon II', '', 'Mansur', 'Darsini', '-', 'Ibu Ruamah Tangga', 'Ds. Tulungagung Kec. Kertasemaya Kab. Indramayu ', 100),
(23327551, 171810184, 10, 'TIARANI', 'P', 'Indramayu', '2002-06-28', '', 'Islam ', 'Blok Boros', '', 'Warcita', 'Herlinah', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Gunungsari Kec. Sukagumiwang Kab. Indramay ', 100),
(23816327, 171810163, 10, 'SILVIA', 'P', 'Indramayu', '2002-11-13', '', 'Islam ', 'Blok Ketileng', '', 'Tamrin', 'Romlah', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Tenajar Kidul Kec. Kertasemaya Kab. Indramayu', 100),
(23816877, 171810069, 10, 'FARIKHATUSSA\'DIYAH', 'P', 'Cirebon', '2002-12-20', '', 'Islam ', 'Dusun V', '', 'Nasuha', 'Juhriyah', 'Pedagang', 'Ibu Ruamah Tangga', 'Ds. Guwa Lor Dusun Kec. Kaliwedi Kab. Cirebon ', 100),
(23816995, 171810123, 10, 'MUHAMMAD MAHIR AZZAKIY', 'L', 'Indramayu', '2002-05-25', '', 'Islam ', 'Blok Darung', '', 'Buchori', 'Musringah', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Kliwed Blok Kec. Kertasemaya  Kab. Indramayu ', 100),
(23817146, 171810048, 10, 'DENI ARYANTO', 'L', 'Indramayu', '2002-07-28', '', 'Islam ', 'Blok Secang', '', 'Muslimin', 'Carinih', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Jengkok Kec. Kertasemaya Kab. Indramayu ', 100),
(23817232, 171810025, 10, 'ANGGUN TIARAWATI', 'P', 'Indramayu', '2002-02-27', '', 'Islam ', 'Blok Muasan', '', 'Nurisad', 'Aniyah', 'Petani ', 'Ibu Ruamah Tangga', 'Ds. Tenajar Kec. Kertasemaya Kab. Indramayu ', 100),
(23817392, 171810202, 10, 'YUAFI TRI YULIANI', 'P', 'Indramayu', '2002-01-14', '', 'Islam ', 'Blok Jatisuling', '', 'drh. Tohir', 'Indriani', 'PNS', 'Ibu Ruamah Tangga', 'Ds. Gedangan Kec. Sukagumiwang Kab. Indramayu ', 100),
(24908792, 171810150, 10, 'RIRIN RIYANTI', 'P', 'Indramayu', '2002-12-17', '', 'Islam ', 'Blok Cilamaran', '', 'Waryo', 'Watirah', 'Wiraswasta ', 'Ibu Ruamah Tangga', 'Ds. Kliwed Kec. Kertasemaya Kab. Indramayu ', 100),
(25470162, 171810158, 10, 'SALSABILAH', 'P', 'Indramayu', '2002-04-08', '', 'Islam ', 'Blok Singkil', '', 'Sofani', 'Neng Fatonah', 'Karayawan Swasta ', 'Ibu Ruamah Tangga', 'Ds. Singaraja Kec. Indramayu Kab. Indramayu ', 100),
(26761576, 171810035, 10, 'AULIA FITRI', 'P', 'Bekasi', '2002-09-14', '', 'Islam ', 'Kp. Harapan', '', 'Arwandi', 'Arnasih', 'Wiraswasta', 'Wiraswasta', 'Kel. Cikarang Kec. Cikarang Utara Kab. Bekasi', 100),
(28165387, 171810116, 10, 'MOH. YOGI HARIS MUNANDAR', 'L', 'Indramayu', '2002-07-04', '', 'Islam ', 'Blok Talok', '', 'Sarifudin', 'Sureni Trisna Ningrum', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Jambe Kec. Kertasemaya Kab. Indramayu ', 100),
(28227516, 171810192, 10, 'UMERI', 'P', 'Indramayu', '2002-06-14', '', 'Islam ', 'Blok Boros', '', 'Karniyah', 'Komaiyah', 'Wiraswasta', 'Ibu Ruamah Tangga', 'Ds. Gunungsari Kec. Sukagumiwang kab. Indramayu ', 100),
(28814131, 171810109, 10, 'MACHRAJA LINGGA NUGRAHA ', 'L', 'Indramayu', '2002-07-25', '', 'Islam ', 'Blok Cigentus', '', 'Iwan Budiman', 'Sri Sugiarti', 'PNS', 'PNS', 'Ds. Kertasemaya Kec. Kertasemaya Kab. Indramayu ', 100),
(29723936, 181911218, 10, 'PUTRI PUSPITA SARI', 'P', 'Indramayu', '2002-02-02', '', 'Islam', 'Blok Gegeneng', '', '', '', '', '', 'Ds. Bondan Kec. Sukagumiwang Kab. Indramayu', 100),
(29897816, 171810132, 10, 'NURHIDAYAT', 'L', 'Indramayu', '2002-12-19', '', 'Islam ', 'Blok Gumiwang', '', 'Ramli', 'Tati Kasturi', 'Petani ', 'Ibu Ruamah Tangga', 'Ds. Sukagumiwang Kec. Sukagumiwang Kab. Indramayu ', 100),
(30101602, 171810103, 10, 'LIS SAFITRI', 'P', 'Indramayu', '2003-03-26', '', 'Islam ', 'Blok Plumbon', '', 'Sur Ali', 'Tati Tumiarti', 'Wiraswasta', 'Wiraswasta', 'Ds. Sukagumiwang Kec. Sukagumiwang Kab. Indramayu ', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(10) DEFAULT NULL,
  `tingkatan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`, `tingkatan`) VALUES
(1, 'Sepuluh', 'X'),
(2, 'Sebelas', 'XI'),
(3, 'Duabelas', 'XII');

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
  `level` enum('admin','siswa','ortu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `NIS`, `nama_lengkap`, `username`, `password`, `email_admin`, `level`) VALUES
(5, 22287566, 'Bahtiar', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rzl.sidqi@gmail.com', 'admin'),
(31, 14639335, 'LUQMAN HAKIM ', '14639335', 'bdc69b57ce3271c0f05789ace04bc7a1', '', 'siswa'),
(32, 14639335, 'Imam Muhayat', 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'imam@gmail.com', 'ortu'),
(33, 18926877, 'ABDULLOH', '18926877', 'da1675ebc4cea23ed3e98b520dcecb85', '', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `id_users` (`id_users`);

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
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id_konseling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
