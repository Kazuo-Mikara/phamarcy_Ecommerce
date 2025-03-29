-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 01:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `pharmacy`
--

-- --------------------------------------------------------
--
-- Table structure for table `cart`
--

-- 
-- CREATE TABLE medicine AS
-- SELECT price_list.Brand_Name,price_list.Packing_Size,price_list.Price,price_list.Bonus,price_list.Expiry_Date,tbl_medicine.indication,tbl_medicine.manufacturer,tbl_medicine.country,tbl_medicine.image_name,tbl_medicine.quantity
-- FROM price_list
-- JOIN tbl_medicine ON price_list.Brand_Name = tbl_medicine.product_name;
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `username` varchar(800) NOT NULL,
  `pid` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (
    `id`,
    `username`,
    `pid`,
    `product_name`,
    `price`,
    `quantity`,
    `total_price`,
    `product_image`
  )
VALUES (
    107,
    'Sana',
    80,
    'Amcan 5',
    3100,
    4,
    12400,
    'Medicine Category215.jpg'
  );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 108;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;