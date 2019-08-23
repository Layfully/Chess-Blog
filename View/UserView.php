<?php

namespace View;

class UserView extends View
{
    public function index($id)
    {

        $userModel = $this->loadModel('User');

        if ($id == null) {

        } else {
            $this->set('userData', $userModel->getOne($id));
        }

        $this->render('UserIndex');
    }
}

