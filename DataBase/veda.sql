-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 06:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veda`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Present` int(11) NOT NULL,
  `Monthno` int(11) NOT NULL,
  `Eid` varchar(10) NOT NULL,
  `Absent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Present`, `Monthno`, `Eid`,`Absent`) VALUES
(24, 1, '0001', 1),
(23, 1, '0002', 2),
(24, 1, '0003', 1),
(25, 1, '0004', 0),
(25, 1, '0005', 0),
(25, 1, '0006', 0),
(24, 1, '0007', 1),
(25, 1, '0008', 0),
(22, 1, '0009', 3),
(22, 1, '0010', 3),
(25, 1, '0011', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deleted_employees`
--

CREATE TABLE `deleted_employees` (
  `Eid` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Dno` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_employees`
--

INSERT INTO `deleted_employees` (`Eid`, `Name`, `Phone`, `Email`, `Address`, `Dno`) VALUES
(7832, 'Clark Kent', '8876524534', 'clarkkent@gmail.com', 'UK', 're');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dnumber` varchar(10) NOT NULL,
  `Dept_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dnumber`, `Dept_name`) VALUES
('1', 'accounts'),
('2', 'research'),
('3', 'Sales'),
('4', 'Production'),
('5', 'Advertisement');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Name` varchar(50) NOT NULL,
  `Eid` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Dno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='hi';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Name`, `Eid`, `Phone`, `Email`, `Address`, `Dno`) VALUES
('Ranjitha', '0001', '1234567899', 'ranjitha@gmail.com', 'Bangalore', '1'),
('Maltesh', '0002', '1234567898', 'maltesh@gmail.com', 'Bangalore', '2'),
('Jagdish', '0003', '986543211', 'jagga@gmail.com', 'Bangalore', '3'),
('Abhi', '0004', '4598761651', 'abhi@gmail.com', 'Bangalore', '5'),
('Suresh', '0005', '951236478', 'suresh@gmail.com', 'Bangalore', '5'),
('Hanumanthappa', '0006', '9685712365', 'hanumanthappa@gmail.com', 'Mangalore', '3'),
('Vani', '0007', '9635874125', 'vani@gmail.com', 'Bangalore', '4'),
('John Simen', '0008', '9857456321', 'john@gmail.com', 'Bangalore', '5'),
('Keshav', '0009', '9658742564', 'keshav@gmail.com', 'Mangalore', '2'),
('Surya', '0010', '9854758745', 'surya@gmail.com', 'Bangalore', '2'),
('Pramoda', '0011', '9587458745', 'pramoda@gmail.com', 'Mangalore', '2');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `old_employees` AFTER DELETE ON `employee` FOR EACH ROW insert into deleted_employees(Eid, Name,Phone,Email,Address,Dno) values (old.Eid, old.Name,old.Phone,old.Email,old.Address,old.Dno)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LimitAmount` int(10) NOT NULL,
  `LoanAmount` int(10) NOT NULL,
  `DueDate` date NOT NULL,
  `Eid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LimitAmount`, `LoanAmount`, `DueDate`, `Eid`) VALUES
(10000, 5000, '2022-02-28', '0001'),
(20000, 10000, '2022-02-20', '0002'),
(30000, 20000, '2022-03-05', '0003');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Eid` varchar(10) NOT NULL,
  `SalaryAmount` int(10) NOT NULL,
  `Allowance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`Eid`, `SalaryAmount`, `Allowance`) VALUES
('0001', 1000, 1000),
('0002', 2000, 1000),
('0003', 1500, 500),
('0004', 4000, 2000),
('0005', 5000, 2500),
('0006', 2000, 1000),
('0007', 2000, 1000),
('0008', 2000, 1000),
('0009', 2000, 1000),
('0010', 4000, 1000),
('0011', 3000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `Eid` varchar(10) NOT NULL,
  `TaxAmount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`Eid`, `TaxAmount`) VALUES
('0001', 2000),
('0002', 2000),
('0003', 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Monthno`,`Eid`),
  ADD KEY `Eid` (`Eid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dnumber`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`Eid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Eid`) REFERENCES `salary` (`Eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`Eid`) REFERENCES `salary` (`Eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Eid`) REFERENCES `employee` (`Eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_ibfk_1` FOREIGN KEY (`Eid`) REFERENCES `employee` (`Eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
