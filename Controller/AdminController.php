<?php

namespace Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && ($_SESSION['login'] == 'Admin')) {
            $view = $this->loadView('Admin');
            $view->index($id);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }
}