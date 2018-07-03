<?php
session_start();
unset($_SESSION['staff_user']);
session_destroy();

header("Location: login.php");
exit;
?>