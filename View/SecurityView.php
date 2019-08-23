<?php

namespace View;

class SecurityView extends View
{
    public function login()
    {
        $this->render('SecurityLogin');
    }

    public function register()
    {
        $this->render('SecurityRegister');
    }
}