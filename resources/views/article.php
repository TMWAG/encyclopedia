<?php
session_start();
use App\Database;
$db_articles = new Database();
$article_info = $db_articles->first_res("SELECT * FROM articles WHERE id = '{$_GET['id']}'");
$page_title = $article_info[1];
require_once getcwd()."/php/templates/header.php";
$category_info = $db_articles->first_res("SELECT category_name FROM category WHERE id = '{$article_info[4]}'");
$author_info = $db_articles->first_res("SELECT * FROM users WHERE id = '{$article_info[3]}'");
$comments = $db_articles->all_res("SELECT * FROM comments WHERE article = '{$_GET['id']}'");
?>
<div class="container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5" style="min-height: 60vh;">
    <div class="card bg-primary bg-opacity-75 border-secondary border-2 mb-2">
        <div class="text-white card-header d-flex align-items-center justify-content-between">
            <h1 class="fs-2">
                <?=$article_info[1]?>
            </h1>
            <span class="fs-5">
                Категория: <?=$category_info[0]?>
            </span>
            <?php
                if(($_SESSION['usr']['login'] == $author_info[1]) || ($_SESSION['usr']['role'] >= 2)){
                    echo"<a href=\"edit_article?id={$_GET['id']}\" class=\"btn btn-secondary\">Редактировать статью</a>";
                }
            ?>
        </div>
        <div class="card-body text-white">
            <p class="text-center fs-4 text-wrap mb-0">
                <?=$article_info[2]?>
            </p>
        </div>
        <div class="card-footer d-flex justify-content-between text-info">
            <span>
                Автор: <a href="user?id=<?=$author_info[0]?>" class="text-info"><?=$author_info[1]?></a>
            </span>
            <span>
                Дата написания: <?=$article_info[5]?>
            </span>
        </div>
    </div>
</div>
<div class="container text-white rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5">
    <div class="card bg-primary bg-opacity-75 border-secondary border-2 mb-2">
        <div class="card-header d-flex justify-content-between">
            Комментарии
        </div>
        <?php 
        if ($_SESSION['usr']){ ?>
        <form action="add_comment" method="POST">
            <div class="row g-2 m-1">
                <div class="col-10">
                    <input type="text" class="form-control" name="comment_text" autocomplete="off">
                    <input type="hidden" name="user_id" value="<?=$_SESSION['usr']['id']?>">
                    <input type="hidden" name="article_id" value="<?=$_GET['id']?>">
                </div>
                <div class="col-2">
                    <input type="submit" class="btn btn-secondary" value="Оставить комментарий">
                </div>
            </div>
        </form>
        <?php } 
        ?>
        <div class="card-body">
            <div class="row">
                <?php
                foreach ($comments as $comment){ ?>
                    <div class="col-12">
                        <div class="card bg-primary bg-opacity-75 border-secondary border-2 mb-2">
                            <div class="card-header d-flex justify-content-between">
                                <?php
                                $user_info = $db_articles->first_res("SELECT * FROM users WHERE id = '{$comment[1]}'");
                                ?>
                                <a href="user?id=<?=$user_info[0]?>" class="text-info">
                                    <?=$user_info[1]?>
                                </a>
                                <span class=""><?=$comment[4]?></span>
                            </div>
                            <div class="card-body">
                                <?=$comment[2]?>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
            
        </div>
    </div>
</div>
<?php
require_once getcwd()."/php/templates/footer.php";
?>