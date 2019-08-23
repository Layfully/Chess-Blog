<?php

namespace Controller;

class ArticlesController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        $view = $this->loadView('Articles');
        $view->index($id);
    }

    public function add()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $view = $this->loadView('Articles');
            $view->add();
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function insert()
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $articleModel = $this->loadModel('Article');
            $articleTagModel = $this->loadModel('ArticleTags');

            $_POST['thumbnail'] = $targetFile = 'images/thumbnails/' . $_FILES['thumbnail']['name'];

            if ($this->loadFile($targetFile)) {
                $articleId = $articleModel->insert($_POST);

                foreach ($_POST['tag'] as $tag) {
                    $articleTagModel->insert(array($articleId, $tag));
                }

                $this->redirect('?task=articles&action=index');
            } else {
                $this->redirect('?task=home&action=index');
            }
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function delete($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {

            $articleModel = $this->loadModel('Article');
            $articleTagModel = $this->loadModel('ArticleTags');

            $article = $articleModel->getOne($id);

            unlink($article[0]['thumbnail']);

            $articleTagModel->deleteByArticle($id);
            $articleModel->delete($id);

            $this->redirect('?task=articles&action=index');
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function modify($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {
            $view = $this->loadView('Articles');
            $view->modify($id);
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    public function update($id)
    {
        if (isset($_SESSION['logged']) && isset($_SESSION['login']) && $_SESSION['logged'] && $_SESSION['login'] == 'Admin') {

            $articleModel = $this->loadModel('Article');
            $articleTagModel = $this->loadModel('ArticleTags');

            if (isset($_POST)) {
                $_FILES['thumbnail'] = array_filter($_FILES['thumbnail']);
                $_POST['thumbnail'] = $targetFile = isset($_FILES['thumbnail']['name']) ? 'images/thumbnails/' . $_FILES['thumbnail']['name'] : '';

                if (isset($_POST['thumbnail'])) {
                    if (!is_dir($_POST['thumbnail_old']) && !is_dir($_POST['thumbnail'])) {
                        if (file_exists($_POST['thumbnail_old'])) {
                            unlink($_POST['thumbnail_old']);
                        }
                        $this->loadFile($targetFile);
                    }
                }

                unset($_POST['thumbnail_old']);

                if (isset($_POST['tag'])) {
                    $articleTagModel->deleteByArticle($id); //delete old tags
                    foreach ($_POST['tag'] as $tag) {
                        $articleTagModel->insert(array($id, $tag));
                    }
                    unset($_POST['tag']);
                }

                $_POST = array_filter($_POST);
                if (count($_POST) > 0) {
                    $articleModel->update($_POST, $id);
                }

                $this->redirect("?task=articles&action=modify&id=$id");
            }
        } else {
            $this->redirect('?task=home&action=index');
        }
    }

    private function loadFile($targetFile)
    {
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (file_exists($targetFile)) {
            return false;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            return false;
        }

        return move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
    }
}
