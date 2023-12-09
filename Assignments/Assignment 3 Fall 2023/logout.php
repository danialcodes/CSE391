<?php
session_start();
session_destroy();
session_start();
$_SESSION["error"] = "Faculty Logged Out!!";
header('Location: faculty.php');
?>