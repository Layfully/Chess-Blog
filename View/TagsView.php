<?php

namespace View;

class TagsView extends View
{
    public function index($id)
    {
        $tagModel = $this->loadModel('Tag');

        if ($id == null) {
            $this->set('tagsData', $tagModel->getAll());
        } else {
            $this->set('tagsData', $tagModel->getOne($id));
        }

        $this->render('TagIndex');
        $this->render('TagAdd');
    }

    public function add()
    {
        $this->render('TagAdd');
    }

    public function modify($id)
    {
        $tagModel = $this->loadModel('Tag');
        //$articleModel = $this->loadModel('Article');
        $this->set('tagData', $tagModel->getOne($id));
        //$this->set('articleData', $articleModel->indexOne($id));

        $this->render('TagModify');
    }
}