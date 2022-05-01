-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 08:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `afrin`
--

CREATE TABLE `afrin` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `operating_system` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afrin`
--

INSERT INTO `afrin` (`id`, `session_id`, `ip_address`, `device`, `operating_system`, `browser`, `url`, `visited_at`) VALUES
(1, '', '', '', '', '', '', '2022-05-01 17:32:17'),
(2, '', '', '', '', '', '', '2022-05-01 17:36:40'),
(3, '', '', '', '', '', '', '2022-05-01 17:36:55'),
(4, '', '', '', '', '', '', '2022-05-01 17:42:53'),
(5, '1651427108778148522', '::1', 'Computer', 'Windows 10', 'Chrome', '', '2022-05-01 17:45:08'),
(6, '16514274681951277494', '::1', 'Computer', 'Windows 10', 'Chrome', '', '2022-05-01 17:51:08'),
(7, '16514274851216174322', '::1', 'Computer', 'Windows 10', 'Chrome', '', '2022-05-01 17:51:25'),
(8, '16514279342021990410', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/student.php', '2022-05-01 17:58:54'),
(9, '1651428088196316780', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/student.php', '2022-05-01 18:01:28'),
(10, '1651428108926656189', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/index.php', '2022-05-01 18:01:48'),
(11, '16514281171729335705', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/index.php', '2022-05-01 18:01:57'),
(12, '16514281211799250787', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/index.php', '2022-05-01 18:02:01'),
(13, '165142812691245213', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/index.php', '2022-05-01 18:02:06'),
(14, '16514281371358838230', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:17'),
(15, '16514281421835491312', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:22'),
(16, '16514281461895263628', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:26'),
(17, '16514281481691914089', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:28'),
(18, '16514281501520360390', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:30'),
(19, '1651428153156633867', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:33'),
(20, '16514281561469311896', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:36'),
(21, '16514281581653737116', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:38'),
(22, '1651428161129743388', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/admin/create.php', '2022-05-01 18:02:41'),
(23, '1651428900201510536', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:15:00'),
(24, '16514290191820914483', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:16:59'),
(25, '1651429204274285675', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:20:04'),
(26, '16514292921996707905', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:21:32'),
(27, '16514296212098661462', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:27:01'),
(28, '16514296611620553956', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:27:41'),
(29, '1651429690402349534', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:28:10'),
(30, '16514301151011096605', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:35:15'),
(31, '16514308451563521281', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:47:25'),
(32, '165143093564305332', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/', '2022-05-01 18:48:55'),
(33, '16514309401441617395', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/', '2022-05-01 18:49:00'),
(34, '16514309431510911808', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/', '2022-05-01 18:49:03'),
(35, '1651430951292654488', '::1', 'Computer', 'Windows 10', 'Chrome', '/afrin/view_visitors.php', '2022-05-01 18:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `AttendanceID` varchar(25) NOT NULL,
  `DateAttended` date DEFAULT NULL,
  `Hours` time DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `DateAttended`, `Hours`, `sectionID`, `studentID`) VALUES
('Att10', '2021-09-22', '01:30:00', 101, 2201),
('Att11', '2021-09-26', '01:30:00', 102, 2203),
('Att12', '2022-01-16', '01:45:00', 102, 2203),
('Att14', '2022-01-17', '01:15:00', 105, 2204),
('Att15', '2021-10-02', '01:45:00', 107, 2207),
('Att16', '2021-01-18', '01:30:00', 107, 2210),
('Att17', '2022-01-03', '01:30:00', 108, 2208),
('Att18', '2021-10-03', '01:45:00', 110, 2210),
('Att19', '2021-10-05', '01:15:00', 103, 2204),
('Att20', '2022-01-19', '01:45:00', 103, 2205);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `Term` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `Name`, `Description`, `Credits`, `Term`) VALUES
(0, 'ssdfs', 'sdfsdf', 0, 'sdf'),
(1, 'Engineering', 'graded assignments, available short codes', 5, 'spring'),
(2, 'General studies', 'project preparation', 3, 'fall'),
(3, 'Management', 'exercises', 3, 'fall'),
(4, 'Social sciences', NULL, 5, 'spring'),
(5, 'Mathematics', NULL, 5, 'fall'),
(6, 'Science', 'lab', 5, 'spring'),
(7, 'Finance', NULL, 5, 'spring'),
(8, 'Accounting', NULL, 5, 'fall'),
(9, 'music', 'practical', 3, 'fall');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `HOD` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `salary` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `Name`, `HOD`, `Email`, `salary`) VALUES
(1, 'faculty of engineering', 'nelly', 'dnell@uni', '10550.0000'),
(2, 'faculty of economics', 'lee', 'dlee@uni', '9500.0000'),
(3, 'faculty of art and history', 'cairo', 'dcairo@uni', '7500.0000'),
(4, 'faculty of science', 'keita', 'dkeita@uni', '8000.0000'),
(5, 'faculty of social sciences', 'chio', 'dchio@uni', '7500.0000');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `EnrollmentID` int(11) NOT NULL,
  `AcademicYear` varchar(255) DEFAULT NULL,
  `Term` int(11) DEFAULT NULL,
  `DateEnrolled` date DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `FinalGrade` int(11) DEFAULT NULL,
  `MidtermGrade` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`EnrollmentID`, `AcademicYear`, `Term`, `DateEnrolled`, `sectionID`, `FinalGrade`, `MidtermGrade`, `studentID`) VALUES
(2, 'Y2022', 1, '2021-08-01', 104, 22, 40, 2201),
(6, 'Y2021', 1, '2021-08-01', 104, 77, 85, 2203),
(8, 'Y2022', 2, '2022-01-01', 108, 85, 90, 2204),
(10, 'Y2021', 5, '2021-08-01', 110, 48, 48, 2205),
(12, 'Y2022', 3, '2021-08-01', 107, 44, 50, 2206),
(14, 'Y2021', 2, '2022-01-01', 107, 75, 88, 2207),
(16, 'Y2021', 3, '2021-08-01', 102, 80, 90, 2208),
(18, 'Y2022', 3, '2022-01-01', 101, 33, 22, 2209),
(20, 'Y2022', 1, '2021-08-01', 111, 88, 95, 2210),
(22, 'Y2021', 5, '2021-08-01', 112, 45, 40, 2211),
(24, 'Y2022', 4, '2022-01-01', 111, 66, 52, 2212),
(26, 'Y2022', 4, '2021-08-01', 108, 48, 38, 2213);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `InstructorID` int(11) NOT NULL,
  `CollegeID` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `Rank` varchar(45) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `CollegeID`, `LastName`, `FirstName`, `Rank`, `departmentID`) VALUES
(0, 'sdfsd', 'sdfsdf', 'Mbula', 'sdf@sdfsd.sdf', 0),
(11, 'in11', 'calos', 'drake', 'lecturer1', 1),
(22, '1n22', 'reggy', 'ben', 'senior lecturee', 3),
(33, 'in33', 'peter', 'nelly', 'principal lecturer', 1),
(44, 'in44', 'souley', 'lee', 'senior lecturer3', 2),
(55, 'in55', 'cool', 'chio', 'senior lecturer3', 5),
(66, 'in66', 'daniel', 'keita', 'senior lectures2', 4),
(77, 'in77', 'hebrew', 'roger', 'lecturer3', 4),
(88, 'in88', 'kanye', 'cairo', 'principal lecturer3', 3),
(99, 'in99', 'peter', 'bulls', 'principal lecture3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `Day` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `Day`, `StartTime`, `EndTime`) VALUES
(10, '2021-09-09', '08:15:00', '09:15:00'),
(20, '2021-09-09', '09:45:00', '10:45:00'),
(30, '2021-09-09', '12:45:00', '14:15:00'),
(40, '2021-09-10', '09:45:00', '10:45:00'),
(50, '2022-01-05', '02:15:00', '15:45:00'),
(60, '2022-01-05', '03:45:00', '17:15:00'),
(70, '2022-01-06', '09:45:00', '10:45:00'),
(80, '2022-01-06', '11:15:00', '12:30:00'),
(90, '2022-01-06', '16:45:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Room` varchar(45) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `scheduleID` int(11) DEFAULT NULL,
  `instructorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `Name`, `Room`, `courseID`, `scheduleID`, `instructorID`) VALUES
(101, 'undergraduate', 'R03', 3, 30, 22),
(102, 'graduate', 'online', 4, 30, 44),
(103, 'graduate', 'R13', 1, 20, 33),
(104, 'undergraduate', 'R20', 2, 30, 55),
(105, 'graduate', 'online', 4, 60, 66),
(106, 'graduate', 'R13', 1, 50, 33),
(107, 'graduate', 'online', 5, 60, 44),
(108, 'undergraduate', 'R20', 8, 30, 55),
(109, 'undergraduate', 'R05', 7, 80, 77),
(110, 'graduate', 'online', 5, 10, 44),
(111, 'gradute', 'R13', 1, 60, 33),
(112, 'undergraduate', 'R12', 6, 20, 77);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `collegeID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `LastName`, `FirstName`, `Email`, `collegeID`) VALUES
(0, 'Mboma', 'Mbula', 'contact@chida-app.com', 'jkshdjksf'),
(2201, 'big', 'kate', 'kate@uni.com', 'uni2201'),
(2202, 'grace', 'perry', 'perry@uni.com', 'uni2202'),
(2203, 'mann', 'felix', 'felix@uni.com', 'uni2203'),
(2204, 'vicky', 'cage', 'cage@uni.com', 'uni2204'),
(2205, 'doepmann', 'sandra', 'sandra@uni.com', 'uni2205'),
(2206, 'alex', 'laura', 'laura@uni.com', 'uni2206'),
(2207, 'boem', 'nadia', 'nadia@uni.com', 'uni2207'),
(2208, 'team', 'claudia', 'claudia@uni.com', 'uni2208'),
(2209, 'grace', 'julia', 'julia@uni.com', 'uni2209'),
(2210, 'brown', 'casandra', 'casandra@uni.com', 'uni2210'),
(2211, 'pinky', 'anjela', 'anjela@uni.com', 'uni2211'),
(2212, 'ladies', 'jolly', 'jolly@uni.com', 'uni2212'),
(2213, 'olivia', 'jane', 'jane@uni.com', 'uni2013');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `level` enum('admin','non-admin','','') NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `password`) VALUES
(1, 'Gilbert', 'mbula.gilberto@gmail.com', 'admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(2, 'Maria Mbula', 'maria@gmail.com', '', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afrin`
--
ALTER TABLE `afrin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceID`),
  ADD UNIQUE KEY `AttendanceID_UNIQUE` (`AttendanceID`),
  ADD KEY `studentID_idx` (`studentID`),
  ADD KEY `sectionID` (`sectionID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD UNIQUE KEY `CourseID_UNIQUE` (`CourseID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD UNIQUE KEY `DepartmentID_UNIQUE` (`DepartmentID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD UNIQUE KEY `EnrollmentID_UNIQUE` (`EnrollmentID`),
  ADD KEY `studentID_idx` (`studentID`),
  ADD KEY `sectionID_idx` (`sectionID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`InstructorID`),
  ADD UNIQUE KEY `InstructorID_UNIQUE` (`InstructorID`),
  ADD KEY `departmentID_idx` (`departmentID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD UNIQUE KEY `ScheduleID_UNIQUE` (`ScheduleID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`),
  ADD UNIQUE KEY `sectionID_UNIQUE` (`sectionID`),
  ADD KEY `courseID_idx` (`courseID`),
  ADD KEY `scheduleID_idx` (`scheduleID`),
  ADD KEY `instructorID_idx` (`instructorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID_UNIQUE` (`studentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afrin`
--
ALTER TABLE `afrin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
