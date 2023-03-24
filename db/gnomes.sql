-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 02:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gnomesaway`
--

-- --------------------------------------------------------

--
-- Table structure for table `gnomes`
--

CREATE TABLE `gnomes` (
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gnomes`
--

INSERT INTO `gnomes` (`id`, `action`, `price`, `description`, `name`, `image`) VALUES
(2, 'bravey', 60, 'This is Bravey', 'Bravey', './images/gnomes/gnomeBravey.jpg'),
(3, 'peaky', 70, 'This is Peaky', 'Peaky', './images/gnomes/gnomePeaky.jpg'),
(4, 'worky', 50, 'This is Worky', 'Worky', './images/gnomes/gnomeWorky.jpg'),
(5, 'beeny', 100, 'This is Beeny', 'Beeny', './images/gnomes/gnomeBeeny.jpg'),
(6, 'Biden', 210, 'Biden', 'Biden', './images/gnomes/gnomeBiden.jpg'),
(7, 'Handy', 50, 'Handy', 'Handy', './images/gnomes/gnomeHandy.jpg'),
(8, 'Happy', 85, 'Happy', 'Happy', './images/gnomes/gnomeHappy.jpg'),
(9, 'nighty', 50, 'Nighty', 'Nighty', './images/gnomes/gnomeNighty.jpg'),
(10, 'Pooly', 100, 'Pooly', 'Pooly', './images/gnomes/gnomePooly.jpg'),
(11, 'Stormy', 65, 'Stormy', 'Stormy', './images/gnomes/gnomeStormy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_gnome` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(61) NOT NULL,
  `address` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gnomes`
--
ALTER TABLE `gnomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_gnome` (`id_gnome`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gnomes`
--
ALTER TABLE `gnomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_gnome`) REFERENCES `gnomes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
