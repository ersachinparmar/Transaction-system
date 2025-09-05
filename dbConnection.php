<?php
$databaseHost = 'localhost';
$databaseName = 'transactionmanager';
$databaseUsername = 'root';
$databasePassword = '';

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if(!$mysqli)
{
die("failed". mysqli_connect_error());
}