<?php
session_start();
require_once "../Controllers/Authcontroller.php";
require_once('../Controllers/BaseController.php');
require_once('../Controllers/studentController.php');
require_once('../Controllers/teacherController.php');
require_once('../Controllers/adminController.php');
require_once('../models/Admin.php');
require_once('../models/Student.php');
require_once('../models/Teacher.php');
require_once('../models/Content.php');
require_once('../models/DocumentContent.php');
require_once('../models/videoContent.php');
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/CourseVid.php';
require_once('../core/Router.php');
require_once('../core/Route.php');
require_once('../config/database.php');








$router = new Router();
Route::setRouter($router);




Route::get('/', [studentController::class, 'courses']);
Route::get('/register', [Authcontroller::class, 'showRegister']);
Route::get('/login', [Authcontroller::class, 'showLogin']);
Route::post('/register/signup', [Authcontroller::class, 'register']);
Route::post('/login/signin', [Authcontroller::class, 'login']);
Route::get('/mycourses', [studentController::class, 'myCourses']);
Route::get('/enrolled', [studentController::class, 'enrolled']);
Route::get('/mycourses/details', [studentController::class, 'courseDetails']);
Route::get('/teacher', [teacherController::class, 'showDashboard']);
Route::get('/profCourses', [teacherController::class, 'showCourses']);
Route::get('/mycourses/addNewCourse', [teacherController::class, 'showAddCourse']);
Route::post('/mycourses/addNewCourse', [teacherController::class, 'addCourse']);
Route::get('/managestudents', [teacherController::class, 'showManageStudents']);
Route::get('/managestudents/accepted', [teacherController::class, 'acceptRequest']);
Route::get('/managestudents/rejected', [teacherController::class, 'rejectRequest']);
Route::get('/statistics', [teacherController::class, 'showStats']);
Route::get('/admin', [adminController::class, 'dashboard']);
Route::get('/admin/manageusers', [adminController::class, 'showManageUsers']);
Route::get('/admin/manageusers/approved', [adminController::class, 'approvedTeacher']);
Route::get('/admin/manageusers/rejected', [adminController::class, 'rejectedTeacher']);
Route::get('/admin/manageusers/suspend', [adminController::class, 'suspendTeacher']);
Route::get('/admin/managecourses', [adminController::class, 'showCourses']);
Route::get('/admin/managecourses/deletecourse', [adminController::class, 'deleteCourse']);
Route::get('/admin/managetags', [adminController::class, 'showManagetags']);
Route::get('/admin/managetags/deletecat', [adminController::class, 'deleteCategory']);
Route::post('/admin/managetags/addcategory', [adminController::class, 'addCategory']);
Route::get('/admin/managetags/deletetag', [adminController::class, 'deleteTag']);
Route::post('/admin/managetags/addTag', [adminController::class, 'addTag']);
Route::get('/admin/statistics', [adminController::class, 'showStats']);



// Get current URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch the route
$router->dispatch($uri, $method);
