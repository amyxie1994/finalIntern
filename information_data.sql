-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 08:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `information_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitor_analysis`
--

CREATE TABLE `competitor_analysis` (
  `Id` int(11) NOT NULL,
  `BrandName` varchar(200) NOT NULL,
  `BSR` varchar(10) NOT NULL,
  `Sales` varchar(20) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Size` varchar(10) NOT NULL,
  `LaunchDay` varchar(10) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Review` varchar(10) NOT NULL,
  `Pros` varchar(300) NOT NULL,
  `Cons` varchar(300) NOT NULL,
  `ResultId` int(11) NOT NULL,
  `Create_time` datetime NOT NULL,
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Creator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Id` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ImageUrl` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `KwId` int(11) NOT NULL,
  `Keyword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`KwId`, `Keyword`) VALUES
(70, 'glass'),
(71, 'pticher'),
(72, 'good'),
(73, 'test'),
(74, 'haha'),
(75, 'TEST2'),
(76, 'test3'),
(78, 'dsf'),
(79, 'mkw1'),
(80, 'oth1'),
(81, 'okw1'),
(82, 'okw1;okw2'),
(83, 'mkw1'),
(84, 'okw1;okw2;okw3'),
(85, 'mkw1'),
(86, 'okw1;okw2;okw4'),
(87, 'okw1;okw2;okw4;okw5'),
(88, 'okw1;okw2;okw4;okw5;okw6');

-- --------------------------------------------------------

--
-- Table structure for table `main_kw`
--

CREATE TABLE `main_kw` (
  `id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Kw_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_kw`
--

INSERT INTO `main_kw` (`id`, `Product_id`, `Kw_id`) VALUES
(176, 71, 79),
(179, 74, 79),
(180, 75, 79),
(182, 77, 79);

-- --------------------------------------------------------

--
-- Table structure for table `other_kw`
--

CREATE TABLE `other_kw` (
  `ID` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Kw_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_kw`
--

INSERT INTO `other_kw` (`ID`, `Product_id`, `Kw_id`) VALUES
(597, 71, 82),
(600, 71, 87),
(601, 74, 87),
(602, 74, 0),
(603, 71, 88),
(604, 74, 88),
(605, 75, 88),
(606, 75, 0),
(611, 77, 82),
(612, 77, 87),
(613, 77, 88),
(614, 77, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ProductName`) VALUES
(71, 'product1'),
(74, 'product2'),
(75, 'product2'),
(77, 'product1');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Craft` varchar(20) NOT NULL,
  `ProductSize` varchar(20) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `ProductionLt` varchar(20) NOT NULL,
  `OtherInfo` varchar(300) NOT NULL,
  `SampleLt` varchar(20) NOT NULL,
  `CartonSize` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `SupplierId` int(11) NOT NULL,
  `QTY` varchar(20) NOT NULL,
  `Packing` varchar(30) NOT NULL,
  `Res_Mark` tinyint(1) NOT NULL,
  `imgUrl` varchar(100) NOT NULL,
  `imgNum` int(11) NOT NULL,
  `Creator` varchar(10) NOT NULL,
  `Create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`ProductId`, `ProductName`, `Craft`, `ProductSize`, `Price`, `Size`, `ProductionLt`, `OtherInfo`, `SampleLt`, `CartonSize`, `Model`, `SupplierId`, `QTY`, `Packing`, `Res_Mark`, `imgUrl`, `imgNum`, `Creator`, `Create_time`) VALUES
(71, 'product1', 'material1', 'cbn1', 'fob1', 'size1', 'thick1', 'sdf', 'port1', 'cm1', 'item2', 9, 'qty1', 'pc1', 0, '', 1, 'admin', '2017-10-01 04:10:33'),
(74, 'product2', '', '', '', '', '', '', '', '', '', 9, '', '', 0, '', 1, 'admin', '2017-10-01 04:10:09'),
(75, 'product2', '', '', '', '', '', '', '', '', '', 9, '', '', 0, '', 1, 'admin', '2017-10-01 04:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `research_result`
--

CREATE TABLE `research_result` (
  `ResultId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `AliBusinessCard` varchar(200) NOT NULL,
  `Seller` varchar(500) NOT NULL,
  `ModNum` int(11) NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `sellerPrice` float NOT NULL,
  `AliPrice` float NOT NULL,
  `BSR` int(11) NOT NULL,
  `SearchNo` int(11) NOT NULL,
  `RePageNo` int(11) NOT NULL,
  `AvePage` decimal(10,0) NOT NULL,
  `OtherInfo` varchar(300) NOT NULL,
  `FBA_fees` float NOT NULL,
  `Est_profit` float NOT NULL,
  `life_cycle` int(11) NOT NULL,
  `indcost` varchar(10) NOT NULL,
  `QTY` varchar(10) NOT NULL,
  `sampleCost` varchar(10) NOT NULL,
  `addUnitPrice` varchar(10) NOT NULL,
  `totalCost` varchar(10) NOT NULL,
  `estProfit` float NOT NULL,
  `Creator` varchar(10) NOT NULL,
  `UpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `research_result`
--

INSERT INTO `research_result` (`ResultId`, `productName`, `AliBusinessCard`, `Seller`, `ModNum`, `Comments`, `sellerPrice`, `AliPrice`, `BSR`, `SearchNo`, `RePageNo`, `AvePage`, `OtherInfo`, `FBA_fees`, `Est_profit`, `life_cycle`, `indcost`, `QTY`, `sampleCost`, `addUnitPrice`, `totalCost`, `estProfit`, `Creator`, `UpdateTime`, `Create_time`) VALUES
(77, 'product1', '', '', 0, '', 0, 0, 0, 0, 0, '0', '', 0, 0, 0, '', '', '', '', '', 0, 'admin', '2017-10-01 06:06:14', '2017-10-01 08:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `Id` int(11) NOT NULL,
  `SourceName` varchar(10) NOT NULL,
  `Creator` varchar(10) NOT NULL,
  `UpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierId` int(11) NOT NULL,
  `ComName` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `ContactPerson` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `AlibabaSite` varchar(50) NOT NULL,
  `Ebsite` varchar(50) NOT NULL,
  `Skype` varchar(20) NOT NULL,
  `Fax` varchar(20) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `OtherInfo` varchar(200) NOT NULL,
  `Creator` varchar(20) NOT NULL,
  `Create_time` datetime NOT NULL,
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Role` enum('Trading','Manufacture','Both','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierId`, `ComName`, `Address`, `ContactPerson`, `Email`, `AlibabaSite`, `Ebsite`, `Skype`, `Fax`, `Phone`, `OtherInfo`, `Creator`, `Create_time`, `Update_time`, `Role`) VALUES
(9, 'testSupplier2', 'address2', 'contactperson2', 'contact@gmail.com2', 'http:www.ab.com2', 'bkj2', 'jdfls2', '1234562', '1234562', 'jsaljlfas2', 'admin', '2017-10-01 04:10:10', '2017-10-01 02:19:04', 'Manufacture');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Createtime` datetime NOT NULL,
  `Updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `add_Supplier` tinyint(1) NOT NULL DEFAULT '0',
  `add_ReData` tinyint(1) NOT NULL DEFAULT '0',
  `vOrS_a_sudata` tinyint(1) NOT NULL DEFAULT '0',
  `vOrS_o_sudata` tinyint(1) NOT NULL DEFAULT '0',
  `vOrS_a_redata` tinyint(1) NOT NULL DEFAULT '0',
  `vOrS_o_redata` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Createtime`, `Updatetime`, `add_Supplier`, `add_ReData`, `vOrS_a_sudata`, `vOrS_o_sudata`, `vOrS_a_redata`, `vOrS_o_redata`) VALUES
(14, 'admin', 'admin', '0000-00-00 00:00:00', '2017-09-21 01:26:27', 1, 1, 1, 1, 1, 1),
(23, 'amy2', '123', '2017-09-21 07:09:56', '2017-10-01 06:18:32', 0, 0, 0, 1, 1, 1),
(24, 'test1', 'test1', '2017-10-01 04:10:50', '2017-10-01 02:16:02', 0, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitor_analysis`
--
ALTER TABLE `competitor_analysis`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`KwId`);

--
-- Indexes for table `main_kw`
--
ALTER TABLE `main_kw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_kw`
--
ALTER TABLE `other_kw`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `SupplierId` (`SupplierId`);

--
-- Indexes for table `research_result`
--
ALTER TABLE `research_result`
  ADD PRIMARY KEY (`ResultId`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competitor_analysis`
--
ALTER TABLE `competitor_analysis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `KwId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `main_kw`
--
ALTER TABLE `main_kw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `other_kw`
--
ALTER TABLE `other_kw`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `research_result`
--
ALTER TABLE `research_result`
  MODIFY `ResultId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`SupplierId`) REFERENCES `supplier` (`SupplierId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
