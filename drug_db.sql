-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 08:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(6, 0, 'Zentel', '50', 'Zentel 400mg.jpg', 2),
(7, 17, 'Adalat ', '10/tab', 'Adalat.jpg', 1),
(8, 17, 'Amolab ', '10/tab', 'Amolab 5mg.png', 1),
(9, 17, 'Amoxicillin ', '5/tab', 'Amoxicillin 250mg.jpg', 1),
(13, 18, 'Beechams antihistamine ', '20/tab', 'Beechams.jpg', 5),
(14, 18, 'Ascoril syrup', '150', 'Ascoril.png', 1),
(15, 18, 'Cipladon ', '20/tab', 'Cipladon effervescent tabs.JPG', 3),
(16, 18, 'Zentel', '50', 'Zentel 400mg.jpg', 1),
(18, 18, 'Coldcap ', '25/tab', 'Coldcap.jpg', 2),
(19, 1, 'Amolab ', '10/tab', 'Amolab 5mg.png', 7),
(20, 1, 'Adalat ', '10/tab', 'Adalat.jpg', 7),
(21, 1, 'Ascard', '50/tab', 'Ascard.jpg', 7),
(22, 1, 'Esomeprazole ', '15/tab', 'Esomeprazole.jpeg', 5),
(23, 1, 'Coldcap ', '25/tab', 'Coldcap.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `delivery_address`, `county`, `total_products`, `total_price`) VALUES
(1, 'Gerald', '1234567890', 'kwobagerald@gmail.com', 'mpesa on delivery', 'ndenderu', 'kiambu', 'Zentel(2)', '100'),
(19, 'user1', '0709090910', 'user1@gmail.com', 'mpesa on delivery', 'CBD', 'Nairobi', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Metronidazole suspension(1),Ascoril syrup(1),Benylin', '675'),
(27, 'sharon', '0703439000', 'user2@gmail.com', 'cash on delivery', 'kawangware', 'Nairobi', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Metronidazole suspension(1),Ascoril syrup(1),Benylin', '1085'),
(29, 'george', '0716000832', 'user1@gmail.com', 'cash on delivery', 'Othaya', 'Nyeri', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Beechams antihistamine (5),Ascoril syrup(1),Cipladon', '1100'),
(30, 'george', '0716000832', 'user1@gmail.com', 'cash on delivery', 'Othaya', 'Nyeri', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Beechams antihistamine (5),Ascoril syrup(1),Cipladon', '1100'),
(31, 'george', '0716000832', 'user1@gmail.com', 'cash on delivery', 'Othaya', 'Nyeri', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Beechams antihistamine (5),Ascoril syrup(1),Cipladon', '1100'),
(32, 'george', '0716000832', 'user1@gmail.com', 'cash on delivery', 'Othaya', 'Nyeri', 'Zentel(2),Adalat (1),Amolab (1),Amoxicillin (1),Beechams antihistamine (5),Ascoril syrup(1),Cipladon', '1125');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(46, 'Adalat ', '10/tab', 'Adalat.jpg'),
(47, 'Amolab ', '10/tab', 'Amolab 5mg.png'),
(48, 'Amoxicillin ', '5/tab', 'Amoxicillin 250mg.jpg'),
(49, 'Ascard', '50/tab', 'Ascard.jpg'),
(50, 'Ascoril syrup', '150', 'Ascoril.png'),
(51, 'Augmentin 1g ', '30/tab', 'Augmentin 1g.jpg'),
(52, 'Augmentin 625mg  ', '20/tab', 'Augmentin 625mg.png'),
(53, 'Beechams antihistamine ', '20/tab', 'Beechams.jpg'),
(54, 'Benylin codeine', '250', 'Benylin codeine.jpg'),
(55, 'Benylin cough syrup', '200', 'Benylin dry cough.jpg'),
(56, 'Benylin paediatric syrup', '200', 'Benylin Paediatric.jpg'),
(57, 'Benylin tabs ', '20/tab', 'Benylin tabs.jpg'),
(58, 'Brozedex cough syrup', '150', 'Bro-zedex cough syrup.jpg'),
(59, 'Brufen paediatric syrup', '200', 'Brufen peadiatric syrup.png'),
(60, 'Brustan suspension', '150', 'Brustan syrup 100ml.jpg'),
(61, 'Calpol 100ml', '250', 'Calpol 100ml.jpg'),
(62, 'Cardipin ', '10/tab', 'Cardipin.jpg'),
(63, 'Cipladon ', '20/tab', 'Cipladon effervescent tabs.JPG'),
(64, 'Ciprobay ', '15/tab', 'Ciprobay.jpg'),
(65, 'Coldcap ', '25/tab', 'Coldcap.jpg'),
(66, 'Curamol 60ml', '80', 'Curamol 60ml.jpg'),
(67, 'Curamol 100ml', '120', 'Curamol 100ml.jpg'),
(68, 'Dulcolax ', '30/tab', 'Dulcolax.jpg'),
(69, 'Esomeprazole ', '15/tab', 'Esomeprazole.jpeg'),
(70, 'Imodium ', '20/tab', 'Imodium.jpg'),
(71, 'Levofloxacin ', '25/tab', 'Levofloxacin.png'),
(72, 'Lasix ', '40/tab', 'Llasix 40mg.jpg'),
(73, 'Metronidazole suspension', '150', 'Mmetronidazole suspension.jpg'),
(74, 'Panadol actifast ', '25/tab', 'Panadol Actifast.jpg'),
(75, 'Panadol advance ', '15/tab', 'Panadol Advance.jpg'),
(76, 'Panadol baby syrup', '150', 'Panadol Baby syrup 100ml.png'),
(77, 'Panadol extra ', '10/tab', 'Panadol Extra.jpg'),
(78, 'Pantoprazole ', '15/tab', 'Pantoprazole.jpeg'),
(79, 'Phenobarbitone ', '30/tab', 'Phenobarbitone 30mg.jpg'),
(80, 'Profen ', '5/tab', 'Profen 400mg.jpg'),
(81, 'Promethazine', '200', 'Promethazine 60ml.jpg'),
(82, 'Sucramal /tab', '40', 'sucramal.jpg'),
(83, 'Valacyclovir ', '40/tab', 'Valacyclovir.jpeg'),
(84, 'Viagra ', '20/tab', 'Viagra 50mg.jpg'),
(85, 'Zentel', '50', 'Zentel 400mg.jpg'),
(103, 'Zulu MR ', '20/tab', 'Zulu MR.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`) VALUES
(0, 'Kwoba Gerald', 'kwobagerald@gmail.com', '202cb962ac59075b964b07152d234b70'),
(1, 'user1', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 'tana', 'tanaemily@gmail.com', '1415db70fe9ddb119e23e9b2808cde38'),
(18, 'user2', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
