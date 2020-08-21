-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 11:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_choose_you`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Bird'),
(4, 'Snake'),
(5, 'Rabbit'),
(6, 'Pig'),
(7, 'Squirrel'),
(8, 'Rat'),
(9, 'Frog'),
(10, 'Monkey'),
(11, 'Turtle'),
(12, 'Crayfish'),
(13, 'Tiger'),
(14, 'Lion'),
(15, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `sender` int(11) NOT NULL,
  `uid_chat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `message`, `send_time`, `sender`, `uid_chat`) VALUES
(44, 'qweqwe', '2020-01-10 14:40:12', 10007, '10007_10008'),
(45, 'TEST\n', '2020-01-10 14:50:12', 10007, '10007_10008'),
(46, 'OK', '2020-01-10 14:50:21', 10008, '10007_10008'),
(47, '1234', '2020-01-13 20:48:41', 10010, '0_'),
(48, '123456', '2020-01-13 20:49:07', 10009, '10009_10010'),
(49, 'hello', '2020-01-13 20:49:19', 10009, '10009_10010'),
(50, 'hi', '2020-01-13 20:50:02', 10010, '10009_10010');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uid_contact` int(11) DEFAULT NULL,
  `uid_chat` varchar(100) DEFAULT NULL,
  `contact_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `uid`, `uid_contact`, `uid_chat`, `contact_time`) VALUES
(15, 10007, 10008, '10007_10008', '2020-01-10 14:43:33'),
(16, 10008, 10007, '10007_10008', '2020-01-10 14:43:33'),
(17, 10009, 10010, '10009_10010', '2020-01-13 20:23:55'),
(18, 10010, 10009, '10009_10010', '2020-01-13 20:23:55');

-- --------------------------------------------------------

