<?php

require_once('vendor/autoload.php');
include_once('src/App.php');

session_start();

$app = new App;
$app->run();
