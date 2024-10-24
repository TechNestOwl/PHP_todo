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

//handling task deletions
if(isset($_GET['delete'])){
    $taskIndex = (int)$_GET['delete'];

    //reading all taks from the file
    $tasks = file($taskFile, FILE_IGNORE_NEW_LINES);

    //remove the task with the specified index#
    if(isset($tasks[$taskIndex])){
        unset($tasks[$taskIndex]);

        //rewritte file with the remaining tasks
        file_put_contents($taskFile, implode(PHP_EOL,$tasks) . PHP_EOL);
    }

    //redirect back to main page after deletion
    header('Location: index.php');
    exit();
}

?>

<!-- 
So, simple explanation of what I am doing:

    * Tasks are stored in a simple tasks.txt file, where each task is a new line.
    * If a POST request is made(when user adds a new task) the script appends the new task to tasks.txt
    * When a task needs to be deleted(by its index)  the scrtipt reads all tasks and removes the one at the specified index, and rewrites the file.
    * After adding|deleteing a task, the page is getting refreshed by redirecting to index.php
 -->