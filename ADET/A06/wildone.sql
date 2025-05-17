-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 07:33 AM
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
-- Database: `wildone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `name`) VALUES
(1, 'Walk'),
(2, 'Carry'),
(3, 'Play'),
(4, 'Life');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryID`, `name`, `code`, `price`, `image`, `is_available`) VALUES
(1, 1, 'Harness Walk Kit', 'HWLK', 599.00, 'HWLK.png', 1),
(2, 1, 'Collar Walk Kit', 'CWK', 579.00, 'CWK.png', 1),
(3, 1, 'Harness', 'HNS', 579.00, 'HNS.png', 1),
(4, 1, 'Collar', 'CLR', 249.00, 'CLR.png', 1),
(5, 1, 'Leash', 'LSH', 299.00, 'LSH.png', 1),
(6, 1, 'Poop Bags Carrier', 'PBC', 149.00, 'PBC.png', 1),
(7, 1, 'Treat Pouch', 'TP', 399.00, 'TP.png', 1),
(8, 1, 'Hands-Free Harness Walk Kit', 'HFHWK', 849.00, 'HFHWK.png', 1),
(9, 1, 'Hands-Free Collar Walk Kit', 'HFCWK', 799.00, 'HFCWK.png', 1),
(10, 2, 'Travel Carrier Tan', 'TCTN', 1599.00, 'TCTN.png', 1),
(11, 2, 'Travel Carrier Black', 'TCBL', 1599.00, 'TCBL.png', 1),
(12, 2, 'Everyday Carrier Cocoa', 'ECCC', 2199.00, 'ECCC.png', 1),
(13, 2, 'Everyday Carrier Black', 'ECBL', 2199.00, 'ECBL.png', 1),
(14, 3, 'Tennis Tumble', 'TTMB', 249.00, 'TTMB.png', 1),
(15, 3, 'Plush Toy', 'PSHT', 249.00, 'PSHT.png', 1),
(16, 3, 'Chew Chain', 'CCH', 129.00, 'CCH.png', 1),
(17, 3, 'Twiss Toss', 'TWS', 99.00, 'TWS.png', 1),
(18, 3, 'Triangle Tug', 'TRTG', 259.00, 'TRTG.png', 1),
(19, 3, 'Tennis Balls', 'TBS', 129.00, 'TBS.png', 1),
(20, 4, 'Organic Baked Treats PMPS', 'PMPS', 199.00, 'PMPS.png', 1),
(21, 4, 'Organic Baked Treats PBJ', 'PBJ', 199.00, 'PBJ.png', 1),
(22, 4, 'Organic Baked Treats FRTS', 'FRTS', 199.00, 'FRTS.png', 1),
(23, 4, 'Grooming Wipes', 'GMWP', 99.00, 'GMWP.png', 1),
(24, 4, 'Placemat', 'PLCM', 499.00, 'PLCM.png', 1),
(25, 4, 'Meal Time Kit', 'MTK', 1299.00, 'MTK.png', 1),
(26, 4, 'Bowl Kit', 'BK', 849.00, 'BK.png', 1),
(27, 4, 'Slow Feeder', 'SLWF', 399.00, 'SLWF.png', 1),
(28, 4, 'Organic Rinseless Shampoo', 'ORSH', 299.00, 'ORSH.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `category_id` (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
