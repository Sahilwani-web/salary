<?php

session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true){ 
//     header("\salary\login.php"); 
//     exit; 
// } 

include "dbconnect.php";
include "../salary/TopNavbar/TopNavbar.php";
include "../salary/SideNavbar/SideNavbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Welcome admin </h1>
</body>
</html>


