-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 04:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloche`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) DEFAULT NULL,
  `creator_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ingredients` varchar(1028) DEFAULT NULL,
  `steps` varchar(1028) DEFAULT NULL,
  `recipe_picture` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `creator_name`, `description`, `ingredients`, `steps`, `recipe_picture`, `likes`, `dislikes`) VALUES
(1, 'Ayam Goreng', 'Johny', 'Ayam Goreng ala Johny', '1/2 ekor ayam\r\n1 lembar daun salam\r\n1 batang serai memarkan\r\nSecukupnya penyedap rasa\r\n400 ml air\r\nSecukupnya garam\r\n1/2 sendok teh gula pasir\r\nSecukupnya minyak goreng\r\n3 cm lengkuas\r\n3 buah bawang merah\r\n1 cm kunyit\r\n2 cm jahe\r\n1 butir kemiri\r\n4 siung bawang putih\r\n1 1/2 sendok teh ketumbar', '1. Cuci ayam dan bahan-bahan masakan\r\n2. Potong ayam secara merata\r\n3. Rebus air dalam panci\r\n4. Masukkan ayam dengan daun salam, serai dan bumbu-bumbu. Aduk secara merata\r\n5. Tunggu hingga ayam setengah matang lalu angkat dan diamkan selama 10 menit.\r\n6. Goreng ayam hingga ayam matang dan berwarna kecoklatan', 'img/image_1.jpg', 6, 1),
(2, 'Soto Betawi', 'Johny', 'Soto Betawi tradisional yang mudah dibuat', '500 gram Daging sapi\r\n100-200 ml santan kental kemasan\r\n200 ml Susu ultra plain\r\n6 siung Bawang merah besar\r\n3 siung Bawang putih besar\r\n1 ruas Jahe\r\n1 butir Kemiri\r\n1 sdt Ketumbar bubuk\r\n1 sdt Lada bubuk\r\n1/2 sdt Jintan bubuk\r\nBumbu tambahan:\r\n1 batang Serai\r\n3 buah Cengkeh\r\n3 lmbar Daun salam\r\n2 lmbar Daun jeruk\r\n5 cm kayu manis\r\n1-3 sachet Masako sapi\r\nBumbu penyerta saat masakan dihidangkan:\r\nsecukupnya Garam\r\nTomat\r\nBawang goreng\r\nDaun bawang\r\nEmping\r\nCabe rawit\r\nKecap manis\r\nJeruk nipis', '1. Rebus daging sapi hingga empuk. Jika dengan panci presto 20-30 menit, jika dengan panci biasa 2-3 jam. Setelah daging empuk, potong dadu-dadu kecil, sisihkan. Air rebusan daging panaskan kembali (kurang lebih 500-1000 ml, silahkan atur sesuai selera).\r\n\r\n2. Tumis \"bumbu halus\" dengan minyak secukupnya, kemudian tambahkan \"bumbu tambahan\", tumis hingga harum kurang lebih 5 menit. Setelah itu, masukkan ke air rebusan.\r\n\r\n3. Tambahkan susu dan santan kental. Jika takut terlalu kental, bisa ditambahkan sedikit-sedikit, atur kekentalan dan rasa (manis, asam, asin) sesuai selera. Ingat, api kecil ya..\r\n\r\n4. Tambahkan \"bumbu penyerta\", boleh di panci ataupun di piring penyajian. SOTO BETAWI GAMPANG BANGET siap dihidangkan..', 'img/image_2.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_picture`, `active`) VALUES
(1, 'Johny', 'johny@gmail.com', '60c98cfe56a707b2ca483794805b773a', NULL, 1),
(2, 'Nicholas', 'nicholas@gmail.com', 'dd9acc01b6c8f5c8e99adeaf86879cd5', NULL, 1),
(3, 'Leon', 'leon@gmail.com', '12b7550392d7b477c32658d753cc07bf', NULL, 1),
(4, 'Dave', 'dave@gmail.com', '2421447172f8354fab4dc211a6742696', NULL, 1),
(5, 'Sutedja', 'sutedja@gmail.com', 'fdf4221bb41340551f1bd83d914c68a6', NULL, 1),
(6, 'Nicholas Chen', 'nicholaschen@gmail.com', 'dd9acc01b6c8f5c8e99adeaf86879cd5', NULL, 1),
(7, 'David', 'david@gmail.com', '00312459ba361e64f4fb62d82422259b', NULL, 1),
(8, 'Louis', 'louis@gmail.com', 'e7b2dacfdd7629e57f56f8308414be34', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
