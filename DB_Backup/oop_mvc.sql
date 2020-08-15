-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 02:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author_id`, `created_at`) VALUES
(3, 'Notice Title Updated', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 4, '2020-08-15 14:41:38'),
(12, 'Post by Arnob', 'Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.', 5, '2020-08-15 18:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(4, 'Aminur Islam', 'aminur@gmail.com', '$2y$10$k7l/lbd/As9XdUQtMayog.DNx9dz20PSRRL06NumKiAq7z3w1ldFW', '2020-08-13 00:46:08'),
(5, 'Arnob', 'arnob@gmail.com', '$2y$10$0B8uHs2//nEEf94fb.1J4OdKokTjGHAaSUK9RbqHqCtaIpt/dZxFa', '2020-08-14 23:10:14'),
(6, 'Asif', 'asif@gmail.com', '$2y$10$yx95/qWXFjCHW2CV.BjUkufXZSbVsyhwVDntTlnWnJsVh5KdpXBEO', '2020-08-14 23:35:41'),
(7, 'session test', 'session@gmail.com', '$2y$10$WEkT7J86qLcIxk4TX2QWoOZeXBEWQdS/cT0ZOe1i3wqZ3mV2dbija', '2020-08-14 23:37:23'),
(8, 'Jannatul Ferdaus', 'jannatul@gmail.com', '$2y$10$/XfXr8xmqAKYkuVLqHvftu8TFA8qVvV2RL/mjfCACw8ZE5JzKneIm', '2020-08-15 00:31:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
