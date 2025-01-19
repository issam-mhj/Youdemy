<?php

require_once '../config/database.php';

class Admin extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($name, $email, $password, $role, $num)
    {
        $query = "INSERT INTO users(name,email,password,role,is_approved) VALUES(?,?,?,?,?) ";
        $register = $this->conn->prepare($query);
        return $register->execute([$name, $email, $password, $role, $num]);
    }
    public function login($email, $password)
    {
        $q = "SELECT * FROM users WHERE email = ? AND password = ? ";
        $query = $this->conn->prepare($q);
        $query->execute([$email, $password]);
        return $query->fetch();
    }
    public function getAdminData($id)
    {
        $query = "SELECT * FROM users WHERE id = ? ";
        $admin = $this->conn->prepare($query);
        $admin->execute([$id]);
        return $admin->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUsersNum()
    {
        $query = "SELECT COUNT(*) FROM users WHERE (role = 'Teacher' OR role = 'Student') AND is_approved =1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getCoursesNum()
    {
        $query = "SELECT COUNT(*) FROM courses ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getPendingTeachers()
    {
        $query = "SELECT COUNT(*) FROM users WHERE role = 'Teacher' AND is_approved = 0 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getPendingTeachersDetails()
    {
        $query = "SELECT * FROM users WHERE role = 'Teacher' AND is_approved = 0 LIMIT 3 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCategoriesNum()
    {
        $query = "SELECT COUNT(*) FROM categories ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function lastThreeTeachers()
    {
        $query = "SELECT * FROM users WHERE role = 'Teacher' AND is_approved = 1 ORDER BY id DESC LIMIT 3 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function lastThreeCourses(){
        $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 3 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
