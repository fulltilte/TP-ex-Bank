<?php
    session_start();
    if($_SESSION['user']) {
        header('Location: ../ToDoList/todolist.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" href="../ToDoList/style2.css">
</head>
<body>
    <form action="../ToDoList/signup.php" method="post" enctype="multipart/form-data">
        <div class="form-container">
            <label>ФИО</label>
            <input type="text" name="name" placeholder="Введите имя" class="form-input">
            <label>Изображение Профиля</label>
            <input type="file" name="avatar" class="form-input-file">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите Логин" class="form-input">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль" class="form-input">
            <label>Подтвердите пароль</label>
            <input type="password" name="r_password" placeholder="Подтвердите пароль" class="form-input">
        </div>
        <button class="form-btn" type="submit">Войти</button>
        <p> 
            У вас уже есть аккаунта? - <a class="form-link" href="../ToDoList/index.php"> Авторизируйтесь</a>  
        </p>

        <?php 
            if ($_SESSION['ms']) {
                echo '<p class="msg"> ' . $_SESSION['ms'] . '</p>';
            }            
            unset($_SESSION['ms']);
        ?>
        

    </form>
    
</body>
</html>      