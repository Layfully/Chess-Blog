<?php

namespace Controller;

class SecurityController extends Controller
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        $view = $this->loadView('Security');
        $view->login();
    }

    public function login()
    {
        if (isset($_POST)) {
            $model = $this->loadModel('User');
            $user = $model->getUserWithCredentials($_POST);
            if ($user != null) {
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $user[0]['id'];
                $_SESSION['login'] = $user[0]['login'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['csrf_token'] = uniqid();

                $this->redirect('?task=home&action=index');
            } else {
                $this->redirect('?task=security&action=index');
            }
        } else {
            $this->redirect('?task=security&action=index');
        }
    }

    public function logout()
    {
        if ($_GET['csrf_token'] == $_SESSION['csrf_token']) {
            session_destroy();
        }

        $this->redirect('?task=home&action=index');
    }

    public function register()
    {
        if (isset($_POST['login'])) {
            $model = $this->loadModel('User');
            if($model->getUserWithLogin($_POST['login']) == null){
                $model->insert($_POST);
                $this->redirect('?task=security&action=index');
            }
            $view = $this->loadView('Security');
            $view->register();
        } else {
            $view = $this->loadView('Security');
            $view->register();
        }
    }
}