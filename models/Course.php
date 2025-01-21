<?php

require_once '../config/database.php';


class Course extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
    public function addCourse($title, $description, $category, $id, $duration)
    {
        $query = "INSERT INTO courses (title,description,category,teacher_id,duration,studentsNumber) VALUES (?,?,?,?,?,0)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $description, $category, $id, $duration . " hours"]);
    }
    public function getidcourse($id, $title, $description)
    {
        $query = "SELECT id FROM courses WHERE teacher_id = ? AND title = ? AND description = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id, $title, $description]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // function duration();
}
