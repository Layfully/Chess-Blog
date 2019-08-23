<?php

namespace Model;

use \PDO;

class CommentModel extends Model
{
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO comments (content, date_add, article_id, user_id) VALUES (:content, NOW(), :article_id, :user_id)');
        $ins->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $ins->bindValue(':article_id', $data['article_id'], PDO::PARAM_STR);
        $ins->bindValue(':user_id', $data['user_id'], PDO::PARAM_STR);
        $ins->execute();
    }

    public function getByArticle($id)
    {
        $commentData = $this->select('comments', '*', "article_id=$id");

        for($i = 0; $i < count($commentData); $i++){
            $userData = $this->select('users', '*', 'id='.$commentData[$i]['user_id']);

            $commentData[$i]['username'] = $userData[0]['login'];
        }

        return $commentData;
    }

    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM comments where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }
/*
    public function getAll()
    {
        return $this->select('tags');
    }

    public function getOne($id)
    {
        return $this->select('tags', '*', "name='$id'");
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
    }*/
}