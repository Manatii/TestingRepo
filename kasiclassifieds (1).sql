-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2017 at 10:39 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasiclassifieds`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `aidid` int(10) UNSIGNED NOT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `township` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surbub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catid` int(200) NOT NULL,
  `catagory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catid`, `catagory`) VALUES
(1, 'Shacks For sale'),
(2, 'Shacks To rent'),
(3, 'Houses For sale'),
(4, 'Houses To rent'),
(5, 'Smart Phones'),
(6, 'Cars'),
(7, 'Laptops'),
(8, 'Jobs'),
(9, 'Jobs Seekers'),
(10, 'Clothing'),
(11, 'Events');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Vehicles', 'car-2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Services', 'services.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Shacks', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Houses', 'house.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Jobs', 'jobs.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Electronics', 'laptop-2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Community', 'toy.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Furniture', 'catalog.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Home Appliances', 'Home-Electronics-Appliances-2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Fashion and Beauty', 'fashion.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'china'),
(2, 'united states'),
(3, 'india'),
(4, 'japan'),
(5, 'brazil'),
(6, 'russia'),
(7, 'germany'),
(8, 'nigeria'),
(9, 'united kingdom'),
(10, 'france'),
(11, 'mexico'),
(12, 'south korea'),
(13, 'indonesia'),
(14, 'philippines'),
(15, 'egypt'),
(16, 'vietnam'),
(17, 'turkey'),
(18, 'italy'),
(19, 'spain'),
(20, 'canada'),
(21, 'poland'),
(22, 'argentina'),
(23, 'colombia'),
(24, 'iran'),
(25, 'south africa'),
(26, 'malaysia'),
(27, 'pakistan'),
(28, 'australia'),
(29, 'thailand'),
(30, 'morocco'),
(31, 'taiwan'),
(32, 'netherlands'),
(33, 'ukraine'),
(34, 'saudi arabia'),
(35, 'kenya'),
(36, 'venezuela'),
(37, 'peru'),
(38, 'romania'),
(39, 'chile'),
(40, 'uzbekistan'),
(41, 'bangladesh'),
(42, 'kazakhstan'),
(43, 'belgium'),
(44, 'sweden');

-- --------------------------------------------------------

--
-- Table structure for table `fav_ads`
--

CREATE TABLE `fav_ads` (
  `id` bigint(255) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `township` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fav_ads`
--

INSERT INTO `fav_ads` (`id`, `price`, `title`, `township`, `created_at`, `updated_at`, `user_id`, `ad_id`) VALUES
(34, '', '', '', '2017-06-13 19:30:59', '2017-06-13 19:30:59', '344image5894056789dc1', ''),
(35, '340 000', 'Kompressor C200 for Sale', 'Delft, Cape Town', '2017-06-13 19:31:01', '2017-06-13 19:31:01', '344image5894056789dc1', 'Kom58a61bfc99b6a'),
(36, '234', 'sdfdsf', 'Belha', '2017-06-13 19:31:04', '2017-06-13 19:31:04', '344image5894056789dc1', 'sdf58b5e8dab037c'),
(38, '123 000', 'Car for Sale in Gugs', 'Kagiso', '2017-06-13 19:31:10', '2017-06-13 19:31:10', '344image5894056789dc1', 'Car58b5eed8254af');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(200) NOT NULL,
  `name1` varchar(200) NOT NULL,
  `adid` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name1`, `adid`, `created_at`, `updated_at`) VALUES
