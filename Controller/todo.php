<?php

if(!get_session('login') || get_session('login') != true) {
    redirect('login');
}

if (route(0) == 'todo' && !route(1)) {
    /*
    if (isset($_POST['submit'])) {

        $_SESSION['post'] = $_POST;

        $email = post('email');
        $password = post('password');


        $return = model('auth/login', [
            'email' => $email,
            'password' => $password
        ], 'login');

        if($return['success'] == true) {
            add_session('error', [
                'type' => $return['type'] ?? '',
                'message' => $return['message'] ?? ''
            ]);
            if (isset($return['redirect'])) {
                redirect($return['redirect']);
            }
        } else {
            add_session('error', [
                'type' => $return['type'] ?? '',
                'message' => $return['message'] ?? ''
            ]);
        }
    } 
    */

    view('categories/home');

} elseif (route(0) == 'todo' && route(1) == 'add') {

    $return = model('categories', [], 'list');

    view('todo/add', $return['data']);

} elseif (route(0) == 'todo' && route(1) == 'list') {

    $return = model('todo', [], 'list');

    view('todo/list', $return['data']);

} elseif (route(0) == 'todo' && route(1) == 'edit' && is_numeric(route(2))) {

    $return = model('todo', ['todo_id' => route(2)], 'getsingle');

    view('todo/edit', $return['data']);

}