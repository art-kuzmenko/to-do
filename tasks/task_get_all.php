<?php

function get_all_tasks() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
    return $stmt->fetchAll();
}