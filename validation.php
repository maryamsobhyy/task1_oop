<?php 
class validation{
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
    public function chechkmethod ($method){
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            return true;
        }
        else {
            echo "Method unavailable";
        }

    }
    public function taskname ($column){
        if (strlen($column)>0){
            return true;
        }
        else {
            $_SESSION['error']="Please enter a valid task ";
            header("location:./main.php");
            die;
        }

    }
    public function mintask ($column){
        if (strlen($column)<3){
            $_SESSION['error']="please enter task more than 3 letters ";
            header("location:./main.php");
            die;
        }
        else {
           return true;
        }

    }
    public function maxtask ($column){
        if (strlen($column)>15){
            $_SESSION['error']="please enter task less than 15 letters ";
            header("location:./main.php");
            die;
        }
        else {
           return true;
        }

    }
  
}

$task=new validation;
?>