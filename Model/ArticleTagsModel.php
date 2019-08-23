<?php

namespace Model;

use \PDO;

class ArticleTagsModel extends Model
{
    /*public function getAll()
    {
        return $this->select("articles AT, tags TG, articles_tags ATTG", "AT.id, AT.autor, AT.date_add, AT.title, AT.description, AT.content, AT.thumbnail, 
        GROUP_CONCAT(TG.name)", 'ATTG.article_id=AT.id AND ATTG.tag_id=TG.id', 'AT.id');
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
*/
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO articles_tags (article_id, tag_id) VALUES (:article_id, :tag_id)');
        $ins->bindValue(':article_id', $data[0], PDO::PARAM_INT);
        $ins->bindValue(':tag_id', $data[1], PDO::PARAM_INT);

        $ins->execute();
    }

    public function deleteByArticle($articleId)
    {
        $del = $this->pdo->prepare('DELETE FROM articles_tags where article_id=:article_id');
        $del->bindValue(':article_id', $articleId, PDO::PARAM_INT);
        $del->execute();
    }

    public function deleteByTag($tagId)
    {
        $del = $this->pdo->prepare('DELETE FROM articles_tags where tag_id=:tag_id');
        $del->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $del->execute();
    }

    public function delete($articleId, $tagId)
    {
        $del = $this->pdo->prepare('DELETE FROM articles_tags where article_id=:article_id and tag_id=:tag_id');
        $del->bindValue(':article_id', $articleId, PDO::PARAM_INT);
        $del->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $del->execute();
    }
}