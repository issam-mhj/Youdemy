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
    public function getAllPendingTeachersDetails()
    {
        $query = "SELECT * FROM users WHERE role = 'Teacher' AND is_approved = 0 ";
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
    public function lastThreeCourses()
    {
        $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 3 ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function approveTeacher($id)
    {
        $query = "UPDATE users SET is_approved = 1 WHERE users.id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function rejectTeacher($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function suspendTeacher($id)
    {
        $query = "UPDATE users SET is_approved = 0 WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function getAllCourses()
    {
        $query = "SELECT courses.title,courses.description,courses.category,users.name,courses.created_at,courses.id AS courseID FROM courses JOIN users WHERE users.id = courses.teacher_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteCourse($id)
    {
        $query = "DELETE FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function getCategories()
    {
        $query = "SELECT categories.name,categories.id, COUNT(courses.id) AS course_count FROM categories LEFT JOIN courses ON categories.name = courses.category
        GROUP BY categories.name ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
    public function addCategory($categoryName)
    {
        $query = "INSERT INTO categories(name) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$categoryName]);
    }
    public function getTags()
    {
        $query = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
