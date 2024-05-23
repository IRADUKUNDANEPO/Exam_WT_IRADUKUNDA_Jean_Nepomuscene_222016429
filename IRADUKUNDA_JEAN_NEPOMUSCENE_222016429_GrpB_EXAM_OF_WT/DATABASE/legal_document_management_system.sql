-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 09:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legal_document_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesshistory`
--

CREATE TABLE `accesshistory` (
  `AccessHistoryID` int(11) NOT NULL,
  `DocumentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AccessDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesshistory`
--

INSERT INTO `accesshistory` (`AccessHistoryID`, `DocumentID`, `UserID`, `AccessDate`) VALUES
(3, 6, 11, '2024-04-05'),
(4, 1, 6, '2024-04-06'),
(5, 5, 7, '2024-04-07'),
(6, 4, 4, '2024-04-08'),
(7, 3, 9, '2024-04-09'),
(8, 2, 10, '2024-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `accesslogs`
--

CREATE TABLE `accesslogs` (
  `LogID` int(11) NOT NULL,
  `DocumentID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AccessTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AccessType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesslogs`
--

INSERT INTO `accesslogs` (`LogID`, `DocumentID`, `UserID`, `AccessTime`, `AccessType`) VALUES
(1, 5, 5, '2024-04-05 08:00:00', 'Write'),
(2, 3, 11, '2024-04-06 09:00:00', 'Edit'),
(3, 1, 7, '2024-04-07 10:00:00', 'View'),
(4, 4, 8, '2024-04-08 11:00:00', 'Delete'),
(5, 5, 10, '2024-04-09 12:00:00', 'View'),
(6, 2, 9, '2024-04-10 13:00:00', 'Edit');

-- --------------------------------------------------------

--
-- Table structure for table `annotations`
--

CREATE TABLE `annotations` (
  `AnnotationID` int(11) NOT NULL,
  `DocumentID` int(11) DEFAULT NULL,
  `PageNumber` int(11) DEFAULT NULL,
  `Text` varchar(500) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `AnnotationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annotations`
--

INSERT INTO `annotations` (`AnnotationID`, `DocumentID`, `PageNumber`, `Text`, `AuthorID`, `AnnotationDate`) VALUES
(1, 3, 5, 'Important concept explained here.', 5, '2024-05-20 07:07:44'),
(2, 6, 10, 'Einstein was a genius.', 2, '2024-05-20 07:07:44'),
(3, 1, 15, 'Fascinating details about Roman society.', 3, '2024-05-20 07:07:44'),
(4, 4, 20, 'Powerful message about justice.', 6, '2024-05-20 07:07:44'),
(5, 5, 25, 'The smile is enigmatic.', 1, '2024-05-20 07:07:44'),
(6, 2, 30, 'Critics play a vital role in democracy.', 4, '2024-05-20 07:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AuthorID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorID`, `Name`, `Email`, `Gender`) VALUES
(1, 'John Doe', 'john@example.com', 'Male'),
(2, 'Jane Smith', 'jane@example.com', 'Female'),
(3, 'Denysee Jacky', 'jackydenysee55@example.com', 'Female'),
(4, 'Emily Brown', 'emily@example.com', 'Male'),
(5, 'David Lee', 'david@example.com', 'Male'),
(6, 'Sarah Taylor', 'sarah@example.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Technology'),
(2, 'Science'),
(3, 'History'),
(4, 'Literature'),
(5, 'Art'),
(6, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `DocumentID` int(11) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `CommentText` varchar(500) DEFAULT NULL,
  `DateAdded` date DEFAULT NULL,
  `CommentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `DocumentID`, `AuthorID`, `UserID`, `CommentText`, `DateAdded`, `CommentDate`) VALUES
(1, 5, 2, 6, 'Great introduction!', '2024-04-05', '2024-05-20 07:04:03'),
(3, 6, 4, 9, 'Love learning about ancient civilizations.', '2024-04-07', '2024-05-20 07:04:03'),
(4, 4, 5, 8, 'One of my favorite books!', '2024-04-08', '2024-05-20 07:04:03'),
(5, 1, 6, 7, 'The Mona Lisa is truly a masterpiece.', '2024-04-09', '2024-05-20 07:04:03'),
(6, 3, 1, 11, 'Important topic to discuss.', '2024-04-10', '2024-05-20 07:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `DocumentID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Content` varchar(400) DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `MetadataID` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`DocumentID`, `Title`, `Content`, `AuthorID`, `CategoryID`, `MetadataID`, `CreatedAt`) VALUES
(1, 'Introduction to AI', 'Lorem ipsum dolor sit amet...', 4, 3, 1, '2024-05-20 07:01:15'),
(2, 'The Theory of Relativity', 'Lorem ipsum dolor sit amet...', 4, 3, 2, '2024-05-20 07:01:15'),
(3, 'Ancient Rome', 'Lorem ipsum dolor sit amet...', 3, 1, 3, '2024-05-20 07:01:15'),
(4, 'To Kill a Mockingbird', 'Lorem ipsum dolor sit amet...', 4, 4, 4, '2024-05-20 07:01:15'),
(5, 'The Mona Lisa', 'Lorem ipsum dolor sit amet...', 2, 4, 5, '2024-05-20 07:01:15'),
(6, 'Democracy and its Critics', 'Lorem ipsum dolor sit amet...', 1, 6, 6, '2024-05-20 07:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `MetadataID` int(11) NOT NULL,
  `CreationDate` date DEFAULT NULL,
  `LastModifiedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`MetadataID`, `CreationDate`, `LastModifiedDate`) VALUES
