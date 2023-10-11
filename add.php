<?php
    session_start();
    require 'connect.php';
    $add_tran = $_POST['add_tran'];
    $ID = $_SESSION['user']['id'];
    $balance_now = mysqli_query($connect, "SELECT * FROM registr balance ");
    if($add_tran == '') {
        echo 'Введите число';
        exit();
    }
    $balance_query = mysqli_query($connect, "SELECT balance FROM registr WHERE id = '$ID'");
$balance_row = mysqli_fetch_assoc($balance_query);
$balance_now = $balance_row['balance'];

if(isset($_POST['transaction'])) {
    $selectTransaction = $_POST['transaction'];

    if($selectTransaction == 'replenish') {
        $balance_now += $add_tran;
        mysqli_query($connect, "UPDATE registr SET balance = '$balance_now' WHERE id = '$ID'");
        mysqli_query($connect, "INSERT INTO balance (id, type, num, date) VALUES ('$ID', '$selectTransaction', '$add_tran',SUBSTRING_INDEX(NOW(5), '.', 1))");

    }
    if($selectTransaction == 'spend') {
        if($balance_now >= $add_tran) {
        $balance_now -= $add_tran;
        mysqli_query($connect, "UPDATE registr SET balance = '$balance_now' WHERE id = '$ID'");
        mysqli_query($connect, "INSERT INTO balance (id, type, num, date) VALUES ('$ID', '$selectTransaction', '$add_tran',SUBSTRING_INDEX(NOW(5), '.', 1))");

    }
        else {
            $_SESSION['ms'] = 'Недостаточно средств';
            header('Location: ../ToDoList/todolist.php');
        exit();
        }
    }
}

    $_SESSION['user']['balance'] = $balance_now;                      
    header('Location: /ToDoList');

?>