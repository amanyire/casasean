-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 05:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casa_sean`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `aid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`aid`, `name`, `username`, `password`, `online`) VALUES
(1, 'Eyeeza Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '535bf15bd7e54926e3a207336237f090c5579cc8', 1),
(2, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(45) NOT NULL,
  `branch_desc` varchar(1000) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_edited`
--

CREATE TABLE `last_edited` (
  `id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `photo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `thumb_nail` varchar(45) NOT NULL,
  `title` text NOT NULL,
  `comment` longtext NOT NULL,
  `update_time` int(11) NOT NULL,
  `video_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `category`, `photo_name`, `thumb_nail`, `title`, `comment`, `update_time`, `video_id`) VALUES
(964, 'slider', '1628424922598.jpg', '1628424928506.jpg', 'slider 1', 'e\r\n\r\n', 1628424944, 'none'),
(965, 'slider', '1628425056599.jpg', '1628425059977.jpg', 'slier2', 'slider2', 1628425059, 'none'),
(966, 'slider', '1628425090282.jpg', '1628425096354.jpg', 'slier2', '\r\nslider2\r\n', 1628425096, 'none'),
(967, 'home_about', '', '', 'CASA SEAN BOUTIQUE HOTEL', '<span style=\"color: rgb(102, 102, 102); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 15px; text-align: center; background-color: rgb(255, 255, 255);\">Casa SeÃ¡n is a family owned and run Luxury Boutique Hotel in Uganda only a few minutes drive from both Entebbe airport and Kampala, the capital. We named our hotel after the inspiration to do something special which brings people together, our son SeÃ¡n. Our hotel is small, unique and special to give you a feeling of comfort and familiarity, as if you are home rather than in a hotel. Our dining area and bedrooms are designed to combine our Ugandan and European heritage. Our dining and bar menus including our-child friendly cocktail bar and gardens are designed to be exactly the place a family would love to relax, unwind and spend some quality family time. We have our own outside firepit under the stars, beautiful flower gardens and an extensive menu of cocktails, beers, wine, spirits and soft drinks. We look forward to sharing this wonderful little gem with you!</span>\r\n\r\n', 1628437504, 'none'),
(968, 'home_tiles', '1628437604149.jpg', '1628437615322.jpg', 'Our Rooms', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">At the hotel, rooms come with a wardrobe. With a private bathroom fitted with a shower and free toiletries, rooms at Casa Sean Boutique Hotel also boast a garden view. The rooms at the accommodation are fitted with a seating area.</span>\r\n\r\n', 1628437615, 'none'),
(969, 'home_tiles', '1628437675583.jpg', '1628437681215.jpg', 'Our Menus', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">We pride ourselves on delivering an unforgettable dining experience. So, whether you are looking for a leisurely lunch, a scrumptious afternoon tea with friends or the full fine dining experience for a special occasion, Casa Sean Boutique Hotel has something to suit everybody.</span>\r\n\r\n', 1628437681, 'none'),
(970, 'home_tiles', '1628437751287.jpg', '1628437757994.jpg', 'Our Terrace', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">At the hotel, rooms come with a wardrobe. With a private bathroom fitted with a shower and free toiletries, rooms at Casa Sean Boutique Hotel also boast a garden view. The rooms at the accommodation are fitted with a seating area.</span>\r\n\r\n', 1628437758, 'none'),
(971, 'footer_tiles', '1628437910122.jpg', '1628437917344.jpg', 'THREE DAY RESIDENTIAL CHRISTMAS PACKAGE', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">Celebrate a traditional Christmas at Casa Sean Boutique Hotel thanks to our exclusive Christmas 3 day package.</span>\r\n\r\n', 1628437917, 'none'),
(972, 'footer_tiles', '1628437932687.jpg', '1628437937191.jpg', 'NEW YEAR\'S EVE OVERNIGHT PACKAGE', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">Celebrate the last hours of 2020 and see the New Year in style at Casa Sean Boutique Hotel !</span>\r\n\r\n', 1628437937, 'none'),
(973, 'footer_tiles', '1628437951676.jpg', '1628437956412.jpg', 'A PERFECT GIFT YOUR LOVED ONES WOULD LOOK UP TO.', '<span style=\"color: rgb(114, 114, 114); font-family: Muli, Helvetica, Arial, sans-serif; font-size: 13px; text-align: center; background-color: rgb(255, 255, 255);\">Book a 3 night bed &amp; breakfast staycation and receive the cheapest night free - offer available until March 2021.</span>\r\n\r\n', 1628437956, 'none'),
(974, 'rooms_slider', '1628443827414.jpg', '1628443845540.jpg', '', '', 1628443846, 'none'),
(975, 'rooms_slider', '1628443860235.jpg', '1628443865813.jpg', '1', '1\r\n\r\n', 1628443865, 'none'),
(976, 'rooms_slider', '1628443875900.jpg', '1628443889109.jpg', '1', '\r\n1\r\n\r\n\r\n', 1628443889, 'none'),
(977, 'rooms_slider', '', '', '2', '2\r\n\r\n', 1628444057, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(11) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `fvisit` int(11) NOT NULL,
  `lvisit` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_edited`
--
ALTER TABLE `last_edited`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_edited`
--
ALTER TABLE `last_edited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
