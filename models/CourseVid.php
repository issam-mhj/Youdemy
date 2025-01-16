<?php

require_once '../models/Course.php';


class CourseVid extends Course
{
    public function __construct()
    {
        parent::__construct();
    }
    public function duration()
    {
        // $query = "SELECT * FROM course";
        return "";
    }
    public function addCourse($title, $description, $contentURL, $category, $id, $duration)
    {
        $query = "INSERT INTO courses (title,description,content,category,teacher_id,duration,studentsNumber) VALUES (?,?,?,?,?,?,0)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $description, $contentURL, $category, $id, $duration . " hours"]);
    }
}


class CourseDoc extends Course
{
    public function __construct()
    {
        parent::__construct();
    }
    public function duration()
    {
        return "this is a course document";
    }
}
