-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Drinks'),
(2, 'Tea'),
(3, 'Bakes'),
(4, 'Wine'),
(5, 'Perfumes'),
(6, 'Jewellry');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `fullname`, `username`, `email`, `password`, `reg_date`) VALUES
(1, 'Ibrahim Nurudeen Shehu', 'El-Nur', 'nur@gmail.com', '1', '2024-05-17 09:51:27'),
(2, 'muhammad muhammad', 'mo', 'mo@gmail.com', '1', '2024-05-17 10:08:23'),
(3, 'Ibrahim Nurudeen Shehu', 'nur', 'nuru@gmail.com', '1', '2024-05-17 10:18:32'),
(4, 'muhammad angibi', 'angibi', 'angibi@gmail.com', '1', '2024-05-17 10:23:02'),
(5, 'Ibrahim Nurudeen Shehu', 'manager', 'manager@gmail.com', '1', '2024-05-17 10:25:28'),
(6, 'Yusuf Zakari Suleiman', 'Yhuzherseef.jnr', 'zakariyusuf57@gmail.com', 'Zaksyahq', '2024-05-20 17:14:53'),
(7, 'Ugwu Chiderah', 'Chiderah', 'chiderahugwu645@gmail.com', '123456', '2024-05-21 12:14:42'),
(8, 'Mahmud Abbas', 'Abbas', 'Ahlbany9@gmail.com', '123', '2024-05-21 12:17:10'),
(9, 'aliyu rabiu', 'aliyu', 'abcdefg24685k@gmail.com', 'ther', '2024-05-21 12:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cost_price` int(255) DEFAULT NULL,
  `selling_price` int(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_details` varchar(255) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `cost_price`, `selling_price`, `quantity`, `image`, `product_details`, `expiry_date`, `date`) VALUES
(1, 'Bacardi', 4, 200, 250, 20, '', '75cl', NULL, '2024-05-17 21:00:48'),
(2, 'Power Drink', 1, 280, 350, 1, NULL, 'The normal one', NULL, '2024-05-17 21:14:19'),
(3, 'Green Tea', 2, 800, 1000, 38, NULL, 'Foreign', NULL, '2024-05-17 21:14:59'),
(4, 'Ahmad Tea', 2, 700, 850, 12, NULL, 'Nigerian made', NULL, '2024-05-17 21:15:35'),
(5, 'Spar Classic Bread', 3, 700, 800, 17, NULL, 'Medium size', NULL, '2024-05-17 21:16:34'),
(6, 'Magallan', 4, 7600, 8300, 1, NULL, '700ml', NULL, '2024-05-17 21:17:50'),
(7, 'Ear ring', 6, 800, 900, 50, NULL, 'Blue in color', NULL, '2024-05-21 11:40:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id_join` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id_join` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
