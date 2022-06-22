<?php 
use App\Database;
session_start(); 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_title?></title>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon/favicon.ico">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
<header class="">
    <div class="container mb-5 rounded-bottom border border-2 border-top-0 border-secondary navbar-expand-lg navbar-dark bg-primary bg-opacity-75">
        <nav class="navbar ">
            <div class="container-fluid ">
                <a class="navbar-brand" href="/">
                    <img class="logo" src="/img/logos/DRG_Logo_2048.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Показать меню навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mx-1 text-info btn btn-secondary" id="exploreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Исследовать
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labeledby="exploreDropdown">
                                <li><a href="/" class="dropdown-item text-info">Главная страница</a></li>
                                <li><a href="/all_articles" class="dropdown-item text-info">Все статьи</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mx-1 text-info btn btn-secondary" id="basicDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Основы
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="basicDropdown">
                                <li><a href="/article?id=7" class="dropdown-item text-info">Космическая станция</a></li>
                                <li><a href="/article?id=8" class="dropdown-item text-info">Экипировка</a></li>
                                <li><a href="/article?id=10" class="dropdown-item text-info">Хоксесс</a></li>
                                <li><a href="/article?id=11" class="dropdown-item text-info">Существа</a></li>
                                <li><a href="/article?id=12" class="dropdown-item text-info">Ресурсы</a></li>
                                <li><a href="/article?id=9" class="dropdown-item text-info">Миссии</a></li>
                                <li><a href="/article?id=14" class="dropdown-item text-info">Аксессуары</a></li>
                                <li><a href="/article?id=13" class="dropdown-item text-info">Перки</a></li>
                                <li><a href="/article?id=15" class="dropdown-item text-info">Как играть</a></li>
                                <li><a href="/article?id=16" class="dropdown-item text-info">Требования</a></li>
                                <li><a href="/article?id=17" class="dropdown-item text-info">История обновлений</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mx-1 text-info btn btn-secondary" id="dwarvesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Гномы
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dwarvesDropdown">
                                <li><a href="/article?id=6" class="dropdown-item text-info">Бурильщик</a></li>
                                <li><a href="/article?id=18" class="dropdown-item text-info">Инжененр</a></li>
                                <li><a href="/article?id=19" class="dropdown-item text-info">Стрелок</a></li>
                                <li><a href="/article?id=20" class="dropdown-item text-info">Разведчик</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle mx-1 text-info btn btn-secondary" id="advancedDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Продвинутое
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="advancedDropdown">
                                <li><a href="/article?id=21" class="dropdown-item text-info">Поручения</a></li>
                                <li><a href="/article?id=22" class="dropdown-item text-info">Повышения</a></li>
                                <li><a href="/article?id=23" class="dropdown-item text-info">Глубокие погружения</a></li>
                                <li><a href="/article?id=24" class="dropdown-item text-info">Разгонные модули</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                            <a class=" nav-link text-info mx-1 btn btn-secondary">Поиск</a>
                        </li> -->
                    </ul>
                    <a class="nav-link text-info mx-1 btn btn-secondary" data-bs-toggle="offcanvas" href="#loginForm" role="button" aria-controls="loginForm">
                        Личный кабинет
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php
if ($_SESSION['err']){
    echo "<div class=\"container\">";
    foreach($_SESSION['err'] as $key => $val){
        echo "
        <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
            {$val}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Закрыть\"></button>
        </div>
        ";
    }
    echo "</div>";
    unset($_SESSION['err']);
}
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="loginForm" aria-labelledby="loginFormLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
        <div class="container">
            <h5 class="offcanvas-title text-info" id="loginFormLabel">
                <?php
                if (!$_SESSION['usr']){
                    echo "Вход / Регистрация";
                }
                else{
                    echo "Личный кабинет";
                }
                ?>
            </h5>
        </div>
        <hr>
    </div>
    <div class="offcanvas-body text-center">
    <?php
    if (!$_SESSION['usr']){?>
        <div class="accordion" id="accordion-auth">
            <div class="accordion-item">
                <h2 class="accordion-header" id="acc-h-1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reg-form" aria-expanded="false" aria-controls="reg-form">
                        Регистрация
                    </button>
                </h2>
                <div id="reg-form" class="accordion-collapse collapse" aria-labelledby="acc-h-1" data-bs-parent="#accordion-auth">
                    <div class="accordion-body text-center">
                        <form class="needs-validation" action="register" method="POST">
                            <div class="row m-1 g-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="login_reg" class="form-control" id="login-reg" placeholder="" required>
                                        <label for="login-reg">Имя пользователя</label>
                                    </div>   
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email_reg" class="form-control" id="email-reg" placeholder="" required>
                                        <label for="email-reg">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email_reg_conf" class="form-control" id="email-reg-conf" placeholder="" required>
                                        <label for="email-reg-conf">Email ещё раз</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" name="pass_reg" class="form-control" id="pass-reg" placeholder=""  required>
                                        <label for="pass-reg">Пароль</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" name="pass_reg_conf" class="form-control" id="pass-reg-conf" placeholder=""  required>
                                        <label for="pass-reg-conf">Пароль ещё раз</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" class="btn-check" id="show-pass-reg" onclick="showPassReg()" autocomplete="off">
                                    <label for="show-pass-reg" class="btn btn-outline-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                        Показать пароль
                                    </label>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-light" value="Регистрация">
                                </div>
                            </div>
                        </form>
                        <span class="text-info  fs-6">Нажимая кнопку "Регистрация" Вы принимаете условия использования и политику конфиденциальности</span>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="acc-h-2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#log-form" aria-expanded="true" aria-controls="log-form">
                        Вход
                    </button>
                </h2>
                <div id="log-form" class="accordion-collapse collapse show" aria-labelledby="acc-h-2" data-bs-parent="#accordion-auth">
                    <div class="accordion-body text-center">
                        <form class="needs-validation" action="login" method="POST">
                            <div class="row m-1 g-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="login_log" class="form-control" id="login-log" placeholder="" required>
                                        <label for="login-log">Логин</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" name="pass_log" class="form-control" id="pass-log" placeholder="" aria-describedby="show-pass" required>
                                        <label for="pass-log">Пароль</label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <input type="checkbox" class="btn-check" id="show-pass-log" onclick="showPassLog()" autocomplete="off">
                                    <label for="show-pass-log" class="btn btn-outline-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                        Показать пароль
                                    </label>
                                </div>
                                <div class="col-4">
                                    <input type="submit" class="btn btn-light" value="Войти">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    else{
        echo "
        <div class=\"container m-2 text-info\">
            <div class=\"row my-3\">
                <h3 class=\"fs-4\">
                    Добро пожаловать, {$_SESSION['usr']['login']}!
                </h3>
                <a href=\"user?id={$_SESSION['usr']['id']}\" class=\"btn btn-secondary\">Перейти к профилю</a>
            </div>
            <hr>
            <div class=\"row my-3\">
                <h4 class=\"fs-5\">
                    Ваши статьи:
                </h4>
                <ul class=\"list-group my-2\">
                ";
        $db = new Database();
        $query = "SELECT * FROM articles WHERE author='{$_SESSION['usr']['id']}'";
        if($db->in_db($query)){
            $articles = $db->all_res($query);
            foreach ($articles as $article){
                echo "  
                    <li class=\"list-group-item\"><a class=\"text-info\" href=\"article?id={$article[0]}\">{$article[1]}</a></li>
                ";
            }
        }
        else{
            echo "
                    <li class=\"list-group-item\">
                        Вы ещё не написали ни одной статьи
                    </li>
                ";
        }
        echo "  </ul>
                    <a href=\"create_article\" class=\"btn btn-secondary\">Написать статью</a>
                </div>
                <hr>
        ";
        if($_SESSION['usr']['role'] == 3){
            echo "
            <div class=\"row my-3\">
                <h4 class=\"text-center text-info\">Администрирование</h4>
                <a href=\"/admin\" class=\"btn btn-secondary\">Управление пользователями</a>
            </div>
            <hr>
            ";
        }
    echo "
            <a href=\"logout\" class=\"my-2 btn btn-secondary\">
                Выход
            </a>
        </div>
    ";
    } 
    ?>
    </div>
</div>