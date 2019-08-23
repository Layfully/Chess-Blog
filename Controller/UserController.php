<?php

namespace Controller;

class UserController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {
            if ($id == $_SESSION['id'] && $_GET['csrf_token'] == $_SESSION['csrf_token']) {
                $view = $this->loadView('User');
                $view->index($id);
            } else {
                $this->redirect('?task=home&action=index');
            }
        } else {
            $this->redirect('?task=home&action=index');

        }
    }

    public function update($id)
    {
        if (isset($_SESSION['logged']) && $_SESSION['logged']) {

            $userModel = $this->loadModel('User');
            $view = $this->loadView('User');

            $targetFile = 'images/profiles/' . $_FILES['profile_image']['name'];
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $_POST['profile_image'] = $targetFile;

            if (file_exists($targetFile)) {
                $view->index($id);
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $view->index($id);
            }

            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {
                unset($_POST['csrf_token']);
                $userModel->update($_POST, $id);
            }

            $view->index($id);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }
}