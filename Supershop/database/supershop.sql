-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 01:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pname` varchar(30) NOT NULL,
  `catagory` varchar(30) NOT NULL,
  `mdate` date NOT NULL,
  `edate` date NOT NULL,
  `bprice` double NOT NULL,
  `sprice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `unumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pname`, `catagory`, `mdate`, `edate`, `bprice`, `sprice`, `quantity`, `unumber`) VALUES
('Alu', 'Kachabazar', '2017-01-01', '2018-01-01', 6.12, 26, 146, 1),
('Rice', 'Grocery', '2017-01-01', '2018-01-01', 50, 70, 2975, 2),
('Sunsilk', 'shampoo', '2016-11-26', '2018-10-31', 50, 150, 3, 101),
('Dove', 'soap', '2016-10-12', '2018-11-07', 60, 80, 7, 201),
('Lux', 'soap', '2016-12-07', '2018-02-01', 20, 30, 12, 202),
('Cocola noodles', 'noodles', '2017-01-01', '2018-01-01', 15, 20, 12, 301),
('Magi noodles', 'noodles', '2017-10-04', '2018-12-01', 15, 20, 22, 302),
('energy plus', 'biscuit', '2017-07-12', '2017-12-02', 8, 12, 6, 401),
('Mr cookie', 'biscuit', '2017-07-06', '2018-01-04', 12, 15, 8, 402),
('head and shoulder', 'shampoo', '2017-08-31', '2018-09-08', 120, 180, 9, 102),
('ruchi chanachur', 'chanachur', '2017-11-07', '2017-12-02', 30, 35, 5, 501),
('Mr twist', 'chips', '2017-10-30', '2017-12-02', 10, 15, 23, 601),
('Sun', 'chips', '2017-10-29', '2017-12-16', 12, 15, 10, 602),
('igloo', 'icecream', '2017-08-09', '2017-12-02', 70, 100, 10, 701),
('Kitkat', 'chocolate', '2017-06-29', '2017-11-25', 30, 50, 15, 901),
('Dairy milk', 'chocolate', '2017-05-03', '2018-01-05', 120, 150, 12, 902),
('Meril', 'soap', '2017-11-01', '2018-05-05', 18, 25, 12, 203),
('Teer', 'oil', '2017-10-31', '2017-12-08', 150, 180, 20, 1002),
('Ifad', 'Flour', '2017-07-06', '2018-01-06', 100, 120, 5, 112);

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `unumber` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bprice` double NOT NULL,
  `sprice` double NOT NULL,
  `profit` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `soldby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`unumber`, `quantity`, `bprice`, `sprice`, `profit`, `date`, `soldby`) VALUES
(1, 2, 6.12, 26, 39.76, '2017-11-06 18:32:39', 'Admin'),
(1, 8, 6.12, 26, 159.04, '2017-11-06 19:26:30', 'Admin'),
(101, 2, 50, 150, 200, '2017-11-06 19:33:17', 'Admin'),
(1, 1, 6.12, 26, 19.88, '2017-11-24 12:11:23', 'Admin'),
(1, 1, 6.12, 26, 19.88, '2017-11-24 12:14:12', 'Admin'),
(1, 1, 6.12, 26, 19.88, '2017-11-24 12:16:38', 'swap@gmail.com'),
(2, 25, 50, 70, 500, '2017-11-24 13:10:12', 'swap@gmail.com'),
(1, 2, 6.12, 0, -12.24, '2017-12-02 12:20:12', 'swap@gmail.com'),
(1, 2, 6.12, 0, -12.24, '2017-12-02 12:20:24', 'swap@gmail.com'),
(1, 2, 6.12, 26, 39.76, '2017-12-02 12:22:06', 'swap@gmail.com'),
(1, 2, 6.12, 26, 39.76, '2017-12-02 12:22:20', 'swap@gmail.com'),
(1, 23, 6.12, 26, 457.24, '2017-12-02 12:29:55', 'swap@gmail.com'),
(1, 10, 6.12, 26, 198.8, '2017-12-02 12:32:15', 'swap@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fname`, `lname`, `email`, `pass`, `mobile`, `gender`, `address`, `bd`) VALUES
('Swapnil', 'Saha', 'swap@gmail.com', 'Swapnilsaha123', '0145641312123', 'male', 'gulshan mart, Dhaka', '1990-01-01'),
('Fahim', 'Saha', 'fahimshahrier2@gmail.com', '01GGgdhcbdncbcbm', '015521245452', 'male', 'Ja 1377A Middle Badda, Dhaka', '1988-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` varchar(52) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
