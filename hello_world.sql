-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2019 at 12:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hello_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(22) NOT NULL,
  `admin_pass` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'saajid@yahoo.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(55) NOT NULL,
  `book_author` varchar(55) NOT NULL,
  `book_cover` text NOT NULL,
  `book_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `book_cover`, `book_file`) VALUES
(9, 'Advanced Game Design with Html5 and JavaScript', 'Jorg Baily', 'Capture.JPG', 0x416476616e63656447616d6544657369676e7769746848746d6c35616e644a6176615363726970742d312e706466),
(10, 'PHP For Beginners', 'Kumara', 'Capture3.JPG', 0x4c6561726e696e67205048502c204d7953514c20204a6176615363726970742c203574682045646974696f6e2e706466);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `q_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `q_number`, `is_correct`, `text`) VALUES
(27, 7, 0, 'B'),
(28, 7, 0, 'C'),
(29, 7, 1, 'D'),
(30, 8, 1, 'E'),
(31, 8, 0, 'R'),
(32, 8, 0, 'T'),
(33, 8, 0, 'I'),
(38, 2, 0, 'signed short'),
(39, 2, 1, 'unsigned short'),
(40, 2, 0, 'long'),
(41, 2, 0, 'int'),
(42, 3, 0, '* (asterisk)'),
(43, 3, 0, '| (pipeline)'),
(44, 3, 0, '- (hyphen)'),
(45, 3, 1, '_ (underscore)'),
(46, 4, 0, 'For'),
(47, 4, 0, 'If'),
(48, 4, 1, 'do-while'),
(49, 4, 0, 'while'),
(50, 5, 0, 'Multiple cases are right'),
(51, 5, 0, 'No case is right'),
(52, 5, 1, 'Single case is right'),
(53, 5, 0, 'All cases are right'),
(54, 6, 0, 'Software'),
(55, 6, 1, 'Programmer'),
(56, 6, 0, 'Program users'),
(57, 6, 0, 'Declared automatically'),
(58, 7, 0, 'Explain used variables'),
(59, 7, 0, 'Explain module functions'),
(60, 7, 0, 'Highlight program modules'),
(61, 7, 1, 'All of the above'),
(62, 8, 0, 'Single dimension'),
(63, 8, 1, 'Two dimension'),
(64, 8, 0, 'Three dimension'),
(65, 8, 0, 'Four dimension'),
(68, 1, 0, 'JAVA'),
(69, 1, 1, 'HTML'),
(70, 1, 0, 'PHP'),
(71, 1, 0, 'Python'),
(72, 7, 0, 'Integers'),
(73, 7, 0, 'Doubles'),
(74, 7, 1, 'Booleans'),
(75, 7, 0, 'Strings'),
(76, 8, 0, 'Private Home Page'),
(77, 8, 0, 'Personal Home Page'),
(78, 8, 0, 'Personal Hypertext Processor'),
(79, 8, 1, 'PHP: Hypertext Preprocessor'),
(80, 9, 1, 'Answer 1'),
(81, 9, 0, 'Answer 2'),
(82, 9, 0, 'Answer 3'),
(83, 9, 0, 'Answer 4'),
(84, 10, 1, 'Answer 1'),
(85, 10, 0, 'Answer 2'),
(86, 10, 0, 'Answer 3'),
(87, 10, 0, 'Answer 4');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(37, 53, 15, 'nice', 'Account Two', '2018-11-12 14:48:30'),
(38, 53, 15, 'me 2', 'Programming Boy', '2018-11-13 03:44:00'),
(39, 53, 15, 'me 2', 'Programming Boy', '2018-11-13 03:44:03'),
(40, 53, 15, 'me 2', 'Programming Boy', '2018-11-13 03:44:07'),
(41, 53, 15, 'me 2', 'Programming Boy', '2018-11-13 03:44:09'),
(42, 54, 17, 'I can Help You', 'Account Three', '2018-11-13 10:57:21'),
(43, 54, 17, 'Me also can help u', 'Saajid Muhmmad', '2018-11-13 10:57:39'),
(44, 60, 12, 'Hello ', 'David Beckham', '2018-11-20 08:10:40'),
(45, 60, 12, 'Hello ', 'David Beckham', '2018-11-20 08:12:15'),
(46, 61, 14, 'No ok', 'Programming Boy', '2018-11-20 08:38:45'),
(47, 60, 12, 'ok ', 'Programming Boy', '2018-11-20 08:38:54'),
(48, 52, 16, 'hiii', 'Saajid Muhmmad', '2018-11-27 16:22:55'),
(49, 64, 15, 'ok', 'Saajid Muhmmad', '2018-12-06 13:24:47'),
(50, 68, 15, 'ok', 'Saajid Muhmmad', '2018-12-24 13:36:25'),
(53, 72, 29, 'Ook contact me', 'Paul Colingwood', '2019-01-01 06:46:43'),
(54, 81, 32, 'Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post Test Post ', 'Neymar', '2019-01-30 15:48:51'),
(55, 80, 33, 'i donno', 'mohamed', '2019-02-06 04:00:18'),
(56, 90, 32, 'kjjhkj', 'Neymar', '2019-03-06 06:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciver` int(11) NOT NULL,
  `msg_sub` varchar(200) NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender`, `reciver`, `msg_sub`, `reply`, `status`, `msg_date`) VALUES
(1, 29, 31, 'hello', 'Hello', 'read', '2019-01-05 08:41:42'),
(2, 29, 31, 'Hello', 'Hello', 'read', '2019-01-05 08:43:08'),
(3, 29, 31, 'Hello', 'Hello', 'read', '2019-01-05 08:43:40'),
(4, 31, 30, 'Hello Aadhjil', 'Hello', 'read', '2019-01-16 16:06:32'),
(5, 29, 31, 'Hiii', '---', 'read', '2019-01-05 08:53:46'),
(6, 31, 29, 'hiii', 'Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. Articles are words that define a noun as specific or unspecific. Consider the following examples:\r\nAfter the long day, the cup of tea tasted particularly good.\r\nBy using the article the, weâ€™ve shown that it was one specific day that was long and one specific cup of tea that tasted good.\r\nAfter a long day, a cup of tea tastes particularly good.\r\nBy using the article a, weâ€™ve created a general statement, implying that any cup of tea would taste good after any long day. ', 'read', '2019-01-05 09:05:23'),
(7, 31, 29, 'Hello Fasly', 'hiii', 'read', '2019-01-14 17:17:32'),
(8, 32, 31, 'Help Me plx', 'ok', 'read', '2019-01-15 04:21:44'),
(9, 33, 35, 'Hello', 'hello', 'read', '2019-01-16 06:14:20'),
(10, 33, 31, 'Hello Saajid. Can u explain What is java', 'Yes. but ask me later', 'read', '2019-01-30 10:17:39'),
(11, 33, 35, 'h6kkji6kni', '---', 'unread', '2019-02-06 05:30:43'),
(12, 33, 32, 'Hello JR', 'hii darlig wht to do \r\n', 'read', '2019-03-04 06:06:09'),
(13, 32, 31, 'jhgjhgjhghj', '---', 'read', '2019-03-06 06:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `topic_id` bigint(20) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `is_hidden` tinyint(1) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `is_hidden`, `post_date`) VALUES
(83, 33, 3, 'What is PHP', 'What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP What is PHP ', 0, '2019-03-05 19:18:16'),
(84, 33, 4, 'What is XML? ', 'What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML What is XML ', 0, '2019-03-05 19:18:39'),
(87, 32, 2, 'JavaScript ', 'JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript JavaScript ', 0, '2019-03-05 19:20:11'),
(88, 32, 5, 'What is Best IDE for Android ', 'What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android What is Best IDE for Android ', 0, '2019-03-05 19:20:46'),
(89, 32, 6, 'Any IOS Developer Here?', 'Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here Any IOS Developer Here v', 0, '2019-03-05 19:21:05'),
(90, 32, 1, 'This is Test', 'This is Test This is Test This is Test', 0, '2019-05-17 15:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `quizzer`
--

CREATE TABLE `quizzer` (
  `q_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzer`
--

INSERT INTO `quizzer` (`q_number`, `text`) VALUES
(1, 'Which is not a programming language in these'),
(2, 'Which data type is most suitable for storing a number 65000 in a 32-bit system?'),
(3, 'Which of the following special symbol allowed in a variable name?'),
(4, 'Name the loop that executes at least once. '),
(5, 'Default value will be consider in switch statement when'),
(6, 'Size of an array is declared by '),
(7, 'Which of the following type of variables have only two possible values either true or false?'),
(8, 'What does PHP stand for?'),
(9, 'This is Test Quiz?');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_title`) VALUES
(1, 'HTML & CSS'),
(2, 'JAVASCRIPT'),
(3, 'SERVER SIDE'),
(4, 'XML / JSON'),
(5, 'ANDROID'),
(6, 'IOS & OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `t_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `t_title` varchar(110) NOT NULL,
  `t_tutorial` text NOT NULL,
  `t_time` datetime NOT NULL,
  `is_hidden` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`t_id`, `tutor_id`, `t_title`, `t_tutorial`, `t_time`, `is_hidden`) VALUES
