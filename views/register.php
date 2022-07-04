<?php
use App\Database;
session_start();
if($_POST){
    if(trim($_POST['email_reg']) == trim($_POST['email_reg_conf'])){
        if(trim($_POST['pass_reg']) == trim($_POST['pass_reg_conf'])){
            $password = crypt($_POST['pass_reg'], "eee");
            $email = addslashes(trim($_POST['email_reg']));
            $login = trim($_POST['login_reg']);
            $db = new Database();
            $login_check = "SELECT * FROM users WHERE login = '$login'";
            $email_check = "SELECT * FROM users WHERE email = '$email'";
            if ($db->in_db($login_check)){
                $_SESSION['err']['login'] = "Ошибка: Пользователь с таким логином уже существует";
            }
            if($db->in_db($email_check)){
                $_SESSION['err']['email'] = "Ошибка: Почта с адресом {$email} уже зарегистрированна";
            }
            if(!$_SESSION['err']){
                $db->query("INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')");
            }
        }
        else{
            $_SESSION['err']['pas'] = "Пароли не совпадают";
        }
    }
    else{
        $_SESSION['err']['email'] = "Адреса электронной почты не совпадают";
    }
}
else{
    $_SESSION['err']['all'] = "Вы отправили пустую форму регистрации";
}
header("Location: ".$_SERVER['HTTP_REFERER']);
?>