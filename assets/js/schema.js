class Attendance {
  constructor(Hours, studentID, sectionID, DateAttended, AttendanceID = null) {
    this.DateAttended = DateAttended;
    this.Hours = Hours;
    this.studentID = studentID;
    this.sectionID = sectionID;
    this.AttendanceID = AttendanceID;
  }
}

class Course {
  constructor(Name, Description, Credits, Term, CourseID = null) {
    this.CourseID = CourseID;
    this.Name = Name;
    this.Description = Description;
    this.Credits = Credits;
    this.Term = Term;
  }
}

class Department {
  constructor(Name, HOD, Email, salary, DepartmentID = null) {
    this.DepartmentID = DepartmentID;
    this.Name = Name;
    this.HOD = HOD;
    this.Email = Email;
    this.salary = salary;
  }
}

class Enrollment {
  constructor(AcademicYear, Term, DateEnrolled, sectionID, FinalGrade, MidtermGrade, studentID, EnrollmentID = null) {
    this.EnrollmentID = EnrollmentID;
    this.AcademicYear = AcademicYear;
    this.Term = Term;
    this.DateEnrolled = DateEnrolled;
    this.sectionID = sectionID;
    this.FinalGrade = FinalGrade;
    this.MidtermGrade = MidtermGrade;
    this.studentID = studentID;
  }
}

class Instructor {
  constructor(LastName, FirstName, departmentID, Rank, CollegeID, InstructorID = null) {
    this.InstructorID = InstructorID;
    this.LastName = LastName;
    this.FirstName = FirstName;
    this.departmentID = departmentID;
    this.Rank = Rank;
    this.CollegeID = CollegeID;
  }
}

class Schedule {
  constructor(Day, StartTime, EndTime, ScheduleID = null) {
    this.ScheduleID = ScheduleID;
    this.Day = Day;
    this.StartTime = StartTime;
    this.EndTime = EndTime;
  }
}

class Section {
  constructor(Name, Room, courseID, scheduleID, instructorID, sectionID = null) {
    this.sectionID = sectionID;
    this.Name = Name;
    this.Room = Room;
    this.courseID = courseID;
    this.scheduleID = scheduleID;
    this.instructorID = instructorID;
  }
}

class Student {
  constructor(LastName, FirstName, Email, collegeID, studentID = null) {
    this.studentID = studentID;
    this.LastName = LastName;
    this.FirstName = FirstName;
    this.Email = Email;
    this.collegeID = collegeID;
  }
}