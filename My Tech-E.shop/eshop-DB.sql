-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Ιουλ 2020 στις 01:49:29
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
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(5) UNSIGNED NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(5) UNSIGNED NOT NULL,
  `total` decimal(10,2) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total`, `order_date`) VALUES
(17, 1, '178.93', '2020-07-03 03:40:46'),
(18, 1, '178.93', '2020-07-03 03:41:28');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `order_contents`
--

CREATE TABLE `order_contents` (
  `oc_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `print_id` int(4) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `price` decimal(6,2) UNSIGNED NOT NULL,
  `ship_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `order_contents`
--

INSERT INTO `order_contents` (`oc_id`, `order_id`, `print_id`, `quantity`, `price`, `ship_date`) VALUES
(1, 1, 1, 1, '50.00', NULL),
(2, 2, 2, 2, '100.00', NULL),
(3, 2, 3, 1, '80.00', NULL),
(4, 3, 2, 2, '100.00', NULL),
(5, 3, 3, 1, '80.00', NULL);

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

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `User_Id` mediumint(8) UNSIGNED NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`User_Id`, `First_name`, `Last_name`, `Email`, `Password`) VALUES
(3, 'Στελιος', 'Βογιατζης', 'stelios_vogiatzis@hotmail.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, 's', 's', 'stelios_vogiatzis@hotmail.comm', '356a192b7913b04c54574d18c28d46e6395428ab'),
(5, 's', 's', 'stelios_vogiatzis@hotmail.commm', '356a192b7913b04c54574d18c28d46e6395428ab'),
(6, 's', 's', 's@h', '356a192b7913b04c54574d18c28d46e6395428ab'),
(7, 'Στελιος', 'Βογιατζης', 'stelios_vogiatzis@hotmail.com', '3629345f630bb38bd81d5fbccc8311d0384c4e0d');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `email_pass` (`email`,`pass`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_date` (`order_date`);

--
-- Ευρετήρια για πίνακα `order_contents`
--
ALTER TABLE `order_contents`
  ADD PRIMARY KEY (`oc_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `print_id` (`print_id`),
  ADD KEY `ship_date` (`ship_date`);

--
-- Ευρετήρια για πίνακα `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT για πίνακα `order_contents`
--
ALTER TABLE `order_contents`
  MODIFY `oc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
