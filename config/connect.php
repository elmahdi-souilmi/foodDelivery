<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lunchdelivery';
// set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
// create a PDO instance
$conn = new PDO($dsn, $user, $password);
