
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "salary";


$conn = mysqli_connect($host, $user, $password, $db);

if ($conn === false) {
    die("connection error");
}



