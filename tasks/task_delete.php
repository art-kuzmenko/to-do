<?php 

function task_delete($id) {
    $task = R::load('tasks', $id);
	R::trash($task);
}