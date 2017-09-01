-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 10:21 PM
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
(11, 'Events'),
(12, 'Pets');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `class` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`, `category_image`, `class`) VALUES
(6, 'Electronics', 'laptop-2.jpg', 'icon-book-open'),
(1, 'Vehicles', 'fa-car', 'fa-car'),
(4, 'Property', 'house.jpg', 'icon-home'),
(3, 'Shacks', 'tr.jpg ', 'icon-book-open '),
(7, 'Community', 'toy.jpg', 'icon-theatre'),
(25, 'Home & Garden', 'Home-Electronics-Appliances-2.jpg', 'icon-home'),
(18, 'Fashion & Beauty', 'fashion.jpg', 'icon-basket-1'),
(24, 'Pets', 'toy2.jpg', 'icon-guidedog ln-shadow'),
(26, 'Baby & Kids', 'toy.jpg', 'icon-basket-1'),
(2, 'Services', 'services.jpg ', 'fa-briefcase'),
(5, 'Jobs', 'jobs.jpg', 'fa-briefcase');

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
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fav_ads`
--

INSERT INTO `fav_ads` (`id`, `price`, `title`, `location`, `created_at`, `updated_at`, `user_id`, `ad_id`) VALUES
(34, '', '', '', '2017-06-13 19:30:59', '2017-06-13 19:30:59', '344image5894056789dc1', ''),
(35, '340 000', 'Kompressor C200 for Sale', 'Delft, Cape Town', '2017-06-13 19:31:01', '2017-06-13 19:31:01', '344image5894056789dc1', 'Kom58a61bfc99b6a'),
(38, '123 000', 'Car for Sale in Gugs', 'Kagiso', '2017-06-13 19:31:10', '2017-06-13 19:31:10', '344image5894056789dc1', 'Car58b5eed8254af'),
(44, '296 000', '2015 Golf GTI', 'Hout Bay', '2017-07-17 11:09:19', '2017-07-17 11:09:19', ' 45ummge596cb6d2130b0', '201596bdb47e5620'),
(45, '2000', 'Sumsung LCD TV for Sale', 'Kayamandi', '2017-07-17 12:15:58', '2017-07-17 12:15:58', '454dmisc594ac63c39811', 'Sum596cb8de47806'),
(46, '239 000', 'Pollo vivo For sale', 'Gugulethu', '2017-07-18 18:35:32', '2017-07-18 18:35:32', '454dmisc594ac63c39811', 'Pol596e4741769eb'),
(47, '296 000', '2015 Golf GTI', 'Hout Bay', '2017-07-20 21:01:21', '2017-07-20 21:01:21', '344nnoge5898c5b9be309', '201596bdb47e5620'),
(48, '345 000', 'Audi A1 ', 'Brackenfell', '2017-08-09 20:50:46', '2017-08-09 20:50:46', '454dmisc594ac63c39811', 'Aud597a1cfa63f5c'),
(49, '89 000', 'Pollo Vivo For Sale', 'Strand', '2017-08-09 20:51:03', '2017-08-09 20:51:03', '454dmisc594ac63c39811', 'Pol597ba87e79724'),
(50, '33 350', '2001 BMW for sale', 'Langa', '2017-08-09 20:51:11', '2017-08-09 20:51:11', '454dmisc594ac63c39811', '2005978fda7dab91'),
(51, '33 350', '2001 BMW for sale', 'Langa', '2017-08-09 20:51:15', '2017-08-09 20:51:15', '454dmisc594ac63c39811', '2005978fda7dab91'),
(52, '490 000', '2014 BMW for Sale', 'Cape Town', '2017-08-09 20:51:17', '2017-08-09 20:51:17', '454dmisc594ac63c39811', '2-15977943e9d5cf');

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
(6637, '1Image00020.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6638, '2Image00021.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6639, '3Image00022.jpg', 'Car58b5eed8254af', '2017-02-28 21:42:48', '2017-02-28 21:42:48'),
(6645, 'mycar1.jpg', '201594bd925954e4', '2017-06-22 14:50:14', '2017-06-22 14:50:14'),
(6646, 'mycar3.jpg', '201594bd925954e4', '2017-06-22 14:50:14', '2017-06-22 14:50:14'),
(6647, '3mycar1.jpg', '201594bd925954e4', '2017-06-22 14:50:15', '2017-06-22 14:50:15'),
(6656, '1$_20 (7).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6657, '$_20 (8).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6658, '$_20 (10).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:17', '2017-06-22 20:33:17'),
(6659, '$_20 (11).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:18', '2017-06-22 20:33:18'),
(6660, '$_20 (12).JPG', 'Hou594c298d1fa35', '2017-06-22 20:33:18', '2017-06-22 20:33:18'),
(6683, 'WP_20150320_035.jpg', 'Sha594f000a5b1f7', '2017-06-25 00:12:59', '2017-06-25 00:12:59'),
(6684, 'WP_20150315_12_03_33_Pro.jpg', 'Sha594f000a5b1f7', '2017-06-25 00:13:00', '2017-06-25 00:13:00'),
(6687, 'WP_20150315_12_03_48_Pro.jpg', 'Ndi594f0a8a1876a', '2017-06-25 00:57:46', '2017-06-25 00:57:46'),
(6699, '1927526_22.jpg', 'BWM596ba945725f7', '2017-07-16 17:58:29', '2017-07-16 17:58:29'),
(6700, '1927526_32.jpg', 'BWM596ba945725f7', '2017-07-16 17:58:30', '2017-07-16 17:58:30'),
(6701, '31927526_22.jpg', 'BWM596ba945725f7', '2017-07-16 17:58:30', '2017-07-16 17:58:30'),
(6702, '1927526_42.jpg', 'BWM596ba945725f7', '2017-07-16 17:58:30', '2017-07-16 17:58:30'),
(6703, '1927526_52.jpg', 'BWM596ba945725f7', '2017-07-16 17:58:30', '2017-07-16 17:58:30'),
(6704, '1928199.jpg', '201596bdb47e5620', '2017-07-16 21:31:52', '2017-07-16 21:31:52'),
(6705, '1928199_2.jpg', '201596bdb47e5620', '2017-07-16 21:31:52', '2017-07-16 21:31:52'),
(6706, '1928199_3.jpg', '201596bdb47e5620', '2017-07-16 21:31:52', '2017-07-16 21:31:52'),
(6707, '1928199_4.jpg', '201596bdb47e5620', '2017-07-16 21:31:52', '2017-07-16 21:31:52'),
(6708, '1928199_5.jpg', '201596bdb47e5620', '2017-07-16 21:31:53', '2017-07-16 21:31:53'),
(6709, '$_20 (7).JPG', '4 b596bdc5bb0377', '2017-07-16 21:36:27', '2017-07-16 21:36:27'),
(6710, '$_20 (9).JPG', '4 b596bdc5bb0377', '2017-07-16 21:36:28', '2017-07-16 21:36:28'),
(6711, '3$_20 (10).JPG', '4 b596bdc5bb0377', '2017-07-16 21:36:28', '2017-07-16 21:36:28'),
(6712, '$_20.JPG', '4 b596bdc5bb0377', '2017-07-16 21:36:28', '2017-07-16 21:36:28'),
(6713, '5$_20 (8).JPG', '4 b596bdc5bb0377', '2017-07-16 21:36:28', '2017-07-16 21:36:28'),
(6714, '1$_20.JPG', 'Hou596c7b863dae4', '2017-07-17 08:55:34', '2017-07-17 08:55:34'),
(6715, '2$_20 (2).JPG', 'Hou596c7b863dae4', '2017-07-17 08:55:34', '2017-07-17 08:55:34'),
(6716, '3$_20 (1).JPG', 'Hou596c7b863dae4', '2017-07-17 08:55:34', '2017-07-17 08:55:34'),
(6717, '4$_20 (3).JPG', 'Hou596c7b863dae4', '2017-07-17 08:55:35', '2017-07-17 08:55:35'),
(6718, '$_20 (4).JPG', 'Hou596c7b863dae4', '2017-07-17 08:55:35', '2017-07-17 08:55:35'),
(6719, 'IMG_20170705_165303.jpg', 'Hou596cb8506e902', '2017-07-17 13:14:56', '2017-07-17 13:14:56'),
(6720, 'IMG_20170705_165254.jpg', 'Hou596cb8506e902', '2017-07-17 13:14:57', '2017-07-17 13:14:57'),
(6721, 'IMG_20170705_165243.jpg', 'Hou596cb8506e902', '2017-07-17 13:14:57', '2017-07-17 13:14:57'),
(6722, 'IMG_20170705_165239.jpg', 'Hou596cb8506e902', '2017-07-17 13:14:58', '2017-07-17 13:14:58'),
(6723, 'IMG_20170601_164200.jpg', 'Sum596cb8de47806', '2017-07-17 13:17:18', '2017-07-17 13:17:18'),
(6724, 'IMG_20170601_164158.jpg', 'Sum596cb8de47806', '2017-07-17 13:17:19', '2017-07-17 13:17:19'),
(6725, 'IMG_20170601_164210.jpg', 'Sum596cb8de47806', '2017-07-17 13:17:19', '2017-07-17 13:17:19'),
(6726, '4IMG_20170601_164200.jpg', 'Sum596cb8de47806', '2017-07-17 13:17:19', '2017-07-17 13:17:19'),
(6727, 'IMG_20170707_193427[1].jpg', '4 b596ce2e865951', '2017-07-17 16:16:40', '2017-07-17 16:16:40'),
(6728, 'IMG_20170707_193434[1].jpg', '4 b596ce2e865951', '2017-07-17 16:16:41', '2017-07-17 16:16:41'),
(6729, 'IMG_20170707_193525[1].jpg', '4 b596ce2e865951', '2017-07-17 16:16:41', '2017-07-17 16:16:41'),
(6730, 'IMG_20170707_193530[1].jpg', '4 b596ce2e865951', '2017-07-17 16:16:42', '2017-07-17 16:16:42'),
(6731, 'IMG_20140630_110711.jpg', '5 b596e425dbd887', '2017-07-18 17:16:14', '2017-07-18 17:16:14'),
(6732, 'IMG_20140630_112843.jpg', '5 b596e425dbd887', '2017-07-18 17:16:16', '2017-07-18 17:16:16'),
(6733, 'IMG_20140703_134748.jpg', '5 b596e425dbd887', '2017-07-18 17:16:17', '2017-07-18 17:16:17'),
(6734, 'IMG_20140630_110529.jpg', '5 b596e425dbd887', '2017-07-18 17:16:18', '2017-07-18 17:16:18'),
(6735, 'IMG_00000008_edit.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:06', '2017-07-18 17:37:06'),
(6736, 'IMG_00000012.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:07', '2017-07-18 17:37:07'),
(6737, 'IMG_00000011.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:08', '2017-07-18 17:37:08'),
(6738, 'IMG_00000405.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:09', '2017-07-18 17:37:09'),
(6739, 'IMG_00000825.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:10', '2017-07-18 17:37:10'),
(6740, 'IMG_00000829.jpg', 'Pol596e4741769eb', '2017-07-18 17:37:11', '2017-07-18 17:37:11'),
(6741, 'IMG_20170615_210853.jpg', 'Len596e77e30aa33', '2017-07-18 21:04:35', '2017-07-18 21:04:35'),
(6742, 'IMG_20170615_210839.jpg', 'Len596e77e30aa33', '2017-07-18 21:04:35', '2017-07-18 21:04:35'),
(6743, 'IMG_20170615_210619.jpg', 'Len596e77e30aa33', '2017-07-18 21:04:36', '2017-07-18 21:04:36'),
(6744, 'IMG_20170615_210654.jpg', 'Len596e77e30aa33', '2017-07-18 21:04:36', '2017-07-18 21:04:36'),
(6745, 'IMG_00000046.jpg', '3 b597093f0abe82', '2017-07-20 11:28:49', '2017-07-20 11:28:49'),
(6746, 'IMG_00000052.jpg', '3 b597093f0abe82', '2017-07-20 11:28:50', '2017-07-20 11:28:50'),
(6747, 'IMG_00000054.jpg', '3 b597093f0abe82', '2017-07-20 11:28:51', '2017-07-20 11:28:51'),
(6748, '4$_20.JPG', '3 b597093f0abe82', '2017-07-20 11:28:51', '2017-07-20 11:28:51'),
(6749, 'mycar18.jpg', 'Kom59762d69c28f4', '2017-07-24 17:24:58', '2017-07-24 17:24:58'),
(6750, 'mycar19.jpg', 'Kom59762d69c28f4', '2017-07-24 17:24:58', '2017-07-24 17:24:58'),
(6751, 'mycar20.jpg', 'Kom59762d69c28f4', '2017-07-24 17:24:59', '2017-07-24 17:24:59'),
(6752, 'mycar10.jpg', 'Kom59762d69c28f4', '2017-07-24 17:24:59', '2017-07-24 17:24:59'),
(6753, 'Picture 329 (395).jpg', 'Cle597718a781e32', '2017-07-25 10:08:40', '2017-07-25 10:08:40'),
(6754, '1927985.jpg', 'BMW597743da91723', '2017-07-25 13:12:58', '2017-07-25 13:12:58'),
(6755, '1927985_2.jpg', 'BMW597743da91723', '2017-07-25 13:12:59', '2017-07-25 13:12:59'),
(6756, '1927985_3.jpg', 'BMW597743da91723', '2017-07-25 13:12:59', '2017-07-25 13:12:59'),
(6757, '41927985_3.jpg', 'BMW597743da91723', '2017-07-25 13:12:59', '2017-07-25 13:12:59'),
(6758, '1927985_4.jpg', 'BMW597743da91723', '2017-07-25 13:12:59', '2017-07-25 13:12:59'),
(6759, '1927985_5.jpg', 'BMW597743da91723', '2017-07-25 13:13:00', '2017-07-25 13:13:00'),
(6760, 'IMG_20161221_093139.jpg', 'RDP597744fa500b8', '2017-07-25 13:17:46', '2017-07-25 13:17:46'),
(6761, 'IMG_20161221_093544.jpg', 'RDP597744fa500b8', '2017-07-25 13:17:47', '2017-07-25 13:17:47'),
(6762, 'IMG_20161221_093604.jpg', 'RDP597744fa500b8', '2017-07-25 13:17:48', '2017-07-25 13:17:48'),
(6763, 'IMG_20161221_093646.jpg', 'RDP597744fa500b8', '2017-07-25 13:17:48', '2017-07-25 13:17:48'),
(6764, 'IMG_20161221_093710.jpg', 'RDP597744fa500b8', '2017-07-25 13:17:49', '2017-07-25 13:17:49'),
(6765, '11927526_32.jpg', '2-15977943e9d5cf', '2017-07-25 18:55:59', '2017-07-25 18:55:59'),
(6766, '21927526_22.jpg', '2-15977943e9d5cf', '2017-07-25 18:55:59', '2017-07-25 18:55:59'),
(6767, '19275262.jpg', '2-15977943e9d5cf', '2017-07-25 18:56:00', '2017-07-25 18:56:00'),
(6768, '41927526_42.jpg', '2-15977943e9d5cf', '2017-07-25 18:56:00', '2017-07-25 18:56:00'),
(6769, '1IMG_20170615_210853.jpg', 'Len5977a399498a0', '2017-07-25 20:01:29', '2017-07-25 20:01:29'),
(6770, '2IMG_20170615_210839.jpg', 'Len5977a399498a0', '2017-07-25 20:01:30', '2017-07-25 20:01:30'),
(6771, '3IMG_20170615_210654.jpg', 'Len5977a399498a0', '2017-07-25 20:01:30', '2017-07-25 20:01:30'),
(6772, '4IMG_20170615_210619.jpg', 'Len5977a399498a0', '2017-07-25 20:01:31', '2017-07-25 20:01:31'),
(6773, 'IMG_20160731_001726.jpg', 'Len5977a399498a0', '2017-07-25 20:01:31', '2017-07-25 20:01:31'),
(6774, '6IMG_20160731_001609.jpg', 'Len5977a399498a0', '2017-07-25 20:01:32', '2017-07-25 20:01:32'),
(6775, '293697_259997827426682_100002493999399_555321_1460952633_n.jpg', 'PHP5978d834e408e', '2017-07-26 17:58:13', '2017-07-26 17:58:13'),
(6776, 'IMG-20140302-WA0002.jpg', 'Tel5978e0d421145', '2017-07-26 18:35:00', '2017-07-26 18:35:00'),
(6777, '11927985.jpg', '2005978fda7dab91', '2017-07-26 20:38:00', '2017-07-26 20:38:00'),
(6778, '21927985_2.jpg', '2005978fda7dab91', '2017-07-26 20:38:00', '2017-07-26 20:38:00'),
(6779, '31927985_3.jpg', '2005978fda7dab91', '2017-07-26 20:38:00', '2017-07-26 20:38:00'),
(6780, '41927985_4.jpg', '2005978fda7dab91', '2017-07-26 20:38:01', '2017-07-26 20:38:01'),
(6781, '51927985_5.jpg', '2005978fda7dab91', '2017-07-26 20:38:01', '2017-07-26 20:38:01'),
(6782, '20141005_094918.jpg', 'Bra597907e95853e', '2017-07-26 21:21:45', '2017-07-26 21:21:45'),
(6783, '20141006_154438.jpg', 'Bra597907e95853e', '2017-07-26 21:21:46', '2017-07-26 21:21:46'),
(6784, '04102014(005).jpg', 'Bra597907e95853e', '2017-07-26 21:21:46', '2017-07-26 21:21:46'),
(6785, '2014-10-06-1343.jpg', 'Bra597907e95853e', '2017-07-26 21:21:47', '2017-07-26 21:21:47'),
(6786, '2014-10-04-1297.jpg', 'Bra597907e95853e', '2017-07-26 21:21:47', '2017-07-26 21:21:47'),
(6787, '1mycar1.jpg', 'Car597908ee08194', '2017-07-26 21:26:06', '2017-07-26 21:26:06'),
(6788, '2mycar3.jpg', 'Car597908ee08194', '2017-07-26 21:26:07', '2017-07-26 21:26:07'),
(6789, 'mycar2.jpg', 'Car597908ee08194', '2017-07-26 21:26:07', '2017-07-26 21:26:07'),
(6790, 'IMG_20151218_125443.jpg', 'Ren59790a3df1464', '2017-07-26 21:31:42', '2017-07-26 21:31:42'),
(6791, 'IMG_20151218_125445.jpg', 'Ren59790a3df1464', '2017-07-26 21:31:42', '2017-07-26 21:31:42'),
(6792, 'IMG_20151218_131408.jpg', 'Ren59790a3df1464', '2017-07-26 21:31:43', '2017-07-26 21:31:43'),
(6793, 'IMG_20151218_131410.jpg', 'Ren59790a3df1464', '2017-07-26 21:31:43', '2017-07-26 21:31:43'),
(6794, '1$_20 (4).JPG', 'Ndi5979a62b93c29', '2017-07-27 08:36:59', '2017-07-27 08:36:59'),
(6795, '$_20 (5).JPG', 'Ndi5979a62b93c29', '2017-07-27 08:37:00', '2017-07-27 08:37:00'),
(6796, '$_20 (6).JPG', 'Ndi5979a62b93c29', '2017-07-27 08:37:00', '2017-07-27 08:37:00'),
(6797, '4$_20 (7).JPG', 'Ndi5979a62b93c29', '2017-07-27 08:37:00', '2017-07-27 08:37:00'),
(6798, '5$_20 (8).JPG', 'Ndi5979a62b93c29', '2017-07-27 08:37:00', '2017-07-27 08:37:00'),
(6799, '1928199_6.jpg', 'Aud597a1cfa63f5c', '2017-07-27 17:03:54', '2017-07-27 17:03:54'),
(6800, '1928199_7.jpg', 'Aud597a1cfa63f5c', '2017-07-27 17:03:55', '2017-07-27 17:03:55'),
(6801, '31928199_5.jpg', 'Aud597a1cfa63f5c', '2017-07-27 17:03:55', '2017-07-27 17:03:55'),
(6802, '41928199_4.jpg', 'Aud597a1cfa63f5c', '2017-07-27 17:03:56', '2017-07-27 17:03:56'),
(6803, 'IMG_00000007.jpg', 'Pol597ba87e79724', '2017-07-28 21:11:27', '2017-07-28 21:11:27'),
(6804, 'IMG_00000008.jpg', 'Pol597ba87e79724', '2017-07-28 21:11:28', '2017-07-28 21:11:28'),
(6805, '3IMG_00000008_edit.jpg', 'Pol597ba87e79724', '2017-07-28 21:11:28', '2017-07-28 21:11:28'),
(6806, 'IMG_00000009.jpg', 'Pol597ba87e79724', '2017-07-28 21:11:29', '2017-07-28 21:11:29'),
(6807, 'IMG_00000010.jpg', 'Pol597ba87e79724', '2017-07-28 21:11:30', '2017-07-28 21:11:30'),
(6808, 'Image00012.jpg', 'Sum597c66cf3c0e9', '2017-07-29 10:43:27', '2017-07-29 10:43:27'),
(6809, 'Image00013.jpg', 'Sum597c66cf3c0e9', '2017-07-29 10:43:27', '2017-07-29 10:43:27'),
(6810, 'Image00014.jpg', 'Sum597c66cf3c0e9', '2017-07-29 10:43:28', '2017-07-29 10:43:28'),
(6811, 'Image00015.jpg', 'Sum597c66cf3c0e9', '2017-07-29 10:43:28', '2017-07-29 10:43:28'),
(6812, '1.jpeg', 'Fla597f63dfd7126', '2017-07-31 17:07:44', '2017-07-31 17:07:44'),
(6813, '13.jpeg', 'Fla597f63dfd7126', '2017-07-31 17:07:45', '2017-07-31 17:07:45'),
(6814, '15.jpeg', 'Fla597f63dfd7126', '2017-07-31 17:07:45', '2017-07-31 17:07:45'),
(6815, '11.jpeg', 'Fla597f63dfd7126', '2017-07-31 17:07:45', '2017-07-31 17:07:45'),
(6816, '2382688.jpg', 'Aud597fde930560e', '2017-08-01 01:51:15', '2017-08-01 01:51:15'),
(6817, '2382688_3.jpg', 'Aud597fde930560e', '2017-08-01 01:51:16', '2017-08-01 01:51:16'),
(6818, '2382688_4.jpg', 'Aud597fde930560e', '2017-08-01 01:51:16', '2017-08-01 01:51:16'),
(6819, '2382688_5.jpg', 'Aud597fde930560e', '2017-08-01 01:51:16', '2017-08-01 01:51:16'),
(6820, '2382688_7.jpg', 'Aud597fde930560e', '2017-08-01 01:51:16', '2017-08-01 01:51:16'),
(6821, '2382688_6.jpg', 'Aud597fde930560e', '2017-08-01 01:51:17', '2017-08-01 01:51:17'),
(6822, 'IMG_00000902.jpg', 'RDP598b74cf2eb1f', '2017-08-09 20:47:12', '2017-08-09 20:47:12'),
(6823, 'IMG_00000903.jpg', 'RDP598b74cf2eb1f', '2017-08-09 20:47:14', '2017-08-09 20:47:14'),
(6824, '3IMG_20140630_110711.jpg', 'RDP598b74cf2eb1f', '2017-08-09 20:47:15', '2017-08-09 20:47:15'),
(6825, 'IMG_20140630_110711_2.jpg', 'RDP598b74cf2eb1f', '2017-08-09 20:47:16', '2017-08-09 20:47:16'),
(6826, '2382190 (1).jpg', '201599370c307f96', '2017-08-15 22:08:03', '2017-08-15 22:08:03'),
(6827, '2382190_2.jpg', '201599370c307f96', '2017-08-15 22:08:04', '2017-08-15 22:08:04'),
(6828, '2382190_3.jpg', '201599370c307f96', '2017-08-15 22:08:04', '2017-08-15 22:08:04'),
(6829, '2382190_6.jpg', '201599370c307f96', '2017-08-15 22:08:04', '2017-08-15 22:08:04'),
(6830, '52382190_6.jpg', '201599370c307f96', '2017-08-15 22:08:05', '2017-08-15 22:08:05'),
(6831, '$_20 (15).jpg', '2015993719661f34', '2017-08-15 22:11:34', '2017-08-15 22:11:34'),
(6832, '$_20 (16).jpg', '2015993719661f34', '2017-08-15 22:11:35', '2017-08-15 22:11:35'),
(6833, '$_20 (17).jpg', '2015993719661f34', '2017-08-15 22:11:35', '2017-08-15 22:11:35'),
(6834, '$_20 (18).jpg', '2015993719661f34', '2017-08-15 22:11:36', '2017-08-15 22:11:36'),
(6835, '$_20 (19).jpg', '2015993719661f34', '2017-08-15 22:11:36', '2017-08-15 22:11:36'),
(6836, 'WIN_20170827_205159.JPG', 'M3C59a3192c18d9b', '2017-08-27 19:10:36', '2017-08-27 19:10:36'),
(6837, 'WIN_20170827_205233.JPG', 'M3C59a3192c18d9b', '2017-08-27 19:10:37', '2017-08-27 19:10:37'),
(6838, 'WIN_20170827_205245.JPG', 'M3C59a3192c18d9b', '2017-08-27 19:10:37', '2017-08-27 19:10:37'),
(6839, 'WIN_20170827_205253.JPG', 'M3C59a3192c18d9b', '2017-08-27 19:10:37', '2017-08-27 19:10:37'),
(6840, 'WIN_20170827_211450.JPG', 'ASP59a3223c612e2', '2017-08-27 19:49:16', '2017-08-27 19:49:16'),
(6841, 'WIN_20170827_211409.JPG', 'ASP59a3223c612e2', '2017-08-27 19:49:16', '2017-08-27 19:49:16'),
(6842, 'WIN_20170827_211506.JPG', 'ASP59a3223c612e2', '2017-08-27 19:49:17', '2017-08-27 19:49:17'),
(6843, '4WIN_20170827_211506.JPG', 'ASP59a3223c612e2', '2017-08-27 19:49:17', '2017-08-27 19:49:17'),
(6844, '5WIN_20170827_211409.JPG', 'ASP59a3223c612e2', '2017-08-27 19:49:17', '2017-08-27 19:49:17'),
(6845, 'IMG_20161220_192147.jpg', 'Bus59a32580a1adb', '2017-08-27 20:03:13', '2017-08-27 20:03:13'),
(6846, 'IMG_20161220_192150.jpg', 'Bus59a32580a1adb', '2017-08-27 20:03:13', '2017-08-27 20:03:13'),
(6847, '3IMG_20161220_192150.jpg', 'Bus59a32580a1adb', '2017-08-27 20:03:14', '2017-08-27 20:03:14'),
(6848, 'IMG_20161221_030619.jpg', 'Bus59a32580a1adb', '2017-08-27 20:03:14', '2017-08-27 20:03:14'),
(6857, '1IMG_00000046.jpg', 'Hou59a34e3f93598', '2017-08-27 22:57:04', '2017-08-27 22:57:04'),
(6858, '2IMG_00000052.jpg', 'Hou59a34e3f93598', '2017-08-27 22:57:05', '2017-08-27 22:57:05'),
(6859, '3IMG_00000054.jpg', 'Hou59a34e3f93598', '2017-08-27 22:57:06', '2017-08-27 22:57:06'),
(6860, 'IMG_20161026_034555.jpg', 'Hir59a48c1a126f4', '2017-08-28 21:33:14', '2017-08-28 21:33:14'),
(6861, '1IMG_20170615_210853.jpg', 'Lap59a4d767e4bb0', '2017-08-29 02:54:32', '2017-08-29 02:54:32'),
(6862, 'IMG_20170615_210831.jpg', 'Lap59a4d767e4bb0', '2017-08-29 02:54:33', '2017-08-29 02:54:33'),
(6863, '3IMG_20170615_210839.jpg', 'Lap59a4d767e4bb0', '2017-08-29 02:54:33', '2017-08-29 02:54:33'),
(6864, '4IMG_20170615_210654.jpg', 'Lap59a4d767e4bb0', '2017-08-29 02:54:34', '2017-08-29 02:54:34'),
(6865, '1IMG_20170615_210853.jpg', 'Lap59a4d78b48b90', '2017-08-29 02:55:07', '2017-08-29 02:55:07'),
(6866, '2IMG_20170615_210831.jpg', 'Lap59a4d78b48b90', '2017-08-29 02:55:08', '2017-08-29 02:55:08'),
(6867, '3IMG_20170615_210839.jpg', 'Lap59a4d78b48b90', '2017-08-29 02:55:08', '2017-08-29 02:55:08'),
(6868, '4IMG_20170615_210654.jpg', 'Lap59a4d78b48b90', '2017-08-29 02:55:09', '2017-08-29 02:55:09'),
(6869, '1$_20 (4).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:30', '2017-08-29 21:05:30'),
(6870, '2$_20 (5).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:31', '2017-08-29 21:05:31'),
(6871, '3$_20 (6).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:31', '2017-08-29 21:05:31'),
(6872, '4$_20 (7).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:32', '2017-08-29 21:05:32'),
(6873, '5$_20 (8).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:32', '2017-08-29 21:05:32'),
(6874, '6$_20 (9).JPG', 'Sha59a5d71a6eab7', '2017-08-29 21:05:32', '2017-08-29 21:05:32'),
(6875, '1$_20 (9).JPG', 'Sha59a604f4ebedd', '2017-08-30 00:21:09', '2017-08-30 00:21:09'),
(6876, '2$_20 (5).JPG', 'Sha59a604f4ebedd', '2017-08-30 00:21:09', '2017-08-30 00:21:09'),
(6877, '3$_20 (5).JPG', 'Sha59a604f4ebedd', '2017-08-30 00:21:09', '2017-08-30 00:21:09'),
(6878, '4$_20 (4).JPG', 'Sha59a604f4ebedd', '2017-08-30 00:21:09', '2017-08-30 00:21:09'),
(6879, '1$_20 (7).JPG', 'zxc59a609082a40f', '2017-08-30 00:38:32', '2017-08-30 00:38:32'),
(6880, '1$_20 (7).JPG', 'zxc59a60a25dc4a0', '2017-08-30 00:43:18', '2017-08-30 00:43:18'),
(6881, '1$_20 (6).JPG', 'nnb59a60a778ba68', '2017-08-30 00:44:39', '2017-08-30 00:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `kasiads`
--

CREATE TABLE `kasiads` (
  `adid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_catagory` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negotiable` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_category` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_due` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kasiads`
--

INSERT INTO `kasiads` (`adid`, `catagory`, `main_catagory`, `price`, `negotiable`, `province`, `title`, `description`, `keywords`, `location`, `location_category`, `featured`, `approved`, `payment_method`, `amount_due`, `created_at`, `updated_at`, `user_id`) VALUES
('Kom58a61bfc99b6a', 'Cars', 'Vehicles', '340 000', NULL, 'Western Cape', 'Kompressor C200 for Sale', 'If I begged and If I cried would it change the sky tonight ? would it give me sunglight ? should I wait for you to call is there any hope at all you drifting by the more I think bout it the less that I was able to share it with you.', 'car cars vehicles  Kompressor C200', 'Delft, Cape Town', 'township', 'bargain', 'Approved', '', '', '2017-02-16 19:39:08', '2017-02-16 19:39:08', '344image5894056789dc1'),
('BWM596ba945725f7', 'Cars', 'Vehicles', '398 000', '', 'Western Cape', 'BMW for Sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'car cars vehicles  BMW', 'Brackenfell', 'suburb', 'sponsored', 'Approved', '', '', '2017-07-16 15:58:29', '2017-07-16 15:58:29', '454dmisc594ac63c39811'),
('Hai58b1fa8a36a64', 'Hair Extensions', 'Fashion & Beauty', '450', NULL, 'Western Cape', 'Hair extensions for sale', 'if I begged and If I cried would it change the sky tonight ? would it give me sunlight ? should I wait for you to call is there any hope at all ? you drifting by the more I think about it the less that I was able to share it with you. It try to reach for and I almost feel you getting nearly hear and then you disappear. I miss all the signs one at a time no my love I\'m ready to shine.', ' Hair Extensions  Hair extensions', 'Kayamandi', 'township', 'Sponsored', 'Approved', '', '', '2017-02-25 19:43:38', '2017-02-25 19:43:38', '344image5894056789dc1'),
('Car58b5eed8254af', 'Cars', 'Vehicles', '', NULL, 'Western Cape', 'Car for Sale in Gugs', 'dsfsd dsfs dfds dsf d dsf dssfdsf dsfdsf dsffds dsfdsf sdfdsf', 'car cars vehicles  Car in Gugs', 'Kayamandi', 'township', 'None', 'Approved', '', '', '2017-02-28 19:42:48', '2017-02-28 19:42:48', '344image5894056789dc1'),
('59a37b0598916', 'Mobile Phones', 'Electronics', '', '', 'Western Cape', '', ' ', ' mobile phones   electronics', '', 'suburb', 'None', 'approved', 'none', '0', '2017-08-28 00:08:05', '2017-08-28 00:08:05', '454dmisc594ac63c39811'),
('Hir59a48c1a126f4', 'Legal Services', 'Services', '17 000', '', 'Western Cape', 'Hire a lawyer online', 'Don\'t talk to me, talk to my lawyer. Don\'t talk to me talk to my lawyer. don\'t talk to me, talk to my lawyer...don\'t talk to me talk to my lawyer. Don\'t talk to me talk to my lawyer. Don\'t talk to me talk to my lawyer. Don\'t talk to me talk to my lawyer. Don\'t talk to me talk to my lawyer. Don\'t talk to me talk to my lawyer.', ' legal services  hire a lawyer online services', 'Cape town', 'suburb', 'sponsored', 'Approved', 'none', '130', '2017-08-28 19:33:14', '2017-08-28 19:33:14', '344nnoge5898c5b9be309'),
('Hou594c298d1fa35', 'Houses & Flats For Sale', 'Property', '340 000', NULL, 'Western Cape', 'House for sale in Xolweni', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Houses & Flats For Sale  House for sale in Xolweni', 'Xolweni', 'township', 'sponsored', 'Approved', '', '', '2017-06-22 18:33:17', '2017-06-22 18:33:17', '344nnoge5898c5b9be309'),
('201594bd925954e4', 'Cars', 'Vehicles', '270 000', NULL, 'Western Cape', '2010 kompressor C200 for sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  2010 kompressor C200 for sale', 'Lwandle', 'township', 'sponsored', 'Approved', '', '', '2017-06-22 12:50:13', '2017-06-22 12:50:13', '135ndige594066126fa68'),
('BMW597743da91723', 'Cars', 'Vehicles', '70 000', '', 'Western Cape', 'BMW for Sale in Kayamandi', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  BMW in Kayamandi Cars', 'Kayamandi', 'township', 'bargain', 'Approved', '', '', '2017-07-25 11:12:58', '2017-07-25 11:12:58', '344nnoge5898c5b9be309'),
('201596bdb47e5620', 'Cars', 'Vehicles', '296 000', 'negotiable', 'Western Cape', '2015 Golf GTI', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Vehicles car cars vehicle  2015 Golf GTI', 'Hout Bay', 'township', 'sponsored', 'Approved', '', '', '2017-07-16 19:31:51', '2017-07-16 19:31:51', '454dmisc594ac63c39811'),
('5 b596e425dbd887', 'Houses & Flats For Sale', 'Property', '490 000', '', 'Western Cape', '5 bedroom house in Kayamandi', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Houses & Flats 5 bedroom house in Kayamandi', 'Kayamandi', 'township', 'bargain', 'Approved', '', '', '2017-07-18 15:16:13', '2017-07-18 15:16:13', '135ndige594066126fa68'),
('Hou596c7b863dae4', 'Houses & Flats For Sale', 'Property', '4500', '', 'Western Cape', 'House to rent in Kuirls River', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit  Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Houses & Flats   House to rent in Kuirls River Property', 'Kuils River', 'suburb', 'sponsored', 'Approved', '', '', '2017-07-17 06:55:34', '2017-07-17 06:55:34', '135ndige594066126fa68'),
('4 b596bdc5bb0377', 'Houses & Flats For Sale', 'Property', '430 000', 'negotiable', 'Western Cape', '4 bedroom house in Maitland', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Houses & Flats   4 bedroom house in Maitland Property', 'Maitland', 'suburb', 'bargain', 'Approved', '', '', '2017-07-16 19:36:27', '2017-07-16 19:36:27', '454dmisc594ac63c39811'),
('Hou596cb8506e902', 'Houses & Flats For Rent', 'Property', '1300/m', '', 'Western Cape', 'House to Rent in Fish Hoek', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Houses & Flats For Rent  House to Rent in Fish Hoek Property', 'Fish Hoek', 'suburb', 'bargain', 'Approved', '', '', '2017-07-17 11:14:56', '2017-07-17 11:14:56', ' 45ummge596cb6d2130b0'),
('Sum596cb8de47806', 'TV, DVD & Cameras', 'Electronics', '2000', 'negotiable', 'Western Cape', 'Sumsung LCD TV for Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' TV, DVD & Cameras  Sumsung LCD TV  Electronics', 'Kayamandi', 'township', 'sponsored', 'Approved', '', '', '2017-07-17 11:17:18', '2017-07-17 11:17:18', ' 45ummge596cb6d2130b0'),
('4 b596ce2e865951', 'Houses & Flats For Sale', 'Property', '400/m', '', 'Western Cape', '4 bedroom House to rent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Houses & Flats  4 bedroom House to rent Property', 'Century City', 'suburb', 'bagain', 'Approved', '', '', '2017-07-17 14:16:40', '2017-07-17 14:16:40', '344nnoge5898c5b9be309'),
('Sha594f000a5b1f7', 'Car Parts & Accessories', 'Vehicles', '14000', NULL, 'Western Cape', 'Shack for Sale in Kayamandi', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Car Parts & Accessories  Kayamandi Vehicles Vehicles', 'Gugulethu', 'township', 'None', 'Approved', '', '', '2017-06-24 22:12:58', '2017-06-24 22:12:58', '135ndige594066126fa68'),
('Ndi594f0a8a1876a', 'Shacks for Sale', 'Shacks', '9 000', NULL, 'Western Cape', 'Ndithengisa ngetyotyombe', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Shacks  Ndithengisa ngetyotyombe Shacks', 'Philippi', 'township', 'bagain', 'Approved', '', '', '2017-06-24 22:57:46', '2017-06-24 22:57:46', '135ndige594066126fa68'),
('Pol596e4741769eb', 'Cars', 'Vehicles', '239 000', '', 'Western Cape', 'Pollo vivo For sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Vehicles car cars vehicle  Pollo vivo ', 'Gugulethu', 'township', 'sponsored', 'Approved', '', '', '2017-07-18 15:37:05', '2017-07-18 15:37:05', '344nnoge5898c5b9be309'),
('Len596e77e30aa33', 'Computers,Laptops & Software', 'Electronics', '4000', 'negotiable', 'Western Cape', 'Lenovo Laptop for Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Computers & Software  Lenovo Laptop Electronics', 'Gugulethu', 'township', 'bagain', 'Approved', '', '', '2017-07-18 19:04:35', '2017-07-18 19:04:35', '344nnoge5898c5b9be309'),
('3 b597093f0abe82', 'Houses & Flats For Rent', 'Property', '189 000', '', 'Western Cape', '3 bedroom house to rent', 'Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit', '3 bedroom house to rent Property Houses & Flats For Rent', 'Kuils River', 'suburb', 'bargain', 'Approved', '', '', '2017-07-20 09:28:48', '2017-07-20 09:28:48', '454dmisc594ac63c39811'),
('Cle597718a781e32', 'General jobs', 'Jobs', '2 300', '', 'Western Cape', 'Cleaner Needed in Western Cape', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' General jobs  Cleaner Needed in Western Cape Jobs', 'Cape Town', 'suburb', 'None', 'Approved', '', '', '2017-07-25 08:08:39', '2017-07-25 08:08:39', '344nnoge5898c5b9be309'),
('Kom59762d69c28f4', 'Cars', 'Vehicles', '340 000', '', 'Western Cape', 'Kompressor C200 for Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Vehicles car cars vehicle  Kompressor C200 for Sale Cars', 'Kayamandi', 'township', 'None', 'Approved', '', '', '2017-07-24 15:24:57', '2017-07-24 15:24:57', '454dmisc594ac63c39811'),
('RDP597744fa500b8', 'Houses & Flats For Sale', 'Property', '120 000', '', 'Western Cape', 'RDP house for Sale in Kayamandi', '. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'indlu izindlu  RDP house in Kayamandi Property Houses & Flats ', 'Kayamandi', 'township', 'sponsored', 'Approved', '', '', '2017-07-25 11:17:46', '2017-07-25 11:17:46', '344nnoge5898c5b9be309'),
('2-15977943e9d5cf', 'Cars', 'Vehicles', '490 000', '', 'Western Cape', '2014 BMW for Sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'car cars vehicle  2014 BMW for Sale', 'Cape Town', 'suburb', '0', 'Approved', '', '', '2017-07-25 16:55:58', '2017-07-25 16:55:58', '344nnoge5898c5b9be309'),
('Len5977a399498a0', 'Computers,Laptops & Software', 'Electronics', '2500', '', 'Western Cape', 'Lenovo Laptop for Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', ' Computers & Software  Lenovo Laptop Electronics', 'Cape Town', 'suburb', 'None', 'Approved', '', '', '2017-07-25 18:01:29', '2017-07-25 18:01:29', '344nnoge5898c5b9be309'),
('PHP5978d834e408e', 'IT Jobs', 'Jobs', '6000pm', '', 'Western Cape', 'PHP developer needed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' IT Jobs  PHP developer needed Jobs', 'Kuils River', 'suburb', 'None', 'Approved', '', '', '2017-07-26 15:58:12', '2017-07-26 15:58:12', '344nnoge5898c5b9be309'),
('Tel5978e0d421145', 'Telecoms & Computers', 'Services', '120 000', '', 'Western Cape', 'Telecom Services', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Telecoms & Computers  Telecom Services Services', 'Bellville', 'suburb', 'sponsored', 'Approved', '', '', '2017-07-26 16:35:00', '2017-07-26 16:35:00', '344nnoge5898c5b9be309'),
('2005978fda7dab91', 'Classic & Vintage Cars', 'Vehicles', '33 350', '', 'Western Cape', '2001 BMW for sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Classic & Vintage Cars  2001 BMW for sale Vehicles', 'Langa', 'township', 'None', 'Approved', '', '', '2017-07-26 18:37:59', '2017-07-26 18:37:59', '454dmisc594ac63c39811'),
('Bra597907e95853e', 'Building, Home & Removals', 'Services', '2000', '', 'Western Cape', 'Brazilian Hair', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Building, Home & Removals  Brazilian Hair Services', 'Bellville', 'suburb', 'None', 'Approved', '', '', '2017-07-26 19:21:45', '2017-07-26 19:21:45', '454dmisc594ac63c39811'),
('Car597908ee08194', 'Cars', 'Vehicles', '120 000', '', 'Western Cape', 'Car For Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit', ' Vans, Trucks & Plant  Car For Sale Vehicles', 'Bellville', 'suburb', 'None', 'Approved', '', '', '2017-07-26 19:26:06', '2017-07-26 19:26:06', '454dmisc594ac63c39811'),
('Ren59790a3df1464', 'Vacation Rentals', 'Property', '12 000', '', 'Western Cape', 'Rent a house in Century City', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Vacation Rentals  Rent a house in Century City Property', 'Century City', 'suburb', 'sponsored', 'Approved', '', '', '2017-07-26 19:31:41', '2017-07-26 19:31:41', '454dmisc594ac63c39811'),
('Ndi5979a62b93c29', 'Shacks to Rent', 'Shacks', '3500', '', 'Western Cape', 'Ndirentisa ngetyotyombe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Shacks to Rent  Ndirentisa ngetyotyombe Shacks', 'Khayelitsha', 'township', 'sponsored', 'Approved', '', '', '2017-07-27 06:36:59', '2017-07-27 06:36:59', '135ndige594066126fa68'),
('Aud597a1cfa63f5c', 'Cars', 'Vehicles', '345 000', '', 'Western Cape', 'Audi A1 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  Audi A1  Cars', 'Brackenfell', 'township', 'sponsored', 'Approved', '', '', '2017-07-27 15:03:54', '2017-07-27 15:03:54', '135ndige594066126fa68'),
('Pol597ba87e79724', 'Cars', 'Vehicles', '89 000', 'negotiable', 'Western Cape', 'Pollo Vivo For Sale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit .Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  Pollo Vivo For Sale Cars', 'Strand', 'township', 'None', 'Approved', '', '', '2017-07-28 19:11:26', '2017-07-28 19:11:26', '344nnoge5898c5b9be309'),
('Sum597c66cf3c0e9', 'Mobile Phones', 'Electronics', '1200', '', 'Western Cape', 'Sumsung Gallaxy S4 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Mobile Phones  Sumsung Gallaxy S4  Electronics', 'Strand', 'township', 'None', 'Approved', '', '', '2017-07-29 08:43:27', '2017-07-29 08:43:27', '344nnoge5898c5b9be309'),
('Fla597f63dfd7126', 'Flat Share & House Share', 'Property', '8000/pm', '', 'Western Cape', 'Flat to rent in Stellebosch', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Flat Share & House Share  Flat to rent in Stellebosch Property', 'Stellenbosch', 'suburb', 'sponsored', 'Approved', '', '', '2017-07-31 15:07:43', '2017-07-31 15:07:43', '344nnoge5898c5b9be309'),
('Aud597fde930560e', 'Cars', 'Vehicles', '479,000', '', 'Western Cape', 'Audi Q3 1.4T S auto 2017', '\r\nExtras: Floor mats at front and rear, Trailer towing hitch, Auto actuated boot lid, High-gloss package, Rear parking aid, LED rear lights, Cruise control, Driver information system with colour display, Audi sound system, Auto release function', 'Vehicles car cars vehicle  Audi Q3 1.4T S auto 2017 Cars', 'Observatory', 'suburb', 'None', 'Approved', '', '', '2017-07-31 23:51:15', '2017-07-31 23:51:15', '153853418450325'),
('RDP598b74cf2eb1f', 'Houses & Flats For Sale', 'Property', '87 000', '', 'Western Cape', 'RDP house for sale in Kayamandi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'indlu izindlu  RDP house in Kayamandi Property Houses & Flats', 'Kayamandi', 'township', 'None', 'Approved', '', '', '2017-08-09 18:47:11', '2017-08-09 18:47:11', '454dmisc594ac63c39811'),
('201599370c307f96', 'Cars', 'Vehicles', '80 000', '', 'Western Cape', '2013 Kompressor C200', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Vehicles car cars vehicle  2013 Kompressor C200 Cars', 'Kuils River', 'suburb', 'sponsored', 'Approved', '', '', '2017-08-15 20:08:03', '2017-08-15 20:08:03', '344nnoge5898c5b9be309'),
('2015993719661f34', 'Cars', 'Vehicles', '135 000', '', 'Western Cape', '2014 Kompressor C200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Vehicles car cars vehicle  2014 Kompressor C200 Cars', 'Century City', 'suburb', 'sponsored', 'Approved', '', '', '2017-08-15 20:11:34', '2017-08-15 20:11:34', '344nnoge5898c5b9be309'),
('M3C59a3192c18d9b', 'Mobile Phones', 'Electronics', '300', '', 'Western Cape', 'M3CR for sale ', ' Selling my phone for cheap....Specs: Android 6.0, Wii-Fi ...3.5px Cam', ' mobile phones  m3cr   electronics', 'Kayamandi', 'township', 'None', 'Approved', 'none', '00.00', '2017-08-27 17:10:36', '2017-08-27 17:10:36', '344nnoge5898c5b9be309'),
('ASP59a3223c612e2', 'IT Jobs', 'Jobs', '13000/pm', '', 'Western Cape', 'ASP.NET Programmer needed', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' it jobs  asp.net programmer needed jobs', 'Brackenfell', 'township', 'bargain', 'Approved', 'E-Wllet', '45', '2017-08-27 17:49:16', '2017-08-27 17:49:16', '344nnoge5898c5b9be309'),
('Bus59a32580a1adb', 'Mobile Phones', 'Electronics', '700 000', '', 'Western Cape', 'Bus for sale', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' mobile phones  bus  electronics', 'Cape town', 'suburb', 'all plans', 'Approved', 'Capitec Mobile Banking', '129', '2017-08-27 18:03:12', '2017-08-27 18:03:12', '344nnoge5898c5b9be309'),
('Hou59a34e3f93598', 'Houses & Flats For Rent', 'Property', '3500', '', 'Western Cape', 'House to rent in Kuils River', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'house to rent in kuils river property houses & flats for rent', 'Kuils river', 'suburb', 'sponsored', 'approved', 'none', '130', '2017-08-27 20:57:03', '2017-08-27 20:57:03', '454dmisc594ac63c39811'),
('Lap59a4d767e4bb0', 'Computers,Laptops & Software', 'Electronics', '3000', '', 'Western Cape', 'Laptop for sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' computers,laptops & software  laptop  electronics', 'Higgovale', 'suburb', 'bargain', 'pending', 'none', '34', '2017-08-29 00:54:31', '2017-08-29 00:54:31', '344nnoge5898c5b9be309'),
('Lap59a4d78b48b90', 'Computers,Laptops & Software', 'Electronics', '3000', '', 'Western Cape', 'Laptop for sale', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' computers,laptops & software  laptop  electronics', 'Higgovale', 'suburb', 'bargain', 'pending', 'none', '34', '2017-08-29 00:55:07', '2017-08-29 00:55:07', '344nnoge5898c5b9be309'),
('Sha59a5d71a6eab7', 'Backyard Shacks to rent', 'Shacks', '2000pm', '', 'Western Cape', 'Shack to rent in Mbeks', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' backyard shacks to rent  shack to rent in mbeks shacks', 'Mbekweni', 'township', 'none', 'approved', 'none', '0', '2017-08-29 19:05:30', '2017-08-29 19:05:30', '345anage59a5d57c1b98a'),
('Sha59a604f4ebedd', 'Shacks for Sale', 'Shacks', '12 000', '', 'Western Cape', 'Shack for sale', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' shacks   shack  shacks', 'Gugulethu', 'township', 'none', 'approved', 'Capitec Mobile Banking', '0', '2017-08-29 22:21:08', '2017-08-29 22:21:08', '344nnoge5898c5b9be309'),
('zxc59a609082a40f', 'Shacks for Sale', 'Shacks', '234 ', '', 'Western Cape', 'zxc', ' xzcxz', ' shacks   zxc shacks', 'Brackenfell', 'suburb', 'none', 'approved', 'none', '0', '2017-08-29 22:38:32', '2017-08-29 22:38:32', '344nnoge5898c5b9be309'),
('zxc59a60a25dc4a0', 'Shacks for Sale', 'Shacks', '234 ', '', 'Western Cape', 'zxc', ' xzcxz', ' shacks   zxc shacks', 'Hout bay', 'township', 'all-plans', 'pending', 'none', '224', '2017-08-29 22:43:17', '2017-08-29 22:43:17', '344nnoge5898c5b9be309'),
('nnb59a60a778ba68', 'Music & Instruments', 'Electronics', '434', '', 'Western Cape', 'nnb', ' nmnm', ' music & instruments  nnb electronics', 'Brooklyn', 'suburb', 'all-plans', 'pending', 'none', '224', '2017-08-29 22:44:39', '2017-08-29 22:44:39', '344nnoge5898c5b9be309'),
('sdf59a611a0613c8', 'TV, DVD & Cameras', 'Electronics', '120 000', '', 'Western Cape', 'sdfdsf', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' tv, dvd & cameras  sdfdsf electronics', 'Century city', 'suburb', 'all-plans', 'pending', 'none', '129', '2017-08-29 23:15:12', '2017-08-29 23:15:12', '344nnoge5898c5b9be309'),
('sds59a612542204b', 'Mobile Phones', 'Electronics', '3232', '', 'Western Cape', 'sdsds', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' mobile phones  sdsds electronics', 'Brackenfell', 'suburb', 'all-plans', 'pending', 'none', '34', '2017-08-29 23:18:12', '2017-08-29 23:18:12', '344nnoge5898c5b9be309'),
('sds59a612849eaa8', 'Mobile Phones', 'Electronics', '3232', '', 'Western Cape', 'sdsds', '  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' mobile phones  sdsds electronics', 'Brackenfell', 'suburb', 'bargain', 'pending', 'none', '34', '2017-08-29 23:19:00', '2017-08-29 23:19:00', '344nnoge5898c5b9be309');

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
(354, 'Ivory Park', '', '2017-02-07 23:42:30', '2017-02-07 23:42:30'),
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
(417, 'Nkanini', 'Western Cape', '2017-06-20 20:19:49', '2017-06-20 20:19:49');

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
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `Payment Method` varchar(200) NOT NULL,
  `Fee` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(200) NOT NULL,
  `ad_id` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL
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
-- Table structure for table `sponsoredads_extender`
--

CREATE TABLE `sponsoredads_extender` (
  `adid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsoredads_extender`
--

INSERT INTO `sponsoredads_extender` (`adid`, `title`, `price`, `image`) VALUES
(1, 'have your ad seen here for', '95', 'images/no_image.jpg');

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
(7, 'Building, Home & Removals', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Entertainment', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Telecoms & Computers', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Travel Services & Tours', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Horses & Ponies', 24, NULL, '2017-07-07 17:20:09', '2017-07-07 17:20:09'),
(25, 'Land', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Shacks for Sale', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Shacks to Rent', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Houses & Flats For Sale', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Houses & Flats For Rent', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Vacation Rentals', 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Full Time Jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Part Time Jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Learn & Earn jobs', 5, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'CDs, DVDs, Games & Books', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Computers,Laptops & Software', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Music & Instruments', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Mobile Phones', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'TV, DVD & Cameras', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Video Games & Consoles', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Stuff Wanted', 6, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Cats & Kittens', 24, NULL, '2017-07-07 17:19:15', '2017-07-07 17:19:15'),
(39, 'Announcements', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Charity - Donate - NGO', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Lost - Found', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Tender Notices', 7, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Garden & Braai', 25, NULL, '2017-07-07 17:34:02', '2017-07-07 17:34:02'),
(110, 'Furniture', 25, NULL, '2017-07-07 17:33:22', '2017-07-07 17:33:22'),
(121, 'Childcare &  Babysitting jobs', 5, NULL, '2017-07-24 14:32:12', '2017-07-24 14:32:12'),
(120, 'Banking jobs', 5, NULL, '2017-07-24 14:31:29', '2017-07-24 14:31:29'),
(119, 'Accounting & Finance jobs', 5, NULL, '2017-07-24 14:30:28', '2017-07-24 14:30:28'),
(54, 'Clothing', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Jewellery & Watches', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Accessories', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Shoes', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Hair Extensions', 18, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Dogs & Puppies', 24, NULL, '2017-07-07 17:18:48', '2017-07-07 17:18:48'),
(60, 'Health & Beauty services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Event Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Computer & IT Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Cleaning Services', 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Tuition & Lessons', 2, NULL, '2017-07-05 15:59:07', '2017-07-05 15:59:07'),
(73, 'Commercial Building', 4, NULL, '2017-07-05 16:01:43', '2017-07-05 16:01:43'),
(74, 'Vacation Rentals', 4, NULL, '2017-07-05 16:02:14', '2017-07-05 16:02:14'),
(78, 'Classic & Vintage Cars', 1, NULL, '2017-07-07 16:04:16', '2017-07-07 16:04:16'),
(76, 'Apartments for Sale', 4, NULL, '2017-07-05 16:08:45', '2017-07-05 16:08:45'),
(77, 'Apartments for Rent', 4, NULL, '2017-07-05 16:09:07', '2017-07-05 16:09:07'),
(79, 'Farm Vehicles & Equipment', 1, NULL, '2017-07-07 16:04:44', '2017-07-07 16:04:44'),
(80, 'Flat Share & House Share', 4, NULL, '2017-07-07 16:30:08', '2017-07-07 16:30:08'),
(81, 'Car Parks & Storage', 4, NULL, '2017-07-07 16:31:32', '2017-07-07 16:31:32'),
(82, 'Appliance Repairs', 2, NULL, '2017-07-07 16:34:11', '2017-07-07 16:34:11'),
(83, 'Automotive Services', 2, NULL, '2017-07-07 16:34:53', '2017-07-07 16:34:53'),
(84, 'Child Care', 2, NULL, '2017-07-07 16:36:43', '2017-07-07 16:36:43'),
(85, 'Landscaping & Gardening Services', 2, NULL, '2017-07-07 16:38:14', '2017-07-07 16:38:14'),
(86, 'Legal Services', 2, NULL, '2017-07-07 16:38:53', '2017-07-07 16:38:53'),
(87, 'Manufacturing', 2, NULL, '2017-07-07 16:39:20', '2017-07-07 16:39:20'),
(88, 'Party & Catering', 2, NULL, '2017-07-07 16:39:56', '2017-07-07 16:39:56'),
(89, 'Photography & Video Services', 2, NULL, '2017-07-07 16:40:34', '2017-07-07 16:40:34'),
(90, 'Real Estate Services', 2, NULL, '2017-07-07 16:42:57', '2017-07-07 16:42:57'),
(91, 'Recruitment Services', 2, NULL, '2017-07-07 16:43:21', '2017-07-07 16:43:21'),
(92, 'Removals & Storage', 2, NULL, '2017-07-07 16:43:57', '2017-07-07 16:43:57'),
(93, 'Sports & Fitness Training', 2, NULL, '2017-07-07 16:44:25', '2017-07-07 16:44:25'),
(95, 'Tax & Financial Services', 2, NULL, '2017-07-07 16:45:40', '2017-07-07 16:45:40'),
(96, 'Travel Agents & Tours', 2, NULL, '2017-07-07 16:46:12', '2017-07-07 16:46:12'),
(97, 'Wedding Venues & Wedding Services', 2, NULL, '2017-07-07 16:48:49', '2017-07-07 16:48:49'),
(98, 'Activities & Hobbies', 7, NULL, '2017-07-07 16:52:30', '2017-07-07 16:52:30'),
(99, 'Musicians & Artists', 7, NULL, '2017-07-07 16:53:12', '2017-07-07 16:53:12'),
(100, 'Carpool & Rideshare', 7, NULL, '2017-07-07 16:53:44', '2017-07-07 16:53:44'),
(103, 'Birds', 24, NULL, '2017-07-07 17:18:20', '2017-07-07 17:18:20'),
(107, 'Livestock', 24, NULL, '2017-07-07 17:21:22', '2017-07-07 17:21:22'),
(108, 'Reptiles', 24, NULL, '2017-07-07 17:21:44', '2017-07-07 17:21:44'),
(109, 'Pet Accessories', 24, NULL, '2017-07-07 17:22:25', '2017-07-07 17:22:25'),
(112, 'Home decor & interiors', 25, NULL, '2017-07-07 17:35:17', '2017-07-07 17:35:17'),
(113, 'Children\'s Clothing', 26, NULL, '2017-07-07 17:43:18', '2017-07-07 17:43:18'),
(114, 'Children\'s Furniture', 26, NULL, '2017-07-07 17:43:46', '2017-07-07 17:43:46'),
(115, 'Prams & Strollers', 26, NULL, '2017-07-07 17:44:05', '2017-07-07 17:44:05'),
(116, 'Nursery', 26, NULL, '2017-07-07 17:44:50', '2017-07-07 17:44:50'),
(117, 'Toys', 26, NULL, '2017-07-07 17:45:31', '2017-07-07 17:45:31'),
(118, 'Maternity & Pregnancy', 26, NULL, '2017-07-07 17:47:11', '2017-07-07 17:47:11'),
(122, 'Engineering  &  Architecture jobs', 1, NULL, '2017-07-24 14:33:47', '2017-07-24 14:33:47'),
(123, 'Human Resources jobs', 5, NULL, '2017-07-24 14:34:34', '2017-07-24 14:34:34'),
(124, 'Internships', 5, NULL, '2017-07-24 14:34:58', '2017-07-24 14:34:58'),
(125, 'Logistics jobs', 5, NULL, '2017-07-24 14:35:34', '2017-07-24 14:35:34'),
(126, 'Retail jobs', 5, NULL, '2017-07-24 14:38:33', '2017-07-24 14:38:33'),
(127, 'IT Jobs', 5, NULL, '2017-07-24 14:39:18', '2017-07-24 14:39:18'),
(128, 'General jobs', 5, NULL, '2017-07-24 14:40:05', '2017-07-24 14:40:05'),
(129, 'Aggriculture jobs', 5, NULL, '2017-07-24 14:45:09', '2017-07-24 14:45:09'),
(130, 'Nursing jobs', 5, NULL, '2017-07-24 14:45:41', '2017-07-24 14:45:41'),
(131, 'Photography jobs', 5, NULL, '2017-07-24 14:48:23', '2017-07-24 14:48:23'),
(132, 'Backyard Shacks to rent', 3, NULL, '2017-08-25 21:26:37', '2017-08-25 21:26:37'),
(133, 'Shack Material', 3, NULL, '2017-08-25 21:26:59', '2017-08-25 21:26:59');

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
(77, 'Northern Suburbs', 'Strand', 'Western Cape', '2017-07-24 16:00:17', '2017-07-24 16:00:17'),
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
('153853418450325', 'innothetechgeek@gmail.com', '$2y$10$eRGbkWrPSlb/BLV9EEuFn.g3yE1hcWEmimmA3dYVFf4R6OPzVpXke', '', 'Lary Chalie', NULL, 'https://graph.facebook.com/v2.8/153853418450325/picture?type=normal', NULL, 'https://www.facebook.com/app_scoped_user_id/153853418450325/', '7NAkNoDY5QFrbGQtN7QFGlhg9C6JqnBqY7ZSX1kF6NniYjmmMu1go2c4CdM7', '2017-02-14 22:56:14', '2017-02-14 22:56:14', '0844334545', 0),
('344nnoge5898c5b9be309', 'innosela@gmail.com', '$2y$10$sLaP/2gUlijcF4LIApIs6O.cWX1.N9jt/7pPiBV6mskb5rtXVlUSO', '', 'Khusela Mphokeli', 'I\'m a tech geek', NULL, NULL, NULL, 'EJFOpVk6YZejsBaLxQAgHpHrnLlpbyWxOT3weh4Y39KdVGh2xLxjzN0z01CZ', '2017-02-06 16:51:37', '2017-02-06 16:51:37', '0833444334', 0),
('135ndige594066126fa68', 'andiswa@gmail.com', '$2y$10$boeIRXizQg4R8xQNx0Hrj.P1NQ2bIGOwgB6l0kpY9dCP8HeMcBg6u', '', 'Andiswa Andy', 'Abouandy andyt\r\n                                                 ', NULL, NULL, NULL, 'LRHMkfm1ejecz64TvNOMAEAjUbcb9azAeKVnpQJV6wXPNSZQuYNOY9odqhbr', '2017-06-13 20:24:18', '2017-06-13 20:24:18', '0731358246', 0),
('454dmisc594ac63c39811', 'ksclr-admin@gmail.com', '$2y$10$.owDgZlj.kgxjEK9h8o4t.sGKYi7zARkdbRezULPT4uTCunQdXeka', '2e7ba6e83f283d32865f1f4589b2ee07', 'Admin', 'Adminstrator', NULL, NULL, NULL, 'hPWcCF0EOl2sqkAfWMePyVQGDpfLfieJNUHeupJC77mFPSnRkJvM55NBkcPZ', '2017-06-21 17:17:16', '2017-06-21 17:17:16', '0834545643', 1),
(' 45ummge596cb6d2130b0', 'dummyuser@gmail.com', '$2y$10$d2e0MYhmjeYjCmeNyCRp6uc1gdF0XLctLdnKkC/1b3foDiDMCSiqy', NULL, 'Dummy User', 'Nam sit amet dui vel orci venenatis ullamcorper eget in lacus. Praesent tristique elit pharetra magna efficitur laoreet', NULL, NULL, NULL, 'd7y4aWU2Tq8uR7EcPvmz7cDeOHutT1nWgZdOhhtjuVgxbDUpAtJ4TLtCxkf0', '2017-07-17 11:08:34', '2017-07-17 11:08:34', '083 4545458', 0),
('345anage59a5d57c1b98a', 'manathi@gmail.com', '$2y$10$j1bR5vR.U6e0VUwvWeKTb.fyVdazIvGXV24IxDdy3EtQ20h137hGO', NULL, 'Manathi Manathi', 'I am Manathi Manathi....the coolest dude alive', NULL, NULL, NULL, 'xsZNcWUFXpD7SCJMDreATXDYK5HU3mT24C1UQ01oz74manQuIISZuL2CzQpK', '2017-08-29 18:58:36', '2017-08-29 18:58:36', '0833456678', 0),
('59a5df0fb23c6', '', '$2y$10$hYnGl3PekKCrEsx5RjBReeLnepjc0UO24MqUOOtYgUjs36Up3UEky', NULL, '', 'About\r\n                                                    Yourself', NULL, NULL, NULL, NULL, '2017-08-29 19:39:27', '2017-08-29 19:39:27', '', 0);

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
-- Indexes for table `sponsoredads_extender`
--
ALTER TABLE `sponsoredads_extender`
  ADD PRIMARY KEY (`adid`);

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
  MODIFY `catid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `fav_ads`
--
ALTER TABLE `fav_ads`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6882;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;
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
-- AUTO_INCREMENT for table `sponsoredads_extender`
--
ALTER TABLE `sponsoredads_extender`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `surbubs`
--
ALTER TABLE `surbubs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
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
