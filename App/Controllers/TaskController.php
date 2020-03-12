<?php

namespace App\Controllers;

use App\Core\Controller as BaseController;
use App\Lib\Pagination;

class TaskController extends BaseController
{

    public function index()
    {
        @$pagination = new Pagination($this->route, $this->model->totalTaskCount());
        $vars = [
            'list' => $this->model->tasksList($this->route),
            'pagination' => $pagination->get(),
            'page' => '/task/add',
            'sortBy' => 'desc',
        ];
        $this->view->render('Список задач', $vars);
    }

    public function edit()
    {
            if ($this->adminRight() === false) {
                echo "<script>alert('Нет доступа! Авторизируйтесь'); window.location.href='/login';</script>";

                return false;
            }
                if (!empty($_POST)) {
                    if (!$this->model->taskValidate($_POST)) {
                        $this->view->message('Ошибка!', $this->model->error);
                    }

                    if ($this->model->isEditDescription($_POST, $this->route['id']) === true) {
                        $_POST += ['isEditDescription' => null];
                    } else {
                        $_POST += ['isEditDescription' => 1];
                    }
                    $this->model->taskEdit($_POST, $this->route['id']);
                }

                if (!empty($_POST['click'])) {
                    $this->view->message('Успешно', 'Сохранено');
                }
                $vars = [
                    'data' => $this->model->taskData($this->route['id']),
                    'page' => @$_SERVER['HTTP_REFERER'],
                ];
            return $this->view->render('Редактирование задачи', $vars);
    }

    public function add()
    {
        if (!empty($_POST['click'])) {
            if (!empty($_POST)) {
                if (!$this->model->taskValidate($_POST)) {
                    $this->view->message('Ошибка!', $this->model->error);
                }
            }
            $id = $this->model->taskAdd($_POST);

            if (!$id) {
                $this->view->message('Не добавлено', 'Ошибка обработки запроса');
            }
            $this->view->message('Успешно', 'Задача добавлена');
        }
        $vars = [
            'page' => '/',
        ];
        $this->view->render('Новая задача', $vars);
    }

    public function delete()
    {
        if ($this->checkRight() === true) {
            $this->model->taskDelete($this->route['id']);
            $this->view->redirect('/task');
        }
        $this->view->redirect($_SERVER['PHP_SELF']);
    }
}