-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 05:59 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `upload_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `original_file_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `encoded_file_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `file_size` int(11) NOT NULL,
  `crypt` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `upload_time`, `original_file_name`, `encoded_file_name`, `file_size`, `crypt`) VALUES
(4, '2017-07-24 20:06:46', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(5, '2017-07-24 20:08:22', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(6, '2017-07-24 20:14:44', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(7, '2017-07-24 20:15:16', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(8, '2017-07-24 20:15:54', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(9, '2017-07-24 20:18:34', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(10, '2017-07-24 20:21:28', 'milk-carton-thumbnail.jpg', '86f0f6e907be5a805d916376d473e2bd.jpg', 40444, ''),
(11, '2017-07-24 20:29:17', 'Sokoladas_Karuna_52403.jpg', 'd0a33fb2184971b1d8ab4aa2e7b632af.jpg', 6897, ''),
(12, '2017-07-24 20:37:25', 'Sokoladas_Karuna_52403.jpg', 'd0a33fb2184971b1d8ab4aa2e7b632af.jpg', 6897, ''),
(13, '2017-07-24 20:37:37', 'Sokoladas_Karuna_52403.jpg', 'd0a33fb2184971b1d8ab4aa2e7b632af.jpg', 6897, ''),
(14, '2017-07-24 20:52:05', 'skhfkisgf_akhf_31941.jpg', '4f35632abe496e8135252cd94ec04066.jpg', 8349, 'b6a78f23247aba746c58eeab92a66a03'),
(15, '2017-07-24 20:55:43', 'Preke_brand_24069.png', '836f23b2f1909039b7448aa97c418376.png', 245979, 'a8d39f1654fe62ebf54067291eb31f3b'),
(16, '2017-07-24 21:03:02', 'Sokoladas_Karuna_52403.jpg', 'd0a33fb2184971b1d8ab4aa2e7b632af.jpg', 6897, '00dc5b1da974ec03c9d6ae6a77a74081'),
(17, '2017-07-24 21:08:33', 'Sausainis_Gaidelis_12909.jpg', '897f9d61d873d645f658f18de282e133.jpg', 40444, '3eedbe2dc031b0fafabd33837354b004'),
(18, '2017-07-26 20:18:17', 'skhfkisgf_akhf_31941.jpg', '4f35632abe496e8135252cd94ec04066.jpg', 8349, 'f46c5aeaddb1c07ce996d640cbbca8c3'),
(19, '2017-07-26 20:37:17', 'skhfkisgf_akhf_31941.jpg', '4f35632abe496e8135252cd94ec04066.jpg', 8349, '6849dbd9a16d3009f748cbf92d48de7a'),
(20, '2017-07-26 20:54:14', 'suris_rokisko_33938.jpg', '5dd46406b910d79278f03c02dccfaee7.jpg', 8349, '60bb2f70dc87e689210a2d40b888448d'),
(21, '2017-07-26 20:57:18', 'suris_rokisko_33938.jpg', '5dd46406b910d79278f03c02dccfaee7.jpg', 8349, 'f59ecaed832b33e68f08534e0f55a9a2'),
(22, '2017-07-26 20:57:30', 'suris_rokisko_33938.jpg', '5dd46406b910d79278f03c02dccfaee7.jpg', 8349, '7de10c3a51c064cb6e5f2fba6a1098b7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
