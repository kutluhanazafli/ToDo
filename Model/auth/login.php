<?php

if ($process == 'login') {

if (!$data['email']) {
    return [
        'success' => false,
        'message' => 'E-mail address is required',
        'type' => 'danger'
    ];
}
if (!$data['password']) {
    return [
        'success' => false,
        'message' => 'Password is required',
        'type' => 'danger'
    ];
}

    $q = $db -> prepare("SELECT *, CONCAT(user_name, ' ', user_surname) as user_fullname FROM users WHERE user_email = ? AND user_password = ?");
    $q -> execute([
        $data['email'],
        hash('SHA512', $data['password'])
    ]);

    if ($q -> rowCount()) {
        $user = $q -> fetch(PDO::FETCH_ASSOC);
        add_session('user_id', $user['user_id']);
        add_session('user_name', $user['user_name']);
        add_session('user_surname', $user['user_surname']);
        add_session('user_fullname', $user['user_fullname']);
        add_session('user_email', $user['user_email']);
        add_session('login', true);

        return [
            'data' => $user,
            'success' => true,
            'message' => 'Login successful. Redirecting...',
            'type' => 'success',
            'redirect' => 'home'
        ];

    } else {

        return [
            'success' => false,
            'message' => 'Login failed. Please check your credentials.',
            'type' => 'danger'
        ];

    }

}

