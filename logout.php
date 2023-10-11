<?php
session_start();
unset($_SESSION['user']);
header('Location: ../ToDoList/index.php'); 
?>