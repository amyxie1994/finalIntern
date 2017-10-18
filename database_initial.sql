-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2017 at 12:28 AM
-- Server version: 5.6.23-cll-lve
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pykalcom_zohosupplierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `competitor_analysis`
--

CREATE TABLE `competitor_analysis` (
  `Id` int(11) NOT NULL COMMENT 'ID of competitor''s record, unique',
  `BrandName` varchar(200) NOT NULL COMMENT 'Name of the competitor brand',
  `BSR` varchar(10) NOT NULL COMMENT 'BSR of competitor',
  `Sales` varchar(20) NOT NULL COMMENT 'Sales of Competitor',
  `Price` varchar(10) NOT NULL COMMENT 'Price of competitor',
  `Size` varchar(10) NOT NULL COMMENT 'Size of Competitor''s product',
  `LaunchDay` varchar(10) NOT NULL COMMENT 'Launch day of competitor''s product',
  `Link` varchar(200) NOT NULL COMMENT 'Link of competitor',
  `Review` varchar(10) NOT NULL COMMENT 'Review num of competitor''s product',
  `Pros` varchar(300) NOT NULL COMMENT 'Strengths of this competitor',
  `Cons` varchar(300) NOT NULL COMMENT 'Weakness of competitor',
  `ResultId` int(11) NOT NULL COMMENT 'Research data id',
  `Create_time` datetime NOT NULL COMMENT 'Create time of this record',
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'last update time',
  `Creator` varchar(20) NOT NULL COMMENT 'creator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competitor_analysis`
--

INSERT INTO `competitor_analysis` (`Id`, `BrandName`, `BSR`, `Sales`, `Price`, `Size`, `LaunchDay`, `Link`, `Review`, `Pros`, `Cons`, `ResultId`, `Create_time`, `Update_time`, `Creator`) VALUES
(37, 'Hiware2', '1200', '22.99', '', '64 OZ', '1052', 'https://www.amazon.com/dp/B00ICZI5I4', '296', 'Fine mesh.', 'Lid can break.', 98, '2017-10-04 12:10:17', '2017-10-04 04:45:17', 'admin'),
(44, 'jlsajfa', '#1200', '1732', '$22.99 ', ' 64 oz ', '1052', '', '', '', '', 0, '0000-00-00 00:00:00', '2017-10-04 05:56:32', ''),
(48, 'Hiware', '#1200', ' 1732', '12', ' $22.99Â ', ' 64 oz ', 'https://www.amazon.com/dp/B00ICZI5I4', ' 1052', 'faf', 'asdf', 99, '2017-10-17 01:10:06', '2017-10-17 05:19:06', 'admin'),
(49, 'Hiware', '#1200', '', '', '', '', '', '', '', '', 99, '2017-10-17 01:10:11', '2017-10-17 05:34:11', 'admin'),
(51, 'Hiware', ' #1200', '1732', '$22.99', ' 64 oz ', ' 1052', ' https://www.amazon.com/dp/B00ICZI5I4', '296', '. Lid can break. Thin glass. Screw on lid comes off. Handles crack. Drips. Lid rusting. Lid doesnt fit. ', '', 99, '2017-10-17 01:10:57', '2017-10-17 05:47:57', 'admin'),
(52, 'Hiware', ' #1200', ' 1732', '', '', '', '', '', '', '', 99, '2017-10-17 01:10:16', '2017-10-17 05:48:16', 'admin'),
(53, 'brand', '123', '123', '123', '123', '123', '123', '123', '123', '123', 96, '2017-10-17 07:10:34', '2017-10-17 23:05:34', 'admin981');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `KwId` int(11) NOT NULL COMMENT 'id of keyword,unique',
  `Keyword` varchar(50) NOT NULL COMMENT 'name of the keyword'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`KwId`, `Keyword`) VALUES
(97, 'kw1'),
(98, 'k2w'),
(99, 'main1'),
(100, 'other1'),
(101, 'hha'),
(102, 'good'),
(103, 'main2'),
(104, 'maink'),
(105, ' not bad'),
(106, 'glass pitcher'),
(107, 'pour over coffee maker'),
(108, 'whistling kettle'),
(109, 'tea kettle'),
(110, 'finger exerciser'),
(111, 'hand exerciser'),
(112, ' hand strengthener'),
(113, 'cold brew coffee maker'),
(115, 'salad spinner'),
(116, 'salad dryer'),
(117, ' lettuce dryer'),
(118, ' lettuce spinner'),
(119, 'testkw'),
(120, 'testkw2'),
(121, 'HAHLLL'),
(122, 'testkw2;testkw3'),
(123, 'testttt');

-- --------------------------------------------------------

--
-- Table structure for table `main_kw`
--

