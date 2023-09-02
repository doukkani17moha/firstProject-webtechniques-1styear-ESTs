-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mai 20, 2023 at 07:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.2.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `news`
--
-- --------------------------------------------------------
--
-- Table structure for table `tbladmin`
--
CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;
--
-- Dumping data for table `tbladmin`
--
INSERT INTO `tbladmin` (
    `id`,
    `AdminUserName`,
    `AdminPassword`,
    `AdminEmailId`,
    `Is_Active`,
    `CreationDate`,
    `UpdationDate`
  )
VALUES (
    1,
    'admin',
    '$2y$10$GYPUoXuqdwLnFLPB5BRmjuznL3s6J3jICg2dZiXjNK4PNqEbbRk06',
    'admin@admin.com',
    1,
    '2023-05-20 17:51:00',
    '2023-05-20 17:51:00'
  );
--
-- Table structure for table `article_category`
--
CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 8;
INSERT INTO `tblcategory` (
    `id`,
    `CategoryName`,
    `Description`,
    `PostingDate`,
    `UpdationDate`,
    `Is_Active`
  )
VALUES (
    2,
    'Tech',
    'Tech News',
    '2023-05-20 10:28:09',
    '2023-05-20 18:41:07',
    1
  ),
  (
    3,
    'Sports',
    'Sports News',
    '2023-05-20 10:35:09',
    '2023-05-20 11:11:55',
    1
  ),
  (
    5,
    'Entertainment',
    'Entertainment News',
    '2023-05-20 05:32:58',
    '2023-05-20 05:33:41',
    1
  ),
  (
    6,
    'Health',
    'Health News',
    '2023-05-20 15:46:09',
    '0000-00-00 00:00:00',
    1
  ),
  (
    7,
    'Business',
    'Business News',
    '2023-05-20 15:46:22',
    '0000-00-00 00:00:00',
    1
  );
--
-- Table structure for table `tblsubcategory`
--
CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY(`SubCategoryId`),
  CONSTRAINT `Category_Id` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 15;
--
-- Dumping data for table `tblsubcategory`
--
INSERT INTO `tblsubcategory` (
    `SubCategoryId`,
    `CategoryId`,
    `Subcategory`,
    `SubCatDescription`,
    `PostingDate`,
    `UpdationDate`,
    `Is_Active`
  )
VALUES (
    3,
    2,
    'AI ',
    'Artificiel Intelligence News',
    '2023-05-22 15:45:38',
    '0000-00-00 00:00:00',
    1
  ),
  (
    4,
    2,
    'LINUX',
    'Linux News',
    '2023-05-30 09:00:43',
    '0000-00-00 00:00:00',
    1
  ),
  (
    5,
    2,
    'Cyber-Security',
    'Cyber-Security News',
    '2023-05-30 09:00:58',
    '0000-00-00 00:00:00',
    1
  ),
  (
    6,
    3,
    'Football',
    'Football News',
    '2023-05-30 18:59:22',
    '0000-00-00 00:00:00',
    1
  ),
  (
    7,
    3,
    'Basketball',
    'Basketball News',
    '2023-05-30 19:04:29',
    '0000-00-00 00:00:00',
    1
  ),
  (
    8,
    5,
    'Films',
    'Films News',
    '2023-05-30 19:04:43',
    '0000-00-00 00:00:00',
    1
  ),
  (
    9,
    5,
    'Arts',
    'Arts News',
    '2023-05-30 19:08:42',
    '0000-00-00 00:00:00',
    1
  ),
  (
    10,
    6,
    'Fitness',
    'Fitness News',
    '2023-05-30 19:04:43',
    '0000-00-00 00:00:00',
    1
  ),
  (
    11,
    6,
    'Food',
    'Food News',
    '2023-05-30 19:08:42',
    '0000-00-00 00:00:00',
    1
  ),
  (
    12,
    7,
    'Start-Up',
    'Start-Up News',
    '2023-05-30 19:04:43',
    '0000-00-00 00:00:00',
    1
  ),
  (
    13,
    7,
    'Stocks',
    'Stocks News',
    '2023-05-30 19:08:42',
    '0000-00-00 00:00:00',
    1
  );
