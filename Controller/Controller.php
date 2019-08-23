<?php

namespace Controller;

use \Exception;

abstract class Controller
{
    public function redirect($url)
    {
        header('location: ' . $url);
    }

    public function loadView($name, $path = 'View/')
    {
        return $this->loadType($name, $path, 'View');
    }

    public function loadModel($name, $path = 'Model/')
    {
        return $this->loadType($name, $path, 'Model');
    }

    private function loadType($name, $path, $type)
    {
        $path = $path . $name . $type . '.php';
        $name = $name . $type;

        try {
            if (is_file($path)) {
                $class = "\\$type\\$name";
                $object = new $class;
            } else {
                throw new Exception('Nie mozna otworzyć ' . $type . ': ' . $name . ' w ' . $path);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
            exit;
        }

        return $object;
    }
}