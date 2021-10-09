<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'lyinteri_gus';
$DATABASE_PASS = 'yalehockey4';
$DATABASE_NAME = 'lyinteri_backend';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 ?>
