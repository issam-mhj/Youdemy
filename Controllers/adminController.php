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
}
