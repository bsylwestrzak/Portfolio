<?php

echo "Try no. 1 \n";

ini_set('display_errors', 1);

require_once('./DBConnection.php');

$db = new DBConnection;
$db->connect();