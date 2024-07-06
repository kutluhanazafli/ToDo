<?php

if ($process == 'add') {

    if (!$data['category_title']) {
        return [
            'success' => false,
            'message' => 'Category title is required',
            'type' => 'danger'
        ];
    }

    $q = $db -> prepare("INSERT INTO categories SET category_title = ?, user_id = ?");
    $q -> execute([
        $data['category_title'],
        get_session('user_id')
    ]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'message' => 'Category added successfully.',
            'type' => 'success',
            'redirect' => 'categories/list'
        ];

    } else {

        return [
            'success' => false,
            'message' => 'An error occurred while adding the category. Please try again.',
            'type' => 'danger'
        ];

    }

}

elseif ($process == 'list') {

    $q = $db -> prepare("SELECT * FROM categories WHERE user_id = ?");
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

elseif ($process == 'remove') {

    $id = $data['category_id'];

    $q = $db -> prepare("DELETE FROM categories WHERE categories.category_id = ? && categories.user_id = ?");
    $get = $q -> execute([$id, get_session('user_id')]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Category deleted successfully.'
        ];

    } else {

        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'An error occurred while deleting the category. Please try again.'
        ];

    }

}

elseif ($process == 'getsingle') {

    $id = $data['category_id'];
    $q = $db -> prepare("SELECT * FROM categories WHERE category_id = ? && user_id = ?");
    $get = $q -> execute([$id, get_session('user_id')]);

    if ($q -> rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetch(PDO::FETCH_ASSOC)
        ];

    } else {
        return [
            'success' => false,
            'type' => 'danger',
            'data' => []
        ];
    }

}

elseif ($process == 'edit') {

    if (!$data['category_title']) {
        return [
            'success' => false,
            'message' => 'Category title is required',
            'type' => 'danger'
        ];
    }

    $id = $data['category_id'];
    $title = $data['category_title'];
    
    $q = $db -> prepare("UPDATE categories SET category_title = ? WHERE category_id = ? && user_id = ?");
    $get = $q -> execute([$title, $id, get_session('user_id')]);

    if ($get) {

        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Category updated successfully.',
            'data' => $q -> fetch(PDO::FETCH_ASSOC)
        ];

    } else {

        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'An error occurred while updating the category. Please try again.',
            'data' => []
        ];

    }

}