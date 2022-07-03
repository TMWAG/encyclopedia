<?php
use App\Database;
session_start();
if($_POST){
    if($_POST['article_title']){
        $article_title = addslashes($_POST['article_title']);
        if($_POST['article_body']){
            $article_category = addslashes($_POST['article_category']);
            $article_body = addslashes($_POST['article_body']);
            $article_id = addslashes($_POST['article_id']);
            $db = new Database();
            $query = "UPDATE articles SET category = '{$article_category}', text = '{$article_body}', title = '{$article_title}' WHERE id = '{$article_id}'";
            $db->query($query);
        }
    }
}
else{
    $_SESSION['err']['art'] = "Были внесены некорректные изменения";
}
header("Location: ".$_SERVER['HTTP_REFERER']);