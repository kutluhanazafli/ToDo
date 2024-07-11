<?php

if ($process == 'list') {

    $q = $db->prepare('SELECT todos.*, category_title FROM todos 
                    LEFT JOIN categories on categories.category_id = todos.category_id
                    WHERE todos.user_id = ? && todo_status =? ORDER BY todo_start_date ASC');
    $q->execute([get_session('user_id'), 'c']);
    $todos = $q->fetchAll(PDO::FETCH_ASSOC);

    $q = $db -> prepare("SELECT todo_status, COUNT(todos.todo_id) as total, 
                        (COUNT(todos.todo_id) * 100 / (SELECT COUNT(todo_id) FROM todos WHERE user_id = ?)) as percentage 
                        FROM todos WHERE todos.user_id = ? 
                        GROUP BY todos.todo_status");
    $get = $q -> execute([get_session('user_id'), get_session('user_id')]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => array_merge(['stats' => $q -> fetchAll(PDO::FETCH_ASSOC)], ['continue' => $todos])
        ];

    } else {

        return [
            'success' => false,
            'type' => 'success',
            'data' => []
        ];

    }

}
