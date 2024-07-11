<?php
session_start();
?>

<form action="" method="POST">
    <label for="old">Введите старый пароль:</label>
    <input id="old" name="oldPassword" type="password"
    value="<?= $_POST['oldPassword'] ?? 'password' ?>">
    <label for="new">Введите новый пароль:</label>
    <input id="new" name="newPassword" type="password"
    value="<?= $_POST['newPassword'] ?? 'password' ?>">
    <label for="confirm">Введите еще раз новый пароль:</label>
    <input id="confirm" name="confirm" value="<?= $_POST['confirm'] ?? ' '?>" type="password">
    <input name="submit" type="submit">
</form>


<?php
require 'day36Connect.php';

$id = $_SESSION['id'];
$user = "SELECT * FROM auth WHERE id='$id'";
$res = mysqli_fetch_assoc(mysqli_query($link, $user));

$hash = $res['password'];
if (!empty($_POST['oldPassword']) and
    !empty($_POST['newPassword']) and
    !empty($_POST['confirm']) and 
    ($_POST['oldPassword'] != 'password' and
    $_POST['newPassword'] != 'password')) {

        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPass = $_POST['confirm'];
        if ($newPassword == $confirmPass  and
        ($newPassword != $oldPassword)) {
            if (password_verify($oldPassword, $hash)) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                $changePass = "UPDATE auth SET
                password='$newPassword'";
                mysqli_query($link, $changePass);
                $_SESSION['passw'] = true;
                header('Location: day36Profile.php');
            } else {
                echo 'Старый пароль введен неправильно';
            }
        } else {
            echo 'Вы ввели некорректный новый пароль';
        }
} else {
    $oldPassword = '';
    $newPassword = '';
    echo 'введите старый и новый пароль';
}


?>