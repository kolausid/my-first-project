<?php
session_start();
?>

<?php
require 'day36Connect.php';

$allUsers = "SELECT * FROM auth";
$res = mysqli_query($link, $allUsers) or die(mysqli_error($link));
for ($list = []; $row = mysqli_fetch_assoc($res); $list[] = $row)
?>

<ul>
<?php
//$_SESSION['list'] = $list;
foreach ($list as $elem) {
    /*$_SESSION['login'] = null;
    $_SESSION['name'] = null;
    $_SESSION['lName'] = null;
    $_SESSION['hb'] = null; 
    */
    $_SESSION['reg'] = null;
    $_SESSION['auth'] = null; ?>
    
    <li><a href="day36Profile.php?id=<?= $elem['id']?>"><?= $elem['name'] ?></a></li>
    
<?php }
    
    //print_r($_SESSION);
//header('Location: day36Profile.php');
?>
</ul>
<a href="day36Auth.php">Авторизуйтесь</a> <a href="day36Regis.php">Зарегистрируйтесь</a>
<?php
/* 
<?=// $_GET['id'] ?? 'введите id'?>
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $idUsers = "SELECT * FROM auth 
    WHERE id='$id'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $idUsers));
    if (!empty($user)) {
        if (!empty($_SESSION['auth'])) {
            echo $user['login'], '<br>';
            echo $user['name'] . ' ' . $user['lName'];?>
            <a href="day36Logout.php">Выйти</a>
<?php   } else {
            echo $user['login'], '<br>'; ?>
            <p><a href="day36Auth.php">Авторизуйтесь</a> <a href="day36Regis.php">Зарегистрируйтесь</a></p>    
<?php   }
    } else {
        echo 'пользователя не существует';
    }
} else {
    echo 'введите id пользователя';
}*/
?>

