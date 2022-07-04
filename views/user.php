<?php
session_start();
use App\Database;
$db = new Database();
$user_info = $db->first_res("SELECT * FROM users WHERE id = '{$_GET["id"]}'");
$page_title = (($_SESSION['usr']['id'] == $_GET['id'])?"Личный Кабинет ":"Страница ")."Пользователя {$user_info[1]}";
require_once getcwd()."/php/templates/header.php";
$article_count = $db->in_db("SELECT * FROM articles WHERE author = '{$_GET['id']}'");
$comment_count = $db->in_db("SELECT * FROM comments WHERE user_id = '{$_GET['id']}'");
$role = $db->first_res("SELECT * FROM users_role WHERE id = '{$user_info[4]}'");
?>
<div class="container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5" style="min-height: 60vh;">
    <h1 class="text-center text-info">
        Пользователь: <?=$user_info[1]?>
    </h1>
    <hr>
    <div class="row g-2 m-1">
        <div class="col-12 col-md-4">
            <div class="card bg-primary text-center text-wrap text-white bg-opacity-75 border-secondary border-2 mb-2">
                <div class="card-body text-center text-white">
                    <h2 class="fs-3">
                        Информация об аккаунте
                    </h2>
                    <hr>
                    <img class="card-img mx-auto rounded border-secondary d-block" src="/img/pfp/<?=$user_info[5]?>" alt="Картинка профиля пользователя <?=$user_info[1]?>" style="height: auto; min-width: 20vw;">
                    <ul class="list-group my-2">
                        <li class="list-group-item">Дата регистрации: <?=$user_info[6]?></li>
                        <li class="list-group-item">Написано статей: <?=$article_count?></li>
                        <li class="list-group-item">Оставлено комментариев: <?=$comment_count?></li>
                        <li class="list-group-item">Роль: <?=$role[1]?></li>
                    </ul>
                    <?php
                    if ($_SESSION['usr']['id'] == $_GET['id']){ ?>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#edit_pfp_modal">
                            Изменить картинку профиля
                        </button>
                        <div class="modal fade" id="edit_pfp_modal" tabindex="-1" aria-labelledby="edit_pfp_modal_label" aria-hidden="true">
                            <div class="modal-dialog text-black">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="edit_pfp_modal_label">
                                            Изменить картинку профиля
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="change_pfp" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label for="pfp_file" class="form-label">Новая картинка профиля</label>
                                                <input class="form-control" name="file" type="file" id="pfp_file">
                                                <input type="hidden" name="user_id" value="<?=$_GET['id']?>">
                                            </div>
                                            <input type="submit" class="btn btn-secondary" value="Отправить">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card bg-primary text-center text-wrap text-white bg-opacity-75 border-secondary border-2 mb-2">
                <div class="card-body text-center text-white">
                    <h2 class="fs-3">
                        Статьи
                    </h2>
                    <hr>
                    <ul class="list-group my-2">
                        <?php
                        if($db->article_count($user_info[0])){
                            $articles = $db->all_res("SELECT * FROM articles WHERE author = '{$user_info[0]}'");
                            foreach ($articles as $article){
                                echo "<li class=\"list-group-item\"><a class=\"text-info\" href=\"article?id={$article[0]}\">{$article[1]}</a></li>";
                            }
                        }
                        else{
                            echo "<li class=\"list-group-item\">Нет статей</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once getcwd()."/php/templates/footer.php";
?>