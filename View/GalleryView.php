<?php

namespace View;

class GalleryView extends View
{
    public function index($id)
    {
        $imageModel = $this->loadModel('Gallery');

        $this->set('imagesData', $imageModel->getAll());

        $this->render('GalleryIndex');
    }
}

