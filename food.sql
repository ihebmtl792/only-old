-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 10:43 PM
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
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `food_name` text NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_img` text NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `id_restaurant`, `food_name`, `food_price`, `food_img`, `restaurant_name`, `location`) VALUES
(1, 1, 'Salade', 1500, 'food1.png', '', ''),
(2, 1, 'Sandwich assorti', 500, 'food8.png', '', ''),
(3, 1, 'Makloub ', 2000, 'food2.png', '', ''),
(4, 1, 'Viande', 1200, 'food3.png', '', ''),
(5, 1, 'Bœuf fumé', 700, 'food4.png', '', ''),
(6, 1, 'Salade variée', 2500, 'food5.png', '', ''),
(7, 1, 'viande hachée', 950, 'food6.png', '', ''),
(8, 1, 'Pizza fumée', 780, 'food7.png', '', ''),
(10, 2, 'pizza napolitaine', 1450, 'pizza9.png', '', ''),
(11, 2, 'Pizza carrée', 780, 'pizza10.png', '', ''),
(12, 2, 'Assortiment de pizzas', 2200, 'pizza11.png', '', ''),
(13, 2, 'Pizza Hot', 450, 'pizza12.png', '', ''),
(14, 2, 'Pizza aux herbes', 700, 'pizza13.png', '', ''),
(15, 2, 'Tacos', 600, 'pizza14.png', '', ''),
(16, 2, 'Shawarma ', 880, 'pizza15.png', '', ''),
(17, 2, 'Shawarma Mexicain', 800, 'pizza16.png', '', ''),
(29, 3, 'Hamis', 750, 'food18.png', '', ''),
(30, 3, 'Sandwich thon', 145, 'food19.png', '', ''),
(31, 3, 'Plat à roses', 1450, 'food20.png', '', ''),
(32, 3, 'Macaroni', 1000, 'food21.png', '', ''),
(33, 3, 'Plat au poulet', 1455, 'food22.png', '', ''),
(34, 3, 'Lablabi', 1000, 'food23.png', '', ''),
(35, 3, 'Soupe', 500, 'food24.png', '', ''),
(36, 3, 'Plat d\'aubergines', 1500, 'food244.png', '', ''),
(37, 4, 'Cappuccino', 150, 'food25.png', '', ''),
(38, 4, 'Cafe', 50, 'food26.png', '', ''),
(39, 4, 'jus d\'ananas', 300, 'food27.png', '', ''),
(40, 4, 'Coca cola', 100, 'food28.png', '', ''),
(41, 4, 'Cerap nutella', 350, 'food29.png', '', ''),
(42, 4, 'Gouffre nutella', 450, 'food30.png', '', ''),
(43, 4, 'Creme brulee', 250, 'food31.png', '', ''),
(44, 4, 'salade de fruits ', 400, 'food32.png', '', ''),
(46, 5, 'Rose', 750, 'food33.jpg', '', ''),
(47, 5, 'Tlitli au poulet ', 550, 'food34.jpg', '', ''),
(48, 5, 'Hoummous', 750, 'food35.jpg', '', ''),
(49, 5, 'Rose à la viande', 700, 'food36.jpg', '', ''),
(50, 5, 'Pâtes blanches', 800, 'food37.jpg', '', ''),
(51, 5, 'Pâtes aux tomates', 410, 'food38.jpg', '', ''),
(52, 5, 'Couscous', 460, 'food39.jpg', '', ''),
(53, 5, 'Plat divers', 450, 'food40.jpg', '', ''),
(54, 5, 'Viande et fromage', 480, 'food41.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `livreur`
--

CREATE TABLE `livreur` (
  `id` int(11) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` text NOT NULL,
  `name_restaurant` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `livreur`
--

INSERT INTO `livreur` (`id`, `id_restaurant`, `name`, `location`, `name_restaurant`, `status`, `email`, `password`) VALUES
(1, 1, 'khairo', 'sidi amar', '', 2, 'khairo@gmail.com', '123'),
(2, 0, 'mousa', 'barahal', '', NULL, 'mousa@gmail.com', '123'),
(4, 0, 'mohammed', 'sidi amar', '', NULL, 'mohammed@gmail.com', '123'),
(5, 0, 'youcef', 'barahal', '', NULL, 'youcef@gmail.com', '123'),
(6, 0, 'fadi', 'annaba', '', NULL, 'fadi@gmail.com', '123'),
(7, 0, 'minou', 'bouni', '', NULL, 'minou@gmail.com', '123'),
(8, 0, 'amer', 'annaba', '', NULL, 'amer@gmail.com', '123'),
(9, 0, 'oussama', 'bouni', '', NULL, 'oussama@gmail.com', '123'),
(10, 0, 'anis', 'seraidi', '', NULL, 'anis@gmail.com', '123'),
(11, 0, 'rami', 'bouni', '', NULL, 'rami@gmail.com', '123'),
(12, 0, 'sami', 'seraidi', '', NULL, 'sami@gmail.com', '123'),
(13, 0, 'yacine', 'barahal', '', NULL, 'yacine@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_img` text NOT NULL,
  `order_number` int(11) NOT NULL,
  `livraison` int(2) NOT NULL,
  `id_restaurant` int(11) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `adresse`, `food_name`, `food_price`, `food_img`, `order_number`, `livraison`, `id_restaurant`, `status`) VALUES
(27, 'sfbvfdbvfd', 7865875, 'sidi amar', 'Cafe', 50, 'food26.png', 210000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  `competences` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `file`, `location`) VALUES
(1, 'mega pizza', 'mega.png', 'saint cloud'),
(2, 'joker', 'joker.jpg', 'sidi amar'),
(3, 'Restaurant Tabarka', 'tabarka.jpg', 'bouni'),
(4, 'Machaoui El Boustane', 'boustane.jpg', 'annaba'),
(5, 'El Hadja', 'hadja.jpg', 'Seraïdi'),
(1, 'pizza hot', 'hot.png', 'saint cloud'),
(2, 'best burger', 'bg.webp', 'sidi amar'),
(3, 'Restaurant oriental', 'or.jpg', 'bouni'),
(4, 'Peristo', 'peristo.jpg', 'annaba'),
(5, 'red food', 'red.jpg', 'Seraïdi'),
(1, 'mega pizza', 'mega.png', 'saint cloud'),
(2, 'joker', 'joker.jpg', 'sidi amar'),
(3, 'Restaurant Tabarka', 'tabarka.jpg', 'bouni'),
(4, 'Machaoui El Boustane', 'boustane.jpg', 'annaba'),
(5, 'El Hadja', 'hadja.jpg', 'Seraïdi'),
(1, 'pizza hot', 'hot.png', 'saint cloud'),
(2, 'best burger', 'bg.webp', 'sidi amar'),
(3, 'Restaurant oriental', 'or.jpg', 'bouni'),
(4, 'Peristo', 'peristo.jpg', 'annaba'),
(5, 'red food', 'red.jpg', 'Seraïdi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_livraison` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_livraison`) VALUES
(1, 'admin@gmail.com', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
