<?php
use App\Database;
$page_title = "Написать статью";
require_once getcwd()."/php/templates/header.php";
if($_SESSION['usr']){
    echo"
    <div class=\"container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5\">
        <form action=\"create_article_script\" method=\"POST\">
            <div class=\"row m-1 g-2\">
                <div class=\"offset-2 col-5\">
                    <div class=\"form-floating\">
                        <input class=\"form-control\" type=\"text\" name=\"article_title\" id=\"article_titile\" placeholder=\"\">
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
            echo "
                            <option value=\"{$category[0]}\">{$category[1]}</option>
            ";
        }
        echo"
                        </select>
                        <label for=\"article_category\">Категория</label>
                    </div>
                </div>
                <input type=\"hidden\" name=\"author_id\" value=\"{$_SESSION['usr']['id']}\">
            </div>
            <div class=\"row m-1 g-2\">
                <div class=\"col-12\">
                    <textarea name=\"article_body\"rows=\"22\">
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
                    <input class=\"form-control form-control-lg\" type=\"submit\" value=\"Отправить статью\">
                </div>
            </div>
        </form>
    </div>
    ";
}
else{
    echo "
        <div class=\"container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5\">
            <h2 class=\"fs-2 text-center text-info\">Чтобы получить возможность писать статьи, пожалуйста войдите или зарегистрируйтесь</h2>
        </div>
    ";
}
require_once getcwd()."/php/templates/footer.php";
?>