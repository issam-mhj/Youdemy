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
    public function coursesNum()
    {
        $q = "SELECT count(id) as num FROM courses";
        $number = $this->conn->prepare($q);
        $number->execute();
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
}
