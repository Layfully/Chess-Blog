<?php

namespace Controller;

class TagsController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        $view = $this->loadView('Tags');
        $view->index($id);
    }

    public function add()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {

            $view = $this->loadView('Tags');
            $view->add();
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function insert()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $model = $this->loadModel('Tag');
                $model->insert($_POST);
            }
            $this->redirect('?task=admin&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $tagModel = $this->loadModel('Tag');
            $articleTagModel = $this->loadModel('ArticleTags');

            $articleTagModel->deleteByTag($id);
            $tagModel->delete($id);

            $this->redirect('?task=tags&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function modify($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {

            $view = $this->loadView('Tags');
            $view->modify($id);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function update($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $tagModel = $this->loadModel('Tag');

            $tagModel->update($_POST, $id);

            $this->redirect('?task=admin&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }
}