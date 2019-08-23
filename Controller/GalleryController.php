<?php

namespace Controller;

class GalleryController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        $view = $this->loadView('Gallery');
        $view->index($id);
    }

    public function insert()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $model = $this->loadModel('Gallery');

            $targetFile = 'images/gallery/' . $_FILES['src']['name'];
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $_POST['src'] = $targetFile;

            if (!isset($_POST['alt']) || !isset($_POST['title'])) {
                $this->redirect('?task=admin&action=index');
            }

            if (file_exists($targetFile)) {
                $this->redirect('?task=admin&action=index');
            }

            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $this->redirect('?task=admin&action=index');
            }

            if (move_uploaded_file($_FILES["src"]["tmp_name"], $targetFile)) {
                $model->update($_POST);
            }

            $this->redirect('?task=gallery&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function slider()
    {
        header('Access-Control-Allow-Origin: *');
        $galleryModel = $this->loadModel('Gallery');
        $image = $galleryModel->getRandom();

        echo '<img class="slider-image" src="' . $this->removeMaliciousCode($image[0]['src']) . '" alt="' . $this->removeMaliciousCode($image[0]['alt']) . '">';
    }

    public function removeMaliciousCode($input)
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}