<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = 'osowiec';

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn) {
    return "Success";
} else {
    die("Connection failed");
}