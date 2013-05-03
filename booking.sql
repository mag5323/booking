-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2013 年 05 月 03 日 05:16
-- 伺服器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `booking`
--
CREATE DATABASE `booking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booking`;

-- --------------------------------------------------------

--
-- 表的結構 `inorder`
--

CREATE TABLE IF NOT EXISTS `inorder` (
  `IID` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(10) NOT NULL,
  `OID` int(11) NOT NULL,
  `number` int(3) NOT NULL,
  PRIMARY KEY (`IID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- 表的結構 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OID` int(11) NOT NULL AUTO_INCREMENT,
  `begin` varchar(10) NOT NULL,
  `end` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `account` varchar(10) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `isbn` varchar(10) NOT NULL,
  PRIMARY KEY (`OID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- 表的結構 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `account` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
