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
}
