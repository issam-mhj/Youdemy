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
        $q = "SELECT count(id) FROM courses";
        $number = $this->conn->prepare($q);
        $number->execute();
        return $number->fetch(PDO::FETCH_ASSOC);
    }
}
