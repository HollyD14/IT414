-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2018 at 09:45 PM
-- Server version: 5.7.23
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
-- Database: `telmon_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `Dept_ID` int(3) NOT NULL,
  `Dept_Name` text,
  `Office_Addr` varchar(100) DEFAULT NULL,
  `Office_Phone` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`Dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_ID`, `Dept_Name`, `Office_Addr`, `Office_Phone`) VALUES
(1, 'Finance', '13245 Simmons Blvd.', '913-897-8565'),
(2, 'IT', '12345 Main St. Overland Park, KS 66213', '899-543-3455'),
(3, 'Design', '123 Oak St.', '987-123-4567'),
(4, 'Sales', '1222 Ash Ave.', '123-543-3456');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Emp_Number` int(6) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `J_ID` int(1) DEFAULT NULL,
  `D_ID` int(1) DEFAULT NULL,
  `V_ID` int(1) DEFAULT NULL,
  `P_ID` int(1) DEFAULT NULL,
  `Proj_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Emp_Number`),
  KEY `D_ID` (`D_ID`),
  KEY `J_ID` (`J_ID`),
  KEY `V_ID` (`V_ID`),
  KEY `P_ID` (`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_Number`, `First_Name`, `Last_Name`, `Birth_Date`, `Sex`, `Address`, `SSN`, `Start_Date`, `J_ID`, `D_ID`, `V_ID`, `P_ID`, `Proj_ID`) VALUES
(111111, 'Aaron', 'Bates', '1986-02-28', 'M', '48 Sunbeam Ave. Gaithersburg, MD 20877', 456874576, '2007-06-23', 5, 3, 5, 111111, 2),
(111222, 'Jim', 'Jones', '1979-09-18', 'M', '766 Lake View Ave. Lynchburg, VA 24502', 937481927, '2003-10-23', 3, 4, 2, 111222, 2),
(123456, 'Jane', 'Simmons', '1955-12-04', 'F', '132 Forest St.Dallas, GA 30132', 123129876, '2001-03-10', 5, 1, 1, 123456, 4),
(222222, 'Cameron', 'Oz', '1952-05-05', 'F', '40 North Drive Gainesville, VA 20155', 882912937, '2007-08-23', 4, 3, NULL, 222222, 5),
(333333, 'James', 'Miller', '1964-04-04', 'M', '8995 Spruce Drive Shirley, NY 11967', 199993725, '2008-07-04', 1, 1, NULL, 333333, NULL),
(333444, 'Sarah', 'Rogers', '1982-10-23', 'F', '9047 Joy Ridge St. Northbrook, IL 60062', 193663826, '2005-04-11', 4, 3, 2, 333444, 5),
(444444, 'Bill', 'Andrews', '1995-06-30', 'M', '718 Locust Street Virginia Beach, VA 23451', 187937322, '2008-10-01', 3, 4, 4, 444444, 3),
(555555, 'Roger', 'Green', '1998-08-12', 'M', '8805 Brewery Dr. West Hempstead, NY 11552', 874449836, '2014-08-06', 4, 1, NULL, 555555, 5),
(555666, 'Kim', 'Murphy', '1990-12-15', 'F', '16 North Pleasant St. Midland, MI 48640', 192836723, '2006-03-07', 1, 1, 3, 555666, 2),
(654321, 'John', 'Smith', '1975-05-07', 'M', '376 Lilac Drive Trenton, NJ 08610', 763288736, '2003-01-06', 2, 2, NULL, 654321, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE IF NOT EXISTS `payroll` (
  `Payroll_ID` int(6) NOT NULL,
  `Salary` varchar(10) DEFAULT NULL,
  `Garnishments` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Payroll_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`Payroll_ID`, `Salary`, `Garnishments`) VALUES
(111111, '80,000', ''),
(111222, '25,000', '500'),
(123456, '50,000', ''),
(222222, '65,000', '250'),
(333333, '70,000', ''),
(333444, '35,000', ''),
(444444, '30,000', ''),
(555555, '60,000', ''),
(555666, '40,000', ''),
(654321, '54,000', '');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `Job_ID` int(1) NOT NULL,
  `Job_Title` varchar(20) DEFAULT NULL,
  `Base_Salary` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Job_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Job_ID`, `Job_Title`, `Base_Salary`) VALUES
(1, 'Accountant', '40,000'),
(2, 'Technology Support', '70,000'),
(3, 'Sales Representative', '20,000'),
(4, 'Designer', '30,000'),
(5, 'Manager', '50,000');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `Project_ID` int(1) NOT NULL,
  `Project_Name` varchar(50) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  PRIMARY KEY (`Project_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Project_Name`, `Start_Date`, `End_Date`) VALUES
(1, 'Simmons', '2015-01-02', '2018-02-01'),
(2, 'Acme Int.', '2016-04-08', NULL),
(3, 'Calloway', '2017-01-15', NULL),
(4, 'Artimus', '2017-10-01', NULL),
(5, 'Donnavan', '2018-01-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `Vehicle_ID` int(3) NOT NULL,
  `Make` varchar(20) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Year` int(4) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `Plate_Number` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`Vehicle_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_ID`, `Make`, `Model`, `Year`, `Color`, `Plate_Number`) VALUES
(1, 'Chevrolet', 'Malibu', 2015, 'White', '453 EDR'),
(2, 'Ford', 'Taurus', 2017, 'Gray', '486 TYH'),
(3, 'Toyota', 'Corolla', 2018, 'Blue', '728 HAI'),
(4, 'Chevrolet', 'Malibu', 2018, 'Gray', '654 ABB'),
(5, 'Chevrolet', 'Malibu', 2015, 'White', '453 EDR'),
(6, 'Ford', 'Couger', 2018, 'Red', '789 FHG');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `department` (`Dept_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`J_ID`) REFERENCES `position` (`Job_ID`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`V_ID`) REFERENCES `vehicle` (`Vehicle_ID`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`P_ID`) REFERENCES `payroll` (`Payroll_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
