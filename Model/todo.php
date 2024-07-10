<?php

if ($process == 'list') {

    $q = $db -> prepare("SELECT * FROM todos
                        LEFT JOIN categories ON todos.category_id = categories.category_id
                        WHERE todos.user_id = ?");
    $get = $q -> execute([get_session('user_id')]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q -> fetchAll(PDO::FETCH_ASSOC)
        ];

    } else {

        return [
            'success' => false,
            'type' => 'success',
            'data' => []
        ];

    }

}


elseif ($process == 'getsingle') {

    $id = $data['todo_id'];

    $q = $db -> prepare("SELECT * FROM categories WHERE user_id = ?");
    $get = $q -> execute([get_session('user_id')]);
    $category = $q -> fetchAll(PDO::FETCH_ASSOC);

    $q = $db -> prepare("SELECT * FROM todos 
                        WHERE todos.todo_id = ? && todos.user_id = ?");
    $get = $q -> execute([$id, get_session('user_id')]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => array_merge($q -> fetch(PDO::FETCH_ASSOC), ['categories' => $category])
        ];

    } else {
        return [
            'success' => false,
            'type' => 'danger',
            'data' => []
        ];
    }

}
