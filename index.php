<?php 
// Конфиг 
	require_once('./config.php');
	require_once('./db.php');

	// Модели
	require_once(ROOT . 'tasks/task_new.php');
	require_once(ROOT . 'tasks/task_delete.php');
	require_once(ROOT . 'tasks/task_change_status.php');
	require_once(ROOT . 'tasks/task_get_all.php');
	require_once(ROOT . 'tasks/task_get_stat.php');


	// Создание задачи
	if(isset($_POST['title']) && !empty(trim($_POST['title']))){
		task_new($_POST['title']);
	}

	// Удаление задачи
	if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id']) && is_numeric($_GET['id'])) {
		task_delete($_GET['id']);
	}

	// Изменения статуса задачи 
	if(isset($_GET['action']) && $_GET['action'] === 'changeStatus' && isset($_GET['id']) && is_numeric($_GET['id'])) {
		change_status($_GET['id']);
	}

	// Получения списка всех задач 
	 $tasks = get_all_tasks();

	// Статистика 
	$statistics = get_stat($tasks);
?>

<!DOCTYPE html>
<html lang="ru">
<?php include(ROOT . 'templates/page_parts/head.tpl'); ?>
<body class="todo-app p-5">

<!-- Вывод статистики -->
<?php include(ROOT . 'templates/page_parts/header.tpl'); ?>

	<!-- Вывод задач -->
	<ul class="list-group mb-3">
		<?php 

		if(empty($tasks)) {
			include(ROOT . 'templates/empty.tpl'); 
		} else {
			foreach($tasks as $task) {
				include(ROOT . 'templates/task.tpl');
			}
		}
		?>
	</ul>

	<!-- Форма добавления задачи -->
	<?php include(ROOT . 'templates/page_parts/form.tpl'); ?>

</body>
</html>
