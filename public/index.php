<?php
session_start();
require_once "../Controllers/Authcontroller.php";
require_once('../Controllers/BaseController.php');
require_once('../Controllers/studentController.php');
require_once('../models/Admin.php');
require_once('../models/Student.php');
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



// Get current URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch the route
$router->dispatch($uri, $method);
