<?php

namespace View;

class HomeView extends View
{
    public function index($id)
    {
        $tagModel = $this->loadModel('Tag');
        $articleModel = $this->loadModel('Article');
        $citationModel = $this->loadModel('Citation');
        $galleryModel = $this->loadModel('Gallery');

        $this->set('citationData', $citationModel->getRandom());
        $this->set('sliderData', $galleryModel->getRandom());

        if ($id == null) {
            $this->set('articlesData', $articleModel->getAll());
            $this->set('tagsData', $tagModel->getAll());

        } else {
            $this->set('articlesData', $articleModel->getOne($id));
        }

        $this->render('HomeIndex');
    }
}

