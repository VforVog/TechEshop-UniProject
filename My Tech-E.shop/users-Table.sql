-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Ιουλ 2020 στις 05:43:09
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
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
