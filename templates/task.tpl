<li class="list-group-item d-flex justify-content-between">
	<span class="todo-item-text"><?php echo $task['title']; ?></span>
	<div class="btn-group">

		<form class="form" method="post" style="display:inline;">
			<input type="hidden" name="action" value="changeStatus">
			<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
			<select data-id="<?= $task['id'] ?>" name="status" class="form-select form-select-sm" style="width:auto;display:inline-block;">
				<option value="new" <?php if($task['status']==='new') echo 'selected'; ?>>Новая</option>
				<option value="inprog" <?php if($task['status']==='inprog') echo 'selected'; ?>>В работе</option>
				<option value="decompose" <?php if($task['status']==='decompose') echo 'selected'; ?>>Декомпозиция</option>
				<option value="done" <?php if($task['status']==='done') echo 'selected'; ?>>Выполнена</option>
			</select>
		</form>

		<form method="post" style="display:inline;">
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
			<button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button>
		</form>
	</div>
</li>