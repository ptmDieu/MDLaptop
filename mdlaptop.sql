-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2023 at 03:15 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mdlaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompID` tinyint(11) NOT NULL auto_increment,
  `CompName` varchar(50) NOT NULL,
  `CompAddress` varchar(50) NOT NULL,
  `CompPhone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY  (`CompID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompID`, `CompName`, `CompAddress`, `CompPhone`, `Email`) VALUES
(1, 'Laptop Dell', '755 Quang Trung, Gò Vấp, Hồ Chí Minh', '024 9428 633', 'dell@gmail.com'),
(2, 'Laptop HP', '948 Lê Đức Thọ, Gò Vấp, Hồ Chí Minh', '096 4484 633', 'hp@gmail.com'),
(3, 'Laptop Lenovo', '62 Nguyễn Thị Minh Khai, Quận 1, Hồ Chí Minh', '083 8256 80', 'lenovo@gmail.com'),
(4, 'Laptop Apple', '161B Võ Thị Sáu, Quận 3, Hồ Chí Minh', '028 3931 289', 'apple@gmail.com'),
(5, 'Laptop Asus', 'Số 9 Huỳnh Thúc Kháng, Hồ Chí Minh ', '024 3776 580', 'asus@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProdID` tinyint(11) NOT NULL auto_increment,
  `ProdName` varchar(50) NOT NULL,
  `ProdPrice` varchar(50) NOT NULL,
  `ProdImage` varchar(50) NOT NULL,
  `ProdDescription` varchar(50) NOT NULL,
  `CompID` tinyint(11) NOT NULL,
  PRIMARY KEY  (`ProdID`),
  KEY `CompID` (`CompID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProdID`, `ProdName`, `ProdPrice`, `ProdImage`, `ProdDescription`, `CompID`) VALUES
(1, 'DELL xps 13 i5 2023', '24.000.000', 'DELL_xps_13.jpg', '', 1),
(2, 'DELL LATITUDE 541 0', '51.000.000', 'DELL-LATITUDE-541-0.jpg', '', 1),
(3, 'DELL LATITUDE 7410', '4.000.000', 'DELL-LATITUDE-7410-0.jpg', '', 1),
(4, 'DELL PRECISION 7670', '34.000.000', 'DELL-PRECISION-7670-0.jpg', '', 1),
(5, 'DELL XPS 17 i7 2020', '19.000.000', 'dell-xps-0.jpg', '', 1),
(6, 'HP 840 G8 i7 2021', '17.000.000', 'HP-840-G8-0.jpg', '', 2),
(7, 'HP Elitebook 8570w', '21.000.000', 'HP-Elitebook-8570w.jpg', '', 2),
(8, 'HP Probook 470G4', '29.200.000', 'hp-probook-470G4.jpg', '', 2),
(9, 'HP zbook 15 g1 i7', '24.900.000', 'HP-zbook-15g1.jpg', '', 2),
(10, 'HP ZBook 17-G5-1', '14.700.000', 'HP-ZBook-17-G5-1.jpg', '', 2),
(11, 'Ideapad-5-new-1-220', '5.900.000', 'lenovo-ideapad-5-new-1-220-min.jpg', '', 3),
(12, 'Ideapad-Slim-3-14IGL', '10.600.000', 'Lenovo-Ideapad-Slim-3-14IGL05-5.jpg', '', 3),
(13, 'LENOVO-T14-0', '16.009.000', 'LENOVO-T14-0.jpg', '', 3),
(14, 'LENOVO-T15-0', '5.500.000', 'LENOVO-T15-0.jpg', '', 3),
(15, 'LENOVO-X1-GEN7-0-min', '5.100.000', 'LENOVO-X1-GEN7-0-min.jpg', '', 3),
(16, 'Apple Macbook air 15', '31.200.000', 'applemacbook-air-13-inch-2020.jpg', '', 4),
(17, 'Apple Macbook air 13', '28.900.000', 'apple-macbook-air-13-inch-2020.jpg', '', 4),
(18, 'Apple MacBook Air M1', '37.000.000', 'AppleMacBookAirM1-org.jpg', '', 4),
(19, 'Apple Mb Pro Mjlt2', '48.400.000', 'apple-mb-pro-mjlt2.jpg', '', 4),
(20, 'App Macbook Air 2018', '35.000.000', 'App-macbook-air-2018-gray.jpg', '', 4),
(21, 'Asus Rog Strix Scar 17', '12.900.000', 'asus_rog_strix_scar_17.jpg', '', 5),
(22, 'Asus GL552V 2022', '13.900.000', 'Asus-GL552V.jpg', '', 5),
(23, 'ASUS RTX4080 1', '15.900.000', 'ASUS-RTX4080-1.jpg', '', 5),
(24, 'Asus Vivobook 14', '59000', 'asus-vivobook-14.jpg', '', 5),
(25, 'Asus Zenbook 14', '18.500.000', 'asus-zenbook-14.jpg', '', 5),
(33, 'san pham insert', '25846', 'aaaa.jpg', '', 3);
