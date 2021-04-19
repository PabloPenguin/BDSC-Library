-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2017 at 04:19 PM
-- Server version: 5.5.55-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idreisab_Library_Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authors`
--

CREATE TABLE `Authors` (
  `Author_ID` smallint(6) UNSIGNED NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Authors`
--

INSERT INTO `Authors` (`Author_ID`, `First_Name`, `Last_Name`, `DOB`) VALUES
(1, 'Andrew', 'Dean', '1988-07-01'),
(2, 'Barbara ', 'Anderson', '1945-04-14'),
(3, 'Danyl', 'McLauchlan', '1974-02-23'),
(4, 'Dave', 'Eggers', '1970-03-12'),
(5, 'Geoff', 'Dyer', '1958-06-05'),
(6, 'George', 'Orwell', '1903-06-25'),
(7, 'J.D.', 'Salinger', '1919-01-01'),
(8, 'James', 'Baxter', '1926-06-29'),
(9, 'Julian', 'Barnes', '1946-01-19'),
(10, 'Noam', 'Chomsky', '1928-12-07'),
(11, 'Raymond', 'Carver', '1938-05-25'),
(12, 'Rob', 'Rate', '1978-01-01'),
(13, 'Sam', 'Hunt', '1946-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Book_ID` smallint(5) UNSIGNED NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Cost` float(4,2) NOT NULL,
  `Adult` char(1) NOT NULL COMMENT 'Y/N',
  `Category_ID` smallint(5) UNSIGNED NOT NULL COMMENT 'Foreign key',
  `Author_ID` smallint(5) UNSIGNED NOT NULL COMMENT 'Foreign key',
  `Publication_Year` year(4) NOT NULL,
  `Publisher_ID` smallint(5) UNSIGNED NOT NULL COMMENT 'Foreign Key',
  `Hired` char(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Book_ID`, `ISBN`, `Title`, `Cost`, `Adult`, `Category_ID`, `Author_ID`, `Publication_Year`, `Publisher_ID`, `Hired`) VALUES
(12, '0-316-76950-9', 'Nine Stories (For Esme With Love and Squalor', 6.99, 'N', 5, 3, 1953, 7, 'N'),
(11, '0-330-31381-9', 'Metroland', 14.99, 'Y', 3, 1, 1980, 6, 'N'),
(10, '978-0-099-54016-8', 'Love, etc', 16.00, 'N', 3, 1, 2000, 5, 'N'),
(9, '0-1400-0856-7', 'Keep the Aspidistra Flying', 29.00, 'N', 3, 5, 1936, 3, 'N'),
(8, '978-1877433-24-5', 'Introduction to PHP & MySQL', 24.00, 'N', 6, 7, 2005, 4, 'N'),
(7, '978-0-14-139935-5', 'How we are Hungry', 11.00, 'N', 5, 6, 2005, 3, 'N'),
(6, '0-1400-2120-5', 'Franny and Zooey', 22.49, 'N', 3, 3, 1955, 3, 'N'),
(5, '978-0-141-19126-3', 'Decline of the English Murder', 8.99, 'Y', 2, 5, 1984, 3, 'N'),
(4, '0-14042-287-0', 'Collected Poems', 16.00, 'Y', 4, 4, 1980, 3, 'Y'),
(3, '0-1400-1248-6', 'Catcher in the Rye', 22.49, 'N', 3, 3, 1951, 3, 'Y'),
(2, '978-0-85786-403-1', 'Anglo-English Attitudes', 73.50, 'N', 2, 2, 1999, 2, 'N'),
(1, '1-84354-239-0', 'A Pedant in the Kitchen', 40.00, 'N', 1, 1, 2003, 1, 'N'),
(13, '0-1400-0972-8', 'Nineteen Eighty-Four', 29.00, 'Y', 3, 5, 1949, 3, 'N'),
(14, '978-186940-434-5', 'Poems', 44.00, 'N', 4, 9, 2009, 8, 'N'),
(15, '0-8647-225-2', 'Portrait of the Artist\'s Wife', 38.50, 'N', 3, 10, 1992, 9, 'Y'),
(16, '978-1-888-363-82-1', 'Profit Over People - Neoliberalism and Global Orde', 15.99, 'N', 1, 11, 1999, 10, 'N'),
(17, '0-339-65386-0', 'Raise High the Roof Beam Carpenters', 13.99, 'N', 3, 3, 1955, 11, 'N'),
(18, '978-0-908321-21-6', 'Ruth, Roger and Me - Debts and Legacies', 5.99, 'N', 1, 12, 2015, 12, 'N'),
(19, '978-0-86473-884-4', 'Unspeakable Secretes of the Aro Valley', 29.90, 'Y', 3, 13, 2013, 9, 'N'),
(20, '978-0-099-53032-9', 'What we Talk About When we Talk About Love', 16.00, 'N', 3, 14, 1996, 5, 'N'),
(21, '0-141-01900-x', 'Why I Write', 8.99, 'N', 2, 5, 1984, 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `Borrowers`
--

CREATE TABLE `Borrowers` (
  `Borrower_ID` int(3) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `Membership_ID` tinyint(4) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Street_Number` varchar(10) NOT NULL,
  `Street_Name` varchar(25) NOT NULL,
  `Suburb` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Borrowers`
--

INSERT INTO `Borrowers` (`Borrower_ID`, `First_Name`, `Last_Name`, `DOB`, `Sex`, `Membership_ID`, `Email`, `Street_Number`, `Street_Name`, `Suburb`) VALUES
(1, 'Aaliyah', 'Cleary', '1958-10-30', 'F', 1, 'arcleary@teleworm.us ', '126', 'Armagh Street', 'Panmure'),
(2, 'Aaron', 'Quinn', '1982-06-23', 'M', 1, 'aaronquinn@hotmail.com', '56', 'Thuja Street', 'Otahuhu'),
(3, 'Alexander', 'Bray', '1965-08-06', 'M', 1, 'alexbray00@gmail.com', '99', 'Springleigh Avenue', 'Dannemora'),
(4, 'Cass', 'Roberts', '1983-12-03', 'F', 2, 'cassroberts@armyspy.com', '40', 'Wymer Terrace', 'Dannemora'),
(5, 'Celia', 'Lincoln', '1973-05-10', 'F', 2, 'cecelincoln@gmail.com', '70', 'Line Road', 'Highbrook'),
(6, 'Donovan', 'Moon', '2010-10-19', 'M', 3, 'moon.d@hushmail.com', '80', 'Turitea Place', 'Otahuhu'),
(7, 'Edwina', 'Steele', '1991-05-25', 'F', 1, 'edwinasteele@gmail.com', '168', 'Havelock Street', 'Botany Downs'),
(8, 'Ginny', 'Waterman', '2002-04-24', 'F', 2, 'g.waterman@hotmail.com', '440', 'Jubilee Street', 'Howick'),
(9, 'Hasna', 'Shine', '1979-04-16', 'F', 2, 'hasna445@gmail.com', '2/153', 'Gibbs Lane', 'Highbrook'),
(10, 'Hinemoa', 'Wolfe', '1985-11-24', 'F', 2, 'hine.wolfe@hushmail.com', '50', 'Hamlin Place', 'Botany Downs'),
(11, 'Howie', 'Gibbs', '1972-09-03', 'M', 2, 'hgibbs102@gmail.com', '13/99', 'McClintock Road', 'Highbrook'),
(12, 'Ioab', 'McDonald', '1981-03-11', 'M', 1, 'amcdonald@jourrapide.com', '85', 'Chambers Street', 'Botany Downs'),
(13, 'Maegan', 'Bates', '1970-02-27', 'F', 1, 'kittenqueen11@gmail.com', '62', 'Lisburn Avenue', 'Botany Downs'),
(14, 'Malcom', 'Wells', '1983-11-12', 'M', 2, 'malwells@yahoo.co.nz', '235', 'Malin Place', 'Dannemora'),
(15, 'Parker', 'Wakefield', '1992-08-03', 'M', 2, 'wakefieldfams@gmail.com', '292', 'Smart Terrace', 'Panmure'),
(16, 'Rachael', 'Morris', '1966-04-25', 'F', 2, 'r.morris19@gmail.com', '173D', 'Amophia Street', 'Botany Downs'),
(17, 'Tilda', 'Jeffery', '1969-04-15', 'F', 2, 'tildaandadam@yahoo.com', '174', 'Matipo Place', 'Howick'),
(18, 'Warren', 'Kelly', '1992-12-19', 'M', 2, 'warrenk@armyspy.com', '172', 'McCallum Street', 'Howick'),
(19, 'Zahia', 'Burke', '1998-08-04', 'F', 2, 'zzbu@gmail.com', '74', 'Thomson Street', 'Highbrook'),
(20, 'Zhihao', 'Yu', '2007-02-14', 'F', 3, 'zhihoa2007@yahoo.com', '153B', 'Nelson Street', 'Botany Downs'),
(38, 'b', 'b', '2017-08-15', 'M', 2, 'b', 'b', 'b', 'b'),
(39, 'b', 'b', '2017-08-15', 'M', 0, 'b', 'b', 'b', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `Category_ID` smallint(5) UNSIGNED NOT NULL,
  `Category` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`Category_ID`, `Category`) VALUES
(1, 'Non fiction'),
(2, 'Essays'),
(3, 'Fiction'),
(4, 'Poetry'),
(5, 'Short Stories'),
(6, 'Textbook');

-- --------------------------------------------------------

--
-- Table structure for table `Hiring`
--

CREATE TABLE `Hiring` (
  `Borrow_ID` smallint(5) UNSIGNED NOT NULL,
  `Book_ID` smallint(6) NOT NULL COMMENT 'Foreign key',
  `Borrower_ID` smallint(5) UNSIGNED NOT NULL COMMENT 'Foreign key',
  `Date_Issued` date NOT NULL,
  `Date_Due` date NOT NULL,
  `Date_Returned` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hiring`
--

INSERT INTO `Hiring` (`Borrow_ID`, `Book_ID`, `Borrower_ID`, `Date_Issued`, `Date_Due`, `Date_Returned`) VALUES
(1, 12, 1, '2011-01-01', '2011-02-01', '2017-08-03'),
(2, 12, 1, '2011-01-01', '2011-02-01', '2017-08-10'),
(3, 6, 9, '2011-02-01', '2011-01-03', '2017-08-03'),
(4, 11, 2, '2011-01-01', '2011-01-15', '2017-08-02'),
(5, 10, 3, '2017-08-02', '2017-08-16', '2017-08-03'),
(6, 8, 5, '2017-08-03', '2017-08-17', '2017-08-03'),
(7, 6, 4, '2017-08-03', '2017-08-17', '0000-00-00'),
(8, 2, 1, '2017-08-10', '2017-08-24', '2017-08-03'),
(9, 2, 1, '2017-08-10', '2017-08-24', '0000-00-00'),
(10, 2, 1, '2017-08-10', '2017-08-24', '0000-00-00'),
(11, 2, 1, '2017-08-10', '2017-08-24', '0000-00-00'),
(12, 5, 5, '2017-08-03', '2017-08-17', '2017-08-10'),
(13, 5, 5, '2017-08-03', '2017-08-17', '0000-00-00'),
(14, 23, 6, '2017-08-03', '2017-08-17', '2017-08-04'),
(15, 23, 6, '2017-08-03', '2017-08-17', '2017-08-03'),
(16, 12, 2, '2017-08-12', '2017-08-26', '2017-08-03'),
(17, 11, 1, '2017-08-03', '2017-08-17', '2017-08-10'),
(18, 1, 4, '2017-08-02', '2017-08-16', '2017-08-03'),
(19, 4, 1, '2017-08-10', '2017-08-24', '2017-08-05'),
(20, 8, 1, '2017-08-11', '2017-08-25', '2017-08-04'),
(21, 3, 3, '2017-08-04', '2017-08-18', '2017-08-03'),
(22, 4, 3, '2017-08-10', '2017-08-24', '2017-08-10'),
(23, 15, 1, '2017-08-03', '2017-08-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `Memberships`
--

CREATE TABLE `Memberships` (
  `Membership_ID` smallint(4) UNSIGNED NOT NULL,
  `Membership_Type` varchar(10) DEFAULT NULL,
  `Membership_description` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Memberships`
--

INSERT INTO `Memberships` (`Membership_ID`, `Membership_Type`, `Membership_description`) VALUES
(1, 'Premium', 'Premium membership offers benefits such as an extended borrowing period, early access to the latest releases and priority service at the issues desk.'),
(2, 'Free', 'Free membership allows borrowers to access all the library content for free with a standard two week issue period.'),
(3, 'Child', 'The same as a free membership but with restrictions on books with adult themes');

-- --------------------------------------------------------

--
-- Table structure for table `Newsletter`
--

CREATE TABLE `Newsletter` (
  `Newsletter_ID` smallint(5) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Publishers`
--

CREATE TABLE `Publishers` (
  `Publisher_ID` smallint(5) UNSIGNED NOT NULL,
  `Publisher` varchar(35) NOT NULL,
  `Street_Address` varchar(40) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Postcode` varchar(15) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Publish_Site` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Publishers`
--

INSERT INTO `Publishers` (`Publisher_ID`, `Publisher`, `Street_Address`, `City`, `Postcode`, `Country`, `Publish_Site`) VALUES
(1, 'Atlantic Books', '26 Boswell Street', 'London', 'WC1N 3JZ', 'United Kingdom', 'www.atlanticbooks.co.uk'),
(2, 'Canongate Books Ltd', '14 High Street', 'Edinburgh', 'EH1 1TE', 'Scotland', 'www.canongate.tv'),
(3, 'Penguin Books', '84 Strand', 'London', 'WC2R 0RL', 'United Kingdom', 'www.penguin.com'),
(4, 'Yoobee Publishing', '541 Innes Road', 'Christchurch', '8052', 'New Zealand', 'www.yoobeepublishing.com'),
(5, 'Vintage Books', '20 Vauxhall Bridge Road', 'London', 'SW1V 2SA', 'United Kingdom', 'www.vintage-books.co.uk'),
(6, 'Picador', '1 Cavaye Place', 'London', 'SW10 9PG', 'United Kingdom', 'www.picador.com'),
(7, 'Little, Brown Books', '50 Victoria Embankment', 'London', 'EC4Y 0DZ', 'United Kingdom', 'www.littlebrown.com'),
(8, 'Auckland University Press', '1-11 Short Street', 'Auckland', '1010', 'New Zealand', 'www.auckland.ac.nz/aup'),
(9, 'Victoria University Press', '49 Rawhiti Terrace', 'Wellington', '6012', 'New Zealand', 'www.vup.victoria.ac.nz'),
(10, 'Seven Stories Press', '140 Watts Street', 'New York', 'NY10013', 'United States', 'www.sevenstories.com'),
(11, 'Bantam Books', '666 Fifth Avenue', 'New York', 'NY10019', 'United States', 'www.bantam-dell.atrandom.com'),
(12, 'Bridget Williams Books', '32 Mulgrave Street', 'Wellington', '6011', 'New Zealand', 'www.bwb.co.nz');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`User_ID`, `Username`, `Password`) VALUES
(1, 'admin', 'password123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Book_ID`);

--
-- Indexes for table `Borrowers`
--
ALTER TABLE `Borrowers`
  ADD PRIMARY KEY (`Borrower_ID`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `Hiring`
--
ALTER TABLE `Hiring`
  ADD PRIMARY KEY (`Borrow_ID`);

--
-- Indexes for table `Memberships`
--
ALTER TABLE `Memberships`
  ADD PRIMARY KEY (`Membership_ID`);

--
-- Indexes for table `Newsletter`
--
ALTER TABLE `Newsletter`
  ADD PRIMARY KEY (`Newsletter_ID`);

--
-- Indexes for table `Publishers`
--
ALTER TABLE `Publishers`
  ADD PRIMARY KEY (`Publisher_ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authors`
--
ALTER TABLE `Authors`
  MODIFY `Author_ID` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `Book_ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `Borrowers`
--
ALTER TABLE `Borrowers`
  MODIFY `Borrower_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Category_ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Hiring`
--
ALTER TABLE `Hiring`
  MODIFY `Borrow_ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Memberships`
--
ALTER TABLE `Memberships`
  MODIFY `Membership_ID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;
--
-- AUTO_INCREMENT for table `Newsletter`
--
ALTER TABLE `Newsletter`
  MODIFY `Newsletter_ID` smallint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Publishers`
--
ALTER TABLE `Publishers`
  MODIFY `Publisher_ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
