<?php

function change_status($id) {

		// Загружаем задачу
		$task = R::load('tasks', $id);

		// Обновляем статус задачи 
		if ($task->status === 'ready') {
			$task->status = NULL;
		} else {
			$task->status = 'ready';
		}

		// Сохраняем статус задачи 
		R::store($task);
}