<?php
session_start();
use APP\Database;
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM articles WHERE id = '{$id}'";
$article_info = $db->first_res($query);
$page_title = "Редактирование статьи \"{$article_info[1]}\"";
require_once getcwd()."/php/templates/header.php";
if ($_SESSION['usr']['id'] == $article_info[3] || $_SESSION['usr']['role'] >= 2){
    echo "
    <div class=\"container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5\">
        <form action=\"edit_article_script\" method=\"POST\">
            <div class=\"row m-1 g-2\">
                <div class=\"offset-2 col-5\">
                    <div class=\"form-floating\">
                        <input class=\"form-control\" type=\"text\" name=\"article_title\" id=\"article_titile\" value=\"{$article_info[1]}\" placeholder=\"\">
                        <label for=\"article_titile\">Название статьи</label>
                    </div>
                </div>
                <div class=\"col-3\">
                    <div class=\"form-floating\">
                        <select class=\"form-select\" id=\"article_category\" name=\"article_category\" placeholder=\"\">
    ";
    $db = new Database();
    $query = "SELECT * FROM category";
    $categories = $db->all_res($query);
    foreach ($categories as $category){
        if($article_info[4] == $category[0]){
            echo "<option value=\"{$category[0]}\" selected>{$category[1]}</option>";
        }
        else{
            echo "<option value=\"{$category[0]}\">{$category[1]}</option>";
        }
    }
    echo"
                        </select>
                        <label for=\"article_category\">Категория</label>
                    </div>
                </div>
                <input type=\"hidden\" name=\"article_id\" value=\"{$id}\">
            </div>
            <div class=\"row m-1 g-2\">
                <div class=\"col-12\">
                    <textarea name=\"article_body\"rows=\"22\">
                        {$article_info[2]}
                    </textarea>
                    <script>
                    tinymce.init({
                    selector: 'textarea',
                    plugins: 'quickbars table lists advlist image',
                    toolbar: 'undo redo | styles | alignleft aligncentre alignright alignjustify | table bullist image editimage',
                    toolbar_mode: 'floating',
                    skin: 'oxide-dark',
                    });
                    </script>
                </div>
            </div>
            <div class=\"row m-1 g-2\">
                <div class=\"offset-4 col-4\">
                    <input class=\"form-control form-control-lg\" type=\"submit\" value=\"Применить изменения\">
                </div>
            </div>
        </form>
    </div>
    ";
}
require_once getcwd()."/php/templates/footer.php";
?>