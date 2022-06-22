<?php
use App\Database;
session_start();
if($_POST){
    if($_POST['article_title']){
        $article_title = addslashes($_POST['article_title']);
        if($_POST['article_body']){
            $article_category = addslashes($_POST['article_category']);
            $article_body = addslashes($_POST['article_body']);
            $author = $_POST['author_id'];
            $db = new Database();
            $query = "INSERT INTO articles (title, text, author, category) VALUES ('{$article_title}', '{$article_body}', '{$author}', '{$article_category}')";
            $db->query($query);
        }
        else{
            $_SESSION['err']['art'] = "Статья без заголовка не может существовать";
        }
    }
    else{
        $_SESSION['err']['art'] = "Невозможно создать статью без названия";
    }
}
else{
    $_SESSION['err']['art'] = "Невозможно создать статью без названия или содержания";
}
header("Location: ".$_SERVER['HTTP_REFERER']);