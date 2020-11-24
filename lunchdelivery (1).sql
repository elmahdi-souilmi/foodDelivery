-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 02:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunchdelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `adress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `first_name`, `last_name`, `phone`, `adress`) VALUES
(1, 'test', 'souilmi', '023456765455', 'test test'),
(9, 'elmahdi', 'souilmi', '+212696235668', ' safi morooco');

-- --------------------------------------------------------

--
-- Table structure for table `lunch`
--

CREATE TABLE `lunch` (
  `id` int(11) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lunch`
--

INSERT INTO `lunch` (`id`, `Name`, `description`, `picture`, `date`) VALUES
(1, 'Couscous', 'We had our best couscous at the Naima restaurant in the old town. This is a small no-fuss restaurant with out a menu - you get what they cook that day and that is usually couscous. It was delisious and it was like sitting in home - right beside the very small kitchen.', '/pictures/Couscous.jpg', '2020-11-11'),
(2, 'besstila chicken', 'If you like sweet and salty and are open-minded when it comes to combining food that seems incompatible, you’ll surely like pastilla. Pastilla is basically a chicken or pigeon pie with a flaky texture topped with powdered sugar. It’s often served as a dessert on most formal meetings or traditional celebrations.', '/pictures/bestllaChicken.jpg', '2020-11-11'),
(3, 'eggs witjh tomates', 'Often referred to as “Berber Omelete”, this dish consists of fried eggs, tomatoes, onions, and some local herbs and spices. It’s usually consumed by scooping it from the plate with a warm piece of bread.', '/pictures/bid_maticha.jpg', '2020-11-17'),
(4, 'chicken stew with lemon and olives', 'moroccan chicken stew with lemon and olives', '/pictures/chicken.jpg', '2020-11-09'),
(5, 'sardines ', 'The most popular version of spicy sardines includes stuffing them with chermoula sauce and deep-frying them.\r\n\r\n', '/pictures/spicy-sardines.jpg', '2020-11-13'),
(7, 'sushi', 'Sushi, a staple rice dish of Japanese cuisine, consisting of cooked rice flavoured with vinegar and a variety of vegetable, egg, or raw seafood garnishes and served cold. ', '/pictures/Sushi-in-a-plat.jpg', '2020-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lunch`
--
ALTER TABLE `lunch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lunch`
--
ALTER TABLE `lunch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
