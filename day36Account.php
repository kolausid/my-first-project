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
    <input name="name" value="<?=$user['name']?>">
    <input name="lName" value="<?=$user['lName']?>">
    <input name="submit" type="submit">
</form>

<?php
if (!empty($_POST['submit'])) {
    $name = $_POST['name'];
    $lName = $_POST['lName'];
    $_SESSION['name'] = $name;
    $_SESSION['lName'] = $lName;
    
    $userUpd = "UPDATE auth SET
        name='$name', lName='$lName'
        WHERE id='$id'";
    mysqli_query($link, $userUpd);
    header('Location: day36Profile.php');
}
?>

