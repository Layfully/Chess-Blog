<?php

namespace View;

class AdminView extends View
{
    public function index($id)
    {
        $tagModel = $this->loadModel('Tag');
        $articleModel = $this->loadModel('Article');
        $galleryModel = $this->loadModel('Gallery');
        $citationModel = $this->loadModel('Citation');

        if ($id == null)
        {
            $this->set('articlesData', $articleModel->indexAll());
            $this->set('tagsData', $tagModel->getAll());
            $this->set('galleryData', $galleryModel->getAll());
            $this->set('citationsData', $citationModel->getAll());
        }

        $this->render('AdminIndex');
    }
}

