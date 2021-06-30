-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 11:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `e_mails` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `e_mails`, `username`, `password`) VALUES
(2, 'ghorineel62@gmail.com', 'neel', '1732'),
(3, 'ghorineel@gmail.com', 'ghori', '1890');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class`) VALUES
(1, '8'),
(2, '9'),
(3, '10');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `class_teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`class_teacher_id`, `class_id`, `teacher_id`) VALUES
(2, 2, 10),
(5, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `exam_student`
--

CREATE TABLE `exam_student` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_year` varchar(255) NOT NULL,
  `exam_time_table` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_student`
--

INSERT INTO `exam_student` (`exam_id`, `exam_name`, `exam_year`, `exam_time_table`) VALUES
(1, 'Mid Exam', '2021', 'exam_time_table/22487_090824.jpg'),
(2, 'Final Exam', '2020', 'exam_time_table/85693_030559.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_date` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message`, `message_date`, `student_id`, `teacher_id`, `parent_id`, `status`) VALUES
(1, '', '21-04-21', 1, 0, 0, 0),
(2, 'hiii', '21-04-23', 0, 9, 0, 0),
(3, 'hjgfhfgd\r\n', '21-04-25', 0, 11, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(255) NOT NULL,
  `notice_details` varchar(255) NOT NULL,
  `notice_posted_by` varchar(255) NOT NULL,
  `notice_poster` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_details`, `notice_posted_by`, `notice_poster`, `notice_date`) VALUES
(8, 'Summer Vacations', 'It start from tomorrow. ', 'Principal', 'notice_poster/109249_090438.jpg', '2021-04-20'),
(9, 'Winter Vacation', 'It start form 2 month after.', 'Supervisor', 'notice_poster/474198_085553.jpg', '2021-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `p_first_name` varchar(255) NOT NULL,
  `p_last_name` varchar(255) NOT NULL,
  `gender_p` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `dob_p` varchar(255) NOT NULL,
  `age_p` int(11) NOT NULL,
  `blood_group_p` varchar(255) NOT NULL,
  `e_mail_p` varchar(255) NOT NULL,
  `address_p` varchar(255) NOT NULL,
  `phone_p` varchar(255) NOT NULL,
  `profiles_photo_p` varchar(255) NOT NULL,
  `password_p` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `p_first_name`, `p_last_name`, `gender_p`, `occupation`, `dob_p`, `age_p`, `blood_group_p`, `e_mail_p`, `address_p`, `phone_p`, `profiles_photo_p`, `password_p`) VALUES
(1, 'Dineshbhai', 'Ghori', 'male', ' Diamond', '1980-10-15', 41, 'A+', 'ghorineel62@gmail.com', '15,hari darshan soc ,katagram,surat', '9825715515', 'profile_photo_parent/162715_025629.jpg', '123'),
(2, 'Ganeshbhai', 'Ghori', 'male', ' Textile Industry', '1974-02-07', 47, 'B+', 'ghorineel62@gmail.com', 'Fariyadka', '8469485373', 'profile_photo_parent/114931_025719.jpg', '456'),
(3, 'Nareshbhai', 'Ghori', 'male', ' Industrial', '1982-08-20', 38, 'O-', 'ghorineel@gmail.com', 'Bhavanagar', '9825770973', 'profile_photo_parent/616191_025848.jpg', '789');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `Rollno` int(11) DEFAULT NULL,
  `StudentName` varchar(255) DEFAULT NULL,
  `Mathematics` varchar(255) DEFAULT NULL,
  `English` varchar(255) DEFAULT NULL,
  `SocialScience` varchar(255) DEFAULT NULL,
  `Science` varchar(255) DEFAULT NULL,
  `Hindi` varchar(255) DEFAULT NULL,
  `Total` varchar(255) DEFAULT NULL,
  `Percentage` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `ExamName` varchar(255) DEFAULT NULL,
  `Year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `Rollno`, `StudentName`, `Mathematics`, `English`, `SocialScience`, `Science`, `Hindi`, `Total`, `Percentage`, `class`, `ExamName`, `Year`) VALUES
(1, 1, 'Neel Ghori', '80', '87', '75', '89', '90', '421', '84.2', '8', 'Mid Exam', '2021'),
(2, 2, 'Keval Bhimani', '70', '88', '89', '90', '95', '432', '86.4', '8', 'Mid Exam', '2021'),
(3, 1, 'Parshu Acharya', '80', '88', '89', '90', '95', '442', '88.4', '9', 'Mid Exam', '2021'),
(4, 2, 'Dhruv Patel', '70', '75', '80', '88', '89', '402', '80.4', '9', 'Mid Exam', '2021'),
(5, 1, 'Priyank Shah', '80', '82', '83', '85', '89', '419', '83.8', '10', 'Mid Exam', '2021'),
(6, 2, 'Jap Dave', '80', '75', '95', '96', '99', '445', '89', '10', 'Mid Exam', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `s_id` int(11) NOT NULL,
  `s_date` varchar(255) NOT NULL,
  `requested` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`s_id`, `s_date`, `requested`, `status`, `student_id`) VALUES
(1, '21-04-27', 'Yes', 0, 2),
(2, '21-04-28', 'Yes', 0, 1),
(3, '21-04-27', 'No', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status_teacher`
--

CREATE TABLE `status_teacher` (
  `s_t_id` int(11) NOT NULL,
  `s_t_date` varchar(255) NOT NULL,
  `requested` varchar(255) NOT NULL,
  `s_teacher` int(11) NOT NULL DEFAULT 0,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_teacher`
--

INSERT INTO `status_teacher` (`s_t_id`, `s_t_date`, `requested`, `s_teacher`, `teacher_id`) VALUES
(4, '21-04-27', 'Yes', 0, 9),
(5, '21-04-27', '', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address_s` varchar(255) DEFAULT NULL,
  `roll_no` varchar(255) DEFAULT NULL,
  `gender_s` varchar(255) DEFAULT NULL,
  `age_s` int(11) DEFAULT NULL,
  `dob_s` varchar(255) DEFAULT NULL,
  `password_s` varchar(255) DEFAULT NULL,
  `blood_group_s` varchar(255) DEFAULT NULL,
  `phone_s` varchar(255) DEFAULT NULL,
  `e_mail_s` varchar(255) DEFAULT NULL,
  `religion_s` varchar(255) DEFAULT NULL,
  `profile_photo_s` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `address_s`, `roll_no`, `gender_s`, `age_s`, `dob_s`, `password_s`, `blood_group_s`, `phone_s`, `e_mail_s`, `religion_s`, `profile_photo_s`, `class_id`, `parent_id`) VALUES
(1, 'Neel', 'Ghori', '15,hari darshan soc, katrgram ,surat', ' 1', 'male', 21, '2000-05-20', '1732', 'B-', '7984581325', 'ghorineel62@gmail.com', 'Hindu', 'profile_photo_student/559105_030008.jpg', 1, 1),
(2, 'Ruchit ', 'Ghori', 'Bhavnagar', ' 2', 'male', 24, '1996-09-16', '987', 'A+', '8758775515', 'ruchit@gmail.com', 'Hindu', 'profile_photo_student/54947_030109.jpg', 1, 3),
(3, 'Dharmit', 'Ghori', 'Bhavnagar', ' 1', 'male', 22, '1999-09-18', '7410', 'A+', '8866774380', 'dharmit@gmail.com', 'Hindu', 'profile_photo_student/454205_030208.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `s_a_id` int(11) NOT NULL,
  `s_a_date` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`s_a_id`, `s_a_date`, `attendance_status`, `student_id`) VALUES
(83, '2021-04-23', 'absent', 1),
(84, '2021-04-23', 'absent', 2),
(103, '2021-04-25', 'absent', 1),
(104, '2021-04-25', 'present', 2),
(105, '2021-04-26', 'present', 1),
(106, '2021-04-26', 'present', 2),
(111, '2021-04-27', 'present', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `class_id`) VALUES
(1, 'Science', 1),
(2, 'Social Science', 1),
(3, 'Mathematics', 1),
(4, 'English', 1),
(5, 'Hindi', 1),
(6, 'Science', 2),
(7, 'Social Science', 2),
(8, 'Mathematics', 2),
(9, 'English', 2),
(11, 'Hindi', 2),
(12, 'Science', 3),
(13, 'Social Science', 3),
(14, 'Mathematics', 3),
(15, 'English', 3),
(16, 'Hindi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `t_f_name` varchar(255) NOT NULL,
  `t_l_name` varchar(255) NOT NULL,
  `address_t` varchar(255) NOT NULL,
  `phone_t` varchar(255) NOT NULL,
  `e_mail_t` varchar(255) NOT NULL,
  `gender_t` varchar(255) NOT NULL,
  `qualification_t` varchar(255) NOT NULL,
  `experience_t` varchar(255) NOT NULL,
  `dob_t` varchar(255) NOT NULL,
  `age_t` varchar(255) NOT NULL,
  `password_t` varchar(255) NOT NULL,
  `religion_t` varchar(255) NOT NULL,
  `profile_photo_t` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `t_f_name`, `t_l_name`, `address_t`, `phone_t`, `e_mail_t`, `gender_t`, `qualification_t`, `experience_t`, `dob_t`, `age_t`, `password_t`, `religion_t`, `profile_photo_t`, `subject_id`) VALUES
(9, 'Dhaval', 'Chandrana', 'Sihor', '9876543210', 'dhaval@gmail.com', 'male', 'B.Tech', '15', '1990-05-15', '31', '1470', 'Hindu', 'profile_photo_teacher/899002_030336.jpg', 1),
(10, 'Chirag', 'Bhalodiya', 'Bhavnagar', '1478523690', 'chirag@gmail.com', 'male', 'B.Tech , M.Tech', '15', '1990-04-20', '31', '147852369', 'Hindu', 'profile_photo_teacher/559534_030523.jpg', 6),
(11, 'Disha ', 'Shukla', 'Bhavanagar', '7412589630', 'disha@gmail.com', 'female', 'B.tech', '5', '1995-05-20', '26', '123654789', 'Hindu', 'profile_photo_teacher/769895_032719.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `t_a_id` int(11) NOT NULL,
  `t_a_date` varchar(255) DEFAULT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`t_a_id`, `t_a_date`, `attendance_status`, `teacher_id`) VALUES
(25, '2021-04-20', 'present', 9),
(26, '2021-04-20', 'present', 10),
(27, '2021-04-21', 'present', 9),
(28, '2021-04-21', 'present', 10),
(29, '2021-04-21', 'present', 11),
(30, '2021-04-22', 'present', 9),
(31, '2021-04-22', 'absent', 10),
(32, '2021-04-22', 'absent', 11);

-- --------------------------------------------------------

--
-- Table structure for table `timetable8`
--

CREATE TABLE `timetable8` (
  `time_table_id` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Monday` varchar(255) DEFAULT NULL,
  `Tuesday` varchar(255) DEFAULT NULL,
  `Wednesday` varchar(255) DEFAULT NULL,
  `Thrusday` varchar(255) DEFAULT NULL,
  `Friday` varchar(255) DEFAULT NULL,
  `Saturday` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable8`
--

INSERT INTO `timetable8` (`time_table_id`, `Time`, `Monday`, `Tuesday`, `Wednesday`, `Thrusday`, `Friday`, `Saturday`, `class`) VALUES
(1, '', '', '', '', '', '', '', ''),
(2, '8:00 - 8:30 AM', 'Maths', 'Maths', 'Maths', 'Maths', 'Maths', 'Maths', '8'),
(3, '8:30 - 9:00 AM', 'Science', 'Social Science', 'Maths', 'Social Science', 'Maths', 'Social Science', '8'),
(4, '9:00 - 9:30 AM', 'English', 'Hindi', 'Science', 'Hindi', 'Science', 'Social Science', '8'),
(5, '9:30 - 10:00 AM', 'English', 'Hindi', 'Social Science', 'Hindi', 'Hindi', 'Science', '8'),
(6, '10:00 - 10:30 AM', 'Lunch', 'Lunch', 'Lunch', 'Lunch', 'Lunch', 'English', '8'),
(7, '10:30 - 11:00 AM', 'Hindi', 'Maths', 'Hindi', 'English', 'Social Science', '', '8'),
(8, '11:00 - 11:30 AM', 'Social Science', 'English', 'Social Science', 'Science', 'Hindi', '', '8'),
(9, '11:30 - 12:00 PM', 'Social Science', 'Science', 'Science', 'Science', 'English', '', '8'),
(10, '12:00 - 12:30 PM', 'English', 'Science', 'Science', 'English', 'Science', '', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`class_teacher_id`);

--
-- Indexes for table `exam_student`
--
ALTER TABLE `exam_student`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `status_teacher`
--
ALTER TABLE `status_teacher`
  ADD PRIMARY KEY (`s_t_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`s_a_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`t_a_id`),
  ADD KEY `teacher_attendance_ibfk_1` (`teacher_id`);

--
-- Indexes for table `timetable8`
--
ALTER TABLE `timetable8`
  ADD PRIMARY KEY (`time_table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `class_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_student`
--
ALTER TABLE `exam_student`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_teacher`
--
ALTER TABLE `status_teacher`
  MODIFY `s_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `s_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `t_a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `timetable8`
--
ALTER TABLE `timetable8`
  MODIFY `time_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_attendance_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
