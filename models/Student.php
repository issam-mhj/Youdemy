<?php

require_once '../config/database.php';

class Student extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllCourses()
    {
        $query = "SELECT * FROM courses";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTeachers()
    {
        $query = "SELECT * FROM users WHERE role='Teacher' ";
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMyCourses($id)
    {
        $query = "SELECT * FROM enrollments JOIN courses WHERE enrollments.student_id=? AND enrollments.course_id= courses.id ";
        $myBooks = $this->conn->prepare($query);
        $myBooks->execute([$id]);
        return $myBooks->fetchAll(PDO::FETCH_ASSOC);
    }
    public function enrolled($idStudent, $idCourse)
    {
        $query = "INSERT INTO enrollments(student_id,course_id) VALUES(?,?)";
        $courses = $this->conn->prepare($query);
        return $courses->execute([$idStudent, $idCourse]);
    }
    public function getCourseData($idCourse)
    {
        $query = "SELECT * FROM courses JOIN users WHERE courses.id=? AND courses.teacher_id=users.id";
        $course = $this->conn->prepare($query);
        $course->execute([$idCourse]);
        return $course->fetchAll(PDO::FETCH_ASSOC);
    }
}
