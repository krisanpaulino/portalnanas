-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2025 at 09:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalsayur`
--

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `petani_id` int(10) UNSIGNED NOT NULL,
  `petani_nama` varchar(100) NOT NULL,
  `petani_jk` enum('L','P') NOT NULL,
  `petani_alamat` varchar(100) NOT NULL,
  `petani_hp` varchar(12) NOT NULL,
  `petani_foto` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `petani_tempatlahir` varchar(30) DEFAULT NULL,
  `petani_tgllahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`petani_id`, `petani_nama`, `petani_jk`, `petani_alamat`, `petani_hp`, `petani_foto`, `user_id`, `petani_tempatlahir`, `petani_tgllahir`) VALUES
(1, 'Petani1', 'L', 'Jl. Perintis Kemerdekaan', '082247971314', 'IMG-20240719-WA0007.jpg', 2, 'Kupang', '2025-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `tanaman_id` int(10) UNSIGNED NOT NULL,
  `tanaman_nama` varchar(100) NOT NULL,
  `tanaman_detail` text NOT NULL,
  `tanaman_penyakit` text NOT NULL,
  `tanaman_perawatan` text DEFAULT NULL,
  `petani_id` int(11) DEFAULT NULL,
  `tanaman_gambar` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`tanaman_id`, `tanaman_nama`, `tanaman_detail`, `tanaman_penyakit`, `tanaman_perawatan`, `petani_id`, `tanaman_gambar`, `created_at`) VALUES
