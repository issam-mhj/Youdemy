<?php
require_once __DIR__ . '/../Controllers/BaseController.php';


class teacherController extends BaseController
{
    private $teacherModel;
    private $courseDocModel;
    private $courseModel;
    private $courseVidModel;
    public function __construct()
    {
        $this->teacherModel = new Teacher();
        $this->courseModel = new Course();
        $this->courseVidModel = new CourseVid();
        $this->courseDocModel = new CourseDoc();
        // $this->accountModel = new Account();
    }
    public function showDashboard()
    {
        $id = $_SESSION["user"]["id"];
        $teacher = $this->teacherModel->teacherInfo($id);
        $allCourses = $this->teacherModel->coursesNum();
        $allStudents = $this->teacherModel->studentNum($id);
        $result = 0;
        foreach ($allStudents as $students) {
            $result = $students["num"] + $result;
        }
        $courses = $this->teacherModel->threeCourses($id);
        $timeDifference = $this->teacherModel->courseTimePassed();
        $this->render("teacher/dashboardTeacher", [
            "teachers" => $teacher,
            "NumCourse" => $allCourses,
            "NumStudent" => $result,
            "allCourses" => $courses,
            "timeDifference" => $timeDifference
        ]);
    }
    public function showCourses()
    {
        $id = $_SESSION["user"]["id"];
        $courses = $this->teacherModel->allCourses($id);
        $this->render("teacher/myCourses", ["myCourses" => $courses]);
    }
    public function showAddCourse()
    {
        $categories = $this->teacherModel->getAllCategories();
        $this->render("teacher/addCourse", ["categories" => $categories]);
    }
    public function addCourse()
    {
        $id = $_SESSION["user"]["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $contentURL = $_POST["content"];
        $category = $_POST["category"];
        $tags = $_POST["tags"];
        $duration = $_POST["duration"];
        $duration = strval($duration);
        $this->courseVidModel->addCourse($title, $description, $contentURL, $category, $id, $duration);
        header("location:/mycourses");
    }
}
