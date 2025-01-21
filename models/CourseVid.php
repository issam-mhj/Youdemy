<?php

require_once '../models/Course.php';


class CourseVid extends Course
{
    public function __construct()
    {
        parent::__construct();
    }
    public function duration()
    {
        // $query = "SELECT * FROM course";
        return "";
    }
}


class CourseDoc extends Course
{
    public function __construct()
    {
        parent::__construct();
    }
    public function duration()
    {
        return "this is a course document";
    }
}
