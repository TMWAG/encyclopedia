<?php
use App\Database;
session_start();
$page_title = "Все статьи";
require_once getcwd()."/php/templates/header.php";
$db = new Database;
$articles = $db->all_res("SELECT * FROM articles");
?>
<div class="container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5" style="min-height: 60vh;">
    <div class="row g-2 m-1">
        <?php
        foreach ($articles as $article){ ?>
            <div class="col-6 col-md-3 col-lg-2 text-center"> 
                <a href="/article?id=<?=$article[0]?>" class="card py-2 bg-primary text-center text-wrap text-info bg-opacity-75 border-secondary border-2 mb-2">
                    <?=$article[1]?>
                </a>
            </div>
        <?php }
        ?>
    </div>
    
</div>
<?php
require_once getcwd()."/php/templates/footer.php";
?>