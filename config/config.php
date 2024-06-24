<?php

// Set BASEDIR as the root directory of the project
$basedir = dirname(__DIR__);
define('BASEDIR', $basedir);

// Set URL dynamically by checking folder name of the project
$url = 'http://localhost/' . (basename(BASEDIR) . '/');
define('URL', $url);

const DEV_MODE = true;

// Database connection
$host = 'bzoighyemc4n1alzqpup-mysql.services.clever-cloud.com';
$dbname = 'bzoighyemc4n1alzqpup';
$username = 'uzwnv0ianiryk6xp';
$password = 'ZuIKwJqDz5gyR9C2uMvF';

try {
    $db = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8", $username, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
