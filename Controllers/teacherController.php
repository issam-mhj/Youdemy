<?php
require_once __DIR__ . '/../Controllers/BaseController.php';


class teacherController extends BaseController
{
    private $teacherModel;
    public function __construct()
    {
        $this->teacherModel = new Teacher();
        // $this->accountModel = new Account();
    }
    public function showDashboard()
    {
        $id = $_SESSION["user"]["id"];
        $teacher = $this->teacherModel->teacherInfo($id);
        $allCourses = $this->teacherModel->coursesNum();
        $this->render("teacher/dashboardTeacher", ["teachers" => $teacher]);
    }
}