CREATE TABLE `main_kw` (
  `id` int(11) NOT NULL COMMENT 'id of the main keyword relationship record',
  `Product_id` int(11) NOT NULL COMMENT 'id of the product, link to the product table ',
  `Kw_id` int(11) NOT NULL COMMENT 'keyword id, link to the keyword table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_kw`
--

INSERT INTO `main_kw` (`id`, `Product_id`, `Kw_id`) VALUES
(187, 82, 97),
(189, 84, 101),
(190, 85, 99),
(192, 87, 101),
(193, 88, 106),
(194, 89, 106),
(195, 90, 107),
(196, 91, 108),
(197, 92, 110),
(198, 93, 113),
(199, 94, 113),
(200, 95, 107),
(201, 96, 113),
(203, 98, 106),
(204, 99, 115),
(207, 99, 114);

-- --------------------------------------------------------

--
-- Table structure for table `other_kw`
--

CREATE TABLE `other_kw` (
  `ID` int(11) NOT NULL COMMENT 'id of the other keyword relationship',
  `Product_id` int(11) NOT NULL,
  `Kw_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_kw`
--

INSERT INTO `other_kw` (`ID`, `Product_id`, `Kw_id`) VALUES
(620, 82, 98),
(622, 84, 102),
(624, 85, 103),
(626, 87, 102),
(627, 84, 105),
(628, 87, 105),
(633, 92, 111),
(634, 92, 112),
(641, 99, 116),
(642, 99, 117),
(643, 99, 118),
(646, 90, 119),
(647, 95, 119),
(648, 93, 120),
(649, 94, 120),
(650, 96, 120),
(653, 99, 116),
(654, 99, 117),
(655, 99, 118),
(656, 99, 121),
(657, 98, 108),
(661, 90, 122),
(662, 95, 122),
(664, 91, 123);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL COMMENT 'Id of product list, unique, contain the id of the product in quotation and research data',
  `ProductName` varchar(100) NOT NULL COMMENT 'The name of this product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ProductName`) VALUES
(82, 'product1'),
(84, 'product11'),
(85, 'product1'),
(87, 'product11'),
(88, 'GLass Pitcher 60 OZ'),
(89, 'GLass Pitcher 68 OZ'),
(90, 'Pour over coffee maker'),
(91, 'Whistling Kettle'),
(92, 'Finger Exerciser'),
(93, 'Cold Brew Coffee Maker'),
(94, 'Cold Brew Coffee Maker'),
(95, 'Pour over coffee maker'),
(96, 'Cold Brew Coffee Maker'),
(98, 'GLass Pitcher'),
(99, 'Salad Spinner');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `ProductId` int(11) NOT NULL COMMENT 'Id of this product, consistent with ID in product table',
  `ProductName` varchar(50) NOT NULL COMMENT 'name of this product',
  `Craft` varchar(20) NOT NULL COMMENT 'Craft of this product',
  `ProductSize` varchar(20) NOT NULL COMMENT 'The size of this product',
  `Price` varchar(10) NOT NULL COMMENT 'The price of this product',
  `Size` varchar(100) NOT NULL COMMENT 'The size of this product',
  `ProductionLt` varchar(20) NOT NULL COMMENT 'Limitation time of production',
  `OtherInfo` varchar(300) NOT NULL COMMENT 'Comments about this product',
  `SampleLt` varchar(20) NOT NULL COMMENT 'Time need for Sample ',
  `CartonSize` varchar(20) NOT NULL COMMENT 'size of carton ',
  `Model` varchar(20) NOT NULL COMMENT 'Model No',
  `SupplierId` int(11) NOT NULL COMMENT 'Supplier id, indicating who offers this product',
  `QTY` varchar(20) NOT NULL COMMENT 'QTY of this product',
  `Packing` varchar(30) NOT NULL COMMENT 'Packing of this product',
  `Res_Mark` tinyint(1) NOT NULL,
  `imgUrl` varchar(100) NOT NULL,
  `imgNum` int(11) NOT NULL COMMENT 'Number of image uploaded ',
  `Creator` varchar(10) NOT NULL COMMENT 'creator',
  `Create_time` datetime NOT NULL COMMENT 'Create time of this record'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`ProductId`, `ProductName`, `Craft`, `ProductSize`, `Price`, `Size`, `ProductionLt`, `OtherInfo`, `SampleLt`, `CartonSize`, `Model`, `SupplierId`, `QTY`, `Packing`, `Res_Mark`, `imgUrl`, `imgNum`, `Creator`, `Create_time`) VALUES
(88, 'GLass Pitcher 60 OZ', 'borosilicate glass', '', '5.8', '60 OZ', '', '', 'Tianjin', '', '', 10, '1000', '', 0, '', 1, 'admin', '2017-10-03 10:10:33'),
(89, 'GLass Pitcher 68 OZ', 'borosilicate glass', '', '5.8', '68 OZ', '', '', '', '', '', 10, '1000', '', 0, '', 1, 'admin', '2017-10-03 10:10:56'),
(90, 'Pour over coffee maker', 'borosilicate glass', '', '6.9', '400 ml', '', '', 'Tianjin', '', '', 10, '1000', '', 0, '', 1, 'admin', '2017-10-03 11:10:53'),
(91, 'Whistling Kettle', 'stainless steel ', 'cbn', '8.45', '3L', 'thickness', 'Fixed alloy and black nylon handle +nylon\r\nknob. 304 S/S Body thickness in 0.5mm.\r\nCapsule bottom: 0.5mm 304s/s inner\r\nbottom +0.5mm Alu+1.0mm iron\r\n+0.5mm Alu+430s/s(18/0) bottom\r\nprotector.Inside satin finish ,outside 2/3\r\nsatin finish +1/3 mirror finish .', 'Shenzhen', '66m', 'model', 11, '1000', '123', 0, '', 1, 'admin', '2017-10-03 11:10:52'),
(92, 'Finger Exerciser', 'TPE', '', '1.55', '', '', '', 'Shanghai', '', '', 12, '2000', '', 0, '', 1, 'admin', '2017-10-03 11:10:28'),
(93, 'Cold Brew Coffee Maker', 'borosilicate glass', '', '9', '1500ml', '', '', 'Tianjin', '', '', 10, '1000', '', 0, '', 1, 'admin', '2017-10-03 11:10:13'),
(94, 'Cold Brew Coffee Maker', 'borosilicate glass', '', '9.25', '1500ml', '', '', 'Tianjin', '', '', 13, '1200', '', 0, '', 1, 'admin', '2017-10-03 11:10:13'),
(95, 'Pour over coffee maker', 'borosilicate glass', '', '8.6', '750 ml', '', 'not', 'Tianjin', '', 'jkk', 13, '1000', '40', 0, '', 1, 'admin', '2017-10-03 11:10:58');

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
(96, 'Cold Brew Coffee Maker', '', 'https://www.amazon.com/dp/B06Y27W76B/', 0, '', 39.99, 9, 4000, 0, 0, 0, '', 11.85, 0, 116, '', '', '', '', '', 14, 'admin', '2017-10-04 03:52:45', '2017-10-03 11:10:39'),
(98, 'GLass Pitcher', '', 'https://www.amazon.com/dp/B01M0L3RHG', 0, '', 22.66, 0, 2851, 0, 0, 0, '', 7.72, 0, 351, '', '', '', '', '', 6.23, 'admin', '2017-10-04 04:07:30', '2017-10-04 12:10:30'),
(99, 'Salad Spinner', 'safafasf', 'https://www.amazon.com/dp/B01LB791UK', 0, '', 39.99, 12, 2000, 0, 0, 0, 'commetn', 14.11, 0, 229, '', '', '', '', '', 6.59, 'Qiushi', '2017-10-17 03:59:10', '2017-10-04 12:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `Id` int(11) NOT NULL COMMENT 'ID of source record',
  `SourceName` varchar(10) NOT NULL COMMENT 'Name of this source',
  `Creator` varchar(10) NOT NULL COMMENT 'Creator of this record',
  `UpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last update time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierId` int(11) NOT NULL COMMENT 'Id of supplier',
  `ComName` varchar(50) NOT NULL COMMENT 'name of the company',
  `Address` varchar(150) NOT NULL COMMENT 'address of company',
  `ContactPerson` varchar(20) NOT NULL COMMENT 'contact person',
  `Email` varchar(50) NOT NULL COMMENT 'email address of company',
  `AlibabaSite` varchar(50) NOT NULL COMMENT 'alibaba site of this company',
  `Ebsite` varchar(50) NOT NULL COMMENT 'website of this company',
  `Skype` varchar(20) NOT NULL COMMENT 'skype of this comapny',
  `Fax` varchar(20) NOT NULL COMMENT 'Fax number of this company',
  `Phone` varchar(50) NOT NULL COMMENT 'phone number of this company',
  `OtherInfo` varchar(200) NOT NULL COMMENT 'Comments about this company',
  `Creator` varchar(20) NOT NULL COMMENT 'Creator of this record',
  `Create_time` datetime NOT NULL COMMENT 'Create time of this record',
  `Update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last update time',
  `Role` enum('Trading','Manufacture','Both','') NOT NULL COMMENT 'role of this company'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierId`, `ComName`, `Address`, `ContactPerson`, `Email`, `AlibabaSite`, `Ebsite`, `Skype`, `Fax`, `Phone`, `OtherInfo`, `Creator`, `Create_time`, `Update_time`, `Role`) VALUES
(10, 'HEJIAN KINGMOON GLASS PRODUCTS CO.,LTD					', 'æ²³åŒ—çœæ²³é—´å¸‚é‡‡ä¸‰å—å°åŒºA2', 'Tony Liu', 'admin@kingmoonglass.com', 'www.kingmoonglass.en.alibaba.com', 'www.kingmoonglass.com', '', '', '+86 187 3377 8354', 'Glass pitcher and pour over coffee maker.', 'admin', '2017-10-03 10:10:25', '2017-10-04 02:53:25', 'Manufacture'),
(11, 'Realwin Metal Manufacture Company Limited', 'Lisheng Industial Development Zone, Sangjiang Town, Xinhui District, Jiangmen City, Guangdong P.R. China', 'Cherry Zhao', 'cherry@realwin.cn', 'jmrealwin.en.alibaba.com', 'www.realwin.cn', 'cherry@realwin.cn ', '', '86-13725924255', 'Whistling kettle', 'admin', '2017-10-03 11:10:14', '2017-10-04 03:09:14', 'Manufacture'),
(12, 'Sprocare Company Limited', '1205,SouthLake Mansion,Zhongtai street,Yuhang district,Hangzhou,China,311121', 'Julia Tang', 'julia@sprocare.com', 'sprocare.en.alibaba.com', '', 'JuliaTang715roy', '+86 571 5789 0379', '+86 15024415109', 'Finger exerciser, sport and fitness products and medical products', 'admin', '2017-10-03 11:10:04', '2017-10-04 03:16:04', 'Trading'),
(13, 'Active Source Houseware Limited', 'Rm.505,Tower 3,Building 4,CIP,No.329 West Yushan Rd.,Shiqiao,Panyu District,Guangzhou,China ', 'Kristy', 'kristy@as-life.com', 'aslife.en.alibaba.com', 'http://www.activesourceco.com', '12345', '+86 20 8466 5057', '+86 20 8466 5017', 'Patent holder of cold brew coffee maker. Various styles.', 'admin', '2017-10-03 11:10:46', '2017-10-17 22:56:03', 'Trading'),
(14, 'HEJIAN KINGMOON GLASS PRODUCTS CO.,LTD					', 'æ²³åŒ—çœæ²³é—´å¸‚é‡‡ä¸‰å—å°åŒºA2', 'Tony Liu', 'admin@kingmoonglass.com', 'www.kingmoonglass.en.alibaba.com', 'www.kingmoonglass.com', '', '', '+86 187 3377 8354', 'Glass pitcher', 'Qiushi', '2017-10-04 12:10:09', '2017-10-04 04:26:09', 'Manufacture');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL COMMENT 'id of user, unique',
  `Username` varchar(20) NOT NULL COMMENT 'name of user',
  `Password` varchar(20) NOT NULL COMMENT 'password of user',
  `Createtime` datetime NOT NULL COMMENT 'Create time of this record',
  `Updatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'last update time',
  `add_Supplier` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission of user, 0: do not have permission to add supplier; 1: have permission',
  `add_ReData` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission to add research data, 0:no 1:yes',
  `vOrS_a_sudata` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission to view or search all supplier data',
  `vOrS_o_sudata` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission to view or see own supplier',
  `vOrS_a_redata` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission to view or search all research data',
  `vOrS_o_redata` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permission to view or search own research data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Createtime`, `Updatetime`, `add_Supplier`, `add_ReData`, `vOrS_a_sudata`, `vOrS_o_sudata`, `vOrS_a_redata`, `vOrS_o_redata`) VALUES
