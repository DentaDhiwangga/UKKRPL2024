-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 09:14 AM
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
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(20, 'Otomotif', 'Sekilas tentang otomotif', '2024-02-24', 3),
(21, 'Pemandangan', 'Sekilas foto tentang pemandangan', '2024-02-24', 3),
(22, 'Seni', 'Sekilas tentang album seni', '2024-02-24', 3),
(23, 'Pencak Silat', 'Sekilas Tentang Pencaksilat', '2024-02-24', 3),
(24, 'Art', 'Sekilas Tentang Foto Art', '2024-02-24', 3),
(25, 'Kuliner', 'Sekilas Tentang Foto Kuliner', '2024-02-24', 3),
(26, 'Politik', 'Sekilas Tentang Foto Politik', '2024-02-24', 3),
(27, 'Pendidikan', 'Sekilas Tentang Pendidikan', '2024-02-24', 3),
(28, 'Hiburan', 'Sekilas Tentang Foto Hiburan', '2024-02-24', 3),
(29, 'Desain', 'Sekilas Tentang Foto Desain', '2024-02-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(20, 'Gunung', 'Gunung sangat hijau', '2024-02-24', '1203419009-gambar1.jpg', 21, 3),
(21, 'Sawah', 'Sawah sedang dibajak', '2024-02-24', '1973488028-gambar2.jpg', 21, 3),
(22, 'Foto blur', 'Foto blur indah', '2024-02-24', '1562988884-gambar3.jpg', 22, 3),
(23, 'Foto alam', 'Foto alam indah', '2024-02-24', '1831687266-gambar3.jpg', 22, 3),
(24, 'Mobil rusak', 'Mogok', '2024-02-24', '1265554319-gambar5.jpg', 20, 3),
(25, 'Pohon', 'Pohon tinggi', '2024-02-24', '1198016421-gambar4.jpg', 21, 3),
(26, 'Mobil merah', 'Mobil merah', '2024-02-24', '849048252-gambar2.jpg', 20, 3),
(27, 'Mobil Hijau', 'Mobil Hijau besar', '2024-02-24', '909862375-gambar2.jpg', 20, 3),
(28, 'Mobil Kuning', 'Mobil Hijau', '2024-02-24', '532951140-gambar2.jpg', 20, 3),
(29, 'Mobil Putih', 'Mobil Putih', '2024-02-24', '379384295-gambar2.jpg', 20, 3),
(30, 'Contoh 1', 'Contoh 1', '2024-02-24', '2105456281-gambar1.jpg', 21, 3),
(31, 'Contoh 2', 'Contoh 2', '2024-02-24', '1373452332-gambar5.jpg', 21, 3),
(32, 'Contoh 3', 'Contoh 3', '2024-02-24', '451856697-gambar3.jpg', 22, 3),
(33, 'Contoh 4', 'Contoh 4', '2024-02-24', '1553949979-gambar3.jpg', 20, 3),
(34, 'Contoh 5', 'Contoh 5', '2024-02-24', '927659030-gambar2.jpg', 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(2, 21, 3, 'ini di bromo ya ??', '2024-02-24'),
(3, 22, 3, 'foto bluir', '2024-02-24'),
(4, 22, 3, '', '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(11, 24, 3, '2024-02-24'),
(12, 27, 3, '2024-02-24'),
(13, 29, 3, '2024-02-24'),
(14, 30, 3, '2024-02-24'),
(17, 21, 3, '2024-02-24'),
(18, 26, 3, '2024-02-24'),
(19, 25, 3, '2024-02-24'),
(20, 28, 3, '2024-02-24'),
(21, 31, 3, '2024-02-24'),
(35, 20, 3, '2024-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'user1', '12345', 'user1@gmail.com', 'User 01 percobaan', 'Ponorogo'),
(2, 'aldenta', 'aldenta', 'denta@gmail.com', 'aldenta dhiwangga rizqilla ilham', 'Ponorogo'),
(3, 'denta', 'denta123', 'denta@gmail.com', 'aldenta dhiwangga rizqilla ilham', 'Ponorogo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
