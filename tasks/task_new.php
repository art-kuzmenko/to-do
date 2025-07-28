<?php 

function task_new($title) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO tasks (title, status) VALUES (?, 'new')");
    $stmt->execute([$title]);
    return $pdo->lastInsertId();
}