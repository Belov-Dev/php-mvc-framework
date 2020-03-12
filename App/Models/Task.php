<?php

namespace App\Models;

use App\Core\Model;

class Task extends Model
{
    public $error;
    public $orderBy;
    public $sortParams;

    public function tasksList($route)
    {
        $this->sortValidate($_GET);
        $taskCountOnPage = 3;
        $start = ((($route['page'] ?? 1) - 1) * $taskCountOnPage);

        return $this->db->row("SELECT * FROM tasks ORDER BY {$this->orderBy} {$this->sortParams} LIMIT {$start}, {$taskCountOnPage}");
    }

    public function taskAdd($task)
    {
        $params = [
            'title' => $task['title'],
            'author' => $task['author'],
            'email' => $task['email'],
            'description' => $task['description'],
        ];
        $this->db->query('INSERT INTO tasks (title, author, email, description) VALUES (:title, :author, :email, :description)', $params);

        return true;
    }

    public function taskEdit($task, $id)
    {
        $params = [
            'id' => $id,
            'title' => $task['title'],
            'description' => $task['description'],
            'author' => $task['author'],
            'email' => $task['email'],
            'status' => $task['status'],
            'isEditDescription' => $task['isEditDescription'],
        ];

        $this->db->query('UPDATE tasks SET title = :title, author = :author, email = :email, 
        description = :description, status = :status, is_edit_description = :isEditDescription 
        WHERE id = :id', $params);
    }

    public function taskDelete($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM tasks WHERE id = :id', $params);

        return true;
    }

    public function taskData($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM tasks WHERE id = :id', $params);
    }

    public function totalTaskCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM tasks');
    }

    public function taskValidate($task)
    {
        $nameLen = iconv_strlen($task['title']);
        $authorLen = iconv_strlen($task['author']);
        $emailVal = filter_var($task['email'], FILTER_VALIDATE_EMAIL);
        $descriptionLen = iconv_strlen($task['description']);

        if ($nameLen < 3 || $nameLen > 100) {
            $this->error = 'Название должно быть от 3 до 100 символов';

            return false;

        } elseif ($authorLen < 2 || $authorLen > 40) {
            $this->error = 'Имя автора должно быть от 2 до 40 символов';

            return false;

        } elseif ($emailVal === false) {
            $this->error = "E-mail адрес: [{$task['email']}] указан неверно";

            return false;

        } elseif ($descriptionLen < 3 || $descriptionLen > 1000) {
            $this->error = 'Описание должно быть от 3 до 1000 символов';

            return false;
        }
        return true;
    }

    private function sortValidate($sort)
    {
        $orderBy = ['author', 'email', 'status', 'id',];
        $sortParams = ['asc', 'desc'];

        if (empty($sort)) {
            $this->orderBy = 'id';
            $this->sortParams = 'desc';

            return true;
        }

        if (!(in_array($sort['order_by'], $orderBy) && in_array($sort['sort'], $sortParams))) {
            exit('Неверный формат запроса!');
        }
        $this->orderBy = $sort['order_by'];
        $this->sortParams = $sort['sort'];

        return true;
    }

    public function isEditDescription($edit, $id)
    {
        $params = [
            'id' => $id,
        ];
        $checkDescription = $this->db->row('SELECT description FROM tasks WHERE id = :id', $params);

        if ($edit['description'] === $checkDescription[0]['description']) {
            return true;
        }
        return false;
    }
}