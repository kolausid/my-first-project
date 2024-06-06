<?php
session_start();
?>

<form action="" method="POST">
    <input name="password" type="password" value="<?= $_POST['password'] ?? 'password' ?>">
    <input type="submit">
</form>



<?php
require 'day36Connect.php';

$id = $_SESSION['id'];
$user = "SELECT * FROM auth WHERE id='$id'";
$res = mysqli_fetch_assoc(mysqli_query($link, $user));
$hash = $res['password'];
    if (!empty($_POST['password'])) {
        if (password_verify($_POST['password'], $hash)) {
            $delUser = "DELETE FROM auth WHERE id='$id'";
            mysqli_query($link, $delUser);
            header('Location: day36Regis.php');
        } else {
            echo 'Введен неправильный пароль';
        }
    } else {
        echo 'введите пароль для удаление учетной записи';
        $_POST['password'] = '';
    }
    ?>

<a href="day36Profile.php"> Профиль</a>
