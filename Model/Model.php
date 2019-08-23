<?php

namespace Model;

use \PDO;

abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        try {
            require 'config/sql.php';
            $this->pdo = new PDO('mysql:host=' . $host . ';dbname=' . $databaseName, $userName, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (DBException $e) {
            echo 'The connect can not create: ' . $e->getMessage();
        }
    }

    public function loadModel($name, $path = 'Model/')
    {
        return $this->loadType($name, $path, 'Model');
    }

    public function select($from, $select = '*', $where = NULL, $group = NULL, $order = NULL, $limit = NULL)
    {
        $query = 'SELECT ' . $select . ' FROM ' . $from;
        $data = null;
        if ($where != NULL)
            $query = $query . ' WHERE ' . $where;
        if ($order != NULL)
            $query = $query . ' ORDER BY ' . $order;
        if ($group != NULL)
            $query = $query . ' GROUP BY ' . $group;
        if ($limit != NULL)
            $query = $query . ' LIMIT ' . $limit;

        $select = $this->pdo->query($query);
        foreach ($select as $row) {
            $data[] = $row;
        }
        $select->closeCursor();

        return $data;
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