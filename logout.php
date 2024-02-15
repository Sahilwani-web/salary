<?php
 session_start();
 session_unset();
 session_destroy();

header("Location: C:xamppp\htdocs\salary\login.php");
exit();

?>