<?php

require_once '../config/database.php';

class Teacher extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
    public function teacherInfo($id)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $teachers = $this->conn->prepare($query);
        $teachers->execute([$id]);
        return $teachers->fetchAll(PDO::FETCH_ASSOC);
    }
    public function coursesNum($id)
    {
        $q = "SELECT count(id) as num FROM courses WHERE teacher_id = ?";
        $number = $this->conn->prepare($q);
        $number->execute([$id]);
        return $number->fetch(PDO::FETCH_ASSOC);
    }
    public function studentNum($id)
    {
        $q = "SELECT studentsNumber as num FROM courses WHERE courses.teacher_id = ? ";
        $number = $this->conn->prepare($q);
        $number->execute([$id]);
        return $number->fetchAll(PDO::FETCH_ASSOC);
    }
    public function threeCourses($id)
    {
        $query = "SELECT * FROM `courses` WHERE `teacher_id` = ? ORDER BY `created_at` DESC LIMIT 3";
        $allCourses = $this->conn->prepare($query);
        $allCourses->execute([$id]);
        return $allCourses->fetchAll(PDO::FETCH_ASSOC);
    }
    public function allCourses($id)
    {
        $query = "SELECT * FROM `courses` WHERE `teacher_id` = ? ORDER BY `created_at` DESC";
        $allCourses = $this->conn->prepare($query);
        $allCourses->execute([$id]);
        return $allCourses->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courseTimePassed()
    {
        $query = "SELECT id,TIMEDIFF(NOW(), `created_at`) AS diff FROM `courses`";
        $time = $this->conn->prepare($query);
        $time->execute();
        return $time->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories";
        $categories = $this->conn->prepare($query);
        $categories->execute();
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllTags(){
        $query = "SELECT * FROM tags";
        $categories = $this->conn->prepare($query);
        $categories->execute();
        return $categories->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRequests($id)
    {
        $query = "SELECT enrollments.id,enrollments.course_id,enrollments.is_approved,users.name,users.email,courses.title,enrollments.enrollment_date
        FROM enrollments JOIN courses JOIN users
        WHERE courses.teacher_id = ? AND enrollments.course_id = courses.id AND enrollments.is_approved = 0  AND users.id = enrollments.student_id";
        $requests = $this->conn->prepare($query);
        $requests->execute([$id]);
        return $requests->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getEnrolled($id)
    {
        $query = "SELECT enrollments.id,enrollments.course_id,enrollments.is_approved,users.name,users.email,courses.title,enrollments.enrollment_date
        FROM enrollments JOIN courses JOIN users
        WHERE courses.teacher_id = ? AND enrollments.course_id = courses.id AND enrollments.is_approved = 1  AND users.id = enrollments.student_id";
        $requests = $this->conn->prepare($query);
        $requests->execute([$id]);
        return $requests->fetchAll(PDO::FETCH_ASSOC);
    }
    public function acceptRequest($requestId)
    {
        $query = "UPDATE enrollments SET is_approved = 1 WHERE enrollments.id = ?";
        $accept = $this->conn->prepare($query);
        return $accept->execute([$requestId]);
    }
    public function rejectRequest($requestId)
    {
        $query = "DELETE FROM enrollments WHERE enrollments.id = ?";
        $reject = $this->conn->prepare($query);
        return $reject->execute([$requestId]);
    }
    public function getLastEnrolled($id)
    {
        $query = "SELECT users.name,courses.title,enrollments.enrollment_date FROM enrollments JOIN courses JOIN users
        WHERE courses.teacher_id = ? AND enrollments.course_id = courses.id AND enrollments.is_approved = 1  AND users.id = enrollments.student_id 
        ORDER BY enrollments.enrollment_date DESC LIMIT 3";
        $requests = $this->conn->prepare($query);
        $requests->execute([$id]);
        return $requests->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteCourse($id)
    {
        $query = "DELETE FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function courseInfo($id)
    {
        $query = "SELECT * FROM courses WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateCourse($title, $description, $id)
    {
        $query = "UPDATE courses SET title= ?, description = ? WHERE courses.id= ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $description, $id]);
    }
}
