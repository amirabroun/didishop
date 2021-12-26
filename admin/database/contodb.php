<?php
$host = 'localhost';
$port = '3306';
$database = 'didishop';
$username = 'root';
$password = 'password';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;port=$port;dbname=$database;charset=$charset";
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $cn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $error) {
    die('Internal Error');
}