(4, 1, 'Java Introduction', '<h2>What is Java?</h2>\r\n<p>Java is a popular programming language, created in 1995.</p>\r\n<p>It is owned by Oracle, and more than <strong>3 billion</strong> devices run Java.</p>\r\n<p>It is used for:</p>\r\n<ul>\r\n<li>Mobile applications (specially Android apps)</li>\r\n<li>Desktop applications</li>\r\n<li>Web applications</li>\r\n<li>Web servers and application servers</li>\r\n<li>Games</li>\r\n<li>Database connection</li>\r\n<li>And much, much more!</li>\r\n</ul>\r\n<hr />\r\n<h2>Why Use Java?</h2>\r\n<ul>\r\n<li>Java works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc.)</li>\r\n<li>It is one of the most popular programming language in the world</li>\r\n<li>It is easy to learn and simple to use</li>\r\n<li>It is open-source and free</li>\r\n<li>It is secure, fast and powerful</li>\r\n<li>It has a huge community support (tens of millions of developers)</li>\r\n</ul>', '2019-03-05 22:37:20', 0),
(5, 1, 'Python Introduction', '<h2>What is Python?</h2>\r\n<p>Python is a popular programming language. It was created in 1991 by Guido van Rossum.</p>\r\n<p>It is used for:</p>\r\n<ul>\r\n<li>web development (server-side),</li>\r\n<li>software development,</li>\r\n<li>mathematics,</li>\r\n<li>system scripting.</li>\r\n</ul>\r\n<h3>What can Python do?</h3>\r\n<ul>\r\n<li>Python can be used on a server to create web applications.</li>\r\n<li>Python can be used alongside software to create workflows.</li>\r\n<li>Python can connect to database systems. It can also read and modify files.</li>\r\n<li>Python can be used to handle big data and perform complex mathematics.</li>\r\n<li>Python can be used for rapid prototyping, or for production-ready software development.</li>\r\n</ul>\r\n<h3>Why Python?</h3>\r\n<ul>\r\n<li>Python works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc).</li>\r\n<li>Python has a simple syntax similar to the English language.</li>\r\n<li>Python has syntax that allows developers to write programs with fewer lines than some other programming languages.</li>\r\n<li>Python runs on an interpreter system, meaning that code can be executed as soon as it is written. This means that prototyping can be very quick.</li>\r\n<li>Python can be treated in a procedural way, an object-orientated way or a functional way.</li>\r\n</ul>\r\n<h3>Good to know</h3>\r\n<ul>\r\n<li>The most recent major version of Python is Python 3, which we shall be using in this tutorial. However, Python 2, although not being updated with anything other than security updates, is still quite popular.</li>\r\n<li>In this tutorial Python will be written in a text editor. It is possible to write Python in an Integrated Development Environment, such as Thonny, Pycharm, Netbeans or Eclipse which are particularly useful when managing larger collections of Python files.</li>\r\n</ul>\r\n<h3>Python Syntax compared to other programming languages</h3>\r\n<ul>\r\n<li>Python was designed to for readability, and has some similarities to the English language with influence from mathematics.</li>\r\n<li>Python uses new lines to complete a command, as opposed to other programming languages which often use semicolons or parentheses.</li>\r\n<li>Python relies on indentation, using whitespace, to define scope; such as the scope of loops, functions and classes. Other programming languages often use curly-brackets for this purpose.</li>\r\n</ul>', '2019-03-05 22:39:53', 0),
(6, 2, 'lkhjfkjsld', '<h1 style=\"text-align: center;\">ihkljklfjsldf</h1>\r\n<p>jbjmbmbmbkhkj</p>', '2019-03-06 11:36:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `f_name` varchar(55) NOT NULL,
  `l_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(22) NOT NULL,
  `pro_pic` text NOT NULL,
  `qualification` varchar(22) NOT NULL,
  `reg_date` date NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `f_name`, `l_name`, `email`, `password`, `pro_pic`, `qualification`, `reg_date`, `approved`) VALUES
(1, 'Saajid', 'Muhammad', 'saajidmhmd@yahoo.com', '123123', '', 'BSc(hons)', '2019-03-01', 1),
(2, 'Nusky', 'Ahamed', 'nusky@yahoo.com', '123123', '', 'PHD in C++', '2019-03-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_lname` varchar(55) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_country` varchar(100) NOT NULL,
  `u_gender` varchar(100) NOT NULL,
  `u_dob` date NOT NULL,
  `u_image` text NOT NULL,
  `register_date` date NOT NULL,
  `last_login` date NOT NULL,
  `status` text NOT NULL,
  `is_blocked` tinyint(1) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_lname`, `u_pass`, `u_email`, `u_country`, `u_gender`, `u_dob`, `u_image`, `register_date`, `last_login`, `status`, `is_blocked`, `posts`) VALUES
