<?php

class BaseController
{
    public function render($view, $data = [])
    {

        extract($data);
        include __DIR__ . '/../views/' . $view . '.php';
        exit();
    }
}