(1, '2024-04-01', '2024-04-05'),
(2, '2024-04-02', '2024-04-06'),
(3, '2024-04-03', '2024-04-07'),
(4, '2024-04-04', '2024-04-08'),
(5, '2024-05-02', '2024-05-23'),
(6, '2024-05-06', '2024-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `TagID` int(11) NOT NULL,
  `TagName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TagID`, `TagName`) VALUES
(1, 'bbbb'),
(3, 'AI'),
(4, 'Physics'),
(5, 'Ancient History'),
(6, 'Literary Classic'),
(7, 'Artwork'),
(8, 'Politics'),
(9, 'nhgfds'),
(10, 'nhgfds');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gender` varchar(34) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `firstname`, `lastname`, `username`, `gender`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(3, 'IRADUKUNDA', 'NEPO', 'IRADUKUNDANEPO69', 'male', 'nepoiradukunda69@gmail.com', '0729198022', '$2y$10$YXIKWawfJLSx1b6j8/vQDOwTh7JXX8LdoRAOuF18fcuy2WPMNPp.m', '2024-05-04 16:05:50', NULL, 0),
(4, 'domina', 'Ntakirutimana', 'domina5', 'female', 'dominantakirut@gmail.com', '0784533222', '$2y$10$Uklt73BnvQ7BK.GnS8idV.ZGXR.I8qrYPCDfNuyzSGKe4d0MJ5yzW', '2024-05-04 16:08:50', NULL, 0),
(5, 'murengezi', 'jackson', 'jackmurengezi', 'male', 'murengezij@gmail.com', '0783222111', '$2y$10$TUDihnFy69CUFMmDJ6Mgx.t8tu98/7jksO2Vle4JK2b5Sun/jhHxi', '2024-05-06 02:28:59', NULL, 0),
(6, 'iribagiza', 'sandrine', 'sando', 'female', 'iribagizasandrn@gmail.com', '0784533222', '$2y$10$d4X9XqF3r4moFF1/Yl7q9uRUrOqc/SQDHvbkB4elBaD4F9o.dK/Ja', '2024-05-06 02:30:00', NULL, 0),
(7, 'ishimwe', 'emerine', 'emerinishimwe', 'female', 'ishimwemerine@gmail.com', '07854443213', '$2y$10$OaXITPKYHMuBIUVblaC61.yigxVhahttAA9wTHlA5lph068SKW4va', '2024-05-06 02:31:06', NULL, 0),
(8, 'peter', 'habana', 'habanapeter', 'male', 'habanap@gmail.com', '0732211114', '$2y$10$EDr8/oYxA8tQ6U1PfxCg/eu82GsgxLYAmu2k7G60.29pLSftOLJ46', '2024-05-06 02:32:49', NULL, 0),
(9, 'samwel', 'iraguha', 'samiraguha', 'male', 'iraguhasam@gmail.com', '0783222111', '$2y$10$0rFGmrXgyAILtKFmsjzbiuEX.47fQ4bjXoTxbUK9IryKrju9vMPQG', '2024-05-06 10:33:36', NULL, 0),
(10, 'diane', 'aimee', 'aimee', 'female', 'aime@gmail.com', '0729198022', '$2y$10$Xeee8gY4A5kAST/kf1n9.eZeeS3PzKc/2uoVRaCN7dTKO/Hlwp0BO', '2024-05-08 14:18:43', NULL, 0),
(11, 'fideline', 'ishimwe', 'mpundu', 'male', 'ishimwe@gmail.com', '546789', '$2y$10$sTXiUMpMv0yvS6w9hx4oteDpVBU3DNc4.uS/oOdPwGN6RPSHpIgPC', '2024-05-08 14:40:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `VersionID` int(11) NOT NULL,
  `DocumentID` int(11) DEFAULT NULL,
  `VersionNumber` int(11) DEFAULT NULL,
  `DateModified` date DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`VersionID`, `DocumentID`, `VersionNumber`, `DateModified`, `CreatedAt`) VALUES
(1, 4, 1, '2024-04-05', '2024-05-20 07:02:34'),
(2, 4, 1, '2024-04-06', '2024-05-20 07:02:34'),
(3, 6, 1, '2024-04-07', '2024-05-20 07:02:34'),
(4, 2, 1, '0000-00-00', '2024-05-20 07:02:34'),
(5, 1, 1, '2024-04-09', '2024-05-20 07:02:34'),
(6, 3, 1, '2024-04-10', '2024-05-20 07:02:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesshistory`
--
ALTER TABLE `accesshistory`
  ADD PRIMARY KEY (`AccessHistoryID`),
  ADD KEY `DocumentID` (`DocumentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `accesslogs`
--
ALTER TABLE `accesslogs`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `DocumentID` (`DocumentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `annotations`
--
ALTER TABLE `annotations`
  ADD PRIMARY KEY (`AnnotationID`),
  ADD KEY `DocumentID` (`DocumentID`),
  ADD KEY `AuthorID` (`AuthorID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AuthorID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `DocumentID` (`DocumentID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`DocumentID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `MetadataID` (`MetadataID`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`MetadataID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`VersionID`),
  ADD KEY `DocumentID` (`DocumentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesshistory`
--
ALTER TABLE `accesshistory`
  MODIFY `AccessHistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `accesslogs`
--
ALTER TABLE `accesslogs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `annotations`
--
ALTER TABLE `annotations`
  MODIFY `AnnotationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `AuthorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `DocumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `MetadataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `TagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `VersionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesshistory`
--
ALTER TABLE `accesshistory`
  ADD CONSTRAINT `accesshistory_ibfk_1` FOREIGN KEY (`DocumentID`) REFERENCES `documents` (`DocumentID`),
  ADD CONSTRAINT `accesshistory_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `accesslogs`
--
ALTER TABLE `accesslogs`
  ADD CONSTRAINT `accesslogs_ibfk_1` FOREIGN KEY (`DocumentID`) REFERENCES `documents` (`DocumentID`),
  ADD CONSTRAINT `accesslogs_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `annotations`
--
ALTER TABLE `annotations`
  ADD CONSTRAINT `annotations_ibfk_1` FOREIGN KEY (`DocumentID`) REFERENCES `documents` (`DocumentID`),
  ADD CONSTRAINT `annotations_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`DocumentID`) REFERENCES `documents` (`DocumentID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `authors` (`AuthorID`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `documents_ibfk_3` FOREIGN KEY (`MetadataID`) REFERENCES `metadata` (`MetadataID`);

--
-- Constraints for table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `versions_ibfk_1` FOREIGN KEY (`DocumentID`) REFERENCES `documents` (`DocumentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
