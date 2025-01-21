<?php

require_once '../config/database.php';


abstract class Content extends Db
{
    protected $createdAt;

    public function __construct()
    {
        parent::__construct();
    }
    abstract public function save($id);
    // abstract public function display($courseId);
}
