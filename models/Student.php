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
    public function getAllCoursesSearch($search)
    {
        $sql = "SELECT * FROM courses WHERE 
    title LIKE ? OR 
    description LIKE ? OR 
    category LIKE ?";

        $searchTerm = "%{$search}%";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function getMyApprovedCourses($id)
    {
        $query = "SELECT * FROM enrollments JOIN courses 
        WHERE enrollments.student_id=? AND enrollments.course_id= courses.id AND enrollments.is_approved = 1 
        ";
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
    public function studentsEnroll($idCourse)
    {
        $query = "UPDATE courses SET studentsNumber = studentsNumber + 1 WHERE courses.id = ?";
        $courses = $this->conn->prepare($query);
        return $courses->execute([$idCourse]);
    }
    public function getCourseData($idCourse)
    {
        $query = "SELECT * FROM courses JOIN users ON courses.teacher_id = users.id JOIN contents ON courses.id = contents.course_id
        LEFT JOIN document_contents ON contents.id = document_contents.content_id 
        LEFT JOIN video_contents ON contents.id = video_contents.content_id WHERE courses.id = ?";
        $course = $this->conn->prepare($query);
        $course->execute([$idCourse]);
        return $course->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTagsCourse($idCourse)
    {
        $query = "SELECT * FROM course_tags WHERE course_id= ?";
        $stm = $this->conn->prepare($query);
        $stm->execute([$idCourse]);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
