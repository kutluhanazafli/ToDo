<?php

if (route(0) == 'login') {
    if (isset($_POST['submit'])) {
        $email = post('email');
        $password = post('password');

    }

    view('auth/login');
}