<?php
require_once __DIR__ . '/../Controllers/BaseController.php';


class Authcontroller extends BaseController
{
    private $studentModel;
    private $teacherModel;
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new Admin();
        // $this->accountModel = new Account();
    }
    public function showRegister()
    {
        $this->render("signup");
    }
    public function showLogin()
    {
        $this->render("login");
    }
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerbtn"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role = $_POST["role"];
            if ($role == "Student") {
                $num = 1;
                $this->adminModel->register($name, $email, $password, $role, $num);
                header("location:/login");
                exit;
            } else {
                $num = 0;
                $this->adminModel->register($name, $email, $password, $role, $num);
                header("location:/login");
                exit;
            }
        }
    }
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["valid"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $isCorrect = $this->adminModel->login($email, $password);
            // header("location:/dashboard");
            if ($isCorrect != null) {
                $_SESSION['user'] = [
                    'id' => $isCorrect['id'],
                    'name' => $isCorrect['name'],
                    'email' => $isCorrect['email'],
                    'role' => $isCorrect['role'],
                    'is_approved' => $isCorrect['is_approved']
                ];
                if ($isCorrect["role"] == "Teacher" && $isCorrect["is_approved"] == 1) {
                    echo "welcome mr teacher";
                } else if ($isCorrect["role"] == "Teacher" && $isCorrect["is_approved"] == 0) {
                    echo "you didn't approve yet";
                } else if ($isCorrect["role"] == "Student") {
                    header("location:/");
                } else {
                    echo "welcome mr admin";
                }
            } else {
                echo "wrong email or password";
            }
        }
    }
}
