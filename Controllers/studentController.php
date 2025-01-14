<?php
require_once __DIR__ . '/../Controllers/BaseController.php';


class studentController extends BaseController
{
    private $studentModel;
    public function __construct()
    {
        $this->studentModel = new Student();
        // $this->accountModel = new Account();
    }
    public function courses()
    {
        $courses = $this->studentModel->getAllCourses();
        $teachers = $this->studentModel->getAllTeachers();
        $this->render("courses", ["courses" => $courses, "teachers" => $teachers]);
    }
}