(6593, 'mycar13.jpg', 'Kom58a61bfc99b6a', '2017-02-16 21:39:09', '2017-02-16 21:39:09'),
(6594, 'mycar15.jpg', 'Kom58a61bfc99b6a', '2017-02-16 21:39:09', '2017-02-16 21:39:09'),
(6595, 'mycar16.jpg', 'Kom58a61bfc99b6a', '2017-02-16 21:39:09', '2017-02-16 21:39:09'),
(6596, 'mycar17.jpg', 'Kom58a61bfc99b6a', '2017-02-16 21:39:10', '2017-02-16 21:39:10'),
(6604, 'Photo0298.jpg', 'Hai58b1fa8a36a64', '2017-02-25 21:43:38', '2017-02-25 21:43:38'),
(6605, 'Photo0300.jpg', 'Hai58b1fa8a36a64', '2017-02-25 21:43:39', '2017-02-25 21:43:39'),
(6606, 'Photo0296.jpg', 'Hai58b1fa8a36a64', '2017-02-25 21:43:39', '2017-02-25 21:43:39'),
(6632, 'Image00013.jpg', 'sdf58b5e8dab037c', '2017-02-28 21:17:15', '2017-02-28 21:17:15'),
(6637, '1Image00020.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6638, '2Image00021.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6639, '3Image00022.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6640, '0IMG_20160731_001609.jpg', 'Lev59405e5c4df6d', '2017-06-13 21:51:24', '2017-06-13 21:51:24'),
(6641, '5IMG_20160731_001720.jpg', 'Lev59405e5c4df6d', '2017-06-13 21:51:25', '2017-06-13 21:51:25'),
(6642, '3IMG_20160731_001609.jpg', 'Lev59405e5c4df6d', '2017-06-13 21:51:26', '2017-06-13 21:51:26'),
(6643, '4IMG_20160731_001643.jpg', 'Lev59405e5c4df6d', '2017-06-13 21:51:27', '2017-06-13 21:51:27'),
(6644, '5IMG_20160731_001720.jpg', 'Lev59405e5c4df6d', '2017-06-13 21:51:27', '2017-06-13 21:51:27'),
(6645, 'mycar1.jpg', '201594bd925954e4', '2017-06-22 14:50:14', '2017-06-22 14:50:14'),
(6646, 'mycar3.jpg', '201594bd925954e4', '2017-06-22 14:50:14', '2017-06-22 14:50:14'),
(6647, '3mycar1.jpg', '201594bd925954e4', '2017-06-22 14:50:15', '2017-06-22 14:50:15'),
(6648, '$_20 (4).JPG', 'Ndi594bddfe5a230', '2017-06-22 15:10:54', '2017-06-22 15:10:54'),
(6649, '$_20 (5).JPG', 'Ndi594bddfe5a230', '2017-06-22 15:10:55', '2017-06-22 15:10:55'),
(6650, '$_20 (6).JPG', 'Ndi594bddfe5a230', '2017-06-22 15:10:55', '2017-06-22 15:10:55'),
(6651, '$_20 (7).JPG', 'Ndi594bddfe5a230', '2017-06-22 15:10:55', '2017-06-22 15:10:55'),
(6652, '$_20 (9).JPG', 'Ndi594bddfe5a230', '2017-06-22 15:10:56', '2017-06-22 15:10:56'),
(6653, '$_20 (1).JPG', 'Hou594be2c836219', '2017-06-22 15:31:20', '2017-06-22 15:31:20'),
(6654, '$_20 (2).JPG', 'Hou594be2c836219', '2017-06-22 15:31:20', '2017-06-22 15:31:20'),
(6655, '$_20 (3).JPG', 'Hou594be2c836219', '2017-06-22 15:31:20', '2017-06-22 15:31:20'),
(6656, '1$_20 (7).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6657, '$_20 (8).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6658, '$_20 (10).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6659, '$_20 (11).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:18', '2017-06-22 20:33:18'),
(6660, '$_20 (12).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:18', '2017-06-22 20:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `kasiads`
--

CREATE TABLE `kasiads` (
  `adid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_catagory` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_category` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasiads`
--

INSERT INTO `kasiads` (`adid`, `catagory`, `main_catagory`, `price`, `province`, `title`, `description`, `keywords`, `location`, `location_category`, `featured`, `approved`, `created_at`, `updated_at`, `user_id`) VALUES
('Lev59405e5c4df6d', 'Computers & Software', 'Electronics', '3400', 'Gauteng', 'Levevo Laptop for Sale', '2 months old...4gig RAM, 500gig hard-drive, AMD A6 processor..WebCam, Wi-fi.', ' Computers & Software  Levevo Laptop for Sale Electronics', 'Daveyton', 'township', 'All-plans', 'Approved', '2017-06-13 19:51:24', '2017-06-13 19:51:24', '344image5894056789dc1'),
('Kom58a61bfc99b6a', 'Cars', 'Vehicles', '340 000', 'Western Cape', 'Kompressor C200 for Sale', 'If I begged and If I cried would it change the sky tonight ? would it give me sunglight ? should I wait for you to call is there any hope at all you drifting by the more I think bout it the less that I was able to share it with you.', 'car cars vehicle  Kompressor C200 for Sale', 'Delft, Cape Town', 'township', 'None', 'Approved', '2017-02-16 19:39:08', '2017-02-16 19:39:08', '344image5894056789dc1'),
('sdf58b5e8dab037c', 'Cars', 'Vehicles', 'Belha', 'Western Cape', 'BMW for Sale', 'sdfsdfs', ' 1#Cars  sdfdsf', 'Belha', '', 'None', 'Approved', '2017-02-28 19:17:14', '2017-02-28 19:17:14', '344image5894056789dc1'),
('Hai58b1fa8a36a64', 'Hair Extensions', 'Fashion and Beauty', 'Kayamandi', 'Western Cape', 'Hair extensions for sale', 'if I begged and If I cried would it change the sky tonight ? would it give me sunlight ? should I wait for you to call is there any hope at all ? you drifting by the more I think about it the less that I was able to share it with you. It try to reach for and I almost feel you getting nearly hear and then you disappear. I miss all the signs one at a time no my love I\'m ready to shine.', ' Hair Extensions  Hair extensions for sale', 'Kayamandi', 'township', 'Sponsored Ads Gallery', 'Approved', '2017-02-25 19:43:38', '2017-02-25 19:43:38', '344image5894056789dc1'),
('Car58b5eed8254af', 'Cars', 'Vehicles', '123 000', 'Gauteng', 'Car for Sale in Gugs', 'dsfsd dsfs dfds dsf d dsf dssfdsf dsfdsf dsffds dsfdsf sdfdsf', 'car cars vehicle  Car for Sale in Gugs', 'Kagiso', '', 'None', 'Approved', '2017-02-28 19:42:48', '2017-02-28 19:42:48', '344image5894056789dc1'),
('Hou594be2c836219', 'Houses for Sale', 'Houses', '245 000', 'Western Cape', 'House for Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Houses for Sale  House for Sale Houses', 'Philippi', 'township', 'Business Marketing', 'Approved', '2017-06-22 13:31:20', '2017-06-22 13:31:20', '454dmisc594ac63c39811'),
('Ndi594bddfe5a230', 'Shacks for Sale', 'Shacks', '2000', 'Western Cape', 'Ndingesisa ngetyotyombe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Shacks for Sale  Ndingesisa ngetyotyombe Shacks', 'Philippi', 'township', 'None', 'Approved', '2017-06-22 13:10:54', '2017-06-22 13:10:54', '454dmisc594ac63c39811'),
('Hou594c298d1fa35', 'Houses for Sale', 'Houses', 'R90 000', 'Western Cape', 'House for sale in Xolweni', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Houses for Sale  House for sale in Xolweni Houses', 'Xolweni', 'township', 'Sponsored Ads Gallery', 'Approved', '2017-06-22 18:33:17', '2017-06-22 18:33:17', '344nnoge5898c5b9be309'),
('201594bd925954e4', 'Cars', 'Vehicles', '270 000', 'Western Cape', '2010 kompressor C200 for sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  2010 kompressor C200 for sale', 'Lwandle', 'township', 'Business Marketing', 'Approved', '2017-06-22 12:50:13', '2017-06-22 12:50:13', '135ndige594066126fa68'),
('dsf594d639882b96', 'Cars', 'Vehicles', '234', 'Western Cape', 'dsfs', 'dsfsd', 'Vehicles car cars vehicle  dsfs', 'Brackenfell', 'suburb', 'None', 'Approved', '2017-06-23 16:53:12', '2017-06-23 16:53:12', '344image5894056789dc1'),
('sdf594d66ee8df73', 'Car Parts & Accessories', 'Vehicles', '234 ', 'Western Cape', 'sdfsdf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Car Parts & Accessories  sdfsdf Vehicles', 'Touws River', 'suburb', 'None', 'Approved', '2017-06-23 17:07:26', '2017-06-23 17:07:26', '135ndige594066126fa68');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `province` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `province`, `created_at`, `updated_at`) VALUES
(31, 'Kayamandi', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Kraifontein', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Strand', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Wellington', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Kayelitsha', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 'Mlazi', 'Gauteng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 'Langa', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 'Nyanga', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 'Dunoon', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, 'Manenberg', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, 'Blue Downs', 'Westen Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, 'Mfuleni', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, 'Mbekweni', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, 'Masiphumelele', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, 'Nkqubela', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, 'Joe Slovo Park', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, 'Imizamo Yethu', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 'Crossroads', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 'Khayelitsha', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 'Kwa-Mandlenkosi', 'Kwanokuthula', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 'Kwanonqaba', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 'Philippi', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 'Retreat', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 'Thembalethu', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 'Wetton', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 'Xolweni', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 'Zolani', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 'Zwelihle', 'Western Cape', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 'Hout Bay', 'Western Cape', '2017-02-03 23:21:42', '2017-02-03 23:21:42'),
(328, 'Gugulethu', 'Western Cape', '2017-02-04 00:14:01', '2017-02-04 00:14:01'),
(329, 'Bongelethu', 'Western Cape', '2017-02-07 22:48:54', '2017-02-07 22:48:54'),
(330, 'Delft, Cape Town', 'Western Cape', '2017-02-07 22:50:24', '2017-02-07 22:50:24'),
(332, 'Khayalethu South', 'Western Cape', '2017-02-07 22:52:27', '2017-02-07 22:52:27'),
(333, 'Kurland', 'Western Cape', '2017-02-07 22:53:07', '2017-02-07 22:53:07'),
(334, 'Lwandle', 'Western Cape', '2017-02-07 22:53:51', '2017-02-07 22:53:51'),
(335, 'Alexandra, Gauteng', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(336, 'Atteridgeville', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(338, 'Bekkersdal', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(339, 'Boipatong', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(340, 'Bophelong', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(342, 'Daveyton', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(343, 'Daveyton', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(344, 'Diepkloof', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(345, 'Diepsloot', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(346, 'Duduza', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(347, 'Ebony Park', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(349, 'Eersterust', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(350, 'Ekangala', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(351, 'Etwatwa', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(352, 'Evaton', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(353, 'Impumelelo', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(354, 'Ivory Park', '', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(355, 'Kagiso', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(356, 'Katlehong', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(357, 'Khutsong', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(358, 'Kokosi', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(359, 'KwaThema', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(360, 'Laudium', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(361, 'Lawley, Gauteng', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(362, 'Mabopane', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(363, 'Mamelodi', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(364, 'Meadowlands, Gauteng', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(365, 'Mohlakeng', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(366, 'Munsieville', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(368, 'Nuwe Eersterus', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(369, 'Olievenhoutbosch', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(370, 'Orange Farm', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(372, 'Rabie Ridge', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(373, 'Ratanda', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(374, 'Refilwe', 'Gauteng', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
(375, 'Bhekuzulu', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(376, 'Bhongweni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(378, 'Bruntville', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(379, 'Chatsworth', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(380, 'Clermont', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(381, 'Dukuduku', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(382, 'Edendale', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(383, 'Enhlalakahle', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(384, 'ESikhawini', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(385, 'Ezakheni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(387, 'Howick West', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(388, 'Imbali', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(390, 'Inanda', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(391, 'KwaMashu', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(392, 'Kwanobamba', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(393, 'Lamontville', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(394, 'Madadeni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(396, 'Magabeni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(397, 'Naidooville', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(398, 'Nseleni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(399, 'Ntuzuma', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(400, 'Osizweni', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(401, 'Phoenix, Durban', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(402, 'Sithembile', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(403, 'Sobantu', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(404, 'Steadville', 'KwaZulu-Natal', '2017-02-08 00:06:11', '2017-02-08 00:06:11'),
(406, 'Verulam', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(407, 'Umlazi\r\nV', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(408, 'Umbumbulu', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(409, 'Tshelimnyama', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(410, 'Tongaat', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(411, 'Sundumbili', 'KwaZulu-Natal', '2017-02-08 00:13:29', '2017-02-08 00:13:29'),
(417, 'Nkanini', 'Western Cape', '2017-06-20 20:19:49', '2017-06-20 20:19:49'),
(418, '[]', 'Western Cape', '2017-06-23 16:53:12', '2017-06-23 16:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2017_01_14_101606_create_ads_table', 1),
(7, '2017_01_14_104909_create_users_table', 1),
(8, '2017_01_22_081221_create_user_table', 1),
(10, '2017_02_02_222827_create_users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `myusers`
--

CREATE TABLE `myusers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` int(11) NOT NULL,
  `avator` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(60) NOT NULL,
  `province` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province`) VALUES
(1, 'Western Cape'),
(8, 'Gauteng');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `adid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `phonenumber`, `adid`) VALUES
(1, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '0834576876', 'Inn5799d770b1db2'),
(2, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '04867449523', 'Inn5799d9028e672'),
(3, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '08333435323', 'Inn579a6ffcab9cb'),
(4, 'Nozie Kali', 'nozikalie@gmail.com', '0833456789', 'Noz579bddd394191'),
(5, 'Somebody I don\'t know', 'somebody@gmail.com', '0834456789', 'Som579cf9c84d580'),
(6, 'Zet Dodi', 'zolisiledodi@outlook.com', '0625138554', 'Zet579d013d97e08'),
(7, 'Khusela Mphokeli', 'khusela101@gmail.com', '0782314983', 'Khu579d031ef0a65'),
(8, 'Zetido', 'zetwithoutmeausre@gmail.com', '0834586784', 'Zet579d14581c247'),
(9, 'Zano Mphokeli', 'zano@gmail.com', '0834576898', 'Zan579d1817ad233'),
(10, 'Zano', 'zano@gmail.com', '0834576898', 'Zan579d190949443'),
(11, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '0833456789', 'Inn579d1ce9f2b5f'),
(12, 'Zano', 'Zano@gmail.com', '083 44 54 645', 'Zan579d2027b5830'),
(13, 'zaaa', 'travis@devtips.com', '0847857898', 'zaa579d254b9d470'),
(14, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '0833456789', 'Inn579d28951e40b'),
(15, 'Innocent Mphokeli', 'innothetechgeek@gmail.com', '0834575867', 'Inn579df0e2d8301'),
(16, 'sdfsd', 'sdfdsdssdf', 'sdf', 'sdf579dfa87516af'),
(17, 'sdfsd', 'sdfdsdssdf', 'sdfdsdssdf', 'sdf579dfa930538b'),
(18, 'sdfsd', 'sdfdsdssdf', 'sdfdsdssdf', 'sdf579dfa97ee526'),
(19, 'sdfsd', 'sdfdsdssdf', 'sdfdsdssdf', 'sdf579dfafc1b8e9'),
(20, 'sdfsd', 'sdfdsdssdf', 'sdfdsdssdf', 'sdf579dfb1bee240'),
(21, '', '', '', '579dfd9ebae58'),
(22, '', '', '', '579e046dd544b'),
(23, '', '', '', '579e0470be559'),
(24, '', '', '', '579e054047b5f'),
(25, '', '', '', '579e0789b63f8'),
(26, 'Innocent Mphokeli', 'innothetechgeeek@gmail.com', '083 48 87 787', 'Inn579e08de18b18'),
(27, 'Lewis Dlangalavu', 'Lewi@gmail.com', '0834787898', 'Lew579e6b05f3efe'),
(28, 'dsfsdf', 'sdfdf', 'sdfdsf', 'dsf57a26e0a58009'),
(29, 'dsfdsf', 'Lewi@gmail.com', '0843345356', 'dsf57a273e8da2c5'),
(30, 'Tenang Apara', 'apara@gmail.com', '0834567878', 'Ten57a3109f80bd6');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(50) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(50) NOT NULL,
  `nu_ads` bigint(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `category_id`, `nu_ads`, `created_at`, `updated_at`) VALUES
(1, 'Cars', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Car Parts & Accessories', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Motorbikes & Scooters', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Motorbike Parts & Accessories', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Vans, Trucks & Plant', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Other', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Building, Home & Removals', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Entertainment', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Telecoms & Computers', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Travel Services & Tours', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Other', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Land', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Shacks for Sale', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Shacks to Rent', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Houses for Sale', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Houses for Rent', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Vacation Rentals', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Full Time Jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Part Time Jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Learn & Earn jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Other Jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'CDs, DVDs, Games & Books', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Computers & Software', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Music & Instruments', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Mobile Phones', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'TV, DVD & Cameras', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Video Games & Consoles', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Stuff Wanted', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Other', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Announcements', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Charity - Donate - NGO', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Lost - Found', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Tender Notices', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Beds', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Tables', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Couches', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Other', 8, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Stoves & Ovens', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Toasters', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Refrigirators', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Washing Machenes', 17, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Clothing', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Jewellery & Watches', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Accessories', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Shoes', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Hair Extensions', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Other', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Health & Beauty services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Event Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Computer & IT Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Cleaning Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `surbubs`
--

CREATE TABLE `surbubs` (
  `id` int(50) NOT NULL,
  `region` varchar(200) NOT NULL,
  `location` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surbubs`
--

INSERT INTO `surbubs` (`id`, `region`, `location`, `province`, `created_at`, `updated_at`) VALUES
(40, 'Cape Winelands', 'Franschhoek', 'Western Cape', '2017-06-21 23:56:11', '2017-06-21 23:56:11'),
(39, 'Cape Winelands', 'Klapmuts', 'Western Cape', '2017-06-21 23:55:48', '2017-06-21 23:55:48'),
(38, 'Cape Winelands', 'Worcester', 'Western Cape', '2017-06-21 23:54:55', '2017-06-21 23:54:55'),
(37, 'Cape Winelands', 'Paarl', 'Western Cape', '2017-06-21 23:53:53', '2017-06-21 23:53:53'),
(36, 'Cape Winelands', 'Stellenbosch', 'Western Cape', '2017-06-21 23:34:22', '2017-06-21 23:34:22'),
(41, 'Cape Winelands', 'Kylemore', 'Western Cape', '2017-06-21 23:56:36', '2017-06-21 23:56:36'),
(42, 'Cape Winelands', 'Wellington', 'Western Cape', '2017-06-21 23:57:11', '2017-06-21 23:57:11'),
(43, 'Cape Winelands', 'Gouda', 'Western Cape', '2017-06-21 23:57:55', '2017-06-21 23:57:55'),
(44, 'Cape Winelands', 'Robertson', 'Western Cape', '2017-06-21 23:58:29', '2017-06-21 23:58:29'),
(45, 'Cape Winelands', 'Touws River', 'Western Cape', '2017-06-21 23:59:10', '2017-06-21 23:59:10'),
(46, 'Cape Town', 'Cape Town', 'Western Cape', '2017-06-22 00:04:23', '2017-06-22 00:04:23'),
(48, 'Cape Town', 'Durbanville', 'Western Cape', '2017-06-22 00:05:12', '2017-06-22 00:05:12'),
(49, 'Cape Town', 'Fish Hoek', 'Western Cape', '2017-06-22 00:05:38', '2017-06-22 00:05:38'),
(50, 'Cape Town', 'Goodwood', 'Western Cape', '2017-06-22 00:06:08', '2017-06-22 00:06:08'),
(51, 'Cape Town', 'Gordon\'s Bay', 'Western Cape', '2017-06-22 00:06:47', '2017-06-22 00:06:47'),
(52, 'Cape Town', 'Hout Bay', 'Western Cape', '2017-06-22 00:07:20', '2017-06-22 00:07:20'),
(54, 'Cape Town', 'Observatory', 'Western Cape', '2017-06-22 00:09:05', '2017-06-22 00:09:05'),
(55, 'Cape Town', 'Century City', 'Western Cape', '2017-06-22 00:09:22', '2017-06-22 00:09:22'),
(56, 'Cape Town', 'City Centre', 'Western Cape', '2017-06-22 00:10:19', '2017-06-22 00:10:19'),
(58, 'Cape Town', 'Foreshore', 'Western Cape', '2017-06-22 00:11:48', '2017-06-22 00:11:48'),
(59, 'Cape Town', 'Gardens', 'Western Cape', '2017-06-22 00:12:25', '2017-06-22 00:12:25'),
(60, 'Cape Town', 'Higgovale', 'Western Cape', '2017-06-22 00:12:58', '2017-06-22 00:12:58'),
(61, 'Cape Town', 'Salt River', 'Western Cape', '2017-06-22 00:13:43', '2017-06-22 00:13:43'),
(62, 'Cape Town', 'Tamboerskloof', 'Western Cape', '2017-06-22 00:14:09', '2017-06-22 00:14:09'),
(63, 'Cape Town', 'University Estate', 'Western Cape', '2017-06-22 00:15:12', '2017-06-22 00:15:12'),
(64, 'Cape Town', 'Woodstock', 'Western Cape', '2017-06-22 00:15:41', '2017-06-22 00:15:41'),
(65, 'Cape Town', 'Vredehoek', 'Western Cape', '2017-06-22 00:16:48', '2017-06-22 00:16:48'),
(66, 'Cape Town', 'Oranjezicht', 'Western Cape', '2017-06-22 00:20:20', '2017-06-22 00:20:20'),
(67, 'Northern Suburbs', 'Brackenfell', 'Western Cape', '2017-06-22 00:26:21', '2017-06-22 00:26:21'),
(68, 'Northern Suburbs', 'Bellville', 'Western Cape', '2017-06-22 00:26:43', '2017-06-22 00:26:43'),
(69, 'Northern Suburbs', 'Brooklyn', 'Western Cape', '2017-06-22 00:27:05', '2017-06-22 00:27:05'),
(70, 'Northern Suburbs', 'Elsie\'s River', 'Western Cape', '2017-06-22 00:27:29', '2017-06-22 00:27:29'),
(72, 'Northern Suburbs', 'Kraaifontein	', 'Western Cape', '2017-06-22 00:28:25', '2017-06-22 00:28:25'),
(73, 'Northern Suburbs', 'Kuils River', 'Western Cape', '2017-06-22 00:28:59', '2017-06-22 00:28:59'),
(74, 'Northern Suburbs', 'Maitland', 'Western Cape', '2017-06-22 00:29:20', '2017-06-22 00:29:20'),
(75, 'Northern Suburbs', 'Thornton', 'Western Cape', '2017-06-22 00:29:57', '2017-06-22 00:29:57'),
(76, 'Northern Suburbs', 'Monte Vista', 'Western Cape', '2017-06-22 00:30:21', '2017-06-22 00:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `surbub_regions`
--

CREATE TABLE `surbub_regions` (
  `id` int(200) NOT NULL,
  `region` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surbub_regions`
--

INSERT INTO `surbub_regions` (`id`, `region`) VALUES
(1, ' Cape Winelands'),
(2, 'West Coast'),
(3, 'Cape Town'),
(4, 'Overberg'),
(5, 'Northern Suburbs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_ads_password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avator` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avator_originarl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_profile_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phonenumber` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `manage_ads_password`, `name`, `about`, `avator`, `avator_originarl`, `facebook_profile_url`, `remember_token`, `created_at`, `updated_at`, `phonenumber`, `is_admin`) VALUES
('344image5894056789dc1', 'simangele@gmail.com', '$2y$10$bbgwM0KpjHSHQp4O1eRxIuj.Tn3qwG.zL07qDucqDVIK9MjdwJip2', '', 'Simangele Ndevu', 'love of my life', '', NULL, NULL, '1BLSXWoCqQkneaJkQXZPOKr8F6j994stVyCH891n700BH5GmQ9xzma2ICUgG', '2017-02-03 02:21:59', '2017-02-03 02:21:59', '0833445786', 0),
('1243801709019982', 'thandekilegqabaza@yahoo.com', '$2y$10$4RirlmW9AmA2Vs7cLgD7EO22llQYl3IIJTicMiLemBSQwWsGvFP2q', '', 'Thandekile Gqabaza', NULL, '', NULL, NULL, 'ISZ3roR4htb0I7n1XdWgWZoiN9NlrrkRj3gVSkxfgcpxvmZThBjcmfkKfaL7', '2017-02-03 16:14:06', '2017-02-03 16:14:06', '0833877654', 0),
('153853418450325', 'innothetechgeek@gmail.com', '$2y$10$eRGbkWrPSlb/BLV9EEuFn.g3yE1hcWEmimmA3dYVFf4R6OPzVpXke', '', 'Lary Chalie', NULL, 'https://graph.facebook.com/v2.8/153853418450325/picture?type=normal', NULL, 'https://www.facebook.com/app_scoped_user_id/153853418450325/', 'lDBZKLHDspAXe2i6MeZQ5jsr1ajhBaKNfbV7vL1aeJ2LYmezAlsSeHMAdnvc', '2017-02-14 22:56:14', '2017-02-14 22:56:14', '0844334545', 0),
('344nnoge5898c5b9be309', 'innosela@gmail.com', '$2y$10$sLaP/2gUlijcF4LIApIs6O.cWX1.N9jt/7pPiBV6mskb5rtXVlUSO', '', 'Khusela Mphokeli', 'I\'m a tech geek', NULL, NULL, NULL, 'GJMcsS2SOvlXjti7l4ygwV3dnNdkafRhKngkPnB8NXAMc5FByxVYA63cQari', '2017-02-06 16:51:37', '2017-02-06 16:51:37', '0833444334', 0),
('135ndige594066126fa68', 'andiswa@gmail.com', '$2y$10$boeIRXizQg4R8xQNx0Hrj.P1NQ2bIGOwgB6l0kpY9dCP8HeMcBg6u', '', 'Andiswa Andy', 'Abouandy andyt\r\n                                                 ', NULL, NULL, NULL, 'PVfY7fOHQVICKuS5RL9UUOFR3kgiuhqD7ADuBDRbtYNqETtxtWbS3dCRjJNY', '2017-06-13 20:24:18', '2017-06-13 20:24:18', '0731358246', 0),
('454dmisc594ac63c39811', 'ksclr-admin@gmail.com', '$2y$10$.owDgZlj.kgxjEK9h8o4t.sGKYi7zARkdbRezULPT4uTCunQdXeka', '2e7ba6e83f283d32865f1f4589b2ee07', 'Admin', 'Adminstrator', NULL, NULL, NULL, '58jUUWJodW7t7YE0ck6KM6hOCcPcb1OB2HEezGoAGYFQ4nuVNJHKIWxqglDy', '2017-06-21 17:17:16', '2017-06-21 17:17:16', '0834545643', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_ads`
--

CREATE TABLE `user_ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`aidid`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `fav_ads`
--
ALTER TABLE `fav_ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasiads`
--
ALTER TABLE `kasiads`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surbubs`
--
ALTER TABLE `surbubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surbub_regions`
--
ALTER TABLE `surbub_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `user_ads`
--
ALTER TABLE `user_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ads_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `aidid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `fav_ads`
--
ALTER TABLE `fav_ads`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6661;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `surbubs`
--
ALTER TABLE `surbubs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `surbub_regions`
--
ALTER TABLE `surbub_regions`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_ads`
--
ALTER TABLE `user_ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
