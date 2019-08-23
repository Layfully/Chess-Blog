<?php

namespace Model;

use \PDO;

class UserModel extends Model
{
    public function insert($data)
    {
        $ins = $this->pdo->prepare('INSERT INTO users (login, password, email) VALUES (:login, :password, :email)');
        $ins->bindValue(':login', $data['login'], PDO::PARAM_STR);
        $ins->bindValue(':password', $data['password'], PDO::PARAM_STR);
        $ins->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $ins->execute();
    }

    public function getAll()
    {
        return $this->select('users');
    }

    public function getOne($id){
        return $this->select('users', '*', "id=$id");
    }

    public function getUserWithLogin($login){
        return $this->select('users', '*', "login='$login'");
    }

    public function getUserWithCredentials($data)
    {
        $user = $this->select('users', '*', 'login = ' . $this->wrapColumnName($data['login']) . ' AND password = ' . $this->wrapColumnName($data['password']));

        return $user;
    }

    public function update($data, $id)
    {
        $query = "UPDATE users SET ";

        while (current($data)) {
            $query = $query.key($data).' = '. ":".key($data). ', ';
            next($data);
        }
        $query = substr($query, 0, -2) .' WHERE id = :id';

        $update = $this->pdo->prepare($query);

        reset($data);

        while (current($data)) {
            $update->bindParam(':'.key($data), $data[key($data)], PDO::PARAM_STR);
            next($data);
        }

        $update->bindParam(':id', $id, PDO::PARAM_INT);

        $update->execute();
    }

    public function delete($id)
    {
        $del = $this->pdo->prepare('DELETE FROM users where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }

    private function wrapColumnName($columnName)
    {
        return "'" . $columnName . "'";
    }

}