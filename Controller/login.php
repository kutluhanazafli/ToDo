<?php

if(get_session('login') && get_session('login') == true) {
    redirect('home');
}

if (route(0) == 'login') {
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

    view('auth/login');
}