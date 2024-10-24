const taskInput = document.getElementById('taskInput');
const addTaskBtn = document.getElementById('addTaskBtn');
const todoList = document.getElementById('todoList');

addTaskBtn.addEventListener('click', function() {
    // Get the value from the input field
    const taskText = taskInput.value.trim();//removing white space with .trim()

    // Check if input is not empty
    if (taskText !== "") {
        // addingg new task to the list
        const newTask = document.createElement('li');
        newTask.textContent = taskText;

        // Create|delete button
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = "Delete";

        // Append delete button to the task
        newTask.appendChild(deleteBtn);

        // Append the new task to the list
        todoList.appendChild(newTask);

        //event listener for delete button
        deleteBtn.addEventListener('click', ()=> {
            todoList.removeChild(newTask);
            // console.log("DeleteTest")
        });

        //clear the input field after adding the task
        taskInput.value = "";
    } else {
        alert("Please enter a task!");//alert user of empty input field
    }
});