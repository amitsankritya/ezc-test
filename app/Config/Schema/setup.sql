-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 09:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezc_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `state`, `is_admin`, `created`, `updated`, `deleted`) VALUES
(1, 'Amit', 'Pandey', 'amit.pandeya@gmail.com', '$2a$10$8uXuM7nCBUf1kgvHiWCgs.aSLbD41IJL258yP2ZcGUAS/rrw9J2ui', 9876543210, 'Vasant Vihar', 'Maharashtra', 0, NULL, '2024-03-16 12:12:43', 0),
(5, 'John', 'Doe', 'john@abc.com', '$2a$10$8uXuM7nCBUf1kgvHiWCgs.aSLbD41IJL258yP2ZcGUAS/rrw9J2ui', 9876543210, 'Lucknow', 'Maharashtra', 0, NULL, '2024-03-16 16:45:16', 0),
(6, 'Alice', 'Smith', 'alice@abc.com', '$2a$10$BiQuzhTaK3FnICFVNI4.ou996zg/AfQd.6sVDLrHBIcdN1dSbqY6W', 9876543210, 'Lucknow', 'Maharashtra', 0, NULL, NULL, 1),
(7, 'Jane', 'Doe', 'jane@abcd.com', '$2a$10$2mkXwqDp9n1OpXp6dpppC.BSO6kzFU4iikJttLKaTHzqFePpowEKe', 9876543210, 'Delhi', 'Maharashtra', 0, NULL, NULL, 0),
(8, 'Michael', 'Pandey', 'michael@gmail.com', '$2a$10$jbcamgA7fJv9VfKpqPJGuOpjMc26nydi/LpL2wc23gaNGsJuho6ju', 9876543210, 'Shimla', 'Maharashtra', 1, NULL, NULL, 0),
(9, 'Emily', 'Pandey', 'emily@email.com', '$2a$10$MmJLzJYhAxLIk9svj0vNg.zMyjN48jA2s1Tu9TiqjyXZyroWvhT9S', 9876543210, 'Chandigarh', 'Maharashtra', 0, NULL, '2024-03-16 19:20:27', 1),
(10, 'David', 'Wilson', 'david@email.com', '$2a$10$f.eoIbF1OIxaNPA/THQ5Q.vEJjKmRSAVkL9YyQZNWNRjFuuzxji1S', 9876543210, 'Jaipur', 'Chhattisgarh', 0, NULL, '2024-03-16 20:47:06', 0),
(11, 'Sarah', 'Martinez', 'sarah@abcd.com', '$2a$10$oAmCIA0m9NRHJ4hoddZceuA5ptRcxhEm9H2fkGH46eX3d3DzLluPm', 9876543210, 'Mumbai', 'Maharashtra', 0, NULL, NULL, 0),
(12, 'James', 'Anderson', 'james@gmail.com', '$2a$10$GOP4L6KCQU3ItDYnpIjzM.Zo6ZXXAT9ZuQBicdBB1Phtrb5UyZz.O', 9876543210, 'Mumbai', 'Maharashtra', 0, NULL, NULL, 0),
(13, 'Jessica', 'Lopez', 'jessica@gmail.com', '$2a$10$pzEQi382v4nqNZQTHDdFrOb.eAjJFdJFvMzoT1dAsOpZvRiioB2/C', 9876543210, 'Chennai', 'Maharashtra', 0, NULL, NULL, 0),
(14, 'Daniel', 'Garcia', 'daniel@6gmail.com', '$2a$10$QFxAOxPMe9ji4G1kJuq/xuQcEW1MJnDQizQfzsN03IXBuQUgaH0fO', 9876543210, 'Indore', 'Maharashtra', 0, NULL, NULL, 0),
(15, 'Jennifer', 'Singh', 'jennifer@gmail.com', '$2a$10$JHSk8ikJhvVYLW5C4m2b7.VOLM0OuToTYKAZ.YMas/2E5zwc/ytOC', 9876543210, 'Nagpur', 'Maharashtra', 0, NULL, NULL, 0),
(16, 'Christopher', 'Mishra', 'mishra@gmail.com', '$2a$10$QanrrGkGUulOp7tVp1BpV.I8/FTZrwZzZ5ugsgUoulbEcAz09Nh1C', 9876543210, 'Pune', 'Maharashtra', 0, NULL, NULL, 0),
(18, 'Ashley', 'Yadav', 'ashley@gmail.com', '$2a$10$UoE.4a39811wT7qVfpZgK.xJ5/yWNuJLfeYdA2SPcCklipLPh9hfS', 9876543210, 'Surat', 'Maharashtra', 0, '2024-03-16 12:11:13', NULL, 0),
(19, 'Elizabeth', 'Lopez', 'lopez@abc.com', '$2a$10$JCMth0eyQiDGEC7E2L192O/YZ0iB9KuWtyaKyHkANuIh9mNfh0mye', 9876543210, 'Asghvds shdg', 'Sikkim', 0, '2024-03-16 21:12:17', '2024-03-16 21:12:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
