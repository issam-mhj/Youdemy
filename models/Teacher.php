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
    public function studentNum()
    {
        $q = "SELECT count(id) as num FROM users";
        $number = $this->conn->prepare($q);
        $number->execute();
        return $number->fetch(PDO::FETCH_ASSOC);
    }
    public function allCourses()
    {
        $query = "SELECT * FROM `courses` ORDER BY `created_at` DESC LIMIT 3";
        $allCourses = $this->conn->prepare($query);
        $allCourses->execute();
        return $allCourses->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courseTimePassed()
    {
        $query = "SELECT id,TIMEDIFF(NOW(), `created_at`) AS diff FROM `courses`";
        $time = $this->conn->prepare($query);
        $time->execute();
        return $time->fetchAll(PDO::FETCH_ASSOC);
    }
    public function studentsInCourse(){
        // $query = "SELECT "
    }
}
