<?php

namespace Model;

use \PDO;

class ArticleModel extends Model
{
    public function getAll()
    {
        return $this->select("articles AT, tags TG, articles_tags ATTG", "AT.id, AT.autor, AT.date_add, AT.title, AT.description, AT.content, AT.thumbnail, 
        GROUP_CONCAT(TG.name)", 'ATTG.article_id=AT.id AND ATTG.tag_id=TG.id', 'AT.id');
    }

    public function indexAll()
    {
        return $this->select('articles');
    }

    public function getOne($id)
    {
        if (is_numeric($id)) {
            return $this->select("articles AT, tags TG, articles_tags ATTG", "AT.id, AT.autor, DATE_FORMAT(AT.date_add,'%d.%m.%Y'), AT.title, AT.description, AT.content, AT.thumbnail,  
            GROUP_CONCAT(TG.name)", "ATTG.article_id=AT.id AND ATTG.tag_id=TG.id AND AT.id=$id", 'AT.id');
        } else {
            return $this->select("articles AT, tags TG, articles_tags ATTG", "AT.id, AT.autor, AT.date_add, AT.title, AT.description, AT.content, AT.thumbnail,  
        GROUP_CONCAT(TG.name)", "ATTG.article_id=AT.id AND ATTG.tag_id=TG.id AND name='$id'", 'AT.id');
        }
    }

    public function indexOne($id)
    {
        return $this->select('articles', '*', "id LIKE $id");
    }

    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO articles (autor, date_add, title, description, content, thumbnail) VALUES (
            :autor, :date_add, :title, :description, :content, :thumbnail)');
        $ins->bindValue(':autor', $data['autor'], PDO::PARAM_STR);
        $ins->bindValue(':date_add', $data['date_add'], PDO::PARAM_STR);
        $ins->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $ins->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $ins->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $ins->bindValue(':thumbnail', $data['thumbnail'], PDO::PARAM_STR);
        $ins->execute();

        return $this->pdo->lastInsertId();
    }
	
	public function update($data, $id)
	{
		$query = "UPDATE articles SET ";

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

    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM articles where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }
	
	public function modify($id)
	{
		
	}
}