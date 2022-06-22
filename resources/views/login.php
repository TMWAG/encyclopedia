<?php
use App\Database;
session_start();
$login = trim($_POST['login_log']);
$password = crypt(trim($_POST['pass_log']), "eee");
$db = new Database();
$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
if(!$db->in_db($query)){
    $_SESSION['err']['log'] = "Логин или пароль введены неверно";
}
else{
    $user = $db->first_res($query);
    $_SESSION['usr'] = [
        'id'    => $user[0],
        'login' => $user[1],
        'role'  => $user[4],
    ];
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>