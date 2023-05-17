-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 11:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waitlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--
-- Creation: May 05, 2023 at 01:11 PM
-- Last update: May 06, 2023 at 09:48 AM
--

CREATE TABLE `messages` (
  `ID` int(255) NOT NULL,
  `RECEIVER` varchar(255) NOT NULL,
  `SENDER` varchar(255) NOT NULL,
  `BODY` text NOT NULL,
  `DATE` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='handles the messages of the project';

--
-- Truncate table before insert `messages`
--

TRUNCATE TABLE `messages`;
--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `RECEIVER`, `SENDER`, `BODY`, `DATE`) VALUES
(1, 'johndoe@example.com', 'janedoe@example.com', 'Hello Jane, how are you?', '2022-05-01 09:00:00'),
(2, 'bobsmith@example.com', 'alicejohnson@example.com', 'Hi Alice, can you send me that report?', '2022-05-02 14:30:00'),
(3, 'michaelbrown@example.com', 'karendavis@example.com', 'Hey Karen, did you get my email from yesterday?', '2022-05-03 10:15:00'),
(4, 'davidwilliams@example.com', 'jessicamartinez@example.com', 'Jessica, we need to talk about the project deadline', '2022-05-04 16:45:00'),
(5, 'thomasgarcia@example.com', 'jenniferbrown@example.com', 'Jennifer, can you join the meeting at 2 PM?', '2022-05-05 13:00:00'),
(6, 'christopherrodriguez@example.com', 'lisamiller@example.com', 'Lisa, I need your help with the presentation slides', '2022-05-06 11:30:00'),
(7, 'ryanmartinez@example.com', 'rebeccagonzalez@example.com', 'Rebecca, can you send me the contact details for that vendor?', '2022-05-07 08:45:00'),
(8, 'janedoe@example.com', 'johndoe@example.com', 'Hey John, I\'m doing well, thanks for asking. How about you?', '2022-05-01 09:15:00'),
(9, 'alicejohnson@example.com', 'bobsmith@example.com', 'Sure Bob, I\'ll send it to you in a few minutes', '2022-05-02 15:00:00'),
(10, 'karendavis@example.com', 'michaelbrown@example.com', 'Yes, I did. I\'ll reply to it shortly', '2022-05-03 10:30:00'),
(11, 'jessicamartinez@example.com', 'davidwilliams@example.com', 'Sure, let\'s schedule a meeting for tomorrow morning', '2022-05-04 17:00:00'),
(12, 'jenniferbrown@example.com', 'thomasgarcia@example.com', 'Sure Thomas, I\'ll be there', '2022-05-05 14:00:00'),
(13, 'lisamiller@example.com', 'christopherrodriguez@example.com', 'Of course Christopher, when do you need them?', '2022-05-06 12:00:00'),
(14, 'rebeccagonzalez@example.com', 'ryanmartinez@example.com', 'Sure Ryan, I\'ll send it to you right away', '2022-05-07 09:00:00'),
(15, 'johndoe@example.com', 'bobsmith@example.com', 'Bob, did you get my email from yesterday?', '2022-05-01 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: May 05, 2023 at 01:11 PM
-- Last update: May 06, 2023 at 09:28 AM
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Username` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Telephone` varchar(11) NOT NULL,
  `P_word` varchar(20) NOT NULL COMMENT 'user password ',
  `state` varchar(50) NOT NULL,
  `Country` varchar(56) NOT NULL,
  `Displayname` varchar(50) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `maxapps` int(3) NOT NULL,
  `avab` varchar(3) NOT NULL COMMENT 'availability',
  `zoomemail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Username`, `Email`, `Telephone`, `P_word`, `state`, `Country`, `Displayname`, `Title`, `maxapps`, `avab`, `zoomemail`) VALUES
