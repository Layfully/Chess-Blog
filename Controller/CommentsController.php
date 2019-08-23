<?php

namespace Controller;

class CommentsController extends Controller
{

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function insert($id)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            $data = $_POST;
            $data['article_id'] = $id;
            $data['user_id'] = $_SESSION['id'];
            unset($data['csrf_token']);

            if (isset($_POST['content']) && !empty($_POST['content']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
                $commentModel = $this->loadModel('Comment');
                $commentModel->insert($data);
            }

            $this->redirect('?task=articles&action=index&id=' . $_GET['id']);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {

            $commentModel = $this->loadModel('Comment');

            if ($_GET['csrf_token'] == $_SESSION['csrf_token']) {
                $commentModel->delete($id);
            }

            $this->redirect('?task=articles&action=index&id=' . $_GET['article_id']);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }
}