(1, 'Tanaman 1', '<p>&nbsp;</p>\r\n\r\n<p>Na<img alt=\"\" height=\"363\" src=\"/portalsayur/assets/images/image-20250118134335-1.jpeg\" width=\"484\" />m tempor suscipit elementum. Curabitur venenatis tempus risus non placerat. Suspendisse pretium quam felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque aliquet porttitor ante, sit amet cursus ante rutrum et. Donec eu nulla id augue accumsan consequat. Morbi eget mauris sed neque pretium rhoncus a in urna. Maecenas tempor condimentum vehicula.</p>\r\n\r\n<p>Nulla eget metus a eros accumsan cursus non id dolor. Nulla et libero tortor. Duis ac pharetra nulla, eu venenatis elit. Sed dignissim massa nec dapibus rhoncus. Proin lacinia fermentum congue. Suspendisse lobortis nisi est, vel elementum tellus venenatis quis. Nam a mauris ac ipsum lacinia luctus. Sed faucibus mollis odio vitae commodo. Morbi lacinia, nisl vel suscipit molestie, ex dui tempor mi, eu posuere libero diam id augue. Quisque fermentum, arcu ac tincidunt lacinia, neque urna elementum libero, a tincidunt diam ex non lacus. Nunc eu ipsum a diam tristique pretium eget vitae nisl. Etiam egestas euismod magna sit amet vulputate. Nunc pretium accumsan pellentesque. Integer ipsum enim, accumsan quis malesuada eget, placerat vel velit.</p>\r\n\r\n<p>Vestibulum id sodales libero. Nulla non porta erat. Integer purus felis, sodales quis quam id, consequat auctor dui. Curabitur ante mi, laoreet in nulla in, semper eleifend lectus. Nulla et tortor euismod, faucibus odio a, pulvinar augue. Nullam at vehicula nulla. Quisque ante nisl, porttitor ut ligula at, varius dapibus dui. Praesent auctor malesuada magna vitae mollis.</p>\r\n\r\n<p>Aenean felis mi, lacinia sit amet cursus sed, commodo vitae erat. Praesent ac tortor eget eros placerat accumsan non quis libero. Quisque rutrum nulla eget massa venenatis vehicula. Suspendisse ligula neque, suscipit a fringilla sed, dictum in lectus. Quisque a magna eget lorem consequat egestas eget in turpis. Nulla ac turpis risus. Donec in fringilla lacus.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>Nam tempor suscipit elementum. Curabitur venenatis tempus risus non placerat. Suspendisse pretium quam felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque aliquet porttitor ante, sit amet cursus ante rutrum et. Donec eu nulla id augue accumsan consequat. Morbi eget mauris sed neque pretium rhoncus a in urna. Maecenas tempor condimentum vehicula.</p>\r\n\r\n<p>Nulla eget metus a eros accumsan cursus non id dolor. Nulla et libero tortor. Duis ac pharetra nulla, eu venenatis elit. Sed dignissim massa nec dapibus rhoncus. Proin lacinia fermentum congue. Suspendisse lobortis nisi est, vel elementum tellus venenatis quis. Nam a mauris ac ipsum lacinia luctus. Sed faucibus mollis odio vitae commodo. Morbi lacinia, nisl vel suscipit molestie, ex dui tempor mi, eu posuere libero diam id augue. Quisque fermentum, arcu ac tincidunt lacinia, neque urna elementum libero, a tincidunt diam ex non lacus. Nunc eu ipsum a diam tristique pretium eget vitae nisl. Etiam egestas euismod magna sit amet vulputate. Nunc pretium accumsan pellentesque. Integer ipsum enim, accumsan quis malesuada eget, placerat vel velit.</p>\r\n\r\n<p>Vestibulum id sodales libero. Nulla non porta erat. Integer purus felis, sodales quis quam id, consequat auctor dui. Curabitur ante mi, laoreet in nulla in, semper eleifend lectus. Nulla et tortor euismod, faucibus odio a, pulvinar augue. Nullam at vehicula nulla. Quisque ante nisl, porttitor ut ligula at, varius dapibus dui. Praesent auctor malesuada magna vitae mollis.</p>\r\n\r\n<p><img alt=\"\" height=\"419\" src=\"/portalsmp/assets/images/image-20250117203857-1.jpeg\" width=\"558\" /></p>\r\n\r\n<p>Aenean felis mi, lacinia sit amet cursus sed, commodo vitae erat. Praesent ac tortor eget eros placerat accumsan non quis libero. Quisque rutrum nulla eget massa venenatis vehicula. Suspendisse ligula neque, suscipit a fringilla sed, dictum in lectus. Quisque a magna eget lorem consequat egestas eget in turpis. Nulla ac turpis risus. Donec in fringilla lacus.</p>\r\n', '<p><img alt=\"\" height=\"419\" src=\"/portalsmp/assets/images/image-20250117203857-1.jpeg\" width=\"558\" /></p>\r\n\r\n<p>Nam tempor suscipit elementum. Curabitur venenatis tempus risus non placerat. Suspendisse pretium quam felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque aliquet porttitor ante, sit amet cursus ante rutrum et. Donec eu nulla id augue accumsan consequat. Morbi eget mauris sed neque pretium rhoncus a in urna. Maecenas tempor condimentum vehicula.</p>\r\n\r\n<p>Nulla eget metus a eros accumsan cursus non id dolor. Nulla et libero tortor. Duis ac pharetra nulla, eu venenatis elit. Sed dignissim massa nec dapibus rhoncus. Proin lacinia fermentum congue. Suspendisse lobortis nisi est, vel elementum tellus venenatis quis. Nam a mauris ac ipsum lacinia luctus. Sed faucibus mollis odio vitae commodo. Morbi lacinia, nisl vel suscipit molestie, ex dui tempor mi, eu posuere libero diam id augue. Quisque fermentum, arcu ac tincidunt lacinia, neque urna elementum libero, a tincidunt diam ex non lacus. Nunc eu ipsum a diam tristique pretium eget vitae nisl. Etiam egestas euismod magna sit amet vulputate. Nunc pretium accumsan pellentesque. Integer ipsum enim, accumsan quis malesuada eget, placerat vel velit.</p>\r\n\r\n<p>Vestibulum id sodales libero. Nulla non porta erat. Integer purus felis, sodales quis quam id, consequat auctor dui. Curabitur ante mi, laoreet in nulla in, semper eleifend lectus. Nulla et tortor euismod, faucibus odio a, pulvinar augue. Nullam at vehicula nulla. Quisque ante nisl, porttitor ut ligula at, varius dapibus dui. Praesent auctor malesuada magna vitae mollis.</p>\r\n\r\n<p>Aenean felis mi, lacinia sit amet cursus sed, commodo vitae erat. Praesent ac tortor eget eros placerat accumsan non quis libero. Quisque rutrum nulla eget massa venenatis vehicula. Suspendisse ligula neque, suscipit a fringilla sed, dictum in lectus. Quisque a magna eget lorem consequat egestas eget in turpis. Nulla ac turpis risus. Donec in fringilla lacus.</p>\r\n', NULL, 'image-20250118134335-1.jpeg', '2025-01-18 13:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_password`, `username`, `user_type`) VALUES
(1, '$2y$10$YUBcQa9QLexk5xE9DDwv1e.k0vWJDCw/kWUkdjJcrQnUIrjsRCUWW', 'admin', 'admin'),
(2, '$2y$10$8zriUf/MTYbCm3NJki/Keu/xiTPc78OngzLlmvTtk/LCJeXBycQGe', 'krisanpaulino@gmail.com', 'petani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`petani_id`),
  ADD KEY `FK_user_petani` (`user_id`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`tanaman_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `petani_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `tanaman_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `FK_user_petani` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