(3, 'John', 'Doe', 'johndoe', 'johndoe@example.com', '+2348123456', 'password', 'Lagos', 'Nigeria', 'John Doe', 'Manager', 10, '', 'johndoe@example.com'),
(4, 'Jane', 'Doe', 'janedoe', 'janedoe@example.com', '+2348123456', 'password', 'Abuja', 'Nigeria', 'Jane Doe', 'Sales Executive', 10, '', 'janedoe@example.com'),
(5, 'Bob', 'Smith', 'bobsmith', 'bobsmith@example.com', '+2348123456', 'password', 'Port Harcourt', 'Nigeria', 'Bob Smith', 'Developer', 10, '', 'bobsmith@example.com'),
(6, 'Alice', 'Johnson', 'alicejohnson', 'alicejohnson@example.com', '+2348123456', 'password', 'Kano', 'Nigeria', 'Alice Johnson', 'Designer', 10, '', 'alicejohnson@example.com'),
(7, 'Michael', 'Brown', 'michaelbrown', 'michaelbrown@example.com', '+2348123456', 'password', 'Enugu', 'Nigeria', 'Michael Brown', 'Engineer', 10, '', 'michaelbrown@example.com'),
(8, 'Karen', 'Davis', 'karendavis', 'karendavis@example.com', '+2348123456', 'password', 'Owerri', 'Nigeria', 'Karen Davis', 'Administrator', 10, '', 'karendavis@example.com'),
(9, 'David', 'Williams', 'davidwilliams', 'davidwilliams@example.com', '+2348123456', 'password', 'Uyo', 'Nigeria', 'David Williams', 'Accountant', 10, '', 'davidwilliams@example.com'),
(10, 'Jessica', 'Martinez', 'jessicamartinez', 'jessicamartinez@example.com', '+2348123456', 'password', 'Ibadan', 'Nigeria', 'Jessica Martinez', 'Supervisor', 10, '', 'jessicamartinez@example.com'),
(11, 'Thomas', 'Garcia', 'thomasgarcia', 'thomasgarcia@example.com', '+2348123456', 'password', 'Lagos', 'Nigeria', 'Thomas', 'Garcia', 20, 'YES', ''),
(12, 'Jennifer', 'Brown', 'jenniferbrown', 'jenniferbrown@example.com', '+2348123456', 'password', 'Abuja', 'Nigeria', 'Jennifer Brown', 'Manager', 10, '', 'jenniferbrown@example.com'),
(13, 'Christopher', 'Rodriguez', 'christopherrodriguez', 'christopherrodriguez@example.com', '+2348123456', 'password', 'Port Harcourt', 'Nigeria', 'Christopher Rodriguez', 'Sales Executive', 10, '', 'christopherrodriguez@example.com'),
(14, 'Lisa', 'Miller', 'lisamiller', 'lisamiller@example.com', '+2348123456', 'password', 'Kano', 'Nigeria', 'Lisa Miller', 'Developer', 10, '', 'lisamiller@example.com'),
(15, 'Ryan', 'Martinez', 'ryanmartinez', 'ryanmartinez@example.com', '+2348123456', 'password', 'Abuja', 'Nigeria', 'Ryan Martinez', 'Designer', 10, '', 'ryanmartinez@example.com'),
(16, 'Rebecca', 'Gonzalez', 'rebeccagonzalez', 'rebeccagonzalez@example.com', '+2348123456', 'password', 'Lagos', 'Nigeria', 'Rebecca Gonzalez', 'Engineer', 10, '', 'rebeccagonzalez@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `waitlists_created`
--
-- Creation: May 05, 2023 at 01:11 PM
-- Last update: May 06, 2023 at 09:28 AM
--

CREATE TABLE `waitlists_created` (
  `ID` int(11) NOT NULL,
  `Work_email` varchar(255) NOT NULL,
  `waitlist` varchar(255) NOT NULL,
  `Code` int(11) NOT NULL,
  `DOC` date NOT NULL DEFAULT current_timestamp() COMMENT 'date of creation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `waitlists_created`
--

TRUNCATE TABLE `waitlists_created`;
--
-- Dumping data for table `waitlists_created`
--

INSERT INTO `waitlists_created` (`ID`, `Work_email`, `waitlist`, `Code`, `DOC`) VALUES
(11, 'thomasgarcia@example.com', 'Thomas Garcia', 1, '2023-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `waitlists_joined`
--
-- Creation: May 05, 2023 at 01:11 PM
-- Last update: May 06, 2023 at 09:52 AM
--

CREATE TABLE `waitlists_joined` (
  `Serial_no` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `waitlist` varchar(255) NOT NULL,
  `DOJ` date NOT NULL COMMENT 'Date of joining'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `waitlists_joined`
--

TRUNCATE TABLE `waitlists_joined`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `waitlists_created`
--
ALTER TABLE `waitlists_created`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `waitlists_joined`
--
ALTER TABLE `waitlists_joined`
  ADD PRIMARY KEY (`Serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `waitlists_created`
--
ALTER TABLE `waitlists_created`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waitlists_joined`
--
ALTER TABLE `waitlists_joined`
  MODIFY `Serial_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;