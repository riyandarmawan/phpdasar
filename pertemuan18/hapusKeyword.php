<?php 
session_start();
unset($_SESSION["keyword"]);

header("Location: index.php");
exit;
?>