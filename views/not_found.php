<?php
$page_title = "Страница не существует";
require_once getcwd()."/php/templates/header.php";
?>
<div class="container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5" style="min-height: 60vh;">
    <h1 class="text-center text-info">
        Ошибка! <br>
        Такой страницы не существует
    </h1>
</div>
<?php
require getcwd()."/php/templates/footer.php";
?>