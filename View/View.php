<?php

namespace View;

use \Exception;

abstract class View
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function loadModel($name, $path = 'Model/')
    {
        return $this->loadType($name, $path, 'Model');
    }

    public function render($name, $path = 'templates/')
    {
        $path = $path . $name . '.php';
        try {
            if (is_file($path)) {
                require_once $path;
            } else {
                throw new Exception('Nie można otworzyć template ' . $name . ' w: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
    }

    public function set($name, $value)
    {
        $this->$name = $value;
    }

    public function get($name)
    {
        return $this->$name;
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

    public function removeMaliciousCode($input)
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
