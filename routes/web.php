<?php
$template = "resources/views/";
$adrr = $_SERVER['REQUEST_URI'];
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $exp = explode('?', $_SERVER['REQUEST_URI']);
    $adrr = $exp[0];
}
switch ($adrr){
    case '/':
        include $template.'index.php';
        break;
    case '/register':
        include $template.'register.php';
        break;
    case '/login':
        include $template.'login.php';
        break;
    case '/logout':
        include $template.'logout.php';
        break;
    case '/create_article':
        include $template.'create_article.php';
        break;
    case '/create_article_script':
        include $template.'create_article_script.php';
        break;
    case '/article':
        include $template.'article.php';
        break;
    case '/edit_article':
        include $template.'edit_article.php';
        break;
    case '/edit_article_script':
        include $template.'edit_article_script.php';
        break;
    case '/user':
        include $template.'user.php';
        break;
    case '/add_comment':
        include $template.'add_comment.php';
        break;
    case '/change_pfp':
        include $template.'change_pfp.php';
        break;
    case '/admin':
        include $template.'admin.php';
        break;
    case '/all_articles':
        include $template.'all_articles.php';
        break;
    case '/alter_privelege':
        include $template.'alter_privelege.php';
        break;
    default:
        include $template.'not_found.php';
}
?>