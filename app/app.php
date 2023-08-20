<?php


// --- Try to include composer autoload file
$autoloadFile = __DIR__.'/../vendor/autoload.php';
if (!file_exists($autoloadFile) )  {
    die('ERROR: Please run composer install.');
}
require $autoloadFile;
// ---
