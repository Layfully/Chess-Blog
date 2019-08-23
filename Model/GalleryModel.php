<?php

namespace Model;

class GalleryModel extends Model
{

    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO gallery (title, alt, src) VALUES (:title, :alt, :src)');
        $ins->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $ins->bindValue(':alt', $data['alt'], PDO::PARAM_STR);
        $ins->bindValue(':src', $data['src'], PDO::PARAM_STR);
        $ins->execute();
    }


    public function getAll()
    {
        return $this->select('gallery');
    }

    public function getRandom()
    {
        return $this->select('gallery', '*', NULL, NULL, 'RAND()', ' 1');
    }

    /*
        public function getOne($id){
            return $this->select('tags', '*', "name='$id'");
        }


        /
        public function delete($id) {
            $del=$this->pdo->prepare('DELETE FROM tags where id=:id');
            $del->bindValue(':id', $id, PDO::PARAM_INT);
            $del->execute();
        }*/
}