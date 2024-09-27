<?php
session_start();
?>

<?php
   require 'day36Connect.php';

    $id = $_SESSION['id'];
    $userAcc = "SELECT * FROM auth
        WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $userAcc));
?>

<form action="" method="POST">
    <label for="name">Введите новое имя:</label>
    <input id="name" name="name" value="<?=$user['name']?>">
    <label for="lName">Введите новую фамилию:</label>
    <input id="lName" name="lName" value="<?=$user['lName']?>">
    <input name="submit" type="submit">
</form>
<br><br>
<a href="day36Profile.php">Профиль</a>

<?php
if (!empty($_POST['submit'])) {
    $name = strip_tags($_POST['name']);
    $lName = strip_tags($_POST['lName']);
    $_SESSION['name'] = $name;
    $_SESSION['lName'] = $lName;
    
    $userUpd = "UPDATE auth SET
        name='$name', lName='$lName'
        WHERE id='$id'";
    mysqli_query($link, $userUpd);
    header('Location: day36Profile.php');
}
?>

