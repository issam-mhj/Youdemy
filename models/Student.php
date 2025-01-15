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
}
