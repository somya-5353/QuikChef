-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 12:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quikchef`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(555, 'admin', 'admin111');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `iname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_id`, `rest_id`, `category`, `iname`, `price`) VALUES
(1000, 100, 'desserts', 'chocolate lava cake', 475),
(1001, 100, 'desserts', 'hot fudge', 250),
(1003, 100, 'desserts', 'red velvet cake', 214),
(1004, 100, 'milkshakes', 'nutty chocolate shake', 185),
(1005, 100, 'milkshakes', 'oreo shake', 170),
(1006, 101, 'chinese', 'babycorn chilly', 220),
(1007, 101, 'chinese', 'chilly garlic noodles', 235),
(1008, 101, 'desserts', 'tiramisu', 240),
(1009, 102, 'pizza', 'double cheese pizza', 145),
(1010, 102, 'pizza', 'bbq chicken pizza', 595),
(1011, 102, 'pizza', 'paneer special pizza', 500),
(1012, 103, 'main course', 'veg biryani', 230),
(1013, 103, 'main course', 'dal makhani', 330),
(1014, 103, 'main course', 'paneer butter masala', 300),
(1015, 100, 'desserts', 'strawberry pie', 100),
(1017, 102, 'desserts', 'choco lava cake', 70),
(1020, 100, 'milkshakes', 'banana shake', 90);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `orderdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `rest_id`, `user_id`, `status`, `orderdate`) VALUES
(700, 101, 303, 'processing', '2019-11-06'),
(708, 101, 301, 'rated', '2019-11-28'),
(709, 102, 301, 'rated', '2019-11-01'),
(710, 103, 301, 'rated', '2019-11-28'),
(711, 100, 301, 'rated', '2019-11-06'),
(712, 100, 301, 'processing', '2019-11-28'),
(713, 102, 307, 'pending', '2019-11-28'),
(714, 103, 307, 'pending', '2019-11-28'),
(715, 100, 303, 'pending', '2019-11-27'),
(716, 101, 303, 'pending', '2019-11-27'),
(718, 103, 303, 'rated', '2019-11-27'),
(719, 102, 303, 'pending', '2019-11-27'),
(720, 103, 301, 'pending', '2019-11-28'),
(728, 101, 300, 'pending', '2019-12-02'),
(729, 102, 300, 'pending', '2019-12-02'),
(730, 103, 300, 'pending', '2019-12-02'),
(731, 102, 308, 'pending', '2019-12-04'),
(732, 100, 308, 'rated', '2019-12-04'),
(733, 101, 301, 'pending', '2019-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rest_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rest_id`, `ratings`, `count`) VALUES
(100, 4, 3),
(101, 5, 1),
(102, 3, 4),
(103, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `rest_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `url` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`rest_id`, `name`, `password`, `url`) VALUES
(100, 'frozenfrost', 'frofrost777', 'ff.php'),
(101, 'chinagarden', 'chigarden222', 'cg.php'),
(102, 'woodfirepizza', 'woopizza333', 'wp.php'),
(103, 'spicecafe', 'spicafe444', 'sc.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`) VALUES
(300, 'Kavita', 'kavs345@gmail.com', '9934837327', 'kavita@54353'),
(301, 'Chitra', 'chitra345@hotmail.com', '9007866654', 'chitra5353'),
(302, 'Prakash', 'prakash676@yahoo.in', '8252341105', 'prak8252ash'),
(303, 'Aman', 'aman888@gmail.com', '9987892732', 'aman$3232'),
(304, 'Arun', 'arun666@gmail.com', '9987899870', 'arun&66554'),
(307, 'Tina', 'tina787@gmail.com', '8878956564', 'tina6789'),
(308, 'Tarun', 'tarun676@gmail.com', '9800998767', 'tarun8989');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rest_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
