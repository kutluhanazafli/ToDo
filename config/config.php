<?php

// Set BASEDIR as the root directory of the project
$basedir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('BASEDIR', $basedir);


// Set URL dynamically by checking folder name of the project
$url = 'http://localhost/' . (basename(BASEDIR));
define('URL', $url);
echo BASEDIR . '<br>';
echo URL; 

const DEV_MODE = true;