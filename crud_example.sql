-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2019 at 06:34 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.19

SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
    AUTOCOMMIT = 0;
START TRANSACTION;
SET
    time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_example`
--

--

CREATE TABLE `tbl_student`
(
    `id`          int(11)      NOT NULL,
    `name`        varchar(55)  NOT NULL,
    `roll_number` varchar(11)  NOT NULL,
    `email`       varchar(100) NOT NULL,
    `class`       varchar(55)  NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;


-- --------------------------------------------------------

--

CREATE TABLE `users`
(
    `id`       int(11)      NOT NULL,
    `name`     varchar(55)  NOT NULL,
    `email`    varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL


) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
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
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;


--
-- AUTO_INCREMENT for table `users`
--

ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;



/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
