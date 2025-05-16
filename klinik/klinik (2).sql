-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 02:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(15) NOT NULL,
  `id_rm` int(15) NOT NULL,
  `biaya_dokter` int(100) NOT NULL,
  `biaya_fasilitas` int(100) NOT NULL,
  `biaya_obat` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `waktu` time NOT NULL DEFAULT current_timestamp(),
  `metode_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_rm`, `biaya_dokter`, `biaya_fasilitas`, `biaya_obat`, `total`, `tanggal`, `waktu`, `metode_pembayaran`) VALUES
(1, 28, 100000, 50000, 5000, 155000, '2024-12-08', '03:33:51', 'cash'),
(2, 27, 200000, 100000, 9000, 309000, '2024-12-08', '04:18:00', 'debit'),
(3, 24, 100000, 50000, 5000, 155000, '2024-12-08', '04:20:56', 'cash'),
(4, 20, 90000, 89000, 10000, 189000, '2024-12-08', '04:49:28', 'cash'),
(5, 29, 90000, 98000, 5000, 193000, '2024-12-08', '04:53:19', 'cash'),
(6, 30, 65000, 66000, 9000, 140000, '2024-12-08', '07:41:16', 'cash'),
(7, 32, 98000, 78000, 9000, 185000, '2024-12-08', '10:42:50', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_d` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `kode_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_user`, `nama_d`, `spesialis`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_hp`, `kode_dokter`) VALUES
(1, 3, 'Derius', 'Gigi', 'laki-laki', '2008-12-24', 'sjkajsf', '08738948734', 91),
(13, 40, 'heli', 'umum', 'perempuan', '2025-01-09', 'batam', '09998', 87),
(14, 48, 'lumine', 'umum', 'laki-laki', '2024-12-19', 'batam', '0982222', 22),
(16, 50, 'dandelion', 'jantung dan pembuluh darah', 'laki-laki', '2024-12-20', 'jakarta', '779000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(10) NOT NULL,
  `jumlah_bayar` int(50) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `waktu` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `jumlah_bayar`, `metode_pembayaran`, `tanggal`, `waktu`) VALUES
