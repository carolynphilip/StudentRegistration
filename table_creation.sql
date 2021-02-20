--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CourseName` varchar(50) NOT NULL,
  `CourseDetail` varchar(300) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegistrationID` int NOT NULL AUTO_INCREMENT,
  `StudentID` int NOT NULL,
  `CourseID` int NOT NULL,
  PRIMARY KEY (RegistrationID),
  FOREIGN KEY (StudentID) REFERENCES student (ID) ON DELETE CASCADE,
  FOREIGN KEY (CourseID) REFERENCES course (ID) ON DELETE CASCADE,
  CONSTRAINT UC_registration UNIQUE (StudentID,CourseID)
) ENGINE=InnoDB;

