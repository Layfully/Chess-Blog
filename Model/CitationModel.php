<?php

namespace Model;

use \PDO;

class CitationModel extends Model
{
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO citations (citation, autor) VALUES (:citation, :autor)');
        $ins->bindValue(':citation', $data['citation'], PDO::PARAM_STR);
        $ins->bindValue(':autor', $data['autor'], PDO::PARAM_STR);
        $ins->execute();
    }

    public function getAll()
    {
        return $this->select('citations');
    }

    public function getOne($id)
    {
        return $this->select('citations', '*', "id=$id");
    }

    public function getRandom()
    {
        return $this->select('citations', '*', NULL, NULL, 'RAND()', ' 1');
    }
    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM citations where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }

    public function update($data, $id)
    {
        $query = "UPDATE citations SET ";

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