<?php
session_start();

if (isset($_SESSION['reg'])) {
    //echo $_SESSION['regWelc'], '<br>';
    echo $_SESSION['status'], '<br>';
    if (isset($_SESSION['passw'])) {
        echo 'Пароль сменен <br>';
    }
    echo $_SESSION['login'], '<br>';
    echo $_SESSION['name'] . ' ' . $_SESSION['lName'];
    echo '<br>';
    echo 'возраст: ', $_SESSION['hb'], '<br>';
    //unset($_SESSION['reg']);
    ?>
    <a href="day36Account.php">Редактировать</a>
    <a href="day36ChangePassword.php">Сменить пароль</a>
    <a href="day36DeletePr.php">Удалить учетную запись</a> 
    <a href="day36Profile.php">Профиль</a>
    <a href="day36Logout.php">Выйти</a>
    
<?php    
} if (isset($_SESSION['auth'])) {
    echo $_SESSION['welcome'], '<br>';
    echo $_SESSION['status'], '<br>';
    if (isset($_SESSION['passw'])) {
        echo 'Пароль сменен <br>';
    }
    echo $_SESSION['login'], '<br>';
    echo $_SESSION['name'] . ' ' . $_SESSION['lName'];
    echo '<br>';
    echo 'возраст: ', $_SESSION['hb'], '<br>';?>

    <a href="day36Account.php">Редактировать</a>
    <a href="day36DeletePr.php">Удалить учетную запись</a>
    <a href="day36ChangePassword.php">Сменить пароль</a>
    <a href="day36Profile.php">Профиль</a>
    <a href="day36Logout.php">Выйти</a>

<?php }
require 'day36Connect.php';
$allUsers = "SELECT auth.*, statuses.name_s as status FROM auth
    LEFT JOIN statuses ON
    auth.status_id=statuses.id";
$res = mysqli_query($link, $allUsers) or die(mysqli_error($link));
for ($list = []; $row = mysqli_fetch_assoc($res); $list[] = $row)
?>

<table>
	<tr>
		<th>Login</th>
		<th>Status</th>
		<th>Change</th>
	</tr>
<?php
foreach ($list as $elem) { ?>
    <tr>
        <td><?=$elem['login']?></td>
        <td><?=$elem['status']?></td>
<?php if ($elem['status_id'] != 1) { ?>
        <td><a href="?del=<?=$elem['id']?>">Сделать админом</a></td>
<?php } ?>

    </tr>
<?php }
?>
</table>

<?php
if (isset($_GET['del'])) {
    $idUser = $_GET['del'];
    $delUserQuery = "UPDATE auth SET status_id=1 WHERE id='$idUser'";
    $delUsers = mysqli_query($link, $delUserQuery) or die(mysqli_error($link));
    $_SESSION['status'] = $elem['status'];
    //header('Location: 36ProfAdm.php');
} else {
    echo '';
}
?>
