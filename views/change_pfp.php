<?php
use App\Database;
session_start();
$user_id = addslashes(trim($_POST['user_id']));
$file = $_FILES['file'];
if ($file['error'] == 0 && ($file['type'] == "image/jpeg" || $file['type'] == "image/png" || $file['type'] == "image/webp")){
    $filename = $file['name'];
    $exp = explode(".", $filename);
    $unq = uniqid();
    $filename = $unq.".".$exp[count($exp)-1];
    move_uploaded_file($file['tmp_name'], getcwd()."/img/pfp/".$filename);
    $db = new Database();
    $user_info = $db->first_res("SELECT * FROM users WHERE id='{$user_id}'");
    if (!$user_info[5]){
        $db->query("UPDATE users SET pfp_filename = '{$filename}' WHERE id='{$user_id}'");
    }
    else{
        unlink(getcwd()."/img/pfp/".$user_info[5]);
        $db->query("UPDATE users SET pfp_filename = '{$filename}' WHERE id='{$user_id}'");
    }
}
else{
    $_SESSION['err']['file'] = "Был выбран слишком большой файл";
}
header("Location: ".$_SERVER['HTTP_REFERER']);