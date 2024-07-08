<?php

if (route(1) == 'addtodo') {
    $post = filter($_POST);
    $start_date = date('Y-m-d H:i:s');
    $end_date = date('Y-m-d H:i:s');

    if (!$post['title']) {

        $status = 'error';
        $title = 'Ops! Error!';
        $msg = 'Please enter a title.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();

    }

    if (!$post['description']) {

        $status = 'error';
        $title = 'Ops! Error!';
        $msg = 'Please enter a description.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();

    }

    if ($post['start_date_time'] && $post['start_date']) {
        $start_date = $post['start_date'] . ' ' . $post['start_date_time'];
    }

    if ($post['end_date_time'] && $post['end_date']) {
        $end_date = $post['end_date'] . ' ' . $post['end_date_time'];
    }

    if ($post['category_id']){
        $user_id = get_session('user_id');
        $category_id = $post['category_id'];
        // We need to check if the category exists and belongs to the user.
        // Variables are filtered so we can use them directly in the query.
        $q = $db -> query("SELECT category_id FROM categories WHERE user_id = '$user_id' AND category_id = '$category_id'");
        $get = $q -> fetch(PDO::FETCH_ASSOC);
        if (!$get) {
            $status = 'error';
            $title = 'Ops! Error!';
            $msg = 'The category does not exist or does not belong to you.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }


    $q = $db -> prepare("INSERT INTO todos SET todo_title = ?, todo_description = ?, todo_color = ?, todo_start_date = ?, todo_end_date = ?, category_id = ?, user_id = ?");
    $insert = $q -> execute([
        $post['title'],
        $post['description'],
        $post['color'] ?? '#007bff',
        $start_date,
        $end_date,
        $post['category_id'] ?? 0,
        get_session('user_id')
    ]);

    if ($insert) {
        $status = 'success';
        $title = 'Success!';
        $msg = 'The todo has been added successfully.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => url('todo/list')]);
        exit();
    } else {
        $status = 'error';
        $title = 'Ops! Error!';
        $msg = 'An error occurred while adding the todo.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }

}