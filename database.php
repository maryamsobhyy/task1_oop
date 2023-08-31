<?php
class DB
{
    public $connection;
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=crud_oop2","root","");
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            die($e->getMessage());
        }
    }

    public function getData($table, $columns = "*", $condition = true)
    {
        $query = "SELECT $columns FROM $table WHERE $condition";
        $data = $this->connection->query($query);
        return $data->fetchAll();
    }

    public function insertData($table, $columns, $data)
    {
        
        $query = "INSERT INTO $table ($columns) VALUES ($data)";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }

    public function updateData($table, $data, $condition)
    {
        foreach ($data as $key => $val) {
            $d[] = "$key = '$val'";
        }
        $info = implode(', ', $d);
        $query = "UPDATE $table SET $info WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }

    public  function deleteData($table, $condition = true)
    {
        $query = "DELETE FROM $table WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
}

 $user = new DB();
// echo "<pre>";
// // $user->deleteData("users");
//  var_dump($user->updateData("users", ['name' => "youssef", "email" => "y@y.y"], "id = 1"));
// print_r($user->insertData("tasks", "`title`","'task2'"));
// print_r($user->getData("users", "name,email", "id = 1"));