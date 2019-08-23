<?php

namespace Model;

use \PDO;

class TagModel extends Model
{
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO tags (name) VALUES (:name)');
        $ins->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $ins->execute();
    }

    public function getAll()
    {
        return $this->select('tags');
    }

    public function getOne($id)
    {
        return $this->select('tags', '*', "name='$id'");
    }

    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM tags where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }

    public function update($data, $id)
    {
        $query = "UPDATE tags SET ";

        while (current($data)) {
            $query = $query.key($data).' = '. ":".key($data). ', ';
            next($data);
        }
        $query = substr($query, 0, -2) .' WHERE id = :id';

        $update = $this->pdo->prepare($query);

        reset($data);

        while (current($data)) {
            $update->bindParam(':'.key($data), $data[key($data)], PDO::PARAM_STR);
            next($data);
        }
        $update->bindParam(':id', $id, PDO::PARAM_INT);

        $update->execute();
    }
}