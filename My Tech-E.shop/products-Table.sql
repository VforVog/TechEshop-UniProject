-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Ιουλ 2020 στις 05:43:14
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `eshop`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `products`
--

CREATE TABLE `products` (
  `Product_Id` int(30) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Image_Name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Brand`, `Price`, `Type`, `Image_Name`) VALUES
(1, 'Laptop Lenovo Model 2017', 'Lenovo', 699, 'Laptops', '1'),
(2, 'Alienware PC with High Tech Features', 'Alienware', 899, 'Personal Computers', '2'),
(3, 'LG Oled TV 4K C9', 'LG', 2199, 'Televisions', '3'),
(4, 'HP Monitor Full HD -Model 2017-', 'HP', 129, 'Monitors', '4'),
(5, 'Edifier Subwoofer + Woofer 32 Watt', 'Edifier', 130, 'Speakers', '5'),
(6, 'Soundcore Earbuds 2017', 'Soundcore', 89, 'Earbuds', '6'),
(7, 'Samsung Galaxy S8+ 2018', 'Samsung', 549, 'Smart Phones', '7'),
(8, 'Samsung Gear S3 Frontier', 'Samsung', 249, 'Smart Watches', '8');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
