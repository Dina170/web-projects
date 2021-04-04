<?php
$dsn = 'mysql:host=localhost;dbname=campany';
$username = 'root';
$password = '1234';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}