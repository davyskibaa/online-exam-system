<?php

class Controller
{
    public function model($model)
    {
        // Require model file
        require_once '../app/model/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    // Load View
    public function view($view, $data = [])
    {
        // Check for view file
        if (file_exists('../app/view/' . $view . '.php')) {
            require_once '../app/view/' . $view . '.php';
        } else {
            // View does not exists
            die('View does not exist');
        }
    }
}
    