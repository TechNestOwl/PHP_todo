<?php
//file to store my tasks
$tasksFile = 'tasks.txt';

//handling new task
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])){
    $newTask = htmlspecialchars($_POST['tasks']); // sanitize the input - removing any unsafe chars from user input
    
    //appending th task to tasks.txt
    if(!empty($newTask)){
        file_put_contents($tasksFile,$newTask .PHP_EOL, FILE_APPEND);
    }
    //redirect back to main page after submisson
    header('Location: index.php');
    exit();
}



?>