

<?php 


$uri = $_SERVER["REQUEST_URI"];

if ($uri ='/'){
    require './login.php';
}
elseif ($uri == '/home') {
    require './adminhome.php';
}elseif ($uri == '/list') {
    require './employeelist.php';
}elseif ($uri == '/details') {
    require './employeedetail.php';
}
?>
 