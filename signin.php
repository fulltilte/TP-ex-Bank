<?php   
    session_start();
    require 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    

    $check_user = mysqli_query($connect, "SELECT * FROM registr WHERE login = '$login' AND password = '$password' ");
   
    
    if(mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

         $_SESSION['user'] = [
         "id" => $user['id'], 
         "name" => $user['name'],
         "balance" => $user['balance']

         ];

         header('Location: ../ToDoList/todolist.php');
         
    } else {
        $_SESSION['ms'] = 'Не верный Логин или Пароль!';
        header('Location: ../ToDoList/index.php');
    }

?>