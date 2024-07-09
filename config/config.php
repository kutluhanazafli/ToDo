<?php

// Set BASEDIR as the root directory of the project
$basedir = dirname(__DIR__);
define('BASEDIR', $basedir);

// Set URL dynamically by checking folder name of the project
$url = 'http://localhost/' . (basename(BASEDIR) . '/');
define('URL', $url);

const DEV_MODE = true;

// Read database configuration from .ini file and store as array
$ini = parse_ini_file(BASEDIR . '/config/config.ini.php');

// Database connection
$host = $ini['host'];
$dbname = $ini['dbname'];
$username = $ini['username'];
$password = $ini['password'];

try {
    $db = new PDO("mysql:host=".$host.";dbname=".$dbname.";charset=utf8", $username, $password);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
