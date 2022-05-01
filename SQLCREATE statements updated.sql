-- MySQL Script generated by MySQL Workbench
-- Wed Mar 30 01:19:31 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema registrationdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema registrationdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `registrationdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `registrationdb` ;

-- -----------------------------------------------------
-- Table `registrationdb`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`course` (
  `CourseID` INT NOT NULL,
  `Name` VARCHAR(45) NULL DEFAULT NULL,
  `Desription` VARCHAR(45) NULL DEFAULT NULL,
  `Credits` INT NULL DEFAULT NULL,
  `Term` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`CourseID`),
  UNIQUE INDEX `CourseID_UNIQUE` (`CourseID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`department` (
  `DepartmentID` INT NOT NULL,
  `Name` VARCHAR(45) NULL DEFAULT NULL,
  `HOD` VARCHAR(45) NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  `salary` DECIMAL(19,4) NULL DEFAULT NULL,
  PRIMARY KEY (`DepartmentID`),
  UNIQUE INDEX `DepartmentID_UNIQUE` (`DepartmentID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`instructor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`instructor` (
  `InstructorID` INT NOT NULL,
  `CollegeID` VARCHAR(45) NULL DEFAULT NULL,
  `LastName` VARCHAR(45) NULL DEFAULT NULL,
  `FirstName` VARCHAR(45) NULL DEFAULT NULL,
  `Rank` VARCHAR(45) NULL DEFAULT NULL,
  `departmentID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`InstructorID`),
  UNIQUE INDEX `InstructorID_UNIQUE` (`InstructorID` ASC) ,
  INDEX `departmentID_idx` (`departmentID` ASC) ,
  CONSTRAINT `departmentID`
    FOREIGN KEY (`departmentID`)
    REFERENCES `registrationdb`.`department` (`DepartmentID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`schedule` (
  `ScheduleID` INT NOT NULL,
  `Day` DATE NULL DEFAULT NULL,
  `StartTime` TIME NULL DEFAULT NULL,
  `EndTime` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`ScheduleID`),
  UNIQUE INDEX `ScheduleID_UNIQUE` (`ScheduleID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`section` (
  `sectionID` INT NOT NULL,
  `Name` VARCHAR(45) NULL DEFAULT NULL,
  `Room` VARCHAR(45) NULL DEFAULT NULL,
  `courseID` INT NULL DEFAULT NULL,
  `scheduleID` INT NULL DEFAULT NULL,
  `instructorID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`sectionID`),
  UNIQUE INDEX `sectionID_UNIQUE` (`sectionID` ASC) ,
  INDEX `courseID_idx` (`courseID` ASC) ,
  INDEX `scheduleID_idx` (`scheduleID` ASC) ,
  INDEX `instructorID_idx` (`instructorID` ASC) ,
  CONSTRAINT `courseID`
    FOREIGN KEY (`courseID`)
    REFERENCES `registrationdb`.`course` (`CourseID`),
  CONSTRAINT `instructorID`
    FOREIGN KEY (`instructorID`)
    REFERENCES `registrationdb`.`instructor` (`InstructorID`),
  CONSTRAINT `scheduleID`
    FOREIGN KEY (`scheduleID`)
    REFERENCES `registrationdb`.`schedule` (`ScheduleID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`student` (
  `studentID` INT NOT NULL,
  `LastName` VARCHAR(45) NULL DEFAULT NULL,
  `FirstName` VARCHAR(45) NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  `collegeID` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE INDEX `studentID_UNIQUE` (`studentID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`attendance` (
  `AttendanceID` VARCHAR(25) NOT NULL,
  `DateAttended` DATE NULL DEFAULT NULL,
  `Hours` TIME NULL DEFAULT NULL,
  `sectionID` INT NULL DEFAULT NULL,
  `studentID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`AttendanceID`),
  UNIQUE INDEX `AttendanceID_UNIQUE` (`AttendanceID` ASC) ,
  INDEX `studentID_idx` (`studentID` ASC) ,
  INDEX `sectionID` (`sectionID` ASC) ,
  CONSTRAINT `sectionID`
    FOREIGN KEY (`sectionID`)
    REFERENCES `registrationdb`.`section` (`sectionID`),
  CONSTRAINT `studentID`
    FOREIGN KEY (`studentID`)
    REFERENCES `registrationdb`.`student` (`studentID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `registrationdb`.`enrollment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `registrationdb`.`enrollment` (
  `EnrollmentID` INT NOT NULL,
  `AcademicYear` VARCHAR(255) NULL DEFAULT NULL,
  `Term` INT NULL DEFAULT NULL,
  `DateEnrolled` DATE NULL DEFAULT NULL,
  `sectionID` INT NULL DEFAULT NULL,
  `FinalGrade` INT NULL DEFAULT NULL,
  `MidtermGrade` INT NULL DEFAULT NULL,
  `studentID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`EnrollmentID`),
  UNIQUE INDEX `EnrollmentID_UNIQUE` (`EnrollmentID` ASC) ,
  INDEX `studentID_idx` (`studentID` ASC) ,
  INDEX `sectionID_idx` (`sectionID` ASC) ,
  CONSTRAINT `FK_sectionenrollment`
    FOREIGN KEY (`sectionID`)
    REFERENCES `registrationdb`.`section` (`sectionID`),
  CONSTRAINT `FK_studentenrollment`
    FOREIGN KEY (`studentID`)
    REFERENCES `registrationdb`.`student` (`studentID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;