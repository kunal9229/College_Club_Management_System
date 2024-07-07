<?php
session_start();
    $hostname = 'localhost';
    $database = 'Club';
    $username = 'root';
    $dbPassword = '';
    $connection = new mysqli($hostname, $username, $dbPassword, $database,'3306');
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }
?>