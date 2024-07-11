<?php
session_start();
?>

<form action="" method="POST">
    <label for="login">Введите логин:</label>
    <input id="login "name="login" 
    value="<?= $_POST['login'] ?? 'login'?>" required>
    <label for="Birthday">Введите дату рождения:</label>
    <input id="Birthday" name="hb" 
    value="<?= $_POST['hb'] ?? date('Y-m-d', mktime(0, 0, 0, 01, 01, 1970))?>">
    <label for="email">Введите email:</label>
    <input id="email" name="email" 
    value="<?= $_POST['email'] ?? 'login@login.ru'?>"><br><br>
    <label for="pass">Введите пароль:</label>
    <input id="pass" name="password" 
    value="<?= $_POST['password'] ?? ''?>" type="password">
    <label for="corfirm">Введите еще раз пароль:</label>
    <input id="confirm" name="confirm" value="<?= $_POST['confirm'] ?? ' '?>" type="password"><br><br>
    <label for="name">Введите имя:</label>
    <input id="name" name="name" 
    value="<?= $_POST['name'] ?? 'name'?>">
    <label for="lName">Введите фамилию:</label>
    <input id="lName" name="lName" 
    value="<?= $_POST['lName'] ?? 'Last name'?>"><br><br>
    <label for="country">Выберите страну:</label>
    <select id="country" name="country">
        <option>Russia</option>
        <option>USA</option>
        <option>Japan</option>
        <option>China</option>
    </select>
    <label for="role">Выберите роль(при выборе будет присвоена роль администратора):</label>
    <input id="role" type="checkbox" name="admin">
    <input type="submit">
</form>


<?php
require 'day36Connect.php';

function validateLogin($login) {
    if (preg_match("/^[a-zA-Z0-9]+$/", $login)) {
        return true;
    }
    return false;
}

/*function generateSalt() {
    $salt = '';
    $saltLength = 8;

    for ($i = 0; $i < $saltLength; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }
    return $salt;
}
*/

if (!empty($_POST['login']) and 
    !empty($_POST['password']) and !empty($_POST['confirm'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $hb = $_POST['hb'];

    $years = substr($hb, 0, 4);
    $months = substr($hb, 5, 2);
    $days = substr($hb, 8, 2);

    if (validateLogin($login)) {
        $checkLogin = "SELECT * FROM auth WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $checkLogin));

        $regEmail = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (preg_match($regEmail, $email)) {
            if (checkdate($months, $days, $years)) {
                if (empty($user) and 
                    ($_POST['login'] != 'login' or strlen($_POST['login']) >= 4 and strlen($_POST['login']) <= 10) and 
                    (strlen($_POST['password']) >= 3 and strlen($_POST['password']) <= 6) and
                    $_POST['password'] == $_POST['confirm']) {
                        //$salt = generateSalt();
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $dateReg = date('Y-m-d');
                        $name = $_POST['name'];
                        $lName = $_POST['lName'];
                        if (isset($_POST['admin'])) {
                            $addUser = "INSERT INTO auth SET
                            login='$login', password='$password',
                            HB='$hb', email='$email',
                            name='$name', lName='$lName', date_reg='$dateReg',
                            status_id=1";
                            mysqli_query($link, $addUser) or
                            die(mysqli_error($link));
                            $_SESSION['status'] = 'admin';
                            
                            //header('Location: day36ProfAdm.php');
                        } else {
                            $addUser = "INSERT INTO auth SET
                            login='$login', password='$password',
                            HB='$hb', email='$email',
                            name='$name', lName='$lName', date_reg='$dateReg',
                            status_id=2";
                            mysqli_query($link, $addUser) or
                            die(mysqli_error($link));
                            $_SESSION['status'] = 'user';
                            
                        }
                        $_SESSION['reg'] = true;
                        //$_SESSION['auth'] = true;
                        $_SESSION['login'] = $login;
                        $_SESSION['name'] = $name;
                        $_SESSION['lName'] = $lName;
                        $_SESSION['hb'] = date('Y') - $years;
                        $id = mysqli_insert_id($link);
                        $_SESSION['id'] = $id;
                        $_SESSION['regWelc'] = 'Поздравляем, Вы зарегистрировались';
                        header('Location: day36Profile.php');
                    //header('Location: day36Auth.php');
                    //die();
                } else {
                    $_SESSION['regWelc'] = 'Некорректный логин или пароль';
                    echo $_SESSION['regWelc'];
                    //header('Location: day36.Regis.php');
                }
            } else {
                echo 'Введена некорректная дата <br>';
            }

        } else {
            echo 'Введена некорректная почта <br>';
        }
        } else {
            echo 'Введите корректный логин для регистрации <br>';
        }

    } else {
    echo 'Введите логин и пароль для регистрации <br>';
    }

/*if (isset($_SESSION['reg'])) {
    echo $_SESSION['reg'];
    unset($_SESSION['reg']);
}*/
?>
<br>
<a href="day36Auth.php">Войти</a>
