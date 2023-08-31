<?php 
$id=$_GET['id'];
session_start();
include'./database.php';
if ($id=true){
    $id=$_GET['id'];
    $user->deleteData("tasks","id=$id");
    $_SESSION['sucess']="data deleted sucessfully";
    header("location:./main.php");
    die;

}
else{
    echo "id not exist in database";
    $_SESSION['error']="data not exist";
    header("location:../taskpage.php");
    die;
}
