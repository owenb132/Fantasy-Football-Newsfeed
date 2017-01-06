-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2013 at 08:21 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `f_id` int(6) NOT NULL AUTO_INCREMENT,
  `tag` varchar(20) NOT NULL,
  `question` text NOT NULL,
  `uid` int(11) NOT NULL,
  `views` int(6) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`f_id`, `tag`, `question`, `uid`, `views`) VALUES
(1, 'real madrid', 'Was signing Gareth Bale a good decision or not?', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
  `f_id` int(6) NOT NULL,
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `u_id` (`u_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`f_id`, `c_id`, `content`, `u_id`) VALUES
(1, 1, 'i think it was a good decision', 1),
(1, 2, 'i dont think soo\r\nthere was no need to spend 100 million', 3),
(1, 3, 'i dont think so he seems good', 1),
(1, 4, 'test', 1),
(1, 5, 'test', 1),
(1, 6, 'test tell', 3),
(1, 7, 'test tell', 3),
(1, 8, 'test tell', 3),
(1, 9, 'test tell', 3),
(1, 10, 'hello', 3),
(1, 11, 'adfadf', 1),
(1, 12, 'asdfasdf', 3),
(1, 13, 'kjhg', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `forum_user`
--
CREATE TABLE IF NOT EXISTS `forum_user` (
`f_id` int(6)
,`tag` varchar(20)
,`question` text
,`uid` int(11)
,`fname` text
,`lname` text
,`country` text
,`team` text
);
-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `activation` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `email`, `password`, `activation`) VALUES
(1, 'purvilkamdar@outlook.com', 'purvil92', 1),
(3, 'purvilthemaster@gmail.com', 'purvil92', 1),
(4, 'saumyashah_31@yahoo.com', 'saumya31', 0),
(5, 'kekarnarshana@gmail.com', 'kekar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `country` text,
  `team` text,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `fname`, `lname`, `country`, `team`) VALUES
(1, 'Purvil', 'Kamdar', 'India', 'Chelsea'),
(3, 'Purvillll', 'Kamddaarrr', 'hhdhdhd', 'chelsea');

-- --------------------------------------------------------

--
-- Structure for view `forum_user`
--
DROP TABLE IF EXISTS `forum_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `forum_user` AS select `f`.`f_id` AS `f_id`,`f`.`tag` AS `tag`,`f`.`question` AS `question`,`u`.`uid` AS `uid`,`u`.`fname` AS `fname`,`u`.`lname` AS `lname`,`u`.`country` AS `country`,`u`.`team` AS `team` from (`forums` `f` join `user_details` `u`) where (`f`.`uid` = `u`.`uid`) WITH CASCADED CHECK OPTION;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_details` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD CONSTRAINT `forum_comments_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `forums` (`f_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `forum_comments_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_details` (`uid`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
