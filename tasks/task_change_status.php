<?php

function change_status($id, $status = null) {
    global $pdo;
    if (!$status) return;
    $stmt = $pdo->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    $stmt->execute([$status, $id]);
}