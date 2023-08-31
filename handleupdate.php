<?php

$id=$_GET['id'];
$new=$_GET['title'];
include'./database.php';
include'./validation.php';
session_start();
if (isset($_GET['id'])){
    $id=$_GET['id'];
    ($user->getData("tasks", "title", "id = $id"));
    $new=$_GET['title'];
    if($task->taskname("$new")){
        if($task->mintask("$new")){
            if($task->maxtask("$new")){
                ($user->updateData("tasks", ['title' => "$new"], "id = $id"));
                $_SESSION['sucess']= "data updated sucessfully ";
                header("location:./main.php");
                die;
            }}}}


?>