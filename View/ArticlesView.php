<?php

namespace View;

class ArticlesView extends View
{

    public function index($id)
    {
        $articleModel = $this->loadModel('Article');
        $commentModel = $this->loadModel('Comment');
        $userModel = $this->loadModel('User');

        if ($id == null) {
            $this->set('articlesData', $articleModel->getAll());
        } else {
            $this->set('articlesData', $articleModel->getOne($id));
            $this->set('commentsData', $commentModel->getByArticle($id));
            if (isset($_SESSION['logged']) && $_SESSION['logged']) {
                $this->set('userData', $userModel->getOne($_SESSION['id']));
            }
        }

        $this->render('ArticleIndex');
    }

    public function add()
    {
        $tagModel = $this->loadModel('Tag');
        $this->set('tagsData', $tagModel->getAll());
        $this->render('ArticleAdd');
    }

    public function modify($id)
    {
        $tagModel = $this->loadModel('Tag');
        $articleModel = $this->loadModel('Article');

        $this->set('tagsData', $tagModel->getAll());
        $this->set('articleData', $articleModel->indexOne($id));


        $this->render('ArticleModify');
    }
}

