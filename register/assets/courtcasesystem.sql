-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2018 at 05:01 PM
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
-- Database: `courtcasesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `chargesheets`
--

CREATE TABLE `chargesheets` (
  `id` int(11) NOT NULL,
  `policetype` varchar(20) DEFAULT NULL,
  `ob` int(100) DEFAULT NULL,
  `identitynumber` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dateofbirth` varchar(100) DEFAULT NULL,
  `charge` text,
  `dateofarrest` varchar(100) DEFAULT NULL,
  `sendstatus` varchar(20) DEFAULT NULL,
  `addedby` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chargesheets`
--

INSERT INTO `chargesheets` (`id`, `policetype`, `ob`, `identitynumber`, `name`, `gender`, `dateofbirth`, `charge`, `dateofarrest`, `sendstatus`, `addedby`) VALUES
(44, 'policeUnderStation', 637288, '30913240', 'Peter Kariuki Mutuura', 'female', '2018-03-28', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque accusamus dolor at quibusdam pariatur itaque totam facilis ratione sit laborum ducimus voluptatem vitae atque consequuntur qui dolorem quod, distinctio, commodi.', '2018-03-28', 'prosecutor-Approved', 'malic songs'),
(45, 'policeUnderStation', 592837, '30913240', 'Peter Kariuki', 'female', '2018-03-29', 'I\'m Tried Of Trying', '2018-03-29', 'prosecutor-Rejected', 'Police Officer');

-- --------------------------------------------------------

--
-- Table structure for table `chargesheetstatus`
--

CREATE TABLE `chargesheetstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courtrecord`
--

CREATE TABLE `courtrecord` (
  `id` int(11) NOT NULL,
  `casenumber` varchar(100) DEFAULT NULL,
  `chargesheet` int(100) DEFAULT NULL,
  `court` varchar(100) DEFAULT NULL,
  `pleaDate` varchar(100) DEFAULT NULL,
  `plea` varchar(100) DEFAULT NULL,
  `plea_status` varchar(100) DEFAULT NULL,
  `hearingDate` varchar(100) DEFAULT NULL,
  `judgesNotes` text,
  `sentence` text,
  `caseStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courtrecord`
--

INSERT INTO `courtrecord` (`id`, `casenumber`, `chargesheet`, `court`, `pleaDate`, `plea`, `plea_status`, `hearingDate`, `judgesNotes`, `sentence`, `caseStatus`) VALUES
(1, '30913240', 44, 'Nairobi', '2018-03-23', 'Not Guilty', 'Bond', '2018-03-30', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.', '2 years', 'Closed'),
(2, '30913240', 44, 'Nairobi', '2018-03-29', 'Guilty', 'Bond', '2018-03-30', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.\n    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, excepturi nihil nesciunt, placeat sunt quod, voluptatem asperiores nam illo accusantium tempore quaerat. Voluptatum labore molestiae accusantium adipisci, rerum tempora eos.', '2 years', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `name`) VALUES
(1, 'Prosecutor'),
(2, 'Police'),
(3, 'Clerk'),
(4, 'Judge/Magistrate');

-- --------------------------------------------------------

--
-- Table structure for table `prosecutorremarks`
--

CREATE TABLE `prosecutorremarks` (
  `id` int(11) NOT NULL,
  `prosecutor` varchar(255) DEFAULT NULL,
  `chargesheet` int(11) DEFAULT NULL,
  `remarks` text,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prosecutorremarks`
--

INSERT INTO `prosecutorremarks` (`id`, `prosecutor`, `chargesheet`, `remarks`, `status`) VALUES
(39, 'petorotheprosecutor@mailinator.com', 44, 'This is Awesome', 'Approved'),
(40, 'petorotheprosecutor@mailinator.com', 45, 'This is One Which is Declined', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `occupation` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `occupation`, `email`, `password`, `image`) VALUES
(32, 'brenda', 4, 'brendathejudge@mailinator', '5b952234f487ec770eabcf4b83cf038622657334', NULL),
(33, 'malic songs', 2, 'malicthepolice@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', NULL),
(34, 'WhereYouAt', 1, 'meetYa@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', 'images/profilepic/1522412977Upstate-Kenya-Auctioneers.png'),
(35, 'sky', 2, 'sky@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', 'images/profilepic/1522411694blueTriangle.jpg'),
(36, 'Mallowtheking', 1, 'Mallowtheking@mailinator.com', '35bd3c18e45a69b7de57b9bf71059df14149715f', NULL),
(37, 'Mallowtheking', 3, 'Mallowtheking@mailinator.com', '35bd3c18e45a69b7de57b9bf71059df14149715f', NULL),
(38, 'Mallowtheking', 4, 'Mallowtheking@mailinator.com', '35bd3c18e45a69b7de57b9bf71059df14149715f', NULL),
(39, 'Mallowtheking', 2, 'Mallowtheking@mailinator.com', '35bd3c18e45a69b7de57b9bf71059df14149715f', NULL),
(40, 'petorothejudge', 4, 'peterothejudge@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', ''),
(41, 'Police Officer', 2, 'policeofficer@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', NULL),
(42, 'katerina', 4, 'katerinathejudge@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', 'images/profilepic/1522406556be-smart.jpeg'),
(43, 'Pete', 3, 'petetheclerk@mailinator.com', '5b952234f487ec770eabcf4b83cf038622657334', 'images/profilepic/1522415946blueTriangle.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chargesheets`
--
ALTER TABLE `chargesheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chargesheetstatus`
--
ALTER TABLE `chargesheetstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courtrecord`
--
ALTER TABLE `courtrecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chargesheetnumber` (`chargesheet`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prosecutorremarks`
--
ALTER TABLE `prosecutorremarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chargesheet` (`chargesheet`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `occupation` (`occupation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chargesheets`
--
ALTER TABLE `chargesheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `chargesheetstatus`
--
ALTER TABLE `chargesheetstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courtrecord`
--
ALTER TABLE `courtrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prosecutorremarks`
--
ALTER TABLE `prosecutorremarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courtrecord`
--
ALTER TABLE `courtrecord`
  ADD CONSTRAINT `chargesheetnumber` FOREIGN KEY (`chargesheet`) REFERENCES `chargesheets` (`id`);

--
-- Constraints for table `prosecutorremarks`
--
ALTER TABLE `prosecutorremarks`
  ADD CONSTRAINT `chargesheet` FOREIGN KEY (`chargesheet`) REFERENCES `chargesheets` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `occupation` FOREIGN KEY (`occupation`) REFERENCES `occupation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
