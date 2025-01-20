<?php
require_once __DIR__ . '/../Controllers/BaseController.php';


class adminController extends BaseController
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new Admin();
    }
    public function dashboard()
    {
        $id = $_SESSION["user"]["id"];
        $data = $this->adminModel->getAdminData($id);
        $usersNum = $this->adminModel->getUsersNum();
        $numCourses = $this->adminModel->getCoursesNum();
        $pendingTeachers = $this->adminModel->getPendingTeachers();
        $pendingTeachersDetails = $this->adminModel->getPendingTeachersDetails();
        $categoriesNum = $this->adminModel->getCategoriesNum();
        $lastThreeTeachers = $this->adminModel->lastThreeTeachers();
        $lastThreeCourses = $this->adminModel->lastThreeCourses();
        $this->render('admin/dashboard', [
            "pteachers" => $pendingTeachersDetails,
            "categoryNum" => $categoriesNum,
            "pendingTeachers" => $pendingTeachers,
            "courseNum" => $numCourses,
            "admin" => $data,
            "userNum" => $usersNum,
            "lastTeachers" => $lastThreeTeachers,
            "lastCourses" => $lastThreeCourses
        ]);
    }
    public function showManageUsers()
    {
        $id = $_SESSION["user"]["id"];
        $data = $this->adminModel->getAdminData($id);
        $pteachers = $this->adminModel->getAllPendingTeachersDetails();
        $allUsers = $this->adminModel->getAllUsers();
        $this->render('admin/userManagement', [
            "admin" => $data,
            "pteachers" => $pteachers,
            "allUsers" => $allUsers
        ]);
    }
    public function approvedTeacher()
    {
        $id = $_GET["id"];
        $this->adminModel->approveTeacher($id);
        header("location:/admin/manageusers");
    }
    public function rejectedTeacher()
    {
        $id = $_GET["id"];
        $this->adminModel->rejectTeacher($id);
        header("location:/admin/manageusers");
    }
    public function suspendTeacher()
    {
        $id = $_GET["id"];
        $this->adminModel->suspendTeacher($id);
        header("location:/admin/manageusers");
    }
    public function showCourses()
    {
        $id = $_SESSION["user"]["id"];
        $data = $this->adminModel->getAdminData($id);
        $courses = $this->adminModel->getAllCourses();
        $this->render("admin/courseManagement", [
            "admin" => $data,
            "courses" => $courses
        ]);
    }
    public function deleteCourse()
    {
        $id = $_GET["id"];
        $this->adminModel->deleteCourse($id);
        header("location:/admin/managecourses");
    }
    public function showManagetags()
    {
        $id = $_SESSION["user"]["id"];
        $data = $this->adminModel->getAdminData($id);
        $categories = $this->adminModel->getCategories();
        $tags = $this->adminModel->getTags();
        $this->render("admin/tagcateManage", [
            "admin" => $data,
            "categories" => $categories
        ]);
    }
    public function deleteCategory()
    {
        $id = $_GET["id"];
        $this->adminModel->deleteCategory($id);
        header("location:/admin/managetags");
    }
    public function addCategory()
    {
        $categoryName = $_POST["categoryName"];
        $this->adminModel->addCategory($categoryName);
        header("location:/admin/managetags");
    }
}
