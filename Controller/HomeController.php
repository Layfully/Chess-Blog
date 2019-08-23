<?php

namespace Controller;

class HomeController extends Controller{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        $view = $this->loadView('Home');
        $view->index($id);
    }
}