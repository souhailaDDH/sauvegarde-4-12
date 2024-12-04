<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

require_once "vendor/autoload.php";
session_start();

use MyClass\ObjectTest;

$toto = new ObjectTest();
dump($toto->test);
$toto->openLog();
$toto->writeLog('Bonjour');
die;