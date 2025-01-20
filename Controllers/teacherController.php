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
        $allCourses = $this->teacherModel->coursesNum($id);
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
        $typecontent = $_POST["typecontent"];
        $tags = $_POST["tags"];
        $duration = $_POST["duration"];
        $duration = strval($duration);
        $this->courseModel->addCourse($title, $description, $category, $id, $duration);
        $idcontent = $this->courseModel->getidcourse($id, $title, $description);
        if ($typecontent === "document") {
            $course = new DocumentContent($contentURL);
            $course->save($idcontent["id"]);
        } else {
            $course = new VideoContent($contentURL);
            $course->save($idcontent["id"]);
        }
        header("location:/profCourses");
    }
    public function showManageStudents()
    {
        $id = $_SESSION["user"]["id"];
        $requests = $this->teacherModel->getRequests($id);
        $enrolled = $this->teacherModel->getEnrolled($id);
        $this->render("teacher/managestudents", ["requests" => $requests, "enrolled" => $enrolled]);
    }
    public function acceptRequest()
    {
        $requestId = $_GET["id"];
        $this->teacherModel->acceptRequest($requestId);
        header("location:/managestudents");
    }
    public function rejectRequest()
    {
        $requestId = $_GET["id"];
        $this->teacherModel->rejectRequest($requestId);
        header("location:/managestudents");
    }
    public function showStats()
    {
        $id = $_SESSION["user"]["id"];
        $allCourses = $this->teacherModel->coursesNum($id);
        $allStudents = $this->teacherModel->studentNum($id);
        $myCourses = $this->teacherModel->allCourses($id);
        $result = 0;
        foreach ($allStudents as $students) {
            $result = $students["num"] + $result;
        }
        $avrgStudents = $result / $allCourses["num"];
        $lastEnrolled = $this->teacherModel->getLastEnrolled($id);
        $this->render("teacher/statistiques", ["num" => $result, "lastEnrolled" => $lastEnrolled, "mycourses" => $myCourses, "avg" => $avrgStudents, "courses" => $allCourses["num"]]);
    }
}
