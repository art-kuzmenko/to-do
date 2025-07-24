<?php 

function task_new($title) {
    $task = R::dispense('tasks');
	$task->title = $title;
	$id = R::store($task);
}