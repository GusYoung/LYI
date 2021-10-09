<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'lyinteri_gus';
$DATABASE_PASS = 'yalehockey4';
$DATABASE_NAME = 'lyinteri_backend';

$pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
?>
