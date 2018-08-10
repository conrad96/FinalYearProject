-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 01:17 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ols`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(100) NOT NULL,
  `admin_email` varchar(180) NOT NULL,
  `admin_password` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_uname`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_ID` int(11) NOT NULL,
  `unit_ID` int(11) NOT NULL,
  `lec_ID` int(11) NOT NULL,
  `assignment_document` varchar(255) NOT NULL,
  `assignment_deadline` date NOT NULL,
  `assignment_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_ID`, `unit_ID`, `lec_ID`, `assignment_document`, `assignment_deadline`, `assignment_title`) VALUES
(4, 1, 1, 'http://localhost/FinalYearProject/assets/documents/assignments/pgadmin.log', '2018-07-30', 'Reasearch About  Postman problem');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_ID` int(11) NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_yrs` int(11) NOT NULL,
  `dept_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_ID`, `course_title`, `course_code`, `course_yrs`, `dept_ID`) VALUES
(1, 'BACHELOR OF INFORMATION TECHNOLOGY AND COMPUTING', 'BITC', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseunit`
--

CREATE TABLE `courseunit` (
  `unit_ID` int(11) NOT NULL,
  `unit_title` varchar(150) NOT NULL,
  `course_ID` int(11) NOT NULL,
  `lec_ID` int(11) NOT NULL,
  `unit_code` varchar(25) NOT NULL,
  `unit_year` int(11) NOT NULL,
  `unit_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseunit`
--

INSERT INTO `courseunit` (`unit_ID`, `unit_title`, `course_ID`, `lec_ID`, `unit_code`, `unit_year`, `unit_semester`) VALUES
(1, 'Algorithm design', 1, 1, 'IT311', 3, 2),
(2, 'Microprocessor ', 1, 1, 'IT312', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `coursework`
--

CREATE TABLE `coursework` (
  `work_ID` int(11) NOT NULL COMMENT 'This field is the primary key that uniquely identifies the Coursework table',
  `work_title` varchar(150) NOT NULL COMMENT 'This Field contains the Title or Name of the Coursework',
  `lec_ID` int(11) NOT NULL COMMENT 'This Field is a forreign key that references the Lecturers who has published that coursework',
  `unit_ID` int(11) NOT NULL COMMENT 'This field is a foreign key that references the Courseunit which the coursework belongs to',
  `work_document` varchar(255) NOT NULL COMMENT 'This field describes the url location of the Document uploaded by the lecturer',
  `work_deadline` date NOT NULL COMMENT 'This field contains the Deadline for submission of the coursework'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursework`
--

INSERT INTO `coursework` (`work_ID`, `work_title`, `lec_ID`, `unit_ID`, `work_document`, `work_deadline`) VALUES
(1, 'Microprocessor  Logic Gates', 1, 2, 'http://localhost/FinalYearProject/assets/documents/coursework/', '2018-07-31'),
(3, 'new test ', 1, 1, 'http://localhost/FinalYearProject/assets/documents/coursework/', '2018-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_ID` int(11) NOT NULL,
  `fac_ID` int(11) NOT NULL,
  `dept_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_ID`, `fac_ID`, `dept_name`) VALUES
(1, 1, 'DEPARTMENT OF COMPUTER SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_ID` int(11) NOT NULL,
  `fac_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_ID`, `fac_name`) VALUES
(1, 'FACULTY OF SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `handouts`
--

CREATE TABLE `handouts` (
  `handout_ID` int(11) NOT NULL,
  `handout_title` varchar(150) NOT NULL,
  `handout_date` datetime NOT NULL,
  `handout_doc` varchar(255) NOT NULL,
  `lec_ID` int(11) NOT NULL,
  `unit_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handouts`
--

INSERT INTO `handouts` (`handout_ID`, `handout_title`, `handout_date`, `handout_doc`, `lec_ID`, `unit_ID`) VALUES
(3, 'Notes for Euler Trails Algorithms', '2018-07-30 18:23:02', 'http://localhost/FinalYearProject/assets/documents/handouts/DFD.docx', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `lec_ID` int(11) NOT NULL COMMENT 'The Lecturers ID uniquely identifies Lecturer’s table',
  `lec_photo` varchar(255) NOT NULL COMMENT 'This field stores the url path to the uploaded lecturers’ photo',
  `lec_names` varchar(150) NOT NULL COMMENT 'This field contains the Lecturers’ Full names',
  `lec_uname` varchar(150) NOT NULL COMMENT 'This field contains the Lecturers’ Usernames',
  `lec_email` varchar(150) NOT NULL COMMENT 'This field contains the Lecturer’s email address',
  `lec_password` varchar(150) NOT NULL COMMENT 'This field contains the Lecturer’s password',
  `lec_bio` text NOT NULL COMMENT 'This text field stores the Lecturer’s biography ',
  `dept_ID` int(11) NOT NULL COMMENT 'This field is a foreign key that references the Department the Lecturer belongs to',
  `admin_ID` int(11) NOT NULL COMMENT 'This is a foreign key that references the Administrtor that Created that Lecturer’s Account'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`lec_ID`, `lec_photo`, `lec_names`, `lec_uname`, `lec_email`, `lec_password`, `lec_bio`, `dept_ID`, `admin_ID`) VALUES
(1, 'http://localhost/FinalYearProject/assets/img/Lecturers/FB_IMG_15127442292969093.jpg', 'Matovu Mark', 'mark123', 'mark@kyu.com', 'mark123', 'I have taught in kyambogo for 20years and still counting', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `results_assignments`
--

CREATE TABLE `results_assignments` (
  `resa_ID` int(11) NOT NULL,
  `assignment_ID` int(11) NOT NULL,
  `lec_ID` int(11) NOT NULL,
  `student_No` bigint(20) NOT NULL,
  `resa_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results_coursework`
--

CREATE TABLE `results_coursework` (
  `rescw_ID` int(11) NOT NULL,
  `work_ID` int(11) NOT NULL,
  `rescw_mark` int(11) NOT NULL,
  `lec_ID` int(11) NOT NULL,
  `student_No` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_No` bigint(20) NOT NULL COMMENT 'This Field contains the Students&amp;#039; Number as a primary Key',
  `stud_uname` varchar(150) NOT NULL COMMENT 'This Field contains the Students  username',
  `stud_names` varchar(150) NOT NULL COMMENT 'This Field contains the Students Full Names ',
  `stud_email` varchar(150) NOT NULL COMMENT 'This Field contains the students email address',
  `stud_password` varchar(150) NOT NULL COMMENT 'This Field contains the Students password',
  `admin_ID` int(11) NOT NULL COMMENT 'This Field is a foreign key that references to an Administrtor who registered that Student',
  `course_ID` int(11) NOT NULL COMMENT 'This field is a foreign key that References courses of which the Student belongs to',
  `stud_photo` varchar(255) NOT NULL COMMENT 'This field contains the url to the uploaded photo of the student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_No`, `stud_uname`, `stud_names`, `stud_email`, `stud_password`, `admin_ID`, `course_ID`, `stud_photo`) VALUES
(1507120001, 'robert', 'Robert Mugabe', 'robert@gmail.com', 'robert', 1, 1, 'http://localhost/FinalYearProject/assets/img/Students/FB_IMG_15135010938933282.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_ID`),
  ADD KEY `assignment_courseunit_id_foreign` (`unit_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_ID`),
  ADD KEY `courses_departments_id_foreign` (`dept_ID`);

--
-- Indexes for table `courseunit`
--
ALTER TABLE `courseunit`
  ADD PRIMARY KEY (`unit_ID`),
  ADD KEY `courseunit_lecturers_id_foreign` (`lec_ID`),
  ADD KEY `courseunit_courses_id_foreign` (`course_ID`);

--
-- Indexes for table `coursework`
--
ALTER TABLE `coursework`
  ADD PRIMARY KEY (`work_ID`),
  ADD KEY `coursework_courseunit_id_foreign` (`unit_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_ID`),
  ADD KEY `departments_faculty_id_foreign` (`fac_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_ID`);

--
-- Indexes for table `handouts`
--
ALTER TABLE `handouts`
  ADD PRIMARY KEY (`handout_ID`),
  ADD KEY `handouts_lecturers_id_foreign` (`lec_ID`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lec_ID`),
  ADD KEY `lecturers_departments_id_foreign` (`dept_ID`),
  ADD KEY `lecturers_administrator_id_foreign` (`admin_ID`);

--
-- Indexes for table `results_assignments`
--
ALTER TABLE `results_assignments`
  ADD PRIMARY KEY (`resa_ID`),
  ADD KEY `results_assignments_assignment_id_foreign` (`assignment_ID`);

--
-- Indexes for table `results_coursework`
--
ALTER TABLE `results_coursework`
  ADD PRIMARY KEY (`rescw_ID`),
  ADD KEY `results_coursework_coursework_id_foreign` (`work_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD KEY `students_courses_id_foreign` (`course_ID`),
  ADD KEY `students_administrator_id_foreign` (`admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseunit`
--
ALTER TABLE `courseunit`
  MODIFY `unit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coursework`
--
ALTER TABLE `coursework`
  MODIFY `work_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'This field is the primary key that uniquely identifies the Coursework table', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `handouts`
--
ALTER TABLE `handouts`
  MODIFY `handout_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `lec_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'The Lecturers ID uniquely identifies Lecturer’s table', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results_assignments`
--
ALTER TABLE `results_assignments`
  MODIFY `resa_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results_coursework`
--
ALTER TABLE `results_coursework`
  MODIFY `rescw_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_courseunit_id_foreign` FOREIGN KEY (`unit_ID`) REFERENCES `courseunit` (`unit_ID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_departments_id_foreign` FOREIGN KEY (`dept_ID`) REFERENCES `departments` (`dept_ID`);

--
-- Constraints for table `courseunit`
--
ALTER TABLE `courseunit`
  ADD CONSTRAINT `courseunit_courses_id_foreign` FOREIGN KEY (`course_ID`) REFERENCES `courses` (`course_ID`),
  ADD CONSTRAINT `courseunit_lecturers_id_foreign` FOREIGN KEY (`lec_ID`) REFERENCES `lecturers` (`lec_ID`);

--
-- Constraints for table `coursework`
--
ALTER TABLE `coursework`
  ADD CONSTRAINT `coursework_courseunit_id_foreign` FOREIGN KEY (`unit_ID`) REFERENCES `courseunit` (`unit_ID`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`fac_ID`) REFERENCES `faculty` (`fac_ID`);

--
-- Constraints for table `handouts`
--
ALTER TABLE `handouts`
  ADD CONSTRAINT `handouts_lecturers_id_foreign` FOREIGN KEY (`lec_ID`) REFERENCES `lecturers` (`lec_ID`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_administrator_id_foreign` FOREIGN KEY (`admin_ID`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `lecturers_departments_id_foreign` FOREIGN KEY (`dept_ID`) REFERENCES `departments` (`dept_ID`);

--
-- Constraints for table `results_assignments`
--
ALTER TABLE `results_assignments`
  ADD CONSTRAINT `results_assignments_assignment_id_foreign` FOREIGN KEY (`assignment_ID`) REFERENCES `assignment` (`assignment_ID`);

--
-- Constraints for table `results_coursework`
--
ALTER TABLE `results_coursework`
  ADD CONSTRAINT `results_coursework_coursework_id_foreign` FOREIGN KEY (`work_ID`) REFERENCES `coursework` (`work_ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_administrator_id_foreign` FOREIGN KEY (`admin_ID`) REFERENCES `administrator` (`admin_id`),
  ADD CONSTRAINT `students_courses_id_foreign` FOREIGN KEY (`course_ID`) REFERENCES `courses` (`course_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
