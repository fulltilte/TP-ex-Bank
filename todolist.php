<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location: ../ToDoList/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../ToDoList/style3.css">
</head>
<body>
    <div class="avatar">
        <div class="avatar-balance">
            <p class="avatar-name"><?= $_SESSION['user']['balance'] ?> рублей</p>
        </div>

        <div class="avatar-user">
            <p class="avatar-name"><?= $_SESSION['user']['name'] ?></p>
        </div>
        
        <a href="../todolist/logout.php" class="logout">
            <div class="avatar-exit">
                <p class="avatar-exit-text">Выход</p>
            </div>
        </a>
    </div>

    <div class="status">
        <?php 
            if ($_SESSION['ms']) {
                echo '<p class="msg"> ' . $_SESSION['ms'] . '</p>';
            }            
            unset($_SESSION['ms']);
        ?>
    </div>

    <div class="container">
        <div class="container-form">
            <div class="container-form-add">
                <!-- <form action="../ToDoList/add.php" method="post">
                    <input type="text" name="task" id="task" placeholder="Введите значение" class="form-control">
                    <button type="submit" name="sendTask" class="form-btn">Отправить</button>
                </form> -->
                <form action="../ToDoList/add.php" method="post">
                    <input type="text" name="add_tran" id="add_tran" placeholder="Введите значение" class="form-control">
                    <input type="radio" name="transaction" value="replenish"> Пополнить
                    <input type="radio" name="transaction" value="spend" >Потратить
                    <button type="submit" name="sendTask" class="form-btn">Отправить</button>
                </form>
            </div>
            
            <div class="container-form-data">
                <?php
                    require 'connect.php';
                    require 'configDB.php';
                    $query = $pdo->query('SELECT * FROM balance WHERE id = ' . $_SESSION['user']['id'] .' ORDER BY id DESC');
                    while($row = $query->fetch(PDO::FETCH_OBJ)) {
                        echo '<div class="container-form-data-output">
                            <p class="container-form-data-output-type">'.$row->type.'</p>
                            <p class="container-form-data-output-num">'.$row->num.'</p>
                            <p class="container-form-data-output-date">'.$row->date.'</p>  
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html> 