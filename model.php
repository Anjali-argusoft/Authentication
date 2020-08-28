<?php
include 'dbconfig.php';
class Model
{
    public $users;
    public function dbconnect()
    {
        $dbcon = new Dbconnection();
        $conn = $dbcon->OpenCon();
        return $conn;
    }

    public function fetchuser($username, $password)
    {
        $conn = $this->dbconnect();
        $getUsers = $conn->prepare("SELECT * FROM login WHERE username = '$username' && password = '$password'");
        $getUsers->execute();
        $this->users = $getUsers->fetchAll();
        return $this->users;

    }

    public function register($firstname, $lastname, $email, $username, $password)
    {
        $result = $this->fetchuser($username, $password);
        if ($result) {
            echo "User already exist";
        } else {
            $conn = $this->dbconnect();
            $query = "INSERT INTO login VALUES('$firstname','$lastname','$email','$username','$password')";
            $data = $conn->exec($query);
            return $data;

        }

    }
    public function login($username, $password)
    {
        $result = $this->fetchuser($username, $password);
        return $result;

    }
}
