<?php
use App\Database;
$page_title = "Администрирование";
require_once getcwd()."/php/templates/header.php";
?>
<div class="container rounded bg-primary gy-5 p-2 bg-opacity-75 border-secondary border-2 my-5" style="min-height: 60vh;">
    <div class="card bg-primary bg-opacity-75 border-secondary border-2 mb-2">
        <div class="card-body text-white">
            <h1 class="text-center fs-2">
                Администрирование
            </h1>
            <hr>
            <div class="row g-2 m-1">
                <?php
                if($_SESSION['usr']['role'] == 3){ 
                    $admin_db = new Database();
                    $admin_users = $admin_db->all_res("SELECT * FROM users WHERE NOT login = '{$_SESSION['usr']['login']}'");
                    $admin_roles = $admin_db->all_res("SELECT * FROM users_role");
                    foreach($admin_users as $user){?>
                        <div class="col-12 col-md-3">
                            <div class="card bg-primary bg-opacity-75 border-secondary border-2 mb-2" style="min-height: 20vh">
                                <div class="card-header fs-4 text-center">
                                    <a href="/user?id=<?=$user[0]?>" class="text-info "><?=$user[1]?></a> 
                                </div>
                                <div class="card-body text-center">
                                    <form action="alter_privelege" method="POST">
                                        <div class="form-floating text-black mb-2">
                                            <select class="form-select" name="role" id="role_input_<?=$user[0]?>" placeholder="">
                                            <?php
                                            foreach($admin_roles as $role){
                                                if ($user[4] == $role[0]){
                                                    echo "<option value=\"$role[0]\" selected>{$role[1]}</option>";
                                                }
                                                else{
                                                    echo "<option value=\"$role[0]\">{$role[1]}</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                            <label for="role_input_<?=$user[0]?>">Роль пользователя <?=$user[1]?></label>
                                        </div>
                                        <input type="hidden" name="user_id" value="<?=$user[0]?>">
                                        <input type="submit" class="form-control" value="Изменить роль">
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                else{ ?>
                    <h2 class="text-info text-center">
                        Ошибка доступа! <br> У Вас недостаточно полномочий для просмотра этого раздела.
                    </h2>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once getcwd()."/php/templates/footer.php";
?>