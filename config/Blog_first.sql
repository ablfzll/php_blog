-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2023 at 01:50 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Blog_first`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `password` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$9CElS51DZ.JzCOnXPgZHXO8JD06bV9eHGwfsMwKY/wdvjgsxfxJAG'),
(3, 'maku', '$2y$10$a4U0HNVQTSrBsPArPe1J4OQsZL5kJKFBUdVjq4dpNzI7bSB1Gkiiu');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(12, 'گرافی');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int UNSIGNED NOT NULL,
  `comment_post_id` int UNSIGNED NOT NULL,
  `comment_auther` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `comment_body` varchar(556) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `commen_status` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `comment_email` varchar(256) NOT NULL,
  `comment_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_reply` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_post_id`, `comment_auther`, `comment_body`, `commen_status`, `comment_email`, `comment_created_at`, `comment_reply`) VALUES
(18, 51, 'ad', 'fdf', 1, 'fdfdfdfdf', '2023-06-02 13:16:23', 0),
(44, 54, 'سلام', 'لیلیلیل', 1, 'dsds@gmail.com', '2023-06-14 19:07:59', 0),
(46, 54, '&lt;script&gt;alert(1)&lt;/script&gt;', '&lt;script&gt;alert(1)&lt;/script&gt;', 1, 'jsjsjd@gmail.com', '2023-06-14 19:19:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int UNSIGNED NOT NULL,
  `post_category_id` int UNSIGNED NOT NULL,
  `post_title` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `post_img` varchar(256) NOT NULL,
  `post_body` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `post_tag` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_persian_ci NOT NULL,
  `post_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_author` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_img`, `post_body`, `post_tag`, `post_created_at`, `post_author`) VALUES
(54, 10, 'test', '36bfee11d9e78ac2dbe813d01c0b1be7.jpg', 'fdf', 'fdf', '2023-06-02 16:01:30', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
