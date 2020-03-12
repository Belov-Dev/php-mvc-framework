<?php


namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $config = require_once 'App/conf/admin.php';

        if (ucfirst(mb_strtolower($post['login'])) == $config['login'] && $post['password'] == $config['password']) {
            return $_SESSION['admin'] = true;
        }

        if(!$this->db->row("SELECT login, password FROM users WHERE users.login = '{$post['login']}' AND users.password = '{$post['password']}'")){
            $this->error = 'Логин или пароль указан неверно';

            return false;
        }
        return true;
    }
}