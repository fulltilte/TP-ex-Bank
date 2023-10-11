<?php   
    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    $null = 0;
    if($password === $r_password) {

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO registr (name, login, password, balance) VALUES ('$name', '$login', '$password', '0')");
        $_SESSION['ms'] = 'Регистрация прошла успешно!';
        header('Location: ../ToDoList/index.php');    

    } 
    else {
        $_SESSION['ms'] = 'Пароли не совпадают';
        header('Location: ../ToDoList/reg.php');
    }
?>