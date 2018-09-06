<?php

namespace System;

class Controller
{

    public function loadModel($name): Model
    {
        $model = "\\Application\\Models\\" . $name;
        return new $model();
    }

    public function loadView($name): View
    {
        return new View($name);
    }

    public function loadPlugin($name)
    {
        $plugin = "\\Application\\Plugin\\" . $name;
        return new $plugin();
    }

    public function loadHelper($name)
    {
        $helper = "\\Application\\Helper\\" . $name;
        return new $helper();
    }

    public function redirect($loc)
    {
        global $config;
        header('Location: ' . $config['base_url'] . $loc);
    }

}
