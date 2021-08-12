<?php
session_start();

/*Your MYSQL username is xic55311
The name of the MYSQL server is xic5531.encs.concordia.ca
The name of the database you can use is also xic55311
The password for your database is HuNiOl12  (case sensitive)
You cannot change this password.
 */

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