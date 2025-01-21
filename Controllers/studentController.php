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

        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        if ($search !== '') {
            $courses = $this->studentModel->getAllCoursesSearch($search);
        } else {
            $courses = $this->studentModel->getAllCourses();
        }
        $teachers = $this->studentModel->getAllTeachers();
        if (isset($_SESSION["user"])) {
            $id = $_SESSION["user"]["id"];
            $allMyCourses = $this->studentModel->getAllMyCourses($id);
            $this->render("courses", ["courses" => $courses, "teachers" => $teachers, "myCourses" => $allMyCourses]);
        } else {
            $this->render("courses", ["courses" => $courses, "teachers" => $teachers]);
        }
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
        $tags = $this->studentModel->getTagsCourse($idCourse);
        $docCourse = new DocumentContent("dd");
        $doc = $docCourse->display($idCourse);
        $vidCourse = new VideoContent("dd");
        $vid = $vidCourse->display($idCourse);
        $this->render("student/courseDetails", [
            "course" => $course,
            "doc" => $doc,
            "vid" => $vid,
            "tags" => $tags
        ]);
    }
}
