<?php
include 'model.php';
class Controller
{
    public function register($firstname, $lastname, $email, $username, $password)
    {
        $model = new Model();
        $data = $model->register($firstname, $lastname, $email, $username, $password);
        return $data;
    }
    public function login($username, $password)
    {
        $model = new Model();
        $data = $model->login($username, $password);
        return $data;
    }

}
