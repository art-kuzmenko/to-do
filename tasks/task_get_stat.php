<?php 

function get_stat($tasks) {
    // Подсчет статистики 
    $count_all = count($tasks);

    // Подсчет выполенных задач 
    $count_done = 0; 
    foreach($tasks as $task) {
        if($task['status'] === 'done') {
            $count_done++;
        }
    }

    // Подсчет не выполенных задач 
    $count_notdone = $count_all - $count_done;

    // Возвращает массив по ключам
    return [
        'count_all' => $count_all, 
        'count_done' => $count_done,
        'count_notdone' => $count_notdone
    ];
}