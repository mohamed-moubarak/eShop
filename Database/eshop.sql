-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2015 at 01:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `user` varchar(40) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `user` (`user`),
  KEY `product` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user`, `product`, `quantity`, `date`) VALUES
('mohamed.hisham00@gaksjhd.com', 1, 1, '2015-10-08 06:10:19'),
('mohamed.hisham00@gaksjhd.com', 4, 1, '2015-10-08 06:10:19'),
('mhmm@example.com', 1, 1, '2015-10-08 06:11:02'),
('mhmm@example.com', 1, 1, '2015-10-08 07:06:08'),
('m@m.com', 1, -9, '2015-10-08 08:21:32'),
('m@m.com', 5, 3, '2015-10-08 08:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PID` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY (`PID`),
  UNIQUE KEY `PID_2` (`PID`),
  KEY `PID` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `name`, `price`, `category`, `stock`, `picture_url`) VALUES
(1, 'Suit', 1000, 'men', 69, 'http://www.elitesuits.com/images/Suit-33_03.jpg'),
(2, 'T-shirt', 100, 'men', 0, 'http://www.sunspel.com/media/catalog/product/cache/3/image/9df78eab33525d08d6e5fb8d27136e95/4/0/4001_102_5.jpg'),
(3, 'i-Pad', 5000, 'electronics', 5, 'http://images.dailytech.com/nimage/iPad_mini_PF_PB_PS_Wht_iOS6_PRINT.jpg'),
(4, 'Shirt', 150, 'men', 5, 'http://www.afgiftspoint.com/wp-content/uploads/2015/04/pepe-teal-plain-men-shirt.jpg'),
(5, 'i-phone', 5000, 'electronics', 0, 'http://www2.pcmag.com/media/images/302835-apple-iphone-5-sprint.jpg'),
(6, 'Scarf', 90, 'women', 50, '../images/photo-1428930377079-45a584b6dd6b (2).jpg'),
(7, 'Yellow Chair', 700, 'furniture', 40, '../images/photo-1432249339392-2f754cb22105.jpg'),
(8, 'Modern Bed', 2000, 'furniture', 5, '../images/photo-1429117237875-aa29229d99f0 (2).jpg'),
(9, 'Table', 1000, 'furniture', 10, '../images/photo-1422479516648-9b1f0b6e8da8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` int(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`, `phone_number`, `address`, `avatar`) VALUES
('Mohamed', 'Moubarak', 'abc@example.com', 'Mhm12345678', 1116091487, 'abcdefghijkla', 'abcdefghijkla'),
('Mohamed', 'Moubarak', 'abcd@example.com', 'Mhmm4241234', 1234567890, 'asbsdfhgksdfghjg', 'asbsdfhgksdfghjg'),
('m', 'm', 'm@m.com', 'Mu0767hgfh', 786786786, 'jyjyhgjhg', 'jdsfdsdhj'),
('Mohamed', 'Moubarak', 'mhmm@example.com', 'Met012345678', 1116091487, 'mddddddd', 'ddhdhdhdhdhd'),
('Mohamed', 'Moubarak', 'mohamed.hisham00@gaksjhd.com', 'Met12345678', 1234567890, 'mddjdjdjdjdjdjdjdjdjdj', 'mddjdjdjdjdjdjdjdjdjdj'),
('msadfmsdF', 'sadfasdgsad', 'mohamed.moubarak@abcdmail.com', 'Mm12345678', 2147483647, 'asfsadfsafdsa', 'asfdsadfsafd'),
('abcde', 'fghi', 'mohamed.moubarak@abcmail.com', 'Mm12345678', 12323434, 'asdfasdfsafsda', 'asdfsadfaf'),
('abcde', 'fghi', 'mohamed.moubarak@exmail.com', 'Mm12345678', 12323434, 'asdfasdfsafsda', 'asdfsadfaf'),
('abcde', 'fghi', 'mohamed.moubarak@famail.com', 'Mm12345678', 12323434, 'asdfasdfsafsda', 'asdfsadfaf'),
('asdcbasdmanf', 'msdgsdfgsdf', 'mohamed.moubarak@gmail.com', 'Mm12345678', 2147483647, 'asdfasdfsafsda', 'asdfsadfaf'),
('Mohamed', 'Moubarak', 'mohamed.moubarak@hotmail.com', 'Met12345678', 1116091487, 'szdfsafsdfsadf', 'sdgsadfg'),
('Mohamed', 'Mudda', 'mohamed.mudda@example.com', 'Mhm12345678', 1116091487, 'msdfnhjsbakdfjhsbavdfasdfssadf', 'sdagsdafgasdgfsadf');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`PID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
