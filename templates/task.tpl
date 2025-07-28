<?php 
	$titleCSSclass = 'todo-item-text';
	if ($task['status'] === 'new') {
		$titleCSSclass .= ' new';
	} elseif ($task['status'] === 'inprog') {
		$titleCSSclass .= ' inprog';
	} elseif ($task['status'] === 'decompose') {
		$titleCSSclass .= ' decompose';
	} elseif ($task['status'] === 'done') {
		$titleCSSclass .= ' done';
	}
?>

<li class="list-group-item d-flex justify-content-between">
	<span class="<?php echo $titleCSSclass; ?>"><?php echo $task['title']; ?></span>
	<div class="btn-group">
		<form method="post" style="display:inline;" onChange="this.submit();">
			<input type="hidden" name="action" value="changeStatus">
			<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
			<select name="status" class="form-select form-select-sm" style="width:auto;display:inline-block;" onchange="this.form.submit()">
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