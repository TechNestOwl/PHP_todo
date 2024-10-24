<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        
        <!-- To-Do Input Form -->
        <div class="todo-input">
            <!-- implementing POST method for PHP -->
            <form method="POST" action="task-handler.php">
                <input type="text" name="task" id="taskInput" placeholder="Add a new task..." required />
                <button type="submit">Add Task</button>
                <!-- removed  id="addTaskBtn" -->
            </form>
        </div>
        
        <!-- To-Do List -->
        <ul id="todoList">
            <?php
                // read tasks from the file and display them
                 $tasksFile = 'tasks.txt';
                 if(file_exists($tasksFile)){
                    $tasks = file($tasksFile, FILE_IGNORE_NEW_LINES);
                    foreach($tasks as $index => $task) {
                        echo "<li>".htmlspecialchars($task).
                            "<a href='task-handler.php?delete=$index'>Delete</a></li>";
                    }
                 }
            ?>
        </ul>
    </div>

    <!-- Link to JavaScript -->
    <script src="script.js"></script>
</body>
</html>
