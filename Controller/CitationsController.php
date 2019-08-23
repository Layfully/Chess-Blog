<?php

namespace Controller;

class CitationsController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');

        $citationModel = $this->loadModel('Citation');
        $citation = $citationModel->getRandom();

        echo '<p class="title is-size-5 citation" >' . $citation[0]['citation'] . '</p>';
        echo '<p class="sub-title is-size-6 citation">' . $citation[0]['autor'] . '</p>';
    }

    public function add()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $view = $this->loadView('Citations');
            $view->add();
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function insert()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            if (isset($_POST['citation']) && !empty($_POST['citation'])) {
                $model = $this->loadModel('Citation');
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

            $citationModel = $this->loadModel('Citation');
            $citationModel->delete($id);

            $this->redirect('?task=admin&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function modify($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {

            $view = $this->loadView('Citation');
            $view->modify($id);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function update($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $tagModel = $this->loadModel('Citation');

            $tagModel->update($_POST, $id);

            $this->redirect('?task=admin&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }
}