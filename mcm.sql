-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2018 pada 13.25
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1234, 'andriansyah', '1234', 'andriansyahar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata_user`
--

CREATE TABLE `biodata_user` (
  `id_pelamar` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` int(15) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `no_ktp` int(35) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pendidikan` varchar(15) NOT NULL,
  `perguruan_tinggi` varchar(5) NOT NULL,
  `nama_perguruan_tinggi` varchar(40) NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `id_skype` varchar(15) NOT NULL,
  `pengalaman_kerja` int(10) NOT NULL,
  `deskripsi_singkat` varchar(100) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `sertifikat_keahlian` varchar(200) NOT NULL,
  `fotocopy_ktp` varchar(200) NOT NULL,
  `npwp` varchar(200) NOT NULL,
  `status_pelamar` varchar(30) NOT NULL DEFAULT 'MENUNGGU HASIL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata_user`
--

INSERT INTO `biodata_user` (`id_pelamar`, `id_lowongan`, `nama`, `tanggal_lahir`, `no_telp`, `alamat`, `jenis_kelamin`, `status`, `no_ktp`, `email`, `pendidikan`, `perguruan_tinggi`, `nama_perguruan_tinggi`, `ipk`, `id_skype`, `pengalaman_kerja`, `deskripsi_singkat`, `cv`, `ijazah`, `sertifikat_keahlian`, `fotocopy_ktp`, `npwp`, `status_pelamar`) VALUES
(4, 4, 'Rebaldi fuad azhar', '1995-05-12', 2147483647, 'Jl. titimplik dalam no.85', 'Laki-laki', 'Lajang', 2147483647, 'revaldi212@gmail.com', 'sistem informas', 'pts', 'Universitas komputer indonesia', '3', 'aldyrfa', 3, 'aku keren', '20181216120822MEDIK DAN KEPERAWATAN.docx', '201812161208221499755549481.JPEG', '201812161208221499755549481.JPEG', '201812161208221499755549481.JPEG', '201812161208221499755549481.JPEG', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal_sekarang` datetime NOT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal_sekarang`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(1, '2018-12-16 00:00:00', '2018-12-18 00:00:00', '2018-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_soal` varchar(255) DEFAULT NULL,
  `jawab` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `skor` varchar(255) DEFAULT NULL,
  `id_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(50) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `persyaratan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `nama_divisi`, `tanggal`, `persyaratan`) VALUES
(4, 'KOOR STRUKTUR', '12-12-2018 Sampai 18-12-2018', 'zdasdas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar_lulus`
--

CREATE TABLE `pelamar_lulus` (
  `id_pelamarlulus` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `nama_soal` text,
  `a` varchar(255) DEFAULT NULL,
  `b` varchar(255) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `d` varchar(255) DEFAULT NULL,
  `e` varchar(200) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `nama_soal`, `a`, `b`, `c`, `d`, `e`, `jawaban`) VALUES
(18, 'Adukan untuk pasangan atau plesteran agar kedap air adalah?', '1 Sp : 2 Ps', '1 Sp : Â½ Kp : 3 Ps', '1 Kp : 1 Sm : 1 Ps', '1 Kp : 1 Sm : 1 Ps', '1 Sp : 1 Tras : 3 Ps.', 'a'),
(19, 'Agar pekerjaan galian tanah tidak mengganggu kedudukan bouwplank, maka letaknnya bouwplankterhadap sumbu pondasi supaya diambil:', '1 m â€“  1,5 m', '1,25 m â€“  1,75 m', '1,5 m â€“  2 m', '1,5 m â€“  2,25 m', '2 m â€“  2,5 m', 'a'),
(20, 'Tahapan pekerjaan yang dilakukan setelah pekerjaan pemasa ngan papan bouwplank adalahâ€¦', 'galian tanah pondasi', 'urugan pasir ', 'urugan tanah ', 'pasangan batu kosong', 'pasangan pondasi', 'a'),
(21, 'Adukan untuk pasangan tembok bata dan plesteran yang sekarang sering dipakai: ', '1 Kp : 1 Sm : 3 Ps', '1 Kp : 2 Ps ', '1 Sp : 3 Ps ', '1 Sp : 3 Kp : 10 Ps', '1 Sp : 1 Tras : 4 Ps', 'd'),
(22, 'Pernyataan berikut adalah sifat-sifat yang perlu diperhatikan untuk membuat adukan, kecuali:', 'kesesuaian tehadap jenis pekerjaan ', 'sifat menyusut ', 'kemudahan untuk bekerja ', 'cepat mengeras ', 'kekuatan', 'd'),
(23, 'Fungsi adukan pada pasangan pekerjaan bangunan diantaranya sebagai berikut, kecuali: ', 'sebagai pengikat antara bata yang satu dengan yang lain ', 'sebagai ornamen dalam konstruksi ', 'untuk meratakan permukaan tembok ', 'untuk menyalurkan beban yang berada diatasnya ', 'untuk menghilangkan deviasi dari permukaan bata', 'b'),
(24, 'Yang termasuk sebagai bahan pengisi pada bahan adukan adalah: ', 'kapur', 'pasir', 'semen ', 'semen merah ', 'tras', 'b'),
(25, 'Syarat-syarat pemasangan tembok Â½ bata adalah sebagai berikut , kecualiâ€¦.', 'siar datar harus segaris lurus ', 'siar tegak tidak boleh segaris lurus ', 'siar lintang bergeser Â¼ bata ', 'siar lintang bergeser Â½ bata ', 'spesi harus padat', 'c'),
(26, 'Pada pemasangan tembok batu bata ketebalan siar datar, tegak dan lintang adalah:', '0,6 cm â€“  1 cm ', '0,8 cm â€“  1,2 cm ', '0,9 cm â€“  1,5 cm', '1 cm â€“  2 cm ', '1,5 cm â€“  2,5 cm', 'b'),
(27, 'Untuk membentuk siar datar dan tegak agar menjadi padat dan rapi, menggunakan?', 'Sendok spesi lancip', 'Sendok spesi oval ', 'Sendok spesi persegi ', 'Jointer', 'Line bobbind', 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirm_password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `confirm_password`, `email`, `no_telp`) VALUES
(1, 'kadir', 'tes123', '123', '123', 'aaaaaa@fmaoas.com', '123123123111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `biodata_user`
--
ALTER TABLE `biodata_user`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `pelamar_lulus`
--
ALTER TABLE `pelamar_lulus`
  ADD PRIMARY KEY (`id_pelamarlulus`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT untuk tabel `biodata_user`
--
ALTER TABLE `biodata_user`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelamar_lulus`
--
ALTER TABLE `pelamar_lulus`
  MODIFY `id_pelamarlulus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
