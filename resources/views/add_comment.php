<?php
use App\Database;
session_start();
if($_POST['comment_text'] && $_POST['user_id'] && $_POST['article_id']){
    $text = addslashes(trim($_POST['comment_text']));
    $user = addslashes(trim($_POST['user_id']));
    $article = addslashes(trim($_POST['article_id']));
    $db = new Database();
    $db->query("INSERT INTO comments (user_id, article, text) VALUES ('{$user}', '{$article}', '{$text}')");
}
else {
    $_SESSION['err']['commmet'] = "Возникла ошибка при добавлении комментария";
}
header("Location: ".$_SERVER['HTTP_REFERER']);