<?php
session_start();

if (isset($_SESSION['reg'])) {
    echo $_SESSION['regWelc'], '<br>';
    echo 'Роль: ' . $_SESSION['status'], '<br>';
    if (isset($_SESSION['passw'])) {
        echo 'Пароль сменен <br>';
    }
    echo 'Логин: '.  $_SESSION['login'], '<br>';
    echo 'Имя: '.  $_SESSION['name'], '<br>', 'Фамилия: ' . $_SESSION['lName'];
    echo '<br>';
    echo 'возраст: ' . $_SESSION['hb'], '<br>';
    //unset($_SESSION['reg']);
    ?>
    <a href="day36Account.php">Редактировать</a>
    <a href="day36ChangePassword.php">Сменить пароль</a>
    <a href="day36DeletePr.php">Удалить учетную запись</a> 
    <a href="day36Logout.php">Выйти</a>
<?php
    if ($_SESSION['status'] != 'user') { ?>
        <a href="day36Users.php">Список пользователей</a>
        <a href="day36ProfAdm.php">Админ меню</a>
<?php    
    }
        //unset($_SESSION['welcome']);

} elseif (isset($_SESSION['auth'])) {
    echo $_SESSION['welcome'], '<br>';
    echo 'Роль: '.  $_SESSION['status'], '<br>';
    if (isset($_SESSION['passw'])) {
        echo 'Пароль сменен <br>';
    }
    echo 'Логин: '.  $_SESSION['login'], '<br>';
    echo 'Имя: '.  $_SESSION['name'], '<br>', 'Фамилия: ' . $_SESSION['lName'];
    echo '<br>';
    echo 'возраст: ', $_SESSION['hb'], '<br><br>';
    echo 'Для смены имя или фамилии: ';?>
    <a href="day36Account.php">Редактировать</a>
    <br>
    <a href="day36DeletePr.php">Удалить учетную запись</a>
    <br>
    <a href="day36ChangePassword.php">Сменить пароль</a>
    <br>
    <a href="day36Logout.php">Выйти</a>
<?php
    if ($_SESSION['status'] != 'user') {
        echo '<br><br>', 'Список зарегистрированных пользователей: ';?>
        <a href="day36Users.php">Список пользователей</a>
        <br>
        <a href="day36ProfAdm.php">Админ меню</a>

<?php
    }
  //unset($_SESSION['welcome']);

} else { ?>
    <?= require 'day36Connect.php';
    echo 'Вы не авторизованы <br>';
    unset($_SESSION['auth']);
    $id = $_GET['id'];
    $idUsers = "SELECT * FROM auth 
    WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $idUsers));
            echo $user['login'], '<br>';
            //echo $user['name'] . ' ' . $user['lName'];?>

    <a href="day36Users.php">Список пользователей</a>
    <a href="day36Auth.php">Авторизуйтесь</a> <a href="day36Regis.php">Зарегистрируйтесь</a>
<?php 
}
?>