(14, 'admin981', 'Amaz0n98##', '0000-00-00 00:00:00', '2017-10-05 11:30:48', 1, 1, 1, 1, 1, 1),
(23, 'amy2', '123', '2017-09-21 07:09:56', '2017-10-01 06:18:32', 0, 0, 0, 1, 1, 1),
(24, 'test1', 'test1', '2017-10-01 04:10:50', '2017-10-03 05:57:17', 1, 1, 1, 1, 1, 1),
(25, 'Qiushi', 'Glass99#', '2017-10-04 12:10:49', '2017-10-04 04:18:49', 1, 1, 0, 1, 0, 1),
(26, 'admin', 'admin', '0000-00-00 00:00:00', '2017-10-16 02:37:22', 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competitor_analysis`
--
ALTER TABLE `competitor_analysis`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of competitor''s record, unique', AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `KwId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of keyword,unique', AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `main_kw`
--
ALTER TABLE `main_kw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the main keyword relationship record', AUTO_INCREMENT=209;
--
-- AUTO_INCREMENT for table `other_kw`
--
ALTER TABLE `other_kw`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of the other keyword relationship', AUTO_INCREMENT=665;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of product list, unique, contain the id of the product in quotation and research data', AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `research_result`
--
ALTER TABLE `research_result`
  MODIFY `ResultId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of source record', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of supplier', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of user, unique', AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`SupplierId`) REFERENCES `supplier` (`SupplierId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