--
-- Table structure for table `tblposts`
--
CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `Cat_Id` FOREIGN KEY (`CategoryId`) REFERENCES `tblcategory`(`id`),
  CONSTRAINT `SubCat_Id` FOREIGN KEY (`SubCategoryId`) REFERENCES `tblsubcategory`(`SubCategoryId`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 20;
--
-- Dumping data for table `articles`
--
INSERT INTO `tblposts` (
    `id`,
    `PostTitle`,
    `CategoryId`,
    `SubCategoryId`,
    `PostDetails`,
    `PostingDate`,
    `UpdationDate`,
    `Is_Active`,
    `PostUrl`,
    `PostImage`
  )
VALUES (
    7,
    'Jasprit Bumrah ruled out of England T20I series due to injury',
    3,
    4,
    '<p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">The Indian Cricket Team has received a huge blow right ahead of the commencement of the much-awaited series against England. Star speedster Jasprit Bumrah has been ruled out of the forthcoming 3-match T20I series as he suffered an injury in his left thumb.</span></p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The 24-year-old pacer picked up a niggle during India’s first T20I match against Ireland played on June 27 at the Malahide cricket ground in Dublin. As per the reports, he is likely to be available for the ODI series against England scheduled to start from July 12.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">In the first, Bumrah exhibited a phenomenal performance with the ball. In his quota of four overs, he conceded 19 runs and picked 2 wickets at an economy rate of 4.75.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">Post his injury, he arrived at team’s optional training session on Thursday but didn’t train. Later, he was rested in the second face-off along with MS Dhoni, Shikhar Dhawan and Bhuvneshwar Kumar.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">As of now, no replacement has been announced. However, Umesh Yadav may be be given chance in the team in Bumrah’s absence.</p><p style=\"padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The first T20I match between India and England will be played at Old Trafford, Manchester on July 3.</p>',
    '2018-06-30 18:49:23',
    '2018-08-28 15:57:32',
    1,
    'Jasprit-Bumrah-ruled-out-of-England-T20I-series-due-to-injury',
    '6d08a26c92cf30db69197a1fb7230626.jpg'
  ),
  (
    10,
    'Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal',
    7,
    9,
    '<h1 style=\"box-sizing: inherit; margin-top: 0px; padding: 0px; font-family: Roboto, sans-serif; font-size: 38px; line-height: normal; letter-spacing: -0.5px; color: rgb(51, 51, 51);\"><span itemprop=\"headline\" style=\"box-sizing: inherit;\">Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal</span>Tata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel Deal</h1>',
    '2018-06-30 19:08:56',
    '2018-08-28 15:59:59',
    1,
    'Tata-Steel,-Thyssenkrupp-Finalise-Landmark-Steel-Deal',
    '505e59c459d38ce4e740e3c9f5c6caf7.jpg'
  ),
  (
    11,
    'UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping',
    6,
    8,
    '<p>UNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeeping<br></p>',
    '2018-06-30 19:10:36',
    '2018-08-28 16:01:35',
    1,
    'UNs-Jean-Pierre-Lacroix-thanks-India-for-contribution-to-peacekeeping',
    '27095ab35ac9b89abb8f32ad3adef56a.jpg'
  ),
  (
    12,
    'Shah holds meeting with NE states leaders in Manipur',
    6,
    7,
    '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">New Delhi: BJP president Amit Shah today held meetings with his party leaders who are in-charge of 11 Lok Sabha seats spread across seven northeast states as part of a drive to ensure that it wins the maximum number of these constituencies in the general election next year.</span><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><webviewcontentdata style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">Shah held separate meetings with Lok Sabha toli (group) of Arunachal Pradesh, Tripura, Meghalaya, Mizoram, Nagaland, Sikkim and Manipur in Manipur, the partys media head Anil Baluni said.<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Baluni said that Shah was in West Bengal for two days before he arrived in Manipur. The BJP chief would reach Odisha tomorrow.</webviewcontentdata><br></p>',
    '2018-06-30 19:11:44',
    '2018-08-28 16:01:43',
    1,
    'Shah-holds-meeting-with-NE-states-leaders-in-Manipur',
    '7fdc1a630c238af0815181f9faa190f5.jpg'
  );
CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 6;
INSERT INTO `tblcomments` (
    `id`,
    `postId`,
    `name`,
    `email`,
    `comment`,
    `postingDate`,
    `status`
  )
VALUES (
    1,
    '12',
    'Mohamed Doukkani',
    'mdoukkani8@gmail.com',
    'This is a good article!!',
    '2023-05-21 11:06:22',
    0
  ),
  (
    2,
    '12',
    'Ali Doukkani',
    'alidk@gmail.com',
    'nice!!.',
    '2023-05-21 11:25:56',
    1
  ),
  (
    3,
    '7',
    'Bouchra Robai',
    'br12@gmail.com',
    'I am not agree with this',
    '2023-05-21 11:27:06',
    1
  );
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;