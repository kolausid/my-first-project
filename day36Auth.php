<?php
session_start();
?>
<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
require 'day36Connect.php';


if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    
    $query = "SELECT auth.*, statuses.name_s as status FROM auth
        LEFT JOIN statuses ON auth.status_id=statuses.id
        WHERE login='$login'";

    $res = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($res); 
    if (!empty($user)) {
        $hash = $user['password'];
        //$salt = $user['salt'];
        //$password = md5($salt . $_POST['password']);

        if (password_verify($_POST['password'], $hash)) {
            //$_SESSION['authUser'] = true;
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['lName'] = $user['lName'];
            $_SESSION['hb'] = date('Y') - substr($user['HB'], 0 , 4);
            $_SESSION['status'] = $user['status'];
            $_SESSION['welcome'] = 'Поздравляем, Вы авторизовались';
            header('Location: day36Profile.php');
            //die();
        } else {
            $_SESSION['welcome'] = 'Некорректный логин или пароль';
            echo $_SESSION['welcome'];
        }
    } else {
        echo 'Пользователя не существует';
    }
} else {
    //$_SESSION['flash'] = '';
    //echo $_SESSION['flash'];
    echo 'entered login and password';
}
?>
<br>
<a href="day36Regis.php">Регистрация</a>