--
-- Stand-in structure for view `feed_post`
-- (See below for the actual view)
--
CREATE TABLE `feed_post` (
`f_name` varchar(100)
,`l_name` varchar(100)
,`pic_url` text
,`role_name` varchar(45)
,`post_date` datetime
,`post_msg` varchar(45)
,`post_pic_url` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `get_contact`
-- (See below for the actual view)
--
CREATE TABLE `get_contact` (
`user_id` int(11)
,`contact_id` int(11)
,`uid_chat` varchar(100)
,`contact_time` datetime
,`f_name` varchar(100)
,`l_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `role_id`, `uid`) VALUES
('admin@gmail.com', 'ff33f1b12213e021c2c4a888141953ba', 200, 10008),
('caretaker@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 100, 10010),
('mr.pongpon.sinlapa.m.m@gmail.com', 'ff33f1b12213e021c2c4a888141953ba', 100, 10007),
('taker@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 200, 10009);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(45) DEFAULT NULL,
  `pet_color` varchar(45) DEFAULT NULL,
  `pet_gender` varchar(45) DEFAULT NULL,
  `pet_desc` varchar(45) DEFAULT NULL,
  `pet_pic_url1` varchar(45) NOT NULL,
  `pet_pic_url2` varchar(45) DEFAULT NULL,
  `pet_pic_url3` varchar(45) DEFAULT NULL,
  `pet_time_post` datetime NOT NULL,
  `pet_status` varchar(45) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `pet_color`, `pet_gender`, `pet_desc`, `pet_pic_url1`, `pet_pic_url2`, `pet_pic_url3`, `pet_time_post`, `pet_status`, `cat_id`, `uid`) VALUES
(1, 'มะปราง', 'แดง', 'ชาย', 'นัดเจอได้ที่จังหวักสุพรรณบุรีครับ 0979798950', 'p6.png', 'defult_pet.png', 'defult_pet.png', '2020-01-14 01:09:16', 'Untaker', 1, 10010),
(2, 'JoJo', 'น้ำตาล', 'เพศเมีย', 'เจอที่ นนทบุรี', 'p5.png', 'defult_pet.png', 'defult_pet.png', '2020-01-13 17:16:26', 'Untaker', 2, 10010),
(3, 'Kaiba', 'Yellow', 'Male', 'Korat- 0998745612', '10010_dogy_2.jpeg', '10010_dogy1.jpeg', 'defult_pet.png', '2020-01-15 10:10:25', 'Untaker', 1, 10010);

-- --------------------------------------------------------

--
-- Table structure for table `petbook`
--

CREATE TABLE `petbook` (
  `post_id` int(11) NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_pic_url` varchar(45) DEFAULT NULL,
  `post_msg` varchar(45) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petbook`
--

INSERT INTO `petbook` (`post_id`, `post_date`, `post_pic_url`, `post_msg`, `uid`) VALUES
(25, '2020-01-10 12:38:39', 'UID_10007_10012020123839jpeg', 'qweqwe', 10007);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(100, 'caretaker'),
(200, 'taker');

-- --------------------------------------------------------

--
-- Table structure for table `theat`
--

CREATE TABLE `theat` (
  `theat_id` int(11) NOT NULL,
  `recive_date` datetime NOT NULL,
  `pet_id` int(11) NOT NULL,
  `uid_recive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theat`
--

INSERT INTO `theat` (`theat_id`, `recive_date`, `pet_id`, `uid_recive`) VALUES
(1, '2020-01-14 00:00:00', 1, 10009),
(2, '2020-01-14 00:00:00', 2, 10007),
(3, '2020-01-29 00:00:00', 3, 10009);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(45) NOT NULL,
  `pic_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `f_name`, `l_name`, `gender`, `address`, `tel`, `pic_url`) VALUES
(10007, 'Mr.Pikachukung', 'Kuntood', 'Male', 'ต.บัลลังก์ อ.โนนไทย 8/15 หมู่ 8', '0962902661', '../img/icon/user.png'),
(10008, 'Pongpon', 'Sinlapa', 'Female', 'ต.บัลลังก์ อ.โนนไทย 8/15 หมู่ 8', '0962902662', '../img/icon/user.png'),
(10009, 'Nattawut', 'Nakkhunthod', 'Male', '111/2 หมู่ 6', '0995284136', 'Nattawut_14012020093040.jpeg'),
(10010, 'Pongsakorn', 'Naklang', 'Female', 'Suranaree 10000', '0987654321', '../img/icon/user.png');

-- --------------------------------------------------------

--
-- Structure for view `feed_post`
--
DROP TABLE IF EXISTS `feed_post`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `feed_post`  AS  select `u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`pic_url` AS `pic_url`,`r`.`role_name` AS `role_name`,`p`.`post_date` AS `post_date`,`p`.`post_msg` AS `post_msg`,`p`.`post_pic_url` AS `post_pic_url` from (((`petbook` `p` join `user` `u` on(`p`.`uid` = `u`.`uid`)) join `login` `l` on(`u`.`uid` = `l`.`uid`)) join `role` `r` on(`l`.`role_id` = `r`.`role_id`)) order by `p`.`post_date` desc ;

-- --------------------------------------------------------

--
-- Structure for view `get_contact`
--
DROP TABLE IF EXISTS `get_contact`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_contact`  AS  select `c`.`uid` AS `user_id`,`c`.`uid_contact` AS `contact_id`,`c`.`uid_chat` AS `uid_chat`,`c`.`contact_time` AS `contact_time`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name` from (`contact` `c` join `user` `u` on(`c`.`uid_contact` = `u`.`uid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `fk_contack_user` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_login_role_idx` (`role_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `fk_pet_category1_idx` (`cat_id`);

--
-- Indexes for table `petbook`
--
ALTER TABLE `petbook`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_petbook_user1` (`uid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `theat`
--
ALTER TABLE `theat`
  ADD PRIMARY KEY (`theat_id`),
  ADD KEY `fk_theat_pet1_idx` (`pet_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petbook`
--
ALTER TABLE `petbook`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `theat`
--
ALTER TABLE `theat`
  MODIFY `theat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contack_user` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_pet_category1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `petbook`
--
ALTER TABLE `petbook`
  ADD CONSTRAINT `fk_petbook_user1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
