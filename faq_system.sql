-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 03:49 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faq_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Internet'),
(4, 'Programming'),
(5, 'Networking'),
(8, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `search_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `question_id`, `search_time`) VALUES
(1, 10, '2018-01-17 02:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `images` mediumtext NOT NULL,
  `titles` varchar(200) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `prices` int(50) NOT NULL,
  `availabilities` tinyint(1) NOT NULL COMMENT '1=In_Stock;2=Not_in_stock',
  `productsDetailes` text NOT NULL,
  `addToCart` tinyint(1) NOT NULL COMMENT '1=addtocart;2=nottocart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `images`, `titles`, `categories`, `prices`, `availabilities`, `productsDetailes`, `addToCart`) VALUES
(6, '', 'IntelÂ® Coreâ„¢ i7 Processors New Computer', 'Computer', 800, 1, 'Too more watch google.', 1),
(7, '', 'Apple iPhone X | iPhone 10 | Spark NZ', 'Phone', 600, 1, 'Apple\'s 10th-anniversary smartphone went on sale across the globe on 3 November, with thousands of customers queueing to get their hands on the £1,000 handset. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `questions` varchar(200) CHARACTER SET latin1 NOT NULL,
  `answers` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `category_id`, `questions`, `answers`) VALUES
(8, 5, 'What Is Networking?', 'A network consists of two or more computers that are linked in order to share resources (such as printers and CDs), exchange files, or allow electronic communications. The computers on a network may be linked through cables, telephone lines, radio waves, satellites, or infrared light beams.'),
(10, 3, 'What is Internet?', 'The Internet, sometimes called simply \"the Net,\" is a worldwide system of computer networks - a network of networks in which users at any one computer can, if they have permission, get information from any other computer (and sometimes talk directly to users at other computers).'),
(11, 5, 'What is the definition of a computer network?', 'A computer network or data network is a digital telecommunications network which allows nodes to share resources. In computer networks, networked computing devices exchange data with each other using a data link. The connections between nodes are established using either cable media or wireless media.'),
(12, 5, 'What is network easy definition?', 'A computer network is a set of computers connected together for the purpose of sharing resources. The most common resource shared today is connection to the Internet. Other shared resources can include a printer or a file server.'),
(13, 5, 'What is the network and its types?', 'A local area network, or LAN, consists of a computer network at a single site, typically an individual office building. A LAN is very useful for sharing resources, such as data storage and printers. LANs can be built with relatively inexpensive hardware, such as hubs, network adapters and Ethernet cables.'),
(14, 5, 'What are the different types of networks?', '    LAN - Local Area Network.\r\n    WAN - Wide Area Network.\r\n    WLAN - Wireless Local Area Network.\r\n    MAN - Metropolitan Area Network.\r\n    SAN - Storage Area Network, System Area Network, Server Area Network, or sometimes Small Area Network.'),
(15, 8, 'What is all about technology?', 'Technology (\"science of craft\", from Greek Ï„Î­Ï‡Î½Î·, techne, \"art, skill, cunning of hand\"; and -Î»Î¿Î³Î¯Î±, -logia) is the collection of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation. ... Technology has many effects.'),
(16, 8, 'What are the examples of technology?', 'Most people know technology when they see it, but what exactly is technology? Technology is the way we apply scientific knowledge for practical purposes. It includes machines (like computers) but also techniques and processes (like the way we produce computer chips).'),
(17, 8, 'What is the simple definition of technology?', 'Computers and the internet are examples of technology. Licensed from iStockPhoto. noun. The definition of technology is science or knowledge put into practical use to solve problems or invent useful tools.'),
(18, 4, 'What is definition in programming?', 'program definition. A series of instructions given to a computer to direct it to carry out certain operations. The term code is often used to denote large-scale operations.'),
(19, 4, 'What is computer programming meaning?', 'Computer programming (often shortened to programming) is a process that leads from an original formulation of a computing problem to executable computer programs. ... Source code is written in one or more programming languages.'),
(20, 4, 'What are the different types of programming?', 'ActionScript.\r\nAda (multi-purpose language)\r\nALGOL (extremely influential language design â€“ the second high level language compiler) ...\r\nAteji PX, an extension of the Java language for parallelism.\r\nBASIC (some dialects, including the first version of Dartmouth BASIC)'),
(21, 3, 'What is Internet in simple terms?', 'Jump to: navigation, search. The internet is the biggest world-wide communication network of computers. It has millions of smaller domestic, academic, business, and government networks, which together carry many different kinds of information. The term is sometimes abbreviated as \"the net\".'),
(22, 3, 'What is an example of Internet?', 'A means of connecting a computer to any other computer anywhere in the world via dedicated routers and servers. When two computers are connected over the Internet, they can send and receive all kinds of information such as text, graphics, voice, video, and computer programs.'),
(23, 3, 'Why do you use the Internet?', 'Communication â€“ People use the Internet to communicate with one another. ... Without the Internet, it would be both more expensive and slower to maintain personal and professional relationships. 3. Entertainment â€“ Many people use the Internet to enjoy themselves and to engage in personal interests.'),
(24, 2, 'What Is Hardware?', 'Computer hardware is the physical parts or components of a computer, such as the monitor, keyboard, computer data storage, graphic card, sound card and motherboard.'),
(25, 2, 'What are examples of hardware?', 'Components, Definition & Examples. Computer hardware is the collection of physical parts of a computer system. This includes the computer case, monitor, keyboard, and mouse. It also includes all the parts inside the computer case, such as the hard disk drive, motherboard, video card, and many others.'),
(26, 2, 'What are the different types of computer hardware?', 'Your computing experience is made up of interactions with hardware and software. The hardware is all the tangible computer equipment, such as the monitor, central processing unit, keyboard, and mouse. The main body of a computer is the system unit.'),
(27, 2, 'What is the input and output?', 'For instance, a keyboard or computer mouse is an input device for a computer, while monitors and printers are output devices. Devices for communication between computers, such as modems and network cards, typically perform both input and output operations.'),
(28, 1, 'What is the software?', 'Software is a program that enables a computer to perform a specific task, as opposed to the physical components of the system (hardware).'),
(29, 1, 'What is the application software?', 'Application software can be divided into two general classes: systems software and applications software. Applications software (also called end-user programs) include such things as database programs, word processors, Web browsers and spreadsheets.'),
(30, 1, 'What is an example of a software?', 'Software. Sometimes abbreviated as SW and S/W, software is a collection of instructions that enable the user to interact with a computer, its hardware, or perform tasks. Without software, most computers would be useless. ... The picture to the right shows a Microsoft Excel box, an example of a spreadsheet software program.'),
(31, 1, 'How To Develop A Software?', 'A Great A Practice.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET ucs2 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '2=inactive; 1= active',
  `type` tinyint(1) NOT NULL COMMENT '1=superadmin; 2=users;3=clients'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `is_active`, `type`) VALUES
(24, 'Super Admin', 'superadmin@faq.com', '35079ad4b445ff2e0920afb764e56ff2', 1, 1),
(25, 'Shahadot', 'shahadot@faq.com', '35079ad4b445ff2e0920afb764e56ff2', 1, 2),
(26, 'Client-1', 'client@faq.com', '35079ad4b445ff2e0920afb764e56ff2', 1, 3),
(27, 'Client-2', 'client2@faq.com', '35079ad4b445ff2e0920afb764e56ff2', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
