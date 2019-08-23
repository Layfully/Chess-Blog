<?php

namespace Controller;

use \Engine;

class CanvasController extends Controller {

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($id)
    {
        $view = $this->loadView('Canvas');
        $view->index($id);
    }
}