(1, 5000, 'debit card', '2024-11-13', '11:06:54'),
(2, 9000, 'cash', '2024-11-30', '06:45:01'),
(11, 2300, 'cash', '2024-11-19', '07:15:34'),
(12, 2900, 'debit', '2024-11-20', '07:15:45'),
(13, 3000, 'cash', '2024-11-19', '07:15:52'),
(14, 8000, 'RPL11', '2024-11-20', '07:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `harga`, `foto`) VALUES
(1, 'paracetamol', 20, 5000, '1731474263_obat.jpg'),
(4, 'betaden', 12, 9000, '1731474257_obat.jpg'),
(8, 'RPL11', 14, 10000, '1732073069_1731474257_obat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `nama_p` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `agama` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_p`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_hp`, `pekerjaan`, `agama`) VALUES
(1, 'Chichi', 'perempuan', '2008-10-16', 'Baloi Raya B.8', '085668499103', 'Siswa', 'Kristen Protestan'),
(12, 'Saltycia', 'perempuan', '2002-07-12', 'Baloi Raya B.8', '082237849587', 'Marketing', 'Kristen Protestan'),
(13, 'Melna', 'perempuan', '2000-09-09', 'Baloi Raya B.8', '082354678798', 'Karyawan Swasta', 'Kristen Protestan'),
(14, 'Chelsica', 'perempuan', '2008-09-24', 'oh no', '081327648934', 'Siswa', 'Buddha'),
(15, 'budi', 'laki-laki', '2024-11-28', 'di jalan', '09823', 'siswa', 'buddha'),
(16, 'pluto', 'laki-laki', '2024-11-07', 'batam', '07234', 'siswa', 'kristen'),
(17, 'chichi junior', 'laki-laki', '2024-11-29', 'jakarta', '09872', 'sudah kerja', 'islam'),
(18, 'andre', 'laki-laki', '2024-12-20', 'batam', '08927456', 'siswa', 'buddha'),
(20, 'lumi', 'perempuan', '2024-12-18', 'batam', '01199', 'siswa', 'buddha'),
(21, 'yun', 'laki-laki', '2024-12-18', 'batam', '017722', 'siswa', 'islam'),
(23, 'amethyst', 'perempuan', '2024-12-31', 'batam', '099292', 'blacksmith', 'kristen'),
(24, 'vivian', 'perempuan', '2024-12-09', 'batam', '0918812', 'siswa', 'buddha');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(10) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `no_antrean` int(11) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `gol_darah` varchar(100) NOT NULL,
  `tek_darah` varchar(100) NOT NULL,
  `suhu` varchar(25) NOT NULL,
  `tinggi_badan` varchar(25) NOT NULL,
  `berat_badan` varchar(25) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `alergi_obat` varchar(255) NOT NULL,
  `alergi_makanan` varchar(255) NOT NULL,
  `tanggal_berobat` date NOT NULL,
  `keluhan_pasien` text DEFAULT NULL,
  `hasil_diagnosa` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `id_pasien`, `no_antrean`, `id_dokter`, `gol_darah`, `tek_darah`, `suhu`, `tinggi_badan`, `berat_badan`, `riwayat_penyakit`, `alergi_obat`, `alergi_makanan`, `tanggal_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `tindakan`, `id_obat`, `status`) VALUES
(1, 1, 1, 1, 'A', '50', '36', '150', '42', 'Amnesia', 'Hansaplast', 'tidak ada', '2024-11-21', 'Selalu berdarah saat gosok gigi', 'Gusi tergores', 'Jangan gosok gigi terlalu kuat', 0, 2),
(4, 14, 4, 1, 'B', '50', '36', '155', '42', 'Anemia', 'tidak ada', 'tidak ada', '2024-11-21', 'Tidak bisa tidur', 'Insomnia', 'minum susu', 0, 2),
(5, 12, 1, 1, 'B', '50', '36', '168', '55', 'Luka Sayat', 'tidak ada', 'tidak ada', '2024-11-24', 'Sakit Kepala', 'Kurang tidur', 'suruh tidur', 0, 2),
(6, 14, 2, 1, 'B', '50', '36', '150', '42', 'Amnesia', 'Hansaplast', 'tidak ada', '2024-11-24', 'Sakit Kepala', 'Insomnia', 'minum susu', 0, 2),
(7, 15, 1, 1, 'A', 'normal', 'baik', '55cm', '34kg', 'stres', 'tidak ada', 'tidak ada', '2024-11-27', 'sakitan', 'stres', 'istirahat', 0, 2),
(8, 16, 2, 1, 'B', 'normal', 'baik', '44cm', '33kg', 'jantung', 'paracetamol', 'tidak ada', '2024-11-27', 'sakit', 'penyakit', '1 sebulan, pemakaian 3 bulan', 4, 2),
(9, 17, 1, 1, 'O', 'normal', '90', '76 cm', '76 kg', 'tidak ada', 'alcohol', 'diary', '2024-11-28', 'alergi masker', 'iritasi', 'ruangan darurat', 0, 2),
(10, 17, 2, 1, 'a', 'a', '30', '45', '40', 'tidak ada', 'tidak ada', 'tidak ada', '2024-11-28', 'sakit', 'penyakit', '1 sebulan, pemakaian 3 bulan', 4, 2),
(20, 18, 2, 1, 'B', '50', '36', '168', '55', 'Amnesia', 'Hansaplast', 'tidak ada', '2024-12-05', 'Sakit Kepala', 'Insomnia', 'minum susu', 8, 3),
(24, 23, 1, 16, 'C', 'normal', '87', '76', '56', 'tidak ada', 'tidak ada', 'telur', '2024-12-08', 'susah bernafas', 'masalah di jantung', 'rumah', 1, 3),
(26, 22, 3, 1, 'A', 's', '23', '23', '13', 'banyak', 'a', 'a', '2024-12-08', 's', 'ss', 's', 8, 2),
(27, 17, 4, 13, 'a', 'a', '2', '2', '2', 'a', 'a', 'a', '2024-12-08', 'a', 'z', 'z', 4, 3),
(28, 20, 5, 1, 'A', 'rendah', '30', '55', '39', 'tidak ada', 'alcohol', 'keju', '2024-12-08', 'sakit gigi', 'tumbuh baru', 'rumah', 1, 3),
(29, 16, 6, 16, 'A', 'normal', '77', '65', '56', 'banyak', 'alcohol', 'tidak ada', '2024-12-08', 'sakit', 'penyakit', 'istirahat', 1, 3),
(30, 20, 7, 1, 'B', 'normal', '90', '67', '66', 'tidak ada', 'tidak ada', 'tidak ada', '2024-12-08', 'sakit', 'penyakit', 'sembuhkan', 4, 3),
(31, 18, 8, 1, 'A', 'normal', '30', '56', '40', 'tidak ada', 'tidak ada', 'tidak ada', '2024-12-08', 'sakit', 'penyakit', 'rumah', 4, 2),
(32, 24, 9, 16, 'B', 'Normal', '65', '45', '55', 'tidak ada', 'tidak ada', 'tidak ada', '2024-12-08', 'Sakit', 'penyakit', 'klinik', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_ro` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `aturan_pakai` varchar(255) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status_bayar` enum('lunas','belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_ro`, `id_obat`, `aturan_pakai`, `jumlah`, `total_harga`, `status_bayar`) VALUES
(1, 2, 'sehari', 1, 9000, 'lunas'),
(2, 1, '2x sehari', 8, 40000, 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(1, 'chelsica', 'chelsica', 'c4ca4238a0b923820dcc509a6f75849b', 1, '1_1733670014_5298c5b5708a23848f9d.jpg'),
(3, 'derius', 'dok@ter', 'c81e728d9d4c2f636f067f89cc14862c', 2, '3_1733418859_f6e4fb22a3e46a4873f4.jpeg'),
(4, 'steven chin', 'per@wat', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 3, ''),
(40, 'heli', 'heli@doc', 'c81e728d9d4c2f636f067f89cc14862c', 2, ''),
(48, 'lumines', 'lum@doc', 'c81e728d9d4c2f636f067f89cc14862c', 2, '48_1733417944_b6db7eae266f9fe38aa2.jpg'),
(50, 'dandelion', 'dandel@doc', 'c81e728d9d4c2f636f067f89cc14862c', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_ro`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_ro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
