<?php 
	$titleCSSclass = 'todo-item-text';
	if ($task['status'] === 'ready') {
		$titleCSSclass .= ' done';
	}
?>

<li class="list-group-item d-flex justify-content-between">
			<span class="<?php echo $titleCSSclass; ?>"><?php echo $task['title']; ?></span>
			<form class="btn-group">
				<?php if($task['status'] === 'ready'): ?>
				<button name="action" value="changeStatus" class="btn btn-outline-dark btn-sm">В работу</button>
				<?php else: ?>
				<button name="action" value="changeStatus" class="btn btn-outline-success btn-sm">Готово</button>
				<?php endif; ?>
				<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
				<button name="action" value="delete" class="btn btn-outline-danger btn-sm">Удалить</button>
			</form>
		</li>