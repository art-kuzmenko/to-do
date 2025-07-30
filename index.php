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

	// Удаление задачи через POST
	if(isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['id']) && is_numeric($_POST['id'])) {
    task_delete($_POST['id']);
}

	// Изменения статуса задачи через POST
	if(isset($_POST['action']) && $_POST['action'] === 'changeStatus' && isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['status'])) {
		change_status($_POST['id'], $_POST['status']);
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
	
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script>
		$('select').on("change", function() {
    	let val = $(this).val();
    	let id = $(this).data('id');
    	let $select = $(this);

    $.post('', {
        action: 'changeStatus',
        id: id,
        status: val
    }, function(response) {
        // Найти <span> с текстом задачи в том же <li>
        let $li = $select.closest('li');
        let $span = $li.find('span.todo-item-text');

        // Удалить старые классы
        $span.removeClass('new inprog decompose done');

        // Добавить новый класс
        if (val === 'new') $span.addClass('new');
        if (val === 'inprog') $span.addClass('inprog');
        if (val === 'decompose') $span.addClass('decompose');
        if (val === 'done') $span.addClass('done');
    });
});
	</script>
</body>
</html>
