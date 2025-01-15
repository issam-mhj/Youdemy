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
}
