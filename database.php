<?php
session_start();
$server = 'localhost:3306'; //This will be different for remote server
$username = 'root';
$password = '';   //check if this is correct
$database = 'xic55311'; //check if this is correct may letter change

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>