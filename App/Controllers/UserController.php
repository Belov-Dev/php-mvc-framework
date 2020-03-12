<?php

namespace App\Controllers;

use App\Core\Controller as BaseController;

class UserController extends BaseController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'user';
    }

    public function login()
    {
        if (isset($_SESSION['admin'])) {
            echo "<script>alert('Вы уже залогинились!'); window.location.href='/task';</script>";

            return false;
        }

        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('Ошибка!', $this->model->error);
            }
            $this->view->location('task');
        }
        $this->view->render('Авторизация');
    }

    public function logout()
    {
        if($this->checkRight() === true) {
            session_unset();
        }
        $this->view->redirect('/');
    }
}