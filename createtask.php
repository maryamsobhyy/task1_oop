<?php
session_start();
include'./database.php';
include'./validation.php';
if ($task->chechkmethod("POST")){
    $title=$_POST['title'];
    if ( $task->taskname($title)){
        if($task->mintask($title)){
            if ($task->maxtask($title)){
        ($user->insertData("tasks", "`title`","'$title'"));
        $_SESSION['sucess']="task added sucessfully";
        header("location:./main.php");
die;
    }
}
}
}
 ?>