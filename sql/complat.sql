-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2016 at 12:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complat`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `course_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_detailed` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_main_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_course`, `course_name`, `description`, `description_detailed`, `type`, `course_path`, `image_path`, `image_main_path`) VALUES
(1, 'Diseño de algoritmos', 'Curso básico de diseño de algoritmos', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'PROGRAMACION', '?view=algorithms', 'courses_assets/algorithms/img/div_img_course.png', 'courses_assets/algorithms/img/main-img-course.png'),
(4, 'Programación en C++', 'Curso básico de programación en C++', '', 'PROGRAMACION', '#', 'courses_assets/c++/img/div_img_course.png', ''),
(5, 'Prueba', 'Prueba', '', 'PROGRAMACION', '#', 'courses_assets/c++/img/div_img_course.png', ''),
(6, 'Prueba 2', 'Curso de prueba', '', 'PROGRAMACION', '#', 'courses_assets/algorithms/img/div_img_course.png', ''),
(7, 'Prueba 2', 'Curso de prueba', '', 'PROGRAMACION', '#', 'courses_assets/algorithms/img/div_img_course.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_index`
--

CREATE TABLE `course_index` (
  `id_course_index` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subitem` tinyint(4) NOT NULL DEFAULT '1',
  `link_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_index`
--

INSERT INTO `course_index` (`id_course_index`, `id_course`, `title`, `subitem`, `link_title`, `link_video`, `topic_number`) VALUES
(1, 1, '1. Introducción al curso', 0, '#', '#', 1),
(2, 1, '1.1. ¿Qué es un algoritmo?', 1, '#', '#', 2),
(3, 1, '1.2. Importancia de los algoritmos', 1, '#', '#', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rel_advance`
--

CREATE TABLE `rel_advance` (
  `id_rel_advance` bigint(255) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `seen` tinyint(4) NOT NULL DEFAULT '0',
  `topic_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rel_advance`
--

INSERT INTO `rel_advance` (`id_rel_advance`, `id_course`, `id_user`, `seen`, `topic_number`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 1, 0, 2),
(3, 1, 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rel_user_course_score`
--

CREATE TABLE `rel_user_course_score` (
  `id_ucs` bigint(255) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rel_user_course_score`
--

INSERT INTO `rel_user_course_score` (`id_ucs`, `id_user`, `id_course`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(255) NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permiso` int(1) NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `email`, `permiso`, `activo`, `keyreg`, `keypass`, `new_pass`) VALUES
(1, 'CarlosCarmona', '47b4d0c9445131dec646a489805f0f52', 'cm.carmona18@outlook.com', 0, 1, '', '', ''),
(2, 'Arael', '7a485f422b71e766b52f7029551af944', 'arael19@hotmail.com', 0, 0, '99485e506d4dd389c61c6220b0075016', '', ''),
(3, 'scrollmck', '1e695c40859c9bf8e0e87c6f18465dd7', 'alejandro_bustillos@ingenieros.com', 0, 1, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `course_index`
--
ALTER TABLE `course_index`
  ADD PRIMARY KEY (`id_course_index`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `rel_advance`
--
ALTER TABLE `rel_advance`
  ADD PRIMARY KEY (`id_rel_advance`),
  ADD KEY `id_course` (`id_course`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rel_user_course_score`
--
ALTER TABLE `rel_user_course_score`
  ADD PRIMARY KEY (`id_ucs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `course_index`
--
ALTER TABLE `course_index`
  MODIFY `id_course_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rel_advance`
--
ALTER TABLE `rel_advance`
  MODIFY `id_rel_advance` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rel_user_course_score`
--
ALTER TABLE `rel_user_course_score`
  MODIFY `id_ucs` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_index`
--
ALTER TABLE `course_index`
  ADD CONSTRAINT `course_index_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Constraints for table `rel_advance`
--
ALTER TABLE `rel_advance`
  ADD CONSTRAINT `rel_advance_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`),
  ADD CONSTRAINT `rel_advance_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `rel_user_course_score`
--
ALTER TABLE `rel_user_course_score`
  ADD CONSTRAINT `rel_user_course_score_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `rel_user_course_score_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
