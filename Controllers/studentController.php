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
        $id = $_SESSION["user"]["id"];
        $allMyCourses = $this->studentModel->getAllMyCourses($id);
        $this->render("courses", ["courses" => $courses, "teachers" => $teachers, "myCourses" => $allMyCourses]);
    }
    public function myCourses()
    {
        $id = $_SESSION["user"]["id"];
        $allMyCourses = $this->studentModel->getMyApprovedCourses($id);
        $this->render("student/studentCourses", ["courses" => $allMyCourses]);
    }
    public function enrolled()
    {
        $idCourse = $_GET['id'];
        $idStudent = $_SESSION["user"]["id"];
        $this->studentModel->enrolled($idStudent, $idCourse);
        $this->studentModel->studentsEnroll($idCourse);
        header("location:/");
    }
    public function courseDetails()
    {
        $idCourse = $_GET['id'];
        $course = $this->studentModel->getCourseData($idCourse);
        $this->render("student/courseDetails", ["course" => $course]);
    }
}