(29, 'Fasly', 'Zaman', '123123', 'fasly@yahoo.com', 'Australia', 'Male', '1997-12-12', '2ea6f95e3915a7e866ccea584c48da20.jpg', '2019-01-01', '2019-01-01', 'unverified', 0, 'yes'),
(30, 'Mohammed', 'Aadhil', 'mawanella', 'maadhil89@gmail.com', 'Sri Lanka', 'Male', '1997-02-12', '20171027131359_image1.jpg', '2019-01-01', '2019-01-01', 'unverified', 0, 'yes'),
(31, 'Saajid', 'Muhammad', '123123', 'saajidmhmd@yahoo.com', 'Aruba', 'Male', '1990-12-12', '70186_software-engineer-wallpaper.jpg', '2019-02-23', '2019-02-23', 'unverified', 0, 'NO'),
(32, 'Neymar', 'JR', '123123', 'njr10@yahoo.com', 'Brazil', 'Male', '1990-12-12', 'FDnm2jR0ydHMV3XGT2PYZhNoSatyzcCvEF6DITOcIH6mi6c4T_5alPDQYwOVvRfWzuM=h900.png.jpg', '2019-01-15', '2019-01-15', 'unverified', 0, 'yes'),
(34, 'Lional', 'Messi', '123123', 'messi10@yahoo.com', 'Argentina', 'Male', '1988-12-12', 'e0428d50-868a-4840-af87-b94579a94da4-460.jpeg', '2019-01-15', '2019-01-15', 'unverified', 0, 'NO'),
(35, 'Rickardo', 'Kaka', '123123', 'rkaak10@yahoo.com', 'Brazil', 'Male', '1984-12-12', 'kaka-1535629339707.jpg', '2019-01-15', '2019-01-15', 'unverified', 0, 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `quizzer`
--
ALTER TABLE `quizzer`
  ADD PRIMARY KEY (`q_number`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `quizzer`
--
ALTER TABLE `quizzer`
  MODIFY `q_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
